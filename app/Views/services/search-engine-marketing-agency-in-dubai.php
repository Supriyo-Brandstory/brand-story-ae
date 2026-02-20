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
                            <h3 class="fs-24 fw-600">1. End-to-End SEM Strategy & Execution</h3>
                            <p class="fs-18 opacity-70">As a performance-focused search engine marketing agency in Dubai, BrandStory manages everything from market research and competitor analysis to campaign launch and scaling, ensuring every element aligns with your revenue objectives.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div class="sem-service-card">
                            <div class="icon-box">
                                <img src="/assets/images/new-seo/Keyword-Research.png" alt="Keyword Targeting">
                            </div>
                            <h3 class="fs-24 fw-600">2. Advanced Keyword & Intent Targeting</h3>
                            <p class="fs-18 opacity-70">We identify high-intent, revenue-driving keywords that capture users at the right stage of the buying journey. Our data-led approach ensures you compete where it matters most while controlling cost per click.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div class="sem-service-card">
                            <div class="icon-box">
                                <img src="/assets/images/new-seo/On-Page-Optimization.png" alt="PPC Management">
                            </div>
                            <h3 class="fs-24 fw-600">3. High-Performance PPC Campaign Management</h3>
                            <p class="fs-18 opacity-70">From Google Search and Display to YouTube and remarketing, we build conversion-focused PPC campaigns designed to generate qualified leads, increase sales, and maximise return on ad spend.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sem-service-card">
                            <div class="icon-box">
                                <img src="/assets/images/new-seo/Monitoring-Reporting.png" alt="Data Analytics">
                            </div>
                            <h3 class="fs-24 fw-600">4. Data Analytics & Continuous Optimisation</h3>
                            <p class="fs-18 opacity-70">Success in SEM requires constant refinement. We monitor performance in real time, conduct A/B testing, optimise bidding strategies, and refine audience targeting to deliver scalable, predictable growth.</p>
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
        <h2 class="text-white mb-4">Why Choose BrandStory as Your <br><span class="theme-highlight">Search Engine Marketing Agency in Dubai</span></h2>

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
                    <h3>Strategy-First Performance Marketing</h3>
                    <p>At BrandStory, we don’t launch campaigns blindly. As a data-driven search engine marketing agency in Dubai, we begin with deep market analysis, competitor benchmarking, and revenue modelling to ensure every campaign is built for sustainable growth- not short-term spikes.</p>
                </div>

                <div class="why-choose-item">
                    <span class="choose-number">Roadmap 02</span>
                    <h3>Customised SEM Built Around Your Revenue Goals</h3>
                    <p>No two businesses scale the same way. Our SEM strategies are tailored to your industry, audience behaviour, and sales cycle. From high-intent keyword targeting to precision audience segmentation, we design campaigns that maximise conversions while optimising cost per acquisition.</p>
                </div>

                <div class="why-choose-item">
                    <span class="choose-number">Reporting 03</span>
                    <h3>Transparent Reporting, Measurable ROI</h3>
                    <p>We focus on metrics that matter- lead quality, cost efficiency, conversion rates, and return on ad spend. With continuous A/B testing, smart bidding strategies, and performance optimisation, we ensure your investment translates into predictable, scalable results.</p>
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
                    <h4 class="mb-3">A Highly Competitive, High-Intent Market</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">Dubai’s fast-growing and competitive business landscape makes search engine marketing essential, not optional. With customers actively searching for services online, SEM allows brands to capture high-intent traffic at the exact moment buying decisions are made.</p>
                    <span class="card-bg-text">01</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-iphone"></i></div>
                    <h4 class="mb-3">A Digitally Advanced Audience</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">Dubai has one of the highest internet and smartphone penetration rates in the region. Consumers rely heavily on Google to discover, compare, and choose businesses- creating significant opportunities for brands that invest in strategic paid search campaigns.</p>
                    <span class="card-bg-text">02</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-earth"></i></div>
                    <h4 class="mb-3">A Global Business Hub</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">As an international commercial centre, Dubai attracts diverse audiences across industries such as real estate, healthcare, hospitality, eCommerce, and finance. SEM enables precise targeting across demographics, languages, and locations, helping businesses reach both local and international customers.</p>
                    <span class="card-bg-text">03</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-flash"></i></div>
                    <h4 class="mb-3">Rapidly Evolving Market Trends</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">Dubai embraces innovation and digital transformation. From AI-powered bidding strategies to advanced analytics and automation, businesses operating here benefit from cutting-edge search engine marketing tools that enhance campaign performance and scalability.</p>
                    <span class="card-bg-text">04</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="why-dubai-card">
                    <div class="card-icon-box"><i class="ion-checkmark-circled"></i></div>
                    <h4 class="mb-3">Measurable Growth in a Data-Driven Economy</h4>
                    <p class="text-white fs-18 mb-0 opacity-70">In a results-oriented market like Dubai, businesses demand transparency and ROI. SEM provides clear performance metrics from cost per acquisition to return on ad spend- making it one of the most accountable and scalable marketing channels available.</p>
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
            <h2 class="text-white fw-700 mb-4" style="font-size: 42px;">Search Engine Marketing Services</h2>
            <p class="fs-20 text-white opacity-70 mb-4">Search Engine Marketing (SEM) is a digital strategy designed to increase your brand’s visibility on search engine results pages (SERPs) through both organic optimisation and paid advertising. When executed correctly, SEM positions your business in front of customers at the exact moment they are searching for your products or services.</p>
            <p class="fs-18 text-white opacity-60 mb-5">However, appearing on the first page of Google is not just about visibility- it’s about relevance and intent. Driving traffic alone does not guarantee growth. The real impact comes from targeting the right audience with the right keywords, compelling ad messaging, and landing pages built to convert. SEM typically includes two core components:</p>
        </div>

        <div class="comparison-main-card">
            <div class="row">
                <div class="col-lg-6 comp-col">
                    <div class="comp-header">
                        <div class="organic-icon"><i class="ion-settings"></i></div>
                        <h3 class="organic-title">Organic Search (SEO)</h3>
                    </div>
                    <p class="text-white opacity-70 mb-4 fs-18">Organic SEO services in Dubai focuses on improving rankings through strategic content creation, technical optimisation, and authority building. Search engines prioritise user experience, rewarding websites that provide valuable, relevant, and high-quality information.</p>
                    <ul class="comp-list">
                        <li><i class="ion-checkmark-circled organic-title"></i> Long-term sustainable growth</li>
                        <li><i class="ion-checkmark-circled organic-title"></i> Builds brand authority and trust</li>
                        <li><i class="ion-checkmark-circled organic-title"></i> No cost-per-click charges</li>
                    </ul>
                    <div class="best-for-badge organic-badge">
                        Sustainable organic growth requires structured keyword research, consistent content strategy, and ongoing optimisation.
                    </div>
                </div>

                <div class="col-lg-6 comp-col">
                    <div class="comp-header">
                        <div class="paid-icon"><i class="ion-plane"></i></div>
                        <h3 class="paid-title">Paid Search (PPC Advertising)</h3>
                    </div>
                    <p class="text-white opacity-70 mb-4 fs-18">Paid search campaigns such as Google Ads allow businesses to appear instantly for high-intent keywords. Through pay-per-click (PPC) advertising, brands can target specific demographics, locations, and search behaviours.</p>
                    <ul class="comp-list">
                        <li><i class="ion-checkmark-circled paid-title"></i> Immediate visibility on page 1</li>
                        <li><i class="ion-checkmark-circled paid-title"></i> Targeting specific demographics & intent</li>
                        <li><i class="ion-checkmark-circled paid-title"></i> Precise measurement of ROI</li>
                    </ul>
                    <div class="best-for-badge paid-badge">
                        While paid campaigns can generate faster results, performance depends on strategic bidding and conversion-optimised landing pages.
                    </div>
                </div>
            </div>
        </div>

        <div class="comparison-quote-box">
            "At BrandStory, we are the best digital marketing agency in Dubai, combining both organic and paid search strategies to build scalable growth systems."
        </div>
    </div>
