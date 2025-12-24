<section class="scroll-banner-section">
    <div class="sticky-wrapper">
        <!-- Slide 1 -->
        <div class="scroll-slide slide-1 active" id="banner-slide-1">
            <div class="slide-1-content">
                <div class="slide-1-text">
                    <h1>SEO Audit<br>in Dubai Drives</h1>
                </div>
                <div class="slide-1-list">
                    <ul>
                        <li>Actionable Insights</li>
                        <li>Gap Analysis</li>
                        <li>Technical Health</li>
                        <li>Content Audit</li>
                        <li>Backlink Profile</li>
                        <li>Efficiency Gain</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="scroll-slide slide-2 next-slide" id="banner-slide-2">
            <div class="slide-2-content">
                <span class="small-caps-header">At BrandStory</span>
                <img class="brandstory-logo-text" src="<?= base_url('assets/images/logo.svg') ?>" alt="SEO Audit Services in Dubai">
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="scroll-slide slide-3 next-slide" id="banner-slide-3">
            <div class="slide-3-content">
                <p class="slide-3-desc">We provide comprehensive SEO audit services in Dubai, uncovering the hidden issues that limit your website’s potential and providing a clear roadmap for improved rankings and traffic.</p>
                <a href="javascript:void(0);" class="gradient-cta-btn uniq-contact-lead-btn">Book Your Demo Call</a>
            </div>
        </div>
    </div>
</section>

<section class="seo-marquee">
    <div class="seo-marquee-wrapper">
        <div class="seo-marquee-track">

            <a href="#on-page-audit" class="seo-marquee-item">On-Page Audit</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#technical-audit" class="seo-marquee-item">Technical Audit</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#backlink-audit" class="seo-marquee-item">Backlink Audit</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#keyword-audit" class="seo-marquee-item">Keyword Audit</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#competitor-audit" class="seo-marquee-item">Competitor Analysis</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#roadmap" class="seo-marquee-item">SEO Roadmap</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

        </div>
    </div>
</section>

<section class="performance-driven sp-50 dm-bg">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Comprehensive Website SEO Audit
            <span class="db">to Identify Growth Opportunities</span>
        </h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="position-relative mb-lg-0 mb-3 d-lg-block d-none w-100 radius-20">
                    <img class="w-100 radius-20" src="<?= base_url('/assets/images/home/digitalmarketing-desktop.webp') ?>" alt="SEO Audit Dubai">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <ul class="mb-0">
                    <li class="text-white mb-3 fs-20">An SEO audit is the first step towards a successful SEO strategy. At BrandStory, we analyze every aspect of your website to identify strengths, weaknesses, and opportunities for improvement.</li>
                    <li class="text-white mb-3 fs-20">We look at your site's architecture, content relevance, backlink quality, and technical performance. Our detailed reports provide clear, actionable steps to enhance your site's search visibility.</li>
                    <li class="text-white mb-4 fs-20">Get a professional SEO audit in Dubai and start your journey towards dominance in search rankings.</li>
                </ul>
                <a href="/contact" class="Performance-Driven-btn">➤ Contact Us Now</a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../component/expert_team.php' ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const section = document.querySelector('.scroll-banner-section');
        const slide1 = document.getElementById('banner-slide-1');
        const slide2 = document.getElementById('banner-slide-2');
        const slide3 = document.getElementById('banner-slide-3');
        if (!section) return;
        window.addEventListener('scroll', () => {
            const rect = section.getBoundingClientRect();
            const viewportHeight = window.innerHeight;
            const scrollHeight = section.offsetHeight - viewportHeight;
            let progress = -rect.top / scrollHeight;
            progress = Math.max(0, Math.min(1, progress));
            if (progress < 0.33) {
                slide1.classList.add('active');
                slide1.classList.remove('prev-slide', 'next-slide');
                slide2.classList.remove('active', 'prev-slide');
                slide2.classList.add('next-slide');
                slide3.classList.remove('active', 'prev-slide');
                slide3.classList.add('next-slide');
            } else if (progress < 0.66) {
                slide1.classList.remove('active', 'next-slide');
                slide1.classList.add('prev-slide');
                slide2.classList.add('active');
                slide2.classList.remove('prev-slide', 'next-slide');
                slide3.classList.remove('active', 'prev-slide');
                slide3.classList.add('next-slide');
            } else {
                slide1.classList.remove('active', 'next-slide');
                slide1.classList.add('prev-slide');
                slide2.classList.remove('active', 'next-slide');
                slide2.classList.add('prev-slide');
                slide3.classList.add('active');
                slide3.classList.remove('prev-slide', 'next-slide');
            }
        });
    });
</script>