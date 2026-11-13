<?php
/**
 * Influencer Profile Card Component - BrandStory Dynamic Component
 * 
 * Configurable Parameters:
 * 
 * @var string|null $variant        Card theme: 'white' (White Card) or 'black' / 'dark' (Black Card).
 *                                  Also supports $cardBg, $bg, $theme, $themeMode.
 * @var string|null $title          Section title (e.g. 'Our Exclusive Creators'). Pass false to hide.
 * @var string|null $titleColor     Color of the title: 'white' (#fff), 'black' (#0f172a), or custom hex.
 * @var string|null $subtitle       Subtitle/Link text. Pass false to hide.
 * @var string|null $subtitleUrl    URL for the subtitle link (default: '#download-roster')
 * @var string|null $gridCol        Column grid class: 'col-lg-6 col-md-12' (default), 'col-12', etc.
 * @var int|null    $limit          Limit number of cards displayed (e.g. 1, 2, 4)
 * @var string|null $containerClass Wrapper container class (default: 'container py-4'). Pass false for no container wrapper.
 * @var array|null  $influencers    Custom array of influencer data (falls back to realistic demo data)
 * 
 * Quick Examples:
 *   // 1. BLACK CARD:
 *   $variant = "black";
 *   include __DIR__ . '/component/influencer_card.php';
 * 
 *   // 2. WHITE CARD:
 *   $variant = "white";
 *   include __DIR__ . '/component/influencer_card.php';
 */

// 1. Determine Card Theme (White vs Black)
$rawVariant = strtolower((string)($variant ?? ($cardBg ?? ($bg ?? ($theme ?? ($themeMode ?? ($card ?? 'white')))))));
$isBlackCard = in_array($rawVariant, ['black', 'dark', 'night'], true);

// 2. Resolve Parameters with Backwards Compatibility
$title          = isset($title) ? $title : ($sectionTitle ?? 'Influencer List');
$gridCol        = isset($gridCol) ? $gridCol : ($col ?? 'col-lg-6 col-md-12');
$limit          = isset($limit) ? (int)$limit : null;
$containerClass = isset($containerClass) ? $containerClass : 'container py-4';

// 3. Resolve Title Color
// If $titleColor is not explicitly passed:
// - If black card: title defaults to white (#ffffff)
// - If white card on dark page: user can pass $titleColor = 'white', otherwise defaults to #0f172a or white if $pageDark
if (!isset($titleColor)) {
    $titleColor = $isBlackCard ? '#ffffff' : '#0f172a';
} elseif ($titleColor === 'white') {
    $titleColor = '#ffffff';
} elseif ($titleColor === 'black' || $titleColor === 'dark') {
    $titleColor = '#0f172a';
}

// 4. Default Influencer Dataset (Clean, verified profiles matching screenshot)
if (empty($influencers)) {
    $influencers = [
        [
            'id'             => 'inf-1',
            'name'           => 'Dr. Naina Arya + Dr. Jitin Pahuja',
            'tagline'        => '✈️ Luxury Travel & Couple Lifestyle Creators',
            'handle'         => '@naina_jitin',
            'location'       => 'Mumbai & Dubai',
            'avatar'         => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80',
            'verified'       => true,
            'followers'      => '1.0M',
            'followers_full' => '1,048,200',
            'avg_views'      => '4.1M',
            'engagement_rate'=> '1.251%',
            'smart_er_label' => 'High ER',
            'collabs'        => [
                ['name' => 'Disney', 'label' => 'Disney', 'bg' => '#001a9c', 'color' => '#ffffff'],
                ['name' => 'Marriott', 'label' => 'M', 'bg' => '#b81238', 'color' => '#ffffff'],
                ['name' => 'Emirates', 'label' => 'EK', 'bg' => '#d71921', 'color' => '#ffffff'],
            ]
        ],
        [
            'id'             => 'inf-2',
            'name'           => 'Veidehi Gite',
            'tagline'        => '🏆 Consumer Feature of the Year Winner | Travel Writer',
            'handle'         => '@veidehigite',
            'location'       => 'Mumbai & London',
            'avatar'         => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=300&q=80',
            'verified'       => true,
            'followers'      => '837.1K',
            'followers_full' => '837,120',
            'avg_views'      => '38.6K',
            'engagement_rate'=> '0.162%',
            'smart_er_label' => 'Active',
            'collabs'        => [
                ['name' => 'Outlook', 'label' => 'OT', 'bg' => '#0284c7', 'color' => '#ffffff'],
                ['name' => 'Four Seasons', 'label' => 'FS', 'bg' => '#1e293b', 'color' => '#ffffff'],
                ['name' => 'Swarovski', 'label' => 'SW', 'bg' => '#0f766e', 'color' => '#ffffff'],
            ]
        ],
        [
            'id'             => 'inf-3',
            'name'           => 'Tarek Al-Mansoor',
            'tagline'        => '🏎️ Automotive & Tech Innovations in GCC',
            'handle'         => '@tarek_gcc',
            'location'       => 'Dubai, UAE',
            'avatar'         => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=300&q=80',
            'verified'       => true,
            'followers'      => '1.4M',
            'followers_full' => '1,420,000',
            'avg_views'      => '3.8M',
            'engagement_rate'=> '3.420%',
            'smart_er_label' => 'Top 1% ER',
            'collabs'        => [
                ['name' => 'Porsche', 'label' => 'P', 'bg' => '#b91c1c', 'color' => '#ffffff'],
                ['name' => 'Sony', 'label' => 'Sony', 'bg' => '#000000', 'color' => '#ffffff'],
                ['name' => 'Samsung', 'label' => 'SS', 'bg' => '#1d4ed8', 'color' => '#ffffff'],
            ]
        ],
        [
            'id'             => 'inf-4',
            'name'           => 'Maya Cherian',
            'tagline'        => '💄 High Fashion & Luxury Beauty Enthusiast',
            'handle'         => '@maya_cherian',
            'location'       => 'Abu Dhabi & Paris',
            'avatar'         => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=300&q=80',
            'verified'       => true,
            'followers'      => '620.5K',
            'followers_full' => '620,500',
            'avg_views'      => '890.2K',
            'engagement_rate'=> '2.740%',
            'smart_er_label' => 'High ER',
            'collabs'        => [
                ['name' => 'Dior', 'label' => 'CD', 'bg' => '#000000', 'color' => '#ffffff'],
                ['name' => 'Chanel', 'label' => 'CC', 'bg' => '#111827', 'color' => '#ffffff'],
                ['name' => 'Sephora', 'label' => 'S', 'bg' => '#000000', 'color' => '#ffffff'],
            ]
        ]
    ];
}

