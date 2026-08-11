<link rel="stylesheet" href="<?= base_url('assets/css/home-2.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/logo-design.css') ?>">

<!-- Hero Banner Section -->
<section class="premium-hero-slider branding-hero-slider">
  <div class="premium-slider-container">
    <!-- Slide 1 -->
    <div class="premium-slide active" style="background-image: url('<?= base_url('assets/images/branding-01.webp') ?>');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12 col-12">
            <div class="premium-slide-content">
              <h1 class="premium-slide-title">Best Creative <span class="premium-purple-highlight">Branding</span> Agency in Dubai, UAE</h1>
              <p class="premium-slide-subtitle">Integrated branding and marketing agency built to help businesses launch with impact, scale with strategy, and lead with distinction across Dubai, the UAE, and the GCC.</p>
              <div class="premium-slide-actions">
                <a href="javascript:void(0);" class="premium-pill-btn uniq-contact-lead-btn">
                  <span>Talk to Experts</span>
                  <span class="btn-arrow-circle">
                    <svg viewBox="0 0 24 24" class="btn-arrow-svg">
                      <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Slide 2 -->
    <div class="premium-slide" style="background-image: url('<?= base_url('assets/images/branding-02.webp') ?>');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12 col-12">
            <div class="premium-slide-content">
              <h1 class="premium-slide-title">We Build Iconic, <span class="premium-purple-highlight">Future-Ready</span> Brands</h1>
              <p class="premium-slide-subtitle">Every brand has a story. We make sure yours is impossible to ignore. Crafting branding identities that spark recognition, trust, and connection.</p>
              <div class="premium-slide-actions">
                <a href="javascript:void(0);" class="premium-pill-btn uniq-contact-lead-btn">
                  <span>Talk to Experts</span>
                  <span class="btn-arrow-circle">
                    <svg viewBox="0 0 24 24" class="btn-arrow-svg">
                      <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation Dots -->
  <div class="premium-slider-dots">
    <span class="slider-dot active" data-index="0"></span>
    <span class="slider-dot" data-index="1"></span>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const bannerSection = document.querySelector('.branding-hero-slider');
    if (!bannerSection) return;
    
    const slides = bannerSection.querySelectorAll('.premium-slide');
    const dots = bannerSection.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    let slideInterval;
    const intervalTime = 6000;

    function showSlide(index) {
        if (index >= slides.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = slides.length - 1;
        } else {
            currentSlide = index;
        }

        slides.forEach((slide, i) => {
            if (i === currentSlide) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });

        dots.forEach((dot, i) => {
            if (i === currentSlide) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function startSlideShow() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            showSlide(i);
            startSlideShow();
        });
    });

    startSlideShow();
});
</script>

<!-- Our Recent Projects Section -->
<section class="logo-recent-projects-sec">
  <div class="logo-projects-header">
    <div class="container">
      <h2 class="logo-projects-title">We are The Creative <br>Branding Powerhouse in Dubai, UAE</h2>
    </div>
  </div>

  <div class="branding-projects-collage">
    <!-- 2x3 Grid (6 Images) -->
    <div class="branding-projects-grid">
      <!-- 1st Image: branding-03.webp -->
      <div class="branding-collage-item">
        <img src="<?= base_url('assets/images/branding-03.webp') ?>" alt="Branding Project 1" class="img-fluid branding-collage-img">
      </div>
      <!-- 2nd Image: branding-04.webp -->
      <div class="branding-collage-item">
        <img src="<?= base_url('assets/images/branding-04.webp') ?>" alt="Branding Project 2" class="img-fluid branding-collage-img">
      </div>
      <!-- 3rd Image: branding-05.webp -->
      <div class="branding-collage-item">
        <img src="<?= base_url('assets/images/branding-05.webp') ?>" alt="Branding Project 3" class="img-fluid branding-collage-img">
      </div>
      <!-- 4th Image: branding-06.webp -->
      <div class="branding-collage-item">
        <img src="<?= base_url('assets/images/branding-06.webp') ?>" alt="Branding Project 4" class="img-fluid branding-collage-img">
      </div>
      <!-- 5th Image: branding-07.webp -->
      <div class="branding-collage-item">
        <img src="<?= base_url('assets/images/branding-07.webp') ?>" alt="Branding Project 5" class="img-fluid branding-collage-img">
      </div>
      <!-- 6th Image: branding-08.webp -->
      <div class="branding-collage-item">
        <img src="<?= base_url('assets/images/branding-08.webp') ?>" alt="Branding Project 6" class="img-fluid branding-collage-img">
      </div>
    </div>
  </div>
</section>

