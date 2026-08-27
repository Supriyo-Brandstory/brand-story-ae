<link rel="stylesheet" href="<?= base_url('assets/css/home-2.css') ?>">

<section class="premium-hero-slider">
    <div class="premium-slider-container">
        <!-- Slide 1 -->
        <div class="premium-slide active"
            style="background-image: url('<?= base_url('assets/images/email/banner02.webp') ?>');">
            <div class="container">
                <div class="premium-slide-content">
                    <h1 class="premium-slide-title">Top-rated <span class="premium-purple-highlight">Digital
                            Marketing</span> Consulting Agency in Dubai</h1>
                    <p class="premium-slide-subtitle">We are a trusted digital marketing partner in Dubai for
                        <strong>950+ businesses</strong>, helping SMEs and enterprises drive consistent digital growth
                        with precision.
                    </p>
                    <div class="premium-slide-actions">
                        <a href="javascript:void(0);" class="premium-pill-btn uniq-contact-lead-btn">
                            <span>Talk to Expert</span>
                            <span class="btn-arrow-circle">
                                <svg viewBox="0 0 24 24" class="btn-arrow-svg">
                                    <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="premium-slide" style="background-image: url('<?= base_url('assets/images/banner03.webp') ?>');">
            <div class="container">
                <div class="premium-slide-content">
                    <h1 class="premium-slide-title">Empowering Businesses to Dominate with <span
                            class="premium-purple-highlight">Digital Marketing</span></h1>
                    <p class="premium-slide-subtitle">Established in 2012, BrandStory delivers industry-leading digital
                        marketing services in Dubai, UAE, backed by <strong>100+ experts</strong> driving real digital
                        growth.</p>
                    <div class="premium-slide-actions">
                        <a href="/case-study/" class="premium-pill-btn">
                            <span>Explore Portfolio</span>
                            <span class="btn-arrow-circle">
                                <svg viewBox="0 0 24 24" class="btn-arrow-svg">
                                    <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Dots -->
    <div class="premium-slider-dots">
        <span class="slider-dot active" data-index="0"></span>
        <span class="slider-dot" data-index="1"></span>
    </div>

    <!-- Prev/Next Navigation arrows (hidden)
    <button class="premium-slider-arrow prev-arrow" aria-label="Previous Slide">
        <svg viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <button class="premium-slider-arrow next-arrow" aria-label="Next Slide">
        <svg viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    -->
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.premium-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const prevBtn = document.querySelector('.prev-arrow');
        const nextBtn = document.querySelector('.next-arrow');
        let currentSlide = 0;
        let slideInterval;
        const intervalTime = 6000;

        function showSlide(index) {
            if (index >= slides.length) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = slides.length - 1;
            } else {
                currentSlide = index;
            }

            slides.forEach((slide, i) => {
                if (i === currentSlide) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });

            dots.forEach((dot, i) => {
                if (i === currentSlide) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        function startSlideShow() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                startSlideShow();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                startSlideShow();
            });
        }

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                showSlide(i);
                startSlideShow();
            });
        });

        startSlideShow();
    });
</script>

