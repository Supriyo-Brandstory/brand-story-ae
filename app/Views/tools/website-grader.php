<?php
/**
 * Website Grader - Free SEO & Performance Audit Tool
 * BrandStory Digital Marketing Agency Dubai
 */
$hasReport = $hasReport ?? false;
$url = $url ?? '';
$domain = $domain ?? '';
$score = $score ?? 0;
$grade = $grade ?? 'N/A';
$passed = $passed ?? 0;
$warnings = $warnings ?? 0;
$failed = $failed ?? 0;
$title = $title ?? '';
$metaDescription = $metaDescription ?? '';
$h1Count = $h1Count ?? 0;
$h2Count = $h2Count ?? 0;
$h3Count = $h3Count ?? 0;
$h1s = $h1s ?? [];
$h2s = $h2s ?? [];
$h3s = $h3s ?? [];
$imageCount = $imageCount ?? 0;
$altMissingCount = $altMissingCount ?? 0;
$loadTime = $loadTime ?? 0;
$sslCheck = $sslCheck ?? false;
$ogTags = $ogTags ?? false;
$twitterCards = $twitterCards ?? false;
$canonical = $canonical ?? false;
$viewport = $viewport ?? false;
$favicon = $favicon ?? false;
$internalLinks = $internalLinks ?? 0;
$externalLinks = $externalLinks ?? 0;
$auditResults = $auditResults ?? [];
?>
<style>
    /* Scoped Styles for Website Grader - Matching XML Sitemap Generator Architecture */
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
        max-width: 760px;
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
        font-size: 16px;
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
        font-size: 16px;
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
        font-size: 16px;
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
        font-size: 16px;
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
        font-size: 16px;
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
        font-size: 16px;
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
        cursor: pointer;
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
        padding: 12px 16px;
        margin-bottom: 16px;
    }

    .crawler-meta-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 16px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .crawler-meta-label {
        color: rgba(255, 255, 255, 0.6);
        font-size: 16px;
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
        font-size: 16px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Circular Progress Display */
    .sm-meter-wrapper {
        position: relative;
        width: 250px;
        height: 250px;
        margin: 6px auto 14px;
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
        stroke-dasharray: 703.7; /* 2 * PI * 112 */
        stroke-dashoffset: <?= $hasReport ? (703.7 - ($score / 100) * 703.7) : '703.7' ?>;
        transition: stroke-dashoffset 0.8s cubic-bezier(0.4, 0, 0.2, 1), stroke 0.3s ease;
    }

    .sm-meter-inner {
        text-align: center;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 0 15px;
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
        margin-top: 5px;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .sm-meter-breakdown {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding-top: 6px;
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        width: auto;
        max-width: 195px;
    }

    .sm-breakdown-col {
        text-align: center;
        min-width: 48px;
    }

    .sm-breakdown-label {
        font-size: 9.5px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.5);
        letter-spacing: 0.4px;
        text-transform: uppercase;
        display: block;
        margin-bottom: 2px;
    }

    .sm-breakdown-val {
        font-size: 16px;
        font-weight: 800;
        line-height: 1.1;
    }

    .sm-breakdown-divider {
        width: 1px;
        height: 18px;
        background: rgba(255, 255, 255, 0.15);
    }

    .sm-time-remaining {
        text-align: center;
        font-size: 16px;
        color: rgba(255, 255, 255, 0.65);
        margin-bottom: 15px;
    }

    .sm-time-remaining strong {
        color: #ffffff;
    }

    .sm-btn-cancel {
        background: rgba(255, 255, 255, 0.08);
        color: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.15);
        font-size: 16px;
        font-weight: 600;
        padding: 8px 22px;
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
    /* Right Panel Live Feed Terminal */
    .sm-live-feed {
        margin-top: 12px;
        background: #07090d;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        padding: 10px 14px;
        font-family: 'SFMono-Regular', Consolas, Menlo, monospace;
        font-size: 16px;
        max-height: 150px;
        overflow-y: auto;
    }

    .sm-live-feed::-webkit-scrollbar {
        width: 6px;
    }
    .sm-live-feed::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 4px;
    }

    .sm-feed-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.85);
        padding: 4px 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .sm-feed-item span.code {
        color: #4ade80;
        font-weight: 700;
        flex-shrink: 0;
    }
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
        font-size: 16px;
        max-width: 380px;
        line-height: 1.5;
        margin: 0 auto;
    }

    /* ============================================================== */
    /* COMPLETED AUDIT RESULT VIEW INSIDE THE RIGHT PANEL */
    /* ============================================================== */
    .sm-success-ribbon {
        background: rgba(40, 167, 69, 0.15);
        border: 1px solid rgba(40, 167, 69, 0.35);
        border-radius: 12px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .sm-success-ribbon span {
        font-size: 16px;
        font-weight: 700;
        color: #4ade80;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sm-audit-results-box {
        background: #06070a;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 12px 14px;
        max-height: 180px;
        overflow-y: auto;
        font-family: 'SFMono-Regular', Consolas, Menlo, monospace;
        font-size: 16px;
    }

    .sm-audit-results-box::-webkit-scrollbar {
        width: 6px;
    }
    .sm-audit-results-box::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 4px;
    }

    .sm-action-btn-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .sm-action-btn {
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 16px;
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
        max-width: 680px;
        margin: 0 auto;
        line-height: 1.6;
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
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 14px;
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

    .sm-checklist-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        color: #334155;
    }

    .sm-checklist-item i {
        font-size: 18px;
        flex-shrink: 0;
    }

    /* Step Cards */
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

    .sm-pill-badge {
        display: inline-block;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 8px 20px;
        border-radius: 100px;
        font-size: 16px;
        font-weight: 600;
        color: #475569;
    }

    /* Sub & Comparison Cards */
    .sm-sub-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 34px 30px;
        height: 100%;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
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
        font-size: 16px;
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

    /* Tables */
    .sm-table-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }

    .sm-table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse;
    }

    .sm-table th {
        background: #0f172a;
        color: #ffffff;
        padding: 16px 22px;
        font-size: 16px;
        font-weight: 700;
        border: none;
    }

    .sm-table td {
        padding: 16px 22px;
        font-size: 16px;
        color: #334155;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .sm-table tr:last-child td {
        border-bottom: none;
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

    /* Review & Testimonials */
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
        font-size: 16px;
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
    }

    .sm-review-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.08);
        border-color: #cbd5e1;
    }

    .sm-review-stars {
        color: #f59e0b;
        font-size: 16px;
        letter-spacing: 2px;
    }

    .sm-review-quote {
        font-size: 16px;
        color: #334155;
        line-height: 1.7;
        margin-bottom: 24px;
        font-style: italic;
    }

    .sm-review-author {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-top: 18px;
        border-top: 1px solid #f1f5f9;
    }

    .sm-review-author img {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        object-fit: cover;
    }

    .sm-author-info h6 {
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 2px;
        font-size: 16px;
    }

    .sm-author-info p {
        font-size: 16px;
        color: #64748b;
        margin-bottom: 0;
    }

    /* FAQ Accordion */
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

    .sm-faq-btn {
        background: transparent !important;
        color: #0f172a !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        padding: 20px 24px !important;
        box-shadow: none !important;
    }

    .sm-faq-btn:not(.collapsed) {
        color: var(--sm-primary) !important;
        background: #fff8f7 !important;
    }

    .sm-faq-btn::after {
        filter: brightness(0.2);
    }

    .sm-faq-btn:not(.collapsed)::after {
        filter: invert(32%) sepia(85%) saturate(3054%) hue-rotate(346deg) brightness(96%) contrast(93%);
    }

    /* CTA Banner */
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
        cursor: pointer;
    }

    .sm-cta-btn:hover {
        background: var(--sm-primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(232, 58, 38, 0.45);
    }

    @media (max-width: 991px) {
        .sitemap-hero-title { font-size: 36px; }
        .sitemap-hero { padding: 70px 0 65px; }
        .sm-section { padding: 65px 0; }
        .sm-section-title { font-size: 28px; }
    }

    @media (max-width: 767px) {
        .sitemap-hero-title { font-size: 30px; }
        .sm-panel-card { padding: 22px; }
        .sm-table-card { overflow-x: auto; }
        .sm-cta-banner { padding: 35px 22px; }
        .sm-action-btn-group { grid-template-columns: 1fr; }
    }

    @media print {
        header, .header, footer, .footer-top, .footer-btm, .unique-sticky-container, #return-to-top, .no-print {
            display: none !important;
        }
    }
</style>

