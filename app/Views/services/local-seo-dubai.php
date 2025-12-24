<section class="scroll-banner-section">
    <div class="sticky-wrapper">
        <!-- Slide 1 -->
        <div class="scroll-slide slide-1 active" id="banner-slide-1">
            <div class="slide-1-content">
                <div class="slide-1-text">
                    <h1>Local SEO<br>in Dubai Drives</h1>
                </div>
                <div class="slide-1-list">
                    <ul>
                        <li>Local Map Presence</li>
                        <li>Increased Footfall</li>
                        <li>GMB Optimization</li>
                        <li>Local Citations</li>
                        <li>Hyper-Local Visibility</li>
                        <li>Community Engagement</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="scroll-slide slide-2 next-slide" id="banner-slide-2">
            <div class="slide-2-content">
                <span class="small-caps-header">At BrandStory</span>
                <img class="brandstory-logo-text" src="<?= base_url('assets/images/logo.svg') ?>" alt="Local SEO Services in Dubai">
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="scroll-slide slide-3 next-slide" id="banner-slide-3">
            <div class="slide-3-content">
                <p class="slide-3-desc">We are the go-to local SEO agency in Dubai, helping businesses dominate local search results and attract customers in their immediate vicinity through Google My Business and localized content.</p>
                <a href="javascript:void(0);" class="gradient-cta-btn uniq-contact-lead-btn">Book Your Demo Call</a>
            </div>
        </div>
    </div>
</section>

<section class="seo-marquee">
    <div class="seo-marquee-wrapper">
        <div class="seo-marquee-track">

            <a href="#gmb-optimization" class="seo-marquee-item">GMB Optimization</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#local-citaitons" class="seo-marquee-item">Local Citations</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#local-keywords" class="seo-marquee-item">Local Keyword Targeting</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#reputation-management" class="seo-marquee-item">Reputation Management</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#nap-consistency" class="seo-marquee-item">NAP Consistency</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

            <a href="#local-backlinks" class="seo-marquee-item">Local Backlinks</a>
            <span class="seo-marquee-sep"><img src="/assets/images/new-seo/asterisk-icon.svg" alt="SEO Services by BrandStory" /></span>

        </div>
    </div>
</section>

<section class="performance-driven sp-50 dm-bg">
    <div class="container">
        <h2 class="text-white mb-lg-5 mb-4 text-md-start text-center">Local SEO Services in Dubai
            <span class="db">to Attract Nearby Customers</span>
        </h2>
        <div class="row">
            <div class="col-lg-12">
                <ul class="mb-0">
                    <li class="text-white mb-3 fs-20">Local SEO is crucial for businesses with a physical location or serving a specific area. At BrandStory, we ensure your business appears in the "Local Pack" and on Google Maps.</li>
                    <li class="text-white mb-3 fs-20">We optimize your Google My Business profile, build local citations, and create content tailored to your local audience in Dubai.</li>
                    <li class="text-white mb-4 fs-20">Grow your footfall and local inquiries with our expert local SEO services in Dubai.</li>
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