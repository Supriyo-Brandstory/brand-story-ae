<main class="container-fluid py-4">

    <!-- Alerts -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1">
                <i class="bi bi-diagram-3-fill text-primary me-2"></i> XML Sitemap Management
            </h1>
            <p class="text-muted small mb-0">
                Split architecture: <strong>Pages Sitemap</strong> &amp; <strong>Blog Sitemap</strong> unified under one <strong>Main Sitemap Index</strong>.
            </p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <div class="btn-group">
                <form action="<?= route('admin.sitemap.sync') ?>" method="POST" onsubmit="return confirm('Sync both Pages and Blogs sitemaps from the database?');" class="d-inline">
                    <?= csrf_token() ?>
                    <button type="submit" class="btn btn-outline-success">
                        <i class="bi bi-arrow-repeat me-1"></i> Sync All Sitemaps
                    </button>
                </form>
            </div>
            <a href="<?= base_url('/sitemap.xml') ?>" target="_blank" class="btn btn-primary">
                <i class="bi bi-box-arrow-up-right me-1"></i> View Live Sitemap Index
            </a>
        </div>
    </div>

    <!-- Sitemap Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 bg-light">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-semibold text-uppercase">Main Sitemap Index</span>
                            <h5 class="mb-0 text-dark mt-1">2 Connected Sitemaps</h5>
                            <a href="<?= base_url('/sitemap.xml') ?>" target="_blank" class="small text-primary text-decoration-none">
                                <code>/sitemap.xml</code> <i class="bi bi-arrow-up-right-square"></i>
                            </a>
                        </div>
                        <div class="badge bg-primary bg-opacity-10 text-primary p-3 rounded-circle fs-4">
                            <i class="bi bi-folder-symlink"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 bg-light">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-semibold text-uppercase">Pages Sitemap</span>
                            <h5 class="mb-0 text-dark mt-1"><?= number_format($pagesCount) ?> URLs</h5>
                            <a href="<?= base_url('/page-sitemap.xml') ?>" target="_blank" class="small text-success text-decoration-none">
                                <code>/page-sitemap.xml</code> <i class="bi bi-arrow-up-right-square"></i>
                            </a>
                        </div>
                        <div class="badge bg-success bg-opacity-10 text-success p-3 rounded-circle fs-4">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 bg-light">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-semibold text-uppercase">Blog Sitemap</span>
                            <h5 class="mb-0 text-dark mt-1"><?= number_format($blogsCount) ?> URLs</h5>
                            <a href="<?= base_url('/blog-sitemap.xml') ?>" target="_blank" class="small text-info text-decoration-none">
                                <code>/blog-sitemap.xml</code> <i class="bi bi-arrow-up-right-square"></i>
                            </a>
                        </div>
                        <div class="badge bg-info bg-opacity-10 text-info p-3 rounded-circle fs-4">
                            <i class="bi bi-journal-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs nav-fill mb-3 bg-white rounded-top shadow-sm border-0 p-2" id="sitemapTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link py-3 fw-semibold <?= $activeTab === 'pages' ? 'active' : '' ?>" id="pages-tab" data-bs-toggle="tab" data-bs-target="#pages-content" type="button" role="tab" aria-controls="pages-content" aria-selected="<?= $activeTab === 'pages' ? 'true' : 'false' ?>">
                <i class="bi bi-file-earmark-code text-success me-2"></i> Pages Sitemap 
                <span class="badge bg-success bg-opacity-10 text-success ms-2"><?= $pagesCount ?> URLs</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link py-3 fw-semibold <?= $activeTab === 'blogs' ? 'active' : '' ?>" id="blogs-tab" data-bs-toggle="tab" data-bs-target="#blogs-content" type="button" role="tab" aria-controls="blogs-content" aria-selected="<?= $activeTab === 'blogs' ? 'true' : 'false' ?>">
                <i class="bi bi-journal-code text-info me-2"></i> Blog Sitemap 
                <span class="badge bg-info bg-opacity-10 text-info ms-2"><?= $blogsCount ?> URLs</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link py-3 fw-semibold <?= $activeTab === 'index' ? 'active' : '' ?>" id="index-tab" data-bs-toggle="tab" data-bs-target="#index-content" type="button" role="tab" aria-controls="index-content" aria-selected="<?= $activeTab === 'index' ? 'true' : 'false' ?>">
                <i class="bi bi-diagram-2 text-primary me-2"></i> Sitemap Index Preview
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content" id="sitemapTabContent">

        <!-- TAB 1: Pages Sitemap -->
        <div class="tab-pane fade <?= $activeTab === 'pages' ? 'show active' : '' ?>" id="pages-content" role="tabpanel" aria-labelledby="pages-tab">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h5 class="mb-0 text-dark">
                            <i class="bi bi-file-earmark-text text-success me-1"></i> Pages Sitemap Content
                        </h5>
                        <small class="text-muted">Served live at <a href="<?= base_url('/page-sitemap.xml') ?>" target="_blank" class="text-primary fw-medium"><code>/page-sitemap.xml</code></a></small>
                    </div>
                    <div class="d-flex gap-2">
                        <form action="<?= route('admin.sitemap.sync_pages') ?>" method="POST" onsubmit="return confirm('Sync all database pages into the Pages Sitemap?');" class="d-inline">
                            <?= csrf_token() ?>
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                <i class="bi bi-arrow-repeat me-1"></i> Sync Pages
                            </button>
                        </form>
                        <button type="button" class="btn btn-sm btn-outline-secondary btnFormatXml" data-target="pagesTextarea">
                            <i class="bi bi-code-square me-1"></i> Format XML
                        </button>
                        <a href="<?= base_url('/page-sitemap.xml') ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-box-arrow-up-right me-1"></i> View Live
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= route('admin.sitemap.update') ?>" method="POST" class="sitemapForm">
                        <?= csrf_token() ?>
                        <input type="hidden" name="type" value="pages">

                        <div class="mb-3">
                            <textarea name="content" id="pagesTextarea" class="form-control font-monospace xml-editor" rows="20" spellcheck="false" style="font-size: 13px; line-height: 1.5; white-space: pre; tab-size: 4;"><?= htmlspecialchars($pagesContent) ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="bi bi-info-circle me-1"></i> All URLs are automatically normalized with proper trailing slashes upon save.
                            </span>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-save me-1"></i> Save Pages Sitemap
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- TAB 2: Blog Sitemap -->
        <div class="tab-pane fade <?= $activeTab === 'blogs' ? 'show active' : '' ?>" id="blogs-content" role="tabpanel" aria-labelledby="blogs-tab">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h5 class="mb-0 text-dark">
                            <i class="bi bi-journal-text text-info me-1"></i> Blog Sitemap Content
                        </h5>
                        <small class="text-muted">Served live at <a href="<?= base_url('/blog-sitemap.xml') ?>" target="_blank" class="text-primary fw-medium"><code>/blog-sitemap.xml</code></a></small>
                    </div>
                    <div class="d-flex gap-2">
                        <form action="<?= route('admin.sitemap.sync_blogs') ?>" method="POST" onsubmit="return confirm('Sync all database blog posts into the Blog Sitemap?');" class="d-inline">
                            <?= csrf_token() ?>
                            <button type="submit" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-arrow-repeat me-1"></i> Sync Blogs
                            </button>
                        </form>
                        <button type="button" class="btn btn-sm btn-outline-secondary btnFormatXml" data-target="blogsTextarea">
                            <i class="bi bi-code-square me-1"></i> Format XML
                        </button>
                        <a href="<?= base_url('/blog-sitemap.xml') ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-box-arrow-up-right me-1"></i> View Live
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= route('admin.sitemap.update') ?>" method="POST" class="sitemapForm">
                        <?= csrf_token() ?>
                        <input type="hidden" name="type" value="blogs">

                        <div class="mb-3">
                            <textarea name="content" id="blogsTextarea" class="form-control font-monospace xml-editor" rows="20" spellcheck="false" style="font-size: 13px; line-height: 1.5; white-space: pre; tab-size: 4;"><?= htmlspecialchars($blogsContent) ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="bi bi-info-circle me-1"></i> All blog post URLs are formatted as <code>https://brandstory.ae/blog/{slug}/</code>.
                            </span>
                            <button type="submit" class="btn btn-info text-white px-4">
                                <i class="bi bi-save me-1"></i> Save Blog Sitemap
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- TAB 3: Sitemap Index Preview -->
        <div class="tab-pane fade <?= $activeTab === 'index' ? 'show active' : '' ?>" id="index-content" role="tabpanel" aria-labelledby="index-tab">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h5 class="mb-0 text-dark">
                            <i class="bi bi-diagram-3 text-primary me-1"></i> Main Sitemap Index (<code>/sitemap.xml</code>)
                        </h5>
                        <small class="text-muted">Dynamically connects the sub-sitemaps together for Google Search Console and search crawlers.</small>
                    </div>
                    <a href="<?= base_url('/sitemap.xml') ?>" target="_blank" class="btn btn-sm btn-primary">
                        <i class="bi bi-box-arrow-up-right me-1"></i> View Live Index XML
                    </a>
                </div>
                <div class="card-body">
                    <div class="alert alert-primary d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-info-circle-fill fs-5"></i>
                        <div>
                            This Sitemap Index file is automatically compiled. Submit <code><?= base_url('/sitemap.xml') ?></code> to <strong>Google Search Console</strong> and <strong>Bing Webmaster Tools</strong>.
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea readonly class="form-control font-monospace bg-light" rows="12" style="font-size: 13px; line-height: 1.5; white-space: pre; tab-size: 4;"><?= htmlspecialchars($indexContent) ?></textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {

    function formatAndFixSitemapXml(xml) {
        if (!xml || !xml.trim()) return xml;
        
        // 1. Ensure all <loc> URLs have trailing slash (except files like .xml, .pdf, .jpg)
        xml = xml.replace(/<loc>(https?:\/\/[^<]+)<\/loc>/gi, function(match, url) {
            url = url.trim();
            try {
                const parsed = new URL(url);
                if (!parsed.pathname.match(/\.[a-zA-Z0-9]{2,5}$/)) {
                    if (!parsed.pathname.endsWith('/')) {
                        parsed.pathname = parsed.pathname + '/';
                    }
                    return '<loc>' + parsed.toString() + '</loc>';
                }
            } catch (e) {
                if (!url.match(/\.[a-zA-Z0-9]{2,5}$/) && !url.endsWith('/')) {
                    return '<loc>' + url + '/</loc>';
                }
            }
            return '<loc>' + url + '</loc>';
        });

        // 2. Format with clean indentation and newlines
        let formatted = '';
        let reg = /(>)(<)(\/*)/g;
        let cleanXml = xml.replace(/(\r\n|\n|\r)/gm, ' ').replace(/\s+/g, ' ').replace(reg, '$1\r\n$2$3');
        let pad = 0;
        
        cleanXml.split('\r\n').forEach(function(node) {
            node = node.trim();
            if (!node) return;
            
            let indent = 0;
            if (node.match(/^<\?xml/i) || node.match(/^<!/)) {
                indent = 0;
            } else if (node.match(/.+<\/\w[^>]*>$/)) {
                indent = 0;
            } else if (node.match(/^<\/\w/)) {
                if (pad > 0) pad -= 1;
            } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
                indent = 1;
            }

            let padding = '    '.repeat(pad);
            formatted += padding + node + '\n';
            pad += indent;
        });

        return formatted.trim();
    }

    // Bind Format buttons
    document.querySelectorAll('.btnFormatXml').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const targetId = btn.getAttribute('data-target');
            const textarea = document.getElementById(targetId);
            if (textarea) {
                textarea.value = formatAndFixSitemapXml(textarea.value);
            }
        });
    });

    // Format before submitting form
    document.querySelectorAll('.sitemapForm').forEach(function(form) {
        form.addEventListener('submit', function() {
            const textarea = form.querySelector('textarea');
            if (textarea) {
                textarea.value = formatAndFixSitemapXml(textarea.value);
            }
        });
    });
});
</script>