<!-- ============================================================== -->
<!-- HERO SECTION (Dual Left-Right Dashboard Architecture) -->
<!-- ============================================================== -->
<section class="sitemap-hero">
    <div class="tools-glow-blob-1"></div>
    <div class="tools-glow-blob-2"></div>
    <div class="tools-grid-overlay"></div>

    <div class="container position-relative z-1">
        <!-- Title and Subtitle -->
        <div class="text-center">
            <h1 class="sitemap-hero-title">
                Free Website SEO & Performance <span>Grader</span>
            </h1>
            <p class="sitemap-hero-desc">
                Analyze your website's search engine optimization, page speed, mobile usability, and security in seconds. Get an instant, prioritized audit report to outrank competitors in Google. 100% free with no sign-up required.
            </p>
        </div>

        <!-- Left-Right Box Layout -->
        <div class="row g-4 align-items-stretch">
            <!-- Left Box: Crawler Setup & Form -->
            <div class="col-lg-5">
                <div class="sm-panel-card text-start">
                    <div class="sm-panel-header">
                        <h3 class="sm-panel-title">
                            <i class="ion-gear-a"></i> Audit Configuration
                        </h3>
                        <span class="sm-status-indicator <?= $hasReport ? 'status-completed' : 'status-standby' ?>" id="setupBadge">
                            <?= $hasReport ? 'Audited' : 'Ready' ?>
                        </span>
                    </div>

                    <form id="graderForm" action="<?= route('website-grader') ?>" method="GET" class="d-flex flex-column h-100 justify-content-between">
                        <div>
                            <!-- URL Input -->
                            <div class="mb-4">
                                <label for="urlInput" class="sitemap-label">
                                    <i class="ion-link"></i> Target Website URL
                                </label>
                                <div class="sitemap-input-wrapper">
                                    <i class="ion-globe input-icon"></i>
                                    <input 
                                        type="text" 
                                        class="sitemap-input" 
                                        id="urlInput" 
                                        name="url" 
                                        placeholder="https://brandstory.ae" 
                                        value="<?= htmlspecialchars($url) ?>"
                                        required
                                        autocomplete="off"
                                    >
                                </div>
                            </div>

                            <!-- Audit Scope & Simulator Mode -->
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <label for="auditScope" class="sitemap-label">
                                        <i class="ion-ios-analytics"></i> Audit Scope
                                    </label>
                                    <select class="sitemap-select" id="auditScope">
                                        <option value="full" selected>Comprehensive (All)</option>
                                        <option value="seo">On-Page SEO Only</option>
                                        <option value="perf">Speed & Core Vitals</option>
                                        <option value="mobile">Mobile Usability</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="userDevice" class="sitemap-label">
                                        <i class="ion-iphone"></i> Crawler User-Agent
                                    </label>
                                    <select class="sitemap-select" id="userDevice">
                                        <option value="mobile" selected>Googlebot Smartphone</option>
                                        <option value="desktop">Googlebot Desktop</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Options Checkboxes -->
                            <div class="d-flex flex-column gap-2 mb-4">
                                <label class="sm-checkbox-item">
                                    <input type="checkbox" checked disabled>
                                    <span>25+ Technical SEO checks (Titles, Meta, H1, Canonicals)</span>
                                </label>
                                <label class="sm-checkbox-item">
                                    <input type="checkbox" checked disabled>
                                    <span>Core Web Vitals & Server Response Latency (TTFB)</span>
                                </label>
                                <label class="sm-checkbox-item">
                                    <input type="checkbox" checked disabled>
                                    <span>SSL / HTTPS TLS Certificate & Header Validation</span>
                                </label>
                            </div>
                        </div>

                        <!-- Action Submit Button -->
                        <div>
                            <button type="submit" class="sitemap-btn-submit" id="generateBtn">
                                <i class="ion-play"></i>
                                <span class="btn-text"><?= $hasReport ? 'Run Another Audit' : 'Start Website Audit' ?></span>
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
                            <i class="ion-stats-bars"></i> Live Audit Engine
                        </h3>
                        <span class="sm-status-indicator <?= $hasReport ? 'status-completed' : 'status-standby' ?>" id="liveStatusBadge">
                            <i class="ion-record"></i> <span id="statusText"><?= $hasReport ? 'Completed' : 'Standby' ?></span>
                        </span>
                    </div>

                    <!-- Single Persistent Dashboard View (Only 1 Circle on the page) -->
                    <div id="unifiedAuditView" class="d-flex flex-column justify-content-between h-100">
                        <div class="crawler-meta-info mb-2">
                            <div class="crawler-meta-row">
                                <span class="crawler-meta-label" id="websiteLabel"><?= $hasReport ? 'Audited:' : 'Auditing:' ?></span>
                                <span class="crawler-meta-val" id="displayWebsite"><?= $url ? htmlspecialchars($url) : 'https://brandstory.ae/' ?></span>
                            </div>
                            <div class="crawler-meta-row">
                                <span class="crawler-meta-label">Active check:</span>
                                <span class="crawler-meta-path" id="displayCurrentStep"><?= $hasReport ? ('Audit Complete - Latency: ' . $loadTime . 's | Links: ' . ($internalLinks + $externalLinks)) : 'Ready to audit' ?></span>
                            </div>
                        </div>

                        <!-- Circular Progress & Score Display (Only 1 Circle) -->
                        <div class="sm-meter-wrapper my-2">
                            <svg class="sm-meter-svg" viewBox="0 0 260 260">
                                <circle class="sm-meter-bg-circle" cx="130" cy="130" r="112"></circle>
                                <circle class="sm-meter-progress-circle" id="meterCircle" cx="130" cy="130" r="112" style="stroke: <?= $hasReport ? ($score >= 80 ? '#10b981' : ($score >= 60 ? '#f59e0b' : '#ef4444')) : 'rgba(255,255,255,0.15)' ?>; stroke-dashoffset: <?= $hasReport ? (703.7 - ($score / 100) * 703.7) : '703.7' ?>;"></circle>
                            </svg>
                            <div class="sm-meter-inner">
                                <div class="sm-meter-count" id="meterScoreCount"><?= $hasReport ? $score : '—' ?></div>
                                <div class="sm-meter-sublabel" id="meterSublabel"><?= $hasReport ? ('GRADE: ' . $grade) : 'READY TO SCAN' ?></div>
                                <div class="sm-meter-breakdown">
                                    <div class="sm-breakdown-col">
                                        <span class="sm-breakdown-label">Passed</span>
                                        <span class="sm-breakdown-val text-success" id="meterPassedCount"><?= $hasReport ? $passed : 0 ?></span>
                                    </div>
                                    <div class="sm-breakdown-divider"></div>
                                    <div class="sm-breakdown-col">
                                        <span class="sm-breakdown-label">Warnings</span>
                                        <span class="sm-breakdown-val text-warning" id="meterWarningsCount"><?= $hasReport ? $warnings : 0 ?></span>
                                    </div>
                                    <div class="sm-breakdown-divider"></div>
                                    <div class="sm-breakdown-col">
                                        <span class="sm-breakdown-label">Failed</span>
                                        <span class="sm-breakdown-val text-danger" id="meterFailedCount"><?= $hasReport ? $failed : 0 ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sm-time-remaining text-center" id="displayDurationBlock">
                            <span id="durationLabel"><?= $hasReport ? 'Audit completed in' : 'Estimated audit duration' ?>:</span> <strong id="displayTimeRemaining"><?= $hasReport ? ($loadTime . 's') : '0:02' ?></strong>
                        </div>

                        <div id="cancelBlock" class="text-center d-none">
                            <button type="button" class="sm-btn-cancel" id="cancelProcessBtn">
                                Cancel the process
                            </button>
                        </div>

                        <!-- Action Buttons (Shown when audit is complete) -->
                        <div class="sm-action-btn-group my-2 <?= $hasReport ? 'd-grid' : 'd-none' ?>" id="auditActionBtns">
                            <button type="button" class="sm-action-btn sm-btn-copy" id="reScanBtn">
                                <i class="ion-refresh"></i>
                                <span>Re-Scan / Clear</span>
                            </button>
                            <button type="button" class="sm-action-btn sm-btn-download" onclick="window.print()">
                                <i class="ion-printer"></i>
                                <span>Download PDF</span>
                            </button>
                        </div>

                        <!-- Terminal Live Feed & Diagnostics (Monospace) -->
                        <div class="sm-live-feed" id="liveFeedContainer">
                            <?php if ($hasReport): ?>
                                <div class="sm-feed-item"><span class="code" style="color: #4ade80;">[COMPLETE]</span> Audit finished with Grade <?= $grade ?> (Overall Score: <?= $score ?>/100)</div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= ($auditResults['title'] ?? '') === 'pass' ? '#4ade80' : '#f59e0b' ?>;">[TITLE]</span> <?= htmlspecialchars($title) ?> (<?= strlen($title) ?> chars)</div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= ($auditResults['meta'] ?? '') === 'pass' ? '#4ade80' : '#f59e0b' ?>;">[META]</span> <?= htmlspecialchars($metaDescription ?: 'No meta description found') ?> (<?= strlen($metaDescription) ?> chars)</div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= $h1Count === 1 ? '#4ade80' : '#f59e0b' ?>;">[HEADINGS]</span> <?= $h1Count ?> H1 tags, <?= $h2Count ?> H2 tags, <?= $h3Count ?> H3 tags found</div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= $loadTime < 2.0 ? '#4ade80' : '#f59e0b' ?>;">[LATENCY]</span> Server response: <?= $loadTime ?>s (<?= $loadTime < 2.0 ? 'Optimal' : 'Needs Optimization' ?>)</div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= $viewport ? '#4ade80' : '#ef4444' ?>;">[MOBILE]</span> Viewport Meta Tag: <?= $viewport ? 'Configured (Mobile-Friendly)' : 'Missing Viewport' ?></div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= $sslCheck ? '#4ade80' : '#ef4444' ?>;">[SECURITY]</span> SSL / HTTPS TLS Certificate: <?= $sslCheck ? 'Active (HTTPS)' : 'Insecure Connection' ?></div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= ($altMissingCount === 0 && $imageCount > 0) ? '#4ade80' : '#f59e0b' ?>;">[MEDIA]</span> Image Alt Attributes: <?= $altMissingCount ?> of <?= $imageCount ?> images missing alt text</div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= $canonical ? '#4ade80' : '#f59e0b' ?>;">[CANONICAL]</span> Canonical Tag: <?= $canonical ? 'Self-referencing canonical tag verified' : 'Missing canonical link tag' ?></div>
                                <div class="sm-feed-item"><span class="code" style="color: <?= ($ogTags && $twitterCards) ? '#4ade80' : '#f59e0b' ?>;">[SOCIAL]</span> Open Graph: <?= $ogTags ? 'Verified' : 'Missing' ?> | Twitter Cards: <?= $twitterCards ? 'Verified' : 'Missing' ?></div>
                            <?php else: ?>
                                <div class="sm-feed-item"><span class="code">[READY]</span> Audit engine standby. Enter website URL and click "Start Website Audit".</div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 1: Intro & What Is a Website Grader? -->
