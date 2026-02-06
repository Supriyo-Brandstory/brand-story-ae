<section class="seo-calculator-banner dm-bg spt-50 position-relative overflow-hidden">
    <div class="banner-mesh"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="text-white mb-4 display-3 fw-900 lh-1">Digital Agency <br><span class="text-gradient-premium">Cost Calculator</span></h1>
                <p class="text-white-50 fs-20 mb-4 mb-md-5 max-w-600">Know your project's worth. Get an instant, data-backed estimate of agency hourly rates tailored to your specific needs.</p>
                <div class="d-flex flex-column flex-sm-row gap-3 mb-4 mb-md-5">
                    <a href="#calculator" class="Performance-Driven-btn" bis_skin_checked="1">➤ Start Calculation</a>
                    <a href="<?= route('contact') ?>" class="Performance-Driven-btn" bis_skin_checked="1">➤ Consult Expert</a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <div class="banner-img-wrapper">
                    <img src="<?= base_url('assets/images/digital-marketing.png') ?>" alt="Digital Cost Calculator" class="img-fluid floating-img">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="calculator" class="seo-calculator-main sp-80 bg-white position-relative">
    <div class="container">
        <div class="section-title text-center mb-5">
            <span class="text-blue fw-bold text-uppercase ls-2">Project Metrics</span>
            <h2 class="h1 fw-bold mt-2">Estimate Agency Hourly Rates</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-8 order-2 order-lg-1">
                <div class="calculator-card glass-card p-4 p-md-5 radius-24 shadow-hover">
                    <form id="digitalCalcForm">
                        <!-- Agency Location -->
                        <div class="mb-5">
                            <label class="form-label-premium mb-3">Agency Location</label>
                            <input type="text" class="form-control form-input-premium" name="agency_location" id="agency_location" placeholder="Enter your agency location (e.g., Dubai, New York, London)" value="">
                        </div>

                        <!-- Agency Size -->
                        <div class="mb-5">
                            <label class="form-label-premium mb-3">Agency Size</label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer active" data-type="size" data-value="Small" data-rate="0">
                                        <div class="fw-bold">Small</div>
                                        <div class="small text-muted">1-10 employees</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer" data-type="size" data-value="Medium" data-rate="30">
                                        <div class="fw-bold">Medium</div>
                                        <div class="small text-muted">11-50 employees</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer" data-type="size" data-value="Large" data-rate="60">
                                        <div class="fw-bold">Large</div>
                                        <div class="small text-muted">50+ employees</div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="agency_size" id="agency_size" value="Small">
                        </div>

                        <!-- Agency Experience Level -->
                        <div class="mb-5">
                            <div class="slider-box p-4 radius-16 bg-white shadow-sm border">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label-premium mb-0">Agency Experience Level</label>
                                    <span class="badge bg-blue-soft text-blue px-3 py-2 radius-10" id="exp_display">Established</span>
                                </div>
                                <input type="range" class="form-range premium-range" id="experience_level" min="0" max="2" step="1" value="1">
                                <div class="d-flex justify-content-between mt-2 small text-muted px-1">
                                    <span class="exp-label-text pointer" data-idx="0">Entry-level</span>
                                    <span class="exp-label-text pointer fw-bold text-blue" data-idx="1">Established</span>
                                    <span class="exp-label-text pointer" data-idx="2">Expert</span>
                                </div>
                            </div>
                        </div>

                        <!-- Industry Complexity -->
                        <div class="mb-5">
                            <div class="slider-box p-4 radius-16 bg-white shadow-sm border">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label-premium mb-0">Industry Complexity</label>
                                    <span class="badge bg-green-soft text-success px-3 py-2 radius-10" id="complexity_display">Moderate</span>
                                </div>
                                <input type="range" class="form-range premium-range range-green" id="industry_complexity" min="0" max="2" step="1" value="1">
                                <div class="d-flex justify-content-between mt-2 small text-muted px-1">
                                    <span class="comp-label-text pointer" data-idx="0">Simple</span>
                                    <span class="comp-label-text pointer fw-bold text-success" data-idx="1">Moderate</span>
                                    <span class="comp-label-text pointer" data-idx="2">Complex</span>
                                </div>
                            </div>
                        </div>

                        <!-- Specialized Services Offered -->
                        <div class="mb-5">
                            <label class="form-label-premium mb-3">Specialized Services Offered</label>
                            <div class="row g-3">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-check custom-check">
                                        <input class="form-check-input" type="checkbox" name="services[]" value="Social Media Marketing" id="s1">
                                        <label class="form-check-label" for="s1">Social Media Marketing</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-check custom-check">
                                        <input class="form-check-input" type="checkbox" name="services[]" value="SEO" id="s2">
                                        <label class="form-check-label" for="s2">Search Engine Optimization (SEO)</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-check custom-check">
                                        <input class="form-check-input" type="checkbox" name="services[]" value="PPC" id="s3">
                                        <label class="form-check-label" for="s3">Pay-Per-Click Advertising (PPC)</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-check custom-check">
                                        <input class="form-check-input" type="checkbox" name="services[]" value="Email Marketing" id="s4">
                                        <label class="form-check-label" for="s4">Email Marketing</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-check custom-check">
                                        <input class="form-check-input" type="checkbox" name="services[]" value="Content Marketing" id="s5">
                                        <label class="form-check-label" for="s5">Content Marketing</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <button type="button" class="btn btn-blue-gradient btn-lg px-5 shadow-blue" id="calculateBtn">
                                Calculate Project Cost
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 order-1 order-lg-2">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <div class="results-card glass-card p-4 p-md-5 radius-24 shadow-lg text-center overflow-hidden position-relative border-blue">
                        <div class="card-glow"></div>
                        <span class="badge bg-blue text-white px-4 py-2 mb-4 fs-12 fw-700 ls-1">ESTIMATED PROJECT COST</span>
                        <h3 class="fw-800 mb-2 text-dark">Your Investment</h3>

                        <div class="illustration-wrapper mb-4">
                            <div class="blob-bg"></div>
                            <img src="<?= base_url('assets/images/seeo.png') ?>" alt="Project Cost Result" class="img-fluid pulse-img" style="max-height: 180px;">
                        </div>

                        <div class="price-container mb-2 text-gradient-dark">
                            <h3 class="" id="priceDisplay">AED 15,000 - AED 25,000</h3>
                            <p class="text-muted fs-14 mt-2">Total Project Budget</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
                            <i class="ion-checkmark-circled text-success fs-20"></i>
                            <span class="text-muted ">Professional Agency Benchmark</span>
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