<section class="premium-perf-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Image -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="premium-perf-img-wrap">
                    <img src="<?= base_url('assets/images/digital-01.webp') ?>" width="1332" height="1302"
                        alt="Digital Marketing Agency Dubai" class="img-fluid premium-perf-img">
                </div>
            </div>
            <!-- Right Side: Content -->
            <div class="col-lg-6">
                <div class="premium-perf-content">
                    <h2 class="premium-perf-title">Digital Marketing Company in Dubai, Where Performance Meets Results
                    </h2>
                    <ul class="premium-perf-list">
                        <li>Take your business to new heights with BrandStory, the BEST digital marketing agency in
                            Dubai. We deliver digital marketing and growth engineering services to clients across Dubai
                            and the UAE. Working with a tech-savvy team of experts, we specialize in SEO, PPC, Social
                            Media, ORM, Email Marketing, branding, and website development.</li>
                        <li>Recognized by reputable brands to deliver growth, visibility, and results that matter, we
                            are the benchmark digital agency for excellence and innovation. From strategy planning to
                            campaign management, we create digital marketing solutions to generate traffic, leads, and
                            true results for businesses.</li>
                        <!-- <li>We keep your business requirements at the center and build strategies to reach and engage your target audiences. Whether you are a new startup or an established enterprise, our cutting-edge digital marketing services in Dubai are designed to deliver remarkable results.</li> -->
                    </ul>
                    <div class="premium-perf-action">
                        <a href="/about/" class="premium-perf-btn">Know About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="premium-cs-section">
    <div class="container">
        <!-- Header row -->
        <div class="row align-items-center mb-5">
            <div class="col-md-7">
                <h2 class="premium-cs-title">Real Brands. Real Results. <br>Real Digital Marketing Success.</h2>
            </div>
            <div class="col-md-5">
                <p class="premium-cs-subtitle">Discover how our strategic digital marketing approach has turned business
                    challenges into measurable growth for brands in Dubai, UAE.</p>
                <div class="mt-4">
                    <a href="/case-study/" class="premium-cs-btn">View All Portfolio</a>
                </div>
            </div>
        </div>

        <!-- Redesigned Case Study list -->
        <div class="premium-cs-list">
            <!-- Card 1: Sand Dollar -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-01.webp') ?>"
                                alt="Sand Dollar Dubai- Ecommerce" class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">Sand Dollar Dubai- Ecommerce</h3>
                            <div class="premium-cs-row-stats">135% More Sales | 400% More Traffic | Just 3 Months</div>
                            <p class="premium-cs-row-desc">A thriving e-commerce brand in Downtown Dubai faced stagnant
                                sales- BrandStory crafted a data-driven SEO, PPC, and social media strategy that
                                transformed their digital performance completely.</p>
                            <a href="<?= base_url('case-study/e-commerce/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: TravelEX -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Branding & Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-02.webp') ?>" alt="TravelEX"
                                class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">TravelEX</h3>
                            <div class="premium-cs-row-stats">210% More Enquiries | Stronger Visibility | Just 3 Months
                            </div>
                            <p class="premium-cs-row-desc">TravelEX faced growing competition in UAE's financial
                                services market- BrandStory crafted a data-driven PPC, SEO, and social media strategy
                                that significantly boosted visibility and drove customer enquiries.</p>
                            <a href="<?= base_url('case-study/travel-agency/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3: Crystal Plaza -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-03.webp') ?>" alt="Crystal Plaza"
                                class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">Crystal Plaza</h3>
                            <div class="premium-cs-row-stats">5.2x ROAS | 40+ 1st Page Rankings | Bookings Soared</div>
                            <p class="premium-cs-row-desc">Crystal Plaza, one of Sharjah's well-known hotel chains,
                                needed to cut through the noise and drive direct bookings- BrandStory delivered paid
                                marketing and local SEO strategy that put them ahead of the competition. (Ex. "luxury
                                hotel in Dubai", "business stay Dubai")</p>
                            <a href="<?= base_url('case-study/hotel/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4: NIMS School -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-04.webp') ?>" alt="NIMS School"
                                class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">NIMS School</h3>
                            <div class="premium-cs-row-stats">Top 5 Rankings | 80% More Engagement | Enrollment Surged
                            </div>
                            <p class="premium-cs-row-desc">In Dubai's competitive education landscape, NIMS School
                                needed more than visibility- they needed trust. BrandStory delivered a data-driven SEO
                                and social media strategy to improve awareness & turn interest into enrollments.</p>
                            <a href="<?= base_url('case-study/education-institution/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 5: Wipro Infrastructure Engineering -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-05.webp') ?>"
                                alt="Wipro Infrastructure Engineering" class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">Wipro Infrastructure Engineering</h3>
                            <div class="premium-cs-row-stats">Global Reach | Targeted PPC | More Brand Authority</div>
                            <p class="premium-cs-row-desc">Operating across India, Europe, and the UAE, Wipro
                                Infrastructure Engineering needed a digital strategy as powerful as their global
                                operations. BrandStory created high-impact social media and PPC campaigns that improved
                                online presence and drove qualified leads.</p>
                            <a href="<?= base_url('case-study/wipro-infrastructure-engineering/') ?>"
                                class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="new-client-section">
    <div class="container">
        <h2 class="text-left mb-5 text-white">Trusted by Visionary Brands</h2>
        <?php include __DIR__ . '/component/client_section.php' ?>
    </div>
</section>
<section class="premium-services-section">
    <div class="container">
        <h2 class="premium-services-title">Experience Our Next-Level Digital Marketing <br>Services in Dubai, UAE</h2>
        <div class="row g-4">
            <!-- Card 1: SEO -->
            <div class="col-lg-4 col-md-6">
                <a href="/seo-services-company-in-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M26.5436 11.8085C27.2143 11.6461 27.6269 10.9704 27.464 10.2997C27.3022 9.62767 26.6241 9.2114 25.9552 9.37925C15.8252 11.8316 8.75 20.8252 8.75 31.25C8.75 43.6566 18.8434 53.75 31.25 53.75C41.6772 53.75 50.6708 46.673 53.1219 36.5399C53.2837 35.8691 52.8717 35.1935 52.2003 35.0311C51.5356 34.8712 50.8551 35.2814 50.6915 35.9527C48.5132 44.9597 40.5188 51.25 31.25 51.25C20.2222 51.25 11.25 42.2778 11.25 31.25C11.25 21.983 17.5391 13.9886 26.5436 11.8085Z"
                                fill="white" />
                            <path
                                d="M60.0967 52.3959C60.7331 50.2648 60.2397 47.8651 58.5596 46.1854L56.795 44.4208C58.0597 41.9664 59.0054 39.3083 59.5258 36.4759C59.6509 35.7972 59.2017 35.1453 58.5223 35.0208C57.8485 34.8969 57.1918 35.3455 57.0673 36.0242C54.7809 48.4681 43.9233 57.5001 31.25 57.5001C16.7755 57.5001 5 45.7245 5 31.2501C5 18.2111 14.7229 7.03375 27.6172 5.2497C28.3008 5.1551 28.7787 4.52399 28.6841 3.83979C28.5895 3.15559 27.9468 2.67401 27.2742 2.77289C13.1506 4.72724 2.5 16.9697 2.5 31.2501C2.5 47.1027 15.3973 60.0001 31.25 60.0001C35.9692 60.0001 40.4455 58.8338 44.4141 56.7885L46.1853 58.5596C47.4036 59.7779 49.0039 60.3876 50.6042 60.3876C51.2107 60.3876 51.8102 60.2717 52.3958 60.0967L68.2037 75.9052C70.3265 78.0277 73.7824 78.0277 75.9052 75.9052C78.028 73.7818 78.028 70.3272 75.9052 68.2038L60.0967 52.3959ZM47.9529 56.7921L46.6604 55.4996C50.2063 53.2469 53.2326 50.239 55.5051 46.666L56.792 47.9529C58.2538 49.4153 58.2538 51.7939 56.792 53.2563L53.2562 56.7921C51.7938 58.2533 49.4153 58.2545 47.9529 56.7921ZM74.1376 74.1376C72.9889 75.2851 71.12 75.2851 69.9713 74.1376L54.677 58.8428C55.1579 58.4677 58.4671 55.1583 58.8427 54.6771L74.1376 69.9714C75.2856 71.1201 75.2856 72.9889 74.1376 74.1376Z"
                                fill="white" />
                            <path
                                d="M71.25 2.5H36.25C32.804 2.5 30 5.30395 30 8.75V26.25C30 29.6961 32.804 32.5 36.25 32.5H71.25C74.696 32.5 77.5 29.6961 77.5 26.25V8.75C77.5 5.30395 74.696 2.5 71.25 2.5ZM75 26.25C75 28.3179 73.3179 30 71.25 30H36.25C34.1821 30 32.5 28.3179 32.5 26.25V8.75C32.5 6.68213 34.1821 5 36.25 5H71.25C73.3179 5 75 6.68213 75 8.75V26.25Z"
                                fill="white" />
                            <path
                                d="M39.0668 12.5493C40.0873 12.5493 40.9174 13.3794 40.9174 14.3999C40.9174 15.0902 41.477 15.6499 42.1674 15.6499C42.8577 15.6499 43.4174 15.0902 43.4174 14.3999C43.4174 12.0012 41.4655 10.0493 39.0668 10.0493C36.6681 10.0493 34.7168 12.0012 34.7168 14.3999C34.7168 16.7986 36.6681 18.7499 39.0668 18.7499C40.0873 18.7499 40.9174 19.58 40.9174 20.5999C40.9174 21.6204 40.0873 22.4504 39.0668 22.4504C38.0469 22.4504 37.2168 21.6204 37.2168 20.5999C37.2168 19.9095 36.6571 19.3499 35.9668 19.3499C35.2765 19.3499 34.7168 19.9095 34.7168 20.5999C34.7168 22.9985 36.6681 24.9504 39.0668 24.9504C41.4654 24.9504 43.4174 22.9985 43.4174 20.5999C43.4174 18.2012 41.4655 16.2499 39.0668 16.2499C38.0469 16.2499 37.2168 15.4198 37.2168 14.3999C37.2168 13.3794 38.0469 12.5493 39.0668 12.5493Z"
                                fill="white" />
                            <path
                                d="M54.9696 12.5493C55.6599 12.5493 56.2196 11.9896 56.2196 11.2993C56.2196 10.609 55.6599 10.0493 54.9696 10.0493H48.8765C48.1862 10.0493 47.6265 10.609 47.6265 11.2993V23.7004C47.6265 24.3908 48.1862 24.9504 48.8765 24.9504H54.9696C55.6599 24.9504 56.2196 24.3908 56.2196 23.7004C56.2196 23.0101 55.6599 22.4504 54.9696 22.4504H50.1265V18.7499H54.9696C55.6599 18.7499 56.2196 18.1902 56.2196 17.4999C56.2196 16.8096 55.6599 16.2499 54.9696 16.2499H50.1265V12.5493H54.9696Z"
                                fill="white" />
                            <path
                                d="M65.3326 10.0493C61.2244 10.0493 57.8821 13.3916 57.8821 17.4999C57.8821 21.6082 61.2244 24.9504 65.3326 24.9504C69.4409 24.9504 72.7832 21.6082 72.7832 17.4999C72.7832 13.3916 69.4409 10.0493 65.3326 10.0493ZM65.3326 22.4504C62.6032 22.4504 60.3821 20.2294 60.3821 17.4999C60.3821 14.7704 62.6032 12.5493 65.3326 12.5493C68.0621 12.5493 70.2832 14.7704 70.2832 17.4999C70.2832 20.2294 68.0621 22.4504 65.3326 22.4504Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Search Engine <br>Optimization (SEO)</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">Search Engine Optimization plays a significant role in improving
                            website visibility and driving organic traffic. Our SEO experts in Dubai follow proven
                            strategies to maximize results and secure top page ranking in SERPs.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 2: SMM -->
            <div class="col-lg-4 col-md-6">
                <a href="/social-media-marketing-agency-in-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="64" height="57" viewBox="0 0 64 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M54.248 50.4558C53.8249 50.4558 53.4668 50.114 53.4668 49.6745C53.4668 49.2514 53.8086 48.8933 54.248 48.8933H60.0748C61.2955 48.8933 62.2884 47.9005 62.2884 46.6798V3.75979C62.2884 2.53911 61.2956 1.54623 60.0748 1.54623H3.7759C2.55522 1.54623 1.56235 2.53905 1.56235 3.75979V46.696C1.56235 47.9167 2.55516 48.9096 3.7759 48.9096H18.4732C18.8964 48.9096 19.2545 49.2514 19.2545 49.6908C19.2545 50.1303 18.9127 50.4721 18.4732 50.4721L3.7759 50.4721C1.70883 50.4721 0.0161133 48.7794 0.0161133 46.7123L0.0161594 3.75979C0.0161594 1.69272 1.70888 0 3.77595 0H60.0749C62.1419 0 63.8347 1.69272 63.8347 3.75979V46.696C63.8347 48.7631 62.1419 50.4558 60.0749 50.4558L54.248 50.4558Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M63.0697 11.1328H0.781236C0.358069 11.1328 0 10.791 0 10.3516C0 9.91214 0.341782 9.57036 0.781236 9.57036L63.0534 9.57031C63.4766 9.57031 63.8347 9.91209 63.8347 10.3515C63.8347 10.791 63.4929 11.1328 63.0697 11.1328Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.60818 8.23564C5.19214 8.23564 4.02026 7.08005 4.02026 5.64773C4.02026 4.23169 5.17585 3.05981 6.60818 3.05981C8.04049 3.05981 9.19609 4.2154 9.19609 5.64773C9.17976 7.08004 8.02417 8.23564 6.60818 8.23564ZM6.60818 4.62238C6.03852 4.62238 5.5665 5.09441 5.5665 5.66406C5.5665 6.23371 6.03852 6.70574 6.60818 6.70574C7.17783 6.70574 7.64985 6.23371 7.64985 5.66406C7.63357 5.07808 7.17783 4.62238 6.60818 4.62238Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.5254 8.23564C12.1094 8.23564 10.9375 7.08005 10.9375 5.64773C10.9375 4.23169 12.0931 3.05981 13.5254 3.05981C14.9415 3.05981 16.1133 4.2154 16.1133 5.64773C16.097 7.08004 14.9415 8.23564 13.5254 8.23564ZM13.5254 4.62238C12.9558 4.62238 12.4837 5.09441 12.4837 5.66406C12.4837 6.23371 12.9558 6.70574 13.5254 6.70574C14.0951 6.70574 14.5671 6.23371 14.5671 5.66406C14.5508 5.07808 14.0951 4.62238 13.5254 4.62238Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.2801 8.23564C18.864 8.23564 17.6921 7.08005 17.6921 5.64773C17.6921 4.23169 18.8477 3.05981 20.2801 3.05981C21.6961 3.05981 22.868 4.2154 22.868 5.64773C22.868 7.08004 21.7123 8.23564 20.2801 8.23564ZM20.2801 4.62238C19.7104 4.62238 19.2384 5.09441 19.2384 5.66406C19.2384 6.23371 19.7104 6.70574 20.2801 6.70574C20.8497 6.70574 21.3217 6.23371 21.3217 5.66406C21.3217 5.07808 20.8497 4.62238 20.2801 4.62238Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.448 20.1008H5.50145C5.07828 20.1008 4.72021 19.759 4.72021 19.3196C4.72021 18.8801 5.062 18.5383 5.50145 18.5383H17.448C17.8712 18.5383 18.2293 18.8801 18.2293 19.3196C18.2293 19.759 17.8875 20.1008 17.448 20.1008Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.448 25.9929H5.50145C5.07828 25.9929 4.72021 25.6512 4.72021 25.2117C4.72021 24.7722 5.062 24.4305 5.50145 24.4305L17.448 24.4304C17.8712 24.4304 18.2293 24.7722 18.2293 25.2117C18.2293 25.6511 17.8875 25.9929 17.448 25.9929Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.4188 31.8847H5.50145C5.07828 31.8847 4.72021 31.543 4.72021 31.1035C4.72021 30.664 5.062 30.3223 5.50145 30.3223H12.4188C12.8419 30.3223 13.2 30.664 13.2 31.1035C13.2 31.543 12.8419 31.8847 12.4188 31.8847Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.8804 31.8847H15.4136C14.9904 31.8847 14.6323 31.543 14.6323 31.1035C14.6323 30.664 14.9741 30.3223 15.4136 30.3223H18.8804C19.3035 30.3223 19.6616 30.664 19.6616 31.1035C19.6616 31.543 19.3198 31.8847 18.8804 31.8847Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M26.2531 49.4304C24.6418 49.4304 23.0468 48.7143 21.9888 47.3471C20.2636 45.1172 20.0682 41.4714 22.5096 39.5671L25.8951 36.7025C26.0578 36.5723 26.2694 36.5072 26.481 36.5234C26.6926 36.5397 26.8879 36.6536 27.0181 36.8164L33.0403 44.6289C33.3007 44.9707 33.2356 45.459 32.8938 45.7194L29.5247 48.3073C28.5481 49.0723 27.3925 49.4304 26.2531 49.4304ZM26.2694 38.4115L23.4862 40.7553C23.4699 40.7553 23.4699 40.7715 23.4536 40.7715C21.7609 42.0899 21.9562 44.7917 23.1932 46.3868C24.479 48.0632 26.8879 48.3724 28.5644 47.0866L31.315 44.9707L26.2694 38.4115Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M32.9265 46.5658C32.6824 46.5658 32.4545 46.4519 32.308 46.2565L25.765 37.7604C25.5697 37.5163 25.5534 37.1745 25.7162 36.8978L34.603 21.6471C34.7331 21.4193 34.961 21.2891 35.2215 21.2728C35.4819 21.2565 35.726 21.3704 35.8888 21.5657L50.765 40.8691C50.9278 41.0807 50.9604 41.3412 50.879 41.5853C50.7976 41.8294 50.586 42.0247 50.3418 42.0898L33.1218 46.5332C33.0567 46.5494 32.9916 46.5658 32.9265 46.5658ZM27.3113 37.2396L33.2195 44.9219L48.812 40.8854L35.3517 23.4212L27.3113 37.2396Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M45.3126 35.84C45.0847 35.84 44.8569 35.7423 44.6941 35.547C44.4337 35.2052 44.4988 34.7169 44.8243 34.4565C46.4519 33.187 46.7612 30.8432 45.5079 29.2156C44.8894 28.4181 44.0105 27.9136 43.0177 27.7834C42.0248 27.6532 41.0483 27.9299 40.267 28.5321C39.9253 28.7925 39.4369 28.7274 39.1765 28.4019C38.9161 28.0601 38.9812 27.5718 39.3067 27.3114C40.4135 26.4488 41.797 26.0744 43.1967 26.2534C44.5965 26.4325 45.8497 27.1486 46.7124 28.2716C48.4865 30.5666 48.0633 33.8869 45.7521 35.6772C45.6382 35.7912 45.4754 35.84 45.3126 35.84Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M50.0978 36.7839C49.87 36.7839 49.6421 36.6862 49.4793 36.4746C49.2189 36.1328 49.284 35.6445 49.6258 35.3841C50.9279 34.3913 51.6929 32.8613 51.8068 31.1035C51.9207 29.2969 51.3348 27.4577 50.1629 25.9277C48.8933 24.2838 47.0704 23.1933 45.1498 22.9492C43.5711 22.7539 42.0574 23.1283 40.8855 24.0397C40.5437 24.3001 40.0554 24.235 39.795 23.8932C39.5346 23.5514 39.5997 23.0631 39.9415 22.8027C41.4389 21.6309 43.3757 21.1426 45.3614 21.403C47.6726 21.696 49.8699 22.998 51.3999 24.9837C52.7996 26.8066 53.4995 29.0202 53.3693 31.2012C53.2228 33.4147 52.2462 35.3353 50.5861 36.6048C50.4396 36.735 50.2606 36.7839 50.0978 36.7839Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M53.7111 38.2326C53.4833 38.2326 53.2554 38.1349 53.0926 37.9233C52.8322 37.5815 52.8973 37.0932 53.2391 36.8328C54.5412 35.8237 55.355 34.31 55.5991 32.422C55.9735 29.4923 54.8993 26.0255 52.702 23.1772C50.8628 20.7846 48.454 19.0593 45.9312 18.3269C43.506 17.6108 41.2599 17.92 39.6323 19.1895C39.2905 19.4499 38.8022 19.3848 38.5418 19.043C38.2814 18.7012 38.3465 18.2129 38.6883 17.9525C40.7228 16.39 43.4572 15.9831 46.3706 16.8295C49.2026 17.6596 51.8882 19.5639 53.939 22.2168C56.4129 25.4395 57.5848 29.2155 57.1454 32.6009C56.8524 34.8959 55.827 36.7839 54.1831 38.0371C54.0367 38.1837 53.8739 38.2326 53.7111 38.2326Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M35.3192 56.608C34.896 56.608 34.4891 56.4127 34.2287 56.0709L28.2554 48.3235C28.1252 48.1607 28.0763 47.9492 28.1089 47.7539C28.1415 47.5423 28.2391 47.3632 28.4019 47.233L31.9501 44.4986C32.2919 44.2382 32.7802 44.3033 33.0406 44.6451L37.0607 49.8535C37.6955 50.6673 37.8745 51.7415 37.5653 52.7343L36.6538 55.6477C36.5073 56.136 36.1004 56.5104 35.5796 56.5917C35.4819 56.5917 35.4005 56.608 35.3192 56.608ZM29.948 47.9817L35.2541 54.8665L36.0679 52.2461C36.2306 51.7415 36.133 51.2044 35.8075 50.7812L32.2593 46.1914L29.948 47.9817Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M46.3379 43.0989C46.11 43.0989 45.8822 43.0012 45.7194 42.8059L32.6986 25.895C32.4382 25.5532 32.5033 25.0649 32.8451 24.8045C33.1868 24.5441 33.6752 24.6092 33.9355 24.951L46.9564 41.8619C47.2168 42.2037 47.1517 42.692 46.8099 42.9524C46.6797 43.0501 46.517 43.0989 46.3379 43.0989Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.7735 36.9465H5.33861C4.91544 36.9465 4.55737 36.6047 4.55737 36.1653C4.55737 35.7258 4.89916 35.384 5.33861 35.384H17.7735C18.1967 35.384 18.5547 35.7258 18.5547 36.1653C18.5547 36.6047 18.1967 36.9465 17.7735 36.9465Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M40.4134 6.42922H35.791C35.3678 6.42922 35.0098 6.08743 35.0098 5.64798C35.0098 5.20853 35.3515 4.86675 35.791 4.86675L40.4134 4.8667C40.8366 4.8667 41.1946 5.20848 41.1946 5.64794C41.1946 6.08739 40.8366 6.42922 40.4134 6.42922Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M48.0633 6.42922H43.4409C43.0177 6.42922 42.6597 6.08743 42.6597 5.64798C42.6597 5.20853 43.0015 4.86675 43.4409 4.86675L48.0633 4.8667C48.4865 4.8667 48.8445 5.20848 48.8445 5.64794C48.8445 6.08739 48.4865 6.42922 48.0633 6.42922Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M55.5177 6.42922H50.8952C50.4721 6.42922 50.114 6.08743 50.114 5.64798C50.114 5.20853 50.4558 4.86675 50.8952 4.86675L55.5177 4.8667C55.9408 4.8667 56.2989 5.20848 56.2989 5.64794C56.2989 6.08739 55.9408 6.42922 55.5177 6.42922Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Social Media <br>Marketing (SMM)</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">Partner with results-driven social media marketing agency in Dubai to spark engagement and connect with your audience across Facebook, Instagram, TikTok, and LinkedIn.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 3: PPC -->
            <div class="col-lg-4 col-md-6">
                <a href="/pay-per-click-ppc-services-in-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="74" height="75" viewBox="0 0 74 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.2 55.2988C23.3681 56.7256 12.176 46.6479 12.176 33.8081C12.176 21.8786 21.8761 12.1733 33.7988 12.1733C45.7283 12.1733 55.4336 21.8786 55.4336 33.8081C55.4336 35.2873 55.2837 36.7648 54.9884 38.1987C54.8575 38.8351 55.2671 39.4573 55.9035 39.5882C56.5377 39.7163 57.1616 39.3091 57.2931 38.6731C57.6206 37.0837 57.7866 35.4465 57.7866 33.8081C57.7866 20.5815 47.0254 9.82031 33.7988 9.82031C20.5784 9.82031 9.823 20.5815 9.823 33.8081C9.823 48.0454 22.22 59.2076 36.4585 57.638C37.1047 57.5662 37.57 56.9848 37.4988 56.3392C37.427 55.6929 36.8411 55.2333 36.2 55.2988Z"
                                fill="white" />
                            <path
                                d="M49.3365 38.9414C49.9707 39.1039 50.6066 38.7196 50.7663 38.0906C51.1196 36.6993 51.2988 35.258 51.2988 33.8081C51.2988 24.1585 43.4536 16.3081 33.8103 16.3081C24.1607 16.3081 16.3103 24.1585 16.3103 33.8081C16.3103 44.1051 25.1897 52.163 35.4245 51.2225C36.0719 51.1634 36.5481 50.5912 36.489 49.9444C36.4304 49.2975 35.8588 48.8162 35.2108 48.8799C26.2686 49.6928 18.6632 42.6469 18.6632 33.8081C18.6632 25.4562 25.4584 18.661 33.8103 18.661C42.1559 18.661 48.9459 25.4562 48.9459 33.8081C48.9459 35.0633 48.7913 36.3093 48.4857 37.5116C48.326 38.1412 48.7069 38.7817 49.3365 38.9414Z"
                                fill="white" />
                            <path
                                d="M33.8053 27.7986C35.1368 27.7986 36.2197 28.8815 36.2197 30.2131C36.2197 30.8628 36.7464 31.3895 37.3962 31.3895C38.0459 31.3895 38.5726 30.8628 38.5726 30.2131C38.5726 27.9927 37.04 26.1378 34.9817 25.6102V24.1423C34.9817 23.4926 34.455 22.9658 33.8053 22.9658C33.1556 22.9658 32.6288 23.4926 32.6288 24.1423V25.6102C30.5701 26.1376 29.0374 27.9926 29.0374 30.2131C29.0374 32.8418 31.176 34.9804 33.8053 34.9804C35.1368 34.9804 36.2197 36.0638 36.2197 37.3954C36.2197 38.727 35.1368 39.8098 33.8053 39.8098C32.4737 39.8098 31.3903 38.727 31.3903 37.3954C31.3903 36.7457 30.8635 36.2189 30.2138 36.2189C29.5641 36.2189 29.0374 36.7457 29.0374 37.3954C29.0374 39.6159 30.5701 41.4708 32.6288 41.9983V43.4662C32.6288 44.1159 33.1556 44.6426 33.8053 44.6426C34.455 44.6426 34.9817 44.1159 34.9817 43.4662V41.9982C37.04 41.4707 38.5726 39.6158 38.5726 37.3954C38.5726 34.7662 36.434 32.6275 33.8053 32.6275C32.4737 32.6275 31.3903 31.5446 31.3903 30.2131C31.3903 28.8815 32.4737 27.7986 33.8053 27.7986Z"
                                fill="white" />
                            <path
                                d="M33.8046 7.65912C34.4544 7.65912 34.9811 7.13235 34.9811 6.48265V1.17647C34.9811 0.526765 34.4544 0 33.8046 0C33.1549 0 32.6282 0.526765 32.6282 1.17647V6.48265C32.6282 7.13235 33.155 7.65912 33.8046 7.65912Z"
                                fill="white" />
                            <path
                                d="M33.8046 59.9495C33.1549 59.9495 32.6282 60.4762 32.6282 61.1259V66.4321C32.6282 67.0818 33.1549 67.6086 33.8046 67.6086C34.4544 67.6086 34.9811 67.0818 34.9811 66.4321V61.1259C34.9811 60.4762 34.4544 59.9495 33.8046 59.9495Z"
                                fill="white" />
                            <path
                                d="M13.6536 15.3172C14.1131 15.7767 14.8576 15.7768 15.3172 15.3172C15.7768 14.8576 15.7768 14.1132 15.3172 13.6536L11.5649 9.90131C11.1053 9.44175 10.3609 9.44175 9.90131 9.90131C9.44176 10.3609 9.44175 11.1054 9.90131 11.5649L13.6536 15.3172Z"
                                fill="white" />
                            <path
                                d="M6.48324 32.6274H1.17647C0.526765 32.6274 0 33.1542 0 33.8039C0 34.4536 0.526765 34.9804 1.17647 34.9804H6.48324C7.13294 34.9804 7.65971 34.4536 7.65971 33.8039C7.65971 33.1542 7.13293 32.6274 6.48324 32.6274Z"
                                fill="white" />
                            <path
                                d="M61.1259 34.9804H66.4321C67.0818 34.9804 67.6086 34.4536 67.6086 33.8039C67.6086 33.1542 67.0818 32.6274 66.4321 32.6274H61.1259C60.4762 32.6274 59.9495 33.1542 59.9495 33.8039C59.9495 34.4536 60.4762 34.9804 61.1259 34.9804Z"
                                fill="white" />
                            <path
                                d="M13.6536 52.2914L9.90131 56.0437C9.44175 56.5033 9.44175 57.2478 9.90131 57.7073C10.3609 58.1669 11.1053 58.1669 11.5649 57.7073L15.3172 53.955C15.7768 53.4955 15.7768 52.751 15.3172 52.2914C14.8576 51.8319 14.1132 51.8319 13.6536 52.2914Z"
                                fill="white" />
                            <path
                                d="M53.9558 15.3172L57.7081 11.5649C58.1676 11.1053 58.1676 10.3609 57.7081 9.90131C57.2485 9.44176 56.504 9.44175 56.0445 9.90131L52.2922 13.6536C51.8326 14.1132 51.8326 14.8577 52.2922 15.3172C52.7517 15.7768 53.4962 15.7768 53.9558 15.3172Z"
                                fill="white" />
                            <path
                                d="M72.638 62.7332L67.8758 57.971C67.4162 57.5114 66.6718 57.5114 66.2122 57.971C65.7526 58.4306 65.7526 59.175 66.2122 59.6346L70.9744 64.3968C71.1875 64.6099 71.1875 64.9574 70.9744 65.1705L64.0781 72.0668C63.8656 72.2793 63.5192 72.2817 63.3043 72.0668L49.5923 58.3547C49.1327 57.8952 48.3882 57.8952 47.9287 58.3547L44.5291 61.7537L41.3156 42.4167L60.6527 45.6301L57.2623 49.0211C56.8027 49.4807 56.8027 50.2251 57.2623 50.6847L62.1434 55.5658C62.6029 56.0253 63.3474 56.0253 63.807 55.5658C64.2665 55.1062 64.2665 54.3617 63.807 53.9022L59.7577 49.8529L63.9339 45.6767C64.2459 45.3653 64.3567 44.9052 64.2223 44.4858C64.0879 44.0659 63.73 43.7569 63.2951 43.6845L40.0782 39.8259C39.7066 39.7639 39.3223 39.8862 39.0534 40.1545C38.7846 40.4228 38.6622 40.8048 38.7248 41.1793L42.5834 64.3962C42.7403 65.3391 43.8994 65.7099 44.5756 65.035L48.7605 60.8501L61.6402 73.7304C62.7723 74.8638 64.6089 74.8645 65.7417 73.7304L72.638 66.8342C73.7685 65.7037 73.7685 63.8637 72.638 62.7332Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Pay Per Click <br>(PPC)</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">We offer data-driven PPC campaign management services. We are an
                            award-winning Google Partner and Meta Partner agency with expertise in pay-per-click
                            campaigns, so you get maximum exposure at minimal cost.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 4: Email Marketing -->
            <div class="col-lg-4 col-md-6">
                <a href="/email-marketing-company-in-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M32.3846 4.52667C32.2778 4.40203 32.1965 4.25757 32.1455 4.10153C32.0945 3.9455 32.0747 3.78094 32.0873 3.61726C32.0999 3.45358 32.1446 3.29398 32.2189 3.14757C32.2931 3.00116 32.3955 2.87081 32.5201 2.76397L34.4873 1.07757C35.3367 0.380804 36.4014 0 37.5 0C38.5986 0 39.6633 0.380804 40.5127 1.07757L42.4805 2.76397C42.731 2.98008 42.8857 3.28673 42.9106 3.61668C42.9354 3.94664 42.8285 4.273 42.6131 4.52422C42.3978 4.77544 42.0916 4.93103 41.7617 4.95689C41.4318 4.98275 41.1051 4.87677 40.8533 4.66217L38.8855 2.97577C38.495 2.65494 38.0054 2.47955 37.5 2.47955C36.9946 2.47955 36.5049 2.65494 36.1145 2.97577L34.1473 4.66217C33.8954 4.87737 33.5684 4.98395 33.238 4.95855C32.9076 4.93315 32.6008 4.77786 32.3846 4.52667ZM75 33.5129V68.7131C74.9981 70.3701 74.339 71.9587 73.1673 73.1303C71.9956 74.302 70.407 74.9611 68.75 74.9631H6.25C4.593 74.9611 3.00441 74.302 1.83273 73.1303C0.661051 71.9587 0.0019462 70.3701 9.93116e-07 68.7131V33.5129C-0.000507594 32.6112 0.19433 31.7201 0.571109 30.9009C0.947889 30.0817 1.49767 29.3538 2.18261 28.7674L4.18636 27.0499C4.43819 26.835 4.76499 26.7287 5.09506 26.7544C5.42513 26.7802 5.73152 26.9358 5.947 27.1871C6.16248 27.4385 6.26945 27.7651 6.24444 28.0952C6.21943 28.4253 6.06448 28.732 5.8136 28.9481L3.80985 30.6656C3.59959 30.8463 3.41006 31.0499 3.24474 31.2725L36.1145 59.4504C36.5049 59.7712 36.9946 59.9466 37.5 59.9466C38.0054 59.9466 38.495 59.7712 38.8855 59.4504L71.7553 31.2725C71.59 31.0499 71.4004 30.8463 71.1902 30.6656L69.1864 28.9481C68.9359 28.732 68.7812 28.4253 68.7563 28.0954C68.7315 27.7654 68.8384 27.4391 69.0538 27.1878C69.2691 26.9366 69.5753 26.781 69.9052 26.7552C70.2351 26.7293 70.5618 26.8353 70.8136 27.0499L72.8174 28.7674C73.5023 29.3538 74.0521 30.0817 74.4289 30.9009C74.8057 31.7201 75.0005 32.6112 75 33.5129ZM72.5 68.7131V33.9272L50.8743 52.466L71.9894 70.5681C72.32 70.0055 72.4961 69.3656 72.5 68.7131ZM24.1257 52.466L2.5 33.9272V68.7131C2.50395 69.3655 2.6801 70.0054 3.01064 70.5679L24.1257 52.466ZM68.75 72.4631C69.2002 72.4599 69.6461 72.3749 70.0659 72.2122L48.9536 54.1125L40.5127 61.3486C39.6737 62.0678 38.6051 62.4631 37.5 62.4631C36.3949 62.4631 35.3263 62.0678 34.4873 61.3486L26.0464 54.1125L4.93409 72.2122C5.35388 72.375 5.79978 72.46 6.25 72.4631H68.75ZM10 33.3743C10.3315 33.3743 10.6495 33.2426 10.8839 33.0082C11.1183 32.7738 11.25 32.4558 11.25 32.1243V13.7131C11.2511 12.7188 11.6465 11.7656 12.3495 11.0626C13.0526 10.3596 14.0058 9.96416 15 9.96307H60C60.9942 9.96416 61.9474 10.3596 62.6505 11.0626C63.3535 11.7656 63.7489 12.7188 63.75 13.7131V32.1243C63.75 32.4558 63.8817 32.7738 64.1161 33.0082C64.3505 33.2426 64.6685 33.3743 65 33.3743C65.3315 33.3743 65.6495 33.2426 65.8839 33.0082C66.1183 32.7738 66.25 32.4558 66.25 32.1243V13.7131C66.2481 12.0561 65.589 10.4675 64.4173 9.2958C63.2456 8.12412 61.657 7.46502 60 7.46307H15C13.343 7.46502 11.7544 8.12412 10.5827 9.2958C9.41105 10.4675 8.75195 12.0561 8.75 13.7131V32.1243C8.75 32.4558 8.8817 32.7738 9.11612 33.0082C9.35054 33.2426 9.66848 33.3743 10 33.3743ZM23.75 41.2131V34.5256C22.0821 33.9368 20.6762 32.777 19.781 31.2516C18.8858 29.7261 18.5589 27.9332 18.8581 26.1899C19.1574 24.4467 20.0636 22.8654 21.4163 21.7259C22.7691 20.5863 24.4812 19.9619 26.25 19.9631H30C37.9559 19.9631 41.3629 15.6418 41.5039 15.4575C41.6626 15.2498 41.8823 15.0971 42.1322 15.0206C42.3822 14.9442 42.6497 14.9479 42.8974 15.0312C43.1451 15.1146 43.3605 15.2733 43.5134 15.4853C43.6663 15.6972 43.7491 15.9517 43.75 16.2131V23.7131H45C45.9946 23.7131 46.9484 24.1082 47.6516 24.8114C48.3549 25.5147 48.75 26.4685 48.75 27.4631C48.75 28.4576 48.3549 29.4115 47.6516 30.1147C46.9484 30.818 45.9946 31.2131 45 31.2131H43.75V38.7131C43.75 38.9754 43.6675 39.2311 43.5141 39.4439C43.3608 39.6567 43.1443 39.8159 42.8955 39.8989C42.6466 39.9819 42.3779 39.9844 42.1275 39.9062C41.8771 39.828 41.6577 39.673 41.5002 39.4632C41.3704 39.294 38.3102 35.4255 31.25 35.0053V41.2131C31.25 42.2076 30.8549 43.1615 30.1517 43.8647C29.4484 44.568 28.4946 44.9631 27.5 44.9631C26.5054 44.9631 25.5516 44.568 24.8483 43.8647C24.1451 43.1615 23.75 42.2076 23.75 41.2131ZM43.75 26.2131V28.7131H45C45.3315 28.7131 45.6495 28.5814 45.8839 28.347C46.1183 28.1125 46.25 27.7946 46.25 27.4631C46.25 27.1315 46.1183 26.8136 45.8839 26.5792C45.6495 26.3448 45.3315 26.2131 45 26.2131H43.75ZM28.75 41.2131V34.9631H26.25V41.2131C26.25 41.5446 26.3817 41.8625 26.6161 42.097C26.8505 42.3314 27.1685 42.4631 27.5 42.4631C27.8315 42.4631 28.1495 42.3314 28.3839 42.097C28.6183 41.8625 28.75 41.5446 28.75 41.2131ZM31.25 22.4109V32.5153C34.8391 32.6258 38.3165 33.7888 41.25 35.8597V19.0665C38.3165 21.1373 34.8391 22.3003 31.25 22.4109ZM26.25 32.4631H28.75V22.4631H26.25C24.9239 22.4631 23.6521 22.9899 22.7145 23.9275C21.7768 24.8652 21.25 26.137 21.25 27.4631C21.25 28.7892 21.7768 30.0609 22.7145 30.9986C23.6521 31.9363 24.9239 32.4631 26.25 32.4631ZM55 26.2131H52.5C52.1685 26.2131 51.8505 26.3448 51.6161 26.5792C51.3817 26.8136 51.25 27.1315 51.25 27.4631C51.25 27.7946 51.3817 28.1125 51.6161 28.347C51.8505 28.5814 52.1685 28.7131 52.5 28.7131H55C55.3315 28.7131 55.6495 28.5814 55.8839 28.347C56.1183 28.1125 56.25 27.7946 56.25 27.4631C56.25 27.1315 56.1183 26.8136 55.8839 26.5792C55.6495 26.3448 55.3315 26.2131 55 26.2131ZM53.0591 31.3449C52.9122 31.271 52.7522 31.2268 52.5882 31.2149C52.4242 31.203 52.2595 31.2235 52.1034 31.2753C51.9474 31.3271 51.8031 31.4092 51.6788 31.5168C51.5545 31.6245 51.4527 31.7556 51.3792 31.9027C51.3056 32.0497 51.2618 32.2098 51.2503 32.3739C51.2387 32.5379 51.2596 32.7026 51.3118 32.8585C51.364 33.0144 51.4464 33.1585 51.5544 33.2825C51.6623 33.4065 51.7937 33.508 51.9409 33.5812L54.4409 34.8312C54.7374 34.9786 55.0801 35.0023 55.3941 34.8973C55.708 34.7922 55.9675 34.5669 56.1155 34.2708C56.2636 33.9747 56.2881 33.632 56.1838 33.3178C56.0795 33.0036 55.8548 32.7437 55.5591 32.5949L53.0591 31.3449ZM52.5013 23.7131C52.6949 23.7131 52.8859 23.668 53.0591 23.5812L55.5591 22.3312C55.8549 22.1825 56.0795 21.9225 56.1838 21.6083C56.2881 21.2941 56.2636 20.9514 56.1155 20.6553C55.9675 20.3592 55.708 20.1339 55.3941 20.0289C55.0802 19.9238 54.7374 19.9476 54.4409 20.0949L51.9409 21.3449C51.6889 21.4709 51.4868 21.6782 51.3674 21.9334C51.2481 22.1887 51.2184 22.4767 51.2833 22.7509C51.3481 23.0251 51.5037 23.2693 51.7248 23.4439C51.9459 23.6186 52.2195 23.7134 52.5013 23.7131Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Email Marketing</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">We provide email marketing services in Dubai to engage customers,
                            nurture leads, and drive conversions for clients. We craft email templates and campaigns to
                            create direct communication with customers and keep them engaged.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 5: ORM -->
            <div class="col-lg-4 col-md-6">
                <a href="/online-reputation-management-services-in-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="59" height="70" viewBox="0 0 59 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M55.4698 50.2286C51.9096 53.6406 45.8688 58.7952 41.2789 61.7694C37.7901 64.0235 34.1051 66.1521 30.6554 66.4344C27.8714 66.6638 24.7456 65.5502 21.7958 65.1368C17.9541 64.5723 13.9949 64.5331 9.64352 64.5723V53.5097C10.7411 53.2548 11.7995 52.9883 12.8971 52.706C14.2299 52.3414 15.3667 51.7652 16.5037 51.1968C18.5421 50.1854 20.267 49.3112 22.5406 49.9854L31.753 52.7648C32.6938 53.047 33.2034 54.031 32.929 54.9483C32.6154 55.9636 31.557 56.2851 30.6554 56.1048C28.6258 55.6904 26.6024 55.1059 24.5792 54.9052C22.6733 54.7163 20.6165 55.1816 18.699 55.9049C18.1502 56.1166 17.8758 56.7243 18.0718 57.2731C18.2678 57.8219 18.8558 58.0924 19.4438 57.8924C21.1474 57.2857 22.728 56.8438 24.3832 57.0065C25.5592 57.1203 27.2056 57.4848 28.6562 57.8219C29.4123 57.9988 30.4616 58.2766 31.165 58.2766C32.6546 58.2766 33.9875 57.4964 34.6539 56.2577C35.8299 56.148 36.9275 55.9206 37.9861 55.5678C41.8278 54.2702 47.7864 50.9304 53.0394 47.9707L53.5882 47.6609C54.2154 47.2964 54.9994 47.4531 55.4698 48.0294L55.5874 48.1705C56.097 48.7742 56.0186 49.6798 55.4698 50.2286ZM7.52672 67.1792C7.52672 67.4339 7.33072 67.6456 7.09552 67.6456H2.54816C2.31296 67.6456 2.11696 67.4339 2.11696 67.1792V52.0867C2.11696 51.8358 2.31296 51.6358 2.54816 51.6358H7.09552C7.33072 51.6358 7.52672 51.8358 7.52672 52.0867V67.1792ZM11.9957 44.5209V50.75C14.3213 50.2073 16.279 48.7059 18.5814 47.9982V44.5209C18.5814 44.2387 17.9542 43.7291 16.935 43.7291H13.6421C12.6229 43.7289 11.9957 44.2387 11.9957 44.5209ZM27.7938 38.8681V49.3662L32.3803 50.75C33.2035 51.0009 33.9091 51.5105 34.3795 52.1848V38.8681C34.3795 38.5859 33.7523 38.0801 32.7331 38.0801H29.4402C28.421 38.0801 27.7938 38.5859 27.7938 38.8681ZM43.5918 28.6796V50.7225C45.7086 49.6366 47.9824 48.3822 50.1776 47.1395V28.6796C50.1776 28.3974 49.5504 27.8916 48.5312 27.8916H45.2382C44.219 27.8918 43.5918 28.3974 43.5918 28.6796ZM57.2338 46.818L57.1162 46.6769C55.9794 45.3244 54.0586 44.956 52.5296 45.8302L52.2944 45.9556V28.6796C52.2944 27.0606 50.648 25.7787 48.531 25.7787H45.2381C43.1603 25.7787 41.4747 27.0606 41.4747 28.6796V51.7926C39.7608 52.6276 37.9822 53.4096 36.4962 53.7918V38.8681C36.4962 37.2334 34.8498 35.9673 32.7328 35.9673H29.4398C27.3621 35.9673 25.6765 37.2336 25.6765 38.8681V48.7352L23.1675 47.9707C22.2659 47.7041 21.4427 47.606 20.6979 47.6336V44.5209C20.6979 42.8862 19.0122 41.6161 16.9346 41.6161H13.6421C11.5253 41.6161 9.87872 42.8862 9.87872 44.5209V51.2832C9.76112 51.3105 9.64352 51.338 9.56512 51.3694C9.25152 50.2992 8.23232 49.523 7.09552 49.523H2.54816C1.13696 49.523 0 50.6638 0 52.0868V67.1793C0 68.6024 1.1368 69.7587 2.54816 69.7587H7.09552C8.50672 69.7587 9.64368 68.6022 9.64368 67.1793V66.6892C13.9166 66.646 17.7584 66.6892 21.4824 67.2224C24.5851 67.6593 27.5792 68.8076 30.8515 68.5316C34.7325 68.2219 38.6917 65.9561 42.4158 63.5452C47.0416 60.5582 52.0202 56.246 55.4306 53.1452C55.9402 52.6944 56.4498 52.228 56.9202 51.7654C58.2923 50.452 58.4491 48.2841 57.2338 46.818ZM6.58592 25.9905C6.38992 25.4377 6.66432 24.834 7.21312 24.634C22.6976 19.0126 36.8885 11.5448 49.3936 2.42667L46.7278 2.65003C46.1398 2.70875 45.6302 2.26971 45.591 1.69355C45.5518 1.11339 45.9438 0.59195 46.571 0.55275L52.9216 0.00394995C53.2744 -0.0274101 53.6272 0.12939 53.8624 0.42347C54.0584 0.72139 54.0976 1.11339 53.98 1.45451L51.5102 7.54235C51.275 8.09115 50.687 8.34603 50.1382 8.13435C49.5894 7.90699 49.315 7.29931 49.5502 6.75451L50.6088 4.15931C37.9469 13.3912 23.5992 20.9414 7.95792 26.6216C7.35408 26.8139 6.79424 26.5684 6.58592 25.9905ZM48.3744 18.6873C48.2176 18.2521 48.3744 17.77 48.7664 17.5073L50.1384 16.492L48.4136 16.5036C47.9432 16.5036 47.5512 16.2096 47.4336 15.7705L46.8848 14.1358L46.3752 15.7705C46.2184 16.2096 45.8264 16.5036 45.356 16.5036L43.6312 16.492L45.0424 17.5073C45.3952 17.77 45.552 18.2521 45.4344 18.6873L44.8856 20.3102L46.2576 19.3105C46.6542 19.0233 47.1238 19.0332 47.512 19.3105L48.9232 20.3102L48.3744 18.6873ZM53.4314 14.3752H49.1976L47.904 10.3728C47.5706 9.39675 46.1918 9.40459 45.9048 10.3728L44.6112 14.3752H40.3774C39.907 14.3752 39.515 14.6731 39.3582 15.1083C39.2406 15.5473 39.3974 16.0256 39.7502 16.2921L43.1608 18.7579L41.8672 22.7603C41.5315 23.743 42.6821 24.5326 43.5136 23.9441L46.885 21.4627L50.2955 23.9441C50.6962 24.234 51.1568 24.2192 51.5499 23.9441C51.9419 23.6776 52.0595 23.1953 51.9419 22.7603L50.6091 18.7579L54.0197 16.2921C54.8837 15.686 54.4059 14.3752 53.4314 14.3752ZM32.5763 28.864L33.0859 30.4987L31.7139 29.4833C31.3371 29.2238 30.8363 29.2238 30.4595 29.4833L29.0875 30.4987L29.5971 28.864C29.7539 28.4249 29.5971 27.9467 29.2443 27.6801L27.8331 26.6766H29.5579C29.9891 26.6766 30.4203 26.3825 30.5771 25.9475L31.0867 24.3246L31.5963 25.9475C31.7531 26.3827 32.1843 26.6766 32.6155 26.6766H34.3403L32.9683 27.6801C32.5763 27.9467 32.4195 28.4249 32.5763 28.864ZM38.6133 25.2849C38.7701 25.72 38.6133 26.1984 38.2213 26.4649L34.8107 28.9464L36.1435 32.9488C36.2611 33.3878 36.1043 33.866 35.7515 34.1326C35.3757 34.4097 34.8549 34.3915 34.4971 34.1326L31.0866 31.6552L27.676 34.1326C26.8509 34.7484 25.7523 33.8726 26.0296 32.9488L27.3624 28.9464L23.9518 26.4649C23.599 26.1984 23.4422 25.7201 23.5598 25.2849C23.7166 24.8459 24.1086 24.5518 24.579 24.5518L28.7736 24.5635L30.0672 20.5492C30.3976 19.5761 31.7752 19.5761 32.1056 20.5492L33.3992 24.5635L37.5938 24.5518C38.0645 24.5518 38.4957 24.8459 38.6133 25.2849ZM16.7782 34.5128L17.2878 36.1475L15.9158 35.1321C15.5538 34.8678 15.0234 34.8678 14.6614 35.1321L13.2894 36.1475L13.799 34.5128C13.9558 34.0776 13.799 33.5993 13.407 33.3289L12.035 32.3292H13.7598C14.2302 32.3292 14.6222 32.0352 14.779 31.5961L15.2886 29.9614L15.7982 31.5961C15.955 32.0352 16.347 32.3292 16.8174 32.3292H18.5422L17.131 33.3289C16.7782 33.5995 16.6214 34.0777 16.7782 34.5128ZM22.8152 30.9337C22.9328 31.3728 22.776 31.851 22.4232 32.1175L19.0126 34.5833L20.3062 38.6014C20.6512 39.6126 19.4472 40.3582 18.699 39.7852L15.2885 37.2881L11.8779 39.7852C11.4859 40.0518 11.0155 40.0518 10.6235 39.7852C10.2707 39.5147 10.1139 39.0364 10.2315 38.6014L11.5643 34.5833L8.15376 32.1175C7.28944 31.5115 7.7672 30.2006 8.74176 30.2006L12.9755 30.2163L14.2691 26.1982C14.5939 25.2457 15.9725 25.1985 16.2683 26.1982L17.5619 30.2163L21.7957 30.2006C22.2664 30.2008 22.6584 30.4987 22.8152 30.9337Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Online Reputation <br>Management (ORM)</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">With online reputation management, your business can keep track of
                            your professional or personal standings with others on the internet. BrandStory is one of
                            the premier online reputation management agencies in Dubai.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 6: Content Marketing -->
            <div class="col-lg-4 col-md-6">
                <a href="/content-marketing-agency-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="77" height="70" viewBox="0 0 77 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M70.8799 69.1199H6.55989C3.67989 69.1199 1.11989 66.5599 0.639893 62.8799C0.639893 62.7199 0.639893 62.3999 0.799893 62.2399C0.959893 62.0799 1.11989 61.9199 1.43989 61.9199H75.8399C75.9999 61.9199 76.3199 62.0799 76.4799 62.2399C76.6399 62.3999 76.6399 62.7199 76.6399 62.8799C76.3199 66.5599 73.7599 69.1199 70.8799 69.1199ZM2.39989 63.6799C3.03989 65.9199 4.63989 67.5199 6.55989 67.5199H70.7199C72.6399 67.5199 74.2399 65.9199 74.8799 63.6799H2.39989Z"
                                fill="white" />
                            <path
                                d="M17.7601 63.6798H8.64009C8.16009 63.6798 7.84009 63.3598 7.84009 62.8798V25.2798C7.84009 23.0398 9.60009 21.2798 11.8401 21.2798H17.6001C18.0801 21.2798 18.4001 21.5998 18.4001 22.0798V62.7198C18.5601 63.3598 18.0801 63.6798 17.7601 63.6798ZM9.44009 62.0798H16.8001V23.0398H11.8401C10.5601 23.0398 9.44009 24.1598 9.44009 25.4398V62.0798Z"
                                fill="white" />
                            <path
                                d="M68.6401 63.6802C68.1601 63.6802 67.8401 63.3602 67.8401 62.8802V32.0002C67.8401 31.5202 68.1601 31.2002 68.6401 31.2002C69.1201 31.2002 69.4401 31.5202 69.4401 32.0002V62.8802C69.4401 63.3602 69.1201 63.6802 68.6401 63.6802Z"
                                fill="white" />
                            <path
                                d="M67.1999 23.3598C67.0399 23.3598 66.8799 23.3598 66.7199 23.1998C66.3999 23.0398 65.9199 22.8798 65.4399 22.8798H59.6799C59.1999 22.8798 58.8799 22.5598 58.8799 22.0798C58.8799 21.5998 59.1999 21.2798 59.6799 21.2798H65.5999C66.2399 21.2798 67.0399 21.4398 67.6799 21.9198C67.9999 22.0798 68.1599 22.5598 67.9999 23.0398C67.6799 23.3598 67.5199 23.3598 67.1999 23.3598Z"
                                fill="white" />
                            <path
                                d="M57.44 66.3998H56.8C56.32 66.3998 56 66.0798 56 65.5998C56 65.1198 56.32 64.7998 56.8 64.7998H57.44C57.92 64.7998 58.24 65.1198 58.24 65.5998C58.24 66.0798 57.92 66.3998 57.44 66.3998Z"
                                fill="white" />
                            <path
                                d="M64.8001 66.3998H64.1601C63.6801 66.3998 63.3601 66.0798 63.3601 65.5998C63.3601 65.1198 63.6801 64.7998 64.1601 64.7998H64.8001C65.2801 64.7998 65.6001 65.1198 65.6001 65.5998C65.6001 66.0798 65.2801 66.3998 64.8001 66.3998Z"
                                fill="white" />
                            <path
                                d="M61.2801 66.3998H60.6401C60.1601 66.3998 59.8401 66.0798 59.8401 65.5998C59.8401 65.1198 60.1601 64.7998 60.6401 64.7998H61.2801C61.7601 64.7998 62.0801 65.1198 62.0801 65.5998C62.0801 66.0798 61.6001 66.3998 61.2801 66.3998Z"
                                fill="white" />
                            <path
                                d="M59.68 63.68H17.76C17.28 63.68 16.96 63.36 16.96 62.88V4.96C16.96 3.04 15.36 1.6 13.6 1.6C13.12 1.6 12.8 1.28 12.8 0.8C12.8 0.32 13.12 0 13.6 0H55.68C58.4 0 60.64 2.24 60.64 5.12V40.16C60.64 40.64 60.32 40.96 59.84 40.96C59.3601 40.96 59.04 40.64 59.04 40.16V4.96C59.04 3.04 57.44 1.44 55.68 1.44H17.12C17.92 2.4 18.4 3.52 18.4 4.8V61.92H58.88V52.96C58.88 52.48 59.2 52.16 59.68 52.16C60.16 52.16 60.48 52.48 60.48 52.96V62.72C60.48 63.36 60.16 63.68 59.68 63.68Z"
                                fill="white" />
                            <path
                                d="M17.7599 17.76H4.95991C4.47991 17.76 4.15991 17.44 4.15991 16.96C4.15991 16.48 4.47991 16.16 4.95991 16.16C6.87991 16.16 8.31991 14.56 8.31991 12.8V8.16V8V4.96C8.31991 2.24 10.5599 0 13.2799 0C15.9999 0 18.2399 2.24 18.2399 4.96V16.96C18.5599 17.44 18.0799 17.76 17.7599 17.76ZM8.63991 16.16H16.7999V4.96C16.7999 3.04 15.1999 1.6 13.4399 1.6C11.5199 1.6 10.0799 3.2 10.0799 4.96V7.84V8V12.8C10.0799 14.08 9.59991 15.2 8.63991 16.16Z"
                                fill="white" />
                            <path
                                d="M4.96 17.76C2.24 17.76 0 15.52 0 12.8V7.51997C0 7.03997 0.32 6.71997 0.8 6.71997H9.28C9.76 6.71997 10.08 7.03997 10.08 7.51997V12.64C10.08 15.52 7.84 17.76 4.96 17.76ZM1.6 8.31997V12.64C1.6 14.56 3.2 16 4.96 16C6.72 16 8.32 14.4 8.32 12.64V8.31997H1.6Z"
                                fill="white" />
                            <path
                                d="M35.8399 20.6399H22.7199C22.2399 20.6399 21.9199 20.3199 21.9199 19.8399V6.23994C21.9199 5.75994 22.2399 5.43994 22.7199 5.43994H35.8399C36.3199 5.43994 36.6399 5.75994 36.6399 6.23994V19.9999C36.6399 20.3199 36.1599 20.6399 35.8399 20.6399ZM23.5199 19.0399H35.0399V7.03994H23.5199V19.0399Z"
                                fill="white" />
                            <path
                                d="M54.7199 7.2001H40.4799C39.9999 7.2001 39.6799 6.8801 39.6799 6.4001C39.6799 5.9201 39.9999 5.6001 40.4799 5.6001H54.7199C55.1999 5.6001 55.5199 5.9201 55.5199 6.4001C55.5199 6.8801 55.1999 7.2001 54.7199 7.2001Z"
                                fill="white" />
                            <path
                                d="M54.7199 11.6801H40.4799C39.9999 11.6801 39.6799 11.3601 39.6799 10.8801C39.6799 10.4001 39.9999 10.0801 40.4799 10.0801H54.7199C55.1999 10.0801 55.5199 10.4001 55.5199 10.8801C55.5199 11.3601 55.1999 11.6801 54.7199 11.6801Z"
                                fill="white" />
                            <path
                                d="M54.7199 16.1601H40.4799C39.9999 16.1601 39.6799 15.8401 39.6799 15.3601C39.6799 14.8801 39.9999 14.5601 40.4799 14.5601H54.7199C55.1999 14.5601 55.5199 14.8801 55.5199 15.3601C55.5199 15.8401 55.1999 16.1601 54.7199 16.1601Z"
                                fill="white" />
                            <path
                                d="M54.7199 20.64H40.4799C39.9999 20.64 39.6799 20.32 39.6799 19.84C39.6799 19.36 39.9999 19.04 40.4799 19.04H54.7199C55.1999 19.04 55.5199 19.36 55.5199 19.84C55.5199 20.32 55.1999 20.64 54.7199 20.64Z"
                                fill="white" />
                            <path
                                d="M54.7201 25.2802H38.4001C37.9201 25.2802 37.6001 24.9602 37.6001 24.4802C37.6001 24.0002 37.9201 23.6802 38.4001 23.6802H54.7201C55.2001 23.6802 55.5201 24.0002 55.5201 24.4802C55.5201 24.9602 55.2001 25.2802 54.7201 25.2802Z"
                                fill="white" />
                            <path
                                d="M54.7201 29.7602H38.4001C37.9201 29.7602 37.6001 29.4402 37.6001 28.9602C37.6001 28.4802 38.0801 28.1602 38.4001 28.1602H54.7201C55.2001 28.1602 55.5201 28.4802 55.5201 28.9602C55.5201 29.4402 55.2001 29.7602 54.7201 29.7602Z"
                                fill="white" />
                            <path
                                d="M38.4 25.2802H22.56C22.08 25.2802 21.76 24.9602 21.76 24.4802C21.76 24.0002 22.08 23.6802 22.56 23.6802H38.4C38.88 23.6802 39.2 24.0002 39.2 24.4802C39.2 24.9602 38.88 25.2802 38.4 25.2802Z"
                                fill="white" />
                            <path
                                d="M38.4 29.7602H22.56C22.08 29.7602 21.76 29.4402 21.76 28.9602C21.76 28.4802 22.08 28.1602 22.56 28.1602H38.4C38.88 28.1602 39.2 28.4802 39.2 28.9602C39.2 29.4402 38.88 29.7602 38.4 29.7602Z"
                                fill="white" />
                            <path
                                d="M55.84 56.48C55.52 56.48 55.2 56.32 55.04 56L53.76 52.64C53.76 52.48 53.76 52.16 53.76 52L69.44 15.52C70.08 13.92 72.16 13.12 73.76 13.76C74.56 14.08 75.2 14.72 75.52 15.52C75.84 16.32 75.84 17.28 75.52 18.08L59.84 54.56C59.68 54.72 59.52 54.88 59.36 55.04L56 56.48H55.84ZM55.36 52.48L56.32 54.72L58.56 53.76L74.08 17.6C74.24 17.12 74.24 16.64 74.08 16.32C73.92 15.84 73.6 15.52 73.12 15.36C72.32 15.04 71.2 15.36 70.88 16.32L55.36 52.48Z"
                                fill="white" />
                            <path
                                d="M54.7201 59.0398C54.5601 59.0398 54.5601 59.0398 54.4001 59.0398C53.9201 58.8798 53.7601 58.3998 53.9201 57.9198L55.0401 55.3598C55.2001 54.8798 55.6801 54.7198 56.1601 54.8798C56.6401 55.0398 56.8001 55.5198 56.6401 55.9998L55.3601 58.5598C55.3601 58.8798 55.0401 59.0398 54.7201 59.0398Z"
                                fill="white" />
                            <path
                                d="M72.3201 39.3602C72.1601 39.3602 72.1601 39.3602 72.0001 39.3602C71.3601 39.0402 70.7201 38.5602 70.4001 37.7602C70.0801 36.9602 70.0801 36.3202 70.4001 35.5202L74.8801 24.9602C75.0401 24.4802 75.0401 24.0002 74.8801 23.3602C74.7201 22.8802 74.2401 22.5602 73.7601 22.2402L68.1601 19.8402C67.6801 19.6802 67.5201 19.2002 67.6801 18.7202C67.8401 18.2402 68.3201 18.0802 68.8001 18.2402L74.4001 20.6402C75.3601 20.9602 76.0001 21.7602 76.3201 22.5602C76.6401 23.5202 76.6401 24.4802 76.3201 25.2802L72.0001 36.1602C71.8401 36.4802 71.8401 36.8002 72.0001 37.1202C72.1601 37.4402 72.3201 37.7602 72.6401 37.7602C73.1201 37.9202 73.2801 38.4002 73.1201 38.8802C72.9601 39.2002 72.6401 39.3602 72.3201 39.3602Z"
                                fill="white" />
                            <path
                                d="M61.1201 50.56C60.9601 50.56 60.9601 50.56 60.8001 50.56L56.1601 48.64C55.6801 48.48 55.5201 48 55.6801 47.52C55.8401 47.04 56.3201 46.88 56.8001 47.04L61.4401 48.96C61.9201 49.12 62.0801 49.6 61.9201 50.08C61.7601 50.4 61.4401 50.56 61.1201 50.56Z"
                                fill="white" />
                            <path
                                d="M40.8001 58.0802C40.4801 58.0802 40.1601 57.9202 40.0001 57.6002C39.5201 56.6402 38.8801 56.0002 38.0801 56.0002C37.2801 56.0002 36.6401 56.6402 36.1601 57.6002C36.0001 57.9202 35.6801 58.0802 35.2001 58.0802C33.9201 57.7602 32.6401 57.2802 31.5201 56.4802C31.2001 56.3202 31.0401 55.8402 31.2001 55.5202C31.5201 54.5602 31.5201 53.6002 31.0401 53.1202C30.5601 52.8002 30.0801 52.6402 29.7601 52.6402C29.4401 52.6402 28.9601 52.6402 28.6401 52.8002C28.3201 52.9602 27.8401 52.8002 27.6801 52.4802C27.0401 51.3602 26.5601 50.0802 26.2401 48.8002C26.0801 48.4802 26.4001 48.0002 26.7201 47.8402C27.6801 47.3602 28.1601 46.7202 28.1601 46.0802C28.1601 45.4402 27.6801 44.6402 26.7201 44.3202C26.4001 44.1602 26.2401 43.8402 26.2401 43.3602C26.5601 42.0802 27.0401 40.8002 27.6801 39.6802C27.8401 39.3602 28.3201 39.2002 28.6401 39.3602C28.9601 39.5202 29.4401 39.5202 29.7601 39.5202C30.0801 39.5202 30.7201 39.5202 31.0401 39.0402C31.5201 38.5602 31.6801 37.6002 31.2001 36.6402C31.0401 36.3202 31.2001 35.8402 31.5201 35.6802C32.6401 34.8802 33.9201 34.4002 35.2001 34.0802C35.5201 33.9202 36.0001 34.2402 36.1601 34.5602C36.6401 35.5202 37.2801 36.1602 38.0801 36.1602C38.8801 36.1602 39.6801 35.5202 40.0001 34.5602C40.1601 34.2402 40.4801 34.0802 40.9601 34.0802C42.2401 34.4002 43.5201 34.8802 44.6401 35.6802C44.9601 35.8402 45.1201 36.3202 44.9601 36.6402C44.6401 37.6002 44.6401 38.5602 45.1201 39.0402C45.4401 39.3602 46.0801 39.5202 46.4001 39.5202C46.7201 39.5202 47.2001 39.5202 47.5201 39.3602C47.8401 39.2002 48.3201 39.3602 48.4801 39.6802C49.1201 40.8002 49.7601 42.0802 49.9201 43.3602C50.0801 43.6802 49.7601 44.1602 49.4401 44.3202C48.4801 44.8002 48.0001 45.4402 48.0001 46.0802C48.0001 46.7202 48.4801 47.5202 49.4401 47.8402C49.7601 48.0002 49.9201 48.3202 49.9201 48.8002C49.6001 50.0802 49.1201 51.3602 48.4801 52.4802C48.3201 52.8002 47.8401 52.9602 47.5201 52.8002C47.2001 52.6402 46.7201 52.6402 46.4001 52.6402C46.0801 52.6402 45.4401 52.8002 45.1201 53.1202C44.6401 53.6002 44.4801 54.5602 44.9601 55.5202C45.1201 55.8402 44.9601 56.3202 44.6401 56.4802C43.5201 57.2802 42.2401 57.7602 40.9601 58.0802C40.8001 58.0802 40.8001 58.0802 40.8001 58.0802ZM32.9601 55.5202C33.6001 55.8402 34.4001 56.1602 35.0401 56.3202C35.8401 55.0402 36.9601 54.4002 38.0801 54.4002C39.3601 54.4002 40.4801 55.2002 41.1201 56.3202C41.9201 56.1602 42.5601 55.8402 43.2001 55.5202C42.8801 54.2402 43.2001 52.9602 44.0001 52.0002C44.8001 51.2002 46.0801 50.8802 47.3601 51.2002C47.6801 50.5602 48.0001 49.9202 48.1601 49.1202C47.0401 48.3202 46.4001 47.3602 46.4001 46.0802C46.4001 44.9602 47.0401 43.8402 48.1601 43.2002C48.0001 42.5602 47.6801 41.7602 47.3601 41.1202C46.0801 41.4402 44.8001 41.1202 44.0001 40.3202C43.2001 39.3602 42.8801 38.0802 43.2001 36.8002C42.5601 36.4802 41.9201 36.1602 41.1201 36.0002C40.3201 37.2802 39.2001 37.9202 38.0801 37.9202C36.8001 37.9202 35.6801 37.1202 35.0401 36.0002C34.2401 36.1602 33.6001 36.4802 32.9601 36.8002C33.2801 38.2402 32.9601 39.3602 32.1601 40.3202C31.3601 41.1202 30.0801 41.4402 28.6401 41.1202C28.3201 41.7602 28.0001 42.4002 27.8401 43.2002C28.9601 43.8402 29.6001 44.9602 29.6001 46.2402C29.6001 47.3602 28.9601 48.4802 27.8401 49.2802C28.0001 49.9202 28.3201 50.7202 28.6401 51.3602C29.9201 51.0402 31.2001 51.3602 32.1601 52.1602C32.9601 52.8002 33.2801 54.0802 32.9601 55.5202Z"
                                fill="white" />
                            <path
                                d="M38.0799 52.0002C34.8799 52.0002 32.1599 49.4402 32.1599 46.0802C32.1599 42.8802 34.7199 40.1602 38.0799 40.1602C41.4399 40.1602 43.9999 42.7202 43.9999 46.0802C43.9999 49.2802 41.2799 52.0002 38.0799 52.0002ZM38.0799 41.9202C35.6799 41.9202 33.7599 43.8402 33.7599 46.2402C33.7599 48.6402 35.6799 50.5602 38.0799 50.5602C40.4799 50.5602 42.3999 48.6402 42.3999 46.2402C42.3999 43.8402 40.4799 41.9202 38.0799 41.9202Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Content Marketing</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">Content marketing is a crucial aspect of digital marketing to
                            inform and engage the potential audience. We create highly compelling text, multimedia, and
                            audio content to bring your brand’s essence and vision to life.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 7: Performance Marketing -->
            <div class="col-lg-4 col-md-6">
                <a href="/performance-marketing-agency-in-dubai-uae/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="72" height="80" viewBox="0 0 72 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.672 62.4178H9.60903C8.96184 62.4178 8.43715 62.9424 8.43715 63.5897V78.516C8.43715 79.1633 8.96184 79.6878 9.60903 79.6878H18.672C19.3192 79.6878 19.8439 79.1633 19.8439 78.516V63.5897C19.8439 62.9424 19.3192 62.4178 18.672 62.4178ZM17.5001 77.3441H10.7809V64.7616H17.5001V77.3441ZM34.7429 55.7228H25.68C25.0328 55.7228 24.5081 56.2474 24.5081 56.8947V78.516C24.5081 79.1633 25.0328 79.6878 25.68 79.6878H34.7429C35.3901 79.6878 35.9148 79.1633 35.9148 78.516V56.8947C35.9148 56.2474 35.3903 55.7228 34.7429 55.7228ZM33.5711 77.3441H26.8518V58.0666H33.5711V77.3441ZM50.8139 49.0281H41.7509C41.1037 49.0281 40.579 49.5527 40.579 50.2V78.516C40.579 79.1633 41.1037 79.6878 41.7509 79.6878H50.8139C51.4611 79.6878 51.9857 79.1633 51.9857 78.516V50.2C51.9857 49.5528 51.4612 49.0281 50.8139 49.0281ZM49.642 77.3441H42.9228V51.3719H49.642V77.3441ZM71.1986 41.1097L64.9029 33.0828C64.2847 32.2947 63.3554 31.8425 62.3534 31.8425C61.3514 31.8425 60.4221 32.2947 59.8042 33.0828L53.5084 41.1099C52.9828 41.7802 52.8875 42.6717 53.2597 43.4369C53.6318 44.202 54.3925 44.6772 55.2442 44.6772H56.6501V78.516C56.6501 79.1633 57.1748 79.6878 57.822 79.6878H66.885C67.5322 79.6878 68.0568 79.1633 68.0568 78.516V44.677H69.4629C70.3148 44.677 71.0753 44.2019 71.4475 43.4367C71.8196 42.6716 71.7243 41.7802 71.1986 41.1097ZM66.8848 42.3333C66.2376 42.3333 65.7129 42.8578 65.7129 43.5052V77.3441H58.9937V43.5052C58.9937 42.8578 58.469 42.3333 57.8218 42.3333H55.5271L61.6482 34.5292C61.819 34.3113 62.0761 34.1864 62.3534 34.1864C62.6307 34.1864 62.8876 34.3114 63.0587 34.5294L69.1796 42.3333H66.8848ZM53.6071 34.49L50.9856 24.3114C50.827 23.6961 50.4017 23.1995 49.8182 22.9489C49.2351 22.6981 48.5818 22.7313 48.0265 23.0399L38.8382 28.1442C38.1539 28.5245 37.7532 29.2436 37.7926 30.0211C37.8323 30.805 38.3039 31.4839 39.0232 31.7931L40.1853 32.2924C37.2079 36.9699 29.7704 44.7447 11.5529 51.2214C11.014 51.413 10.6922 51.9655 10.7912 52.5286C10.8898 53.0892 11.3768 53.4974 11.9453 53.4974H11.9534C20.8329 53.437 28.782 51.42 35.5798 47.5024C40.444 44.6991 44.7698 40.9261 48.7807 35.9856L50.8317 36.8669C51.5511 37.1761 52.3681 37.0516 52.9645 36.5406C53.5564 36.0342 53.8025 35.2486 53.6071 34.49ZM48.8864 33.4802C48.3989 33.2703 47.8318 33.4149 47.5034 33.8313C40.0156 43.3289 30.8226 48.8483 19.5568 50.5688C34.6472 43.902 40.6137 36.4631 42.9009 32.3077C43.0604 32.018 43.09 31.6745 42.9826 31.3619C42.8751 31.0491 42.6407 30.7964 42.3368 30.666L40.5262 29.888L48.8156 25.2828L51.1807 34.4658L48.8864 33.4802ZM9.09606 34.4338C9.39075 34.5127 9.68981 34.5519 9.98668 34.5519C10.4392 34.5519 10.8864 34.4603 11.3067 34.2817L17.9978 40.973C18.4367 41.4119 19.0129 41.6311 19.5895 41.6311C20.1659 41.6311 20.7423 41.4117 21.1812 40.9728L22.7675 39.3866C23.1922 38.962 23.4261 38.3967 23.4261 37.7949C23.4261 37.1928 23.1922 36.6275 22.7676 36.203L17.3751 30.8105C20.2901 29.1697 23.0553 29.0253 26.2495 28.86C27.4929 28.7956 28.7726 28.7281 30.1114 28.5661C30.5481 29.1445 31.1603 29.5613 31.8743 29.7527C32.1581 29.8286 32.4456 29.8663 32.7312 29.8663C33.2982 29.8663 33.8572 29.718 34.3595 29.4278C35.1147 28.9919 35.6557 28.2852 35.8829 27.4377C36.11 26.5902 35.995 25.7077 35.5589 24.9525L32.3486 19.3919C33.4317 18.2786 34.0557 16.7738 34.0557 15.1967C34.0557 11.8827 31.3595 9.18642 28.0454 9.18642C27.5395 9.18642 27.0443 9.24986 26.5636 9.37205L23.3534 3.81189C22.4501 2.24767 20.4426 1.70955 18.8782 2.61252C18.8782 2.61267 18.8782 2.61267 18.8781 2.61267C18.1229 3.04861 17.582 3.75533 17.355 4.60298C17.1636 5.3172 17.2182 6.05548 17.5003 6.72236C16.6906 7.8008 15.9922 8.87548 15.3147 9.92017C13.5486 12.6436 12.0232 14.9953 9.06043 16.7061L3.49809 19.9175C2.71059 20.372 2.147 21.1075 1.9109 21.9885C1.69653 22.7886 1.77918 23.6188 2.13621 24.3544C0.0279328 25.8394 -0.639098 28.7233 0.674652 30.9991C1.60825 32.616 3.30762 33.5208 5.05262 33.5208C5.76371 33.5208 6.48168 33.368 7.15903 33.0545C7.61778 33.7322 8.29575 34.2192 9.09606 34.4338ZM19.5893 39.2499L13.4273 33.0877L15.2723 32.0225L21.0447 37.7947L19.5893 39.2499ZM28.0453 11.5302C30.067 11.5302 31.7118 13.1749 31.7118 15.1967C31.7118 15.9266 31.492 16.631 31.0975 17.2252L27.8139 11.538C27.8906 11.5333 27.9678 11.5302 28.0453 11.5302ZM19.6187 5.20955C19.6839 4.96689 19.8368 4.76548 20.0498 4.64252C20.4951 4.38548 21.0664 4.53877 21.3236 4.98392L33.529 26.1244C33.652 26.3374 33.6839 26.5883 33.6189 26.831C33.5539 27.0738 33.4007 27.275 33.1876 27.398C32.9739 27.5214 32.7228 27.5533 32.4807 27.4888C32.2386 27.4239 32.0373 27.2705 31.9139 27.0567L31.7097 26.703C31.7078 26.6999 31.7062 26.6967 31.7043 26.6938L19.7086 5.91627C19.5856 5.7033 19.5537 5.45236 19.6187 5.20955ZM17.2809 11.1956C17.7564 10.4625 18.2422 9.71408 18.765 8.96923L28.7981 26.3472C27.8917 26.4275 27.0007 26.4739 26.1282 26.5191C23.0747 26.6772 20.1732 26.8283 17.1104 28.3053L11.2253 18.1119C14.0357 16.1983 15.6172 13.7611 17.2809 11.1956ZM4.17481 22.5952C4.24887 22.3189 4.42465 22.0889 4.66981 21.9474L9.21731 19.3219L15.0587 29.4395L10.5112 32.065C10.2659 32.2066 9.97871 32.2438 9.70278 32.1699C9.42653 32.0958 9.19653 31.92 9.05496 31.6749L4.27965 23.4038C4.13793 23.1586 4.10075 22.8714 4.17481 22.5952ZM2.70434 29.8274C2.03981 28.6761 2.3234 27.2358 3.3084 26.4094L5.96637 31.0133C4.75856 31.4527 3.36918 30.9786 2.70434 29.8274ZM36.7248 10.1856C36.4012 9.62517 36.5932 8.90845 37.1537 8.58486L40.2242 6.81205C40.7846 6.48861 41.5014 6.68048 41.825 7.24095C42.1486 7.80142 41.9565 8.51814 41.3961 8.84173L38.3256 10.6145C38.1411 10.7211 37.9395 10.7717 37.7407 10.7717C37.3357 10.7717 36.9418 10.5616 36.7248 10.1856ZM30.0881 4.29377L31.0057 0.868922C31.1734 0.243766 31.8167 -0.127484 32.4411 0.0403284C33.0662 0.207672 33.4372 0.850485 33.2698 1.47564L32.3521 4.90048C32.2118 5.42408 31.7382 5.76939 31.2209 5.76939C31.1204 5.76939 31.0184 5.75642 30.9168 5.72908C30.2915 5.56158 29.9206 4.91892 30.0881 4.29377ZM39.1156 16.6152L42.5403 17.5328C43.1654 17.7002 43.5364 18.343 43.3689 18.9681C43.2286 19.4917 42.755 19.837 42.2376 19.837C42.1371 19.837 42.0351 19.8241 41.9336 19.7967L38.5089 18.8791C37.8837 18.7117 37.5128 18.0689 37.6801 17.4438C37.8479 16.8186 38.4904 16.4472 39.1156 16.6152Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Performance Marketing</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">Accelerate growth with the premier performance marketing agency in Dubai, blending smart strategy, compelling campaigns, and data-driven insights to turn every marketing effort into measurable results.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 8: Branding Services -->
            <div class="col-lg-4 col-md-6">
                <a href="/branding-agency-in-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M68.1694 59.3293C72.1272 63.1504 69.1804 70.1021 63.75 69.9943C62.2414 70.1072 57.711 68.5202 59.3307 66.3995C59.819 65.9112 60.61 65.9112 61.0982 66.3993C63.3317 68.7731 67.594 66.9873 67.5001 63.7482C67.5001 62.746 67.1101 61.8049 66.4021 61.0969L57.4112 52.1067L52.1078 57.4101C52.1078 57.4101 56.6837 61.9758 56.6837 61.9757C57.4721 62.7194 56.8847 64.1463 55.8006 64.1168C55.4087 64.1168 55.0584 63.9386 54.8295 63.6578L50.3397 59.1782C50.3397 59.1782 49.4549 60.0629 49.455 60.0629C48.2927 61.2176 46.5381 59.4499 47.6874 58.2954C47.6966 58.2863 49.8964 56.0865 49.8963 56.0866C47.9505 53.7458 44.6907 52.8474 41.9273 54.3205C23.2033 64.2314 -0.24947 49.9814 0.00200516 28.7491C0.00199266 12.897 12.899 0 28.7512 0C40.0631 0 50.3576 6.66851 54.9784 16.9886C55.2604 17.6185 54.9784 18.3582 54.3486 18.6402C53.7163 18.9204 52.9784 18.6396 52.697 18.0103C48.4784 8.58801 39.0792 2.49994 28.7514 2.49989C-6.07682 3.94162 -6.05566 53.566 28.7512 54.9984C32.9369 54.9984 37.0957 53.9963 40.779 52.1006C44.4946 50.1319 48.9659 51.1774 51.6639 54.319C51.6639 54.319 54.3213 51.6616 54.3214 51.6615C51.18 48.9636 50.1345 44.4965 52.1032 40.7727C52.7449 39.8025 52.9667 37.5353 54.6306 38.1142C55.2708 38.3729 55.5802 39.1005 55.3221 39.7413C55.0102 40.5152 54.683 41.2293 54.3224 41.925C52.8491 44.6896 53.7475 47.9481 56.0888 49.8941C56.0888 49.8941 58.2938 47.6891 58.2937 47.6891C59.4578 46.5367 61.2085 48.2977 60.0613 49.4566L59.1788 50.3391C59.1788 50.3391 68.1696 59.3293 68.1694 59.3293ZM24.026 28.7492C24.6256 29.4141 25.0013 30.2852 25.0013 31.2491C25.0013 33.3169 23.3192 34.999 21.2514 34.999H17.5015C16.8112 34.999 16.2515 34.4393 16.2515 33.749V23.7493C16.2515 23.059 16.8112 22.4993 17.5015 22.4993H21.2514C24.439 22.4285 26.2134 26.4677 24.026 28.7492ZM21.2514 29.9991H18.7515V32.4991H21.2514C22.894 32.4697 22.8935 30.0285 21.2514 29.9991ZM21.2514 24.9993H18.7515V27.4992H21.2514C22.894 27.4699 22.8935 25.0287 21.2514 24.9993ZM35.2755 28.7492C36.5222 29.8978 36.2319 32.2073 36.2509 33.749C36.2237 35.3936 33.7771 35.3893 33.751 33.749V31.2491C33.751 30.56 33.1901 29.9991 32.5011 29.9991H30.0011V33.749C30.0011 34.4393 29.4415 34.999 28.7512 34.999C28.0609 34.999 27.5012 34.4393 27.5012 33.749V23.7493C27.5012 23.059 28.0609 22.4993 28.7512 22.4993H32.5011C35.6886 22.4282 37.4632 26.4682 35.2755 28.7492ZM32.5011 24.9993H30.0011V27.4992H32.5011C34.1437 27.4699 34.1432 25.0287 32.5011 24.9993ZM45.0007 33.749V29.9991H41.2508V33.749C41.2508 34.4393 40.6911 34.999 40.0008 34.999C39.3106 34.999 38.7509 34.4393 38.7509 33.749V26.2492C38.7509 24.1814 40.433 22.4993 42.5008 22.4993H43.7507C45.8185 22.4993 47.5006 24.1814 47.5006 26.2492V33.749C47.5006 34.4393 46.9409 34.999 46.2507 34.999C45.5604 34.999 45.0007 34.4393 45.0007 33.749ZM45.0007 27.4992V26.2492C45.0007 25.5602 44.4398 24.9993 43.7507 24.9993H42.5008C41.8117 24.9993 41.2508 25.5602 41.2508 26.2492V27.4992H45.0007ZM57.5003 34.999C58.1906 34.999 58.7503 34.4393 58.7503 33.749V26.2492C58.7503 24.1814 57.0682 22.4993 55.0004 22.4993H53.7504C51.6826 22.4993 50.0006 24.1814 50.0006 26.2492V33.749C50.0006 34.4393 50.5602 34.999 51.2505 34.999C51.9408 34.999 52.5005 34.4393 52.5005 33.749V26.2492C52.5005 25.5602 53.0614 24.9993 53.7504 24.9993H55.0004C55.6895 24.9993 56.2504 25.5602 56.2504 26.2492V33.749C56.2504 34.4393 56.81 34.999 57.5003 34.999ZM70 26.2492V31.2491C70 33.3169 68.3179 34.999 66.2501 34.999H63.7502C62.3714 34.999 61.2502 33.8778 61.2502 32.4991V24.9993C61.2502 23.6205 62.3714 22.4993 63.7502 22.4993H66.2501C68.3179 22.4993 70 24.1814 70 26.2492ZM67.5 26.2492C67.5 25.5602 66.9391 24.9993 66.2501 24.9993H63.7502V32.5009L66.2501 32.4991C66.9391 32.4991 67.5 31.9382 67.5 31.2491V26.2492ZM49.5336 20.0495C50.1544 19.748 50.4137 19.0003 50.1129 18.379C46.1707 10.2518 37.7859 4.99986 28.7512 4.99986C-2.75223 6.30302 -2.74953 51.1972 28.7513 52.4985C37.426 52.4643 46.1159 47.5949 49.7255 39.5742C49.7418 38.2686 47.909 37.8695 47.3596 39.0211C43.6024 45.7934 36.4762 49.9986 28.7512 49.9986C0.564644 48.8336 0.565543 8.66386 28.7513 7.49975C36.8344 7.49979 44.3367 12.1981 47.8632 19.4703C48.1653 20.0922 48.9129 20.3497 49.5336 20.0495Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Branding Services</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">At BrandStory, we make your brand impossible to overlook, a creative branding agency in Dubai crafting distinctive brand identities that spark recognition, build trust, and create lasting connections.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
            <!-- Card 9: Website & Development -->
            <div class="col-lg-4 col-md-6">
                <a href="/website-development-company-in-dubai/" class="premium-service-card">
                    <div class="service-card-icon">
                        <svg width="80" height="77" viewBox="0 0 80 77" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M76.4673 51.1775H75.8823C75.5759 50.185 75.1789 49.2269 74.6945 48.3112L75.112 47.8923C75.7788 47.2297 76.1467 46.3448 76.1481 45.4008C76.1495 44.4545 75.7828 43.5661 75.1153 42.8988L74.3019 42.0858V8.52328C74.3019 3.82344 70.9853 0 66.9084 0H7.39344C3.31656 0 0 3.82344 0 8.52328V52.5628C0 57.2627 3.31656 61.0861 7.39344 61.0861H16.6381C17.5083 61.0861 18.2138 60.3806 18.2138 59.5105C18.2138 58.6403 17.5083 57.9348 16.6381 57.9348H7.39344C5.09406 57.9348 3.15141 55.4747 3.15141 52.563V23.9764H71.1503V39.8991C70.9708 39.8714 70.7889 39.8533 70.6038 39.8533C70.6019 39.8533 70.6 39.8533 70.5983 39.8533C69.6542 39.8548 68.7694 40.2223 68.1119 40.8834L67.6859 41.3075C66.7511 40.8136 65.7775 40.4119 64.7736 40.1052V39.5439C64.7736 37.5964 63.1889 36.0122 61.2409 36.0122H58.3895C56.4441 36.0122 54.8614 37.5964 54.8614 39.5439V40.1436C53.8764 40.4531 52.9253 40.8514 52.0163 41.3352L51.6081 40.9283C50.9453 40.2622 50.0603 39.8944 49.1162 39.893C49.1145 39.893 49.1128 39.893 49.1109 39.893C48.1667 39.893 47.2802 40.2594 46.6141 40.925L44.5995 42.9386C43.932 43.6058 43.5653 44.4944 43.5667 45.4405C43.5681 46.3845 43.9359 47.2694 44.5977 47.9269L45.0328 48.3633C44.5605 49.2648 44.1725 50.2053 43.8723 51.1772H43.2739C41.3283 51.1772 39.7456 52.7594 39.7456 54.7044V57.5586C39.7456 57.6855 39.7527 57.8108 39.7658 57.9342H30.5978C29.7277 57.9342 29.0222 58.6397 29.0222 59.5098C29.0222 60.38 29.7277 61.0855 30.5978 61.0855H43.2738H43.8783C44.183 62.0666 44.5769 63.0145 45.0573 63.922L44.6316 64.3459C43.2608 65.7241 43.262 67.9614 44.6348 69.3331L46.6505 71.348C47.3133 72.0141 48.1983 72.3819 49.1423 72.3833H49.1475C50.0919 72.3833 50.9784 72.0169 51.6445 71.3511L52.0666 70.9294C52.9822 71.412 53.9342 71.8064 54.9142 72.1094V72.7192C54.9142 74.6667 56.4969 76.2509 58.4425 76.2509H61.2983C63.2437 76.2509 64.8264 74.6667 64.8264 72.7192V72.1131C65.8156 71.808 66.7716 71.412 67.6861 70.9292L68.1062 71.3478C68.7689 72.0141 69.6537 72.3817 70.5978 72.3833H70.6033C71.5475 72.3833 72.4341 72.0169 73.1014 71.35L75.1116 69.3364C75.7783 68.6738 76.1462 67.7889 76.1477 66.8448C76.1491 65.8986 75.7823 65.0102 75.1147 64.3428L74.6942 63.9225C75.1738 63.0142 75.5673 62.0656 75.8716 61.0856H76.467C78.415 61.0856 79.9997 59.5034 79.9997 57.5586V54.7044C80 52.7597 78.4153 51.1775 76.4673 51.1775ZM3.15141 20.825V8.52328C3.15141 5.61156 5.09406 3.15141 7.39344 3.15141H66.9084C69.2078 3.15141 71.1505 5.61156 71.1505 8.52328V20.8252L3.15141 20.825ZM76.8486 57.5589C76.8486 57.7591 76.6705 57.9345 76.4672 57.9345H74.6653C73.9306 57.9345 73.2934 58.4422 73.1294 59.1583C72.7891 60.6434 72.2045 62.0519 71.3919 63.3448C71.0005 63.9675 71.0919 64.7781 71.6122 65.298L72.8872 66.5722C72.9825 66.6675 72.9966 66.7812 72.9966 66.8406C72.9964 66.9116 72.978 67.0145 72.8859 67.1058L70.8728 69.1225C70.7773 69.2178 70.6634 69.2322 70.6034 69.2322C70.6033 69.2322 70.6031 69.2322 70.6031 69.2322C70.5316 69.2322 70.4283 69.2136 70.3359 69.1206L69.0563 67.8463C68.5358 67.328 67.7267 67.2381 67.1053 67.6288C65.8105 68.4433 64.3961 69.0287 62.9012 69.3689C62.1842 69.5323 61.6753 70.1698 61.6753 70.9055V72.7197C61.6753 72.9222 61.4992 73.1 61.2986 73.1H58.4428C58.242 73.1 58.0659 72.9223 58.0659 72.7197V70.9009C58.0659 70.1647 57.5559 69.5264 56.8378 69.3641C55.362 69.0303 53.9502 68.4458 52.6417 67.627C52.3839 67.4656 52.0942 67.3869 51.8063 67.3869C51.3992 67.3869 50.9958 67.5442 50.6919 67.8483L49.417 69.1225C49.3216 69.2178 49.2077 69.2322 49.1477 69.2322C49.1475 69.2322 49.1473 69.2322 49.1472 69.2322C49.0758 69.2322 48.9723 69.2136 48.8819 69.1227L46.863 67.1047C46.7216 66.9634 46.7231 66.7131 46.8611 66.5744L48.1406 65.3C48.6634 64.7794 48.7548 63.9659 48.3609 63.3422C47.547 62.0534 46.9617 60.6459 46.6211 59.1587C46.457 58.4427 45.8198 57.9348 45.085 57.9348H43.2741C43.0698 57.9348 42.8972 57.7628 42.8972 57.5592V54.705C42.8972 54.5014 43.0698 54.3292 43.2741 54.3292H45.0805C45.8159 54.3292 46.4538 53.8203 46.617 53.1033C46.9533 51.6256 47.5311 50.2239 48.3344 48.9367C48.7222 48.3153 48.6306 47.5086 48.1133 46.9898L46.8242 45.697C46.7367 45.6102 46.7183 45.5072 46.7181 45.4362C46.7181 45.3769 46.7322 45.2631 46.8275 45.168L48.8419 43.1545C48.9373 43.0592 49.0513 43.0448 49.1113 43.0448H49.1117C49.1831 43.045 49.2866 43.0634 49.3789 43.1564L50.6495 44.422C51.1716 44.9419 51.9836 45.0309 52.6052 44.6366C53.8927 43.8203 55.3028 43.2291 56.7962 42.8795C57.5088 42.7128 58.0127 42.0772 58.0127 41.3453V39.5444C58.0127 39.3383 58.1852 39.1641 58.3894 39.1641H61.2408C61.4475 39.1641 61.6222 39.3383 61.6222 39.5444V41.3187C61.6222 42.057 62.1347 42.6962 62.8555 42.8567C64.3547 43.1906 65.785 43.7803 67.1067 44.6095C67.7278 44.9989 68.5361 44.9089 69.0561 44.3911L70.3409 43.1114C70.4281 43.0238 70.5314 43.0053 70.6028 43.0052H70.6033C70.6633 43.0052 70.7772 43.0195 70.8725 43.1148L72.887 45.1281C72.9823 45.2234 72.9964 45.3372 72.9964 45.3966C72.9963 45.4675 72.9778 45.5705 72.8852 45.6625L71.61 46.9414C71.0908 47.4622 71.0008 48.2728 71.3931 48.8947C72.2089 50.188 72.7958 51.6042 73.1377 53.1039C73.3011 53.8208 73.9386 54.3294 74.6741 54.3294H76.4672C76.6703 54.3294 76.8486 54.5052 76.8486 54.7052V57.5589Z"
                                fill="white" />
                        </svg>

                    </div>
                    <h3 class="service-card-title">Website & <br>Development</h3>
                    <div class="service-card-hover-details">
                        <p class="service-card-desc">A website built for user experience is essential for bringing leads
                            into the sales funnel. We create custom websites with the latest technology stack that are
                            easy to navigate, mobile responsive, and visually attractive.</p>
                        <span class="service-card-link">Explore Details <span class="arrow">→</span></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="strategy-scroll-outer" id="strategyScrollOuter">
    <div class="strategy-scroll-sticky">
        <section class="premium-strategy-section">
            <!-- Header Container for Title alignment -->
            <div class="premium-strategy-header-container">
                <h2 class="premium-strategy-title">Our Digital Marketing Strategy and Process</h2>
            </div>

            <!-- Banner Image Wrapper -->
            <div class="premium-strategy-banner-wrap">
                <img src="<?= base_url('assets/images/digitalmarketing-4.webp') ?>" width="4096" height="2730"
                    alt="Digital Marketing Strategy and Process" class="premium-strategy-banner">
                <div class="premium-strategy-banner-overlay"></div>
            </div>

            <!-- Cards Row -->
            <div class="premium-strategy-cards-row">
                <!-- Card 1 -->
                <div class="premium-strategy-card">
                    <div class="strategy-card-icon">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_802_250)">
                                <path
                                    d="M20.8444 3.34326C11.1831 3.34326 3.35107 11.1753 3.35107 20.8366C3.35107 30.498 11.1831 38.33 20.8444 38.33C30.5058 38.33 38.3378 30.498 38.3378 20.8366C38.3273 11.1797 30.5014 3.35378 20.8444 3.34326ZM20.8444 5.0093C25.99 5.01336 30.8118 7.52116 33.7695 11.7317L31.687 13.8143C31.1802 13.5076 30.6 13.3435 30.0076 13.3395C28.1674 13.3395 26.6756 14.8313 26.6756 16.6715C26.6785 17.2645 26.8416 17.8457 27.1479 18.3534L21.6933 23.808C20.6604 23.1782 19.3624 23.1782 18.3296 23.808L14.541 20.0194C14.8472 19.5117 15.0104 18.9306 15.0133 18.3376C15.0156 16.501 13.5287 15.0103 11.6921 15.008C10.1732 15.0061 8.84607 16.0336 8.46747 17.5046H5.37697C6.95419 10.2212 13.3923 5.02023 20.8444 5.0093ZM31.6737 16.6715C31.6737 17.5917 30.9278 18.3376 30.0076 18.3376C29.0875 18.3376 28.3416 17.5917 28.3416 16.6715C28.3416 15.7514 29.0875 15.0055 30.0076 15.0055C30.9278 15.0055 31.6737 15.7514 31.6737 16.6715ZM21.6775 26.6678C21.6775 27.5879 20.9316 28.3338 20.0114 28.3338C19.0913 28.3338 18.3454 27.5879 18.3454 26.6678C18.3454 25.7476 19.0913 25.0017 20.0114 25.0017C20.9316 25.0017 21.6775 25.7476 21.6775 26.6678ZM13.3473 18.3376C13.3473 19.2577 12.6014 20.0036 11.6812 20.0036C10.7611 20.0036 10.0152 19.2577 10.0152 18.3376C10.0152 17.4174 10.7611 16.6715 11.6812 16.6715C12.6014 16.6715 13.3473 17.4174 13.3473 18.3376ZM28.5347 34.6758C26.1822 35.9819 23.5353 36.6663 20.8444 36.6639C12.1092 36.6698 5.02304 29.5934 5.01711 20.8582C5.01669 20.2944 5.04647 19.731 5.10624 19.1705H8.46747C8.84618 20.6371 10.1665 21.6638 11.6812 21.6695C12.2743 21.6666 12.8554 21.5035 13.3631 21.1972L17.1517 24.9858C16.8454 25.4935 16.6823 26.0746 16.6794 26.6676C16.6794 28.5079 18.1712 29.9997 20.0114 29.9997C21.8517 29.9997 23.3435 28.5079 23.3435 26.6676C23.3406 26.0746 23.1774 25.4935 22.8712 24.9858L28.3258 19.5312C28.8335 19.8374 29.4146 20.0006 30.0076 20.0035C31.8479 20.0035 33.3397 18.5117 33.3397 16.6714C33.3368 16.0784 33.1736 15.4973 32.8674 14.9896L34.6834 13.1744C38.9229 20.8099 36.17 30.4363 28.5347 34.6758Z"
                                    fill="black" />
                                <path
                                    d="M41.6698 8.34115C43.1845 8.33542 44.5049 7.30883 44.8836 5.8421H50V4.17606H44.8836C44.5049 2.70933 43.1845 1.68274 41.6698 1.67701C39.8296 1.67701 38.3377 3.16884 38.3377 5.00908C38.3406 5.60209 38.5038 6.18322 38.81 6.69094L37.3464 8.15456C30.3434 -0.969173 17.27 -2.68831 8.14625 4.31476C-0.977474 11.3178 -2.69661 24.3913 4.30646 33.515C10.9169 42.1271 23.0343 44.2162 32.1467 38.3148L34.6608 40.8288L35.8387 42.0067L42.5445 48.7125C44.25 50.418 47.015 50.418 48.7205 48.7125C50.426 47.007 50.426 44.242 48.7205 42.5365L42.0147 35.8307L40.8368 34.6528L38.3227 32.1388C42.7855 25.2647 42.7855 16.4082 38.3227 9.53403L39.9888 7.868C40.4962 8.17434 41.0771 8.33782 41.6698 8.34115ZM41.6698 3.34305C42.59 3.34305 43.3358 4.08891 43.3358 5.00908C43.3358 5.92925 42.59 6.67512 41.6698 6.67512C40.7496 6.67512 40.0038 5.92925 40.0038 5.00908C40.0038 4.08891 40.7497 3.34305 41.6698 3.34305ZM47.5426 43.7144C48.6095 44.7573 48.6289 46.4677 47.586 47.5346C46.543 48.6015 44.8327 48.621 43.7658 47.578C43.7511 47.5638 43.7367 47.5493 43.7223 47.5346L37.0166 40.8288L40.8368 37.0086L47.5426 43.7144ZM39.6589 35.8307L35.8387 39.6509L33.5329 37.3452C33.6503 37.2552 33.7603 37.1561 33.8761 37.0636C33.9919 36.9711 34.126 36.8603 34.2501 36.7562C34.4325 36.6029 34.6125 36.448 34.7891 36.2889C34.8799 36.2056 34.9665 36.1223 35.0556 36.039C35.3972 35.7191 35.7279 35.3884 36.0478 35.0469C36.1311 34.9577 36.2144 34.8711 36.2977 34.7803C36.4568 34.6037 36.6117 34.4238 36.765 34.2413C36.8694 34.118 36.9719 33.9934 37.0724 33.8673C37.164 33.7523 37.2631 33.6424 37.3531 33.5249L39.6589 35.8307ZM36.4284 31.9614C36.166 32.3279 35.8953 32.6869 35.6096 33.0326C35.5263 33.1334 35.4372 33.2309 35.3514 33.33C35.0965 33.6266 34.8332 33.9143 34.5617 34.193C34.4434 34.3152 34.3231 34.4354 34.201 34.5537C33.9233 34.8253 33.6357 35.0885 33.338 35.3434C33.2388 35.4267 33.1414 35.5175 33.0406 35.6017C32.6949 35.8874 32.3358 36.1581 31.9693 36.4205C23.3459 42.5812 11.361 40.5848 5.20029 31.9614C-0.960397 23.338 1.03603 11.353 9.65943 5.19234C18.2828 -0.96834 30.2678 1.02799 36.4284 9.65149C41.1955 16.3242 41.1955 25.2887 36.4284 31.9614Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_802_250">
                                    <rect width="50" height="50" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </div>
                    <h3 class="strategy-card-title">Competitor Research & Data Analysis</h3>
                    <p class="strategy-card-desc">We start with a comprehensive study of your industry, audience, and
                        competitors to find out key opportunities.</p>
                    <ul class="strategy-card-list">
                        <li>Analyze competitor performance and strategies</li>
                        <li>Audience behaviour and market trends</li>
                        <li>Identify gaps and growth opportunities</li>
                    </ul>
                </div>
                <!-- Card 2 -->
                <div class="premium-strategy-card">
                    <div class="strategy-card-icon">
                        <svg width="40" height="50" viewBox="0 0 40 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.94 14.0038C15.94 12.5546 14.7681 11.3755 13.3276 11.3755C11.8872 11.3755 10.7153 12.5546 10.7153 14.0038C10.7153 15.1973 11.5103 16.2067 12.5952 16.5263V20.4869C11.5103 20.8064 10.7153 21.8159 10.7153 23.0094C10.7153 24.2029 11.5103 25.2123 12.5952 25.5319V29.4925C11.5103 29.812 10.7153 30.8215 10.7153 32.015C10.7153 33.4642 11.8872 34.6433 13.3276 34.6433C14.7681 34.6433 15.94 33.4642 15.94 32.015C15.94 30.8215 15.145 29.812 14.0601 29.4925V25.5319C15.145 25.2124 15.94 24.2029 15.94 23.0094C15.94 21.8159 15.145 20.8065 14.0601 20.4869V16.5263C15.145 16.2068 15.94 15.1973 15.94 14.0038ZM14.4751 32.015C14.4751 32.6565 13.9604 33.1785 13.3276 33.1785C12.6949 33.1785 12.1802 32.6565 12.1802 32.015C12.1802 31.3735 12.6949 30.8515 13.3276 30.8515C13.9604 30.8515 14.4751 31.3735 14.4751 32.015ZM14.4751 23.0094C14.4751 23.6509 13.9604 24.1729 13.3276 24.1729C12.6949 24.1729 12.1802 23.6509 12.1802 23.0094C12.1802 22.3679 12.6949 21.8459 13.3276 21.8459C13.9604 21.8459 14.4751 22.3679 14.4751 23.0094ZM13.3276 15.1673C12.6949 15.1673 12.1802 14.6454 12.1802 14.0038C12.1802 13.3623 12.6949 12.8403 13.3276 12.8403C13.9604 12.8403 14.4751 13.3623 14.4751 14.0038C14.4751 14.6453 13.9604 15.1673 13.3276 15.1673Z"
                                fill="black" />
                            <path
                                d="M26.4868 32.7046H18.9673C18.5628 32.7046 18.2349 33.0325 18.2349 33.437C18.2349 33.8415 18.5628 34.1694 18.9673 34.1694H26.4868C26.8913 34.1694 27.2193 33.8415 27.2193 33.437C27.2193 33.0324 26.8913 32.7046 26.4868 32.7046Z"
                                fill="black" />
                            <path
                                d="M33.0664 11.8496H18.9673C18.5628 11.8496 18.2349 12.1775 18.2349 12.582C18.2349 12.9865 18.5628 13.3145 18.9673 13.3145H33.0664C33.4709 13.3145 33.7989 12.9865 33.7989 12.582C33.7989 12.1775 33.4709 11.8496 33.0664 11.8496Z"
                                fill="black" />
                            <path
                                d="M18.9673 16.1582H26.4868C26.8913 16.1582 27.2193 15.8303 27.2193 15.4258C27.2193 15.0213 26.8913 14.6934 26.4868 14.6934H18.9673C18.5628 14.6934 18.2349 15.0213 18.2349 15.4258C18.2349 15.8303 18.5628 16.1582 18.9673 16.1582Z"
                                fill="black" />
                            <path
                                d="M39.0548 12.1912V6.42013C39.0548 4.44815 37.4612 2.84385 35.5025 2.84385H27.0783V2.62833C27.0783 1.1791 25.9064 0 24.466 0H17.4163C15.9759 0 14.804 1.1791 14.804 2.62833V2.84385H3.55225C1.59356 2.84385 0 4.44815 0 6.42013V15.8996C0 16.8262 0.750197 17.58 1.67237 17.58H2.81983V47.3717C2.81983 48.8209 3.99171 50 5.43214 50H33.2545C34.6949 50 35.8668 48.8209 35.8668 47.3717V46.0186H36.4503C37.8907 46.0186 39.0626 44.8395 39.0626 43.3903V12.2975C39.0626 12.2615 39.0599 12.2259 39.0548 12.1912ZM16.269 2.62833C16.269 1.98682 16.7837 1.46485 17.4164 1.46485H24.4661C25.0988 1.46485 25.6135 1.98682 25.6135 2.62833V2.84385H16.269V2.62833ZM15 4.3087H26.8824V4.52423C26.8824 5.68849 25.9459 6.63566 24.795 6.63566H17.0874C15.9365 6.63566 15 5.68849 15 4.52423V4.3087ZM37.5977 43.3903C37.5977 44.0318 37.083 44.5538 36.4503 44.5538H19.5313C19.1268 44.5538 18.7989 44.8817 18.7989 45.2862C18.7989 45.6907 19.1268 46.0186 19.5313 46.0186H34.4019V47.3717C34.4019 48.0132 33.8872 48.5352 33.2545 48.5352H5.43214C4.79942 48.5352 4.28468 48.0132 4.28468 47.3717V6.35695C4.28468 5.95245 3.95675 5.62452 3.55225 5.62452C3.14776 5.62452 2.81983 5.95245 2.81983 6.35695V16.1152H1.67237C1.55791 16.1152 1.46485 16.0185 1.46485 15.8996V6.42013C1.46485 5.25587 2.40127 4.3087 3.55225 4.3087C4.70323 4.3087 5.63966 5.25587 5.63966 6.42033L5.64708 43.3909C5.64728 44.8398 6.81915 46.0187 8.25939 46.0187H10.5317C11.3822 46.6513 12.4324 47.0261 13.5684 47.0261C16.3937 47.0261 18.6921 44.7108 18.6921 41.8648C18.6921 40.7212 18.3196 39.6229 17.635 38.725L18.6441 37.1499C18.8622 36.8093 18.763 36.3562 18.4224 36.1381C18.0818 35.9199 17.6288 36.0191 17.4106 36.3597L13.5231 42.428L12.0957 40.6428C11.8432 40.3268 11.3822 40.2754 11.0663 40.528C10.7504 40.7806 10.699 41.2415 10.9516 41.5574L12.838 43.9172C13.013 44.1565 13.2827 44.2992 13.5673 44.3008C13.569 44.3008 13.5706 44.3008 13.5723 44.3008C13.8676 44.3008 14.1481 44.1487 14.3235 43.8934C14.3279 43.887 14.3322 43.8806 14.3365 43.8739L16.77 40.0753C17.0678 40.6182 17.2272 41.2316 17.2272 41.8649C17.2272 43.9031 15.5858 45.5613 13.5683 45.5613C11.5508 45.5613 9.90939 43.9032 9.90939 41.8649C9.90939 39.8266 11.5508 38.1685 13.5683 38.1685C13.7871 38.1685 14.0062 38.1882 14.2194 38.2267C14.6176 38.2988 14.9986 38.0347 15.0706 37.6367C15.1427 37.2386 14.8785 36.8575 14.4806 36.7854C14.1815 36.7312 13.8745 36.7038 13.5684 36.7038C10.7431 36.7038 8.44465 39.019 8.44465 41.865C8.44465 42.8496 8.72004 43.7704 9.19689 44.5541H8.25939C7.62677 44.5541 7.11203 44.0323 7.11193 43.3908L7.10451 6.42013C7.10451 5.63107 6.84933 4.90079 6.41769 4.3087H13.5352V4.52423C13.5352 6.4962 15.1287 8.1005 17.0874 8.1005H24.795C26.7537 8.1005 28.3472 6.4962 28.3472 4.52423V4.3087H35.5025C36.6535 4.3087 37.5899 5.25587 37.5899 6.42013V12.2975C37.5899 12.3335 37.5926 12.369 37.5977 12.4036V43.3903Z"
                                fill="black" />
                            <path
                                d="M33.0664 29.8604H18.9673C18.5628 29.8604 18.2349 30.1883 18.2349 30.5928C18.2349 30.9973 18.5628 31.3252 18.9673 31.3252H33.0664C33.4709 31.3252 33.7989 30.9973 33.7989 30.5928C33.7989 30.1883 33.4709 29.8604 33.0664 29.8604Z"
                                fill="black" />
                            <path
                                d="M18.9673 25.1636H26.4868C26.8913 25.1636 27.2193 24.8356 27.2193 24.4312C27.2193 24.0267 26.8913 23.6987 26.4868 23.6987H18.9673C18.5628 23.6987 18.2349 24.0267 18.2349 24.4312C18.2349 24.8356 18.5628 25.1636 18.9673 25.1636Z"
                                fill="black" />
                            <path
                                d="M33.0664 20.855H18.9673C18.5628 20.855 18.2349 21.1829 18.2349 21.5874C18.2349 21.9919 18.5628 22.3198 18.9673 22.3198H33.0664C33.4709 22.3198 33.7989 21.9919 33.7989 21.5874C33.7989 21.1829 33.4709 20.855 33.0664 20.855Z"
                                fill="black" />
                        </svg>
                    </div>
                    <h3 class="strategy-card-title">Planning & Strategy Development</h3>
                    <p class="strategy-card-desc">We create a full roadmap and digital marketing strategy, considering
                        your market position and business goals.</p>
                    <ul class="strategy-card-list">
                        <li>Identify goals and KPIs</li>
                        <li>Choose the best marketing channels</li>
                        <li>Match strategy to brand positioning</li>
                    </ul>
                </div>
                <!-- Card 3 -->
                <div class="premium-strategy-card">
                    <div class="strategy-card-icon">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.6562 42.1875H45.3125V17.1875H43.75V42.1875H4.6875V16.4062H8.59375V17.1875H6.25C5.81797 17.1875 5.46875 17.5367 5.46875 17.9688V40.625C5.46875 41.057 5.81797 41.4062 6.25 41.4062H42.1875C42.6195 41.4062 42.9688 41.057 42.9688 40.625V17.9688H41.4062V39.8438H7.03125V18.75H8.59375V23.4375C8.59375 23.8695 8.94297 24.2188 9.375 24.2188H20.3125C20.7445 24.2188 21.0938 23.8695 21.0938 23.4375V18.75H28.125V17.1875H21.0938V16.4062H28.125V14.8438H21.0938V12.5C21.0938 12.068 20.7445 11.7188 20.3125 11.7188H9.375C8.94297 11.7188 8.59375 12.068 8.59375 12.5V14.8438H3.90625C3.47422 14.8438 3.125 15.193 3.125 15.625V42.1875H0.78125C0.349219 42.1875 0 42.5367 0 42.9688V46.0938C0 47.3859 1.05156 48.4375 2.34375 48.4375H46.0938C47.3859 48.4375 48.4375 47.3859 48.4375 46.0938V42.9688C48.4375 42.5367 48.0883 42.1875 47.6562 42.1875ZM10.1562 13.2812H19.5312V22.6562H10.1562V13.2812ZM46.875 46.0938C46.875 46.525 46.525 46.875 46.0938 46.875H2.34375C1.9125 46.875 1.5625 46.525 1.5625 46.0938V43.75H46.875V46.0938Z"
                                fill="black" />
                            <path
                                d="M28.9062 11.7188H30.0516C30.1891 12.1555 30.3641 12.5781 30.5773 12.9836L29.7664 13.7945C29.4609 14.1 29.4609 14.5937 29.7664 14.8992L31.9758 17.1086C32.2813 17.4141 32.775 17.4141 33.0805 17.1086L33.8914 16.2977C34.2977 16.5102 34.7203 16.6859 35.1562 16.8234V17.9688C35.1562 18.4008 35.5055 18.75 35.9375 18.75H39.0625C39.4945 18.75 39.8438 18.4008 39.8438 17.9688V16.8234C40.2805 16.6859 40.7031 16.5109 41.1086 16.2977L41.9195 17.1086C42.225 17.4141 42.7187 17.4141 43.0242 17.1086L45.2336 14.8992C45.5391 14.5937 45.5391 14.1 45.2336 13.7945L44.4227 12.9836C44.6352 12.5773 44.8109 12.1547 44.9484 11.7188H46.0938C46.5258 11.7188 46.875 11.3695 46.875 10.9375V7.8125C46.875 7.38047 46.5258 7.03125 46.0938 7.03125H44.9484C44.8109 6.59453 44.6359 6.17187 44.4227 5.76641L45.2336 4.95547C45.5391 4.65 45.5391 4.15625 45.2336 3.85078L43.0242 1.64141C42.7187 1.33594 42.225 1.33594 41.9195 1.64141L41.1086 2.45234C40.7031 2.23906 40.2805 2.06406 39.8438 1.92656V0.78125C39.8438 0.349219 39.4945 0 39.0625 0H35.9375C35.5055 0 35.1562 0.349219 35.1562 0.78125V1.92656C34.7195 2.06406 34.2969 2.23906 33.8914 2.45234L33.0805 1.64141C32.775 1.33594 32.2813 1.33594 31.9758 1.64141L29.7664 3.85078C29.4609 4.15625 29.4609 4.65 29.7664 4.95547L30.5773 5.76641C30.3641 6.17187 30.1891 6.59453 30.0516 7.03125H28.9062C28.4742 7.03125 28.125 7.38047 28.125 7.8125V10.9375C28.125 11.3695 28.4742 11.7188 28.9062 11.7188ZM29.6875 8.59375H30.6484C31.0133 8.59375 31.3289 8.34141 31.4102 7.98594C31.5664 7.30078 31.8367 6.65078 32.2125 6.05312C32.407 5.74375 32.3617 5.34219 32.1039 5.08437L31.4227 4.40313L32.5273 3.29844L33.2086 3.97969C33.4672 4.23906 33.8695 4.28281 34.1773 4.08828C34.775 3.7125 35.425 3.44219 36.1102 3.28594C36.4664 3.20469 36.7188 2.88828 36.7188 2.52344V1.5625H38.2812V2.52344C38.2812 2.88828 38.5336 3.20391 38.8891 3.28516C39.5742 3.44141 40.2242 3.71172 40.8219 4.0875C41.1305 4.28203 41.532 4.23828 41.7906 3.97891L42.4719 3.29766L43.5766 4.40234L42.8953 5.08359C42.6375 5.34141 42.5922 5.74375 42.7867 6.05234C43.1625 6.65 43.4328 7.3 43.5891 7.98516C43.6703 8.34141 43.9867 8.59375 44.3516 8.59375H45.3125V10.1562H44.3516C43.9867 10.1562 43.6711 10.4086 43.5898 10.7641C43.4336 11.4492 43.1633 12.0992 42.7875 12.6969C42.593 13.0063 42.6383 13.4078 42.8961 13.6656L43.5773 14.3469L42.4727 15.4516L41.7914 14.7703C41.5328 14.5117 41.1305 14.4672 40.8227 14.6617C40.225 15.0375 39.575 15.3078 38.8898 15.4641C38.5336 15.5453 38.2812 15.8617 38.2812 16.2266V17.1875H36.7188V16.2266C36.7188 15.8617 36.4664 15.5461 36.1109 15.4648C35.4258 15.3086 34.7758 15.0383 34.1781 14.6625C33.8695 14.468 33.468 14.5125 33.2094 14.7711L32.5281 15.4523L31.4234 14.3477L32.1047 13.6664C32.3625 13.4086 32.4078 13.0063 32.2133 12.6977C31.8375 12.1 31.5672 11.45 31.4109 10.7648C31.3297 10.4086 31.0133 10.1562 30.6484 10.1562H29.6875V8.59375Z"
                                fill="black" />
                            <path
                                d="M37.5 14.8438C40.5148 14.8438 42.9688 12.3898 42.9688 9.375C42.9688 6.36016 40.5148 3.90625 37.5 3.90625C34.4852 3.90625 32.0312 6.36016 32.0312 9.375C32.0312 12.3898 34.4852 14.8438 37.5 14.8438ZM37.5 5.46875C39.6539 5.46875 41.4062 7.22109 41.4062 9.375C41.4062 11.5289 39.6539 13.2812 37.5 13.2812C35.3461 13.2812 33.5938 11.5289 33.5938 9.375C33.5938 7.22109 35.3461 5.46875 37.5 5.46875Z"
                                fill="black" />
                            <path
                                d="M40.625 26.5625V25H39.7812C39.6484 24.0758 39.2844 23.2273 38.7484 22.5125L39.3469 21.9141L38.2422 20.8094L37.6437 21.4078C36.9289 20.8719 36.0805 20.5078 35.1562 20.375V19.5312H33.5938V20.375C32.6695 20.5078 31.8211 20.8719 31.1063 21.4078L30.5078 20.8094L29.4031 21.9141L30.0016 22.5125C29.4656 23.2273 29.1016 24.0758 28.9688 25H28.125V26.5625H28.9688C29.1016 27.4867 29.4656 28.3352 30.0016 29.05L29.4031 29.6484L30.5078 30.7531L31.1063 30.1547C31.8211 30.6906 32.6695 31.0539 33.5938 31.1875V32.0312H35.1562V31.1875C36.0805 31.0547 36.9289 30.6906 37.6437 30.1547L38.2422 30.7531L39.3469 29.6484L38.7484 29.05C39.2844 28.3352 39.6477 27.4867 39.7812 26.5625H40.625ZM38.2812 25.7812C38.2812 27.9352 36.5289 29.6875 34.375 29.6875C32.2211 29.6875 30.4688 27.9352 30.4688 25.7812C30.4688 23.6273 32.2211 21.875 34.375 21.875C36.5289 21.875 38.2812 23.6273 38.2812 25.7812Z"
                                fill="black" />
                            <path
                                d="M34.375 22.6562C32.6516 22.6562 31.25 24.0578 31.25 25.7812C31.25 27.5047 32.6516 28.9062 34.375 28.9062C36.0984 28.9062 37.5 27.5047 37.5 25.7812C37.5 24.0578 36.0984 22.6562 34.375 22.6562ZM34.375 27.3438C33.5133 27.3438 32.8125 26.643 32.8125 25.7812C32.8125 24.9195 33.5133 24.2188 34.375 24.2188C35.2367 24.2188 35.9375 24.9195 35.9375 25.7812C35.9375 26.643 35.2367 27.3438 34.375 27.3438Z"
                                fill="black" />
                            <path
                                d="M20.3125 25.7812H9.375C8.94297 25.7812 8.59375 26.1305 8.59375 26.5625V37.5C8.59375 37.932 8.94297 38.2812 9.375 38.2812H20.3125C20.7445 38.2812 21.0938 37.932 21.0938 37.5V26.5625C21.0938 26.1305 20.7445 25.7812 20.3125 25.7812ZM19.5312 36.7188H10.1562V27.3438H19.5312V36.7188Z"
                                fill="black" />
                            <path
                                d="M14.0039 19.7131L12.3437 17.4998L11.0938 18.4373L13.4375 21.5623C13.5859 21.76 13.8172 21.8748 14.0625 21.8748C14.0734 21.8748 14.0844 21.8748 14.0953 21.874C14.3531 21.8631 14.5883 21.7264 14.725 21.5076L18.6312 15.2576L17.307 14.4287L14.0039 19.7131Z"
                                fill="black" />
                            <path
                                d="M12.2711 35.7087L14.8437 33.136L17.4164 35.7087L18.5211 34.604L15.9484 32.0313L18.5211 29.4587L17.4164 28.354L14.8437 30.9267L12.2711 28.354L11.1664 29.4587L13.739 32.0313L11.1664 34.604L12.2711 35.7087Z"
                                fill="black" />
                        </svg>
                    </div>
                    <h3 class="strategy-card-title">Trial & Testing</h3>
                    <p class="strategy-card-desc">We test content, creatives, and campaigns to identify the most
                        effective approach before launching any campaign.</p>
                    <ul class="strategy-card-list">
                        <li>Test ad creatives, CTA, and headlines</li>
                        <li>Evaluate early performance metrics</li>
                        <li>Optimize for better results</li>
                    </ul>
                </div>
                <!-- Card 4 -->
                <div class="premium-strategy-card">
                    <div class="strategy-card-icon">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.9373 23.2602C11.1486 24.0488 11.6557 24.7087 12.3653 25.1184C12.8385 25.3916 13.3631 25.5312 13.8939 25.5312C14.1591 25.5312 14.4258 25.4964 14.6885 25.426L15.4599 25.2194C15.66 25.1658 15.8307 25.0348 15.9343 24.8553C16.0379 24.6759 16.0659 24.4626 16.0123 24.2626L14.2976 17.863C17.6321 17.7368 20.8115 18.6254 24.0382 19.6337C24.244 19.6981 24.4526 19.7295 24.6585 19.7295C25.174 19.7294 25.6716 19.532 26.0612 19.1579C26.6064 18.6344 26.8152 17.8861 26.6195 17.1563L25.4835 12.9165C26.8217 12.241 27.5524 10.6959 27.1495 9.19195C26.7465 7.68784 25.3405 6.7146 23.8444 6.79917L22.6382 2.29741C22.4483 1.58902 21.9128 1.05034 21.2055 0.856497C20.4983 0.662844 19.7629 0.853176 19.2384 1.36568C18.8599 1.7357 18.481 2.1146 18.0799 2.51577C15.9741 4.62183 13.5897 7.00659 10.8676 8.39146L6.73124 9.49966C5.46288 9.8395 4.40058 10.6567 3.74013 11.8006C3.07968 12.9446 2.90302 14.2731 3.24286 15.5415C3.94696 18.1689 6.65702 19.7334 9.28486 19.0299L9.76903 18.9001L10.9373 23.2602ZM14.2841 23.9167C13.8986 24.02 13.4946 23.9662 13.1465 23.7652C12.7984 23.5642 12.5499 23.2413 12.4466 22.8558L11.2782 18.4957L12.7442 18.1028L14.3008 23.9122L14.2841 23.9167ZM13.8839 16.3188L13.8024 16.0147L12.0635 9.52486C14.3447 8.2607 16.3425 6.43023 18.1432 4.65679L21.522 17.2668C19.3738 16.6951 17.2073 16.287 14.9471 16.287C14.5952 16.2869 14.2406 16.2981 13.8839 16.3188ZM25.6402 9.59634C25.818 10.2597 25.5686 10.9381 25.0611 11.3403L24.2666 8.37515C24.9066 8.46948 25.4623 8.93277 25.6402 9.59634ZM20.7924 2.36343C20.9683 2.41157 21.0815 2.52544 21.1288 2.70171L25.1102 17.5607C25.159 17.7422 25.1147 17.9004 24.9791 18.0306C24.8434 18.1608 24.6837 18.1983 24.5041 18.1423C24.0933 18.014 23.6831 17.8876 23.273 17.7647L19.4201 3.38521C19.732 3.07349 20.0327 2.77408 20.3305 2.48286C20.461 2.35552 20.6166 2.31499 20.7924 2.36343ZM8.88046 17.5206C7.08525 18.0016 5.23319 16.9324 4.75224 15.1371C4.5204 14.2719 4.64159 13.3645 5.09335 12.5819C5.54511 11.7994 6.2705 11.2409 7.13573 11.009L10.5953 10.0821L12.3399 16.5936L8.88046 17.5206ZM28.4955 13.6557C28.1219 13.44 27.9938 12.9622 28.2096 12.5885C28.4253 12.2148 28.9032 12.0868 29.2768 12.3026L30.7761 13.1682C31.1497 13.3839 31.2777 13.8618 31.062 14.2354C30.9173 14.486 30.6547 14.6261 30.3847 14.6261C30.2521 14.6261 30.1178 14.5923 29.9947 14.5213L28.4955 13.6557ZM28.8652 8.73228C28.7535 8.31538 29.0009 7.88706 29.4176 7.77534L31.0898 7.3272C31.5069 7.21568 31.935 7.46294 32.0467 7.87954C32.1584 8.29644 31.911 8.72476 31.4943 8.83648L29.8221 9.28462C29.7544 9.30278 29.6862 9.31138 29.6193 9.31138C29.2744 9.31148 28.9587 9.0813 28.8652 8.73228ZM26.2482 4.52661L27.1139 3.0273C27.3296 2.65357 27.8074 2.52544 28.181 2.74136C28.5548 2.95708 28.6827 3.43491 28.467 3.80855L27.6014 5.30786C27.4566 5.55845 27.194 5.69859 26.924 5.69859C26.7915 5.69859 26.6571 5.6648 26.5341 5.5938C26.1604 5.37798 26.0325 4.90025 26.2482 4.52661ZM25.9359 30.2879H20.4945C20.0631 30.2879 19.7133 30.6377 19.7133 31.0692V48.4373C19.7133 48.8687 20.0631 49.2185 20.4945 49.2185H25.9359C26.3674 49.2185 26.7172 48.8687 26.7172 48.4373V31.0692C26.7172 30.6377 26.3674 30.2879 25.9359 30.2879ZM25.1547 47.656H21.2758V31.8504H25.1547V47.656ZM36.0398 32.5559H30.5984C30.167 32.5559 29.8172 32.9057 29.8172 33.3372V48.4374C29.8172 48.8688 30.167 49.2186 30.5984 49.2186H36.0398C36.4713 49.2186 36.8211 48.8688 36.8211 48.4374V33.3372C36.8211 32.9057 36.4713 32.5559 36.0398 32.5559ZM35.2586 47.6561H31.3797V34.1184H35.2586V47.6561ZM46.1435 23.1502H40.7021C40.2707 23.1502 39.9209 23.5001 39.9209 23.9315V48.4373C39.9209 48.8687 40.2707 49.2185 40.7021 49.2185H46.1435C46.575 49.2185 46.9248 48.8687 46.9248 48.4373V23.9315C46.9248 23.5001 46.575 23.1502 46.1435 23.1502ZM45.3623 47.656H41.4834V24.7127H45.3623V47.656ZM15.8321 37.0251H10.3907C9.95927 37.0251 9.60946 37.3749 9.60946 37.8063V48.4373C9.60946 48.8687 9.95927 49.2185 10.3907 49.2185H15.8321C16.2636 49.2185 16.6134 48.8687 16.6134 48.4373V37.8063C16.6134 37.3749 16.2636 37.0251 15.8321 37.0251ZM15.0509 47.656H11.172V38.5876H15.0509V47.656ZM33.0736 24.8043L41.3275 16.4798L40.2019 16.5786C39.7718 16.6151 39.3931 16.2983 39.3555 15.8685C39.3178 15.4387 39.6356 15.0597 40.0655 15.0219L43.3546 14.7335C43.5876 14.7129 43.8182 14.7984 43.9818 14.9661C44.1455 15.1336 44.2253 15.3659 44.1992 15.5987L43.8324 18.8799C43.7878 19.2793 43.4496 19.5745 43.057 19.5745C43.028 19.5745 42.9987 19.5728 42.9693 19.5695C42.5405 19.5216 42.2317 19.1351 42.2797 18.7063L42.4016 17.6159L33.8447 26.2459C33.6372 26.4552 33.3294 26.5298 33.0489 26.4389L23.3684 23.2981L13.5915 30.911C13.4489 31.022 13.2799 31.0758 13.112 31.0758C12.8794 31.0758 12.6491 30.9723 12.4951 30.7746C12.2301 30.4341 12.2911 29.9432 12.6315 29.6781L22.7354 21.8107C22.94 21.6515 23.21 21.604 23.4565 21.684L33.0736 24.8043Z"
                                fill="black" />
                        </svg>
                    </div>
                    <h3 class="strategy-card-title">Campaign Implementation & Launch</h3>
                    <p class="strategy-card-desc">We execute campaigns with precision across selected channels (SEO,
                        PPC, Social Media, Email marketing, etc.) based on market research.</p>
                    <ul class="strategy-card-list">
                        <li>Launch selected campaigns</li>
                        <li>Monitor outcomes in real-time</li>
                        <li>Ensure consistency in branding</li>
                    </ul>
                </div>
                <!-- Card 5 -->
                <div class="premium-strategy-card">
                    <div class="strategy-card-icon">
                        <svg width="38" height="50" viewBox="0 0 38 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3795 16.6968H16.4257C16.0212 16.6968 15.6933 16.3689 15.6933 15.9644C15.6933 15.5598 16.0212 15.2319 16.4257 15.2319H24.3795C24.784 15.2319 25.1119 15.5598 25.1119 15.9644C25.1119 16.3689 24.7841 16.6968 24.3795 16.6968Z"
                                fill="black" />
                            <path
                                d="M32.3334 12.9375H16.4257C16.0212 12.9375 15.6933 12.6097 15.6933 12.2051C15.6933 11.8005 16.0212 11.4727 16.4257 11.4727H32.3334C32.7379 11.4727 33.0658 11.8005 33.0658 12.2051C33.0658 12.6097 32.7379 12.9375 32.3334 12.9375Z"
                                fill="black" />
                            <path
                                d="M24.3795 28.9712H16.4257C16.0212 28.9712 15.6933 28.6434 15.6933 28.2388C15.6933 27.8342 16.0212 27.5063 16.4257 27.5063H24.3795C24.784 27.5063 25.1119 27.8342 25.1119 28.2388C25.1119 28.6434 24.7841 28.9712 24.3795 28.9712Z"
                                fill="black" />
                            <path
                                d="M32.3334 25.2114H16.4257C16.0212 25.2114 15.6933 24.8836 15.6933 24.479C15.6933 24.0744 16.0212 23.7466 16.4257 23.7466H32.3334C32.7379 23.7466 33.0658 24.0744 33.0658 24.479C33.0658 24.8836 32.7379 25.2114 32.3334 25.2114Z"
                                fill="black" />
                            <path
                                d="M24.3795 41.2456H16.4257C16.0212 41.2456 15.6933 40.9178 15.6933 40.5132C15.6933 40.1086 16.0212 39.7808 16.4257 39.7808H24.3795C24.784 39.7808 25.1119 40.1086 25.1119 40.5132C25.1119 40.9178 24.7841 41.2456 24.3795 41.2456Z"
                                fill="black" />
                            <path
                                d="M32.3334 37.4858H16.4257C16.0212 37.4858 15.6933 37.158 15.6933 36.7534C15.6933 36.3488 16.0212 36.021 16.4257 36.021H32.3334C32.7379 36.021 33.0658 36.3488 33.0658 36.7534C33.0658 37.158 32.7379 37.4858 32.3334 37.4858Z"
                                fill="black" />
                            <path
                                d="M25.0873 6.89951H12.4209C11.217 6.89951 10.2375 5.92012 10.2375 4.71621V2.1834C10.2376 0.979492 11.217 0 12.4209 0H25.0872C26.2911 0 27.2706 0.979492 27.2706 2.1834V4.71621C27.2706 5.92012 26.2912 6.89951 25.0873 6.89951ZM12.4209 1.46484C12.0247 1.46484 11.7023 1.78721 11.7023 2.1834V4.71621C11.7023 5.1124 12.0247 5.43467 12.4209 5.43467H25.0872C25.4834 5.43467 25.8058 5.1123 25.8058 4.71621V2.1834C25.8058 1.78711 25.4834 1.46484 25.0872 1.46484H12.4209Z"
                                fill="black" />
                            <path
                                d="M9.66397 17.6786H6.40879C5.32451 17.6786 4.44238 16.7965 4.44238 15.7122V12.4571C4.44238 11.3729 5.32451 10.4907 6.40879 10.4907H9.66397C10.7482 10.4907 11.6304 11.3729 11.6304 12.4571V15.7123C11.6304 16.7965 10.7482 17.6786 9.66397 17.6786ZM6.40879 11.9556C6.13223 11.9556 5.90723 12.1806 5.90723 12.4571V15.7123C5.90723 15.9889 6.13223 16.2139 6.40879 16.2139H9.66397C9.94053 16.2139 10.1655 15.9889 10.1655 15.7123V12.4571C10.1655 12.1806 9.94053 11.9556 9.66397 11.9556H6.40879Z"
                                fill="black" />
                            <path
                                d="M9.66397 29.9526H6.40879C5.32451 29.9526 4.44238 29.0705 4.44238 27.9862V24.7311C4.44238 23.6468 5.32451 22.7646 6.40879 22.7646H9.66397C10.7482 22.7646 11.6304 23.6468 11.6304 24.7311V27.9862C11.6304 29.0705 10.7482 29.9526 9.66397 29.9526ZM6.40879 24.2295C6.13223 24.2295 5.90723 24.4545 5.90723 24.7311V27.9862C5.90723 28.2628 6.13223 28.4878 6.40879 28.4878H9.66397C9.94053 28.4878 10.1655 28.2628 10.1655 27.9862V24.7311C10.1655 24.4545 9.94053 24.2295 9.66397 24.2295H6.40879Z"
                                fill="black" />
                            <path
                                d="M9.66397 42.2267H6.40879C5.32451 42.2267 4.44238 41.3445 4.44238 40.2602V37.0051C4.44238 35.9207 5.32451 35.0386 6.40879 35.0386H9.66397C10.7482 35.0386 11.6304 35.9207 11.6304 37.0051V40.2602C11.6304 41.3445 10.7482 42.2267 9.66397 42.2267ZM6.40879 36.5035C6.13223 36.5035 5.90723 36.7286 5.90723 37.0052V40.2603C5.90723 40.5368 6.13223 40.7619 6.40879 40.7619H9.66397C9.94053 40.7619 10.1655 40.5368 10.1655 40.2603V37.0052C10.1655 36.7286 9.94053 36.5035 9.66397 36.5035H6.40879Z"
                                fill="black" />
                            <path
                                d="M34.3353 49.9999H3.17295C1.42334 49.9999 0 48.5766 0 46.827V5.89014C0 4.14063 1.42344 2.71729 3.17295 2.71729H7.56211C7.9666 2.71729 8.29453 3.04512 8.29453 3.44971C8.29453 3.8543 7.9666 4.18213 7.56211 4.18213H3.17295C2.23105 4.18213 1.46484 4.94834 1.46484 5.89014V46.8269C1.46484 47.7687 2.23115 48.535 3.17295 48.535H34.3353C35.2771 48.535 36.0434 47.7687 36.0434 46.8269V5.89014C36.0434 4.94824 35.2771 4.18213 34.3353 4.18213H29.9461C29.5416 4.18213 29.2137 3.8543 29.2137 3.44971C29.2137 3.04512 29.5416 2.71729 29.9461 2.71729H34.3353C36.0849 2.71729 37.5082 4.14063 37.5082 5.89014V46.8269C37.5082 48.5766 36.0848 49.9999 34.3353 49.9999Z"
                                fill="black" />
                        </svg>
                    </div>
                    <h3 class="strategy-card-title">Reporting & Ongoing Optimization</h3>
                    <p class="strategy-card-desc">We track and analyze performance, report to the clients, take
                        feedback, and continuously optimize for better performance.</p>
                    <ul class="strategy-card-list">
                        <li>Analyze KPIs and return on investment (ROI)</li>
                        <li>Align campaigns with evolving market trends</li>
                        <li>Optimize campaigns based on performance data</li>
                    </ul>
                </div>
            </div>
            <!-- Progress Bar at bottom of section -->
            <div class="strategy-progress-bar-wrap">
                <div class="strategy-progress-bar" id="strategyProgressBar"></div>
            </div>
        </section>
    </div>
