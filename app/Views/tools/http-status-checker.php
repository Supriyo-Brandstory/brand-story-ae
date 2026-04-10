<style>
    /* 
    --- DESIGN SYSTEM ---
    Font: Poppins (inherited)
    Primary Color: #e83a26
    Secondary Color: #2E63D8
    Background: #ffffff / #fbfbfb
    */

    /* Layout & Sections */
    .status-checker-wrapper {
        padding: 0;
        background: #ffffff;
        color: #333;
    }

    .status-checker-sp-section {
        padding: 80px 0;
    }

    .status-checker-bg-light-gray {
        background: #fbfbfb;
    }

    /* Hero Section */
    .status-checker-hero-section {
        text-align: center;
        padding: 100px 0 60px;
        background: radial-gradient(circle at 50% 0%, rgba(232, 58, 38, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
    }

    .status-checker-hero-section h1 {
        font-weight: 800;
        margin-bottom: 24px;
        color: #111;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.2;
    }

    .status-checker-hero-section h1 span {
        color: #e83a26;
    }

    .status-checker-hero-section p {
        font-size: 20px;
        color: #666;
        max-width: 750px;
        margin: 0 auto 40px;
    }

    /* Tool Card */
    .status-checker-tool-card-container {
        /* max-width: 800px; */
        margin: 0 auto;
        position: relative;
        z-index: 10;
    }

    .status-checker-tool-main-card {
        background: #fff;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .status-checker-input-group-premium {
        position: relative;
        display: flex;
        gap: 12px;
        background: #f8f9fa;
        padding: 8px;
        border-radius: 16px;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .status-checker-input-group-premium:focus-within {
        border-color: #e83a26;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(232, 58, 38, 0.1);
    }

    .status-checker-input-group-premium input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 12px 20px;
        font-size: 18px;
        outline: none;
        font-family: inherit;
    }

    .status-checker-btn-check-status {
        background: #111;
        color: #fff;
        border: none;
        padding: 12px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-checker-btn-check-status:hover {
        background: #e83a26;
        transform: translateY(-2px);
    }

    .status-checker-btn-check-status:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Results UI - New Table Design */
    .status-checker-results-wrapper {
        margin-top: 50px;
        display: none; /* Shown via JS */
        animation: statusCheckerFadeInUp 0.5s ease forwards;
        /* max-width: 1200px; */
        margin-left: auto;
        margin-right: auto;
    }

    @keyframes statusCheckerFadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .status-checker-table-container {
        background: #f8f9fb;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .status-checker-table-header {
        display: grid;
        grid-template-columns: 40px 1fr 180px 100px 120px 80px;
        padding: 16px 24px;
        background: #f8f9fb;
        color: #111;
        font-weight: 700;
        font-size: 14px;
        align-items: center;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .status-checker-results-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 8px;
    }

    .status-checker-result-row-wrapper {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        transition: all 0.2s ease;
    }

    .status-checker-result-row-wrapper:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .status-checker-result-row {
        display: grid;
        grid-template-columns: 40px 1fr 180px 100px 120px 80px;
        padding: 16px 24px;
        align-items: center;
        cursor: pointer;
    }

    .status-checker-url-cell {
        font-weight: 500;
        color: #444;
        word-break: break-all;
        padding-right: 20px;
        font-size: 14px;
    }

    .status-checker-badges-cell {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        align-items:center;
        justify-content: center;
    }

    .status-badge {
        font-size: 12px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 6px;
        color: #fff;
        min-width: 44px;
        text-align: center;
        display: inline-block;
    }

    .status-badge-2xx { background: #66bb6a; } /* Green */
    .status-badge-3xx { background: #42a5f5; } /* Blue */
    .status-badge-4xx { background: #ef5350; } /* Red */
    .status-badge-5xx { background: #ffa726; } /* Orange */

    .status-checker-redirect-count {
        font-weight: 600;
        color: #666;
        background: #f0f0f5;
        padding: 2px 10px;
        border-radius: 6px;
        font-size: 13px;
    }

    .status-checker-duration {
        color: #666;
        font-size: 14px;
        font-weight: 500;
    }

    .status-checker-details-toggle {
        color: #2E63D8;
        font-size: 18px;
        transition: transform 0.3s ease;
        display: flex;
        justify-content: center;
    }

    .status-checker-result-row-wrapper.expanded .status-checker-details-toggle {
        transform: rotate(180deg);
    }

    /* Details Panel */
    .status-checker-details-panel {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0, 1, 0, 1);
        background: #fdfdfe;
        border-top: 1px solid #f0f0f0;
    }

    .status-checker-result-row-wrapper.expanded .status-checker-details-panel {
        max-height: 1000px;
        transition: max-height 0.4s ease-in;
    }

    .status-checker-details-content {
        padding: 24px;
    }

    .status-checker-detail-section {
        margin-bottom: 24px;
    }

    .status-checker-detail-section h5 {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #111;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-checker-header-grid {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 8px 16px;
        font-size: 13px;
        background: #fff;
        padding: 16px;
        border-radius: 12px;
        border: 1px solid #eee;
    }

    .status-checker-header-key {
        font-weight: 600;
        color: #666;
        text-align: left;
    }

    .status-checker-header-val {
        color: #111;
        word-break: break-all;
        text-align: left;
    }

    /* Redirect Chain in details */
    .status-checker-mini-chain {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .status-checker-mini-chain-item {
        display: flex;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px dashed #eee;
    }

    .status-checker-mini-chain-item:last-child {
        border-bottom: none;
    }

    .status-checker-chain-step {
        font-weight: 700;
        color: #e83a26;
        min-width: 20px;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .status-checker-table-header {
            display: none;
        }
        .status-checker-result-row {
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .status-checker-url-cell {
            grid-column: span 2;
        }
    }

    /* Educational Section */
    .status-checker-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    .status-checker-info-card {
        padding: 32px;
        background: #fff;
        border-radius: 20px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .status-checker-info-card:hover {
        border-color: #e83a26;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .status-checker-info-icon {
        width: 50px;
        height: 50px;
        background: rgba(232, 58, 38, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #e83a26;
    }

    .status-checker-info-card h4 {
        font-weight: 700;
        margin-bottom: 16px;
    }

    .status-checker-info-card p {
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .status-checker-input-group-premium { flex-direction: column; }
        .status-checker-btn-check-status { width: 100%; }
        .status-checker-header-row { grid-template-columns: 1fr; gap: 4px; }
        .status-checker-hero-section h1 { font-size: 32px; }
    }
</style>

<div class="status-checker-wrapper">
    <!-- Section 1: Hero Header -->
    <section class="status-checker-hero-section">
        <div class="container">
            <div class="badge bg-danger bg-opacity-10 text-danger px-4 py-2 rounded-pill mb-4 fw-600">SEO Professional Tool</div>
            <h1>Easily check <span>status codes</span>, response headers, and redirect chains.</h1>
            <p>Instantly analyze any URL's server response. Identify redirects, errors, and performance data from your browser.</p>

            <div class="status-checker-tool-card-container">
                <div class="status-checker-tool-main-card">
                    <form id="checkerForm" onsubmit="handleCheck(event)">
                        <div class="status-checker-input-group-premium">
                            <input type="url" id="targetUrl" placeholder="Enter URL (e.g., https://google.com)" required>
                            <button type="submit" class="status-checker-btn-check-status" id="submitBtn">
                                <span>Check Status</span>
                                <i class="ion-android-arrow-forward"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Results Section (Initially Hidden) -->
                    <div id="resultsArea" class="status-checker-results-wrapper">
                        <div class="status-checker-table-container">
                            <div class="status-checker-table-header">
                                <div><input type="checkbox" disabled></div>
                                <div>URLs</div>
                                <div>Status Codes</div>
                                <div>Redirects</div>
                                <div>Duration (s)</div>
                                <div class="text-center">Details</div>
                            </div>
                            <div id="resultsList" class="status-checker-results-list">
                                <!-- Dynamic Rows Go Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: How It Works -->
    <section class="status-checker-sp-section status-checker-bg-light-gray text-center">
        <div class="container">
            <h2 class="mb-5 fw-800">Why Use Our HTTP Status Checker?</h2>
            <p class="max-w-700 mx-auto mb-5 text-muted">Understanding server responses is critical for SEO and site performance. Our tool provides deep insights into how search engines see your pages.</p>
            
            <div class="status-checker-info-grid">
                <div class="status-checker-info-card">
                    <div class="status-checker-info-icon">🔗</div>
                    <h4>Trace Redirects</h4>
                    <p>Identify 301 and 302 redirect chains that can leak SEO value and slow down your site for users.</p>
                </div>
                <div class="status-checker-info-card">
                    <div class="status-checker-info-icon">⚡</div>
                    <h4>Performance Data</h4>
                    <p>Check "Time to First Byte" (TTFB) and see how quickly your server responds to requests.</p>
                </div>
                <div class="status-checker-info-card">
                    <div class="status-checker-info-icon">🛡️</div>
                    <h4>Header Security</h4>
                    <p>Verify security headers like HSTS, X-Frame-Options, and Content-Security-Policy at a glance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Educational Content -->
    <section class="status-checker-sp-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="fw-800 mb-4">Mastering HTTP Status Codes</h2>
                    <p class="fs-18 text-muted mb-4">Every time a browser requests a page, the server responds with a 3-digit code. Knowing what these mean is half the battle in technical SEO.</p>
                    
                    <ul class="list-unstyled p-0">
                        <li class="mb-3 d-flex gap-3">
                            <span class="text-success fw-700">2xx:</span>
                            <span>Success! Everything is working as expected.</span>
                        </li>
                        <li class="mb-3 d-flex gap-3">
                            <span class="text-warning fw-700">3xx:</span>
                            <span>Redirects. The page has moved temporarily or permanently.</span>
                        </li>
                        <li class="mb-3 d-flex gap-3">
                            <span class="text-danger fw-700">4xx:</span>
                            <span>Client Errors. Broken links (404) or restricted access (403).</span>
                        </li>
                        <li class="mb-3 d-flex gap-3">
                            <span class="text-secondary fw-700">5xx:</span>
                            <span>Server Errors. Something went wrong on the server side.</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="p-4 bg-light rounded-4 border">
                        <h4 class="fw-700 mb-3">SEO Tip</h4>
                        <p class="mb-0">Avoid "Redirect Loops" where URL A points to B which points back to A. This confuses search bots and results in a crawl error, preventing your page from being indexed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: FAQ -->
    <section class="status-checker-sp-section status-checker-bg-light-gray">
        <div class="container">
            <h2 class="text-center mb-5 fw-800">Frequently Asked Questions</h2>
            <div class="accordion max-w-800 mx-auto" id="faqAccordion">
                
                <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#q1">
                            What is a redirect chain?
                        </button>
                    </h2>
                    <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            A redirect chain occurs when there is more than one redirect between the initial URL and the destination URL. For example, Page A redirects to Page B, which then redirects to Page C. This should be avoided for better SEO.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#q2">
                            How does a 404 error affect my SEO?
                        </button>
                    </h2>
                    <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            404 errors signify that a page no longer exists. While a few are normal, too many broken links can hurt user experience and lead search engines to believe your site is poorly maintained.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#q3">
                            Why do I need to check response headers?
                        </button>
                    </h2>
                    <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Response headers contain valuable metadata like the type of server, cache settings, and security instructions. Auditing them ensures your server is configured securely and efficiently.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    function handleCheck(event) {
        event.preventDefault();
        const urlInput = document.getElementById('targetUrl');
        const url = urlInput.value;
        const btn = document.getElementById('submitBtn');
        const resultsArea = document.getElementById('resultsArea');
        const resultsList = document.getElementById('resultsList');
        
        // UI Loading state
        const originalText = btn.innerHTML;
        btn.innerHTML = `<span>Checking...</span><div class="spinner-border spinner-border-sm ms-2" role="status"></div>`;
        btn.disabled = true;

        // Mocking various scenarios for the design demonstration
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
            
            // Show the results area
            resultsArea.style.display = 'block';
            
            // Generate mock data based on input or just some samples
            const mockData = generateMockResult(url);
            const rowHtml = createResultRow(mockData);
            
            // Prepend the new result
            resultsList.insertAdjacentHTML('afterbegin', rowHtml);
            
            // Smooth scroll to the new result
            resultsArea.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            
            // Clear input
            urlInput.value = '';
        }, 1000);
    }

    function generateMockResult(url) {
        const timestamp = new Date().toISOString();
        const duration = (Math.random() * 0.5 + 0.05).toFixed(2);
        
        // Simple logic to vary status codes for demo
        let statusChain = [{ code: 200, label: '200' }];
        if (url.includes('google')) {
            statusChain = [{ code: 301, label: '301' }, { code: 200, label: '200' }];
        } else if (url.includes('error')) {
            statusChain = [{ code: 404, label: '404' }];
        } else if (url.includes('redirect')) {
            statusChain = [{ code: 301, label: '301' }, { code: 301, label: '301' }, { code: 308, label: '308' }, { code: 200, label: '200' }];
        } else if (url.includes('agupubs')) {
             statusChain = [{ code: 403, label: '403' }];
        } else if (url.includes('komprehend')) {
             statusChain = [{ code: 521, label: '521' }];
        }

        return {
            id: 'res_' + Math.random().toString(36).substr(2, 9),
            url: url,
            chain: statusChain,
            redirects: statusChain.length - 1,
            duration: duration,
            headers: {
                'Content-Type': 'text/html; charset=UTF-8',
                'Server': 'Cloudflare',
                'Date': new Date().toUTCString(),
                'Cache-Control': 'no-cache, no-store, must-revalidate',
                'X-Content-Type-Options': 'nosniff'
            }
        };
    }

    function createResultRow(data) {
        const badgesHtml = data.chain.map(s => {
            const range = Math.floor(s.code / 100);
            const type = range === 2 ? '2xx' : (range === 3 ? '3xx' : (range === 4 ? '4xx' : '5xx'));
            return `<span class="status-badge status-badge-${type}">${s.code}</span>`;
        }).join('');

        const headersHtml = Object.entries(data.headers).map(([k, v]) => `
            <div class="status-checker-header-key">${k}</div>
            <div class="status-checker-header-val">${v}</div>
        `).join('');

        const miniChainHtml = data.chain.map((s, idx) => `
            <li class="status-checker-mini-chain-item">
                <span class="status-checker-chain-step">${idx + 1}</span>
                <div>
                    <strong>Status: ${s.code}</strong><br>
                    <small class="text-muted">${idx === data.chain.length - 1 ? 'Final Destination' : 'Redirect Event'}</small>
                </div>
            </li>
        `).join('');

        return `
            <div class="status-checker-result-row-wrapper" id="${data.id}">
                <div class="status-checker-result-row" onclick="toggleRowDetails('${data.id}')">
                    <div><input type="checkbox" checked></div>
                    <div class="status-checker-url-cell">${data.url}</div>
                    <div class="status-checker-badges-cell">${badgesHtml}</div>
                    <div><span class="status-checker-redirect-count">${data.redirects}</span></div>
                    <div class="status-checker-duration">${data.duration}</div>
                    <div class="status-checker-details-toggle"><i class="ion-chevron-down"></i></div>
                </div>
                <div class="status-checker-details-panel">
                    <div class="status-checker-details-content">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="status-checker-detail-section">
                                    <h5><i class="ion-ios-paper-outline"></i> Response Headers</h5>
                                    <div class="status-checker-header-grid">
                                        ${headersHtml}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="status-checker-detail-section">
                                    <h5><i class="ion-ios-shuffle"></i> Redirect Path</h5>
                                    <ul class="status-checker-mini-chain">
                                        ${miniChainHtml}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    function toggleRowDetails(id) {
        const row = document.getElementById(id);
        row.classList.toggle('expanded');
    }
</script>
