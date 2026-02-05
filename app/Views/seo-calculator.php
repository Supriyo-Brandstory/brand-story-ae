<section class="seo-calculator-banner dm-bg spt-50 position-relative overflow-hidden">
    <div class="banner-mesh"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">

                <h1 class="text-white mb-4 display-3 fw-900 lh-1">Maximize Your <br><span class="text-gradient-premium">SEO Value</span></h1>
                <p class="text-white-50 fs-20 mb-5 max-w-600 ">Stop guessing. Get a data-backed monthly investment forecast tailored to the Dubai market's complexity.</p>
                <div class="d-flex gap-3">

                    <a href="#calculator" class="Performance-Driven-btn mb-5 " bis_skin_checked="1">➤ Start Calculation</a>
                    <a href="<?= route('contact') ?>" class="Performance-Driven-btn mb-5 " bis_skin_checked="1">➤ Consult Expert</a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <div class="banner-img-wrapper">

                    <img src="<?= base_url('assets/images/seeo.png') ?>" alt="SEO Cost Calculator" class="img-fluid floating-img">
                </div>
            </div>
        </div>
    </div>


    <section id="calculator" class="seo-calculator-main sp-80 bg-white position-relative">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span class="text-blue fw-bold text-uppercase ls-2">Business Metrics</span>
                <h2 class="h1 fw-bold mt-2">Personalize Your SEO Forecast</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="calculator-card glass-card p-4 p-md-5 radius-24 shadow-hover">
                        <form id="seoCalcForm">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label-premium">Target Audience</label>
                                    <div class="select-wrapper">
                                        <select class="form-select-premium" id="target_audience">
                                            <option value="local" selected>Local (City specific)</option>
                                            <option value="national">National (UAE wide)</option>
                                            <option value="international">International (Global)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">Physical Business Locations</label>
                                    <div class="select-wrapper">
                                        <select class="form-select-premium" id="physical_location">
                                            <option value="no" selected>Digital Only (No Shop)</option>
                                            <option value="1-3">1 - 3 Locations</option>
                                            <option value="4-10">4 - 10 Locations</option>
                                            <option value="10+">Enterprise (10+)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">Page Optimization Volume</label>
                                    <div class="select-wrapper">
                                        <select class="form-select-premium" id="pages_count">
                                            <option value="1-10" selected>Starter (1-10 Pages)</option>
                                            <option value="11-30">Standard (11-30 Pages)</option>
                                            <option value="31-50">Growth (31-50 Pages)</option>
                                            <option value="50+">Enterprise (50+ Pages)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-premium">Campaign Agility</label>
                                    <div class="select-wrapper">
                                        <select class="form-select-premium" id="aggressiveness">
                                            <option value="slow">Organic Speed</option>
                                            <option value="moderate" selected>Steady Growth</option>
                                            <option value="aggressive">High Momentum</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="slider-box p-4 radius-16 bg-white shadow-sm border">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <label class="form-label-premium mb-0">Website Maturity</label>
                                            <span class="badge bg-blue-soft text-blue px-3 py-2 radius-10" id="age_display">1-5 Years</span>
                                        </div>
                                        <input type="range" class="form-range premium-range" id="website_age" min="0" max="2" step="1" value="1">
                                        <div class="d-flex justify-content-between mt-2 small text-muted px-1">
                                            <span class="age-label-text pointer" data-idx="0">New Launch</span>
                                            <span class="age-label-text pointer fw-bold text-blue" data-idx="1">Growing</span>
                                            <span class="age-label-text pointer" data-idx="2">Established</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="slider-box p-4 radius-16 bg-white shadow-sm border">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <label class="form-label-premium mb-0">Industry Competition</label>
                                            <span class="badge bg-green-soft text-success px-3 py-2 radius-10" id="comp_display">Medium</span>
                                        </div>
                                        <input type="range" class="form-range premium-range range-green" id="competition_level" min="0" max="2" step="1" value="1">
                                        <div class="d-flex justify-content-between mt-2 small text-muted px-1">
                                            <span class="comp-label-text pointer" data-idx="0">Low</span>
                                            <span class="comp-label-text pointer fw-bold text-success" data-idx="1">Medium</span>
                                            <span class="comp-label-text pointer" data-idx="2">High</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="slider-box p-4 radius-16 bg-white shadow-sm border">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <label class="form-label-premium mb-0">Current Keyword Visibility</label>
                                            <span class="badge bg-red-soft text-danger px-3 py-2 radius-10" id="rank_display">31+ Rank</span>
                                        </div>
                                        <input type="range" class="form-range premium-range range-red" id="keyword_rank" min="0" max="2" step="1" value="2">
                                        <div class="d-flex justify-content-between mt-2 small text-muted px-1">
                                            <span class="rank-label-text pointer" data-idx="0">First Page</span>
                                            <span class="rank-label-text pointer" data-idx="1">Page 2-3</span>
                                            <span class="rank-label-text pointer fw-bold text-danger" data-idx="2">Untracked</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div>
                        <div class="results-card glass-card p-4 p-md-5 radius-24 shadow-lg text-center overflow-hidden position-relative border-blue">
                            <div class="card-glow"></div>
                            <h2 class="text-dark mb-4 fs-28 fw-800">Your Investment Estimate</h2>

                            <div class="illustration-wrapper mb-4">
                                <div class="blob-bg"></div>
                                <img src="<?= base_url('assets/images/Digital-Marketing-Graphic.webp') ?>" alt="Monthly Investment" class="img-fluid pulse-img" style="max-height: 220px;">
                            </div>

                            <div class="price-container mb-2 text-gradient-dark">
                                <h2 class="" id="res_price_range">AED 1,500 - 2,500</h2>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
                                <i class="ion-checkmark-circled text-success fs-20"></i>
                                <span class="text-muted ">Professional Agency Standard</span>
                            </div>

                            <div class="actions-group">
                                <button type="button" class="btn btn-blue-gradient btn-lg w-100 mb-3 shadow-blue" data-bs-toggle="modal" data-bs-target="#leadModal">
                                    <i class="ion-paper-airplane"></i> Get Detailed Proposal
                                </button>
                                <button type="button" class="btn btn-link text-muted fs-14 transition-all opacity-7 hover-1" id="resetCalc">
                                    <i class="ion-refresh me-1"></i> New Calculation
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section 1: How It Works - Reimagined -->
    <section class="how-it-works sp-120 bg-light position-relative">
        <div class="circle-gradient opacity-20"></div>
        <div class="container position-relative">
            <div class="section-title text-center mb-5 pb-4">
                <span class="badge bg-blue-soft text-blue px-3 py-2 radius-50 fw-700 text-uppercase ls-1 mb-3">Transparent Process</span>
                <h2 class="display-4 fw-900 text-dark mb-4">Data-Driven <span class="text-blue">Estimation</span></h2>
                <div class="divider-center"></div>
                <p class="text-muted mt-4 max-w-600 mx-auto fs-18 ">Our proprietary algorithm analyzes over 50+ variables to give you the most accurate SEO investment forecast in the market.</p>
            </div>

            <div class="process-flow-wrapper mt-5">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-4">
                        <div class="process-step-card p-5 text-center">
                            <div class="step-number">01</div>
                            <div class="step-icon-wrap mb-4 mx-auto">
                                <i class="ion-ios-compose-outline pulse-icon"></i>
                            </div>
                            <h4 class="fw-bold h4 mb-3">Requirement Scan</h4>
                            <p class="text-muted fs-15 lh-lg">We capture your specific niche data, current domain authority, and target market complexity.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="process-step-card p-5 text-center active-step">
                            <div class="step-number">02</div>
                            <div class="step-icon-wrap mb-4 mx-auto shadow-blue">
                                <i class="ion-ios-shuffle"></i>
                            </div>
                            <h4 class="fw-bold h4 mb-3">Algorithmic Match</h4>
                            <p class="text-muted fs-15 lh-lg">Our engine benchmarks your needs against 100+ successful Dubai-based SEO campaigns.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="process-step-card p-5 text-center">
                            <div class="step-number">03</div>
                            <div class="step-icon-wrap mb-4 mx-auto">
                                <i class="ion-ios-checkmark-outline"></i>
                            </div>
                            <h4 class="fw-bold h4 mb-3">Investment Roadmap</h4>
                            <p class="text-muted fs-15 lh-lg">Receive a precise, tiered investment range designed to yield maximum ROI at scale.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Core SEO Services - Premium Grid -->
    <section class="core-services sp-120 bg-white text-dark overflow-hidden position-relative">
        <div class="mesh-glow"></div>
        <div class="container position-relative">
            <div class="row align-items-end mb-5 pb-3">
                <div class="col-lg-7">
                    <span class="text-blue fw-700 text-uppercase ls-2 d-block mb-3">Comprehensive Package</span>
                    <h2 class="display-4 fw-800">What Drives Your <span class="text-blue">Growth?</span></h2>
                </div>
                <div class="col-lg-5">
                    <p class="text-muted fs-18 mb-0">Beyond technical fixes, we focus on revenue-driven strategies that keep you ahead of the competition.</p>
                </div>
            </div>

            <div class="row g-4">
                <?php
                $services = [
                    ['icon' => 'ion-ios-search-strong', 'title' => 'Keyword Intelligence', 'desc' => 'In-depth semantic research to capture high-intent users at every stage of the funnel.'],
                    ['icon' => 'ion-code-working', 'title' => 'Technical Audit', 'desc' => 'Advanced schema, Core Web Vitals, and server-side optimizations for peak performance.'],
                    ['icon' => 'ion-ios-paper-outline', 'title' => 'Content Authority', 'desc' => 'E-E-A-T driven content production that establishes your brand as a market leader.'],
                    ['icon' => 'ion-ios-analytics-outline', 'title' => 'Link Ecosystems', 'desc' => 'High-quality link building focused on relevance and authority, not just volume.'],
                    ['icon' => 'ion-map', 'title' => 'Hyper-Local SEO', 'desc' => 'Dominate regional searches with optimized Google Business Profiles and local citations.'],
                    ['icon' => 'ion-ios-speedometer-outline', 'title' => 'Lead Attribution', 'desc' => 'Crystal clear reporting that connects SEO efforts directly to your bottom-line revenue.'],
                ];
                foreach ($services as $s): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card-premium h-100">
                            <div class="sc-icon-box">
                                <i class="<?= $s['icon'] ?>"></i>
                            </div>
                            <h4 class="fw-bold h5 mb-3"><?= $s['title'] ?></h4>
                            <p class="text-white-50 fs-14 mb-0"><?= $s['desc'] ?></p>
                            <div class="sc-hover-accent"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Section 3: Pricing Factors - Side by Side Glass -->
    <section class="pricing-factors sp-120 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="image-reveal-wrapper">
                        <div class="reveal-overlay"></div>
                        <img src="<?= base_url('assets/images/Branding-Strategy.webp') ?>" alt="SEO Strategy" class="img-fluid radius-24 shadow-2xl">
                        <div class="floating-stat-card shadow-lg">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-circle"><i class="ion-arrow-graph-up-right"></i></div>
                                <div>
                                    <div class="fw-800 h4 mb-0">+300%</div>
                                    <div class="text-muted fs-12 uppercase fw-700">Avg Traffic Lift</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ps-lg-4">
                        <span class="text-blue fw-700 text-uppercase ls-2 d-block mb-3">Pricing Insight</span>
                        <h2 class="display-5 fw-800 mb-4">Investment <span class="text-blue">Variability</span></h2>
                        <p class="text-muted fs-18 mb-5">Understand the levers that influence your SEO budget for a more strategic digital investment.</p>

                        <div class="factor-accordion">
                            <div class="factor-row">
                                <div class="fr-icon shadow-sm"><i class="ion-ios-bolt"></i></div>
                                <div class="fr-content">
                                    <h5 class="fw-800 mb-1">Industry Velocity</h5>
                                    <p class="text-muted fs-14 mb-0">High-churn markets like Finance require daily optimization to maintain rankings.</p>
                                </div>
                            </div>
                            <div class="factor-row">
                                <div class="fr-icon shadow-sm"><i class="ion-ios-world-outline"></i></div>
                                <div class="fr-content">
                                    <h5 class="fw-800 mb-1">Market Geo-Scope</h5>
                                    <p class="text-muted fs-14 mb-0">Multi-lingual or multi-country SEO mandates exponentially more technical resources.</p>
                                </div>
                            </div>
                            <div class="factor-row">
                                <div class="fr-icon shadow-sm"><i class="ion-ios-flask-outline"></i></div>
                                <div class="fr-content">
                                    <h5 class="fw-800 mb-1">Asset Health</h5>
                                    <p class="text-muted fs-14 mb-0">Your existing backlink profile and technical debt dictate the initial "recovery" effort.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Why BrandStory - The Dark Glow -->
    <section class="why-brandstory sp-150 bg-white text-dark overflow-hidden position-relative border-top border-bottom">
        <div class="container position-relative">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-8">
                    <h2 class="display-3 fw-900 mb-4 lh-1 text-dark">Dubai's Elite <br><span class="text-blue">Search Partner</span></h2>
                    <p class="fs-20 text-muted mb-5 pe-lg-5">We bridge the gap between complex search algorithms and your business revenue goals through battle-tested strategies.</p>

                    <div class="row g-4 counter-grid justify-content-center justify-content-lg-start">
                        <div class="col-6 col-md-4">
                            <div class="stat-box">
                                <h2 class="display-5 fw-800 mb-0 text-blue">500+</h2>
                                <span class="text-muted fs-13 uppercase fw-700 ls-1">Brands Scaled</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="stat-box">
                                <h2 class="display-5 fw-800 mb-0 text-blue">10y+</h2>
                                <span class="text-muted fs-13 uppercase fw-700 ls-1">Search Legacy</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="stat-box">
                                <h2 class="display-5 fw-800 mb-0 text-blue">98%</h2>
                                <span class="text-muted fs-13 uppercase fw-700 ls-1">Client Success</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="cta-master-box shadow-lg glass-card p-5">
                        <h4 class="fw-800 mb-4 text-dark">Start Your <br>Conversion Story</h4>
                        <p class="text-muted fs-14 mb-4">Our strategy experts are ready to audit your current performance.</p>
                        <a href="<?= route('contact') ?>" class="btn btn-blue-gradient w-100"><i class="ion-android-arrow-dropright-circle"></i> Free Consultation</a>
                        <div class="mt-3 fs-12 text-muted"><i class="ion-clock fs-14 me-1"></i> Response within 4 business hours</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- Section 5: FAQ - Minimalist Apple Style -->
