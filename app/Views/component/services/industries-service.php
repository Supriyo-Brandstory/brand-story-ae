<section class="industries-we-work-with" style="background-color: #ffffff; padding: 60px 0; font-family: 'Inter', sans-serif;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center px-3">
                <h2 class="fw-700 text-center">Industries We've Proudly Served</h2>
                <p class="fs-20 text-center">
                    At Brandstory, we extend our Digital Marketing expertise across a diverse range of industries in UAE, tailoring strategies to meet the unique demands and opportunities each sector presents.
                </p>
            </div>
        </div>

        <div class="row">
            <?php
            $industries = [
                'Real Estate' => '<path d="M3 21h18"></path><path d="M9 8h1"></path><path d="M9 12h1"></path><path d="M9 16h1"></path><path d="M14 8h1"></path><path d="M14 12h1"></path><path d="M14 16h1"></path><path d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"></path>',
                'E-commerce' => '<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path>',
                'Healthcare' => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>',
                'Education' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path>',
                'B2B Corporate' => '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>',
                'Travel Agency' => '<circle cx="12" cy="12" r="10"></circle><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path><path d="M2 12h20"></path>',
                'Dentists' => '<path d="M20 7.5A4.5 4.5 0 0 0 15.5 3c-1.6 0-3 1.1-3.5 1.9C11.5 4.1 10.1 3 8.5 3A4.5 4.5 0 0 0 4 7.5c0 2.2 1.5 6 3 9.5.5 1 1 2.5 2.5 4.5h5c1.5-2 2-3.5 2.5-4.5 1.5-3.5 3-7.3 3-9.5z"></path>',
                'Automotive' => '<path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle>',
                'Law Firms' => '<path d="M12 3v18"></path><path d="M3 21h18"></path><path d="M12 4l9 4-9 4-9-4 9-4z"></path><path d="M5 8v6"></path><path d="M19 8v6"></path><path d="M2 14h6"></path><path d="M16 14h6"></path>',
            ];

            $all_industries = [
                'Real Estate' => '/industries/real-estate-seo-agency-in-dubai-uae/',
                'E-commerce' => 'ae/industries/e-commerce-seo-agency-in-dubai-uae/',
                'Healthcare' => '/industries/healthcare-seo-agency-in-dubai-uae/',
                'Education' => '/industries/education-seo-agency-in-dubai-uae/',
                'B2B Corporate' => '/industries/b2b-seo-agency-in-dubai-uae/',
                'Travel Agency' => '/industries/tourism-seo-agency-dubai-uae/',
                'Dentists' => '/industries/dentist-seo-agency-in-dubai-uae/',
                'Automotive' => '/industries/automotive-seo-services-in-dubai-uae/',
                'Law Firms' => '/industries/law-firm-seo-services-in-dubai-uae/',

            ];

            $default_svg = '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>';

            foreach ($all_industries as $name => $custom_link):
                $svg_path = isset($industries[$name]) ? $industries[$name] : $default_svg;

                // Use custom link
                $link = $custom_link;
            ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-3">
                    <a href="<?= $link ?>" class="industry-item d-flex align-items-center text-decoration-none">
                        <div class="industry-icon d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <?= $svg_path ?>
                            </svg>
                        </div>
                        <div class="industry-name">
                            <?= htmlspecialchars($name) ?> Marketing
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    .industries-we-work-with {
        overflow: hidden;
    }

    .industry-item {
        background-color: #fff;
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid #eaeaea;
        transition: all 0.3s ease;
        cursor: pointer;
        height: 100%;
    }

    .industry-item:hover {
        border-color: #a15bff;
        box-shadow: 0 4px 15px rgba(161, 91, 255, 0.15);
        transform: translateY(-2px);
    }

    .industry-icon {
        min-width: 40px;
        height: 40px;
        background-color: rgba(161, 91, 255, 0.08);
        /* Light version of #a15bff */
        border-radius: 6px;
        margin-right: 15px;
        color: #a15bff;
        transition: all 0.3s ease;
    }

    .industry-item:hover .industry-icon {
        background-color: #a15bff;
        color: #fff;
    }

    .industry-name {
        color: #333;
        font-weight: 600;
        font-size: 13.5px;
        line-height: 1.4;
    }
</style>