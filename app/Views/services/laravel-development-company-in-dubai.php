<?php
// Define dynamic data for the page
$laravel_services = [
    [
        'name' => 'Custom Laravel Development',
        'icon' => '/assets/images/icons/laravel.svg',
        'description' => 'Tailor-made web applications built from scratch to meet your unique business requirements and complex workflows.'
    ],
    [
        'name' => 'Laravel API Development',
        'icon' => '/assets/images/service/em/emc-icon-10.png',
        'description' => 'Robust and secure RESTful API development for seamless integration with mobile apps and third-party services.'
    ],
    [
        'name' => 'E-commerce Solutions',
        'icon' => '/assets/images/icons/shopify.svg', // Using available icon
        'description' => 'High-performance online stores with advanced features, multi-vendor support, and secure payment gateways.'
    ],
    [
        'name' => 'Laravel Migration & Upgrade',
        'icon' => '/assets/images/service/em/emc-icon-4.png',
        'description' => 'Seamlessly migrating your legacy systems to Laravel or upgrading existing Laravel apps to the latest version.'
    ],
    [
        'name' => 'CRM & ERP Development',
        'icon' => '/assets/images/service/em/emc-icon-6.png',
        'description' => 'Custom enterprise solutions to streamline your business processes, enhance productivity, and manage resources efficiently.'
    ],
    [
        'name' => 'Support & Maintenance',
        'icon' => '/assets/images/service/em/emc-icon-12.png',
        'description' => 'Ongoing support, security patches, and performance optimization to keep your Laravel application running smoothly.'
    ]
];

$laravel_projects = [
    ['name' => 'Global Logistics Portal', 'image' => '/assets/images/case-study/wipro.webp', 'category' => 'Enterprise', 'link' => '/case-study/wipro-infrastructure-engineering/'],
    ['name' => 'Real Estate Marketplace', 'image' => '/assets/images/case-study/sand-sollar.webp', 'category' => 'Real Estate', 'link' => '/case-study/e-commerce/'],
    ['name' => 'EduTech Learning System', 'image' => '/assets/images/case-study/nims.webp', 'category' => 'Education', 'link' => '/case-study/education-institution/'],
    ['name' => 'Healthcare Management App', 'image' => '/assets/images/case-study/nanoprecise.webp', 'category' => 'Healthcare', 'link' => '/case-study/nanoprecise-sci-corp/']
];

$laravel_process = [
    ['title' => 'Discovery', 'number' => '01', 'description' => 'We start by understanding your business goals, target audience, and functional requirements.'],
    ['title' => 'Design', 'number' => '02', 'description' => 'Crafting intuitive UI/UX designs that ensure a seamless user experience across all devices.'],
    ['title' => 'Development', 'number' => '03', 'description' => 'Agile development using Laravel best practices, clean code, and secure architecture.'],
    ['title' => 'Testing', 'number' => '04', 'description' => 'Rigorous QA testing to ensure bug-free performance, security, and scalability.'],
    ['title' => 'Launch', 'number' => '05', 'description' => 'Deploying your application to a secure hosting environment and providing post-launch support.']
];

$laravel_faqs = [
    [
        'q' => 'Why should I choose Laravel for my web project?',
        'a' => 'Laravel is a powerful PHP framework known for its elegant syntax, robust security features, and extensive ecosystem. It allows for rapid development of scalable and maintainable applications, making it ideal for both startups and enterprises.'
    ],
    [
        'q' => 'How long does it take to develop a Laravel application?',
        'a' => 'The development timeline depends on the complexity of the project. A simple application might take 4-6 weeks, while complex enterprise solutions can take 3-6 months. We follow an agile process to deliver results efficiently.'
    ],
    [
        'q' => 'Can you integrate third-party APIs with Laravel?',
        'a' => 'Yes, Laravel makes it very easy to integrate with various third-party services like payment gateways (Stripe, PayPal), CRM systems (Salesforce, HubSpot), and social media platforms via RESTful APIs.'
    ],
    [
        'q' => 'Do you provide maintenance for Laravel applications?',
        'a' => 'Absolutely! We offer ongoing maintenance and support packages to ensure your application remains secure, updated with the latest Laravel versions, and optimized for performance.'
    ]
];
?>

<!-- 1. Hero Section -->
<section class="service-banner website-design-banner sp-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="service-banner-txt">
                    <h1>Laravel Development Company in Dubai</h1>
                    <p class="fs-20 text-white">Scale your business with high-performance, secure, and enterprise-grade Laravel web applications tailored to your needs.</p>
                    <div class="sb-btn"><a href="#contact-section" class="kmbtn btn btn-blue">Get Quote</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-banner-form">
                    <?php include __DIR__ . '/../component/forms/contact-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="seo-marquee">
    <div class="seo-marquee-wrapper">
        <div class="seo-marquee-track">
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">Theme Development</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">Plugin Creation</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">WooCommerce Setup</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">Site Migration</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">Speed Optimization</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">Security Audit</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">API Integration</a>
            <span class="seo-marquee-sep text-white">يلا</span>
            <a href="/wordpress-development-company-in-dubai/" class="seo-marquee-item">24/7 Support</a>
            <span class="seo-marquee-sep text-white">يلا</span>
        </div>
    </div>
