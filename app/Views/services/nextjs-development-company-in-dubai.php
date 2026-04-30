<?php
// Define dynamic data for the Next.js page
$service_name = "Next.js";
$service_slug = "nextjs";
$theme_color = "#0070f3"; // Next.js Blue

$services = [
    [
        'name' => 'Full-Stack Next.js Apps',
        'icon' => '/assets/images/icons/web-development-arrow.svg',
        'description' => 'Leveraging the power of React and Next.js to build lightning-fast, full-stack web applications with seamless SSR/SSG.'
    ],
    [
        'name' => 'SEO Optimization',
        'icon' => '/assets/images/icons/search-engine.svg',
        'description' => 'Ensuring your web app ranks higher with built-in SEO features, automatic image optimization, and fast server-side rendering.'
    ],
    [
        'name' => 'Static Site Generation',
        'icon' => '/assets/images/service/em/emc-icon-4.png',
        'description' => 'Creating highly performant marketing sites and blogs that load instantly and provide a superior user experience.'
    ],
    [
        'name' => 'API Route Development',
        'icon' => '/assets/images/service/em/emc-icon-6.png',
        'description' => 'Building secure and scalable serverless functions and APIs directly within your Next.js project structure.'
    ],
    [
        'name' => 'Headless CMS Integration',
        'icon' => '/assets/images/service/em/emc-icon-12.png',
        'description' => 'Connecting Next.js with modern headless CMS platforms like Contentful, Strapi, or Sanity for dynamic content management.'
    ],
    [
        'name' => 'Deployment & Vercel Ops',
        'icon' => '/assets/images/service/em/emc-icon-8.png',
        'description' => 'Expert deployment on Vercel or AWS, ensuring high availability, global edge distribution, and performance monitoring.'
    ]
];

$projects = [
    ['name' => 'Real-Time E-commerce App', 'image' => '/assets/images/case-study/sand-sollar.webp', 'category' => 'Retail', 'link' => '/case-study/e-commerce/'],
    ['name' => 'SaaS Analytics Dashboard', 'image' => '/assets/images/case-study/nanoprecise.webp', 'category' => 'Technology', 'link' => '/case-study/nanoprecise-sci-corp/'],
    ['name' => 'Interactive Learning Portal', 'image' => '/assets/images/case-study/nims.webp', 'category' => 'Education', 'link' => '/case-study/education-institution/'],
    ['name' => 'Global News Platform', 'image' => '/assets/images/case-study/wipro.webp', 'category' => 'Media', 'link' => '/case-study/wipro-infrastructure-engineering/']
];

$process = [
    ['title' => 'Project Scoping', 'number' => '01', 'description' => 'Defining the rendering strategy (SSR vs SSG) based on your content and performance goals.'],
    ['title' => 'Architecture Setup', 'number' => '02', 'description' => 'Configuring the App Router, middleware, and state management for optimal application flow.'],
    ['title' => 'Component Development', 'number' => '03', 'description' => 'Building fast, interactive React components with modern styling and accessibility in mind.'],
    ['title' => 'Data Fetching', 'number' => '04', 'description' => 'Implementing efficient data fetching patterns and caching strategies to minimize latency.'],
    ['title' => 'Edge Deployment', 'number' => '05', 'description' => 'Deploying to global edge networks for sub-second load times worldwide.']
];
?>

<!-- 1. Hero Section -->
<section class="service-banner website-design-banner sp-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="service-banner-txt">
                    <h1><?= $service_name ?> Development Company in Dubai</h1>
                    <p class="fs-20 text-white">Experience the future of the web with high-performance <?= $service_name ?> applications. We build sites that load in the blink of an eye and rank on page one.</p>
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

<!-- 2. About Company Section -->
<section id="knowMore" class="web-design-abt sp-50 dm-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="best-txt">
                    <h2 class="text-white">Modern <?= $service_name ?> Solutions for Dubai Businesses</h2>
                    <p class="text-white fs-20">BrandStory is a premier <?= $service_name ?> development agency in Dubai, specializing in building high-speed, SEO-optimized web experiences. Next.js offers the perfect balance of developer experience and end-user performance, and our experts know exactly how to leverage it for your brand.</p>
                    <br>
                    <p class="text-white fs-20">From Server-Side Rendering to Static Site Generation, we implement the latest technologies to ensure your website is fast, secure, and easily indexable by search engines.</p>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h3 class="text-white mb-0">Sub-1s</h3>
                            <p class="text-white-50">Load Times</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">100%</h3>
                            <p class="text-white-50">SEO Ready</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">24/7</h3>
                            <p class="text-white-50">Monitoring</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="best-img">
                    <img src="/assets/images/service/website-design/web-design-wordpress.webp" class="img-fluid rounded" alt="<?= $service_name ?> Development Dubai">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Services Section -->
