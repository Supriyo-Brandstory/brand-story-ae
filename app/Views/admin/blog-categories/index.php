<main class="container-fluid py-4">

    <!-- Page Title + Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-tags-fill text-primary me-2"></i> Blog Categories
        </h1>
        <a href="<?= route('admin.blogCategories.create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add New Category
        </a>
    </div>

    <!-- Search Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="<?= route('admin.blogCategories.index') ?>" method="GET" class="row g-2">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" 
                               placeholder="Search category or subcategory name..." 
                               value="<?= htmlspecialchars($search ?? '') ?>">
                        <?php if (!empty($search)): ?>
                            <a href="<?= route('admin.blogCategories.index') ?>" class="btn btn-outline-secondary">Clear</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Category</th>
                            <th>Subcategories</th>
                            <th class="text-center" style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogCategories)): ?>
                            <?php foreach ($blogCategories as $index => $category): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td class="fw-bold"><?= htmlspecialchars($category['name']) ?></td>
                                    <td>
                                        <div class="subcategory-list list-group" data-parent-id="<?= $category['id'] ?>">
                                            <?php if (!empty($category['subcategories'])): ?>
                                                <?php foreach ($category['subcategories'] as $sub): ?>
                                                    <div class="list-group-item d-flex justify-content-between align-items-center py-2 mb-1 border rounded" data-id="<?= $sub['id'] ?>">
                                                        <div class="d-flex align-items-center">
                                                            <span class="me-3"><?= htmlspecialchars($sub['name']) ?></span>
                                                        </div>
                                                        <div>
                                                            <span class="badge bg-primary drag-handle" style="cursor: move;">Drag</span>
                                                            <a href="<?= route('admin.blogCategories.edit', ['id' => $sub['id']]) ?>" class="btn btn-sm btn-link text-primary p-1 ms-2">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                            <form action="<?= route('admin.blogCategories.destroy', ['id' => $sub['id']]) ?>" method="POST" class="d-inline-block ms-1" onsubmit="return confirm('Are you sure?');">
                                                                <?= csrf_token() ?>
                                                                <button type="submit" class="btn btn-sm btn-link text-danger p-1">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <small class="text-muted">No subcategories</small>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= route('admin.blogCategories.edit', ['id' => $category['id']]) ?>" 
                                           class="btn btn-sm btn-outline-warning" title="Edit Category">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="<?= route('admin.blogCategories.destroy', ['id' => $category['id']]) ?>" 
                                              method="POST" 
                                              style="display:inline-block;"
                                              onsubmit="return confirm('Are you sure? This will fail if there are subcategories.');">
                                            <?= csrf_token() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger ms-1" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">
                                    No blog categories found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const subcategoryLists = document.querySelectorAll('.subcategory-list');
    
    subcategoryLists.forEach(function(el) {
        new Sortable(el, {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function(evt) {
                const parentId = el.getAttribute('data-parent-id');
                const items = el.querySelectorAll('.list-group-item');
                const order = Array.from(items).map(item => item.getAttribute('data-id'));
                
                updateOrder(order);
            }
        });
    });

    function updateOrder(order) {
        const formData = new FormData();
        order.forEach((id, index) => {
            formData.append(`order[${index}]`, id);
        });
        formData.append('csrf_token', '<?= csrf_token_value() ?>');

        fetch('<?= route('admin.blogCategories.updateOrder') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                console.log('Order updated');
            } else {
                alert('Failed to update order');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
</script>

<style>
.subcategory-list .list-group-item {
    background-color: #fdfdfd;
}
.drag-handle {
    user-select: none;
}
</style>