</div>

<section class="premium-roi-section">
    <div class="container">
        <!-- Section Heading -->

        <div class="row align-items-center">
            <!-- Left Side: Image -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="premium-roi-title">The True ROI of Digital Marketing</h2>

                <div class="premium-roi-img-wrap">
                    <img src="<?= base_url('assets/images/digital-022.webp') ?>" width="1332" height="1088"
                        alt="The True ROI of Digital Marketing" class="img-fluid premium-roi-img">
                </div>
            </div>
            <!-- Right Side: Content -->
            <div class="col-lg-6">
                <div class="premium-roi-content">
                    <p class="premium-roi-text">Investment in digital marketing is not a cost- it's a multiplier.</p>
                    <p class="premium-roi-desc">Smart digital marketing doesn't just drive traffic, it helps your
                        business climb the growth ladder. Whether you're exploring <a
                            href="/pay-per-click-ppc-services-in-dubai/">PPC advertising</a>, <a
                            href="/email-marketing-company-in-dubai/">Email marketing</a>, <a
                            href="/social-media-marketing-agency-in-dubai/">social media marketing</a>, or <a
                            href="/seo-services-company-in-dubai/">SEO services in Dubai</a>, every digital marketing
                        initiative can deliver exceptional results when executed strategically.</p>

                    <h3 class="premium-roi-list-title">With the right campaigns, your brand can:</h3>
                    <ul class="premium-roi-list">
                        <li>Attract high-converting leads with consistency</li>
                        <li>Improve customer engagement and conversion rates</li>
                        <li>Enhance your brand visibility across platforms</li>
                        <li>Optimize ad spend for maximum ROI</li>
                    </ul>

                    <p class="premium-roi-desc">At BrandStory, we put serious focus on driving growth results that align
                        with your business KPIs. We don't follow vanity metrics, we increase and achieve real growth
                        results with expert precision & strategy.</p>

                    <div class="premium-roi-action">
                        <a href="/contact/" class="premium-roi-btn">
                            <span>Contact Us</span>
                            <span class="roi-btn-arrow-circle">
                                <svg viewBox="0 0 24 24" class="roi-btn-arrow-svg">
                                    <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 
