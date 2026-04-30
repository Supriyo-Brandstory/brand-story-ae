<section>
    <!-- style="background: url('/assets/images/industries/b2b-corporate-marketing-services-banner.webp') no-repeat center center; background-size: cover;" -->
    <!-- <div class="new_about_us-banner-container">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="mb-4 text-white">Best Website Design Company in Dubai, UAE</h1>
                    <p class="fs-18 text-white">
                        Your website’s UI/UX shapes the first impression of your brand. BrandStory designs intuitive, user-focused interfaces and modern websites that enhance usability, engagement, and real business growth. We are a leading website design agency in Dubai, UAE helping brands scale fast.

                    </p>
                    <a href="/contact" class="Performance-Driven-btn mt-5" bis_skin_checked="1">➤ Get a Free Quote</a>
                </div>
            </div>
        </div> -->
    <!-- <div style="max-width: 1400px; margin: 0 auto"> -->
    <div class='py-2 py-md-5' style="max-width: 1000px; margin: 0 auto">
        <h1 class="mb-0 mb-md-4 text-white s-center">Web Design Company in Dubai</h1>
        <!-- <p class="fs-18 text-white text-center">
                    Your website’s UI/UX shapes the first impression of your brand. BrandStory designs intuitive, user-focused interfaces and modern websites that enhance usability, engagement, and real business growth. We are a leading website design agency in Dubai, UAE helping brands scale fast.
                </p> -->
    </div>
    <!-- </div> -->
    <div class="swiper web-templates-swiper">
        <div class="swiper-wrapper">
            <?php
            $templates = [
                'sand-sollar.webp',
                'travelex.webp',
                'crystal-plaza.webp',
                'nims.webp',
                'wipro.webp',
                'nanoprecise.webp'
            ];

            foreach ($templates as $template):
                $displayName = str_replace('.webp', '', $template);
                $displayName = ucwords(str_replace('-', ' ', $displayName));
            ?>
                <div class="web-template-item swiper-slide">
                    <div class="web-template-img-wrap">
                        <img
                            src="/assets/images/case-study/<?php echo $template; ?>"
                            alt="<?php echo $displayName; ?>"
                            loading="lazy">
                    </div>
                    <!-- <div class="web-template-meta">
                        <span class="web-template-name"><?php echo $displayName; ?></span>
                        <a href="#" class="web-template-link">Preview →</a>
                    </div> -->
                </div>
            <?php endforeach; ?>
            <!-- </div> -->
            <!-- Optional Navigation -->
            <!-- <div class="swiper-button-next template-next"></div>
            <div class="swiper-button-prev template-prev"></div> -->
        </div>
        <div class='py-5' style="max-width: 1000px; margin: 0 auto">
            <h2 class="mb-4 text-white s-center">Website Design That Accelerates Growth</h2>
            <p class="fs-18 text-white s-center">
                Your website shapes the first impression of your brand. BrandStory designs intuitive, user-focused modern websites that enhance usability, engagement, and real business growth. We are a leading website design agency in Dubai, UAE helping brands scale fast.
            </p>
        </div>
        <div class="text-center d-flex justify-content-center align-items-center">
            <a href="/contact" class="Performance-Driven-btn mb-5" bis_skin_checked="1">➤ Get a Free Quote</a>
        </div>

        <!-- </div> -->
</section>

<section class="seo-marquee">
    <div class="seo-marquee-wrapper">
        <div class="seo-marquee-track">

            <a href="/wordpress-development-company-in-dubai" class="seo-marquee-item">WordPress Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <a href="/magento-website-development-dubai" class="seo-marquee-item">Magento Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <a href="/drupal-website-development-company-in-dubai" class="seo-marquee-item">Drupal Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <a href="/ecommerce-development-company-dubai" class="seo-marquee-item">E-commerce Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <!-- same 6 items repeated for loop -->
            <a href="/wordpress-development-company-in-dubai" class="seo-marquee-item">WordPress Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <a href="/magento-website-development-dubai" class="seo-marquee-item">Magento Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <a href="/drupal-website-development-company-in-dubai" class="seo-marquee-item">Drupal Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <a href="/ecommerce-development-company-dubai" class="seo-marquee-item">E-commerce Web Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

            <a href="/ui-ux-design-company-in-dubai" class="seo-marquee-item">UI/UX Design</a>
            <span class="seo-marquee-sep text-white">يلا</span>

        </div>
    </div>
</section>


<section class="dm-bg sp-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-white">Creative-First Website Design Company</h2>
                <p class="fs-20 text-white mb-3">BrandStory is a creative-first website design company in Dubai that crafts visually stunning websites with a strong UX focus. With 10+ years of experience in web design, we transform the user journey into a seamless, engaging, and conversion-driven visual experience.</p>
                <p class="fs-20 text-white">We design websites that resonate with Dubai's diverse and fast-paced audience. Our deep understanding of local market trends, cultural nuances, and business expectations helps us craft websites that connect with your customers.</p>
            </div>
            <div class="col-md-6 align-self-center">
                <img class="w-100 mb-md-0 mb-3 mt-3 mt-md-0" src="/assets/images/new-website-design-company-in-dubai/website-dubai.webp" alt="Creative Website Design Solutions">
            </div>
        </div>
    </div>
