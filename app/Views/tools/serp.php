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
                                <img id="preview-ai-img" src="<?= base_url('assets/images/tools/ai-overview.png') ?>" style="width: 100%; max-width: 600px; border-radius: 12px;" alt="AI Overview">
                            </div>
                            <div id="preview-map" style="display: none; margin-bottom: 20px;">
                                <img id="preview-map-img" src="<?= base_url('assets/images/tools/map-lg-device.png') ?>" style="width: 100%; max-width: 600px; border-radius: 12px;" alt="Map Pack">
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
                    <h2 class="mb-4">How does our Google SERP Simulator work?</h2>
                    <p class="fs-18">Our free Google SERP simulator lets you check and see the title tag, URL, and meta description in the search results as you write them.</p>
                </div>

                <div class="how-to-steps mb-5">
                    <h3 class="fs-22 mb-4">To get the most out of our free SERP tool, all you have to do is:</h3>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">1</div>
                                <p>Enter the URL you would like to preview.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">2</div>
                                <p>Add the name of your site.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">3</div>
                                <p>Write or paste the title tag you would like to check and test.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="step-box">
                                <div class="step-num">4</div>
                                <p>Add the meta description you would like to try.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-description mb-5">
                    <p class="fs-18">SERP simulator will then show you how your title tag would realistically look in Google Search and check whether individual parts of the snippet have an optimal length (and won't get trimmed by Google).</p>
                    <p class="fs-18">Besides a standard organic snippet, you can also use a couple of extra features to optimize your URL, title, and meta tags like a pro 😎</p>
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
                    <p class="fs-18">If you want to learn more, check out our complete guide to <a href="#" class="serp-link">title tags</a> and <a href="#" class="serp-link">meta descriptions</a>.</p>
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
                <h2 class="accordion-header" id="fbfh1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc1" aria-expanded="true">
                        What does a Facebook marketing agency in Dubai actually do for your business?
                    </button>
                </h2>
                <div id="fbfc1" class="accordion-collapse collapse show" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        A Facebook marketing agency in Dubai takes ownership of your entire paid and organic presence on the Meta platform. On the paid side, this means building audience strategy, producing ad creatives, writing copy, structuring campaigns in Meta Ads Manager, installing and configuring the Facebook Pixel, managing daily performance, running A/B tests, and delivering results-focused reports. On the organic side, it includes managing your Facebook business page, creating content, and growing community engagement. The end goal is always the same - turning your Facebook presence into a predictable, scalable source of leads, sales, and brand growth for your business in the UAE.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fbfh2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc2" aria-expanded="false">
                        How is running Facebook Ads in Dubai different from other markets?
                    </button>
                </h2>
                <div id="fbfc2" class="accordion-collapse collapse" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        <p>Several factors make the Dubai and UAE Facebook market genuinely different from Western markets. The audience is highly multicultural - over 200 nationalities - which means a single campaign approach rarely works for everyone. Arabic-language content is essential for reaching Emirati and Arab-speaking audiences effectively. Peak usage times differ from Europe and the US. The competitive landscape across high-value sectors like real estate, finance, retail, and hospitality is intense, pushing CPMs higher and demanding more sophisticated campaign strategies to remain cost-efficient.</p>
                        <p>Additionally, purchasing behavior and trust signals differ - UAE consumers often require more social proof and brand credibility before converting, which impacts how retargeting funnels and ad sequencing need to be built. An agency with genuine UAE experience understands all of these nuances and builds campaigns around them from the start.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fbfh3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc3" aria-expanded="false">
                        What is the Facebook Pixel and what happens if it is not set up correctly?
                    </button>
                </h2>
                <div id="fbfc3" class="accordion-collapse collapse" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        <p>The Facebook Pixel is a snippet of code that sits on your website and tracks what visitors do after clicking your ad - page views, form submissions, add-to-cart actions, purchases, and more. This data does three critical things: it tells Facebook's algorithm which users are most likely to convert (improving delivery quality over time); it enables retargeting campaigns targeting people who visited your site but did not act; and it gives you accurate attribution showing which campaigns and ads are actually generating business results.</p>
                        <p>If the Pixel is not set up correctly - or worse, not set up at all - your campaigns are running blind. Facebook's algorithm cannot optimize toward conversions because it has no conversion data to learn from. You end up paying for clicks and traffic with no way to measure what is working. BrandStory treats Pixel configuration as a non-negotiable foundation before any campaign goes live.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fbfh4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc4" aria-expanded="false">
                        How much should a Dubai business spend on Facebook Ads per month?
                    </button>
                </h2>
                <div id="fbfc4" class="accordion-collapse collapse" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        <p>The right Facebook ad budget depends entirely on your industry, audience size, campaign objectives, and acceptable cost per lead or sale. As a practical guide for the UAE market: startups and small businesses typically begin with AED 3,000–5,000 per month in ad spend and can generate meaningful early results. Growing SMEs commonly invest AED 5,000–20,000 per month. High-competition sectors like real estate, automotive, finance, and enterprise B2B regularly invest AED 20,000–50,000+ monthly to maintain competitive share.</p>
                        <p>The most important thing to understand is that budget size alone does not determine success - campaign structure, creative quality, audience targeting, and ongoing optimisation are the real performance drivers. BrandStory will provide a specific budget recommendation based on your goals and market during our initial strategy call.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fbfh5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc5" aria-expanded="false">
                        What is the difference between a Facebook Lead Ad and a website conversion campaign?
                    </button>
                </h2>
                <div id="fbfc5" class="accordion-collapse collapse" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        <p>A Facebook Lead Ad captures a prospect's contact information directly within Facebook - the user never leaves the platform. This creates an extremely low-friction experience, which typically generates higher lead volume at a lower cost per lead. Lead Ads work particularly well for services with a longer sales cycle - real estate, education, financial services, B2B - where the first goal is simply to get a qualified person into your sales pipeline.</p>
                        <p>A website conversion campaign drives users to your own landing page, where they complete a form or make a purchase. Conversion quality is typically higher because the user has taken more active steps, seen your full value proposition on your website, and made a more conscious decision to convert. BrandStory will recommend the right approach - or a combination of both - based on your specific business model, sales process, and lead quality requirements.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fbfh6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc6" aria-expanded="false">
                        Why do Facebook Ad campaigns stop performing after a few weeks?
                    </button>
                </h2>
                <div id="fbfc6" class="accordion-collapse collapse" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        Ad fatigue is the most common reason Facebook campaigns plateau or decline after an initially strong start. When the same audience sees the same creative too many times, engagement drops, click-through rates fall, and Facebook's algorithm responds by increasing your CPM - meaning you pay more for the same delivery. The solution is systematic creative rotation and audience expansion before fatigue sets in, not after performance has already dropped. BrandStory proactively monitors frequency metrics and refreshes creatives on a schedule designed to stay ahead of fatigue - keeping your campaigns performing consistently rather than cycling between strong starts and disappointing drops.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="fbfh7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc7" aria-expanded="false">
                        Can Facebook Ads work for B2B companies in the UAE?
                    </button>
                </h2>
                <div id="fbfc7" class="accordion-collapse collapse" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        Yes - and it is consistently underestimated by B2B companies in Dubai who default to LinkedIn. While LinkedIn is strong for certain B2B categories, Facebook often delivers a significantly lower cost per B2B lead in the UAE market because decision-maker CPMs are lower and the platform's behavioral and interest targeting can identify business buyers with surprising accuracy. Facebook's Job Title, Employer, and Industry targeting options let you reach senior procurement managers, CFOs, HR directors, and business owners across the GCC. For B2B companies willing to invest in a well-structured Facebook lead generation strategy, the cost per qualified lead is frequently lower than any other paid channel available in the UAE market.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h4 class="accordion-header" id="fbfh8">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc8" aria-expanded="false">
                        What results should I realistically expect from Facebook Ads in Dubai?
                    </button>
                </h4>
                <div id="fbfc8" class="accordion-collapse collapse" aria-labelledby="fbfh8" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        <p class="fs-16 mb-0">Realistic expectations depend heavily on your industry, offer, landing page quality, and budget. That said, based on BrandStory's experience managing Facebook campaigns across multiple verticals in the UAE: lead generation campaigns for service businesses typically achieve CPLs between AED 25–150 depending on category; e-commerce campaigns targeting UAE consumers typically see ROAS between 3x–8x on optimised campaigns; brand awareness campaigns reach tens of thousands of targeted UAE users per week on modest budgets. Months 1–2 are always a testing phase where data is gathered and optimised - months 3 onward is where performance stabilises and scales. We set clear KPI benchmarks before every campaign launch so you always know what success looks like and how we are tracking against it.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h4 class="accordion-header" id="fbfh9">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc9" aria-expanded="false">
                        Does BrandStory manage Instagram alongside Facebook?
                    </button>
                </h4>
                <div id="fbfc9" class="accordion-collapse collapse" aria-labelledby="fbfh9" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        <p class="fs-16 mb-0">Yes. Facebook and Instagram advertising are managed through the same Meta Ads Manager platform, which means campaigns can be extended to Instagram placements - feed, stories, reels, and Explore - using the same targeting and budget setup. We analyse performance data across both platforms to understand where your specific audience is most responsive, then allocate budget accordingly. In the UAE, Instagram tends to outperform for lifestyle, fashion, beauty, food, and real estate brands where visual impact is critical. Facebook tends to deliver stronger results for lead generation, B2B, and direct response campaigns. Most BrandStory clients run across both platforms simultaneously and benefit from the combined scale of the full Meta ecosystem.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h4 class="accordion-header" id="fbfh10">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fbfc10" aria-expanded="false">
                        What is the cost of hiring a Facebook marketing agency in Dubai?
                    </button>
                </h4>
                <div id="fbfc10" class="accordion-collapse collapse" aria-labelledby="fbfh10" data-bs-parent="#accordionFB">
                    <div class="accordion-body">
                        <p class="fs-16 mb-0">Facebook marketing agency management fees in Dubai typically range from AED 2,500 to AED 10,000 per month, depending on the scope of work - number of active campaigns, creative production requirements, account complexity, and reporting depth. This fee is separate from your ad spend budget, which goes directly to Meta. BrandStory provides scope-based, transparent pricing with no hidden fees. After an initial strategy conversation where we understand your goals, current situation, and budget, we will provide a clear proposal showing exactly what is included, what KPIs we are committing to, and what your investment covers - so you can make an informed decision with no surprises.</p>
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
        const aiDesktopUrl = "<?= base_url('assets/images/tools/ai-overview.png') ?>";
        const aiMobileUrl = "<?= base_url('assets/images/tools/ai-overview-sm-device.png') ?>";
        const mapDesktopUrl = "<?= base_url('assets/images/tools/map-lg-device.png') ?>";
        const mapMobileUrl = "<?= base_url('assets/images/tools/map-sm-device.png') ?>";
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
    .serp-simulator-wrapper{
        max-width:1400px;
        margin: 0 auto;
    }
    .serp-simulator-header{
        text-align:center;
        /* color: red; */
        padding: 40px 0;
    }
    .serp-simulator {
        display: flex;
        gap: 0;
        align-items: stretch;
        border: 1px solid #ddd;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
    }
    @media (max-width:786px) {
        .serp-simulator{
            flex-direction: column;
        }
    }
    .form-group {
        background: #f8f9fa;
        flex: 0 0 380px;
        padding: 24px;
        border-right: 1px solid #ddd;
    }
    .form-section {
        margin-bottom: 24px;
    }
    .preview-column {
        flex: 1;
        background: #f1f3f4;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    input, textarea {
        width: 100%;
        padding: 10px 12px;
        font-size: 14px;
        margin-bottom: 12px;
        border: 1px solid #dfe1e5;
        border-radius: 6px;
        box-sizing: border-box;
        font-family: inherit;
        background: #fff;
        color: black;
    }
    input:focus, textarea:focus {
        border-color: #1a73e8;
        outline: none;
        box-shadow: 0 0 0 2px rgba(26,115,232,0.1);
    }
    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        font-size: 13px;
        color: #4d5156;
    }

    /* Options Section */
    .options-section h3 {
        font-size: 18px;
        color: #3c4043;
        margin-bottom: 15px;
        font-weight: 500;
    }
    .options-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
        margin-bottom: 24px;
    }
    .checkbox-label {
        display: flex !important;
        align-items: center;
        font-weight: 400 !important;
        color: #5f6368 !important;
        cursor: pointer;
        gap: 8px;
        white-space: nowrap;
    }
    .checkbox-label input {
        width: 16px;
        height: 16px;
        margin: 0;
    }

    /* Action Buttons */
    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 10px;
    }
    .btn {
        padding: 10px 12px;
        font-size: 13px;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        text-align: center;
        border: none;
        transition: all 0.2s;
    }
    .btn-reset {
        background: #fff;
        color: #1a0dab;
        border: 1px solid #dfe1e5;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .btn-reset:hover {
        background: #f8f9fa;
    }
    .btn-primary {
        background: #0019af;
        color: white;
    }
    .btn-primary:hover {
        background: #00138c;
        box-shadow: 0 2px 6px rgba(0,25,175,0.3);
    }
    .btn.active {
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
    }

    .toggle-device{
        position: absolute;
        display: flex;
        top: 10px;
        right: 10px;
    }
    @media (max-width: 786px) {
        .preview-column{
            display: flex;
            flex-direction: column;
            /* padding-top: 100px; */
        }
        .toggle-device{
            position: relative;
            right: 10px;
            margin-bottom: 30px;
            margin-top: 5px;
        }
    }
    /* Device Frame Styling */
    .device-container {
        position: relative;
        width: 100%;
        max-width: 850px;
        margin: 0 auto;
    }
    .device-frame {
        width: 100%;
        height: auto;
        display: block;
        pointer-events: none;
    }
    .device-screen {
        position: absolute;
        top: 5.8%;
        left: 4.3%;
        right: 4.8%;
        bottom: 5.8%;
        background: #fff;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: 10px;
    }

    .device-screen::-webkit-scrollbar {
        width: 6px; 
    }
    .device-screen::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .device-screen::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
    .device-screen::-webkit-scrollbar-thumb:hover {
        background: #999;
    }

    /* Hide scrollbar on mobile preview */
    .mobile-view .device-screen::-webkit-scrollbar {
        width: 0;
        height: 0;
        background: transparent;
        display: none;
    }
    .mobile-view .device-screen {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .serp-preview {
        padding: 30px 40px;
        background: #fff;
        min-height: 100%;
    }

    .serp-header {
        display: flex;
        align-items: flex-start;
        border-bottom: 1px solid #ebebeb;
        margin-bottom: 20px;
        padding-bottom: 0px;
    }
    .serp-logo {
        margin-right: 35px;
        margin-top: 15px; /* Aligns with search bar */
    }
    .serp-search {
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    .serp-search input {
        width: 100%;
        max-width: 650px;
        border: 1px solid #dfe1e5;
        border-radius: 24px;
        padding: 12px 24px;
        font-size: 16px;
        color: #202124;
        box-shadow: none;
        outline: none;
        margin-bottom: 15px;
        margin-top: 5px;
        transition: box-shadow 0.2s ease;
    }
    .serp-search input:hover, .serp-search input:focus {
        box-shadow: 0 1px 6px rgba(32,33,36,0.28);
        border-color: transparent;
    }
    .filter-tags {
        display: flex;
        gap: 25px;
        padding-left: 10px; /* Align near the left curve of the input */
    }
    .filter-tag {
        color: #5f6368;
        font-size: 14px;
        padding: 5px 0 10px 0;
        position: relative;
    }
    .filter-tag.active {
        color: #1a73e8;
    }
    .filter-tag.active::after {
        content: '';
        position: absolute;
        bottom: -1px; /* Perfect overlap with border-bottom */
        left: 0;
        right: 0;
        height: 3px;
        background-color: #1a73e8;
        border-radius: 3px 3px 0 0;
    }


    .responsive-preview {
        margin-left: 80px;
        font-family: arial, sans-serif;
    }

    .serp-result-item {
        max-width: 600px;
        margin-bottom: 30px;
    }

    .serp-source {
        display: flex;
        align-items: center;
        margin-bottom: 4px;
    }

    .serp-favicon {
        width: 26px;
        height: 26px;
        background-color: #f1f3f4;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        flex-shrink: 0;
    }

    .serp-favicon svg {
        width: 16px;
        height: 16px;
    }

    .serp-source-info {
        display: flex;
        flex-direction: column;
    }

    .serp-site-name {
        color: #202124;
        font-size: 14px;
        line-height: 20px;
        font-weight: normal;
    }

    .serp-url {
        color: #4d5156;
        font-size: 12px;
        line-height: 18px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .serp-title {
        color: #1a0dab;
        font-size: 20px;
        line-height: 1.3;
        font-weight: normal;
        margin: 4px 0;
        cursor: pointer;
    }

    .serp-title:hover {
        text-decoration: underline;
    }

    .serp-description {
        color: #4d5156;
        font-size: 14px;
        line-height: 1.58;
        word-wrap: break-word;
    }


    .serp-skeleton {
        max-width: 600px;
        margin-bottom: 40px;
        opacity: 0.6;
    }

    .skeleton-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .skeleton-circle {
        width: 32px;
        height: 32px;
        background-color: #e8eaed;
        border-radius: 50%;
        margin-right: 12px;
    }

    .skeleton-line-sm {
        width: 220px;
        height: 12px;
        background-color: #e8eaed;
        margin-bottom: 6px;
        border-radius: 4px;
    }

    .skeleton-line-sm:last-child {
        width: 180px;
        margin-bottom: 0;
    }

    .skeleton-title {
        width: 380px;
        height: 24px;
        background-color: #d1d4f9; /* Light purple for title as requested */
        margin-bottom: 12px;
        border-radius: 4px;
    }

    .skeleton-desc {
        width: 100%;
        height: 60px;
        background-color: #f1f3f4;
        border-radius: 4px;
    }

    /* Shimmer effect */
    .serp-skeleton [class*="skeleton-"] {
        position: relative;
        overflow: hidden;
    }

    .serp-skeleton [class*="skeleton-"]::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: shimmer 1.5s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Mobile Overrides */
    .device-container.mobile-view {
        max-width: 420px;
    }
    .device-container.mobile-view .device-screen {
        top: 1.5%;
        left: 3.5%;
        right: 3.3%;
        bottom: 1.3%;
        border-radius: 50px;
    }
    .device-container.mobile-view .serp-preview {
        padding: 15px 15px;
    }
    .device-container.mobile-view .serp-header {
        flex-direction: column;
        align-items: center;
        padding-top: 15px;
    }
    .device-container.mobile-view .serp-logo {
        margin-right: 0;
        margin-bottom: 12px;
        margin-top: 5px;
    }
    .device-container.mobile-view .serp-search {
        width: 100%;
    }
    .device-container.mobile-view .serp-search input {
        margin-bottom: 15px;
        border-radius: 24px;
        padding: 10px 20px;
        font-size: 14px;
    }
    .device-container.mobile-view .filter-tags {
        gap: 15px;
        padding-left: 0;
        margin-bottom: 5px;
        justify-content: center;
    }
    .device-container.mobile-view .responsive-preview {
        margin-left: 0;
    }
    .device-container.mobile-view .serp-result-item {
        max-width: 100%;
    }
    .device-container.mobile-view .serp-title {
        font-size: 18px;
    }
    .device-container.mobile-view .serp-description {
        font-size: 13px;
    }
    .device-container.mobile-view .serp-skeleton {
        max-width: 100%;
    }
    .device-container.mobile-view .skeleton-title {
        width: 80%;
    }
    .device-container.mobile-view .skeleton-line-sm {
        width: 60%;
    }

    /* Desktop Preview Responsive Adjustments */
    @media (max-width: 786px) {
        .device-container:not(.mobile-view) .serp-preview {
            padding: 15px 20px;
        }
        .device-container:not(.mobile-view) .serp-header {
            margin-bottom: 10px;
        }
        .device-container:not(.mobile-view) .serp-logo {
            margin-right: 20px;
        }
        .device-container:not(.mobile-view) .serp-logo img {
            max-height: 18px !important;
        }
        .device-container:not(.mobile-view) .serp-search input {
            padding: 8px 16px;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .device-container:not(.mobile-view) .filter-tags {
            gap: 15px;
        }
        .device-container:not(.mobile-view) .filter-tag {
            font-size: 12px;
        }
        .device-container:not(.mobile-view) .responsive-preview {
            margin-left: 40px;
        }
        .device-container:not(.mobile-view) .serp-title {
            font-size: 16px;
        }
        .device-container:not(.mobile-view) .serp-description {
            font-size: 11px;
            line-height: 1.4;
        }
        .device-container:not(.mobile-view) .serp-result-item {
            margin-bottom: 15px;
        }
        .device-container:not(.mobile-view) .serp-favicon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }
        .device-container:not(.mobile-view) .serp-site-name {
            font-size: 12px;
        }
        .device-container:not(.mobile-view) .serp-url {
            font-size: 11px;
        }
        .device-container:not(.mobile-view) .serp-skeleton {
            margin-bottom: 20px;
        }
        .device-container:not(.mobile-view) .skeleton-circle {
            width: 24px;
            height: 24px;
        }
        .device-container:not(.mobile-view) .skeleton-title {
            height: 18px;
        }
        .device-container:not(.mobile-view) .skeleton-line-sm {
            height: 10px;
        }
    }

    /* Rating Component */
    .serp-rating {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        color: #70757a;
        margin-top: 4px;
        font-family: arial, sans-serif;
    }
    .rating-stars {
        color: #fabb05;
        letter-spacing: 1.5px;
    }
    .rating-score {
        color: #4d5156;
    }

    /* Heatmap overlay */
    .serp-heatmap-wrap {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    #serp-heatmap-cv {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 10;
        border-radius: 6px;
        opacity: 0;
        transition: opacity 0.5s;
    }
    #serp-heatmap-cv.serp-heatmap-on {
        opacity: 0.65;
    }

    /* Informational Section Styling */
    .serp-tool-info {
        border-top: 1px solid #eee;
        font-family: inherit;
    }
    .step-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 12px;
        height: 100%;
        border: 1px solid #eee;
    }
    .step-num {
        width: 30px;
        height: 30px;
        background: #0019af;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-bottom: 15px;
        font-size: 14px;
    }
    .fs-22 { font-size: 22px; }
    .fs-18 { font-size: 18px; line-height: 1.6; color: #4d5156; }
    .feature-card-premium {
        background: #fff;
        padding: 25px;
        border-radius: 16px;
        border: 1px solid #eee;
        height: 100%;
        transition: all 0.3s ease;
    }
    .feature-card-premium:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        border-color: #0019af;
    }
    .f-icon {
        font-size: 24px;
        margin-bottom: 15px;
        width: 50px;
        height: 50px;
        background: #f0f2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        color: #0019af;
    }
    .f-content h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 12px;
        color: #202124;
    }
    .f-content p {
        font-size: 14px;
        color: #5f6368;
        line-height: 1.6;
        margin: 0;
    }
    @media (max-width: 786px) {
        .fs-22 { font-size: 20px; }
        .fs-18 { font-size: 16px; }
        .serp-tool-info {
            padding: 40px 20px;
        }
    }

    /* Guide Section Styling */
    .serp-guide-section {
        border-top: 1px solid #eee;
    }
    .ingredient-num {
        flex: 0 0 45px;
        height: 45px;
        background: #0019af;
        color: #fff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0,25,175,0.2);
    }
    .ingredient-item h3 {
        color: #202124;
        font-weight: 700;
    }
    .serp-link {
        color: #0019af !important;
        text-decoration: underline;
        font-weight: 700;
    }
    .serp-link:hover {
        color: #1a0dab !important;
    }

</style>