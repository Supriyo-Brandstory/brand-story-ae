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

    <!-- Main Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <!-- <th>Description</th> -->
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogs)): ?>
                            <?php foreach ($blogs as $blog): ?>
                                <tr>
                                    <td><?= $blog['id'] ?></td>
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
                                    <!-- <td><?= htmlspecialchars(substr($blog['description'] ?? '', 0, 50)) ?>...</td> -->
                                    <td class="text-center">
                                        <a href="<?= route('admin.blogs_admin.edit', ['id' => $blog['id']]) ?>" 
                                           class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="<?= route('admin.blogs_admin.destroy', ['id' => $blog['id']]) ?>" 
                                              method="POST" 
                                              style="display:inline-block;"
                                              onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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

</main>
