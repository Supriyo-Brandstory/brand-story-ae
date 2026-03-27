<div class="container-fluid py-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pages Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= route('admin.pages.create') ?>" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Create New Page
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Template</th>
                            <th>Created At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pages)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No pages found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($pages as $page): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($page['title']) ?></strong></td>
                                    <td><code>/<?= htmlspecialchars($page['slug']) ?></code></td>
                                    <td><span class="badge bg-info text-dark"><?= htmlspecialchars($page['template']) ?></span></td>
                                    <td><?= date('Y-m-d H:i', strtotime($page['created_at'])) ?></td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="<?= base_url($page['slug']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary" title="View Page" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="<?= route('admin.pages.edit', ['id' => $page['id']]) ?>" class="btn btn-sm btn-outline-warning" title="Edit" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="<?= route('admin.pages.destroy', ['id' => $page['id']]) ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this page?')">
                                                <?= csrf_token() ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div class="card-footer bg-white border-top-0 pt-3 pb-3">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $currentPage - 1 ?>"><i class="bi bi-chevron-left"></i> Previous</a>
                    </li>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Next <i class="bi bi-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
    </div>
</div>