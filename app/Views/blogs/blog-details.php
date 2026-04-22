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
    }

    .summary-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
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

    /* Author Profile */
    .author-card .author-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .author-card h4 {
        font-weight: 800;
        margin-bottom: 10px;
    }

    .author-card p {
        font-size: 0.9rem;
        color: var(--premium-text-muted);
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .sidebar-card.author-card {
        text-align: left;
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
            font-size: 2rem;
            margin: 15px 0;
        }

        .hero-image-wrap {
            margin-top: 30px;
            padding: 0 15px;
            /* Added side gap */
        }

        .hero-image-wrap img {
            max-height: 400px;
            object-fit: cover;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .main-content-section {
            padding-top: 40px;
        }

        .toc-sidebar {
            display: none;
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
                        by <strong>Jenny</strong> &bull; Published: <?= date('F d, Y', strtotime($blog['created_at'])) ?>
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
                            <p>Get AI to summarize this article for you in seconds.</p>
                        </div>
                        <button class="summary-btn">Summarize with AI</button>
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
                </div>

                <!-- Right Sidebar -->
                <div class="col-lg-3" id="right-sidebar-col" style="position: relative;">
                    <div class="right-sidebar" id="right-sidebar">
                        <!-- Static Part -->
                        <div class="sidebar-card author-card">
                            <img src="<?= base_url('assets/images/dynamic/author-jenny.png') ?>" alt="Jenny" class="author-img">
                            <h4>Jenny</h4>
                            <p>Jenny, our Owned Media Manager, is an SEO and content marketing powerhouse with 10+ years of experience. A multilingual consultant and mentor, she's judged Search Awards and moves seamlessly between leading teams and crafting scalable frameworks.</p>
                            <div class="social-icons">
                                <a href="https://twitter.com/BrandStory_UAE" target="_blank"><i class="bi bi-twitter"></i></a>
                                <a href="https://ae.linkedin.com/company/brandstory-uae/" target="_blank"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>



                        <!-- Bottom Sticky Part -->
                        <div class="sidebar-sticky-part" id="sidebar-sticky-bottom">
                            <div class="sidebar-card ranking-cta-card">
                                <img src="<?= base_url('assets/images/dynamic/WebsiteGrader.gif') ?>" alt="Ranking Gauge">
                                <h4>Do you want higher rankings?</h4>
                                <p class="mb-4">Free instant audit grades your website performance so you can optimise it.</p>
                                <a href="<?= route('contact') ?>" class="ranking-cta-btn">Get Graded Today</a>
                            </div>
                            <div class="sidebar-card academy-card">
                                <img src="<?= base_url('assets/images/seo-video-thumbnail.jpg') ?>" alt="Academy">
                                <div class="academy-content">
                                    <div class="academy-title">Search Everywhere Academy</div>
                                    <a href="#" class="join-btn">Join Now</a>
                                </div>
                            </div>

                            <div class="share-sidebar-box">
                                <div class="share-title">Share this article</div>
                                <div class="share-buttons">
                                    <a href="#" class="share-btn share-tw"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="share-btn share-fb"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="share-btn share-li"><i class="bi bi-linkedin"></i></a>
                                    <div class="share-count">
                                        <strong>0</strong> SHARES
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <a href="<?= route('blogs.show', ['slug' => $related_blog['slug']]) ?>" style="text-decoration:none;color:#000">
                                            <?= htmlspecialchars($related_blog['title']) ?>
                                        </a>
                                    </h6>
                                    <p><?= htmlspecialchars(substr(strip_tags($related_blog['description']), 0, 120)) ?>...</p>
                                    <div class="blog-box-link">
                                        <a href="<?= route('blogs.show', ['slug' => $related_blog['slug']]) ?>">Read more <i class="bi bi-arrow-right"></i></a>
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

        // Find all h2, h3 headings (exclude h1)
        const headers = contentContainer.querySelectorAll('h2, h3');

        // Ensure headings have a scroll margin
        const style = document.createElement('style');
        style.innerHTML = '.blog-description h2, .blog-description h3 { scroll-margin-top: 100px; }';
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