<!-- Fitwares Project Showcase Section  -->
<section class="logo-fitwares-projects-sec">
  <div class="branding-fitwares-collage">
    <!-- Top Full Width Banner (branding-09.webp) -->
    <div class="branding-fitwares-top">
      <img src="<?= base_url('assets/images/branding-09.webp') ?>" alt="Branding Fitwares Banner" class="img-fluid branding-fitwares-img">
    </div>

    <!-- Bottom Row (2 Columns) -->
    <div class="branding-fitwares-bottom-row">
      <!-- Left Column (branding-10.webp) -->
      <div class="branding-fitwares-col">
        <img src="<?= base_url('assets/images/branding-10.webp') ?>" alt="Branding Fitwares Left" class="img-fluid branding-fitwares-img">
      </div>
      <!-- Right Column (branding-11.webp) -->
      <div class="branding-fitwares-col">
        <img src="<?= base_url('assets/images/branding-11.webp') ?>" alt="Branding Fitwares Right" class="img-fluid branding-fitwares-img">
      </div>
    </div>
  </div>
</section>

<!-- Vitality Project Showcase Section -->
<section class="logo-vitality-projects-sec">
  <div class="branding-vitality-collage">
    <!-- Row 1: 2 Columns (branding-12.webp & branding-13.webp) -->
    <div class="branding-vitality-row-grid">
      <div class="branding-vitality-col">
        <img src="<?= base_url('assets/images/branding-12.webp') ?>" alt="Branding Vitality Hoodie" class="img-fluid branding-vitality-img">
      </div>
      <div class="branding-vitality-col">
        <img src="<?= base_url('assets/images/branding-13.webp') ?>" alt="Branding Vitality Tags" class="img-fluid branding-vitality-img">
      </div>
    </div>

    <!-- Row 2: Full Width (branding-14.webp) -->
    <div class="branding-vitality-full-width">
      <img src="<?= base_url('assets/images/branding-14.webp') ?>" alt="Branding Vitality Models" class="img-fluid branding-vitality-img">
    </div>

    <!-- Row 3: 2 Columns (branding-15.webp & branding-16.webp) -->
    <div class="branding-vitality-row-grid">
      <div class="branding-vitality-col">
        <img src="<?= base_url('assets/images/branding-15.webp') ?>" alt="Branding Vitality Shopping Bag" class="img-fluid branding-vitality-img">
      </div>
      <div class="branding-vitality-col">
        <img src="<?= base_url('assets/images/branding-16.webp') ?>" alt="Branding Vitality Apparel Set" class="img-fluid branding-vitality-img">
      </div>
    </div>
  </div>
</section>
 <section class="new-client-section">
  <div class="container">
    <h2 class="text-left mb-5 text-white">Trusted by Visionary Brands</h2> <?php include __DIR__ . "/../component/client_section.php"; ?>
  </div>
</section>
<!-- We are Creative Branding Agency in Dubai, UAE -->
<section class="premium-perf-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Image -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="premium-perf-img-wrap">
                    <img src="<?= base_url('assets/images/branding-17.webp') ?>" width="1332" height="1302"
                        alt="Creative Branding Agency Dubai" class="img-fluid premium-perf-img">
                </div>
            </div>
            <!-- Right Side: Content -->
            <div class="col-lg-6">
                <div class="premium-perf-content">
                    <h2 class="premium-perf-title">We are BrandStory, The <br>Top Branding Experts in Dubai</h2>
                    <ul class="premium-perf-list">
                        <li>A top-level branding agency in Dubai, BrandStory is where strategy meets storytelling. We believe every business has a narrative that can inspire, connect, and convert. Born and built in Dubai, we carry its drive and ambition in our DNA- and we've used it to help 900+ businesses start bold, grow smart, and thrive across the GCC and globally.</li>
                        <li>Over the last 13+ years, we have partnered with 1000+ brands across various industries- from ambitious startups to enterprises, and established global names. Our focus has always been on close collaboration and delivering measurable results.</li>
                    </ul>
                    <div class="premium-perf-action">
                        <a href="/about/" class="premium-perf-btn">Know About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Types Of Logo Design Services Section -->
