<section class="seo-calculator-banner dm-bg spt-50 position-relative overflow-hidden">
    <div class="banner-mesh"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="text-white mb-4 display-3 fw-900 lh-1">Digital Agency <br><span class="text-gradient-premium">Cost Calculator</span></h1>
                <p class="text-white-50 fs-20 mb-5 max-w-600 ">Know your project's worth. Get an instant, data-backed estimate of agency hourly rates tailored to your specific needs.</p>
                <div class="d-flex gap-3">
                    <a href="#calculator" class="btn btn-blue-gradient btn-lg shadow-blue"><i class="ion-ios-calculator"></i> Start Calculation</a>
                    <a href="<?= route('contact') ?>" class="btn btn-outline-light border-2 btn-lg px-4 radius-50 fw-700">Consult Expert</a>
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
            <div class="col-lg-8">
                <div class="calculator-card glass-card p-4 p-md-5 radius-24 shadow-hover">
                    <form id="digitalCalcForm">
                        <!-- Agency Location -->
                        <div class="mb-5">
                            <label class="form-label-premium mb-3">Agency Location</label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer active" data-type="location" data-value="North America" data-rate="150">
                                        <div class="fw-bold">North America</div>
                                        <div class="small text-muted">US & Canada</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer" data-type="location" data-value="Western Europe" data-rate="130">
                                        <div class="fw-bold">Western Europe</div>
                                        <div class="small text-muted">UK & EU</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer" data-type="location" data-value="Other Regions" data-rate="70">
                                        <div class="fw-bold">Other Regions</div>
                                        <div class="small text-muted">Eastern Europe, Asia, etc.</div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="agency_location" id="agency_location" value="North America">
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

                        <!-- Timeline Urgency -->
                        <div class="mb-4">
                            <label class="form-label-premium mb-3">Timeline Urgency</label>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer active" data-type="urgency" data-value="Standard" data-rate="0">
                                        <div class="fw-bold">Standard</div>
                                        <div class="small text-muted">Normal campaign launch</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer" data-type="urgency" data-value="Accelerated" data-rate="30">
                                        <div class="fw-bold">Accelerated</div>
                                        <div class="small text-muted">Faster timeline</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="option-card p-3 text-center pointer" data-type="urgency" data-value="Urgent" data-rate="60">
                                        <div class="fw-bold">Urgent</div>
                                        <div class="small text-muted">ASAP launch</div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="timeline_urgency" id="timeline_urgency" value="Standard">
                        </div>

                        <div class="text-center mt-5">
                            <button type="button" class="btn btn-blue-gradient btn-lg px-5 shadow-blue" id="calculateBtn">
                                Calculate Hourly Rate
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <div class="results-card glass-card p-4 p-md-5 radius-24 shadow-lg text-center overflow-hidden position-relative border-blue">
                        <div class="card-glow"></div>
                        <h2 class="text-dark mb-4 fs-28 fw-800">Your Hourly Rate</h2>

                        <div class="illustration-wrapper mb-4">
                            <div class="blob-bg"></div>
                            <img src="<?= base_url('assets/images/seeo.png') ?>" alt="Hourly Rate Result" class="img-fluid pulse-img" style="max-height: 180px;">
                        </div>

                        <div class="price-container mb-2 text-gradient-dark">
                            <h2 class="" id="res_hourly_rate">$150 - $200 / hr</h2>
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
            <div class="row g-0 justify-content-center">
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
                    <input type="hidden" name="timeline_urgency" id="f_urgency">
                    <input type="hidden" name="est_hourly_rate" id="f_rate">
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

    .process-step-card {
        transition: 0.4s;
        border-radius: 32px;
        position: relative;
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
            let baseRate = 0;

            // Location Rate
            const locCard = document.querySelector('.option-card[data-type="location"].active');
            baseRate += parseInt(locCard ? locCard.dataset.rate : 0);

            // Size Rate
            const sizeCard = document.querySelector('.option-card[data-type="size"].active');
            baseRate += parseInt(sizeCard ? sizeCard.dataset.rate : 0);

            // Experience
            const expVal = parseInt(document.getElementById('experience_level').value);
            baseRate += (expVal * 40);
            const exps = ['Entry-level', 'Established', 'Expert'];
            document.getElementById('exp_display').textContent = exps[expVal];

            // Complexity
            const compVal = parseInt(document.getElementById('industry_complexity').value);
            baseRate += (compVal * 30);
            const comps = ['Simple', 'Moderate', 'Complex'];
            document.getElementById('complexity_display').textContent = comps[compVal];

            // Urgency
            const urgCard = document.querySelector('.option-card[data-type="urgency"].active');
            baseRate += parseInt(urgCard ? urgCard.dataset.rate : 0);

            const min = Math.max(50, baseRate);
            const max = Math.round(min * 1.35);

            const rangeText = `$${min} - $${max} / hr`;
            priceDisplay.textContent = rangeText;

            // Sync hidden fields for Lead Form
            document.getElementById('f_location').value = document.getElementById('agency_location').value;
            document.getElementById('f_size').value = document.getElementById('agency_size').value;
            document.getElementById('f_exp').value = exps[expVal];
            document.getElementById('f_complexity').value = comps[compVal];
            document.getElementById('f_urgency').value = document.getElementById('timeline_urgency').value;
            document.getElementById('f_rate').value = rangeText;

            const checkedServices = Array.from(document.querySelectorAll('input[name="services[]"]:checked')).map(cb => cb.value);
            document.getElementById('f_services').value = checkedServices.join(', ');
        }

        // Sliders & Checkboxes listeners
        ['experience_level', 'industry_complexity'].forEach(id => {
            document.getElementById(id).addEventListener('input', calculate);
        });

        document.querySelectorAll('input[name="services[]"]').forEach(cb => {
            cb.addEventListener('change', calculate);
        });

        document.getElementById('calculateBtn').addEventListener('click', calculate);

        document.getElementById('resetCalc').addEventListener('click', () => {
            document.getElementById('digitalCalcForm').reset();
            // Reset active states
            optionCards.forEach(c => c.classList.remove('active'));
            document.querySelectorAll('.option-card[data-value="North America"], .option-card[data-value="Small"], .option-card[data-value="Standard"]').forEach(c => c.classList.add('active'));
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