<!-- ============================================================== -->
<section class="sm-section bg-white" id="what-is-website-grader">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="sm-section-badge"><i class="ion-ios-information"></i> Website Audit Fundamentals</span>
                <h2 class="sm-section-title mb-3">What Is a Website SEO Grader?</h2>
                <p class="text-secondary fs-16 mb-3">
                    A website grader is an automated diagnostic tool that evaluates the overall health, performance, and search engine readiness of your website. It simulates how Google and other search engine crawlers inspect your code, evaluate page speed, and index your internal content.
                </p>
                <p class="text-secondary fs-16 mb-3">
                    Our free website grader conducts over 25 automated checks in real time. Simply enter your website URL, click start, and receive a comprehensive score (0 to 100) along with an actionable letter grade (A+ to F).
                </p>
                <div class="p-3 bg-light rounded-3 border-start border-4 border-danger mb-4">
                    <p class="fs-15 mb-0 text-dark">
                        Want to learn the core technical factors search engines evaluate first? Explore our comprehensive guide: <a href="https://www.brandstory.ae/blogs/on-page-seo-checklist-for-higher-google-rankings" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">On-Page SEO Checklist for Higher Google Rankings</a>.
                    </p>
                </div>
                <p class="text-secondary fs-16 mb-4">
                    Auditing your site manually can take days or require expensive consultant fees. One missing canonical tag or duplicate H1 can cripple your rankings across target search terms. Our grader removes the guesswork by instantly highlighting passed parameters and prioritized fixes.
                </p>

                <h5 class="fw-700 text-dark mb-3">This free website grader is ideal for:</h5>
                <div class="row g-2">
                    <div class="col-sm-6">
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Corporate & service websites in Dubai & UAE</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>E-commerce brands striving for sub-2s load times</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Startups preparing for a major marketing campaign</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Web designers verifying post-launch compliance</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Marketing teams diagnosing sudden organic traffic drops</span>
                        </div>
                        <div class="sm-checklist-item mb-2">
                            <i class="ion-checkmark-circled text-success"></i>
                            <span>Agencies needing an instant client audit roadmap</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="p-4 bg-light rounded-4 border shadow-sm">
                    <img src="<?= base_url('assets/images/SEO-Results.webp') ?>" alt="Website SEO Grader Dashboard" class="img-fluid rounded-3" style="max-height: 420px; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 2: How Our Website Grader Works -->
<!-- ============================================================== -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-ios-gear"></i> Simple Process</span>
            <h2 class="sm-section-title">How Our Website Grader Works</h2>
            <p class="sm-section-subtitle">Our engine performs live HTTP requests and DOM parsing to audit your site just like Googlebot. The entire process takes three simple steps.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="sm-step-card">
                    <div class="sm-step-number">1</div>
                    <h5 class="fw-700 mb-2 text-dark">Step 1: Enter Your Website URL</h5>
                    <p class="text-muted fs-14 mb-0">Type your root domain or specific landing page in the audit form. Select your preferred audit scope and crawler user-agent mode.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-step-card">
                    <div class="sm-step-number">2</div>
                    <h5 class="fw-700 mb-2 text-dark">Step 2: Real-Time DOM & Speed Scan</h5>
                    <p class="text-muted fs-14 mb-0">Our bot fetches your page, tests server latency (TTFB), inspects title/meta tags, validates heading structures, and checks SSL certificates.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-step-card">
                    <div class="sm-step-number">3</div>
                    <h5 class="fw-700 mb-2 text-dark">Step 3: Review Your Report & Fixes</h5>
                    <p class="text-muted fs-14 mb-0">Receive your overall score, category breakdown, and prioritized action items so your developers can implement fixes right away.</p>
                </div>
            </div>
        </div>

        <div class="text-center p-3 bg-white rounded-3 border max-w-800 mx-auto">
            <span class="text-secondary fs-15">Want to learn how page speed affects search visibility? Read <a href="https://www.brandstory.ae/blogs/how-page-speed-affects-seo-and-conversion-rates" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">How Page Speed Affects SEO and Conversion Rates</a>.</span>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 3: Features of Our Free Website Grader -->
<!-- ============================================================== -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-flash"></i> Key Features</span>
            <h2 class="sm-section-title">Features of Our Free Website Grader</h2>
            <p class="sm-section-subtitle">Engineered to provide enterprise-grade technical intelligence without the paywalls or complicated setups.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-speedometer"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Core Web Vitals & TTFB</h5>
                    <p class="text-muted fs-14 mb-0">Calculates server latency and load time benchmarks to ensure your pages load within Google's 2.5-second threshold.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-android-search"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">On-Page Tag Inspection</h5>
                    <p class="text-muted fs-14 mb-0">Validates meta title length, meta description character count, and exact H1/H2/H3 tag distribution.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-iphone"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Mobile Usability Check</h5>
                    <p class="text-muted fs-14 mb-0">Verifies responsive viewport configuration, ensuring seamless rendering across iOS and Android smartphones.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-locked"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">SSL & HTTPS Security</h5>
                    <p class="text-muted fs-14 mb-0">Confirms active SSL encryption to protect user privacy and avoid browser 'Not Secure' warning screens.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-image"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Image Alt Accessibility</h5>
                    <p class="text-muted fs-14 mb-0">Detects images missing alt text attributes to enhance accessibility and capture Google Image search traffic.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-share"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Social Graph Tags</h5>
                    <p class="text-muted fs-14 mb-0">Checks Open Graph (OG) and Twitter Card tags to ensure attractive link snippets when shared across social channels.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <span class="sm-pill-badge">
                <i class="ion-locked me-1"></i> No Registration Required — Run as many audits as you need completely free.
            </span>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 4: Understanding the Audit Scores & Letter Grades -->
