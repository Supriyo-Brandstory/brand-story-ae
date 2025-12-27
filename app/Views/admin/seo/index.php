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
    <div class="row mb-4 align-items-center">
        <div class="col-md-4">
            <h1 class="h3 mb-0">
                <i class="bi bi-search text-primary me-2"></i> SEO Management
            </h1>
        </div>
        <div class="col-md-5">
            <form action="<?= route('admin.seo.index') ?>" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by Page URL..." value="<?= htmlspecialchars($search ?? '') ?>">
                <button type="submit" class="btn btn-outline-primary">Search</button>
                <?php if (!empty($search)): ?>
                    <a href="<?= route('admin.seo.index') ?>" class="btn btn-outline-secondary ms-2">Clear</a>
                <?php endif; ?>
            </form>
        </div>
        <div class="col-md-3 text-end">
            <a href="<?= route('admin.seo.create') ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add New Entry
            </a>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Page URL</th>
                            <th>Meta Title</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($seoList)): ?>
                            <?php foreach ($seoList as $seo): ?>
                                <tr>
                                    <td><?= $seo['id'] ?></td>
                                    <td><code><?= htmlspecialchars($seo['page_url']) ?></code></td>
                                    <td><?= htmlspecialchars($seo['meta_title'] ?? '') ?></td>
                                    <td class="text-center">
                                        <div class=" d-flex gap-2">
                                            <a href="<?= base_url($seo['page_url']) ?>" class="btn btn-sm btn-outline-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="<?= route('admin.seo.edit', ['id' => $seo['id']]) ?>" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="<?= route('admin.seo.destroy', ['id' => $seo['id']]) ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this SEO entry?');">
                                                <?= csrf_token() ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
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

            <?php if (isset($pagination) && $pagination['last_page'] > 1): ?>
                <div class="d-flex justify-content-center border-top p-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <!-- Previous Link -->
                            <li class="page-item <?= ($pagination['current_page'] <= 1) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $pagination['current_page'] - 1 ?><?= !empty($search) ? '&search=' . urlencode($search) : '' ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
                                <li class="page-item <?= ($i == $pagination['current_page']) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?><?= !empty($search) ? '&search=' . urlencode($search) : '' ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Next Link -->
                            <li class="page-item <?= ($pagination['current_page'] >= $pagination['last_page']) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $pagination['current_page'] + 1 ?><?= !empty($search) ? '&search=' . urlencode($search) : '' ?>" aria-label="Next">
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