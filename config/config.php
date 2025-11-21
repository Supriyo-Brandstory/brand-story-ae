<?php

// Port configuration for local development
$port = 8000;
$baseUrl = 'http://localhost';

// Construct full URL with port
$fullUrl = $baseUrl . ':' . $port;

return [
    'app_name' => 'BrandStoryAE',
    'base_url' => $fullUrl,
    'port' => $port,
];
