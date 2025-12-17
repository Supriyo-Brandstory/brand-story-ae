<main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-journal-plus text-primary me-2"></i> Create New Blog Post
        </h1>
        <a href="<?= route('admin.blogs.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Blog Post Details</h5>
                </div>

                <form action="<?= route('admin.blogs_admin.store') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_token() ?>

                    <div class="card-body p-4">

                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title" required>
                        </div>

                        <div class="mb-4">
                            <label for="created_at" class="form-label fw-semibold">Publish Date</label>
                            <input type="datetime-local" class="form-control form-control-lg" id="created_at" name="created_at" value="<?= date('Y-m-d\TH:i') ?>">
                        </div>

                        <div class="mb-4">
                            <label for="blog_category_id" class="form-label fw-semibold">Category</label>
                            <select class="form-control form-control-lg" id="blog_category_id" name="blog_category_id" required>
                                <option value="">Select Category</option>
                                <?php if (!empty($blogCategories)): ?>
                                    <?php foreach ($blogCategories as $category): ?>
                                        <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control rich-text-editor" id="description" name="description" rows="4"></textarea>
                        </div>

                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="<?= route('admin.blogs.index') ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            Submit
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

</main>