// Apply limit if specified
$displayInfluencers = $limit ? array_slice($influencers, 0, $limit) : $influencers;

// Theme classes
$wrapperThemeClass = $isBlackCard ? 'bs-theme-black' : 'bs-theme-white';
$cardThemeClass    = $isBlackCard ? 'bs-card-black' : 'bs-card-white';
?>

<style>
/* ==============================================================
 * BRANDSTORY INFLUENCER PROFILE CARD STYLES
 * Supports Instant Toggle: White Card vs Black Card
 * ============================================================== */
.bs-inf-wrapper {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    position: relative;
    width: 100%;
}

/* Header bar */
.bs-inf-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 24px;
}
.bs-inf-title {
    font-size: 28px;
    font-weight: 800;
    letter-spacing: -0.6px;
    margin: 0;
}
.bs-inf-subtitle-link {
    font-size: 14px;
    font-weight: 600;
    color: #0284c7;
    text-decoration: underline;
    text-underline-offset: 4px;
    transition: color 0.2s ease;
}
.bs-theme-black .bs-inf-subtitle-link {
    color: #38bdf8;
}
.bs-inf-subtitle-link:hover {
    opacity: 0.85;
}

/* Base Card Container */
.bs-inf-card {
    border-radius: 20px;
    padding: 26px 28px;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.bs-inf-card:hover {
    transform: translateY(-3px);
}

/* ==============================================================
 * 1. WHITE CARD VARIANT (Default)
 * ============================================================== */
.bs-card-white {
    background: #ffffff !important;
    border: 1px solid #eef2f6 !important;
    box-shadow: 0 4px 22px -2px rgba(15, 23, 42, 0.06) !important;
    color: #1e293b !important;
}
.bs-card-white:hover {
    box-shadow: 0 16px 36px -4px rgba(15, 23, 42, 0.12) !important;
    border-color: #cbd5e1 !important;
}
.bs-card-white .bs-inf-name {
    color: #0f172a !important;
}
.bs-card-white .bs-inf-tagline {
    color: #475569 !important;
}
.bs-card-white .bs-inf-location {
    color: #64748b !important;
}
.bs-card-white .bs-inf-stats-row {
    background: #f8fafc !important;
    border: 1px solid #f1f5f9 !important;
}
.bs-card-white .bs-inf-stat-val {
    color: #0f172a !important;
}
.bs-card-white .bs-inf-stat-val.bs-er-green {
    color: #10b981 !important;
}
.bs-card-white .bs-inf-stat-label {
    color: #64748b !important;
}
.bs-card-white .bs-inf-collabs-label {
    color: #64748b !important;
}
.bs-card-white .bs-inf-btn-contact {
    background: #2563eb !important;
    color: #ffffff !important;
    box-shadow: 0 4px 14px -2px rgba(37, 99, 235, 0.45) !important;
}
.bs-card-white .bs-inf-btn-contact:hover {
    background: #1d4ed8 !important;
    box-shadow: 0 6px 18px -2px rgba(37, 99, 235, 0.6) !important;
}

/* ==============================================================
 * 2. BLACK / DARK CARD VARIANT (BrandStory Night Glow)
 * ============================================================== */
.bs-card-black {
    background: #12161e !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
    color: #ffffff !important;
}
.bs-card-black:hover {
    border-color: rgba(232, 58, 38, 0.45) !important;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.75) !important;
}
.bs-card-black .bs-inf-name {
    color: #ffffff !important;
}
.bs-card-black .bs-inf-tagline {
    color: rgba(255, 255, 255, 0.7) !important;
}
.bs-card-black .bs-inf-location {
    color: rgba(255, 255, 255, 0.65) !important;
}
.bs-card-black .bs-inf-stats-row {
    background: #181d27 !important;
    border: 1px solid rgba(255, 255, 255, 0.08) !important;
}
.bs-card-black .bs-inf-stat-val {
    color: #ffffff !important;
}
.bs-card-black .bs-inf-stat-val.bs-er-green {
    color: #34d399 !important;
}
.bs-card-black .bs-inf-stat-label {
    color: rgba(255, 255, 255, 0.5) !important;
}
.bs-card-black .bs-inf-collabs-label {
    color: rgba(255, 255, 255, 0.65) !important;
}
.bs-card-black .bs-inf-btn-contact {
    background: #e83a26 !important;
    color: #ffffff !important;
    box-shadow: 0 4px 14px -2px rgba(232, 58, 38, 0.5) !important;
}
.bs-card-black .bs-inf-btn-contact:hover {
    background: #d22d1b !important;
    box-shadow: 0 6px 20px -2px rgba(232, 58, 38, 0.7) !important;
}

