<main class="container-fluid py-4">
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-pencil-square text-warning me-2"></i>
            Edit Blog Post: <strong><?= htmlspecialchars($blog['title'] ?? 'N/A') ?></strong>
        </h1>
        <a href="<?= route('admin.blogs.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <!-- Edit Form Card -->
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h5 class="mb-0">Update Blog Post Details</h5>
                </div>

                <form action="<?= route('admin.blogs_admin.update', ['id' => $blog['id']]) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_token() ?>

                    <div class="card-body p-4">

                        <!-- Blog Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input type="text"
                                class="form-control form-control-lg"
                                id="title"
                                name="title"
                                value="<?= htmlspecialchars($blog['title'] ?? '') ?>"
                                required>
                        </div>

                        <!-- Slug (Disabled) -->
                        <div class="mb-4">
                            <label for="slug" class="form-label fw-semibold">Slug</label>
                            <input type="text"
                                class="form-control form-control-lg bg-light"
                                id="slug"
                                name="slug"
                                value="<?= htmlspecialchars($blog['slug'] ?? '') ?>"
                                disabled>
                            <div class="form-text text-muted">
                                Slug is automatically generated from the title.
                            </div>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="mb-4">
                            <label for="blog_category_id" class="form-label fw-semibold">Category</label>
                            <select class="form-control form-control-lg" id="blog_category_id" name="blog_category_id" required>
                                <option value="">Select Category</option>
                                <?php if (!empty($blogCategories)): ?>
                                    <?php foreach ($blogCategories as $category): ?>
                                        <option value="<?= $category['id'] ?>" <?= (isset($blog['blog_category_id']) && $blog['blog_category_id'] == $category['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($category['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">Image</label>
                            <?php if (!empty($blog['image'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url($blog['image']) ?>" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <div class="form-text text-muted">Leave blank to keep current image.</div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control rich-text-editor"
                                id="description"
                                name="description"
                                rows="4"><?= htmlspecialchars($blog['description'] ?? '') ?></textarea>
                        </div>

                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="<?= route('admin.blogs.index') ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="bi bi-check2 me-1"></i> Update Now
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>