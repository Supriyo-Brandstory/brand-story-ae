<?php
// Define dynamic data for the Wix page
$service_name = "Wix";
$service_slug = "wix";
$theme_color = "#116dff"; // Wix Blue

$services = [
    [
        'name' => 'Custom Wix Website Design',
        'icon' => '/assets/images/icons/web-development-arrow.svg',
        'description' => 'Creating visually stunning, high-performance websites on Wix tailored to your brand identity and business goals.'
    ],
    [
        'name' => 'Wix eCommerce Setup',
        'icon' => '/assets/images/icons/shopify.svg',
        'description' => 'Launching fully functional online stores with Wix Stores, featuring secure payments and inventory management.'
    ],
    [
        'name' => 'Wix Velo Development',
        'icon' => '/assets/images/service/em/emc-icon-4.png',
        'description' => 'Extending Wix functionality with custom code (Velo) for complex business logic, databases, and dynamic content.'
    ],
    [
        'name' => 'SEO & Performance',
        'icon' => '/assets/images/icons/search-engine.svg',
        'description' => 'Optimizing your Wix site for search engines and lightning-fast load times using advanced Wix SEO tools.'
    ],
    [
        'name' => 'Wix Website Redesign',
        'icon' => '/assets/images/service/em/emc-icon-6.png',
        'description' => 'Modernizing your existing Wix site with fresh designs, improved UX, and the latest platform features.'
    ],
    [
        'name' => 'Wix Support & Training',
        'icon' => '/assets/images/service/em/emc-icon-12.png',
        'description' => 'Providing ongoing maintenance and expert training to help you manage your Wix site with confidence.'
    ]
];

$projects = [
    ['name' => 'Creative Agency Portfolio', 'image' => '/assets/images/case-study/sand-sollar.webp', 'category' => 'Creative', 'link' => '/case-study/e-commerce/'],
    ['name' => 'Fitness Coach Website', 'image' => '/assets/images/case-study/nanoprecise.webp', 'category' => 'Health', 'link' => '/case-study/nanoprecise-sci-corp/'],
    ['name' => 'Local Dubai Restaurant', 'image' => '/assets/images/case-study/nims.webp', 'category' => 'F&B', 'link' => '/case-study/education-institution/'],
    ['name' => 'Corporate Law Firm', 'image' => '/assets/images/case-study/wipro.webp', 'category' => 'Legal', 'link' => '/case-study/wipro-infrastructure-engineering/']
];

$process = [
    ['title' => 'Discovery Call', 'number' => '01', 'description' => 'We discuss your vision and choose the right Wix template or custom wireframe for your project.'],
    ['title' => 'Visual Design', 'number' => '02', 'description' => 'Crafting a unique look and feel that resonates with your Dubai audience using Wix Editor X.'],
    ['title' => 'Site Building', 'number' => '03', 'description' => 'Developing your site with a focus on mobile responsiveness and seamless user interaction.'],
    ['title' => 'SEO Setup', 'number' => '04', 'description' => 'Implementing core SEO strategies to ensure your Wix site ranks well in Google search results.'],
    ['title' => 'Launch & Handover', 'number' => '05', 'description' => 'Connecting your domain, testing all flows, and providing a walkthrough of the Wix dashboard.']
];
?>

<!-- 1. Hero Section -->
<section class="service-banner website-design-banner sp-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="service-banner-txt">
                    <h1><?= $service_name ?> Website Development Dubai</h1>
                    <p class="fs-20 text-white">Create a professional online presence with Dubai's leading <?= $service_name ?> experts. We build stunning, SEO-optimized websites that are easy to manage.</p>
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
                    <h2 class="text-white">Expert <?= $service_name ?> Design & Development</h2>
                    <p class="text-white fs-20">BrandStory is a premier <?= $service_name ?> development agency in Dubai, specializing in creating high-quality websites for small to medium enterprises. Wix offers incredible flexibility, and our designers know how to push its boundaries to deliver a premium look.</p>
                    <br>
                    <p class="text-white fs-20">From simple landing pages to complex eCommerce stores, we leverage the latest Wix tools like Editor X and Velo to provide a professional digital home for your brand.</p>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h3 class="text-white mb-0">Drag &</h3>
                            <p class="text-white-50">Drop Pro</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">Easy</h3>
                            <p class="text-white-50">Management</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">Fast</h3>
                            <p class="text-white-50">Turnaround</p>
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
                <p class="text-white-50 mb-5 fs-20 text-center">Beautiful websites that you can manage without a single line of code.</p>
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
                    <h3 class="text-white h4 mb-3">Quick Launch</h3>
                    <p class="text-white-50">Get your business online in days, not months, with our efficient Wix development process.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/search-engine.svg" alt="SEO" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">SEO Optimized</h3>
                    <p class="text-white-50">We ensure your Wix site is visible to your target audience with smart keyword placement.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/backend.svg" alt="User Friendly" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">User Friendly</h3>
                    <p class="text-white-50">Manage your own content, blog, and products with an intuitive drag-and-drop dashboard.</p>
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
                    <span class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">CREATIVE <span style="color: <?= $theme_color ?>;">.</span></span>
                    <h2 class="text-white mb-4">Our <?= $service_name ?> Portfolio</h2>
                    <p class="text-white-50 fs-20 mb-3">See how we've helped diverse businesses in Dubai shine online with beautiful Wix websites.</p>
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
        <h2 class="text-center text-white mb-5 pb-lg-4">Our <?= $service_name ?> Build Process</h2>
        <div class="timeline-container position-relative">
            <div class="d-none d-md-block position-absolute start-50 translate-middle-x h-100" style="width: 2px; background: linear-gradient(to bottom, <?= $theme_color ?>, rgba(17, 109, 255, 0.1)); top: 0;"></div>
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
                        <div class="step-circle d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #111; border: 3px solid <?= $theme_color ?>; z-index: 10; box-shadow: 0 0 20px rgba(17, 109, 255, 0.3);">
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
    .process-card:hover { background: rgba(17, 109, 255, 0.1) !important; border-color: <?= $theme_color ?> !important; transform: scale(1.03); }
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
        <h2 class="text-white mb-3">Ready to Launch Your Wix Website?</h2>
        <p class="text-white-50 mb-4 fs-20">Let's discuss how <?= $service_name ?> can help you achieve your online goals.</p>
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
                                Can I manage my Wix site myself?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Yes, that's the beauty of Wix! Once we set up the design and functionality, you can easily update text, images, and blog posts yourself without any technical knowledge. We also provide a training session to get you started.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
