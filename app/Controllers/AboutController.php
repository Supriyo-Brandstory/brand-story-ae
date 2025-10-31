<?php
namespace App\Controllers;

use App\Core\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $meta = [
            'title' => 'About BrandStoryAE',
            'description' => 'About our creative agency and services.'
        ];
        return $this->view('about', ['meta' => $meta]);
    }
}
