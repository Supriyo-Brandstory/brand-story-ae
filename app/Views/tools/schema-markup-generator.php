<section class="tools-hero-section">
    <div class="tools-glow-blob-1"></div>
    <div class="tools-glow-blob-2"></div>
    <div class="tools-grid-overlay"></div>
    <div class="container">
        <div class="col-lg-8 text-white mx-auto">
            <h1>Schema Markup <span>Generator Tool</span></h1>
            <p>Generate JSON-LD schema markup for your website in seconds. Improve your SEO, increase click-through rates, and help search engines understand your content better.</p>
        </div>
    </div>
</section>

<section class="tool-section py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            <!-- Left Side: Inputs -->
            <div class="col-lg-6 d-flex flex-column">
                <div class="tool-card d-flex flex-column flex-grow-1">
                    <div class="tool-card-header">
                        <label class="schema-field-label mb-2">Select schema type</label>
                        <select id="schema-type" class="form-select">
                            <option value="article" selected>Article</option>
                            <option value="breadcrumb">Breadcrumb</option>
                            <option value="event">Event</option>
                            <option value="faq">FAQ</option>
                            <option value="howto">How-to</option>
                            <option value="organization">Organization</option>
                            <option value="local_business">Local Business</option>
                        </select>
                    </div>
                    <div class="tool-card-body" id="dynamic-fields"></div>
                </div>
            </div>

            <!-- Right Side: Code Preview -->
            <div class="col-lg-6 d-flex flex-column">
                <div class="code-preview-card d-flex flex-column flex-grow-1">
                    <div class="code-toolbar">
                        <div class="d-flex align-items-center gap-2">
                            <span class="mac-dot" style="background:#f85149;"></span>
                            <span class="mac-dot" style="background:#d29922;"></span>
                            <span class="mac-dot" style="background:#3fb950;"></span>
                            <span class="ms-2 code-toolbar-label">JSON-LD Output</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button id="copy-btn" class="code-action-btn">Copy Code</button>
                            <button id="validate-btn" class="code-action-btn code-action-btn--primary">Validate</button>
                        </div>
                    </div>
                    <div class="code-body flex-grow-1">
                        <pre id="json-ld-output"></pre>
                    </div>
                    <div class="code-footer">
                        Fill in the form — your JSON-LD updates live as you type.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="how-it-works-section sp-100 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-800 text-dark">How to Generate Valid Schema Markup</h2>
            <p class="text-muted max-w-700 mx-auto">Create precision-engineered JSON-LD structured data in three simple steps.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100 shadow-sm transition-all hover-up">
                    <div class="step-number mb-4" style="font-size: 40px; font-weight: 900; color: #f0f0f0;">01</div>
                    <h4 class="fw-700 mb-3">Choose Template</h4>
                    <p class="text-muted fs-14">Select the schema type that matches your content, whether it's an Article, a Local Business, an Event, or an FAQ list.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100 shadow-sm transition-all hover-up">
                    <div class="step-number mb-4" style="font-size: 40px; font-weight: 900; color: #f0f0f0;">02</div>
                    <h4 class="fw-700 mb-3">Populate Data</h4>
                    <p class="text-muted fs-14">Enter your specific details into our intuitive form. The tool compiles a valid JSON-LD script in real-time as you type.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="step-card p-5 rounded-5 border bg-white h-100 shadow-sm transition-all hover-up">
                    <div class="step-number mb-4" style="font-size: 40px; font-weight: 900; color: #f0f0f0;">03</div>
                    <h4 class="fw-700 mb-3">Copy & Validate</h4>
                    <p class="text-muted fs-14">Copy the generated code and use our direct link to Google's testing tool to ensure your markup is error-free before deployment.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section sp-100 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="content-card">
                    <h2 class="mb-4 fw-800 text-dark">Why Use Our Schema Markup Generator?</h2>
                    <p class="text-muted fs-18">Schema markup is a critical component of modern SEO that helps search engines understand the context of your data. By providing structured information about your business, products, or articles, you enable Google to display rich results that stand out in competitive search landscapes. Our automated tool simplifies this complex technical process into a user-friendly generate-and-paste workflow.</p>
                    <ul class="benefit-list mt-4 p-0 list-unstyled">
                        <li class="mb-3 d-flex align-items-start text-dark">
                            <i class="ion-checkmark-circled text-danger me-3 mt-1 fs-20"></i>
                            <span><strong>Rich Snippet Eligibility:</strong> Qualify for visually enhanced search results like star ratings, event dates, and FAQs.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start text-dark">
                            <i class="ion-checkmark-circled text-danger me-3 mt-1 fs-20"></i>
                            <span><strong>Improved Organic CTR:</strong> Rich results attract more eye-share and clicks, leading to higher organic traffic.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start text-dark">
                            <i class="ion-checkmark-circled text-danger me-3 mt-1 fs-20"></i>
                            <span><strong>Enhanced Indexing Speed:</strong> Helping bots understand your content hierarchy leads to more efficient crawling and indexing.</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img-wrapper rounded-5xx overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1470&auto=format&fit=crop" alt="Schema Markup Analysis" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>