</section>

<section class="new-client-section">
    <div class="container-fluid">
        <h2 class="text-center mb-5 text-white">Our Valuable Clients</h2>
        <?php include __DIR__ . '/../component/client_section.php' ?>

    </div>
</section>

<section class="vidsec dm-bg">
    <div class="perks-vide-bg sp-50 position-relative">

        <div class="perks-content position-relative">
            <div class="container perkshd position-relative">
                <h2 class="mb-lg-5 mb-4 text-white text-md-start text-center">More Than Website Design<br> We Create Digital Excellence
                </h2>
            </div>
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="irresistible-main text-md-start text-center">
                            <img class="mb-4" src="/assets/images/new-website-design-company-in-dubai/irresistible1.png" alt="Website with Stunning Visuals">
                            <h3 class="mb-3">Stunning Visuals</h3>
                            <p class="mb-0">From drafting layouts to building websites, our expert designers work tirelessly to make it look visually appealing.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="irresistible-main text-md-start text-center">
                            <img class="mb-4" src="/assets/images/new-website-design-company-in-dubai/irresistible2.png" alt="Website Content That Connects Audiance">
                            <h3 class="mb-3">Content that Connects</h3>
                            <p class="mb-0">We create content for the end-users so that they get the right information every time and convert them into potential customers.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="irresistible-main text-md-start text-center">
                            <img class="mb-4" src="/assets/images/new-website-design-company-in-dubai/irresistible3.png" alt="Easy Navigation Features">
                            <h3 class="mb-3">Simple & Powerful Navigation</h3>
                            <p class="mb-0">User-friendly layout and simple navigation make it easier for users to switch between pages by clicking buttons.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="irresistible-main text-md-start text-center">
                            <img class="mb-4" src="/assets/images/new-website-design-company-in-dubai/irresistible4.png" alt="Supirior User Experience">
                            <h3 class="mb-3">UX That Delights</h3>
                            <p class="mb-0">We design the user experience (UX) based on the business requirements and make a lead-generating platform rather than a simple website.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="irresistible-main text-md-start text-center">
                            <img class="mb-4" src="/assets/images/new-website-design-company-in-dubai/irresistible5.png" alt="Device-specific Optimization">
                            <h3 class="mb-3">Optimized for Any Device</h3>
                            <p class="mb-0">We keep track of loading speed and device compatibility. We design websites that look appealing on almost every device.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center">
                        <div class="irresistible-main2">
                            <div class="irresistible-btn">
                                <a class="fs-20" href="/contact">Start Your Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="web-why-choose sp-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>Website Design Technologies</h2>
                </div>
                <p class="fs-20 mt-4 mb-4 mt-md-5">We use modern design tools and technologies like Adobe Photoshop, Adobe Illustrator, HTML5, CSS, Bootstrap, and JavaScript to create visually appealing and user-friendly websites. Our focus is on delivering clean layouts, engaging visuals, and seamless user experiences that reflect your brand and capture your audience’s attention. </p>
            </div>
        </div>
        <div class="col-md-12">
            <h4>Our Web Design Expertise</h4>
            <div class="site--slider mt-4"><!--slider start-->
                <div class="swiper ods-logos">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-1.png" class="img-fluid" alt="Adobe Photoshop"></div>
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-2.png" class="img-fluid" alt="Adobe Illustrator"></div>
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-3.png" class="img-fluid" alt="Figma"></div>
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-4.png" class="img-fluid" alt="HTML"></div>
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-5.png" class="img-fluid" alt="CSS3"></div>
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-6.png" class="img-fluid" alt="Bootstrap"></div>
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-7.png" class="img-fluid" alt="JavaScript"></div>
                        <div class="swiper-slide"><img src="/assets/images/service/website-design/other-logo-9.png" class="img-fluid" alt="Opencart"></div>
                    </div>
                    <div class="swiper-pagination ods-pagi"></div>
                </div>
            </div><!--slider start-->
        </div>
    </div>
    </div>
</section>


