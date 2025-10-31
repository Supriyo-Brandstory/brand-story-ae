<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $meta = [
            'title' => 'BrandStoryAE — Home',
            'description' => 'BrandStoryAE — Creative digital agency.',
            "classname" => 'dm-agency-dubai'
        ];
        return $this->view('home', ['meta' => $meta]);
    }
}
