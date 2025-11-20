<?php

namespace App\Console\Commands;

class MakeModel
{
    public function handle($name = null, $args = [])
    {
        if (!$name) {
            echo "Model name required. Example: php command make:model User\n";
            return;
        }

        $model = ucfirst($name);
        $dir = __DIR__ . '/../../Models';
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $file = $dir . '/' . $model . '.php';

        if (file_exists($file)) {
            echo "Model {$model} already exists.\n";
            return;
        }

        $template = <<<PHP
<?php
namespace App\Models;

use App\Core\BaseModel;

class {$model} extends BaseModel
{
    // protected \$table = '{{TABLE_NAME}}';
    // protected \$fillable = ['column1', 'column2'];
}
PHP;
        // Optionally replace {{TABLE_NAME}} with a pluralized version of the model name
        $template = str_replace('{{TABLE_NAME}}', strtolower($model) . 's', $template);

        file_put_contents($file, $template);
        echo "Model created: app/Models/{$model}.php\n";
    }
}
