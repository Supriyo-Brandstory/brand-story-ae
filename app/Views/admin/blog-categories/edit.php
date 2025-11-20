<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Blog Category: <?= $category['name'] ?? 'N/A' ?></h3>
            </div>
            <form action="<?= route('admin.blogCategories.update', ['id' => $category['id']]) ?>" method="POST">
                <?= csrf_token() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $category['name'] ?? '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="<?= $category['slug'] ?? '' ?>" disabled>
                        <small class="form-text text-muted">Slug is automatically generated from the name.</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= $category['description'] ?? '' ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-default float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
