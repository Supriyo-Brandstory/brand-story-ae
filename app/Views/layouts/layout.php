<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $meta['title'] ?? 'BrandStoryAE' ?></title>
    <meta name="description" content="<?= $meta['description'] ?? '' ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <script defer src="<?= base_url('assets/js/site.js') ?>"></script>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $meta['title'] ?? 'BrandStoryAE' ?></title>
        <meta name="description" content="<?= $meta['description'] ?? '' ?>">
        <link rel="canonical" href="<?php echo $canonical; ?>">

        <link rel="preconnect" href="https://rec.smartlook.com">
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
    </head>


    <script src="https://www.google.com/recaptcha/api.js?render=6Ld7FY4fAAAAAJIzIpBe4GUTv7OaTldVzpFc9qJY"></script>
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



    <!--CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <link href="<?= base_url('assets/css/ionicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/menu.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/skin.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/dev.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/global.css?key=' . time()) ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/swiper.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/slick.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css?v=1.7') ?>" rel="stylesheet">

    <style>
        @media screen and (min-width:168px) and (max-width:580px) {
            .play-btn {
                width: 50px;
                height: 50px;
            }
        }
    </style>



    <!-- Global site tag (gtag.js) - Google Ads: 932195052 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-932195052"></script>
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165140111-1"></script>
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

<body class="<?= isset($meta['classname']) ? $meta['classname'] : 'dm-agency-dubai' ?>
">


    <div class="page-content">


        <?php include __DIR__ . '/header.php'; ?>


        <main>
            <?= $content ?>

        </main>
        <?php include __DIR__ . '/footer.php'; ?>
    </div>

</body>

</html>