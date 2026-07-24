<?php

namespace App\Models;

use App\Core\BaseModel;
use PDO;

class Page extends BaseModel
{
    protected string $table = 'pages';
    protected $fillable = ['title', 'slug', 'template', 'content', 'custom_class'];

    /**
     * Paginate pages with search across title and slug.
     *
     * @param string $search Search query
     * @param int $perPage Items per page
     * @param int $page Current page number
     * @return array Paginated data array
     */
    public function searchPages(string $search = '', int $perPage = 10, int $page = 1): array
    {
        $offset = ($page - 1) * $perPage;
        $params = [];
        $whereSql = "";

        if (!empty($search)) {
            $whereSql = "WHERE (title LIKE ? OR slug LIKE ?)";
            $searchTerm = "%{$search}%";
            $params = [$searchTerm, $searchTerm];
        }

        // Count total matching records
        $countStmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} {$whereSql}");
        $countStmt->execute($params);
        $total = (int)$countStmt->fetchColumn();

        // Fetch paginated data
        $sql = "SELECT * FROM {$this->table} {$whereSql} ORDER BY created_at DESC LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($sql);

        $i = 1;
        foreach ($params as $param) {
            $stmt->bindValue($i++, $param);
        }
        $stmt->bindValue($i++, $perPage, PDO::PARAM_INT);
        $stmt->bindValue($i++, $offset, PDO::PARAM_INT);

        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'data' => $data,
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => $total > 0 ? (int)ceil($total / $perPage) : 1
        ];
    }
}
