<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blog Posts</h3>
                <div class="card-tools">
                    <a href="<?= route('admin.blogs_admin.create') ?>" class="btn btn-primary btn-sm">Add New Blog Post</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogs)): ?>
                            <?php foreach ($blogs as $blog): ?>
                                <tr>
                                    <td><?= $blog['id'] ?></td>
                                    <td><?= $blog['title'] ?></td>
                                    <td><?= $blog['category_name'] ?? 'N/A' ?></td> <!-- Assuming category name is joined or fetched -->
                                    <td><?= $blog['slug'] ?></td>
                                    <td><?= substr($blog['description'], 0, 50) ?>...</td>
                                    <td>
                                        <a href="<?= route('admin.blogs_admin.edit', ['id' => $blog['id']]) ?>" class="btn btn-info btn-sm">Edit</a>
                                        <form action="<?= route('admin.blogs_admin.destroy', ['id' => $blog['id']]) ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No blog posts found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
