<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

<section class="tools-hero-section">
    <div class="tools-glow-blob-1"></div>
    <div class="tools-glow-blob-2"></div>
    <div class="tools-grid-overlay"></div>

    <div class="container text-center position-relative z-1 animate-fadeIn">
        <div class="badge bg-purple-glow text-white px-4 py-2 rounded-pill mb-4 border border-purple-alpha fw-600">Robots.txt</div>
        <h1 class="text-white mb-4 fw-900 tracking-tight">Free Robots.txt <span>Generator</span></h1>
        <p class="text-white fs-20 mb-5 max-w-850 mx-auto line-h-1-6">Our Free Robots.txt Generator helps you quickly create a customized robots.txt file for your website <br>without any technical complexity. <br><br>A robots.txt file is placed in the root directory of your website and acts as a set of instructions for search engine crawlers. Platforms like Google, Bing, and Yandex use automated bots to scan and index your website content. However, not every page needs to be visible in search results. Sections like admin panels, private folders, or duplicate content pages can be restricted from crawling using this file.</p>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="premium-glass-card p-4 p-md-5 border-glass shadow-glass text-start">
                    <form id="robotsForm">
                        <div class="row g-4">
                            <div class="col-12">
                                <label class="text-white-50 mb-2 fs-14 fw-600">Select Search Robots to Permit/Restricted</label>
                                <select id="searchRobots" class="form-select select2-dark" multiple="multiple">
                                    <option value="*" selected>All Search Robots (Standard)</option>
                                    <optgroup label="Common Search Engines">
                                        <option value="Googlebot">Googlebot (Google)</option>
                                        <option value="Bingbot">Bingbot (Bing)</option>
                                        <option value="Slurp">Slurp (Yahoo)</option>
                                        <option value="DuckDuckBot">DuckDuckBot (DuckDuckGo)</option>
                                        <option value="Baiduspider">Baiduspider (Baidu)</option>
                                        <option value="YandexBot">Yandex (Yandex)</option>
                                    </optgroup>
                                    <optgroup label="Social Media Bots">
                                        <option value="Facebot">Facebot (Facebook)</option>
                                        <option value="Twitterbot">Twitterbot (X.com)</option>
                                        <option value="Pinterest">Pinterest (Pinterest)</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-6">

                                <label class="text-white-50 mb-2 fs-14 fw-600">Default Crawler Policy</label>
                                <select id="defaultPolicy" class="form-select dark-select select2-single-dark">
                                    <option value="allow">Allow All (Default)</option>
                                    <option value="disallow">Disallow All (Restricted)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="text-white-50 mb-2 fs-14 fw-600">Crawl Delay (Seconds)</label>
                                <select id="crawlDelay" class="form-select dark-select select2-single-dark">
                                    <option value="">Standard (No Delay)</option>
                                    <option value="5">5s (Conservative)</option>
                                    <option value="10">10s (High Safety)</option>
                                    <option value="20">20s (Maximum Safety)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="text-white-50 mb-2 fs-14 fw-600">XML Sitemap Reference (Recommended)</label>
                                <input type="url" id="sitemapUrl" class="form-control dark-input" placeholder="https://yourdomain.com/sitemap.xml">
                            </div>
                            <div class="col-12 mt-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="text-white-50 fs-14 fw-600">Path Restrictions (Disallow)</label>
                                    <button type="button" id="addRule" class="btn btn-sm glass-btn-outline px-3 py-1 fs-12">
                                        <i class="ion-plus me-1"></i>Add Path
                                    </button>
                                </div>
                                <div id="rulesContainer">
                                    <div class="input-group mb-2 rule-row position-relative">
                                        <span class="input-group-text bg-transparent border-0 text-white-50 ps-0 fs-13">Disallow:</span>
                                        <input type="text" class="form-control dark-input py-2 fs-14" value="/cgi-bin/" placeholder="/path-to-restrict/">
                                        <button type="button" class="btn btn-outline-danger border-0 remove-rule ms-2 rounded-circle"><i class="ion-android-close"></i></button>
                                    </div>
                                    <div class="input-group mb-2 rule-row position-relative">
                                        <span class="input-group-text bg-transparent border-0 text-white-50 ps-0 fs-13">Disallow:</span>
                                        <input type="text" class="form-control dark-input py-2 fs-14" value="/admin/" placeholder="/path-to-restrict/">
                                        <button type="button" class="btn btn-outline-danger border-0 remove-rule ms-2 rounded-circle"><i class="ion-android-close"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="generateBtn" class="btn premium-btn-dark w-100 mt-5 py-3">
                            <span class="btn-content">
                                <i class="ion-flash me-2"></i>
                                <span class="btn-text">Generate Protocol Configuration</span>
                            </span>
                        </button>
                    </form>

                    <div id="resultContainer" class="mt-5 d-none animate-up">
                        <div class="result-header d-flex justify-content-between align-items-center mb-4 p-3 rounded-4" style="background: rgba(255,255,255,0.03);">
                            <h4 class="text-white mb-0 fs-18 fw-700"><i class="ion-checkmark-circled text-success me-2"></i>Protocol Compiled Successfully</h4>
                            <span class="badge bg-purple-glow text-white">ROBOTS.TXT VALID</span>
                        </div>

                        <div class="xml-preview-wrapper-dark mb-4 position-relative border-glass" style="background: #07080a; border-radius: 20px;">
                            <div class="copy-hint-dark text-white-50">ASCII PROTOCOL DATA</div>
                            <pre id="robotPreview" class="text-start p-4 m-0" style="color: #a9ffc1; font-family: monospace; line-height: 1.8;"></pre>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <button class="btn glass-btn-outline w-100 py-3 fw-700" id="copyBtn">
                                    <i class="ion-ios-copy me-2"></i>Export Buffer
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn premium-btn-dark w-100 py-3 fw-700" id="downloadBtn">
                                    <i class="ion-ios-download me-2"></i>Download
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Sections -->
<section class="content-section sp-100 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="content-card">
                    <h2 class="mb-4 fw-800 text-dark">Why Use Robots.txt Generator?</h2>
                    <p class="text-muted fs-18">A robots.txt file is a simple yet powerful way to guide search engine crawlers like Google on how to interact with your website. It follows the Robots Exclusion Protocol, allowing you to control which pages should or shouldn’t be indexed. Since even a small error can impact your site’s visibility, using a robots.txt generator ensures accurate configuration without the risk of blocking important pages.</p>
                    <ul class="benefit-list mt-4 p-0 list-unstyled">
                        <li class="mb-3 d-flex align-items-start text-dark">
                            <i class="ion-checkmark-circled text-purple me-3 mt-1"></i>
                            <span>Helps control crawler access using directives like “User-agent,” “Allow,” and “Disallow”.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start text-dark">
                            <i class="ion-checkmark-circled text-purple me-3 mt-1"></i>
                            <span>Prevents Search Engine Indexing of duplicate, private, or under-development pages.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start text-dark">
                            <i class="ion-checkmark-circled text-purple me-3 mt-1"></i>
                            <span>Saves time and avoids errors compared to manual robots.txt file creation.</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="/assets/images/robots.webp" alt="Robots Illustration" class="img-fluid rounded-5xx" style="height: 450px !important;">
            </div>
        </div>
    </div>
