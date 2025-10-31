<?php
use App\Core\Route;

// Define routes (path, "Controller@method", name)
Route::get('/', 'HomeController@index', 'home');
Route::get('/about', 'AboutController@index', 'about');