/* Top Profile Area */
.bs-inf-profile-top {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
}
.bs-inf-avatar-wrapper {
    position: relative;
    flex-shrink: 0;
}
.bs-inf-avatar {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    object-fit: cover;
    background: #334155;
    border: 2px solid #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
}
.bs-inf-verified-badge {
    position: absolute;
    bottom: -1px;
    right: -1px;
    width: 22px;
    height: 22px;
    background: #0284c7;
    color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ffffff;
    box-shadow: 0 2px 6px rgba(2, 132, 199, 0.4);
}

.bs-inf-name-group {
    flex-grow: 1;
    min-width: 0;
}
.bs-inf-name {
    font-size: 20px;
    font-weight: 800;
    line-height: 1.3;
    margin: 0 0 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.bs-inf-tagline {
    font-size: 13.5px;
    line-height: 1.4;
    margin: 0 0 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.bs-inf-location {
    font-size: 13px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-weight: 500;
}

/* Stats Row Container */
.bs-inf-stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    border-radius: 14px;
    padding: 16px 14px;
    margin-bottom: 22px;
    text-align: center;
}
.bs-inf-stat-item {
    display: flex;
    flex-direction: column;
}
.bs-inf-stat-val {
    font-size: 21px;
    font-weight: 800;
    line-height: 1.2;
}
.bs-inf-stat-label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 4px;
}

/* Collabs & CTA Bottom Row */
.bs-inf-bottom-action {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: auto;
}
.bs-inf-collabs-group {
    display: flex;
    align-items: center;
    gap: 8px;
}
.bs-inf-collabs-badges {
    display: flex;
    align-items: center;
    gap: 5px;
}
.bs-inf-brand-chip {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    font-size: 11px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1.5px solid #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
    overflow: hidden;
    text-transform: uppercase;
}
.bs-inf-collabs-label {
    font-size: 13px;
    font-weight: 600;
}

.bs-inf-btn-contact {
    font-size: 14px;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 12px;
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    transition: all 0.2s ease;
    cursor: pointer;
}
.bs-inf-btn-contact:hover {
    transform: translateY(-1px);
}

@media (max-width: 575px) {
    .bs-inf-card {
        padding: 20px 18px;
    }
    .bs-inf-name {
        font-size: 17px;
    }
    .bs-inf-stat-val {
        font-size: 18px;
    }
    .bs-inf-bottom-action {
        flex-direction: column;
        align-items: stretch;
    }
    .bs-inf-btn-contact {
        justify-content: center;
        width: 100%;
    }
}
</style>