<section class="home-dummy-showcase-sec">
    <div class="container">
      <h2 class="text-start text-white mb-lg-5 mb-4">BrandStory Builds Legacy <br>Branding and Marketing Solutions</h2>
    </div>
  <div class="home-dummy-showcase-grid">
   
    <div class="home-dummy-card">
      <img src="<?= base_url('assets/images/dummy-01.webp') ?>" alt="Solana Yoga Design" class="home-dummy-bg-img">
      <div class="dummy-card-badge">Logo Design</div>
      <a href="/logo-designing-dubai/" class="dummy-card-hover">
        <span class="dummy-hover-text">View More &rarr;</span>
      </a>
    </div>

    
    <div class="home-dummy-card">
      <img src="<?= base_url('assets/images/dummy-02.webp') ?>" alt="Wissh Skincare Creative Branding" class="home-dummy-bg-img">
      <div class="dummy-card-badge">Creative Branding</div>
      <a href="/branding-agency-in-dubai/" class="dummy-card-hover">
        <span class="dummy-hover-text">View More &rarr;</span>
      </a>
    </div>

    
    <div class="home-dummy-card">
      <img src="<?= base_url('assets/images/dummy-03.webp') ?>" alt="Maxx Apparel Creative Branding" class="home-dummy-bg-img">
      <div class="dummy-card-badge">Creative Branding</div>
      <a href="/branding-agency-in-dubai/" class="dummy-card-hover">
        <span class="dummy-hover-text">View More &rarr;</span>
      </a>
    </div>

    
    <div class="home-dummy-card">
      <img src="<?= base_url('assets/images/dummy-04.webp') ?>" alt="Fitwares Logo Design" class="home-dummy-bg-img">
      <div class="dummy-card-badge">Logo Design</div>
      <a href="/logo-designing-dubai/" class="dummy-card-hover">
        <span class="dummy-hover-text">View More &rarr;</span>
      </a>
    </div>
  </div>
