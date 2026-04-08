<section class="sitemap-generator-section bg-premium-dark sp-120 position-relative overflow-hidden">
    <!-- Sophisticated Dark Background Elements -->
    <div class="glow-blob-1"></div>
    <div class="glow-blob-2"></div>
    <div class="grid-overlay-dark"></div>

    <div class="container text-center position-relative z-1 animate-fadeIn">
        <div class="badge bg-purple-glow text-white px-4 py-2 rounded-pill mb-4 border border-purple-alpha fw-600">Enterprise Edition</div>
        <h1 class="text-white mb-4 fw-900 fs-64 tracking-tight">XML Sitemap Intelligence</h1>
        <p class="text-white-50 fs-20 mb-5 max-w-850 mx-auto line-h-1-6">Accelerate your SEO performance with our advanced crawl engine. Engineered for Dubai's most complex web architectures, giving you 100% control over your indexable footprint.</p>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="premium-glass-card p-4 p-md-5 border-glass shadow-glass">
                    <form id="sitemapForm" action="<?= route('xmlsitemapgenerator.generate') ?>" method="POST">
                        <div class="mb-4 text-start">
                            <label for="url" class="form-label text-white-50 fw-600">Entry Domain URL</label>
                            <div class="input-group-premium">
                                <input type="url" class="form-control dark-input" id="url" name="url" placeholder="https://example.com" required>
                                <div class="input-glow-purple"></div>
                            </div>
                        </div>

                        <div class="row text-start">
                            <div class="col-md-6 mb-4">
                                <label for="changefreq" class="form-label text-white-50 fw-600">Update Frequency</label>
                                <select class="form-select dark-select" id="changefreq" name="changefreq">
                                    <option value="always">Continuous</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="daily">Daily Scan</option>
                                    <option value="weekly" selected>Standard Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="never">Static</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="priority" class="form-label text-white-50 fw-600">Priority Weight</label>
                                <select class="form-select dark-select" id="priority" name="priority">
                                    <option value="1.0">1.0 (Critical)</option>
                                    <option value="0.8">0.8 (Primary)</option>
                                    <option value="0.5" selected>0.5 (Average)</option>
                                    <option value="0.3">0.3 (Low)</option>
                                    <option value="0.1">0.1 (Minimum)</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn premium-btn-dark w-100 mt-2" id="generateBtn">
                            <span class="btn-content">
                                <i class="ion-flash me-2"></i>
                                <span class="btn-text">Execute Intelligent Crawl</span>
                                <div class="spinner-border spinner-border-sm ms-2 d-none" role="status"></div>
                            </span>
                        </button>
                    </form>

                    <div id="progressSection" class="mt-5 d-none text-start">
                        <div class="progress-info d-flex justify-content-between align-items-center mb-3">
                            <span class="text-white-50 fw-400">Deep-Scanning Infrastructure...</span>
                            <span id="progressPercent" class="text-white fw-700">0%</span>
                        </div>
                        <div class="custom-linear-progress-dark">
                            <div id="progressBar" class="progress-fill-glow" style="width: 0%"></div>
                        </div>
                    </div>

                    <div id="resultContainer" class="mt-5 d-none animate-up">
                        <div class="result-header d-flex justify-content-between align-items-center mb-4 p-3 rounded-4 bg-glass-soft">
                            <h4 class="text-white mb-0 fs-18 fw-700"><i class="ion-checkmark-circled text-success me-2"></i>Map Compiled Successfully</h4>
                            <span class="badge bg-purple-glow text-white" id="pageCount">0 URI Nodes</span>
                        </div>

                        <div class="xml-preview-wrapper-dark mb-4 position-relative border-glass">
                            <div class="copy-hint-dark text-white-50">XML SCHEMA DATA</div>
                            <pre id="xmlPreview" class="text-start p-4 text-green-glow"></pre>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <button class="btn glass-btn-outline w-100 py-3 fw-700" id="copyBtn">
                                    <i class="ion-ios-copy me-2"></i>Export Buffer
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn premium-btn-dark w-100 py-3 fw-700" id="downloadBtn">
                                    <i class="ion-ios-download me-2"></i>Push to .xml
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
                    <h2 class="mb-4 fw-800 text-dark">Why is an XML Sitemap Critical for SEO?</h2>
                    <p class="text-muted fs-18">An XML sitemap acts as a roadmap for search engines like Google and Bing. Without one, search engines might miss some of your pages, especially if they are recently added or aren't linked internally.</p>
                    <ul class="benefit-list mt-4 p-0 list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="ion-checkmark-circled text-purple me-3 mt-1"></i>
                            <span><strong>Faster Indexing:</strong> Notifies search engines immediately about new content.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="ion-checkmark-circled text-purple me-3 mt-1"></i>
                            <span><strong>Crawl Efficiency:</strong> Helps search engines find deep, unlinked pages.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="ion-checkmark-circled text-purple me-3 mt-1"></i>
                            <span><strong>Priority Mapping:</strong> Tells Google which pages are most important.</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="/assets/images/97634.webp" alt="SEO Illustration" class="img-fluid rounded-5xx">
            </div>
        </div>
    </div>