<!-- Section 1: How It Works -->
<section class="how-it-works sp-120 bg-light position-relative">
    <div class="circle-gradient opacity-20"></div>
    <div class="container position-relative">
        <div class="section-title text-center mb-5 pb-4">
            <span class="badge bg-blue-soft text-blue px-3 py-2 radius-50 fw-700 text-uppercase ls-1 mb-3">Transparent Process</span>
            <h2 class="display-4 fw-900 text-dark mb-4">How We <span class="text-blue">Calculate</span></h2>
            <div class="divider-center"></div>
            <p class="text-muted mt-4 max-w-600 mx-auto fs-18 ">Our algorithm uses global marketplace data and agency benchmarks to provide realistic pricing for your digital needs.</p>
        </div>

        <div class="process-flow-wrapper mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="process-step-card p-5 text-center">
                        <div class="step-number">01</div>
                        <div class="step-icon-wrap mb-4 mx-auto">
                            <i class="ion-ios-location-outline pulse-icon"></i>
                        </div>
                        <h4 class="fw-bold h4 mb-3">Market Context</h4>
                        <p class="text-muted fs-15 lh-lg">We weigh the cost based on agency location and local economic factors.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="process-step-card p-5 text-center active-step">
                        <div class="step-number">02</div>
                        <div class="step-icon-wrap mb-4 mx-auto shadow-blue">
                            <i class="ion-ios-people-outline"></i>
                        </div>
                        <h4 class="fw-bold h4 mb-3">Capability Check</h4>
                        <p class="text-muted fs-15 lh-lg">Agency size and team experience levels dictate the base proficiency and rate.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="process-step-card p-5 text-center">
                        <div class="step-number">03</div>
                        <div class="step-icon-wrap mb-4 mx-auto">
                            <i class="ion-ios-speedometer-outline"></i>
                        </div>
                        <h4 class="fw-bold h4 mb-3">Complexity & Urgency</h4>
                        <p class="text-muted fs-15 lh-lg">Final adjustments are made based on project difficulty and required turnaround speed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Core Digital Services - Premium Grid -->