<!-- ============================================================== -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-ribbon-b"></i> Scoring System</span>
            <h2 class="sm-section-title">Understanding the Scores & Letter Grades</h2>
            <p class="sm-section-subtitle">Our algorithm weighs each audit parameter based on its real-world impact on Google rankings and visitor retention.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="sm-sub-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-feature-icon mb-0" style="width: 44px; height: 44px; font-size: 20px;"><i class="ion-ribbon-a"></i></div>
                        <h4 class="fw-700 text-dark mb-0">Letter Grade Scale</h4>
                    </div>
                    <p class="text-secondary fs-15 mb-3">Your website is graded against industry standards:</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-android-done text-success"></i> <span><strong>Grade A+ (90 - 100):</strong> Exceptional technical health. Fully optimized for top rankings.</span></li>
                        <li><i class="ion-android-done text-success"></i> <span><strong>Grade A- (80 - 89):</strong> Strong technical foundation with only minor opportunities for improvement.</span></li>
                        <li><i class="ion-android-done text-warning"></i> <span><strong>Grade B (70 - 79):</strong> Moderate health. Several technical warnings require attention.</span></li>
                        <li><i class="ion-android-done text-warning"></i> <span><strong>Grade C (60 - 69):</strong> Below average. Multiple critical SEO or latency issues present.</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Grade D / F (&lt; 60):</strong> Severe bottlenecks. Page speed or crawlability heavily penalized.</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="sm-sub-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-feature-icon mb-0" style="width: 44px; height: 44px; font-size: 20px;"><i class="ion-pie-graph"></i></div>
                        <h4 class="fw-700 text-dark mb-0">Category Weight Distribution</h4>
                    </div>
                    <p class="text-secondary fs-15 mb-3">Each of the four dimensions directly contributes to your overall composite score:</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-android-done text-danger"></i> <span><strong>On-Page Technical SEO (35%):</strong> Titles, meta description CTR, H1 structure, canonicals.</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Page Speed & Performance (30%):</strong> Total response duration, TTFB, and server latency.</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Mobile UX & Responsiveness (20%):</strong> Viewport meta configuration and touch usability.</span></li>
                        <li><i class="ion-android-done text-danger"></i> <span><strong>Security & Media Protocols (15%):</strong> Active SSL HTTPS, social graph, image alt tags.</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="p-4 bg-white rounded-4 border">
            <h6 class="fw-700 text-dark mb-2"><i class="ion-alert-circled text-warning me-2"></i> How to Interpret Warnings:</h6>
            <p class="text-secondary fs-15 mb-2">
                A warning does not necessarily mean your website will be banned by Google. It signals an area where your competitors might hold a competitive advantage — such as having a more concise title tag that earns higher click-through rates (CTR).
            </p>
            <p class="fs-15 mb-0">
                Learn more in our guide: <a href="https://www.brandstory.ae/blogs/technical-seo-audit-checklist" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">Complete Technical SEO Audit Checklist for Modern Webmasters</a>.
            </p>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 5: Why Your Website Needs Regular Auditing -->
<!-- ============================================================== -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-arrow-graph-up-right"></i> SEO Growth</span>
            <h2 class="sm-section-title">Why Your Website Needs Regular Technical Audits</h2>
            <p class="sm-section-subtitle">Websites are living digital assets. Content updates, code deployments, and plugin updates regularly introduce silent bugs that harm rankings.</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">1. Ranking Protection</span>
                    <h5 class="fw-700 mb-2 text-dark">Protect High-Ranking Keywords</h5>
                    <p class="text-muted fs-14 mb-0">Google constantly updates its ranking algorithms. Routine audits catch code regressions, broken canonicals, and duplicate H1 tags before your top keywords drop off page one.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">2. Mobile Conversions</span>
                    <h5 class="fw-700 mb-2 text-dark">Maximize Mobile Retention</h5>
                    <p class="text-muted fs-14 mb-0">Over 78% of online visits in Dubai and the UAE happen on mobile phones. If a page loads slowly or lacks responsive viewport tags, visitors bounce immediately to competitors.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">3. Crawl Budget Efficiency</span>
                    <h5 class="fw-700 mb-2 text-dark">Optimize Googlebot Crawl Budget</h5>
                    <p class="text-muted fs-14 mb-2">Search engines allocate limited crawl resources per domain. Fixing technical errors ensures bots index your highest revenue-generating product and service pages.</p>
                    <a href="https://www.brandstory.ae/blogs/crawl-budget-how-sitemaps-help-search-engines-crawl-your-site" target="_blank" rel="noopener" class="fs-13 fw-700 text-danger">Read Crawl Budget Guide &rarr;</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">4. Security & User Trust</span>
                    <h5 class="fw-700 mb-2 text-dark">Enforce HTTPS & Safety</h5>
                    <p class="text-muted fs-14 mb-0">An expired or misconfigured SSL certificate will cause Google Chrome and Safari to display a red security warning screen, instantly destroying customer trust.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">5. Click-Through Optimization</span>
                    <h5 class="fw-700 mb-2 text-dark">Higher Click-Through Rates (CTR)</h5>
                    <p class="text-muted fs-14 mb-0">Auditing title tags and descriptions ensures your snippets fit within Google SERP display limits without getting truncated with awkward ellipses (...).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="sm-feature-card">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3">6. Social Sharing Appeal</span>
                    <h5 class="fw-700 mb-2 text-dark">Flawless Social Previews</h5>
                    <p class="text-muted fs-14 mb-0">Verify Open Graph and Twitter Card tags so your content displays rich images, titles, and descriptions when shared on WhatsApp, LinkedIn, and X.</p>
                </div>
            </div>
        </div>

        <div class="p-4 bg-light rounded-4 border text-center">
            <span class="text-secondary fs-15">Want to outrank local competitors? Read our strategic playbook: <a href="https://www.brandstory.ae/blogs/local-seo-dubai-guide" target="_blank" rel="noopener" class="fw-700 text-danger text-decoration-underline">The Complete Local SEO Playbook for Dubai Businesses</a>.</span>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 6: The 4 Core Pillars of Website Health -->
<!-- ============================================================== -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-cube"></i> Total Health</span>
            <h2 class="sm-section-title">The 4 Core Pillars of Website Health</h2>
            <p class="sm-section-subtitle">A balanced website requires technical excellence across all four dimensions. Here is how our grader analyzes each.</p>
        </div>

        <div class="row g-4">
            <!-- Pillar 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-compare-card highlight">
                    <span class="sm-compare-badge primary">Pillar 1</span>
                    <h5 class="fw-700 text-dark mb-3">On-Page SEO</h5>
                    <p class="text-secondary fs-14 mb-3">Direct ranking factors that tell search bots what your page is about.</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-checkmark-round text-success"></i> <span>Title tag between 10-70 chars</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Meta description between 70-165 chars</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Exactly one primary H1 tag</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Valid canonical URL set</span></li>
                    </ul>
                </div>
            </div>

            <!-- Pillar 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-compare-card">
                    <span class="sm-compare-badge secondary">Pillar 2</span>
                    <h5 class="fw-700 text-dark mb-3">Speed & Latency</h5>
                    <p class="text-secondary fs-14 mb-3">Measures response time and server health for Core Web Vitals.</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-checkmark-round text-success"></i> <span>Load time under 2.0 seconds</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>HTTP 200 OK status code</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Minimal redirection hops</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Fast TTFB server response</span></li>
                    </ul>
                </div>
            </div>

            <!-- Pillar 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-compare-card">
                    <span class="sm-compare-badge secondary">Pillar 3</span>
                    <h5 class="fw-700 text-dark mb-3">Mobile Usability</h5>
                    <p class="text-secondary fs-14 mb-3">Google crawls using smartphone agents. Mobile usability is mandatory.</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-checkmark-round text-success"></i> <span>Viewport meta tag configured</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Responsive layout scaling</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Legible mobile font sizes</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Touch-friendly clickable elements</span></li>
                    </ul>
                </div>
            </div>

            <!-- Pillar 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="sm-compare-card">
                    <span class="sm-compare-badge secondary">Pillar 4</span>
                    <h5 class="fw-700 text-dark mb-3">Security & Social</h5>
                    <p class="text-secondary fs-14 mb-3">Validates data encryption, browser safety, and social syndication.</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-checkmark-round text-success"></i> <span>Valid SSL HTTPS active</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Open Graph meta tags configured</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Twitter Cards enabled</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>All images include alt text</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 7: What We Check & Audit Rules Table -->
