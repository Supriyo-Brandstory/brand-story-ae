<style>
.bs-showcase-hero {
    background: #0f172a;
    padding: 70px 0 50px;
    color: #ffffff;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
.bs-showcase-badge {
    background: rgba(37, 99, 235, 0.2);
    color: #60a5fa;
    border: 1px solid rgba(37, 99, 235, 0.4);
    font-size: 12px;
    font-weight: 700;
    padding: 5px 14px;
    border-radius: 100px;
    display: inline-block;
    margin-bottom: 14px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
}
.bs-showcase-title {
    font-size: 38px;
    font-weight: 800;
    letter-spacing: -1px;
    margin-bottom: 12px;
}
.bs-showcase-subtitle {
    color: #94a3b8;
    font-size: 16px;
    max-width: 650px;
    line-height: 1.6;
}
.bs-section-dark {
    padding: 70px 0;
    background: #090c12;
}
.bs-mode-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 16px;
    border-radius: 100px;
    background: #e2e8f0;
    color: #334155;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 24px;
}
</style>

<!-- Hero Banner -->
<section class="bs-showcase-hero">
    <div class="container">
        <span class="bs-showcase-badge">✨ Dynamic Profile Component</span>
        <h1 class="bs-showcase-title">Influencer Profile Card Component</h1>
        <p class="bs-showcase-subtitle">
            Clean, high-converting creator profile cards showcasing verified badges, key metrics, brand collabs, and direct contact outreach.
        </p>
    </div>
</section>

<!-- SECTION 1: Light Mode (Matching User Screenshot) -->
<section class="py-5 bg-white">
    <div class="container">
        <?php
        $gridCol = 'col-lg-6 col-md-12';
        $themeMode = 'light';
        $sectionTitle = 'Influencer List';
        $sectionDesc = 'Download the full list (work email required)';
        include dirname(__DIR__) . '/component/influencer_card.php';
        ?>
    </div>
</section>

<!-- SECTION 2: Dark Mode (BrandStory Night Palette) -->
<section class="bs-section-dark">
    <div class="container">
        <div class="bs-mode-pill bg-dark text-white border border-secondary mb-4">
            <span>🌙</span> <strong>Dark Glow Mode</strong>
        </div>
        
        <?php
        $gridCol = 'col-lg-6 col-md-12';
        $themeMode = 'dark';
        $sectionTitle = 'Elite Brand Ambassadors';
        $sectionDesc = 'Download Q4 Roster & Rate Card';
        include dirname(__DIR__) . '/component/influencer_card.php';
        ?>
    </div>
</section>
