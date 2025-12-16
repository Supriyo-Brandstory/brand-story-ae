<?php

namespace App\Controllers\Admin;

use App\Models\Robots;

class AdminRobotsController extends AdminBaseController
{
    private Robots $robotsModel;

    public function __construct()
    {
        parent::__construct();
        $this->robotsModel = new Robots();
    }

    public function index()
    {
        $this->requireAdminAuth();

        // Fetch existing robots.txt content (take the first one found)
        $robots = $this->robotsModel->findAll();
        $robotsData = $robots[0] ?? null;

        $content = $robotsData['content'] ?? '';

        return $this->adminView('robots/index', [
            'content' => $content
        ]);
    }

    public function update()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $content = $_POST['content'] ?? '';

        // Check if record exists
        $robots = $this->robotsModel->findAll();
        $robotsData = $robots[0] ?? null;

        if ($robotsData) {
            $this->robotsModel->save([
                'id' => $robotsData['id'],
                'content' => $content
            ]);
        } else {
            // Insert new (without ID, let DB assign it)
            $this->robotsModel->save([
                'content' => $content
            ]);
        }

        $_SESSION['success'] = 'Robots.txt updated successfully.';
        header('Location: ' . route('admin.robots.index'));
        exit;
    }
}
