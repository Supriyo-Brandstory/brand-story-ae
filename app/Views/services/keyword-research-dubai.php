<section class="scroll-banner-section">
    <div class="sticky-wrapper">
        <!-- Slide 1 -->
        <div class="scroll-slide slide-1 active" id="banner-slide-1">
            <div class="slide-1-content">
                <div class="slide-1-text">
                    <h1>Keyword Research<br>in Dubai Drives</h1>
                </div>
                <div class="slide-1-list">
                    <ul>
                        <li>Targeted Traffic</li>
                        <li>High Intent Leads</li>
                        <li>Competitive Advantage</li>
                        <li>Better ROI</li>
                        <li>Content Relevance</li>
                        <li>Market Insights</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="scroll-slide slide-2 next-slide" id="banner-slide-2">
            <div class="slide-2-content">
                <span class="small-caps-header">At BrandStory</span>
                <img class="brandstory-logo-text" src="<?= base_url('assets/images/logo.svg') ?>" alt="Keyword Research Services in Dubai">
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="scroll-slide slide-3 next-slide" id="banner-slide-3">
            <div class="slide-3-content">
                <p class="slide-3-desc">We are keyword research specialists in Dubai, identifying the most valuable search terms for your business to ensure your content reaches the right audience at the right time.</p>
                <a href="javascript:void(0);" class="gradient-cta-btn uniq-contact-lead-btn">Book Your Demo Call</a>
            </div>
        </div>
    </div>
</section>

<section class="seo-marquee">
    <div class="seo-marquee-wrapper">
        <div class="seo-marquee-track">

            <a href="#long-tail-keywords" class="seo-marquee-item">Long-Tail Keywords</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="Keyword Research by BrandStory" /></span>

            <a href="#commercial-intent" class="seo-marquee-item">Commercial Intent</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="Keyword Research by BrandStory" /></span>

            <a href="#competitor-keywords" class="seo-marquee-item">Competitor Keywords</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="Keyword Research by BrandStory" /></span>

            <a href="#search-volume" class="seo-marquee-item">Search Volume Analysis</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="Keyword Research by BrandStory" /></span>

            <a href="#keyword-mapping" class="seo-marquee-item">Keyword Mapping</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="Keyword Research by BrandStory" /></span>

            <a href="#local-keywords" class="seo-marquee-item">Local Keywords</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="Keyword Research by BrandStory" /></span>

        </div>
    </div>
</section>

<section class="performance-driven sp-50 dm-bg">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Targeted Keyword Research Services
            <span class="db">to Dominate Search Intent</span>
        </h2>
        <div class="row">
            <div class="col-lg-12 align-self-center">
                <ul class="mb-0">
                    <li class="text-white mb-3 fs-20">Keyword research is the foundation of any SEO strategy. At BrandStory, we use advanced tools to find the terms your customers are actually searching for.</li>
                    <li class="text-white mb-3 fs-20">We analyze search volume, competition, and user intent to help you prioritize keywords that deliver the best return on investment.</li>
                    <li class="text-white mb-4 fs-20">Unlock the potential of your website with a data-driven keyword research strategy.</li>
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