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
            <i class="bi bi-robot text-primary me-2"></i> Robots.txt Management
        </h1>
        <a href="<?= base_url('/robots.txt') ?>" target="_blank" class="btn btn-outline-primary">
            <i class="bi bi-box-arrow-up-right me-1"></i> View Live Robots.txt
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-secondary">Robots.txt Content</h5>
        </div>
        <div class="card-body">
            <p class="text-muted small mb-3">
                Edit your robots.txt content below. This content will be served directly at <code>/robots.txt</code>.
                <br><strong>Tip:</strong> Use this to control search engine crawlers and specify your sitemap location.
            </p>

            <form action="<?= route('admin.robots.update') ?>" method="POST">
                <?= csrf_token() ?>

                <div class="mb-3">
                    <textarea name="content" id="robotsContent" class="form-control font-monospace" rows="18" spellcheck="false" placeholder="User-agent: *&#10;Disallow: /admin/&#10;&#10;Sitemap: <?= base_url('/sitemap.xml') ?>"><?= htmlspecialchars($content) ?></textarea>
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