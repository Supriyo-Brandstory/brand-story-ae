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
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col">
                    <form action="<?= route('admin.pages.index') ?>" method="GET" class="d-flex gap-2">
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" name="search" class="form-control" placeholder="Search pages..." value="<?= htmlspecialchars($search ?? '') ?>">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <?php if (!empty($search)): ?>
                            <a href="<?= route('admin.pages.index') ?>" class="btn btn-outline-secondary">Clear</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
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
                                <td colspan="6" class="text-center py-4 text-muted">No pages found.</td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            $perPage = $perPage ?? 10;
                            $count = ($currentPage - 1) * $perPage + 1; 
                            foreach ($pages as $page): 
                            ?>
                                <tr>
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