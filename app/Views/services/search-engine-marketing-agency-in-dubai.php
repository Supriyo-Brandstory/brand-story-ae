<style>
    .sem-new-banner-section {
        background: #000;
        padding: 100px 0 100px;
        min-height: 85vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
    }

    .sem-badge {
        background: rgba(132, 94, 247, 0.1);
        color: #845EF7;
        padding: 6px 18px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.5px;
        border: 1px solid rgba(132, 94, 247, 0.3);
        text-transform: uppercase;
        font-family: 'Poppins', sans-serif;
    }

    .theme-highlight {
        color: #845EF7;
    }



    .sem-banner-left p {
        color: rgba(255, 255, 255, 0.7);
        max-width: 580px;
    }

    .Performance-Driven-btn.outline-btn {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .Performance-Driven-btn.outline-btn:hover {
        border-color: #845EF7;
        background: #845EF7;
        color: #fff;
    }

    .sem-banner-right {
        padding-left: 30px;
    }

    .laptop-mockup {
        position: relative;
        z-index: 1;
        background: #111;
        padding: 12px;
        border-radius: 24px;
        border: 1px solid #333;
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.6);
    }

    .laptop-mockup img {
        border-radius: 16px;
        width: 100%;
        display: block;
    }

    .floating-card-roas {
        position: absolute;
        bottom: -35px;
        left: -45px;
        background: #fff;
        padding: 22px 28px;
        border-radius: 24px;
        z-index: 3;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        gap: 18px;
        animation: sem_float_anim 4s ease-in-out infinite;
    }

    .roas-circle {
        width: 48px;
        height: 48px;
        background: #E8F5E9;
        color: #845EF7;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .roas-info p {
        margin: 0;
        color: #666;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.2;
        font-family: 'Poppins', sans-serif;
    }

    .roas-info h4 {
        margin: 0;
        color: #000;
        font-size: 26px;
        font-weight: 800;
        line-height: 1.1;
        font-family: 'Poppins', sans-serif;
    }

    @keyframes sem_float_anim {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    @media (max-width: 1199px) {
        .sem-banner-left h1 {
            font-size: 40px;
            line-height: 50px;
        }
    }

    @media (max-width: 991px) {
        .sem-new-banner-section {
            padding: 120px 0 80px;
            text-align: center;
        }

        .sem-banner-left p {
            margin-left: auto;
            margin-right: auto;
        }

        .banner-btns {
            justify-content: center;
        }

        .sem-banner-right {
            padding-left: 0;
            margin-top: 70px;
        }

        .floating-card-roas {
            left: 50%;
            transform: translateX(-50%);
            bottom: -40px;
            animation: none;
        }
    }

    /* Keep existing styles for other sections */
    .sem-service-section {
        background: #000;
        padding: 80px 0;
        font-family: 'Poppins', sans-serif;
    }

    .sem-service-card {
        background: #111;
        border: 1px solid #333;
        border-radius: 20px;
        padding: 30px;
        height: 100%;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .sem-service-card:hover {
        border-color: #845EF7;
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(132, 94, 247, 0.2);
    }

    .sem-service-card .icon-box {
        width: 60px;
        height: 60px;
        background: rgba(132, 94, 247, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .sem-service-card .icon-box img {
        width: 35px;
        height: 35px;
    }

    .sem-service-card h3 {
        color: #fff;
        font-size: 24px;
        line-height: 34px;
        font-weight: 600;
        margin-bottom: 15px;
        font-family: 'Poppins', sans-serif;
    }

    .sem-service-card p {
        color: #aaa;
        font-size: 18px;
        line-height: 28px;
        margin-bottom: 0;
        font-family: 'Poppins', sans-serif;
    }

    .why-dubai-card {
        background: #111;
        border: 1px solid #333;
        border-radius: 24px;
        padding: 45px 35px;
        height: 100%;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        z-index: 1;
        display: flex;
        flex-direction: column;
    }

    .why-dubai-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(132, 94, 247, 0.05));
        z-index: -1;
    }

    .why-dubai-card:hover {
        background: #161616;
        border-color: #845EF7;
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    }

    .why-dubai-card .card-icon-box {
        width: 50px;
        height: 50px;
        background: rgba(132, 94, 247, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        color: #845EF7;
        font-size: 24px;
        transition: all 0.3s ease;
    }

    .why-dubai-card:hover .card-icon-box {
        background: #845EF7;
        color: #fff;
        transform: scale(1.1) rotate(5deg);
    }

    .why-dubai-card h4 {
        color: #fff;
        font-size: 24px;
        line-height: 34px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 15px;
    }

    .why-dubai-card .card-bg-text {
        position: absolute;
        bottom: -15px;
        right: 10px;
        font-size: 100px;
        font-weight: 900;
        color: rgba(255, 255, 255, 0.02);
        line-height: 1;
        pointer-events: none;
        transition: all 0.4s ease;
    }

    .why-dubai-card:hover .card-bg-text {
        color: rgba(132, 94, 247, 0.08);
        transform: translateY(-10px);
    }

    .sem-strategy-sec {
        background: #0a0a0a;
        border-radius: 30px;
        padding: 60px;
        margin-top: 50px;
        border: 1px solid #222;
        font-family: 'Poppins', sans-serif;
    }

    /* Amazing Fluid Why Choose Section (No Boxes) */
    .why-choose-item {
        position: relative;
        padding-left: 40px;
        margin-bottom: 60px;
        transition: all 0.3s ease;
    }

    .why-choose-item::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: rgba(132, 94, 247, 0.2);
        border-radius: 10px;
        transition: all 0.4s ease;
    }

    .why-choose-item:hover::before {
        background: #845EF7;
        box-shadow: 0 0 15px rgba(132, 94, 247, 0.6);
    }

    .choose-number {
        font-size: 16px;
        font-weight: 800;
        color: #845EF7;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
        margin-bottom: 10px;
    }

    .why-choose-item h3 {
        color: #fff;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .why-choose-item:hover h3 {
        transform: translateX(10px);
    }

    .why-choose-item p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 19px;
        line-height: 1.6;
        max-width: 90%;
    }

    @media (max-width: 767px) {
        .why-choose-item h3 {
            font-size: 26px;
        }
    }
</style>

<section class="sem-new-banner-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="sem-banner-left">
                    <span class="sem-badge mb-4 d-inline-block">PREMIER SEM AGENCY IN DUBAI</span>
                    <h1 class="text-white mb-4">Search Engine Marketing Agency in <span class="theme-highlight">Dubai, UAE</span></h1>
                    <p class="mb-md-5 mb-4 fs-20">Search Engine Marketing (SEM) at BrandStory is designed to drive high-intent traffic through precision-targeted PPC campaigns aligned with your business goals. Our Dubai-focused SEM strategies maximise Return on Ads Spending (ROAS) while optimising Cost Per Click (CPC), ensuring every ad spend translates into measurable, scalable growth.</p>
                    <div class="banner-btns d-flex flex-wrap gap-3">
                        <a href="javascript:void(0);" class="Performance-Driven-btn uniq-contact-lead-btn">➤ Get Your Free Audit</a>
                        <a href="/case-study" class="Performance-Driven-btn outline-btn">➤ View Case Studies</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sem-banner-right position-relative">
                    <div class="laptop-mockup">
                        <img src="<?= base_url('assets/images/new-seo/seo-banner-1.webp') ?>" alt="SEM Performance Dubai" class="img-fluid">
                    </div>
                    <div class="floating-card-roas">
                        <div class="roas-circle">
                            <i class="ion-arrow-graph-up-right"></i>
                        </div>
                        <div class="roas-info">
                            <p>Avg. ROAS Growth</p>
                            <h4>+340%</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="seo-marquee">
    <div class="seo-marquee-wrapper">
        <div class="seo-marquee-track">
            <a href="javascript:void(0);" class="seo-marquee-item">Google Search Ads</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="javascript:void(0);" class="seo-marquee-item">PPC Management</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="javascript:void(0);" class="seo-marquee-item">Display Marketing</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="javascript:void(0);" class="seo-marquee-item">YouTube Ads</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="javascript:void(0);" class="seo-marquee-item">Remarketing</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="javascript:void(0);" class="seo-marquee-item">Performance Marketing</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="javascript:void(0);" class="seo-marquee-item">Bidding Strategy</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="javascript:void(0);" class="seo-marquee-item">ROI Optimization</a>
            <span class="seo-marquee-sep text-white">يلا</span>
        </div>
    </div>
</section>

<section class="performance-driven sp-50 dm-bg">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Leading Search Engine Marketing Services in Dubai</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="position-relative mb-lg-0 mb-3 d-lg-block d-none w-100 radius-20">
                    <img class="w-100 radius-20" src="<?= base_url('/assets/images/new-seo/seo-experts-dubai-1.webp') ?>" alt="SEM Experts in Dubai">
                    <div class="video-play-btn" data-video-id="wu1KU_1osRY">
                        <i class="ion-play"></i>
                    </div>
                </div>
                <div class="position-relative img-fluid radius-20 mb-lg-0 mb-3 d-lg-none d-block">
                    <img class="img-fluid radius-20" src="<?= base_url('/assets/images/new-seo/seo-experts-dubai-2.webp') ?>" alt="SEM Marketing Agency in Dubai">
                    <div class="video-play-btn" data-video-id="wu1KU_1osRY">
                        <i class="ion-play"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <p class="text-white fs-20 mb-3">As a results-driven search engine marketing agency Dubai brands rely on, BrandStory builds high-performance SEM campaigns focused on revenue, not just clicks. From Google Search and Display to YouTube and remarketing, our paid media strategies are engineered to capture high-intent traffic and convert it into measurable growth.</p>
                <p class="text-white fs-20 mb-4">Our approach combines advanced keyword intelligence, conversion-focused ad architecture, smart bidding strategies, and continuous ROI optimisation. If you're looking for a search engine marketing agency in Dubai that delivers scalable performance and transparent results, BrandStory builds campaigns designed to dominate competitive markets.</p>
                <a href="/contact" class="Performance-Driven-btn mb-5">➤ Talk to Experts</a>
            </div>
        </div>
    </div>
</section>

<section class="new-client-section">
    <div class="container-fluid">
        <h2 class="text-center mb-5 text-white">Our Valuable Clients</h2>
        <?php include __DIR__ . '/../component/client_section.php' ?>
    </div>
</section>

<section class="sem-service-section">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Our Search Engine Marketing Services</h2>
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="row g-4 h-100">
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div class="sem-service-card">
                            <div class="icon-box">
                                <img src="/assets/images/new-seo/Website-Audit.png" alt="SEM Strategy">
                            </div>
                            <h3 class="fs-24 fw-600">1. End-to-End SEM Strategy</h3>
                            <p class="fs-18 opacity-70">We manage everything from market research and competitor analysis to campaign launch and scaling, ensuring alignment with your revenue objectives.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div class="sem-service-card">
                            <div class="icon-box">
                                <img src="/assets/images/new-seo/Keyword-Research.png" alt="Keyword Targeting">
                            </div>
                            <h3 class="fs-24 fw-600">2. Advanced Keyword Targeting</h3>
                            <p class="fs-18 opacity-70">Identify high-intent, revenue-driving keywords capturing users at the right stage of the buying journey with a data-led approach.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div class="sem-service-card">
                            <div class="icon-box">
                                <img src="/assets/images/new-seo/On-Page-Optimization.png" alt="PPC Management">
                            </div>
                            <h3 class="fs-24 fw-600">3. PPC Campaign Management</h3>
                            <p class="fs-18 opacity-70">Build conversion-focused campaigns on Google Search, Display, and YouTube to generate qualified leads and maximise ROAS.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sem-service-card">
                            <div class="icon-box">
                                <img src="/assets/images/new-seo/Monitoring-Reporting.png" alt="Data Analytics">
                            </div>
                            <h3 class="fs-24 fw-600">4. Continuous ROI Optimisation</h3>
                            <p class="fs-18 opacity-70">Monitor performance in real-time, conduct A/B testing, and refine bidding strategies to deliver scalable and predictable growth.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="service-right-img h-100">
                    <img src="<?= base_url('/assets/images/new-seo/seo-experts-dubai-1.webp') ?>" alt="SEM Experts in Dubai" class="w-100 h-100 radius-20 object-fit-cover shadow-lg" style="min-height: 400px;">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dm-whychoose-sec sp-80 dm-bg">
    <div class="container">
        <h2 class="text-white mb-4">Why Choose BrandStory as Your <br><span class="theme-highlight">SEM Partner</span></h2>

        <div class="row align-items-center">
            <div class="col-lg-5">
                <p class="text-white opacity-70 fs-20 mb-5">We go beyond clicks to deliver scalable growth engines for Dubai's most ambitious brands.</p>
                <div class="d-lg-block d-none position-relative">
                    <img class="w-100 radius-20" src="<?= base_url('assets/images/home/whychoose.webp') ?>" alt="SEM Performance">
                    <div style="position:absolute; bottom:20px; left:20px; background:#845EF7; color:#fff; padding:15px 25px; border-radius:15px; font-weight:700;">
                        Top Rated Agency 🌟
                    </div>
                </div>
            </div>

            <div class="col-lg-7 ps-lg-5 mt-lg-0 mt-5">
                <div class="why-choose-item">
                    <span class="choose-number">Strategy 01</span>
                    <h3>Performance-First Architecture</h3>
                    <p>Every campaign is built on deep market intelligence and revenue modelling, ensuring your spend is focused on high-conversion pathways.</p>
                </div>

                <div class="why-choose-item">
                    <span class="choose-number">Innovation 02</span>
                    <h3>Custom Revenue Roadmaps</h3>
                    <p>We don't use templates. We design bespoke SEM roadmaps tailored to your specific audience behavior and competitive landscape in Dubai.</p>
                </div>

                <div class="why-choose-item">
                    <span class="choose-number">Transparency 03</span>
                    <h3>Measurable Growth & ROI</h3>
                    <p>Get real-time insights into metrics that matter. We focus on lead quality and ROAS, ensuring every dirham spent drives predictable business growth.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sp-80 dm-bg overflow-hidden position-relative">
    <div class="container">
        <h2 class="text-white mb-5 text-md-start text-center">Why Dubai is the Right Market for <br>Search Engine Marketing</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-stats-bars"></i></div>
                    <h4 class="mb-3">High-Intent Competitive Market</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">Dubai’s fast-growing landscape makes SEM essential. Capture high-intent traffic at the exact moment buying decisions are made.</p>
                    <span class="card-bg-text">01</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-iphone"></i></div>
                    <h4 class="mb-3">Digitally Advanced Audience</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">With one of the highest smartphone penetration rates, Dubai consumers rely heavily on Google to discover businesses.</p>
                    <span class="card-bg-text">02</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-earth"></i></div>
                    <h4 class="mb-3">Global Business Hub</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">Precision targeting across demographics and languages helps businesses reach both local and international customers.</p>
                    <span class="card-bg-text">03</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-flash"></i></div>
                    <h4 class="mb-3">Rapidly Evolving Market Trends</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">Benefit from AI-powered bidding and automation tools that enhance campaign performance and scalability in the UAE market.</p>
                    <span class="card-bg-text">04</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-checkmark-circled"></i></div>
                    <h4 class="mb-3">Measurable Data-Driven Growth</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">In a results-oriented market, SEM provides clear metrics from CPA to ROAS, ensuring maximum accountability for every dirham spent.</p>
                    <span class="card-bg-text">05</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .sem-comparison-section {
        background: #000;
        padding: 100px 0;
        font-family: 'Poppins', sans-serif;
    }

    .comparison-main-card {
        background: #111;
        border: 1px solid #333;
        border-radius: 30px;
        padding: 60px 40px;
        position: relative;
    }

    .comp-col {
        padding: 0 30px;
    }

    .comp-col:first-child {
        border-right: 1px solid #333;
    }

    .comp-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .comp-header i {
        font-size: 35px;
    }

    .comp-header h3 {
        font-size: 28px;
        font-weight: 700;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .organic-icon i,
    .organic-title {
        color: #845EF7;
    }

    .paid-icon i,
    .paid-title {
        color: #2196F3;
    }

    .comp-list {
        list-style: none;
        padding: 0;
        margin-bottom: 40px;
    }

    .comp-list li {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 18px;
        font-size: 18px;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.4;
    }

    .comp-list li i {
        font-size: 22px;
        margin-top: 2px;
    }

    .best-for-badge {
        padding: 18px 25px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 16px;
    }

    .organic-badge {
        background: rgba(76, 175, 80, 0.1);
        color: #845EF7;
    }

    .paid-badge {
        background: rgba(33, 150, 243, 0.1);
        color: #2196F3;
    }

    .comparison-quote-box {
        border: 1px solid rgba(33, 150, 243, 0.5);
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        margin-top: 60px;
        font-size: 20px;
        color: #fff;
        font-weight: 500;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        backdrop-filter: blur(10px);
    }

    @media (max-width: 991px) {
        .comp-col:first-child {
            border-right: none;
            border-bottom: 1px solid #333;
            padding-bottom: 40px;
            margin-bottom: 40px;
        }

        .comp-col {
            padding: 0;
        }

        .comparison-main-card {
            padding: 40px 25px;
        }
    }
</style>

<section class="sem-comparison-section dm-bg">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-white fw-700 mb-3" style="font-size: 42px;">Organic Search vs Paid Search</h2>
            <p class="fs-20 text-white opacity-70">Understanding the balance between long-term authority and immediate results.</p>
        </div>

        <div class="comparison-main-card">
            <div class="row">
                <div class="col-lg-6 comp-col">
                    <div class="comp-header">
                        <div class="organic-icon"><i class="ion-settings"></i></div>
                        <h3 class="organic-title">ORGANIC (SEO)</h3>
                    </div>
                    <ul class="comp-list">
                        <li><i class="ion-checkmark-circled organic-title"></i> Long-term sustainable growth</li>
                        <li><i class="ion-checkmark-circled organic-title"></i> Builds brand authority and trust</li>
                        <li><i class="ion-checkmark-circled organic-title"></i> No cost-per-click charges</li>
                    </ul>
                    <div class="best-for-badge organic-badge">
                        Best for: Establishing market dominance over 6-12 months.
                    </div>
                </div>

                <div class="col-lg-6 comp-col">
                    <div class="comp-header">
                        <div class="paid-icon"><i class="ion-plane"></i></div>
                        <h3 class="paid-title">PAID (SEM/PPC)</h3>
                    </div>
                    <ul class="comp-list">
                        <li><i class="ion-checkmark-circled paid-title"></i> Immediate visibility on page 1</li>
                        <li><i class="ion-checkmark-circled paid-title"></i> Targeting specific demographics & intent</li>
                        <li><i class="ion-checkmark-circled paid-title"></i> Precise measurement of ROI</li>
                    </ul>
                    <div class="best-for-badge paid-badge">
                        Best for: Instant lead generation and product launches.
                    </div>
                </div>
            </div>
        </div>

        <div class="comparison-quote-box">
            "At BrandStory, we integrate both to ensure your business wins today AND tomorrow."
        </div>
    </div>
</section>

<div class="sp-80 container SEO-that-Ranks" id="SEO-campaign-highlights">
    <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Our Strategy Meets Success <br>Explore Our Portfolio</h2>

    <div class="swiper cusswiper_sld">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="box-protfolio" style="border: 1px solid #333; border-radius: 20px; background: #111;">
                    <div class="row justify-content-between p-4">
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <img src="/assets/images/new-seo/SEO-Portfolio-2.jpg" alt="SEM Results" class="img-fluid radius-20">
                            <h4 style="margin-top:20px;" class="text-white mb-1 text-start fs-24 fw-700"><a href="/contact" class="text-white">Alice Blue</a></h4>
                            <p class="text-white text-start mb-3 fs-18"><b>4,000+</b> first-page ranking keywords | <b>2.18 M</b> monthly organic visitors | <b>10,000+</b> enquiries</p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="google-card" style="background: #1a1a1a; padding: 20px; border-radius: 15px; border: 1px solid #222;">
                                <img src="/assets/images/new-seo/google.png" alt="Google" class="img-fluid mb-3">
                                <div class="row justify-content-between w-100">
                                    <div class="col-5 px-0 pb-2">
                                        <div style="padding: 0 0 0 10px; border-left:2px solid #845EF7;">
                                            <p style="font-size: 18px; color:#845EF7; font-weight:bold; margin-bottom: 0;">200%</p>
                                            <p style="font-size: 11px; color:#777; font-weight:bold;">Traffic Spike ↑</p>
                                        </div>
                                    </div>
                                    <div class="col-7 p-0">
                                        <div style="padding: 0 10px; border-left:2px solid #503799;">
                                            <p style="font-size: 18px; color:#503799; font-weight:bold; margin-bottom: 0;">320%</p>
                                            <p style="font-size: 11px; color:#777; font-weight:bold;">Conversions ↑</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ section started -->
<section class="sp-80 dm-bg">
    <div class="container">
        <h2 class="text-white text-center mb-4">FAQ's</h2>
        <div class="row g-4 d-flex pt-lg-5 pt-3 justify-content-center align-items-center">
            <div class="col-md-9 col-12">
                <div class="accordion custom-accordion" id="semAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button show fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What does a search engine marketing agency in Dubai actually do?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">A search engine marketing agency in Dubai manages paid search campaigns that position your business at the top of Google for high-intent keywords. This includes keyword research, competitor analysis, ad creation, bid management, conversion tracking, and continuous optimisation to maximise ROI and reduce cost per acquisition.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What is the difference between SEO and Search Engine Marketing?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">SEO focuses on improving organic (non-paid) rankings through content, technical optimisation, and authority building. Search Engine Marketing typically refers to paid advertising strategies such as Google Ads and PPC campaigns. While SEO builds long-term visibility, SEM delivers immediate exposure and scalable lead generation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Why is search engine marketing important for businesses in Dubai?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">Dubai is a highly competitive and digitally driven market where customers actively search online before making purchasing decisions. SEM allows businesses to capture high-intent traffic instantly, outperform competitors in search results, and generate measurable growth in a fast-moving commercial environment.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What types of businesses benefit most from SEM services?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">Search engine marketing is highly effective for industries such as real estate, healthcare, eCommerce, hospitality, education, finance, and professional services. Any business targeting customers who search online for products or services can benefit from a well-structured SEM strategy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="video-modal" id="seoVideoModal">
    <div class="video-modal-content">
        <span class="close-video-modal" id="closeSeoVideo">&times;</span>
        <div class="video-container">
            <iframe id="seoVideoIframe" width="100%" height="100%" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoModal = document.getElementById('seoVideoModal');
        const videoIframe = document.getElementById('seoVideoIframe');
        const closeVideo = document.getElementById('closeSeoVideo');

        document.querySelectorAll('.video-play-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const videoId = this.getAttribute('data-video-id');
                if (videoIframe && videoModal) {
                    videoIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                    videoModal.style.display = 'flex';
                }
            });
        });

        if (closeVideo) {
            closeVideo.addEventListener('click', function() {
                videoModal.style.display = 'none';
                videoIframe.src = '';
            });
        }

        window.addEventListener('click', function(event) {
            if (event.target == videoModal) {
                videoModal.style.display = 'none';
                videoIframe.src = '';
            }
        });
    });
</script>