</section>

<section class="how-it-works-section sp-100 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-800 text-dark">How Our Generator Works</h2>
            <p class="text-muted max-w-700 mx-auto">We use advanced crawling technology to map your entire website structure in real-time.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100">
                    <div class="step-number mb-4">01</div>
                    <h4 class="fw-700 mb-3">Input URL</h4>
                    <p class="text-muted">Enter your website domain and set your preferred indexing settings.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100">
                    <div class="step-number mb-4">02</div>
                    <h4 class="fw-700 mb-3">Intelligent Crawl</h4>
                    <p class="text-muted">Our bot scans every page, link, and directory within your website domain.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100">
                    <div class="step-number mb-4">03</div>
                    <h4 class="fw-700 mb-3">Instant Result</h4>
                    <p class="text-muted">Copy or download your valid XML sitemap and upload it to Google Search Console.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="perks-of-sitemap sp-100 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-800 text-dark">Why XML Sitemaps are Non-Negotiable</h2>
            <p class="text-muted max-w-700 mx-auto fs-18">Precision-engineered communication between your server and the world's most powerful search bots.</p>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="pow-box p-4 rounded-5 border bg-white shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-android-search fs-48 text-purple"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">Instant Data Sync</h5>
                    <p class="text-muted fs-14 line-h-1-6">Synchronize your content changes with Google's index in real-time, drastically reducing the "discovery lag" for new service pages.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="pow-box p-4 rounded-5 border bg-white shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-ios-navigate fs-48 text-purple"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">Crawl Optimization</h5>
                    <p class="text-muted fs-14 line-h-1-6">Force search engine focus onto high-priority conversion pages, ensuring your crawl budget is never wasted on secondary system files.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="pow-box p-4 rounded-5 border bg-white shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-social-google fs-48 text-purple"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">GCC Domain Authority</h5>
                    <p class="text-muted fs-14 line-h-1-6">Verify your structural integrity across regional data centers, securing your footprint in the competitive UAE and Saudi search markets.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="pow-box p-4 rounded-5 border bg-white shadow-sm w-100 text-center">
                    <div class="mb-4"><i class="ion-stats-bars fs-48 text-purple"></i></div>
                    <h5 class="fw-700 mb-3 text-dark">Ranking Acceleration</h5>
                    <p class="text-muted fs-14 line-h-1-6">Establish clear page hierarchies that aid search algorithms in understanding site authority, directly correlating with improved visibility.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sp-50 bg-white">
    <div class="container"><!--Container Start-->
        <h2 class="text-center text-dark mb-5 fw-800">Trusted by Global Tech Ecosystems</h2>
        <?php include __DIR__ . '/../component/services/clients.php' ?>
    </div><!--Container End-->
</section>