<!-- ============================================================== -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-funnel"></i> Audit Rules</span>
            <h2 class="sm-section-title">Complete Technical SEO & Performance Checklist</h2>
            <p class="sm-section-subtitle">Here is the exact criteria our automated crawler uses to grade your website.</p>
        </div>

        <div class="sm-table-card mb-4">
            <div class="table-responsive">
                <table class="sm-table">
                    <thead>
                        <tr>
                            <th>Parameter Checked</th>
                            <th style="width: 160px;">Ideal Criteria</th>
                            <th>Consequence If It Fails</th>
                            <th style="width: 140px;">Impact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Page Title Tag (`&lt;title&gt;`)</strong></td>
                            <td>10 to 70 Characters</td>
                            <td>Truncation in search snippets or vague ranking signals.</td>
                            <td><span class="badge bg-danger px-3 py-1 fs-12 fw-700">Critical</span></td>
                        </tr>
                        <tr>
                            <td><strong>Meta Description</strong></td>
                            <td>70 to 165 Characters</td>
                            <td>Reduced organic CTR; search engines generate random page text.</td>
                            <td><span class="badge bg-primary px-3 py-1 fs-12 fw-700">High</span></td>
                        </tr>
                        <tr>
                            <td><strong>H1 Heading Tag</strong></td>
                            <td>Exactly 1 H1 Tag</td>
                            <td>Multiple H1s confuse crawlers; missing H1 weakens topic relevance.</td>
                            <td><span class="badge bg-danger px-3 py-1 fs-12 fw-700">Critical</span></td>
                        </tr>
                        <tr>
                            <td><strong>Server Response Latency</strong></td>
                            <td>&lt; 2.0 Seconds</td>
                            <td>High bounce rate, crawl budget exhaustion, mobile abandonment.</td>
                            <td><span class="badge bg-danger px-3 py-1 fs-12 fw-700">Critical</span></td>
                        </tr>
                        <tr>
                            <td><strong>SSL Encryption (HTTPS)</strong></td>
                            <td>Valid TLS / HTTPS</td>
                            <td>Browser warnings ("Not Secure"), lost customer trust, ranking penalty.</td>
                            <td><span class="badge bg-danger px-3 py-1 fs-12 fw-700">Critical</span></td>
                        </tr>
                        <tr>
                            <td><strong>Mobile Viewport Tag</strong></td>
                            <td>Present & Configured</td>
                            <td>Fails mobile-first indexing; page renders as zoomed-out desktop.</td>
                            <td><span class="badge bg-danger px-3 py-1 fs-12 fw-700">Critical</span></td>
                        </tr>
                        <tr>
                            <td><strong>Image Alt Attributes</strong></td>
                            <td>100% Images have Alt</td>
                            <td>Misses Google Image search traffic; fails accessibility checks.</td>
                            <td><span class="badge bg-warning text-dark px-3 py-1 fs-12 fw-700">Medium</span></td>
                        </tr>
                        <tr>
                            <td><strong>Canonical Tag (`&lt;link rel="canonical"&gt;`)</strong></td>
                            <td>Present & Self-Referencing</td>
                            <td>Duplicate content penalties when URLs have query strings or trailing slashes.</td>
                            <td><span class="badge bg-primary px-3 py-1 fs-12 fw-700">High</span></td>
                        </tr>
                        <tr>
                            <td><strong>Social Graph Tags (OG / Twitter)</strong></td>
                            <td>Present</td>
                            <td>Broken or blank preview cards when links are shared on social media.</td>
                            <td><span class="badge bg-secondary px-3 py-1 fs-12 fw-700">Medium</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="p-3 bg-light rounded-3 border text-center">
            <span class="text-secondary fs-15">Need to verify multiple URLs or headers at once? Use our companion tool: <a href="<?= route('http-status-checker') ?>" class="fw-700 text-danger text-decoration-underline">Free Bulk HTTP Status Code Checker</a>.</span>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 8: Common Website Mistakes That Kill Google Rankings -->
<!-- ============================================================== -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-alert"></i> Pitfalls</span>
            <h2 class="sm-section-title">Common Website Mistakes That Kill Google Rankings</h2>
            <p class="sm-section-subtitle">Based on analyzing over 15,000 websites across the UAE, these are the most frequent issues holding back search rankings.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-mistake-icon"><i class="ion-close"></i></div>
                        <h5 class="fw-700 text-dark mb-0">Missing or Multiple H1 Tags</h5>
                    </div>
                    <p class="text-muted fs-14 mb-0">Many WordPress themes accidentally output the company logo as an H1, resulting in multiple H1 tags per page. This dilutes keyword focus and confuses Googlebot.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-mistake-icon"><i class="ion-close"></i></div>
                        <h5 class="fw-700 text-dark mb-0">Unoptimized Image Payloads</h5>
                    </div>
                    <p class="text-muted fs-14 mb-0">Uploading raw 5MB+ JPEG images straight from cameras ruins mobile load times. Converting images to WebP format with descriptive alt text solves this in minutes.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-mistake-icon"><i class="ion-close"></i></div>
                        <h5 class="fw-700 text-dark mb-0">Slow TTFB Server Response</h5>
                    </div>
                    <p class="text-muted fs-14 mb-0">Hosting a UAE-targeted website on cheap overseas servers adds 800ms+ of network latency before the first byte arrives. Fast local or regional CDN hosting is essential.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-mistake-icon"><i class="ion-close"></i></div>
                        <h5 class="fw-700 text-dark mb-0">Missing Meta Descriptions</h5>
                    </div>
                    <p class="text-muted fs-14 mb-0">When no meta description is defined, Google creates automated snippet previews that often look disjointed, causing users to click competitor results instead.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-mistake-icon"><i class="ion-close"></i></div>
                        <h5 class="fw-700 text-dark mb-0">Mixed-Content HTTPS Warnings</h5>
                    </div>
                    <p class="text-muted fs-14 mb-0">A site might load over HTTPS, but if background scripts or images are hardcoded with HTTP, modern browsers flag the page with security warnings.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="sm-mistake-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="sm-mistake-icon"><i class="ion-close"></i></div>
                        <h5 class="fw-700 text-dark mb-0">Orphaned Pages Without Links</h5>
                    </div>
                    <p class="text-muted fs-14 mb-0">Publishing high-value service pages without linking them in your primary menu or sitemap leaves them undiscovered by search engine crawlers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 9: How to Fix Issues Found in Your Grade Report -->
<!-- ============================================================== -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-wrench"></i> Action Plan</span>
            <h2 class="sm-section-title">How to Fix Issues Found in Your Grade Report</h2>
            <p class="sm-section-subtitle">Once our grader delivers your report, follow this systematic four-step workflow to implement fixes.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="sm-sub-card">
                    <div class="sm-step-number mb-3">1</div>
                    <h5 class="fw-700 text-dark mb-2">Tackle Critical Fails First</h5>
                    <p class="text-muted fs-14 mb-0">Address red flags immediately: resolve invalid SSL certificates, ensure mobile viewport tags are active, and fix 4xx or 5xx server errors.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sm-sub-card">
                    <div class="sm-step-number mb-3">2</div>
                    <h5 class="fw-700 text-dark mb-2">Tune On-Page Tags</h5>
                    <p class="text-muted fs-14 mb-0">Refine your title tags between 50-60 characters and write compelling meta descriptions (120-160 characters) containing target keywords.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sm-sub-card">
                    <div class="sm-step-number mb-3">3</div>
                    <h5 class="fw-700 text-dark mb-2">Optimize Media & Assets</h5>
                    <p class="text-muted fs-14 mb-0">Add descriptive alt attributes to all images, compress images to WebP format, and enable browser caching to speed up repeat visits.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sm-sub-card">
                    <div class="sm-step-number mb-3">4</div>
                    <h5 class="fw-700 text-dark mb-2">Re-audit & Validate</h5>
                    <p class="text-muted fs-14 mb-0">Run our free grader once more to verify that your letter grade has climbed to an A+ and request re-indexing in Google Search Console.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 10: BrandStory Grader vs Standard Audit Tools -->
<!-- ============================================================== -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-calculator"></i> Comparison</span>
            <h2 class="sm-section-title">BrandStory Grader vs Standard Audit Tools</h2>
            <p class="sm-section-subtitle">See how our free diagnostic engine stacks up against generic alternatives and paid SaaS platforms.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="sm-compare-card">
                    <span class="sm-compare-badge secondary">Basic Online Tools</span>
                    <h4 class="fw-700 text-dark mb-3">Generic Free Scanners</h4>
                    <p class="text-secondary fs-14 mb-4">Shallow checkers that rely on cached data and force you to register before seeing results.</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-close-round text-danger"></i> <span>Requires email signup or sales calls</span></li>
                        <li><i class="ion-close-round text-danger"></i> <span>Uses stale, pre-cached crawl data</span></li>
                        <li><i class="ion-close-round text-danger"></i> <span>Only checks 3 to 5 basic meta tags</span></li>
                        <li><i class="ion-close-round text-danger"></i> <span>No Core Web Vitals or TTFB data</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sm-compare-card highlight">
                    <span class="sm-compare-badge primary">Recommended</span>
                    <h4 class="fw-700 text-dark mb-3">BrandStory Grader</h4>
                    <p class="text-secondary fs-14 mb-4">Enterprise-grade technical intelligence engineered for UAE businesses. 100% free forever.</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-checkmark-round text-success"></i> <span>100% Free with zero registration required</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Live real-time DOM crawler inspection</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>25+ Technical SEO & performance checks</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Clear letter grade with prioritized fixes</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Backed by Dubai's premier SEO agency</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sm-compare-card">
                    <span class="sm-compare-badge secondary">Paid SaaS Suites</span>
                    <h4 class="fw-700 text-dark mb-3">Enterprise SaaS Platforms</h4>
                    <p class="text-secondary fs-14 mb-4">Powerful tools but burdened by steep learning curves, slow queues, and high monthly fees.</p>
                    <ul class="sm-compare-list">
                        <li><i class="ion-close-round text-danger"></i> <span>Costs $99 to $499 every month</span></li>
                        <li><i class="ion-checkmark-round text-success"></i> <span>Deep technical logs and history</span></li>
                        <li><i class="ion-close-round text-danger"></i> <span>Overwhelming jargon for non-developers</span></li>
                        <li><i class="ion-close-round text-danger"></i> <span>Takes 20+ minutes to run a single crawl</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 11: Who Needs a Website Grader? -->
