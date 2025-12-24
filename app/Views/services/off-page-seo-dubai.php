<section class="scroll-banner-section">
    <div class="sticky-wrapper">
        <!-- Slide 1 -->
        <div class="scroll-slide slide-1 active" id="banner-slide-1">
            <div class="slide-1-content">
                <div class="slide-1-text">
                    <h1>Off-Page SEO<br>in Dubai Drives</h1>
                </div>
                <div class="slide-1-list">
                    <ul>
                        <li>Brand Authority</li>
                        <li>High-Quality Backlinks</li>
                        <li>Social Signals</li>
                        <li>Referral Traffic</li>
                        <li>Domain Trust</li>
                        <li>Search Credibility</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="scroll-slide slide-2 next-slide" id="banner-slide-2">
            <div class="slide-2-content">
                <span class="small-caps-header">At BrandStory</span>
                <img class="brandstory-logo-text" src="<?= base_url('assets/images/logo.svg') ?>" alt="Off-Page SEO Services in Dubai">
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="scroll-slide slide-3 next-slide" id="banner-slide-3">
            <div class="slide-3-content">
                <p class="slide-3-desc">We are an expert off-page SEO agency in Dubai, dedicated to building your website’s authority and reputation through strategic link building, content promotion, and brand mentions.</p>
                <a href="javascript:void(0);" class="gradient-cta-btn uniq-contact-lead-btn">Book Your Demo Call</a>
            </div>
        </div>
    </div>
</section>

<section class="seo-marquee">
    <div class="seo-marquee-wrapper">
        <div class="seo-marquee-track">

            <a href="#link-building" class="seo-marquee-item">Link Building</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#guest-posting" class="seo-marquee-item">Guest Posting</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#brand-mentions" class="seo-marquee-item">Brand Mentions</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#social-media-seo" class="seo-marquee-item">Social Media SEO</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#content-promotion" class="seo-marquee-item">Content Promotion</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#local-citations" class="seo-marquee-item">Local Citations</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

        </div>
    </div>
</section>

<section class="performance-driven sp-50 dm-bg">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Off-Page SEO Services in Dubai
            <span class="db">to Build Brand Authority</span>
        </h2>
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <ul class="mb-0">
                    <li class="text-white mb-3 fs-20">Off-page SEO is about everything you do outside of your website to improve its rankings. At BrandStory, we focus on building a strong digital footprint for your brand.</li>
                    <li class="text-white mb-3 fs-20">Through ethical link building, guest blogging, and influencer outreach, we help you acquire high-quality backlinks that signal trust and authority to search engines.</li>
                    <li class="text-white mb-4 fs-20">Experience the power of a comprehensive off-page SEO strategy that elevates your brand's presence across the web.</li>
                </ul>
                <a href="/contact" class="Performance-Driven-btn">➤ Contact Us Now</a>
            </div>
            <div class="col-lg-6">
                <!-- Image here -->
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