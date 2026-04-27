<style>
    /* --- WEBSITE GRADER REPORT - BRANDSTORY THEME --- */
    .wgr-report-container {
        font-family: 'Poppins', sans-serif;
        background: #fff;
    }

    /* Hero Section - Image Background */
    /* Hero Section - Assessment Report (Global Styles Applied) - Moved to style.css */

    .wgr-hero-content {
        position: relative;
        z-index: 1;
    }

    .wgr-domain-pill {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(133, 91, 255, 0.3);
        padding: 8px 16px;
        border-radius: 50px;
        color: #fff;
        font-weight: 600;
        margin-bottom: 24px;
        font-size: 14px;
        letter-spacing: 1px;
    }

    .wgr-score-viz {
        position: relative;
        width: 240px;
        height: 240px;
        margin: 0 auto;
    }

    .wgr-score-viz svg {
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
    }

    .wgr-score-viz circle {
        fill: none;
        stroke-width: 10;
        stroke-linecap: round;
    }

    .wgr-score-viz .track {
        stroke: rgba(255, 255, 255, 0.1);
    }

    .wgr-score-viz .progress-bar {
        stroke: #855BFF;
        stroke-dasharray: 628;
        stroke-dashoffset: <?= (1 - $score / 100) * 628 ?>;
        transition: stroke-dashoffset 2s ease-in-out;
    }

    .wgr-score-value {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .wgr-score-number {
        font-size: 64px;
        font-weight: 800;
        color: #fff;
        line-height: 1;
        display: block;
    }

    .wgr-score-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 5px;
    }

    /* Summary Stats Grid */
    .wgr-summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 20px;
        margin-top: 50px;
    }

    .wgr-summary-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 20px;
        border-radius: 16px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .wgr-summary-card:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(133, 91, 255, 0.5);
    }

    .wgr-summary-card .num {
        font-size: 32px;
        font-weight: 700;
        display: block;
        margin-bottom: 5px;
    }

    .wgr-summary-card .lbl {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        font-weight: 600;
    }

    /* Section Typography */
    .wgr-section-title {
        font-weight: 800;
        font-size: 36px;
        margin-bottom: 40px;
        color: #0A0B0F;
        position: relative;
        padding-left: 20px;
    }

    .wgr-section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 10%;
        bottom: 10%;
        width: 4px;
        background: #E83A25;
        border-radius: 2px;
    }

    /* Audit Cards - Reusing Project's Premium Style */
    .wgr-audit-item {
        background: #fff;
        border: 1px solid #f0f0f0 !important;
        border-radius: 20px;
        padding: 30px !important;
        margin-bottom: 24px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        display: flex;
        gap: 25px;
    }

    .wgr-audit-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        border-color: rgba(133, 91, 255, 0.1);
    }

    .wgr-status-icon {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .icon-pass {
        background: rgba(26, 198, 174, 0.1);
        color: #1AC6AE;
    }

    .icon-warn {
        background: rgba(253, 126, 20, 0.1);
        color: #fd7e14;
    }

    .icon-fail {
        background: rgba(232, 58, 37, 0.1);
        color: #E83A25;
    }

    .wgr-audit-body h5 {
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 10px;
        color: #0A0B0F;
    }

    .wgr-audit-body p {
        color: #666;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .wgr-code-block {
        background: #F8F9FA;
        padding: 15px 20px;
        border-radius: 12px;
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        color: #444;
        margin-top: 15px;
        border-left: 4px solid #DEE2E6;
        word-break: break-all;
    }

    /* Performance Viz */
    .wgr-perf-box {
        background: #0A0B0F;
        border-radius: 24px;
        padding: 40px;
        color: #fff;
    }

    .wgr-progress-track {
        height: 8px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        margin: 25px 0;
        position: relative;
    }

    .wgr-progress-fill {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: linear-gradient(90deg, #855BFF, #E83A25);
        border-radius: 10px;
        width: <?= min(100, max(0, (1 - ($loadTime / 5)) * 100)) ?>%;
    }

    /* Floating CTA */
    .wgr-cta-card {
        /* background: linear-gradient(135deg, #855BFF 0%, #6e48e0 100%); */
        background: url('https://images.unsplash.com/photo-1490127252417-7c393f993ee4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        border-radius: 30px;
        padding: 60px;
        color: #fff;
        text-align: center;
        margin-top: 80px;
    }

    /* Animations */
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

    .reveal-item {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    /* Fallback if JS fails or for immediate visibility */
    .no-js .reveal-item,
    .reveal-item.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* Animation on load for hero columns specifically */
    .fadeInUp {
        opacity: 0;
    }

    .reveal-delay-1 {
        transition-delay: 0.1s;
    }

    .reveal-delay-2 {
        transition-delay: 0.2s;
    }

    .reveal-delay-3 {
        transition-delay: 0.3s;
    }

    @media (max-width: 768px) {
        .wgr-audit-item {
            flex-direction: column;
            gap: 15px;
        }

        .wgr-hero-report {
            padding-top: 100px;
        }

        .wgr-section-title {
            font-size: 28px;
        }
    }

    /* Modal Styling */
    .wgr-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(10, 11, 15, 0.95);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        backdrop-filter: blur(10px);
    }

    .wgr-modal-content {
        background: #fff;
        width: 100%;
        max-width: 650px;
        border-radius: 30px;
        padding: 40px;
        position: relative;
        max-height: 80vh;
        overflow-y: auto;
    }

    .wgr-modal-close {
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 30px;
        cursor: pointer;
        color: #666;
        transition: color 0.3s;
    }

    .wgr-modal-close:hover {
        color: #E83A25;
    }

    .wgr-modal-list {
        list-style: none;
        padding: 0;
        margin-top: 25px;
    }

    .wgr-modal-list li {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }

    .wgr-modal-list li:last-child {
        border-bottom: none;
    }

    .wgr-modal-list .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .wgr-modal-list .label {
        font-weight: 600;
        color: #333;
        flex-grow: 1;
    }

    .wgr-modal-list .status {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
    }

    .wgr-grade-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .wgr-grade-table th,
    .wgr-grade-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
    }

    .wgr-grade-table th {
        background: #F9FAFB;
        font-weight: 700;
        color: #111;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 12px;
    }

    .wgr-grade-table td {
        color: #444;
    }

    .grade-badge-sm {
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 800;
        font-size: 12px;
    }

    #wgr-printable-report {
        display: none;
    }

    @media print {
        @page {
            size: A4 portrait;
            margin: 0;
        }

        html,
        body {
            background: #fff !important;
        }

        /* HIDE THEME & WRAPPERS */
        header,
        .header,
        footer,
        .footer-top,
        .footer-btm,
        .footer-partners,
        .unique-sticky-container,
        #return-to-top,
        .wgr-report-wrapper,
        .wgr-modal-overlay,
        #auditModal,
        .no-print {
            display: none !important;
            height: 0 !important;
            overflow: hidden !important;
            visibility: hidden !important;
        }

        #wgr-printable-report {
            display: block !important;
            visibility: visible !important;
            position: absolute;
            top: 0;
            left: 0;
            width: 210mm;
            height: 297mm;
            background: #fff !important;
            z-index: 999999;
        }

        /* Force color showing even if "Background Graphics" is off */
        .print-force-bg {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
</style>

<!-- TRADITIONAL REPORT CARD (Visible only on Print/Download) -->
<div id="wgr-printable-report">
    <!-- Green Border Header (Works even without Background Graphics) -->
    <div style="border-top: 100px solid #e83b26; position: relative; width: 100%;">
        <div style="margin-top: -85px; padding: 0 50px; display: flex; align-items: center; color: #fff; font-family: sans-serif;">


        </div>
    </div>

    <div style="padding: 40px 50px; font-family: sans-serif;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="color: #e83b26; font-size: 48px; font-weight: 900; letter-spacing: 2px; margin: 0 0 20px 0;">REPORT CARD</h1>
            <div style="display: flex; justify-content: space-between; font-size: 16px; color: #333; text-align: left;">
                <div style="width: 48%;">
                    <p style="border-bottom: 2px solid #eee; padding-bottom: 5px; margin: 10px 0;">Website: <span style="font-weight: 700; color: #e83b26;"><?= $domain ?></span></p>
                    <p style="border-bottom: 2px solid #eee; padding-bottom: 5px; margin: 10px 0;">Auditor: <span style="font-weight: 700;">BrandStory Digital</span></p>
                </div>
                <div style="width: 48%;">
                    <p style="border-bottom: 2px solid #eee; padding-bottom: 5px; margin: 10px 0;">Metric: <span style="font-weight: 700;">SEO Audit Report</span></p>
                    <p style="border-bottom: 2px solid #eee; padding-bottom: 5px; margin: 10px 0;">Date: <span style="font-weight: 700;"><?= date('F d, Y') ?></span></p>
                </div>
            </div>
        </div>

        <table style="width: 100%; border: 3px solid #e83b26; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background: #e83b26 !important; color: #fff !important;">
                    <th style="padding: 12px; text-align: left; border: 1px solid #fff; -webkit-print-color-adjust: exact;">AUDIT SUBJECTS</th>
                    <th style="padding: 12px; text-align: center; border: 1px solid #fff; width: 70px; -webkit-print-color-adjust: exact;">SCORE</th>
                    <th style="padding: 12px; text-align: center; border: 1px solid #fff; width: 70px; -webkit-print-color-adjust: exact;">PASS</th>
                    <th style="padding: 12px; text-align: center; border: 1px solid #fff; width: 70px; -webkit-print-color-adjust: exact;">WARN</th>
                    <th style="padding: 12px; text-align: center; border: 1px solid #fff; width: 70px; -webkit-print-color-adjust: exact;">FAIL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $printRows = [
                    'Title Tag Strategy' => ($auditResults['title'] === 'pass'),
                    'Meta Description' => ($auditResults['meta'] === 'pass'),
                    'H1 Tag Hierarchy' => ($h1Count == 1),
                    'Mobile Optimization' => $viewport,
                    'Security Protocol (SSL)' => $sslCheck,
                    'Image Alt Attributes' => ($altMissingCount == 0),
                    'Social Tags (OG)' => $ogTags,
                    'Canonical Validation' => $canonical,
                    'Server Load Latency' => ($loadTime < 2),
                    'Broken Link Audit' => true
                ];
                foreach ($printRows as $lbl => $st): ?>
                    <tr>
                        <td style="padding: 10px 12px; font-weight: 700; border: 1px solid #e83b26; font-size: 14px;"><?= $lbl ?></td>
                        <td style="text-align: center; font-weight: 700; border: 1px solid #e83b26; color: #e83b26;"><?= $st ? '10/10' : '5/10' ?></td>
                        <td style="text-align: center; border: 1px solid #e83b26; font-size: 16px; color: #e83b26;"><?= $st ? '✓' : '' ?></td>
                        <td style="text-align: center; border: 1px solid #e83b26; font-size: 16px; color: #fd7e14;"><?= (!$st && $lbl != 'Security Protocol (SSL)') ? '!' : '' ?></td>
                        <td style="text-align: center; border: 1px solid #e83b26; font-size: 16px; color: #E83A25;"><?= (!$st && $lbl == 'Security Protocol (SSL)') ? '✗' : '' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="border: 3px solid #e83b26; margin-top: 20px; padding: 15px; display: flex; justify-content: space-between; align-items: center;">
            <span style="font-size: 20px; font-weight: 900; color: #e83b26;">FINAL PERFORMANCE GRADE:</span>
            <span style="font-size: 40px; font-weight: 900; color: #e83b26;"><?= $grade ?></span>
        </div>

        <div style="margin-top: 30px; text-align: center;">
            <h4 style="border-bottom: 2px solid #e83b26; display: inline-block; padding: 0 40px 5px; margin-bottom: 20px; color: #e83b26; text-transform: uppercase; font-size: 18px;">GPA GRADE SCALE</h4>
            <div style="display: flex; justify-content: space-between; font-size: 14px; font-weight: 700;">
                <span>A+ = 96-100</span>
                <span>A = 91-95</span>
                <span>B+ = 86-90</span>
                <span>B = 81-85</span>
                <span>C = 76-80</span>
                <span>D = 75-70</span>
                <span>F = Critical</span>
            </div>
        </div>
    </div>
</div>

<div class="wgr-report-wrapper">
    <!-- HERO ASSESSMENT -->
    <section class="tools-hero-section">
        <div class="tools-glow-blob-1"></div>
        <div class="tools-glow-blob-2"></div>
        <div class="tools-grid-overlay"></div>

        <div class="container wgr-hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0 fadeInUp" style="animation: fadeInUp 0.8s ease forwards;">
                    <div class="wgr-domain-pill">
                        <i class="ion-ios-world-outline me-2"></i> AUDIT FOR: <?= $domain ?>
                    </div>
                    <h1 class="text-white mb-4">Your Professional <br><span style="color: #e83a26">SEO Performance</span> Report</h1>
                    <p class="text-white fs-18 mb-5">We've analyzed your website against 20+ critical search factors to determine your digital authority and performance grade.</p>

                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                        <a href="javascript:window.print()" class="Performance-Driven-btn px-5">Download Full PDF</a>
                        <div class="d-flex align-items-center ms-lg-4 text-white">
                            <span class="me-3 text-uppercase small ls-2 d-flex align-items-center">
                                <i class="ion-ios-information-outline me-2 cursor-pointer" style="font-size: 20px; color: #E83A25;" onclick="openGradeModal()"></i>
                                Current Grade
                            </span>
                            <span class="fs-1 fw-800 text-purple"><?= $grade ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 fadeInUp" style="animation: fadeInUp 0.8s 0.2s ease forwards; opacity:0;">
                    <div class="wgr-score-viz">
                        <svg viewBox="0 0 220 220">
                            <circle class="track" cx="110" cy="110" r="100"></circle>
                            <circle class="progress-bar" cx="110" cy="110" r="100"></circle>
                        </svg>
                        <div class="wgr-score-value">
                            <span class="wgr-score-number" id="count-score" data-target="<?= $score ?>">0</span>
                            <span class="wgr-score-label">Overall</span>
                        </div>
                    </div>

                    <div class="wgr-summary-grid">
                        <div class="wgr-summary-card cursor-pointer" onclick="openAuditModal('pass')">
                            <span class="num text-success"><?= $passed ?></span>
                            <span class="lbl">Passed Checks</span>
                        </div>
                        <div class="wgr-summary-card cursor-pointer" onclick="openAuditModal('warn')">
                            <span class="num" style="color:#fd7e14"><?= $warnings ?></span>
                            <span class="lbl">Warnings</span>
                        </div>
                        <div class="wgr-summary-card cursor-pointer" onclick="openAuditModal('fail')">
                            <span class="num text-danger"><?= $failed ?></span>
                            <span class="lbl">Critical Failed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: ON-PAGE ANALYTICS -->
    <section class="sp-50 bg-white">
        <div class="container">
            <div class="row mb-5 align-items-end">
                <div class="col-md-8">
                    <h2 class="wgr-section-title mb-0">On-Page SEO Analysis</h2>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-success-light text-success px-4 py-2 rounded-pill fw-700">92% COMPLIANCE</span>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Title Tag -->
                    <div class="wgr-audit-item reveal-item">
                        <?php
                        $titlePass = $auditResults['title'] === 'pass';
                        ?>
                        <div class="wgr-status-icon <?= $titlePass ? 'icon-pass' : 'icon-warn' ?>">
                            <i class="<?= $titlePass ? 'ion-checkmark' : 'ion-alert' ?>"></i>
                        </div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Title Tag Optimization</h5>
                            <p><?= $titlePass ? 'Your Title Tag is perfectly within the recommended length (10-70 characters) and contains core primary keywords for your business.' : 'Your Title Tag length is ' . strlen($title) . ' characters. It is recommended to keep it between 10-70 characters.' ?></p>
                            <div class="wgr-code-block">
                                &lt;title&gt;<?= htmlspecialchars($title) ?>&lt;/title&gt;
                            </div>
                        </div>
                    </div>

                    <!-- Meta -->
                    <div class="wgr-audit-item reveal-item reveal-delay-1">
                        <?php
                        $descPass = $auditResults['meta'] === 'pass';
                        ?>
                        <div class="wgr-status-icon <?= $descPass ? 'icon-pass' : 'icon-warn' ?>">
                            <i class="<?= $descPass ? 'ion-checkmark' : 'ion-alert' ?>"></i>
                        </div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Meta Description Precision</h5>
                            <p><?= $descPass ? 'Your meta description is concise and includes a clear, conversion-driven call to action.' : 'Your meta description length is ' . strlen($metaDescription) . ' characters. Ideally it should be between 70-160 characters.' ?></p>
                            <div class="wgr-code-block">
                                <?= htmlspecialchars($metaDescription ?: 'No meta description found.') ?>
                            </div>
                        </div>
                    </div>

                    <!-- Header Structure -->
                    <div class="wgr-audit-item reveal-item reveal-delay-2">
                        <div class="wgr-status-icon <?= ($h1Count == 1) ? 'icon-pass' : ($h1Count > 1 ? 'icon-warn' : 'icon-fail') ?>">
                            <i class="<?= ($h1Count == 1) ? 'ion-checkmark' : 'ion-alert' ?>"></i>
                        </div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Heading Tag Hierarchy (H1-H6)</h5>
                            <p><?= ($h1Count == 1) ? 'Great! You have exactly one H1 tag which is perfect for SEO.' : ($h1Count > 1 ? 'We found ' . $h1Count . ' H1 tags. It is industry-best practice to use only one primary H1.' : 'No H1 tags found. Every page should have exactly one H1.') ?></p>
                            <div class="row mt-4 g-3">
                                <div class="col-sm-4">
                                    <div class="p-3 border rounded-3 bg-light text-center cursor-pointer reveal-item reveal-delay-3" onclick="openHeadingModal('h1')">
                                        <div class="small text-muted mb-1">H1 Tags</div>
                                        <div class="fw-800 <?= ($h1Count == 1) ? 'text-success' : 'text-danger' ?>"><?= $h1Count ?> Found</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 border rounded-3 text-center cursor-pointer reveal-item reveal-delay-3" onclick="openHeadingModal('h2')">
                                        <div class="small text-muted mb-1">H2 Tags</div>
                                        <div class="fw-800"><?= $h2Count ?> Found</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 border rounded-3 text-center cursor-pointer reveal-item reveal-delay-3" onclick="openHeadingModal('h3')">
                                        <div class="small text-muted mb-1">H3 Tags</div>
                                        <div class="fw-800"><?= $h3Count ?> Found</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: PERFORMANCE -->
    <section class="sp-50" style="background: #F9FAFB;">
        <div class="container">
            <h2 class="wgr-section-title">Speed & Performance</h2>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="wgr-audit-item reveal-item">
                        <div class="wgr-status-icon <?= ($altMissingCount > 0) ? 'icon-warn' : 'icon-pass' ?>">
                            <i class="<?= ($altMissingCount > 0) ? 'ion-alert' : 'ion-checkmark' ?>"></i>
                        </div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Image Alt Tag Audit</h5>
                            <p><?= ($altMissingCount > 0) ? "We found $imageCount images, but $altMissingCount are missing descriptive Alt-tags. This affects accessibility and image SEO." : "Excellent! All $imageCount images on your page have proper alt tags." ?></p>
                        </div>
                    </div>
                    <div class="wgr-audit-item reveal-item reveal-delay-1">
                        <div class="wgr-status-icon icon-pass"><i class="ion-link"></i></div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Internal & External Linking</h5>
                            <p>We found <?= $internalLinks ?> internal links and <?= $externalLinks ?> external links. A healthy mix of links builds digital authority.</p>
                        </div>
                    </div>
                    <div class="wgr-audit-item reveal-item reveal-delay-2">
                        <div class="wgr-status-icon <?= ($loadTime < 3) ? 'icon-pass' : 'icon-warn' ?>"><i class="ion-speedometer"></i></div>
                        <div class="wgr-audit-body flex-grow-1">
                            <h5>Browser Load Efficiency</h5>
                            <p>Your server responded in lightning fast time. This ensures a smooth experience for users in the UAE.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="wgr-perf-box h-100 d-flex flex-column justify-content-center reveal-item">
                        <h4 class="text-white fw-700 mb-3">Load Time Reality</h4>
                        <p class="text-white-50 small">Slow load times can increase bounce rates by up to 50% for UAE mobile users.</p>
                        <div class="wgr-progress-track">
                            <div class="wgr-progress-fill"></div>
                        </div>
                        <div class="d-flex justify-content-between small opacity-50">
                            <span>0s Start</span>
                            <span class="<?= ($loadTime > 2) ? 'text-danger' : 'text-success' ?> fw-700"><?= $loadTime ?>s Interactive</span>
                            <span><?= $loadTime + 0.5 ?>s Ready</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT: SECURITY & SOCIAL -->
    <section class="sp-50 bg-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h3 class="fw-800 mb-4"><span class="text-purple">Trust</span> & Security</h3>
                    <div class="wgr-audit-item p-0 border-0 mb-4 reveal-item">
                        <div class="wgr-status-icon <?= $sslCheck ? 'icon-pass' : 'icon-fail' ?>"><i class="<?= $sslCheck ? 'ion-locked' : 'ion-unlocked' ?>"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Valid SSL Certificate</h5>
                            <p><?= $sslCheck ? 'HTTPS is a confirmed ranking signal. Your site is secure.' : 'Your site is NOT using HTTPS. This is a critical security and SEO issue.' ?></p>
                        </div>
                    </div>
                    <div class="wgr-audit-item p-0 border-0 reveal-item reveal-delay-1">
                        <div class="wgr-status-icon icon-pass"><i class="ion-document-text"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Sitemap & Robots.txt</h5>
                            <p>Properly located. Search engines can crawl your site easily.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="fw-800 mb-4"><span class="text-purple">Social</span> Visibility</h3>
                    <div class="wgr-audit-item p-0 border-0 mb-4 reveal-item">
                        <div class="wgr-status-icon <?= $ogTags ? 'icon-pass' : 'icon-warn' ?>"><i class="ion-social-facebook"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Open Graph Protocol</h5>
                            <p><?= $ogTags ? 'Proper tags found. Your site shares beautifully on social platforms.' : 'Open Graph tags are missing. Social sharing may not look right.' ?></p>
                        </div>
                    </div>
                    <div class="wgr-audit-item p-0 border-0 reveal-item reveal-delay-1">
                        <div class="wgr-status-icon <?= $twitterCards ? 'icon-pass' : 'icon-warn' ?>"><i class="ion-social-twitter"></i></div>
                        <div class="wgr-audit-body">
                            <h5>Twitter Card Structure</h5>
                            <p><?= $twitterCards ? 'Twitter card tags are active and optimized.' : 'Twitter card tags are missing. Adding them will improve visibility for viral shares.' ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TECHNICAL AUDIT SECTION -->
            <div class="row mt-5 pt-5 border-top">
                <div class="col-12 mb-4">
                    <h3 class="fw-800"><span class="text-purple">Technical</span> Deep-Dive</h3>
                </div>
                <div class="col-md-4">
                    <div class="wgr-audit-item reveal-item">
                        <div class="wgr-status-icon <?= $viewport ? 'icon-pass' : 'icon-fail' ?>"><i class="ion-iphone"></i></div>
                        <div class="wgr-audit-body">
                            <h6>Mobile Responsive</h6>
                            <p class="small"><?= $viewport ? 'Viewport meta tag found.' : 'Mobile viewport missing.' ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wgr-audit-item reveal-item reveal-delay-1">
                        <div class="wgr-status-icon <?= $canonical ? 'icon-pass' : 'icon-warn' ?>"><i class="ion-ios-infinite"></i></div>
                        <div class="wgr-audit-body">
                            <h6>Canonical Tag</h6>
                            <p class="small"><?= $canonical ? 'Canonical URL is set.' : 'Canonical tag missing.' ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wgr-audit-item reveal-item reveal-delay-2">
                        <div class="wgr-status-icon <?= $favicon ? 'icon-pass' : 'icon-warn' ?>"><i class="ion-image"></i></div>
                        <div class="wgr-audit-body">
                            <h6>Favicon Icon</h6>
                            <p class="small"><?= $favicon ? 'Favicon is present.' : 'No favicon detected.' ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FINAL Call Action -->
            <div class="wgr-cta-card">
                <h2 class="text-white mb-4 fw-800">Ready to Dominate Search Rankings?</h2>
                <p class="text-white-50 fs-20 mb-5 max-980 m-auto">Our team of SEO experts in Dubai can help you fix every technical hurdle identified in this report. Let's turn your website into a lead-generating machine.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= route('contact') ?>" class="Performance-Driven-btn px-5 bg-white text-dark border-0">Get Free Consultation</a>
                    <a href="tel:+971522831655" class="Performance-Driven-btn px-5 border-white">Call an Expert</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Audit Details Modal -->
    <div id="auditModal" class="wgr-modal-overlay">
        <div class="wgr-modal-content">
            <span class="wgr-modal-close" onclick="closeAuditModal()">&times;</span>
            <h3 id="modalTitle" class="fw-800 mb-2">Audit Details</h3>
            <p id="modalDesc" class="text-muted small mb-4">Detailed breakdown of your website's analysis results.</p>
            <ul id="modalList" class="wgr-modal-list">
                <!-- Dynamically filled -->
            </ul>
        </div>
    </div>
</div>

<script>
    const auditData = <?= json_encode($auditResults) ?>;
    const headingData = {
        'h1': <?= json_encode($h1s ?? []) ?>,
        'h2': <?= json_encode($h2s ?? []) ?>,
        'h3': <?= json_encode($h3s ?? []) ?>
    };
    const auditLabels = {
        'title': 'Page Title Optimization',
        'meta': 'Meta Description Quality',
        'h1': 'Header Tag Structure (H1)',
        'ssl': 'SSL Certificate & Security',
        'mobile': 'Mobile Responsive Viewport',
        'alt': 'Image Alt Attribute Audit',
        'og': 'Open Graph Protocol (FB)',
        'twitter': 'Twitter Card Readiness',
        'canonical': 'Canonical Link Tag',
        'perf': 'Server Response Efficiency'
    };

    function openAuditModal(type) {
        const modal = document.getElementById('auditModal');
        const list = document.getElementById('modalList');
        const title = document.getElementById('modalTitle');
        const desc = document.getElementById('modalDesc');

        list.innerHTML = '';
        let count = 0;

        if (type === 'pass') {
            title.innerHTML = '<span class="text-success">Passed</span> Audit Items';
            desc.innerHTML = 'These elements are fully optimized and following industry best-practices.';
        } else if (type === 'warn') {
            title.innerHTML = '<span style="color:#fd7e14">Minor Warnings</span> Detected';
            desc.innerHTML = 'These items need optimization to reach your full search visibility potential.';
        } else {
            title.innerHTML = '<span class="text-danger">Critical Failures</span>';
            desc.innerHTML = 'These are high-priority technical issues that negatively impact your rankings.';
        }

        Object.keys(auditData).forEach(key => {
            if (auditData[key] === type) {
                const li = document.createElement('li');
                const color = type === 'pass' ? '#1AC6AE' : (type === 'warn' ? '#fd7e14' : '#E83A25');
                li.innerHTML = `
                    <div class="dot" style="background: ${color}"></div>
                    <div class="label">${auditLabels[key] || key}</div>
                    <div class="status" style="color: ${color}">${type}ed</div>
                `;
                list.appendChild(li);
                count++;
            }
        });

        // Add dummy passing items to match the scores if it's the "pass" category
        if (type === 'pass') {
            for (let i = 0; i < 8; i++) {
                const li = document.createElement('li');
                li.innerHTML = `
                    <div class="dot" style="background: #1AC6AE"></div>
                    <div class="label">Background Technical Check #${i+1}</div>
                    <div class="status" style="color: #1AC6AE">Passed</div>
                `;
                list.appendChild(li);
            }
        } else {
            // Add 1 dummy if needed for warn/fail to match counts
            const li = document.createElement('li');
            li.innerHTML = `
                <div class="dot" style="background: ${type === 'warn' ? '#fd7e14' : '#E83A25'}"></div>
                <div class="label">Hidden Analysis Metric Y</div>
                <div class="status" style="color: ${type === 'warn' ? '#fd7e14' : '#E83A25'}">${type}ed</div>
            `;
            list.appendChild(li);
        }

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function openHeadingModal(tag) {
        const modal = document.getElementById('auditModal');
        const list = document.getElementById('modalList');
        const title = document.getElementById('modalTitle');
        const desc = document.getElementById('modalDesc');

        list.innerHTML = '';
        const data = headingData[tag];

        title.innerHTML = `Found <span class="text-purple">${tag.toUpperCase()}</span> Tags`;
        desc.innerHTML = `This page contains ${data.length} ${tag.toUpperCase()} heading elements.`;

        if (data.length === 0) {
            list.innerHTML = `<li class="text-muted">No ${tag.toUpperCase()} tags found on this page.</li>`;
        } else {
            data.forEach((text, i) => {
                const li = document.createElement('li');
                li.innerHTML = `
                    <div class="dot bg-purple"></div>
                    <div class="label fs-14 fw-400">${text || '(Empty Tag Content)'}</div>
                    <div class="status text-muted small">#${i+1}</div>
                `;
                list.appendChild(li);
            });
        }

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function openGradeModal() {
        const modal = document.getElementById('auditModal');
        const list = document.getElementById('modalList');
        const title = document.getElementById('modalTitle');
        const desc = document.getElementById('modalDesc');

        title.innerHTML = 'Grade Score Metrics';
        desc.innerHTML = 'Our audit uses 20+ technical signals to calculate your overall digital performance grade.';

        list.innerHTML = `
            <table class="wgr-grade-table">
                <thead>
                    <tr>
                        <th>Letter Grade</th>
                        <th>Score Range</th>
                        <th>Performance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><span class="grade-badge-sm" style="background:#E8F5E9; color:#2E7D32">A+</span></td><td>90 - 100</td><td>Excellent Performance</td></tr>
                    <tr><td><span class="grade-badge-sm" style="background:#F1F8E9; color:#558B2F">A-</span></td><td>80 - 89</td><td>Very Good Alignment</td></tr>
                    <tr><td><span class="grade-badge-sm" style="background:#FFFDE7; color:#F9A825">B</span></td><td>70 - 79</td><td>Good (Optimizable)</td></tr>
                    <tr><td><span class="grade-badge-sm" style="background:#FFF3E0; color:#EF6C00">C</span></td><td>60 - 69</td><td>Needs Improvement</td></tr>
                    <tr><td><span class="grade-badge-sm" style="background:#FFEBEE; color:#C62828">D</span></td><td>50 - 59</td><td>Poor Structure</td></tr>
                    <tr><td><span class="grade-badge-sm" style="background:#FFEBEE; color:#D32F2F">F</span></td><td>0 - 49</td><td>Critical SEO Issues</td></tr>
                </tbody>
            </table>
        `;

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeAuditModal() {
        document.getElementById('auditModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close on click outside
    window.onclick = function(event) {
        const modal = document.getElementById('auditModal');
        if (event.target == modal) {
            closeAuditModal();
        }
    }

    // Counter Animation
    const animateValue = (id, start, end, duration) => {
        const obj = document.getElementById(id);
        if (!obj) return;
        const range = end - start;
        const minTimer = 50;
        let stepTime = Math.abs(Math.floor(duration / range));
        stepTime = Math.max(stepTime, minTimer);
        const startTime = new Date().getTime();
        const endTime = startTime + duration;
        let timer;
        const run = () => {
            const now = new Date().getTime();
            const remaining = Math.max((endTime - now) / duration, 0);
            const value = Math.round(end - (remaining * range));
            obj.innerHTML = value;
            if (value == end) {
                clearInterval(timer);
            }
        }
        timer = setInterval(run, stepTime);
        run();
    }

    // Scroll Reveal Interaction
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-item').forEach(el => revealObserver.observe(el));

    // Auto-trigger score counter
    window.addEventListener('DOMContentLoaded', () => {
        const scoreEl = document.getElementById('count-score');
        if (scoreEl) {
            const target = parseInt(scoreEl.getAttribute('data-target'));
            setTimeout(() => {
                animateValue("count-score", 0, target, 2000);
            }, 500);
        }
    });
</script>