<section class="dm-bg text-white sp-50 web-development-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-white mb-4 text-center">Our <?= $service_name ?> Services</h2>
                <p class="text-white-50 mb-5 fs-20 text-center">Speed, SEO, and Scalability – all built into your next digital product.</p>
            </div>
        </div>
        <div class="row g-4">
            <?php foreach ($services as $service): ?>
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
                            <h3 class="h5 text-white mb-3"><?= $service['name'] ?></h3>
                            <p class="text-white-50 small mb-0"><?= $service['description'] ?></p>
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
        <div class="row g-4">
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/growth.svg" alt="Speed" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Lightning Speed</h3>
                    <p class="text-white-50">Next.js optimizes every part of your site to ensure instant loading and zero friction.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/search-engine.svg" alt="SEO" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">SEO Native</h3>
                    <p class="text-white-50">Built-in server-side rendering ensures search engines can crawl your site effortlessly.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/backend.svg" alt="Edge" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Edge Ready</h3>
                    <p class="text-white-50">Global distribution ensures your site is fast for every user, no matter where they are.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Portfolio Section -->
<section class="sp-50 dm-case-studies-section dm-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sticky-case-study-left">
                    <span class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">PERFORMANCE <span style="color: <?= $theme_color ?>;">.</span></span>
                    <h2 class="text-white mb-4">Our <?= $service_name ?> Portfolio</h2>
                    <p class="text-white-50 fs-20 mb-3">See how we've used Next.js to deliver high-performance web experiences for brands in Dubai and beyond.</p>
                    <a href="/case-study/" class="view-all-link">View All Projects</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="scrollable-case-study-right">
                    <?php foreach ($projects as $project): ?>
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

<!-- 6. Development Process -->
<section class="process-section sp-50 dm-bg text-white position-relative overflow-hidden">
    <div class="container position-relative">
        <h2 class="text-center text-white mb-5 pb-lg-4">Our <?= $service_name ?> Development Cycle</h2>
        <div class="timeline-container position-relative">
            <div class="d-none d-md-block position-absolute start-50 translate-middle-x h-100" style="width: 2px; background: linear-gradient(to bottom, <?= $theme_color ?>, rgba(0, 112, 243, 0.1)); top: 0;"></div>
            <?php foreach ($process as $index => $step): ?>
                <div class="process-item row mb-5 pb-lg-4 align-items-center process-animate-step" style="opacity: 0; transform: translateY(30px);">
                    <div class="col-md-5 <?= $index % 2 == 0 ? 'text-md-end order-2 order-md-1' : 'order-2' ?>">
                        <?php if ($index % 2 == 0): ?>
                            <div class="process-card p-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; transition: all 0.3s ease;">
                                <h3 class="h4 text-white mb-3"><?= $step['title'] ?></h3>
                                <p class="text-white-50 mb-0"><?= $step['description'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center order-1 order-md-2 mb-3 mb-md-0 position-relative">
                        <div class="step-circle d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #111; border: 3px solid <?= $theme_color ?>; z-index: 10; box-shadow: 0 0 20px rgba(0, 112, 243, 0.3);">
                            <span class="fw-bold fs-20" style="color: <?= $theme_color ?>;"><?= $step['number'] ?></span>
                        </div>
                    </div>
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
    .process-card:hover { background: rgba(0, 112, 243, 0.1) !important; border-color: <?= $theme_color ?> !important; transform: scale(1.03); }
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
        document.querySelectorAll('.process-animate-step').forEach(item => { stepObserver.observe(item); });
    });
</script>

<!-- 7. Testimonials -->
<?php
$reviewSection = [
    'title' =>  "What Our Clients Say About <br>Our $service_name Solutions",
    'bgClass' => 'dm-bg',
];
include __DIR__ . '/../component/client_reviews.php';
?>

<!-- 8. CTA Section -->
<section class="cta-section sp-50 text-center" style="background: linear-gradient(135deg, <?= $theme_color ?> 0%, #212529 100%);">
    <div class="container">
        <h2 class="text-white mb-3">Ready for a Faster Website?</h2>
        <p class="text-white-50 mb-4 fs-20">Let's discuss how <?= $service_name ?> can transform your brand's digital performance.</p>
        <a href="#contact-section" class="btn btn-light btn-lg px-5">Get Started Now</a>
    </div>
</section>

<!-- 12. FAQ Section -->
<section class="sp-80 bg-black">
    <div class="container">
        <h2 class="text-white text-center">FAQ's</h2>
        <div class="row g-4 d-flex pt-lg-5 pt-3 justify-content-center align-items-center">
            <div class="col-md-9 col-12">
                <div class="accordion custom-accordion" id="mainAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button show fs-24 fw-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Is Next.js good for SEO?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Yes, Next.js is arguably the best React framework for SEO. Its ability to perform Server-Side Rendering (SSR) and Static Site Generation (SSG) ensures that search engines can easily crawl and index your content, leading to better rankings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
