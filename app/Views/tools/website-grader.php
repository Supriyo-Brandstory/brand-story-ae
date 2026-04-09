<style>
    /* 
    --- WEBSITE GRADER PREMIUM DESIGN SYSTEM ---
    Primary Color: #e83a26 (BrandStory Red)
    Secondary: #2E63D8
    Dark Accent: #111111
    */

    .wg-wrapper {
        font-family: 'Poppins', sans-serif;
        color: #333;
        overflow-x: hidden;
    }

    /* Hero Section */
    .wg-hero {
        padding: 100px 0 80px;
        background: radial-gradient(circle at 70% 20%, rgba(232, 58, 38, 0.08) 0%, rgba(255, 255, 255, 0) 50%),
                    radial-gradient(circle at 10% 80%, rgba(46, 99, 216, 0.05) 0%, rgba(255, 255, 255, 0) 50%);
        text-align: center;
        position: relative;
    }

    .wg-hero h1 {
        font-size: 56px;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 24px;
        color: #111;
    }

    .wg-hero h1 span {
        background: linear-gradient(90deg, #e83a26, #ff6b5b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .wg-hero p {
        font-size: 20px;
        color: #666;
        max-width: 700px;
        margin: 0 auto 48px;
        line-height: 1.6;
    }

    /* Premium Form */
    .wg-form-container {
        /* max-width: 1000px; */
        margin: 0 auto;
        background: #fff;
        padding: 40px;
        border-radius: 32px;
        box-shadow: 0 30px 60px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.03);
    }

    .wg-input-row {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 16px;
        margin-bottom: 24px;
    }

    .wg-input-group {
        position: relative;
    }

    .wg-input-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #999;
        margin-bottom: 8px;
        padding-left: 4px;
    }

    .wg-input-group input {
        width: 100%;
        padding: 14px 20px;
        border-radius: 12px;
        border: 1.5px solid #eee;
        background: #fbfbfb;
        font-size: 15px;
        transition: all 0.3s ease;
        outline: none;
    }

    .wg-input-group input:focus {
        border-color: #e83a26;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(232, 58, 38, 0.1);
    }

    .wg-btn-submit {
        width: 100%;
        background: #111;
        color: #fff;
        border: none;
        padding: 16px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .wg-btn-submit:hover {
        background: #e83a26;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(232, 58, 38, 0.2);
    }

    .wg-form-disclaimer {
        margin-top: 24px;
        font-size: 12px;
        color: #999;
    }

    /* Trust Logos */
    .wg-trust-strip {
        padding: 40px 0;
        border-bottom: 1px solid #eee;
        background: #fff;
    }

    .wg-trust-strip h6 {
        text-align: center;
        font-size: 14px;
        text-transform: uppercase;
        color: #bbb;
        letter-spacing: 2px;
        margin-bottom: 30px;
    }

    .wg-logo-row {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
        opacity: 0.6;
        filter: grayscale(1);
    }

    .wg-logo-row img {
        height: 30px;
    }

    /* Features Section */
    .wg-features-section {
        padding: 100px 0;
        background: #fcfcfd;
    }

    .wg-feature-content h2 {
        font-weight: 800;
        font-size: 42px;
        margin-bottom: 30px;
    }

    .wg-feature-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 40px;
        margin-bottom: 40px;
    }

    .wg-feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        color: #444;
    }

    .wg-feature-item i {
        color: #2E63D8;
        font-size: 20px;
    }

    .wg-preview-card {
        background: #fff;
        border-radius: 24px;
        padding: 10px;
        box-shadow: 0 40px 80px rgba(0,0,0,0.1);
        border: 1px solid rgba(0,0,0,0.05);
        transform: perspective(1000px) rotateY(-5deg);
        transition: transform 0.5s ease;
    }

    .wg-preview-card:hover {
        transform: perspective(1000px) rotateY(0deg);
    }

    .wg-preview-card img {
        width: 100%;
        border-radius: 16px;
    }

    /* Testimonials */
    .wg-testimonials {
        padding: 100px 0;
        background: #fff;
    }

    .wg-testimonials h2 {
        text-align: center;
        font-weight: 800;
        margin-bottom: 60px;
    }

    .wg-testimonial-card {
        background: #f8f9fb;
        padding: 40px;
        border-radius: 24px;
        height: 100%;
        transition: all 0.3s ease;
    }

    .wg-testimonial-card:hover {
        background: #fff;
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    }

    .wg-testimonial-card p {
        font-size: 16px;
        line-height: 1.8;
        color: #555;
        font-style: italic;
        margin-bottom: 30px;
    }

    .wg-user {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .wg-user img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .wg-user h5 {
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .wg-user span {
        font-size: 13px;
        color: #888;
    }


    /* Trust Badges bottom */
    .wg-footer-trust {
        padding: 60px 0;
        background: #fff;
        text-align: center;
    }

    .wg-trust-grid {
        display: flex;
        justify-content: center;
        gap: 80px;
        align-items: center;
    }

    .wg-trust-item {
        display: flex;
        align-items: center;
        gap: 12px;
        text-align: left;
    }

    .wg-trust-item i {
        font-size: 40px;
        color: #2E63D8;
    }

    .wg-trust-item h5 {
        font-size: 15px;
        font-weight: 700;
        margin: 0;
    }

    .wg-trust-item p {
        font-size: 12px;
        margin: 0;
        color: #888;
        max-width: 200px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .wg-hero h1 { font-size: 42px; }
        .wg-input-row { grid-template-columns: 1fr; }
        .wg-feature-grid { grid-template-columns: 1fr; }
        .wg-preview-card { transform: none; margin-top: 40px; }
        .wg-trust-grid { flex-direction: column; gap: 40px; }
    }
</style>

<div class="wg-wrapper">
    <!-- HERO SECTION -->
    <section class="wg-hero">
        <div class="container">
            <div class="badge bg-danger bg-opacity-10 text-danger px-4 py-2 rounded-pill mb-4 fw-600">IMPROVE YOUR WEBSITE PERFORMANCE</div>
            <h1>How strong is your <br><span>website SEO?</span></h1>
            <p>Can your website load in seconds? Learn how to improve it for free. Includes 20+ custom SEO checks and an overall performance grade.</p>

            <div class="wg-form-container">
                <form id="heroGraderForm">
                    <div class="wg-input-row">
                        <div class="wg-input-group">
                            <label>WEBSITE URL</label>
                            <input type="url" placeholder="https://example.com" required>
                        </div>
                        <div class="wg-input-group">
                            <label>FIRST NAME</label>
                            <input type="text" placeholder="John" required>
                        </div>
                        <div class="wg-input-group">
                            <label>EMAIL ADDRESS</label>
                            <input type="email" placeholder="john@example.com" required>
                        </div>
                        <div class="wg-input-group">
                            <label>PHONE NUMBER</label>
                            <input type="tel" placeholder="+971 00 000 0000" required>
                        </div>
                    </div>
                    <button type="submit" class="wg-btn-submit">Grade My Website</button>
                    <div class="wg-form-disclaimer">
                        <i class="ion-ios-locked-outline"></i> 100% Secure & Confidential. We respect your privacy.
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- TRUST STRIP -->
    <section class="wg-trust-strip">
        <div class="container">
            <h6>As Seen On</h6>
            <div class="wg-logo-row">
                <img src="<?= base_url('assets/images/clients/logo-1.png') ?>" alt="Partner">
                <img src="<?= base_url('assets/images/clients/logo-2.png') ?>" alt="Partner">
                <img src="<?= base_url('assets/images/clients/logo-3.png') ?>" alt="Partner">
                <img src="<?= base_url('assets/images/clients/logo-4.png') ?>" alt="Partner">
                <img src="<?= base_url('assets/images/clients/logo-5.png') ?>" alt="Partner">
                <img src="<?= base_url('assets/images/clients/logo-6.png') ?>" alt="Partner">
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="wg-features-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wg-feature-content">
                    <h2>What you'll get:</h2>
                    <p class="text-muted mb-4">A comprehensive SEO audit covering the most critical factors for your search engine rankings and user conversion.</p>
                    
                    <div class="wg-feature-grid">
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> On-Page SEO
                        </div>
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> Technology Stack
                        </div>
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> Structured Data
                        </div>
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> Backlinks Analysis
                        </div>
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> Mobile Friendliness
                        </div>
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> Social Signals
                        </div>
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> Core Web Vitals
                        </div>
                        <div class="wg-feature-item">
                            <i class="ion-ios-checkmark"></i> Traffic Estimations
                        </div>
                    </div>

                    <a href="https://vimeo.com/" target="_blank" class="text-decoration-none text-dark fw-700 fs-18">
                        <i class="ion-ios-play-outline me-2 text-danger"></i> WATCH THE VIDEO TO LEARN MORE
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="wg-preview-card">
                        <img src="<?= base_url('assets/images/report-preview.png') ?>" alt="SEO Report Preview">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="wg-testimonials">
        <div class="container">
            <h2>Praise for the website <br>SEO grader</h2>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="wg-testimonial-card border-0">
                        <p>"In just a few seconds, the SEO grader tool provides insightful analysis on par with the audit an agency or consultant would take days to produce. Essential for every marketer."</p>
                        <div class="wg-user">
                            <img src="<?= base_url('assets/images/Aratrika.webp') ?>" alt="User">
                            <div>
                                <h5>Diego Miranda</h5>
                                <span>Excellence Group, Luxury Hotels</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wg-testimonial-card border-0">
                        <p>"I love this SEO grader. Many of my colleagues use it to get an instant assessment of the issues facing a website. They report results are accurate and extremely actionable."</p>
                        <div class="wg-user">
                            <img src="<?= base_url('assets/images/Harsha.webp') ?>" alt="User">
                            <div>
                                <h5>Chris Anderson</h5>
                                <span>Performance Traffic</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRUST FOOTER -->
    <section class="wg-footer-trust">
        <div class="container">
            <div class="wg-trust-grid">
                <div class="wg-trust-item">
                    <i class="ion-ios-shuffle"></i>
                    <div>
                        <h5>INTEGRATION</h5>
                        <p>We integrate with the world's leading SEO software.</p>
                    </div>
                </div>
                <div class="wg-trust-item">
                    <i class="ion-ios-locked-outline"></i>
                    <div>
                        <h5>SAFE AND SECURE</h5>
                        <p>Your data is encrypted and never shared with third parties.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
