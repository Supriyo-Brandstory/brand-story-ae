<?php

namespace App\Console\Commands;

class VideoDownloaderInstall
{
    /**
     * Handle the installation of dependencies for the Video Downloader
     */
    public function handle($args)
    {
        echo "=========================================\n";
        echo "   Video Downloader Installation Tool    \n";
        echo "=========================================\n\n";

        $os = PHP_OS;
        echo "Detected OS: $os\n";

        if (stripos($os, 'Darwin') !== false) {
            $this->installMac();
        } elseif (stripos($os, 'Linux') !== false) {
            $this->installLinux();
        } else {
            echo "Error: This installation script only supports Linux and macOS.\n";
            exit(1);
        }

        $this->setupPermissions();

        echo "\nInstallation Process Finished!\n";
        echo "Please test the Video Downloader in your browser.\n";
    }

    private function installLinux()
    {
        echo "Running Linux Installation Sub-routine...\n";

        echo "1. Checking/Installing System Packages (ffmpeg, python3)...\n";
        // Attempt to install via apt. This usually requires sudo.
        $this->run("sudo apt-get update");
        $this->run("sudo apt-get install -y ffmpeg python3 python3-pip");

        echo "2. Installing/Updating yt-dlp to latest version...\n";
        $this->run("sudo pip3 install -U yt-dlp --break-system-packages");
    }

    private function installMac()
    {
        echo "Running macOS Installation Sub-routine...\n";

        if (!$this->commandExists('brew')) {
            echo "Error: Homebrew is not installed. Please install it first from https://brew.sh/\n";
            exit(1);
        }

        echo "1. Installing ffmpeg...\n";
        $this->run("brew install ffmpeg");

        echo "2. Installing yt-dlp...\n";
        $this->run("brew install yt-dlp");
    }

    private function setupPermissions()
    {
        echo "3. Setting up Permissions for 'writable/tmp'...\n";
        
        $baseDir = dirname(dirname(dirname(__DIR__)));
        $tmpDir = $baseDir . '/writable/tmp';

        if (!is_dir($tmpDir)) {
            echo "Creating directory: $tmpDir\n";
            mkdir($tmpDir, 0777, true);
        }

        echo "Applying chmod 777 to $tmpDir\n";
        @chmod($tmpDir, 0777);
    }

    private function run($cmd)
    {
        echo "Executing: $cmd\n";
        $handle = popen($cmd . ' 2>&1', 'r');
        if ($handle) {
            while (!feof($handle)) {
                echo "  > " . fgets($handle);
            }
            pclose($handle);
        }
    }

    private function commandExists($cmd)
    {
        $return = shell_exec(sprintf("which %s", escapeshellarg($cmd)));
        return !empty($return);
    }
}