<!-- Section: Our Web Development Services -->
<section class="dm-bg text-white py-5 web-development-services">
    <div class="container">
        <h2 class="text-white mb-md-4 mb-3 text-md-start text-center">Web Design & Development Platforms</h2>
        <p class="text-white mb-md-5 mb-3 fs-20 text-md-start text-center">BrandStory is a leading web design and <a class="text-decoration-underline text-white" href="/website-development-company-in-dubai">web development agency in Dubai</a>, helping brands build a strong and impactful
            digital presence. Our expert web designers craft visually engaging, user-focused website designs that enhance brand visibility, engage visitors, and support meaningful business
            growth.</p>

        <div class="row g-0">

            <!-- Card -->
            <div class="col-md-4">
                <div class="  development dm-bg text-white border-0">
                    <div class="service-card">
                        <div class="row mb-3">
                            <div class="col-6 text-start">
                                <a href="/website-development-company-in-dubai" style="text-decoration: none;"> <img src="/assets/images/icons/custom-web-development.svg" alt="Web Development" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/website-development-company-in-dubai" style="text-decoration: none;"> <img src="/assets/images/icons/web-development-arrow.svg" alt="Website Design" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/website-development-company-in-dubai" style="text-decoration: none; color: #FFF;">Custom Web Development</a></h5>
                        <p class="small">Custom websites are popular choice among small and large-scale enterprises, and service providers in Dubai. We design custom websites from a single landing page to complex websites based on business-specific requirements. We build tech-enabled custom websites with modern tech stack that load fast and have no errors. </p>
                    </div>
                </div>
                <div class="development dm-bg text-white border-0">
                    <div class="service-card">
                        <div class="row mb-3">
                            <div class="col-6 text-start">
                                <a href="/nextjs-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/nextjs.svg" alt="Web Development" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/nextjs-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/web-development-arrow.svg" alt="Next JS Development" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/nextjs-development-company-in-dubai" style="text-decoration: none; color: #FFF;">Next JS Development</a></h5>
                        <p class="small">Build your lightning-fast, SEO-friendly websites/ web applications with our expert Next.js development services. We build tech-savvy enterprise-grade website platforms, ensuring a smooth user experience and seamless backend system integration. </p>
                    </div>
                </div>
                <div class="development  dm-bg text-white border-0 height-553 ">
                    <div class="service-card border-0 h-100">
                        <div class="row mb-3">
                            <div class="col-6 text-start">
                                <a href="/magento-website-development-dubai/" style="text-decoration: none;"> <img src="/assets/images/icons/magento.svg" alt="magento" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/magento-website-development-dubai/" style="text-decoration: none;"> <img src="/assets/images/icons/web-development-arrow.svg" alt="Magento" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/magento-website-development-dubai/" style="text-decoration: none; color: #FFF;"> Magento</a></h5>
                        <p class="small">Magento provides robust scalability and customization options, ideal for e-commerce businesses looking for high-end solutions. Multiple payment options and advanced product management make it the preferred choice for businesses. We create scalable and intuitive e-commerce portals in Magento with the latest features.   </p>
                    </div>
                </div>
            </div>

            <!-- PHP Laravel Development -->
            <div class="col-md-4">
                <div class="development dm-bg text-white border-0">
                    <div class="service-card">
                        <div class="row mb-3 mt-90">
                            <div class="col-6 text-start">
                                <a href="/laravel-development-company-in-dubai/" style="text-decoration: none;"><img src="/assets/images/icons/laravel.svg" alt="Web Development" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/laravel-development-company-in-dubai/" style="text-decoration: none;"><img src="/assets/images/icons/web-development-arrow.svg" alt="PHP Laravel Development" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/laravel-development-company-in-dubai/" style="text-decoration: none; color: #FFF;">PHP Laravel Development</a></h5>
                        <p class="small">Are you searching for PHP Laravel website development services in Dubai? Our team of experts creates custom web solutions in PHP and the latest framework, Laravel. PHP Laravel is one of the most popular web development frameworks that comes with more security features, faster development cycle, and latest features. </p>
                    </div>
                </div>
                <div class="development dm-bg text-white border-0">
                    <div class="service-card">
                        <div class="row mb-3 mt-90">
                            <div class="col-6 text-start">
                                <a href="/wordpress-development-company-in-dubai/" style="text-decoration: none;"> <img src="/assets/images/icons/wordpress.svg" alt="Web Development" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/wordpress-development-company-in-dubai/" style="text-decoration: none;"> <img src="/assets/images/icons/web-development-arrow.svg" alt="WordPress" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5> <a href="/wordpress-development-company-in-dubai/" style="text-decoration: none; color: #fff;">WordPress</a></h5>
                        <p class="small">WordPress is the most popular CMS platform, enriched with a vast plugin ecosystem. Ideal for e-commerce, business websites, and blogging websites, it comes with SEO-friendly features. If you are looking for WordPress websites, BrandStory can be your tech partner. </p>
                    </div>
                </div>
                <div class="development  dm-bg text-white border-0">
                    <div class="service-card border-0 ">
                        <div class="row mb-3 mt-50">
                            <div class="col-6 text-start">
                                <a href="/wix-development-company-in-dubai/" style="text-decoration: none;"> <img src="/assets/images/icons/wix.svg" alt="Web Development" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/wix-development-company-in-dubai/" style="text-decoration: none;"> <img src="/assets/images/icons/web-development-arrow.svg" alt="Wix" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/wix-development-company-in-dubai/" style="text-decoration: none; color: #FFF;">Wix</a></h5>
                        <p class="small">Wix offers a user-friendly no-code platform for building stunning and responsive websites. It’s ideal for small businesses, portfolios, and startups looking to launch with style. Our Wix experts design and customize professional websites that align with your brand and business goals.</p>
                    </div>
                </div>
            </div>

            <!-- Angular -->
            <div class="col-md-4">
                <div class="development dm-bg text-white border-0">
                    <div class="service-card">
                        <div class="row mb-3">
                            <div class="col-6 text-start">
                                <a href="/angular-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/angular.svg" alt="Web Development" class="Angular Development" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/angular-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/web-development-arrow.svg" alt="Website Design" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/angular-development-company-in-dubai" style="text-decoration: none; color: #FFF;">Angular Development</a></h5>
                        <p class="small">Looking for dynamic and high-performance web applications? Our Angular developers engineer seamless front-end experiences that are fast, responsive, and load quickly. Whether it is a single-page website, media-rich design, or a complex dashboard, we work on clean code architecture with seamless integration. </p>
                    </div>
                </div>
                <div class=" development  dm-bg text-white border-0">
                    <div class="service-card">
                        <div class="row mb-3">
                            <div class="col-6 text-start">
                                <a href="/shopify-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/shopify.svg" alt="Web Development" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/shopify-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/web-development-arrow.svg" alt="Shopify" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/shopify-development-company-in-dubai" style="text-decoration: none; color: #FFF;">Shopify</a></h5>
                        <p class="small">Shopify is an e-commerce platform and a preferred choice for its scalability, ease of use, and robust features. As a Shopify development company, we create visually stunning and high-converting online stores for businesses. It enables better product management, secure payments, multi-channel selling, and built-in SEO features.</p>
                    </div>
                </div>
                <div class="development dm-bg text-white border-0 height-529 ">
                    <div class="service-card border-0 h-100 ">
                        <div class="row mb-3">
                            <div class="col-6 text-start">
                                <a href="/webflow-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/webflow.svg" alt="Web Development" class="img-fluid" style="width: 100px; height: 100px; object-fit: contain;"></a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="/webflow-development-company-in-dubai" style="text-decoration: none;"><img src="/assets/images/icons/web-development-arrow.svg" alt="Webflow" class="img-fluid" style="width: 35px;"></a>
                            </div>

                        </div>
                        <h5><a href="/webflow-development-company-in-dubai" style="text-decoration: none; color: #FFF;">Webflow</a></h5>
                        <p class="small">We specialize in creating pixel-perfect webflow sites that load fast, are SEO-friendly, and visually striking. From animations, UI, to CMS integration, we provide tailored solutions for businesses looking for website development in Dubai. </p>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>


