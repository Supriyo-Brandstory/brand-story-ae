<style>
    :root {
        --premium-purple: #6344d4;
        --premium-purple-dark: #1a0b38;
        --premium-purple-light: #f3f0ff;
        --premium-yellow: #ffc107;
        --premium-gray: #f8f9fa;
        --premium-text: #212529;
        --premium-text-muted: #6c757d;
    }

    .new-blog-details-page {
        background-color: #fff;
        color: var(--premium-text);
        font-family: 'Inter', sans-serif;
    }

    /* Hero Section */
    .premium-hero {
        background-color: var(--premium-purple);
        padding: 80px 0;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .premium-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 80% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .premium-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin: 20px 0;
        line-height: 1.2;
    }

    .premium-hero .blog-meta {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 0;
    }

    .hero-image-wrap {
        position: relative;
        z-index: 2;
    }

    .hero-image-wrap img {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        height: 330px;
        object-fit: cover;
        object-position: left;
        width: 100%;
    }

    /* Content Layout */
    .main-content-section {
        padding-top: 80px;
        padding-bottom: 80px;
    }

    /* Table of Contents */
    .toc-sidebar {
        position: sticky;
        top: 100px;
        height: fit-content;
    }

    .toc-title {
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    #toc-list {
        border-left: 2px solid #eee;
        padding-left: 20px;
    }

    #toc-list li {
        margin-bottom: 15px;
    }

    #toc-list a {
        color: var(--premium-text-muted);
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        display: block;
    }

    #toc-list a:hover,
    #toc-list a.active {
        color: var(--premium-purple);
        font-weight: 600;
        transform: translateX(5px);
    }

    /* Summary Box */
    .summary-box {
        background-color: var(--premium-purple-light);
        border: 1px solid rgba(99, 68, 212, 0.1);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .summary-text h5 {
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .summary-text p {
        margin: 5px 0 0;
        color: var(--premium-text-muted);
        font-size: 0.9rem;
    }

    .summary-btn {
        background-color: #e83b26;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .summary-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
        color: #fff;
    }

    /* Article Body */
    .blog-description {
        font-size: 1.15rem;
        line-height: 1.7;
        color: #333;
    }

    .blog-description h2,
    .blog-description h3 {
        font-weight: 800;
        margin-top: 50px;
        margin-bottom: 25px;
        color: var(--premium-purple-dark);
    }

    .blog-description p {
        margin-bottom: 25px;
    }

    /* Inline CTA Banner */
    .inline-cta-banner {
        background: linear-gradient(135deg, var(--premium-purple) 0%, #855BFF 100%);
        color: #fff;
        border-radius: 12px;
        padding: 30px;
        margin: 40px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .inline-cta-banner h4 {
        margin: 0;
        font-weight: 700;
        font-style: italic;
    }

    .inline-cta-banner .cta-btn {
        background-color: #e83b26;
        color: #fff;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 800;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    /* Right Sidebar */
    .right-sidebar {
        display: flex;
        flex-direction: column;
        gap: 30px;
        height: 100%;
        position: relative;
    }

    /* Reliable CSS sticky for bottom sidebar elements */
    .sidebar-sticky-part {
        display: flex;
        flex-direction: column;
        gap: 30px;
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
        z-index: 10;
    }

    .sidebar-card {
        background: #fff;
        border: none;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    /* Author Profile (Bottom) */
    .author-card-bottom {
        background: #fff;
        border: none;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .author-info-wrap {
        display: flex;
        gap: 30px;
        align-items: center;
    }
    
    .author-avatar-col {
        flex-shrink: 0;
    }
    
    .author-avatar-col .author-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .author-desc-col {
        flex-grow: 1;
        text-align: left;
    }

    .author-desc-col h4 {
        font-weight: 800;
        margin-bottom: 10px;
    }

    .author-desc-col p {
        font-size: 0.95rem;
        color: var(--premium-text-muted);
        line-height: 1.6;
        margin-bottom: 0;
    }

    @media (max-width: 767px) {
        .author-info-wrap {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
        .author-desc-col {
            text-align: center;
        }
        .author-desc-col p {
            margin-bottom: 15px;
        }
        .author-desc-col .d-flex {
            justify-content: center !important;
            flex-direction: column;
            align-items: center !important;
            gap: 15px !important;
        }
    }

    /* Bottom Premium CTA */
    .premium-bottom-cta {
        background: linear-gradient(135deg, var(--premium-purple-dark) 0%, #2a0e5a 100%);
        border-radius: 20px;
        padding: 40px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 15px 35px rgba(26, 11, 56, 0.2);
    }

    .premium-bottom-cta::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(99, 68, 212, 0.25) 0%, rgba(99, 68, 212, 0) 70%);
        pointer-events: none;
    }

    .premium-bottom-cta::after {
        content: '';
        position: absolute;
        bottom: -50%;
        left: -30%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(232, 59, 38, 0.15) 0%, rgba(232, 59, 38, 0) 70%);
        pointer-events: none;
    }

    .cta-content-wrapper {
        position: relative;
        z-index: 2;
        text-align: left;
    }

    .cta-badge-pill {
        display: inline-block;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #ffffff;
        padding: 6px 16px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 50px;
        margin-bottom: 20px;
    }

    .premium-bottom-cta h3 {
        color: #fff;
        line-height: 1.3;
        margin-bottom: 15px;
    }

    .premium-bottom-cta p {
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 30px;
        max-width: 600px;
    }

    .cta-action-area {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .cta-primary-btn {
        background: #e83b26;
        color: #fff;
        padding: 14px 30px;
        border-radius: 50px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(232, 59, 38, 0.3);
        transition: all 0.3s ease;
        border: 2px solid #e83b26;
    }

    .cta-primary-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(232, 59, 38, 0.5);
        background: #fff;
        color: var(--premium-purple-dark);
        border-color: #fff;
    }

    .cta-primary-btn i {
        font-size: 1.25rem;
        transition: transform 0.3s ease;
    }

    .cta-primary-btn:hover i {
        transform: translateX(4px);
    }

    .cta-meta-text {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    @media (max-width: 767px) {
        .premium-bottom-cta {
            padding: 30px 20px;
        }
      
        .cta-action-area {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }
        .cta-primary-btn {
            justify-content: center;
            padding: 10px;
        }
        .cta-meta-text {
            justify-content: center;
        }
    }

    .social-icons {
        display: flex;
        gap: 10px;
    }

    .social-icons a {
        background: #f1f1f1;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .social-icons a:hover {
        background: var(--premium-purple);
        color: #fff;
    }

    /* Ranking CTA Sidebar */
    .ranking-cta-card {
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 40px 25px;
        border: none;
    }

    .ranking-cta-card img {
        width: 100%;
        margin-bottom: 30px;
    }

    .ranking-cta-card h4 {
        font-weight: 700;
        font-size: 1.4rem;
        margin-bottom: 20px;
    }

    .ranking-cta-btn {
        background-color: #e83b26;
        color: #fff;
        display: block;
        padding: 15px;
        border-radius: 8px;
        font-weight: 800;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .ranking-cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        color: #fff;

    }

    /* Academy Card refined */
    .academy-card {
        background: #000;
        color: #fff;
        padding: 0;
        position: relative;
        border: none;
    }

    .academy-card img {
        width: 100%;
        display: block;
        opacity: 0.8;
    }

    .academy-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(0, 0, 0, 0.4);
    }

    .academy-title {
        font-weight: 800;
        font-size: 1.2rem;
        margin-bottom: 15px;
        text-align: center;
        line-height: 1.2;
    }

    .academy-content .join-btn {
        background: #ff4d4d;
        color: #fff;
        padding: 8px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.8rem;
    }

    /* Share Section */
    .share-sidebar-box {
        padding-top: 20px;
    }

    .share-title {
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 15px;
    }

    .share-buttons {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .share-btn {
        width: 40px;
        height: 40px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .share-btn:hover {
        transform: translateY(-3px);
        color: #fff;
    }

    .share-tw {
        background-color: #1DA1F2;
    }

    .share-fb {
        background-color: #4267B2;
    }

    .share-li {
        background-color: #0077b5;
    }

    .share-count {
        margin-left: 15px;
        font-size: 0.8rem;
        color: #999;
    }

    .share-count strong {
        color: #333;
        font-size: 1.1rem;
        display: block;
    }

    /* Related Blogs */
    .latest--blogs {
        background-color: var(--premium-gray);
        padding-top: 80px;
        padding-bottom: 80px;
    }

    .latest--blogs h2 {
        font-weight: 800;
        margin-bottom: 40px;
    }

    .blog-box {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-box:hover {
        transform: translateY(-10px);
    }

    .blog-box-img {
        height: 200px;
        overflow: hidden;
    }

    .blog-box-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-box-txt {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-box-txt .blog-date {
        color: var(--premium-purple);
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 10px;
    }

    .blog-box-txt h6 {
        font-weight: 700;
        font-size: 1.2rem;
        line-height: 1.4;
        margin-bottom: 15px;
    }

    .blog-box-txt p {
        color: var(--premium-text-muted);
        font-size: 0.95rem;
        margin-bottom: 20px;
    }

    .blog-box-link a {
        color: var(--premium-purple);
        font-weight: 700;
        text-decoration: none;
        font-size: 0.9rem;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    @media (max-width: 991px) {
        .premium-hero {
            padding: 40px 0;
            text-align: center;
        }

        .premium-hero .text-start {
            text-align: center !important;
        }

        .premium-hero .blog-meta {
            text-align: center;
            display: block;
        }

        .premium-hero h1 {
            font-size: 1.7rem;
            margin: 15px 0;
        }

        .hero-image-wrap {
            margin-top: 30px;
            padding: 0 0px;
            /* Added side gap */
        }

        .hero-image-wrap img {
            object-fit: cover;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            height: auto;
            border-radius: 0px;
        }

        .main-content-section {
            padding-top: 40px;
        }

        .toc-sidebar {
            display: none;
        }

        .inline-cta-banner {
            flex-direction: column;
            gap: 20px;
        }

        .summary-box {
            flex-direction: column;
            gap: 20px;
        }
    }
</style>

<!-- Load Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="new-blog-details-page">
    <section class="premium-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-start">
                    <h4 class="text-uppercase mb-3" style="letter-spacing: 2px; font-weight: 600; opacity: 0.8;">Blog</h4>
                    <h1><?= htmlspecialchars($blog['title']) ?></h1>
                    <div class="blog-meta">
                        by <strong><a href="<?= base_url('author/madhavan-a') ?>" style="color:inherit; text-decoration:underline; font-weight:700;">Madhavan A</a></strong> &bull; Published: <?= date('F d, Y', strtotime($blog['created_at'])) ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-wrap">
                        <?php if (!empty($blog['image'])): ?>
                            <img src="<?= base_url($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
                        <?php else: ?>
                            <img src="<?= base_url('assets/images/blog/default.jpg') ?>" alt="Default Blog Image">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar: TOC -->
                <div class="col-lg-2">
                    <div class="toc-sidebar d-lg-block d-none">
                        <div class="toc-title">Contents</div>
                        <ul class="list-unstyled" id="toc-list">
                            <!-- JS will populate this -->
                        </ul>
                    </div>
                </div>

                <!-- Center Content -->
                <div class="col-lg-7">
                    <div class="summary-box">
                        <div class="summary-text">
                            <h5>Want a Quick Summary?</h5>
                            <p>Summarize this article instantly with ChatGPT.</p>
                        </div>
                        <a href="https://chatgpt.com/?q=<?= urlencode("Please summarize this article for me: " . current_url()) ?>" target="_blank" class="summary-btn">Summarize with AI</a>
                    </div>

                    <div id="tabel-00" class="blog-description">
                        <?= $blog['description'] ?>

                        <!-- Inline CTA Example -->
                        <div class="inline-cta-banner">
                            <div class="cta-text">
                                <h5>How does your website score?</h5>
                                <p class="mb-0">Get a free instant audit of your SEO issues.</p>
                            </div>
                            <a href="<?= route('contact') ?>" class="cta-btn">Get Graded Today</a>
                        </div>
                    </div>

                 

                    <!-- Author Profile -->
                    <div class="author-card-bottom mt-5">
                        <div class="author-info-wrap">
                            <div class="author-avatar-col">
                                <a href="<?= base_url('author/madhavan-a') ?>"><img src="<?= base_url('assets/images/dynamic/madhavan-a.jpeg') ?>" alt="Madhavan A" class="author-img" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"></a>
                            </div>
                            <div class="author-desc-col">
                                <h4><a href="<?= base_url('author/madhavan-a') ?>" style="color:inherit; text-decoration:none; transition: color 0.2s ease;" onmouseover="this.style.color='var(--premium-purple)'" onmouseout="this.style.color='inherit'">Madhavan A</a></h4>
                                <p>Madhavan A is a digital marketing expert with a strong SEO specialisation, bringing 8+ years of hands-on experience in driving organic growth and search visibility. He focuses on building data-driven strategies, optimising content performance, and delivering measurable results across competitive digital landscapes.</p>
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
                                    <div class="social-icons">
                                        <!-- <a href="https://websitedevelopmentagency.ae/author/madhavan-a#" target="_blank"><i class="bi bi-twitter"></i></a> -->
                                        <a href="https://in.linkedin.com/in/madhavan-a-850207155" target="_blank"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                    <a href="<?= base_url('author/madhavan-a') ?>" style="color:var(--premium-purple); font-weight:700; text-decoration:none; font-size:0.85rem; text-transform:uppercase; display:flex; align-items:center; gap:5px; transition: gap 0.2s ease;" onmouseover="this.style.gap='8px'" onmouseout="this.style.gap='5px'">View Profile <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="col-lg-3" id="right-sidebar-col" style="position: relative;">
                    <div class="right-sidebar" id="right-sidebar">
                        <!-- Bottom Sticky Part -->
                        <div class="sidebar-sticky-part" id="sidebar-sticky-bottom">
                            <div class="sidebar-card ranking-cta-card">
                                <img src="<?= base_url('assets/images/dynamic/WebsiteGrader.gif') ?>" alt="Ranking Gauge">
                                <h4>Are You Looking for Growth?</h4>
                                <p class="mb-4">Free instant digital marketing audit and improve performance.</p>
                                <a href="<?= route('contact') ?>" class="ranking-cta-btn">Get Graded Today</a>
                            </div>
                            <div class="sidebar-card academy-card">
                                <img src="<?= base_url('assets/images/seo-video-thumbnail.jpg') ?>" alt="Academy">
                                <div class="academy-content">
                                    <div class="academy-title">Expert SEO Services</div>
                                    <a href="/seo-services-in-dubai/" class="join-btn">Know More</a>
                                </div>
                            </div>

                            <div class="share-sidebar-box">
                                <div class="share-title">Share this article</div>
                                <div class="share-buttons">
                                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($blog['title']) ?>" target="_blank" class="share-btn share-tw"><i class="bi bi-twitter"></i></a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" class="share-btn share-fb"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(current_url()) ?>" target="_blank" class="share-btn share-li"><i class="bi bi-linkedin"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="premium-blog-cta-sec">
        <style>
            .premium-blog-cta-sec {
                background: linear-gradient(135deg, #a15bff 0%, #762ad1 100%);
                padding: 85px 0 75px;
                color: #ffffff;
                font-family: 'Poppins', sans-serif;
                text-align: center;
                position: relative;
                overflow: hidden;
                border-top: 1px solid rgba(255, 255, 255, 0.05);
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            /* Subtle glowing dots in background */
            .premium-blog-cta-sec::before {
                content: '';
                position: absolute;
                top: -10%;
                left: 20%;
                width: 300px;
                height: 300px;
                background: radial-gradient(circle, rgba(133, 91, 255, 0.12) 0%, rgba(133, 91, 255, 0) 70%);
                pointer-events: none;
            }

            .premium-blog-cta-sec::after {
                content: '';
                position: absolute;
                bottom: -10%;
                right: 20%;
                width: 350px;
                height: 350px;
                background: radial-gradient(circle, rgba(0, 242, 254, 0.08) 0%, rgba(0, 242, 254, 0) 70%);
                pointer-events: none;
            }

            .premium-blog-cta-sec .container {
                position: relative;
                z-index: 5;
                max-width: 960px;
            }

            .premium-blog-cta-sec .cta-badge {
                display: inline-block;
                font-size: 20px;
                font-weight: 700;
                color: #38bdf8; /* Vibrant light blue/cyan gradient color */
                background: linear-gradient(135deg, #38bdf8 0%, #34d399 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                text-transform: uppercase;
                letter-spacing: 2.5px;
                margin-bottom: 20px;
                font-family: 'Poppins', sans-serif;
            }

            .premium-blog-cta-sec .cta-main-title {
                font-size: 44px;
                font-weight: 800;
                line-height: 1.25;
                color: #ffffff;
                margin-bottom: 25px;
                letter-spacing: -0.8px;
            }

            .premium-blog-cta-sec .cta-description {
                font-size: 17px;
                line-height: 1.7;
                color: rgba(255, 255, 255, 1);
                max-width: 820px;
                margin: 0 auto 45px;
                font-weight: 400;
            }

            /* Two buttons row styling */
            .premium-blog-cta-sec .cta-btn-wrap {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
                margin-bottom: 60px;
            }

            .premium-blog-cta-sec .btn-cta-primary {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: #e83b26;
                color: #fff;
                font-size: 15px;
                font-weight: 700;
                padding: 16px 36px;
                border-radius: 50px;
                text-transform: uppercase;
                letter-spacing: 1px;
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
                box-shadow: 0 4px 15px rgba(232, 59, 38, 0.25);
                border: 2px solid #e83b26;
            }

            .premium-blog-cta-sec .btn-cta-primary:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 24px rgba(232, 59, 38, 0.25);
                background: #000;
                color: #fff;
            }

            .premium-blog-cta-sec .btn-cta-secondary {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: rgba(255, 255, 255, 0.04);
                color: #ffffff;
                font-size: 15px;
                font-weight: 700;
                padding: 16px 36px;
                border-radius: 50px;
                text-transform: uppercase;
                letter-spacing: 1px;
                text-decoration: none;
                border: 2px solid #000;
                transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            }

            .premium-blog-cta-sec .btn-cta-secondary:hover {
                transform: translateY(-3px);
                background: #000;
                color: #fff;
                box-shadow: 0 8px 24px rgba(255, 255, 255, 0.15);
            }

            /* Logos block styling */
            .premium-blog-cta-sec .logos-title {
                font-size: 14px;
                color: rgba(255, 255, 255, 1);
                font-style: italic;
                margin-bottom: 25px;
                letter-spacing: 0.5px;
            }

            .premium-blog-cta-sec .logos-row {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                gap: 45px;
                /* opacity: 0.65; */
                transition: opacity 0.3s ease;
            }

            .premium-blog-cta-sec .logos-row:hover {
                /* opacity: 0.85; */
            }

            .premium-blog-cta-sec .logo-item {
                height: 50px;
                display: flex;
                align-items: center;
                transition: transform 0.3s ease;
            }

            .premium-blog-cta-sec .logo-item:hover {
                transform: scale(1.08);
            }

            .premium-blog-cta-sec .logo-item svg,
            .premium-blog-cta-sec .logo-item img {
                fill: #ffffff;
                max-height: 100%;
                width: auto;
                object-fit: contain;
                filter: brightness(0) invert(1);
            }

            @media (max-width: 767px) {
                .premium-blog-cta-sec {
                    padding: 60px 0;
                }
                .premium-blog-cta-sec .cta-main-title {
                    font-size: 28px;
                }
                .premium-blog-cta-sec .cta-description {
                    font-size: 15px;
                    margin-bottom: 35px;
                }
                .premium-blog-cta-sec .cta-btn-wrap {
                    flex-direction: column;
                    gap: 15px;
                    margin-bottom: 45px;
                }
                .premium-blog-cta-sec .btn-cta-primary,
                .premium-blog-cta-sec .btn-cta-secondary {
                    width: 100%;
                    justify-content: center;
                    padding: 14px 28px;
                }
                .premium-blog-cta-sec .logos-row {
                    gap: 30px;
                }
                .premium-blog-cta-sec .logo-item {
                    height: 22px;
                }
            }
        </style>

        <div class="container">
            <!-- <span class="cta-badge">Search Everywhere Optimization™</span> -->
            <h2 class="cta-main-title">Transform Your Digital Growth with BrandStory</h2>
            <p class="cta-description">
                From SEO, PPC, social media marketing, and content marketing to website development, branding, and lead generation, BrandStory delivers result-driven digital marketing services in Dubai and across the UAE, helping businesses attract, engage, and convert more customers.
            </p>

            <div class="cta-btn-wrap">
                <a href="tel:+971522831655" class="btn-cta-primary">
                    <i class="bi bi-telephone-fill"></i> Call Us Now
                </a>
                <a href="<?= route('contact') ?>" class="btn-cta-secondary">
                    <i class="bi bi-chat-left-text-fill"></i> Contact Us
                </a>
            </div>

            <div class="logos-block">
                <p class="logos-title">Trusted by 1000+ leading brands in Dubai and globally including:</p>
                <div class="logos-row">
                    <!-- Client Logo 4 -->
                    <div class="logo-item" title="Client Logo 4">
                        <img src="<?= base_url('assets/images/clients/logo-4.png') ?>" alt="Client Logo">
                    </div>

                    <!-- Client Logo 5 -->
                    <div class="logo-item" title="Client Logo 5">
                        <img src="<?= base_url('assets/images/clients/logo-5.png') ?>" alt="Client Logo">
                    </div>

                    <!-- Client Logo 7 -->
                    <div class="logo-item" title="Client Logo 7">
                        <img src="<?= base_url('assets/images/clients/logo-7.png') ?>" alt="Client Logo">
                    </div>

                    <!-- Client Logo 2 -->
                    <div class="logo-item" title="Client Logo 2">
                        <img src="<?= base_url('assets/images/clients/logo-2.png') ?>" alt="Client Logo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Blogs Section -->
    <section class="latest--blogs">
        <div class="container">
            <h2 class="text-center text-md-start">Related Blogs</h2>
            <div class="row gy-4 gx-lg-5">
                <?php if (!empty($related_blogs)): ?>
                    <?php foreach ($related_blogs as $related_blog): ?>
                        <div class="col-md-4">
                            <div class="blog-box">
                                <div class="blog-box-img">
                                    <?php if (!empty($related_blog['image'])): ?>
                                        <img src="<?= base_url($related_blog['image']) ?>" alt="<?= htmlspecialchars($related_blog['title']) ?>">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/images/blog/default.jpg') ?>" alt="Default Blog Image">
                                    <?php endif; ?>
                                </div>
                                <div class="blog-box-txt">
                                    <div class="blog-date"><?= date('F d, Y', strtotime($related_blog['created_at'])) ?></div>
                                    <h6>
                                        <?php
                                        $relUrl = base_url('blogs/' . $related_blog['slug']);
                                        ?>
                                        <a href="<?= $relUrl ?>" style="text-decoration:none;color:#000">
                                            <?= htmlspecialchars($related_blog['title']) ?>
                                        </a>
                                    </h6>
                                    <p><?= htmlspecialchars(substr(strip_tags($related_blog['description']), 0, 120)) ?>...</p>
                                    <div class="blog-box-link">
                                        <a href="<?= $relUrl ?>">Read more <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contentContainer = document.querySelector('.blog-description');
        const tocContainer = document.getElementById('toc-list');
        if (!contentContainer || !tocContainer) return;

        // Find only h2 headings
        const headers = contentContainer.querySelectorAll('h2');

        // Ensure headings have a scroll margin
        const style = document.createElement('style');
        style.innerHTML = '.blog-description h2 { scroll-margin-top: 100px; }';
        document.head.appendChild(style);

        // Add headings to TOC
        headers.forEach((header, idx) => {
            if (!header.id) {
                header.id = 'heading-' + idx;
            }
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + header.id;
            a.textContent = header.textContent.trim();
            li.appendChild(a);
            tocContainer.appendChild(li);
        });

        const navLinks = tocContainer.querySelectorAll('li a');
        const offset = 100;

        // Smooth scrolling
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetEl = document.getElementById(targetId);
                if (targetEl) {
                    const top = targetEl.getBoundingClientRect().top + window.pageYOffset - (offset - 20);
                    window.scrollTo({
                        top,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active section detection
        function getActiveSection() {
            let closestSection = null;
            let closestDistance = window.innerHeight;
            headers.forEach(section => {
                const rect = section.getBoundingClientRect();
                const distance = Math.abs(rect.top - offset);
                if (rect.top <= offset + 50 && distance < closestDistance) {
                    closestDistance = distance;
                    closestSection = section;
                }
            });
            if (closestSection) {
                const id = closestSection.id;
                navLinks.forEach(link => {
                    link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
                });
            }
        }

        window.addEventListener('scroll', getActiveSection);
        getActiveSection();
    });
</script>