</section>

<section class="perks-of-w sp-50 benefits-of-choosing">
    <div class="container"><!--Container Start-->
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-3">What Is Robots.txt in SEO?</h2>
                <p>A robots.txt file is a small yet essential component of your website that helps search engines like Google understand how to crawl your pages. It acts as a set of instructions for bots, telling them which areas of <b>your site should be indexed</b> and which should be ignored. While search engines can still crawl your website without it, having a properly configured robots.txt file improves <b>crawl efficiency</b>, helps manage your crawl budget, and ensures important pages are discovered faster.</p><br>
                <p>Search engines operate on a limited crawl budget, meaning they allocate a specific amount of time and resources to scan your site. If your website contains unnecessary or duplicate pages, it can waste this budget and delay indexing of important content. A well-optimized robots.txt file, along with a sitemap, ensures that crawlers focus on high-value pages, improving visibility and indexing speed.</p><br>
                <h2 class="mb-3">Easily Create A Robots.txt File</h2>
                <p>Creating a robots.txt file manually can be time-consuming and prone to errors, especially for larger websites with complex structures. We are the <a href="http://brand-story-ae.test/seo-services-in-dubai" target="_blank"><b>best SEO agency in Dubai</b></a> and our Robots.txt Generator simplifies this process by allowing you to define crawling rules without any technical expertise. You can easily set default instructions for all search engine bots, add your sitemap to improve crawl guidance, and control access to important sections like pages, images, and mobile versions.</p>
                <p>With just a few inputs, the tool generates a clean, accurate, and SEO-friendly robots.txt file that helps search engines like Google crawl your website more efficiently. It also ensures that sensitive or unnecessary sections are properly restricted, helping you optimize crawl budget and maintain better control over your website’s indexing.</p>
            </div>
        </div>
    </div>
