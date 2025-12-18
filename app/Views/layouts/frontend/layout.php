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
    <link rel="canonical" href="<?php echo $canonical ?? ''; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.png') ?>">

    <?php if (!empty($seoData['other_script_or_tag'])): ?>
        <!-- Dynamic SEO Scripts/Tags -->
        <?= $seoData['other_script_or_tag'] ?>
        <!-- End Dynamic SEO Scripts/Tags -->
    <?php endif; ?>

    <link rel=" preconnect" href="https://rec.smartlook.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://www.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="//www.google.com">
    <link rel="preconnect" href="//www.brandstory.ae">
    <link rel="preconnect" href="//schema.org">
    <link rel="preconnect" href="//brandstory.ae">
    <link rel="preconnect" href="//g.co">
    <link rel="preconnect" href="//www.facebook.com">
    <link rel="preconnect" href="//twitter.com">
    <link rel="preconnect" href="//www.instagram.com">
    <link rel="preconnect" href="//ae.linkedin.com">
    <link rel="preconnect" href="//www.youtube.com">
    <meta name="robots" content="INDEX, FOLLOW">
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
    <!--CSS -->
    <link href="<?= base_url('assets/css/ionicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/menu.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/skin.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/dev.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/global.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/swiper.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/slick.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css?v=1.8') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://www.google.com/recaptcha/api.js?render=6Ld7FY4fAAAAAJIzIpBe4GUTv7OaTldVzpFc9qJY"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-932195052"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165140111-1"></script>

    <script>
        function recap() {
            grecaptcha.ready(function() {
                grecaptcha.execute('6Ld7FY4fAAAAAJIzIpBe4GUTv7OaTldVzpFc9qJY', {
                    action: 'contact'
                }).then(function(token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
            });
        }
        recap();
        setInterval(function() {
            recap();
        }, 2 * 60 * 1000);
    </script>
    <!-- Global site tag (gtag.js) - Google Ads: 932195052 -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-932195052');
    </script>
    <!-- Gtags end -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-165140111-1');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PRDD8D7');
    </script>
    <!-- Google Analytics -->
    <script>
        (function(w, d, s, g, js, fjs) {
            g = w.gtag = function() {
                (g.q = g.q || []).push(arguments)
            };
            g.js = 1;
            g.l = +new Date;
            js = d.createElement(s);
            fjs = d.getElementsByTagName(s)[0];
            js.src = 'https://www.googletagmanager.com/gtag/js?id=' + g;
            fjs.parentNode.insertBefore(js, fjs);
        })(window, document, 'script', 'G-4PYR3E31JS');
    </script>
    <script>
        gtag('config', 'G-4PYR3E31JS');
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
    <div id="voice-command-btn" class="voice-command-btn">
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


    <script src="<?= base_url('assets/js/voice-control.js?v=' . time()) ?>"></script>
</body>

</html>