<section class="core-services sp-120 bg-white text-dark overflow-hidden position-relative">
    <div class="mesh-glow"></div>
    <div class="container position-relative">
        <div class="row align-items-end mb-5 pb-3">
            <div class="col-lg-7">
                <span class="text-blue fw-700 text-uppercase ls-2 d-block mb-3">Comprehensive Package</span>
                <h2 class="display-4 fw-800">What Drives Your <span class="text-blue">Growth?</span></h2>
            </div>
            <div class="col-lg-5">
                <p class="text-muted fs-18 mb-0">Beyond basic execution, we deliver data-driven strategies that maximize your ROI and accelerate business growth.</p>
            </div>
        </div>

        <div class="row g-4 g-md-4">
            <?php
            $services = [
                ['icon' => 'ion-social-buffer', 'title' => 'Social Media Marketing', 'desc' => 'Strategic campaigns that build engaged communities and drive measurable conversions across all platforms.'],
                ['icon' => 'ion-ios-search-strong', 'title' => 'Search Engine Optimization', 'desc' => 'Technical and content optimization that delivers sustainable organic traffic and qualified leads.'],
                ['icon' => 'ion-ios-analytics', 'title' => 'Pay-Per-Click Advertising', 'desc' => 'High-performance campaigns with precise targeting, optimized bidding, and maximum ROAS.'],
                ['icon' => 'ion-email', 'title' => 'Email Marketing', 'desc' => 'Automated nurture sequences and personalized campaigns that convert subscribers into customers.'],
                ['icon' => 'ion-ios-paper-outline', 'title' => 'Content Marketing', 'desc' => 'Authority-building content that educates, engages, and establishes your brand as an industry leader.'],
                ['icon' => 'ion-ios-speedometer-outline', 'title' => 'Performance Analytics', 'desc' => 'Real-time dashboards and insights that connect marketing efforts directly to revenue growth.'],
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
        <div class="row g-4 g-lg-5 align-items-center">
            <div class="col-lg-6">
                <div class="image-reveal-wrapper">
                    <div class="reveal-overlay"></div>
                    <img src="<?= base_url('assets/images/Branding-Strategy.webp') ?>" alt="Digital Strategy" class="img-fluid radius-24 shadow-2xl">
                    <div class="floating-stat-card shadow-lg">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-circle"><i class="ion-arrow-graph-up-right"></i></div>
                            <div>
                                <div class="fw-800 h4 mb-0">+450%</div>
                                <div class="text-muted fs-12 uppercase fw-700">Avg ROI Increase</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <span class="text-blue fw-700 text-uppercase ls-2 d-block mb-3">Pricing Insight</span>
                    <h2 class="display-5 fw-800 mb-4">Investment <span class="text-blue">Variability</span></h2>
                    <p class="text-muted fs-18 mb-5">Understand the key factors that influence agency rates for smarter budgeting and better partnerships.</p>

                    <div class="factor-accordion">
                        <div class="factor-row">
                            <div class="fr-icon shadow-sm"><i class="ion-ios-location-outline"></i></div>
                            <div class="fr-content">
                                <h5 class="fw-800 mb-1">Geographic Market</h5>
                                <p class="text-muted fs-14 mb-0">Agency location significantly impacts rates due to varying operational costs and market standards.</p>
                            </div>
                        </div>
                        <div class="factor-row">
                            <div class="fr-icon shadow-sm"><i class="ion-ios-people-outline"></i></div>
                            <div class="fr-content">
                                <h5 class="fw-800 mb-1">Team Expertise</h5>
                                <p class="text-muted fs-14 mb-0">Experienced agencies with proven track records command premium rates for their specialized knowledge.</p>
                            </div>
                        </div>
                        <div class="factor-row">
                            <div class="fr-icon shadow-sm"><i class="ion-ios-speedometer-outline"></i></div>
                            <div class="fr-content">
                                <h5 class="fw-800 mb-1">Project Complexity</h5>
                                <p class="text-muted fs-14 mb-0">Industry-specific challenges and technical requirements influence the resources and expertise needed.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Why BrandStory -->
<section class="why-brandstory sp-150 bg-white text-dark overflow-hidden position-relative border-top border-bottom">
    <div class="container position-relative">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-8">
                <h2 class="display-3 fw-900 mb-4 lh-1 text-dark">Dubai's Elite <br><span class="text-blue">Digital Partner</span></h2>
                <p class="fs-20 text-muted mb-5 pe-lg-5">We transform digital marketing complexity into measurable business growth through data-driven strategies and proven execution.</p>

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
                            <span class="text-muted fs-13 uppercase fw-700 ls-1">Digital Excellence</span>
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
                    <h4 class="fw-800 mb-4 text-dark">Start Your <br>Growth Story</h4>
                    <p class="text-muted fs-14 mb-4">Our digital experts are ready to analyze your current performance and unlock new opportunities.</p>
                    <a href="<?= route('contact') ?>" class="btn btn-blue-gradient w-100"><i class="ion-android-arrow-dropright-circle"></i> Free Consultation</a>
                    <div class="mt-3 fs-12 text-muted"><i class="ion-clock fs-14 me-1"></i> Response within 4 business hours</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: FAQ -->
<section class="dm-page service-page ppc">
    <div class=" sp-50">
        <div class="container">
            <h2 class="text-center mb-lg-5 mb-4">Calculator <span class="text-blue">FAQs</span></h2>
            <div class="dm-faq-main max-1000">
                <div class="accordion accordion-flush" id="accordionFlushExampleDigital">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1">
                                Why does location affect the hourly rate so much?
                            </button>
                        </h4>
                        <div id="flush-collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExampleDigital">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Cost of living and business overheads vary significantly across regions. Agencies in North America and Western Europe typically have higher operating costs compared to other regions, which is reflected in their hourly rates.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2">
                                Does agency size correlate with project quality?
                            </button>
                        </h4>
                        <div id="flush-collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExampleDigital">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Not necessarily. Larger agencies offer more comprehensive resources and stability, while smaller agencies often provide more personalized attention and niche expertise. The choice depends on your project scale and management preference.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="flush-heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3">
                                How accurate is this hourly rate estimate?
                            </button>
                        </h4>
                        <div id="flush-collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExampleDigital">
                            <div class="accordion-body">
                                <p class="fs-16 mb-0">Our estimate is based on current market benchmarks for professional agencies. However, individual agency internal methodologies and project-specific risks can lead to variations. Use this as a guide for budgeting.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lead Modal -->
<div class="modal fade" id="leadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-24 border-0 shadow-lg overflow-hidden">
            <div class="modal-header border-0 bg-blue-gradient text-white p-4">
                <h5 class="modal-title h4 fw-bold mb-0">Get Your Custom Quote</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <form id="digitalLeadForm" action="<?= route('digital.cost.calculator.submit') ?>" method="POST">
                    <?= csrf_token() ?>
                    <input type="hidden" name="honeypot" value="">

                    <!-- Hidden inputs for calculator values -->
                    <input type="hidden" name="agency_location" id="f_location">
                    <input type="hidden" name="agency_size" id="f_size">
                    <input type="hidden" name="experience_level" id="f_exp">
                    <input type="hidden" name="industry_complexity" id="f_complexity">
                    <input type="hidden" name="est_project_cost" id="f_rate">
                    <input type="hidden" name="services_text" id="f_services">

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
                            <div class="form-floating mb-4">
                                <input type="tel" name="phone" class="form-control premium-input" id="leadPhone" placeholder="+971" required>
                                <label for="leadPhone">Phone Number</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="submitBtn" class="btn btn-blue-gradient w-100 shadow-blue">
                        <i class="ion-paper-airplane"></i> Send Quote Request
                    </button>
                    <div id="formMsg" class="mt-3"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Container Adjustments */
    @media (max-width: 767px) {
        .container {
            padding-left: 20px;
            padding-right: 20px;
        }

        section {
            overflow-x: hidden;
        }
    }

    @media (max-width: 575px) {
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
    }

    .sp-50 {
        padding: 50px 0;
    }

    .sp-80 {
        padding: 80px 0;
    }

    .sp-120 {
        padding: 120px 0;
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
        transition: 0.4s;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-blue-gradient:hover {
        background: #111;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.3);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }

    .radius-24 {
        border-radius: 24px;
    }

    .radius-16 {
        border-radius: 16px;
    }

    .option-card {
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        transition: 0.3s;
        cursor: pointer;
        background: #fff;
    }

    .option-card:hover {
        border-color: var(--accent-blue);
        background: var(--light-blue);
    }

    .option-card.active {
        border-color: var(--accent-blue);
        background: var(--light-blue);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.1);
    }

    .form-label-premium {
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
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

    .custom-check {
        padding: 15px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        transition: 0.3s;
    }

    .custom-check:hover {
        border-color: var(--accent-blue);
        background: #f8fafc;
    }

    .premium-input {
        border: 1px solid #e2e8f0 !important;
        border-radius: 14px !important;
    }

    .form-input-premium {
        width: 100%;
        padding: 15px 20px;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #1e293b;
        font-weight: 500;
        font-size: 15px;
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-input-premium:focus {
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
        background-color: #f8fafc;
    }

    .form-input-premium::placeholder {
        color: #94a3b8;
        font-weight: 400;
    }

    .process-step-card {
        transition: 0.4s;
        border-radius: 32px;
        position: relative;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }

    .process-step-card:hover,
    .active-step {
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
    }

    .active-step .step-icon-wrap {
        background: var(--accent-blue);
        color: #fff;
    }

    .pulse-img {
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    /* New Sections Styles */
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

    .service-card-premium {
        background: #fff;
        border: 1px solid #f1f5f9;
        padding: 40px;
        border-radius: 30px;
        transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
        position: relative;
        overflow: hidden;
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

    /* Pricing Factors */
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

    /* Why BrandStory */
    .stat-box {
        border-left: 1px solid #e2e8f0;
        padding-left: 20px;
    }

    .cta-master-box {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        padding: 40px;
        border-radius: 32px;
        position: relative;
        z-index: 1;
    }

    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }

    .display-5 {
        font-size: 36px !important;
        font-weight: 700 !important;
    }

    .fs-13 {
        font-size: 13px !important;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .ls-1 {
        letter-spacing: 1px;
    }

    .ls-2 {
        letter-spacing: 2px;
    }

    .fw-700 {
        font-weight: 700;
    }

    .sp-150 {
        padding: 150px 0;
    }

    .divider-center {
        width: 60px;
        height: 4px;
        background: var(--accent-blue);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Tablet Responsive Styles */
    @media (max-width: 991px) {
        .sp-120 {
            padding: 60px 0;
        }

        .sp-150 {
            padding: 80px 0;
        }

        .sp-80 {
            padding: 50px 0;
        }

        .display-3 {
            font-size: 32px !important;
        }

        .display-4 {
            font-size: 28px !important;
        }

        .display-5 {
            font-size: 26px !important;
        }

        .process-step-card {
            margin-bottom: 20px;
            padding: 30px !important;
        }

        .sticky-top {
            position: static !important;
            margin-top: 30px;
        }

        .service-card-premium {
            padding: 30px;
        }

        .floating-stat-card {
            position: static;
            margin-top: 20px;
            width: 100%;
        }

        .cta-master-box {
            padding: 30px;
            margin-top: 30px;
        }

        .factor-row {
            margin-bottom: 20px;
        }

        .stat-box {
            border-left: none;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
    }

    /* Mobile Responsive Styles */
    @media (max-width: 767px) {

        /* Typography */
        .display-3 {
            font-size: 28px !important;
            line-height: 1.2 !important;
        }

        .display-4 {
            font-size: 24px !important;
            line-height: 1.3 !important;
        }

        h2.h1 {
            font-size: 26px !important;
        }

        .fs-20 {
            font-size: 16px !important;
        }

        .fs-18 {
            font-size: 15px !important;
        }

        /* Spacing */
        .sp-120 {
            padding: 40px 0;
        }

        .sp-80 {
            padding: 40px 0;
        }

        .sp-50 {
            padding: 30px 0;
        }

        .spt-50 {
            padding-top: 30px;
        }

        /* Banner Section */
        .seo-calculator-banner {
            padding-top: 30px !important;
            padding-bottom: 30px;
        }

        .seo-calculator-banner h1 {
            font-size: 32px !important;
            margin-bottom: 20px !important;
        }

        .seo-calculator-banner h1 br {
            display: none;
        }

        .seo-calculator-banner .text-gradient-premium {
            display: inline;
        }

        .seo-calculator-banner p {
            font-size: 16px !important;
            margin-bottom: 30px !important;
        }

        .Performance-Driven-btn {
            width: 100%;
            text-align: center;
            padding: 14px 20px !important;
            font-size: 15px !important;
        }

        /* Calculator Card */
        .calculator-card {
            padding: 20px !important;
            margin-bottom: 30px;
        }

        .results-card {
            padding: 25px !important;
        }

        /* Option Cards */
        .option-card {
            padding: 15px !important;
            margin-bottom: 10px;
        }

        .option-card .fw-bold {
            font-size: 14px !important;
        }

        .option-card .small {
            font-size: 11px !important;
        }

        /* Form Elements */
        .form-label-premium {
            font-size: 12px;
            margin-bottom: 12px;
        }

        .form-input-premium {
            padding: 12px 16px;
            font-size: 14px;
        }

        .slider-box {
            padding: 20px !important;
        }

        .premium-range {
            height: 6px;
        }

        .premium-range::-webkit-slider-thumb {
            width: 20px;
            height: 20px;
        }

        /* Slider Labels */
        .exp-label-text,
        .comp-label-text {
            font-size: 11px !important;
        }

        .slider-box .small {
            font-size: 11px !important;
        }

        /* Checkboxes */
        .custom-check {
            padding: 12px 15px;
        }

        .custom-check label {
            font-size: 13px !important;
        }

        /* Badges */
        .badge {
            font-size: 12px !important;
            padding: 8px 16px !important;
        }

        /* Price Display */
        .price-container h2 {
            font-size: 24px !important;
        }

        .illustration-wrapper img {
            max-height: 120px !important;
        }

        /* Buttons */
        .btn-blue-gradient {
            padding: 12px 24px;
            font-size: 14px;
        }

        .btn-lg {
            padding: 14px 28px !important;
        }

        #calculateBtn {
            width: 100%;
            padding: 14px 20px !important;
        }

        /* Process Steps */
        .process-step-card {
            padding: 25px !important;
            margin-bottom: 20px;
        }

        .step-number {
            font-size: 40px;
            top: 15px;
            right: 15px;
        }

        .step-icon-wrap {
            width: 60px;
            height: 60px;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .process-step-card h4 {
            font-size: 18px !important;
        }

        .process-step-card p {
            font-size: 14px !important;
        }

        /* Service Cards */
        .service-card-premium {
            padding: 25px;
            margin-bottom: 20px;
        }

        .sc-icon-box {
            width: 50px;
            height: 50px;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .service-card-premium h4 {
            font-size: 18px !important;
            margin-bottom: 15px !important;
        }

        .service-card-premium p {
            font-size: 13px !important;
        }

        /* Factor Section */
        .factor-row {
            gap: 15px;
            margin-bottom: 20px;
        }

        .fr-icon {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .factor-row h5 {
            font-size: 16px !important;
        }

        .factor-row p {
            font-size: 13px !important;
        }

        /* Stats Section */
        .stat-box {
            text-align: center;
            border-left: none;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .stat-box:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .stat-box h2 {
            font-size: 32px !important;
        }

        .stat-box span {
            font-size: 12px !important;
        }

        /* CTA Box */
        .cta-master-box {
            padding: 25px;
            margin-top: 30px;
        }

        .cta-master-box h4 {
            font-size: 20px !important;
            margin-bottom: 20px !important;
        }

        .cta-master-box p {
            font-size: 13px !important;
        }

        /* Image Adjustments */
        .image-reveal-wrapper {
            padding: 10px;
            margin-bottom: 30px;
        }

        /* FAQ Section */
        .accordion-button {
            padding: 18px 0 !important;
            font-size: 15px !important;
        }

        .accordion-body {
            padding: 0 0 20px 0 !important;
        }

        .accordion-body p {
            font-size: 14px !important;
        }

        /* Modal */
        .modal-dialog {
            margin: 10px;
        }

        .modal-body {
            padding: 20px !important;
        }

        .modal-header {
            padding: 20px !important;
        }

        .modal-title {
            font-size: 20px !important;
        }

        .form-floating {
            margin-bottom: 15px !important;
        }

        .form-floating input {
            font-size: 14px;
        }

        .form-floating label {
            font-size: 13px;
        }

        /* Section Titles */
        .section-title h2 {
            font-size: 26px !important;
            margin-bottom: 15px !important;
        }

        .section-title span {
            font-size: 12px !important;
        }

        .section-title p {
            font-size: 15px !important;
        }

        .radius-24 {
            border-radius: 16px;
        }

        .radius-16 {
            border-radius: 12px;
        }

        /* Divider */
        .divider-center {
            width: 50px;
            height: 3px;
        }

        /* Max Width Utilities */
        .max-w-600 {
            max-width: 100% !important;
        }

        .max-1000 {
            max-width: 100% !important;
        }
    }

    /* Small Mobile Devices */
    @media (max-width: 575px) {
        .display-3 {
            font-size: 24px !important;
        }

        .display-4 {
            font-size: 20px !important;
        }

        .seo-calculator-banner h1 {
            font-size: 26px !important;
        }

        .calculator-card,
        .results-card {
            padding: 15px !important;
        }

        .slider-box {
            padding: 15px !important;
        }

        .process-step-card {
            padding: 20px !important;
        }

        .step-number {
            font-size: 32px;
        }

        .btn-blue-gradient {
            padding: 10px 20px;
            font-size: 13px;
        }

        .price-container h2 {
            font-size: 20px !important;
        }

        .modal-body,
        .modal-header {
            padding: 15px !important;
        }

        .Performance-Driven-btn {
            padding: 12px 16px !important;
            font-size: 14px !important;
        }

        .option-card {
            padding: 12px !important;
        }

        .custom-check {
            padding: 10px 12px;
        }

        .service-card-premium {
            padding: 20px;
        }

        .cta-master-box {
            padding: 20px;
        }
    }

    /* Landscape Mobile Optimization */
    @media (max-width: 767px) and (orientation: landscape) {
        .seo-calculator-banner {
            padding-top: 20px !important;
            padding-bottom: 20px;
        }

        .sp-120 {
            padding: 30px 0;
        }
    }

    /* Touch-friendly improvements */
    @media (hover: none) and (pointer: coarse) {

        .option-card,
        .btn-blue-gradient,
        .premium-input,
        .form-input-premium {
            min-height: 44px;
        }

        .premium-range {
            height: 10px;
        }

        .premium-range::-webkit-slider-thumb {
            width: 28px;
            height: 28px;
        }

        .accordion-button {
            min-height: 60px;
        }

        .custom-check {
            min-height: 48px;
            display: flex;
            align-items: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const optionCards = document.querySelectorAll('.option-card');
        const calculateBtn = document.getElementById('calculateBtn');
        const priceDisplay = document.getElementById('res_hourly_rate');

        // Card Selection Logic
        optionCards.forEach(card => {
            card.addEventListener('click', function() {
                const type = this.dataset.type;
                const value = this.dataset.value;

                // Toggle active class
                document.querySelectorAll(`.option-card[data-type="${type}"]`).forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                // Update hidden input
                document.getElementById(`agency_${type}` || `timeline_${type}` || type).value = value;

                calculate();
            });
        });

        function calculate() {
            let baseCost = 3000; // Reduced base project cost in AED

            // Agency Size
            const sizeCard = document.querySelector('.option-card[data-type="size"].active');
            const sizeVal = sizeCard ? sizeCard.dataset.value : 'Small';
            if (sizeVal === 'Medium') baseCost += 2500;
            if (sizeVal === 'Large') baseCost += 6000;

            // Services Count
            const checkedServices = document.querySelectorAll('input[name="services[]"]:checked');
            baseCost += (checkedServices.length * 1500);

            // Experience Multiplier
            const expVal = parseInt(document.getElementById('experience_level').value);
            const exps = ['Entry-level', 'Established', 'Expert'];
            document.getElementById('exp_display').textContent = exps[expVal];

            let expMult = 1;
            if (expVal === 1) expMult = 1.3; // Reduced multiplier
            if (expVal === 2) expMult = 1.8; // Reduced multiplier

            // Complexity Multiplier
            const compVal = parseInt(document.getElementById('industry_complexity').value);
            const comps = ['Simple', 'Moderate', 'Complex'];
            document.getElementById('complexity_display').textContent = comps[compVal];

            let compMult = 1;
            if (compVal === 1) compMult = 1.2; // Reduced multiplier
            if (compVal === 2) compMult = 1.6; // Reduced multiplier

            // Final Calculation
            let total = baseCost * expMult * compMult;

            const min = Math.round(total);
            const max = Math.round(total * 1.35);

            // Number formatter
            const fmt = new Intl.NumberFormat('en-AE', {
                style: 'currency',
                currency: 'AED',
                maximumFractionDigits: 0
            });

            const rangeText = `${fmt.format(min)} - ${fmt.format(max)}`;
            document.getElementById('priceDisplay').textContent = rangeText;

            // Sync hidden fields for Lead Form
            document.getElementById('f_location').value = document.getElementById('agency_location').value;
            document.getElementById('f_size').value = sizeVal;
            document.getElementById('f_exp').value = exps[expVal];
            document.getElementById('f_complexity').value = comps[compVal];
            document.getElementById('f_rate').value = rangeText;

            const serviceNames = Array.from(checkedServices).map(cb => cb.value);
            document.getElementById('f_services').value = serviceNames.join(', ');
        }

        // Sliders & Checkboxes listeners
        ['experience_level', 'industry_complexity'].forEach(id => {
            document.getElementById(id).addEventListener('input', calculate);
        });

        document.querySelectorAll('input[name="services[]"]').forEach(cb => {
            cb.addEventListener('change', calculate);
        });

        // Location input listener
        document.getElementById('agency_location').addEventListener('input', calculate);

        document.getElementById('calculateBtn').addEventListener('click', calculate);

        document.getElementById('resetCalc').addEventListener('click', () => {
            document.getElementById('digitalCalcForm').reset();
            // Reset active states
            optionCards.forEach(c => c.classList.remove('active'));
            document.querySelectorAll('.option-card[data-value="Small"]').forEach(c => c.classList.add('active'));
            // Clear location input
            document.getElementById('agency_location').value = '';
            calculate();
        });

        calculate();

        // Lead Form Submission
        const leadForm = document.getElementById('digitalLeadForm');
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
                        submitBtn.textContent = 'Send Quote Request';
                    }
                })
                .catch(err => {
                    formMsg.innerHTML = `<div class="alert alert-danger">An unexpected error occurred.</div>`;
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Send Quote Request';
                });
        });
    });
</script>