<section class="dm-bg sp-50">
    <div class="container">
        <h2 class="text-white mb-4 text-md-start text-center">Our Web Design Process</h2>
        <img class="w-100 d-md-block d-none" src="/assets/images/new-website-design-company-in-dubai/wd-process.png" alt="Website Design and Development Process - Brandstory">
        <div class="d-md-none d-block">
            <img class="w-100 mb-3" src="/assets/images/new-website-design-company-in-dubai/wd-process-mbl1.png" alt="Website Development Process - Phase 1">
            <img class="w-100 mb-3" src="/assets/images/new-website-design-company-in-dubai/wd-process-mbl2.png" alt="Website Development Process - Phase 2">
            <img class="w-100 mb-3" src="/assets/images/new-website-design-company-in-dubai/wd-process-mbl3.png" alt="Website Development Process - Phase 3">
            <img class="w-100 mb-3" src="/assets/images/new-website-design-company-in-dubai/wd-process-mbl4.png" alt="Website Development Process - Phase 4">
        </div>
    </div>
</section>


<section class="dm-bg sp-50">
    <div class="container">
        <h2 class="text-white mb-4 text-md-start text-center">Why Choose BrandStory As
            <span class="db">Website Design Partner in Dubai</span>
        </h2>
        <p class="fs-20 text-white mb-5 text-md-start text-center">BrandStory is a Dubai-based agency with a strong presence across the UAE and MENA regions. As a trusted partner for 1000+ businesses, we specialise in <a class="text-decoration-underline text-white" href="/ui-ux-design-company-in-dubai/">UI/UX design</a> and website design that blends creativity with user-focused functionality. Our team crafts visually engaging, intuitive designs that enhance user experience and help brands connect, engage, and grow effectively.</p>
        <div class="row g-4">
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center">
                    <img src="/assets/images/new-website-design-company-in-dubai/partner1.png" alt="We Have Extensive Portfolio">
                    <h3 class="text-white mb-2">Extensive Portfolio</h3>
                    <p class="fs-20 text-white">We have worked with top brands across Dubai and the UAE for website development, branding, and digital marketing services</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center">
                    <img src="/assets/images/new-website-design-company-in-dubai/partner2.png" alt="We Have Expert Team of Developers">
                    <h3 class="text-white mb-2">Expert Team</h3>
                    <p class="fs-20 text-white">We have a skilled web design and development team ensuring top-notch solutions are delivered to the clients</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center">
                    <img src="/assets/images/new-website-design-company-in-dubai/partner3.png" alt="We Follow Secure Coding Practices">
                    <h3 class="text-white mb-2">Secure Coding Practices</h3>
                    <p class="fs-20 text-white">We believe in secure coding practices and keeping websites out of spam and data breaches</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center">
                    <img src="/assets/images/new-website-design-company-in-dubai/partner4.png" alt="We Deliver Responsive Designs">
                    <h3 class="text-white mb-2">Responsive Design</h3>
                    <p class="fs-20 text-white">We create websites that work seamlessly on all devices (mobile, desktop, and tablets)</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center">
                    <img src="/assets/images/new-website-design-company-in-dubai/partner5.png" alt="Robust Quality Assurance and Testing Process">
                    <h3 class="text-white mb-2">Robust Testing & QA</h3>
                    <p class="fs-20 text-white">We ensure bug-free and smooth website performance with a series of quality assurance checks before final delivery</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="wd-partner-main text-center">
                    <img src="/assets/images/new-website-design-company-in-dubai/partner6.png" alt="Timely Delivery of Projects">
                    <h3 class="text-white mb-2">Timely Project Delivery</h3>
                    <p class="fs-20 text-white">We streamline agile workflow and best practices for faster and more efficient project delivery</p>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="dm-counter-sec sp-50 dm-bg d-none d-md-block">
    <div class="container">
        <div class="row gx-md-0 justify-content-center">
            <div class="col-lg-4 col-6">
                <div class="dm-conter-main text-center">
                    <span class="dm-count-num">500+</span>
                    <h3 class="text-white">Projects Delivered</h3>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="dm-conter-main text-center ps-lg-5">
                    <span class="dm-count-num">10+</span>
                    <h3 class="text-white">Years of Expertise</h3>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="dm-conter-main text-center  ps-lg-5">
                    <span class="dm-count-num">1,000+</span>
                    <h3 class="text-white">Happy Clients</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