<section class="dm-page service-page ppc">
    <div class=" sp-50">
        <div class="container">
            <h2 class="text-center mb-lg-5 mb-4">Your SEO Questions <span class="text-blue">Answered</span></h2>
            <div class="dm-faq-main max-1000">
                <div class="accordion accordion-flush" id="accordionFlushExampleSEO">

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO1" aria-expanded="false" aria-controls="flush-collapseSEO1">
                                How accurate is this SEO cost calculator?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO1" class="accordion-collapse collapse show" aria-labelledby="flush-headingSEO1" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Our calculator uses real-time market data and benchmarks from over 100+ successful campaigns in Dubai to provide a highly realistic investment range. While the estimate is highly accurate for market standards, a final tailored quote is provided after a comprehensive technical audit and competitor analysis of your specific domain.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO2" aria-expanded="false" aria-controls="flush-collapseSEO2">
                                What factors influence the cost of SEO in the UAE?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO2" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO2" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Several factors drive SEO pricing, including your industry's competition level, the current authority of your domain, the geographical scope (local, national, or international), and the volume of pages that need optimization. Higher competition niches like Real Estate or Legal services typically require more intensive resources.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO3" aria-expanded="false" aria-controls="flush-collapseSEO3">
                                Why is SEO considered a better long-term investment than PPC?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO3" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO3" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">While PPC offers immediate visibility, you stop receiving traffic the moment you stop paying. SEO builds "digital equity." Once your website ranks organically, the traffic is free and sustainable. Over time, the cost-per-acquisition for SEO is significantly lower than any paid advertising channel.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO4" aria-expanded="false" aria-controls="flush-collapseSEO4">
                                Do I need monthly SEO or is it a one-time fix?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO4" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO4" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Search engines update their algorithms monthly and your competitors are likely optimizing their sites every day. Monthly SEO ensures your rankings are not only achieved but maintained and scaled. It allows for continuous content production, link building, and technical monitoring to stay ahead of market shifts.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO5" aria-expanded="false" aria-controls="flush-collapseSEO5">
                                What is 'Technical SEO' and why does it impact the price?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO5" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO5" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Technical SEO involves optimizing your website's backend (site speed, mobile-friendliness, schema markup, and crawling efficiency). If your site has significant "technical debt," the initial investment might be higher to build a solid foundation that allows your content to rank effectively.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO6" aria-expanded="false" aria-controls="flush-collapseSEO6">
                                How does Local SEO help my Dubai-based business?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO6" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO6" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Local SEO focuses on dominating searches in specific geographic areas like "Downtown Dubai" or "Marina." By optimizing your Google Business Profile and local citations, we ensure your business appears in the "Map Pack" when potential customers are specifically looking for services in their immediate vicinity.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO7" aria-expanded="false" aria-controls="flush-collapseSEO7">
                                What kind of reporting should I expect?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO7" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO7" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">We believe in absolute transparency. You will receive monthly reports that track keyword rankings, organic traffic growth, and conversions. We don't just show you "vanity metrics"; we show you how our SEO efforts are contributing to your bottom-line revenue.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO8" aria-expanded="false" aria-controls="flush-collapseSEO8">
                                Why should I choose BrandStory?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO8" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO8" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">BrandStory uses data-driven, "white-hat" strategies focused on E-E-A-T (Experience, Expertise, Authoritativeness, and Trustworthiness) to ensure long-term, penalty-proof success. We are one of Dubai's leading agencies with a proven track record of scaling over 500+ brands.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO9" aria-expanded="false" aria-controls="flush-collapseSEO9">
                                How soon can I see tangible results?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO9" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO9" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">SEO is an investment in long-term equity. While minor technical gains and improved indexing can be seen within 30 days, sustainable organic traffic growth and bottom-line impact typically materialize between months 4 and 8, depending on competition.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-headingSEO10">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSEO10" aria-expanded="false" aria-controls="flush-collapseSEO10">
                                Are there long-term contracts?
                            </button>
                        </h4>
                        <div id="flush-collapseSEO10" class="accordion-collapse collapse" aria-labelledby="flush-headingSEO10" data-bs-parent="#accordionFlushExampleSEO">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">We believe in results-based partnerships. While we offer flexible monthly retainers, we recommend a 6 to 12-month window to allow our data-driven strategies to reach their full compounding potential and deliver a significant return on investment.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<style>
    /* Content Section Styling Refinement */
    .sp-120 {
        padding: 120px 0;
    }

    .sp-150 {
        padding: 150px 0;
    }

    .bg-dot-grid {
        background-image: radial-gradient(#d1d5db 1px, transparent 1px);
        background-size: 30px 30px;
    }

    .radius-50 {
        border-radius: 50px;
    }

    .fw-800 {
        font-weight: 800;
    }

    .fw-900 {
        font-weight: 900;
    }

    .lh-1 {
        line-height: 1.1;
    }

    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }

    .bg-dark-navy {
        background: #0f172a;
    }

    .bg-royal-blue {
        background: #1e3a8a;
    }

    .text-soft-blue {
        color: #93c5fd;
    }

    /* Section 1: Process */
    .process-step-card {
        position: relative;
        border-right: 1px solid #f1f5f9;
        transition: 0.3s;
    }

    .col-lg-4:last-child .process-step-card {
        border-right: none;
    }

    .step-number {
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 60px;
        font-weight: 900;
        color: #f8fafc;
        z-index: 0;
    }

    .step-icon-wrap {
        width: 90px;
        height: 90px;
        background: white;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        font-size: 36px;
        color: var(--accent-blue);
    }

    .active-step {
        background: white;
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.05);
        z-index: 2;
        border-radius: 24px;
        border-right-color: transparent;
    }

    .active-step .step-icon-wrap {
        background: var(--accent-blue);
        color: white;
    }

    /* Section 2: Services */
    .mesh-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 150%;
        height: 150%;
        transform: translate(-50%, -50%);
        background: radial-gradient(circle at center, rgba(30, 58, 138, 0.3), transparent 60%);
        pointer-events: none;
    }

    .text-gradient-premium {
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .service-card-premium {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 45px;
        border-radius: 28px;
        transition: 0.4s;
        position: relative;
        overflow: hidden;
    }

    .service-card-premium:hover {
        background: rgba(255, 255, 255, 0.06);
        transform: translateY(-10px);
    }

    .sc-icon-box {
        width: 50px;
        height: 50px;
        font-size: 32px;
        color: var(--accent-blue);
        margin-bottom: 25px;
    }

    .sc-hover-accent {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 4px;
        background: var(--accent-blue);
        transition: 0.4s;
    }

    .service-card-premium:hover .sc-hover-accent {
        width: 100%;
    }

    /* Section 3: Factors */
    .image-reveal-wrapper {
        position: relative;
        padding: 20px;
    }

    .floating-stat-card {
        position: absolute;
        bottom: 50px;
        right: -20px;
        background: white;
        padding: 25px;
        border-radius: 20px;
        min-width: 220px;
        z-index: 2;
    }

    .stat-circle {
        width: 45px;
        height: 45px;
        background: #dcfce7;
        color: #16a34a;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .factor-row {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
        align-items: flex-start;
    }

    .fr-icon {
        width: 45px;
        height: 45px;
        background: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--accent-blue);
        font-size: 20px;
    }

    /* Section 4: Why Us */
    .glow-orb {
        position: absolute;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        filter: blur(120px);
        z-index: 0;
        opacity: 0.3;
    }

    .g-1 {
        top: -300px;
        right: -300px;
        background: #3b82f6;
    }

    .g-2 {
        bottom: -300px;
        left: -300px;
        background: #1d4ed8;
    }

    .cta-master-box {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 50px;
        border-radius: 32px;
        position: relative;
        z-index: 1;
    }

    .stat-box {
        border-left: 1px solid rgba(255, 255, 255, 0.1);
        padding-left: 20px;
    }

    /* Section 5: FAQ */
    .minimal-faq .accordion-item {
        border: none;
        border-bottom: 1px solid #f1f5f9;
    }

    .minimal-faq .accordion-button {
        padding: 25px 0;
        background: transparent !important;
        box-shadow: none !important;
        font-size: 19px;
        font-weight: 700;
        color: #1e293b;
        border: none;
    }

    .minimal-faq .accordion-body {
        padding: 0 0 30px 0;
    }

    .minimal-faq .accordion-button:not(.collapsed) {
        color: var(--accent-blue);
    }

    .minimal-faq .accordion-button::after {
        background-size: 15px;
    }
