<style>
    /* Scoped Styles for XML Sitemap Generator */
    :root {
        --sm-primary: #e83a26;
        --sm-primary-hover: #d22d1b;
        --sm-primary-glow: rgba(232, 58, 38, 0.25);
        --sm-dark-bg: #0b0d11;
        --sm-card-bg: rgba(18, 21, 28, 0.85);
        --sm-border: rgba(255, 255, 255, 0.09);
        --sm-text-muted: rgba(255, 255, 255, 0.65);
    }

    /* Hero Section */
    .sitemap-hero {
        background-color: var(--sm-dark-bg);
        background-image:
            radial-gradient(circle at 85% 10%, rgba(232, 58, 38, 0.12) 0%, transparent 45%),
            radial-gradient(circle at 15% 90%, rgba(0, 180, 255, 0.06) 0%, transparent 45%);
        padding: 90px 0 85px;
        position: relative;
        overflow: hidden;
    }

    .sitemap-hero-title {
        font-size: 44px;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: -1.2px;
        line-height: 1.2;
        margin-bottom: 14px;
    }

    .sitemap-hero-title span {
        color: var(--sm-primary);
    }

    .sitemap-hero-desc {
        color: var(--sm-text-muted);
        font-size: 17px;
        max-width: 720px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }

    /* Left & Right Dashboard Cards */
    .sm-panel-card {
        background: var(--sm-card-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--sm-border);
        border-radius: 24px;
        padding: 32px;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.6);
        transition: border-color 0.3s ease;
    }

    .sm-panel-card:hover {
        border-color: rgba(255, 255, 255, 0.16);
    }

    .sm-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding-bottom: 18px;
        margin-bottom: 24px;
    }

    .sm-panel-title {
        font-size: 17px;
        font-weight: 700;
        color: #ffffff;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sm-panel-title i {
        color: var(--sm-primary);
        font-size: 20px;
    }

    .sm-status-indicator {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 100px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-standby {
        background: rgba(255, 255, 255, 0.06);
        color: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .status-crawling {
        background: rgba(40, 167, 69, 0.15);
        color: #4ade80;
        border: 1px solid rgba(40, 167, 69, 0.35);
        animation: pulseStatus 2s infinite ease-in-out;
    }

    .status-completed {
        background: rgba(232, 58, 38, 0.15);
        color: #ff6b5b;
        border: 1px solid rgba(232, 58, 38, 0.35);
    }

    @keyframes pulseStatus {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.85; transform: scale(1.02); }
    }

    /* Left Box Form Elements */
    .sitemap-label {
        font-size: 13px;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.85);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .sitemap-input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .sitemap-input-wrapper i.input-icon {
        position: absolute;
        left: 16px;
        color: rgba(255, 255, 255, 0.4);
        font-size: 18px;
        pointer-events: none;
    }

    .sitemap-input {
        width: 100%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: #ffffff;
        padding: 14px 18px 14px 44px;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.25s ease;
        outline: none;
    }

    .sitemap-input:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--sm-primary);
        box-shadow: 0 0 0 4px var(--sm-primary-glow);
        color: #ffffff;
    }

    .sitemap-select {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: #ffffff;
        padding: 13px 16px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        outline: none;
        width: 100%;
    }

    .sitemap-select option {
        background-color: #171a22;
        color: #ffffff;
    }

    .sitemap-select:focus {
        border-color: var(--sm-primary);
        box-shadow: 0 0 0 3px var(--sm-primary-glow);
        background-color: rgba(255, 255, 255, 0.08);
    }

    .sm-checkbox-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.7);
        font-size: 13px;
        cursor: pointer;
        user-select: none;
    }

    .sm-checkbox-item input[type="checkbox"] {
        accent-color: var(--sm-primary);
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .sitemap-btn-submit {
        background: var(--sm-primary);
        color: #ffffff;
        font-weight: 700;
        font-size: 15px;
        border: none;
        padding: 15px 24px;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 10px 25px -5px rgba(232, 58, 38, 0.4);
        width: 100%;
        margin-top: 10px;
    }

    .sitemap-btn-submit:hover:not(:disabled) {
        background: var(--sm-primary-hover);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px -5px rgba(232, 58, 38, 0.55);
    }

    .sitemap-btn-submit:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Right Box: Live Crawling Status & Circular Meter */
    .crawler-meta-info {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 14px;
        padding: 14px 18px;
        margin-bottom: 24px;
    }

    .crawler-meta-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        margin-bottom: 6px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .crawler-meta-row:last-child {
        margin-bottom: 0;
    }

    .crawler-meta-label {
        color: rgba(255, 255, 255, 0.6);
        font-size: 13px;
        font-weight: 500;
        flex-shrink: 0;
    }

    .crawler-meta-val {
        color: #ffffff;
        font-weight: 600;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .crawler-meta-path {
        color: #38bdf8;
        font-family: 'SFMono-Regular', Consolas, Menlo, monospace;
        font-size: 13px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Circular Progress Display */
    .sm-meter-wrapper {
        position: relative;
        width: 220px;
        height: 220px;
        margin: 10px auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sm-meter-svg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
    }

    .sm-meter-bg-circle {
        fill: none;
        stroke: rgba(255, 255, 255, 0.08);
        stroke-width: 12;
    }

    .sm-meter-progress-circle {
        fill: none;
        stroke: #10b981;
        stroke-width: 12;
        stroke-linecap: round;
        stroke-dasharray: 596.9; /* 2 * PI * 95 */
        stroke-dashoffset: 596.9;
        transition: stroke-dashoffset 0.4s ease, stroke 0.3s ease;
    }

    .sm-meter-inner {
        text-align: center;
        z-index: 2;
    }

    .sm-meter-count {
        font-size: 44px;
        font-weight: 800;
        color: #ffffff;
        line-height: 1;
        letter-spacing: -1px;
    }

    .sm-meter-sublabel {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        color: rgba(255, 255, 255, 0.55);
        margin-top: 6px;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .sm-meter-breakdown {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        padding-top: 8px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sm-breakdown-col {
        text-align: center;
    }

    .sm-breakdown-label {
        font-size: 10px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.5);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        display: block;
    }

    .sm-breakdown-val {
        font-size: 18px;
        font-weight: 800;
        line-height: 1.2;
    }

    .sm-breakdown-divider {
        width: 1px;
        height: 24px;
        background: rgba(255, 255, 255, 0.15);
    }

    .sm-time-remaining {
        text-align: center;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.65);
        margin-bottom: 18px;
    }

    .sm-time-remaining strong {
        color: #ffffff;
    }

    .sm-btn-cancel {
        background: rgba(255, 255, 255, 0.08);
        color: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.15);
        font-size: 13px;
        font-weight: 600;
        padding: 9px 24px;
        border-radius: 10px;
        transition: all 0.2s ease;
        margin: 0 auto;
        display: block;
        cursor: pointer;
    }

    .sm-btn-cancel:hover {
        background: rgba(232, 58, 38, 0.18);
        border-color: rgba(232, 58, 38, 0.4);
        color: #ff7e70;
    }

    /* Live Feed Ticker */
    .sm-live-feed {
        margin-top: 20px;
        background: #07090d;
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 12px;
        padding: 12px 14px;
        font-family: 'SFMono-Regular', Consolas, Menlo, monospace;
        font-size: 12px;
        max-height: 95px;
        overflow-y: hidden;
    }

    .sm-feed-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.75);
        padding: 2px 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .sm-feed-item span.code {
        color: #4ade80;
        font-weight: 700;
        font-size: 11px;
    }

    /* Standby Idle State */
    .sm-idle-view {
        text-align: center;
        padding: 40px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 380px;
    }

    .sm-idle-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(232, 58, 38, 0.1);
        border: 1px dashed rgba(232, 58, 38, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
        color: var(--sm-primary);
        margin-bottom: 20px;
        animation: floatIcon 3s infinite ease-in-out;
    }

    @keyframes floatIcon {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }

    .sm-idle-title {
        font-size: 19px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 8px;
    }

    .sm-idle-desc {
        color: rgba(255, 255, 255, 0.55);
        font-size: 14px;
        max-width: 380px;
        line-height: 1.5;
        margin: 0 auto;
    }

    /* Completed Results View */
    .sm-completed-view {
        display: none;
        flex-direction: column;
    }

    .sm-success-ribbon {
        background: rgba(40, 167, 69, 0.15);
        border: 1px solid rgba(40, 167, 69, 0.35);
        border-radius: 12px;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .sm-success-ribbon span {
        font-size: 14px;
        font-weight: 700;
        color: #4ade80;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sm-code-preview {
        background: #06070a;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 16px;
        max-height: 220px;
        overflow-y: auto;
        font-family: 'SFMono-Regular', Consolas, Menlo, monospace;
        font-size: 12px;
        line-height: 1.6;
        color: #94a3b8;
        white-space: pre;
        margin-bottom: 20px;
    }

    .sm-code-preview::-webkit-scrollbar {
        width: 6px;
    }
    .sm-code-preview::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 4px;
    }

    .sm-action-btn-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .sm-action-btn {
        padding: 13px 18px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s ease;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .sm-btn-copy {
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }
    .sm-btn-copy:hover {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
    }

    .sm-btn-download {
        background: #10b981;
        color: #ffffff;
    }
    .sm-btn-download:hover {
        background: #059669;
        color: #ffffff;
        transform: translateY(-2px);
    }

    /* Content Sections Below Hero */
    .sm-section {
        padding: 85px 0;
    }

    .sm-section-title {
        font-size: 34px;
        font-weight: 800;
        color: #111318;
        letter-spacing: -0.8px;
        margin-bottom: 14px;
    }

    .sm-section-subtitle {
        color: #64748b;
        font-size: 16px;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .sm-feature-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 20px;
        padding: 32px 28px;
        height: 100%;
        transition: all 0.3s ease;
    }

    .sm-feature-card:hover {
        transform: translateY(-4px);
        border-color: rgba(232, 58, 38, 0.3);
        box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.08);
    }

    .sm-feature-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: rgba(232, 58, 38, 0.1);
        color: var(--sm-primary);
        margin-bottom: 20px;
    }

    .sm-section-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        background: rgba(232, 58, 38, 0.08);
        color: var(--sm-primary);
        border: 1px solid rgba(232, 58, 38, 0.2);
        border-radius: 100px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 14px;
    }

    .sm-compare-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 32px 28px;
        height: 100%;
        transition: all 0.3s ease;
        position: relative;
    }

    .sm-compare-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 32px -8px rgba(0, 0, 0, 0.08);
        border-color: #cbd5e1;
    }

    .sm-compare-card.highlight {
        border-color: var(--sm-primary);
        box-shadow: 0 16px 36px -8px rgba(232, 58, 38, 0.16);
    }

    .sm-compare-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
    }

    .sm-compare-badge.primary {
        background: rgba(232, 58, 38, 0.1);
        color: var(--sm-primary);
    }

    .sm-compare-badge.secondary {
        background: #f1f5f9;
        color: #475569;
    }

    .sm-compare-badge.info {
        background: rgba(2, 132, 199, 0.1);
        color: #0284c7;
    }

    .sm-compare-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .sm-compare-list li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        color: #475569;
        line-height: 1.5;
        padding-bottom: 12px;
        border-bottom: 1px dashed #f1f5f9;
    }

    .sm-compare-list li:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .sm-compare-list li i {
        font-size: 18px;
        flex-shrink: 0;
        margin-top: 1px;
    }

    /* Tag Anatomy Cards */
    .sm-tag-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 26px 24px;
        height: 100%;
        transition: all 0.25s ease;
    }

    .sm-tag-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 12px 28px -6px rgba(0, 0, 0, 0.06);
        transform: translateY(-3px);
    }

    .sm-tag-code {
        display: inline-block;
        font-family: 'JetBrains Mono', 'Fira Code', monospace;
        font-size: 15px;
        font-weight: 700;
        color: var(--sm-primary);
        background: rgba(232, 58, 38, 0.08);
        padding: 6px 12px;
        border-radius: 8px;
        margin-bottom: 14px;
        border: 1px solid rgba(232, 58, 38, 0.15);
    }

    /* Common Mistakes Audit Cards */
    .sm-mistake-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-left: 4px solid #ef4444;
        border-radius: 16px;
        padding: 24px 22px;
        height: 100%;
        transition: all 0.25s ease;
    }

    .sm-mistake-card:hover {
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
    }

    .sm-mistake-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    /* Submission Walkthrough Cards */
    .sm-sub-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 34px 30px;
        height: 100%;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
    }

    .sm-sub-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
        padding-bottom: 18px;
        border-bottom: 1px solid #f1f5f9;
    }

    .sm-sub-platform-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .sm-sub-step {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 18px;
    }

    .sm-sub-num {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #0f172a;
        color: #ffffff;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 2px;
    }

    /* Enterprise CTA Banner */
    .sm-cta-banner {
        background: #0b0d11;
        background-image: radial-gradient(circle at 90% 10%, rgba(232, 58, 38, 0.2) 0%, transparent 60%);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 50px 40px;
        position: relative;
        overflow: hidden;
    }

    .sm-cta-btn {
        background: var(--sm-primary);
        color: #ffffff !important;
        font-weight: 700;
        font-size: 16px;
        padding: 14px 32px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 8px 24px rgba(232, 58, 38, 0.35);
        text-decoration: none;
    }

    .sm-cta-btn:hover {
        background: var(--sm-primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(232, 58, 38, 0.45);
    }

    /* Client Reviews & Testimonials */
    .sm-trust-stat-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px 20px;
        height: 100%;
        transition: all 0.25s ease;
    }

    .sm-trust-stat-box:hover {
        border-color: #cbd5e1;
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.04);
        transform: translateY(-2px);
    }

    .sm-trust-stat-num {
        font-size: 32px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 6px;
        letter-spacing: -0.5px;
    }

    .sm-trust-stat-label {
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .sm-review-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 32px 28px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s ease;
        position: relative;
    }

    .sm-review-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.08);
        border-color: #cbd5e1;
    }

    .sm-review-stars {
        color: #f59e0b;
        font-size: 17px;
        letter-spacing: 2px;
    }

    .sm-review-quote {
        font-size: 15px;
        color: #334155;
        line-height: 1.7;
        margin-bottom: 24px;
        font-style: italic;
    }

    .sm-review-author {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding-top: 18px;
        border-top: 1px solid #f1f5f9;
    }

    .sm-author-info h6 {
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 2px;
        font-size: 15px;
    }

    .sm-author-info p {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 0;
    }

    .sm-review-logo {
        max-height: 28px;
        max-width: 90px;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.65;
        transition: all 0.25s ease;
    }

    .sm-review-card:hover .sm-review-logo {
        filter: grayscale(0%);
        opacity: 1;
    }

    .sm-step-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 34px 28px;
        position: relative;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
    }

    .sm-step-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.06);
        transform: translateY(-4px);
    }

    .sm-step-number {
        width: 44px;
        height: 44px;
        background: #0f172a;
        color: #ffffff;
        font-size: 16px;
        font-weight: 800;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .sm-faq-item {
        background: #ffffff;
        border: 1px solid #e2e8f0 !important;
        border-radius: 16px !important;
        overflow: hidden;
        margin-bottom: 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease;
    }

    .sm-faq-item:hover {
        border-color: #cbd5e1 !important;
    }

    .sm-faq-button {
        font-size: 16px;
        font-weight: 700;
        color: #1e293b;
        padding: 18px 24px;
        background: #ffffff !important;
        box-shadow: none !important;
    }

    .sm-faq-button:not(.collapsed) {
        color: var(--sm-primary);
        background: #fafafa !important;
    }

    .sm-faq-body {
        padding: 0 24px 20px;
        color: #64748b;
        font-size: 15px;
        line-height: 1.7;
    }

    /* Table for Include vs Leave Out */
    .sm-table-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
    }

    .sm-table-card .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        display: block;
        margin: 0;
    }

    .sm-table {
        width: 100%;
        min-width: 580px;
        margin-bottom: 0;
        border-collapse: collapse;
    }

    .sm-table th {
        background: #0f172a;
        color: #ffffff;
        font-weight: 700;
        font-size: 14px;
        padding: 16px 22px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }

    .sm-table td {
        padding: 16px 22px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 15px;
        color: #334155;
        vertical-align: middle;
    }

    .sm-table tr:last-child td {
        border-bottom: none;
    }

    .sm-table tr:hover td {
        background: #f8fafc;
    }

    /* Sitemap Learning Hub */
    .sm-learning-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 30px 24px;
        height: 100%;
        transition: all 0.3s ease;
    }

    .sm-learning-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.05);
        transform: translateY(-3px);
    }

    .sm-learning-title {
        font-size: 18px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sm-learning-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .sm-learning-list li a {
        display: inline-flex;
        align-items: flex-start;
        gap: 8px;
        color: #334155;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.45;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .sm-learning-list li a:hover {
        color: var(--sm-primary);
    }

    .sm-learning-list li a i {
        color: var(--sm-primary);
        font-size: 15px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    /* Checklist & Feature Points */
    .sm-checklist-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 15px;
        color: #334155;
        line-height: 1.5;
        margin-bottom: 14px;
    }

    .sm-checklist-item i {
        color: #10b981;
        font-size: 18px;
        flex-shrink: 0;
        margin-top: 1px;
    }

    /* Responsive & Mobile Protection */
    body.sitemap-page,
    .sitemap-page,
    .sitemap-hero,
    .sm-section {
        max-width: 100vw;
        overflow-x: clip;
    }

    .max-w-800 {
        max-width: 800px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .sm-pill-badge {
        display: inline-block;
        padding: 8px 18px;
        background: rgba(232, 58, 38, 0.1);
        color: var(--sm-primary);
        border: 1px solid rgba(232, 58, 38, 0.2);
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.4;
        white-space: normal;
        text-align: center;
        max-width: 100%;
        word-break: break-word;
    }

    .badge {
        white-space: normal !important;
    }

    @media (max-width: 991px) {
        .sitemap-hero {
            padding: 60px 0 50px;
        }
        .sitemap-hero-title {
            font-size: 32px;
        }
        .sm-panel-card {
            padding: 24px;
            border-radius: 20px;
        }
        .sm-meter-wrapper {
            width: 190px;
            height: 190px;
        }
        .sm-meter-count {
            font-size: 38px;
        }
        .sm-action-btn-group {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .sitemap-hero {
            padding: 42px 0 36px;
        }
        .sitemap-hero-title {
            font-size: 26px;
            letter-spacing: -0.5px;
            line-height: 1.25;
            margin-bottom: 12px;
        }
        .sitemap-hero-desc {
            font-size: 14px;
            line-height: 1.55;
            margin-bottom: 24px;
        }
        .sm-panel-card {
            padding: 20px 16px;
            border-radius: 18px;
        }
        .sm-panel-header {
            padding-bottom: 14px;
            margin-bottom: 18px;
        }
        .sm-panel-title {
            font-size: 15px;
        }
        .sitemap-input {
            padding: 12px 14px 12px 40px;
            font-size: 14px;
        }
        .sitemap-select {
            padding: 11px 14px;
            font-size: 13px;
        }
        .sitemap-btn-submit {
            padding: 13px 18px;
            font-size: 14px;
        }
        .sm-meter-wrapper {
            width: 170px;
            height: 170px;
            margin: 8px auto 16px;
        }
        .sm-meter-count {
            font-size: 34px;
        }
        .sm-meter-sublabel {
            font-size: 10px;
            margin-bottom: 8px;
        }
        .sm-breakdown-val {
            font-size: 16px;
        }
        .sm-section {
            padding: 42px 0;
        }
        .sm-section-title {
            font-size: 22px;
            line-height: 1.3;
            margin-bottom: 10px;
        }
        .sm-section-subtitle {
            font-size: 14px;
            line-height: 1.55;
            margin-bottom: 24px;
        }
        .sm-section-badge {
            font-size: 12px;
            padding: 5px 12px;
            margin-bottom: 10px;
            white-space: normal;
        }
        .sm-feature-card,
        .sm-compare-card,
        .sm-tag-card,
        .sm-mistake-card,
        .sm-sub-card,
        .sm-review-card,
        .sm-learning-card,
        .sm-step-card {
            padding: 20px 16px;
            border-radius: 16px;
        }
        .sm-step-number {
            width: 38px;
            height: 38px;
            font-size: 14px;
            margin-bottom: 14px;
        }
        .sm-feature-icon {
            width: 44px;
            height: 44px;
            font-size: 20px;
            margin-bottom: 14px;
        }
        .sm-review-quote {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 18px;
        }
        .sm-faq-button {
            font-size: 15px;
            padding: 14px 18px;
        }
        .sm-faq-body {
            font-size: 14px;
            padding: 0 18px 16px;
        }
        .sm-cta-banner {
            padding: 28px 18px;
            border-radius: 18px;
        }
        .sm-cta-btn {
            width: 100%;
            justify-content: center;
            padding: 13px 20px;
            font-size: 15px;
        }
        .sm-pill-badge {
            font-size: 13px;
            padding: 8px 14px;
        }
        .sm-table th,
        .sm-table td {
            padding: 12px 14px;
            font-size: 13px;
        }
        .sm-code-preview {
            max-height: 180px;
            font-size: 11px;
            padding: 12px;
            overflow-x: auto;
        }
        .sm-live-feed {
            font-size: 11px;
            padding: 10px 12px;
        }
    }

    @media (max-width: 575px) {
        .sm-panel-card {
            padding: 18px 14px;
        }
        .sitemap-input-wrapper i.input-icon {
            left: 12px;
            font-size: 16px;
        }
        .sitemap-input {
            padding-left: 36px;
            font-size: 14px;
        }
        .sm-action-btn-group {
            grid-template-columns: 1fr;
        }
        .sm-action-btn {
            padding: 12px 16px;
            font-size: 13px;
        }
    }
</style>

<!-- Hero Section with Dual Left-Right Dashboard -->
<section class="sitemap-hero">
    <div class="tools-glow-blob-1"></div>
    <div class="tools-glow-blob-2"></div>
    <div class="tools-grid-overlay"></div>

    <div class="container position-relative z-1">
        <!-- Title and Subtitle -->
        <div class="text-center">
            <h1 class="sitemap-hero-title">
                Free XML Sitemap <span>Generator</span>
            </h1>
            <p class="sitemap-hero-desc">
                Create a complete XML sitemap for your website in seconds. Improve SEO, simplify search engine submission, and help search engines discover and index your important pages. Free to use, with no sign-up required.
            </p>
        </div>

        <!-- Left-Right Box Layout -->
        <div class="row g-4 align-items-stretch">
            <!-- Left Box: Crawler Setup & Form -->
            <div class="col-lg-5">
                <div class="sm-panel-card text-start">
                    <div class="sm-panel-header">
                        <h3 class="sm-panel-title">
                            <i class="ion-gear-a"></i> Crawl Configuration
                        </h3>
                        <span class="sm-status-indicator status-standby" id="setupBadge">Ready</span>
                    </div>

                    <form id="sitemapForm" action="javascript:void(0);" data-action="<?= route('xmlsitemapgenerator.generate') ?>" method="POST" onsubmit="event.preventDefault();" class="d-flex flex-column h-100 justify-content-between">
                        <div>
                            <!-- URL Input -->
                            <div class="mb-4">
                                <label for="url" class="sitemap-label">
                                    <i class="ion-link"></i> Target Website URL
                                </label>
                                <div class="sitemap-input-wrapper">
                                    <i class="ion-globe input-icon"></i>
                                    <input 
                                        type="url" 
                                        class="sitemap-input" 
                                        id="url" 
                                        name="url" 
                                        placeholder="https://brandstory.ae" 
                                        required
                                        autocomplete="off"
                                    >
                                </div>
                            </div>

                            <!-- Changefreq & Priority -->
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <label for="changefreq" class="sitemap-label">
                                        <i class="ion-clock"></i> Frequency
                                    </label>
                                    <select class="sitemap-select" id="changefreq" name="changefreq">
                                        <option value="always">Always</option>
                                        <option value="hourly">Hourly</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly" selected>Weekly (Default)</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="never">Never</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="priority" class="sitemap-label">
                                        <i class="ion-ribbon-b"></i> Priority
                                    </label>
                                    <select class="sitemap-select" id="priority" name="priority">
                                        <option value="1.0">1.0 (Critical)</option>
                                        <option value="0.8">0.8 (Primary)</option>
                                        <option value="0.5" selected>0.5 (Standard)</option>
                                        <option value="0.3">0.3 (Low)</option>
                                        <option value="0.1">0.1 (Minimum)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Options Checkboxes -->
                            <div class="d-flex flex-column gap-2 mb-4">
                                <label class="sm-checkbox-item">
                                    <input type="checkbox" checked disabled>
                                    <span>Include Last Modification Date (`&lt;lastmod&gt;`)</span>
                                </label>
                                <label class="sm-checkbox-item">
                                    <input type="checkbox" checked disabled>
                                    <span>Exclude media files, fragments (`#`), & query strings</span>
                                </label>
                            </div>
                        </div>

                        <!-- Action Submit Button -->
                        <div>
                            <button type="submit" class="sitemap-btn-submit" id="generateBtn">
                                <i class="ion-play"></i>
                                <span class="btn-text">Start Sitemap Crawl</span>
                                <div class="spinner-border spinner-border-sm text-light d-none" role="status"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Box: Live Crawler Monitor & Results -->
            <div class="col-lg-7">
                <div class="sm-panel-card text-start position-relative">
                    <div class="sm-panel-header">
                        <h3 class="sm-panel-title">
                            <i class="ion-stats-bars"></i> Live Crawl Monitor
                        </h3>
                        <span class="sm-status-indicator status-standby" id="liveStatusBadge">
                            <i class="ion-record"></i> <span id="statusText">Standby</span>
                        </span>
                    </div>

                    <!-- State 1: Idle View (Before Generation) -->
                    <div id="idleStateView" class="sm-idle-view">
                        <div class="sm-idle-icon">
                            <i class="ion-ios-search-strong"></i>
                        </div>
                        <h4 class="sm-idle-title">Crawler Awaiting Input</h4>
                        <p class="sm-idle-desc">
                            Enter your website URL on the left and click <strong>"Start Sitemap Crawl"</strong> to begin scanning pages and viewing live metrics.
                        </p>
                    </div>

                    <!-- State 2: Active Crawling View -->
                    <div id="activeCrawlView" class="d-none flex-column justify-content-between h-100">
                        <!-- Website & Current Page Meta -->
                        <div class="crawler-meta-info">
                            <div class="crawler-meta-row">
                                <span class="crawler-meta-label">Website:</span>
                                <span class="crawler-meta-val" id="displayWebsite">https://...</span>
                            </div>
                            <div class="crawler-meta-row">
                                <span class="crawler-meta-label">Current page:</span>
                                <span class="crawler-meta-path" id="displayCurrentPage">/</span>
                            </div>
                        </div>

                        <!-- Circular Progress Meter -->
                        <div class="sm-meter-wrapper">
                            <svg class="sm-meter-svg" viewBox="0 0 210 210">
                                <circle class="sm-meter-bg-circle" cx="105" cy="105" r="95"></circle>
                                <circle class="sm-meter-progress-circle" id="meterCircle" cx="105" cy="105" r="95"></circle>
                            </svg>
                            <div class="sm-meter-inner">
                                <div class="sm-meter-count" id="meterDiscoveredCount">0</div>
                                <div class="sm-meter-sublabel">Discovered</div>
                                <div class="sm-meter-breakdown">
                                    <div class="sm-breakdown-col">
                                        <span class="sm-breakdown-label">Added</span>
                                        <span class="sm-breakdown-val text-success" id="meterAddedCount">0</span>
                                    </div>
                                    <div class="sm-breakdown-divider"></div>
                                    <div class="sm-breakdown-col">
                                        <span class="sm-breakdown-label">Skipped</span>
                                        <span class="sm-breakdown-val text-warning" id="meterSkippedCount">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Time Remaining & Cancel -->
                        <div class="sm-time-remaining">
                            Estimated remaining time: <strong id="displayTimeRemaining">0:45</strong>
                        </div>

                        <div>
                            <button type="button" class="sm-btn-cancel" id="cancelProcessBtn">
                                Cancel the process
                            </button>
                        </div>

                        <!-- Mini Live Feed -->
                        <div class="sm-live-feed" id="liveFeedContainer">
                            <div class="sm-feed-item">
                                <span class="code">[INIT]</span> Initializing crawl bot engine...
                            </div>
                        </div>
                    </div>

                    <!-- State 3: Completed / Output View -->
                    <div id="completedView" class="sm-completed-view">
                        <div class="sm-success-ribbon">
                            <span>
                                <i class="ion-checkmark-circled fs-18"></i> XML Sitemap Generated Successfully
                            </span>
                            <span class="badge bg-dark text-white px-3 py-2" id="finalTotalBadge">0 URLs</span>
                        </div>

                        <div class="crawler-meta-info mb-3">
                            <div class="crawler-meta-row">
                                <span class="crawler-meta-label">Total Discovered:</span>
                                <strong class="text-white" id="finalDiscoveredCount">0</strong>
                                <span class="mx-2 text-white-50">|</span>
                                <span class="crawler-meta-label">Added to XML:</span>
                                <strong class="text-success" id="finalAddedCount">0</strong>
                                <span class="mx-2 text-white-50">|</span>
                                <span class="crawler-meta-label">Filtered/Skipped:</span>
                                <strong class="text-warning" id="finalSkippedCount">0</strong>
                            </div>
                        </div>

                        <pre id="xmlPreview" class="sm-code-preview"></pre>

                        <div class="sm-action-btn-group">
                            <button type="button" class="sm-action-btn sm-btn-copy" id="copyBtn">
                                <i class="ion-ios-copy"></i>
                                <span>Copy XML Data</span>
                            </button>
                            <button type="button" class="sm-action-btn sm-btn-download" id="downloadBtn">
                                <i class="ion-ios-download"></i>
                                <span>Download sitemap.xml</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 1: Intro & What Is an XML Sitemap Generator? -->
<section class="sm-section bg-white" id="what-is-sitemap-generator">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="sm-section-badge"><i class="ion-ios-information"></i> Sitemap Fundamentals</span>
                <h2 class="sm-section-title mb-3">What Is an XML Sitemap Generator?</h2>
                <p class="text-secondary fs-16 mb-3">
                    An XML sitemap is a file that lists the important pages of your website. It acts as a roadmap for search engines like Google and Bing. Our free XML sitemap generator builds that roadmap from your website URL in seconds. You enter your domain, pick your settings, and download a clean sitemap file.
                </p>
                <p class="text-secondary fs-16 mb-3">
                    There is no signup and no software to install. You can crawl up to 2,000 pages, set update frequency and priority, and upload the file to your server. After that, you can submit it to Google Search Console and Bing Webmaster Tools.
                </p>
                <div class="p-3 bg-light rounded-3 border-start border-4 border-danger mb-4">
                    <p class="fs-15 mb-0 text-dark">
                        If you want to know the basics first, read <a href="https://www.brandstory.ae/blogs/what-is-an-xml-sitemap-complete-guide-to-sitemap-architecture" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">What Is an XML Sitemap? Complete Guide to Sitemap Architecture</a>.
                    </p>
                </div>
                <p class="text-secondary fs-16 mb-3">
                    An XML sitemap generator is a tool that scans your website and collects your internal URLs. It then writes them into a structured XML file. Search engines read this file to find your pages faster.
                </p>
                <p class="text-secondary fs-16 mb-4">
                    Writing a sitemap by hand is slow and easy to get wrong. One missing tag can break the whole file. A sitemap generator removes that risk. It follows the sitemaps.org protocol, so the output is valid and ready to use.
                </p>

                <h5 class="fw-700 text-dark mb-3">This free sitemap generator is a good fit for:</h5>
                <div class="row g-2">
                    <div class="col-sm-6">
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Custom-built websites</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Static websites</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Older websites without a sitemap plugin</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>New websites that need fast indexing</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Small business websites with limited internal links</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>SEO teams that need a quick sitemap for an audit</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="p-3 bg-light rounded-4 border shadow-sm">
                    <img src="http://brandstoryae.test/assets/images/xml-sitemap.webp" alt="XML Sitemap Generator" class="img-fluid rounded-3" style="max-height: 420px; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: How Our XML Sitemap Generator Works -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-ios-gear"></i> Simple Process</span>
            <h2 class="sm-section-title">How Our XML Sitemap Generator Works</h2>
            <p class="sm-section-subtitle">The tool uses a crawler to map your site in real time. It follows your links, reads your pages, and builds the file for you. The process has three simple steps.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="sm-step-card">
                    <div class="sm-step-number">1</div>
                    <h5 class="fw-700 mb-2 text-dark">Step 1: Enter Your Website URL</h5>
                    <p class="text-muted fs-14 mb-0">Type your domain in the entry field. Then choose your preferred settings. You can set the update frequency and the priority weight for your pages.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-step-card">
                    <div class="sm-step-number">2</div>
                    <h5 class="fw-700 mb-2 text-dark">Step 2: Run the Crawl</h5>
                    <p class="text-muted fs-14 mb-0">Click the crawl button. The bot scans every page, link, and directory on your domain. It can scan up to 2,000 pages. A progress bar shows you how far the crawl has gone.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-step-card">
                    <div class="sm-step-number">3</div>
                    <h5 class="fw-700 mb-2 text-dark">Step 3: Copy or Download Your Sitemap</h5>
                    <p class="text-muted fs-14 mb-0">When the crawl ends, you see the total number of URLs found. You can copy the XML code or download the .xml file. Then upload it to your website and submit it to the search engines.</p>
                </div>
            </div>
        </div>

        <div class="text-center p-3 bg-white rounded-3 border max-w-800 mx-auto">
            <span class="text-secondary fs-15">Want a detailed walkthrough? Read <a href="https://www.brandstory.ae/blogs/how-to-create-an-xml-sitemap-step-by-step-detailed-technical-guide" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">How to Create an XML Sitemap: Step-by-Step Detailed Technical Guide</a>.</span>
        </div>
    </div>
</section>

<!-- Section 3: Features of Our Free Sitemap Generator -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-flash"></i> Key Features</span>
            <h2 class="sm-section-title">Features of Our Free Sitemap Generator</h2>
            <p class="sm-section-subtitle">Designed to give you full technical control over how search engines discover and evaluate your site architecture.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-speedometer"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Up to 2,000 pages</h5>
                    <p class="text-muted fs-14 mb-0">Create a free sitemap for small and mid-size websites with deep URL traversal.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-android-search"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Deep page discovery</h5>
                    <p class="text-muted fs-14 mb-0">The crawler helps search engines find deep, buried, and unlinked internal pages.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-clock"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Update frequency options</h5>
                    <p class="text-muted fs-14 mb-0">Choose from Continuous, Hourly, Daily, Weekly, Monthly, Yearly, or Static hints.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-ribbon-b"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Priority weights</h5>
                    <p class="text-muted fs-14 mb-0">Set relative importance values from 1.0 (Critical) down to 0.1 (Minimum).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-checkmark-circled"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Valid XML output</h5>
                    <p class="text-muted fs-14 mb-0">The generated file strictly follows the official sitemaps.org 0.9 schema standard.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-arrow-down-a"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Copy or download</h5>
                    <p class="text-muted fs-14 mb-0">Take the formatted XML code directly to clipboard or save it as a clean .xml file.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <span class="sm-pill-badge">
                <i class="ion-locked me-1"></i> No Registration Required — Use the tool as often as you like completely free.
            </span>
        </div>
    </div>
</section>

<!-- Section 4: Understanding the Settings -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-sliders"></i> Configuration Guide</span>
            <h2 class="sm-section-title">Understanding the Settings</h2>
            <p class="sm-section-subtitle">Our XML sitemap generator gives you two settings before you crawl. Here is what each one does.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="sm-sub-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-feature-icon mb-0" style="width: 44px; height: 44px; font-size: 20px;"><i class="ion-clock"></i></div>
                        <h4 class="fw-700 text-dark mb-0">Update Frequency</h4>
                    </div>
                    <p class="text-secondary fs-15 mb-3">This tells crawlers how often a page is likely to change. The options are:</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Continuous:</strong> For pages that change all the time</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Hourly:</strong> For live or fast-moving content</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Daily Scan:</strong> For news or active blogs</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Standard Weekly:</strong> Recommended default for most business websites</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Monthly:</strong> For service pages that rarely change</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Yearly:</strong> For old or archived reference pages</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Static:</strong> For pages that never change</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="sm-sub-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-feature-icon mb-0" style="width: 44px; height: 44px; font-size: 20px;"><i class="ion-ribbon-b"></i></div>
                        <h4 class="fw-700 text-dark mb-0">Priority Weight</h4>
                    </div>
                    <p class="text-secondary fs-15 mb-3">Priority shows how important a page is compared to other pages on your own site. The scale runs from 0.0 to 1.0:</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-android-done text-danger"></i> <span><strong>1.0 (Critical):</strong> Your most important pages (e.g. homepage)</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>0.8 (Primary):</strong> Main service or top-level product pages</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>0.5 (Average):</strong> The default standard weight for most pages</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>0.3 (Low):</strong> Supporting subpages and utility links</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>0.1 (Minimum):</strong> Pages of little organic value</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="p-4 bg-white rounded-4 border">
            <h6 class="fw-700 text-dark mb-2"><i class="ion-alert-circled text-warning me-2"></i> Important Technical Note:</h6>
            <p class="text-secondary fs-15 mb-2">
                A quick note. Google now largely ignores the <code>changefreq</code> and <code>priority</code> tags. It uses its own signals instead. We still include them because they are part of the protocol and other crawlers may read them. The tag that matters most is <code>lastmod</code>.
            </p>
            <p class="fs-15 mb-0">
                Learn more in <a href="https://www.brandstory.ae/blogs/xml-sitemap-format-and-structure-tags-lastmod-priority-and-changefreq" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">XML Sitemap Format and Structure: Tags, Lastmod, Priority and Changefreq</a>.
            </p>
        </div>
    </div>
</section>

<!-- Section 5: Why Your Website Needs an XML Sitemap -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-arrow-graph-up-right"></i> SEO Value</span>
            <h2 class="sm-section-title">Why Your Website Needs an XML Sitemap</h2>
            <p class="sm-section-subtitle">Publishing great content is not enough. If search engines cannot find your pages, they cannot rank them. An XML sitemap fixes that. Here are the main reasons to use one.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">1. Fast Crawl</span>
                    <h5 class="fw-700 mb-2 text-dark">Faster Discovery of New Pages</h5>
                    <p class="text-muted fs-14 mb-0">Without a sitemap, search engines find pages only through links. That can take weeks. A sitemap places your new URL in the crawl queue right away. This helps when you launch a service page, a product, or a blog post.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">2. Site Architecture</span>
                    <h5 class="fw-700 mb-2 text-dark">No More Orphan Pages</h5>
                    <p class="text-muted fs-14 mb-0">Some pages sit four or five clicks from the homepage. Others have no internal links at all. A sitemap works as a safety net. It keeps these pages visible to search bots.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">3. Crawl Efficiency</span>
                    <h5 class="fw-700 mb-2 text-dark">Better Crawl Budget Use</h5>
                    <p class="text-muted fs-14 mb-2">Search engines give each site a limited amount of crawl capacity. This is called crawl budget. A clean sitemap points bots to your best pages. They spend less time on filters, duplicates, and broken links.</p>
                    <a href="https://www.brandstory.ae/blogs/crawl-budget-how-sitemaps-help-search-engines-crawl-your-site" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Read Crawl Budget Guide &rarr;</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">4. Fresh Content</span>
                    <h5 class="fw-700 mb-2 text-dark">Clear Freshness Signals</h5>
                    <p class="text-muted fs-14 mb-0">The lastmod tag tells search engines when a page last changed. When you update a page and update its lastmod date, Google knows to visit it again. This speeds up the gains from content refreshes.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">5. Quick Launch</span>
                    <h5 class="fw-700 mb-2 text-dark">Faster Indexing for New Websites</h5>
                    <p class="text-muted fs-14 mb-0">A new domain has few backlinks. Search engines have few ways in. A sitemap gives them a direct path. Submitting it early helps build index coverage faster.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">6. Scale & Catalogs</span>
                    <h5 class="fw-700 mb-2 text-dark">Help for Large and Ecommerce Sites</h5>
                    <p class="text-muted fs-14 mb-0">Big catalogs change all the time. Products come and go. Filters create thousands of extra URLs. A well-built sitemap keeps the focus on your real pages.</p>
                </div>
            </div>
            <div class="col-12">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">7. Search Console Tracking</span>
                    <h5 class="fw-700 mb-2 text-dark">Better Reporting in Search Console</h5>
                    <p class="text-muted fs-14 mb-0">When you submit a sitemap, Google Search Console compares submitted URLs with indexed URLs. If you submit 1,000 pages and only 300 are indexed, you can see why. This makes technical problems easier to find.</p>
                </div>
            </div>
        </div>

        <div class="p-4 bg-light rounded-4 border text-center">
            <span class="text-secondary fs-15">For the full list of benefits, read <a href="https://www.brandstory.ae/blogs/why-does-your-website-need-an-xml-sitemap-complete-seo-guide" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">Why Does Your Website Need an XML Sitemap? Complete SEO Guide</a>.</span>
        </div>
    </div>
</section>

<!-- Section 6: What an XML Sitemap Looks Like -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-code-working"></i> XML Structure</span>
            <h2 class="sm-section-title">What an XML Sitemap Looks Like</h2>
            <p class="sm-section-subtitle">Here is a basic example with one URL entry:</p>
        </div>

        <div class="row g-4 align-items-center mb-4">
            <div class="col-lg-6">
                <div class="bg-dark p-3 p-md-4 rounded-4 shadow-sm" style="overflow-x: auto; max-width: 100%;">
                    <pre class="text-light mb-0" style="font-family: 'JetBrains Mono', monospace; font-size: 13px; line-height: 1.6; white-space: pre; overflow-x: auto; max-width: 100%;"><code>&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"&gt;
  &lt;url&gt;
    &lt;loc&gt;https://www.yourdomain.com/services/&lt;/loc&gt;
    &lt;lastmod&gt;<?= date('Y-m-d') ?>&lt;/lastmod&gt;
    &lt;changefreq&gt;weekly&lt;/changefreq&gt;
    &lt;priority&gt;0.8&lt;/priority&gt;
  &lt;/url&gt;
&lt;/urlset&gt;</code></pre>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="fw-700 text-dark mb-3">The main tags are simple:</h5>
                <ul class="sm-compare-list">
                    <li><i class="ion-checkmark-round text-success"></i> <span><code>urlset</code>: The root tag that holds the whole file. Required.</span></li>
                    <li><i class="ion-checkmark-round text-success"></i> <span><code>url</code>: The container for each page. Required.</span></li>
                    <li><i class="ion-checkmark-round text-success"></i> <span><code>loc</code>: The full, canonical URL of the page. Required.</span></li>
                    <li><i class="ion-checkmark-round text-success"></i> <span><code>lastmod</code>: The date the page last changed. Optional, but very useful.</span></li>
                    <li><i class="ion-checkmark-round text-secondary"></i> <span><code>changefreq</code> and <code>priority</code>: Optional hints. Most search engines now give them little weight.</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: What to Include and What to Leave Out -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-funnel"></i> Audit Rules</span>
            <h2 class="sm-section-title">What to Include and What to Leave Out</h2>
            <p class="sm-section-subtitle">A sitemap should list only the pages you want people to find in search. Adding the wrong URLs sends mixed signals to search engines.</p>
        </div>

        <div class="sm-table-card mb-4">
            <div class="table-responsive">
                <table class="sm-table">
                    <thead>
                        <tr>
                            <th>Page Type</th>
                            <th style="width: 140px;">Include?</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Live service, product, and blog pages (200 OK)</strong></td>
                            <td><span class="badge bg-success px-3 py-2 fs-13"><i class="ion-checkmark-round me-1"></i> Yes</span></td>
                            <td>These pages drive traffic and leads.</td>
                        </tr>
                        <tr>
                            <td><strong>Redirected URLs (301 / 302)</strong></td>
                            <td><span class="badge bg-danger px-3 py-2 fs-13"><i class="ion-close-round me-1"></i> No</span></td>
                            <td>List only the final destination.</td>
                        </tr>
                        <tr>
                            <td><strong>Broken pages (404 / 410)</strong></td>
                            <td><span class="badge bg-danger px-3 py-2 fs-13"><i class="ion-close-round me-1"></i> No</span></td>
                            <td>They waste crawl capacity.</td>
                        </tr>
                        <tr>
                            <td><strong>Noindex pages</strong></td>
                            <td><span class="badge bg-danger px-3 py-2 fs-13"><i class="ion-close-round me-1"></i> No</span></td>
                            <td>The noindex tag and the sitemap would disagree.</td>
                        </tr>
                        <tr>
                            <td><strong>Filter and sorting URLs</strong></td>
                            <td><span class="badge bg-danger px-3 py-2 fs-13"><i class="ion-close-round me-1"></i> No</span></td>
                            <td>They cause index bloat.</td>
                        </tr>
                        <tr>
                            <td><strong>Cart, checkout, and admin pages</strong></td>
                            <td><span class="badge bg-danger px-3 py-2 fs-13"><i class="ion-close-round me-1"></i> No</span></td>
                            <td>They have no search value.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="p-3 bg-light rounded-3 border text-center">
            <span class="text-secondary fs-15">Broken links are a common sitemap problem. Learn how to find and remove them in <a href="https://www.brandstory.ae/blogs/how-to-find-and-fix-broken-links-that-hurt-your-sitemap" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">How to Find and Fix Broken Links That Hurt Your Sitemap</a>.</span>
        </div>
    </div>
</section>

<!-- Section 8: Types of Sitemaps -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-network"></i> Sitemap Variations</span>
            <h2 class="sm-section-title">Types of Sitemaps</h2>
            <p class="sm-section-subtitle">The standard XML sitemap lists your web pages. But there are other types too. Each one has a different job.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">XML Sitemap vs. HTML Sitemap</h5>
                    <p class="text-muted fs-14 mb-3">An XML sitemap is built for search engine bots. It sits at an address like yourdomain.com / sitemap.xml. Visitors rarely see it. An HTML sitemap is built for people. It is a page of links that helps visitors move around your site. Many sites use both.</p>
                    <div class="d-flex flex-column gap-1">
                        <a href="https://www.brandstory.ae/blogs/xml-sitemap-vs-html-sitemap-what-is-the-difference" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">XML vs HTML Sitemap</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Image Sitemap</h5>
                    <p class="text-muted fs-14 mb-3">An image sitemap gives search engines extra details about your images. It can help your pictures show up in Google Images.</p>
                    <a href="https://www.brandstory.ae/blogs/image-sitemap-what-it-is-and-how-to-create-one" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Image Sitemap Guide &rarr;</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Video Sitemap</h5>
                    <p class="text-muted fs-14 mb-3">A video sitemap shares details such as the thumbnail, title, description, and length of your videos. This can help your videos qualify for rich results.</p>
                    <a href="https://www.brandstory.ae/blogs/video-sitemap-how-to-get-videos-indexed-ranked-in-google" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Video Sitemap Setup &rarr;</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">News Sitemap</h5>
                    <p class="text-muted fs-14 mb-3">A news sitemap is for approved news publishers. It lists articles published in the last 48 hours for fast Google News carousel inclusion.</p>
                    <a href="https://www.brandstory.ae/blogs/news-sitemap-setup-guide-for-digital-publishers" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">News Sitemap Setup Guide &rarr;</a>
                </div>
            </div>

            <div class="col-md-12 col-lg-6">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Sitemap Index File</h5>
                    <p class="text-muted fs-14 mb-3">One sitemap file can hold up to 50,000 URLs and must stay under 50MB uncompressed. If your site is bigger, split it into several sitemaps. Then list them all in one parent file called a sitemap index.</p>
                    <a href="https://www.brandstory.ae/blogs/sitemap-index-file-how-to-manage-large-websites" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Sitemap Index File for Large Sites &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 9: How to Use Your Sitemap After You Generate It -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-upload"></i> Implementation Steps</span>
            <h2 class="sm-section-title">How to Use Your Sitemap After You Generate It</h2>
            <p class="sm-section-subtitle">Creating the file is only the first part. Search engines must also find it. Follow these steps.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="sm-step-card text-start h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-step-number m-0">1</div>
                        <h5 class="fw-700 text-dark mb-0">Upload the File to Your Website</h5>
                    </div>
                    <p class="text-muted fs-15 mb-0">Save the file as <code>sitemap.xml</code>. Upload it to your root directory. It should open at <code>yourdomain.com/sitemap.xml</code>.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="sm-step-card text-start h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-step-number m-0">2</div>
                        <h5 class="fw-700 text-dark mb-0">Submit It to Google Search Console</h5>
                    </div>
                    <p class="text-muted fs-15 mb-2">Log in to Google Search Console. Go to Indexing, then Sitemaps. Enter your sitemap URL and click Submit.</p>
                    <a href="https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-google-search-console-step-by-step-guide" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Google Search Console Submission Guide &rarr;</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="sm-step-card text-start h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-step-number m-0">3</div>
                        <h5 class="fw-700 text-dark mb-0">Submit It to Bing Webmaster Tools</h5>
                    </div>
                    <p class="text-muted fs-15 mb-2">Open Bing Webmaster Tools. Choose Sitemaps from the left menu. Click Submit sitemap and enter your full URL.</p>
                    <a href="https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-bing-webmaster-tools-step-by-step-guide" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Bing Webmaster Tools Submission Guide &rarr;</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="sm-step-card text-start h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-step-number m-0">4</div>
                        <h5 class="fw-700 text-dark mb-0">Add It to Your Robots.txt File</h5>
                    </div>
                    <p class="text-muted fs-15 mb-2">Add one line to the end of your robots.txt file. This lets every compliant crawler find your sitemap on arrival:</p>
                    <div class="bg-light p-2 rounded border mb-2 font-monospace fs-13 text-secondary">
                        Sitemap: https://www.yourdomain.com/sitemap.xml
                    </div>
                    <a href="https://www.brandstory.ae/blogs/how-to-add-a-sitemap-to-your-robots-txt-file-step-by-step-guide" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">How to Add Sitemap to Robots.txt &rarr;</a>
                </div>
            </div>

            <div class="col-12">
                <div class="sm-step-card text-start h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-step-number m-0">5</div>
                        <h5 class="fw-700 text-dark mb-0">Check for Errors</h5>
                    </div>
                    <p class="text-muted fs-15 mb-2">After you submit, check the status in Search Console. If you see a fetch error or another problem, check our troubleshooting guide:</p>
                    <a href="https://www.brandstory.ae/blogs/sitemap-couldn-t-fetch-or-has-errors-fix-it-in-google-search-console" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Sitemap Couldn't Fetch or Has Errors? Fix It in Google Search Console &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 10: Sitemaps for Different Platforms -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-cube"></i> Platform Setup</span>
            <h2 class="sm-section-title">Sitemaps for Different Platforms</h2>
            <p class="sm-section-subtitle">Some platforms build a sitemap for you. Others need a little help. Here is how it works on the most common ones.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">WordPress</h5>
                    <p class="text-muted fs-14 mb-3">Plugins such as Rank Math and Yoast SEO create sitemaps automatically.</p>
                    <a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wordpress-step-by-step-guide" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">WordPress Sitemap Guide &rarr;</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Shopify</h5>
                    <p class="text-muted fs-14 mb-3">Shopify makes a sitemap for you automatically at <code>/sitemap.xml</code>.</p>
                    <a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-shopify-setup-and-submission-guide" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Shopify Sitemap Setup &rarr;</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Wix, Webflow & Custom</h5>
                    <p class="text-muted fs-14 mb-3">Some built-in options exist, and custom sites often need an external generator.</p>
                    <a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wix-webflow-or-custom-websites" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Wix, Webflow & Custom Sites &rarr;</a>
                </div>
            </div>
        </div>

        <div class="p-3 bg-white rounded-3 border text-center">
            <p class="fs-15 mb-0 text-secondary">If your site is custom, static, or built on an older system, a sitemap generator is the fastest way to get a clean file.</p>
        </div>
    </div>
</section>

<!-- Section 11: Why Google May Not Be Indexing Your Pages -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-alert"></i> Indexing Barriers</span>
            <h2 class="sm-section-title">Why Google May Not Be Indexing Your Pages</h2>
            <p class="sm-section-subtitle">A sitemap helps, but it does not guarantee indexing. Google still decides which pages to keep. Common reasons pages stay out of the index include:</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <h6 class="fw-700 text-dark mb-1">Thin or Duplicate Content</h6>
                    <p class="text-muted fs-14 mb-0">Pages with minimal original text or identical content to other URLs on your domain.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <h6 class="fw-700 text-dark mb-1">Blocked by Robots.txt or Noindex</h6>
                    <p class="text-muted fs-14 mb-0">Directives in your robots.txt or meta robots tags preventing bots from indexing the URL.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <h6 class="fw-700 text-dark mb-1">Canonical Tags Pointing Elsewhere</h6>
                    <p class="text-muted fs-14 mb-0">Self-referencing canonical tags missing or pointing to another preferred URL.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <h6 class="fw-700 text-dark mb-1">Soft 404 Errors</h6>
                    <p class="text-muted fs-14 mb-0">Pages returning a 200 OK status code but displaying an empty or "not found" page body.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <h6 class="fw-700 text-dark mb-1">Poor Internal Linking</h6>
                    <p class="text-muted fs-14 mb-0">Pages isolated deep in the site structure without navigational or contextual links.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <h6 class="fw-700 text-dark mb-1">New Site Trust Factor</h6>
                    <p class="text-muted fs-14 mb-0">A domain that is too new to have built sufficient authority and crawl trust with Google.</p>
                </div>
            </div>
        </div>

        <div class="p-3 bg-light rounded-3 border text-center">
            <span class="text-secondary fs-15">A clean sitemap and Search Console reports will help you spot these issues. Read <a href="https://www.brandstory.ae/blogs/why-google-is-not-indexing-your-pages-and-how-a-sitemap-helps" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">Why Google Is Not Indexing Your Pages (and How a Sitemap Helps)</a>.</span>
        </div>
    </div>
</section>

<!-- Section 12: Best Practices for a Healthy XML Sitemap -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-ribbon-a"></i> Quality Standards</span>
            <h2 class="sm-section-title">Best Practices for a Healthy XML Sitemap</h2>
            <p class="sm-section-subtitle">Follow these 10 actionable industry best practices to ensure continuous indexing health.</p>
        </div>

        <div class="p-4 p-md-5 bg-white rounded-4 border max-w-900 mx-auto">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>List only canonical pages that return a 200 OK status.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Remove redirected, broken, and noindexed URLs.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Keep lastmod dates honest. Change them only when the page content changes.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Use full URLs with the right protocol, HTTP or HTTPS.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Stay under 50,000 URLs and 50MB per file.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Use a sitemap index for large sites.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Declare your sitemap in robots.txt.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Submit it to both Google and Bing.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Regenerate your sitemap after major site changes.</span>
                    </div>
                    <div class="sm-checklist-item">
                        <i class="ion-checkmark-circled text-success"></i>
                        <span>Check Search Console reports often.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 13: Why Use BrandStory's XML Sitemap Generator? -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-trophy"></i> Built By Experts</span>
            <h2 class="sm-section-title">Why Use BrandStory's XML Sitemap Generator?</h2>
            <p class="sm-section-subtitle">Many sitemap tools exist. Here is why ours is a good pick.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Fast</h5>
                    <p class="text-muted fs-14 mb-0">Get your sitemap in seconds, not hours.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Free</h5>
                    <p class="text-muted fs-14 mb-0">No cost and no account needed.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Clean</h5>
                    <p class="text-muted fs-14 mb-0">The output follows the sitemap protocol.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Simple</h5>
                    <p class="text-muted fs-14 mb-0">Three steps from URL to file with zero technical friction.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sm-feature-card">
                    <h5 class="fw-700 mb-2 text-dark">Built by SEO Experts</h5>
                    <p class="text-muted fs-14 mb-0">BrandStory is a digital marketing agency in Dubai. Our team works on technical SEO every day.</p>
                </div>
            </div>
        </div>

        <div class="p-4 bg-light rounded-4 border text-center">
            <p class="fs-15 mb-0 text-secondary">A good sitemap also supports your wider SEO plan. It helps secure your presence in competitive search markets across the UAE and the wider Gulf region.</p>
        </div>
    </div>
</section>

<!-- Section 14: Our Customer Testimonials -->
<section class="sm-section bg-light" id="testimonials">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-star"></i> User Reviews</span>
            <h2 class="sm-section-title">Our Customer Testimonials</h2>
            <p class="sm-section-subtitle">Read feedback from SEO specialists, marketing executives, and developers who rely on our sitemap tool.</p>
        </div>

        <div class="row g-4">
            <!-- Testimonial 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">
                            <i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i>
                        </div>
                        <p class="sm-review-quote">
                            “A simple and useful tool for generating XML sitemaps. I entered my website URL, ran the crawl, and downloaded the file without creating an account. It saved me time during my technical SEO work.”
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <div class="sm-author-info">
                            <h6 class="mb-0">Nitila Duraivel</h6>
                            <p class="text-muted fs-13 mb-0">SEO Specialist</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">
                            <i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i>
                        </div>
                        <p class="sm-review-quote">
                            “I needed a sitemap for a small business website and wanted something straightforward. This tool made the process easy, and I could download the XML file and submit it through Google Search Console.”
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <div class="sm-author-info">
                            <h6 class="mb-0">Fatma Hannachi</h6>
                            <p class="text-muted fs-13 mb-0">Digital Marketing Executive</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">
                            <i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i>
                        </div>
                        <p class="sm-review-quote">
                            “The option to configure priority and update frequency is helpful when preparing a sitemap. I also like that I can copy the XML output or download it directly instead of building the file manually.”
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <div class="sm-author-info">
                            <h6 class="mb-0">Abdelrahman Abdelhamid</h6>
                            <p class="text-muted fs-13 mb-0">Web Developer</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">
                            <i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i>
                        </div>
                        <p class="sm-review-quote">
                            “We needed a quick way to create a sitemap for a website with multiple pages. The interface is easy to understand, and not having to register makes it convenient for occasional SEO tasks.”
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <div class="sm-author-info">
                            <h6 class="mb-0">Fouzia Rehman</h6>
                            <p class="text-muted fs-13 mb-0">Content Marketing Manager</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">
                            <i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i>
                        </div>
                        <p class="sm-review-quote">
                            “I’m not a technical SEO expert, so I appreciate tools that keep things simple. The three-step process makes sitemap creation easier, and the downloaded XML file is convenient to work with.”
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <div class="sm-author-info">
                            <h6 class="mb-0">Vikram Patel</h6>
                            <p class="text-muted fs-13 mb-0">Small Business Owner</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">
                            <i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i>
                        </div>
                        <p class="sm-review-quote">
                            “A handy addition to my website launch checklist. I can generate a sitemap quickly and then move on to checking indexing and other technical SEO requirements.”
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <div class="sm-author-info">
                            <h6 class="mb-0">Kelvin Ledford</h6>
                            <p class="text-muted fs-13 mb-0">SEO Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 15: Frequently Asked Questions -->
<section class="sm-section bg-white" id="faq">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-help-circled"></i> FAQ Guide</span>
            <h2 class="sm-section-title">Frequently Asked Questions</h2>
            <p class="sm-section-subtitle">Answers to common questions about generating, maintaining, and using XML sitemaps.</p>
        </div>

        <div class="accordion max-w-800 mx-auto" id="accordionSitemap">
            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading1">
                    <button class="accordion-button sm-faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                        What is an XML sitemap and why is it important?
                    </button>
                </h2>
                <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        An XML sitemap is a structured file that lists all important pages of your website, helping search engines like Google and Bing discover and index your content more efficiently.
                    </div>
                </div>
            </div>

            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading2">
                    <button class="accordion-button sm-faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                        How does an XML sitemap generator work?
                    </button>
                </h2>
                <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        An XML sitemap generator scans your website, collects all internal URLs, and organizes them into a structured XML file that can be submitted to search engines for better crawling and indexing.
                    </div>
                </div>
            </div>

            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button sm-faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                        Is this free sitemap generator really free?
                    </button>
                </h2>
                <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        Yes. You can use it at no cost and without creating an account. It supports websites with up to 2,000 pages.
                    </div>
                </div>
            </div>

            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading4">
                    <button class="accordion-button sm-faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
                        Do I need an XML sitemap for a small website?
                    </button>
                </h2>
                <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        Yes, even small websites benefit from an XML sitemap as it helps search engines quickly discover all pages, especially if your site has limited internal linking.
                    </div>
                </div>
            </div>

            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading5">
                    <button class="accordion-button sm-faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5">
                        How do I use the generated XML sitemap?
                    </button>
                </h2>
                <div id="faqCollapse5" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        After generating your sitemap, download the XML file and upload it to your website root directory, then submit it through Google Search Console or Bing Webmaster Tools for faster indexing.
                    </div>
                </div>
            </div>

            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading6">
                    <button class="accordion-button sm-faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6">
                        How often should I update my sitemap?
                    </button>
                </h2>
                <div id="faqCollapse6" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        Update it whenever you add, remove, or change important pages. For active sites, regenerate it every few weeks. For large or fast-changing sites, use a plugin or script that updates it automatically.
                    </div>
                </div>
            </div>

            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading7">
                    <button class="accordion-button sm-faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse7">
                        What should I do if my site has more than 2,000 pages?
                    </button>
                </h2>
                <div id="faqCollapse7" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        Split your site into sections and generate a sitemap for each one. Then combine them with a sitemap index file. Large sites can also use a CMS plugin or a custom script.
                    </div>
                </div>
            </div>

            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="faqHeading8">
                    <button class="accordion-button sm-faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse8">
                        Does a sitemap improve my rankings?
                    </button>
                </h2>
                <div id="faqCollapse8" class="accordion-collapse collapse" data-bs-parent="#accordionSitemap">
                    <div class="accordion-body sm-faq-body">
                        A sitemap does not boost rankings on its own. It helps search engines find and index your pages. A page must be indexed before it can rank.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 16: Sitemap Learning Hub -->
<section class="sm-section bg-light" id="learning-hub">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-ios-bookmarks"></i> Technical Resources</span>
            <h2 class="sm-section-title">Sitemap Learning Hub</h2>
            <p class="sm-section-subtitle">Want to go deeper? These guides cover every part of sitemap setup, from basics to fixes.</p>
        </div>

        <div class="row g-4 mb-5">
            <!-- Category 1: The basics -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-learning-card">
                    <div class="sm-learning-title">
                        <i class="ion-document-text text-danger"></i>
                        <span>The Basics</span>
                    </div>
                    <ul class="sm-learning-list">
                        <li><a href="https://www.brandstory.ae/blogs/what-is-an-xml-sitemap-complete-guide-to-sitemap-architecture" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> What Is an XML Sitemap? A Simple Guide</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/why-does-your-website-need-an-xml-sitemap-complete-seo-guide" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> Why Does Your Website Need an XML Sitemap?</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/how-to-create-an-xml-sitemap-step-by-step-detailed-technical-guide" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Create an XML Sitemap Step by Step</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/xml-sitemap-vs-html-sitemap-what-is-the-difference" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> XML Sitemap vs HTML Sitemap: What’s the Difference?</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/xml-sitemap-format-and-structure-tags-lastmod-priority-and-changefreq" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> XML Sitemap Format and Structure Explained (tags, lastmod, priority, changefreq)</a></li>
                    </ul>
                </div>
            </div>

            <!-- Category 2: Sitemap types -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-learning-card">
                    <div class="sm-learning-title">
                        <i class="ion-images text-danger"></i>
                        <span>Sitemap Types</span>
                    </div>
                    <ul class="sm-learning-list">
                        <li><a href="https://www.brandstory.ae/blogs/image-sitemap-what-it-is-and-how-to-create-one" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> Image Sitemap: What It Is and How to Create One</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/video-sitemap-how-to-get-videos-indexed-ranked-in-google" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> Video Sitemap: How to Get Your Videos Indexed</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/news-sitemap-setup-guide-for-digital-publishers" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> News Sitemap: Setup Guide for Publishers</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/html-sitemap-benefits-for-users-and-search-engine-optimization" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> HTML Sitemap: Benefits for Users and SEO</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/sitemap-index-file-how-to-manage-large-websites" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> Sitemap Index File: How to Manage Large Websites</a></li>
                    </ul>
                </div>
            </div>

            <!-- Category 3: Submission and fixes -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-learning-card">
                    <div class="sm-learning-title">
                        <i class="ion-wrench text-danger"></i>
                        <span>Submission & Fixes</span>
                    </div>
                    <ul class="sm-learning-list">
                        <li><a href="https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-google-search-console-step-by-step-guide" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Submit a Sitemap to Google Search Console</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-bing-webmaster-tools-step-by-step-guide" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Submit a Sitemap to Bing Webmaster Tools</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/how-to-add-a-sitemap-to-your-robots-txt-file-step-by-step-guide" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Add a Sitemap to Your robots.txt File</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/sitemap-couldn-t-fetch-or-has-errors-fix-it-in-google-search-console" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> Sitemap Couldn’t Fetch or Has Errors: How to Fix It</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/why-google-is-not-indexing-your-pages-and-how-a-sitemap-helps" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> Why Google Is Not Indexing Your Pages (and How a Sitemap Helps)</a></li>
                    </ul>
                </div>
            </div>

            <!-- Category 4: Crawl health and platforms -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-learning-card">
                    <div class="sm-learning-title">
                        <i class="ion-ios-pulse-strong text-danger"></i>
                        <span>Health & Platforms</span>
                    </div>
                    <ul class="sm-learning-list">
                        <li><a href="https://www.brandstory.ae/blogs/crawl-budget-how-sitemaps-help-search-engines-crawl-your-site" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> Crawl Budget Explained: How Sitemaps Help Search Engines Crawl Your Site</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/how-to-find-and-fix-broken-links-that-hurt-your-sitemap" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Find and Fix Broken Links That Hurt Your Sitemap</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wordpress-step-by-step-guide" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Create a Sitemap for WordPress</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-shopify-setup-and-submission-guide" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Create a Sitemap for Shopify</a></li>
                        <li><a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wix-webflow-or-custom-websites" target="_blank" rel="noopener"><i class="ion-arrow-right-b"></i> How to Create a Sitemap for Wix, Webflow or Custom Websites</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Topic & Link Complete Directory Table -->
        <!-- <div class="sm-table-card">
            <div class="p-3 px-4 bg-light border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
                <h5 class="fw-700 text-dark mb-0 fs-16"><i class="ion-ios-list-outline text-danger me-2"></i> Complete Sitemap Guides & Technical Directory</h5>
                <span class="text-muted fs-13">20 In-Depth Articles & Tutorials</span>
            </div>
            <div class="table-responsive">
                <table class="sm-table">
                    <thead>
                        <tr>
                            <th style="width: 45%;">Topic</th>
                            <th style="width: 55%;">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>What Is an XML Sitemap? A Simple Guide</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/what-is-an-xml-sitemap-complete-guide-to-sitemap-architecture" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/what-is-an-xml-sitemap-complete-guide-to-sitemap-architecture</a></td>
                        </tr>
                        <tr>
                            <td><strong>Why Does Your Website Need an XML Sitemap?</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/why-does-your-website-need-an-xml-sitemap-complete-seo-guide" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/why-does-your-website-need-an-xml-sitemap-complete-seo-guide</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Create an XML Sitemap Step by Step</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-create-an-xml-sitemap-step-by-step-detailed-technical-guide" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-create-an-xml-sitemap-step-by-step-detailed-technical-guide</a></td>
                        </tr>
                        <tr>
                            <td><strong>XML Sitemap vs HTML Sitemap: What’s the Difference?</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/xml-sitemap-vs-html-sitemap-what-is-the-difference" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/xml-sitemap-vs-html-sitemap-what-is-the-difference</a></td>
                        </tr>
                        <tr>
                            <td><strong>XML Sitemap Format and Structure Explained (tags, lastmod, priority, changefreq)</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/xml-sitemap-format-and-structure-tags-lastmod-priority-and-changefreq" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/xml-sitemap-format-and-structure-tags-lastmod-priority-and-changefreq</a></td>
                        </tr>
                        <tr>
                            <td><strong>Image Sitemap: What It Is and How to Create One</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/image-sitemap-what-it-is-and-how-to-create-one" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/image-sitemap-what-it-is-and-how-to-create-one</a></td>
                        </tr>
                        <tr>
                            <td><strong>Video Sitemap: How to Get Your Videos Indexed</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/video-sitemap-how-to-get-videos-indexed-ranked-in-google" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/video-sitemap-how-to-get-videos-indexed-ranked-in-google</a></td>
                        </tr>
                        <tr>
                            <td><strong>News Sitemap: Setup Guide for Publishers</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/news-sitemap-setup-guide-for-digital-publishers" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/news-sitemap-setup-guide-for-digital-publishers</a></td>
                        </tr>
                        <tr>
                            <td><strong>HTML Sitemap: Benefits for Users and SEO</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/html-sitemap-benefits-for-users-and-search-engine-optimization" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/html-sitemap-benefits-for-users-and-search-engine-optimization</a></td>
                        </tr>
                        <tr>
                            <td><strong>Sitemap Index File: How to Manage Large Websites</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/sitemap-index-file-how-to-manage-large-websites" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/sitemap-index-file-how-to-manage-large-websites</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Submit a Sitemap to Google Search Console</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-google-search-console-step-by-step-guide" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-google-search-console-step-by-step-guide</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Submit a Sitemap to Bing Webmaster Tools</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-bing-webmaster-tools-step-by-step-guide" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-submit-a-sitemap-to-bing-webmaster-tools-step-by-step-guide</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Add a Sitemap to Your robots.txt File</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-add-a-sitemap-to-your-robots-txt-file-step-by-step-guide" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-add-a-sitemap-to-your-robots-txt-file-step-by-step-guide</a></td>
                        </tr>
                        <tr>
                            <td><strong>Sitemap Couldn’t Fetch or Has Errors: How to Fix It</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/sitemap-couldn-t-fetch-or-has-errors-fix-it-in-google-search-console" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/sitemap-couldn-t-fetch-or-has-errors-fix-it-in-google-search-console</a></td>
                        </tr>
                        <tr>
                            <td><strong>Why Google Is Not Indexing Your Pages (and How a Sitemap Helps)</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/why-google-is-not-indexing-your-pages-and-how-a-sitemap-helps" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/why-google-is-not-indexing-your-pages-and-how-a-sitemap-helps</a></td>
                        </tr>
                        <tr>
                            <td><strong>Crawl Budget Explained: How Sitemaps Help Search Engines Crawl Your Site</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/crawl-budget-how-sitemaps-help-search-engines-crawl-your-site" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/crawl-budget-how-sitemaps-help-search-engines-crawl-your-site</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Find and Fix Broken Links That Hurt Your Sitemap</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-find-and-fix-broken-links-that-hurt-your-sitemap" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-find-and-fix-broken-links-that-hurt-your-sitemap</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Create a Sitemap for WordPress</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wordpress-step-by-step-guide" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wordpress-step-by-step-guide</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Create a Sitemap for Shopify</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-shopify-setup-and-submission-guide" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-shopify-setup-and-submission-guide</a></td>
                        </tr>
                        <tr>
                            <td><strong>How to Create a Sitemap for Wix, Webflow or Custom Websites</strong></td>
                            <td><a href="https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wix-webflow-or-custom-websites" target="_blank" rel="noopener" class="text-danger fw-600 text-break">https://www.brandstory.ae/blogs/how-to-create-a-sitemap-for-wix-webflow-or-custom-websites</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</section>

<!-- Section 17: Generate Your XML Sitemap Now (Final CTA) -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="sm-cta-banner">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <span class="badge bg-danger text-white px-3 py-2 rounded-pill fs-12 fw-700 mb-3 text-uppercase">Start Indexing Today</span>
                    <h3 class="text-white fw-800 fs-32 mb-2">Generate Your XML Sitemap Now</h3>
                    <p class="text-white-50 fs-16 mb-2">
                        A clean sitemap is one of the easiest technical SEO wins. It takes a few minutes and helps search engines find your best pages. Enter your website URL above and use our free XML sitemap generator to build your file today.
                    </p>
                    <p class="text-white-50 fs-15 mb-0">
                        Need help with more than a sitemap? BrandStory offers full technical SEO and SEO audit services for businesses in Dubai and across the UAE.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end d-flex flex-column gap-2 align-items-lg-end">
                    <a href="#sitemapForm" class="sm-cta-btn" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                        <span>Create Sitemap Now</span>
                        <i class="ion-arrow-up-c"></i>
                    </a>
                    <a href="/contact" class="btn btn-outline-light px-4 py-2 rounded-3 fs-14 fw-600 open-popup-btn">
                        Contact BrandStory SEO Team
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client-side Logic -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentEventSource = null;
    let timerInterval = null;

    const sitemapForm = document.getElementById('sitemapForm');
    if (!sitemapForm) return;

    function escapeHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    const liveFeedContainer = document.getElementById('liveFeedContainer');
    function addFeedItem(tag, text, isSuccess) {
        if (!liveFeedContainer) return;
        const feedItem = document.createElement('div');
        feedItem.className = 'sm-feed-item';
        const tagClass = isSuccess ? 'code text-success' : 'code';
        feedItem.innerHTML = `<span class="${tagClass}">[${tag}]</span> ${escapeHtml(text)}`;
        liveFeedContainer.appendChild(feedItem);
        if (liveFeedContainer.children.length > 50) {
            liveFeedContainer.removeChild(liveFeedContainer.firstChild);
        }
        liveFeedContainer.scrollTop = liveFeedContainer.scrollHeight;
    }

    sitemapForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const btn = document.getElementById('generateBtn');
        const spinner = btn ? btn.querySelector('.spinner-border') : null;
        const btnText = btn ? btn.querySelector('.btn-text') : null;
        let urlInput = document.getElementById('url') ? document.getElementById('url').value.trim() : '';
        const changefreq = document.getElementById('changefreq') ? document.getElementById('changefreq').value : 'weekly';
        const priority = document.getElementById('priority') ? document.getElementById('priority').value : '0.5';

        if (!urlInput) return;
        if (!/^https?:\/\//i.test(urlInput)) {
            urlInput = 'https://' + urlInput;
            if (document.getElementById('url')) document.getElementById('url').value = urlInput;
        }

        // UI references
        const setupBadge = document.getElementById('setupBadge');
        const liveStatusBadge = document.getElementById('liveStatusBadge');
        const statusText = document.getElementById('statusText');
        const idleStateView = document.getElementById('idleStateView');
        const activeCrawlView = document.getElementById('activeCrawlView');
        const completedView = document.getElementById('completedView');

        const displayWebsite = document.getElementById('displayWebsite');
        const displayCurrentPage = document.getElementById('displayCurrentPage');
        const meterDiscoveredCount = document.getElementById('meterDiscoveredCount');
        const meterAddedCount = document.getElementById('meterAddedCount');
        const meterSkippedCount = document.getElementById('meterSkippedCount');
        const meterCircle = document.getElementById('meterCircle');
        const displayTimeRemaining = document.getElementById('displayTimeRemaining');

        let targetDomain = '';
        try {
            const parsed = new URL(urlInput);
            targetDomain = parsed.hostname;
            if (displayWebsite) displayWebsite.innerText = parsed.origin + '/';
        } catch(err) {
            if (displayWebsite) displayWebsite.innerText = urlInput;
            targetDomain = urlInput;
        }

        // Switch UI to Active Crawling state
        if (idleStateView) idleStateView.classList.add('d-none');
        if (completedView) {
            completedView.classList.remove('d-flex');
            completedView.classList.add('d-none');
        }
        if (activeCrawlView) {
            activeCrawlView.classList.remove('d-none');
            activeCrawlView.classList.add('d-flex');
        }

        if (liveStatusBadge) liveStatusBadge.className = 'sm-status-indicator status-crawling';
        if (statusText) statusText.innerText = 'Scanning Active';
        if (setupBadge) {
            setupBadge.className = 'sm-status-indicator status-crawling';
            setupBadge.innerText = 'Processing';
        }

        if (btn) btn.disabled = true;
        if (spinner) spinner.classList.remove('d-none');
        if (btnText) btnText.innerText = 'Crawling in Progress...';

        if (displayCurrentPage) displayCurrentPage.innerText = 'Connecting to ' + targetDomain + '...';

        // Clear feed and initialize
        if (liveFeedContainer) {
            liveFeedContainer.innerHTML = '';
        }
        addFeedItem('INIT', 'Connecting to host ' + targetDomain + '...', false);

        const circumference = 596.9; // 2 * PI * 95
        function updateMeter(pct) {
            if (meterCircle) {
                const offset = circumference - (pct / 100) * circumference;
                meterCircle.style.strokeDashoffset = offset;
            }
        }

        if (meterDiscoveredCount) meterDiscoveredCount.innerText = '1';
        if (meterAddedCount) meterAddedCount.innerText = '0';
        if (meterSkippedCount) meterSkippedCount.innerText = '0';
        updateMeter(10);
        if (meterCircle) meterCircle.style.stroke = '#00f2fe';

        let secondsRemaining = 35;
        clearInterval(timerInterval);
        timerInterval = setInterval(() => {
            if (secondsRemaining > 1) {
                secondsRemaining--;
                const mins = Math.floor(secondsRemaining / 60);
                const secs = secondsRemaining % 60;
                if (displayTimeRemaining) displayTimeRemaining.innerText = mins + ':' + (secs < 10 ? '0' : '') + secs;
            } else {
                if (displayTimeRemaining) displayTimeRemaining.innerText = 'Finalizing XML schema...';
            }
        }, 1000);

        // Close any existing event stream
        if (currentEventSource) {
            currentEventSource.close();
            currentEventSource = null;
        }

        const streamUrl = '<?= route('xmlsitemapgenerator.stream') ?>?url=' + encodeURIComponent(urlInput) + '&changefreq=' + encodeURIComponent(changefreq) + '&priority=' + encodeURIComponent(priority);
        currentEventSource = new EventSource(streamUrl);

        currentEventSource.onmessage = function(e) {
            try {
                const data = JSON.parse(e.data);

                if (data.type === 'init') {
                    if (displayWebsite) displayWebsite.innerText = 'https://' + data.domain + '/';
                    if (displayCurrentPage) displayCurrentPage.innerText = data.url;
                    if (meterDiscoveredCount) meterDiscoveredCount.innerText = data.discovered;
                    if (meterAddedCount) meterAddedCount.innerText = data.added;
                    if (meterSkippedCount) meterSkippedCount.innerText = data.skipped;
                    addFeedItem('INIT', 'Engine ready for ' + data.domain, false);
                } else if (data.type === 'fetching') {
                    if (displayCurrentPage) displayCurrentPage.innerText = data.url;
                    if (meterDiscoveredCount) meterDiscoveredCount.innerText = data.discovered;
                    if (meterAddedCount) meterAddedCount.innerText = data.added;
                    if (meterSkippedCount) meterSkippedCount.innerText = data.skipped;
                    addFeedItem('FETCH', data.url, false);
                } else if (data.type === 'verified') {
                    if (displayCurrentPage) displayCurrentPage.innerText = data.url;
                    if (meterDiscoveredCount) meterDiscoveredCount.innerText = data.discovered;
                    if (meterAddedCount) meterAddedCount.innerText = data.added;
                    if (meterSkippedCount) meterSkippedCount.innerText = data.skipped;

                    const pct = Math.min(95, Math.max(12, Math.round((data.added / Math.max(data.discovered, 1)) * 100)));
                    updateMeter(pct);

                    const extra = data.new_links > 0 ? ` (+${data.new_links} discovered)` : '';
                    addFeedItem('200 OK', data.url + extra, true);
                } else if (data.type === 'skipped') {
                    if (meterSkippedCount) meterSkippedCount.innerText = data.skipped;
                } else if (data.type === 'complete') {
                    if (currentEventSource) {
                        currentEventSource.close();
                        currentEventSource = null;
                    }
                    clearInterval(timerInterval);

                    updateMeter(100);
                    if (meterCircle) meterCircle.style.stroke = '#10b981';

                    const totalPages = data.total_added ?? data.pages_found ?? 0;
                    const totalDiscovered = data.total_discovered ?? totalPages;
                    const totalSkipped = data.total_skipped ?? 0;

                    if (meterDiscoveredCount) meterDiscoveredCount.innerText = totalDiscovered;
                    if (meterAddedCount) meterAddedCount.innerText = totalPages;
                    if (meterSkippedCount) meterSkippedCount.innerText = totalSkipped;

                    addFeedItem('DONE', `Crawl complete! Total ${totalPages} valid HTML URLs compiled.`, true);

                    setTimeout(() => {
                        // Transition to Completed View
                        if (activeCrawlView) {
                            activeCrawlView.classList.remove('d-flex');
                            activeCrawlView.classList.add('d-none');
                        }
                        if (completedView) {
                            completedView.classList.remove('d-none');
                            completedView.classList.add('d-flex');
                        }

                        if (liveStatusBadge) liveStatusBadge.className = 'sm-status-indicator status-completed';
                        if (statusText) statusText.innerText = 'Completed';
                        if (setupBadge) {
                            setupBadge.className = 'sm-status-indicator status-standby';
                            setupBadge.innerText = 'Ready';
                        }

                        const finalTotalBadge = document.getElementById('finalTotalBadge');
                        const finalDiscoveredCount = document.getElementById('finalDiscoveredCount');
                        const finalAddedCount = document.getElementById('finalAddedCount');
                        const finalSkippedCount = document.getElementById('finalSkippedCount');
                        const xmlPreview = document.getElementById('xmlPreview');

                        if (finalTotalBadge) finalTotalBadge.innerText = totalPages + ' URLs Compiled';
                        if (finalDiscoveredCount) finalDiscoveredCount.innerText = totalDiscovered;
                        if (finalAddedCount) finalAddedCount.innerText = totalPages;
                        if (finalSkippedCount) finalSkippedCount.innerText = totalSkipped;
                        if (xmlPreview) xmlPreview.textContent = data.xml || '';

                        if (btn) btn.disabled = false;
                        if (spinner) spinner.classList.add('d-none');
                        if (btnText) btnText.innerText = 'Start Sitemap Crawl';
                    }, 800);
                } else if (data.type === 'error') {
                    if (currentEventSource) {
                        currentEventSource.close();
                        currentEventSource = null;
                    }
                    clearInterval(timerInterval);
                    alert(data.message || 'Error occurred during crawling operation.');
                    resetToIdle();
                }
            } catch (err) {
                console.error('SSE Parse Error:', err, e.data);
            }
        };

        currentEventSource.onerror = function(err) {
            console.error('SSE Connection Event:', err);
            // If the connection drops before completion
            if (currentEventSource) {
                currentEventSource.close();
                currentEventSource = null;
            }
            clearInterval(timerInterval);
            // If we already transitioned to completed, don't reset
            if (completedView && !completedView.classList.contains('d-none')) {
                return;
            }
            resetToIdle('Crawl connection closed.');
        };
    });

    // Cancel Process Button
    const cancelBtn = document.getElementById('cancelProcessBtn');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            if (currentEventSource) {
                currentEventSource.close();
                currentEventSource = null;
            }
            resetToIdle('Crawl process stopped by user.');
        });
    }

    function resetToIdle(msg) {
        if (currentEventSource) {
            currentEventSource.close();
            currentEventSource = null;
        }
        clearInterval(timerInterval);

        const idleStateView = document.getElementById('idleStateView');
        const activeCrawlView = document.getElementById('activeCrawlView');
        const completedView = document.getElementById('completedView');
        const liveStatusBadge = document.getElementById('liveStatusBadge');
        const statusText = document.getElementById('statusText');
        const setupBadge = document.getElementById('setupBadge');
        const btn = document.getElementById('generateBtn');
        const spinner = btn ? btn.querySelector('.spinner-border') : null;
        const btnText = btn ? btn.querySelector('.btn-text') : null;

        if (activeCrawlView) {
            activeCrawlView.classList.remove('d-flex');
            activeCrawlView.classList.add('d-none');
        }
        if (completedView) {
            completedView.classList.remove('d-flex');
            completedView.classList.add('d-none');
        }
        if (idleStateView) idleStateView.classList.remove('d-none');

        if (liveStatusBadge) liveStatusBadge.className = 'sm-status-indicator status-standby';
        if (statusText) statusText.innerText = 'Standby';
        if (setupBadge) {
            setupBadge.className = 'sm-status-indicator status-standby';
            setupBadge.innerText = 'Ready';
        }

        if (btn) btn.disabled = false;
        if (spinner) spinner.classList.add('d-none');
        if (btnText) btnText.innerText = 'Start Sitemap Crawl';

        if (msg) {
            const feed = document.getElementById('liveFeedContainer');
            if (feed) feed.innerHTML = '<div class="sm-feed-item text-warning">' + msg + '</div>';
        }
    }

    // Copy XML to clipboard
    const copyBtn = document.getElementById('copyBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', function() {
            const xml = document.getElementById('xmlPreview') ? document.getElementById('xmlPreview').textContent : '';
            if (!xml) return;

            navigator.clipboard.writeText(xml).then(() => {
                const originalHtml = this.innerHTML;
                this.innerHTML = '<i class="ion-checkmark"></i><span>Copied to Clipboard!</span>';
                this.style.background = '#10b981';
                this.style.borderColor = '#10b981';

                setTimeout(() => {
                    this.innerHTML = originalHtml;
                    this.style.background = '';
                    this.style.borderColor = '';
                }, 2000);
            });
        });
    }

    // Download XML File
    const downloadBtn = document.getElementById('downloadBtn');
    if (downloadBtn) {
        downloadBtn.addEventListener('click', () => {
            const xml = document.getElementById('xmlPreview') ? document.getElementById('xmlPreview').textContent : '';
            if (!xml) return;

            const blob = new Blob([xml], { type: 'application/xml;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'sitemap.xml';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
    }
});
</script>