</section>

<div class="sp-80 container SEO-that-Ranks" id="SEO-campaign-highlights">
    <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Case Studies</h2>

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
</div>



<section class="sp-80 dm-bg">
    <div class="container">
        <h2 class="text-white text-center mb-5">Latest Blogs</h2>
        <?php include __DIR__ . '/../component/latest-blogs.php' ?>
    </div>
</section>

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
                                1. What does a search engine marketing agency in Dubai actually do?
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
                                2. What is the difference between SEO and Search Engine Marketing?
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
                                3. Why is search engine marketing important for businesses in Dubai?
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
                                4. What types of businesses benefit most from SEM services?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">Search engine marketing is highly effective for industries such as real estate, healthcare, eCommerce, hospitality, education, finance, and professional services. Any business targeting customers who search online for products or services can benefit from a well-structured SEM strategy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. How do you select the right keywords for an SEM campaign?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">Keyword selection is based on search intent, competition level, cost-per-click analysis, and conversion potential. At BrandStory, we focus on revenue-driving keywords rather than high-volume terms that don’t convert. Our strategy prioritises high-intent queries that align with your business objectives.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                6. What is PPC advertising and how does it support business growth?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">Pay-Per-Click (PPC) advertising is a paid search model where you only pay when someone clicks your ad. It allows precise targeting by location, audience behaviour, and device. When managed strategically, PPC generates qualified leads, improves brand visibility, and delivers measurable return on ad spend.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                7. How is the success of an SEM campaign measured?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">We track performance using metrics that directly impact revenue- including cost per lead, conversion rate, return on ad spend (ROAS), click-through rate, and customer acquisition cost. Transparent reporting ensures you understand exactly how your investment contributes to business growth.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                8. How quickly can I expect results from search engine marketing?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">Paid SEM campaigns can start generating traffic and leads within days of launch. However, consistent optimisation over several weeks improves performance, reduces costs, and increases overall return on investment. Sustainable results come from continuous data-driven refinement.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                9. How does BrandStory customise SEM strategies for the Dubai market?
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#semAccordion">
                            <div class="accordion-body">
                                <p class="fs-18">We tailor campaigns based on local search behaviour, competitor density, multilingual targeting needs, and industry-specific trends within Dubai. By combining market intelligence with advanced bidding strategies and conversion-focused landing pages, we build campaigns designed for scalable success.</p>
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