/*
<section class="web-templates-section">
    <div class="web-templates-header">
        <h2>Our Website Design Samples</h2>
        <p>Industry-specific designs optimized for performance and conversions.</p>
    </div>

    <div class="web-templates-track-wrapper p-0">
        <div class="swiper web-templates-swiper">
            <div class="swiper-wrapper">
                <?php 
                $templates = [
                    'automotive.webp',
                    'healthcare.webp',
                    'law-firm.webp',
                    'real-estate.webp',
                    'technology.webp'
                ];

                foreach ($templates as $template):
                    $displayName = str_replace('.webp', '', $template);
                    $displayName = ucwords(str_replace('-', ' ', $displayName));
                ?>
                <div class="web-template-item swiper-slide">
                    <div class="web-template-img-wrap">
                        <img
                            src="/assets/images/web-templates/<?php echo $template; ?>"
                            alt="<?php echo $displayName; ?>"
                            loading="lazy"
                        >
                    </div>
                    <div class="web-template-meta">
                        <span class="web-template-name"><?php echo $displayName; ?></span>
                        <a href="#" class="web-template-link">Preview →</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next template-next"></div>
            <div class="swiper-button-prev template-prev"></div>
        </div>
    </div>
</section>


<section class="portrait-samples-section">
    <div class="web-templates-header">
        <h2>Our Website Design Samples</h2>
        <p>Industry-specific designs optimized for performance and conversions.</p>
    </div>

    <div class="portrait-samples-wrapper">
        <div class="portrait-samples-track">
            <?php 
            $templates = [
                'automotive.webp',
                'healthcare.webp',
                'law-firm.webp',
                'real-estate.webp',
                'technology.webp'
            ];

            foreach ($templates as $template):
                $displayName = str_replace('.webp', '', $template);
                $displayName = ucwords(str_replace('-', ' ', $displayName));
            ?>
            <div class="portrait-sample-item">
                <div class="portrait-sample-img-wrap">
                    <img
                        src="/assets/images/web-templates/<?php echo $template; ?>"
                        alt="<?php echo $displayName; ?>"
                        loading="lazy"
                    >
                </div>
                <div class="portrait-sample-meta">
                    <span class="portrait-sample-name"><?php echo $displayName; ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

*/
?>

