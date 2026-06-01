<section class="premium-coral-banner">
    <!-- Beautiful glass vertical column stripes backdrop -->
    <div class="banner-bg-grid">
        <div class="bg-grid-col"></div>
        <div class="bg-grid-col"></div>
        <div class="bg-grid-col"></div>
        <div class="bg-grid-col"></div>
        <div class="bg-grid-col"></div>
        <div class="bg-grid-col"></div>
    </div>

    <!-- Glowing smooth coral blurred blobs -->
    <div class="glowing-blob-center"></div>
    <div class="glowing-blob-left"></div>
    <div class="glowing-blob-right"></div>

    <div class="container relative z-3">
        <div class="banner-content-wrap">
            <!-- Badge / Small Tag -->
            <!-- <span class="banner-tag">A Decade of Strategic Digital Growth</span> -->

            <!-- H1 Page Title -->
            <h1 class="banner-title">Leading Digital Marketing Agency in Dubai for Ambitious Brands</h1>

            <!-- Description -->
            <p class="banner-subtitle">We are a trusted digital marketing partner in Dubai for 900+ businesses, helping SMEs and enterprises drive consistent digital growth with precision.</p>

            <!-- Call to Actions -->
            <div class="banner-actions">
                <a href="javascript:void(0);" class="Performance-Driven-btn uniq-contact-lead-btn">
                    ➤ Talk to Experts
                </a>
                <a href="/case-study/" class="banner-btn banner-btn-secondary">
                    ➤ Explore Portfolio
                </a>
            </div>

            <!-- Star Ratings Section -->
            <div class="banner-rating">
                <div class="stars-wrap">
                    <!-- SVG Stars (5 Stars) -->
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    <?php endfor; ?>
                </div>
                <span class="rating-text">4.9/5 Rating Based on Google Reviews</span>
            </div>
        </div>
    </div>

    <!-- Premium slideshow loop switcher with smooth slide-up and fade transitions -->
    <script>
        (function() {
            function initBannerRotation() {
                const slides = [{
                        heading: "Leading Digital Marketing Agency in Dubai for Ambitious Brands",
                        description: "We are a trusted digital marketing partner in Dubai for 900+ businesses, helping SMEs and enterprises drive consistent digital growth with precision."
                    },
                    {
                        heading: "Empowering Ventures to Dominate with Digital Marketing Services",
                        description: "Established in 2012, BrandStory delivers industry-leading digital marketing services in Dubai, UAE, backed by 100+ experts driving real digital growth."
                    }
                ];

                const titleEl = document.querySelector('.premium-coral-banner .banner-title');
                const subtitleEl = document.querySelector('.premium-coral-banner .banner-subtitle');

                if (!titleEl || !subtitleEl) return false;

                let currentSlide = 0;

                setInterval(() => {
                    // Phase 1: Add slide-out class to transition elements upwards and fade out
                    titleEl.classList.add('slide-out');
                    subtitleEl.classList.add('slide-out');

                    setTimeout(() => {
                        // Update to the next slide content
                        currentSlide = (currentSlide + 1) % slides.length;

                        titleEl.textContent = slides[currentSlide].heading;
                        subtitleEl.textContent = slides[currentSlide].description;

                        // Phase 2: Preset elements at the bottom with transition disabled
                        titleEl.classList.remove('slide-out');
                        subtitleEl.classList.remove('slide-out');
                        titleEl.classList.add('slide-in-prepare');
                        subtitleEl.classList.add('slide-in-prepare');

                        // Trigger reflow to apply prepare state immediately
                        titleEl.offsetHeight;

                        // Phase 3: Remove prepare state to slide up smoothly back to original position
                        titleEl.classList.remove('slide-in-prepare');
                        subtitleEl.classList.remove('slide-in-prepare');
                    }, 600); // matches the transition duration in CSS (0.6s)
                }, 6500); // rotate slides every 6.5 seconds

                return true;
            }

            if (document.readyState === 'complete' || document.readyState === 'interactive') {
                initBannerRotation();
            } else {
                document.addEventListener('DOMContentLoaded', initBannerRotation);
            }
        })();
    </script>
</section>

<section class="new-client-section">
    <div class="container-fluid">
        <h2 class="text-center mb-5 text-white">Trusted by Visionary Brands <br>Across The UAE</h2>
        <?php include __DIR__ . '/component/client_section.php' ?>
    </div>
</section>

<!-- Vision & Team Showreel Video Section -->
<section class="vision-showreel-section">
    <div class="container text-center showreel-header">
        <!-- <div class="showreel-badge">
            A Team of Experts That Clicks With Your Vision
        </div>
        <div class="showreel-divider"></div> -->
        <h2 class="showreel-title">
            We Don't Just Deliver Projects We Build <span class="highlight-text">Partnerships</span>
        </h2>
        <p class="showreel-subtitle">
            For a decade, BrandStory has stood beside brands that dream bigger. <br class="d-none d-md-block">
            We collaborate closely, think creatively, and execute fearlessly — so your marketing never stops evolving.
        </p>
    </div>

    <div class="showreel-video-wrap">
        <iframe src="https://www.youtube.com/embed/pvX9UtkJOk0?autoplay=1&mute=1&loop=1&playlist=pvX9UtkJOk0&controls=0&rel=0&showinfo=0&iv_load_policy=3"
            title="BrandStory Portfolio Showreel"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>

    <!-- Showreel Stats Section -->
    <div class="showreel-stats-container container">
        <div class="text-center mb-5">
            <a href="javascript:void(0)" class="Performance-Driven-btn uniq-contact-lead-btn">➤ Request A Quote</a>
        </div>
        <div class="stats-grid-wrap">
            <!-- <div class="stat-card">
                <div class="stat-number">12 K+</div>
                <div class="stat-label">Global Clients</div>
            </div> -->
            <div class="stat-card">
                <div class="stat-number">1000+</div>
                <div class="stat-label">Campaigns Executed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">900+</div>
                <div class="stat-label">Satisfied Clients</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">12+</div>
                <div class="stat-label">Years of Expertise</div>
            </div>
            <!-- <div class="stat-card">
                <div class="stat-number">3.5 M+</div>
                <div class="stat-label">Leads Generated</div>
            </div> -->
            <div class="stat-card">
                <div class="stat-number">100+</div>
                <div class="stat-label">Expert Professionals</div>
            </div>
        </div>
    </div>
</section>

<section class="performance-driven sp-50 dm-bg">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Best Digital Marketing Company in Dubai
            <span class="db">Where Performance Meets Results</span>
        </h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="position-relative mb-lg-0 mb-3 d-lg-block d-none w-100 radius-20">
                    <img class="w-100 radius-20" src="<?= base_url('/assets/images/home/digitalmarketing-desktop.webp') ?>" alt="Digital Marketing Agency in Dubai">
                    <div class="video-play-btn" data-video-id="pvX9UtkJOk0">
                        <i class="ion-play"></i>
                    </div>
                </div>

                <div class="position-relative img-fluid radius-20 mb-lg-0 mb-3 d-lg-none d-block">
                    <img class="img-fluid radius-20" src="<?= base_url('/assets/images/home/mobile-digital.webp') ?>" alt="Digital Marketing Agency in Dubai">
                    <div class="video-play-btn" data-video-id="pvX9UtkJOk0">
                        <i class="ion-play"></i>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 align-self-center">
                <ul class="mb-0">
                    <li class="text-white mb-3 fs-20">Take your business to new heights with BrandStory, the BEST digital marketing agency in Dubai. We deliver digital marketing and growth engineering services to clients across Dubai and the UAE. Working with a tech-savvy team of experts, we specialize in SEO, PPC, Social Media, ORM, Email Marketing, branding, and website development.</li>
                    <li class="text-white mb-3 fs-20">Recognized by reputable brands to deliver growth, visibility, and results that matter, we are the benchmark digital agency for excellence and innovation. From strategy planning to campaign management, we create digital marketing solutions to generate traffic, leads, and true results for businesses. </li>
                    <li class="text-white mb-4 fs-20">We keep your business requirements at the center and build strategies to reach and engage your target audiences. Whether you are a new startup or an established enterprise, our cutting-edge digital marketing services in Dubai are designed to deliver remarkable results.</li>
                </ul>
                <a href="/about/" class="Performance-Driven-btn">➤ Know About Us</a>


            </div>
        </div>
    </div>
</section>




