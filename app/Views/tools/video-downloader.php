<!-- ===== VIDEO DOWNLOADER TOOL ===== -->
<style>
    :root {
        --vd-red: #e83a26;
        --vd-dark: #111318;
        --vd-card: #1a1d24;
        --vd-border: rgba(255, 255, 255, .08);
        --vd-muted: #8a8fa8;
        --vd-radius: 16px;
    }

    /* Hero - Moved to style.css */

    /* Pills */
    .vd-platforms {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-bottom: 40px;
    }

    .vd-platform-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid var(--vd-border);
        border-radius: 100px;
        padding: 6px 18px;
        font-size: .82rem;
        color: #ccc;
        cursor: pointer;
        transition: .2s;
        user-select: none;
    }

    .vd-platform-pill:hover,
    .vd-platform-pill.active {
        background: rgba(232, 58, 38, .18);
        border-color: rgba(232, 58, 38, .5);
        color: #fff;
    }

    .vd-platform-pill svg {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    /* Input card */
    .vd-input-card {
        max-width: 780px;
        margin: 0 auto;
        background: rgba(255, 255, 255, .04);
        border: 1px solid var(--vd-border);
        border-radius: var(--vd-radius);
        padding: 28px;
        backdrop-filter: blur(12px);
    }

    .vd-input-row {
        display: flex;
        gap: 10px;
    }

    .vd-url-input {
        flex: 1;
        background: rgba(255, 255, 255, .07);
        border: 1px solid var(--vd-border);
        border-radius: 10px;
        padding: 14px 18px;
        color: #fff;
        font-size: 1rem;
        outline: none;
        transition: .2s;
        margin: 0;
    }

    .vd-url-input:focus {
        border-color: rgba(232, 58, 38, .6);
        background: rgba(255, 255, 255, .1);
        box-shadow: 0 0 0 3px rgba(232, 58, 38, .12);
    }

    .vd-url-input::placeholder {
        color: var(--vd-muted);
    }

    .vd-btn-fetch {
        background: var(--vd-red);
        border: none;
        border-radius: 10px;
        padding: 14px 28px;
        color: #fff;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
        transition: .2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .vd-btn-fetch:hover {
        background: #c8321f;
        transform: translateY(-1px);
    }

    .vd-btn-fetch:disabled {
        opacity: .55;
        cursor: not-allowed;
        transform: none;
    }

    /* Spinner */
    .vd-spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(255, 255, 255, .3);
        border-top-color: #fff;
        border-radius: 50%;
        animation: vd-spin .7s linear infinite;
    }

    @keyframes vd-spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Result */
    #vd-result {
        margin-top: 24px;
        display: none;
    }

    /* Platform badge */
    .vd-detected {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 14px;
        font-size: .85rem;
        color: var(--vd-muted);
    }

    .vd-detected strong {
        color: #fff;
    }

    /* Video meta */
    .vd-video-meta {
        display: flex;
        gap: 18px;
        align-items: flex-start;
        background: rgba(255, 255, 255, .03);
        border: 1px solid var(--vd-border);
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 18px;
    }

    .vd-thumb {
        width: 140px;
        height: 88px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
        background: #222;
    }

    .vd-meta-info h4 {
        color: #fff;
        font-size: .95rem;
        font-weight: 600;
        margin: 0 0 6px;
        line-height: 1.4;
    }

    .vd-meta-info p {
        color: var(--vd-muted);
        font-size: .8rem;
        margin: 2px 0;
    }

    /* Quality grid */
    .vd-quality-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 12px;
    }

    .vd-quality-card {
        background: rgba(255, 255, 255, .05);
        border: 1px solid var(--vd-border);
        border-radius: 12px;
        padding: 14px 16px;
        display: flex;
        flex-direction: column;
        gap: 6px;
        transition: .2s;
    }

    .vd-quality-card:hover {
        border-color: rgba(232, 58, 38, .5);
        background: rgba(232, 58, 38, .08);
        transform: translateY(-2px);
    }

    .vd-quality-label {
        font-size: .85rem;
        color: #fff;
        font-weight: 700;
    }

    .vd-quality-sub {
        font-size: .75rem;
        color: var(--vd-muted);
    }

    /* Animated Download Button */
    .vd-dl-btn {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        margin-top: 10px;
        background: linear-gradient(135deg, #e83a26 0%, #c0271a 100%);
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px 16px;
        font-size: .82rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        width: 100%;
        box-sizing: border-box;
        overflow: hidden;
        transition: transform .15s, box-shadow .15s, background .2s;
        box-shadow: 0 3px 12px rgba(232, 58, 38, .35);
        letter-spacing: .3px;
    }

    /* Shine sweep on hover */
    .vd-dl-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -75%;
        width: 50%;
        height: 100%;
        background: linear-gradient(120deg, transparent 30%, rgba(255, 255, 255, .22) 50%, transparent 70%);
        transition: left .4s;
        pointer-events: none;
    }

    .vd-dl-btn:hover::before {
        left: 130%;
    }

    .vd-dl-btn:hover {
        background: linear-gradient(135deg, #f04433 0%, #d42d1e 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(232, 58, 38, .45);
        color: #fff;
        text-decoration: none;
    }

    .vd-dl-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(232, 58, 38, .3);
    }

    /* Inner progress fill */
    .vd-dl-btn .vd-btn-fill {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 0%;
        background: rgba(255, 255, 255, .16);
        transition: width .25s ease;
        pointer-events: none;
        border-radius: 10px;
    }

    .vd-dl-btn .vd-btn-icon {
        font-size: 1rem;
        flex-shrink: 0;
    }

    .vd-dl-btn .vd-btn-text {
        position: relative;
        z-index: 1;
    }

    /* Downloading state */
    .vd-dl-btn.downloading {
        background: linear-gradient(135deg, #1e2028 0%, #2a2d38 100%);
        border: 1px solid rgba(232, 58, 38, .4);
        box-shadow: none;
        cursor: default;
        transform: none;
    }

    .vd-dl-btn.downloading:hover {
        transform: none;
        box-shadow: none;
    }

    .vd-dl-btn.downloading .vd-btn-icon {
        animation: vd-spin .7s linear infinite;
    }

    /* Done state */
    .vd-dl-btn.done {
        background: linear-gradient(135deg, #1a7a44 0%, #146034 100%);
        box-shadow: 0 4px 14px rgba(26, 122, 68, .4);
    }

    .vd-dl-btn.done:hover {
        transform: translateY(-1px);
    }

    /* Video preview */
    .vd-direct-video {
        width: 100%;
        max-height: 300px;
        border-radius: 12px;
        margin-bottom: 14px;
        outline: none;
    }

    /* Notices */
    .vd-notice {
        padding: 14px 18px;
        border-radius: 10px;
        font-size: .88rem;
        margin-top: 12px;
        line-height: 1.6;
    }

    .vd-notice.error {
        background: rgba(232, 58, 38, .12);
        border: 1px solid rgba(232, 58, 38, .35);
        color: #ff8a7a;
    }

    .vd-notice.info {
        background: rgba(100, 150, 255, .1);
        border: 1px solid rgba(100, 150, 255, .3);
        color: #aac4ff;
    }

    .vd-notice.warn {
        background: rgba(255, 180, 0, .1);
        border: 1px solid rgba(255, 180, 0, .3);
        color: #ffdc80;
    }

    .vd-notice.success {
        background: rgba(60, 200, 100, .1);
        border: 1px solid rgba(60, 200, 100, .35);
        color: #7feaab;
    }

    /* Section titles */
    .vd-section-title {
        text-align: center;
        margin-bottom: 48px;
    }

    .vd-section-title h2 {
        font-size: clamp(1.6rem, 4vw, 2.2rem);
        font-weight: 800;
        margin-bottom: 12px;
    }

    .vd-section-title p {
        color: #666;
        font-size: 1rem;
    }

    /* Steps */
    .vd-how {
        background: #f9f9fc;
        padding: 70px 0;
    }

    .vd-steps {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 28px;
    }

    .vd-step {
        text-align: center;
        padding: 32px 24px;
        background: #fff;
        border-radius: var(--vd-radius);
        box-shadow: 0 4px 24px rgba(0, 0, 0, .07);
        transition: .2s;
    }

    .vd-step:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, .12);
    }

    .vd-step-num {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--vd-red);
        color: #fff;
        font-size: 1.3rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
    }

    .vd-step h4 {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .vd-step p {
        font-size: .88rem;
        color: #666;
        margin: 0;
    }

    /* Features */
    .vd-features {
        padding: 70px 0;
    }

    .vd-feat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 24px;
    }

    .vd-feat-card {
        background: #fff;
        border: 1px solid #ebebeb;
        border-radius: var(--vd-radius);
        padding: 28px 24px;
        transition: .2s;
    }

    .vd-feat-card:hover {
        border-color: var(--vd-red);
        transform: translateY(-3px);
        box-shadow: 0 8px 32px rgba(232, 58, 38, .1);
    }

    .vd-feat-icon {
        font-size: 2rem;
        margin-bottom: 12px;
    }

    .vd-feat-card h4 {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .vd-feat-card p {
        font-size: .88rem;
        color: #666;
        margin: 0;
    }

    /* Platforms showcase */
    .vd-platforms-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #0d0f14 0%, #1a1220 100%);
    }

    .vd-plat-showcase {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 36px;
    }

    .vd-plat-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, .05);
        border: 1px solid var(--vd-border);
        border-radius: var(--vd-radius);
        padding: 24px 28px;
        min-width: 120px;
        transition: .2s;
    }

    .vd-plat-item:hover {
        border-color: rgba(232, 58, 38, .5);
        background: rgba(232, 58, 38, .08);
        transform: translateY(-3px);
    }

    .vd-plat-item svg {
        width: 40px;
        height: 40px;
    }

    .vd-plat-item span {
        color: #ccc;
        font-size: .85rem;
        font-weight: 600;
    }

    /* FAQ */
    .vd-faq {
        padding: 70px 0;
        background: #f9f9fc;
    }

    /* Disclaimer */
    .vd-disclaimer {
        padding: 40px 0;
        text-align: center;
        background: #fff3f3;
        border-top: 3px solid var(--vd-red);
    }

    .vd-disclaimer p {
        max-width: 720px;
        margin: 0 auto;
        font-size: .88rem;
        color: #555;
        line-height: 1.7;
    }

    .vd-disclaimer strong {
        color: var(--vd-red);
    }

    @media(max-width:600px) {
        .vd-input-row {
            flex-direction: column;
        }

        .vd-video-meta {
            flex-direction: column;
        }

        .vd-thumb {
            width: 100%;
            height: 180px;
        }
    }

    @media(max-width:768px) {
        .vd-steps {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<!-- HERO -->
<section class="tools-hero-section">
    <div class="tools-glow-blob-1"></div>
    <div class="tools-glow-blob-2"></div>
    <div class="tools-grid-overlay"></div>
    <div class="container position-relative z-1">
        <h1>Downloader for <br><span>Social Videos</span></h1>
        <p>Save your favorite videos from YouTube, Instagram, Facebook, and Twitter instantly with zero registration.</p>

        <div class="vd-platforms">
            <span class="vd-platform-pill active" data-platform="all">🌐 All Platforms</span>
            <span class="vd-platform-pill" data-platform="youtube">
                <svg viewBox="0 0 24 24" fill="#FF0000">
                    <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31.3 31.3 0 0 0 0 12a31.3 31.3 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1C4.5 20.4 12 20.4 12 20.4s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31.3 31.3 0 0 0 24 12a31.3 31.3 0 0 0-.5-5.8zM9.8 15.6V8.4l6.3 3.6-6.3 3.6z" />
                </svg>
                YouTube
            </span>
            <span class="vd-platform-pill" data-platform="instagram">
                <svg viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="ig1" x1="0%" y1="100%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:#f09433" />
                            <stop offset="50%" style="stop-color:#dc2743" />
                            <stop offset="100%" style="stop-color:#bc1888" />
                        </linearGradient>
                    </defs>
                    <path fill="url(#ig1)" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                </svg>
                Instagram
            </span>
            <span class="vd-platform-pill" data-platform="facebook">
                <svg viewBox="0 0 24 24" fill="#1877F2">
                    <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.886v2.268h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
                </svg>
                Facebook
            </span>
            <span class="vd-platform-pill" data-platform="direct">🔗 Direct Link</span>
        </div>

        <div class="vd-input-card">
            <div class="vd-input-row">
                <input type="url" id="vd-url" class="vd-url-input" placeholder="Paste video URL here… YouTube, Instagram, Facebook or direct .mp4 link">
                <button id="vd-fetch-btn" class="vd-btn-fetch">
                    <span id="vd-btn-label">⬇ Get Video</span>
                    <div class="vd-spinner" id="vd-spinner"></div>
                </button>
            </div>
            <div id="vd-result"></div>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="vd-how">
    <div class="container">
        <div class="vd-section-title">
            <h2>How to Download Videos</h2>
            <p>Three simple steps — no app, no registration, no redirects.</p>
        </div>
        <div class="vd-steps">
            <div class="vd-step">
                <div class="vd-step-num">1</div>
                <h4>Copy the Video URL</h4>
                <p>Open the video on YouTube, Instagram or Facebook and copy the URL from your browser address bar.</p>
            </div>
            <div class="vd-step">
                <div class="vd-step-num">2</div>
                <h4>Paste & Click Get Video</h4>
                <p>Paste the URL above and click <strong>Get Video</strong> — our server will fetch the available qualities.</p>
            </div>
            <div class="vd-step">
                <div class="vd-step-num">3</div>
                <h4>Choose Your Quality</h4>
                <p>Pick resolution (1080p, 720p, 480p…) or MP3 audio and click the Download button.</p>
            </div>
            <div class="vd-step">
                <div class="vd-step-num">4</div>
                <h4>File Saved Directly</h4>
                <p>The video downloads straight to your device — no pop-ups, no redirection to other websites.</p>
            </div>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="vd-features">
    <div class="container">
        <div class="vd-section-title">
            <h2>Why Use Our Video Downloader?</h2>
            <p>Fast, free and 100% self-hosted — every download stays on your screen.</p>
        </div>
        <div class="vd-feat-grid">
            <div class="vd-feat-card">
                <div class="vd-feat-icon">⚡</div>
                <h4>Lightning Fast</h4>
                <p>Our server fetches the video link in seconds and streams it directly to your device.</p>
            </div>
            <div class="vd-feat-card">
                <div class="vd-feat-icon">🚫</div>
                <h4>Zero Redirects</h4>
                <p>No third-party sites, no pop-ups. Every download happens right here on this page.</p>
            </div>
            <div class="vd-feat-card">
                <div class="vd-feat-icon">🖥️</div>
                <h4>Multiple Resolutions</h4>
                <p>1080p, 720p, 480p, 360p and audio-only — pick the quality that suits your needs.</p>
            </div>
            <div class="vd-feat-card">
                <div class="vd-feat-icon">🔒</div>
                <h4>100% Private</h4>
                <p>We never log URLs or store any video data. Requests are ephemeral and discarded instantly.</p>
            </div>
            <div class="vd-feat-card">
                <div class="vd-feat-icon">📱</div>
                <h4>Works on Any Device</h4>
                <p>Mobile, tablet or desktop — no app or browser extension required.</p>
            </div>
            <div class="vd-feat-card">
                <div class="vd-feat-icon">🆓</div>
                <h4>Completely Free</h4>
                <p>No subscriptions, no limits. Use it as many times as you need, forever free.</p>
            </div>
        </div>
    </div>
</section>

<!-- PLATFORMS SHOWCASE -->
<section class="vd-platforms-section">
    <div class="container">
        <div class="vd-section-title">
            <h2 style="color:#fff;">Supported Platforms</h2>
            <p style="color:#aaa;">Download videos from all your favourite social networks.</p>
        </div>
        <div class="vd-plat-showcase">
            <div class="vd-plat-item">
                <svg viewBox="0 0 24 24" fill="#FF0000">
                    <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31.3 31.3 0 0 0 0 12a31.3 31.3 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1C4.5 20.4 12 20.4 12 20.4s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31.3 31.3 0 0 0 24 12a31.3 31.3 0 0 0-.5-5.8zM9.8 15.6V8.4l6.3 3.6-6.3 3.6z" />
                </svg>
                <span>YouTube</span>
            </div>
            <div class="vd-plat-item">
                <svg viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="ig2" x1="0%" y1="100%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:#f09433" />
                            <stop offset="50%" style="stop-color:#dc2743" />
                            <stop offset="100%" style="stop-color:#bc1888" />
                        </linearGradient>
                    </defs>
                    <path fill="url(#ig2)" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                </svg>
                <span>Instagram</span>
            </div>
            <div class="vd-plat-item">
                <svg viewBox="0 0 24 24" fill="#1877F2">
                    <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.886v2.268h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
                </svg>
                <span>Facebook</span>
            </div>
            <div class="vd-plat-item">
                <svg viewBox="0 0 24 24" fill="#6ec6f5">
                    <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z" />
                </svg>
                <span>Direct Link</span>
            </div>
            <div class="vd-plat-item" style="opacity:.5;">
                <svg viewBox="0 0 24 24" fill="#fff">
                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34l-.03-8.47a8.27 8.27 0 0 0 4.83 1.54V5.01a4.85 4.85 0 0 1-1.03-.32z" />
                </svg>
                <span>TikTok <small style="font-size:.65rem;display:block;color:#888;">Soon</small></span>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="vd-faq">
    <div class="container">
        <div class="vd-section-title">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="accordion" id="vdAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#vdfc1">Is this video downloader free to use?</button></h2>
                <div id="vdfc1" class="accordion-collapse collapse show" data-bs-parent="#vdAccordion">
                    <div class="accordion-body">Yes, 100% free. No account required, no hidden fees and no download limits. Just paste, click, and save.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vdfc2">Which platforms are supported?</button></h2>
                <div id="vdfc2" class="accordion-collapse collapse" data-bs-parent="#vdAccordion">
                    <div class="accordion-body">Currently the tool supports <strong>YouTube</strong>, <strong>Instagram</strong> (Reels, posts), <strong>Facebook</strong> (public videos), and any <strong>direct MP4 / WebM video URL</strong>. TikTok support is coming soon.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vdfc3">Do downloads redirect to other websites?</button></h2>
                <div id="vdfc3" class="accordion-collapse collapse" data-bs-parent="#vdAccordion">
                    <div class="accordion-body">No. All downloads are handled directly by our server. The file streams straight to your device without any redirects or third-party sites.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vdfc4">Is it safe and private?</button></h2>
                <div id="vdfc4" class="accordion-collapse collapse" data-bs-parent="#vdAccordion">
                    <div class="accordion-body">Absolutely. We do not store your URLs, we do not log your downloads, and no personal data is collected. All server-side requests are ephemeral and discarded immediately after processing.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vdfc5">Why can't I download private or age-restricted videos?</button></h2>
                <div id="vdfc5" class="accordion-collapse collapse" data-bs-parent="#vdAccordion">
                    <div class="accordion-body">Private, members-only, age-restricted, or DRM-protected videos require authentication. Only publicly available videos are supported.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DISCLAIMER -->
<div class="vd-disclaimer">
    <div class="container">
        <p><strong>⚠️ Disclaimer:</strong> This tool is for <strong>personal, educational, and offline use only</strong>. Redistributing or commercially using downloaded content without permission may violate copyright law and platform terms of service. BrandStory is not responsible for misuse.</p>
    </div>
</div>

<!-- JAVASCRIPT -->
<script>
    (function() {
        'use strict';

        var FETCH_API = '<?= base_url("tools/video-downloader/fetch") ?>';
        var PROXY_API = '<?= base_url("tools/video-downloader/proxy") ?>';

        var urlInput = document.getElementById('vd-url');
        var fetchBtn = document.getElementById('vd-fetch-btn');
        var btnLabel = document.getElementById('vd-btn-label');
        var spinner = document.getElementById('vd-spinner');
        var resultEl = document.getElementById('vd-result');

        /* ── Helpers ─────────────────────────────────── */
        function setLoading(on) {
            fetchBtn.disabled = on;
            spinner.style.display = on ? 'block' : 'none';
            btnLabel.textContent = on ? 'Fetching…' : '⬇ Get Video';
        }

        function esc(str) {
            var d = document.createElement('div');
            d.appendChild(document.createTextNode(str));
            return d.innerHTML;
        }

        function platformBadge(platform) {
            var map = {
                youtube: ['▶️', 'YouTube', '#FF0000'],
                instagram: ['📸', 'Instagram', '#e1306c'],
                facebook: ['📘', 'Facebook', '#1877F2'],
                direct: ['🔗', 'Direct Link', '#6ec6f5'],
                unknown: ['🌐', 'Video', '#aaa']
            };
            var b = map[platform] || map.unknown;
            return '<div class="vd-detected"><span>' + b[0] + '</span><span>Detected: <strong style="color:' + b[2] + '">' + b[1] + '</strong></span></div>';
        }

        function showError(msg) {
            resultEl.style.display = 'block';
            resultEl.innerHTML = '<div class="vd-notice error">❌ ' + esc(msg) + '</div>';
        }

        /* ── Build download button with animated progress ────────────── */
        function dlBtn(streamUrl, label, filename, audioUrl) {
            var proxyHref = PROXY_API +
                '?url=' + encodeURIComponent(streamUrl) +
                '&filename=' + encodeURIComponent(filename);
            if (audioUrl) proxyHref += '&audio_url=' + encodeURIComponent(audioUrl);

            var isMerged = !!audioUrl;
            var html = '<button class="vd-dl-btn" data-label="Download ' + esc(label) + '" onclick="vdStartDownload(this,' +
                '\'' + encodeURIComponent(proxyHref) + '\',' +
                '\'' + encodeURIComponent(filename) + '\',' +
                (isMerged ? 'true' : 'false') + ')">' +
                '<span class="vd-btn-fill"></span>' +
                '<span class="vd-btn-icon">⬇</span>' +
                '<span class="vd-btn-text">Download ' + esc(label) + '</span>' +
                '</button>';
            return html;
        }

        /* ── Animated download handler ─────────────────────── */
        window.vdStartDownload = function(btn, encodedUrl, encodedFilename, isMerged) {
            if (btn.classList.contains('downloading') || btn.classList.contains('done')) return;
            var url = decodeURIComponent(encodedUrl);
            var filename = decodeURIComponent(encodedFilename);
            var fill = btn.querySelector('.vd-btn-fill');
            var icon = btn.querySelector('.vd-btn-icon');
            var text = btn.querySelector('.vd-btn-text');

            // Trigger the actual download IMMEDIATELY (browsers block delayed clicks)
            var a = document.createElement('a');
            a.href = url;
            a.download = filename;
            a.style.display = 'none';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            btn.classList.add('downloading');
            icon.textContent = '⏳';
            text.textContent = 'Preparing… 0%';

            var pct = 0;
            var interval = setInterval(function() {
                if (pct < 85) {
                    pct += Math.random() * (isMerged ? 1.5 : 3);
                    if (pct > 85) pct = 85;
                    fill.style.width = pct.toFixed(1) + '%';
                    text.textContent = 'Downloading… ' + Math.round(pct) + '%';
                }
            }, isMerged ? 200 : 100);

            // Snappier feedback: Transition to completion state
            var completionDelay = isMerged ? 3000 : 1500; 
            setTimeout(function() {
                clearInterval(interval);
                fill.style.width = '100%';
                icon.textContent = '✅';
                text.textContent = 'Download Completed!';
                btn.classList.remove('downloading');
                btn.classList.add('done');

                setTimeout(function() {
                    fill.style.width = '0%';
                    icon.textContent = '⬇';
                    text.textContent = btn.getAttribute('data-label') || 'Download';
                    btn.classList.remove('done');
                }, 3000);
            }, completionDelay);
        };

        /* ── Auto-activate platform pill tab ────────────────────── */
        function activatePlatformPill(platform) {
            document.querySelectorAll('.vd-platform-pill').forEach(function(p) {
                p.classList.remove('active');
                if (p.dataset.platform === platform) p.classList.add('active');
            });
        }

        /* ── Render quality cards ───────────────────── */
        function renderCards(formats, thumb, title, platform) {
            activatePlatformPill(platform);
            var thumbHtml = thumb ?
                '<img src="' + esc(thumb) + '" class="vd-thumb" alt="Thumbnail" onerror="this.style.display=\'none\'">' :
                '<div class="vd-thumb" style="display:flex;align-items:center;justify-content:center;font-size:2rem;">🎬</div>';

            var cards = formats.map(function(f) {
                var fn = (title || 'video').replace(/[^a-z0-9]/gi, '_').substring(0, 40) + '_' + f.label + '.' + f.ext;
                return '<div class="vd-quality-card">' +
                    '<div class="vd-quality-label">' + esc(f.label) + '</div>' +
                    '<div class="vd-quality-sub">' + esc(f.sub) + '</div>' +
                    dlBtn(f.url, f.label, fn, f.audio_url || null) +
                    '</div>';
            }).join('');

            resultEl.style.display = 'block';
            resultEl.innerHTML = platformBadge(platform) +
                '<div class="vd-video-meta">' +
                thumbHtml +
                '<div class="vd-meta-info">' +
                '<h4>' + esc(title || 'Video') + '</h4>' +
                '<p>' + formats.length + ' format' + (formats.length !== 1 ? 's' : '') + ' available</p>' +
                '</div>' +
                '</div>' +
                '<div style="margin-bottom:12px;"><strong style="color:#fff;font-size:.9rem;">Choose Quality:</strong></div>' +
                '<div class="vd-quality-grid">' + cards + '</div>' +
                '<div class="vd-notice success" style="margin-top:14px;">✅ Ready to download — click any button above. Files save directly to your device.</div>';
        }

        /* ── Direct .mp4/.webm links ───────────────────────────── */
        function handleDirect(url) {
            activatePlatformPill('direct');
            var ext = (url.match(/\.(mp4|webm|ogg|mov|mkv)(\?.*)?$/i) || ['', 'mp4'])[1].toLowerCase();
            var fn = 'video.' + ext;
            var formats = [{
                label: 'Original',
                sub: ext.toUpperCase() + ' · Direct',
                url: url,
                ext: ext
            }];
            renderCards(formats, null, 'Direct Video', 'direct');
        }

        /* ── POST to server, get back JSON ─────────────*/
        function fetchFromServer(url) {
            var fd = new FormData();
            fd.append('url', url);

            fetch(FETCH_API, {
                    method: 'POST',
                    body: fd
                })
                .then(function(r) {
                    return r.json();
                })
                .then(function(data) {
                    setLoading(false);
                    if (data.error) {
                        showError(data.error);
                        return;
                    }
                    if (!data.formats || !data.formats.length) {
                        showError('No downloadable formats were found for this URL.');
                        return;
                    }
                    renderCards(data.formats, data.thumb || null, data.title || '', data.platform || 'unknown');
                })
                .catch(function(e) {
                    setLoading(false);
                    showError('Network error — please check your connection and try again.');
                });
        }

        /* ── Main handler ───────────────────────────── */
        function handleFetch() {
            var url = urlInput.value.trim();
            if (!url) {
                showError('Please paste a video URL first.');
                return;
            }
            if (!/^https?:\/\//i.test(url)) {
                showError('URL must start with http:// or https://');
                return;
            }

            resultEl.style.display = 'none';
            resultEl.innerHTML = '';
            setLoading(true);

            // Direct video file — handle client-side immediately
            if (/\.(mp4|webm|ogg|mov|mkv)(\?.*)?$/i.test(url)) {
                setTimeout(function() {
                    setLoading(false);
                    handleDirect(url);
                }, 300);
                return;
            }

            // All other platforms → server fetch
            fetchFromServer(url);
        }

        fetchBtn.addEventListener('click', handleFetch);
        urlInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') handleFetch();
        });

        /* ── Platform pill hints ────────────────────── */
        var placeholders = {
            youtube: 'Paste YouTube URL… e.g. https://www.youtube.com/watch?v=…',
            instagram: 'Paste Instagram URL… e.g. https://www.instagram.com/reel/…',
            facebook: 'Paste Facebook video URL… e.g. https://www.facebook.com/watch/?v=…',
            direct: 'Paste direct video URL… e.g. https://example.com/video.mp4',
            all: 'Paste video URL here… YouTube, Instagram, Facebook or direct .mp4 link'
        };
        document.querySelectorAll('.vd-platform-pill').forEach(function(pill) {
            pill.addEventListener('click', function() {
                document.querySelectorAll('.vd-platform-pill').forEach(function(p) {
                    p.classList.remove('active');
                });
                this.classList.add('active');
                urlInput.placeholder = placeholders[this.dataset.platform] || placeholders.all;
            });
        });
    })();
</script>