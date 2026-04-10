<style>
    /* --- WEBSITE GRADER REPORT PREMIUM UI --- */
    :root {
        --brand-red: #E83A25;
        --text-dark: #212529;
        --bg-light: #F8F9FA;
        --success-green: #28a745;
        --warning-orange: #fd7e14;
        --danger-red: #dc3545;
        --card-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .wgr-wrapper {
        font-family: 'Poppins', sans-serif;
        background: #fff;
        color: var(--text-dark);
        padding-top: 70px; /* Space for sticky header */
    }

    /* Sticky Report Header */
    .wgr-sticky-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #fff;
        padding: 12px 0;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        z-index: 1000;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .wgr-site-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .wgr-site-label {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        color: #999;
        margin: 0;
    }

    .wgr-site-url {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }

    .wgr-action-btns {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    .wgr-btn-outline {
        padding: 8px 20px;
        border: 2px solid #eee;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 700;
        color: #666;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .wgr-btn-outline:hover {
        border-color: var(--brand-red);
        color: var(--brand-red);
    }

    .wgr-grade-badge {
        background: var(--brand-red);
        color: #fff;
        padding: 4px 12px;
        border-radius: 6px;
        font-weight: 800;
        font-size: 18px;
    }

    /* Hero Assessment Section */
    .wgr-assessment-hero {
        padding: 80px 0;
        background: var(--bg-light);
        border-bottom: 1px solid #eee;
    }

    .wgr-score-container {
        text-align: center;
    }

    /* Progress Circle */
    .wgr-radial-gauge {
        width: 220px;
        height: 220px;
        margin: 0 auto 30px;
        position: relative;
    }

    .wgr-radial-gauge svg {
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
    }

    .wgr-radial-gauge .bg {
        fill: none;
        stroke: #e6e6e6;
        stroke-width: 12;
    }

    .wgr-radial-gauge .progress {
        fill: none;
        stroke: var(--brand-red);
        stroke-width: 12;
        stroke-linecap: round;
        stroke-dasharray: 628;
        stroke-dashoffset: 113; /* (1 - 82/100) * 628 */
        transition: stroke-dashoffset 1.5s ease;
    }

    .wgr-score-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .wgr-score-num {
        font-size: 56px;
        font-weight: 800;
        color: var(--text-dark);
        display: block;
        line-height: 1;
    }

    .wgr-score-lbl {
        font-size: 14px;
        font-weight: 600;
        color: #999;
        text-transform: uppercase;
    }

    .wgr-hero-title {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .wgr-hero-stats {
        display: flex;
        gap: 30px;
        justify-content: center;
        margin-top: 40px;
    }

    .wgr-stat-item {
        background: #fff;
        padding: 20px 40px;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
    }

    .wgr-stat-item h6 {
        font-size: 12px;
        font-weight: 700;
        color: #999;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .wgr-stat-item .val {
        font-size: 24px;
        font-weight: 700;
    }

    .text-success { color: var(--success-green); }
    .text-danger { color: var(--danger-red); }

    /* Audit Categories */
    .wgr-category-sec {
        padding: 60px 0;
    }

    .wgr-category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .wgr-category-header h3 {
        font-weight: 800;
        font-size: 28px;
    }

    .wgr-audit-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 16px;
        display: flex;
        align-items: flex-start;
        gap: 20px;
        transition: all 0.3s ease;
    }

    .wgr-audit-card:hover {
        box-shadow: var(--card-shadow);
        border-color: transparent;
    }

    .wgr-audit-status {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .status-pass { background: rgba(40, 167, 69, 0.1); color: var(--success-green); }
    .status-fail { background: rgba(220, 53, 69, 0.1); color: var(--danger-red); }
    .status-warn { background: rgba(253, 126, 20, 0.1); color: var(--warning-orange); }

    .wgr-audit-content h5 {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .wgr-audit-content p {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .wgr-audit-data {
        background: #f8f9fb;
        padding: 12px 20px;
        border-radius: 8px;
        font-family: monospace;
        font-size: 13px;
        color: #444;
        border-left: 3px solid #ddd;
    }

    /* Charts Section example */
    .wgr-visual-row {
        display: flex;
        gap: 30px;
        margin-top: 40px;
    }

    .wgr-viz-box {
        flex: 1;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 20px;
        padding: 30px;
        text-align: center;
    }

    .wgr-viz-box h6 {
        font-weight: 700;
        margin-bottom: 20px;
    }

    .wgr-speed-bar {
        height: 12px;
        background: #eee;
        border-radius: 10px;
        margin: 20px 0;
        position: relative;
    }

    .wgr-speed-bar .fill {
        height: 100%;
        background: var(--brand-red);
        border-radius: 10px;
        width: 75%;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .wgr-hero-stats { flex-direction: column; gap: 15px; }
        .wgr-visual-row { flex-direction: column; }
        .wgr-action-btns { display: none; }
        .wgr-hero-title { font-size: 32px; }
    }
</style>

<div class="wgr-wrapper">
    <!-- STICKY HEADER -->
    <header class="wgr-sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="wgr-site-info">
                        <div>
                            <p class="wgr-site-label">Audit for domain</p>
                            <h4 class="wgr-site-url">brandstory.ae</h4>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <div class="wgr-action-btns">
                        <a href="#" class="wgr-btn-outline"><i class="ion-ios-cloud-download-outline me-2"></i> PDF REPORT</a>
                        <div class="ms-3 d-inline-flex align-items-center">
                            <span class="me-2 fw-700">CURRENT GRADE:</span>
                            <span class="wgr-grade-badge">A-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ASSESSMENT HERO -->
    <section class="wgr-assessment-hero">
        <div class="container text-center">
            <h1 class="wgr-hero-title">SEO Quality Assessment</h1>
            <p class="text-muted mb-5">Final score and performance grading based on 20+ technical search factors.</p>

            <div class="wgr-radial-gauge">
                <svg>
                    <circle class="bg" cx="110" cy="110" r="100"></circle>
                    <circle class="progress" cx="110" cy="110" r="100"></circle>
                </svg>
                <div class="wgr-score-text">
                    <span class="wgr-score-num">82</span>
                    <span class="wgr-score-lbl">OVERALL</span>
                </div>
            </div>

            <div class="wgr-hero-stats">
                <div class="wgr-stat-item">
                    <h6>Passed Checks</h6>
                    <span class="val text-success">18</span>
                </div>
                <div class="wgr-stat-item">
                    <h6>Warnings</h6>
                    <span class="val" style="color:var(--warning-orange)">3</span>
                </div>
                <div class="wgr-stat-item">
                    <h6>Failed</h6>
                    <span class="val text-danger">1</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: ON-PAGE SEO -->
    <section class="wgr-category-sec">
        <div class="container">
            <div class="wgr-category-header">
                <h3>On-Page SEO Analysis</h3>
                <span class="badge bg-success px-3">92% SUCCESS</span>
            </div>

            <!-- Audit Card: Title Tag -->
            <div class="wgr-audit-card">
                <div class="wgr-audit-status status-pass"><i class="ion-checkmark"></i></div>
                <div class="wgr-audit-content">
                    <h5>Title Tag Optimization</h5>
                    <p>Your Title Tag is perfectly within the recommended length (50-60 characters) and contains primary keywords.</p>
                    <div class="wgr-audit-data">
                        &lt;title&gt;Best Digital Marketing Agency in Dubai, UAE | BrandStory&lt;/title&gt;
                    </div>
                </div>
            </div>

            <!-- Audit Card: Meta Description -->
            <div class="wgr-audit-card">
                <div class="wgr-audit-status status-pass"><i class="ion-checkmark"></i></div>
                <div class="wgr-audit-content">
                    <h5>Meta Description</h5>
                    <p>Your meta description is concise and includes a clear call to action.</p>
                    <div class="wgr-audit-data">
                        Elevate your digital presence with BrandStory's expert SEO and marketing services in Dubai. Contact us for a free audit today.
                    </div>
                </div>
            </div>

            <!-- Audit Card: Header Tags -->
            <div class="wgr-audit-card">
                <div class="wgr-audit-status status-warn"><i class="ion-alert"></i></div>
                <div class="wgr-audit-content w-100">
                    <h5>Heading Tag Structure (H1-H6)</h5>
                    <p>We found multiple H1 tags on your homepage. It is recommended to have only one main H1 tag for optimal SEO results.</p>
                    <div class="row mt-3">
                        <div class="col-md-3"><strong>H1 Tags:</strong> <span class="text-danger">2 Found</span></div>
                        <div class="col-md-3"><strong>H2 Tags:</strong> 8 Found</div>
                        <div class="col-md-3"><strong>H3 Tags:</strong> 12 Found</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: PERFORMANCE -->
    <section class="wgr-category-sec" style="background: #fcfcfd;">
        <div class="container">
            <div class="wgr-category-header">
                <h3>Performance & Speed</h3>
                <span class="badge bg-danger px-3">CRITICAL ISSUES</span>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="wgr-audit-card">
                        <div class="wgr-audit-status status-fail"><i class="ion-close"></i></div>
                        <div class="wgr-audit-content">
                            <h5>Image Optimization</h5>
                            <p>Several images (logo.png, banner-1.jpg) are not optimized. Compressing these could save up to 1.2MB of page weight.</p>
                        </div>
                    </div>
                    <div class="wgr-audit-card">
                        <div class="wgr-audit-status status-pass"><i class="ion-checkmark"></i></div>
                        <div class="wgr-audit-content">
                            <h5>Caching Policy</h5>
                            <p>Leveraging browser caching is active. Your static assets are properly cached.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wgr-viz-box h-100 shadow-sm">
                        <h6>Page Load Timeline</h6>
                        <div class="wgr-speed-bar"><div class="fill"></div></div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>0s (Start)</span>
                            <span class="text-danger">2.4s (Interactive)</span>
                            <span>4.0s (Loaded)</span>
                        </div>
                        <p class="mt-4 fs-12 text-muted">A load time over 2 seconds can increase bounce rate by 50%.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: SECURITY & SOCIAL -->
    <section class="wgr-category-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Trust & Security</h3>
                    <div class="wgr-audit-card">
                        <div class="wgr-audit-status status-pass"><i class="ion-locked"></i></div>
                        <div class="wgr-audit-content">
                            <h5>SSL Certificate</h5>
                            <p>Valid SSL found. Your site is served over HTTPS, which is a key ranking factor.</p>
                        </div>
                    </div>
                    <div class="wgr-audit-card">
                        <div class="wgr-audit-status status-pass"><i class="ion-document-text"></i></div>
                        <div class="wgr-audit-content">
                            <h5>Sitemap & Robots</h5>
                            <p>Both sitemap.xml and robots.txt were successfully located and parsed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3>Social Signal Ready</h3>
                    <div class="wgr-audit-card">
                        <div class="wgr-audit-status status-pass"><i class="ion-social-facebook"></i></div>
                        <div class="wgr-audit-content">
                            <h5>Open Graph Tags</h5>
                            <p>Proper Open Graph tags found. Your site will look great when shared on Facebook and LinkedIn.</p>
                        </div>
                    </div>
                    <div class="wgr-audit-card">
                        <div class="wgr-audit-status status-warn"><i class="ion-social-twitter"></i></div>
                        <div class="wgr-audit-content">
                            <h5>Twitter Cards</h5>
                            <p>Twitter card tags are missing. Adding them will improve visibility for Twitter shares.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="sp-100 bg-white" style="border-top: 1px solid #eee;">
        <div class="container text-center">
            <h2 class="fw-800 mb-4">Want to fix these issues?</h2>
            <p class="text-muted mb-5 max-w-700 mx-auto">Our team of SEO experts in Dubai can help you solve every technical hurdle identified in this report. Let's build your search authority together.</p>
            <a href="<?= route('contact') ?>" class="btn btn-danger px-5 py-3 rounded-pill fw-700">GET FREE CONSULTATION <i class="ion-android-arrow-forward ms-2"></i></a>
        </div>
    </section>
</div>
