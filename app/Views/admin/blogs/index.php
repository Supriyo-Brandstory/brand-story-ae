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
            <i class="bi bi-journal-text text-primary me-2"></i> Blog Posts
        </h1>
        <a href="<?= route('admin.blogs_admin.create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add New Blog Post
        </a>
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
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">S.N.</th>
                            <th style="width: 80px;">Image</th>
                            <th style="width: 300px;">Title</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th class="text-center" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogs)): ?>
                            <?php 
                            $snOffset = ($currentPage - 1) * $perPage;
                            foreach ($blogs as $index => $blog): 
                            ?>
                                <tr>
                                    <td><?= $snOffset + $index + 1 ?></td>
                                    <td>
                                        <?php if (!empty($blog['image'])): ?>
                                            <img src="<?= base_url($blog['image']) ?>" alt="Blog Image" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                        <?php else: ?>
                                            <span class="text-muted">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($blog['title']) ?></td>
                                    <td><?= htmlspecialchars($blog['category_name'] ?? 'N/A') ?></td>
                                    <td><code><?= htmlspecialchars($blog['slug']) ?></code></td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <a href="<?= route('admin.blogs_admin.edit', ['id' => $blog['id']]) ?>" 
                                           class="btn btn-sm btn-outline-warning" title="Edit Post">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="<?= route('admin.blogs_admin.destroy', ['id' => $blog['id']]) ?>" 
                                              method="POST" 
                                              style="display:inline-block;"
                                              onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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
                                <td colspan="6" class="text-center text-muted py-5">
                                    No blog posts found.
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
                <!-- Previous Button -->
                <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                    <?php $queryParams['page'] = $currentPage - 1; ?>
                    <a class="page-link" href="<?= route('admin.blogs_admin.index', [], $queryParams) . '?' . http_build_query($queryParams) ?>">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php $queryParams['page'] = $i; ?>
                    <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
                        <a class="page-link" href="<?= route('admin.blogs_admin.index') . '?' . http_build_query($queryParams) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

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
