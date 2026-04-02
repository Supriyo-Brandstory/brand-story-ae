<div class="seo-agency-dubai-page">
    <!-- Section 1: Hero Banner (Based on sem-new-banner-section) -->
    <section class="sem-new-banner-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="sem-banner-left">
                        <span class="sem-badge mb-4 d-inline-block">PREMIUM SEO AGENCY DUBAI</span>
                        <h1 class="text-white mb-4">SEO Packages in Dubai with <span class="theme-highlight">Tailored SEO Strategies</span></h1>
                        
                        <div class="sem-banner-right position-relative d-lg-none mb-5">
                            <div class="laptop-mockup">
                                <img src="<?= base_url('assets/images/new-seo/seo-banner-1.webp') ?>" alt="SEO Agency Dubai" class="img-fluid" fetchpriority="high" loading="eager">
                            </div>
                        </div>

                        <p class="mb-md-5 mb-4 fs-20 text-white opacity-70">If you want a continuous presence on top of Google search results, our SEO packages are designed to push your website onto the first page of search rankings, boosting exposure and engagement.</p>
                        <div class="banner-btns d-flex flex-wrap gap-3">
                            <a href="/contact" class="Performance-Driven-btn">➤ Get Started Now</a>
                            <a href="#services" class="Performance-Driven-btn outline-btn">➤ Explore Services</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="sem-banner-right position-relative">
                        <div class="laptop-mockup">
                            <img src="<?= base_url('assets/images/new-seo/seo-banner-1.webp') ?>" alt="SEO Agency Dubai" class="img-fluid" fetchpriority="high" loading="eager">
                        </div>
                        <div class="floating-card-roas">
                            <div class="roas-circle">
                                <i class="ion-arrow-graph-up-right"></i>
                            </div>
                            <div class="roas-info">
                                <p>Keyword Growth</p>
                                <h4>+350%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Intro Section (Centered) -->
    <section class="sp-80 bg-black text-center" id="intro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <h2 class="text-white mb-4">Affordable SEO Services with BrandStory <br>Digital Marketing Company!!</h2>
                    <p class="text-white-50 fs-20">Get ready to reach on top of the search engine results with BrandStory’s strategies! Whether you’re a local SEO company in Dubai or an international business, we’ve got affordable SEO services in Dubai for you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Inside Your SEO Package (Icon Grid) -->
    <section class="sp-80 bg-black" id="services">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="text-white">Inside Your SEO Package in Dubai: What's Included?</h2>
                <p class="text-white-50 fs-18">A holistic approach to SEO that covers every technical and creative aspect.</p>
            </div>
            <div class="row mt-5">
                <?php
                $features = [
                    ['icon' => 'ion-ios-analytics', 'title' => 'Google Search Console', 'desc' => 'Comprehensive monitoring of your site\'s presence in Google Search results.'],
                    ['icon' => 'ion-stats-bars', 'title' => 'GA4 Management', 'desc' => 'Advanced tracking and data analysis to measure your ROI and user behavior.'],
                    ['icon' => 'ion-ios-search-strong', 'title' => 'SEMRUSH Analysis', 'desc' => 'In-depth competitor research and keyword gap analysis for a winning edge.'],
                    ['icon' => 'ion-link', 'title' => 'Backlink Audit', 'desc' => 'Ensuring a healthy backlink profile and removing toxic links to protect your rankings.'],
                    ['icon' => 'ion-ios-paper-outline', 'title' => 'Content Strategy', 'desc' => 'Data-driven content planning designed to attract and engage your ideal audience.'],
                    ['icon' => 'ion-ios-settings', 'title' => 'Technical Audit', 'desc' => 'Deep dive into site architecture, speed, and mobile responsiveness.'],
                ];
                foreach ($features as $f): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card-v2">
                        <div class="card-icon mb-4"><i class="<?= $f['icon'] ?> text-white fs-40"></i></div>
                        <h4 class="text-white mb-3"><?= $f['title'] ?></h4>
                        <p class="text-white-50"><?= $f['desc'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Section 4: Growth Strategy (Side-by-Side - Performance-Driven) -->
    <section class="Performance-Driven-wrapper bg-black sp-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 Performance-Driven-left">
                    <div class="Performance-Driven-image-wrapper">
                        <img src="<?= base_url('assets/images/home/google-analytics-result.webp') ?>" alt="SEO Results" class="Performance-Driven-elem elem1">
                        <img src="<?= base_url('assets/images/home/professional-digital-marketer.webp') ?>" alt="SEO Expert" class="Performance-Driven-main-img">
                    </div>
                </div>
                <div class="col-md-6 Performance-Driven-right ps-lg-5">
                    <h2 class="text-white mb-4">How can our SEO Agency <br>increase online sales or leads?</h2>
                    <p class="fs-20 text-white-50 mb-4">To supercharge your online presence with our SEO packages, our specialists keep an eye on every variable.</p>
                    <ul class="text-white-50 fs-18 list-unstyled">
                        <li class="mb-3 d-flex align-items-start gap-2"><img src="/assets/images/new-seo/righticon.svg" width="20" style="margin-top: 5px;"> <span><strong>Build Trust:</strong> We enhance your brand's authority and credibility in search results.</span></li>
                        <li class="mb-3 d-flex align-items-start gap-2"><img src="/assets/images/new-seo/righticon.svg" width="20" style="margin-top: 5px;"> <span><strong>User-Friendly Experience:</strong> Optimizing site structure for better engagement and retention.</span></li>
                        <li class="mb-3 d-flex align-items-start gap-2"><img src="/assets/images/new-seo/righticon.svg" width="20" style="margin-top: 5px;"> <span><strong>Conversion Rate:</strong> Turning traffic into loyal customers through strategic optimizations.</span></li>
                    </ul>
                    <a href="/contact" class="Performance-Driven-btn mt-4">➤ Consult Our Strategists</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: SEO Packages (Pricing Grid) -->
    <section class="sp-80 bg-black pricing-plan-for-seo" id="pricing">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="text-white">Your SEO Packages Dubai</h2>
                <p class="text-white-50 fs-18">Affordable SEO pricing for any digital marketing plan.</p>
            </div>
            <div class="row mt-5">
                <!-- Package 1 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="box h-100">
                        <h4>STARTER PACKAGE</h4>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <p class="fs-20 text-white mb-0">Local Focus</p>
                            <p class="price mb-0">1500<span>/mo</span></p>
                        </div>
                        <div class="divider my-4"></div>
                        <div class="content">
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>5 Target Keywords</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>On-Page Optimization</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>GMB Management</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>Monthly Reporting</span></p>
                        </div>
                        <div class="text-center mt-4">
                            <a href="/contact/" class="Performance-Driven-btn unique-btn w-100">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- Package 2 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="box mid-box h-100">
                        <h4>GROWTH PACKAGE</h4>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <p class="fs-20 text-white mb-0">Scale Business</p>
                            <p class="price mb-0">2500<span>/mo</span></p>
                        </div>
                        <div class="divider my-4"></div>
                        <div class="content">
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>15 Target Keywords</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>Competitor Analysis</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>Quality Link Building</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>Content Marketing</span></p>
                        </div>
                        <div class="text-center mt-4">
                            <a href="/contact/" class="Performance-Driven-btn unique-btn w-100">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- Package 3 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="box h-100">
                        <h4>ENTERPRISE PACKAGE</h4>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <p class="fs-20 text-white mb-0">Dominance</p>
                            <p class="price mb-0">3500<span>/mo</span></p>
                        </div>
                        <div class="divider my-4"></div>
                        <div class="content">
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>30+ Target Keywords</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>Enterprise SEO Audit</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>Dedicated Manager</span></p>
                            <p class="d-flex align-items-start gap-2 mb-3"><img src="/assets/images/new-seo/righticon.svg" width="18" style="margin-top: 5px;" /><span>Full ROI Tracking</span></p>
                        </div>
                        <div class="text-center mt-4">
                            <a href="/contact/" class="Performance-Driven-btn unique-btn w-100">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Section -->
    <section class="new-client-section bg-black sp-50">
        <div class="container-fluid">
            <h2 class="text-center mb-5 text-white">Trusting Our Results</h2>
            <?php include __DIR__ . '/../component/client_section.php' ?>
        </div>
    </section>

    <!-- Visit Office -->
    <!-- <section class="dm-dubai-office spb-50 bg-black">
        <div class="container border-top border-secondary pt-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <ul class="list-unstyled p-0 mb-0">
                        <li class="mb-3"><a class="text-white fs-20" href="tel:+971 52 283 1655"><img class="me-2" src="/assets/images/home/dubai-phone.svg">+971 52 283 1655</a></li>
                        <li><a class="text-white fs-20" href="mailto:info@brandstory.ae"><img class="me-2" src="/assets/images/home/dubai-mail.svg">info@brandstory.ae</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <img class="me-3" src="/assets/images/home/dubai-location.svg">
                        <div class="dubai-address">
                            <h3 class="mb-2 text-white">Visit Our SEO Hub</h3>
                            <p class="fs-20 mb-0"><a class="text-white text-decoration-underline" target="_blank" href="https://www.google.com/search?q=Brandstory+Dubai">G5, Al Meheri Plaza, Deira Dubai, UAE</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
</div>

<style>
    .service-card-v2 {
        padding: 40px;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        height: 100%;
        transition: all 0.3s ease;
    }
    .service-card-v2:hover {
        background: rgba(255,255,255,0.05);
        transform: translateY(-10px);
        border-color: #855bff;
    }
    .fs-40 { font-size: 40px; }
    .bg-black { background-color: #000 !important; }
    .sp-80 { padding: 80px 0; }
    
    /* Inherit/Custom Styles for pricing items if not already globally defined */
    .pricing-plan-for-seo .box {
        padding: 40px;
        background: #111;
        border: 1px solid #333;
        color: #fff;
    }
    .pricing-plan-for-seo .mid-box {
        border-color: #855bff;
        transform: scale(1.05);
    }
    .pricing-plan-for-seo .price {
        font-size: 32px;
        font-weight: 800;
        color: #855bff;
    }
    .pricing-plan-for-seo .price span {
        font-size: 14px;
        color: #999;
    }
    .pricing-plan-for-seo .divider {
        height: 1px;
        background: #333;
    }
    .outline-btn {
        background: transparent !important;
        border: 1px solid #fff !important;
        color: #fff !important;
    }
    .outline-btn:hover {
        background: #fff !important;
        color: #000 !important;
    }
</style>
