<main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-journal-plus text-primary me-2"></i> Create New Blog Post
        </h1>
        <a href="<?= route('admin.blogs_admin.index') ?>" class="btn btn-secondary">
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

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="blog_category_id" class="form-label fw-semibold">Category</label>
                                <select class="form-select form-select-lg" id="blog_category_id" name="blog_category_id" required>
                                    <option value="">Select Category</option>
                                    <?php if (!empty($blogCategories)): ?>
                                        <?php foreach ($blogCategories as $category): ?>
                                            <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="blog_sub_category_id" class="form-label fw-semibold">Sub Category (Optional)</label>
                                <select class="form-select form-select-lg" id="blog_sub_category_id" name="blog_sub_category_id">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>
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
                        <a href="<?= route('admin.blogs_admin.index') ?>" class="btn btn-secondary">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('blog_category_id');
    const subCategorySelect = document.getElementById('blog_sub_category_id');

    categorySelect.addEventListener('change', function() {
        const categoryId = this.value;
        subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';
        
        if (categoryId) {
            fetch(`<?= route('admin.blogCategories.getSubcategories', ['id' => '']) ?>/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.id;
                        option.textContent = sub.name;
                        subCategorySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching subcategories:', error));
        }
    });
});
</script>