</section>-->



<section class="premium-industries-section">
    <div class="container">
        <h2 class="premium-industries-title">Industries We Proudly Serve and Dominate</h2>
        <div class="row g-4">
            <!-- Card 1: Education -->
            <div class="col-lg-4 col-md-6">
                <div class="premium-industry-card">
                    <!-- Icon -->
                    <div class="industry-card-icon">
                        <!-- Book SVG -->
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5859 24.1406H22.9688C23.616 24.1406 24.1406 23.616 24.1406 22.9688C24.1406 22.3215 23.616 21.7969 22.9688 21.7969H15.5859C14.9387 21.7969 14.4141 22.3215 14.4141 22.9688C14.4141 23.616 14.9387 24.1406 15.5859 24.1406Z"
                                fill="white" />
                            <path
                                d="M15.5859 31.1719H22.9688C23.616 31.1719 24.1406 30.6472 24.1406 30C24.1406 29.3528 23.616 28.8281 22.9688 28.8281H15.5859C14.9387 28.8281 14.4141 29.3528 14.4141 30C14.4141 30.6472 14.9387 31.1719 15.5859 31.1719Z"
                                fill="white" />
                            <path
                                d="M15.5859 38.2031H22.9688C23.616 38.2031 24.1406 37.6785 24.1406 37.0312C24.1406 36.384 23.616 35.8594 22.9688 35.8594H15.5859C14.9387 35.8594 14.4141 36.384 14.4141 37.0312C14.4141 37.6785 14.9387 38.2031 15.5859 38.2031Z"
                                fill="white" />
                            <path
                                d="M44.4141 21.7969H37.0312C36.384 21.7969 35.8594 22.3215 35.8594 22.9688C35.8594 23.616 36.384 24.1406 37.0312 24.1406H44.4141C45.0613 24.1406 45.5859 23.616 45.5859 22.9688C45.5859 22.3215 45.0613 21.7969 44.4141 21.7969Z"
                                fill="white" />
                            <path
                                d="M44.4141 28.8281H37.0312C36.384 28.8281 35.8594 29.3528 35.8594 30C35.8594 30.6472 36.384 31.1719 37.0312 31.1719H44.4141C45.0613 31.1719 45.5859 30.6472 45.5859 30C45.5859 29.3528 45.0613 28.8281 44.4141 28.8281Z"
                                fill="white" />
                            <path
                                d="M44.4141 52.2656C45.0613 52.2656 45.5859 51.741 45.5859 51.0938C45.5859 50.4465 45.0613 49.9219 44.4141 49.9219C43.7669 49.9219 43.2422 50.4465 43.2422 51.0938C43.2422 51.741 43.7669 52.2656 44.4141 52.2656Z"
                                fill="white" />
                            <path
                                d="M58.8281 11.25H52.6172V8.90625C52.6172 8.25902 52.0925 7.73438 51.4453 7.73438H38.4879C35.3461 7.73438 32.3722 8.82645 30 10.8311C27.6277 8.82645 24.6539 7.73438 21.5121 7.73438H8.55469C7.90746 7.73438 7.38281 8.25902 7.38281 8.90625V11.25H1.17188C0.524648 11.25 0 11.7746 0 12.4219V51.0938C0 51.741 0.524648 52.2656 1.17188 52.2656H39.1406C39.7879 52.2656 40.3125 51.741 40.3125 51.0938C40.3125 50.4465 39.7879 49.9219 39.1406 49.9219H31.1719V48.0779C33.1738 46.2405 35.7534 45.2344 38.4879 45.2344H51.4453C52.0925 45.2344 52.6172 44.7097 52.6172 44.0625V13.5938H57.6562V49.9219H49.6875C49.0403 49.9219 48.5156 50.4465 48.5156 51.0938C48.5156 51.741 49.0403 52.2656 49.6875 52.2656H58.8281C59.4754 52.2656 60 51.741 60 51.0938V12.4219C60 11.7746 59.4754 11.25 58.8281 11.25ZM9.72656 10.0781H21.5121C24.2466 10.0781 26.8262 11.0843 28.8281 12.9217V45.1035C26.6807 43.6639 24.1557 42.8906 21.5121 42.8906H9.72656V10.0781ZM2.34375 49.9219V13.5938H7.38281V44.0625C7.38281 44.7097 7.90746 45.2344 8.55469 45.2344H21.5121C24.2466 45.2344 26.8262 46.2405 28.8281 48.0779V49.9219H2.34375ZM50.2734 42.8906H38.4879C35.8443 42.8906 33.3193 43.6639 31.1719 45.1035V12.9217C33.1738 11.0843 35.7534 10.0781 38.4879 10.0781H50.2734V42.8906Z"
                                fill="white" />
                        </svg>

                    </div>
                    <!-- Diagonal Arrow at Top-Right in hover state -->
                    <a href="/industries/education-marketing-services/" class="industry-card-arrow"
                        aria-label="Learn more about Education Marketing Services">
                        <svg viewBox="0 0 24 24" class="arrow-svg">
                            <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <h3 class="industry-card-title">Education</h3>

                    <div class="industry-card-hover-details">
                        <p class="industry-card-desc">We empower universities, colleges, training institutes, and
                            schools in Dubai with data-driven digital marketing strategies that boost visibility, leads,
                            and long-term growth.</p>
                        <div class="industry-card-links">
                            <a href="/industries/education-seo-agency-in-dubai-uae/">SEO Services</a> |
                            <a href="/industries/education-ppc-agency-in-dubai-uae/">PPC</a> |
                            <a href="/industries/education-content-marketing-agency-in-dubai-uae/">Content Marketing</a>
                            |
                            <a href="/industries/education-branding-agency-in-dubai-uae/">Branding</a> |
                            <a href="/industries/education-social-media-agency-in-dubai-uae/">Social Media</a> |
                            <a href="/industries/education-web-design-development-agency-in-dubai-uae/">Web Design</a> |
                            <a href="/industries/education-performance-marketing-agency-in-dubai-uae/">Perf.
                                Marketing</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: E-commerce -->
            <div class="col-lg-4 col-md-6">
                <div class="premium-industry-card">
                    <div class="industry-card-icon">
                        <!-- Shopping Cart SVG -->
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M26.6317 44.0319C25.3634 44.0319 24.3322 43.0017 24.3322 41.7334C24.3322 40.465 25.3633 39.4348 26.6317 39.4348C27.9001 39.4348 28.9312 40.465 28.9312 41.7334C28.9312 43.0017 27.9001 44.0319 26.6317 44.0319ZM26.6317 41.3704C26.4314 41.3704 26.2678 41.533 26.2678 41.7334C26.2678 42.1341 26.9956 42.1341 26.9956 41.7334C26.9956 41.533 26.8321 41.3704 26.6317 41.3704ZM35.2758 44.0319C34.0075 44.0319 32.9773 43.0017 32.9773 41.7334C32.9773 40.465 34.0075 39.4348 35.2758 39.4348C36.5442 39.4348 37.5744 40.465 37.5744 41.7334C37.5744 43.0017 36.5442 44.0319 35.2758 44.0319ZM35.2758 41.3704C35.0754 41.3704 34.9129 41.533 34.9129 41.7334C34.9129 42.1341 35.6387 42.1341 35.6387 41.7334C35.6387 41.533 35.4762 41.3704 35.2758 41.3704ZM42.5155 21.9595C42.0864 21.4 41.4343 21.0796 40.7292 21.0796H18.7392L18.1662 18.937C17.8761 17.8491 16.8875 17.0902 15.7618 17.0902H14.3196C13.7846 17.0902 13.3518 17.5231 13.3518 18.058C13.3518 18.5929 13.7846 19.0258 14.3196 19.0258H15.7618C16.0123 19.0258 16.2316 19.195 16.2968 19.4369L20.9194 36.7204C21.2577 37.9869 22.4098 38.8715 23.7207 38.8715H39.2359C39.7708 38.8715 40.2037 38.4387 40.2037 37.9037C40.2037 37.3688 39.7709 36.9359 39.2359 36.9359H23.7207C23.285 36.9359 22.9013 36.641 22.7888 36.2214L22.436 34.902H25.6393H34.7711H37.0035C38.7558 34.902 40.2963 33.7187 40.75 32.0251L42.9068 23.9131C43.0882 23.2307 42.9446 22.519 42.5155 21.9595ZM40.9806 23.139C41.0165 23.1853 41.0713 23.2827 41.0354 23.4159L40.076 27.0235H36.6766L37.2158 23.0152H40.7292C40.8653 23.0152 40.9447 23.0927 40.9806 23.139ZM34.7247 27.0235H31.1683V23.0152H35.2645L34.7247 27.0235ZM29.2327 23.0152V27.0235H25.6797L25.1365 23.0152H29.2327ZM23.1831 23.0152L23.7262 27.0235H20.3336L19.2597 23.0152H23.1831ZM23.9883 28.9591L24.5313 32.9664H21.9259L20.8523 28.9591H23.9883ZM25.9421 28.9591H29.2327V32.9664H26.4852L25.9421 28.9591ZM31.1683 32.9664V28.9591H34.464L33.9243 32.9664H31.1683ZM37.0035 32.9664H35.877L36.4161 28.9591H39.5613L38.8786 31.526C38.6518 32.3748 37.8806 32.9664 37.0035 32.9664ZM16.3912 6.54583C16.3912 6.04469 15.9857 5.63916 15.4845 5.63916H5.52859C5.02745 5.63916 4.62192 6.04468 4.62192 6.54583C4.62192 7.04698 5.02744 7.45249 5.52859 7.45249H15.4845C15.9857 7.45249 16.3912 7.04698 16.3912 6.54583ZM43.7327 6.54571C43.7327 7.08022 43.2994 7.51352 42.7649 7.51352C42.2304 7.51352 41.7971 7.08022 41.7971 6.54571C41.7971 6.01121 42.2304 5.57791 42.7649 5.57791C43.2994 5.57791 43.7327 6.01122 43.7327 6.54571ZM46.7576 5.57791C46.2231 5.57791 45.7898 6.01122 45.7898 6.54572C45.7898 7.08023 46.2231 7.51353 46.7576 7.51353C47.2921 7.51353 47.7254 7.08023 47.7254 6.54572C47.7254 6.01122 47.2921 5.57791 46.7576 5.57791ZM50.7503 5.57791C50.2158 5.57791 49.7825 6.01122 49.7825 6.54572C49.7825 7.08023 50.2158 7.51353 50.7503 7.51353C51.2848 7.51353 51.7181 7.08023 51.7181 6.54572C51.7181 6.01122 51.2848 5.57791 50.7503 5.57791ZM59.2914 47.8691L56.3232 45.3667C56.3252 45.307 56.3344 45.2484 56.3344 45.1886V7.3792C56.3344 4.47291 53.9625 2.10107 51.0563 2.10107H5.27813C2.37189 2.10107 0 4.47292 0 7.3792V45.1886C0 48.0948 2.3719 50.4667 5.27813 50.4667H45.9075L45.9085 54.0918C45.9085 54.8725 46.347 55.5624 47.054 55.8932C47.7552 56.2202 48.5699 56.1182 49.1691 55.621L50.9819 54.1145L51.9913 56.2826C52.3031 56.9593 52.8627 57.4735 53.5621 57.7286C53.874 57.8421 54.1991 57.8988 54.5204 57.8988C54.9212 57.8988 55.3219 57.8118 55.6962 57.6379C56.371 57.3241 56.8851 56.7646 57.1403 56.0652C57.3955 55.3639 57.3634 54.6059 57.0477 53.933L56.0402 51.7631L58.3595 51.3491C59.127 51.2111 59.7281 50.6572 59.9304 49.903C60.1326 49.1507 59.8869 48.37 59.2914 47.8691ZM1.93124 7.3792C1.93124 5.54168 3.43122 4.0417 5.27813 4.0417H51.0563C52.9031 4.0417 54.4032 5.54168 54.4032 7.3792V9.04792H1.93124V7.3792ZM45.9047 40.8582L45.9069 48.5261H5.27813C3.43122 48.5261 1.93124 47.026 1.93124 45.1886V10.9885H54.4031V43.7479L49.1729 39.3384C48.5737 38.8319 47.7609 38.7298 47.054 39.0568C46.3451 39.3857 45.9047 40.0756 45.9047 40.8582ZM58.0174 49.4437L54.4619 50.0788C54.1669 50.1318 53.9118 50.3189 53.7738 50.5854C53.6339 50.8519 53.6283 51.1676 53.7549 51.4398L55.2936 54.7515C55.39 54.9557 55.3994 55.1881 55.3219 55.4017C55.2425 55.6153 55.0856 55.7874 54.8815 55.8838C54.6736 55.9783 54.4391 55.9896 54.2275 55.9102C54.012 55.8327 53.8418 55.6758 53.7455 55.4679L52.2068 52.16C52.0801 51.8878 51.8344 51.6893 51.5414 51.6231C51.4715 51.608 51.3996 51.6005 51.3297 51.6005C51.1067 51.6005 50.8874 51.678 50.7116 51.8235L47.8441 54.0918L47.9254 40.8166L58.0439 49.3473L58.0174 49.4437Z"
                                fill="white" />
                        </svg>

                    </div>
                    <a href="/industries/e-commerce-marketing-service/" class="industry-card-arrow"
                        aria-label="Learn more about E-commerce Marketing Services">
                        <svg viewBox="0 0 24 24" class="arrow-svg">
                            <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <h3 class="industry-card-title">E-commerce</h3>

                    <div class="industry-card-hover-details">
                        <p class="industry-card-desc">BrandStory delivers result-driven digital marketing for eCommerce
                            businesses in Dubai, UAE - turning browsers into buyers and clicks into revenue.</p>
                        <div class="industry-card-links">
                            <a href="/industries/e-commerce-seo-agency-in-dubai-uae/">SEO Services</a> |
                            <a href="/industries/e-commerce-ppc-agency-in-dubai-uae/">PPC</a> |
                            <a href="/industries/e-commerce-email-marketing-agency-in-dubai-uae/">Email Marketing</a> |
                            <a href="/industries/e-commerce-branding-agency-in-dubai-uae/">Branding</a> |
                            <a href="/industries/e-commerce-social-media-agency-in-dubai-uae/">Social Media</a> |
                            <a href="/industries/e-commerce-web-design-development-agency-in-dubai-uae/">Web Design</a>
                            |
                            <a href="/industries/e-commerce-performance-marketing-agency-in-dubai-uae/">Perf.
                                Marketing</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3: Healthcare -->
            <div class="col-lg-4 col-md-6">
                <div class="premium-industry-card">
                    <div class="industry-card-icon">
                        <!-- Heartbeat SVG -->
                        <svg width="60" height="44" viewBox="0 0 60 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M58.9734 21.0456H53.8973C56.0076 16.2548 55.7795 12.3764 54.981 9.75285C53.6122 5.07605 48.9924 0 42.1483 0C40.3232 0 38.4981 0.342205 36.616 1.02662C33.365 2.22433 31.1977 3.53612 30.2281 4.22053C29.2586 3.53612 27.1483 2.22433 23.8403 1.02662C21.9582 0.342205 20.076 0 18.308 0C11.4639 0 6.84411 5.07605 5.47529 9.75285C4.67681 12.5475 4.39163 16.7681 7.07224 22.0722H0.912548C0.39924 22.0722 0 22.4715 0 22.9848C0 23.4981 0.39924 23.8973 0.912548 23.8973H8.15589C8.44106 24.4106 8.78327 24.924 9.18251 25.4373C15.1141 33.9924 28.0038 43.289 30.3422 43.8593V43.9164C30.3422 43.9164 30.3992 43.9164 30.4563 43.8593C30.5133 43.8593 30.5703 43.8593 30.6274 43.8593V43.8023C32.6236 42.8327 45 34.8479 51.5019 25.3802C52.1293 24.5247 52.6426 23.6692 53.0989 22.8137H59.0875C59.6008 22.8137 60 22.4145 60 21.9011C60 21.3878 59.4867 21.0456 58.9734 21.0456ZM49.8479 24.4107C43.8023 33.251 32.6806 40.3802 30.2852 41.9202C27.8327 40.3802 16.7681 33.1939 10.6654 24.4107C10.5513 24.2395 10.4373 24.0684 10.3232 23.8973H18.7072C19.0494 23.8973 19.3916 23.7262 19.5627 23.384L23.384 15.8555L29.3726 31.1977C29.4867 31.5399 29.8859 31.7681 30.2281 31.7681C30.2281 31.7681 30.2281 31.7681 30.2852 31.7681C30.6844 31.7681 31.0266 31.4829 31.1407 31.0837L36.3878 13.1179L39.1825 22.1863C39.2966 22.5285 39.5818 22.7567 39.924 22.8137C40.2662 22.8707 40.6084 22.6996 40.8365 22.4145L43.0608 19.1635L44.943 22.3574C45.1141 22.6426 45.3992 22.8137 45.7414 22.8137H50.8745C50.5323 23.384 50.1901 23.8973 49.8479 24.4107ZM51.9011 21.0456H46.3118L43.9734 17.0532C43.8023 16.7681 43.5171 16.597 43.1749 16.597C42.8327 16.597 42.5475 16.711 42.3764 16.9962L40.4373 19.8479L37.3004 9.63878C37.1863 9.23954 36.7871 9.01141 36.3878 8.95437C35.9886 8.95437 35.5894 9.23954 35.4753 9.63878L30.1711 27.9468L24.4106 13.2319C24.2966 12.8897 23.9544 12.6616 23.6122 12.6616C23.2129 12.6616 22.9278 12.8327 22.7567 13.1749L18.251 22.0152H9.18251C6.90114 17.8517 6.27376 13.8593 7.30038 10.2662C8.4981 6.21673 12.4335 1.88213 18.365 1.88213C19.962 1.88213 21.616 2.22433 23.27 2.79468C27.4335 4.3346 29.6578 6.10266 29.7148 6.10266C30.057 6.38783 30.5133 6.38783 30.8555 6.10266C30.8555 6.10266 33.0798 4.3346 37.3004 2.79468C38.9544 2.1673 40.6084 1.88213 42.2053 1.88213C48.0799 1.88213 52.0722 6.21673 53.27 10.2662C54.2395 13.5741 53.7262 17.2243 51.9011 21.0456Z"
                                fill="white" />
                        </svg>

                    </div>
                    <a href="/industries/healthcare-marketing-services/" class="industry-card-arrow"
                        aria-label="Learn more about Healthcare Marketing Services">
                        <svg viewBox="0 0 24 24" class="arrow-svg">
                            <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <h3 class="industry-card-title">Healthcare</h3>

                    <div class="industry-card-hover-details">
                        <p class="industry-card-desc">From hospitals to pharmacies, we deliver compliant and powerful
                            digital marketing solutions that help UAE healthcare brands grow their online presence.</p>
                        <div class="industry-card-links">
                            <a href="/industries/healthcare-seo-agency-in-dubai-uae/">SEO Services</a> |
                            <a href="/industries/healthcare-ppc-agency-in-dubai-uae/">PPC</a> |
                            <a href="/industries/healthcare-content-marketing-agency-in-dubai-uae/">Content
                                Marketing</a> |
                            <a href="/industries/healthcare-branding-agency-in-dubai-uae/">Branding</a> |
                            <a href="/industries/healthcare-social-media-agency-in-dubai-uae/">Social Media</a> |
                            <a href="/industries/healthcare-web-design-development-agency-in-dubai-uae/">Web Design</a>
                            |
                            <a href="/industries/healthcare-performance-marketing-agency-in-dubai-uae/">Perf.
                                Marketing</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4: Real Estate -->
            <div class="col-lg-4 col-md-6">
                <div class="premium-industry-card">
                    <div class="industry-card-icon">
                        <!-- Buildings SVG -->
                        <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M33.7988 13.2663C33.9182 13.3492 34.0583 13.3918 34.1999 13.3918C34.2825 13.3918 34.3657 13.3772 34.4454 13.3475L37.2926 12.286C37.5677 12.1835 37.7501 11.9208 37.7501 11.6272V6.60794C37.7501 6.37146 37.6313 6.15103 37.4339 6.02083C37.2363 5.89075 36.9867 5.86837 36.7698 5.96177L33.9218 7.18368C33.6633 7.29454 33.4958 7.54872 33.4958 7.82997L33.4966 12.6889C33.4966 12.9193 33.6096 13.1349 33.7988 13.2663ZM36.3438 7.6747V11.139L34.9028 11.6763L34.9022 8.29321L36.3438 7.6747ZM37.4565 14.1345C37.2725 14.0027 37.0362 13.9671 36.8211 14.0402L33.9739 15.0057C33.6885 15.1024 33.4966 15.3702 33.4966 15.6716V20.8596C33.4966 21.0797 33.5997 21.287 33.775 21.4199C33.8987 21.5136 34.0481 21.5627 34.1998 21.5627C34.2633 21.5627 34.3271 21.5541 34.3896 21.5366L37.2368 20.7379C37.5403 20.6527 37.7501 20.3761 37.7501 20.0609V14.7061C37.7501 14.4793 37.6407 14.2666 37.4565 14.1345ZM36.3438 19.5279L34.9029 19.932V16.1755L36.3438 15.6868V19.5279ZM37.5046 31.044C37.3488 30.9103 37.1428 30.852 36.9396 30.8829L34.0924 31.3227C33.7497 31.3756 33.4966 31.6707 33.4966 32.0176V37.2056C33.4966 37.4036 33.5803 37.5928 33.7269 37.7259C33.8569 37.844 34.0257 37.9087 34.1998 37.9087C34.222 37.9087 34.2445 37.9077 34.2668 37.9056L37.114 37.6326C37.4747 37.5981 37.7501 37.295 37.7501 36.9327V31.5778C37.7501 31.3726 37.6603 31.1776 37.5046 31.044ZM36.3438 36.2938L34.9029 36.4319V32.6205L36.3438 32.398V36.2939V36.2938ZM37.4804 22.5904C37.3103 22.4571 37.0884 22.4095 36.8784 22.4613L34.0313 23.1638C33.7172 23.2413 33.4966 23.523 33.4966 23.8465V29.0304C33.4966 29.2395 33.5898 29.4381 33.7509 29.5715C33.8781 29.677 34.0371 29.7335 34.1998 29.7335C34.243 29.7335 34.2866 29.7295 34.3297 29.7213L37.1769 29.1855C37.5093 29.1229 37.7501 28.8327 37.7501 28.4946V23.1439C37.7501 22.9277 37.6506 22.7238 37.4804 22.5904ZM36.3438 27.9115L34.9029 28.1826V24.3971L36.3438 24.0416V27.9113V27.9115ZM28.6649 30.5328C28.7921 30.6384 28.9512 30.6949 29.1138 30.6949C29.157 30.6949 29.2004 30.6909 29.2436 30.6827L31.7711 30.2079C32.1035 30.1455 32.3445 29.8551 32.3445 29.5169V24.4748C32.3445 24.2587 32.2451 24.0546 32.0749 23.9213C31.9049 23.788 31.6828 23.7403 31.473 23.7921L28.9455 24.415C28.6314 24.4924 28.4107 24.7741 28.4107 25.0977V29.9917C28.4107 30.2008 28.5039 30.3993 28.6649 30.5328ZM29.817 25.6486L30.9382 25.3722V28.9337L29.817 29.1443V25.6486ZM29.1138 38.3926C29.136 38.3926 29.1585 38.3915 29.1809 38.3894L31.7077 38.1475C32.0684 38.113 32.3438 37.8099 32.3438 37.4476V32.4175C32.3438 32.2124 32.2541 32.0174 32.0984 31.8838C31.9426 31.7503 31.7366 31.6915 31.5335 31.7226L29.0067 32.1123C28.6637 32.1651 28.4107 32.4602 28.4107 32.8072V37.6895C28.4107 37.8875 28.4944 38.0765 28.641 38.2098C28.7709 38.3279 28.9398 38.3926 29.1138 38.3926ZM29.817 33.4101L30.9375 33.2373V36.8084L29.817 36.9158V33.4101ZM28.6889 22.8504C28.8127 22.9442 28.9621 22.9933 29.1138 22.9933C29.1772 22.9933 29.2411 22.9848 29.3034 22.9672L31.8309 22.2591C32.1346 22.1741 32.3445 21.8974 32.3445 21.5822V16.5402C32.3445 16.3135 32.2352 16.1008 32.051 15.9688C31.867 15.8368 31.6306 15.8013 31.4157 15.8742L28.8882 16.7302C28.6028 16.8269 28.4107 17.0947 28.4107 17.3962V22.2903C28.4107 22.5103 28.5137 22.7176 28.6889 22.8505V22.8504ZM29.817 17.9004L30.9382 17.5207V21.049L29.817 21.363V17.9004ZM28.7122 15.1579C28.8318 15.2411 28.9721 15.2839 29.1139 15.2839C29.1962 15.2839 29.2789 15.2695 29.3583 15.2401L31.8858 14.3028C32.1615 14.2005 32.3445 13.9377 32.3445 13.6436L32.3453 8.92509C32.3453 8.68872 32.2266 8.46817 32.0292 8.33798C31.8319 8.2079 31.5825 8.18563 31.3651 8.27868L28.8368 9.36243C28.5784 9.47317 28.4107 9.72735 28.4107 10.0087V14.5808C28.4107 14.8109 28.5233 15.0266 28.7122 15.1579ZM29.817 10.4724L30.9388 9.99149L30.9383 13.1543L29.817 13.5702V10.4724ZM8.13445 27.2584C8.25469 27.3434 8.39684 27.3874 8.54039 27.3874C8.61926 27.3874 8.69859 27.3741 8.77477 27.3471L10.832 26.6196C11.1129 26.5202 11.3007 26.2548 11.3007 25.9569L11.3013 22.1203C11.3013 21.8846 11.1834 21.6647 10.987 21.5345C10.7907 21.404 10.5422 21.3807 10.3253 21.4722L8.26746 22.339C8.00672 22.4488 7.83727 22.704 7.83727 22.9869V26.6843C7.83727 26.9125 7.94801 27.1265 8.13445 27.2584ZM9.24352 23.4536L9.89496 23.1792L9.89461 25.4595L9.24352 25.6897V23.4536ZM12.2943 25.7833C12.4144 25.8682 12.5563 25.912 12.6996 25.912C12.7789 25.912 12.8586 25.8986 12.9354 25.8712L15.3047 25.0279C15.585 24.9282 15.772 24.663 15.772 24.3656V20.2323C15.772 19.9964 15.6538 19.7763 15.4571 19.6461C15.2603 19.5158 15.0115 19.4929 14.7946 19.5849L12.4253 20.5889C12.1652 20.6989 11.9965 20.9539 11.9965 21.2362V25.2089C11.9965 25.4374 12.1076 25.6516 12.2943 25.7833ZM13.4027 21.7018L14.3658 21.2938V23.8694L13.4027 24.2123V21.7018ZM15.513 33.2996C15.3491 33.166 15.1335 33.1134 14.9268 33.1561L12.5583 33.6449C12.2317 33.7122 11.9973 33.9998 11.9973 34.3335V38.5731C11.9973 38.7763 12.0852 38.9696 12.2385 39.1031C12.3674 39.2154 12.5317 39.2762 12.7004 39.2762C12.7323 39.2762 12.7644 39.274 12.7964 39.2695L15.1649 38.9431C15.5128 38.8952 15.772 38.5979 15.772 38.2467V33.8448C15.772 33.6334 15.6769 33.4332 15.513 33.2997V33.2996ZM14.3658 37.6338L13.4036 37.7663V34.9063L14.3658 34.7077V37.6339V37.6338ZM8.63578 39.8423L10.6923 39.5607C11.0405 39.513 11.3 39.2156 11.3 38.8642V34.7648C11.3 34.5535 11.205 34.3534 11.0413 34.22C10.8776 34.0862 10.662 34.0332 10.4555 34.0761L8.39894 34.4984C8.07199 34.5656 7.83727 34.8533 7.83727 35.1872V39.1458C7.83727 39.3488 7.92516 39.5421 8.0782 39.6756C8.20711 39.7879 8.37152 39.8489 8.54039 39.8489C8.57215 39.8489 8.60402 39.8467 8.63578 39.8423ZM9.24352 35.7604L9.89379 35.6269V38.2507L9.24352 38.3397V35.7604ZM8.10668 33.4708C8.2316 33.5689 8.38477 33.6206 8.54039 33.6206C8.59652 33.6206 8.65277 33.6138 8.70832 33.6002L10.7648 33.0944C11.0793 33.0172 11.3 32.7354 11.3 32.4117V28.3124C11.3 28.0885 11.1934 27.8779 11.0129 27.7455C10.8325 27.613 10.5996 27.5742 10.386 27.6416L8.32945 28.2882C8.03648 28.3803 7.83727 28.652 7.83727 28.959V32.9176C7.83727 33.1337 7.93664 33.3377 8.10668 33.471V33.4708ZM9.24352 29.4749L9.89379 29.2704V31.8606L9.24352 32.0205V29.4749ZM15.4845 26.3331C15.3036 26.2006 15.0708 26.1622 14.857 26.2298L12.4886 26.9784C12.1962 27.0708 11.9974 27.3422 11.9974 27.6488V31.8909C11.9974 32.107 12.0968 32.3111 12.267 32.4444C12.3919 32.5424 12.5449 32.594 12.7005 32.594C12.7567 32.594 12.8132 32.5872 12.8688 32.5736L15.2373 31.9902C15.5515 31.9127 15.7721 31.631 15.7721 31.3074V26.9004C15.7721 26.6763 15.6654 26.4656 15.4846 26.3332L15.4845 26.3331ZM14.3658 30.7564L13.4036 30.9935V28.1639L14.3658 27.8597V30.7563V30.7564ZM57.9952 54.491H53.8352V6.41763C53.8352 6.13614 53.6673 5.88173 53.4084 5.7711L40.0407 0.0566895C39.8643 -0.0188965 39.6645 -0.0188965 39.488 0.0566895L26.1202 5.7711C25.8613 5.88161 25.6934 6.13603 25.6934 6.41763V16.3927L19.7627 13.8575C19.5863 13.7819 19.3864 13.7819 19.21 13.8575L5.28984 19.8079C5.03098 19.9184 4.86305 20.1729 4.86305 20.4545V54.491H0.703125C0.314883 54.491 0 54.8059 0 55.1941V58.1251C0 58.5133 0.314883 58.8282 0.703125 58.8282H57.9952C58.3834 58.8282 58.6983 58.5133 58.6983 58.1251V55.1941C58.6983 54.8059 58.3834 54.491 57.9952 54.491ZM52.429 54.491H40.4675V1.76845L52.429 6.88157V54.491ZM39.0612 1.76845V54.491H36.3976V43.2681L36.7688 43.2328C37.1554 43.1961 37.4389 42.8529 37.402 42.4663C37.3654 42.0797 37.0234 41.7962 36.6355 41.833L29.3919 42.5224C29.0053 42.5591 28.7217 42.9023 28.7586 43.2889C28.7932 43.6528 29.0994 43.9255 29.4578 43.9255C29.4799 43.9255 29.5025 43.9244 29.5252 43.9223L29.7632 43.8997V54.4912H27.0996V6.88169L39.0612 1.76845ZM34.9914 43.4019V54.491H31.1695V43.7656L34.9914 43.4019ZM25.6934 54.491H20.1894V15.5693L25.6934 17.922V54.491ZM6.2693 20.9185L18.7832 15.5693V54.491H15.8434V45.4946L16.2146 45.4592C16.6012 45.4226 16.8848 45.0793 16.8479 44.6927C16.8112 44.3061 16.4675 44.0216 16.0814 44.0594L8.83781 44.749C8.45121 44.7856 8.16762 45.1289 8.20453 45.5155C8.2391 45.8793 8.54531 46.152 8.90367 46.152C8.92594 46.152 8.94844 46.151 8.97106 46.1489L9.20906 46.1263V54.4911H6.2693V20.9185ZM14.4371 45.6286V54.491H10.6153V45.9923L14.4371 45.6286ZM57.2919 57.422H1.40625V55.8972H57.292V57.422H57.2919ZM45.745 51.5629V8.27329C45.745 7.88505 46.0598 7.57017 46.4481 7.57017C46.8363 7.57017 47.1512 7.88505 47.1512 8.27329V51.5629C47.1512 51.9512 46.8363 52.2661 46.4481 52.2661C46.0598 52.2661 45.745 51.9512 45.745 51.5629ZM49.087 51.5629V9.70192C49.087 9.31368 49.4019 8.9988 49.7902 8.9988C50.1784 8.9988 50.4933 9.31368 50.4933 9.70192V51.5629C50.4933 51.9512 50.1784 52.2661 49.7902 52.2661C49.4019 52.2661 49.087 51.9512 49.087 51.5629ZM42.4031 51.5629V6.84478C42.4031 6.45653 42.718 6.14165 43.1063 6.14165C43.4945 6.14165 43.8094 6.45653 43.8094 6.84478V51.5629C43.8094 51.9512 43.4945 52.2661 43.1063 52.2661C42.718 52.2661 42.4031 51.9512 42.4031 51.5629Z"
                                fill="white" />
                        </svg>

                    </div>
                    <a href="/industries/real-estate-marketing-services/" class="industry-card-arrow"
                        aria-label="Learn more about Real Estate Marketing Services">
                        <svg viewBox="0 0 24 24" class="arrow-svg">
                            <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <h3 class="industry-card-title">Real Estate</h3>

                    <div class="industry-card-hover-details">
                        <p class="industry-card-desc">From listings to leads, we deliver result-driven digital marketing
                            for real estate agents and companies in Dubai, helping you reach the right audience at the
                            right time.</p>
                        <div class="industry-card-links">
                            <a href="/industries/real-estate-seo-agency-in-dubai-uae/">SEO Services</a> |
                            <a href="/industries/real-estate-ppc-agency-in-dubai-uae/">PPC</a> |
                            <a href="/industries/real-estate-email-marketing-agency-in-dubai-uae/">Email Marketing</a> |
                            <a href="/industries/real-estate-branding-agency-in-dubai-uae/">Branding</a> |
                            <a href="/industries/real-estate-social-media-agency-in-dubai-uae/">Social Media</a> |
                            <a href="/industries/real-estate-web-design-development-agency-in-dubai-uae/">Web Design</a>
                            |
                            <a href="/industries/real-estate-performance-marketing-agency-in-dubai-uae/">Perf.
                                Marketing</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 5: Travel -->
            <div class="col-lg-4 col-md-6">
                <div class="premium-industry-card">
                    <div class="industry-card-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M41.25 12.5H38.75V3.75C38.75 1.6825 37.0675 0 35 0H25C22.9325 0 21.25 1.6825 21.25 3.75V12.5H18.75C15.3038 12.5 12.5 15.3038 12.5 18.75V48.75C12.5 51.3063 14.0462 53.5025 16.25 54.47V56.25C16.25 58.3125 17.9375 60 20 60C22.0625 60 23.75 58.3125 23.75 56.25V55H36.25V56.25C36.25 58.3125 37.9375 60 40 60C42.0625 60 43.75 58.3125 43.75 56.25V54.47C45.9538 53.5025 47.5 51.3063 47.5 48.75V18.75C47.5 15.3038 44.6963 12.5 41.25 12.5ZM23.75 3.75C23.75 3.06125 24.31 2.5 25 2.5H35C35.69 2.5 36.25 3.06125 36.25 3.75V12.5H23.75V3.75ZM21.25 56.25C21.25 56.9375 20.6875 57.5 20 57.5C19.3125 57.5 18.75 56.9375 18.75 56.25V55H21.25V56.25ZM41.25 56.25C41.25 56.9375 40.6875 57.5 40 57.5C39.3125 57.5 38.75 56.9375 38.75 56.25V55H41.25V56.25ZM45 48.75C45 50.8175 43.3175 52.5 41.25 52.5H18.75C16.6825 52.5 15 50.8175 15 48.75V18.75C15 16.6825 16.6825 15 18.75 15H41.25C43.3175 15 45 16.6825 45 18.75V48.75Z"
                                fill="white" />
                            <path
                                d="M22.5 21.25C21.8088 21.25 21.25 21.81 21.25 22.5V45C21.25 45.69 21.8088 46.25 22.5 46.25C23.1912 46.25 23.75 45.69 23.75 45V22.5C23.75 21.81 23.1912 21.25 22.5 21.25Z"
                                fill="white" />
                            <path
                                d="M30 21.25C29.3088 21.25 28.75 21.81 28.75 22.5V45C28.75 45.69 29.3088 46.25 30 46.25C30.6912 46.25 31.25 45.69 31.25 45V22.5C31.25 21.81 30.6912 21.25 30 21.25Z"
                                fill="white" />
                            <path
                                d="M37.5 21.25C36.8088 21.25 36.25 21.81 36.25 22.5V45C36.25 45.69 36.8088 46.25 37.5 46.25C38.1912 46.25 38.75 45.69 38.75 45V22.5C38.75 21.81 38.1912 21.25 37.5 21.25Z"
                                fill="white" />
                        </svg>

                    </div>
                    <a href="/industries/travel-agency-marketing-services/" class="industry-card-arrow"
                        aria-label="Learn more about Travel Agency Marketing Services">
                        <svg viewBox="0 0 24 24" class="arrow-svg">
                            <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <h3 class="industry-card-title">Travel</h3>

                    <div class="industry-card-hover-details">
                        <p class="industry-card-desc">BrandStory empowers travel & tourism agencies in Dubai with
                            data-driven digital marketing that drives traffic, inspires wanderlust, and turns browsers
                            into loyal travelers.</p>
                        <div class="industry-card-links">
                            <a href="/industries/tourism-seo-agency-dubai-uae/">SEO Services</a> |
                            <a href="/industries/tourism-ppc-google-ads-dubai-uae/">PPC</a> |
                            <a href="/industries/tourism-email-marketing-dubai-uae/">Email Marketing</a> |
                            <a href="/industries/tourism-branding-agency-dubai-uae/">Branding</a> |
                            <a href="/industries/tourism-social-media-marketing-dubai-uae/">Social Media</a> |
                            <a href="/industries/tourism-web-design-development-dubai-uae/">Web Design</a> |
                            <a href="/industries/tourism-performance-marketing-dubai-uae/">Perf. Marketing</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 6: B2B Corporate -->
            <div class="col-lg-4 col-md-6">
                <div class="premium-industry-card">
                    <div class="industry-card-icon">
                        <svg width="58" height="47" viewBox="0 0 58 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M26.8383 45.8345C26.8383 46.0521 26.7519 46.2607 26.598 46.4145C26.4442 46.5684 26.2355 46.6548 26.018 46.6548H10.3335C9.28025 46.6535 8.27053 46.2346 7.52579 45.4898C6.78105 44.7451 6.36209 43.7354 6.36082 42.6821V35.3579L5.9959 35.7289C5.84301 35.8826 5.63553 35.9695 5.41879 35.9706C5.20205 35.9718 4.99367 35.8871 4.83916 35.7351C4.68465 35.5831 4.59657 35.3761 4.59418 35.1594C4.59178 34.9426 4.67526 34.7338 4.82637 34.5784L6.59695 32.778C6.6727 32.7011 6.76291 32.6398 6.86239 32.5978C6.96188 32.5558 7.06868 32.5338 7.17668 32.5331H7.18172C7.39815 32.5331 7.60581 32.6187 7.75945 32.7711L9.53684 34.5341C9.61331 34.61 9.6741 34.7002 9.71572 34.7995C9.75734 34.8989 9.77899 35.0055 9.77941 35.1132C9.77984 35.2209 9.75905 35.3277 9.71822 35.4274C9.6774 35.5271 9.61733 35.6177 9.54146 35.6942C9.4656 35.7707 9.37541 35.8315 9.27605 35.8731C9.17669 35.9147 9.0701 35.9363 8.96237 35.9368C8.85465 35.9372 8.7479 35.9164 8.64821 35.8756C8.54852 35.8348 8.45784 35.7747 8.38137 35.6988L8.00109 35.321V42.6817C8.00187 43.2999 8.24781 43.8926 8.68499 44.3298C9.12216 44.767 9.71487 45.0129 10.3331 45.0137H26.018C26.1257 45.0137 26.2324 45.0349 26.332 45.0762C26.4316 45.1175 26.522 45.1779 26.5982 45.2541C26.6744 45.3304 26.7348 45.4208 26.776 45.5204C26.8172 45.62 26.8383 45.7267 26.8383 45.8345ZM32.2909 8.47102H46.1549C46.7731 8.47179 47.3658 8.71774 47.803 9.15491C48.2402 9.59208 48.4861 10.1848 48.4869 10.803V19.9894L48.1746 19.6765C48.0985 19.6003 48.0081 19.5398 47.9086 19.4985C47.8091 19.4572 47.7024 19.4359 47.5947 19.4358C47.487 19.4358 47.3803 19.4569 47.2808 19.4981C47.1812 19.5392 47.0907 19.5996 47.0145 19.6757C46.9383 19.7518 46.8778 19.8422 46.8365 19.9417C46.7952 20.0412 46.7739 20.1479 46.7739 20.2556C46.7738 20.3633 46.7949 20.47 46.8361 20.5696C46.8773 20.6691 46.9376 20.7596 47.0137 20.8358L48.7271 22.5514C48.8033 22.6277 48.8938 22.6883 48.9934 22.7296C49.093 22.7709 49.1998 22.7921 49.3076 22.7922H49.3226C49.4328 22.7901 49.5416 22.7658 49.6422 22.7208C49.7429 22.6758 49.8335 22.6109 49.9085 22.5301L51.6195 20.6878C51.6936 20.609 51.7514 20.5164 51.7895 20.4151C51.8277 20.3139 51.8455 20.2062 51.8418 20.098C51.8382 19.9899 51.8131 19.8836 51.7682 19.7852C51.7233 19.6868 51.6594 19.5982 51.5801 19.5246C51.5009 19.451 51.4078 19.3938 51.3064 19.3563C51.2049 19.3188 51.097 19.3017 50.9889 19.3061C50.8808 19.3105 50.7747 19.3361 50.6766 19.3817C50.5785 19.4272 50.4903 19.4917 50.4172 19.5715L50.1282 19.8827V10.8033C50.127 9.75006 49.708 8.74034 48.9633 7.99559C48.2185 7.25085 47.2088 6.8319 46.1556 6.83063H32.2909C32.0733 6.83063 31.8647 6.91705 31.7108 7.07089C31.557 7.22473 31.4706 7.43338 31.4706 7.65094C31.4706 7.8685 31.557 8.07715 31.7108 8.23099C31.8647 8.38482 32.0733 8.47125 32.2909 8.47125V8.47102ZM5.56641 5.25164H7.12172C7.33928 5.25164 7.54793 5.16522 7.70177 5.01138C7.85561 4.85754 7.94203 4.64889 7.94203 4.43133C7.94203 4.21377 7.85561 4.00512 7.70177 3.85128C7.54793 3.69744 7.33928 3.61102 7.12172 3.61102H5.56641C5.34885 3.61102 5.1402 3.69744 4.98636 3.85128C4.83252 4.00512 4.74609 4.21377 4.74609 4.43133C4.74609 4.64889 4.83252 4.85754 4.98636 5.01138C5.1402 5.16522 5.34885 5.25164 5.56641 5.25164ZM10.1775 5.25164H11.7328C11.9504 5.25164 12.159 5.16522 12.3129 5.01138C12.4667 4.85754 12.5531 4.64889 12.5531 4.43133C12.5531 4.21377 12.4667 4.00512 12.3129 3.85128C12.159 3.69744 11.9504 3.61102 11.7328 3.61102H10.1774C9.95982 3.61102 9.75117 3.69744 9.59733 3.85128C9.4435 4.00512 9.35707 4.21377 9.35707 4.43133C9.35707 4.64889 9.4435 4.85754 9.59733 5.01138C9.75117 5.16522 9.95994 5.25164 10.1775 5.25164ZM14.7885 5.25164H16.344C16.5616 5.25164 16.7702 5.16522 16.9241 5.01138C17.0779 4.85754 17.1643 4.64889 17.1643 4.43133C17.1643 4.21377 17.0779 4.00512 16.9241 3.85128C16.7702 3.69744 16.5616 3.61102 16.344 3.61102H14.7884C14.5708 3.61102 14.3621 3.69744 14.2083 3.85128C14.0545 4.00512 13.968 4.21377 13.968 4.43133C13.968 4.64889 14.0545 4.85754 14.2083 5.01138C14.3621 5.16522 14.5708 5.25164 14.7884 5.25164H14.7885ZM5.56641 9.14039H7.12172C7.33928 9.14039 7.54793 9.05396 7.70177 8.90013C7.85561 8.74629 7.94203 8.53764 7.94203 8.32008C7.94203 8.10252 7.85561 7.89387 7.70177 7.74003C7.54793 7.58619 7.33928 7.49977 7.12172 7.49977H5.56641C5.34885 7.49977 5.1402 7.58619 4.98636 7.74003C4.83252 7.89387 4.74609 8.10252 4.74609 8.32008C4.74609 8.53764 4.83252 8.74629 4.98636 8.90013C5.1402 9.05396 5.34885 9.14039 5.56641 9.14039ZM10.1775 9.14039H11.7328C11.9504 9.14039 12.159 9.05396 12.3129 8.90013C12.4667 8.74629 12.5531 8.53764 12.5531 8.32008C12.5531 8.10252 12.4667 7.89387 12.3129 7.74003C12.159 7.58619 11.9504 7.49977 11.7328 7.49977H10.1774C9.95982 7.49977 9.75117 7.58619 9.59733 7.74003C9.4435 7.89387 9.35707 8.10252 9.35707 8.32008C9.35707 8.53764 9.4435 8.74629 9.59733 8.90013C9.75117 9.05396 9.95994 9.14039 10.1775 9.14039ZM14.7885 9.14039H16.344C16.5616 9.14039 16.7702 9.05396 16.9241 8.90013C17.0779 8.74629 17.1643 8.53764 17.1643 8.32008C17.1643 8.10252 17.0779 7.89387 16.9241 7.74003C16.7702 7.58619 16.5616 7.49977 16.344 7.49977H14.7884C14.5708 7.49977 14.3621 7.58619 14.2083 7.74003C14.0545 7.89387 13.968 8.10252 13.968 8.32008C13.968 8.53764 14.0545 8.74629 14.2083 8.90013C14.3621 9.05396 14.5708 9.14039 14.7884 9.14039H14.7885ZM5.56641 13.0294H7.12172C7.33928 13.0294 7.54793 12.943 7.70177 12.7891C7.85561 12.6353 7.94203 12.4266 7.94203 12.2091C7.94203 11.9915 7.85561 11.7829 7.70177 11.629C7.54793 11.4752 7.33928 11.3888 7.12172 11.3888H5.56641C5.34885 11.3888 5.1402 11.4752 4.98636 11.629C4.83252 11.7829 4.74609 11.9915 4.74609 12.2091C4.74609 12.4266 4.83252 12.6353 4.98636 12.7891C5.1402 12.943 5.34885 13.0294 5.56641 13.0294ZM10.1775 13.0294H11.7328C11.9504 13.0294 12.159 12.943 12.3129 12.7891C12.4667 12.6353 12.5531 12.4266 12.5531 12.2091C12.5531 11.9915 12.4667 11.7829 12.3129 11.629C12.159 11.4752 11.9504 11.3888 11.7328 11.3888H10.1774C9.95982 11.3888 9.75117 11.4752 9.59733 11.629C9.4435 11.7829 9.35707 11.9915 9.35707 12.2091C9.35707 12.4266 9.4435 12.6353 9.59733 12.7891C9.75117 12.943 9.95994 13.0294 10.1775 13.0294ZM14.7885 13.0294H16.344C16.5616 13.0294 16.7702 12.943 16.9241 12.7891C17.0779 12.6353 17.1643 12.4266 17.1643 12.2091C17.1643 11.9915 17.0779 11.7829 16.9241 11.629C16.7702 11.4752 16.5616 11.3888 16.344 11.3888H14.7884C14.5708 11.3888 14.3621 11.4752 14.2083 11.629C14.0545 11.7829 13.968 11.9915 13.968 12.2091C13.968 12.4266 14.0545 12.6353 14.2083 12.7891C14.3621 12.943 14.5708 13.0294 14.7884 13.0294H14.7885ZM7.94203 16.0979C7.94203 15.8804 7.85561 15.6717 7.70177 15.5179C7.54793 15.364 7.33928 15.2776 7.12172 15.2776H5.56641C5.34885 15.2776 5.1402 15.364 4.98636 15.5179C4.83252 15.6717 4.74609 15.8804 4.74609 16.0979C4.74609 16.3155 4.83252 16.5241 4.98636 16.678C5.1402 16.8318 5.34885 16.9182 5.56641 16.9182H7.12172C7.33928 16.9182 7.54793 16.8318 7.70177 16.678C7.85561 16.5241 7.94203 16.3155 7.94203 16.0979ZM10.1774 16.9182H11.7328C11.9504 16.9182 12.159 16.8318 12.3129 16.678C12.4667 16.5241 12.5531 16.3155 12.5531 16.0979C12.5531 15.8804 12.4667 15.6717 12.3129 15.5179C12.159 15.364 11.9504 15.2776 11.7328 15.2776H10.1774C9.95982 15.2776 9.75117 15.364 9.59733 15.5179C9.4435 15.6717 9.35707 15.8804 9.35707 16.0979C9.35707 16.3155 9.4435 16.5241 9.59733 16.678C9.75117 16.8318 9.95982 16.9182 10.1774 16.9182ZM14.7884 16.9182H16.3439C16.5615 16.9182 16.7701 16.8318 16.924 16.678C17.0778 16.5241 17.1642 16.3155 17.1642 16.0979C17.1642 15.8804 17.0778 15.6717 16.924 15.5179C16.7701 15.364 16.5615 15.2776 16.3439 15.2776H14.7884C14.5708 15.2776 14.3621 15.364 14.2083 15.5179C14.0545 15.6717 13.968 15.8804 13.968 16.0979C13.968 16.3155 14.0545 16.5241 14.2083 16.678C14.3621 16.8318 14.5708 16.9182 14.7884 16.9182ZM22.6022 15.557H24.1577C24.3753 15.557 24.5839 15.4706 24.7378 15.3167C24.8916 15.1629 24.978 14.9542 24.978 14.7367C24.978 14.5191 24.8916 14.3105 24.7378 14.1566C24.5839 14.0028 24.3753 13.9164 24.1577 13.9164H22.6022C22.3846 13.9164 22.176 14.0028 22.0221 14.1566C21.8683 14.3105 21.7819 14.5191 21.7819 14.7367C21.7819 14.9542 21.8683 15.1629 22.0221 15.3167C22.176 15.4706 22.3846 15.557 22.6022 15.557ZM22.6022 19.2514H24.1577C24.3753 19.2514 24.5839 19.165 24.7378 19.0112C24.8916 18.8573 24.978 18.6487 24.978 18.4311C24.978 18.2136 24.8916 18.0049 24.7378 17.8511C24.5839 17.6972 24.3753 17.6108 24.1577 17.6108H22.6022C22.3846 17.6108 22.176 17.6972 22.0221 17.8511C21.8683 18.0049 21.7819 18.2136 21.7819 18.4311C21.7819 18.6487 21.8683 18.8573 22.0221 19.0112C22.176 19.165 22.3846 19.2514 22.6022 19.2514ZM24.1577 21.3054H22.6022C22.3846 21.3054 22.176 21.3918 22.0221 21.5457C21.8683 21.6995 21.7819 21.9081 21.7819 22.1257C21.7819 22.3433 21.8683 22.5519 22.0221 22.7057C22.176 22.8596 22.3846 22.946 22.6022 22.946H24.1577C24.3753 22.946 24.5839 22.8596 24.7378 22.7057C24.8916 22.5519 24.978 22.3433 24.978 22.1257C24.978 21.9081 24.8916 21.6995 24.7378 21.5457C24.5839 21.3918 24.3753 21.3054 24.1577 21.3054ZM30.9077 27.4096C30.9077 27.6271 30.8213 27.8358 30.6675 27.9896C30.5136 28.1435 30.305 28.2299 30.0874 28.2299H0.820312C0.602752 28.2299 0.394102 28.1435 0.240264 27.9896C0.0864256 27.8358 0 27.6271 0 27.4096C0 27.192 0.0864256 26.9834 0.240264 26.8295C0.394102 26.6757 0.602752 26.5893 0.820312 26.5893H2.2459V0.820312C2.2459 0.602752 2.33232 0.394103 2.48616 0.240264C2.64 0.0864258 2.84865 0 3.06621 0H18.8438C19.0613 0 19.27 0.0864258 19.4238 0.240264C19.5776 0.394103 19.6641 0.602752 19.6641 0.820312V10.7221H27.8438C28.0613 10.7221 28.27 10.8085 28.4238 10.9623C28.5776 11.1162 28.6641 11.3248 28.6641 11.5424V26.5893H30.0881C30.3056 26.5893 30.5142 26.6757 30.668 26.8295C30.8218 26.9833 30.9083 27.1918 30.9083 27.4093L30.9077 27.4096ZM19.6636 12.3627V26.5893H27.023V12.3627H19.6636ZM3.88652 26.589H7.26234V18.6462C7.26234 18.4286 7.34877 18.22 7.50261 18.0661C7.65645 17.9123 7.8651 17.8259 8.08266 17.8259H13.8281C14.0457 17.8259 14.2543 17.9123 14.4082 18.0661C14.562 18.22 14.6484 18.4286 14.6484 18.6462V26.589H18.0234V1.64062H3.88652V26.589ZM13.0078 19.4665H8.90297V26.589H13.0078V19.4665ZM35.8699 26.8232H37.2146C37.4322 26.8232 37.6409 26.7367 37.7947 26.5829C37.9485 26.4291 38.035 26.2204 38.035 26.0028C38.035 25.7853 37.9485 25.5766 37.7947 25.4228C37.6409 25.269 37.4322 25.1825 37.2146 25.1825H35.8699C35.6524 25.1825 35.4437 25.269 35.2899 25.4228C35.136 25.5766 35.0496 25.7853 35.0496 26.0028C35.0496 26.2204 35.136 26.4291 35.2899 26.5829C35.4437 26.7367 35.6524 26.8232 35.8699 26.8232ZM39.8563 26.8232H41.2013C41.4188 26.8232 41.6275 26.7367 41.7813 26.5829C41.9351 26.4291 42.0216 26.2204 42.0216 26.0028C42.0216 25.7853 41.9351 25.5766 41.7813 25.4228C41.6275 25.269 41.4188 25.1825 41.2013 25.1825H39.8563C39.6387 25.1825 39.4301 25.269 39.2762 25.4228C39.1224 25.5766 39.036 25.7853 39.036 26.0028C39.036 26.2204 39.1224 26.4291 39.2762 26.5829C39.4301 26.7367 39.6387 26.8232 39.8563 26.8232ZM43.8429 26.8232H45.1875C45.4051 26.8232 45.6137 26.7367 45.7675 26.5829C45.9214 26.4291 46.0078 26.2204 46.0078 26.0028C46.0078 25.7853 45.9214 25.5766 45.7675 25.4228C45.6137 25.269 45.4051 25.1825 45.1875 25.1825H43.8429C43.6253 25.1825 43.4167 25.269 43.2628 25.4228C43.109 25.5766 43.0226 25.7853 43.0226 26.0028C43.0226 26.2204 43.109 26.4291 43.2628 26.5829C43.4167 26.7367 43.6253 26.8232 43.8429 26.8232ZM35.8699 30.1853H37.2146C37.4322 30.1853 37.6409 30.0988 37.7947 29.945C37.9485 29.7912 38.035 29.5825 38.035 29.365C38.035 29.1474 37.9485 28.9388 37.7947 28.7849C37.6409 28.6311 37.4322 28.5446 37.2146 28.5446H35.8699C35.6524 28.5446 35.4437 28.6311 35.2899 28.7849C35.136 28.9388 35.0496 29.1474 35.0496 29.365C35.0496 29.5825 35.136 29.7912 35.2899 29.945C35.4437 30.0988 35.6524 30.1853 35.8699 30.1853ZM39.8563 30.1853H41.2013C41.4188 30.1853 41.6275 30.0988 41.7813 29.945C41.9351 29.7912 42.0216 29.5825 42.0216 29.365C42.0216 29.1474 41.9351 28.9388 41.7813 28.7849C41.6275 28.6311 41.4188 28.5446 41.2013 28.5446H39.8563C39.6387 28.5446 39.4301 28.6311 39.2762 28.7849C39.1224 28.9388 39.036 29.1474 39.036 29.365C39.036 29.5825 39.1224 29.7912 39.2762 29.945C39.4301 30.0988 39.6387 30.1853 39.8563 30.1853ZM43.8429 30.1853H45.1875C45.4051 30.1853 45.6137 30.0988 45.7675 29.945C45.9214 29.7912 46.0078 29.5825 46.0078 29.365C46.0078 29.1474 45.9214 28.9388 45.7675 28.7849C45.6137 28.6311 45.4051 28.5446 45.1875 28.5446H43.8429C43.6253 28.5446 43.4167 28.6311 43.2628 28.7849C43.109 28.9388 43.0226 29.1474 43.0226 29.365C43.0226 29.5825 43.109 29.7912 43.2628 29.945C43.4167 30.0988 43.6253 30.1853 43.8429 30.1853ZM35.8699 33.5474H37.2146C37.4322 33.5474 37.6409 33.461 37.7947 33.3071C37.9485 33.1533 38.035 32.9446 38.035 32.7271C38.035 32.5095 37.9485 32.3009 37.7947 32.147C37.6409 31.9932 37.4322 31.9068 37.2146 31.9068H35.8699C35.6524 31.9068 35.4437 31.9932 35.2899 32.147C35.136 32.3009 35.0496 32.5095 35.0496 32.7271C35.0496 32.9446 35.136 33.1533 35.2899 33.3071C35.4437 33.461 35.6524 33.5474 35.8699 33.5474ZM39.8563 33.5474H41.2013C41.4188 33.5474 41.6275 33.461 41.7813 33.3071C41.9351 33.1533 42.0216 32.9446 42.0216 32.7271C42.0216 32.5095 41.9351 32.3009 41.7813 32.147C41.6275 31.9932 41.4188 31.9068 41.2013 31.9068H39.8563C39.6387 31.9068 39.4301 31.9932 39.2762 32.147C39.1224 32.3009 39.036 32.5095 39.036 32.7271C39.036 32.9446 39.1224 33.1533 39.2762 33.3071C39.4301 33.461 39.6387 33.5474 39.8563 33.5474ZM43.8429 33.5474H45.1875C45.4051 33.5474 45.6137 33.461 45.7675 33.3071C45.9214 33.1533 46.0078 32.9446 46.0078 32.7271C46.0078 32.5095 45.9214 32.3009 45.7675 32.147C45.6137 31.9932 45.4051 31.9068 45.1875 31.9068H43.8429C43.6253 31.9068 43.4167 31.9932 43.2628 32.147C43.109 32.3009 43.0226 32.5095 43.0226 32.7271C43.0226 32.9446 43.109 33.1533 43.2628 33.3071C43.4167 33.461 43.6253 33.5474 43.8429 33.5474ZM38.035 36.0892C38.035 35.8716 37.9485 35.663 37.7947 35.5091C37.6409 35.3553 37.4322 35.2689 37.2146 35.2689H35.8699C35.6524 35.2689 35.4437 35.3553 35.2899 35.5091C35.136 35.663 35.0496 35.8716 35.0496 36.0892C35.0496 36.3067 35.136 36.5154 35.2899 36.6692C35.4437 36.8231 35.6524 36.9095 35.8699 36.9095H37.2146C37.4322 36.9095 37.6409 36.8231 37.7947 36.6692C37.9485 36.5154 38.035 36.3067 38.035 36.0892ZM39.8563 36.9095H41.2013C41.4188 36.9095 41.6275 36.8231 41.7813 36.6692C41.9351 36.5154 42.0216 36.3067 42.0216 36.0892C42.0216 35.8716 41.9351 35.663 41.7813 35.5091C41.6275 35.3553 41.4188 35.2689 41.2013 35.2689H39.8563C39.6387 35.2689 39.4301 35.3553 39.2762 35.5091C39.1224 35.663 39.036 35.8716 39.036 36.0892C39.036 36.3067 39.1224 36.5154 39.2762 36.6692C39.4301 36.8231 39.6387 36.9095 39.8563 36.9095ZM43.8429 36.9095H45.1875C45.4051 36.9095 45.6137 36.8231 45.7675 36.6692C45.9214 36.5154 46.0078 36.3067 46.0078 36.0892C46.0078 35.8716 45.9214 35.663 45.7675 35.5091C45.6137 35.3553 45.4051 35.2689 45.1875 35.2689H43.8429C43.6253 35.2689 43.4167 35.3553 43.2628 35.5091C43.109 35.663 43.0226 35.8716 43.0226 36.0892C43.0226 36.3067 43.109 36.5154 43.2628 36.6692C43.4167 36.8231 43.6253 36.9095 43.8429 36.9095ZM50.5984 35.7327H51.9432C52.1608 35.7327 52.3695 35.6463 52.5233 35.4924C52.6771 35.3386 52.7636 35.1299 52.7636 34.9124C52.7636 34.6948 52.6771 34.4862 52.5233 34.3323C52.3695 34.1785 52.1608 34.0921 51.9432 34.0921H50.5984C50.3808 34.0921 50.1722 34.1785 50.0183 34.3323C49.8645 34.4862 49.7781 34.6948 49.7781 34.9124C49.7781 35.1299 49.8645 35.3386 50.0183 35.4924C50.1722 35.6463 50.3808 35.7327 50.5984 35.7327ZM50.5984 38.9268H51.9432C52.1608 38.9268 52.3695 38.8403 52.5233 38.6865C52.6771 38.5327 52.7636 38.324 52.7636 38.1064C52.7636 37.8889 52.6771 37.6802 52.5233 37.5264C52.3695 37.3726 52.1608 37.2861 51.9432 37.2861H50.5984C50.3808 37.2861 50.1722 37.3726 50.0183 37.5264C49.8645 37.6802 49.7781 37.8889 49.7781 38.1064C49.7781 38.324 49.8645 38.5327 50.0183 38.6865C50.1722 38.8403 50.3808 38.9268 50.5984 38.9268ZM51.9432 40.4802H50.5984C50.3808 40.4802 50.1722 40.5666 50.0183 40.7205C49.8645 40.8743 49.7781 41.0829 49.7781 41.3005C49.7781 41.5181 49.8645 41.7267 50.0183 41.8806C50.1722 42.0344 50.3808 42.1208 50.5984 42.1208H51.9432C52.1608 42.1208 52.3695 42.0344 52.5233 41.8806C52.6771 41.7267 52.7636 41.5181 52.7636 41.3005C52.7636 41.0829 52.6771 40.8743 52.5233 40.7205C52.3695 40.5666 52.1608 40.4802 51.9432 40.4802ZM57.8906 45.8686C57.8906 46.0862 57.8042 46.2948 57.6504 46.4486C57.4965 46.6025 57.2879 46.6889 57.0703 46.6889H31.7667C31.5492 46.6889 31.3405 46.6025 31.1867 46.4486C31.0328 46.2948 30.9464 46.0862 30.9464 45.8686C30.9464 45.651 31.0328 45.4424 31.1867 45.2885C31.3405 45.1347 31.5492 45.0483 31.7667 45.0483H32.8882V22.8809C32.8882 22.6633 32.9746 22.4547 33.1285 22.3008C33.2823 22.147 33.491 22.0605 33.7085 22.0605H47.3491C47.5667 22.0605 47.7754 22.147 47.9292 22.3008C48.083 22.4547 48.1695 22.6633 48.1695 22.8809V31.3301H55.1298C55.3474 31.3301 55.556 31.4165 55.7099 31.5703C55.8637 31.7242 55.9501 31.9328 55.9501 32.1504V45.0483H57.0703C57.2879 45.0483 57.4965 45.1347 57.6504 45.2885C57.8042 45.4424 57.8906 45.651 57.8906 45.8686ZM48.1695 32.9711V45.0483H54.3095V32.9711H48.1695ZM34.5288 45.0483H37.2251V38.2923C37.2251 38.0747 37.3115 37.8661 37.4653 37.7123C37.6192 37.5584 37.8278 37.472 38.0454 37.472H43.0123C43.2298 37.472 43.4385 37.5584 43.5923 37.7123C43.7462 37.8661 43.8326 38.0747 43.8326 38.2923V45.0483H46.5288V23.7012H34.5288V45.0483ZM42.192 39.1126H38.8657V45.0483H42.192V39.1126Z"
                                fill="white" />
                        </svg>
                    </div>
                    <a href="/industries/b2b-corporate-marketing-services/" class="industry-card-arrow"
                        aria-label="Learn more about B2B Corporate Marketing Services">
                        <svg viewBox="0 0 24 24" class="arrow-svg">
                            <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <h3 class="industry-card-title">B2B Corporate</h3>

                    <div class="industry-card-hover-details">
                        <p class="industry-card-desc">From strategy to execution, we deliver powerful digital marketing
                            solutions for B2B & corporate businesses in Dubai - building visibility, credibility, and
                            long-term online success.</p>
                        <div class="industry-card-links">
                            <a href="/industries/b2b-seo-agency-in-dubai-uae/">SEO Services</a> |
                            <a href="/industries/b2b-ppc-agency-in-dubai-uae/">PPC</a> |
                            <a href="/email-marketing-company-in-dubai/">Email Marketing</a> |
                            <a href="/industries/b2b-email-marketing-agency-in-dubai-uae/">Branding</a> |
                            <a href="/industries/b2b-social-media-agency-in-dubai-uae/">Social Media</a> |
                            <a href="/industries/b2b-web-design-development-agency-in-dubai-uae/">Web Design</a> |
                            <a href="/industries/b2b-performance-marketing-agency-in-dubai-uae/">Perf. Marketing</a>
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
            We are a leading digital marketing agency, crafting tailored strategies powered by the latest tools and
            cutting-edge technologies. We translate your business goals into measurable growth.
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
                    <img src="<?= base_url('assets/images/tools-tech/meta-ads-manager.svg') ?>"
                        alt="Meta Ads Manager" />
                    <span>Meta Ads Manager</span>
                </div>
                <div class="tool-card" data-tool="google-tag-manager">
                    <img src="<?= base_url('assets/images/tools-tech/google-tag-manager.svg') ?>"
                        alt="google-tag-manager" />
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
                We use Google Search Console to uncover your website’s performance, track keyword rankings, identify
                technical issues, and optimize your site for better visibility in search results.
            </p>
        </div>
    </div>

