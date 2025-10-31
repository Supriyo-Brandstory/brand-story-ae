<?php
namespace App\Core;

class App
{
    public function run()
    {
        // Dispatch routes defined in routes/web.php
        return Route::dispatch();
    }
}