<div class="bs-inf-wrapper <?= htmlspecialchars($wrapperThemeClass) ?>">
    <?php if (!empty($containerClass)): ?>
        <div class="<?= htmlspecialchars($containerClass) ?>">
    <?php endif; ?>

        <!-- Top Section Header (Shown only if title is given) -->
        <?php if (!empty($title)): ?>
            <div class="bs-inf-header">
                <h2 class="bs-inf-title" style="color: <?= htmlspecialchars($titleColor) ?> !important;">
                    <?= htmlspecialchars($title) ?>
                </h2>
            </div>
        <?php endif; ?>

        <!-- Influencer Cards Grid -->
        <div class="row g-4">
            <?php foreach ($displayInfluencers as $inf): ?>
                <div class="<?= htmlspecialchars($gridCol) ?>">
                    <div class="bs-inf-card <?= htmlspecialchars($cardThemeClass) ?>" id="<?= htmlspecialchars($inf['id'] ?? uniqid('inf-')) ?>">
                        
                        <!-- Top Profile Info -->
                        <div class="bs-inf-profile-top">
                            <div class="bs-inf-avatar-wrapper">
                                <img src="<?= htmlspecialchars($inf['avatar'] ?? '') ?>" 
                                     alt="<?= htmlspecialchars($inf['name'] ?? 'Influencer') ?>" 
                                     class="bs-inf-avatar" 
                                     loading="lazy">
                                <?php if (!empty($inf['verified'])): ?>
                                    <span class="bs-inf-verified-badge" title="Verified Creator">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="bs-inf-name-group">
                                <h3 class="bs-inf-name"><?= htmlspecialchars($inf['name'] ?? '') ?></h3>
                                <?php if (!empty($inf['tagline'])): ?>
                                    <p class="bs-inf-tagline"><?= htmlspecialchars($inf['tagline']) ?></p>
                                <?php endif; ?>
                                <span class="bs-inf-location">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    <?= htmlspecialchars($inf['location'] ?? 'Global') ?>
                                </span>
                            </div>
                        </div>

                        <!-- Key Metrics Row (Followers, Smart Avg Views, Smart ER) -->
                        <div class="bs-inf-stats-row">
                            <div class="bs-inf-stat-item">
                                <span class="bs-inf-stat-val"><?= htmlspecialchars($inf['followers'] ?? '—') ?></span>
                                <span class="bs-inf-stat-label">Followers</span>
                            </div>
                            <div class="bs-inf-stat-item">
                                <span class="bs-inf-stat-val"><?= htmlspecialchars($inf['avg_views'] ?? '—') ?></span>
                                <span class="bs-inf-stat-label">Smart Avg Views</span>
                            </div>
                            <div class="bs-inf-stat-item">
                                <span class="bs-inf-stat-val bs-er-green"><?= htmlspecialchars($inf['engagement_rate'] ?? '—') ?></span>
                                <span class="bs-inf-stat-label">Smart ER</span>
                            </div>
                        </div>

                        <!-- Bottom Row: Recent Collabs + Get Contact Button -->
                        <div class="bs-inf-bottom-action">
                            <?php if (!empty($inf['collabs'])): ?>
                                <div class="bs-inf-collabs-group">
                                    <div class="bs-inf-collabs-badges">
                                        <?php foreach (array_slice($inf['collabs'], 0, 3) as $collab): ?>
                                            <div class="bs-inf-brand-chip" 
                                                 title="<?= htmlspecialchars($collab['name'] ?? '') ?>"
                                                 style="background: <?= htmlspecialchars($collab['bg'] ?? '#1e293b') ?>; color: <?= htmlspecialchars($collab['color'] ?? '#ffffff') ?>;">
                                                <?= htmlspecialchars($collab['label'] ?? substr($collab['name'] ?? 'B', 0, 2)) ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <span class="bs-inf-collabs-label">Recent collabs</span>
                                </div>
                            <?php else: ?>
                                <div></div>
                            <?php endif; ?>

                            <a href="<?= htmlspecialchars($inf['contact_url'] ?? '#contact-influencer') ?>" 
                               class="bs-inf-btn-contact"
                               data-influencer-name="<?= htmlspecialchars($inf['name'] ?? '') ?>"
                               onclick="handleInfluencerContact(this, event)">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                Get Contact
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php if (!empty($containerClass)): ?>
        </div>
    <?php endif; ?>
</div>

<script>
// Contact button handler
if (typeof handleInfluencerContact === 'undefined') {
    function handleInfluencerContact(el, e) {
        const name = el.getAttribute('data-influencer-name');
        console.log('Initiating collaboration enquiry with:', name);
        if (typeof window.openContactPopup === 'function') {
            e.preventDefault();
            window.openContactPopup();
        }
        const modalInput = document.querySelector('input[name="enquiry_subject"], input[name="service"]');
        if (modalInput) {
            modalInput.value = 'Influencer Outreach: ' + name;
        }
    }
}
</script>
<?php
// Reset local scope variables so subsequent includes in the same request don't accidentally inherit them
unset($title, $titleColor, $subtitle, $subtitleUrl, $variant, $cardBg, $bg, $theme, $themeMode, $card, $gridCol, $limit, $containerClass, $influencers);
?>
