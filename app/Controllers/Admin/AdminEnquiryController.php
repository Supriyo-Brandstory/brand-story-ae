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

        $search = $_GET['search'] ?? '';
        $perPage = 20;
        $currentPage = (int)($_GET['page'] ?? 1);
        if ($currentPage < 1) $currentPage = 1;
        $offset = ($currentPage - 1) * $perPage;

        $params = [];
        $whereSql = "";
        if (!empty($search)) {
            $whereSql = "WHERE name LIKE ? OR email LIKE ? OR phone LIKE ? OR type LIKE ? OR company LIKE ?";
            $params = ["%$search%", "%$search%", "%$search%", "%$search%", "%$search%"];
        }

        $totalSql = "SELECT COUNT(*) as total FROM enquiries $whereSql";
        $totalResult = $this->enquiryModel->query($totalSql, $params);
        $totalItems = $totalResult[0]['total'] ?? 0;
        $totalPages = ceil($totalItems / $perPage);

        // Fetch data
        $sql = "SELECT * FROM enquiries $whereSql ORDER BY created_at DESC LIMIT ? OFFSET ?";
        $dataParams = array_merge($params, [$perPage, $offset]);
        
        // Since my query helper doesn't support bindParam for types, 
        // I need to be careful with LIMIT/OFFSET as strings in some PDO drivers,
        // but PDO::execute() usually handles them if emulated prepares are on.
        // If it fails, I'll use bindValue manually.
        
        // Actually, let's use a safer approach for LIMIT/OFFSET
        $db = \App\Core\Database::connect();
        $stmt = $db->prepare("SELECT * FROM enquiries $whereSql ORDER BY created_at DESC LIMIT ? OFFSET ?");
        $i = 1;
        foreach ($params as $p) {
            $stmt->bindValue($i++, $p);
        }
        $stmt->bindValue($i++, $perPage, \PDO::PARAM_INT);
        $stmt->bindValue($i++, $offset, \PDO::PARAM_INT);
        $stmt->execute();
        $enquiries = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this->adminView('enquiries/index', [
            'enquiries' => $enquiries,
            'totalItems' => $totalItems,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'search' => $search
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
