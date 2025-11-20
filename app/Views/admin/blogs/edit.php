<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Blog Post: <?= $blog['title'] ?? 'N/A' ?></h3>
            </div>
            <form action="<?= route('admin.blogs_admin.update', ['id' => $blog['id']]) ?>" method="POST">
                <?= csrf_token() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $blog['title'] ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="<?= $blog['slug'] ?? '' ?>" disabled>
                        <small class="form-text text-muted">Slug is automatically generated from the title.</small>
                    </div>
                    <div class="form-group">
                        <label for="blog_category_id">Category</label>
                        <select class="form-control" id="blog_category_id" name="blog_category_id" required>
                            <option value="">Select Category</option>
                            <?php if (!empty($blogCategories)): ?>
                                <?php foreach ($blogCategories as $category): ?>
                                    <option value="<?= $category['id'] ?>" <?= (isset($blog['blog_category_id']) && $blog['blog_category_id'] == $category['id']) ? 'selected' : '' ?>>
                                        <?= $category['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required><?= $blog['description'] ?? '' ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= route('admin.blogs_admin.index') ?>" class="btn btn-default float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
