<style>
    .search-everywhere-banner {
        background-color: #1a0b2e;
        background-image:
            radial-gradient(at 100% 0%, rgba(133, 91, 255, 0.2) 0%, transparent 50%),
            radial-gradient(at 0% 100%, rgba(255, 222, 89, 0.1) 0%, transparent 50%);
        padding: 50px 0 400px;
        position: relative;
        overflow: hidden;
        text-align: center;
        /* Remove the old bottom shape if any */
    }
    .hero-wave-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        line-height: 0;
        z-index: 2;
    }

    .hero-wave-bottom svg {
        position: relative;
        display: block;
        width: 100%;
        /* height: 500px; */
        /* border: 1px solid red; */
    }

    .hero-wave-bottom .shape-fill {
        fill: #000000;
    }

    .accent-line-wave {
        position: absolute;
        bottom: 8%;
        left: -3px;
        width: calc(100% + 6px);
        z-index: 1;
        opacity: 0.6;
    }
     
    @media (max-width: 786px) {
        .search-everywhere-banner{
            padding: 50px 0 160px;
        }
        /* .p{
            font-size: 16px !important;
        } */
        .accent-line-wave{
            bottom: 18px;
        }

    }

    .accent-line-wave path.base-line {
        stroke: rgba(255, 222, 89, 0.1);
        stroke-width: 2;
        fill: none;
    }

    .accent-line-wave path.traveling-dash {
        stroke: #ffde59;
        stroke-width: 3;
        fill: none;
        stroke-dasharray: 400, 880; /* A 200px dash followed by a gap */
        animation: flowLineInfinite 8s linear infinite;
        stroke-linecap: round;
    }

    @keyframes flowLineInfinite {
        0% {
            stroke-dashoffset: 1440;
        }
        100% {
            stroke-dashoffset: 0;
        }
    }

    .grid-overlay-dark {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.03) 1.5px, transparent 1.5px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1.5px, transparent 1.5px);
        background-size: 60px 60px;
        z-index: 0;
    }

    .glow-blob-1,
    .glow-blob-2 {
        position: absolute;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(133, 91, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(120px);
        z-index: 0;
    }

    .glow-blob-1 { top: -200px; right: -200px; }
    .glow-blob-2 { bottom: -200px; left: -200px; background: radial-gradient(circle, rgba(255, 222, 89, 0.08) 0%, transparent 70%); }

    .search-everywhere-banner h1 {
        /* font-size: 4.5rem; */
        font-weight: 800;
        margin: 40px auto;
        line-height: 1.1;
        position: relative;
        z-index: 5;
        color: #fff;
        max-width: 1100px;
    }

    .search-everywhere-banner h1 span {
        color: #ffde59;
        background: linear-gradient(90deg, #ffde59, #fff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .search-everywhere-banner p {
        /* font-size: 1.4rem; */
        max-width: 900px;
        margin: 0 auto 50px;
        color: rgba(255, 255, 255, 0.85);
        position: relative;
        z-index: 5;
    }

    .search-everywhere-btn {
        background: linear-gradient(135deg, #ffde59 0%, #ffc107 100%);
        color: #000;
        padding: 20px 50px;
        font-weight: 800;
        font-size: 1.1rem;
        border-radius: 60px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        z-index: 5;
        box-shadow: 0 10px 30px rgba(255, 222, 89, 0.3);
    }

    .search-everywhere-btn:hover {
        transform: scale(1.05);
        color: #000;
    }

    .platform-card {
        background: #111;
        border: 1px solid #222;
        border-radius: 20px;
        padding: 30px;
        height: 100%;
        transition: border-color 0.3s ease, transform 0.3s ease;
    }

    .platform-card:hover {
        border-color: #855BFF;
        transform: translateY(-5px);
    }

    .platform-icon {
        font-size: 2.5rem;
        color: #ffde59;
        margin-bottom: 20px;
        display: block;
    }

    .platform-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #fff;
    }

    .platform-card p {
        font-size: 1rem;
        color: #aaa;
        line-height: 1.6;
    }

    .platform-link {
        color: #855BFF;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        margin-top: 15px;
    }

    .process-step {
        padding: 40px;
        border-bottom: 1px solid #222;
    }

    .process-step:last-child {
        border-bottom: none;
    }

    .step-number {
        font-size: 4rem;
        font-weight: 800;
        color: rgba(183, 158, 255, 0.31);
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .step-content {
        color: white;
        position: relative;
        z-index: 1;
    }

   .row.g-0{
        background: none;
   }

</style>

<!-- Hero Section -->
<section class="search-everywhere-banner">
    <div class="glow-blob-1"></div>
    <div class="glow-blob-2"></div>
    <div class="grid-overlay-dark"></div>
    
    <!-- Accent Wavy Line -->
    <div class="accent-line-wave">
        <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path class="base-line" d="M0,128L48,122.7C96,117,192,107,288,133.3C384,160,480,224,576,218.7C672,213,768,139,864,138.7C960,139,1056,213,1152,229.3C1248,245,1344,203,1392,181.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z" />
            <path class="traveling-dash" d="M0,128L48,122.7C96,117,192,107,288,133.3C384,160,480,224,576,218.7C672,213,768,139,864,138.7C960,139,1056,213,1152,229.3C1248,245,1344,203,1392,181.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z" />
        </svg>
    </div>


    <div class="container">
        <h1>More than just Google SEO. We’re the <span>search everywhere optimization™</span> agency that gets you found everywhere</h1>
        <p>From TikTok to YouTube and Chat GPT to Amazon, our search-everywhere optimization services show your brand in all the right places.</p>
        <a href="/contact" class="search-everywhere-btn">GET YOUR FREE PROPOSAL</a>
    </div>

    <!-- Wavy Bottom Divider -->
    <!-- <div class="hero-wave-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C58.47,105.1,128.3,108.31,194,92.83,257.14,77.88,286,76.5,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div> -->

    <div class="hero-wave-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#000000" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,133.3C384,160,480,224,576,218.7C672,213,768,139,864,138.7C960,139,1056,213,1152,229.3C1248,245,1344,203,1392,181.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
    </div>
    
</section>



<!-- Introduction Section -->
<section class="sp-80 bg-black text-white">
    <div class="container mt-5 mb-5 text-center">
        <h2 class="fw-bold mb-4">The future of search is everywhere. Where are you?</h2>
        <p class="fs-20 max-width-800 mx-auto">
            Traditional SEO is no longer enough. Over 70% of product searches now start on Amazon, and Gen Z uses TikTok as their primary search engine. If you aren't optimizing for where your customers are actually looking, you're invisible.
        </p>
    </div>
</section>

<!-- 12-Card Platform Grid -->
<section class="sp-80 bg-black">
    <div class="container">
        <div class="row g-4">
            <!-- Row 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-social-octocat platform-icon"></i> <!-- Placeholder icons using available ionicons -->
                    <h3>TikTok SEO</h3>
                    <p>Stop just scrolling and start being discovered. We optimize your video content to rank in TikTok's search results.</p>
                    <a href="#" class="platform-link">Learn TikTok SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-social-youtube platform-icon"></i>
                    <h3>YouTube SEO</h3>
                    <p>The world's second-largest search engine. We help your videos rank for high-intent keywords.</p>
                    <a href="#" class="platform-link">Learn YouTube SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-bag platform-icon"></i>
                    <h3>Amazon SEO</h3>
                    <p>Dominate the marketplace. Optimize your product listings to increase visibility and sales.</p>
                    <a href="#" class="platform-link">Learn Amazon SEO ></a>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-search platform-icon"></i>
                    <h3>Bing SEO</h3>
                    <p>Tapping into the growing market share of Microsoft's AI-powered search engine.</p>
                    <a href="#" class="platform-link">Learn Bing SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-earth platform-icon"></i>
                    <h3>Yandex SEO</h3>
                    <p>Specialized optimization for the leading search engine in the CIS region.</p>
                    <a href="#" class="platform-link">Learn Yandex SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-chatbubbles platform-icon"></i>
                    <h3>Baidu SEO</h3>
                    <p>Unlock visibility in the Chinese market with platform-specific strategy.</p>
                    <a href="#" class="platform-link">Learn Baidu SEO ></a>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-social-pinterest platform-icon"></i>
                    <h3>Pinterest SEO</h3>
                    <p>Visual discovery at its peak. Rank your pins where inspiration turns into action.</p>
                    <a href="#" class="platform-link">Learn Pinterest SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-iphone platform-icon"></i>
                    <h3>App Store SEO (ASO)</h3>
                    <p>Increase your app's visibility in Apple and Google stores to drive downloads.</p>
                    <a href="#" class="platform-link">Learn App Store SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-social-reddit platform-icon"></i>
                    <h3>Reddit SEO</h3>
                    <p>Tap into community discussions and rank in Reddit's internal search and Google's SERP.</p>
                    <a href="#" class="platform-link">Learn Reddit SEO ></a>
                </div>
            </div>

            <!-- Row 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-social-instagram platform-icon"></i>
                    <h3>Instagram SEO</h3>
                    <p>Beyond hashtags. We optimize your profile and content for keyword-based discovery.</p>
                    <a href="#" class="platform-link">Learn Instagram SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-social-linkedin platform-icon"></i>
                    <h3>Linkedin SEO</h3>
                    <p>Establish authority. Optimize your personal and company profiles for B2B discovery.</p>
                    <a href="#" class="platform-link">Learn Linkedin SEO ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="platform-card">
                    <i class="ion-social-twitter platform-icon"></i>
                    <h3>Twitter (X) SEO</h3>
                    <p>Real-time search optimization. Rank for trending topics and niche discussions.</p>
                    <a href="#" class="platform-link">Learn Twitter SEO ></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="mt-5 sp-80 bg-black text-white">
    <div class="container">
        <h2 class=" fw-bold text-center mb-5">Our 6-Step Search Everywhere Process</h2>
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="process-step position-relative">
                            <span class="step-number">01</span>
                            <div class="step-content">
                                <h4 class="fw-bold">Diagnostic</h4>
                                <p>Analysis of brand presence, content gaps, sentiment, and competitors across all platforms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-step position-relative">
                            <span class="step-number">02</span>
                            <div class="step-content">
                                <h4 class="fw-bold">Strategy</h4>
                                <p>Multi-channel search strategy aligned with platform-specific algorithms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-step position-relative">
                            <span class="step-number">03</span>
                            <div class="step-content">
                                <h4 class="fw-bold">Content</h4>
                                <p>Tailored content creation including scripts, videos, and platform-specific summaries.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-step position-relative">
                            <span class="step-number">04</span>
                            <div class="step-content">
                                <h4 class="fw-bold">Research</h4>
                                <p>Targeting research specific to each platform's user intent and search patterns.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-step position-relative">
                            <span class="step-number">05</span>
                            <div class="step-content">
                                <h4 class="fw-bold">Engagement</h4>
                                <p>Community management and interaction strategies to boost organic discovery.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="process-step position-relative">
                            <span class="step-number">06</span>
                            <div class="step-content">
                                <h4 class="fw-bold">Improvement</h4>
                                <p>Continuous tracking, analysis, and refinement for maximum cross-platform impact.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Proof / Clients -->
<section class="new-client-section bg-black">
    <h2 class="text-white mb-5 text-center">Our Valuable Clients</h2>
    <div class="container-fluid">
        <?php include __DIR__ . '/../component/client_section.php' ?>
    </div>
</section>

<!-- Final CTA Section -->
<section class="sp-80 bg-black text-white border-top border-secondary">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Ready to dominate every search platform?</h2>
        <p class="fs-24 mb-5 text-muted">Get a customized "Search Everywhere" strategy for your brand.</p>
        <a href="/contact" class="search-everywhere-btn">GET YOUR FREE PROPOSAL</a>
    </div>
</section>