<section class="sp-50 bg-light">
    <div class="container text-center">
        <h2 class="mb-5 fw-800">Trusted by Forward-Thinking Brands</h2>
        <?php include __DIR__ . '/../component/services/clients.php' ?>
    </div>
</section>

<section class="site-faq sp-100 bg-white border-top">
    <div class="container">
        <h2 class="text-center fw-800 mb-5 text-dark">Frequently Asked Questions</h2>
        <div class="accordion max-w-800 mx-auto" id="accordionSchema">

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh1">
                    <button class="accordion-button fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc1">
                        Where should I place the generated schema code?
                    </button>
                </h2>
                <div id="faqc1" class="accordion-collapse collapse show" data-bs-parent="#accordionSchema">
                    <div class="accordion-body text-muted line-h-1-8">
                        The JSON-LD code can be placed within the <code>&lt;head&gt;</code> or <code>&lt;body&gt;</code> tags of your HTML file. Google officially recommends the <code>&lt;head&gt;</code> section for optimal performance, though both are technically valid.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh2">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc2">
                        Will Schema Markup guarantee a Rich Result?
                    </button>
                </h2>
                <div id="faqc2" class="accordion-collapse collapse" data-bs-parent="#accordionSchema">
                    <div class="accordion-body text-muted line-h-1-8">
                        Implementation makes your page *eligible* for rich results, but it does not guarantee their appearance. Google's algorithm decides whether to display snippets based on relevance, quality, and the specific query.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                <h2 class="accordion-header" id="faqh3">
                    <button class="accordion-button collapsed fw-700 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqc3">
                        Do I need schema if I already have a sitemap?
                    </button>
                </h2>
                <div id="faqc3" class="accordion-collapse collapse" data-bs-parent="#accordionSchema">
                    <div class="accordion-body text-muted line-h-1-8">
                        Yes. While a sitemap tells Google *where* your pages are, Schema tells Google *what* your pages are about. Together, they provide search bots with a complete architectural and context-rich understanding of your site.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="final-cta py-5" style="background: #000;">
    <div class="container text-center py-5">
        <h2 class="text-white fw-900 mb-4" style="font-size: 42px;">Ready to Dominate Search Rankings?</h2>
        <p class="text-white-50 mb-5 fs-18 max-w-700 mx-auto">Technical SEO is just the beginning. Partner with BrandStory to build a comprehensive digital strategy that drives real growth for your business.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/contact" class="code-action-btn code-action-btn--primary px-5 py-3 fs-16" style="border-radius: 50px;">Talk to an Expert</a>
            <a href="/tools" class="code-action-btn px-5 py-3 fs-16" style="border-radius: 50px;">Explore More Tools</a>
        </div>
    </div>
</section>

<style>
/* ── Hero - Moved to style.css ── */

/* ── Tool section ── */
.tool-section { background: #f4f6f9; }

/* ── Left card ── */
.tool-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 16px;
    overflow: hidden;
    min-height: 580px;
}
.tool-card:hover { box-shadow: none; }
.tool-card-header {
    width: 100%;
    padding: 20px 24px 16px;
    border-bottom: 1px solid #f0f0f0;
    flex-shrink: 0;
}
.tool-card-body {
    width: 100%;
    padding: 20px 24px 24px;
    overflow-y: auto;
    flex: 1;
}

