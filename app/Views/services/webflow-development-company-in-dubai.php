<?php
// Define dynamic data for the Webflow page
$service_name = "Webflow";
$service_slug = "webflow";
$theme_color = "#4353ff"; // Webflow Blue

$services = [
    [
        'name' => 'Custom Webflow Design',
        'icon' => '/assets/images/icons/web-development-arrow.svg',
        'description' => 'Pixel-perfect, custom-designed websites built on Webflow with advanced interactions and animations.'
    ],
    [
        'name' => 'Webflow CMS Solutions',
        'icon' => '/assets/images/service/em/emc-icon-10.png',
        'description' => 'Dynamic content structures for blogs, portfolios, and team pages that are easy for your team to update.'
    ],
    [
        'name' => 'Figma to Webflow',
        'icon' => '/assets/images/service/em/emc-icon-4.png',
        'description' => 'Converting your high-fidelity Figma designs into fully functional, responsive Webflow websites with precision.'
    ],
    [
        'name' => 'Webflow eCommerce',
        'icon' => '/assets/images/icons/shopify.svg',
        'description' => 'Building visually unique online stores with Webflow’s customizable checkout and product pages.'
    ],
    [
        'name' => 'Advanced Interactions',
        'icon' => '/assets/images/service/em/emc-icon-6.png',
        'description' => 'Creating immersive user experiences with scroll-based animations, hover effects, and custom Lottie integrations.'
    ],
    [
        'name' => 'Webflow SEO & Launch',
        'icon' => '/assets/images/icons/search-engine.svg',
        'description' => 'Optimizing your Webflow site for speed and search engines, ensuring a smooth launch on the Webflow hosting platform.'
    ]
];

$projects = [
    ['name' => 'SaaS Landing Page', 'image' => '/assets/images/case-study/sand-sollar.webp', 'category' => 'Technology', 'link' => '/case-study/e-commerce/'],
    ['name' => 'Architecture Portfolio', 'image' => '/assets/images/case-study/nanoprecise.webp', 'category' => 'Design', 'link' => '/case-study/nanoprecise-sci-corp/'],
    ['name' => 'Modern Law Firm', 'image' => '/assets/images/case-study/nims.webp', 'category' => 'Corporate', 'link' => '/case-study/education-institution/'],
    ['name' => 'Startup Showcase', 'image' => '/assets/images/case-study/wipro.webp', 'category' => 'Startup', 'link' => '/case-study/wipro-infrastructure-engineering/']
];

$process = [
    ['title' => 'Style Guide Strategy', 'number' => '01', 'description' => 'Establishing a global design system and style guide to ensure consistency across your Webflow site.'],
    ['title' => 'Low-Code Build', 'number' => '02', 'description' => 'Developing your site using Webflow’s visual canvas while maintaining clean, semantically correct HTML/CSS.'],
    ['title' => 'CMS Architecture', 'number' => '03', 'description' => 'Structuring your dynamic data fields and collections for easy content management and scalability.'],
    ['title' => 'Interaction Design', 'number' => '04', 'description' => 'Adding that "Wow" factor with custom animations and transitions that bring your brand to life.'],
    ['title' => 'Domain & QA', 'number' => '05', 'description' => 'Rigorous cross-browser testing and domain connection for a flawless, high-performance launch.']
];
?>

<!-- 1. Hero Section -->
<section class="service-banner website-design-banner sp-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="service-banner-txt">
                    <h1><?= $service_name ?> Development Agency in Dubai</h1>
                    <p class="fs-20 text-white">Unlock the power of no-code with custom <?= $service_name ?> websites. We combine high-end design with clean development for award-winning digital experiences.</p>
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
                    <h2 class="text-white">Professional <?= $service_name ?> Experts in Dubai</h2>
                    <p class="text-white fs-20">BrandStory is a leading <?= $service_name ?> development agency in Dubai, dedicated to building high-performance websites that look as good as they work. Webflow allows us to bridge the gap between design and code, delivering pixel-perfect results every time.</p>
                    <br>
                    <p class="text-white fs-20">We specialize in creating interactive, CMS-driven websites that empower your team to manage content effortlessly. From startups to established enterprises, we help you stand out in the Dubai market.</p>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h3 class="text-white mb-0">Clean</h3>
                            <p class="text-white-50">Code</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">Fast</h3>
                            <p class="text-white-50">Loading</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">Premium</h3>
                            <p class="text-white-50">Design</p>
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
                <p class="text-white-50 mb-5 fs-20 text-center">Where design meets development without any compromise on quality.</p>
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
                    <img src="/assets/images/icons/growth.svg" alt="Design" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Infinite Design</h3>
                    <p class="text-white-50">We push the boundaries of Webflow to create unique designs that are not limited by templates.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/search-engine.svg" alt="CMS" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Visual CMS</h3>
                    <p class="text-white-50">Empower your marketing team to edit content visually without breaking the layout.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/backend.svg" alt="Hosting" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Built-in Speed</h3>
                    <p class="text-white-50">Webflow hosting is ultra-fast, secure, and comes with a global CDN for peak performance.</p>
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
                    <span class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">INTERACTIONS <span style="color: <?= $theme_color ?>;">.</span></span>
                    <h2 class="text-white mb-4">Our <?= $service_name ?> Portfolio</h2>
                    <p class="text-white-50 fs-20 mb-3">Explore some of the award-worthy Webflow sites we've designed and developed for clients in Dubai.</p>
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
        <h2 class="text-center text-white mb-5 pb-lg-4">Our <?= $service_name ?> Design Journey</h2>
        <div class="timeline-container position-relative">
            <div class="d-none d-md-block position-absolute start-50 translate-middle-x h-100" style="width: 2px; background: linear-gradient(to bottom, <?= $theme_color ?>, rgba(67, 83, 255, 0.1)); top: 0;"></div>
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
                        <div class="step-circle d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #111; border: 3px solid <?= $theme_color ?>; z-index: 10; box-shadow: 0 0 20px rgba(67, 83, 255, 0.3);">
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
    .process-card:hover { background: rgba(67, 83, 255, 0.1) !important; border-color: <?= $theme_color ?> !important; transform: scale(1.03); }
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
        <h2 class="text-white mb-3">Ready for a Visual Transformation?</h2>
        <p class="text-white-50 mb-4 fs-20">Let's discuss how <?= $service_name ?> can take your website to the next level.</p>
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
                                What makes Webflow better than WordPress?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Webflow provides complete design freedom without the bloat of plugins and slow themes. It results in cleaner code, better performance, and a more secure site compared to standard WordPress setups. Plus, the visual editor is much more intuitive for non-technical users.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