<section class="site-faq sp-100 bg-light-soft">
    <div class="container">
        <h2 class="text-center fw-800 mb-5 text-dark">Technical Documentation (FAQ)</h2>
        <div class="accordion max-w-800 mx-auto" id="accordionSitemap">

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh1">
                    <button class="accordion-button fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc1">
                        How does the intelligent crawl engine operate?
                    </button>
                </h2>
                <div id="faqc1" class="accordion-collapse collapse show" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body text-muted line-h-1-8">
                        Our engine uses a recursive Breadth-First Search (BFS) algorithm to map every public-facing URI within your target domain. It extracts hyper-links, validates HTTP response codes, and prioritizes canonical URLs to ensure sitemap purity.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh2">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc2">
                        What are the maximum throughput limitations?
                    </button>
                </h2>
                <div id="faqc2" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body text-muted line-h-1-8">
                        For real-time generated maps, we current support a 2,000-page safety ceiling per single execution thread. This ensures zero latency during the XML compilation and protects destination servers from excessive crawl overhead.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh3">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc3">
                        Deployment instructions for Search Console?
                    </button>
                </h2>
                <div id="faqc3" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body text-muted line-h-1-8">
                        After exporting your `sitemap.xml`, place it in your server's root directory via FTP or SSH. Once live, register the absolute path (e.g., `https://site.com/sitemap.xml`) inside Google Search Console under the 'Sitemaps' menu to trigger a manual bot review.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.getElementById('sitemapForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const form = e.target;
        const btn = document.getElementById('generateBtn');
        const spinner = btn.querySelector('.spinner-border');
        const btnText = btn.querySelector('.btn-text');
        const resultContainer = document.getElementById('resultContainer');
        const progressSection = document.getElementById('progressSection');
        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');

        // UI Setup
        btn.disabled = true;
        spinner.classList.remove('d-none');
        btnText.innerText = 'Analyzing Nodes...';
        progressSection.classList.remove('d-none');
        resultContainer.classList.add('d-none');
        updateProgress(0);

        // Start Progress Animation
        let progress = 0;
        const progressInterval = setInterval(() => {
            if (progress < 92) {
                progress += Math.random() * 3;
                if (progress > 92) progress = 92;
                updateProgress(progress);
            }
        }, 300);

        function updateProgress(val) {
            progressBar.style.width = val + '%';
            progressPercent.innerText = Math.round(val) + '%';
        }

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });

            const text = await response.text();
            let result;
            try {
                result = JSON.parse(text);
            } catch (e) {
                console.error('Server responded with non-JSON:', text);
                throw new Error('Server returned an invalid response. This often happens if the website is too large or the server timed out.');
            }

            clearInterval(progressInterval);

            if (result.status === 'success') {
                updateProgress(100);
                setTimeout(() => {
                    document.getElementById('pageCount').innerText = result.pages_found + ' URI Nodes Found';
                    document.getElementById('xmlPreview').innerText = result.xml;
                    progressSection.classList.add('d-none');
                    resultContainer.classList.remove('d-none');
                    btnText.innerText = 'Execute Intelligent Crawl';
                }, 500);
            } else {
                throw new Error(result.message || 'Error executing crawl engine.');
            }
        } catch (error) {
            clearInterval(progressInterval);
            console.error('Error:', error);
            alert(error.message || 'Engine aborted during crawling operation.');
            btnText.innerText = 'Execute Intelligent Crawl';
            progressSection.classList.add('d-none');
        } finally {
            btn.disabled = false;
            spinner.classList.add('d-none');
        }
    });

    document.getElementById('copyBtn').addEventListener('click', function() {
        const xml = document.getElementById('xmlPreview').innerText;
        navigator.clipboard.writeText(xml).then(() => {
            const originalHtml = this.innerHTML;
            this.innerHTML = '<i class="ion-checkmark me-2"></i>Buffer Exported!';
            this.style.borderColor = '#28a745';
            this.style.color = '#28a745';

            setTimeout(() => {
                this.innerHTML = originalHtml;
                this.style.borderColor = 'rgba(255,255,255,0.1)';
                this.style.color = '#ffffff';
            }, 2000);
        });
    });

    document.getElementById('downloadBtn').addEventListener('click', () => {
        const xml = document.getElementById('xmlPreview').innerText;
        const blob = new Blob([xml], {
            type: 'application/xml'
        });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'sitemap.xml';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });
</script>