<div class="serp-simulator-wrapper">

    <section class="serp-simulator-header">
        <h1>Google SERP <span style="color: #e83a26">Simulator</span></h1>
        <p>Enter title, description, and URL to preview</p>
    </section>

    <section class="serp-simulator">

        <div class="form-group">
            <div class="form-section">
                <label>URL</label>
                <input type="text" id="url" placeholder="eg. https://brandstory.in/">
                <label>Site Name</label>
                <input type="text" id="site-name" placeholder="Your Site Name">
                <label>Title</label>
                <input type="text" id="title" placeholder="Enter title">
                <label>Description</label>
                <textarea id="description" placeholder="Enter description"></textarea>
                <label>Bold Keywords</label>
                <input type="text" id="bold-keywords" placeholder="seperate with space or comma">
            </div>

            <div class="options-section">
                <h3>Options</h3>
                <div class="options-grid">
                    <label class="checkbox-label"><input type="checkbox" id="opt-ai"> AI Overview</label>
                    <label class="checkbox-label"><input type="checkbox" id="opt-heatmap"> Heatmap</label>
                    <label class="checkbox-label"><input type="checkbox" id="opt-date"> Date</label>
                    <label class="checkbox-label"><input type="checkbox" id="opt-rating"> Rating</label>
                    <label class="checkbox-label"><input type="checkbox" id="opt-ads"> Ads</label>
                    <label class="checkbox-label"><input type="checkbox" id="opt-map"> Map pack</label>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-reset" id="btn-form-reset">Reset</button>
                <button class="btn btn-primary" id="btn-save-image">Save as image</button>
                <button class="btn btn-primary" id="btn-copy-html">Copy HTML</button>
                <button class="btn btn-primary">Share a link</button>
            </div>
        </div>

        <div class="preview-column">
            <div class="toggle-device">
                <button class="btn btn-primary active" id="btn-desktop">Desktop</button>
                <button class="btn btn-reset" id="btn-mobile">Mobile</button>
            </div>
            <div class="device-container" id="device-container">
                <img src="<?= base_url('assets/images/tools/large-device.png') ?>" class="device-frame" id="device-frame">
                <div class="device-screen">
                    <div class="serp-preview">
                        <div class="serp-header">
                            <div class="serp-logo"><img src="<?= base_url('assets/images/tools/google.png') ?>" alt="Google" style="max-height: 24px;"></div>
                            <div class="serp-search">
                                <input type="text" placeholder="Search">
                                <div class="filter-tags">
                                    <div class="filter-tag active">All</div>
                                    <div class="filter-tag">Images</div>
                                    <div class="filter-tag">Videos</div>
                                    <div class="filter-tag">News</div>
                                    <div class="filter-tag">Maps</div>
                                    <div class="filter-tag">More</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="responsive-preview">
                            <div id="preview-ai" style="display: none; margin-bottom: 20px;">
                                <img id="preview-ai-img" src="<?= base_url('assets/images/tools/ai-overviews.webp') ?>" style="width: 100%; max-width: 600px; border-radius: 12px;" alt="AI Overview">
                            </div>
                            <div id="preview-map" style="display: none; margin-bottom: 20px;">
                                <img id="preview-map-img" src="<?= base_url('assets/images/tools/places.webp') ?>" style="width: 100%; max-width: 600px; border-radius: 12px;" alt="Map Pack">
                            </div>
                            <div class="serp-result-item" id="preview-sponsored" style="display: none;">
                                <strong>Sponsored</strong>
                                <div class="serp-source">
                                    <div class="serp-favicon">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAPFBMVEX/MzP/MzP/NTX/MzP/Li7/GBj9IyP3dHX9X1/45+f62tr3oaH/+fn////9AgL88PD8lpb5RUb4trfwycoK9KXIAAAAAnRSTlPr8QGjJZUAAADZSURBVHgBdZKBDoMgDERdaQ9ELTL//19XpksXlJeEkLwccKHT9JoGmKAwxKytxAK5ADhcgekrmaKTgoBckqTZyXlBsy7X7Y91VlAvnUW7ZNlrSim+v1mgk1FFRLXZtYI6CTIkFpN0k8LM0N32s/DtWACSsh0btXvtag2NYjlzw54HNFAn15Om91vPJRlxz01HoYeeojWbzOBOIhAR69K6VDzJcMokDz0hcmye7O6s761J4eGXlSQ0kqXr6ZT5iMr0kwF1d2KCBPIksTiw/ic+1PxbLmVQm/ohH4t0FGsli4FqAAAAAElFTkSuQmCC" style="border-radius: 50px; height: 26px; width:26px;" alt="">
                                    </div>
                                    <div class="serp-source-info">
                                        <div class="serp-site-name" >Digital Marketing Agency in Bangalore</div>
                                        <div class="serp-url">https://brandstory.in</div>
                                    </div>
                                </div>
                                <div class="serp-title">Digital Marketing Company in Bangalore India | Digital ...</div>
                                <div class="serp-description">
                                    <span style="color: #70757a; font-size: 14px; margin-right: 4px; display: none;"></span> 
                                    <span>We are a Design and Digital Marketing Agency in India providing design, development and digital solutions for over 400+ clients across the globe.</span>
                                </div>
                                <div class="serp-rating" style="display: none;">
                                    <span class="rating-score">4.9</span>
                                    <span class="rating-stars">★★★★★</span>
                                    <span class="rating-count">(24)</span>
                                </div>
                            </div>
                            
                            <div class="serp-heatmap-wrap">
                                <div class="serp-result-item">
                                    <div class="serp-source">
                                        <div class="serp-favicon">
                                            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" fill="#70757a"></path></svg>
                                        </div>
                                        <div class="serp-source-info">
                                            <div class="serp-site-name" id="preview-site-name">Example</div>
                                            <div class="serp-url" id="preview-url">https://example.com › page</div>
                                        </div>
                                    </div>
                                    <div class="serp-title" id="preview-title">This is an Example of a Title Tag</div>
                                    <div class="serp-description" id="preview-description">
                                        <span id="preview-date-prefix" style="color: #70757a; font-size: 14px; margin-right: 4px; display: none;"></span> 
                                        <span id="preview-desc-content">Here is an example of what a snippet looks like in Google's SERPs. The meta title and meta description are shown here.</span>
                                    </div>
                                    <div class="serp-rating" id="preview-rating" style="display: none;">
                                        <span class="rating-score">4.9</span>
                                        <span class="rating-stars">★★★★★</span>
                                        <span class="rating-count">(24)</span>
                                    </div>
                                </div>
                                <canvas id="serp-heatmap-cv"></canvas>
                            </div>

                            <?php for($i=0; $i<3; $i++): ?>
                            <div class="serp-skeleton">
                                <div class="skeleton-header">
                                    <div class="skeleton-circle"></div>
                                    <div class="skeleton-lines">
                                        <div class="skeleton-line-sm"></div>
                                        <div class="skeleton-line-sm"></div>
                                    </div>
                                </div>
                                <div class="skeleton-title"></div>
                                <div class="skeleton-desc"></div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<section class="serp-tool-info sp-50 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="info-header text-center mb-5">
                    <h2 class="mb-4">How Does Our Google SERP Simulator work?</h2>
                    <p class="fs-18">Our free Google SERP simulator lets you check and see the title tag, URL, and meta description in the search results as you write them.</p>
                </div>

                <div class="how-to-steps mb-5">
                    <h3 class="fs-22 mb-4">To get the most out of our free SERP tool, all you have to do is:</h3>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">1</div>
                                <p>Enter the complete URL of the webpage you would like to preview, our tool generate a precise search result appearance.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">2</div>
                                <p>Add the name of your website or brand as you would like it to be displayed in the search results preview on Google.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">3</div>
                                <p>Write or paste both the title tag (60 characters) & meta description (167 characters) you want to test, reflect your content.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">4</div>
                                <p>Once you are satisfied with your inputs, generate the preview and easily copy HTML, share link, or download the final SERP preview.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-description mb-5">
                    <p class="fs-18">SERP simulator show how your URL, title, and meta description tag would realistically look in Google Search and check whether individual parts of the snippet have an optimal length (and won't get trimmed by Google).</p>
                    <p class="fs-18">Besides a standard organic snippet, you can also use a couple of extra features to optimize your URL, title, and meta tags like a pro.</p>
                </div>

                <div class="features-grid-wrapper mt-5">
                    <div class="row g-4">
                        <!-- Feature 1 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">🔍</div>
                                <div class="f-content">
                                    <h4>1. Real SERP preview</h4>
                                    <p>Enter any keyword your wish to rank for into the Google Search bar within the tool and see for yourself how your snippet would look compared to other top-ranking competitors on the search results page.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 2 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon"><b>B</b></div>
                                <div class="f-content">
                                    <h4>2. Bold keywords</h4>
                                    <p>Google bolds the keywords in search results that match the search query. Use this feature to see how your title tag and meta description will look when they match your focus keyword.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 3 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">✨</div>
                                <div class="f-content">
                                    <h4>3. AI Overview</h4>
                                    <p>With the new Google updates, you can see how much space AI Overviews take at the top of the SERP, helping you understand how far down your snippet will be.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 4 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">🔥</div>
                                <div class="f-content">
                                    <h4>4. Heatmap</h4>
                                    <p>The heatmap feature shows the most-clicked parts of search results. Optimize your title and meta description to boost your click-through rate based on visual intensity.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 5 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">📅</div>
                                <div class="f-content">
                                    <h4>5. Date</h4>
                                    <p>A simple yet effective feature that lets you add the current date to the snippet preview to get the most out of your simulated organic snippet.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 6 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">⭐</div>
                                <div class="f-content">
                                    <h4>6. Rating</h4>
                                    <p>Optimize your snippet for keywords with transactional intent by adding rating stars to see how attractive your web page will be to potential customers.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 7 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">📣</div>
                                <div class="f-content">
                                    <h4>7. Ads and map packs</h4>
                                    <p>Add paid ads or local map packs to the top of your simulated SERP to see how they affect your organic listing's visibility.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 8 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">📱</div>
                                <div class="f-content">
                                    <h4>8. Mobile preview</h4>
                                    <p>Optimize for the mobile-first world. See exactly how your snippet will look on mobile devices where more than 50% of searches happen.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Feature 9 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-card-premium">
                                <div class="f-icon">💾</div>
                                <div class="f-content">
                                    <h4>9. Save or copy snippet</h4>
                                    <p>Save your SERP snippet as an image or share it with your team. You can also copy the HTML tags for the title and meta description directly.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="serp-guide-section sp-50" style="background: #fbfbfb;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="guide-header mb-5 text-center">
                    <h2 class="mb-4">How to create the perfect title tag and meta description</h2>
                    <p class="fs-18 mb-2">The goal of creating a stunning title tag and meta description is to turn searchers into visitors who will find exactly what they're looking for.</p>
                    <p class="fs-18">Your main task is to combine three key ingredients:</p>
                </div>

                <div class="ingredients-list">
                    <div class="ingredient-item mb-5">
                        <div class="d-flex align-items-start gap-4">
                            <div class="ingredient-num">1</div>
                            <div>
                                <h3 class="fs-22 mb-3">Relevance</h3>
                                <p class="fs-18">Your title tag and meta description should be relevant to the search query. Use the main keyword to make it clear what your page is about.</p>
                            </div>
                        </div>
                    </div>

                    <div class="ingredient-item mb-5">
                        <div class="d-flex align-items-start gap-4">
                            <div class="ingredient-num">2</div>
                            <div>
                                <h3 class="fs-22 mb-3">Uniqueness</h3>
                                <p class="fs-18">Make your title tag and meta description unique. Don't copy-paste them from other pages. Each page should have its own distinct title tag and meta description.</p>
                            </div>
                        </div>
                    </div>

                    <div class="ingredient-item mb-5">
                        <div class="d-flex align-items-start gap-4">
                            <div class="ingredient-num">3</div>
                            <div>
                                <h3 class="fs-22 mb-3">Attractiveness</h3>
                                <p class="fs-18">Make your title tag and meta description attractive. Use power words, numbers, and questions to make them stand out from the competition.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="guide-footer mt-5 text-center pt-5 border-top">
                    <p class="fs-18">If you want to learn more, contact our <a href="https://www.brandstory.ae/seo-services-in-dubai" class="serp-link">SEO agency in Dubai</a>, we're happy to help you.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="site-faq sp-50">
    <div class="container"><!--Container Start-->
        <h2 class="text-center">Frequenly Asked Questions</h2>
        <div class="accordion spt-50" id="accordionFB"><!--Accordion Start-->

           <div class="accordion-item">
                <h2 class="accordion-header" id="serpfh1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serpfc1">
                        What is a SERP simulator and why is it important for SEO?
                    </button>
                </h2>
                <div id="serpfc1" class="accordion-collapse collapse show" data-bs-parent="#accordionSERP">
                    <div class="accordion-body">
                        A SERP simulator is a tool that shows how your webpage title, URL, and meta description will appear in search engine results pages. It helps you optimize these elements before publishing, ensuring they are visually appealing, within character limits, and aligned with user intent. This improves click-through rates and overall search performance.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="serpfh2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serpfc2">
                        How accurate is a SERP preview compared to actual Google results?
                    </button>
                </h2>
                <div id="serpfc2" class="accordion-collapse collapse" data-bs-parent="#accordionSERP">
                    <div class="accordion-body">
                        A SERP simulator provides a close approximation based on current character limits and pixel widths used by search engines. However, actual results may vary slightly depending on device type, user behavior, and algorithm changes. Still, it remains a highly reliable way to optimize your meta tags before publishing.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="serpfh3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serpfc3">
                        What is the ideal length for title tags and meta descriptions?
                    </button>
                </h2>
                <div id="serpfc3" class="accordion-collapse collapse" data-bs-parent="#accordionSERP">
                    <div class="accordion-body">
                        For best results, title tags should typically stay within 50–60 characters, while meta descriptions should be around 150–160 characters. A SERP simulator helps ensure your content does not get truncated and maintains full visibility in search results, which directly impacts user engagement.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="serpfh4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serpfc4">
                        Can a SERP simulator improve my website’s click-through rate (CTR)?
                    </button>
                </h2>
                <div id="serpfc4" class="accordion-collapse collapse" data-bs-parent="#accordionSERP">
                    <div class="accordion-body">
                        Yes. By allowing you to test and refine your title and meta description, a SERP simulator helps you create more compelling and relevant search snippets. Well-optimized snippets attract more clicks, even if your ranking position stays the same, making it a critical tool for improving CTR.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="serpfh5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serpfc5">
                        Does the SERP simulator support mobile and desktop previews?
                    </button>
                </h2>
                <div id="serpfc5" class="accordion-collapse collapse" data-bs-parent="#accordionSERP">
                    <div class="accordion-body">
                        Most advanced SERP simulator tools provide both mobile and desktop previews. This is important because search results can appear differently depending on the device, and optimizing for both ensures a consistent user experience across platforms.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="serpfh6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serpfc6">
                        Do I need technical knowledge to use a SERP simulator?
                    </button>
                </h2>
                <div id="serpfc6" class="accordion-collapse collapse" data-bs-parent="#accordionSERP">
                    <div class="accordion-body">
                        No. A SERP simulator is designed to be user-friendly and requires no technical expertise. You simply enter your URL, title, and meta description, and the tool instantly generates a preview along with optimization suggestions.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="serpfh7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serpfc7">
                        Can I directly use the generated meta tags on my website?
                    </button>
                </h2>
                <div id="serpfc7" class="accordion-collapse collapse" data-bs-parent="#accordionSERP">
                    <div class="accordion-body">
                        Yes. Once you are satisfied with your preview, you can copy or download the generated meta tags and implement them directly into your website’s HTML or CMS platform. This makes the optimization process quick and efficient.
                    </div>
                </div>
            </div> 

           

        </div><!--Accordion End-->
    </div><!--Container End-->
</section>

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
    const titleInput = document.getElementById("title");
    const descInput = document.getElementById("description");
    const urlInput = document.getElementById("url");
    const siteNameInput = document.getElementById("site-name");
    const boldInput = document.getElementById("bold-keywords");

    const previewTitle = document.getElementById("preview-title");
    const previewDesc = document.getElementById("preview-description");
    const previewDescContent = document.getElementById("preview-desc-content");
    const previewDatePrefix = document.getElementById("preview-date-prefix");
    const previewRating = document.getElementById("preview-rating");

    const previewUrl = document.getElementById("preview-url");
    const previewSiteName = document.getElementById("preview-site-name");

    const optAi = document.getElementById("opt-ai");
    const previewAi = document.getElementById("preview-ai");
    const optDate = document.getElementById("opt-date");
    const optRating = document.getElementById("opt-rating");
    const optAds = document.getElementById("opt-ads");
    const previewSponsored = document.getElementById("preview-sponsored");

    const optMap = document.getElementById("opt-map");
    const previewMap = document.getElementById("preview-map");
    const previewMapImg = document.getElementById("preview-map-img");

    const btnDesktop = document.getElementById("btn-desktop");
    const btnMobile = document.getElementById("btn-mobile");
    const deviceFrame = document.getElementById("device-frame");
    const deviceContainer = document.getElementById("device-container");
    const btnFormReset = document.getElementById("btn-form-reset");
    const btnSaveImage = document.getElementById("btn-save-image");
    const btnCopyHtml = document.getElementById("btn-copy-html");

    // Limit like Google (rough approximation)
    function truncate(text, limit) {
        if (!text) return "";
        return text.length > limit ? text.substring(0, limit) + "..." : text;
    }

    function formatUrl(url) {
        if (!url) return "https://example.com › page";
        if (!url.includes(" › ")) {
            return url.replace(/\/$/, "") + " › page";
        }
        return url;
    }

    function applyBold(text, keywords) {
        if (!keywords || !text) return text;
        const keys = keywords.split(/[ ,]+/).filter(k => k.length > 0);
        let highlighted = text;
        keys.forEach(k => {
            const regex = new RegExp(`(${k})`, "gi");
            highlighted = highlighted.replace(regex, "<strong>$1</strong>");
        });
        return highlighted;
    }

    // Update preview
    function updatePreview() {
        const titleText = truncate(titleInput.value, 60) || "This is an Example of a Title Tag";
        const descText = truncate(descInput.value, 160) || "Your description will appear here";
        const boldKeywords = boldInput.value;

        previewTitle.innerHTML = applyBold(titleText, boldKeywords);
        previewDescContent.innerHTML = applyBold(descText, boldKeywords);
        previewUrl.textContent = formatUrl(urlInput.value);
        previewSiteName.textContent = siteNameInput.value || "Example";

        // Date Toggle
        if (optDate.checked) {
            const today = new Date();
            const formatted = today.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
            previewDatePrefix.textContent = formatted + " — ";
            previewDatePrefix.style.display = 'inline';
        } else {
            previewDatePrefix.style.display = 'none';
        }

        // Rating Toggle
        previewRating.style.display = optRating.checked ? 'flex' : 'none';

        // Ads Toggle
        previewSponsored.style.display = optAds.checked ? 'block' : 'none';

        // AI Overview Toggle
        previewAi.style.display = optAi.checked ? 'block' : 'none';

        // Map Pack Toggle
        previewMap.style.display = optMap.checked ? 'block' : 'none';
    }

    // Device Toggling
    function setDevice(mode) {
        const desktopUrl = "<?= base_url('assets/images/tools/large-device.png') ?>";
        const mobileUrl = "<?= base_url('assets/images/tools/small-device.png') ?>";
        
        const aiDesktopUrl = "<?= base_url('assets/images/tools/ai-overviews.webp') ?>";
        const aiMobileUrl = "<?= base_url('assets/images/tools/ai-mobile.png') ?>";
        const mapDesktopUrl = "<?= base_url('assets/images/tools/places.webp') ?>";
        const mapMobileUrl = "<?= base_url('assets/images/tools/map-mobile.webp') ?>";
        const previewAiImg = document.getElementById("preview-ai-img");
        const previewMapImg = document.getElementById("preview-map-img");

        if (mode === 'mobile') {
            deviceFrame.src = mobileUrl;
            deviceContainer.classList.add("mobile-view");
            btnMobile.className = "btn btn-primary active";
            btnDesktop.className = "btn btn-reset";
            if(previewAiImg) previewAiImg.src = aiMobileUrl;
            if(previewMapImg) previewMapImg.src = mapMobileUrl;
        } else {
            deviceFrame.src = desktopUrl;
            deviceContainer.classList.remove("mobile-view");
            btnDesktop.className = "btn btn-primary active";
            btnMobile.className = "btn btn-reset";
            if(previewAiImg) previewAiImg.src = aiDesktopUrl;
            if(previewMapImg) previewMapImg.src = mapDesktopUrl;
        }
    }

    // Real-time listeners
    titleInput.addEventListener("input", updatePreview);
    descInput.addEventListener("input", updatePreview);
    urlInput.addEventListener("input", updatePreview);
    siteNameInput.addEventListener("input", updatePreview);
    boldInput.addEventListener("input", updatePreview);

    btnDesktop.addEventListener("click", () => setDevice('desktop'));
    btnMobile.addEventListener("click", () => setDevice('mobile'));

    optDate.addEventListener("change", updatePreview);
    optRating.addEventListener("change", updatePreview);
    optAds.addEventListener("change", updatePreview);
    optAi.addEventListener("change", updatePreview);
    optMap.addEventListener("change", updatePreview);

    // ── Heatmap ──────────────────────────────────────────────────────────────
    const optHeatmap   = document.getElementById("opt-heatmap");
    const heatmapCv    = document.getElementById("serp-heatmap-cv");
    const heatmapCtx   = heatmapCv.getContext("2d");

    function heatColorSerp(t) {
        const stops = [[0,0,255],[0,200,255],[0,255,80],[255,240,0],[255,80,0],[255,0,0]];
        const i  = t * (stops.length - 1);
        const lo = Math.floor(i), hi = Math.min(lo + 1, stops.length - 1), f = i - lo;
        return stops[lo].map((v, k) => Math.round(v + f * (stops[hi][k] - v)));
    }

    function getTextWordCoordsFromEl(el) {
        // Collect word-level bounding rects from the element's text nodes
        const coords = [];
        const wrapRect = heatmapCv.parentElement.getBoundingClientRect();

        function walk(node) {
            if (node.nodeType === Node.TEXT_NODE) {
                const words = node.textContent.split(/(\s+)/);
                let offset = 0;
                const range = document.createRange();
                for (const word of words) {
                    if (word.trim()) {
                        range.setStart(node, offset);
                        range.setEnd(node, offset + word.length);
                        const r = range.getBoundingClientRect();
                        if (r.width > 0) {
                            coords.push({
                                x: r.left - wrapRect.left + r.width / 2,
                                y: r.top  - wrapRect.top  + r.height / 2
                            });
                        }
                    }
                    offset += word.length;
                }
            } else if (node.nodeType === Node.ELEMENT_NODE) {
                node.childNodes.forEach(walk);
            }
        }

        walk(el);
        return coords;
    }

    function drawHeatmap() {
        const wrap = heatmapCv.parentElement;
        const rect = wrap.getBoundingClientRect();
        heatmapCv.width  = rect.width;
        heatmapCv.height = rect.height;
        const W = heatmapCv.width, H = heatmapCv.height;

        // Gather word centres from title + description
        const coords = [
            ...getTextWordCoordsFromEl(previewTitle),
            ...getTextWordCoordsFromEl(previewDesc)
        ];
        if (!coords.length) return;

        const SCALE = 2;
        const gW = Math.ceil(W / SCALE), gH = Math.ceil(H / SCALE);
        const grid = new Float32Array(gW * gH);

        for (const p of coords) {
            const intensity = 0.4 + Math.random() * 0.6;
            const radius    = Math.round((18 + Math.random() * 14) / SCALE);
            const gx = Math.round(p.x / SCALE), gy = Math.round(p.y / SCALE);
            for (let dy = -radius; dy <= radius; dy++) {
                for (let dx = -radius; dx <= radius; dx++) {
                    const nx = gx + dx, ny = gy + dy;
                    if (nx < 0 || ny < 0 || nx >= gW || ny >= gH) continue;
                    const d = Math.sqrt(dx*dx + dy*dy) / radius;
                    if (d > 1) continue;
                    grid[ny * gW + nx] += (1 - d * d) * intensity;
                }
            }
        }

        let max = 0;
        for (let i = 0; i < grid.length; i++) if (grid[i] > max) max = grid[i];

        const img = heatmapCtx.createImageData(W, H);
        const px  = img.data;
        for (let py = 0; py < H; py++) {
            for (let pxx = 0; pxx < W; pxx++) {
                const v = grid[Math.min(Math.floor(py/SCALE),gH-1)*gW + Math.min(Math.floor(pxx/SCALE),gW-1)] / max;
                if (v < 0.03) continue;
                const [r,g,b] = heatColorSerp(Math.pow(v, 0.5));
                const idx = (py * W + pxx) * 4;
                px[idx]=r; px[idx+1]=g; px[idx+2]=b; px[idx+3]=Math.min(255,Math.round(v*200));
            }
        }

        heatmapCtx.putImageData(img, 0, 0);
        // Smooth with blur
        const tmp = document.createElement("canvas");
        tmp.width = W; tmp.height = H;
        tmp.getContext("2d").putImageData(img, 0, 0);
        heatmapCtx.clearRect(0, 0, W, H);
        heatmapCtx.filter = "blur(8px)";
        heatmapCtx.drawImage(tmp, 0, 0);
        heatmapCtx.filter = "none";

        heatmapCv.classList.add("serp-heatmap-on");
    }

    function clearHeatmap() {
        heatmapCv.classList.remove("serp-heatmap-on");
        setTimeout(() => heatmapCtx.clearRect(0, 0, heatmapCv.width, heatmapCv.height), 500);
    }

    optHeatmap.addEventListener("change", () => {
        if (optHeatmap.checked) {
            drawHeatmap();
        } else {
            clearHeatmap();
        }
    });

    btnFormReset.addEventListener("click", () => {
        // Clear inputs
        titleInput.value = "";
        descInput.value = "";
        urlInput.value = "";
        siteNameInput.value = "";
        boldInput.value = "";

        // Uncheck options
        optAi.checked = false;
        optDate.checked = false;
        optRating.checked = false;
        optAds.checked = false;
        optMap.checked = false;
        optHeatmap.checked = false;

        // Reset device to desktop
        setDevice('desktop');

        // Clear heatmap
        clearHeatmap();

        // Update preview
        updatePreview();
    });

    btnSaveImage.addEventListener("click", function() {
        const previewElement = document.querySelector(".serp-preview");
        if (!previewElement) return;

        const originalBtnText = this.textContent;
        this.textContent = "Generating...";
        this.disabled = true;

        html2canvas(previewElement, {
            useCORS: true,
            scale: 2,
            backgroundColor: "#ffffff",
            logging: false
        }).then(canvas => {
            const link = document.createElement("a");
            link.download = "serp-preview.jpg";
            link.href = canvas.toDataURL("image/jpeg", 0.9);
            link.click();

            this.textContent = originalBtnText;
            this.disabled = false;
        }).catch(err => {
            console.error("Save as image failed:", err);
            this.textContent = originalBtnText;
            this.disabled = false;
            alert("Failed to save image. Please try again.");
        });
    });
    // ────────────────────────────────────────────────────────────────────────

    btnCopyHtml.addEventListener("click", function() {
        const title = titleInput.value || "This is an Example of a Title Tag";
        const desc = descInput.value || "Here is an example of what a snippet looks like in Google's SERPs.";
        const html = `<title>${title}</title>\n<meta name="description" content="${desc}" />`;
        
        const successAction = () => {
            const originalText = this.textContent;
            this.textContent = "Copied!";
            setTimeout(() => {
                this.textContent = originalText;
            }, 2000);
        };

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(html).then(successAction).catch(err => {
                console.error("Failed to copy HTML: ", err);
                alert("Failed to copy to clipboard.");
            });
        } else {
            // Fallback for insecure contexts (.test domains / HTTP)
            const textArea = document.createElement("textarea");
            textArea.value = html;
            textArea.style.position = "fixed";
            textArea.style.left = "-9999px";
            textArea.style.top = "0";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                if (document.execCommand('copy')) {
                    successAction();
                } else {
                    alert("Failed to copy to clipboard.");
                }
            } catch (err) {
                console.error("Fallback copy failed: ", err);
                alert("Failed to copy to clipboard.");
            }
            document.body.removeChild(textArea);
        }
    });

    // Initial update
    updatePreview();
</script>

<style>
</style>