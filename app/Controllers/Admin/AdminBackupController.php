<?php

namespace App\Controllers\Admin;

use App\Models\Backup;
use App\Models\Setting;
use App\Core\BackupService;

class AdminBackupController extends AdminBaseController
{
    public function index()
    {
        $this->requireAdminAuth();

        $backupModel = new Backup();
        $page = (int)($_GET['page'] ?? 1);
        $backups = $backupModel->paginate(15, $page);

        $emailsJson = Setting::get('backup_emails', '[]');
        $emails = json_decode($emailsJson, true);

        return $this->adminView('backups/index', [
            'backups' => $backups['data'],
            'pagination' => $backups,
            'emails' => $emails
        ]);
    }

    public function storeSettings()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $emailsInput = $_POST['emails'] ?? '';
        $emailsArray = array_filter(array_map('trim', explode(',', $emailsInput)));

        // Validate emails
        $validEmails = [];
        foreach ($emailsArray as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validEmails[] = $email;
            }
        }

        Setting::set('backup_emails', json_encode($validEmails));

        $_SESSION['success'] = "Backup settings updated successfully";
        header('Location: ' . route('admin.backups.index'));
        exit;
    }

    public function runBackup()
    {
        $this->requireAdminAuth();

        $backupService = new BackupService();
        $result = $backupService->run();

        if ($result['status'] === 'success') {
            $_SESSION['success'] = "Backup created and sent successfully";
        } else {
            $_SESSION['error'] = "Backup failed: " . $result['message'];
        }

        header('Location: ' . route('admin.backups.index'));
        exit;
    }

    public function download($id)
    {
        $this->requireAdminAuth();

        $backupModel = new Backup();
        $backup = $backupModel->find($id);

        if (!$backup) {
            die("Backup not found");
        }

        $filePath = (new BackupService())->backupDir . '/' . $backup['filename'];

        if (file_exists($filePath)) {
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $backup['filename'] . '"');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit;
        } else {
            die("File not found on server");
        }
    }

    public function sendEmail($id)
    {
        $this->requireAdminAuth();

        $backupModel = new Backup();
        $backup = $backupModel->find($id);

        if (!$backup) {
            $_SESSION['error'] = "Backup not found";
            header('Location: ' . route('admin.backups.index'));
            exit;
        }

        $backupService = new BackupService();
        $filePath = $backupService->backupDir . '/' . $backup['filename'];

        if (file_exists($filePath)) {
            $backupService->sendBackupEmail($filePath, $backup['filename']);

            $_SESSION['success'] = "Backup sent to configured email IDs successfully";
        } else {
            $_SESSION['error'] = "Backup file not found on server";
        }

        header('Location: ' . route('admin.backups.index'));
        exit;
    }

    public function destroy($id)
    {
        $this->requireAdminAuth();
        csrf_verify();

        $backupModel = new Backup();
        $backup = $backupModel->find($id);

        if ($backup) {
            $filePath = (new BackupService())->backupDir . '/' . $backup['filename'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $backupModel->delete($id);
            $_SESSION['success'] = "Backup deleted successfully";
        } else {
            $_SESSION['error'] = "Backup not found";
        }

        header('Location: ' . route('admin.backups.index'));
        exit;
    }
}
