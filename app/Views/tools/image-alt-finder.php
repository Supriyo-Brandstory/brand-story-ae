<style>
    .alt-checker-wrapper {
        padding: 0;
        background: #ffffff;
        color: #333;
    }

    .alt-checker-sp-section {
        padding: 80px 0;
    }

    .alt-checker-bg-light-gray {
        background: #fbfbfb;
    }

    /* Banner Section (Dark Mode) - Moved to style.css */

    /* Tool Card (Glassmorphism) */
    .alt-checker-tool-main-card {
        background: rgba(255, 255, 255, 0.02);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 40px;
        padding: 50px;
        position: relative;
        z-index: 10;
        box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.5);
    }

    .alt-checker-input-group-premium {
        position: relative;
        display: flex;
        gap: 12px;
        background: rgba(255, 255, 255, 0.05);
        padding: 8px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .alt-checker-input-group-premium:focus-within {
        border-color: #e83a26;
        background: rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 20px rgba(232, 58, 38, 0.2);
    }

    .alt-checker-input-group-premium input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 12px 20px;
        font-size: 18px;
        outline: none;
        color: #fff;
        font-family: inherit;
        margin: 0;
    }

    .alt-checker-btn-check {
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

    .alt-checker-btn-check:hover {
        background: #e83a26;
        transform: translateY(-2px);
    }

    .alt-checker-btn-check:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        background: #666;
    }

    /* Progress Bar */
    .alt-checker-progress-bar-container {
        display: none;
        margin: 30px 0;
        background: rgba(255, 255, 255, 0.1);
        height: 6px;
        border-radius: 10px;
        overflow: hidden;
    }

    .alt-checker-progress-bar-fill {
        background: #e83a26;
        height: 100%;
        width: 30%;
        animation: progressAnim 2s infinite ease-in-out;
    }

    @keyframes progressAnim {
        0% { width: 0%; transform: translateX(-100%); }
        50% { width: 50%; transform: translateX(50%); }
        100% { width: 0%; transform: translateX(200%); }
    }

    /* Results UI */
    .alt-checker-results-wrapper {
        margin-top: 50px;
        display: none;
        animation: altCheckerFadeInUp 0.5s ease forwards;
        margin-left: auto;
        margin-right: auto;
    }

    @keyframes altCheckerFadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .alt-checker-table-container {
        background: #f8f9fb;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .alt-checker-table-header {
        display: grid;
        grid-template-columns: 100px 1fr 250px;
        padding: 20px 24px;
        background: #111;
        color: #fff;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 20;
    }

    .alt-checker-results-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 8px;
    }

    .alt-checker-result-row {
        display: grid;
        grid-template-columns: 100px 1fr 250px;
        padding: 18px 24px;
        align-items: center;
        background: #fff;
        border-radius: 12px;
        margin-bottom: 8px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .alt-checker-result-row:hover {
        border-color: #e83a26;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .img-preview-cell {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #eee;
    }

    .img-preview-cell img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .alt-checker-url-cell {
        font-weight: 500;
        color: #666;
        word-break: break-all;
        padding-right: 20px;
        font-size: 13px;
        font-family: 'Courier New', monospace;
    }

    .alt-status-cell {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .status-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 6px;
        text-transform: uppercase;
        width: fit-content;
    }

    .status-badge-success { background: #e8f5e9; color: #2e7d32; }
    .status-badge-danger { background: #ffebee; color: #c62828; }

    .alt-text-val {
        font-size: 14px;
        font-weight: 600;
        color: #111;
    }

    /* Educational Section */
    .alt-checker-info-card {
        padding: 32px;
        background: #fff;
        border-radius: 20px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .alt-checker-info-card:hover {
        border-color: #e83a26;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .alt-checker-info-card h4 {
        font-weight: 700;
        margin-bottom: 16px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        /* .tools-hero-section h1 { font-size: 32px; } - Moved to style.css */
        .alt-checker-tool-main-card { padding: 20px; border-radius: 20px; }
        .alt-checker-table-header { display: none; }
        .alt-checker-result-row { grid-template-columns: 1fr; gap: 15px; text-align: center; justify-items: center; }
        .alt-checker-url-cell { padding: 0; }
        .alt-status-cell { align-items: center; }
    }
</style>

<div class="alt-checker-wrapper">
    <!-- Section 1: Hero Header -->
    <section class="tools-hero-section">
        <div class="tools-glow-blob-1"></div>
        <div class="tools-glow-blob-2"></div>
        <div class="tools-grid-overlay"></div>

        <div class="container position-relative z-1">
            <div class="badge bg-danger bg-opacity-25 text-white px-4 py-2 rounded-pill mb-4 border border-danger border-opacity-25 fw-600">Accessibility Engine</div>
            <h1>Audit your <span>Image Alt Tags</span> for SEO.</h1>
            <p>Identify missing accessibility tags and optimize your image SEO infrastructure in seconds. Ported with precision technical crawling logic.</p>

            <div class="alt-checker-tool-card-container">
                <div class="alt-checker-tool-main-card">
                    <form id="altCheckerForm">
                        <div class="alt-checker-input-group-premium">
                            <input type="url" id="targetUrl" placeholder="Enter URL (e.g., https://example.com)" required>
                            <button type="submit" class="alt-checker-btn-check" id="submitBtn">
                                <span>Find Images</span>
                                <i class="ion-android-arrow-forward"></i>
                            </button>
                        </div>
                    </form>

                    <div id="progressContainer" class="alt-checker-progress-bar-container">
                        <div class="alt-checker-progress-bar-fill"></div>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsArea" class="alt-checker-results-wrapper">
                        <div class="alt-checker-results-header d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-800 m-0 fs-24 text-white">Analysis <span class="text-danger">Results</span></h3>
                            <button class="btn btn-sm btn-outline-light rounded-pill px-3" onclick="clearResults()">
                                <i class="ion-trash-a me-1"></i> Clear
                            </button>
                        </div>
                        <div class="alt-checker-table-container">
                            <div class="alt-checker-table-header">
                                <div class="text-center">Preview</div>
                                <div>Image Source</div>
                                <div>Alt Text Status</div>
                            </div>
                            <div id="resultsList" class="alt-checker-results-list">
                                <!-- Dynamic Rows -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: How It Works -->
    <section class="alt-checker-sp-section alt-checker-bg-light-gray text-center">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-800 text-dark">Engineered for Transparency</h2>
                <p class="text-muted max-w-700 mx-auto">Our scanner analyzes your DOM structure to ensure zero accessibility gaps.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="alt-checker-info-card h-100">
                        <div class="fs-48 mb-4 text-danger fw-800 opacity-25">01</div>
                        <h4 class="fw-700 mb-3">Target Entry</h4>
                        <p class="text-muted">Enter the URL of any landing page or blog post you wish to audit for image SEO.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alt-checker-info-card h-100">
                        <div class="fs-48 mb-4 text-danger fw-800 opacity-25">02</div>
                        <h4 class="fw-700 mb-3">DOM Crawling</h4>
                        <p class="text-muted">Our bot fetches the page and extracts all &lt;img&gt; tags and their attributes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alt-checker-info-card h-100">
                        <div class="fs-48 mb-4 text-danger fw-800 opacity-25">03</div>
                        <h4 class="fw-700 mb-3">Alt Audit</h4>
                        <p class="text-muted">We flag any missing or empty alt tags that could be hurting your search rankings.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: FAQ -->
    <section class="alt-checker-sp-section bg-white border-top">
        <div class="container">
            <h2 class="text-center mb-5 fw-800">Image SEO Knowledge Base</h2>
            <div class="accordion max-w-800 mx-auto" id="altFaq">
                <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#f1">
                            Why is Alt Text important?
                        </button>
                    </h2>
                    <div id="f1" class="accordion-collapse collapse show" data-bs-parent="#altFaq">
                        <div class="accordion-body text-muted">
                            Alt text provides context to search engines about your images and ensures visually impaired users can understand your content via screen readers.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#f2">
                            How should I write good Alt Text?
                        </button>
                    </h2>
                    <div id="f2" class="accordion-collapse collapse" data-bs-parent="#altFaq">
                        <div class="accordion-body text-muted">
                            Keep it descriptive but concise. Avoid starting with "image of" and include your target keywords naturally where relevant.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #000;">
        <div class="container text-center py-5">
            <h2 class="text-white fw-900 mb-4" style="font-size: 42px;">Scale Your Organic Traffic</h2>
            <p class="text-white-50 mb-5 fs-18 max-w-700 mx-auto">Technical excellence is the foundation of growth. Let BrandStory audit your entire digital ecosystem.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="/contact/" class="btn btn-danger btn-lg px-5 py-3 fs-16 rounded-pill fw-700">Get Expert Audit</a>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('altCheckerForm');
    const urlInput = document.getElementById('targetUrl');
    const progress = document.getElementById('progressContainer');
    const resultsArea = document.getElementById('resultsArea');
    const resultsList = document.getElementById('resultsList');
    const submitBtn = document.getElementById('submitBtn');

    window.clearResults = function() {
        resultsArea.style.display = 'none';
        resultsList.innerHTML = '';
        urlInput.value = '';
    };

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const url = urlInput.value.trim();
        if(!url) return;

        // UI State
        submitBtn.disabled = true;
        progress.style.display = 'block';
        resultsArea.style.display = 'none';
        resultsList.innerHTML = '';

        try {
            const formData = new FormData();
            formData.append('url', url);

            const response = await fetch('/tools/image-alt-text-finder/fetch', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === 'success') {
                renderResults(data.images);
            } else {
                alert(data.message || 'Error scanning URL.');
            }
        } catch (error) {
            console.error(error);
            alert('A network error occurred.');
        } finally {
            submitBtn.disabled = false;
            progress.style.display = 'none';
        }
    });

    function renderResults(images) {
        if (images.length === 0) {
            resultsList.innerHTML = '<div class="text-center py-5 fw-600">No images found on this page.</div>';
        } else {
            images.forEach(img => {
                const row = document.createElement('div');
                row.className = 'alt-checker-result-row';
                
                const hasAlt = img.alt !== null && img.alt.trim() !== '';
                const altText = hasAlt ? img.alt : 'null';
                const badgeClass = hasAlt ? 'status-badge-success' : 'status-badge-danger';
                const badgeText = hasAlt ? 'Found' : 'Missing';

                row.innerHTML = `
                    <div class="text-center d-flex justify-content-center">
                        <div class="img-preview-cell shadow-sm">
                            <img src="${img.src}" onerror="this.src='https://placehold.co/80x80?text=Error'">
                        </div>
                    </div>
                    <div class="alt-checker-url-cell">${escapeHtml(img.src)}</div>
                    <div class="alt-status-cell">
                        <span class="status-badge ${badgeClass}">${badgeText}</span>
                        <span class="alt-text-val">${escapeHtml(altText)}</span>
                    </div>
                `;
                resultsList.appendChild(row);
            });
        }
        resultsArea.style.display = 'block';
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});
</script>