</section>

  <section class="premium-why-choose-section">
    <div class="container">
        <h2 class="premium-why-choose-title">What Sets Us Apart as a Leading <br>Digital Marketing Company in Dubai</h2>
        
        <div class="premium-why-choose-grid">
            <!-- Card 1 -->
            <div class="premium-why-card">
                <h3 class="why-card-title">Expertise in Dubai’s Digital Scene</h3>
                <p class="why-card-desc">We don't just work in Dubai- we live it. From understanding the city's competitive landscape to knowing its consumers inside out, we craft ROI-driven digital marketing strategies built specifically for Dubai's local businesses, online retailers, and industries like hospitality, real estate, healthcare, and more.</p>
            </div>
            
            <!-- Card 2 -->
            <div class="premium-why-card">
                <h3 class="why-card-title">Expert Team with Zen Precision</h3>
                <p class="why-card-desc">Our top-of-the-line experts ensure relevance, precision, and ROI-driven performance at every stage. Business-specific digital marketing strategies based on the target audience, business objectives, and long-term brand growth.</p>
            </div>
            
            <!-- Card 3 -->
            <div class="premium-why-card">
                <h3 class="why-card-title">Performance Backed by Proven Results</h3>
                <p class="why-card-desc">Successfully executed 200+ digital marketing (SEO, PPC, Email Marketing, Performance Marketing) campaigns across various industries. From boosting lead generation to doubling ROI, each strategy is focused on driving client success.</p>
            </div>
            
            <!-- Card 4 -->
            <div class="premium-why-card">
                <h3 class="why-card-title">Data-Driven Decision Making</h3>
                <p class="why-card-desc">Actionable decisions based on real performance data and results, not assumptions. Every insight fuels improvement, ensuring campaigns stay aligned with evolving market trends and real business needs.</p>
            </div>
            
            <!-- Card 5 -->
            <div class="premium-why-card">
                <h3 class="why-card-title">End-to-End Support</h3>
                <p class="why-card-desc">From strategy mankind to campaign planning and execution, we keep you informed at every stage. Dedicated support and feedback ensure your digital marketing campaigns run smoothly and deliver optimal results.</p>
            </div>
            
            <!-- Card 6 -->
            <div class="premium-why-card">
                <h3 class="why-card-title">In-depth and Transparent Reporting</h3>
                <p class="why-card-desc">In-depth and transparent reports to give you full visibility into campaign effectiveness and ROI. Data-driven recommendations turn those insights into strategic and precise actions that drive consistent growth.</p>
            </div>
        </div>
        
        <!-- Large Office Image Banner -->
        <div class="premium-why-bottom-banner">
            <img class="img-fluid" src="<?= base_url('assets/images/bg-4r.webp') ?>" alt="Our Office Workspace">
        </div>
    </div>