</section>

<!-- 2. About Company Section -->
<section id="knowMore" class="web-design-abt sp-50 dm-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="best-txt">
                    <h2 class="text-white">Expert Laravel Web Development in Dubai</h2>
                    <p class="text-white fs-20">BrandStory is a leading Laravel development agency in Dubai, providing cutting-edge solutions for businesses looking to build powerful digital products. Laravel's robust architecture combined with our 12+ years of expertise ensures your application is not just functional but also future-proof.</p>
                    <br>
                    <p class="text-white fs-20">We specialize in building cleanly coded, secure, and highly scalable applications. Whether it's a complex ERP system or a high-traffic e-commerce portal, our Laravel experts deliver excellence at every step.</p>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h3 class="text-white mb-0">12+</h3>
                            <p class="text-white-50">Years Exp.</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">Cost</h3>
                            <p class="text-white-50">Effective</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">24/7</h3>
                            <p class="text-white-50">Support</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="best-img">
                    <img src="/assets/images/service/website-design/web-design-wordpress.webp" class="img-fluid rounded" alt="Laravel Development Dubai">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Services Section (Dynamic) -->
<section class="dm-bg text-white sp-50 web-development-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-white mb-4 text-center">Comprehensive Laravel Development Services</h2>
                <p class="text-white-50 mb-5 fs-20 text-center">From startups to complex enterprise solutions, we deliver a full suite of Laravel services optimized for performance and scalability.</p>
            </div>
        </div>
        <div class="row g-4">
            <?php foreach ($laravel_services as $service): ?>
                <div class="col-md-4">
                    <div class="development dm-bg text-white border-0 h-100">
                        <div class="service-card h-100" style="border: 1px solid rgba(255,255,255,0.1) !important; border-radius: 15px; padding: 30px;">
                            <div class="row mb-4">
                                <div class="col-6 text-start">
                                    <img src="<?= $service['icon'] ?>" alt="<?= $service['name'] ?>" class="img-fluid" style="width: 80px; height: 80px; object-fit: contain;">
                                </div>
                                <div class="col-6 text-end">
                                    <img src="/assets/images/icons/web-development-arrow.svg" alt="Arrow" class="img-fluid" style="width: 30px;">
                                </div>
                            </div>
                            <h3 class="h5 text-white mb-3" style="opacity: 1 !important;"><?= $service['name'] ?></h3>
                            <p class="text-white-50 small mb-0" style="opacity: 1 !important;"><?= $service['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 4. Why Choose Us Section -->
<section class="em-benefits sp-50 dm-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-5 text-center text-white">Why Choose BrandStory for Laravel Development</h2>
                <p class="text-center text-white-50 mb-5 fs-20">We combine technical expertise with business intelligence to deliver Laravel solutions that don't just work, but excel.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px; transition: 0.3s;">
                    <img src="/assets/images/icons/search-engine.svg" alt="SEO Friendly" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">SEO Friendly</h3>
                    <p class="text-white-50">We build applications with search engines in mind, ensuring high visibility and performance from day one.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px; transition: 0.3s;">
                    <img src="/assets/images/icons/growth.svg" alt="Scalable" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Highly Scalable</h3>
                    <p class="text-white-50">Our Laravel solutions are designed to grow with your business, handling increasing traffic and data effortlessly.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px; transition: 0.3s;">
                    <img src="/assets/images/icons/cms.svg" alt="Manage" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Easy to Manage</h3>
                    <p class="text-white-50">With an intuitive backend architecture, managing your content and business data becomes a seamless experience.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px; transition: 0.3s;">
                    <img src="/assets/images/icons/backend.svg" alt="Secure" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Advanced Security</h3>
                    <p class="text-white-50">Leveraging Laravel's built-in security features and our custom hardening to keep your enterprise data safe.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px; transition: 0.3s;">
                    <img src="/assets/images/icons/laravel.svg" alt="Expert Team" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Expert Laravel Team</h3>
                    <p class="text-white-50">Our certified developers follow industry best practices, clean code, and agile methodologies for every project.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px; transition: 0.3s;">
                    <img src="/assets/images/icons/web-development-arrow.svg" alt="Timely Delivery" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Timely Delivery</h3>
                    <p class="text-white-50">We prioritize your business deadlines, ensuring rapid development without compromising on quality or security.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Portfolio Section (Premium Design) -->
<section class="sp-50 dm-case-studies-section dm-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sticky-case-study-left">
                    <span class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">OUR PROJECTS <span style="color: #855BFF;">.</span></span>
                    <h2 class="text-white mb-4">Our Laravel Development Projects Portfolio</h2>
                    <p class="text-white-50 fs-20 mb-3">Explore how we've helped businesses across Dubai transform their ideas into high-performing, scalable Laravel applications.</p>
                    <a href="/case-study/" class="view-all-link">View All Projects</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="scrollable-case-study-right">
                    <?php foreach ($laravel_projects as $project): ?>
                        <div class="case-study-scroll-item mb-5">
                            <div class="neww-case-stuides-main">
                                <div class="case-study-img-wrapper">
                                    <img class="w-100 dm-blog-img" src="<?= $project['image'] ?>" alt="<?= $project['name'] ?>" style="border-radius: 15px;">
                                    <strong><?= $project['category'] ?></strong>
                                </div>
                                <h3 class="mt-3"><a href="<?= $project['link'] ?>" class="text-white text-decoration-none"><?= $project['name'] ?></a></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Development Process (Premium Zig-Zag Timeline) -->
<section class="process-section sp-50 dm-bg text-white position-relative overflow-hidden">
    <div class="container position-relative">
        <h2 class="text-center text-white mb-5 pb-lg-4">Our Laravel Development Journey</h2>
        
        <div class="timeline-container position-relative">
            <!-- Central Line (Desktop Only) -->
            <div class="d-none d-md-block position-absolute start-50 translate-middle-x h-100" style="width: 2px; background: linear-gradient(to bottom, #855BFF, rgba(133, 91, 255, 0.1)); top: 0;"></div>

            <?php foreach ($laravel_process as $index => $step): ?>
                <div class="process-item row mb-5 pb-lg-4 align-items-center process-animate-step" style="opacity: 0; transform: translateY(30px);">
                    
                    <!-- Left Side (Step Card for even, Empty for odd) -->
                    <div class="col-md-5 <?= $index % 2 == 0 ? 'text-md-end order-2 order-md-1' : 'order-2' ?>">
                        <?php if ($index % 2 == 0): ?>
                            <div class="process-card p-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; transition: all 0.3s ease;">
                                <h3 class="h4 text-white mb-3"><?= $step['title'] ?></h3>
                                <p class="text-white-50 mb-0"><?= $step['description'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Middle (Circle Number) -->
                    <div class="col-md-2 d-flex justify-content-center order-1 order-md-2 mb-3 mb-md-0 position-relative">
                        <div class="step-circle d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #111; border: 3px solid #855BFF; z-index: 10; box-shadow: 0 0 20px rgba(133, 91, 255, 0.3);">
                            <span class="fw-bold fs-20" style="color: #855BFF;"><?= $step['number'] ?></span>
                        </div>
                    </div>

                    <!-- Right Side (Empty for even, Step Card for odd) -->
                    <div class="col-md-5 <?= $index % 2 == 0 ? 'order-3' : 'order-2 order-md-3' ?>">
                        <?php if ($index % 2 != 0): ?>
                            <div class="process-card p-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; transition: all 0.3s ease;">
                                <h3 class="h4 text-white mb-3"><?= $step['title'] ?></h3>
                                <p class="text-white-50 mb-0"><?= $step['description'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    .process-card:hover {
        background: rgba(133, 91, 255, 0.1) !important;
        border-color: #855BFF !important;
        transform: scale(1.03);
    }
    .process-item { transition: all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stepObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, 100);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.process-animate-step').forEach(item => {
            stepObserver.observe(item);
        });
    });