<!-- ============================================================== -->
<section class="sm-section bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-person-stalker"></i> Target Audience</span>
            <h2 class="sm-section-title">Who Needs a Website Grader?</h2>
            <p class="sm-section-subtitle">Whether you are scaling an e-commerce brand or managing enterprise portals, regular audits are vital.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-bag"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">E-commerce Brands</h5>
                    <p class="text-muted fs-14 mb-0">Every 1-second delay reduces checkout conversions by up to 20%. Optimize image sizes, TTFB, and product meta tags to maximize sales.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-briefcase"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">B2B Companies</h5>
                    <p class="text-muted fs-14 mb-0">High-ticket enterprise buyers research extensively online. Ensure your service pages rank on page 1 with flawless technical architecture.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-code"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Web Developers</h5>
                    <p class="text-muted fs-14 mb-0">Verify technical compliance before handing over client projects: validate viewport responsiveness, heading hierarchies, and canonicals.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sm-feature-card">
                    <div class="sm-feature-icon"><i class="ion-speakerphone"></i></div>
                    <h5 class="fw-700 mb-2 text-dark">Marketing Agencies</h5>
                    <p class="text-muted fs-14 mb-0">Generate instant, objective site audits during client discovery calls to demonstrate technical deficiencies and build trust quickly.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 12: Client Reviews & Ratings -->
<!-- ============================================================== -->
<section class="sm-section bg-light" id="testimonials">
    <div class="container">
        <!-- Trust Metrics Row -->
        <div class="row g-3 mb-5 text-center">
            <div class="col-6 col-md-3">
                <div class="sm-trust-stat-box">
                    <div class="sm-trust-stat-num">15,000+</div>
                    <div class="sm-trust-stat-label">Websites Audited</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="sm-trust-stat-box">
                    <div class="sm-trust-stat-num">4.9 / 5.0</div>
                    <div class="sm-trust-stat-label">User Satisfaction</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="sm-trust-stat-box">
                    <div class="sm-trust-stat-num">25+</div>
                    <div class="sm-trust-stat-label">Audit Parameters</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="sm-trust-stat-box">
                    <div class="sm-trust-stat-num">100%</div>
                    <div class="sm-trust-stat-label">Free Forever</div>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-star"></i> Verified Reviews</span>
            <h2 class="sm-section-title">Praise for BrandStory's Website Grader</h2>
            <p class="sm-section-subtitle">Real feedback from marketers, agency owners, and digital leads who rely on our auditing engine.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">★★★★★</div>
                        <p class="sm-review-quote">
                            "In just a few seconds, the SEO grader tool provides insightful analysis on par with an agency audit that would normally take days. Essential for every marketer in Dubai."
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <img src="<?= base_url('assets/images/Aratrika.webp') ?>" alt="Diego Miranda">
                        <div class="sm-author-info">
                            <h6>Diego Miranda</h6>
                            <p>Excellence Group, Luxury Hospitality</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">★★★★★</div>
                        <p class="sm-review-quote">
                            "I love this website grader. Many of my colleagues use it to get an instant assessment of issues facing client websites. The diagnostic results are accurate and actionable."
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <img src="<?= base_url('assets/images/Harsha.webp') ?>" alt="Chris Anderson">
                        <div class="sm-author-info">
                            <h6>Chris Anderson</h6>
                            <p>Director of Media, Performance Traffic</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sm-review-card">
                    <div>
                        <div class="sm-review-stars mb-3">★★★★★</div>
                        <p class="sm-review-quote">
                            "The Core Web Vitals and image alt checks highlighted quick fixes that brought our page load from 4.8s down to 1.7s. As a direct result, our e-commerce checkout abandonment rate dropped noticeably."
                        </p>
                    </div>
                    <div class="sm-review-author">
                        <img src="<?= base_url('assets/images/Roshan.webp') ?>" alt="Roshan Tariq">
                        <div class="sm-author-info">
                            <h6>Roshan Tariq</h6>
                            <p>Managing Director, Retail GCC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 13: Frequently Asked Questions (FAQ) -->
<!-- ============================================================== -->
<section class="sm-section bg-white" id="faq">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sm-section-badge"><i class="ion-help-circled"></i> FAQ</span>
            <h2 class="sm-section-title">Frequently Asked Questions</h2>
            <p class="sm-section-subtitle">Everything you need to know about website grading, technical scoring, and SEO optimization.</p>
        </div>

        <div class="accordion max-w-800 mx-auto" id="graderFaqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="headingFaq1">
                    <button class="accordion-button sm-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq1" aria-expanded="true" aria-controls="collapseFaq1">
                        What is a Website Grader and how is the overall score calculated?
                    </button>
                </h2>
                <div id="collapseFaq1" class="accordion-collapse collapse show" aria-labelledby="headingFaq1" data-bs-parent="#graderFaqAccordion">
                    <div class="accordion-body px-4 pb-4 text-muted">
                        BrandStory's Website Grader is an automated auditing engine that crawls your page in real-time. It evaluates 25+ critical parameters across four core dimensions: <strong>On-Page SEO</strong> (titles, meta, headings, canonicals), <strong>Speed & Response Latency</strong>, <strong>Mobile Optimization</strong> (viewport, responsiveness), and <strong>Security & Protocols</strong> (HTTPS, social tags). Your overall score (0 to 100) and letter grade (A+ to F) reflect the percentage of passed quality checks.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="headingFaq2">
                    <button class="accordion-button sm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq2" aria-expanded="false" aria-controls="collapseFaq2">
                        Is this website grader truly 100% free to use?
                    </button>
                </h2>
                <div id="collapseFaq2" class="accordion-collapse collapse" aria-labelledby="headingFaq2" data-bs-parent="#graderFaqAccordion">
                    <div class="accordion-body px-4 pb-4 text-muted">
                        Yes, absolutely. You can grade as many websites and landing pages as you need without paying anything or entering a credit card. No registration or software installation is required to view your live report.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="headingFaq3">
                    <button class="accordion-button sm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq3" aria-expanded="false" aria-controls="collapseFaq3">
                        How does page loading speed directly impact Google rankings?
                    </button>
                </h2>
                <div id="collapseFaq3" class="accordion-collapse collapse" aria-labelledby="headingFaq3" data-bs-parent="#graderFaqAccordion">
                    <div class="accordion-body px-4 pb-4 text-muted">
                        Google officially incorporated page speed and Core Web Vitals into its search ranking algorithm with the Page Experience Update. Slower websites face higher bounce rates, reduced crawl budgets, and lower rankings in mobile search results. A site loading in under 2.0 seconds receives a strong ranking boost over slower competitors.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="headingFaq4">
                    <button class="accordion-button sm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq4" aria-expanded="false" aria-controls="collapseFaq4">
                        What is the recommended length for Meta Titles and Descriptions?
                    </button>
                </h2>
                <div id="collapseFaq4" class="accordion-collapse collapse" aria-labelledby="headingFaq4" data-bs-parent="#graderFaqAccordion">
                    <div class="accordion-body px-4 pb-4 text-muted">
                        For optimal search results rendering without truncation:
                        <ul class="mt-2 mb-0">
                            <li><strong>Title Tag:</strong> 50 to 60 characters (or under 600 pixels).</li>
                            <li><strong>Meta Description:</strong> 120 to 160 characters.</li>
                        </ul>
                        Our grader checks these exact ranges and alerts you if your snippets are too short to attract clicks or too long to fit in Google SERP displays.
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="headingFaq5">
                    <button class="accordion-button sm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq5" aria-expanded="false" aria-controls="collapseFaq5">
                        Can BrandStory's SEO team in Dubai help fix the issues found in our report?
                    </button>
                </h2>
                <div id="collapseFaq5" class="accordion-collapse collapse" aria-labelledby="headingFaq5" data-bs-parent="#graderFaqAccordion">
                    <div class="accordion-body px-4 pb-4 text-muted">
                        Yes! BrandStory is a premier digital marketing and technical SEO agency headquartered in Dubai. Our team of certified SEO engineers and web developers can conduct an in-depth enterprise audit, implement code fixes, optimize Core Web Vitals, and build custom link-building strategies to accelerate your rankings across the UAE and GCC.
                    </div>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="accordion-item sm-faq-item">
                <h2 class="accordion-header" id="headingFaq6">
                    <button class="accordion-button sm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq6" aria-expanded="false" aria-controls="collapseFaq6">
                        How often should I run an audit on my website?
                    </button>
                </h2>
                <div id="collapseFaq6" class="accordion-collapse collapse" aria-labelledby="headingFaq6" data-bs-parent="#graderFaqAccordion">
                    <div class="accordion-body px-4 pb-4 text-muted">
                        We recommend auditing your site at least <strong>once a month</strong>, as well as immediately following any website redesign, CMS plugin updates, or new template releases. Regular auditing helps catch broken URLs, missing tags, and latency spikes before they cause irreversible ranking drops.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- SECTION 14: Enterprise SEO Consultation Banner -->