<section class="vidsec">
    <div class="perks-vide-bg position-relative sp-50 bg-burjkhalifa">

        <div class="perks-content position-relative">
            <div class="container perkshd position-relative">
                <h2 class="text-center mb-lg-5 mb-4 text-white mt-lg-4">Experience Our Next-Level Digital Marketing <br>Services in Dubai, UAE</h2>
            </div>
            <div class="container perks">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/nimportance1.svg') ?>">
                            <h3 class="mb-3"><a href="/seo-services-in-dubai/" style="text-decoration: none; color: inherit;">Search Engine <span class="db">Optimization (SEO)</span></a></h3>
                            <p class="mb-3 fs-20">Search Engine Optimization plays a significant role in improving website visibility and driving organic traffic. Our SEO experts in Dubai follow proven strategies to maximize results and secure top page ranking in SERPs.</p>
                            <div class="casestydies-readmore">
                                <a href="/seo-services-in-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/nimportance2.svg') ?>">
                            <h3 class="mb-3"><a href="/social-media-marketing-agency-in-dubai/" style="text-decoration: none; color: inherit;">Social Media Marketing <span class="db">(SMM)</span></a></h3>
                            <p class="mb-3 fs-20">Harness the power of social media engagement with social media marketing. We craft visual narratives that speak volumes and bring the audience on board. Partner with us for Facebook, Instagram, TikTok, LinkedIn, and Twitter ads.</p>
                            <div class="casestydies-readmore">
                                <a href="/social-media-marketing-agency-in-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/nimportance3.svg') ?>">
                            <h3 class="mb-3"><a href="/pay-per-click-ppc-services-in-dubai/" style="text-decoration: none; color: inherit;">Pay Per Click (PPC)</a></h3>
                            <p class="mb-3 fs-20">We offer data-driven PPC campaign management services. We are an award-winning Google Partner and Meta Partner agency with expertise in pay-per-click campaigns, so you get maximum exposure at minimal cost.</p>
                            <div class="casestydies-readmore">
                                <a href="/pay-per-click-ppc-services-in-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/nimportance4.svg') ?>">
                            <h3 class="mb-3"><a href="/email-marketing-company-in-dubai/" style="text-decoration: none; color: inherit;">Email Marketing</a></h3>
                            <p class="mb-3 fs-20">We provide email marketing services in Dubai to engage customers, nurture leads, and drive conversions for clients. We craft email templates and campaigns to create direct communication with customers and keep them engaged.</p>
                            <div class="casestydies-readmore">
                                <a href="/email-marketing-company-in-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/nimportance5.svg') ?>">
                            <h3 class="mb-3"><a href="/online-reputation-management-services-in-dubai/" style="text-decoration: none; color: inherit;">Online Reputation <span class="db">Management (ORM)</span></a></h3>
                            <p class="mb-3 fs-20">With online reputation management, your business can keep track of your professional or personal standings with others on the internet. BrandStory is one of the premier online reputation management agencies in Dubai.</p>
                            <div class="casestydies-readmore">
                                <a href="/online-reputation-management-services-in-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/nimportance6.svg') ?>">
                            <h3 class="mb-3"><a href="/content-marketing-agency-dubai/" style="text-decoration: none; color: inherit;">Content Marketing</a></h3>
                            <p class="mb-3 fs-20">Content marketing is a crucial aspect of digital marketing to inform and engage the potential audience. We create highly compelling text, multimedia, and audio content to bring your brand’s essence and vision to life.</p>
                            <div class="casestydies-readmore">
                                <a href="/content-marketing-agency-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/perfrom-icon.png') ?>" style="width: 96px; height: 96px;">
                            <h3 class="mb-3"><a href="/full-funnel-performance-marketing/" style="text-decoration: none; color: inherit;">Performance Marketing<span class="db"></span></a></h3>
                            <p class="mb-3 fs-20">Performance marketing is a tangible marketing strategy based on growth results. We are the real growth-driver digital marketing agency offering full-funnel performance marketing services.</p>
                            <div class="casestydies-readmore">
                                <a href="/full-funnel-performance-marketing/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/branding-icon.png') ?>" style="width: 96px; height: 96px;">
                            <h3 class="mb-3"><a href="/branding-agency-in-dubai/" style="text-decoration: none; color: inherit;">Branding Services<span class="db"></span></a></h3>
                            <p class="mb-3 fs-20">Branding helps businesses define their identity through strategy, design, and storytelling. As a leading creative branding agency in Dubai, we create strong brands that foster trust, recognition, and long-term loyalty.</p>
                            <div class="casestydies-readmore">
                                <a href="/branding-agency-in-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="perks-main">
                            <img class="mb-4" src="<?= base_url('/assets/images/home/nimportance7.svg') ?>">
                            <h3 class="mb-3"><a href="/website-design-company-in-dubai/" style="text-decoration: none; color: inherit;">Website Design & <span class="db">Development</span></a></h3>
                            <p class="mb-3 fs-20">A website built for user experience is essential for bringing leads into the sales funnel. We create custom websites with the latest technology stack that are easy to navigate, mobile responsive, and visually attractive.</p>
                            <div class="casestydies-readmore">
                                <a href="/website-development-company-in-dubai/"><b>Know More</b> <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="strategy-process-sec sp-50 ">
    <div class="container" bis_skin_checked="1">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Our Digital Marketing Strategy and Process</h2>
        <div class="row gx-md-5" bis_skin_checked="1">
            <div class="col-lg-4" bis_skin_checked="1">
                <div class="strategy-heading-main" bis_skin_checked="1">
                    <h3 class="text-white strategy-title strategy1 active"><span>Competitor Research<span></span></span></h3>
                    <div class="d-lg-none d-block" bis_skin_checked="1">
                        <div class="strategy-process-main strategy1" style="" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-4" bis_skin_checked="1">
                                    <img class="w-100 d-lg-none d-md-block d-none" src="/assets/images/new-home/strategy1.webp" alt="Competitor Research &amp; Data Analysis">
                                    <img class="w-100 d-md-none d-block" src="/assets/images/new-home/strategy-mbl1.webp" alt="Competitor Research &amp; Data Analysis">
                                </div>
                                <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                                    <h3 class="mb-4">Competitor Research </h3>
                                    <p class="fs-20 mb-3">We start with a comprehensive study of your industry, audience, and competitors to find out key opportunities.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 mb-2">Analyze competitor performance and strategies</li>
                                        <li class="fs-20 mb-2">Audience behaviour and market trends</li>
                                        <li class="fs-20 mb-2">Identify gaps and growth opportunities</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-white strategy-title strategy2"><span>Planning &amp; Strategy<span></span></span></h3>
                    <div class="d-lg-none d-block" bis_skin_checked="1">
                        <div class="strategy-process-main strategy2" style="display: none;" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-4" bis_skin_checked="1">
                                    <img class="w-100 d-lg-none d-md-block d-none" src="/assets/images/dm-agency-dubai/strategy2.jpg?v=1" alt="Planning &amp; Strategy Development">
                                    <img class="w-100 d-md-none d-block" src="/assets/images/new-home/strategy-mbl2.webp" alt="Planning &amp; Strategy Development">
                                </div>
                                <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                                    <h3 class="mb-4">Planning &amp; Strategy</h3>
                                    <p class="fs-20 mb-3">We create a full roadmap and digital marketing strategy, considering your market position and business goals.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 mb-2">Identify goals and KPIs</li>
                                        <li class="fs-20 mb-2">Choose the best marketing channels</li>
                                        <li class="fs-20 mb-2">Match strategy to brand positioning</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-white strategy-title strategy3"><span>Trial &amp; Testing<span></span></span></h3>
                    <div class="d-lg-none d-block" bis_skin_checked="1">
                        <div class="strategy-process-main strategy3" style="display: none;" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-4" bis_skin_checked="1">
                                    <img class="w-100 d-lg-none d-md-block d-none" src="/assets/images/new-home/strategy3.webp" alt="Trial &amp; Testing">
                                    <img class="w-100 d-md-none d-block" src="/assets/images/new-home/strategy-mbl3.webp" alt="Trial &amp; Testing">
                                </div>
                                <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                                    <h3 class="mb-4">Trial &amp; Testing</h3>
                                    <p class="fs-20 mb-3">We test content, creatives, and campaigns to identify the most effective approach before launching any campaign.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 mb-2">Test ad creatives, CTA, and headlines</li>
                                        <li class="fs-20 mb-2">Evaluate early performance metrics</li>
                                        <li class="fs-20 mb-2">Optimize for better results</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-white strategy-title strategy4"><span>Campaign Implementation<span></span></span></h3>
                    <div class="d-lg-none d-block" bis_skin_checked="1">
                        <div class="strategy-process-main strategy4" style="display: none;" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-4" bis_skin_checked="1">
                                    <img class="w-100 d-lg-none d-md-block d-none" src="/assets/images/dm-agency-dubai/strategy4.jpg?v=1" alt="Campaign Implementation &amp; Launch">
                                    <img class="w-100 d-md-none d-block" src="/assets/images/new-home/strategy-mbl4.webp" alt="Campaign Implementation &amp; Launch">
                                </div>
                                <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                                    <h3 class="mb-4">Campaign Implementation &amp; Launch</h3>
                                    <p class="fs-20 mb-3">We execute campaigns with precision across selected channels (SEO, PPC, Social Media, Email marketing, etc.) based on market research.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 mb-2">Launch selected campaigns</li>
                                        <li class="fs-20 mb-2">Monitor outcomes in real-time</li>
                                        <li class="fs-20 mb-2">Ensure consistency in branding</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-white strategy-title strategy5"><span>Reporting &amp; Optimization<span></span></span></h3>
                    <div class="d-lg-none d-block" bis_skin_checked="1">
                        <div class="strategy-process-main strategy5" style="display: none;" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-md-4" bis_skin_checked="1">
                                    <img class="w-100 d-lg-none d-md-block d-none" src="/assets/images/new-home/strategy5.webp" alt="Reporting &amp; Ongoing Optimization">
                                    <img class="w-100 d-md-none d-block" src="/assets/images/new-home/strategy-mbl5.webp" alt="Reporting &amp; Ongoing Optimization">
                                </div>
                                <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                                    <h3 class="mb-4">Reporting &amp; Ongoing Optimization</h3>
                                    <p class="fs-20 mb-3">We track and analyze performance, report to the clients, take feedback, and continuously optimize for better performance.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 mb-2">Analyze KPIs and return on investment (ROI)</li>
                                        <li class="fs-20 mb-2">Align campaigns with evolving market trends</li>
                                        <li class="fs-20 mb-2">Optimize campaigns based on performance data</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-lg-block d-none" bis_skin_checked="1">
                <div class="strategy-process-main strategy1" style="" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-4" bis_skin_checked="1">
                            <img class="w-100" src="/assets/images/new-home/strategy1.webp" alt="Competitor Research &amp; Data Analysis">
                        </div>
                        <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                            <h3 class="mb-4">Competitor Research &amp; Data Analysis</h3>
                            <p class="fs-20 mb-3">We start with a comprehensive study of your industry, audience, and competitors to find out key opportunities.</p>
                            <ul class="mb-0">
                                <li class="fs-20 mb-2">Analyze competitor performance and strategies</li>
                                <li class="fs-20 mb-2">Audience behaviour and market trends</li>
                                <li class="fs-20 mb-2">Identify gaps and growth opportunities</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="strategy-process-main strategy2" style="display: none;" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-4" bis_skin_checked="1">
                            <img class="w-100" src="/assets/images/dm-agency-dubai/strategy2.jpg?v=1" alt="Planning &amp; Strategy Development">
                        </div>
                        <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                            <h3 class="mb-4">Planning &amp; Strategy Development</h3>
                            <p class="fs-20 mb-3">We create a full roadmap and digital marketing strategy, considering your market position and business goals.</p>
                            <ul class="mb-0">
                                <li class="fs-20 mb-2">Identify goals and KPIs</li>
                                <li class="fs-20 mb-2">Choose the best marketing channels</li>
                                <li class="fs-20 mb-2">Match strategy to brand positioning</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="strategy-process-main strategy3" style="display: none;" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-4" bis_skin_checked="1">
                            <img class="w-100" src="/assets/images/new-home/strategy3.webp" alt="Trial &amp; Testing">
                        </div>
                        <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                            <h3 class="mb-4">Trial &amp; Testing</h3>
                            <p class="fs-20 mb-3">We test content, creatives, and campaigns to identify the most effective approach before launching any campaign.</p>
                            <ul class="mb-0">
                                <li class="fs-20 mb-2">Test ad creatives, CTA, and headlines</li>
                                <li class="fs-20 mb-2">Evaluate early performance metrics</li>
                                <li class="fs-20 mb-2">Optimize for better results</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="strategy-process-main strategy4" style="display: none;" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-4" bis_skin_checked="1">
                            <img class="w-100" src="/assets/images/dm-agency-dubai/strategy4.jpg?v=1" alt="Campaign Implementation &amp; Launch">
                        </div>
                        <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                            <h3 class="mb-4">Campaign Implementation &amp; Launch</h3>
                            <p class="fs-20 mb-3">We execute campaigns with precision across selected channels (SEO, PPC, Social Media, Email marketing, etc.) based on market research.</p>
                            <ul class="mb-0">
                                <li class="fs-20 mb-2">Launch selected campaigns</li>
                                <li class="fs-20 mb-2">Monitor outcomes in real-time</li>
                                <li class="fs-20 mb-2">Ensure consistency in branding</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="strategy-process-main strategy5" style="display: none;" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-4" bis_skin_checked="1">
                            <img class="w-100" src="/assets/images/new-home/strategy5.webp" alt="Reporting &amp; Ongoing Optimization">
                        </div>
                        <div class="col-md-8 align-self-center strat-cnt" bis_skin_checked="1">
                            <h3 class="mb-4">Reporting &amp; Ongoing Optimization</h3>
                            <p class="fs-20 mb-3">We track and analyze performance, report to the clients, take feedback, and continuously optimize for better performance.</p>
                            <ul class="mb-0">
                                <li class="fs-20 mb-2">Analyze KPIs and return on investment (ROI)</li>
                                <li class="fs-20 mb-2">Align campaigns with evolving market trends</li>
                                <li class="fs-20 mb-2">Optimize campaigns based on performance data</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="Performance-Driven-wrapper dm-bg pt-1 mt-5">
    <div class="container">
        <h2 class="mb-4">The True ROI of Digital Marketing</h2>
        <div class="row Performance-Driven-row px-md-4 px-2">
            <div class="col-md-6 Performance-Driven-left">
                <div class="Performance-Driven-image-wrapper">
                    <img src="<?= base_url('assets/images/home/google-analytics-result.webp') ?>" alt="Analytics 1" class="Performance-Driven-elem elem1">
                    <img src="<?= base_url('assets/images/home/search-console-result.webp') ?>" alt="Analytics 2" class="Performance-Driven-elem elem2">
                    <img src="<?= base_url('assets/images/home/google-analytics-result-2.webp') ?>" alt="Analytics 3" class="Performance-Driven-elem elem3">
                    <img src="<?= base_url('assets/images/home/professional-digital-marketer.webp') ?>" alt="Business Woman" class="Performance-Driven-main-img">
                </div>

            </div>
            <div class="col-md-6 Performance-Driven-right">
                <p class="fs-20">Investment in digital marketing is not a cost– it’s a multiplier.</p>
                <p class="fs-20">
                    Smart digital marketing doesn’t just drive traffic, it helps your business climb the growth ladder.
                    Whether you're exploring <a href="/pay-per-click-ppc-services-in-dubai/" style="color:white; text-decoration:none; border-bottom:1px solid #b180ff">PPC advertising</a>, <a href="/email-marketing-company-in-dubai/" style="color:white; text-decoration:none; border-bottom:1px solid #b180ff">Email marketing</a>, <a href="/social-media-marketing-agency-in-dubai/" style="color:white; text-decoration:none; border-bottom:1px solid #b180ff">social media marketing</a>, or <a href="/seo-services-in-dubai/" style="color:white; text-decoration:none; border-bottom:1px solid #b180ff">SEO services in Dubai</a>, every digital marketing initiative can deliver exceptional results when executed strategically.
                </p>
                <p class="fs-20"><strong>With the right campaigns, your brand can:</strong></p>
                <ul class="fs-20">
                    <li>Attract high-converting leads with consistency</li>
                    <li>Improve customer engagement and conversion rates</li>
                    <li>Enhance your brand visibility across platforms</li>
                    <li>Optimize ad spend for maximum ROI</li>
                </ul>
                <p class="fs-20">
                    At BrandStory, we put serious focus on driving growth results that align with your business KPIs.
                    We don't follow vanity metrics, we increase and achieve real growth results with expert precision & strategy.
                </p>
                <a href="/contact/" class="Performance-Driven-btn">➤ Contact Us</a>
            </div>
        </div>
    </div>
