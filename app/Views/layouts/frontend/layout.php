<!DOCTYPE html>
<html lang="en">
<?php
// Fetch Dynamic SEO Data
$seoData = getSeoForPage();
if ($seoData) {
    if (!empty($seoData['meta_title'])) {
        $meta['title'] = $seoData['meta_title'];
    }
    if (!empty($seoData['meta_description'])) {
        $meta['description'] = $seoData['meta_description'];
    }
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= htmlspecialchars($meta['title'] ?? 'BrandStoryAE') ?></title>
    <meta name="description" content="<?= htmlspecialchars($meta['description'] ?? '') ?>">
    <link rel="icon" type="image/png" href="https://www.brandstory.ae/assets/images/favicon.png">

    <!-- Preload LCP Image - Moved to Top to eliminate Resource Load Delay -->
    <?php
    $current_url = $_SERVER['REQUEST_URI'] ?? '/';
    $clean_path = trim(parse_url($current_url, PHP_URL_PATH) ?? '', '/');
    $lcp_image = '';
    $lcp_mobile = '';

    if ($clean_path === '' || $clean_path === 'index.php') {
        $lcp_image = base_url('assets/images/email/banner02.webp');
        $lcp_mobile = base_url('assets/images/email/banner02.webp');
    } elseif (strpos($current_url, 'seo-services-company-in-dubai') !== false) {
        $lcp_image = '/assets/images/seo-lp/dubai/our-capabilities.png';
    } elseif (strpos($current_url, 'social-media-marketing-agency-in-dubai') !== false) {
        $lcp_image = '/assets/images/social-media/social-media-1.webp';
        $lcp_mobile = '/assets/images/social-media/social-media-1.webp';
    } elseif (strpos($current_url, 'branding-agency-in-dubai') !== false) {
        $lcp_image = '/assets/images/branding-agency-in-dubai-new-banner-3.webp';
        $lcp_mobile = '/assets/images/branding-agency-in-dubai-new-banner-mobile-1.webp';
    } elseif (strpos($current_url, 'website-development-company-in-dubai') !== false || strpos($current_url, 'website-design-company-in-dubai') !== false) {
        $lcp_image = '/assets/images/new-website-design-company-in-dubai/website-dubai.webp';
        $lcp_mobile = '/assets/images/new-website-design-company-in-dubai/bnr-sld-mbl1.jpg';
    } elseif (strpos($current_url, 'about') !== false) {
        $lcp_image = '/assets/images/banners/new-about-us-banner.webp';
        $lcp_mobile = '/assets/images/banners/new-about-us-banner.webp';
    } elseif (strpos($current_url, 'pay-per-click-ppc-services-in-dubai') !== false) {
        $lcp_image = '/assets/images/pr-banner.webp';
        $lcp_mobile = '/assets/images/pr-banner.webp';
    } elseif (strpos($current_url, 'video-marketing-agency-dubai') !== false) {
        $lcp_image = '/assets/images/video-marketing-01.webp';
        $lcp_mobile = '/assets/images/video-marketing-01.webp';
    } elseif (strpos($current_url, 'instagram-advertising-agency-in-dubai') !== false) {
        $lcp_image = '/assets/images/in-banner.webp';
        $lcp_mobile = '/assets/images/in-banner.webp';
    } elseif (strpos($current_url, 'twitter-advertising-dubai') !== false) {
        $lcp_image = '/assets/images/twiter-background.webp';
        $lcp_mobile = '/assets/images/twiter-background.webp';
    } elseif (strpos($current_url, 'pinterest-advertising-services-in-dubai') !== false) {
        $lcp_image = '/assets/images/pinterest-banner.webp';
        $lcp_mobile = '/assets/images/pinterest-banner.webp';
    } elseif (strpos($current_url, 'tiktok-marketing-agency-in-dubai') !== false) {
        $lcp_image = '/assets/images/tik-banner.webp';
        $lcp_mobile = '/assets/images/tik-banner.webp';
    } elseif (strpos($current_url, 'facebook-marketing-agency-in-dubai') !== false) {
        $lcp_image = '/assets/images/fb-banner.webp';
        $lcp_mobile = '/assets/images/fb-banner.webp';
    } elseif (strpos($current_url, 'seo-audit-services-in-dubai') !== false) {
        $lcp_image = '/assets/images/seo-lp/redes-1-banner.jpg';
        $lcp_mobile = '/assets/images/seo-lp/redes-1-banner.jpg';
    } elseif (strpos($current_url, 'technical-seo-dubai') !== false) {
        $lcp_image = '/assets/images/new-seo/technical-seo-1.webp';
        $lcp_mobile = '/assets/images/new-seo/technical-seo-mob.webp';
    } elseif (strpos($current_url, 'on-page-seo-dubai') !== false) {
        $lcp_image = '/assets/images/new-seo/on-page-1.webp';
        $lcp_mobile = '/assets/images/new-seo/on-page-mob.webp';
    } elseif (strpos($current_url, 'off-page-seo-dubai') !== false) {
        $lcp_image = '/assets/images/new-seo/off-page-1.webp';
        $lcp_mobile = '/assets/images/new-seo/off-page-mob.webp';
    } elseif (strpos($current_url, 'keyword-research-dubai') !== false) {
        $lcp_image = '/assets/images/new-seo/keyword-res-1.webp';
        $lcp_mobile = '/assets/images/new-seo/keyword-res-mob.webp';
    } elseif (strpos($current_url, 'local-seo-services-in-dubai') !== false) {
        $lcp_image = '/assets/images/local-seo-banner.webp';
        $lcp_mobile = '/assets/images/local-seo-banner.webp';
    }

    if ($lcp_image): ?>
        <link rel="preload" as="image" href="<?= $lcp_image ?>" fetchpriority="high" media="(min-width: 768px)">
    <?php endif;
    if ($lcp_mobile): ?>
        <link rel="preload" as="image" href="<?= $lcp_mobile ?>" fetchpriority="high" media="(max-width: 767px)">
    <?php endif; ?>

    <?php if (!empty($seoData['other_script_or_tag'])): ?>
        <!-- Dynamic SEO Scripts/Tags -->
        <?= $seoData['other_script_or_tag'] ?>
        <!-- End Dynamic SEO Scripts/Tags -->
    <?php endif; ?>

    <?php 
    // Automatic Canonical URL if not already rendered in other_script_or_tag
    $hasCanonical = !empty($seoData['other_script_or_tag']) && preg_match('/<link\s+[^>]*rel=["\']canonical["\']/i', $seoData['other_script_or_tag']);
    if (!$hasCanonical) {
        $canonicalUrl = \App\Services\SitemapService::formatUrl($_SERVER['REQUEST_URI'] ?? '/');
        echo '<link rel="canonical" href="' . htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8') . '" />' . "\n";
    }
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.gstatic.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://www.google.com">

    <?php
    $robots_content = 'INDEX, FOLLOW';
    if (isset($_SERVER['REQUEST_URI'])) {
        $uri = $_SERVER['REQUEST_URI'];
        if (strpos($uri, '/admin/pages/preview') !== false || strpos($uri, '/home-2') !== false) {
            $robots_content = 'NOINDEX, NOFOLLOW';
        }
    }
    ?>
    <meta name="robots" content="<?= $robots_content ?>">
    <meta name="yandex-verification" content="cbb48369db52693e">
    <meta property="business:contact_data:street_address"
        content="G5, Al Meheri Plaza, opp DBC building, Al Khabaisi Area, Deira Dubai - 81577, United Arab Emirates">
    <meta property="business:contact_data:locality" content=" Al Khabaisi Area">
    <meta property="business:contact_data:region" content="Dubai">
    <meta property="business:contact_data:country_name" content="United Arab Emirates">
    <meta name="category" content="digital marketing" />
    <meta name="classification" content="Digital Marketing" />
    <meta name="author" content="Brandstory">
    <meta name="geo.region" content="AE-DU">
    <meta name="geo.placename" content="Dubai">
    <meta name="geo.position" content="25.262923; 55.3329919">
    <meta name="copyright" content="Brandstory Digital Marketing Agency">
    <meta name="Distribution" content="global">
    <meta name="audience" content="all">
    <meta name="google-site-verification" content="tfc8yiIbjwFNQYRcPeVYpyeNyThCNDZcJ3fwq1jkuAM">

    <!-- Critical & Core CSS -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"></noscript>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/menu.css?v=1.1') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/global.css?v=1.1') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.min.css?v=2.0') ?>" rel="stylesheet">
    <?php if ($clean_path === '' || $clean_path === 'index.php'): ?>
        <link href="<?= base_url('assets/css/home-2.min.css?v=2.0') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/skin.min.css?v=2.0') ?>" rel="stylesheet" media="print" onload="this.media='all'">
        <link href="<?= base_url('assets/css/dev.min.css?v=2.0') ?>" rel="stylesheet" media="print" onload="this.media='all'">
    <?php else: ?>
        <link href="<?= base_url('assets/css/skin.min.css?v=2.0') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/dev.min.css?v=2.0') ?>" rel="stylesheet">
    <?php endif; ?>
    <!-- Non-critical CSS loaded asynchronously -->
    <link href="<?= base_url('assets/css/swiper.css') ?>" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="<?= base_url('assets/css/slick.css') ?>" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="<?= base_url('assets/css/ionicons.min.css') ?>" rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" media="print" onload="this.media='all'" />

    <!-- Deferred Scripts for fast initial mobile rendering & better INP -->
    <script>
        var recapLoaded = false;
        function loadRecaptcha() {
            if (recapLoaded) return;
            recapLoaded = true;
            var script = document.createElement('script');
            script.src = 'https://www.google.com/recaptcha/api.js?render=6Ld7FY4fAAAAAJIzIpBe4GUTv7OaTldVzpFc9qJY';
            script.async = true;
            script.onload = function() {
                recap();
                setInterval(recap, 2 * 60 * 1000);
            };
            document.head.appendChild(script);
        }

        function recap() {
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Ld7FY4fAAAAAJIzIpBe4GUTv7OaTldVzpFc9qJY', {
                        action: 'contact'
                    }).then(function(token) {
                        var recaptchaResponse = document.getElementById('recaptchaResponse');
                        if (recaptchaResponse) recaptchaResponse.value = token;
                    });
                });
            }
        }

        // Trigger reCAPTCHA on first user interaction or when hovering/focusing forms
        ['touchstart', 'scroll', 'mousemove', 'keydown', 'click'].forEach(function(evt) {
            window.addEventListener(evt, loadRecaptcha, { once: true, passive: true });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var formTriggers = document.querySelectorAll('input, textarea, select, .uniq-contact-lead-btn, .cnt-btn');
            formTriggers.forEach(function(el) {
                el.addEventListener('focus', loadRecaptcha, { once: true });
                el.addEventListener('mouseenter', loadRecaptcha, { once: true });
            });
            // Fallback: load after 7 seconds if no interaction
            setTimeout(loadRecaptcha, 7000);
        });
    </script>

    <!-- Global site tag (gtag.js) & GTM with deferred execution -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'AW-932195052', { 'anonymize_ip': true });
        gtag('config', 'G-4PYR3E31JS');

        var analyticsLoaded = false;
        function loadAnalytics() {
            if (analyticsLoaded) return;
            analyticsLoaded = true;

            var s = document.createElement('script');
            s.async = true;
            s.src = 'https://www.googletagmanager.com/gtag/js?id=AW-932195052';
            document.head.appendChild(s);

            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-PRDD8D7');
        }

        // Load analytics on user interaction or idle fallback
        ['touchstart', 'scroll', 'mousemove', 'keydown', 'click'].forEach(function(evt) {
            window.addEventListener(evt, loadAnalytics, { once: true, passive: true });
        });
        if (window.requestIdleCallback) {
            requestIdleCallback(function() { setTimeout(loadAnalytics, 4000); });
        } else {
            window.addEventListener('load', function() { setTimeout(loadAnalytics, 5000); });
        }
    </script>

</head>

<body class="<?= isset($meta['classname']) ? $meta['classname'] : 'dm-agency-dubai' ?> ">


    <div class="page-content" id="content">


        <?php include __DIR__ . '/header.php'; ?>


        <div>
            <main>
                <?= $content ?>

            </main>
        </div>
        <?php include __DIR__ . '/footer.php'; ?>



    </div>

    <!-- Voice Command Floating Button -->
    <!-- <div id="voice-command-btn" class="voice-command-btn">
        <div class="voice-waves"></div>
        <i class="ion-mic-a"></i>
    </div>

    <style>
        .voice-command-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 9999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .voice-command-btn:hover {
            transform: scale(1.1);
        }

        .voice-command-btn i {
            color: white;
            font-size: 24px;
        }

        .voice-command-btn.listening .voice-waves {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: translate(-50%, -50%) scale(0.5);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(2.5);
                opacity: 0;
            }
        }
    </style>


    <script src="<?= base_url('assets/js/voice-control.js?v=' . time()) ?>"></script> -->
    <!-- Reusable Popup Form -->
    <?php include __DIR__ . '/../../component/popup-contact-form.php'; ?>
</body>

</html>