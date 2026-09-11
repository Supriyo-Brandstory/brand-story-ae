<main class="container-fluid py-4">

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['warning'])): ?>
        <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= htmlspecialchars($_SESSION['warning']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['warning']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-x-circle-fill me-2"></i> <?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Page Title + Action Buttons -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h1 class="h3 mb-0">
            <i class="bi bi-journal-text text-primary me-2"></i> Blog Posts
        </h1>
        <div class="btn-toolbar gap-2">
            <button type="button" class="btn btn-sm btn-danger" id="bulkDeleteBtn" style="display: none;" onclick="if(confirm('Are you sure you want to delete the selected blog posts?')) document.getElementById('bulkDeleteForm').submit();">
                <i class="bi bi-trash me-1"></i> Delete Selected
            </button>
            <a href="<?= route('admin.blogs_admin.bulk_upload') ?>" class="btn btn-outline-primary">
                <i class="bi bi-cloud-arrow-up me-1"></i> Bulk Upload
            </a>
            <a href="<?= route('admin.blogs_admin.create') ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add New Blog Post
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="<?= route('admin.blogs_admin.index') ?>" method="GET" class="row g-2">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" 
                               placeholder="Search blog title..." 
                               value="<?= htmlspecialchars($search ?? '') ?>">
                        <?php if (!empty($search)): ?>
                            <a href="<?= route('admin.blogs_admin.index') ?>" class="btn btn-outline-secondary">Clear</a>
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
            <form action="<?= route('admin.blogs_admin.bulk_destroy') ?>" method="POST" id="bulkDeleteForm">
                <?= csrf_token() ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 40px;" class="text-center">
                                    <input type="checkbox" class="form-check-input" id="selectAll">
                                </th>
                                <th style="width: 60px;">S.N.</th>
                                <th style="width: 80px;">Image</th>
                                <th style="width: 300px;">Title</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th class="text-center" style="width: 140px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($blogs)): ?>
                                <?php 
                                $snOffset = ($currentPage - 1) * $perPage;
                                foreach ($blogs as $index => $blog): 
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" name="ids[]" value="<?= $blog['id'] ?>" class="form-check-input row-checkbox">
                                        </td>
                                        <td><?= $snOffset + $index + 1 ?></td>
                                        <td>
                                            <?php if (!empty($blog['image'])): ?>
                                                <img src="<?= base_url($blog['image']) ?>" alt="Blog Image" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                            <?php else: ?>
                                                <span class="text-muted small">No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <strong><?= htmlspecialchars($blog['title']) ?></strong>
                                            <?php if (!empty($blog['is_arabic'])): ?>
                                                <span class="badge bg-success ms-1"><i class="bi bi-translate me-1"></i>Arabic</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($blog['category_name'] ?? 'N/A') ?>
                                            <?php if (!empty($blog['sub_category_name']) && $blog['sub_category_name'] !== 'N/A'): ?>
                                                <br><small class="text-muted">Sub: <?= htmlspecialchars($blog['sub_category_name']) ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td><code><?= htmlspecialchars($blog['slug']) ?></code></td>
                                        <td class="text-center" style="white-space: nowrap;">
                                            <a href="<?= base_url('blogs/' . $blog['slug']) ?>" target="_blank" class="btn btn-sm btn-outline-info" title="View Blog Live">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                            <a href="<?= route('admin.blogs_admin.edit', ['id' => $blog['id']]) ?>" 
                                               class="btn btn-sm btn-outline-warning ms-1" title="Edit Post">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <button type="button" class="btn btn-sm btn-outline-danger ms-1" title="Delete" onclick="deleteSingleBlog('<?= route('admin.blogs_admin.destroy', ['id' => $blog['id']]) ?>')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        No blog posts found.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>

            <form action="" method="POST" id="singleDeleteForm" style="display: none;">
                <?= csrf_token() ?>
            </form>
        </div>
    </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php 
                $queryParams = $_GET;
                ?>
                <!-- Previous Button -->
                <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                    <?php $queryParams['page'] = $currentPage - 1; ?>
                    <a class="page-link" href="<?= route('admin.blogs_admin.index', [], $queryParams) . '?' . http_build_query($queryParams) ?>">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>

                <!-- Page Numbers -->
                <?php 
                $range = 2;
                $showEllipsis = true;
                for ($i = 1; $i <= $totalPages; $i++):
                    if ($i == 1 || $i == $totalPages || ($i >= $currentPage - $range && $i <= $currentPage + $range)):
                        $showEllipsis = true;
                        $queryParams['page'] = $i;
                ?>
                        <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
                            <a class="page-link" href="<?= route('admin.blogs_admin.index') . '?' . http_build_query($queryParams) ?>"><?= $i ?></a>
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

                <!-- Next Button -->
                <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                    <?php $queryParams['page'] = $currentPage + 1; ?>
                    <a class="page-link" href="<?= route('admin.blogs_admin.index') . '?' . http_build_query($queryParams) ?>">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');

    function updateBulkDeleteButton() {
        let anyChecked = false;
        rowCheckboxes.forEach(cb => {
            if (cb.checked) anyChecked = true;
        });
        if (bulkDeleteBtn) {
            bulkDeleteBtn.style.display = anyChecked ? 'inline-block' : 'none';
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            rowCheckboxes.forEach(cb => {
                cb.checked = selectAll.checked;
            });
            updateBulkDeleteButton();
        });
    }

    rowCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            if (!cb.checked && selectAll) {
                selectAll.checked = false;
            }
            updateBulkDeleteButton();
        });
    });
});

function deleteSingleBlog(actionUrl) {
    if (confirm('Are you sure you want to delete this blog post?')) {
        const form = document.getElementById('singleDeleteForm');
        form.action = actionUrl;
        form.submit();
    }
}
</script>
