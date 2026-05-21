<?php
// Ensure base_url is available
if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        return '/' . ltrim($path, '/');
    }
}
?>
<!-- Font & Bootstrap Icons for standalone view rendering -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    :root {
        --premium-purple: #6344d4;
        --premium-purple-dark: #1a0b38;
        --premium-purple-light: #f3f0ff;
        --premium-yellow: #e83b26;
        --premium-gray: #f8f9fa;
        --premium-text: #212529;
        --premium-text-muted: #6c757d;
        --premium-white: #ffffff;
    }

    .author-profile-page {
        font-family: 'Poppins', 'Inter', sans-serif;
        color: var(--premium-text);
        background-color: #fff;
    }

    /* Hero Section */
    .author-hero {
        background: linear-gradient(135deg, var(--premium-purple-dark) 0%, #4a2cb3 100%);
        padding: 90px 0 70px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .author-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 85% 30%, rgba(255, 255, 255, 0.08) 0%, transparent 60%);
        pointer-events: none;
    }

    .author-hero-wrap {
        display: flex;
        align-items: center;
        gap: 40px;
    }

    .author-avatar-container {
        position: relative;
        flex-shrink: 0;
    }

    .author-avatar-bg {
        position: absolute;
        top: -10px;
        left: -10px;
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, var(--premium-yellow), var(--premium-purple));
        border-radius: 50%;
        z-index: 1;
        opacity: 0.85;
        animation: spin-slow 20s linear infinite;
    }

    .author-avatar {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #fff;
        position: relative;
        z-index: 2;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .author-title-badge {
        font-weight: 600;
        color: #fff;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        display: inline-block;
    }

    .author-meta-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }

    .author-badge {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        backdrop-filter: blur(5px);
    }

    .author-badge i {
        color: #fff;
    }

    /* Stats Section */
    .author-stats-sec {
        margin-top: -40px;
        position: relative;
        z-index: 10;
        padding-bottom: 60px;
    }

    .stats-card-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .stats-card {
        background: #fff;
        border-radius: 15px;
        padding: 25px 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(99, 68, 212, 0.05);
        text-align: center;
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(99, 68, 212, 0.12);
        border-color: var(--premium-purple);
    }

    .stats-num {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--premium-purple);
        line-height: 1.1;
        margin-bottom: 5px;
    }

    .stats-label {
        font-size: 0.9rem;
        color: var(--premium-text-muted);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Profile Content */
    .author-main-content {
        padding: 80px 0;
    }

    .bio-wrapper {
        background: #fff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.03);
        border: 1px solid #f1f1f1;
        height: 100%;
    }

    .section-title {
        font-weight: 600;
        color: var(--premium-purple-dark);
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 12px;
        text-align: left;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 4px;
        background-color: var(--premium-purple);
        border-radius: 2px;
    }

    .bio-text {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #444;
    }

    .bio-text p {
        margin-bottom: 20px;
    }

    .quote-box {
        background-color: var(--premium-purple-light);
        border-left: 5px solid var(--premium-purple);
        padding: 30px;
        border-radius: 0 15px 15px 0;
        margin-top: 30px;
    }

    .quote-text {
        font-size: 1.15rem;
        font-style: italic;
        line-height: 1.6;
        color: var(--premium-purple-dark);
        font-weight: 500;
        margin-bottom: 10px;
    }

    .quote-author {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        color: var(--premium-purple);
    }

    /* Right Sidebar Profile */
    .profile-sidebar {
        background: var(--premium-gray);
        border-radius: 20px;
        padding: 35px 30px;
        border: 1px solid #eee;
    }

    .sidebar-widget-title {
        font-weight: 700;
        font-size: 1.2rem;
        color: var(--premium-purple-dark);
        margin-bottom: 20px;
        border-bottom: 2px solid rgba(99, 68, 212, 0.1);
        padding-bottom: 10px;
    }

    .info-list {
        list-style: none;
        padding: 0;
        margin: 0 0 30px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e9ecef;
        font-size: 0.95rem;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-key {
        font-weight: 600;
        color: var(--premium-text-muted);
    }

    .info-val {
        color: var(--premium-text);
        font-weight: 500;
        text-align: right;
    }

    .info-val a {
        color: var(--premium-purple);
        text-decoration: none;
        font-weight: 600;
    }

    .info-val a:hover {
        text-decoration: underline;
    }

    .sidebar-social-links {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 15px;
    }

    .sidebar-social-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--premium-purple);
        font-size: 1.2rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        text-decoration: none;
        border: 1px solid rgba(99, 68, 212, 0.1);
    }

    .sidebar-social-btn:hover {
        background-color: var(--premium-purple);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(99, 68, 212, 0.2);
    }

    /* Core Expertise Section */
    .expertise-section {
        background-color: var(--premium-gray);
        padding: 80px 0;
    }

    .expertise-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 40px;
    }

    .expertise-card {
        background: #fff;
        border-radius: 15px;
        padding: 35px 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.02);
        border: 1px solid #f1f1f1;
        transition: all 0.3s ease;
    }

    .expertise-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        border-color: rgba(99, 68, 212, 0.2);
    }

    .expertise-icon-box {
        width: 60px;
        height: 60px;
        background-color: var(--premium-purple-light);
        color: var(--premium-purple);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }

    .expertise-card:hover .expertise-icon-box {
        background-color: var(--premium-purple);
        color: #fff;
    }

    .expertise-card h4 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--premium-purple-dark);
        margin-bottom: 15px;
    }

    .expertise-card p {
        font-size: 0.95rem;
        color: var(--premium-text-muted);
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* Recent Contributions Section */
    .recent-blogs-sec {
        padding: 0px 0 80px;
        background-color: #fff;
    }

    .blog-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        border: 1px solid #f1f1f1;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
    }

    .blog-card-img {
        height: 210px;
        overflow: hidden;
        position: relative;
    }

    .blog-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-card-img img {
        transform: scale(1.08);
    }

    .blog-card-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-card-date {
        color: var(--premium-purple);
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .blog-card-title {
        font-size: 1.15rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 15px;
    }

    .blog-card-title a {
        color: var(--premium-purple-dark);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .blog-card-title a:hover {
        color: var(--premium-purple);
    }

    .blog-card-desc {
        color: var(--premium-text-muted);
        font-size: 0.92rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .blog-card-link {
        margin-top: auto;
        color: var(--premium-purple);
        font-weight: 700;
        text-decoration: none;
        font-size: 0.88rem;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: gap 0.2s ease;
    }

    .blog-card-link:hover {
        gap: 8px;
        color: var(--premium-purple-dark);
    }

    /* Call to Action */
    .author-cta {
        background: linear-gradient(135deg, var(--premium-purple) 0%, #855bff 100%);
        color: #fff;
        padding: 70px 0;
        text-align: center;
    }

    .author-cta h2 {
        font-size: 2.2rem;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .author-cta p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 30px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .author-cta-btn {
        background-color: var(--premium-yellow);
        color: var(--premium-purple-dark);
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 14px 35px;
        border-radius: 50px;
        display: inline-block;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
        transition: all 0.3s ease;
    }

    .author-cta-btn:hover {
        background-color: #fff;
        color: var(--premium-purple-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 255, 255, 0.25);
    }

    @keyframes spin-slow {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Responsive */
    @media (max-width: 991px) {
        .author-hero {
            padding: 60px 0 50px;
        }

        .author-hero-wrap {
            flex-direction: column;
            text-align: center;
            gap: 25px;
        }

        .stats-card-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .expertise-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .author-cta h2 {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 767px) {
        .author-hero-info h1 {
            font-size: 2.2rem;
        }

        .stats-card-grid {
            grid-template-columns: 1fr;
            max-width: 320px;
            margin: 0 auto;
        }

        .expertise-grid {
            grid-template-columns: 1fr;
        }

        .bio-wrapper {
            padding: 30px 20px;
        }
    }
</style>

<div class="author-profile-page">
    <!-- Hero Banner -->
    <section class="author-hero">
        <div class="container">
            <div class="author-hero-wrap">
                <div class="author-avatar-container">
                    <div class="author-avatar-bg"></div>
                    <img src="<?= base_url('assets/images/dynamic/madhavan-a.jpeg') ?>" alt="Madhavan A" class="author-avatar">
                </div>
                <div class="author-hero-info">
                    <h1>Madhavan A</h1>
                    <div class="author-title-badge">Digital Marketing & SEO Expert</div>
                    <div class="author-meta-badges">
                        <div class="author-badge"><i class="bi bi-clock-fill"></i> 8+ Years Experience</div>
                        <div class="author-badge"><i class="bi bi-trophy-fill"></i> Certified Google Specialist</div>
                        <div class="author-badge"><i class="bi bi-geo-alt-fill"></i> Dubai, UAE</div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Bio / Profile Info -->
    <section class="author-main-content">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8">
                    <div class="bio-wrapper">
                        <h2 class="section-title">About Madhavan A</h2>
                        <div class="">
                            <p class="fs-20 mb-4">Madhavan A is professional digital marketer with a specialization in Search Engine Optimization (SEO). Backed by more than 8 years of hands-on experience he possesses deep knowledge of latest digital market trends and SEO-best practices.</p>
                            <p class="fs-20 mb-4">Throughout his professional journey, Madhavan has focused on building data-driven methodologies and proven strategies for business growth. He devises actionable SEO roadmaps for businesses, transforming websites from just landing pages to revenue-generating assets.</p>
                            <p class="fs-20">At BrandStory, he sets the organic growth directives, working closely with engineering, content production, and design divisions to optimize websites. Madhavan focuses on white-hat practices to achieve long-term brand authority and sustainable growth.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="profile-sidebar">
                        <h3 class="sidebar-widget-title">Quick Information</h3>
                        <ul class="info-list">
                            <li class="info-item">
                                <span class="info-key">Role:</span>
                                <span class="info-val">Lead SEO Consultant</span>
                            </li>
                            <li class="info-item">
                                <span class="info-key">Specialization:</span>
                                <span class="info-val">SEO Strategy, CRO, Growth Hacking</span>
                            </li>
                            <li class="info-item">
                                <span class="info-key">Email:</span>
                                <span class="info-val"><a href="mailto:info@brandstory.ae">info@brandstory.ae</a></span>
                            </li>
                            <li class="info-item">
                                <span class="info-key">Office:</span>
                                <span class="info-val">Dubai, UAE</span>
                            </li>
                            <li class="info-item">
                                <span class="info-key">Languages:</span>
                                <span class="info-val">English, Hindi</span>
                            </li>
                        </ul>

                        <h3 class="sidebar-widget-title text-center">Connect & Follow</h3>
                        <div class="sidebar-social-links">
                            <a href="https://in.linkedin.com/in/madhavan-a-850207155" target="_blank" class="sidebar-social-btn" aria-label="LinkedIn">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="mailto:info@brandstory.ae" class="sidebar-social-btn" aria-label="Email">
                                <i class="bi bi-envelope-fill"></i>
                            </a>
                            <a href="https://brandstory.ae" target="_blank" class="sidebar-social-btn" aria-label="Website">
                                <i class="bi bi-globe"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Recent Contributions -->
    <?php if (!empty($latest_blogs)): ?>
        <section class="recent-blogs-sec">
            <div class="container">
                <h2 class="section-title text-center mx-auto" style="width:fit-content; margin-bottom:10px;">Recent Articles by Madhavan A</h2>
                <p class="text-center text-muted max-width-600 mx-auto mb-5">Explore detailed marketing insights, guides, and strategic SEO deep dives published recently.</p>

                <div class="row gy-4">
                    <?php foreach ($latest_blogs as $blog_post): ?>
                        <div class="col-md-4">
                            <div class="blog-card">
                                <div class="blog-card-img">
                                    <?php if (!empty($blog_post['image'])): ?>
                                        <img src="<?= base_url($blog_post['image']) ?>" alt="<?= htmlspecialchars($blog_post['title']) ?>">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/images/blog/default.jpg') ?>" alt="Default Blog Image">
                                    <?php endif; ?>
                                </div>
                                <div class="blog-card-content">
                                    <div class="blog-card-date"><?= date('F d, Y', strtotime($blog_post['created_at'])) ?></div>
                                    <h4 class="blog-card-title">
                                        <?php $postUrl = base_url('blogs/' . $blog_post['slug']); ?>
                                        <a href="<?= $postUrl ?>"><?= htmlspecialchars($blog_post['title']) ?></a>
                                    </h4>
                                    <p class="blog-card-desc"><?= htmlspecialchars(substr(strip_tags($blog_post['description']), 0, 110)) ?>...</p>
                                    <a href="<?= $postUrl ?>" class="blog-card-link">Read full guide <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


</div>