</section>

<section class="sp-50 dm-case-studies-section dm-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sticky-case-study-left">
                    <span class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">OUR WORKS <span style="color: #855BFF;">.</span></span>
                    <h2 class="text-white mb-4">Real Brands. Real Results. Real Digital Marketing Success.</h2>
                    <p class="text-white-50 fs-20 mb-3">Discover how our strategic digital marketing approach has turned business challenges into measurable growth for brands in Dubai, UAE.</p>
                    <a href="/case-study/" class="view-all-link">View all Case Studies</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="scrollable-case-study-right">
                    <div class="case-study-scroll-item">
                        <div class="neww-case-stuides-main">
                            <div class="case-study-img-wrapper">
                                <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/case-study/sand-sollar.webp') ?>">
                                <strong>Digital Marketing</strong>
                            </div>
                            <h3><a href="/case-study/e-commerce/">Sand Dollar Dubai- Ecommerce</a></h3>
                            <p class="fs-20"><b style="color:#a15bff;">135% More Sales | 400% More Traffic | Just 3 Months</b> <br><br>A thriving e-commerce brand in Downtown Dubai faced stagnant sales- BrandStory crafted a data-driven SEO, PPC, and social media strategy that transformed their digital performance completely.</p>
                            <div class="casestydies-readmore">
                                <a href="/case-study/e-commerce/">Know more <img class="m-0" src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="case-study-scroll-item">
                        <div class="neww-case-stuides-main">
                            <div class="case-study-img-wrapper">
                                <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/case-study/travelex.webp') ?>">
                                <strong>Branding & Digital Marketing</strong>
                            </div>
                            <h3><a href="/case-study/travel-agency/">TravelEX</a></h3>
                            <p class="fs-20"><b style="color:#a15bff;">210% More Enquiries | Stronger Visibility | Just 3 Months</b> <br><br> TravelEX faced growing competition in UAE's financial services market- BrandStory crafted a data-driven PPC, SEO, and social media strategy that significantly boosted visibility and drove customer enquiries.</p>
                            <div class="casestydies-readmore">
                                <a href="/case-study/travel-agency/">Know more <img class="m-0" src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="case-study-scroll-item">
                        <div class="neww-case-stuides-main">
                            <div class="case-study-img-wrapper">
                                <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/case-study/crystal-plaza.webp') ?>">
                                <strong>Digital Marketing</strong>
                            </div>
                            <h3><a href="/case-study/hotel/">Crystal Plaza</a></h3>
                            <p class="fs-20"><b style="color:#a15bff;">5.2x ROAS | 40+ 1st Page Rankings | Bookings Soared</b> <br><br> Crystal Plaza, one of Sharjah's well-known hotel chains, needed to cut through the noise and drive direct bookings- BrandStory delivered paid marketing and local SEO strategy that put them ahead of the competition. (Ex. “luxury hotel in Dubai”, “business stay Dubai”)</p>
                            <div class="casestydies-readmore">
                                <a href="/case-study/hotel/">Know more <img class="m-0" src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="case-study-scroll-item">
                        <div class="neww-case-stuides-main">
                            <div class="case-study-img-wrapper">
                                <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/case-study/nims.webp') ?>">
                                <strong>Digital Marketing</strong>
                            </div>
                            <h3><a href="/case-study/education-institution/">NIMS School</a></h3>
                            <p class="fs-20"><b style="color:#a15bff;">Top 5 Rankings | 80% More Engagement | Enrollment Surged</b> <br><br> In Dubai's competitive education landscape, NIMS School needed more than visibility- they needed trust. BrandStory delivered a data-driven SEO and social media strategy to improve awareness & turn interest into enrollments.</p>
                            <div class="casestydies-readmore">
                                <a href="/case-study/education-institution/">Know more <img class="m-0" src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="case-study-scroll-item">
                        <div class="neww-case-stuides-main">
                            <div class="case-study-img-wrapper">
                                <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/case-study/wipro.webp') ?>">
                                <strong>Digital Marketing</strong>
                            </div>
                            <h3><a href="/case-study/wipro-infrastructure-engineering/">Wipro Infrastructure Engineering</a></h3>
                            <p class="fs-20"><b style="color:#a15bff;">Global Reach | Targeted PPC | More Brand Authority</b> <br><br> Operating across India, Europe, and the UAE, Wipro Infrastructure Engineering needed a digital strategy as powerful as their global operations- BrandStory created high-impact social media and PPC campaigns that improved online presence and drove qualified leads.</p>
                            <div class="casestydies-readmore">
                                <a href="/case-study/wipro-infrastructure-engineering/">Know more <img class="m-0" src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="case-study-scroll-item">
                        <div class="neww-case-stuides-main">
                            <div class="case-study-img-wrapper">
                                <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/case-study/nanoprecise.webp') ?>">
                                <strong>Digital Marketing</strong>
                            </div>
                            <h3><a href="/case-study/nanoprecise-sci-corp/">NanoPrecise Sci Corp</a></h3>
                            <p class="fs-20"><b style="color:#a15bff;">AI-Powered Branding | SEO & PPC | Enhanced Global ROI</b> <br><br> NanoPrecise's cutting-edge predictive maintenance solutions deserved equally powerful digital marketing- BrandStory crafted a data-driven SEO and PPC strategy that strengthened their global presence and drove significant, measurable business growth.</p>
                            <div class="casestydies-readmore">
                                <a href="/case-study/nanoprecise-sci-corp/">Know more <img class="m-0" src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="edirect-work-sec sp-50">
    <style>
        .edirect-work-sec {
            background-color: #0A0B0F;
            padding: 100px 0;
            color: #E0E0E0;
        }

        .edirect-work-sec .container {
            margin: 0 auto;
        }

        /* Staggered Column Setup */
        .edirect-work-sec .work-heading-block {
            margin-bottom: 60px;
            max-width: 500px;
            text-align: left;
        }

        .edirect-work-sec .work-tagline {
            font-size: 24px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.45);
            text-transform: uppercase;
            letter-spacing: 3px;
            line-height: 1.4;
            margin-bottom: 25px;
        }

        .edirect-work-sec .work-title {
            color: #FFFFFF;
            margin-bottom: 30px;
        }

        

        .edirect-work-sec .work-view-more {
            text-align: right;
            margin-top: 15px;
            padding-right: 10px;
        }

        .edirect-work-sec .work-view-more a {
            color: #FFFFFF;
            font-size: 20px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .edirect-work-sec .work-view-more a span {
            color: #855bff;
            font-weight: 700;
            margin-left: 2px;
        }

        .edirect-work-sec .work-view-more a:hover {
            color: #855bff;
        }

        /* Case Study Items */
        .edirect-work-sec .work-item {
            margin-bottom: 80px;
            position: relative;
        }

        .edirect-work-sec .work-img-wrap {
            position: relative;
            border-radius: 4px;
            overflow: hidden;
            background-color: #12131A;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .edirect-work-sec .work-img-wrap img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .edirect-work-sec .work-item:hover .work-img-wrap {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }

        .edirect-work-sec .work-item:hover .work-img-wrap img {
            transform: scale(1.02);
        }

        /* Pulsing Hotspot overlay */
        .edirect-work-sec .work-hotspot {
            position: absolute;
            z-index: 10;
            width: 36px;
            height: 36px;
            cursor: pointer;
        }

        .edirect-work-sec .work-hotspot.pos-1 {
            top: 15%;
            right: 20%;
        }

        .edirect-work-sec .work-hotspot.pos-2 {
            top: 25%;
            left: 30%;
        }

        .edirect-work-sec .hotspot-pulse {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 2px solid #855bff;
            border-radius: 50%;
            animation: hotspotPulse 2s infinite ease-out;
        }

        .edirect-work-sec .hotspot-dot {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #855bff;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 10px #855bff;
        }

        @keyframes hotspotPulse {
            0% {
                transform: scale(0.5);
                opacity: 1;
            }
            100% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        /* Under-Image Metadata */
        .edirect-work-sec .work-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .edirect-work-sec .work-item-name {
            font-size: 26px;
            font-weight: 700;
            color: #FFFFFF;
            margin: 0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .edirect-work-sec .work-item-name:hover {
            color: #855bff;
        }

        .edirect-work-sec .work-action-link {
            font-size: 20px;
            font-weight: 600;
            color: #855bff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: color 0.3s ease;
        }

        .edirect-work-sec .work-action-link span {
            color: #855bff;
            font-weight: 700;
        }

        .edirect-work-sec .work-action-link:hover {
            color: #855bff;
        }

        .edirect-work-sec .work-services {
         font-size: 18px;
    color: #fff;
    text-transform: capitalize;
    line-height: 1.5;
        }

        /* Stagger offset for the right column on desktop */
        @media (min-width: 992px) {
            .edirect-work-sec .col-right-stagger {
                margin-top: 140px;
            }
        }

        @media (max-width: 991px) {
            .edirect-work-sec {
                padding: 60px 0;
            }
            .edirect-work-sec .work-heading-block {
                max-width: 100%;
                text-align: center;
                margin-bottom: 40px;
            }
            .edirect-work-sec .work-view-more {
                text-align: center;
            }
            .edirect-work-sec .work-item {
                margin-bottom: 50px;
            }
            .edirect-work-sec .work-item-name {
                font-size: 22px;
            }
        }
    </style>

    <div class="container">
        <div class="row">
            <!-- Left Column: Heading Block + Staggered Items -->
            <div class="col-lg-6">
                <div class="work-heading-block">
                    <div class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">Working Together<br>With Our Clients</div>
                    <h2 class="work-title">To Achieve Their Business' Vision</h2>
                    <p class="fs-20">
                        Whether we're building custom e-commerce stores, managing compliant medical portals, driving B2B corporate lead acquisition, or scaling real estate presence, you can count on BrandStory to deliver measurable business growth. Together, we work towards achieving our clients' long-term visions.
                    </p>
                    <div class="work-view-more">
                        <a href="/industries/">view more <span>&gt;&gt;</span></a>
                    </div>
                </div>

                <!-- Left Column Item 1: E-commerce -->
                <div class="work-item">
                    <div class="work-img-wrap">
                        <img src="<?= base_url('assets/images/dm-agency-dubai/industries-img2.png?v=1') ?>" alt="E-commerce Digital Marketing Dubai">
                        <!-- Hotspot pulsing circle overlay -->
                        <div class="work-hotspot pos-1">
                            <div class="hotspot-pulse"></div>
                            <div class="hotspot-dot"></div>
                        </div>
                    </div>
                    <div class="work-meta-row">
                        <a href="/industries/e-commerce-marketing-service" class="work-item-name">E-commerce</a>
                        <a href="/industries/e-commerce-marketing-service" class="work-action-link">View case study <span>&gt;&gt;</span></a>
                    </div>
                    <div class="work-services">
                        SEO Services, PPC, Email Marketing, Branding, Social Media, Web Design, Performance Marketing
                    </div>
                </div>

                <!-- Left Column Item 2: Real Estate -->
                <div class="work-item">
                    <div class="work-img-wrap">
                        <img src="<?= base_url('assets/images/dm-agency-dubai/industries-img4.png?v=1') ?>" alt="Real Estate Marketing Services Dubai">
                    </div>
                    <div class="work-meta-row">
                        <a href="/industries/real-estate-marketing-services" class="work-item-name">Real Estate</a>
                        <a href="/industries/real-estate-marketing-services" class="work-action-link">View case study <span>&gt;&gt;</span></a>
                    </div>
                    <div class="work-services">
                        SEO Services, PPC, Email Marketing, Branding, Social Media, Web Design, Performance Marketing
                    </div>
                </div>

                <!-- Left Column Item 3: Education -->
                <div class="work-item">
                    <div class="work-img-wrap">
                        <img src="<?= base_url('assets/images/dm-agency-dubai/industries-img1.png?v=1') ?>" alt="Education Marketing Services Dubai">
                    </div>
                    <div class="work-meta-row">
                        <a href="/industries/education-marketing-services" class="work-item-name">Education</a>
                        <a href="/industries/education-marketing-services" class="work-action-link">View case study <span>&gt;&gt;</span></a>
                    </div>
                    <div class="work-services">
                        SEO Services, PPC, Content Marketing, Branding, Social Media, Web Design, Performance Marketing
                    </div>
                </div>
            </div>

            <!-- Right Column: Staggered Items -->
            <div class="col-lg-6 col-right-stagger">
                <!-- Right Column Item 1: Healthcare -->
                <div class="work-item">
                    <div class="work-img-wrap">
                        <img src="<?= base_url('assets/images/dm-agency-dubai/industries-img3.png?v=1') ?>" alt="Healthcare Digital Marketing Dubai">
                        <!-- Hotspot pulsing circle overlay -->
                        <div class="work-hotspot pos-2">
                            <div class="hotspot-pulse"></div>
                            <div class="hotspot-dot"></div>
                        </div>
                    </div>
                    <div class="work-meta-row">
                        <a href="/industries/healthcare-marketing-services" class="work-item-name">Healthcare</a>
                        <a href="/industries/healthcare-marketing-services" class="work-action-link">View case study <span>&gt;&gt;</span></a>
                    </div>
                    <div class="work-services">
                        SEO Services, PPC, Content Marketing, Branding, Social Media, Web Design, Performance Marketing
                    </div>
                </div>

                <!-- Right Column Item 2: Tourism -->
                <div class="work-item">
                    <div class="work-img-wrap">
                        <img src="<?= base_url('assets/images/dm-agency-dubai/industries-img5.png?v=1') ?>" alt="Tourism & Travel Marketing Services Dubai">
                    </div>
                    <div class="work-meta-row">
                        <a href="/industries/travel-agency-marketing-services" class="work-item-name">Tourism</a>
                        <a href="/industries/travel-agency-marketing-services" class="work-action-link">View case study <span>&gt;&gt;</span></a>
                    </div>
                    <div class="work-services">
                        SEO Services, PPC, Email Marketing, Branding, Social Media, Web Design, Performance Marketing
                    </div>
                </div>

                <!-- Right Column Item 3: Corporate (B2B) -->
                <div class="work-item">
                    <div class="work-img-wrap">
                        <img src="<?= base_url('assets/images/dm-agency-dubai/industries-img6.png?v=1') ?>" alt="B2B Corporate Marketing Services Dubai">
                    </div>
                    <div class="work-meta-row">
                        <a href="/industries/b2b-corporate-marketing-services" class="work-item-name">Corporate</a>
                        <a href="/industries/b2b-corporate-marketing-services" class="work-action-link">View case study <span>&gt;&gt;</span></a>
                    </div>
                    <div class="work-services">
                        SEO Services, PPC, Email Marketing, Branding, Social Media, Web Design, Performance Marketing
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
</section>



<section class="tools-section">
    <div class="sction-header">
        <h2 class="section-title text-md-start">The Tools and Tech Powering Our Digital<br> Marketing Success</h2>
        <p class="section-description text-md-start m-0 mb-5">
            We are a leading digital marketing agency, crafting tailored strategies powered by the latest tools and cutting-edge technologies. We translate your business goals into measurable growth.
        </p>
    </div>
    <div class="tools-container">
        <div class="tools-list-wrapper">
            <div class="tools-list">
                <div class="tool-card" data-tool="gds">
                    <img src="<?= base_url('assets/images/tools-tech/google-data.svg') ?>" alt="GDS" />
                    <span>Google Data Studio</span>
                </div>
                <div class="tool-card" data-tool="ga">
                    <img src="<?= base_url('assets/images/tools-tech/google-analytics.svg') ?>" alt="GA" />
                    <span>Google Analytics</span>
                </div>
                <div class="tool-card" data-tool="hubspot">
                    <img src="<?= base_url('assets/images/tools-tech/hubspot.svg') ?>" alt="hubspot" />
                    <span>HubSpot</span>
                </div>
                <div class="tool-card" data-tool="semrush">
                    <img src="<?= base_url('assets/images/tools-tech/semrush.svg') ?>" alt="Semrush" />
                    <span>SemRush</span>
                </div>
                <div class="tool-card" data-tool="surfer">
                    <img src="<?= base_url('assets/images/tools-tech/surfer.svg') ?>" alt="surfer" />
                    <span>Surfer SEO</span>
                </div>
                <div class="tool-card" data-tool="mailchimp">
                    <img src="<?= base_url('assets/images/tools-tech/mailchimp.svg') ?>" alt="mailchimp " />
                    <span>Mailchimp</span>
                </div>
                <div class="tool-card" data-tool="adroll">
                    <img src="<?= base_url('assets/images/tools-tech/adroll.svg') ?>" alt="adroll" />
                    <span>AdRoll</span>
                </div>
                <div class="tool-card" data-tool="google-ads">
                    <img src="<?= base_url('assets/images/tools-tech/google-ads.svg') ?>" alt="google-ads" />
                    <span>Google Ads</span>
                </div>

                <div class="tool-card" data-tool="meta-ads-manager">
                    <img src="<?= base_url('assets/images/tools-tech/meta-ads-manager.svg') ?>" alt="Meta Ads Manager" />
                    <span>Meta Ads Manager</span>
                </div>
                <div class="tool-card" data-tool="google-tag-manager">
                    <img src="<?= base_url('assets/images/tools-tech/google-tag-manager.svg') ?>" alt="google-tag-manager" />
                    <span>Google Tag Manager</span>
                </div>
                <div class="tool-card" data-tool="hootsuite">
                    <img src="<?= base_url('assets/images/tools-tech/hootsuite.svg') ?>" alt="hootsuite" />
                    <span>Hootsuite</span>
                </div>

            </div>
        </div>

        <div class="tool-description" id="tool-description">
            <h3>Google Search Console</h3>
            <p>
                We use Google Search Console to uncover your website’s performance, track keyword rankings, identify technical issues, and optimize your site for better visibility in search results.
            </p>
        </div>
    </div>

</section>
<section class="dm-whychoose-sec sp-50  dm-bg">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">What Sets Us Apart as a Leading <br>
            Digital Marketing Company in Dubai
        </h2>
        <div class="row">
            <div class="col-lg-5">
                <img class="w-100 radius-20 d-lg-block d-none" src="<?= base_url('assets/images/home/whychoose.webp') ?>" alt="Why Choose Brandstory As your Digital marketing Agency in Dubai">
                <img class="w-100 radius-20 d-lg-none d-block mb-3" src="<?= base_url('assets/images/home/whychoose-mbl.webp') ?>" alt="Why Choose Brandstory As your Digital marketing Agency in Dubai">
            </div>
            <div class="col-lg-7">
                <div class="whychoose-faq">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Expertise in Dubai’s Digital Scene
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0 fs-20">We don't just work in Dubai- we live it. From understanding the city's competitive landscape to knowing its consumers inside out, we craft result-driven digital marketing strategies built specifically for Dubai's local businesses, online retailers, and industries like hospitality, real estate, healthcare, and more.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Expert Team with Zen Precision
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0 fs-20">Our top-of-the-line experts ensure relevance, precision, and ROI-driven performance at every stage. Business-specific digital marketing strategies based on the target audience, business objectives, and long-term brand growth.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingfour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    Performance Backed by Proven Results
                                </button>
                            </h4>
                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0 fs-20">Successfully executed 200+ digital marketing (SEO, PPC, Email Marketing, Performance Marketing) campaigns across various industries. From boosting lead generation to doubling ROI, each strategy is focused on driving client success.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingfive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                    Data-Driven Decision Making
                                </button>
                            </h4>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0 fs-20">Actionable decisions based on real performance data and results, not assumptions. Every insight fuels improvement, ensuring campaigns stay aligned with evolving market trends and real business needs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingsix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                    End-to-End Support
                                </button>
                            </h4>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0 fs-20">From strategy mankind to campaign planning and execution, we keep you informed at every stage. Dedicated support and feedback ensure your digital marketing campaigns run smoothly and deliver optimal results.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    In-depth and Transparent Reporting
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0 fs-20">In-depth and transparent reports to give you full visibility into campaign effectiveness and ROI. Data-driven recommendations turn those insights into strategic and precise actions that drive consistent growth.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/component/expert_team.php' ?>


<section class="dm-counter-sec sp-50 dm-bg">
    <div class="container  px-5">
        <div class="row gx-md-0">
            <div class="col-lg-3 col-md-6 col-6">
                <div class="dm-conter-main text-lg-start text-center">
                    <span class="dm-count-num">1000+</span>
                    <h3 class="text-white fw-300 mb-0">Campaigns Executed</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="dm-conter-main text-lg-start text-center ps-lg-5">
                    <span class="dm-count-num">900+</span>
                    <h3 class="text-white fw-300 mb-0 px-lg-0">Satisfied Clients</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="dm-conter-main text-lg-start text-center  ps-lg-5">
                    <span class="dm-count-num">12+</span>
                    <h3 class="text-white fw-300 mb-0 b-0 px-2 px-lg-0">Years of Expertise</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="dm-conter-main text-lg-start text-center ps-lg-5">
                    <span class="dm-count-num">100+</span>
                    <h3 class="text-white fw-300 mb-0">Expert Professionals</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container new_social_section sp-50">
    <h2 class="text-center text-white mb-5">Your Brand Growth. Our Mission. <br>Endless Possibilities.</h2>

    <div class="new_social_section-grid">
        <!-- Google Ads -->
        <a href="/pay-per-click-ppc-services-in-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/google-ads.png') ?>" alt="Google Ads" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/google-ads-hover.png') ?>" alt="Google Ads Hover" class="hover-img" />
            </div>
            <h3>Google Ads</h3>
        </a>

        <!-- Facebook Ads -->
        <a href="/facebook-marketing-agency-in-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/facebook.png') ?>" alt="Facebook Ads" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/facebook-hover.png') ?>" alt="Facebook Ads Hover" class="hover-img" />
            </div>
            <h3>Facebook Ads</h3>
        </a>

        <!-- TikTok Ads -->
        <a href="/tiktok-marketing-agency-in-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/tiktok.png') ?>" alt="TikTok Ads" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/tiktok-hover.png') ?>" alt="TikTok Ads Hover" class="hover-img" />
            </div>
            <h3>TikTok Ads</h3>
        </a>

        <!-- Instagram Ads -->
        <a href="/instagram-advertising-agency-in-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/instagram.png') ?>" alt="Instagram Ads" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/instagram-hover.png') ?>" alt="Instagram Ads Hover" class="hover-img" />
            </div>
            <h3>Instagram Ads</h3>
        </a>

        <!-- Website Development -->
        <a href="/website-design-company-in-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/webdev.png') ?>" alt="Website Development" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/webdev-hover.png') ?>" alt="Website Development Hover" class="hover-img" />
            </div>
            <h3>Website Development</h3>
        </a>

        <!-- SEO -->
        <a href="/seo-services-in-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/seo.png') ?>" alt="SEO" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/seo-hover.png') ?>" alt="SEO Hover" class="hover-img" />
            </div>
            <h3>Local SEO</h3>
        </a>

        <!-- Content Creation -->
        <a href="/content-marketing-agency-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/content.png') ?>" alt="Content Creation" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/content-hover.png') ?>" alt="Content Creation Hover" class="hover-img" />
            </div>
            <h3>Content Creation</h3>
        </a>

        <!-- Email Marketing -->
        <a href="/email-marketing-company-in-dubai/" class="new_social_section-item">
            <div class="new_social_section-icon">
                <img src="<?= base_url('assets/images/social-logo/email.png') ?>" alt="Email Marketing" class="normal-img" />
                <img src="<?= base_url('assets/images/social-logo/email-hover.png') ?>" alt="Email Marketing Hover" class="hover-img" />
            </div>
            <h3>Email Marketing</h3>
        </a>
    </div>
</section>





<?php
$reviewSection = [
    'title' =>  "The Impact We've Delivered <br>for Our Clients",
    'bgClass' => 'dm-bg', // optional custom class
];
include __DIR__ . '/component/client_reviews.php';
?>

<section class="dm-grow-section dm-bg sp-50">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Step Into Digital Success with<br>
            Dubai’s Top Marketing Agency

        </h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="growimg position-relative mb-lg-0 mb-3">
                    <img class="w-100" src="<?= base_url('assets/images/home/grow-img.webp') ?>" alt="Contact for Digital Marketing Services in Dubai">
                    <div class="growimg-cnt">
                        <p class="mb-5 text-white fs-20">Uplift your digital presence, increase sales, and maximize ROAS with Google-certified digital marketing experts. Get a Free Consultation and a Comprehensive Audit to uncover your growth opportunities.</p>
                        <a href="javascript:void(0);" class="Performance-Driven-btn uniq-contact-lead-btn">➤ Talk to Our Experts</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="grow-form-main">
                    <?php $textrow = 6 ?>
                    <?php include __DIR__ . '/component/forms/contact-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dm-dubai-office spb-50 dm-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled p-0 mb-0">
                    <li class="mb-3"><a class="text-white fs-20" href="tel:+971 52 283 1655"><img class="me-2" src="<?= base_url('assets/images/home/dubai-phone.svg') ?>">+971 52 283 1655</a></li>
                    <li class="mb-md-0 mb-3"><a class="text-white fs-20" href="mailto:info@brandstory.ae"><img class="me-2" src="<?= base_url('assets/images/home/dubai-mail.svg') ?>">info@brandstory.ae</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start">
                    <img class="me-3" src="<?= base_url('assets/images/home/dubai-location.svg') ?>">
                    <div class="dubai-address">
                        <h3 class="mb-2 text-white">Visit Our Dubai Office</h3>
                        <p class="fs-20 mb-0"><a class="text-white text-decoration-underline" target="_blank" href="https://www.google.com/search?sca_esv=5aa11a5588fe31d3&kgmid=/g/11jn2396qs&q=Brandstory&shndl=30&shem=lcuae,lste,uaasie&source=sh/x/loc/uni/m1/1&kgs=0f7c634ee2c79aaf">G5, Al Meheri Plaza, opp DBC Building, Al Khabaisi Area, Deira Dubai- 81577, United Arab Emirates</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dm-partners-section sp-50">
    <div class="container">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-2 col-6">
                <a href="https://www.google.com/partners/agency?id=1975289574" target="_blank">
                    <img class="w-100" src="<?= base_url('assets/images/home/partner1.svg') ?>" alt="Google Partner Agency- Brandstory Solutions Pvt Ltd">
                </a>
            </div>
            <div class="col-md-2 d-md-block d-none"></div>
            <div class="col-md-2 col-6">
                <img class="w-100" src="<?= base_url('assets/images/home/partner2.svg') ?>" alt="Facebook Business Partner- Brandstory Solutions Pvt Ltd">
            </div>
        </div>
    </div>
</section>

<section class="sp-50 dm-blog-section dm-bg">
    <div class="container">
        <h2 class="text-white mb-4 text-md-start text-center">Know What's Happening <br>
            In the Industry
        </h2>
        <div class="position-relative delivertechmain">
            <div class="swiper dmblog-sld">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog1.webp') ?>">
                            <h3><a href="/blogs/how-influencer-marketing-can-elevate-your-digital-branding/" style="color: #000; text-decoration: none;">How Influencer Marketing Can Elevate Your Digital Branding</a></h3>
                            <p class="fs-20">With the advent of digital-first transactions, one could say that conventional marketing no longer prevails.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/how-influencer-marketing-can-elevate-your-digital-branding/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog2.webp') ?>">
                            <h3><a href="/blogs/7-key-branding-strategies-to-establish-a-strong-brand-identity/" style="color: #000; text-decoration: none;">7 Key Branding Strategies to Establish a Strong Brand Identity</a></h3>
                            <p class="fs-20">It is the case indeed that branding is not just limited to a logo or a catchy slogan; it is the emotional and psychological relationship that a business builds with its audience.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/7-key-branding-strategies-to-establish-a-strong-brand-identity/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog3.webp') ?>">
                            <h3><a href="/blogs/eid-al-adha-2025-smart-digital-marketing-tips/" style="color: #000; text-decoration: none;">Effective Digital Marketing Guide for Eid al-Adha Campaigns 2025</a></h3>
                            <p class="fs-20">Known as the "Festival of Sacrifice," Eid al-Adha is one of the most celebrated Islamic festivals, with millions of Muslims worldwide observing it.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/eid-al-adha-2025-smart-digital-marketing-tips/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog4.webp') ?>">
                            <h3><a href="/blogs/drive-smarter-growth-with-digital-marketing-trends-in-2025/" style="color: #000; text-decoration: none;">Drive Smarter Growth with Digital Marketing Trends in 2025</a></h3>
                            <p class="fs-20">Digital marketing is undergoing a massive makeover in 2025, driven by fast-paced technological changes and consumer tendencies.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/drive-smarter-growth-with-digital-marketing-trends-in-2025/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog-str.webp') ?>">
                            <h3><a href="/blogs/digital-marketing-strategy-consultant-dubai-strategy-before-scale/" style="color: #000; text-decoration: none;">Digital Marketing Strategy Consultant Dubai: Strategy Before Scale</a></h3>
                            <p class="fs-20">Digital Marketing Strategy Consultant Dubai helps businesses align SEO, paid ads, social media, and content growth plan.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/digital-marketing-strategy-consultant-dubai-strategy-before-scale/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog7.webp') ?>">
                            <h3><a href="/blogs/useful-tips-to-elevate-your-brand-s-online-visibility-with-seo/" style="color: #000; text-decoration: none;">Useful Tips to Elevate Your Brand’s Online Visibility with SEO</a></h3>
                            <p class="fs-20">In today’s digital era, if your brand isn't seen online, it may as well be invisible.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/useful-tips-to-elevate-your-brand-s-online-visibility-with-seo/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog-bra.webp') ?>">
                            <h3><a href="/blogs/how-custom-web-design-sets-your-website-apart/" style="color: #000; text-decoration: none;">How BrandStory Combines Decade-Long Experience with Modern Marketing</a></h3>
                            <p class="fs-20">At BrandStory, we've been at the forefront of this evolution for over 12 years. 100+ member powerhouse serving businesses across the UAE</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/how-custom-web-design-sets-your-website-apart/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/home/banner.webp') ?>">
                            <h3><a href="/blogs/digital-marketing-competitor-analysis-how-to-ethically-track-your-competitors/" style="color: #000; text-decoration: none;">Digital Marketing Competitor Analysis: How to Track Competitors</a></h3>
                            <p class="fs-20">Ethically carrying out competitor analysis in digital marketing for winning strategies through respectful and legally grounded means.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/digital-marketing-competitor-analysis-how-to-ethically-track-your-competitors/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main">
                            <img class="w-100 dm-blog-img" src="<?= base_url('assets/images/blog/blog-10.jpg') ?>">
                            <h3><a href="/blogs/digital-vs-traditional-marketing-what-your-brand-really-needs-today/" style="color: #000; text-decoration: none;">Digital vs Traditional Marketing: What You Really Needs</a></h3>
                            <p class="fs-20">Digital marketing includes all the online strategies and tools businesses use to reach and engage customers online.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/digital-vs-traditional-marketing-what-your-brand-really-needs-today/">Know more <img src="<?= base_url('/assets/images/home/readmore-arrow.svg') ?>?v=1"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next dmblog-next"></div>
            <div class="swiper-button-prev dmblog-prev"></div>
        </div>
    </div>
</section>

<section class="dm-faq-section sp-50 dm-bg">
    <div class="container">
        <h2 class="text-center text-white mb-lg-5 mb-4">Your Questions Answered</h2>
        <div class="dm-faq-main">
            <ul class="nav nav-pills justify-content-md-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-dm-tab" data-bs-toggle="pill" data-bs-target="#pills-dm" type="button" role="tab" aria-controls="pills-dm" aria-selected="true">Digital Marketing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-sm-tab" data-bs-toggle="pill" data-bs-target="#pills-sm" type="button" role="tab" aria-controls="pills-sm" aria-selected="false">SEO, Traffic, Social Media</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-as-tab" data-bs-toggle="pill" data-bs-target="#pills-as" type="button" role="tab" aria-controls="pills-as" aria-selected="false">Agency Support</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Digital Marketing Start -->
                <div class="tab-pane fade show active" id="pills-dm" role="tabpanel" aria-labelledby="pills-dm-tab">
                    <div class="accordion accordion-flush" id="accordionFlushExample1">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingOne1-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1-1" aria-expanded="false" aria-controls="flush-collapseOne1-1">
                                    What is Digital Marketing?
                                </button>
                            </h4>
                            <div id="flush-collapseOne1-1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne1-1" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Digital marketing is the process of marketing products, services, or businesses online through digital platforms. Digital marketing has replaced traditional marketing as the main tool for businesses to reach their target market. The three main types of digital marketing are online advertising, social media promotion, and content marketing.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Online advertising refers to when a business spends money to promote its products or services through digital channels like Google Ads, social media ads, display banners, or video ads on platforms like YouTube.</li>
                                        <li class="fs-20 text-white">Social media promotion involves sharing updates, offers, and engaging content on platforms such as Facebook, Instagram, LinkedIn, or Twitter to build awareness and connect with audiences.</li>
                                        <li class="fs-20 text-white">Content marketing is the creation and distribution of valuable content, like blogs, articles, videos, or infographics, to attract, inform, and engage a target audience without direct selling.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingTwo1-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo1-2" aria-expanded="false" aria-controls="flush-collapseTwo1-2">
                                    What is a Digital Marketing Strategy?
                                </button>
                            </h4>
                            <div id="flush-collapseTwo1-2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo1-2" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">A digital marketing strategy is a customized solution to meet your business's unique needs and goals. It helps brands achieve long-term results through data-driven decisions and proven approaches. Digital marketing strategies span multiple channels like SEO, social media, email, paid ads, and content marketing.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Identify the digital marketing trends and industry trends in various digital marketing channels.</li>
                                        <li class="fs-20 text-white">Build a unique strategy to make your brand unique based on the above research.</li>
                                        <li class="fs-20 text-white">Convince customers with a comprehensive digital strategy that you're offering your best product than your competitors.</li>
                                        <li class="fs-20 text-white">Digital marketing experts help brands to appear to the right audience through different digital marketing channels.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingThree1-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree1-3" aria-expanded="false" aria-controls="flush-collapseThree1-3">
                                    How can digital marketing help my business grow online?
                                </button>
                            </h4>
                            <div id="flush-collapseThree1-3" class="accordion-collapse collapse" aria-labelledby="flush-headingThree1-3" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Digital marketing is a process for promoting your business, products, or services online. It can increase brand awareness and enhance your reputation to attract new customers. Digital marketing has the potential to reach millions of people who are searching for information about what you have to offer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfour1-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour1-4" aria-expanded="false" aria-controls="flush-collapsefour1-4">
                                    How has digital marketing evolved in recent years (e.g., since 2022)?
                                </button>
                            </h4>
                            <div id="flush-collapsefour1-4" class="accordion-collapse collapse" aria-labelledby="flush-headingfour1-4" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Since 2022, digital marketing has transformed with rapid advancements in tech and user expectations. In 2025, AI-driven personalization, voice search, and conversational marketing are key to improving customer journeys.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Chatbots and virtual assistants offer instant, 24/7 support, creating seamless interactions and faster conversions.</li>
                                        <li class="fs-20 text-white">Meanwhile, social media has become central to brand discovery, with short-form videos, influencer marketing, and in-app shopping dominating the landscape.</li>
                                        <li class="fs-20 text-white">AR and VR are also enhancing digital experiences, making marketing more immersive and engaging than ever before.</li>
                                        <li class="fs-20 text-white">Brands are now leveraging a mix of automation, real-time analytics, and immersive tech to create smarter, more meaningful connections with their audiences.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfive1-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive1-5" aria-expanded="false" aria-controls="flush-collapsefive1-5">
                                    What type of companies need digital marketing?
                                </button>
                            </h4>
                            <div id="flush-collapsefive1-5" class="accordion-collapse collapse" aria-labelledby="flush-headingfive1-5" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Digital marketing can benefit any company seeking better visibility and reach potential customers online. For example, e-commerce websites can attract more shoppers through targeted ads, SEO, and social media.</p>
                                    <p class="fs-20 text-white mb-2">It’s also highly effective for locally based businesses in Dubai, as strategies like local SEO and Google My Business optimization help them appear at the top of local search results.</p>
                                    <p class="fs-20 text-white mb-0">From startups and small businesses to large enterprises, companies in industries like retail, healthcare, real estate, education, hospitality, and professional services can use digital marketing to boost awareness and drive leads.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingsix1-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix1-6" aria-expanded="false" aria-controls="flush-collapsesix1-6">
                                    Is digital marketing effective for businesses in Dubai?
                                </button>
                            </h4>
                            <div id="flush-collapsesix1-6" class="accordion-collapse collapse" aria-labelledby="flush-headingsix1-6" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Dubai is one of the best places to implement digital marketing strategies. The emirate of Dubai has the highest internet penetration in the UAE, and business owners can reach millions of people looking for information about their services and products.</p>
                                    <p class="fs-20 text-white mb-0">With a tech-savvy population, a booming e-commerce scene, and high mobile usage, digital marketing helps brands in Dubai build strong online visibility, drive targeted traffic, and stay competitive in a fast-paced market.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingseven1-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven1-7" aria-expanded="false" aria-controls="flush-collapseseven1-7">
                                    How long does it take to see results from digital marketing?
                                </button>
                            </h4>
                            <div id="flush-collapseseven1-7" class="accordion-collapse collapse" aria-labelledby="flush-headingseven1-7" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">The timeline depends on your business goals, industry, and digital marketing channels used.</p>
                                    <p class="fs-20 text-white mb-2">Paid ads can bring promising results within days, while SEO and content marketing usually take 3 to 6 months to gain traction. Social media growth and brand awareness build gradually but steadily.</p>
                                    <p class="fs-20 text-white mb-0">At Brandstory, we set realistic timelines and provide consistent progress updates, with a strong focus on both quick wins and sustainable growth.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingseven1-8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven1-8" aria-expanded="false" aria-controls="flush-collapseseven1-8">
                                    Do you provide brand strategy consulting?
                                </button>
                            </h4>
                            <div id="flush-collapseseven1-8" class="accordion-collapse collapse" aria-labelledby="flush-headingseven1-8" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Yes, we offer comprehensive brand strategy consulting to help businesses define their unique positioning, create a consistent brand voice, and develop impactful go-to-market strategies that drive long-term growth.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Digital Marketing end -->

                <!-- SEO, Traffic, Social Media Start -->
                <div class="tab-pane fade" id="pills-sm" role="tabpanel" aria-labelledby="pills-sm-tab">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingOne2-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2-1" aria-expanded="false" aria-controls="flush-collapseOne2-1">
                                    How can I gain more website traffic?
                                </button>
                            </h4>
                            <div id="flush-collapseOne2-1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2-1" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">There are a few things that you can do to increase your website's traffic. The first is to create a great website. The second is to promote your website through Search Engine Optimization, Pay-Per-Click Ads, and social media platforms. And the third is to get your website ranked high in search engine results pages (SERPs).</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingTwo2-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo2-2" aria-expanded="false" aria-controls="flush-collapseTwo2-2">
                                    Which is better: paid traffic or organic traffic?
                                </button>
                            </h4>
                            <div id="flush-collapseTwo2-2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo2-2" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">There is no definitive answer to this question, as the best way to generate traffic for your website or business depends on the goals that you have for your site and the traffic sources that you choose.</p>
                                    <p class="fs-20 text-white mb-0">Paid traffic delivers quick results and allows precise audience targeting, often leading to high-quality customer interactions. It’s ideal for time-sensitive campaigns or launching new products.</p>
                                    <p class="fs-20 text-white mb-0">Organic traffic, on the other hand, is earned over time through SEO, content marketing, and other inbound strategies. It comes from users actively searching for products or services, making them more likely to engage with your website and convert.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingThree2-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree2-3" aria-expanded="false" aria-controls="flush-collapseThree2-3">
                                    Why are keywords important?
                                </button>
                            </h4>
                            <div id="flush-collapseThree2-3" class="accordion-collapse collapse" aria-labelledby="flush-headingThree2-3" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Keyword research is essential for any business. By understanding the benefits and importance of keywords, businesses can create effective ad campaigns that target their audience and achieve the desired results. SEO is another important aspect of keyword research. By understanding what content ranks highest for those keywords, businesses can optimize their website to rank higher in search engine results pages (SERPs) and increase web traffic.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfour2-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour2-4" aria-expanded="false" aria-controls="flush-collapsefour2-4">
                                    How long do I need to invest in SEO?
                                </button>
                            </h4>
                            <div id="flush-collapsefour2-4" class="accordion-collapse collapse" aria-labelledby="flush-headingfour2-4" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">The question of how long you should wait to invest in SEO can be a complicated one. There are many factors to consider, such as your current site's traffic and Load times, your budget, and your desired results or KPIs. In the end, it is important to make sure that you have a clear understanding of what you want before investing time and money into SEO.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfive2-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive2-5" aria-expanded="false" aria-controls="flush-collapsefive2-5">
                                    What is social media marketing, and how does it benefit my business?
                                </button>
                            </h4>
                            <div id="flush-collapsefive2-5" class="accordion-collapse collapse" aria-labelledby="flush-headingfive2-5" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Social media marketing is the use of social platforms like Facebook, Instagram, Twitter, LinkedIn, and TikTok to promote a business, engage with the audience, and increase brand awareness. Social media marketing includes creating and sharing content, running ads, and interacting with followers to build a community.</p>
                                    <p class="fs-20 text-white mb-0">It can benefit businesses by:</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Better Brand Visibility: Social media platforms help you reach a broad audience and improve brand visibility.</li>
                                        <li class="fs-20 text-white">Customer Engagement: It provides a direct channel to interact with customers, build sustainable relationships, and address concerns in real-time.</li>
                                        <li class="fs-20 text-white">Driving Sales: Social media ads and organic posts can drive traffic to your business, leading to higher conversions and sales.</li>
                                    </ul>
                                    <p class="mb-0 text-white fs-20">Targeted Advertising: Social media allows for targeted advertisements to specific demographics and interests, improving the effectiveness of your campaigns.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingsix2-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix2-6" aria-expanded="false" aria-controls="flush-collapsesix2-6">
                                    Which social media platforms are best for businesses in Dubai?
                                </button>
                            </h4>
                            <div id="flush-collapsesix2-6" class="accordion-collapse collapse" aria-labelledby="flush-headingsix2-6" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">The Most Suitable social media platforms for businesses in Dubai are:</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Instagram – Highly popular for lifestyle, fashion, retail, hospitality, and real estate brands due to its visual appeal and strong engagement.</li>
                                        <li class="fs-20 text-white">LinkedIn – Ideal for B2B companies, professional services, and corporate branding with a strong business-focused audience.</li>
                                        <li class="fs-20 text-white">Facebook – Widely used across age groups in the UAE; great for community building, ads, and event promotions.</li>
                                        <li class="fs-20 text-white">TikTok – Rapidly growing in the region; perfect for brands targeting a younger audience with creative, short-form video content.</li>
                                        <li class="fs-20 text-white">YouTube – A powerful platform for video marketing, tutorials, product demos, and storytelling.</li>
                                        <li class="fs-20 text-white">Twitter (X) – Useful for news, customer service, and brand communication in real-time.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEO, Traffic, Social Media End -->

                <!-- Agency Support Start -->
                <div class="tab-pane fade" id="pills-as" role="tabpanel" aria-labelledby="pills-as-tab">
                    <div class="accordion accordion-flush" id="accordionFlushExample3">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingOne3-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne3-1" aria-expanded="false" aria-controls="flush-collapseOne3-1">
                                    Can I get a guaranteed improvement in website traffic?
                                </button>
                            </h4>
                            <div id="flush-collapseOne3-1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne3-1" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">We utilize a strategic and data-driven approach to digital marketing to guarantee that you will see a significant increase in website traffic. At Brandstory, we analyze your industry, audience behavior, and competition. We focus on SEO, paid ads, content, and social media channels proven to boost visibility and attract qualified visitors.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingTwo3-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo3-2" aria-expanded="false" aria-controls="flush-collapseTwo3-2">
                                    How can your digital marketing company help grow my business?
                                </button>
                            </h4>
                            <div id="flush-collapseTwo3-2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo3-2" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">At Brandstory, we help your business grow by creating data-backed digital strategies that align with your KPIs and goals.</p>
                                    <p class="fs-20 text-white mb-2">From SEO and social media to performance marketing and content creation, we use the right mix of channels to boost visibility, drive quality leads, and improve conversions.</p>
                                    <p class="fs-20 text-white mb-0">We focus on data-driven decisions, creative execution, and constant optimization, ensuring your brand stands out in the competitive Dubai market and achieves long-term success.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingThree3-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree3-3" aria-expanded="false" aria-controls="flush-collapseThree3-3">
                                    How does your content marketing team work?
                                </button>
                            </h4>
                            <div id="flush-collapseThree3-3" class="accordion-collapse collapse" aria-labelledby="flush-headingThree3-3" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Our content marketing team starts by understanding your brand voice, audience, and business KPIs.</p>
                                    <p class="fs-20 text-white mb-0">We create a tailored content strategy that includes blogs, social media posts, videos, infographics, and more, designed to engage, inform, and convert your target audience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfour3-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour3-4" aria-expanded="false" aria-controls="flush-collapsefour3-4">
                                    What key performance metrics do you measure?
                                </button>
                            </h4>
                            <div id="flush-collapsefour3-4" class="accordion-collapse collapse" aria-labelledby="flush-headingfour3-4" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Here are some key performance metrics we measure for digital marketing campaigns:</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Impressions</li>
                                        <li class="fs-20 text-white">Clicks</li>
                                        <li class="fs-20 text-white">Bounce Rate</li>
                                        <li class="fs-20 text-white">Traffic based on channels</li>
                                        <li class="fs-20 text-white">Traffic based on geo-location and devices</li>
                                        <li class="fs-20 text-white">Exit Rate</li>
                                        <li class="fs-20 text-white">Conversion rates</li>
                                        <li class="fs-20 text-white">Traffic to lead ratio</li>
                                        <li class="fs-20 text-white">Goal tracking</li>
                                        <li class="fs-20 text-white">Return on Ad Spend (ROAS)</li>
                                        <li class="fs-20 text-white">CTR - Click Through Rates</li>
                                        <li class="fs-20 text-white">CPL - Cost per lead</li>
                                        <li class="fs-20 text-white">CPA - Cost Per Acquisition</li>
                                        <li class="fs-20 text-white">Overall revenue</li>
                                        <li class="fs-20 text-white">Customer lifetime value (CLV)</li>
                                        <li class="fs-20 text-white">Customer retention rate</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfive3-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive3-5" aria-expanded="false" aria-controls="flush-collapsefive3-5">
                                    How much do digital marketing services cost per month?
                                </button>
                            </h4>
                            <div id="flush-collapsefive3-5" class="accordion-collapse collapse" aria-labelledby="flush-headingfive3-5" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">The cost of hiring Brandstory as your digital marketing partner agency will depend on several factors, including the size of your business, the services you are looking for. If your company is starting from scratch with no online presence at all, then it will likely be more expensive to hire an agency than if you already have a website.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfive3-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive3-6" aria-expanded="false" aria-controls="flush-collapsefive3-6">
                                    What services will I get from your digital marketing agency?

                                </button>
                            </h4>
                            <div id="flush-collapsefive3-6" class="accordion-collapse collapse" aria-labelledby="flush-headingfive3-6" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">

                                        We deliver a full suite of digital marketing services in Dubai:</p>
                                    <ul style="color: white;">
                                        <li>Search Engine Optimization (SEO)</li>
                                        <li>Social Media Marketing (SMM)</li>
                                        <li>Pay Per Click Advertising (PPC)</li>
                                        <li>Google Ads Services</li>
                                        <li>Meta Ads (Facebook & Instagram)</li>
                                        <li>Email Marketing</li>
                                        <li>Online Reputation Management</li>
                                        <li>Content Marketing</li>
                                        <li>Website Design and Development</li>
                                        <li>Influencer Marketing</li>
                                    </ul>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Agency Support End -->
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="new-cta-footer">
        <div class="new-cta-footer-container">
            <h2 class="new-cta-footer-title">
                Grow Traffic. Build Engagement. Amplify Results. <br>With BrandStory
            </h2>
            <p class="new-cta-footer-text">
                Digital marketing today is no longer just a support tool – it is the backbone of your business growth. At BrandStory, we believe every business should have a digital transformation strategy that is bold, unique, innovative, and performance-driven. As Dubai’s premier marketing partner for 100+ local and global brands, we craft campaigns that go beyond visibility and drive real business value.
            </p>

            <!-- Hidden Content -->
            <div class="content-read-more">
                <h3 class="mt-3">“Great marketing isn’t about noise, it’s about impact”</h3>
                <p class="new-cta-footer-text">
                    Inspired by the unity of the Arab Emirates and the heights of the Burj Khalifa, we design digital transformation that elevates, inspires, and etches brands into the Skyline itself.
                </p>
                <h3 class="mt-4">We are a 360-Degree Digital Marketing Agency</h3>
                <p class="new-cta-footer-text">
                    Your audience is constantly evolving with time, shifting across social media, search engines, and digital platforms. We craft targeted digital marketing campaigns and strategies that engage users, drive conversions, and keep your brand visible, relevant, and influential at every stage of their online journey.
                    <br><br>
                    We don’t just rely on creativity, nor do we depend on numbers alone. By blending data-driven insights with results-focused strategies, we create campaigns that engage and convert. For us, success is about conversions, brand credibility, and long-term customer loyalty. At BrandStory, we don’t just market your business – we help build its digital legacy.
                    <br><br>
                    From SEO, PPC, and social media marketing to branding, content creation, paid advertising, performance marketing, and web design, BrandStory delivers a full spectrum of digital marketing services that elevate brands to stand out and endure.
                </p>
            </div>

            <!-- Buttons -->
            <div class="d-flex pb-2 flex-md-row flex-column-reverse gap-4 align-items-center w-100 justify-content-center">
                <a href="/contact/" class="Performance-Driven-btn mt-2 mt-md-0">
                    <span>➤ Get in Touch</span>
                </a>
                <a href="javascript:void(0)" class="Performance-Driven-btn" id="readMoreBtn">
                    <span>➤ Read More</span>
                </a>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const counters = document.querySelectorAll(".dm-count-num");
        let started = false;

        const startCount = (el) => {
            let target = +el.innerText.replace(/\D/g, ""); // Remove non-digits
            let count = 0;
            const increment = Math.ceil(target / 100);

            const updateCount = () => {
                count += increment;
                if (count >= target) {
                    el.innerText = target + "+";
                } else {
                    el.innerText = count + "+";
                    requestAnimationFrame(updateCount);
                }
            };
            updateCount();
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !started) {
                    counters.forEach(counter => startCount(counter));
                    started = true;
                    observer.disconnect(); // Stop observing after first trigger
                }
            });
        }, {
            threshold: 0.3
        });

        const counterSection = document.querySelector(".dm-counter-sec");
        if (counterSection) {
            observer.observe(counterSection);
        }
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".strategy-title").on("click", function() {
            // Remove 'active' from all and add it to the clicked one
            $(".strategy-title").removeClass("active");
            $(this).addClass("active");

            // Get the unique class name (e.g., 'strategy1', 'strategy2'...)
            var classList = $(this).attr("class").split(/\s+/);
            var targetClass = classList.find(c => c.startsWith("strategy") && c !== "strategy-title");

            // Hide all and show the matched one
            $(".strategy-process-main").hide();
            $(".strategy-process-main." + targetClass).show();
        });

        // Initial state: show only the first
        $(".strategy-process-main").hide();
        $(".strategy-process-main.strategy1").show();
    });