</script>

<!-- 7. Testimonials -->
<?php
$reviewSection = [
    'title' =>  "What Our Clients Say About <br>Our Laravel Solutions",
    'bgClass' => 'dm-bg',
];
include __DIR__ . '/../component/client_reviews.php';
?>

<!-- 8. CTA Section -->
<section class="cta-section sp-50 text-center" style="background: linear-gradient(135deg, #855BFF 0%, #212529 100%);">
    <div class="container">
        <h2 class="text-white mb-3">Ready to Build Your Next Big Thing?</h2>
        <p class="text-white-50 mb-4 fs-20">Let's discuss how our Laravel experts can transform your vision into reality.</p>
        <a href="#contact-section" class="btn btn-light btn-lg px-5">Get Started Now</a>
    </div>
</section>

<!-- 9. Industries We Serve -->
<section class="dm-industries-sec sp-50 dm-bg">
    <div class="container">
        <h2 class="mb-lg-5 mb-4 text-white text-center">Industries We Empower with Laravel</h2>
        <div class="row g-3">
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img1.png" alt="Education">
                        <h3 class="text-white text-center">Education</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3">Education</h3>
                        <p class="text-center mb-3">Building scalable LMS platforms and student management systems.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img2.png" alt="eCommerce">
                        <h3 class="text-white text-center">eCommerce</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3">eCommerce</h3>
                        <p class="text-center mb-3">High-converting online stores with secure Laravel backends.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img4.png" alt="Real Estate">
                        <h3 class="text-white text-center">Real Estate</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3">Real Estate</h3>
                        <p class="text-center mb-3">Advanced property listing and lead management solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 10. Clients / Brands -->
