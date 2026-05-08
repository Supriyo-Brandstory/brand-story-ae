<main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-tags-fill text-warning me-2"></i> Edit Category
        </h1>
        <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h5 class="mb-0">Edit: <?= htmlspecialchars($category['name']) ?></h5>
                </div>

                <form action="<?= route('admin.blogCategories.update', ['id' => $category['id']]) ?>" method="POST">
                    <?= csrf_token() ?>

                    <div class="card-body p-4">

                        <div class="mb-4">
                            <label for="parent_id" class="form-label fw-semibold">Parent Category (Optional)</label>
                            <select class="form-select form-select-lg" id="parent_id" name="parent_id">
                                <option value="">None (Make this a Main Category)</option>
                                <?php if (!empty($mainCategories)): ?>
                                    <?php foreach ($mainCategories as $cat): ?>
                                        <option value="<?= $cat['id'] ?>" <?= ($category['parent_id'] == $cat['id']) ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Category Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"><?= htmlspecialchars($category['description'] ?? '') ?></textarea>
                        </div>

                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-warning px-4">
                            Update
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

</main>