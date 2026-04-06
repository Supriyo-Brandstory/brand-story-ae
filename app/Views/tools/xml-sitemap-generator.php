<section class="sitemap-generator-section dm-bg">
    <div class="container text-center">
        <h1 class="text-white mb-4">Powerful XML Sitemap Generator</h1>
        <p class="text-white-50 fs-20 mb-5 max-w-700 mx-auto">Boost your website's search engine visibility. Our intelligent crawler performs a thorough scan of your entire website to generate a comprehensive, SEO-ready XML sitemap.</p>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-card p-4 p-md-5">
                    <form id="sitemapForm" method="POST" action="<?= route('xmlsitemapgenerator.generate') ?>">
                        <div class="mb-5 text-start">
                            <label for="url" class="form-label text-white fw-600 mb-3">Website URL to Crawl</label>
                            <div class="input-group-premium">
                                <input type="url" class="form-control custom-input" id="url" name="url" placeholder="https://yourwebsite.com" required>
                                <div class="input-glow"></div>
                            </div>
                        </div>

                        <div class="row text-start">
                            <div class="col-md-6 mb-4">
                                <label for="changefreq" class="form-label text-white fw-500">Change Frequency</label>
                                <select class="form-select custom-select" id="changefreq" name="changefreq">
                                    <option value="always">Always</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly" selected>Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="never">Never</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="priority" class="form-label text-white fw-500">Default Priority</label>
                                <select class="form-select custom-select" id="priority" name="priority">
                                    <option value="1.0">1.0 (Highest)</option>
                                    <option value="0.8">0.8</option>
                                    <option value="0.5" selected>0.5 (Normal)</option>
                                    <option value="0.3">0.3</option>
                                    <option value="0.1">0.1 (Lowest)</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn premium-btn w-100" id="generateBtn">
                            <span class="btn-content">
                                <i class="ion-flash me-2"></i>
                                <span class="btn-text">Generate XML Sitemap</span>
                                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                            </span>
                        </button>
                    </form>

                    <div id="progressSection" class="mt-5 d-none">
                        <div class="progress-label text-white mb-2 d-flex justify-content-between">
                            <span>Crawling Website...</span>
                            <span id="progressPercent">0%</span>
                        </div>
                        <div class="progress custom-progress">
                            <div id="progressBar" class="progress-bar progress-bar-animated" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>

                    <div id="resultContainer" class="mt-5 d-none animate-up">
                        <div class="result-header p-3 rounded-top d-flex justify-content-between align-items-center">
                            <h4 class="text-white mb-0 fs-18"><i class="ion-checkmark-circled text-success me-2"></i>Generation Complete</h4>
                            <span class="badge bg-purple-light" id="pageCount">0 Pages</span>
                        </div>

                        <div class="xml-preview-wrapper mb-4 position-relative">
                            <div class="copy-hint">XML Output</div>
                            <pre id="xmlPreview" class="text-start p-4"></pre>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <button class="btn btn-outline-purple w-100 py-3" id="copyBtn">
                                    <i class="ion-ios-copy-outline me-2"></i>Copy to Clipboard
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-purple w-100 py-3" id="downloadBtn">
                                    <i class="ion-ios-download-outline me-2"></i>Download .XML
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* CSS CUSTOM VARIABLES */

    /* MAIN SECTION STYLES */
    .sitemap-generator-section {
        position: relative;
        padding-top: 80px;
        padding-bottom: 80px;
        overflow: hidden;
        min-height: 100vh;
    }

    .sitemap-generator-section::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(133, 91, 255, 0.15) 0%, transparent 70%);
        z-index: 0;
    }

    .sitemap-generator-section::after {
        content: '';
        position: absolute;
        bottom: -10%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(0, 212, 255, 0.1) 0%, transparent 70%);
        z-index: 0;
    }

    .max-w-700 {
        max-width: 700px;
    }

    /* GLASS CARD STYLES */
    .glass-card {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 32px;
        box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.7);
        transition: transform 0.3s ease;
    }

    /* INPUT STYLES */
    .input-group-premium {
        position: relative;
    }

    .custom-input,
    .custom-select {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        color: white !important;
        padding: 16px 24px;
        border-radius: 16px;
        font-size: 16px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .custom-input:focus,
    .custom-select:focus {
        background: rgba(255, 255, 255, 0.08) !important;
        border-color: #855BFF !important;
        box-shadow: 0 0 0 4px rgba(133, 91, 255, 0.15);
    }

    .input-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 16px;
        pointer-events: none;
        box-shadow: 0 0 0px #855BFF;
        transition: box-shadow 0.4s ease;
    }

    .custom-input:focus+.input-glow {
        box-shadow: 0 0 20px rgba(133, 91, 255, 0.2);
    }

    /* BUTTON STYLES */
    .premium-btn {
        background: linear-gradient(135deg, #855BFF 0%, #6830FF 100%);
        color: white;
        padding: 16px 40px;
        border-radius: 16px;
        border: none;
        font-weight: 700;
        font-size: 16px;
        letter-spacing: 0.5px;
        box-shadow: 0 10px 30px -5px rgba(133, 91, 255, 0.5);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .premium-btn:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 40px -5px rgba(133, 91, 255, 0.6);
        color: white;
    }

    .premium-btn:active {
        transform: translateY(0);
    }

    .btn-purple {
        background: #855BFF;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 12px;
    }

    .btn-outline-purple {
        border: 1px solid #855BFF;
        color: #855BFF;
        font-weight: 600;
        border-radius: 12px;
    }

    .btn-outline-purple:hover {
        background: rgba(133, 91, 255, 0.1);
        color: #855BFF;
    }

    /* PROGRESS BAR */
    .custom-progress {
        height: 14px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .custom-progress .progress-bar {
        background: linear-gradient(90deg, #855BFF, #00D4FF, #855BFF);
        background-size: 200% 100%;
        box-shadow: 0 0 15px rgba(133, 91, 255, 0.6);
        transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        animation: progressShimmer 2s linear infinite;
        position: relative;
    }

    .custom-progress .progress-bar::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent
        );
        animation: pipeFlow 1.5s infinite;
    }

    @keyframes progressShimmer {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    @keyframes pipeFlow {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* RESULT VIEW */
    .result-header {
        background: rgba(255, 255, 255, 0.05);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .badge.bg-purple-light {
        background: rgba(133, 91, 255, 0.2);
        color: #b18fff;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
    }

    .xml-preview-wrapper {
        background: #0d0f14;
        border-radius: 0 0 16px 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-top: none;
        max-height: 450px;
        overflow-y: auto;
    }

    .copy-hint {
        position: absolute;
        top: 15px;
        right: 25px;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.3);
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    #xmlPreview {
        color: #a9ffc1;
        font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
        font-size: 14px;
        line-height: 1.6;
        margin: 0;
    }

    /* ANIMATIONS */
    .animate-up {
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* SCROLLBAR */
    .xml-preview-wrapper::-webkit-scrollbar {
        width: 6px;
    }

    .xml-preview-wrapper::-webkit-scrollbar-thumb {
        background: rgba(133, 91, 255, 0.4);
        border-radius: 10px;
    }
</style>

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
        btnText.innerText = 'Crawling Website...';
        spinner.classList.remove('d-none');
        resultContainer.classList.add('d-none');
        progressSection.classList.remove('d-none');

        // Start Progress Animation
        let progress = 0;
        const progressInterval = setInterval(() => {
            if (progress < 90) {
                progress += Math.random() * 5;
                if (progress > 90) progress = 90;
                updateProgress(progress);
            }
        }, 400);

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
                    document.getElementById('pageCount').innerText = result.pages_found + ' Pages Found';
                    document.getElementById('xmlPreview').innerText = result.xml;
                    progressSection.classList.add('d-none');
                    resultContainer.classList.remove('d-none');
                    btnText.innerText = 'Generate XML Sitemap';
                }, 500);
            } else {
                throw new Error(result.message || 'Error generating sitemap.');
            }
        } catch (error) {
            clearInterval(progressInterval);
            console.error('Error:', error);
            alert(error.message || 'An unexpected error occurred during crawling.');
            btnText.innerText = 'Generate XML Sitemap';
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
            this.innerHTML = '<i class="ion-checkmark me-2"></i>Copied Successfully!';
            this.classList.add('btn-success');
            this.classList.remove('btn-outline-purple');

            setTimeout(() => {
                this.innerHTML = originalHtml;
                this.classList.remove('btn-success');
                this.classList.add('btn-outline-purple');
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