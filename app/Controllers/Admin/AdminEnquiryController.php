<?php

namespace App\Controllers\Admin;

use App\Models\Enquiry;

class AdminEnquiryController extends AdminBaseController
{
    private Enquiry $enquiryModel;

    public function __construct()
    {
        parent::__construct();
        $this->enquiryModel = new Enquiry();
    }

    public function index()
    {
        $this->requireAdminAuth();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 20;

        // Sorting by created_at desc
        $result = $this->enquiryModel->query("SELECT * FROM enquiries ORDER BY created_at DESC");

        // Simple pagination for now if list is long, let's just fetch all for start
        $enquiries = $result;

        return $this->adminView('enquiries/index', [
            'enquiries' => $enquiries
        ]);
    }

    public function show($id)
    {
        $this->requireAdminAuth();
        $enquiry = $this->enquiryModel->find($id);

        if (!$enquiry) {
            $_SESSION['error'] = 'Enquiry not found.';
            header('Location: ' . route('admin.enquiries.index'));
            exit;
        }

        return $this->adminView('enquiries/show', [
            'enquiry' => $enquiry
        ]);
    }

    public function destroy($id)
    {
        $this->requireAdminAuth();
        csrf_verify();

        $this->enquiryModel->delete($id);

        $_SESSION['success'] = 'Enquiry deleted successfully.';
        header('Location: ' . route('admin.enquiries.index'));
        exit;
    }
}
