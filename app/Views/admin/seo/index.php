<main class="container-fluid py-4">

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Page Title + Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-search text-primary me-2"></i> SEO Management
        </h1>
        <a href="<?= route('admin.seo.create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add New Entry
        </a>
    </div>

    <!-- Search Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="<?= route('admin.seo.index') ?>" method="GET" class="row g-2">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" 
                               placeholder="Search page URL..." 
                               value="<?= htmlspecialchars($search ?? '') ?>">
                        <?php if (!empty($search)): ?>
                            <a href="<?= route('admin.seo.index') ?>" class="btn btn-outline-secondary">Clear</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">S.N.</th>
                            <th>Page URL</th>
                            <th>Meta Title</th>
                            <th class="text-center" style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($seoList)): ?>
                            <?php 
                            $snOffset = ($currentPage - 1) * $perPage;
                            foreach ($seoList as $index => $seo): 
                            ?>
                                <tr>
                                    <td><?= $snOffset + $index + 1 ?></td>
                                    <td><code><?= htmlspecialchars($seo['page_url']) ?></code></td>
                                    <td class="small"><?= htmlspecialchars($seo['meta_title'] ?? '') ?></td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <a href="<?= base_url($seo['page_url']) ?>" 
                                           class="btn btn-sm btn-outline-info" title="View Page" target="_blank">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="<?= route('admin.seo.edit', ['id' => $seo['id']]) ?>" 
                                           class="btn btn-sm btn-outline-warning" title="Edit SEO">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?= route('admin.seo.destroy', ['id' => $seo['id']]) ?>" 
                                              method="POST" 
                                              style="display:inline-block;" 
                                              onsubmit="return confirm('Are you sure you want to delete this SEO entry?');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">
                                    No SEO entries found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($totalPages > 1): ?>
                <div class="d-flex justify-content-center border-top p-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0">
                            <?php 
                            $queryParams = $_GET;
                            ?>
                            <!-- Previous Link -->
                            <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                                <?php $queryParams['page'] = $currentPage - 1; ?>
                                <a class="page-link" href="<?= '?' . http_build_query($queryParams) ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <!-- Page Numbers (Limited range) -->
                            <?php 
                            $startPage = max(1, $currentPage - 3);
                            $endPage = min($totalPages, $currentPage + 3);
                            ?>

                            <?php if ($startPage > 1): ?>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            <?php endif; ?>

                            <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                                <?php $queryParams['page'] = $i; ?>
                                <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                    <a class="page-link" href="<?= '?' . http_build_query($queryParams) ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($endPage < $totalPages): ?>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            <?php endif; ?>

                            <!-- Next Link -->
                            <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                                <?php $queryParams['page'] = $currentPage + 1; ?>
                                <a class="page-link" href="<?= '?' . http_build_query($queryParams) ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>