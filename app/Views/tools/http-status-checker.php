<style>
    .status-checker-wrapper {
        padding: 0;
        background: #ffffff;
        color: #333;
    }

    .status-checker-sp-section {
        padding: 80px 0;
    }

    .status-checker-bg-light-gray {
        background: #fbfbfb;
    }

    /* Banner Section (Dark Mode) - Moved to style.css */

    /* Tool Card (Glassmorphism) */
    .status-checker-tool-main-card {
        background: rgba(255, 255, 255, 0.02);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 40px;
        padding: 50px;
        position: relative;
        z-index: 10;
        box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.5);
    }

    .status-checker-input-group-premium {
        position: relative;
        display: flex;
        gap: 12px;
        background: rgba(255, 255, 255, 0.05);
        padding: 8px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .status-checker-input-group-premium:focus-within {
        border-color: #e83a26;
        background: rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 20px rgba(232, 58, 38, 0.2);
    }

    .status-checker-input-group-premium input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 12px 20px;
        font-size: 18px;
        outline: none;
        color: #fff;
        font-family: inherit;
        margin: 0;
    }

    .status-checker-btn-check-status {
        background: #111;
        color: #fff;
        border: none;
        padding: 12px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-checker-btn-check-status:hover {
        background: #e83a26;
        transform: translateY(-2px);
    }

    .status-checker-btn-check-status:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        background: #666;
    }

    /* Mode Selector */
    .status-checker-mode-selector {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 25px;
    }

    .status-checker-mode-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 24px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.7);
        transition: all 0.3s ease;
    }

    .status-checker-mode-btn:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .status-checker-mode-btn.active {
        background: linear-gradient(135deg, #e83a26 0%, #c0271a 100%);
        color: #fff;
        border: none;
        box-shadow: 0 4px 15px rgba(232, 58, 38, 0.3);
    }

    .status-checker-input-panel {
        display: none;
    }

    .status-checker-input-panel.active {
        display: block;
    }

    .status-checker-textarea-premium {
        width: 100%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 24px;
        font-size: 16px;
        outline: none;
        color: #fff;
        transition: all 0.3s ease;
        min-height: 180px;
        resize: vertical;
        font-family: 'Inter', monospace;
    }

    .status-checker-textarea-premium:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: #e83a26;
        box-shadow: 0 0 20px rgba(232, 58, 38, 0.2);
    }

    .status-checker-progress-bar-container {
        display: none;
        margin: 20px 0;
        background: #eee;
        height: 8px;
        border-radius: 10px;
        overflow: hidden;
    }

    .status-checker-progress-bar-fill {
        background: #e83a26;
        height: 100%;
        width: 0%;
        transition: width 0.3s ease;
    }

    /* Results UI - New Table Design */
    .status-checker-results-wrapper {
        margin-top: 50px;
        display: none;
        /* Shown via JS */
        animation: statusCheckerFadeInUp 0.5s ease forwards;
        /* max-width: 1200px; */
        margin-left: auto;
        margin-right: auto;
    }

    @keyframes statusCheckerFadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .status-checker-table-container {
        background: #f8f9fb;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .status-checker-table-header {
        display: grid;
        grid-template-columns: 60px 1fr 160px 100px 120px 80px;
        padding: 20px 24px;
        background: #111;
        color: #fff;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 20;
    }

    .status-checker-results-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 8px;
    }

    .status-checker-result-row {
        display: grid;
        grid-template-columns: 60px 1fr 160px 100px 120px 80px;
        padding: 18px 24px;
        align-items: center;
        cursor: pointer;
    }

    .status-checker-result-row-wrapper {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 8px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .status-checker-result-row-wrapper:hover {
        border-color: #e83a26;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .status-checker-url-cell {
        font-weight: 500;
        color: #111;
        word-break: break-all;
        padding-right: 20px;
        font-size: 14px;
    }

    .status-checker-badges-cell {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        align-items: center;
        justify-content: center;
    }

    .status-badge {
        font-size: 12px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 6px;
        color: #fff;
        min-width: 44px;
        text-align: center;
        display: inline-block;
    }

    .status-badge-2xx {
        background: #66bb6a;
    }

    /* Green */
    .status-badge-3xx {
        background: #42a5f5;
    }

    /* Blue */
    .status-badge-4xx {
        background: #ef5350;
    }

    /* Red */
    .status-badge-5xx {
        background: #ffa726;
    }

    /* Orange */

    .status-checker-redirect-count {
        font-weight: 600;
        color: #666;
        background: #f0f0f5;
        padding: 2px 10px;
        border-radius: 6px;
        font-size: 13px;
    }

    .status-checker-duration {
        color: #666;
        font-size: 14px;
        font-weight: 500;
    }

    .status-checker-details-toggle {
        color: #e83a26;
        font-size: 18px;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        width: 32px;
        height: 32px;
        align-items: center;
        border-radius: 50%;
        background: #fdf2f1;
        margin: 0 auto;
    }

    .status-checker-result-row-wrapper.expanded .status-checker-details-toggle {
        transform: rotate(180deg);
    }

    /* Details Panel */
    .status-checker-details-panel {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0, 1, 0, 1);
        background: #fdfdfe;
        border-top: 1px solid #f0f0f0;
    }

    .status-checker-result-row-wrapper.expanded .status-checker-details-panel {
        max-height: 1000px;
        transition: max-height 0.4s ease-in;
    }

    .status-checker-details-content {
        padding: 24px;
    }

    .status-checker-detail-section {
        margin-bottom: 24px;
    }

    .status-checker-detail-section h5 {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #111;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-checker-header-grid {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 8px 16px;
        font-size: 13px;
        background: #fff;
        padding: 16px;
        border-radius: 12px;
        border: 1px solid #eee;
    }

    .status-checker-header-key {
        font-weight: 600;
        color: #666;
        text-align: left;
    }

    .status-checker-header-val {
        color: #111;
        word-break: break-all;
        text-align: left;
    }

    /* Redirect Chain in details */
    .status-checker-mini-chain {
        list-style: none;
        padding: 0;
        margin: 0;

    }

    .status-checker-mini-chain-item {
        display: flex;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px dashed #eee;
    }

    .status-checker-mini-chain-item:last-child {
        border-bottom: none;
    }

    .status-checker-chain-step {
        font-weight: 700;
        color: #e83a26;
        min-width: 20px;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .status-checker-table-header {
            display: none;
        }

        .status-checker-result-row {
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .status-checker-url-cell {
            grid-column: span 2;
        }
    }

    /* Educational Section */
    .status-checker-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    .status-checker-info-card {
        padding: 32px;
        background: #fff;
        border-radius: 20px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .status-checker-info-card:hover {
        border-color: #e83a26;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .status-checker-info-icon {
        width: 50px;
        height: 50px;
        background: rgba(232, 58, 38, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #e83a26;
    }

    .status-checker-info-card h4 {
        font-weight: 700;
        margin-bottom: 16px;
    }

    .status-checker-info-card p {
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    /* Accordion Light Mode */
    .accordion-item {
        background: #fff !important;
        border: 1px solid #eee !important;
    }

    .accordion-button {
        background: transparent !important;
        color: #111 !important;
        box-shadow: none !important;
    }

    .accordion-button:not(.collapsed) {
        color: #e83a26 !important;
    }

    .accordion-button::after {
        filter: none;
    }

    .accordion-body {
        color: #666;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .status-checker-input-group-premium {
            flex-direction: column;
        }

        .status-checker-btn-check-status {
            width: 100%;
        }

        .status-checker-table-header {
            display: none;
        }

        .status-checker-result-row {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .status-checker-tool-main-card {

            border-radius: 15px;
            padding: 20px;
        }
    }
</style>

<div class="status-checker-wrapper">
    <!-- Section 1: Hero Header (Premium Dark) -->
    <section class="tools-hero-section">
        <div class="tools-glow-blob-1"></div>
        <div class="tools-glow-blob-2"></div>
        <div class="tools-grid-overlay"></div>

        <div class="container position-relative z-1">
            <div class="badge bg-danger bg-opacity-25 text-white px-4 py-2 rounded-pill mb-4 border border-danger border-opacity-25 fw-600">Protocol Engine</div>
            <h1>Easily check <span>status codes</span>, headers, and chains.</h1>
            <p>Instantly analyze server responses for single URLs, bulk lists, or XML sitemaps. Ported with precision technical crawling infrastructure.</p>

            <div class="status-checker-tool-card-container">
                <div class="status-checker-tool-main-card">
                    <div class="status-checker-mode-selector">
                        <button type="button" class="status-checker-mode-btn active" onclick="switchMode('single')">Single URL</button>
                        <button type="button" class="status-checker-mode-btn" onclick="switchMode('bulk')">Bulk URLs</button>
                        <button type="button" class="status-checker-mode-btn" onclick="switchMode('sitemap')">XML Sitemap</button>
                    </div>

                    <form id="checkerForm" onsubmit="handleCheck(event)">
                        <!-- Single URL Panel -->
                        <div id="singlePanel" class="status-checker-input-panel active">
                            <div class="status-checker-input-group-premium">
                                <input type="url" id="targetUrl" placeholder="Enter URL (e.g., https://google.com)">
                                <button type="submit" class="status-checker-btn-check-status" id="submitBtnSingle">
                                    <span>Check Status</span>
                                    <i class="ion-android-arrow-forward"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Bulk Panel -->
                        <div id="bulkPanel" class="status-checker-input-panel">
                            <textarea id="bulkUrls" class="status-checker-textarea-premium mb-3" placeholder="Enter URLs, one per line (max 50)"></textarea>
                            <button type="submit" class="status-checker-btn-check-status mx-auto" id="submitBtnBulk">
                                <span>Check All Status</span>
                                <i class="ion-android-arrow-forward"></i>
                            </button>
                        </div>

                        <!-- Sitemap Panel -->
                        <div id="sitemapPanel" class="status-checker-input-panel">
                            <div class="status-checker-input-group-premium">
                                <input type="url" id="sitemapUrl" placeholder="Enter Sitemap URL (e.g., https://example.com/sitemap.xml)">
                                <button type="submit" class="status-checker-btn-check-status" id="submitBtnSitemap">
                                    <span>Fetch & Check</span>
                                    <i class="ion-android-arrow-forward"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div id="progressContainer" class="status-checker-progress-bar-container">
                        <div id="progressBar" class="status-checker-progress-bar-fill"></div>
                    </div>

                    <!-- Results Section (Initially Hidden) -->
                    <div id="resultsArea" class="status-checker-results-wrapper">
                        <div class="status-checker-results-header d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-800 m-0 fs-24">Analysis <span class="text-danger">Results</span></h3>
                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3" onclick="clearResults()">
                                <i class="ion-trash-a me-1"></i> Clear Results
                            </button>
                        </div>
                        <div class="status-checker-table-container">
                            <div class="status-checker-table-header">
                                <div class="text-center">#</div>
                                <div>URLs</div>
                                <div class="text-center">Status Codes</div>
                                <div class="text-center">Redirects</div>
                                <div class="text-center">Duration (s)</div>
                                <div class="text-center">Details</div>
                            </div>
                            <div id="resultsList" class="status-checker-results-list">
                                <!-- Dynamic Rows Go Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>

<!-- Section 2: How It Works -->
<section class="status-checker-sp-section status-checker-bg-light-gray text-center">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-800 text-dark">How Our Status Checker Works</h2>
            <p class="text-muted max-w-700 mx-auto">We use precision-engineered crawling technology to verify your server's health in real-time.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="status-checker-info-card p-5 h-100">
                    <div class="fs-48 mb-4 text-danger fw-800 opacity-25">01</div>
                    <h4 class="fw-700 mb-3">Input URLs</h4>
                    <p class="text-muted">Enter a single link, paste a bulk list, or provide an XML sitemap for batch analysis.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="status-checker-info-card p-5 h-100">
                    <div class="fs-48 mb-4 text-danger fw-800 opacity-25">02</div>
                    <h4 class="fw-700 mb-3">Head Analysis</h4>
                    <p class="text-muted">Our engine performs high-speed HEAD requests to fetch headers and trace redirect chains.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="status-checker-info-card p-5 h-100">
                    <div class="fs-48 mb-4 text-danger fw-800 opacity-25">03</div>
                    <h4 class="fw-700 mb-3">Instant Insights</h4>
                    <p class="text-muted">View precise status codes, duration, and full header data in a structured, filterable list.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Benefits -->
<section class="status-checker-sp-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-800 text-dark">Why Professional URL Auditing Matters</h2>
            <p class="text-muted max-w-700 mx-auto fs-18">Every millisecond and status code impacts your site's conversion and search performance.</p>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="status-checker-info-card p-4 shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-ios-navigate-outline fs-48 text-danger"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">Redirect Efficiency</h5>
                    <p class="text-muted fs-14 line-h-1-6">Eliminate 301/302 chains that leak SEO authority and frustrate mobile users with slow load times.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="status-checker-info-card p-4 shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-ios-speedometer-outline fs-48 text-danger"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">Crawl Budget Safety</h5>
                    <p class="text-muted fs-14 line-h-1-6">Detect 404 and 5xx errors early to ensure Googlebot spent its time indexing high-value content.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="status-checker-info-card p-4 shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-ios-locked-outline fs-48 text-danger"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">Security Auditing</h5>
                    <p class="text-muted fs-14 line-h-1-6">Verify essential security headers are present to protect your users from cross-site scripting attacks.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="status-checker-info-card p-4 shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-ios-pulse fs-48 text-danger"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">Server Health</h5>
                    <p class="text-muted fs-14 line-h-1-6">Monitor Time-to-First-Byte (TTFB) across your site to ensure consistent backend performance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Trusted By -->
<section class="sp-50 bg-light">
    <div class="container">
        <h2 class="text-center text-dark mb-5 fw-800">Powering Leading Site Audits</h2>
        <?php include __DIR__ . '/../component/services/clients.php' ?>
    </div>
</section>

<!-- Section 5: FAQ -->
<section class="status-checker-sp-section status-checker-bg-light-gray">
    <div class="container">
        <h2 class="text-center mb-5 fw-800">Frequently Asked Questions</h2>
        <div class="accordion max-w-800 mx-auto" id="faqAccordion">

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#q1">
                        What is a redirect chain?
                    </button>
                </h2>
                <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        A redirect chain occurs when there is more than one redirect between the initial URL and the destination URL. For example, Page A redirects to Page B, which then redirects to Page C. This should be avoided for better SEO.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#q2">
                        How does a 404 error affect my SEO?
                    </button>
                </h2>
                <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        404 errors signify that a page no longer exists. While a few are normal, too many broken links can hurt user experience and lead search engines to believe your site is poorly maintained.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#q3">
                        Why do I need to check response headers?
                    </button>
                </h2>
                <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Response headers contain valuable metadata like the type of server, cache settings, and security instructions. Auditing them ensures your server is configured securely and efficiently.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</div>

<script>
    let currentMode = 'single';
    let resultCounter = 0;

    function switchMode(mode) {
        currentMode = mode;
        // Buttons
        document.querySelectorAll('.status-checker-mode-btn').forEach(btn => {
            btn.classList.remove('active');
            if (btn.innerText.toLowerCase().includes(mode)) btn.classList.add('active');
        });
        // Panels
        document.querySelectorAll('.status-checker-input-panel').forEach(p => p.classList.remove('active'));
        document.getElementById(mode + 'Panel').classList.add('active');
    }

    async function handleCheck(event) {
        event.preventDefault();
        const resultsArea = document.getElementById('resultsArea');
        const resultsList = document.getElementById('resultsList');
        const progressContainer = document.getElementById('progressContainer');
        const progressBar = document.getElementById('progressBar');

        let urls = [];

        if (currentMode === 'single') {
            const val = document.getElementById('targetUrl').value.trim();
            if (!val) return;
            urls = [val];
        } else if (currentMode === 'bulk') {
            const val = document.getElementById('bulkUrls').value.trim();
            if (!val) return;
            urls = val.split('\n').map(u => u.trim()).filter(u => u.length > 0);
        } else if (currentMode === 'sitemap') {
            const sUrl = document.getElementById('sitemapUrl').value.trim();
            if (!sUrl) return;

            setLoading(true);
            try {
                const response = await fetch('<?= route('http-status-checker.fetch-sitemap') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `sitemap_url=${encodeURIComponent(sUrl)}`
                });
                const data = await response.json();
                if (data.error) throw new Error(data.error);
                urls = data.urls;
                alert(`Found ${data.count} URLs in sitemap. Checking the first ${urls.length}...`);
            } catch (err) {
                alert(err.message);
                setLoading(false);
                return;
            }
        }

        if (urls.length === 0) return;

        // Start checking
        setLoading(true);
        resultsArea.style.display = 'block';
        progressContainer.style.display = 'block';
        progressBar.style.width = '0%';

        // Clear previous results
        resultsList.innerHTML = '';
        resultCounter = 0;

        // Batch processing (groups of 10)
        const batchSize = 10;
        for (let i = 0; i < urls.length; i += batchSize) {
            const batch = urls.slice(i, i + batchSize);

            try {
                const formData = new URLSearchParams();
                batch.forEach(u => formData.append('urls[]', u));

                const response = await fetch('<?= route('http-status-checker.bulk') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: formData.toString()
                });

                const data = await response.json();
                if (data.results) {
                    data.results.forEach(res => {
                        resultCounter++;
                        const rowHtml = createResultRow(res, resultCounter);
                        resultsList.insertAdjacentHTML('afterbegin', rowHtml);
                    });
                }
            } catch (err) {
                console.error('Batch failed:', err);
            }

            // Update Progress
            const progress = Math.min(((i + batchSize) / urls.length) * 100, 100);
            progressBar.style.width = progress + '%';
        }

        setLoading(false);
        setTimeout(() => {
            progressContainer.style.display = 'none';
        }, 2000);
    }

    function clearResults() {
        if (!confirm('Clear all analysis results?')) return;
        document.getElementById('resultsList').innerHTML = '';
        document.getElementById('resultsArea').style.display = 'none';
        resultCounter = 0;
    }

    function setLoading(isLoading) {
        const btns = ['submitBtnSingle', 'submitBtnBulk', 'submitBtnSitemap'];
        btns.forEach(id => {
            const btn = document.getElementById(id);
            if (!btn) return;
            if (isLoading) {
                btn.disabled = true;
                btn.classList.add('loading');
                if (id !== 'submitBtnBulk') btn.querySelector('span').innerText = 'Processing...';
            } else {
                btn.disabled = false;
                btn.classList.remove('loading');
                if (id === 'submitBtnSingle') btn.querySelector('span').innerText = 'Check Status';
                if (id === 'submitBtnSitemap') btn.querySelector('span').innerText = 'Fetch & Check';
            }
        });
    }

    function createResultRow(data) {
        const id = 'res_' + Math.random().toString(36).substr(2, 9);

        // Status Badges
        const range = Math.floor(data.status / 100);
        const type = range === 2 ? '2xx' : (range === 3 ? '3xx' : (range === 4 ? '4xx' : (range === 5 ? '5xx' : '4xx')));
        const badgeHtml = data.status === 0 ?
            `<span class="status-badge bg-dark">Error</span>` :
            `<span class="status-badge status-badge-${type}">${data.status}</span>`;

        // Headers
        let headersHtml = '<div class="text-center py-3 text-muted">No headers available</div>';
        if (data.headers && Object.keys(data.headers).length > 0) {
            headersHtml = Object.entries(data.headers).map(([k, v]) => `
                <div class="status-checker-header-key">${k}</div>
                <div class="status-checker-header-val">${v}</div>
            `).join('');
        }

        // Chain
        const miniChainHtml = (data.chain || []).map((s, idx) => `
            <li class="status-checker-mini-chain-item">
                <span class="status-checker-chain-step">${idx + 1}</span>
                <div>
                    <strong>Status: ${s.code}</strong><br>
                    <small class="text-muted">${s.url}</small>
                </div>
            </li>
        `).join('');

        return `
            <div class="status-checker-result-row-wrapper" id="${id}">
                <div class="status-checker-result-row" onclick="toggleRowDetails('${id}')">
                    <div class="text-center text-muted fw-600">${data.index || resultCounter}</div>
                    <div class="status-checker-url-cell">${data.url}</div>
                    <div class="status-checker-badges-cell">${badgeHtml}</div>
                    <div class="text-center"><span class="status-checker-redirect-count">${data.redirects || 0}</span></div>
                    <div class="text-center status-checker-duration">${data.duration || '0.00'}</div>
                    <div class="status-checker-details-toggle"><i class="ion-chevron-down"></i></div>
                </div>
                <div class="status-checker-details-panel">
                    <div class="status-checker-details-content">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="status-checker-detail-section">
                                    <h5><i class="ion-ios-paper-outline"></i> Response Headers</h5>
                                    <div class="status-checker-header-grid">
                                        ${headersHtml}
                                    </div>
                                    ${data.error ? `<div class="alert alert-danger mt-3 py-2 fs-13">${data.error}</div>` : ''}
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="status-checker-detail-section">
                                    <h5><i class="ion-ios-shuffle"></i> Final Destination</h5>
                                    <ul class="status-checker-mini-chain text-start">
                                        ${miniChainHtml}
                                    </ul>
                                    ${data.final_url ? `<div class="mt-2 fs-12 text-muted text-start">Final: <span class="text-dark">${data.final_url}</span></div>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    function toggleRowDetails(id) {
        const row = document.getElementById(id);
        row.classList.toggle('expanded');
    }
</script>