</section>

<section class="how-it-works-section sp-100 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-800 text-dark">How Our Robots.txt Generator Works</h2>
            <p class="text-muted max-w-700 mx-auto">Configure your crawl policies in seconds with our intelligence-first generator.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100 shadow-sm transition-all hover-up">
                    <div class="step-number mb-4" style="font-size: 40px; font-weight: 900; color: #f0f0f0;">01</div>
                    <h4 class="fw-700 mb-3">Define Rules</h4>
                    <p class="text-muted fs-14">Start by setting your default crawl behavior and specifying user-agents. This helps search engines like Google understand how to interact with your website.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100 shadow-sm transition-all hover-up">
                    <div class="step-number mb-4" style="font-size: 40px; font-weight: 900; color: #f0f0f0;">02</div>
                    <h4 class="fw-700 mb-3">Add Restrictions</h4>
                    <p class="text-muted fs-14">Enter the directories, pages, or system files you want to block from crawlers. You can also allow specific URLs while restricting others for better control.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100 shadow-sm transition-all hover-up">
                    <div class="step-number mb-4" style="font-size: 40px; font-weight: 900; color: #f0f0f0;">03</div>
                    <h4 class="fw-700 mb-3">Generate & Deploy</h4>
                    <p class="text-muted fs-14">EInstantly generate a clean, valid robots.txt file and upload it to your website’s root directory to start guiding search engine bots effectively.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sp-50 bg-light">
    <div class="container"><!--Container Start-->
        <h2 class="text-center text-dark mb-5 fw-800">Trusted by Global Brands</h2>
        <?php include __DIR__ . '/../component/services/clients.php' ?>
    </div><!--Container End-->
</section>