/* ── Form elements ── */
.form-select,
.form-control {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 14px;
    color: #1a1a1a;
    background-color: #fff;
    width: 100%;
    transition: border-color .15s, box-shadow .15s;
}
.form-select:focus,
.form-control:focus {
    border-color: #ea3a22;
    box-shadow: 0 0 0 3px rgba(234,58,34,.1);
    outline: none;
}
textarea.form-control {
    border-radius: 8px;
    resize: vertical;
    min-height: 80px;
    line-height: 1.5;
}

.schema-field-group { margin-bottom: 18px; }
.schema-field-label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: #888;
    margin-bottom: 5px;
    text-align: left;
}
.schema-field-label .req { color: #ea3a22; margin-left: 2px; }
.schema-field-hint {
    font-size: 11px;
    font-weight: 400;
    text-transform: none;
    letter-spacing: 0;
    color: #bbb;
    margin-left: 4px;
}
.schema-section-title {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    /* letter-spacing: .08em; */
    color: #ff1500ff;
    border-bottom: 1px solid #f0f0f0;
    padding-bottom: 6px;
    margin: 22px 0 14px;
}
.schema-section-title:first-child { margin-top: 4px; }

/* ── Repeatable ── */
.repeatable-item {
    background: #f8f9fb;
    border: 1px solid #ececec;
    border-radius: 10px;
    padding: 14px 14px 6px;
    margin-bottom: 10px;
}
.repeatable-item-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}
.repeatable-item-label {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: #999;
}
.remove-item-btn {
    background: none;
    border: none;
    cursor: pointer;
    color: #ccc;
    font-size: 18px;
    line-height: 1;
    padding: 0;
    transition: color .15s;
}
.remove-item-btn:hover { color: #ea3a22; }

.add-item-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    width: 100%;
    padding: 9px 14px;
    font-size: 13px;
    font-weight: 600;
    color: #ea3a22;
    background: transparent;
    border: 1.5px dashed rgba(234,58,34,.4);
    border-radius: 8px;
    cursor: pointer;
    margin-top: 2px;
    transition: background .15s, border-color .15s;
}
.add-item-btn:hover {
    background: rgba(234,58,34,.05);
    border-color: #ea3a22;
}

