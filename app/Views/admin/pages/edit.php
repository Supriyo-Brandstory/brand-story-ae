<main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-pencil-square text-primary me-2"></i> Edit Page: <?= htmlspecialchars($page['title']) ?>
        </h1>
        <a href="<?= route('admin.pages.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Page Details</h5>
                </div>

                <form action="<?= route('admin.pages.update', ['id' => $page['id']]) ?>" method="POST">
                    <?= csrf_token() ?>

                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label fw-semibold">Page Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($page['title']) ?>" placeholder="Enter page title" required onkeyup="generateSlug(this.value)">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label fw-semibold">URL Slug</label>
                                <div class="input-group">
                                    <span class="input-group-text"><?= base_url() ?>/</span>
                                    <input type="text" class="form-control" id="slug" name="slug" value="<?= htmlspecialchars($page['slug']) ?>" placeholder="page-url-slug" required>
                                </div>
                                <small class="text-muted">Unique identifier for the page URL.</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="template" class="form-label fw-semibold">Choose Template</label>
                                <select class="form-select" id="template" name="template" required onchange="loadTemplate(this.value)">
                                    <option value="">-- Select Template --</option>
                                    <?php foreach ($templates as $tmpl): ?>
                                        <option value="<?= htmlspecialchars($tmpl) ?>" <?= ($page['template'] === $tmpl) ? 'selected' : '' ?>><?= htmlspecialchars($tmpl) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-muted">Templates are loaded from <code>app/Views/customlayout/</code></small>
                            </div>
                            <div class="col-md-6 mb-3" id="customClassWrapper">
                                <label for="custom_class" class="form-label fw-semibold">Custom CSS Class (Optional)</label>
                                <input type="text" class="form-control" id="custom_class" name="custom_class" value="<?= htmlspecialchars($page['custom_class'] ?? '') ?>" placeholder="e.g. dm-agency-dubai">
                                <small class="text-muted">Overrides the class name defined in the template file.</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label fw-semibold">Page Content (HTML)</label>
                            <textarea class="form-control rich-text-editor" id="content" name="content" rows="15"><?= htmlspecialchars($page['content']) ?></textarea>
                        </div>
                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between py-3">
                        <a href="<?= route('admin.pages.index') ?>" class="btn btn-secondary px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-5">Update Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function generateSlug(text) {
        const slug = text.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    }

    let lastTemplate = '<?= $page['template'] ?>';

    function loadTemplate(template) {
        if (!template) return;

        // Skip confirmation for blank.php
        if (template === 'blank.php' || confirm('Choosing a template will overwrite current content. Continue?')) {
            fetch('<?= route('admin.pages.get_template_content') ?>?template=' + template)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        $('.rich-text-editor').summernote('code', data.content);
                        lastTemplate = template;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(err => {
                    console.error('Error loading template:', err);
                    alert('Error loading template content.');
                });
        } else {
            // Revert selection if user canceled
            document.getElementById('template').value = lastTemplate;
        }
    }
</script>