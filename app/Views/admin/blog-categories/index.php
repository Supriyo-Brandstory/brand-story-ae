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
            <i class="bi bi-tags-fill text-primary me-2"></i> Blog Categories
        </h1>
        <a href="<?= route('admin.blogCategories.create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add New Category
        </a>
    </div>

    <!-- Search Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="<?= route('admin.blogCategories.index') ?>" method="GET" class="row g-2">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" 
                               placeholder="Search category name..." 
                               value="<?= htmlspecialchars($search ?? '') ?>">
                        <?php if (!empty($search)): ?>
                            <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-outline-secondary">Clear</a>
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th class="text-center" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogCategories)): ?>
                            <?php 
                            $snOffset = ($currentPage - 1) * $perPage;
                            foreach ($blogCategories as $index => $category): 
                            ?>
                                <tr>
                                    <td><?= $snOffset + $index + 1 ?></td>
                                    <td><?= htmlspecialchars($category['name']) ?></td>
                                    <td><code><?= htmlspecialchars($category['slug']) ?></code></td>
                                    <td><?= htmlspecialchars($category['description'] ?? '') ?></td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <a href="<?= route('admin.blogCategories.edit', ['id' => $category['id']]) ?>" 
                                           class="btn btn-sm btn-outline-warning" title="Edit Category">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="<?= route('admin.blogCategories.destroy', ['id' => $category['id']]) ?>" 
                                              method="POST" 
                                              style="display:inline-block;"
                                              onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger ms-1" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    No blog categories found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php 
                $queryParams = $_GET;
                ?>
                <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                    <?php $queryParams['page'] = $currentPage - 1; ?>
                    <a class="page-link" href="<?= route('admin.blogCategories.index') . '?' . http_build_query($queryParams) ?>">
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
                            <a class="page-link" href="<?= route('admin.blogCategories.index') . '?' . http_build_query($queryParams) ?>"><?= $i ?></a>
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
                    <?php $queryParams['page'] = $currentPage + 1; ?>
                    <a class="page-link" href="<?= route('admin.blogCategories.index') . '?' . http_build_query($queryParams) ?>">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>

</main>