<section class="logo-types-section branding">
  <div class="container">
    <!-- Main Title above columns -->
    <h2 class="logo-types-main-title">Our Expertise in Branding</h2>

    <div class="row align-items-stretch g-4 g-lg-5">
      <!-- Left Sidebar: Tab Navigation directly on section background -->
      <div class="col-lg-4 col-12">
        <div class="logo-types-nav-list" role="tablist" aria-label="Branding Strategies">
          <div class="logo-types-nav-item-wrap">
            <button class="logo-types-nav-item active" id="tab-type-1" data-target="content-type-1" type="button" role="tab" aria-selected="true" aria-controls="content-type-1">
              Brand Strategy
            </button>
          </div>
          <div class="logo-types-nav-item-wrap">
            <button class="logo-types-nav-item" id="tab-type-2" data-target="content-type-2" type="button" role="tab" aria-selected="false" aria-controls="content-type-2">
              Logo and Identity
            </button>
          </div>
          <div class="logo-types-nav-item-wrap">
            <button class="logo-types-nav-item" id="tab-type-3" data-target="content-type-3" type="button" role="tab" aria-selected="false" aria-controls="content-type-3">
              Brand Naming
            </button>
          </div>
          <div class="logo-types-nav-item-wrap">
            <button class="logo-types-nav-item" id="tab-type-4" data-target="content-type-4" type="button" role="tab" aria-selected="false" aria-controls="content-type-4">
              Brand Messaging
            </button>
          </div>
          <div class="logo-types-nav-item-wrap">
            <button class="logo-types-nav-item" id="tab-type-5" data-target="content-type-5" type="button" role="tab" aria-selected="false" aria-controls="content-type-5">
              Brand Guidelines
            </button>
          </div>
          <div class="logo-types-nav-item-wrap">
            <button class="logo-types-nav-item" id="tab-type-6" data-target="content-type-6" type="button" role="tab" aria-selected="false" aria-controls="content-type-6">
              Rebranding Services
            </button>
          </div>
        </div>
      </div>

      <!-- Right Side: Content Panels inside the dark card box -->
      <div class="col-lg-8 col-12">
        <div class="logo-types-card-box">
          <div class="logo-types-content-wrapper">
            <!-- Content 1: Brand Awareness -->
            <div class="logo-types-panel active branding-panel-content" id="content-type-1" role="tabpanel" aria-labelledby="tab-type-1">
              <h3 class="branding-strategy-item-title">The Right Strategy</h3>
              <p class="branding-strategy-item-desc">A brand is the mental shortcut that people remember instantly. When you think of streaming entertainment, what comes to mind first? Netflix. Affordable luxury in hospitality? Rove. The smoothest ride-hailing experience? Careem. That's BrandStory- building category-defining brands that occupy the first slot in your customer's mind when it matters most.</p>
              
              <p class="branding-strategy-item-desc">This isn't achieved through surface-level aesthetics or clever advertising alone, though both play their part. It begins with understanding the real tension your customer faces- the unmet need, the unspoken expectation, the gap between what exists and what should exist. Our process is built on immersive research, collaborative strategy workshops, competitive white-space analysis, and a deep read of cultural shifts shaping behavior across the UAE, GCC, and global markets.</p>

            </div>

            <!-- Content 2: Audience Growth -->
            <div class="logo-types-panel branding-panel-content" id="content-type-2" role="tabpanel" aria-labelledby="tab-type-2">
              <h3 class="branding-strategy-item-title">Logo & Visual Identity</h3>
              <p class="branding-strategy-item-desc">A visual identity is a promise made visible. What symbols flash in your mind when you think of sportswear? The Nike Swoosh. Technology? Apple. Coffee? The Starbucks Siren. That's BrandStory- crafting distinctive visual identities that become instantly recognizable shorthand for everything your brand stands for.</p>
              
              <p class="branding-strategy-item-desc">This isn't achieved through decoration or trendy aesthetics alone, though visual appeal matters. It's about distilling your brand's essence into a mark that communicates trust, quality, and purpose before a single word is read. Our process begins with deep brand discovery, competitive analysis, and audience psychology. We explore form, color theory, typography, and symbolism across cultures- followed by meticulous refinement to ensure your logo performs flawlessly whether etched on a business card or illuminated on a billboard.</p>
              
            </div>

            <!-- Content 3: Customer Acquisition -->
            <div class="logo-types-panel branding-panel-content" id="content-type-3" role="tabpanel" aria-labelledby="tab-type-3">
              <h3 class="branding-strategy-item-title">Brand Naming</h3>
              <p class="branding-strategy-item-desc">A name is the first story your brand tells. What comes to mind when you think of electric vehicles? Tesla. Premium audio? JBL. Search? Google. That's BrandStory- developing names that don't just identify your business, but position it, evoke emotion, and own space in your customer's mind.</p>
              
              <p class="branding-strategy-item-desc">This isn't about clever wordplay or trendy portmanteaus, although creativity is essential. It's about understanding the cultural, phonetic, and competitive landscape your name must survive in. Our process involves linguistic screening, trademark analysis, audience testing, and semantic mapping across languages. We create names that are memorable, ownable, and built to travel- from Dubai to global markets.</p>
              
            </div>

            <!-- Content 4: Customer Retention -->
            <div class="logo-types-panel branding-panel-content" id="content-type-4" role="tabpanel" aria-labelledby="tab-type-4">
              <h3 class="branding-strategy-item-title">Brand Messaging</h3>
              <p class="branding-strategy-item-desc">A message is a bridge between what you do and why people should care. Which brands come to mind when you think of motivation? Nike. Simplicity? Apple. Connection? Coca-Cola. At BrandStory, we architect brand messages that turn your purpose into a conversation your audience actually wants to engage.</p>
              
              <p class="branding-strategy-item-desc">It's about understanding what your audience values, fears, and aspires to then crafting a message architecture that meets them in those moments. Our process involves stakeholder interviews, competitive messaging audits, voice and tone development, and narrative frameworks. We build communication systems that ensure every touchpoint- from your website to your sales deck speaks with one clear, compelling voice.</p>
            </div>

            <!-- Content 5: Customer Loyalty -->
            <div class="logo-types-panel branding-panel-content" id="content-type-5" role="tabpanel" aria-labelledby="tab-type-5">
              <h3 class="branding-strategy-item-title">Brand Guidelines</h3>
              <p class="branding-strategy-item-desc">A brand system is the rulebook that keeps your identity consistent. Which brands look the same everywhere you encounter them? The ones with color codes you recognize, fonts you remember, layouts you trust. We build comprehensive brand guidelines that protect your visual and verbal investment across every application.</p>
              
              <p class="branding-strategy-item-desc">It's about building a living system that empowers your team and partners to represent your brand accurately without constant oversight. Our process involves codifying your visual identity- logo usage, color palettes, typography, imagery, and layout principles alongside your verbal identity, tone of voice, and messaging frameworks. We create branding guidelines that scale with your business.</p>
              
            </div>

            <!-- Content 6: Rebranding Services -->
            <div class="logo-types-panel branding-panel-content" id="content-type-6" role="tabpanel" aria-labelledby="tab-type-6">
              <h3 class="branding-strategy-item-title">Rebranding & Brand Refresh</h3>
              <p class="branding-strategy-item-desc">A rebrand is a strategic reinvention, not a cosmetic change. Which companies come to mind when you think of brands that evolved without losing their soul? Airbnb. Starbucks. Burberry. At BrandStory guides established businesses through transformation that modernizes their identity while preserving the equity they've built.</p>
              
              <p class="branding-strategy-item-desc">It's about understanding why your brand no longer connects whether through market shifts, audience evolution, or competitive pressure and strategically repositioning for what's next. Our process involves brand audits, stakeholder alignment, equity analysis, and phased rollout planning. We ensure your rebrand feels like a natural next chapter, not a confusing departure.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