</section>

<section class="premium-badges-section">
    <div class="container">
        <div class="premium-badges-grid">
            <div class="premium-badge-cell">
                <img src="<?= base_url('assets/images/clutch-01.webp') ?>" alt="Clutch Rating Badge">
            </div>
            <div class="premium-badge-cell">
                <img src="<?= base_url('assets/images/truestpilot-01.webp') ?>" alt="Trustpilot Rating Badge">
            </div>
            <div class="premium-badge-cell">
                <img src="<?= base_url('assets/images/sortlist-01.webp') ?>" alt="Sortlist Rating Badge">
            </div>
            <div class="premium-badge-cell">
                <img src="<?= base_url('assets/images/goodfirms-01.webp') ?>" alt="GoodFirms Rating Badge">
            </div>
            <div class="premium-badge-cell">
                <img src="<?= base_url('assets/images/digitalmarketing-01.webp') ?>" alt="Digital Marketing Agencies Rating Badge">
            </div>
            <div class="premium-badge-cell">
                <img src="<?= base_url('assets/images/marketing-agencies-01.webp.webp') ?>" alt="Marketing Agencies Rating Badge">
            </div>
        </div>
    </div>
</section>

<section class="premium-showcase-section">
    <div class="premium-showcase-container container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="premium-showcase-title">Top Branding Agency in Dubai</h2>
                <p class="premium-showcase-subtitle">At BrandStory, we transform businesses into unforgettable brands. Through strategy-led creativity, powerful storytelling, and iconic visual identities, we build brands that lead, convert, and thrive in Dubai's competitive digital ecosystem.</p>
                <div class="premium-showcase-action">
                    <a href="/contact/" class="premium-showcase-btn">
                        <span>Get In Touch</span>
                        <span class="showcase-btn-arrow-circle">
                            <svg viewBox="0 0 24 24" class="showcase-btn-arrow-svg">
                                <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="premium-marquee-wrap">
        <div class="premium-marquee-inner">
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
            <span>BRANDSTORY <span class="purple-text">UAE</span> <span class="bullet-dot">•</span></span>
        </div>
    </div>
</section>

<section class="premium-stats-section">
    <div class="container">
        <div class="premium-stats-row">
            <div class="premium-stat-card">
                <div class="premium-stat-num">1000+</div>
                <div class="premium-stat-label">Campaigns Executed</div>
            </div>
            <div class="premium-stat-card">
                <div class="premium-stat-num">900+</div>
                <div class="premium-stat-label">Satisfied Clients</div>
            </div>
            <div class="premium-stat-card">
                <div class="premium-stat-num">12+</div>
                <div class="premium-stat-label">Years of Expertise</div>
            </div>
            <div class="premium-stat-card">
                <div class="premium-stat-num">100+</div>
                <div class="premium-stat-label">Expert Professionals</div>
            </div>
        </div>
    </div>
</section>

