<main class="container-fluid py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-tags-fill text-primary me-2"></i> Categories
        </h1>
        <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Create New</h5>
                </div>

                <form action="<?= route('admin.blogCategories.store') ?>" method="POST">
                    <?= csrf_token() ?>

                    <div class="card-body p-4">

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Category Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>

                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-secondary">
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