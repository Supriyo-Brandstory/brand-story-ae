<main class="container-fluid py-4">

    <!-- Alerts -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">
            <i class="bi bi-diagram-3 text-primary me-2"></i> Sitemap Management
        </h1>
        <a href="<?= base_url('/sitemap.xml') ?>" target="_blank" class="btn btn-outline-primary">
            <i class="bi bi-box-arrow-up-right me-1"></i> View Live Sitemap
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-secondary">Sitemap XML Content</h5>
        </div>
        <div class="card-body">
            <p class="text-muted small mb-3">
                Paste your full XML sitemap content below. This content will be served directly at <code>/sitemap.xml</code>.
            </p>

            <form action="<?= route('admin.sitemap.update') ?>" method="POST">
                <?= csrf_token() ?>

                <div class="mb-3">
                    <textarea name="content" id="sitemapContent" class="form-control font-monospace" rows="18" spellcheck="false"><?= htmlspecialchars($content) ?></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>