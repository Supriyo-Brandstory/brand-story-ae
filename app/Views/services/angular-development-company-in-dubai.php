<?php
// Define dynamic data for the Angular page
$service_name = "Angular";
$service_slug = "angular";
$theme_color = "#dd0031"; // Angular Red

$services = [
    [
        'name' => 'Custom Angular Development',
        'icon' => '/assets/images/icons/angular.svg',
        'description' => 'Building enterprise-grade, high-performance single-page applications (SPAs) tailored to your complex business needs.'
    ],
    [
        'name' => 'Angular UI/UX Design',
        'icon' => '/assets/images/service/em/emc-icon-10.png',
        'description' => 'Crafting modern, responsive, and intuitive interfaces using Angular Material and advanced CSS frameworks.'
    ],
    [
        'name' => 'Angular API Integration',
        'icon' => '/assets/images/service/em/emc-icon-4.png',
        'description' => 'Seamlessly connecting your Angular frontend with robust backends and third-party RESTful/GraphQL APIs.'
    ],
    [
        'name' => 'Migration to Angular',
        'icon' => '/assets/images/service/em/emc-icon-6.png',
        'description' => 'Updating legacy applications or migrating from other frameworks to the latest stable versions of Angular.'
    ],
    [
        'name' => 'Angular Consulting',
        'icon' => '/assets/images/service/em/emc-icon-12.png',
        'description' => 'Expert guidance on architecture, performance optimization, and best practices for large-scale Angular projects.'
    ],
    [
        'name' => 'Maintenance & Support',
        'icon' => '/assets/images/service/em/emc-icon-8.png',
        'description' => 'Ongoing monitoring, security updates, and feature enhancements to ensure your Angular app stays competitive.'
    ]
];

$projects = [
    ['name' => 'FinTech Dashboard', 'image' => '/assets/images/case-study/wipro.webp', 'category' => 'Finance', 'link' => '/case-study/wipro-infrastructure-engineering/'],
    ['name' => 'Healthcare Patient Portal', 'image' => '/assets/images/case-study/nanoprecise.webp', 'category' => 'Healthcare', 'link' => '/case-study/nanoprecise-sci-corp/'],
    ['name' => 'Corporate CRM System', 'image' => '/assets/images/case-study/nims.webp', 'category' => 'Enterprise', 'link' => '/case-study/education-institution/'],
    ['name' => 'Supply Chain Tracker', 'image' => '/assets/images/case-study/sand-sollar.webp', 'category' => 'Logistics', 'link' => '/case-study/e-commerce/']
];

$process = [
    ['title' => 'Requirement Analysis', 'number' => '01', 'description' => 'We define the technical architecture and component structure based on your business logic.'],
    ['title' => 'Component Design', 'number' => '02', 'description' => 'Developing reusable components and services following the official Angular Style Guide.'],
    ['title' => 'Development & Logic', 'number' => '03', 'description' => 'Implementing core features with TypeScript, ensuring type safety and robust application logic.'],
    ['title' => 'Optimization', 'number' => '04', 'description' => 'Applying AOT compilation, lazy loading, and state management for lightning-fast performance.'],
    ['title' => 'Deployment', 'number' => '05', 'description' => 'Launching on secure cloud environments with CI/CD pipelines and automated testing.']
];
?>

<!-- 1. Hero Section -->
<section class="service-banner website-design-banner sp-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="service-banner-txt">
                    <h1><?= $service_name ?> Development Company in Dubai</h1>
                    <p class="fs-20 text-white">Build scalable, enterprise-ready web applications with our expert <?= $service_name ?> developers. We transform complex ideas into seamless digital experiences.</p>
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
                    <h2 class="text-white">Premium <?= $service_name ?> Development Services in UAE</h2>
                    <p class="text-white fs-20">As a top-tier <?= $service_name ?> development agency in Dubai, BrandStory leverages Google's powerful framework to create high-performance, secure, and maintainable web applications. Our expert team follows modern architecture patterns to ensure your software is ready for the future.</p>
                    <br>
                    <p class="text-white fs-20">We specialize in building SPAs that feel as fast and responsive as native apps. From complex dashboards to large-scale portals, we deliver excellence using TypeScript and the latest Angular features.</p>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h3 class="text-white mb-0">10+</h3>
                            <p class="text-white-50">Developers</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">High</h3>
                            <p class="text-white-50">Security</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">Fast</h3>
                            <p class="text-white-50">Delivery</p>
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
                <h2 class="text-white mb-4 text-center">Our <?= $service_name ?> Expertise</h2>
                <p class="text-white-50 mb-5 fs-20 text-center">Comprehensive solutions for the modern web, built with speed, security, and scalability in mind.</p>
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
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-5 text-center text-white">Why Choose BrandStory for <?= $service_name ?></h2>
                <p class="text-center text-white-50 mb-5 fs-20">We don't just write code; we build business solutions that drive results.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/search-engine.svg" alt="Enterprise Ready" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Enterprise Ready</h3>
                    <p class="text-white-50">Built for scale, Angular is the preferred choice for large-scale enterprise applications.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/growth.svg" alt="Modular Design" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Modular Architecture</h3>
                    <p class="text-white-50">Our modular approach ensures your code is clean, reusable, and easy to maintain.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/cms.svg" alt="TypeScript" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">TypeScript Power</h3>
                    <p class="text-white-50">We leverage TypeScript to catch errors early and write more predictable, robust code.</p>
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
                    <span class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">SUCCESS STORIES <span style="color: <?= $theme_color ?>;">.</span></span>
                    <h2 class="text-white mb-4">Our <?= $service_name ?> Portfolio</h2>
                    <p class="text-white-50 fs-20 mb-3">Discover how we've helped leading brands in Dubai achieve digital transformation through expert Angular development.</p>
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
        <h2 class="text-center text-white mb-5 pb-lg-4">Our <?= $service_name ?> Development Process</h2>
        <div class="timeline-container position-relative">
            <div class="d-none d-md-block position-absolute start-50 translate-middle-x h-100" style="width: 2px; background: linear-gradient(to bottom, <?= $theme_color ?>, rgba(221, 0, 49, 0.1)); top: 0;"></div>
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
                        <div class="step-circle d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #111; border: 3px solid <?= $theme_color ?>; z-index: 10; box-shadow: 0 0 20px rgba(221, 0, 49, 0.3);">
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
    .process-card:hover { background: rgba(221, 0, 49, 0.1) !important; border-color: <?= $theme_color ?> !important; transform: scale(1.03); }
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
        <h2 class="text-white mb-3">Ready to Accelerate Your Enterprise App?</h2>
        <p class="text-white-50 mb-4 fs-20">Let's discuss how our <?= $service_name ?> experts can build your next high-performance platform.</p>
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
                                Why choose Angular for my project?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Angular is a comprehensive framework that provides everything needed to build complex SPAs. Its two-way data binding, modularity, and powerful CLI make it perfect for long-term, scalable projects.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