(function() {
  function switchTab(btn) {
    if (!btn) return;
    var targetId = btn.getAttribute('data-target');
    if (!targetId) return;

    var container = btn.closest('.logo-types-card-box') || document;
    var navItems = container.querySelectorAll('.logo-types-nav-item');
    var panels = container.querySelectorAll('.logo-types-panel');

    navItems.forEach(function(nav) {
      nav.classList.remove('active');
      nav.setAttribute('aria-selected', 'false');
    });

    panels.forEach(function(panel) {
      panel.classList.remove('active');
    });

    btn.classList.add('active');
    btn.setAttribute('aria-selected', 'true');

    var activePanel = document.getElementById(targetId);
    if (activePanel) {
      activePanel.classList.add('active');
    }
  }

  // Global click listener for tab switching
  document.addEventListener('click', function(e) {
    var btn = e.target.closest('.logo-types-nav-item');
    if (btn) {
      switchTab(btn);
    }
  });

  // Expose function globally if needed
  window.switchLogoTypeTab = switchTab;
})();
</script>

<section class="sp-50 dm-bg">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12 text-center text-md-start">
        <h2 class="text-white fs-38">Industries We Serve with Branding</h2>
        <p class="text-white mb-0 fs-20">We deliver targeted branding services that resonate within specific sectors, driving recognition and value.</p>
      </div>
    </div>
    <div class="row g-4">
      <!-- Real Estate -->
      <div class="col-lg-4 col-md-6 col-12">
        <a href="/industries/real-estate-branding-agency-in-dubai-uae/" class="industry-card-link text-decoration-none">
          <div class="industry-card">
            <div class="industry-card-bg" style="background-image: url('/assets/images/industries_images/real-estate.webp');"></div>
            <div class="industry-card-overlay"></div>
            <div class="industry-card-content">
              <h3>Real Estate</h3>
              <p>Elevating property developers and brokerage firms with premium visual identities that inspire trust and drive high-value sales.</p>
              <span class="industry-card-btn">Explore More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></span>
            </div>
          </div>
        </a>
      </div>

      <!-- Education -->
      <div class="col-lg-4 col-md-6 col-12">
        <a href="/industries/education-branding-agency-in-dubai-uae/" class="industry-card-link text-decoration-none">
          <div class="industry-card">
            <div class="industry-card-bg" style="background-image: url('/assets/images/industries_images/education.webp');"></div>
            <div class="industry-card-overlay"></div>
            <div class="industry-card-content">
              <h3>Education</h3>
              <p>Positioning schools, nurseries, and universities as centers of excellence with strategic and inspiring brand guidelines.</p>
              <span class="industry-card-btn">Explore More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></span>
            </div>
          </div>
        </a>
      </div>

      <!-- Healthcare -->
      <div class="col-lg-4 col-md-6 col-12">
        <a href="/industries/healthcare-branding-agency-in-dubai-uae/" class="industry-card-link text-decoration-none">
          <div class="industry-card">
            <div class="industry-card-bg" style="background-image: url('/assets/images/industries_images/medical.webp');"></div>
            <div class="industry-card-overlay"></div>
            <div class="industry-card-content">
              <h3>Healthcare</h3>
              <p>Designing empathetic, professional visual languages for clinics, hospitals, and wellness centers to build patient confidence.</p>
              <span class="industry-card-btn">Explore More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></span>
            </div>
          </div>
        </a>
      </div>

      <!-- E-commerce -->
      <div class="col-lg-4 col-md-6 col-12">
        <a href="/industries/e-commerce-branding-agency-in-dubai-uae/" class="industry-card-link text-decoration-none">
          <div class="industry-card">
            <div class="industry-card-bg" style="background-image: url('/assets/images/industries_images/ecom.webp');"></div>
            <div class="industry-card-overlay"></div>
            <div class="industry-card-content">
              <h3>E-commerce</h3>
              <p>Creating high-conversion, digital-first brand experiences that optimize client trust, packaging appeal, and digital recall.</p>
              <span class="industry-card-btn">Explore More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></span>
            </div>
          </div>
        </a>
      </div>

      <!-- Law Firm -->
      <div class="col-lg-4 col-md-6 col-12">
        <a href="/industries/law-firm-branding-services-in-dubai/" class="industry-card-link text-decoration-none">
          <div class="industry-card">
            <div class="industry-card-bg" style="background-image: url('/assets/images/industries/law-firm-4.webp');"></div>
            <div class="industry-card-overlay"></div>
            <div class="industry-card-content">
              <h3>Law Firm</h3>
              <p>Establishing prestigious and authoritative brand narratives that reflect trust, professionalism, and legal expertise.</p>
              <span class="industry-card-btn">Explore More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></span>
            </div>
          </div>
        </a>
      </div>

      <!-- Automotive -->
      <div class="col-lg-4 col-md-6 col-12">
        <a href="/industries/automotive-branding-services-in-dubai/" class="industry-card-link text-decoration-none">
          <div class="industry-card">
            <div class="industry-card-bg" style="background-image: url('/assets/images/industries/automotive-1.webp');"></div>
            <div class="industry-card-overlay"></div>
            <div class="industry-card-content">
              <h3>Automotive</h3>
              <p>Driving brand impact for showrooms and automotive brands with high-energy visuals and premium design strategies.</p>
              <span class="industry-card-btn">Explore More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></span>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="wcp-section dm-bg sp-50">
  <div class="container">

    <!-- Top label -->
    <div class="wcp-top-label">
      <span class="wcp-top-tag">&#9670; Why BrandStory</span>
    </div>

    <div class="wcp-layout">

      <!-- LEFT: Sticky Panel -->
      <div class="wcp-left">
        <div class="wcp-left-inner">
          <h2 class="wcp-left-title">Why Choose BrandStory as Your Branding Partner?</h2>
          <p class="wcp-left-sub">We build brands that are easy to recognize, hard to replace, and designed for long-term market relevance.</p>

          <!-- Stats Row -->
          <div class="wcp-stats">
            <div class="wcp-stat">
              <span class="wcp-stat-num">10<span class="wcp-stat-plus">+</span></span>
              <span class="wcp-stat-label">Years in Dubai</span>
            </div>
            <div class="wcp-stat-div"></div>
            <div class="wcp-stat">
              <span class="wcp-stat-num">1,000<span class="wcp-stat-plus">+</span></span>
              <span class="wcp-stat-label">Brands Built</span>
            </div>
            <div class="wcp-stat-div"></div>
            <div class="wcp-stat">
              <span class="wcp-stat-num">5<span class="wcp-stat-plus">★</span></span>
              <span class="wcp-stat-label">Client Rating</span>
            </div>
          </div>

          <a href="/contact/" class="wcp-left-btn">➤ Get in Touch</a>
        </div>
      </div>

      <!-- RIGHT: Accordion rows -->
      <div class="wcp-right">

        <!-- Item 1 -->
        <div class="wcp-item">
          <div class="wcp-item-num">01</div>
          <div class="wcp-item-content">
            <div class="wcp-item-top">
              <span class="wcp-item-tag">Experience</span>
              <h3 class="wcp-item-title">10+ Years of Proven Experience</h3>
            </div>
            <p class="wcp-item-text">Over a decade of crafting powerful, durable brand identities for startups, SMEs, and enterprises across Dubai and the UAE with measurable results every time.</p>
          </div>
          <div class="wcp-item-arrow">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M5 11H17M17 11L12 6M17 11L12 16" stroke="#855BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="wcp-item">
          <div class="wcp-item-num">02</div>
          <div class="wcp-item-content">
            <div class="wcp-item-top">
              <span class="wcp-item-tag">Global + Local</span>
              <h3 class="wcp-item-title">Local Insights + Global Branding Standards</h3>
            </div>
            <p class="wcp-item-text">We blend deep knowledge of the Dubai and GCC market with internationally recognized branding frameworks- building brands that resonate locally and scale globally.</p>
          </div>
          <div class="wcp-item-arrow">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M5 11H17M17 11L12 6M17 11L12 16" stroke="#855BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="wcp-item">
          <div class="wcp-item-num">03</div>
          <div class="wcp-item-content">
            <div class="wcp-item-top">
              <span class="wcp-item-tag">Creative</span>
              <h3 class="wcp-item-title">Award-Winning Creative Team</h3>
            </div>
            <p class="wcp-item-text">Our designers, brand strategists, and storytellers are recognized for delivering exceptional, category-defining brand experiences that stand apart in competitive markets.</p>
          </div>
          <div class="wcp-item-arrow">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M5 11H17M17 11L12 6M17 11L12 16" stroke="#855BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>

        <!-- Item 4 -->
        <div class="wcp-item">
          <div class="wcp-item-num">04</div>
          <div class="wcp-item-content">
            <div class="wcp-item-top">
              <span class="wcp-item-tag">Strategy</span>
              <h3 class="wcp-item-title">Data-Driven Strategy + Imaginative Design</h3>
            </div>
            <p class="wcp-item-text">Every brand decision is anchored in real market data and consumer insights- paired with imaginative creative execution that makes your brand visually unforgettable.</p>
          </div>
          <div class="wcp-item-arrow">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M5 11H17M17 11L12 6M17 11L12 16" stroke="#855BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>

        <!-- Item 5 -->
        <div class="wcp-item">
          <div class="wcp-item-num">05</div>
          <div class="wcp-item-content">
            <div class="wcp-item-top">
              <span class="wcp-item-tag">Growth</span>
              <h3 class="wcp-item-title">Strategic Brand Building for Long-term Value</h3>
            </div>
            <p class="wcp-item-text">We don't build brands for today. We build brand equity that compounds- creating loyalty, recognition, and sustained competitive advantage that grows your business for years ahead.</p>
          </div>
          <div class="wcp-item-arrow">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M5 11H17M17 11L12 6M17 11L12 16" stroke="#855BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>

        <!-- Bottom highlight bar -->
        <div class="wcp-bottom-bar">
          <p>&#9733; Trusted by <strong>900+ leading brands</strong> across Dubai, UAE and the wider GCC region.</p>
        </div>

      </div>
    </div>
  </div>
