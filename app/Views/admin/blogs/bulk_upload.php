<div class="container-fluid py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <div>
            <h1 class="h2 mb-1">
                <i class="bi bi-cloud-arrow-up text-primary me-2"></i> Bulk Blogs Upload
            </h1>
            <p class="text-muted mb-0">Upload multiple blog articles at once via CSV or ZIP archive with full SEO, Canonical, and Schema support.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= route('admin.blogs_admin.index') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back to Blog Posts
            </a>
        </div>
    </div>

    <!-- Flash Alerts -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['warning'])): ?>
        <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= htmlspecialchars($_SESSION['warning']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['warning']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-x-circle-fill me-2"></i> <?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Bulk Upload Results Summary (if just uploaded) -->
    <?php if (!empty($bulkResults)): ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-dark fw-bold">
                    <i class="bi bi-clipboard-data text-primary me-2"></i> Upload Results Summary
                </h5>
                <span class="badge bg-secondary">Total: <?= (int)$bulkResults['total'] ?></span>
            </div>
            <div class="card-body p-4">
                <div class="row g-3 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded text-center border">
                            <div class="text-muted small text-uppercase fw-semibold">Processed</div>
                            <div class="fs-3 fw-bold text-dark"><?= (int)$bulkResults['total'] ?></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-success-subtle text-success-emphasis rounded text-center border border-success-subtle">
                            <div class="small text-uppercase fw-semibold">New Created</div>
                            <div class="fs-3 fw-bold"><?= (int)$bulkResults['created'] ?></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-info-subtle text-info-emphasis rounded text-center border border-info-subtle">
                            <div class="small text-uppercase fw-semibold">Updated</div>
                            <div class="fs-3 fw-bold"><?= (int)$bulkResults['updated'] ?></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-warning-subtle text-warning-emphasis rounded text-center border border-warning-subtle">
                            <div class="small text-uppercase fw-semibold">Skipped / Errors</div>
                            <div class="fs-3 fw-bold"><?= (int)$bulkResults['skipped'] + count($bulkResults['errors']) ?></div>
                        </div>
                    </div>
                </div>

                <?php if (!empty($bulkResults['errors'])): ?>
                    <div class="alert alert-danger mb-4">
                        <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-octagon me-1"></i> Issues & Errors Encountered:</h6>
                        <ul class="mb-0 ps-3">
                            <?php foreach ($bulkResults['errors'] as $err): ?>
                                <li><?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (!empty($bulkResults['items'])): ?>
                    <h6 class="fw-bold text-muted mb-2">Itemized Log:</h6>
                    <div class="table-responsive" style="max-height: 250px; overflow-y: auto;">
                        <table class="table table-sm table-hover border">
                            <thead class="table-light">
                                <tr>
                                    <th>Status</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bulkResults['items'] as $item): ?>
                                    <tr>
                                        <td>
                                            <?php if ($item['status'] === 'created'): ?>
                                                <span class="badge bg-success">Created</span>
                                            <?php elseif ($item['status'] === 'updated'): ?>
                                                <span class="badge bg-info text-dark">Updated</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Skipped</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($item['title'] ?? '') ?></td>
                                        <td><code><?= htmlspecialchars($item['slug'] ?? '') ?></code></td>
                                        <td><small class="text-muted"><?= htmlspecialchars($item['message'] ?? '') ?></small></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- Main Upload Form Card -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-file-earmark-arrow-up me-2"></i> Upload CSV or ZIP Package
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= route('admin.blogs_admin.process_bulk_upload') ?>" method="POST" enctype="multipart/form-data" id="bulkBlogForm">
                        <?= csrf_token() ?>

                        <!-- File Input -->
                        <div class="mb-4">
                            <label for="bulk_file" class="form-label fw-bold text-dark">
                                Select File (.CSV or .ZIP) <span class="text-danger">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="file" id="bulk_file" name="bulk_file" accept=".csv,.zip,.txt" required>
                            <div class="form-text mt-2 text-muted">
                                <i class="bi bi-info-circle me-1"></i> Upload a formatted <strong>.CSV</strong> spreadsheet or a <strong>.ZIP</strong> archive (containing HTML files or CSV + images folder).
                            </div>
                        </div>

                        <!-- Fallback Category -->
                        <div class="mb-4">
                            <label for="default_category_id" class="form-label fw-bold text-dark">
                                Fallback Category <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-lg" id="default_category_id" name="default_category_id" required>
                                <option value="">Select Default Category</option>
                                <?php if (!empty($blogCategories)): ?>
                                    <?php foreach ($blogCategories as $category): ?>
                                        <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <div class="form-text text-muted">
                                Used if a blog post does not specify its own category in the CSV or HTML file.
                            </div>
                        </div>

                        <!-- Duplicate Handling Mode -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">If Blog Slug Already Exists</label>
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="update_mode" id="mode_update" value="update_existing" checked>
                                    <label class="form-check-label" for="mode_update">
                                        <strong>Update existing blog</strong> (Overwrites content, SEO, and categories for existing slugs)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="update_mode" id="mode_new" value="create_new_slug">
                                    <label class="form-check-label" for="mode_new">
                                        <strong>Create new with numeric suffix</strong> (e.g. <code>my-blog-post-1</code>)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="update_mode" id="mode_skip" value="skip_existing">
                                    <label class="form-check-label" for="mode_skip">
                                        <strong>Skip existing</strong> (Leave existing blog untouched)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- SEO & Sitemap Options -->
                        <div class="mb-4 p-3 bg-light rounded border">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="sync_seo" name="sync_seo" value="1" checked>
                                <label class="form-check-label fw-semibold text-dark" for="sync_seo">
                                    <i class="bi bi-search text-primary me-1"></i> Auto-sync SEO Table & Canonical URLs
                                </label>
                            </div>
                            <div class="small text-muted ms-4 mb-3">
                                Automatically registers or updates Meta Title, Meta Description, Canonical Link Tag, and JSON-LD Schema markup for each blog URL (<code>/blogs/{slug}</code>).
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="sync_sitemap" name="sync_sitemap" value="1" checked>
                                <label class="form-check-label fw-semibold text-dark" for="sync_sitemap">
                                    <i class="bi bi-diagram-3 text-primary me-1"></i> Auto-add to XML Sitemap
                                </label>
                            </div>
                            <div class="small text-muted ms-4">
                                Automatically registers new blog URLs to <code>sitemap.xml</code> with standard indexing priority.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm" id="submitBtn">
                                <span class="normal-state">
                                    <i class="bi bi-cloud-upload me-2"></i> Start Bulk Upload & Process
                                </span>
                                <span class="loading-state d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                    Importing Blogs & Syncing SEO... Please wait
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Demo Files & Instructions Card -->
        <div class="col-lg-5">
            <!-- Download Demo Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-download me-2"></i> Download Demo / Sample Files
                    </h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-3">
                        Download ready-to-use sample files pre-configured with complete metadata (Title, Slug, HTML Description, SEO Meta Title, Meta Description, Canonical URL, JSON-LD Schema, Categories, Images, Arabic switch, and Dates).
                    </p>

                    <div class="d-grid gap-3 mb-3">
                        <a href="<?= route('admin.blogs_admin.demo', ['type' => 'csv']) ?>" class="btn btn-outline-success btn-lg d-flex align-items-center justify-content-between">
                            <div class="text-start">
                                <div class="fw-bold"><i class="bi bi-filetype-csv me-2"></i> Demo CSV Template</div>
                                <small class="text-muted">Pre-filled with rich sample blog rows</small>
                            </div>
                            <i class="bi bi-arrow-down-circle fs-4"></i>
                        </a>

                        <a href="<?= route('admin.blogs_admin.demo', ['type' => 'zip']) ?>" class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-between">
                            <div class="text-start">
                                <div class="fw-bold"><i class="bi bi-file-earmark-zip me-2"></i> Demo ZIP Archive Package</div>
                                <small class="text-muted">Contains CSV, Sample HTML posts & images</small>
                            </div>
                            <i class="bi bi-arrow-down-circle fs-4"></i>
                        </a>
                    </div>

                    <div class="alert alert-info py-2 px-3 mb-0 small">
                        <i class="bi bi-lightbulb-fill me-1"></i> <strong>Tip:</strong> Open the demo CSV in Microsoft Excel or Google Sheets to prepare your articles, or zip your formatted HTML files along with their images.
                    </div>
                </div>
            </div>

            <!-- Supported Metadata Reference Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light py-3 border-bottom">
                    <h6 class="mb-0 fw-bold text-dark">
                        <i class="bi bi-card-checklist text-primary me-2"></i> Supported Fields & Meta Tags
                    </h6>
                </div>
                <div class="card-body p-3 small">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Field / Column</th>
                                    <th>Required?</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>title</code></td>
                                    <td><span class="badge bg-danger">Required</span></td>
                                    <td>Blog title / heading</td>
                                </tr>
                                <tr>
                                    <td><code>slug</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>URL slug (auto-generated if empty)</td>
                                </tr>
                                <tr>
                                    <td><code>category</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>Category name or ID (auto-created if new)</td>
                                </tr>
                                <tr>
                                    <td><code>subcategory</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>Subcategory name or ID</td>
                                </tr>
                                <tr>
                                    <td><code>description</code></td>
                                    <td><span class="badge bg-danger">Required</span></td>
                                    <td>Full HTML body content / article text</td>
                                </tr>
                                <tr>
                                    <td><code>meta_title</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>SEO Title tag (defaults to Title | BrandStory)</td>
                                </tr>
                                <tr>
                                    <td><code>meta_description</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>SEO Meta description tag</td>
                                </tr>
                                <tr>
                                    <td><code>canonical_url</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>Full canonical link (e.g. <code>https://brandstory.ae/blogs/slug/</code>)</td>
                                </tr>
                                <tr>
                                    <td><code>other_script_or_tag</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>JSON-LD Schema, OG tags, or custom head tags</td>
                                </tr>
                                <tr>
                                    <td><code>image</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>Featured image filename in ZIP or relative path</td>
                                </tr>
                                <tr>
                                    <td><code>is_arabic</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td><code>1</code> for Arabic RTL layout, <code>0</code> for English</td>
                                </tr>
                                <tr>
                                    <td><code>created_at</code></td>
                                    <td><span class="badge bg-secondary">Optional</span></td>
                                    <td>Publish date (<code>YYYY-MM-DD HH:MM:SS</code>)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('bulkBlogForm').addEventListener('submit', function() {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.querySelector('.normal-state').classList.add('d-none');
    btn.querySelector('.loading-state').classList.remove('d-none');
});
</script>
