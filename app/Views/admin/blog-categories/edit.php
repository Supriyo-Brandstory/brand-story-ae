<main class="container-fluid py-4">
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-pencil-square text-warning me-2"></i> 
            Edit Blog Category: <strong><?= htmlspecialchars($category['name'] ?? 'N/A') ?></strong>
        </h1>
        <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <!-- Edit Form Card -->
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h5 class="mb-0">Update Details</h5>
                </div>

                <form action="<?= route('admin.blogCategories.update', ['id' => $category['id']]) ?>" method="POST">
                    <?= csrf_token() ?>

                    <div class="card-body p-4">

                        <!-- Category Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Category Name</label>
                            <input type="text" 
                                   class="form-control form-control-lg" 
                                   id="name" 
                                   name="name" 
                                   value="<?= htmlspecialchars($category['name'] ?? '') ?>" 
                                   required>
                        </div>

                        <!-- Slug (Disabled) -->
                        <div class="mb-4">
                            <label for="slug" class="form-label fw-semibold">Slug</label>
                            <input type="text" 
                                   class="form-control form-control-lg bg-light" 
                                   id="slug" 
                                   name="slug" 
                                   value="<?= htmlspecialchars($category['slug'] ?? '') ?>" 
                                   disabled>
                            <div class="form-text text-muted">
                                Slug is automatically generated from the name.
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" 
                                      id="description" 
                                      name="description" 
                                      rows="4"><?= htmlspecialchars($category['description'] ?? '') ?></textarea>
                        </div>

                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="bi bi-check2 me-1"></i> Update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>