<section class="site-faq sp-100 bg-white border-top">
    <div class="container">
        <h2 class="text-center fw-800 mb-5 text-dark">Frequently Asked Questions</h2>
        <div class="accordion max-w-800 mx-auto" id="accordionSitemap">

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh1">
                    <button class="accordion-button fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc1">
                        Is robots.txt necessary for every website?
                    </button>
                </h2>
                <div id="faqc1" class="accordion-collapse collapse show" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body text-muted line-h-1-8">
                        A robots.txt file is not mandatory for a website. Search engines like Google can still crawl and index your site without it. However, it is recommended for better control over crawling, as it helps block unnecessary pages, manage crawl budget, and improve indexing efficiency.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh2">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc2">
                        Can robots.txt block my website from search results completely?
                    </button>
                </h2>
                <div id="faqc2" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body text-muted line-h-1-8">
                        Yes, if configured incorrectly. A wrong “Disallow” directive can block important pages or even your entire website from being indexed, which is why careful setup is essential.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh2">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc2">
                        How does your robots.txt generator help?
                    </button>
                </h2>
                <div id="faqc2" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body text-muted line-h-1-8">
                        Our robots.txt generator simplifies the process by automatically creating a valid and optimized robots.txt file based on your website and inputs, reducing errors and ensuring proper crawl control for better SEO performance.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Select2 if available
        if (typeof jQuery !== 'undefined' && typeof jQuery.fn.select2 !== 'undefined') {
            $('.select2-dark').select2({
                placeholder: "Select robots",
                allowClear: true,
                width: '100%'
            });

            $('.select2-single-dark').select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });
        }

        const robotsForm = document.getElementById('robotsForm');

        const rulesContainer = document.getElementById('rulesContainer');
        const addRuleBtn = document.getElementById('addRule');

        // Handle Adding Rules
        addRuleBtn.addEventListener('click', () => {
            const div = document.createElement('div');
            div.className = 'input-group mb-2 rule-row position-relative';
            div.innerHTML = `
            <span class="input-group-text bg-transparent border-0 text-white-50 ps-0 fs-13">Disallow:</span>
            <input type="text" class="form-control dark-input py-2 fs-14" placeholder="/path-to-restrict/">
            <button type="button" class="btn btn-outline-danger border-0 remove-rule ms-2 rounded-circle"><i class="ion-android-close"></i></button>
        `;
            rulesContainer.appendChild(div);

            div.querySelector('.remove-rule').addEventListener('click', () => div.remove());
        });

        // Handle Existing Rule Removal
        document.querySelectorAll('.remove-rule').forEach(btn => {
            btn.addEventListener('click', (e) => e.target.closest('.rule-row').remove());
        });

        // Handle Generation
        robotsForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const policy = document.getElementById('defaultPolicy').value;
            const delay = document.getElementById('crawlDelay').value;
            const sitemap = document.getElementById('sitemapUrl').value.trim();
            const selectedRobots = $('#searchRobots').val() || ['*'];
            const ruleInputs = rulesContainer.querySelectorAll('input');

            let output = "";
            let rules = "";

            // Prepare the rules block
            if (policy === 'disallow') {
                rules += "Disallow: /\n";
            } else {
                ruleInputs.forEach(input => {
                    const path = input.value.trim();
                    if (path) {
                        rules += `Disallow: ${path}\n`;
                    }
                });
                rules += "Allow: /\n";
            }

            if (delay) {
                rules += `Crawl-delay: ${delay}\n`;
            }

            // Separate '*' from specific bots
            const hasStar = selectedRobots.includes('*');
            const specificBots = selectedRobots.filter(bot => bot !== '*');

            // 1. Generate blocks for specific bots (if any)
            if (specificBots.length > 0) {
                specificBots.forEach(bot => {
                    output += `User-agent: ${bot}\n`;
                });
                output += rules + "\n";
            }

            // 2. Generate block for all robots (if selected or default)
            if (hasStar || selectedRobots.length === 0) {
                output += `User-agent: *\n`;
                output += rules + "\n";
            }


            if (sitemap) {
                output += `Sitemap: ${sitemap}\n`;
            }


            document.getElementById('robotPreview').innerText = output;
            document.getElementById('resultContainer').classList.remove('d-none');

            // Scroll to output
            document.getElementById('resultContainer').scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        });

        // Copy Functionality
        document.getElementById('copyBtn').addEventListener('click', function() {
            const text = document.getElementById('robotPreview').innerText;
            navigator.clipboard.writeText(text).then(() => {
                const originalHtml = this.innerHTML;
                this.innerHTML = '<i class="ion-checkmark me-2"></i>Exported Successfully!';
                this.style.color = '#28a745';
                this.style.borderColor = '#28a745';

                setTimeout(() => {
                    this.innerHTML = originalHtml;
                    this.style.color = '';
                    this.style.borderColor = '';
                }, 2000);
            });
        });

        // Download Functionality
        document.getElementById('downloadBtn').addEventListener('click', () => {
            const text = document.getElementById('robotPreview').innerText;
            const blob = new Blob([text], {
                type: 'text/plain'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'robots.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
    });
</script>