<section class="new-client-section sp-50">
    <div class="container-fluid">
        <h2 class="text-center mb-5 text-white">Trusted by Brands Worldwide</h2>
        <?php include __DIR__ . '/../component/client_section.php' ?>
    </div>
</section>

<!-- 11. Reviews (Google / External) -->
<section class="reviews-slider sp-50 dm-bg">
    <div class="container text-center">
        <h2 class="text-white mb-5">Our Global Reviews</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="google-review-box p-4" style="background: rgba(255,255,255,0.05); border-radius: 15px;">
                    <img src="/assets/images/icons/google.svg" width="50" class="mb-3">
                    <div class="h4 text-warning mb-2">★★★★★</div>
                    <p class="text-white fs-18">"BrandStory's Laravel team delivered our project ahead of schedule with exceptional quality. Highly recommended!"</p>
                    <small class="text-white-50">- Satisfied Client from Dubai</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 12. FAQ Section -->
<section class="sp-80 bg-black">
    <div class="container">
        <!-- <h2 class="fs-65 text-center"><span class="gradient-text">FAQ's</span></h2> -->
        <h2 class="text-white text-center">
            FAQ's
        </h2>
        <div class="row g-4 d-flex pt-lg-5 pt-3 justify-content-center align-items-center">
            <div class="col-md-9 col-12">
                <div class="accordion custom-accordion" id="mainAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button show fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Difference between Traditional and Social Media Marketing?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Traditional marketing uses offline methods like newspapers, magazines, radio, and TV. It focuses on reaching a wide audience but offers limited targeting and tracking.</p>
                                <p>Social media marketing, on the other hand, is digital. It allows brands to target specific audiences, track results in real time, and interact directly with users through platforms like Instagram, Facebook, X, and LinkedIn. It’s more cost-effective and measurable than traditional marketing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What are the latest trends in social media marketing (2025)?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>In 2025, social media marketing is driven by personalization, short-form video, and AI integration. Platforms like Instagram Reels, YouTube Shorts, and TikTok continue to dominate user engagement. Brands are using AI tools for predictive analytics, content creation, and automated customer interactions.</p>
                                <p>Interactive content like polls, quizzes, and AR filters remains popular for boosting engagement. Social commerce is growing rapidly, with users shopping directly within platforms. Additionally, influencer partnerships are evolving, focusing more on authenticity and niche creators. Immersive tech like AR/VR is also gaining ground, offering richer brand experiences.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Which is better: Search Engine Marketing or Social Media Marketing?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Both have unique strengths. Search Engine Marketing (SEM) focuses on increasing visibility through search engines, helping drive high-intent traffic, leads, and conversions. Social Media Marketing (SMM) builds brand awareness, fosters community, and engages your audience through platforms like Instagram, Facebook, and LinkedIn. The better option depends on your goals; SEM is ideal for immediate results and targeted traffic, while SMM is effective for long-term brand building and engagement.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can you handle all our social media accounts?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Yes, we manage all your social media accounts across platforms like Facebook, Instagram, LinkedIn, and more. Our team ensures consistent updates, engaging content, and timely responses to maintain a strong and active online presence for your brand.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can I Choose Social Media Marketing for Small Business?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Absolutely. Social media marketing is effective for businesses of all sizes. Whether you're a small, medium, or large company, we tailor strategies to fit your goals and manage your accounts to help build brand visibility, engagement, and growth.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Who needs Social Media Marketing?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Social media marketing is essential for everyone from startups and enterprises to solo creators and small businesses. It gives all brands an equal opportunity to connect with their target audience, build trust, and drive growth. In fact, studies show that 71% of consumers are more likely to recommend a brand after a positive social media experience, and 78% say social media posts influence their purchase decisions. With the right strategy, social media can support brand awareness, lead generation, and long-term customer loyalty.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                When can I expect results from social media marketing?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>As your social media marketing agency, we aim for both short-term wins and long-term growth. If you're running paid campaigns, you can start seeing measurable results like clicks, traffic, or conversions within days. For organic strategies, results typically build over time, usually within 2 to 3 months, with consistent posting, audience engagement, and content performance. We ensure every strategy is aligned with your goals to deliver results as efficiently as possible.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .service-card-new:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .process-card:hover h4 {
        color: #855BFF;
    }

    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #855BFF;
    }
</style>