</section>
<section class="premium-cs-section">
    <div class="container">
        <!-- Header row -->
        <div class="row align-items-center mb-5">
            <div class="col-md-7">
                <h2 class="premium-cs-title">Real Brands. Real Results. <br>Real Digital Marketing Success.</h2>
            </div>
            <div class="col-md-5">
                <p class="premium-cs-subtitle">Discover how our strategic digital marketing approach has turned business
                    challenges into measurable growth for brands in Dubai, UAE.</p>
                <div class="mt-4">
                    <a href="/case-study/" class="premium-cs-btn">View All Portfolio</a>
                </div>
            </div>
        </div>

        <!-- Redesigned Case Study list -->
        <div class="premium-cs-list">
            <!-- Card 1: Sand Dollar -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-01.webp') ?>"
                                alt="Sand Dollar Dubai- Ecommerce" class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">Sand Dollar Dubai- Ecommerce</h3>
                            <div class="premium-cs-row-stats">135% More Sales | 400% More Traffic | Just 3 Months</div>
                            <p class="premium-cs-row-desc">A thriving e-commerce brand in Downtown Dubai faced stagnant
                                sales- BrandStory crafted a data-driven SEO, PPC, and social media strategy that
                                transformed their digital performance completely.</p>
                            <a href="<?= base_url('case-study/e-commerce/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: TravelEX -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Branding & Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-02.webp') ?>" alt="TravelEX"
                                class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">TravelEX</h3>
                            <div class="premium-cs-row-stats">210% More Enquiries | Stronger Visibility | Just 3 Months
                            </div>
                            <p class="premium-cs-row-desc">TravelEX faced growing competition in UAE's financial
                                services market- BrandStory crafted a data-driven PPC, SEO, and social media strategy
                                that significantly boosted visibility and drove customer enquiries.</p>
                            <a href="<?= base_url('case-study/travel-agency/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3: Crystal Plaza -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-03.webp') ?>" alt="Crystal Plaza"
                                class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">Crystal Plaza</h3>
                            <div class="premium-cs-row-stats">5.2x ROAS | 40+ 1st Page Rankings | Bookings Soared</div>
                            <p class="premium-cs-row-desc">Crystal Plaza, one of Sharjah's well-known hotel chains,
                                needed to cut through the noise and drive direct bookings- BrandStory delivered paid
                                marketing and local SEO strategy that put them ahead of the competition. (Ex. "luxury
                                hotel in Dubai", "business stay Dubai")</p>
                            <a href="<?= base_url('case-study/hotel/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4: NIMS School -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-04.webp') ?>" alt="NIMS School"
                                class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">NIMS School</h3>
                            <div class="premium-cs-row-stats">Top 5 Rankings | 80% More Engagement | Enrollment Surged
                            </div>
                            <p class="premium-cs-row-desc">In Dubai's competitive education landscape, NIMS School
                                needed more than visibility- they needed trust. BrandStory delivered a data-driven SEO
                                and social media strategy to improve awareness & turn interest into enrollments.</p>
                            <a href="<?= base_url('case-study/education-institution/') ?>" class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 5: Wipro Infrastructure Engineering -->
            <div class="premium-cs-row-card">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-img-wrap">
                            <span class="premium-cs-row-badge">Digital Marketing</span>
                            <img src="<?= base_url('assets/images/home-case-05.webp') ?>"
                                alt="Wipro Infrastructure Engineering" class="premium-cs-row-img img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="premium-cs-row-content">
                            <h3 class="premium-cs-row-title">Wipro Infrastructure Engineering</h3>
                            <div class="premium-cs-row-stats">Global Reach | Targeted PPC | More Brand Authority</div>
                            <p class="premium-cs-row-desc">Operating across India, Europe, and the UAE, Wipro
                                Infrastructure Engineering needed a digital strategy as powerful as their global
                                operations. BrandStory created high-impact social media and PPC campaigns that improved
                                online presence and drove qualified leads.</p>
                            <a href="<?= base_url('case-study/wipro-infrastructure-engineering/') ?>"
                                class="premium-cs-row-link">
                                <span>View Case Study</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$reviewSection = [
    'title' =>  "What Our Clients Say About Us",
    'bgClass' => 'bg-black', // optional custom class
];
include __DIR__ . '/../component/client_reviews.php';
?>
<section class="dm-grow-section">
    <div class="dm-grow-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row align-items-center align-items-lg-stretch">
            <!-- Left Side: Copy, Button, and Partner Logos -->
            <div
                class="col-lg-6 mb-5 mb-lg-0 text-lg-start text-center d-lg-flex flex-lg-column justify-content-lg-between">
                <div>
                    <h2 class="grow-section-title">Branding Agency in Dubai<br> Where Names Become Legacies</h2>

                    <p class="grow-section-text">Transform your brand presence, command attention, and create lasting loyalty with professional branding specialists in Dubai. Claim your Free Consultation and Comprehensive Brand Audit to unlock your visual identity.</p>

                    <div class="grow-section-btn-wrap mb-5">
                        <a href="javascript:void(0);" class="grow-pill-btn uniq-contact-lead-btn">
                            <span>Talk to Experts</span>
                            <span class="grow-btn-arrow-circle">
                                <svg viewBox="0 0 24 24" class="grow-btn-arrow-svg">
                                    <path d="M5 19L19 5M19 5H9M19 5V15" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>

                <div
                    class="grow-partners-wrap d-flex align-items-center gap-3 justify-content-lg-start justify-content-center">
                    <div class="partner-badge">
                        <a href="https://www.google.com/partners/agency?id=1975289574" target="_blank"
                            style="display: flex;">
                            <img src="<?= base_url('assets/images/home/partner1.svg') ?>" alt="Google Partner"
                                class="partner-logo">
                        </a>
                    </div>
                    <div class="partner-badge">
                        <img src="<?= base_url('assets/images/home/partner2.svg') ?>" alt="Meta Business Partner"
                            class="partner-logo">
                    </div>
                </div>
            </div>

            <!-- Right Side: White Contact Form Card -->
            <div class="col-lg-6">
                <div class="grow-form-card">
                    <div class="grow-form-main">
                        <?php $textrow = 6 ?>
                        <?php include __DIR__ . '/../component/forms/contact-form.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Dubai Office Contact Bar -->
<section class="dm-dubai-office-bar">
    <div class="container">
        <div class="office-bar-row">
            <div class="office-bar-item">
                <img src="<?= base_url('assets/images/home/dubai-phone.svg') ?>" alt="Phone" class="bar-icon">
                <a href="tel:+971522831655">+971 52 283 1655</a>
            </div>
            <div class="office-bar-item">
                <img src="<?= base_url('assets/images/home/dubai-mail.svg') ?>" alt="Email" class="bar-icon">
                <a href="mailto:info@brandstory.ae">info@brandstory.ae</a>
            </div>
            <div class="office-bar-item">
                <img src="<?= base_url('assets/images/home/dubai-location.svg') ?>" alt="Location" class="bar-icon">
                <a target="_blank"
                    href="https://www.google.com/search?sca_esv=5aa11a5588fe31d3&kgmid=/g/11jn2396qs&q=Brandstory&shndl=30&shem=lcuae,lste,uaasie&source=sh/x/loc/uni/m1/1&kgs=0f7c634ee2c79aaf">G5,
                    Al Meheri Plaza, opp DBC Building, Al Khabaisi Area, Deira Dubai- 81577, United Arab Emirates</a>
            </div>
        </div>
    </div>
</section>
<?php 
  $category = 'Branding';
  $padding= 'sp-50';
  include __DIR__ . '/../component/blog_carousel.php'; 
?>

<section class="dm-faq-section spb-50">

  <div class="container">
    <h2 class="text-center mb-lg-5 mb-4 text-white">Your Questions Answered</h2>
    <div class="dm-faq-main max-1000">
      <div class="accordion accordion-flush" id="accordionFlushExample1">
        <!-- FAQ 1 -->
        <div class="accordion-item">
          <h4 class="accordion-header" id="flush-heading-em1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-em1" aria-expanded="false" aria-controls="flush-collapse-em1"> How to choose the best branding agency in Dubai, UAE? </button>
          </h4>
          <div id="flush-collapse-em1" class="accordion-collapse collapse" aria-labelledby="flush-heading-em1" data-bs-parent="#accordionFlushExample1">
            <div class="accordion-body text-white">
              <p class="fs-16 mb-0">When choosing a branding agency in Dubai, evaluate their portfolio for strategic depth, originality, and consistency across industries. Look for evidence of custom brand systems rather than templates, review client case studies for measurable brand impact, and ensure their process includes discovery workshops, research, and collaboration to align the final identity with your business goals and market positioning.</p>
            </div>
          </div>
        </div>
        <!-- FAQ 2 -->
        <div class="accordion-item">
          <h4 class="accordion-header" id="flush-heading-em2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-em2" aria-expanded="false" aria-controls="flush-collapse-em2"> How does BrandStory ensure brand consistency across all touchpoints? </button>
          </h4>
          <div id="flush-collapse-em2" class="accordion-collapse collapse" aria-labelledby="flush-heading-em2" data-bs-parent="#accordionFlushExample1">
            <div class="accordion-body text-white">
              <p class="fs-16 mb-0">At BrandStory, we build comprehensive brand guidelines that govern every visual and verbal expression of your brand. From logo usage, color palettes, and typography standards to tone of voice, messaging frameworks, and imagery direction, we create a unified system that ensures your brand looks, sounds, and feels identical — whether encountered on a website, social media, packaging, or signage.</p>
            </div>
          </div>
        </div>
        <!-- FAQ 3 -->
        <div class="accordion-item">
          <h4 class="accordion-header" id="flush-heading-em3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-em3" aria-expanded="false" aria-controls="flush-collapse-em3">How does a branding agency develop a complete visual identity? </button>
          </h4>
          <div id="flush-collapse-em3" class="accordion-collapse collapse" aria-labelledby="flush-heading-em3" data-bs-parent="#accordionFlushExample1">
            <div class="accordion-body text-white">
              <p class="fs-16 mb-0">We develop visual identity systems through a strategic, phased approach — beginning with brand discovery and competitive analysis, moving into concept exploration and design refinement, and culminating in a complete system that includes your logo, color palette, typography, graphic elements, and application rules. This ensures your identity is not just beautiful, but scalable, versatile, and built to perform across every medium.</p>
            </div>
          </div>
        </div>
        <!-- FAQ 4 -->
        <div class="accordion-item">
          <h4 class="accordion-header" id="flush-heading-em4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-em4" aria-expanded="false" aria-controls="flush-collapse-em4"> How will BrandStory's branding services improve brand recognition? </button>
          </h4>
          <div id="flush-collapse-em4" class="accordion-collapse collapse" aria-labelledby="flush-heading-em4" data-bs-parent="#accordionFlushExample1">
            <div class="accordion-body text-white">
              <p class="fs-16 mb-0">At BrandStory, we craft brand identities that resonate emotionally with your target audience and differentiate you from competitors. By aligning your visual identity, messaging, and customer experience with a clear strategic foundation, we strengthen recognition at every touchpoint, build credibility over time, and foster the trust that transforms first-time buyers into loyal brand advocates.</p>
            </div>
          </div>
        </div>
        <!-- FAQ 5 -->
        <div class="accordion-item">
          <h4 class="accordion-header" id="flush-heading-em5">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-em5" aria-expanded="false" aria-controls="flush-collapse-em5"> Why is professional branding important for my business? </button>
          </h4>
          <div id="flush-collapse-em5" class="accordion-collapse collapse" aria-labelledby="flush-heading-em5" data-bs-parent="#accordionFlushExample1">
            <div class="accordion-body text-white">
              <p class="fs-16 mb-0">Investing in professional branding is one of the highest-leverage decisions a business can make. It shapes first impressions, builds instant credibility, commands premium pricing, and creates the emotional connection that drives customer loyalty. A strong brand doesn't just help you compete — it positions you as the category leader customers think of first.</p>
            </div>
          </div>
        </div>
        <!-- FAQ 6 -->
        <div class="accordion-item">
          <h4 class="accordion-header" id="flush-heading-em6">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-em6" aria-expanded="false" aria-controls="flush-collapse-em6"> How long does a branding project take to complete? </button>
          </h4>
          <div id="flush-collapse-em6" class="accordion-collapse collapse" aria-labelledby="flush-heading-em6" data-bs-parent="#accordionFlushExample1">
            <div class="accordion-body text-white">
              <p class="fs-16 mb-0">The timeline depends on the scope and complexity of the engagement. Typically, our branding process spans 4 to 10 weeks, covering discovery, strategy development, creative exploration, design refinement, and final delivery of brand guidelines and assets. We maintain close collaboration with you throughout to ensure the result aligns perfectly with your vision.</p>
            </div>
          </div>
        </div>
        <!-- FAQ 7 -->
        <div class="accordion-item">
          <h4 class="accordion-header" id="flush-heading-em7">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-em7" aria-expanded="false" aria-controls="flush-collapse-em7"> How does BrandStory ensure brand strategy reflects my vision? </button>
          </h4>
          <div id="flush-collapse-em7" class="accordion-collapse collapse" aria-labelledby="flush-heading-em7" data-bs-parent="#accordionFlushExample1">
            <div class="accordion-body text-white">
              <p class="fs-16 mb-0">At BrandStory, we begin every branding engagement with immersive discovery workshops, stakeholder interviews, and market research to fully understand your vision, values, competitive landscape, and growth ambitions. This strategic foundation ensures every creative decision — from your logo and color palette to your messaging and brand voice — genuinely reflects who you are and where you intend to go.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
