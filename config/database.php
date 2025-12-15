<?php

return [
    'driver'   => getenv('DB_CONNECTION') ?: 'mysql',
    'host'     => getenv('DB_HOST') ?: '127.0.0.1',
    'port'     => getenv('DB_PORT'),
    'database' => getenv('DB_DATABASE'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset'  => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
];
