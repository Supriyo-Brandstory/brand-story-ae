<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blog Categories</h3>
                <div class="card-tools">
                    <a href="<?= route('admin.blogCategories.create') ?>" class="btn btn-primary btn-sm">Add New Category</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogCategories)): ?>
                            <?php foreach ($blogCategories as $category): ?>
                                <tr>
                                    <td><?= $category['id'] ?></td>
                                    <td><?= $category['name'] ?></td>
                                    <td><?= $category['slug'] ?></td>
                                    <td><?= $category['description'] ?></td>
                                    <td>
                                        <a href="<?= route('admin.blogCategories.edit', ['id' => $category['id']]) ?>" class="btn btn-info btn-sm">Edit</a>
                                        <form action="<?= route('admin.blogCategories.destroy', ['id' => $category['id']]) ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No blog categories found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
