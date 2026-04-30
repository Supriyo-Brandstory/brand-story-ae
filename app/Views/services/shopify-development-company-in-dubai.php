<?php
// Define dynamic data for the Shopify page
$service_name = "Shopify";
$service_slug = "shopify";
$theme_color = "#96bf48"; // Shopify Green

$services = [
    [
        'name' => 'Shopify Store Setup',
        'icon' => '/assets/images/icons/shopify.svg',
        'description' => 'End-to-end Shopify store configuration, including domain setup, payment gateways, and shipping rules for Dubai market.'
    ],
    [
        'name' => 'Custom Theme Development',
        'icon' => '/assets/images/service/em/emc-icon-10.png',
        'description' => 'Creating unique, brand-aligned Shopify themes from scratch using Liquid to ensure your store stands out.'
    ],
    [
        'name' => 'Shopify App Integration',
        'icon' => '/assets/images/service/em/emc-icon-4.png',
        'description' => 'Enhancing your store functionality with the best-in-class apps for marketing, SEO, and inventory management.'
    ],
    [
        'name' => 'Shopify Plus Solutions',
        'icon' => '/assets/images/service/em/emc-icon-6.png',
        'description' => 'Enterprise-level solutions for high-volume merchants looking for advanced customization and multi-channel reach.'
    ],
    [
        'name' => 'eCommerce Strategy',
        'icon' => '/assets/images/service/em/emc-icon-12.png',
        'description' => 'Data-driven insights to optimize your conversion rates, reduce cart abandonment, and increase average order value.'
    ],
    [
        'name' => 'Migration to Shopify',
        'icon' => '/assets/images/service/em/emc-icon-8.png',
        'description' => 'Seamlessly migrating your existing store from WooCommerce, Magento, or custom platforms to Shopify without data loss.'
    ]
];

$projects = [
    ['name' => 'Luxury Fashion Boutique', 'image' => '/assets/images/case-study/sand-sollar.webp', 'category' => 'Fashion', 'link' => '/case-study/e-commerce/'],
    ['name' => 'Gourmet Food Delivery', 'image' => '/assets/images/case-study/nanoprecise.webp', 'category' => 'Food & Beverage', 'link' => '/case-study/nanoprecise-sci-corp/'],
    ['name' => 'Organic Skincare Store', 'image' => '/assets/images/case-study/nims.webp', 'category' => 'Beauty', 'link' => '/case-study/education-institution/'],
    ['name' => 'Home Decor Marketplace', 'image' => '/assets/images/case-study/wipro.webp', 'category' => 'Home Decor', 'link' => '/case-study/wipro-infrastructure-engineering/']
];

$process = [
    ['title' => 'Niche Analysis', 'number' => '01', 'description' => 'Identifying your target audience and competitors to define a winning eCommerce strategy.'],
    ['title' => 'Design & UX', 'number' => '02', 'description' => 'Crafting high-converting storefront designs that provide a seamless shopping experience.'],
    ['title' => 'Store Development', 'number' => '03', 'description' => 'Building your store with optimized Liquid code and advanced custom functionality.'],
    ['title' => 'QA & Optimization', 'number' => '04', 'description' => 'Testing payment flows, mobile responsiveness, and site speed for a flawless launch.'],
    ['title' => 'Go Live & Support', 'number' => '05', 'description' => 'Launching your store and providing ongoing support to help you scale your sales.']
];
?>

<!-- 1. Hero Section -->
<section class="service-banner website-design-banner sp-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="service-banner-txt">
                    <h1><?= $service_name ?> Development Company in Dubai</h1>
                    <p class="fs-20 text-white">Start selling online with Dubai's leading <?= $service_name ?> experts. We build beautiful, high-converting eCommerce stores that drive global growth.</p>
                    <div class="sb-btn"><a href="#contact-section" class="kmbtn btn btn-blue">Get Started</a></div>
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
                    <h2 class="text-white">Premier <?= $service_name ?> Experts in Dubai</h2>
                    <p class="text-white fs-20">BrandStory is a certified <?= $service_name ?> development agency in Dubai, helping brands build and scale their online presence. Shopify is the world's most powerful eCommerce platform, and we help you master it to reach your customers wherever they are.</p>
                    <br>
                    <p class="text-white fs-20">Whether you are a startup launching your first product or a global brand looking for Shopify Plus, our team delivers custom themes, app integrations, and conversion-optimized experiences.</p>
                    <div class="row mt-4">
                        <div class="col-4">
                            <h3 class="text-white mb-0">50+</h3>
                            <p class="text-white-50">Stores Built</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">99%</h3>
                            <p class="text-white-50">Uptime</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-white mb-0">ROI</h3>
                            <p class="text-white-50">Focused</p>
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
                <p class="text-white-50 mb-5 fs-20 text-center">Everything you need to succeed in the competitive world of eCommerce.</p>
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
                    <img src="/assets/images/icons/growth.svg" alt="Sales" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Sales Optimized</h3>
                    <p class="text-white-50">Every pixel is designed to convert visitors into loyal, paying customers.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/search-engine.svg" alt="Payments" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Secure Payments</h3>
                    <p class="text-white-50">Integration with major UAE payment gateways like Checkout.com, Telr, and more.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center p-4 w-100" style="background: rgba(255,255,255,0.05); border-radius: 20px;">
                    <img src="/assets/images/icons/backend.svg" alt="Mobile" width="70" class="mb-3">
                    <h3 class="text-white h4 mb-3">Mobile First</h3>
                    <p class="text-white-50">Your store will look and work perfectly on all smartphones and tablets.</p>
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
                    <span class="text-uppercase text-white fs-18 mb-4 d-block" style="letter-spacing: 2px;">ECOMMERCE <span style="color: <?= $theme_color ?>;">.</span></span>
                    <h2 class="text-white mb-4">Our <?= $service_name ?> Store Portfolio</h2>
                    <p class="text-white-50 fs-20 mb-3">Check out some of the high-growth eCommerce brands we've helped build and scale on Shopify.</p>
                    <a href="/case-study/" class="view-all-link">View All Stores</a>
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
        <h2 class="text-center text-white mb-5 pb-lg-4">Our <?= $service_name ?> Launch Roadmap</h2>
        <div class="timeline-container position-relative">
            <div class="d-none d-md-block position-absolute start-50 translate-middle-x h-100" style="width: 2px; background: linear-gradient(to bottom, <?= $theme_color ?>, rgba(150, 191, 72, 0.1)); top: 0;"></div>
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
                        <div class="step-circle d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #111; border: 3px solid <?= $theme_color ?>; z-index: 10; box-shadow: 0 0 20px rgba(150, 191, 72, 0.3);">
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
    .process-card:hover { background: rgba(150, 191, 72, 0.1) !important; border-color: <?= $theme_color ?> !important; transform: scale(1.03); }
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
        <h2 class="text-white mb-3">Ready to Scale Your Sales?</h2>
        <p class="text-white-50 mb-4 fs-20">Let's discuss how <?= $service_name ?> can take your business to the next level.</p>
        <a href="#contact-section" class="btn btn-light btn-lg px-5">Start Your Store</a>
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
                                Why is Shopify better than other platforms?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#mainAccordion">
                            <div class="accordion-body">
                                <p>Shopify is a dedicated eCommerce platform that offers unmatched security, ease of use, and a massive app ecosystem. Unlike custom-built platforms, Shopify handles hosting, PCI compliance, and speed optimization out of the box, allowing you to focus on selling.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