<section class="dm-industries-sec sp-50 dm-bg">
    <div class="container">
        <h2 class="mb-lg-5 mb-4 text-white text-md-start text-center">Serving Diverse<br>
            Industries for a Decade
        </h2>
        <div class="row g-3">
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img1.png?v=1" alt="Website Design for Education Instutions in Dubai">
                        <h3 class="text-white text-center">Education</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3 show-indus-icon"><a href="/industries/education-web-design-development-agency-in-dubai-uae/">Education <span class="hide-indu-icon">⇗</span></a></h3>
                        <p class="fs-20 text-center mb-3">
                            As a leading web design and digital marketing agency, we have helped many universities, colleges, training institutions, and schools in Dubai build a strong and impactful online presence.
                        </p>
                        <h3 class="text-center mb-3">Services Offered</h3>
                        <p class="fs-20 text-center">
                            <a href="/">Digital marketing</a> |
                            <a href="/seo-services-in-dubai/">SEO</a> |
                            <a href="/pay-per-click-ppc-services-in-dubai/">PPC</a> |
                            <a href="/website-design-company-in-dubai/">Web Design</a> |
                            <a href="/website-development-company-in-dubai/">Web Development</a> |
                            <a href="/ui-ux-design-company-in-dubai/">UI/UX Design</a> |
                            <a href="/social-media-marketing-agency-in-dubai/">Social Media</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img2.png?v=1" alt="Website Design for E-commerce Businesses in Dubai">
                        <h3 class="text-white text-center">eCommerce</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3 show-indus-icon"><a href="/industries/e-commerce-web-design-development-agency-in-dubai-uae/">eCommerce <span class="hide-indu-icon">⇗</span></a></h3>
                        <p class="fs-20 text-center mb-3">BrandStory, a leading web design and digital marketing agency, is the top choice for e-commerce businesses to grow their audience, increase lead flow, and scale faster.
                        </p>
                        <h3 class="text-center mb-3">Services Offered</h3>
                        <p class="fs-20 text-center">
                            <a href="/">Digital marketing</a> |
                            <a href="/seo-services-in-dubai/">SEO</a> |
                            <a href="/pay-per-click-ppc-services-in-dubai/">PPC</a> |
                            <a href="/website-design-company-in-dubai/">Web Design</a> |
                            <a href="/website-development-company-in-dubai/">Web Development</a> |
                            <a href="/ui-ux-design-company-in-dubai/">UI/UX Design</a> |
                            <a href="/social-media-marketing-agency-in-dubai/">Social Media</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img3.png?v=1" alt="Website Design for Healthcare Sectors in Dubai">
                        <h3 class="text-white text-center">Healthcare</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3 show-indus-icon"><a href="/industries/healthcare-web-design-development-agency-in-dubai-uae/">Healthcare <span class="hide-indu-icon">⇗</span></a></h3>
                        <p class="fs-20 text-center mb-3">We are the go-to web design and digital marketing company for hospitals, medical stores, and pharma in the UAE.</p>
                        <h3 class="text-center mb-3">Services Offered</h3>
                        <p class="fs-20 text-center">
                            <a href="/">Digital marketing</a> |
                            <a href="/seo-services-in-dubai/">SEO</a> |
                            <a href="/pay-per-click-ppc-services-in-dubai/">PPC</a> |
                            <a href="/website-design-company-in-dubai/">Web Design</a> |
                            <a href="/website-development-company-in-dubai/">Web Development</a> |
                            <a href="/ui-ux-design-company-in-dubai/">UI/UX Design</a> |
                            <a href="/social-media-marketing-agency-in-dubai/">Social Media</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img4.png?v=1" alt="Website Design Services for Real Estate Companies in Dubai">
                        <h3 class="text-white text-center">Real Estate</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3 show-indus-icon"><a href="/industries/real-estate-web-design-development-agency-in-dubai-uae/">Real Estate <span class="hide-indu-icon">⇗</span></a></h3>
                        <p class="fs-20 text-center mb-3">We also provide website design and digital marketing services for real estate businesses in Dubai to improve online presence.</p>
                        <h3 class="text-center mb-3">Services Offered</h3>
                        <p class="fs-20 text-center">
                            <a href="/">Digital marketing</a> |
                            <a href="/seo-services-in-dubai/">SEO</a> |
                            <a href="/pay-per-click-ppc-services-in-dubai/">PPC</a> |
                            <a href="/website-design-company-in-dubai/">Web Design</a> |
                            <a href="/website-development-company-in-dubai/">Web Development</a> |
                            <a href="/branding-agency-in-dubai/">Branding</a> |
                            <a href="/ui-ux-design-company-in-dubai/">UI/UX Design</a> |
                            <a href="/social-media-marketing-agency-in-dubai/">Social Media</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img5.png?v=1" alt="Website Design Services for Travel Agencies in Dubai">
                        <h3 class="text-white text-center">Travel</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3 show-indus-icon"><a href="/industries/tourism-web-design-development-dubai-uae/">Travel <span class="hide-indu-icon">⇗</span></a></h3>
                        <p class="fs-20 text-center mb-3">We partner with travel agencies in Dubai to boost engagement and outperform competitors with innovative and advanced digital strategies. </p>
                        <h3 class="text-center mb-3">Services Offered</h3>
                        <p class="fs-20 text-center mb-3">
                            <a href="/">Digital marketing</a> |
                            <a href="/seo-services-in-dubai/">SEO</a> |
                            <a href="/pay-per-click-ppc-services-in-dubai/">PPC</a> |
                            <a href="/website-design-company-in-dubai/">Web Design</a> |
                            <a href="/website-development-company-in-dubai/">Web Development</a> |
                            <a href="/branding-agency-in-dubai/">Branding</a> |
                            <a href="/ui-ux-design-company-in-dubai/">UI/UX Design</a> |
                            <a href="/social-media-marketing-agency-in-dubai/">Social Media</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="industries-main position-relative">
                    <div class="industires-image position-relative">
                        <img class="w-100" src="/assets/images/dm-agency-dubai/industries-img6.png?v=1" alt="Website Design Services for Technology Companies in Dubai">
                        <h3 class="text-white text-center">Technology</h3>
                    </div>
                    <div class="industries-cnts">
                        <h3 class="text-center mb-3 show-indus-icon"><a href="/industries/b2b-web-design-development-agency-in-dubai-uae/">Tech Companies <span class="hide-indu-icon">⇗</span></a></h3>
                        <p class="fs-20 text-center mb-3">We are a full-service web design and marketing agency in Dubai, worked with many corporate businesses to improve their online presence. </p>
                        <h3 class="text-center mb-3">Services Offered</h3>
                        <p class="fs-20 text-center">
                            <a href="/">Digital marketing</a> |
                            <a href="/seo-services-in-dubai/">SEO</a> |
                            <a href="/pay-per-click-ppc-services-in-dubai/">PPC</a> |
                            <a href="/website-design-company-in-dubai/">Web Design</a> |
                            <a href="/website-development-company-in-dubai/">Web Development</a> |
                            <a href="/branding-agency-in-dubai/">Branding</a> |
                            <a href="/ui-ux-design-company-in-dubai/">UI/UX Design</a> |
                            <a href="/social-media-marketing-agency-in-dubai/">Social Media</a>
                        </p>
                    </div>
                </div>
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

