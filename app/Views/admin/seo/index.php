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
                                        <a href="<?= route('admin.seo.edit', ['id' => $seo['id']]) ?>" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?= route('admin.seo.destroy', ['id' => $seo['id']]) ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this SEO entry?');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger ms-1">
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
        </div>
    </div>
</main>