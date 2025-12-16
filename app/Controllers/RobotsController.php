<?php

namespace App\Controllers;

use App\Models\Robots;

class RobotsController
{
    public function index()
    {
        $robotsModel = new Robots();
        $robotsList = $robotsModel->findAll();
        $robotsData = $robotsList[0] ?? null;

        $content = $robotsData['content'] ?? '';

        if (empty($content)) {
            // Default robots.txt content if nothing is saved
            $content = "User-agent: *\nDisallow: /admin/\nAllow: /";
        }

        header('Content-Type: text/plain; charset=utf-8');
        echo $content;
        exit;
    }
}
