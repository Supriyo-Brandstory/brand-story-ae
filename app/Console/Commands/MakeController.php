<?php
namespace App\Console\Commands;

class MakeController
{
    public function handle($name = null, $argv = [])
    {
        if (!$name) {
            echo "Controller name required. Example: php command make:controller AdminController\n";
            return;
        }

        $resource = in_array('--resource', $argv);
        $controller = ucfirst($name);
        $dir = __DIR__ . '/../../Controllers';
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $file = $dir . '/' . $controller . '.php';

        if (file_exists($file)) {
            echo "Controller {$controller} already exists.\n";
            return;
        }

        if ($resource) {
            $template = <<<PHP
<?php
namespace App\Controllers;

use App\Core\Controller;

class {$controller} extends Controller
{
    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store() {
        //
    }

    public function show(\$id) {
        //
    }

    public function edit(\$id) {
        //
    }

    public function update(\$id) {
        //
    }

    public function destroy(\$id) {
        //
    }
}
PHP;
        } else {
            $template = <<<PHP
<?php
namespace App\Controllers;

use App\Core\Controller;

class {$controller} extends Controller
{
    public function index()
    {
        // return \$this->view('...'); or \$this->adminView(...)
    }
}
PHP;
        }

        file_put_contents($file, $template);
        echo "Controller created: app/Controllers/{$controller}.php\n";
    }
}
