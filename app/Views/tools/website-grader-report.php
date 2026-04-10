<style>
    /* --- WEBSITE GRADER REPORT - BRANDSTORY THEME --- */
    .wgr-report-container {
        font-family: 'Poppins', sans-serif;
        background: #fff;
    }

    /* Hero Section - Image Background */
    .wgr-hero-report {
        background: linear-gradient(rgba(10, 11, 15, 0.5), rgba(10, 11, 15, 0.8)), url('https://images.unsplash.com/photo-1634017839464-5c339ebe3cb4?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 100px 0 80px;
        position: relative;
        overflow: hidden;
    }

    .wgr-hero-report::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(133, 91, 255, 0.15) 0%, transparent 70%);
        z-index: 0;
    }

    .wgr-hero-content {
        position: relative;
        z-index: 1;
    }

    .wgr-domain-pill {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(133, 91, 255, 0.3);
        padding: 8px 16px;
        border-radius: 50px;
        color: #fff;
        font-weight: 600;
        margin-bottom: 24px;
        font-size: 14px;
        letter-spacing: 1px;
    }

    .wgr-score-viz {
        position: relative;
        width: 240px;
        height: 240px;
        margin: 0 auto;
    }

    .wgr-score-viz svg {
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
    }

    .wgr-score-viz circle {
        fill: none;
        stroke-width: 10;
        stroke-linecap: round;
    }

    .wgr-score-viz .track {
        stroke: rgba(255, 255, 255, 0.1);
    }

    .wgr-score-viz .progress-bar {
        stroke: #855BFF;
        stroke-dasharray: 628;
        stroke-dashoffset: 113; /* (1 - 82/100) * 628 */
        transition: stroke-dashoffset 2s ease-in-out;
    }

    .wgr-score-value {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .wgr-score-number {
        font-size: 64px;
        font-weight: 800;
        color: #fff;
        line-height: 1;
        display: block;
    }

    .wgr-score-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 5px;
    }

    /* Summary Stats Grid */
    .wgr-summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 20px;
        margin-top: 50px;
    }

    .wgr-summary-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 20px;
        border-radius: 16px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .wgr-summary-card:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(133, 91, 255, 0.5);
    }

    .wgr-summary-card .num {
        font-size: 32px;
        font-weight: 700;
        display: block;
        margin-bottom: 5px;
    }

    .wgr-summary-card .lbl {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        font-weight: 600;
    }

    /* Section Typography */
    .wgr-section-title {
        font-weight: 800;
        font-size: 36px;
        margin-bottom: 40px;
        color: #0A0B0F;
        position: relative;
        padding-left: 20px;
    }

    .wgr-section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 10%;
        bottom: 10%;
        width: 4px;
        background: #E83A25;
        border-radius: 2px;
    }

    /* Audit Cards - Reusing Project's Premium Style */
    .wgr-audit-item {
        background: #fff;
        border: 1px solid #f0f0f0 !important;
        border-radius: 20px;
        padding: 30px !important;
        margin-bottom: 24px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        display: flex;
        gap: 25px;
    }

    .wgr-audit-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        border-color: rgba(133, 91, 255, 0.1);
    }

    .wgr-status-icon {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .icon-pass { background: rgba(26, 198, 174, 0.1); color: #1AC6AE; }
    .icon-warn { background: rgba(253, 126, 20, 0.1); color: #fd7e14; }
    .icon-fail { background: rgba(232, 58, 37, 0.1); color: #E83A25; }

    .wgr-audit-body h5 {
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 10px;
        color: #0A0B0F;
    }

    .wgr-audit-body p {
        color: #666;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .wgr-code-block {
        background: #F8F9FA;
        padding: 15px 20px;
        border-radius: 12px;
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        color: #444;
        margin-top: 15px;
        border-left: 4px solid #DEE2E6;
        word-break: break-all;
    }

    /* Performance Viz */
    .wgr-perf-box {
        background: #0A0B0F;
        border-radius: 24px;
        padding: 40px;
        color: #fff;
    }

    .wgr-progress-track {
        height: 8px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        margin: 25px 0;
        position: relative;
    }

    .wgr-progress-fill {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: linear-gradient(90deg, #855BFF, #E83A25);
        border-radius: 10px;
        width: 75%;
    }

    /* Floating CTA */
    .wgr-cta-card {
        /* background: linear-gradient(135deg, #855BFF 0%, #6e48e0 100%); */
        background: url('https://images.unsplash.com/photo-1490127252417-7c393f993ee4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        border-radius: 30px;
        padding: 60px;
        color: #fff;
        text-align: center;
        margin-top: 80px;
    }

    /* Adjustments for Layout */
    .wgr-report-wrapper {
        min-height: 100vh;
    }

    @media (max-width: 768px) {
        .wgr-audit-item { flex-direction: column; gap: 15px; }
        .wgr-hero-report { padding-top: 100px; }
        .wgr-section-title { font-size: 28px; }
    }
</style>

<div class="wgr-report-wrapper">
    <!-- HERO ASSESSMENT -->
    <section class="wgr-hero-report">
        <div class="container wgr-hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
                    <div class="wgr-domain-pill">
                        <i class="ion-ios-world-outline me-2"></i> AUDIT FOR: BRANDSTORY.AE
                    </div>
                    <h1 class="text-white mb-4">Your Professional <br><span style="color: #e83a26">SEO Performance</span> Report</h1>
                    <p class="text-white fs-18 mb-5">We've analyzed your website against 20+ critical search factors to determine your digital authority and performance grade.</p>
                    
                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                        <a href="#" class="Performance-Driven-btn px-5">Download Full PDF</a>
                        <div class="d-flex align-items-center ms-lg-4 text-white">
                            <span class="me-3 text-uppercase small ls-2">Current Grade</span>
                            <span class="fs-1 fw-800 text-purple">A-</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wgr-score-viz">
                        <svg viewBox="0 0 220 220">
                            <circle class="track" cx="110" cy="110" r="100"></circle>
                            <circle class="progress-bar" cx="110" cy="110" r="100"></circle>
                        </svg>
                        <div class="wgr-score-value">
                            <span class="wgr-score-number">82</span>
                            <span class="wgr-score-label">Overall</span>
                        </div>
                    </div>

                    <div class="wgr-summary-grid">
                        <div class="wgr-summary-card">
                            <span class="num text-success">18</span>
                            <span class="lbl">Passed Checks</span>
                        </div>
                        <div class="wgr-summary-card">
                            <span class="num" style="color:#fd7e14">3</span>
                            <span class="lbl">Warnings</span>
                        </div>
                        <div class="wgr-summary-card">
                            <span class="num text-danger">1</span>
                            <span class="lbl">Critical Failed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: ON-PAGE ANALYTICS -->
    <section class="sp-50 bg-white">
        <div class="container">
            <div class="row mb-5 align-items-end">
                <div class="col-md-8">
                    <h2 class="wgr-section-title mb-0">On-Page SEO Analysis</h2>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-success-light text-success px-4 py-2 rounded-pill fw-700">92% COMPLIANCE</span>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Title Tag -->
                    <div class="wgr-audit-item">
                        <div class="wgr-status-icon icon-pass"><i class="ion-checkmark"></i></div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Title Tag Optimization</h5>
                            <p>Your Title Tag is perfectly within the recommended length (50-60 characters) and contains core primary keywords for your business.</p>
                            <div class="wgr-code-block">
                                &lt;title&gt;Best Digital Marketing Agency in Dubai, UAE | BrandStory&lt;/title&gt;
                            </div>
                        </div>
                    </div>

                    <!-- Meta -->
                    <div class="wgr-audit-item">
                        <div class="wgr-status-icon icon-pass"><i class="ion-checkmark"></i></div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Meta Description Precision</h5>
                            <p>Your meta description is concise and includes a clear, conversion-driven call to action.</p>
                            <div class="wgr-code-block">
                                Elevate your digital presence with BrandStory's expert SEO and marketing services in Dubai. Contact us for a free audit today.
                            </div>
                        </div>
                    </div>

                    <!-- Header Structure -->
                    <div class="wgr-audit-item">
                        <div class="wgr-status-icon icon-warn"><i class="ion-alert"></i></div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Heading Tag Hierarchy (H1-H6)</h5>
                            <p>We found multiple H1 tags on your homepage. It is industry-best practice to use only one primary H1 for clarity and better ranking.</p>
                            <div class="row mt-4 g-3">
                                <div class="col-sm-4">
                                    <div class="p-3 border rounded-3 bg-light text-center">
                                        <div class="small text-muted mb-1">H1 Tags</div>
                                        <div class="fw-800 text-danger">2 Found</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 border rounded-3 text-center">
                                        <div class="small text-muted mb-1">H2 Tags</div>
                                        <div class="fw-800">8 Found</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 border rounded-3 text-center">
                                        <div class="small text-muted mb-1">H3 Tags</div>
                                        <div class="fw-800">12 Found</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: PERFORMANCE -->
    <section class="sp-50" style="background: #F9FAFB;">
        <div class="container">
            <h2 class="wgr-section-title">Speed & Performance</h2>
            
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="wgr-audit-item">
                        <div class="wgr-status-icon icon-fail"><i class="ion-close"></i></div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Image Compression Issues</h5>
                            <p>Several high-impact images (logo.png, banner-1.jpg) are not optimized for web. Implementation could save ~1.2MB of page weight.</p>
                        </div>
                    </div>
                    <div class="wgr-audit-item">
                        <div class="wgr-status-icon icon-pass"><i class="ion-checkmark"></i></div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Browser Caching Policy</h5>
                            <p>Leveraging browser caching is active and configured correctly. Your static assets are lightning fast.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="wgr-perf-box h-100 d-flex flex-column justify-content-center">
                        <h4 class="text-white fw-700 mb-3">Load Time Reality</h4>
                        <p class="text-white-50 small">Slow load times can increase bounce rates by up to 50% for UAE mobile users.</p>
                        <div class="wgr-progress-track">
                            <div class="wgr-progress-fill"></div>
                        </div>
                        <div class="d-flex justify-content-between small opacity-50">
                            <span>0s Start</span>
                            <span class="text-danger fw-700">2.4s Interactive</span>
                            <span>4.0s Ready</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: SECURITY & SOCIAL -->
    <section class="sp-50 bg-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h3 class="fw-800 mb-4"><span class="text-purple">Trust</span> & Security</h3>
                    <div class="wgr-audit-item p-0 border-0 mb-4">
                        <div class="wgr-status-icon icon-pass"><i class="ion-locked"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Valid SSL Certificate</h5>
                            <p>HTTPS is a confirmed ranking signal. Your site is secure.</p>
                        </div>
                    </div>
                    <div class="wgr-audit-item p-0 border-0">
                        <div class="wgr-status-icon icon-pass"><i class="ion-document-text"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Sitemap & Robots.txt</h5>
                            <p>Properly located. Search engines can crawl your site easily.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="fw-800 mb-4"><span class="text-purple">Social</span> Visibility</h3>
                    <div class="wgr-audit-item p-0 border-0 mb-4">
                        <div class="wgr-status-icon icon-pass"><i class="ion-social-facebook"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Open Graph Protocol</h5>
                            <p>Proper tags found. Your site shares beautifully on social platforms.</p>
                        </div>
                    </div>
                    <div class="wgr-audit-item p-0 border-0">
                        <div class="wgr-status-icon icon-fail"><i class="ion-social-twitter"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Twitter Card Structure</h5>
                            <p>Twitter card tags are missing. Adding them will improve visibility for viral shares.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FINAL Call Action -->
            <div class="wgr-cta-card">
                <h2 class="text-white mb-4 fw-800">Ready to Dominate Search Rankings?</h2>
                <p class="text-white-50 fs-20 mb-5 max-980 m-auto">Our team of SEO experts in Dubai can help you fix every technical hurdle identified in this report. Let's turn your website into a lead-generating machine.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= route('contact') ?>" class="Performance-Driven-btn px-5 bg-white text-dark border-0">Get Free Consultation</a>
                    <a href="tel:+971522831655" class="Performance-Driven-btn px-5 border-white">Call an Expert</a>
                </div>
            </div>
        </div>
    </section>
</div>

