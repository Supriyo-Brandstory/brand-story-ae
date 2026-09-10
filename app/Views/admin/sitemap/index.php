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
        <div class="d-flex gap-2">
            <form action="<?= route('admin.sitemap.sync') ?>" method="POST" onsubmit="return confirm('Are you sure you want to sync all existing pages and blogs to the Sitemap?');" class="d-inline">
                <?= csrf_token() ?>
                <button type="submit" class="btn btn-outline-success">
                    <i class="bi bi-arrow-repeat me-1"></i> Sync All Pages to Sitemap
                </button>
            </form>
            <a href="<?= base_url('/sitemap.xml') ?>" target="_blank" class="btn btn-outline-primary">
                <i class="bi bi-box-arrow-up-right me-1"></i> View Live Sitemap
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-secondary">Sitemap XML Content</h5>
        </div>
        <div class="card-body">
            <p class="text-muted small mb-3">
                Paste your full XML sitemap content below. This content will be served directly at <code>/sitemap.xml</code>.
            </p>

            <form action="<?= route('admin.sitemap.update') ?>" method="POST" id="sitemapForm">
                <?= csrf_token() ?>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted small">XML Editor</span>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="btnFormatXml">
                        <i class="bi bi-code-square me-1"></i> Format / Beautify XML
                    </button>
                </div>

                <div class="mb-3">
                    <textarea name="content" id="sitemapContent" class="form-control font-monospace" rows="20" spellcheck="false" style="font-size: 13px; line-height: 1.5; white-space: pre; tab-size: 4;"><?= htmlspecialchars($content) ?></textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('sitemapContent');
    const btnFormat = document.getElementById('btnFormatXml');

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
                // Self-contained tag on single line like <loc>...</loc>
                indent = 0;
            } else if (node.match(/^<\/\w/)) {
                // Closing tag like </url>
                if (pad > 0) pad -= 1;
            } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
                // Opening tag like <url> or <urlset>
                indent = 1;
            }

            let padding = '    '.repeat(pad);
            formatted += padding + node + '\n';
            pad += indent;
        });

        return formatted.trim();
    }

    // Auto format if textarea is currently minified/single line
    if (textarea && textarea.value) {
        if (!textarea.value.includes('\n') || textarea.value.length > 500 && textarea.value.split('\n').length < 5) {
            textarea.value = formatAndFixSitemapXml(textarea.value);
        }
    }

    if (btnFormat && textarea) {
        btnFormat.addEventListener('click', function() {
            textarea.value = formatAndFixSitemapXml(textarea.value);
        });
    }

    const form = document.getElementById('sitemapForm');
    if (form && textarea) {
        form.addEventListener('submit', function() {
            textarea.value = formatAndFixSitemapXml(textarea.value);
        });
    }
});
</script>