/* ── Right card ── */
.code-preview-card {
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #30363d;
    min-height: 580px;
}
.code-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 18px;
    background: #161b22;
    border-bottom: 1px solid #30363d;
    flex-shrink: 0;
}
.code-toolbar-label {
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: #8b949e;
}
.mac-dot {
    width: 11px;
    height: 11px;
    border-radius: 50%;
    display: inline-block;
    flex-shrink: 0;
}
.code-action-btn {
    font-size: 12px;
    font-weight: 500;
    padding: 5px 14px;
    border-radius: 20px;
    cursor: pointer;
    border: 1px solid #30363d;
    background: transparent;
    color: #8b949e;
    transition: all .15s;
    white-space: nowrap;
}
.code-action-btn:hover { color: #e6edf3; border-color: #8b949e; }
.code-action-btn--primary {
    background: #ea3a22;
    border-color: #ea3a22;
    color: #fff;
}
.code-action-btn--primary:hover { background: #c5301b; border-color: #c5301b; }
.code-action-btn.copied { color: #3fb950 !important; border-color: #3fb950 !important; }

.code-body {
    background: #0d1117;
    padding: 18px 20px;
    overflow: auto;
}
pre#json-ld-output {
    margin: 0;
    min-height: 460px;
    font-size: 12.5px;
    line-height: 1.7;
    color: #8ef98e;
    font-family: 'Courier New', Courier, monospace;
    white-space: pre;
    background: none;
    border: none;
}
.code-footer {
    background: #161b22;
    border-top: 1px solid #30363d;
    padding: 10px 18px;
    font-size: 12px;
    color: #484f58;
    flex-shrink: 0;
}


/* ── Tool bottom sections ── */
.sp-100 { padding: 100px 0; }
.sp-50 { padding: 50px 0; }
.bg-light { background: #f8f9fa !important; }
.rounded-5xx { border-radius: 30px; }
.hover-up { transition: all 0.3s ease; }
.hover-up:hover { transform: translateY(-10px); }
.text-danger { color: #ea3a22 !important; }
.fw-800 { font-weight: 800; }
.max-w-700 { max-width: 700px; }
.max-w-800 { max-width: 800px; }
.line-h-1-8 { line-height: 1.8; }
.fs-20 { font-size: 20px; }
.fs-14 { font-size: 14px; }

.step-card { 
    border-radius: 20px !important; 
    transition: all 0.3s ease;
}
.step-number { font-family: 'Poppins', sans-serif; }

.site-faq .accordion-button:not(.collapsed) {
    background: rgba(234, 58, 34, 0.05);
    color: #ea3a22;
}
.site-faq .accordion-item { border: 1px solid #eee; }

</style>

<script>
(function () {
    const typeSelect    = document.getElementById('schema-type');
    const dynamicFields = document.getElementById('dynamic-fields');
    const jsonOutput    = document.getElementById('json-ld-output');
    const copyBtn       = document.getElementById('copy-btn');
    const validateBtn   = document.getElementById('validate-btn');

    let bcCount = 0, faqCount = 0, htCount = 0, socCount = 0;

    function v(id) {
        const el = document.getElementById(id);
        return el ? el.value.trim() : '';
    }

    function sectionTitle(text) {
        return `<div class="schema-section-title">${text}</div>`;
    }

    function fieldHTML(id, label, type, placeholder, required, hint) {
        const req      = required ? '<span class="req">*</span>' : '';
        const hintSpan = hint ? `<span class="schema-field-hint">— ${hint}</span>` : '';
        const lbl      = `<label class="schema-field-label" for="${id}">${label}${req}${hintSpan}</label>`;
        if (type === 'textarea') {
            return `<div class="schema-field-group">${lbl}<textarea class="form-control" id="${id}" placeholder="${placeholder || ''}" rows="3" oninput="smGenerate()"></textarea></div>`;
        }
        return `<div class="schema-field-group">${lbl}<input type="${type}" class="form-control" id="${id}" placeholder="${placeholder || ''}" oninput="smGenerate()"></div>`;
    }

    function selectHTML(id, label, options) {
        const opts = options.map(o => `<option value="${o.v}">${o.l}</option>`).join('');
        return `<div class="schema-field-group"><label class="schema-field-label" for="${id}">${label}</label><select class="form-select" id="${id}" onchange="smGenerate()">${opts}</select></div>`;
    }

    const templates = {
        article: () => `
            ${sectionTitle('Article details')}
            ${fieldHTML('art_headline',      'Headline',           'text',     'e.g. How to bake sourdough bread',      true)}
            ${fieldHTML('art_url',           'Article URL',        'url',      'https://example.com/blog/post',          true)}
            ${fieldHTML('art_image',         'Image URL',          'url',      'https://example.com/image.jpg',          false)}
            ${fieldHTML('art_datePublished', 'Date published',     'date',     '',                                       true)}
            ${fieldHTML('art_dateModified',  'Date modified',      'date',     '',                                       false)}
            ${fieldHTML('art_description',   'Description',        'textarea', 'Brief summary of the article…',          false)}
            ${sectionTitle('Author')}
            ${fieldHTML('art_authorName',    'Author name',        'text',     'e.g. Jane Smith',                        true)}
            ${fieldHTML('art_authorUrl',     'Author profile URL', 'url',      'https://example.com/author/jane',        false)}
            ${sectionTitle('Publisher')}
            ${fieldHTML('art_publisherName', 'Publisher name',     'text',     'e.g. My Blog',                           true)}
            ${fieldHTML('art_publisherLogo', 'Publisher logo URL', 'url',      'https://example.com/logo.png',           false)}
        `,
        breadcrumb: () => `
            <div id="bc-items"></div>
            <button type="button" class="add-item-btn" onclick="smAddBc()">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M6.5 1v11M1 6.5h11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                Add breadcrumb item
            </button>
        `,
        event: () => `
            ${sectionTitle('Event details')}
            ${fieldHTML('ev_name',        'Event name',        'text',     'e.g. Developer Summit 2025',         true)}
            ${fieldHTML('ev_description', 'Description',       'textarea', 'What is this event about?',           false)}
            ${fieldHTML('ev_url',         'Event URL',         'url',      'https://example.com/events/summit',   false)}
            ${fieldHTML('ev_image',       'Event image URL',   'url',      'https://example.com/event.jpg',       false)}
            ${sectionTitle('Date & time')}
            ${fieldHTML('ev_startDate',   'Start date & time', 'datetime-local', '', true)}
            ${fieldHTML('ev_endDate',     'End date & time',   'datetime-local', '', false)}
            ${sectionTitle('Location')}
            ${selectHTML('ev_mode', 'Attendance mode', [
                {v:'offline', l:'In-person'},
                {v:'online',  l:'Online'},
                {v:'mixed',   l:'Mixed'}
            ])}
            ${fieldHTML('ev_locationName', 'Venue name',     'text', 'e.g. Convention Center', false)}
            ${fieldHTML('ev_address',      'Street address', 'text', '123 Main St',             false)}
            ${fieldHTML('ev_city',         'City',           'text', 'e.g. San Francisco',      false)}
            ${fieldHTML('ev_country',      'Country code',   'text', 'e.g. US',                 false)}
            ${sectionTitle('Status & tickets')}
            ${selectHTML('ev_status', 'Event status', [
                {v:'EventScheduled',   l:'Scheduled'},
                {v:'EventCancelled',   l:'Cancelled'},
                {v:'EventPostponed',   l:'Postponed'},
                {v:'EventRescheduled', l:'Rescheduled'}
            ])}
            ${fieldHTML('ev_price',    'Ticket price', 'text', 'e.g. 49.99', false, 'leave blank if free')}
            ${fieldHTML('ev_currency', 'Currency',     'text', 'USD',         false)}
        `,
        faq: () => `
            <div id="faq-items"></div>
            <button type="button" class="add-item-btn" onclick="smAddFaq()">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M6.5 1v11M1 6.5h11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                Add question
            </button>
        `,
        howto: () => `
            ${sectionTitle('Overview')}
            ${fieldHTML('ht_name',          'Title',          'text',     'e.g. How to change a bike tire', true)}
            ${fieldHTML('ht_description',   'Description',    'textarea', 'Brief overview…',                false)}
            ${fieldHTML('ht_totalTime',     'Total time',     'text',     'PT30M', false, 'ISO 8601 duration')}
            ${fieldHTML('ht_estimatedCost', 'Estimated cost', 'text',     'e.g. 10',                        false)}
            ${fieldHTML('ht_currency',      'Currency',       'text',     'USD',                            false)}
            ${fieldHTML('ht_image',         'Image URL',      'url',      'https://example.com/image.jpg',  false)}
            ${sectionTitle('Steps')}
            <div id="ht-steps"></div>
            <button type="button" class="add-item-btn" onclick="smAddStep()">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M6.5 1v11M1 6.5h11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                Add step
            </button>
        `,
        organization: () => `
            ${sectionTitle('Organization details')}
            ${fieldHTML('org_name',    'Name',     'text', 'e.g. Acme Corp', true)}
            ${fieldHTML('org_url',     'URL',      'url',  'https://example.com', true)}
            ${fieldHTML('org_logo',    'Logo URL', 'url',  'https://example.com/logo.png', false)}
            ${fieldHTML('org_contact', 'Contact Phone', 'text', '+1-123-456-7890', false)}
            ${sectionTitle('Social Profiles')}
            <div id="org-socials"></div>
            <button type="button" class="add-item-btn" onclick="smAddSocial()">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M6.5 1v11M1 6.5h11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                Add Social Profile
            </button>
        `,
        local_business: () => `
            ${sectionTitle('Business details')}
            ${fieldHTML('lb_name',  'Name',      'text',     'e.g. Joe\'s Pizza', true)}
            ${fieldHTML('lb_url',   'URL',       'url',      'https://example.com', true)}
            ${fieldHTML('lb_image', 'Image URL', 'url',      'https://example.com/store.jpg', true)}
            ${fieldHTML('lb_phone', 'Phone',     'text',     '+1-123-456-7890', false)}
            ${fieldHTML('lb_price', 'Price Range', 'text',   'e.g. $$', false)}
            ${fieldHTML('lb_desc',  'Description', 'textarea', 'Tell us about your business…', false)}
            ${sectionTitle('Address')}
            ${fieldHTML('lb_street',  'Street Address', 'text', '123 Main St', false)}
            ${fieldHTML('lb_city',    'City',           'text', 'San Francisco', false)}
            ${fieldHTML('lb_state',   'State / Region', 'text', 'CA', false)}
            ${fieldHTML('lb_zip',     'Zip / Postal Code', 'text', '94101', false)}
            ${fieldHTML('lb_country', 'Country',        'text', 'US', false)}
            ${sectionTitle('Geo Coordinates')}
            ${fieldHTML('lb_lat', 'Latitude',  'text', '37.7749', false)}
            ${fieldHTML('lb_lng', 'Longitude', 'text', '-122.4194', false)}
        `
    };

    window.smAddBc = function () {
        bcCount++;
        const c = bcCount;
        const div = document.createElement('div');
        div.className = 'repeatable-item';
        div.id = `bc_item_${c}`;
        div.innerHTML = `
            <div class="repeatable-item-header">
                <span class="repeatable-item-label">Item ${c}</span>
                <button type="button" class="remove-item-btn" onclick="smRemove('bc_item_${c}')">&#215;</button>
            </div>
            <div class="schema-field-group">
                <label class="schema-field-label">Name</label>
                <input type="text" class="form-control" id="bc_name_${c}" placeholder="e.g. Home" oninput="smGenerate()">
            </div>
            <div class="schema-field-group">
                <label class="schema-field-label">URL</label>
                <input type="url" class="form-control" id="bc_url_${c}" placeholder="https://example.com/" oninput="smGenerate()">
            </div>`;
        document.getElementById('bc-items').appendChild(div);
        smGenerate();
    };

    window.smAddFaq = function () {
        faqCount++;
        const c = faqCount;
        const div = document.createElement('div');
        div.className = 'repeatable-item';
        div.id = `faq_item_${c}`;
        div.innerHTML = `
            <div class="repeatable-item-header">
                <span class="repeatable-item-label">Question ${c}</span>
                <button type="button" class="remove-item-btn" onclick="smRemove('faq_item_${c}')">&#215;</button>
            </div>
            <div class="schema-field-group">
                <label class="schema-field-label">Question</label>
                <input type="text" class="form-control" id="faq_q_${c}" placeholder="What is…?" oninput="smGenerate()">
            </div>
            <div class="schema-field-group">
                <label class="schema-field-label">Answer</label>
                <textarea class="form-control" id="faq_a_${c}" placeholder="The answer is…" rows="3" oninput="smGenerate()"></textarea>
            </div>`;
        document.getElementById('faq-items').appendChild(div);
        smGenerate();
    };

    window.smAddStep = function () {
        htCount++;
        const c = htCount;
        const div = document.createElement('div');
        div.className = 'repeatable-item';
        div.id = `ht_step_${c}`;
        div.innerHTML = `
            <div class="repeatable-item-header">
                <span class="repeatable-item-label">Step ${c}</span>
                <button type="button" class="remove-item-btn" onclick="smRemove('ht_step_${c}')">&#215;</button>
            </div>
            <div class="schema-field-group">
                <label class="schema-field-label">Step name</label>
                <input type="text" class="form-control" id="ht_sname_${c}" placeholder="e.g. Remove the wheel" oninput="smGenerate()">
            </div>
            <div class="schema-field-group">
                <label class="schema-field-label">Instructions</label>
                <textarea class="form-control" id="ht_stext_${c}" placeholder="Describe this step…" rows="3" oninput="smGenerate()"></textarea>
            </div>
            <div class="schema-field-group">
                <label class="schema-field-label">Image URL</label>
                <input type="url" class="form-control" id="ht_simg_${c}" placeholder="https://example.com/step.jpg" oninput="smGenerate()">
            </div>`;
        document.getElementById('ht-steps').appendChild(div);
        smGenerate();
    };

    window.smAddSocial = function () {
        socCount++;
        const c = socCount;
        const div = document.createElement('div');
        div.className = 'repeatable-item';
        div.id = `soc_item_${c}`;
        div.innerHTML = `
            <div class="repeatable-item-header">
                <span class="repeatable-item-label">Social Profile ${c}</span>
                <button type="button" class="remove-item-btn" onclick="smRemove('soc_item_${c}')">&#215;</button>
            </div>
            <div class="schema-field-group">
                <input type="url" class="form-control" id="org_social_${c}" placeholder="https://facebook.com/acme" oninput="smGenerate()">
            </div>`;
        document.getElementById('org-socials').appendChild(div);
        smGenerate();
    };

    window.smRemove = function (id) {
        const el = document.getElementById(id);
        if (el) { el.remove(); smGenerate(); }
    };

    window.smGenerate = function () {
        const type = typeSelect.value;
        const schema = { '@context': 'https://schema.org' };

        if (type === 'article') {
            schema['@type'] = 'Article';
            const h   = v('art_headline');       if (h)   schema.headline      = h;
            const u   = v('art_url');            if (u)   schema.url           = u;
            const img = v('art_image');          if (img) schema.image         = img;
            const dp  = v('art_datePublished');  if (dp)  schema.datePublished = dp;
            const dm  = v('art_dateModified');   if (dm)  schema.dateModified  = dm;
            const d   = v('art_description');    if (d)   schema.description   = d;
            const an  = v('art_authorName');
            if (an) {
                schema.author = { '@type': 'Person', name: an };
                const au = v('art_authorUrl'); if (au) schema.author.url = au;
            }
            const pn = v('art_publisherName');
            if (pn) {
                schema.publisher = { '@type': 'Organization', name: pn };
                const pl = v('art_publisherLogo');
                if (pl) schema.publisher.logo = { '@type': 'ImageObject', url: pl };
            }
        }

        else if (type === 'breadcrumb') {
            schema['@type'] = 'BreadcrumbList';
            const items = [];
            document.querySelectorAll('[id^="bc_item_"]').forEach((el, i) => {
                const id  = el.id.replace('bc_item_', '');
                const nm  = v(`bc_name_${id}`);
                const url = v(`bc_url_${id}`);
                if (nm || url) {
                    const item = { '@type': 'ListItem', position: i + 1, name: nm || '' };
                    if (url) item.item = url;
                    items.push(item);
                }
            });
            schema.itemListElement = items;
        }

        else if (type === 'event') {
            schema['@type'] = 'Event';
            const n   = v('ev_name');        if (n)   schema.name        = n;
            const d   = v('ev_description'); if (d)   schema.description = d;
            const u   = v('ev_url');         if (u)   schema.url         = u;
            const img = v('ev_image');       if (img) schema.image       = img;
            const sd  = v('ev_startDate');   if (sd)  schema.startDate   = sd;
            const ed  = v('ev_endDate');     if (ed)  schema.endDate     = ed;
            schema.eventStatus = 'https://schema.org/' + (v('ev_status') || 'EventScheduled');
            const modeMap = { offline: 'OfflineEventAttendanceMode', online: 'OnlineEventAttendanceMode', mixed: 'MixedEventAttendanceMode' };
            schema.eventAttendanceMode = 'https://schema.org/' + (modeMap[v('ev_mode')] || 'OfflineEventAttendanceMode');
            const ln = v('ev_locationName'), la = v('ev_address'), lc = v('ev_city'), lco = v('ev_country');
            if (ln || la || lc || lco) {
                schema.location = { '@type': 'Place' };
                if (ln) schema.location.name = ln;
                const addr = { '@type': 'PostalAddress' };
                if (la)  addr.streetAddress   = la;
                if (lc)  addr.addressLocality = lc;
                if (lco) addr.addressCountry  = lco;
                schema.location.address = addr;
            }
            const price = v('ev_price');
            if (price) schema.offers = { '@type': 'Offer', price: price, priceCurrency: v('ev_currency') || 'USD', availability: 'https://schema.org/InStock' };
        }

        else if (type === 'faq') {
            schema['@type'] = 'FAQPage';
            const entities = [];
            document.querySelectorAll('[id^="faq_item_"]').forEach(el => {
                const id = el.id.replace('faq_item_', '');
                const q  = v(`faq_q_${id}`), a = v(`faq_a_${id}`);
                if (q) entities.push({ '@type': 'Question', name: q, acceptedAnswer: { '@type': 'Answer', text: a || '' } });
            });
            schema.mainEntity = entities;
        }

        else if (type === 'howto') {
            schema['@type'] = 'HowTo';
            const n   = v('ht_name');          if (n)    schema.name        = n;
            const d   = v('ht_description');   if (d)    schema.description = d;
            const t   = v('ht_totalTime');     if (t)    schema.totalTime   = t;
            const img = v('ht_image');         if (img)  schema.image       = img;
            const cost = v('ht_estimatedCost');
            if (cost) schema.estimatedCost = { '@type': 'MonetaryAmount', currency: v('ht_currency') || 'USD', value: cost };
            const steps = [];
            document.querySelectorAll('[id^="ht_step_"]').forEach((el, i) => {
                const id = el.id.replace('ht_step_', '');
                const sn = v(`ht_sname_${id}`), st = v(`ht_stext_${id}`), si = v(`ht_simg_${id}`);
                if (sn || st) {
                    const step = { '@type': 'HowToStep', position: i + 1 };
                    if (sn) step.name  = sn;
                    if (st) step.text  = st;
                    if (si) step.image = si;
                    steps.push(step);
                }
            });
            if (steps.length) schema.step = steps;
        }

        else if (type === 'organization') {
            schema['@type'] = 'Organization';
            const n = v('org_name'); if (n) schema.name = n;
            const u = v('org_url');  if (u) schema.url  = u;
            const l = v('org_logo'); if (l) schema.logo = l;
            const c = v('org_contact');
            if (c) schema.contactPoint = { '@type': 'ContactPoint', telephone: c, contactType: 'customer service' };
            const socials = [];
            document.querySelectorAll('[id^="org_social_"]').forEach(el => {
                const val = el.value.trim();
                if (val) socials.push(val);
            });
            if (socials.length) schema.sameAs = socials;
        }

        else if (type === 'local_business') {
            schema['@type'] = 'LocalBusiness';
            const n = v('lb_name');  if (n) schema.name  = n;
            const u = v('lb_url');   if (u) schema.url   = u;
            const img = v('lb_image'); if (img) schema.image = img;
            const p = v('lb_phone'); if (p) schema.telephone = p;
            const pr = v('lb_price'); if (pr) schema.priceRange = pr;
            const d = v('lb_desc');  if (d) schema.description = d;
            
            const street = v('lb_street'), city = v('lb_city'), state = v('lb_state'), zip = v('lb_zip'), country = v('lb_country');
            if (street || city || state || zip || country) {
                schema.address = { '@type': 'PostalAddress' };
                if (street) schema.address.streetAddress = street;
                if (city)   schema.address.addressLocality = city;
                if (state)  schema.address.addressRegion = state;
                if (zip)    schema.address.postalCode = zip;
                if (country) schema.address.addressCountry = country;
            }
            const lat = v('lb_lat'), lng = v('lb_lng');
            if (lat || lng) {
                schema.geo = { '@type': 'GeoCoordinates' };
                if (lat) schema.geo.latitude = lat;
                if (lng) schema.geo.longitude = lng;
            }
        }

        jsonOutput.textContent = JSON.stringify(schema, null, 2);
    };

    function renderSchema(type) {
        bcCount = 0; faqCount = 0; htCount = 0; socCount = 0;
        dynamicFields.innerHTML = templates[type] ? templates[type]() : '';
        if (type === 'breadcrumb') { smAddBc(); smAddBc(); smAddBc(); }
        else if (type === 'faq')   { smAddFaq(); smAddFaq(); }
        else if (type === 'howto') { smAddStep(); smAddStep(); }
        else if (type === 'organization') { smAddSocial(); smAddSocial(); }
        else smGenerate();
    }

    typeSelect.addEventListener('change', () => renderSchema(typeSelect.value));

    function copyToClipboard(text) {
        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        } else {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-9999px";
            textArea.style.top = "0";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            return new Promise((res, rej) => {
                try {
                    const successful = document.execCommand('copy');
                    textArea.remove();
                    successful ? res() : rej();
                } catch (err) {
                    textArea.remove();
                    rej(err);
                }
            });
        }
    }

    copyBtn.addEventListener('click', () => {
        const codeText = jsonOutput.textContent || '';
        const code = codeText;
        copyToClipboard(code).then(() => {
            copyBtn.textContent = 'Copied!';
            copyBtn.classList.add('copied');
            setTimeout(() => {
                copyBtn.textContent = 'Copy Code';
                copyBtn.classList.remove('copied');
            }, 2000);
        }).catch(err => {
            console.error('Copy failed', err);
            copyBtn.textContent = 'Error!';
            setTimeout(() => {
                copyBtn.textContent = 'Copy Code';
            }, 2000);
        });
    });

    validateBtn.addEventListener('click', () => {
        window.open('https://search.google.com/test/rich-results', '_blank');
    });

    renderSchema('article');
})();
</script>