<?php
$reviewSection = [
    'title' =>  "The Impact We've Delivered <br>for Our Clients",
    'bgClass' => 'dm-bg', // optional custom class
];
include __DIR__ . '/../component/client_reviews.php';
?>

<section class="dm-grow-section dm-bg sp-50">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Contact Web Design
            <span class="db">Experts in Dubai- BrandStory
        </h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="growimg position-relative mb-lg-0 mb-3">
                    <img class="w-100" src="/assets/images/new-website-design-company-in-dubai/contact.png" alt="Talk to Our Experts">
                    <div class="growimg-cnt">
                        <p class="mb-md-5 mb-3 text-white fs-20">Our experts understand your needs and create responsive web designs with SEO best practices, using advanced technologies like AI integration. BrandStory is a leading web design company in Dubai, delivering innovative and premium website solutions.</p>
                        <div class="grow-btn d-flex">
                            <a href="/contact/">Talk to Our Experts</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="grow-form-main">
                    <?php $textrow = 6 ?>
                    <?php include __DIR__ . '/../component/forms/contact-form.php'; ?>
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
                    <li class="mb-3"><a class="text-white fs-20" href="tel:+971 52 283 1655"><img class="me-2" src="/assets/images/dm-agency-dubai/dubai-phone.svg?v=1">+971 52 283 1655</a></li>
                    <li class="mb-md-0 mb-3"><a class="text-white fs-20" href="mailto:info@brandstory.ae"><img class="me-2" src="/assets/images/dm-agency-dubai/dubai-mail.svg?v=1">info@brandstory.ae</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start">
                    <img class="me-3" src="/assets/images/dm-agency-dubai/dubai-location.svg?v=1">
                    <div class="dubai-address">
                        <h3 class="mb-2 text-white">Visit Our Dubai Office</h3>
                        <p class="fs-20 mb-0"><a class="text-white text-decoration-underline" target="_blank" href="https://www.google.com/search?sca_esv=5aa11a5588fe31d3&kgmid=/g/11jn2396qs&q=Brandstory&shndl=30&shem=lcuae,lste,uaasie&source=sh/x/loc/uni/m1/1&kgs=0f7c634ee2c79aaf">G5, Al Meheri Plaza, opp DBC Building, Al Khabaisi Area, Deira Dubai- 81577, United Arab Emirates</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="sp-50 dm-blog-section dm-bg">
    <div class="container">
        <h2 class="text-white mb-4 text-md-start text-center">Latest Industry Insights</h2>
        <div class="position-relative delivertechmain">
            <div class="swiper dmblog-sld">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="latest-blog-main helpful">
                            <img class="w-100 dm-blog-img" src="/assets/images/new-website-design-company-in-dubai/blog1.png">
                            <h3>Custom Web Design and Development for Building Unique Online Experiences</h3>
                            <p class="fs-20">In today’s fast-paced digital era, businesses have grown tired of cookie-cutter websites just serving as an online presence.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/custom-web-design-and-development-for-building-unique-online-experiences/">Know more <img src="/assets/images/dm-agency-dubai/readmore-arrow.svg?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main helpful">
                            <img class="w-100 dm-blog-img" src="/assets/images/new-website-design-company-in-dubai/blog2.png">
                            <h3>How Video Content Enhances User Engagement in Web Design</h3>
                            <p class="fs-20">From a strategic standpoint, the design of any commercial venture today has to contend with the ever-increasing competition for user attention.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/how-video-content-enhances-user-engagement-in-web-design/">Know more <img src="/assets/images/dm-agency-dubai/readmore-arrow.svg?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main helpful">
                            <img class="w-100 dm-blog-img" src="/assets/images/new-website-design-company-in-dubai/blog3.png">
                            <h3>Top Web Development Trends in 2025: What Businesses Must Know</h3>
                            <p class="fs-20">Digital innovation thrives in Dubai, and so does the evolution of the web development domain in the city.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/top-web-development-trends-in-dubai-2025-what-businesses-must-know/">Know more <img src="/assets/images/dm-agency-dubai/readmore-arrow.svg?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main helpful">
                            <img class="w-100 dm-blog-img" src="/assets/images/new-website-design-company-in-dubai/blog4.png">
                            <h3>Which is The Right Type of Website for Your Business: Dynamic, Static, or Custom CMS?</h3>
                            <p class="fs-20">When seeking a business website, the first question in mind is “What type of website will be suitable for my business?</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/which-is-the-right-type-of-website-for-your-business-dynamic-static-or-custom-cms/">Know more <img src="/assets/images/dm-agency-dubai/readmore-arrow.svg?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main helpful">
                            <img class="w-100 dm-blog-img" src="/assets/images/new-website-design-company-in-dubai/blog5.png">
                            <h3>Importance of design in e-commerce website user experience</h3>
                            <p class="fs-20">Web design is a crucial factor in any website design, especially for e-commerce websites.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/importance-of-design-in-ecommerce-website-user-experience/">Know more <img src="/assets/images/dm-agency-dubai/readmore-arrow.svg?v=1"></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="latest-blog-main helpful">
                            <img class="w-100 dm-blog-img" src="/assets/images/new-website-design-company-in-dubai/blog6.png">
                            <h3>The Most Important Elements of A Website Design</h3>
                            <p class="fs-20">In UAE, 99% of the population belongs to the active internet users category.</p>
                            <div class="casestydies-readmore">
                                <a href="/blogs/the-most-important-elements-of-a-website-design/">Know more <img src="/assets/images/dm-agency-dubai/readmore-arrow.svg?v=1"></a>
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


            <div class="tab-content" id="pills-tabContent">
                <!-- Website Design Start -->
                <div class="tab-pane fade show active" id="pills-design" role="tabpanel" aria-labelledby="pills-design-tab">
                    <div class="accordion accordion-flush" id="accordionDesign">

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="design-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#design-collapseOne" aria-expanded="false" aria-controls="design-collapseOne">
                                    Why Do I Need a Website?
                                </button>
                            </h4>
                            <div id="design-collapseOne" class="accordion-collapse collapse" aria-labelledby="design-headingOne" data-bs-parent="#accordionDesign">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">A website acts as your digital storefront, helping your business build an online presence, attract customers, and stay accessible 24/7. It enhances your visibility and strengthens your brand identity in a competitive market.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="design-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#design-collapseTwo" aria-expanded="false" aria-controls="design-collapseTwo">
                                    How Does Website Design Help Build a Trustworthy Brand?
                                </button>
                            </h4>
                            <div id="design-collapseTwo" class="accordion-collapse collapse" aria-labelledby="design-headingTwo" data-bs-parent="#accordionDesign">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">A well-designed website reflects professionalism, improves user experience, and builds trust. Clean layouts, strong visuals, and easy navigation create a positive first impression and enhance your brand credibility.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="design-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#design-collapseThree" aria-expanded="false" aria-controls="design-collapseThree">
                                    What Design Approach You Take for Brands?
                                </button>
                            </h4>
                            <div id="design-collapseThree" class="accordion-collapse collapse" aria-labelledby="design-headingThree" data-bs-parent="#accordionDesign">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">We align your website design with your brand identity, target audience, and business goals. We ensure consistent colors, typography, and intuitive navigation to deliver a strong and engaging user experience.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="design-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#design-collapseFour" aria-expanded="false" aria-controls="design-collapseFour">
                                    How Do You Align the Design with My Requirements?
                                </button>
                            </h4>
                            <div id="design-collapseFour" class="accordion-collapse collapse" aria-labelledby="design-headingFour" data-bs-parent="#accordionDesign">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">We begin with a detailed brand discovery session to understand your vision, audience, and preferences. This allows us to create a tailored design that perfectly matches your business objectives.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="design-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#design-collapseFive" aria-expanded="false" aria-controls="design-collapseFive">
                                    What Are the Latest Website Design Trends?
                                </button>
                            </h4>
                            <div id="design-collapseFive" class="accordion-collapse collapse" aria-labelledby="design-headingFive" data-bs-parent="#accordionDesign">
                                <div class="accordion-body">
                                    <ul class="mb-0">
                                        <li class="text-white fs-20">Minimal and clean UI designs</li>
                                        <li class="text-white fs-20">Mobile-first responsive layouts</li>
                                        <li class="text-white fs-20">AI-powered personalization</li>
                                        <li class="text-white fs-20">Bold typography and visual storytelling</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="design-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#design-collapseSix" aria-expanded="false" aria-controls="design-collapseSix">
                                    How Much Does Website Design Cost?
                                </button>
                            </h4>
                            <div id="design-collapseSix" class="accordion-collapse collapse" aria-labelledby="design-headingSix" data-bs-parent="#accordionDesign">
                                <div class="accordion-body">
                                    <p class="fs-20 text-white mb-0">Website design cost depends on complexity, number of pages, and customization. A simple business website is more affordable, while advanced custom UI/UX designs require higher investment based on requirements.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Website Design End -->
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
    const wdpSection = document.querySelector('.wdp-flow');
    const circle = wdpSection.querySelector('.mouse-circle');

    if (wdpSection && circle) {
        wdpSection.addEventListener('mousemove', (e) => {
            const rect = wdpSection.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            // Move the main circle
            circle.style.left = x + 'px';
            circle.style.top = y + 'px';
            circle.style.display = 'block';

            // Create clone for trail effect
            const clone = document.createElement('div');
            clone.className = 'mouse-circle-clone';
            clone.style.left = x + 'px';
            clone.style.top = y + 'px';

            wdpSection.appendChild(clone);

            // Remove the clone after animation ends
            setTimeout(() => {
                clone.remove();
            }, 500); // match animation duration
        });

        wdpSection.addEventListener('mouseleave', () => {
            circle.style.display = 'none';
        });
    }
</script>

<script>
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content-1');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            tabButtons.forEach(b => b.classList.remove('active'));
            tabContents.forEach(tc => tc.classList.remove('active'));

            btn.classList.add('active');
            const targetId = btn.dataset.tab;
            if (targetId) {
                const activeTab = document.getElementById(targetId);
                if (activeTab) {
                    activeTab.classList.add('active');
                }
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiperTemplates = new Swiper(".web-templates-swiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            coverflowEffect: {
                rotate: 10,
                stretch: 0,
                depth: 200,
                modifier: 1,
                slideShadows: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".template-next",
                prevEl: ".template-prev",
            },
        });
    });
</script>