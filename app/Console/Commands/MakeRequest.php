<?php

namespace App\Console\Commands;

class MakeRequest
{
    public function handle($name = null, $args = [])
    {
        if (!$name) {
            echo "Request name required. Example: php command make:request StoreUserRequest\n";
            return;
        }

        $request = ucfirst($name);
        $dir = __DIR__ . '/../../Requests';
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $file = $dir . '/' . $request . '.php';

        if (file_exists($file)) {
            echo "Request {$request} already exists.\n";
            return;
        }

        $template = <<<PHP
<?php
namespace App\Requests;

class {$request}
{
    public function authorize()
    {
        return true; // Or implement authorization logic
    }

    public function rules()
    {
        return [
            // 'field_name' => 'rule1|rule2',
            // Example: 'email' => 'required|email|unique:users',
            // 'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            // 'field_name.rule_name' => 'Custom message',
        ];
    }
}
PHP;
        file_put_contents($file, $template);
        echo "Request created: app/Requests/{$request}.php\n";
    }
}