<section class="premium-verticals-section">
    <div class="container">
       
        <!-- Section Header -->
        <h2 class="premium-verticals-title">We Specialize in All Digital Marketing Verticals</h2>

        <!-- 4x2 Grid -->
        <div class="premium-verticals-grid">
            <!-- Google -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">Google</div>
                <div class="vertical-logo-card">
                    <img src="<?= base_url('assets/images/icons/google.svg') ?>" alt="Google Logo"
                        class="vertical-logo">
                </div>
            </div>

            <!-- Bing -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">Bing</div>
                <div class="vertical-logo-card">
                    <img src="<?= base_url('assets/images/icons/being.svg') ?>" alt="Bing Logo" class="vertical-logo">
                </div>
            </div>

            <!-- Play Store -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">Play Store</div>
                <div class="vertical-logo-card">
                    <img src="<?= base_url('assets/images/icons/playstore.svg') ?>" alt="Play Store Logo"
                        class="vertical-logo">
                </div>
            </div>

            <!-- Facebook -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">Facebook</div>
                <div class="vertical-logo-card">
                    <img src="<?= base_url('assets/images/icons/facebook.svg') ?>" alt="Facebook Logo"
                        class="vertical-logo">
                </div>
            </div>

            <!-- Instagram -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">Instagram</div>
                <div class="vertical-logo-card">
                    <img src="<?= base_url('assets/images/icons/instagram.svg') ?>" alt="Instagram Logo"
                        class="vertical-logo">
                </div>
            </div>

            <!-- YouTube -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">YouTube</div>
                <div class="vertical-logo-card">
                    <img src="<?= base_url('assets/images/icons/youtube.svg') ?>" alt="YouTube Logo"
                        class="vertical-logo">
                </div>
            </div>

            <!-- X -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">X</div>
                <div class="vertical-logo-card">
                    <svg viewBox="0 0 24 24" class="vertical-logo" style="height: 60px; fill: #000000;">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg>
                </div>
            </div>

            <!-- LinkedIn -->
            <div class="premium-vertical-cell">

                <div class="vertical-name-main">LinkedIn</div>
                <div class="vertical-logo-card">
                    <img src="<?= base_url('assets/images/icons/linkdin.svg') ?>" alt="LinkedIn Logo"
                        class="vertical-logo">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="premium-social-feed-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: 3x3 Grid of Images -->
            <div class="col-lg-8">
                <div class="premium-social-grid">
                    <!-- Column 1: Upwards (di-01 to di-04) -->
                    <div class="scroll-column column-up">
                        <div class="scroll-track">
                            <img src="<?= base_url('assets/images/di-01.webp') ?>" alt="Showcase 1">
                            <img src="<?= base_url('assets/images/di-02.webp') ?>" alt="Showcase 2">
                            <img src="<?= base_url('assets/images/di-03.webp') ?>" alt="Showcase 3">
                            <img src="<?= base_url('assets/images/di-04.webp') ?>" alt="Showcase 4">
                            <!-- Loop repeats for seamless transition -->
                            <img src="<?= base_url('assets/images/di-01.webp') ?>" alt="Showcase 1">
                            <img src="<?= base_url('assets/images/di-02.webp') ?>" alt="Showcase 2">
                            <img src="<?= base_url('assets/images/di-03.webp') ?>" alt="Showcase 3">
                            <img src="<?= base_url('assets/images/di-04.webp') ?>" alt="Showcase 4">
                        </div>
                    </div>
                    <!-- Column 2: Downwards (di-05 to di-08) -->
                    <div class="scroll-column column-down">
                        <div class="scroll-track">
                            <img src="<?= base_url('assets/images/di-05.webp') ?>" alt="Showcase 5">
                            <img src="<?= base_url('assets/images/di-06.webp') ?>" alt="Showcase 6">
                            <img src="<?= base_url('assets/images/di-07.webp') ?>" alt="Showcase 7">
                            <img src="<?= base_url('assets/images/di-08.webp') ?>" alt="Showcase 8">
                            <!-- Loop repeats for seamless transition -->
                            <img src="<?= base_url('assets/images/di-05.webp') ?>" alt="Showcase 5">
                            <img src="<?= base_url('assets/images/di-06.webp') ?>" alt="Showcase 6">
                            <img src="<?= base_url('assets/images/di-07.webp') ?>" alt="Showcase 7">
                            <img src="<?= base_url('assets/images/di-08.webp') ?>" alt="Showcase 8">
                        </div>
                    </div>
                    <!-- Column 3: Upwards (di-09 to di-12) -->
                    <div class="scroll-column column-up">
                        <div class="scroll-track">
                            <img src="<?= base_url('assets/images/di-09.webp') ?>" alt="Showcase 9">
                            <img src="<?= base_url('assets/images/di-10.webp') ?>" alt="Showcase 10">
                            <img src="<?= base_url('assets/images/di-11.webp') ?>" alt="Showcase 11">
                            <img src="<?= base_url('assets/images/di-12.webp') ?>" alt="Showcase 12">
                            <!-- Loop repeats for seamless transition -->
                            <img src="<?= base_url('assets/images/di-09.webp') ?>" alt="Showcase 9">
                            <img src="<?= base_url('assets/images/di-10.webp') ?>" alt="Showcase 10">
                            <img src="<?= base_url('assets/images/di-11.webp') ?>" alt="Showcase 11">
                            <img src="<?= base_url('assets/images/di-12.webp') ?>" alt="Showcase 12">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Brand Story Join Community -->
            <div class="col-lg-4">
                <div class="premium-social-brand-wrap">
                    <h2 class="premium-social-brand-title">BRANDSTORY<span>®</span></h2>
                    <p class="premium-social-join-text">Social Media Agency in Dubai</p>
                    <div class="premium-social-icons-row">
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/brandstorydubai/" target="_blank"
                            class="premium-social-icon-link" aria-label="Instagram">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                            </svg>
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/brandstoryuae/" target="_blank"
                            class="premium-social-icon-link" aria-label="Facebook">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                            </svg>
                        </a>
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/company/brandstoryae/" target="_blank"
                            class="premium-social-icon-link" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@brandstoryuae7649" target="_blank"
                            class="premium-social-icon-link" aria-label="YouTube">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.163a3.003 3.003 0 0 0-2.11-2.108C19.53 3.5 12 3.5 12 3.5s-7.53 0-9.388.555A3.002 3.002 0 0 0 .502 6.163C0 8.07 0 12 0 12s0 3.93.502 5.837a3.002 3.002 0 0 0 2.11 2.108C4.47 20.5 12 20.5 12 20.5s7.53 0 9.388-.555a3.002 3.002 0 0 0 2.11-2.108C24 15.93 24 12 24 12s0-3.93-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                        <!-- X -->
                        <a href="https://x.com/BrandStory_UAE" target="_blank" class="premium-social-icon-link"
                            aria-label="X">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$reviewSection = [
    'title' =>  "What Our Clients Say About Us",
    'bgClass' => 'bg-black', // optional custom class
];
include __DIR__ . '/component/client_reviews.php';
?>
<section class="dm-grow-section">
    <div class="dm-grow-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row align-items-center align-items-lg-stretch">
            <!-- Left Side: Copy, Button, and Partner Logos -->
            <div
                class="col-lg-6 mb-5 mb-lg-0 text-lg-start text-center d-lg-flex flex-lg-column justify-content-lg-between">
                <div>
                    <h2 class="grow-section-title">Step Into Digital Success with<br>Dubai’s Top Marketing Agency</h2>

                    <p class="grow-section-text">Uplift your digital presence, increase sales, and maximize ROAS with
                        Google-certified digital marketing experts. Get a Free Consultation and a Comprehensive Audit to
                        uncover your growth opportunities.</p>

                    <div class="grow-section-btn-wrap mb-5">
                        <a href="javascript:void(0);" class="grow-pill-btn uniq-contact-lead-btn">
                            <span>Talk to Experts</span>
                            <span class="grow-btn-arrow-circle">
                                <svg viewBox="0 0 24 24" class="grow-btn-arrow-svg">
                                    <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>

                <div
                    class="grow-partners-wrap d-flex align-items-center gap-3 justify-content-lg-start justify-content-center">
                    <div class="partner-badge">
                        <a href="https://www.google.com/partners/agency?id=1975289574" target="_blank"
                            style="display: flex;">
                            <img src="<?= base_url('assets/images/home/partner1.svg') ?>" alt="Google Partner"
                                class="partner-logo">
                        </a>
                    </div>
                    <div class="partner-badge">
                        <img src="<?= base_url('assets/images/home/partner2.svg') ?>" alt="Meta Business Partner"
                            class="partner-logo">
                    </div>
                </div>
            </div>

            <!-- Right Side: White Contact Form Card -->
            <div class="col-lg-6">
                <div class="grow-form-card">
                    <div class="grow-form-main">
                        <?php $textrow = 6 ?>
                        <?php include __DIR__ . '/component/forms/contact-form.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dubai Office Contact Bar -->
<section class="dm-dubai-office-bar">
    <div class="container">
        <div class="office-bar-row">
            <div class="office-bar-item">
                <img src="<?= base_url('assets/images/home/dubai-phone.svg') ?>" alt="Phone" class="bar-icon">
                <a href="tel:+971522831655">+971 52 283 1655</a>
            </div>
            <div class="office-bar-item">
                <img src="<?= base_url('assets/images/home/dubai-mail.svg') ?>" alt="Email" class="bar-icon">
                <a href="mailto:info@brandstory.ae">info@brandstory.ae</a>
            </div>
            <div class="office-bar-item">
                <img src="<?= base_url('assets/images/home/dubai-location.svg') ?>" alt="Location" class="bar-icon">
                <a target="_blank"
                    href="https://www.google.com/search?sca_esv=5aa11a5588fe31d3&kgmid=/g/11jn2396qs&q=Brandstory&shndl=30&shem=lcuae,lste,uaasie&source=sh/x/loc/uni/m1/1&kgs=0f7c634ee2c79aaf">G5,
                    Al Meheri Plaza, opp DBC Building, Al Khabaisi Area, Deira Dubai- 81577, United Arab Emirates</a>
            </div>
        </div>
    </div>
</section>
<?php 
  $category = 'Digital Marketing';
  $padding= 'sp-50';
  include __DIR__ . '/component/blog_carousel.php'; 
?>
<section class="dm-faq-section sp-50 dm-bg">
    <div class="container">
        <h2 class="text-center text-white mb-lg-5 mb-4">Your Questions Answered</h2>
        <div class="dm-faq-main">
            <ul class="nav nav-pills justify-content-md-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-dm-tab" data-bs-toggle="pill" data-bs-target="#pills-dm"
                        type="button" role="tab" aria-controls="pills-dm" aria-selected="true">Digital
                        Marketing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-sm-tab" data-bs-toggle="pill" data-bs-target="#pills-sm"
                        type="button" role="tab" aria-controls="pills-sm" aria-selected="false">SEO, Traffic, Social
                        Media</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-as-tab" data-bs-toggle="pill" data-bs-target="#pills-as"
                        type="button" role="tab" aria-controls="pills-as" aria-selected="false">Agency Support</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Digital Marketing Start -->
                <div class="tab-pane fade show active" id="pills-dm" role="tabpanel" aria-labelledby="pills-dm-tab">
                    <div class="accordion accordion-flush" id="accordionFlushExample1">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingOne1-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne1-1" aria-expanded="false"
                                    aria-controls="flush-collapseOne1-1">
                                    What is Digital Marketing?
                                </button>
                            </h4>
                            <div id="flush-collapseOne1-1" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne1-1" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Digital marketing is the process of marketing
                                        products, services, or businesses online through digital platforms. Digital
                                        marketing has replaced traditional marketing as the main tool for businesses to
                                        reach their target market. The three main types of digital marketing are online
                                        advertising, social media promotion, and content marketing.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Online advertising refers to when a business spends
                                            money to promote its products or services through digital channels like
                                            Google Ads, social media ads, display banners, or video ads on platforms
                                            like YouTube.</li>
                                        <li class="fs-20 text-white">Social media promotion involves sharing updates,
                                            offers, and engaging content on platforms such as Facebook, Instagram,
                                            LinkedIn, or Twitter to build awareness and connect with audiences.</li>
                                        <li class="fs-20 text-white">Content marketing is the creation and distribution
                                            of valuable content, like blogs, articles, videos, or infographics, to
                                            attract, inform, and engage a target audience without direct selling.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingTwo1-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo1-2" aria-expanded="false"
                                    aria-controls="flush-collapseTwo1-2">
                                    What is a Digital Marketing Strategy?
                                </button>
                            </h4>
                            <div id="flush-collapseTwo1-2" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo1-2" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">A digital marketing strategy is a customized
                                        solution to meet your business's unique needs and goals. It helps brands achieve
                                        long-term results through data-driven decisions and proven approaches. Digital
                                        marketing strategies span multiple channels like SEO, social media, email, paid
                                        ads, and content marketing.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Identify the digital marketing trends and industry
                                            trends in various digital marketing channels.</li>
                                        <li class="fs-20 text-white">Build a unique strategy to make your brand unique
                                            based on the above research.</li>
                                        <li class="fs-20 text-white">Convince customers with a comprehensive digital
                                            strategy that you're offering your best product than your competitors.</li>
                                        <li class="fs-20 text-white">Digital marketing experts help brands to appear to
                                            the right audience through different digital marketing channels.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingThree1-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree1-3" aria-expanded="false"
                                    aria-controls="flush-collapseThree1-3">
                                    How can digital marketing help my business grow online?
                                </button>
                            </h4>
                            <div id="flush-collapseThree1-3" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree1-3" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Digital marketing is a process for promoting your
                                        business, products, or services online. It can increase brand awareness and
                                        enhance your reputation to attract new customers. Digital marketing has the
                                        potential to reach millions of people who are searching for information about
                                        what you have to offer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfour1-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefour1-4" aria-expanded="false"
                                    aria-controls="flush-collapsefour1-4">
                                    How has digital marketing evolved in recent years (e.g., since 2022)?
                                </button>
                            </h4>
                            <div id="flush-collapsefour1-4" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfour1-4" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Since 2022, digital marketing has transformed with
                                        rapid advancements in tech and user expectations. In 2025, AI-driven
                                        personalization, voice search, and conversational marketing are key to improving
                                        customer journeys.</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Chatbots and virtual assistants offer instant, 24/7
                                            support, creating seamless interactions and faster conversions.</li>
                                        <li class="fs-20 text-white">Meanwhile, social media has become central to brand
                                            discovery, with short-form videos, influencer marketing, and in-app shopping
                                            dominating the landscape.</li>
                                        <li class="fs-20 text-white">AR and VR are also enhancing digital experiences,
                                            making marketing more immersive and engaging than ever before.</li>
                                        <li class="fs-20 text-white">Brands are now leveraging a mix of automation,
                                            real-time analytics, and immersive tech to create smarter, more meaningful
                                            connections with their audiences.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfive1-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefive1-5" aria-expanded="false"
                                    aria-controls="flush-collapsefive1-5">
                                    What type of companies need digital marketing?
                                </button>
                            </h4>
                            <div id="flush-collapsefive1-5" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfive1-5" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Digital marketing can benefit any company seeking
                                        better visibility and reach potential customers online. For example, e-commerce
                                        websites can attract more shoppers through targeted ads, SEO, and social media.
                                    </p>
                                    <p class="fs-20 text-white mb-2">It’s also highly effective for locally based
                                        businesses in Dubai, as strategies like local SEO and Google My Business
                                        optimization help them appear at the top of local search results.</p>
                                    <p class="fs-20 text-white mb-0">From startups and small businesses to large
                                        enterprises, companies in industries like retail, healthcare, real estate,
                                        education, hospitality, and professional services can use digital marketing to
                                        boost awareness and drive leads.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingsix1-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsesix1-6" aria-expanded="false"
                                    aria-controls="flush-collapsesix1-6">
                                    Is digital marketing effective for businesses in Dubai?
                                </button>
                            </h4>
                            <div id="flush-collapsesix1-6" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingsix1-6" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Dubai is one of the best places to implement
                                        digital marketing strategies. The emirate of Dubai has the highest internet
                                        penetration in the UAE, and business owners can reach millions of people looking
                                        for information about their services and products.</p>
                                    <p class="fs-20 text-white mb-0">With a tech-savvy population, a booming e-commerce
                                        scene, and high mobile usage, digital marketing helps brands in Dubai build
                                        strong online visibility, drive targeted traffic, and stay competitive in a
                                        fast-paced market.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingseven1-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseseven1-7" aria-expanded="false"
                                    aria-controls="flush-collapseseven1-7">
                                    How long does it take to see results from digital marketing?
                                </button>
                            </h4>
                            <div id="flush-collapseseven1-7" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingseven1-7" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">The timeline depends on your business goals,
                                        industry, and digital marketing channels used.</p>
                                    <p class="fs-20 text-white mb-2">Paid ads can bring promising results within days,
                                        while SEO and content marketing usually take 3 to 6 months to gain traction.
                                        Social media growth and brand awareness build gradually but steadily.</p>
                                    <p class="fs-20 text-white mb-0">At Brandstory, we set realistic timelines and
                                        provide consistent progress updates, with a strong focus on both quick wins and
                                        sustainable growth.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingseven1-8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseseven1-8" aria-expanded="false"
                                    aria-controls="flush-collapseseven1-8">
                                    Do you provide brand strategy consulting?
                                </button>
                            </h4>
                            <div id="flush-collapseseven1-8" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingseven1-8" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Yes, we offer comprehensive brand strategy
                                        consulting to help businesses define their unique positioning, create a
                                        consistent brand voice, and develop impactful go-to-market strategies that drive
                                        long-term growth.</p>
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne2-1" aria-expanded="false"
                                    aria-controls="flush-collapseOne2-1">
                                    How can I gain more website traffic?
                                </button>
                            </h4>
                            <div id="flush-collapseOne2-1" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne2-1" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">There are a few things that you can do to increase
                                        your website's traffic. The first is to create a great website. The second is to
                                        promote your website through Search Engine Optimization, Pay-Per-Click Ads, and
                                        social media platforms. And the third is to get your website ranked high in
                                        search engine results pages (SERPs).</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingTwo2-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo2-2" aria-expanded="false"
                                    aria-controls="flush-collapseTwo2-2">
                                    Which is better: paid traffic or organic traffic?
                                </button>
                            </h4>
                            <div id="flush-collapseTwo2-2" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo2-2" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">There is no definitive answer to this question, as
                                        the best way to generate traffic for your website or business depends on the
                                        goals that you have for your site and the traffic sources that you choose.</p>
                                    <p class="fs-20 text-white mb-0">Paid traffic delivers quick results and allows
                                        precise audience targeting, often leading to high-quality customer interactions.
                                        It’s ideal for time-sensitive campaigns or launching new products.</p>
                                    <p class="fs-20 text-white mb-0">Organic traffic, on the other hand, is earned over
                                        time through SEO, content marketing, and other inbound strategies. It comes from
                                        users actively searching for products or services, making them more likely to
                                        engage with your website and convert.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingThree2-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree2-3" aria-expanded="false"
                                    aria-controls="flush-collapseThree2-3">
                                    Why are keywords important?
                                </button>
                            </h4>
                            <div id="flush-collapseThree2-3" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree2-3" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Keyword research is essential for any business. By
                                        understanding the benefits and importance of keywords, businesses can create
                                        effective ad campaigns that target their audience and achieve the desired
                                        results. SEO is another important aspect of keyword research. By understanding
                                        what content ranks highest for those keywords, businesses can optimize their
                                        website to rank higher in search engine results pages (SERPs) and increase web
                                        traffic.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfour2-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefour2-4" aria-expanded="false"
                                    aria-controls="flush-collapsefour2-4">
                                    How long do I need to invest in SEO?
                                </button>
                            </h4>
                            <div id="flush-collapsefour2-4" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfour2-4" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">The question of how long you should wait to invest
                                        in SEO can be a complicated one. There are many factors to consider, such as
                                        your current site's traffic and Load times, your budget, and your desired
                                        results or KPIs. In the end, it is important to make sure that you have a clear
                                        understanding of what you want before investing time and money into SEO.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfive2-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefive2-5" aria-expanded="false"
                                    aria-controls="flush-collapsefive2-5">
                                    What is social media marketing, and how does it benefit my business?
                                </button>
                            </h4>
                            <div id="flush-collapsefive2-5" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfive2-5" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">Social media marketing is the use of social
                                        platforms like Facebook, Instagram, Twitter, LinkedIn, and TikTok to promote a
                                        business, engage with the audience, and increase brand awareness. Social media
                                        marketing includes creating and sharing content, running ads, and interacting
                                        with followers to build a community.</p>
                                    <p class="fs-20 text-white mb-0">It can benefit businesses by:</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Better Brand Visibility: Social media platforms
                                            help you reach a broad audience and improve brand visibility.</li>
                                        <li class="fs-20 text-white">Customer Engagement: It provides a direct channel
                                            to interact with customers, build sustainable relationships, and address
                                            concerns in real-time.</li>
                                        <li class="fs-20 text-white">Driving Sales: Social media ads and organic posts
                                            can drive traffic to your business, leading to higher conversions and sales.
                                        </li>
                                    </ul>
                                    <p class="mb-0 text-white fs-20">Targeted Advertising: Social media allows for
                                        targeted advertisements to specific demographics and interests, improving the
                                        effectiveness of your campaigns.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingsix2-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsesix2-6" aria-expanded="false"
                                    aria-controls="flush-collapsesix2-6">
                                    Which social media platforms are best for businesses in Dubai?
                                </button>
                            </h4>
                            <div id="flush-collapsesix2-6" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingsix2-6" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">The Most Suitable social media platforms for
                                        businesses in Dubai are:</p>
                                    <ul class="mb-0">
                                        <li class="fs-20 text-white">Instagram – Highly popular for lifestyle, fashion,
                                            retail, hospitality, and real estate brands due to its visual appeal and
                                            strong engagement.</li>
                                        <li class="fs-20 text-white">LinkedIn – Ideal for B2B companies, professional
                                            services, and corporate branding with a strong business-focused audience.
                                        </li>
                                        <li class="fs-20 text-white">Facebook – Widely used across age groups in the
                                            UAE; great for community building, ads, and event promotions.</li>
                                        <li class="fs-20 text-white">TikTok – Rapidly growing in the region; perfect for
                                            brands targeting a younger audience with creative, short-form video content.
                                        </li>
                                        <li class="fs-20 text-white">YouTube – A powerful platform for video marketing,
                                            tutorials, product demos, and storytelling.</li>
                                        <li class="fs-20 text-white">Twitter (X) – Useful for news, customer service,
                                            and brand communication in real-time.</li>
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne3-1" aria-expanded="false"
                                    aria-controls="flush-collapseOne3-1">
                                    Can I get a guaranteed improvement in website traffic?
                                </button>
                            </h4>
                            <div id="flush-collapseOne3-1" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne3-1" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">We utilize a strategic and data-driven approach to
                                        digital marketing to guarantee that you will see a significant increase in
                                        website traffic. At Brandstory, we analyze your industry, audience behavior, and
                                        competition. We focus on SEO, paid ads, content, and social media channels
                                        proven to boost visibility and attract qualified visitors.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingTwo3-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo3-2" aria-expanded="false"
                                    aria-controls="flush-collapseTwo3-2">
                                    How can your digital marketing company help grow my business?
                                </button>
                            </h4>
                            <div id="flush-collapseTwo3-2" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo3-2" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-2">At Brandstory, we help your business grow by
                                        creating data-backed digital strategies that align with your KPIs and goals.</p>
                                    <p class="fs-20 text-white mb-2">From SEO and social media to performance marketing
                                        and content creation, we use the right mix of channels to boost visibility,
                                        drive quality leads, and improve conversions.</p>
                                    <p class="fs-20 text-white mb-0">We focus on data-driven decisions, creative
                                        execution, and constant optimization, ensuring your brand stands out in the
                                        competitive Dubai market and achieves long-term success.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingThree3-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree3-3" aria-expanded="false"
                                    aria-controls="flush-collapseThree3-3">
                                    How does your content marketing team work?
                                </button>
                            </h4>
                            <div id="flush-collapseThree3-3" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree3-3" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Our content marketing team starts by understanding
                                        your brand voice, audience, and business KPIs.</p>
                                    <p class="fs-20 text-white mb-0">We create a tailored content strategy that includes
                                        blogs, social media posts, videos, infographics, and more, designed to engage,
                                        inform, and convert your target audience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfour3-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefour3-4" aria-expanded="false"
                                    aria-controls="flush-collapsefour3-4">
                                    What key performance metrics do you measure?
                                </button>
                            </h4>
                            <div id="flush-collapsefour3-4" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfour3-4" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Here are some key performance metrics we measure
                                        for digital marketing campaigns:</p>
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefive3-5" aria-expanded="false"
                                    aria-controls="flush-collapsefive3-5">
                                    How much do digital marketing services cost per month?
                                </button>
                            </h4>
                            <div id="flush-collapsefive3-5" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfive3-5" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">The cost of hiring Brandstory as your digital
                                        marketing partner agency will depend on several factors, including the size of
                                        your business, the services you are looking for. If your company is starting
                                        from scratch with no online presence at all, then it will likely be more
                                        expensive to hire an agency than if you already have a website.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingfive3-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefive3-6" aria-expanded="false"
                                    aria-controls="flush-collapsefive3-6">
                                    What services will I get from your digital marketing agency?

                                </button>
                            </h4>
                            <div id="flush-collapsefive3-6" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfive3-6" data-bs-parent="#accordionFlushExample3">
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
<!-- Blog Carousel Section -->



<section class="container">
    <div class="new-cta-footer">
        <div class="new-cta-footer-container">
            <h2 class="new-cta-footer-title">
                Grow Traffic. Build Engagement. Amplify Results. With BrandStory
            </h2>
            <p class="new-cta-footer-text">
                Digital marketing today is no longer just a support tool – it is the backbone of your business growth.
                At BrandStory, we believe every business should have a digital transformation strategy that is bold,
                unique, innovative, and performance-driven. As Dubai’s premier marketing partner for 100+ local and
                global brands, we craft campaigns that go beyond visibility and drive real business value.
            </p>

            <!-- Hidden Content -->
            <div class="content-read-more">
                <h3 class="mt-3 text-white">“Great marketing isn’t about noise, it’s about impact”</h3>
                <p class="new-cta-footer-text">
                    Inspired by the unity of the Arab Emirates and the heights of the Burj Khalifa, we design digital
                    transformation that elevates, inspires, and etches brands into the Skyline itself.
                </p>
                <h3 class="mt-4 text-white">We are a 360-Degree Digital Marketing Agency</h3>
                <p class="new-cta-footer-text">
                    Your audience is constantly evolving with time, shifting across social media, search engines, and
                    digital platforms. We craft targeted digital marketing campaigns and strategies that engage users,
                    drive conversions, and keep your brand visible, relevant, and influential at every stage of their
                    online journey.
                    <h4 class="mt-4 text-white" style="font-size: 1.3rem;">SEO Services in Dubai</h4>
                    <p class="new-cta-footer-text">We help businesses across UAE improve their online visibility with comprehensive 
                        SEO services, including technical SEO, on-page optimization, content strategy, keyword research, link building, 
                        local SEO, and performance tracking. Our data-driven approach is designed to improve search rankings, attract 
                        qualified organic traffic, and build long-term search authority.</p>
                <h4 class="mt-4 text-white" style="font-size: 1.3rem;">PPC Services in Dubai</h4>
                <p class="new-cta-footer-text">We create and manage targeted PPC campaigns across platforms such as Google Ads, Bing Ads, 
                    and social advertising channels. From keyword research and ad creation to audience targeting, bid management, landing page
                     optimization, and conversion tracking, we focus on generating qualified leads, increasing conversions, and maximizing your
                      advertising ROI.</p>
                <h4 class="mt-4 text-white" style="font-size: 1.3rem;">Performance Marketing Services in Dubai</h4>
                <p class="new-cta-footer-text">We build full-funnel performance marketing campaigns that connect strategy, media, creative, and 
                    data. From audience research and campaign planning to paid acquisition, conversion optimization, retargeting, and performance 
                    analysis, we continuously optimize campaigns to drive measurable growth, stronger customer acquisition, and improved ROI.</p>
                <h4 class="mt-4 text-white" style="font-size: 1.3rem;">Social Media Marketing Services in Dubai</h4>
                <p class="new-cta-footer-text">We manage social media marketing from strategy and content planning to creative development, publishing,
                     community engagement, paid social campaigns, and performance reporting. Across platforms such as Facebook, Instagram, LinkedIn, TikTok,
                      and X, we help brands build awareness, engage their audience, and strengthen their digital presence.</p>
                <h4 class="mt-4 text-white" style="font-size: 1.3rem;">Email Marketing Services in Dubai</h4>
                <p class="new-cta-footer-text">We deliver end-to-end email marketing campaigns that help businesses connect with prospects and customers throughout
                     their journey. From audience segmentation and campaign strategy to email design, personalized messaging, automation, list management, and 
                     performance analysis, we create campaigns that nurture leads, drive engagement, and encourage repeat conversions.</p>
                <h4 class="mt-4 text-white" style="font-size: 1.3rem;">Branding Services in Dubai</h4>
                <p class="new-cta-footer-text">We develop complete brand identities that help businesses stand out in competitive markets. Our branding services 
                    cover brand strategy, positioning, naming, visual identity, logo design, brand guidelines, creative direction, and storytelling, creating a 
                    consistent brand experience that builds recognition, credibility, trust, and long-term loyalty.</p>

                    <p class="new-cta-footer-text">We don’t just rely on creativity, nor do we depend on numbers alone. By blending data-driven
                    insights with results-focused strategies, we create campaigns that engage and convert. For us,
                    success is about conversions, brand credibility, and long-term customer loyalty. At BrandStory, we
                    don’t just market your business – we help build its digital legacy.
                </p>
            </div>

            <!-- Read More Link -->
            <div class="mb-3">
                <a href="javascript:void(0)" class="grow-read-more-link" id="readMoreBtn">
                    <span>Read more</span>
                </a>
            </div>

            <!-- Primary Get In Touch Button -->
            <div class="d-flex pb-2 align-items-center w-100 justify-content-start">
                <a href="javascript:void(0);" class="premium-pill-btn uniq-contact-lead-btn">
                    <span>Get In Touch</span>
                    <span class="btn-arrow-circle">
                        <svg viewBox="0 0 24 24" class="btn-arrow-svg">
                            <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>



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
        item.addEventListener('click', function () {
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
    document.addEventListener("DOMContentLoaded", function () {
        const section = document.querySelector('.dm-grow-section');
        if (section) {
            const nameInput = section.querySelector('input[name="name"]');
            if (nameInput) nameInput.placeholder = "Enter your full name";

            const phoneInput = section.querySelector('input[name="phone"]');
            if (phoneInput) phoneInput.placeholder = "Enter contact number";

            const emailInput = section.querySelector('input[name="email"]');
            if (emailInput) emailInput.placeholder = "Enter your email";

            const companyInput = section.querySelector('input[name="company"]');
            if (companyInput) companyInput.placeholder = "Enter your company";

            const messageInput = section.querySelector('textarea[name="message"]');
            if (messageInput) messageInput.placeholder = "Enter your message";
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const outer = document.getElementById('strategyScrollOuter');
        const sticky = document.querySelector('.strategy-scroll-sticky');
        const cardsRow = document.querySelector('.premium-strategy-cards-row');
        const progressBar = document.getElementById('strategyProgressBar');

        if (!outer || !cardsRow) return;

        function updateScrollHeight() {
            if (window.innerWidth > 991) {
                // Calculate horizontal scroll distance
                const scrollWidth = cardsRow.scrollWidth;
                const viewportWidth = window.innerWidth;
                const scrollDistance = Math.max(0, scrollWidth - viewportWidth);

                // Adjust factor for scroll speed (1.3x of scrollDistance creates a natural vertical scroll speed)
                const extraScrollHeight = scrollDistance * 1.3;
                outer.style.height = (window.innerHeight + extraScrollHeight) + 'px';
            } else {
                outer.style.height = 'auto';
            }
        }

        function handleScroll() {
            if (window.innerWidth <= 991) {
                cardsRow.style.transform = 'none';
                if (progressBar) progressBar.style.width = '0%';
                return;
            }

            const rect = outer.getBoundingClientRect();
            const totalHeight = outer.offsetHeight;
            const viewportHeight = window.innerHeight;
            const viewportWidth = window.innerWidth;
            const scrollDistance = cardsRow.scrollWidth - viewportWidth;

            if (rect.top <= 0 && rect.bottom >= viewportHeight) {
                const progress = -rect.top / (totalHeight - viewportHeight);
                const translateX = -progress * scrollDistance;

                cardsRow.style.transform = `translateX(${translateX}px)`;

                if (progressBar) {
                    progressBar.style.width = (progress * 100) + '%';
                }
            } else if (rect.top > 0) {
                cardsRow.style.transform = 'translateX(0px)';
                if (progressBar) progressBar.style.width = '0%';
            } else if (rect.bottom < viewportHeight) {
                cardsRow.style.transform = `translateX(${-scrollDistance}px)`;
                if (progressBar) progressBar.style.width = '100%';
            }
        }

        // Initialize scroll height calculation & handler
        updateScrollHeight();
        handleScroll();

        // Recalculate on events
        window.addEventListener('resize', () => {
            updateScrollHeight();
            handleScroll();
        });
        window.addEventListener('scroll', handleScroll);
        window.addEventListener('load', () => {
            updateScrollHeight();
            handleScroll();
        });

        // Safety timeout to ensure accurate measurements after layouts render
        setTimeout(() => {
            updateScrollHeight();
            handleScroll();
        }, 300);
    });
</script>