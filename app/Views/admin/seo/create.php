<main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-plus-circle text-primary me-2"></i> Add SEO Entry
        </h1>
        <a href="<?= route('admin.seo.index') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">SEO Details</h5>
                </div>

                <form action="<?= route('admin.seo.store') ?>" method="POST">
                    <?= csrf_token() ?>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label for="page_url" class="form-label fw-semibold">Page URL <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="page_url" name="page_url" placeholder="e.g. /about" required>
                            <div class="form-text">Relative URL starting with /</div>
                        </div>

                        <div class="mb-4">
                            <label for="meta_title" class="form-label fw-semibold">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title">
                        </div>

                        <div class="mb-4">
                            <label for="meta_description" class="form-label fw-semibold">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="other_script_or_tag" class="form-label fw-semibold">Other Scripts / Tags</label>
                            <textarea class="form-control" id="other_script_or_tag" name="other_script_or_tag" rows="5" placeholder="<script>...</script> or <meta ...>"></textarea>
                            <div class="form-text">Raw HTML to be injected into the head section. Be careful with this field.</div>
                        </div>
                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between">
                        <a href="<?= route('admin.seo.index') ?>" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>