</style>


<!-- Lead Modal -->
<div class="modal fade" id="leadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-24 border-0 shadow-lg overflow-hidden">
            <div class="modal-header border-0 bg-blue-gradient text-white p-4">
                <h5 class="modal-title h4 fw-bold mb-0">Unlock Your Report</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <form id="seoLeadForm" action="<?= route('seo.calculator.submit') ?>" method="POST">
                    <?= csrf_token() ?>
                    <input type="hidden" name="honeypot" value="">

                    <!-- Hidden inputs for calculator values -->
                    <input type="hidden" name="target_audience" id="f_audience">
                    <input type="hidden" name="pages_to_optimize" id="f_pages">
                    <input type="hidden" name="website_age" id="f_age">
                    <input type="hidden" name="locations" id="f_locations">
                    <input type="hidden" name="aggressiveness" id="f_agg">
                    <input type="hidden" name="competition_level" id="f_comp">
                    <input type="hidden" name="keyword_rank" id="f_rank">
                    <input type="hidden" name="est_price_range" id="f_range">

                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control premium-input" id="leadName" placeholder="John Doe" required>
                                <label for="leadName">Full Name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control premium-input" id="leadEmail" placeholder="name@company.com" required>
                                <label for="leadEmail">Business Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" class="form-control premium-input" id="leadPhone" placeholder="+971" required>
                                <label for="leadPhone">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-4">
                                <input type="url" name="website" class="form-control premium-input" id="leadWeb" placeholder="https://" required>
                                <label for="leadWeb">Website URL</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="submitBtn" class="btn btn-blue-gradient w-100 shadow-blue">
                        <i class="ion-paper-airplane"></i> Send Proposal Request
                    </button>
                    <div id="formMsg" class="mt-3"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
    :root {
        --primary-blue: #1e3a8a;
        --accent-blue: #3b82f6;
        --light-blue: #eff6ff;
        --soft-bg: #f8fafc;
        --dark-navy: #0f172a;
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: #334155;
        font-size: 16px;
    }

    /* Padding Utilities */
    .sp-50 {
        padding: 50px 0;
    }

    .sp-80 {
        padding: 80px 0;
    }

    .sp-120 {
        padding: 120px 0;
    }

    .sp-150 {
        padding: 150px 0;
    }

    /* Typography & Effects */


    .fw-600 {
        font-weight: 600;
    }

    .fw-700 {
        font-weight: 700;
    }

    .fw-800 {
        font-weight: 800;
    }

    .fw-900 {
        font-weight: 900;
    }

    .ls-1 {
        letter-spacing: 1px;
    }

    .ls-2 {
        letter-spacing: 2px;
    }

    .lh-1 {
        line-height: 1.1;
    }

    .text-gradient-premium {
        background: linear-gradient(135deg, #fff, #93c5fd);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .bg-blue-gradient {
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
    }

    .btn-blue-gradient {
        background: #000;
        color: white;
        border: 1px solid var(--accent-blue);
        border-radius: 50px !important;
        padding: 14px 35px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-blue-gradient:hover {
        background: #111;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.3);
        border-color: #60a5fa;
    }

    .btn-blue-gradient i {
        font-size: 1.2rem;
        transition: 0.3s;
    }

    .btn-blue-gradient:hover i {
        transform: translate(3px, -2px);
    }

    /* Wave Divider */
    .wave-divider {
        position: relative;
        top: -1px;
        width: 100%;
        overflow: hidden;
        line-height: 0;
    }

    .wave-divider svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 80px;
    }

    .wave-divider .shape-fill {
        fill: var(--primary-blue);
    }

    /* Glassmorphism */
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        transition: 0.4s;
    }

    .glass-dark {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Sliders & Forms */
    .slider-box {
        border: 1px solid rgba(0, 0, 0, 0.05) !important;
        transition: 0.3s;
    }

    .slider-box:hover {
        border-color: var(--accent-blue) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05) !important;
    }

    .premium-range {
        height: 8px;
        background: #e2e8f0;
        border-radius: 10px;
    }

    .premium-range::-webkit-slider-thumb {
        width: 24px;
        height: 24px;
        background: #fff;
        border: 4px solid var(--accent-blue);
        box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
    }

    /* Form Controls Premium */
    .form-label-premium {
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 12px;
        display: block;
    }

    .select-wrapper {
        position: relative;
    }

    .form-select-premium {
        width: 100%;
        padding: 15px 20px;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #1e293b;
        font-weight: 600;
        font-size: 15px;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
        background-size: 18px;
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-select-premium:focus {
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
        background-color: #f8fafc;
    }

    .premium-input {
        border: 1px solid #e2e8f0 !important;
        border-radius: 14px !important;
        font-weight: 500;
        transition: 0.3s !important;
    }

    .premium-input:focus {
        border-color: var(--accent-blue) !important;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1) !important;
        background-color: #f8fafc !important;
    }

    /* Specific Sections */
    .service-card-premium {
        background: #fff;
        border: 1px solid #f1f5f9;
        padding: 40px;
        border-radius: 30px;
        transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
    }

    .service-card-premium:hover {
        background: #fff;
        border-color: var(--accent-blue);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.08);
        transform: translateY(-5px);
    }

    .service-card-premium .text-white-50 {
        color: #64748b !important;
    }

    .sc-icon-box {
        width: 60px;
        height: 60px;
        background: var(--light-blue);
        color: var(--accent-blue);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 25px;
    }

    .process-step-card {
        transition: 0.4s;
        border-radius: 32px;
        position: relative;
        z-index: 1;
    }

    .process-step-card:hover,
    .process-step-card.active-step {
        background: white;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.08);
        transform: translateY(-10px);
    }

    .step-number {
        font-size: 60px;
        font-weight: 900;
        color: rgba(59, 130, 246, 0.05);
        position: absolute;
        top: 20px;
        right: 30px;
        line-height: 1;
    }

    .step-icon-wrap {
        width: 80px;
        height: 80px;
        background: #fff;
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: var(--accent-blue);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
        transition: 0.3s;
    }

    .active-step .step-icon-wrap {
        background: var(--accent-blue);
        color: #fff;
        box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3);
    }

    .pulse-icon {
        animation: pulse-blue 2s infinite;
    }

    @keyframes pulse-blue {
        0% {
            transform: scale(0.95);
            text-shadow: 0 0 0 rgba(59, 130, 246, 0.7);
        }

        70% {
            transform: scale(1);
            text-shadow: 0 0 20px rgba(59, 130, 246, 0);
        }

        100% {
            transform: scale(0.95);
            text-shadow: 0 0 0 rgba(59, 130, 246, 0);
        }
    }

    .divider-center {
        width: 60px;
        height: 4px;
        background: var(--accent-blue);
        margin: 0 auto;
        border-radius: 2px;
    }

    .bg-light {
        background-color: #f8fafc !important;
    }

    .radius-24 {
        border-radius: 24px;
    }

    .radius-32 {
        border-radius: 32px;
    }

    /* Responsive & Overrides */
    .display-3 {
        font-size: 48px !important;
        font-weight: 700 !important;
    }

    .display-4 {
        font-size: 42px !important;
        font-weight: 700 !important;
    }

    .display-5 {
        font-size: 36px !important;
        font-weight: 700 !important;
    }

    h2.h1,
    .h1-style {
        font-size: 42px !important;
        font-weight: 700 !important;
    }

    .fs-20 {
        font-size: 20px !important;
    }

    @media (max-width: 991px) {
        .stat-box {
            border-left: none;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
            padding-left: 0;
        }

        .display-3 {
            font-size: 32px !important;
        }

        .display-4 {
            font-size: 28px !important;
        }
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selects = ['target_audience', 'physical_location', 'pages_count', 'aggressiveness'];
        const sliders = ['website_age', 'competition_level', 'keyword_rank'];

        const priceDisplay = document.getElementById('res_price_range');

        function updateSliderLabels() {
            const ageVal = document.getElementById('website_age').value;
            const ages = ['New Launch', 'Growing', 'Established'];
            document.getElementById('age_display').textContent = ages[ageVal];

            const ageLabels = document.querySelectorAll('.age-label-text');
            ageLabels.forEach(l => {
                l.classList.remove('fw-bold', 'text-blue');
                if (l.dataset.idx == ageVal) l.classList.add('fw-bold', 'text-blue');
            });

            const compVal = document.getElementById('competition_level').value;
            const levels = ['Low Competition', 'Medium Competition', 'High Intensity'];
            document.getElementById('comp_display').textContent = levels[compVal];

            const compLabels = document.querySelectorAll('.comp-label-text');
            compLabels.forEach(l => {
                l.classList.remove('fw-bold', 'text-success');
                if (l.dataset.idx == compVal) l.classList.add('fw-bold', 'text-success');
            });

            const rankVal = document.getElementById('keyword_rank').value;
            const ranks = ['Top 10 Ranked', 'Page 2-3', 'Not Visible'];
            document.getElementById('rank_display').textContent = ranks[rankVal];

            const rankLabels = document.querySelectorAll('.rank-label-text');
            rankLabels.forEach(l => {
                l.classList.remove('fw-bold', 'text-danger');
                if (l.dataset.idx == rankVal) l.classList.add('fw-bold', 'text-danger');
            });
        }

        function calculate() {
            let base = 800; // Updated base for premium services

            const aud = document.getElementById('target_audience').value;
            if (aud === 'national') base += 600;
            else if (aud === 'international') base += 1400;

            const phys = document.getElementById('physical_location').value;
            if (phys === '1-3') base += 500;
            else if (phys === '4-10') base += 1200;
            else if (phys === '10+') base += 2500;

            const pgs = document.getElementById('pages_count').value;
            if (pgs === '11-30') base += 400;
            else if (pgs === '31-50') base += 900;
            else if (pgs === '50+') base += 1800;

            const agg = document.getElementById('aggressiveness').value;
            if (agg === 'moderate') base += 600;
            else if (agg === 'aggressive') base += 1800;

            base += (parseInt(document.getElementById('competition_level').value) * 500);
            base += (2 - parseInt(document.getElementById('website_age').value)) * 400;
            base += (parseInt(document.getElementById('keyword_rank').value)) * 300;

            const min = Math.round((base * 0.95) / 100) * 100;
            const max = Math.round((base * 1.4) / 100) * 100;

            const rangeText = `AED ${min.toLocaleString()} - ${max.toLocaleString()}`;
            priceDisplay.textContent = rangeText;

            updateSliderLabels();

            // sync hidden fields
            const audSel = document.getElementById('target_audience');
            const locSel = document.getElementById('physical_location');
            const pgSel = document.getElementById('pages_count');
            const aggSel = document.getElementById('aggressiveness');

            document.getElementById('f_audience').value = audSel.options[audSel.selectedIndex].text;
            document.getElementById('f_pages').value = pgSel.options[pgSel.selectedIndex].text;
            document.getElementById('f_locations').value = locSel.options[locSel.selectedIndex].text;
            document.getElementById('f_agg').value = aggSel.options[aggSel.selectedIndex].text;
            document.getElementById('f_age').value = document.getElementById('age_display').textContent;
            document.getElementById('f_comp').value = document.getElementById('comp_display').textContent;
            document.getElementById('f_rank').value = document.getElementById('rank_display').textContent;
            document.getElementById('f_range').value = rangeText;
        }

        [...selects, ...sliders].forEach(id => {
            document.getElementById(id).addEventListener('input', calculate);
        });

        document.getElementById('resetCalc').addEventListener('click', () => {
            document.getElementById('seoCalcForm').reset();
            calculate();
        });

        calculate();

        // Lead Form Submission
        const leadForm = document.getElementById('seoLeadForm');
        const submitBtn = document.getElementById('submitBtn');
        const formMsg = document.getElementById('formMsg');

        leadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitBtn.disabled = true;
            submitBtn.textContent = 'Processing...';

            const formData = new FormData(this);
            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        formMsg.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                        setTimeout(() => window.location.href = data.redirect_url, 2000);
                    } else {
                        formMsg.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Send Proposal Request';
                    }
                })
                .catch(err => {
                    formMsg.innerHTML = `<div class="alert alert-danger">An unexpected error occurred.</div>`;
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Send Proposal Request';
                });
        });
    });
</script>