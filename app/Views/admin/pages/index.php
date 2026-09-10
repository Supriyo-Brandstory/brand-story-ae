<div class="container-fluid py-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pages Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0 gap-2">
            <button type="button" class="btn btn-sm btn-danger" id="bulkDeleteBtn" style="display: none;" onclick="if(confirm('Are you sure you want to delete the selected pages?')) document.getElementById('bulkDeleteForm').submit();">
                <i class="bi bi-trash"></i> Delete Selected
            </button>
            <?php if (!empty($pages) || (isset($total) && $total > 0)): ?>
                <form action="<?= route('admin.pages.delete_all') ?>" method="POST" class="d-inline" onsubmit="return confirm('⚠️ WARNING: Are you sure you want to delete ALL pages? This action cannot be undone and will delete every page in the database.');">
                    <?= csrf_token() ?>
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash3"></i> Delete All Pages
                    </button>
                </form>
            <?php endif; ?>
            <a href="<?= route('admin.pages.bulk_upload') ?>" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-upload"></i> Bulk Upload ZIP
            </a>
            <a href="<?= route('admin.pages.create') ?>" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Create New Page
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col">
                    <form action="<?= route('admin.pages.index') ?>" method="GET" class="d-flex align-items-center gap-2">
                        <div class="input-group" style="max-width: 360px;">
                            <input type="text" name="search" class="form-control" placeholder="Search by title or slug..." value="<?= htmlspecialchars($search ?? '') ?>">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                        <?php if (!empty($search)): ?>
                            <a href="<?= route('admin.pages.index') ?>" class="btn btn-outline-secondary">Clear</a>
                            <span class="text-muted ms-2 small">Found <?= (int)($total ?? 0) ?> result(s) for "<strong><?= htmlspecialchars($search) ?></strong>"</span>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= route('admin.pages.bulk_destroy') ?>" method="POST" id="bulkDeleteForm">
                <?= csrf_token() ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 40px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAllPages">
                                </div>
                            </th>
                            <th style="width: 50px;">S.N.</th>
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
                                <td colspan="7" class="text-center py-4 text-muted">No pages found.</td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            $perPage = $perPage ?? 10;
                            $count = ($currentPage - 1) * $perPage + 1; 
                            foreach ($pages as $page): 
                            ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input page-checkbox" type="checkbox" name="page_ids[]" value="<?= $page['id'] ?>">
                                        </div>
                                    </td>
                                    <td><?= $count++ ?></td>
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
            </form>
        </div>
        
        <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div class="card-footer bg-white border-top-0 pt-3 pb-3">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-0">
                    <?php 
                    $queryParams = $_GET;
                    ?>
                    <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                        <?php 
                        $queryParams['page'] = $currentPage - 1;
                        $prevUrl = '?' . http_build_query($queryParams);
                        ?>
                        <a class="page-link" href="<?= $prevUrl ?>"><i class="bi bi-chevron-left"></i> Previous</a>
                    </li>
                    
                    <?php 
                    $range = 2; // Number of pages to show before and after current page
                    $showEllipsis = true;

                    for ($i = 1; $i <= $totalPages; $i++):
                        // Always show first page, last page, and pages within range of current page
                        if ($i == 1 || $i == $totalPages || ($i >= $currentPage - $range && $i <= $currentPage + $range)):
                            $showEllipsis = true;
                            $queryParams['page'] = $i;
                            $pageUrl = '?' . http_build_query($queryParams);
                    ?>
                            <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                <a class="page-link" href="<?= $pageUrl ?>"><?= $i ?></a>
                            </li>
                    <?php 
                        elseif ($showEllipsis): 
                            $showEllipsis = false;
                    ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                    
                    <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                        <?php 
                        $queryParams['page'] = $currentPage + 1;
                        $nextUrl = '?' . http_build_query($queryParams);
                        ?>
                        <a class="page-link" href="<?= $nextUrl ?>">Next <i class="bi bi-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('selectAllPages');
    const checkboxes = document.querySelectorAll('.page-checkbox');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');

    function updateBulkDeleteButton() {
        const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
        if(bulkDeleteBtn) {
            bulkDeleteBtn.style.display = anyChecked ? 'inline-block' : 'none';
        }
        
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        if (selectAll && checkboxes.length > 0) {
            selectAll.checked = allChecked;
            selectAll.indeterminate = anyChecked && !allChecked;
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => {
                cb.checked = selectAll.checked;
            });
            updateBulkDeleteButton();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkDeleteButton);
    });
});
</script>