</script>
<script>
    const descriptions = {

        gds: {
            title: "Google Data Studio",
            text: "At BrandStory, we use Google Data Studio to showcase campaign results in a visually compelling format, helping clients understand ROI and growth metrics."
        },
        ga: {
            title: "Google Analytics",
            text: "We are experts in Google Analytics 4, enabling smarter decisions through advanced data tracking. We turn data into actionable strategies that drive growth."
        },
        hubspot: {
            title: "HubSpot",
            text: "From email automation to lead scoring, we use HubSpot Marketing to power smarter marketing strategies. This helps us personalize customer journeys and boost conversions."
        },
        semrush: {
            title: "SemRush",
            text: "Semrush is our go-to tool for building competitive, results-oriented digital marketing strategies. This helps uncover growth opportunities, optimize content, and stay ahead in search rankings."
        },
        surfer: {
            title: "Surfer SEO",
            text: "With Surfer SEO expertise, we create content that’s optimized to perform. Our team ensures every piece aligns with search engine best practices."
        },
        mailchimp: {
            title: "Mailchimp",
            text: "We harness Mailchimp to design and automate engaging email campaigns. From audience segmentation to analytics, we are well-versed in all the best practices for email marketing."
        },
        adroll: {
            title: "AdRoll",
            text: "We use AdRoll to run powerful retargeting and display ad campaigns. From cart abandoners to casual browsers, we bring them back to convert."
        },
        'google-ads': {
            title: "Google Ads",
            text: "We use Google Ads for high-ROI search, display, and video campaigns that target the right audience with precision. "
        },
        'meta-ads-manager': {
            title: "Meta Ads Manager",
            text: "Meta Ads Manager helps us run data-driven campaigns across Facebook and Instagram to maximize reach, engagement, and conversions."
        },
        "google-tag-manager": {
            title: "Google Tag Manager",
            text: "Google Tag Manager helps us to efficiently deploy tags on your website, enabling seamless tracking of campaign performance and user behavior."
        },
        hootsuite: {
            title: "Hootsuite",
            text: "Hootsuite helps us effectively schedule, manage, and monitor multi-platform social media campaigns with ease and streamlines the workflow."
        }
    };

    const cards = document.querySelectorAll('.tool-card');
    const descBox = document.getElementById('tool-description');

    cards.forEach(card => {
        card.addEventListener('click', () => {
            cards.forEach(c => c.classList.remove('active'));
            card.classList.add('active');
            const key = card.getAttribute('data-tool');
            descBox.innerHTML = `<h3>${descriptions[key].title}</h3><p>${descriptions[key].text}</p>`;
        });
    });

    // Set default active
    const defaultCard = document.querySelector('.tool-card[data-tool="gsc"]') || document.querySelector('.tool-card');
    if (defaultCard) {
        defaultCard.classList.add('active');
    }

    // Niches Accordion JS
    const nicheItems = document.querySelectorAll('.niche-item');
    const nicheImagesBox = document.getElementById('niches-images');
    const serviceTitleLink = document.querySelector('.services-title a');

    nicheItems.forEach(item => {
        item.addEventListener('click', function() {
            if (this.classList.contains('active')) return;

            // Update active state
            nicheItems.forEach(i => {
                i.classList.remove('active');
                i.querySelector('.niche-toggle').textContent = '+';
            });
            this.classList.add('active');
            this.querySelector('.niche-toggle').textContent = '−';

            // Change images with fade effect
            const images = JSON.parse(this.getAttribute('data-images'));
            const imgElems = nicheImagesBox.querySelectorAll('.niche-image-box img');

            imgElems.forEach((img, index) => {
                img.style.opacity = '0';
                img.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    img.src = '<?= base_url() ?>/' + images[index];
                    img.style.opacity = '1';
                    img.style.transform = 'scale(1)';
                }, 300);
            });

            // Update Dynamic Link in Heading
            const serviceLink = this.getAttribute('data-service-link');
            const serviceText = this.getAttribute('data-service-text');
            if (serviceTitleLink) {
                serviceTitleLink.href = serviceLink;
                serviceTitleLink.textContent = serviceText;
            }
            // Improved Scroll Logic: Only scroll on mobile if item is not fully visible
            const isMobile = window.innerWidth <= 991;
            if (isMobile) {
                setTimeout(() => {
                    const headerHeight = document.querySelector('header.header')?.offsetHeight || 80;
                    const rect = this.getBoundingClientRect();
                    const elementTop = rect.top + window.pageYOffset;

                    // Only scroll if the top of the item is not nicely positioned
                    window.scrollTo({
                        top: elementTop - headerHeight - 20,
                        behavior: 'smooth'
                    });
                }, 450); // Wait for transition to be nearly complete
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoModal = document.getElementById('homeVideoModal');
        const videoIframe = document.getElementById('homeVideoIframe');
        const closeVideo = document.getElementById('closeHomeVideo');

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


<div class="video-modal" id="homeVideoModal">
    <div class="video-modal-content">
        <span class="close-video-modal" id="closeHomeVideo">&times;</span>
        <div class="video-container">
            <iframe id="homeVideoIframe" width="100%" height="100%" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>