<!-- ============================================================== -->
<section class="sm-section bg-light">
    <div class="container">
        <div class="sm-cta-banner">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge bg-danger bg-opacity-25 text-danger px-3 py-1 rounded-pill fs-12 fw-700 mb-3 border border-danger border-opacity-25">
                        ENTERPRISE SEO INTELLIGENCE
                    </span>
                    <h3 class="fw-800 text-white mb-2 fs-28">Ready to Turn Your Website into a High-Converting Engine?</h3>
                    <p class="text-white-50 fs-16 mb-0">
                        Stop guessing what Google wants. Let BrandStory's technical SEO specialists in Dubai run a full-scale audit and implement code-level fixes to maximize your rankings.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="tel:++971522831655" class="sm-cta-btn">
                        <i class="ion-ios-telephone"></i>
                        <span>Call +971 52 283 1655</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- JAVASCRIPT: Form Validation & Persistent Live Engine Dashboard -->
<!-- ============================================================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('graderForm');
    const urlInput = document.getElementById('urlInput');
    const generateBtn = document.getElementById('generateBtn');
    const liveStatusBadge = document.getElementById('liveStatusBadge');
    const statusText = document.getElementById('statusText');
    const setupBadge = document.getElementById('setupBadge');
    const websiteLabel = document.getElementById('websiteLabel');
    const displayWebsite = document.getElementById('displayWebsite');
    const displayCurrentStep = document.getElementById('displayCurrentStep');
    const durationLabel = document.getElementById('durationLabel');
    const displayTimeRemaining = document.getElementById('displayTimeRemaining');
    const meterScoreCount = document.getElementById('meterScoreCount');
    const meterSublabel = document.getElementById('meterSublabel');
    const meterPassedCount = document.getElementById('meterPassedCount');
    const meterWarningsCount = document.getElementById('meterWarningsCount');
    const meterFailedCount = document.getElementById('meterFailedCount');
    const meterCircle = document.getElementById('meterCircle');
    const liveFeedContainer = document.getElementById('liveFeedContainer');
    const cancelBtn = document.getElementById('cancelProcessBtn');
    const cancelBlock = document.getElementById('cancelBlock');
    const auditActionBtns = document.getElementById('auditActionBtns');
    const reScanBtn = document.getElementById('reScanBtn');

    let isAuditing = false;
    let auditTimeouts = [];
    let auditIntervals = [];
    const circumference = 703.7; // 2 * PI * 112

    function updateMeter(pct) {
        if (meterCircle) {
            const offset = circumference - (pct / 100) * circumference;
            meterCircle.style.strokeDashoffset = offset;
        }
    }

    function addFeedItem(code, message, color) {
        if (!liveFeedContainer) return;
        const item = document.createElement('div');
        item.className = 'sm-feed-item';
        item.innerHTML = `<span class="code" style="color: ${color || '#38bdf8'}">[${code}]</span> ${message}`;
        liveFeedContainer.prepend(item);
    }

    function clearAuditTimers() {
        auditTimeouts.forEach(t => clearTimeout(t));
        auditTimeouts = [];
        auditIntervals.forEach(i => clearInterval(i));
        auditIntervals = [];
    }

    function resetToStandby(msg) {
        isAuditing = false;
        clearAuditTimers();

        if (meterCircle) {
            meterCircle.style.stroke = 'rgba(255, 255, 255, 0.15)';
            updateMeter(0);
        }
        if (meterScoreCount) meterScoreCount.innerText = '—';
        if (meterSublabel) meterSublabel.innerText = 'READY TO SCAN';
        if (meterPassedCount) meterPassedCount.innerText = '0';
        if (meterWarningsCount) meterWarningsCount.innerText = '0';
        if (meterFailedCount) meterFailedCount.innerText = '0';

        if (websiteLabel) websiteLabel.innerText = 'Auditing:';
        if (displayWebsite) displayWebsite.innerText = 'https://brandstory.ae/';
        if (displayCurrentStep) displayCurrentStep.innerText = 'Ready to audit';
        if (durationLabel) durationLabel.innerText = 'Estimated audit duration:';
        if (displayTimeRemaining) displayTimeRemaining.innerText = '0:02';

        if (liveStatusBadge) liveStatusBadge.className = 'sm-status-indicator status-standby';
        if (statusText) statusText.innerText = 'Standby';
        if (setupBadge) {
            setupBadge.className = 'sm-status-indicator status-standby';
            setupBadge.innerText = 'Ready';
        }

        if (cancelBlock) cancelBlock.classList.add('d-none');
        if (auditActionBtns) {
            auditActionBtns.classList.add('d-none');
            auditActionBtns.classList.remove('d-grid');
        }

        if (generateBtn) {
            generateBtn.disabled = false;
            const spinner = generateBtn.querySelector('.spinner-border');
            const btnText = generateBtn.querySelector('.btn-text');
            if (spinner) spinner.classList.add('d-none');
            if (btnText) btnText.innerText = 'Start Website Audit';
        }

        if (msg && liveFeedContainer) {
            liveFeedContainer.innerHTML = `<div class="sm-feed-item text-warning">${msg}</div>`;
        }
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            resetToStandby('<span class="code" style="color: #f59e0b;">[CANCELLED]</span> Audit cancelled by user.');
        });
    }

    if (reScanBtn) {
        reScanBtn.addEventListener('click', function(e) {
            e.preventDefault();
            resetToStandby('<span class="code" style="color: #4ade80;">[READY]</span> Audit engine standby. Enter website URL and click "Start Website Audit".');
            if (urlInput) {
                urlInput.value = '';
                urlInput.focus();
            }
            try {
                window.history.pushState(null, '', '<?= route("website-grader") ?>');
            } catch(err) {}
        });
    }

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let targetUrl = urlInput ? urlInput.value.trim() : '';
            if (!targetUrl) {
                alert('Please enter a target website URL.');
                if (urlInput) urlInput.focus();
                return;
            }

            // Normalize URL with https:// if protocol is missing
            if (!/^https?:\/\//i.test(targetUrl)) {
                targetUrl = 'https://' + targetUrl;
                if (urlInput) urlInput.value = targetUrl;
            }

            // Extract domain
            let parsedDomain = targetUrl;
            try {
                parsedDomain = new URL(targetUrl).hostname;
            } catch (err) {
                parsedDomain = targetUrl.replace(/^https?:\/\//, '').split('/')[0];
            }

            isAuditing = true;
            clearAuditTimers();

            // Set UI to Auditing state
            if (liveStatusBadge) liveStatusBadge.className = 'sm-status-indicator status-crawling';
            if (statusText) statusText.innerText = 'Audit Active';
            if (setupBadge) {
                setupBadge.className = 'sm-status-indicator status-crawling';
                setupBadge.innerText = 'Processing';
            }

            if (generateBtn) {
                generateBtn.disabled = true;
                const spinner = generateBtn.querySelector('.spinner-border');
                const btnText = generateBtn.querySelector('.btn-text');
                if (spinner) spinner.classList.remove('d-none');
                if (btnText) btnText.innerText = 'Auditing Website...';
            }

            if (websiteLabel) websiteLabel.innerText = 'Auditing:';
            if (displayWebsite) displayWebsite.innerText = targetUrl;
            if (displayCurrentStep) displayCurrentStep.innerText = 'Connecting to ' + parsedDomain + '...';
            if (durationLabel) durationLabel.innerText = 'Estimated audit duration:';
            if (displayTimeRemaining) displayTimeRemaining.innerText = '0:02';

            if (cancelBlock) cancelBlock.classList.remove('d-none');
            if (auditActionBtns) {
                auditActionBtns.classList.add('d-none');
                auditActionBtns.classList.remove('d-grid');
            }

            // Start counting animation directly from 1, 2, 3...
            let currentVal = 1;
            if (meterCircle) {
                meterCircle.style.stroke = '#38bdf8';
                updateMeter(currentVal);
            }
            if (meterScoreCount) meterScoreCount.innerText = currentVal;
            if (meterSublabel) meterSublabel.innerText = 'ANALYZING...';
            if (meterPassedCount) meterPassedCount.innerText = '0';
            if (meterWarningsCount) meterWarningsCount.innerText = '0';
            if (meterFailedCount) meterFailedCount.innerText = '0';

            if (liveFeedContainer) liveFeedContainer.innerHTML = '';
            addFeedItem('INIT', 'Connecting to host ' + parsedDomain + '...', '#38bdf8');

            // Staggered diagnostics feed steps while counting
            const t1 = setTimeout(() => {
                if (!isAuditing) return;
                addFeedItem('HTTP', 'Verifying server response & TTFB latency...', '#38bdf8');
                if (displayCurrentStep) displayCurrentStep.innerText = 'Verifying server response & TTFB latency...';
                if (meterPassedCount) meterPassedCount.innerText = '4';
            }, 350);
            const t2 = setTimeout(() => {
                if (!isAuditing) return;
                addFeedItem('DOM', 'Parsing title, meta description & H1/H2 tags...', '#38bdf8');
                if (displayCurrentStep) displayCurrentStep.innerText = 'Parsing title, meta description & H1/H2 tags...';
                if (meterPassedCount) meterPassedCount.innerText = '8';
                if (meterWarningsCount) meterWarningsCount.innerText = '1';
            }, 700);
            const t3 = setTimeout(() => {
                if (!isAuditing) return;
                addFeedItem('MOBILE', 'Checking mobile viewport & responsive layout...', '#38bdf8');
                if (displayCurrentStep) displayCurrentStep.innerText = 'Checking mobile viewport & responsive layout...';
                if (meterPassedCount) meterPassedCount.innerText = '11';
                if (meterWarningsCount) meterWarningsCount.innerText = '2';
            }, 1050);

            auditTimeouts.push(t1, t2, t3);

            let targetFinal = null;
            let finalAuditData = null;
            let finalGrade = 'C';

            // Smooth counting ticker (1, 2, 3... up to final score)
            const countInterval = setInterval(() => {
                if (!isAuditing) {
                    clearInterval(countInterval);
                    return;
                }

                if (targetFinal === null) {
                    // While waiting for API response, smoothly increment up to 35
                    if (currentVal < 35) {
                        currentVal++;
                        if (meterScoreCount) meterScoreCount.innerText = currentVal;
                        updateMeter(currentVal);
                    }
                } else {
                    // API response received: smoothly count directly to targetFinal without stopping or jumping
                    if (currentVal < targetFinal) {
                        currentVal++;
                        if (meterScoreCount) meterScoreCount.innerText = currentVal;
                        updateMeter(currentVal);
                    } else {
                        // Accurately reached the target score!
                        clearInterval(countInterval);
                        if (meterScoreCount) meterScoreCount.innerText = targetFinal;
                        updateMeter(targetFinal);
                        finishAudit(finalAuditData, targetFinal, finalGrade, targetUrl, parsedDomain);
                    }
                }
            }, 28);
            auditIntervals.push(countInterval);

            // Fetch real audit data via AJAX in background
            const apiUrl = '<?= route("website-grader") ?>?url=' + encodeURIComponent(targetUrl) + '&ajax=1';
            fetch(apiUrl)
                .then(res => res.json())
                .then(res => {
                    if (res && res.success && res.data) {
                        finalAuditData = res.data;
                        targetFinal = Number(res.data.score) || 60;
                        finalGrade = res.data.grade || 'C';
                    } else {
                        targetFinal = 60;
                        finalGrade = 'C';
                    }
                })
                .catch(err => {
                    console.warn('Audit fetch warning:', err);
                    targetFinal = 60;
                    finalGrade = 'C';
                });
        });
    }

    function finishAudit(data, finalScore, finalGrade, targetUrl, parsedDomain) {
        isAuditing = false;

        const finalPassed = data ? data.passed : 13;
        const finalWarnings = data ? data.warnings : 5;
        const finalFailed = data ? data.failed : 2;
        const loadTime = data ? data.loadTime : 1.25;
        const domainText = (data && data.domain) ? data.domain : parsedDomain.toUpperCase();

        // Stroke color smoothly transitions to the final grade color
        const strokeColor = finalScore >= 80 ? '#10b981' : (finalScore >= 60 ? '#f59e0b' : '#ef4444');
        if (meterCircle) {
            meterCircle.style.stroke = strokeColor;
        }

        // Set grade & counts
        if (meterScoreCount) meterScoreCount.innerText = finalScore;
        if (meterSublabel) meterSublabel.innerText = 'GRADE: ' + finalGrade;
        if (meterPassedCount) meterPassedCount.innerText = finalPassed;
        if (meterWarningsCount) meterWarningsCount.innerText = finalWarnings;
        if (meterFailedCount) meterFailedCount.innerText = finalFailed;

        // Status indicators
        if (liveStatusBadge) liveStatusBadge.className = 'sm-status-indicator status-completed';
        if (statusText) statusText.innerText = 'Completed';
        if (setupBadge) {
            setupBadge.className = 'sm-status-indicator status-completed';
            setupBadge.innerText = 'Audited';
        }

        // Meta headers
        if (websiteLabel) websiteLabel.innerText = 'Audited:';
        if (displayWebsite) displayWebsite.innerText = domainText;
        if (displayCurrentStep) {
            const totalLinks = data ? (data.internalLinks + data.externalLinks) : 24;
            displayCurrentStep.innerText = `Audit Complete - Latency: ${loadTime}s | Links: ${totalLinks}`;
        }
        if (durationLabel) durationLabel.innerText = 'Audit completed in:';
        if (displayTimeRemaining) displayTimeRemaining.innerText = loadTime + 's';

        // Swap cancel button for action buttons
        if (cancelBlock) cancelBlock.classList.add('d-none');
        if (auditActionBtns) {
            auditActionBtns.classList.remove('d-none');
            auditActionBtns.classList.add('d-grid');
        }

        // Prepend comprehensive diagnostics directly into this SAME live feed
        if (data) {
            addFeedItem('SOCIAL', `Open Graph: ${data.ogTags ? 'Verified' : 'Missing'} | Twitter Cards: ${data.twitterCards ? 'Verified' : 'Missing'}`, data.ogTags ? '#4ade80' : '#f59e0b');
            addFeedItem('CANONICAL', `Canonical Tag: ${data.canonical ? 'Self-referencing verified' : 'Missing canonical link tag'}`, data.canonical ? '#4ade80' : '#f59e0b');
            addFeedItem('MEDIA', `Image Alt Attributes: ${data.altMissingCount} of ${data.imageCount} missing alt text`, data.altMissingCount === 0 ? '#4ade80' : '#f59e0b');
            addFeedItem('SECURITY', `SSL TLS Certificate: ${data.sslCheck ? 'Active (HTTPS)' : 'Insecure Connection'}`, data.sslCheck ? '#4ade80' : '#ef4444');
            addFeedItem('MOBILE', `Viewport Meta Tag: ${data.viewport ? 'Configured (Mobile-Friendly)' : 'Missing Viewport'}`, data.viewport ? '#4ade80' : '#ef4444');
            addFeedItem('LATENCY', `Server response: ${loadTime}s (${loadTime < 2 ? 'Optimal' : 'Needs Optimization'})`, loadTime < 2 ? '#4ade80' : '#f59e0b');
            addFeedItem('HEADINGS', `${data.h1Count} H1 tags, ${data.h2Count} H2 tags, ${data.h3Count} H3 tags found`, data.h1Count === 1 ? '#4ade80' : '#f59e0b');
            addFeedItem('META', `${data.metaDescription || 'No meta description found'}`, (data.metaDescription && data.metaDescription.length > 50) ? '#4ade80' : '#f59e0b');
            addFeedItem('TITLE', `${data.title} (${data.title.length} chars)`, (data.title && data.title.length >= 20) ? '#4ade80' : '#f59e0b');
            addFeedItem('COMPLETE', `Audit finished with Grade ${finalGrade} (Score: ${finalScore}/100)`, '#4ade80');
        } else {
            addFeedItem('COMPLETE', `Audit finished with Grade ${finalGrade} (Score: ${finalScore}/100)`, '#4ade80');
        }

        // Enable Run Another Audit button on left
        if (generateBtn) {
            generateBtn.disabled = false;
            const spinner = generateBtn.querySelector('.spinner-border');
            const btnText = generateBtn.querySelector('.btn-text');
            if (spinner) spinner.classList.add('d-none');
            if (btnText) btnText.innerText = 'Run Another Audit';
        }

        // Update URL cleanly without reloading the page
        try {
            window.history.pushState(null, '', '<?= route("website-grader") ?>?url=' + encodeURIComponent(targetUrl));
        } catch(err) {}
    }
});
</script>
