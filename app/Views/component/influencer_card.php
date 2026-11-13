<?php
/**
 * Influencer Profile Card Component - BrandStory Dynamic Component
 * Prefix: influencer_card_ (All classes strictly prefixed to prevent conflicts)
 * 
 * Configurable Parameters:
 * @var string|null $variant        Card theme: 'white' (White Card) or 'black' / 'dark' (Black Card).
 *                                  Also supports $cardBg, $bg, $theme, $themeMode.
 * @var string|null $title          Section title (e.g. 'Our Exclusive Creators'). Pass false to hide.
 * @var string|null $titleColor     Color of the title: 'white' (#fff), 'black' (#0f172a), or custom hex.
 * @var int|null    $limit          Limit number of cards displayed (e.g. 1, 2, 4)
 * @var array|null  $influencers    Custom array of influencer data (falls back to realistic demo data)
 */

// 1. Determine Card Theme (White vs Black)
$rawVariant  = strtolower((string)($variant ?? ($cardBg ?? ($bg ?? ($theme ?? ($themeMode ?? ($card ?? 'white')))))));
$isBlackCard = in_array($rawVariant, ['black', 'dark', 'night'], true);

// 2. Resolve Parameters
$title = isset($title) ? $title : ($sectionTitle ?? 'Influencer List');
$limit = isset($limit) ? (int)$limit : null;

// 3. Resolve Title Color
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

// Theme classes strictly prefixed
$wrapperThemeClass = $isBlackCard ? 'influencer_card_theme_black' : 'influencer_card_theme_white';
$cardThemeClass    = $isBlackCard ? 'influencer_card_black' : 'influencer_card_white';
?>

<style>
/* ==============================================================
 * BRANDSTORY INFLUENCER PROFILE CARD STYLES
 * 100% Isolated CSS Namespace: influencer_card_
 * No external Bootstrap classes used!
 * ============================================================== */
.influencer_card_wrapper {
    position: relative;
    width: 100%;
    box-sizing: border-box;
}

/* Isolated Container */
.influencer_card_container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 120px;
    padding-bottom: 120px;
    box-sizing: border-box;
}

/* Isolated Grid Row */
.influencer_card_row {
    display: flex;
    flex-wrap: wrap;
    margin-left: -14px;
    margin-right: -14px;
    row-gap: 24px;
    box-sizing: border-box;
}

/* Isolated Grid Column (2 per row on desktop, 1 on mobile) */
.influencer_card_col {
    flex: 0 0 50%;
    max-width: 50%;
    padding-left: 14px;
    padding-right: 14px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}

@media (max-width: 991px) {
    .influencer_card_col {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

/* Header bar */
.influencer_card_header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 24px;
    box-sizing: border-box;
}
.influencer_card_title {
    font-size: 48px;
    font-weight: 500;
    letter-spacing: -0.6px;
    margin: 0;
}

/* Base Card Container */
.influencer_card_card {
    border-radius: 20px;
    padding: 26px 28px;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-sizing: border-box;
}
.influencer_card_card:hover {
    transform: translateY(-3px);
}

/* ==============================================================
 * 1. WHITE CARD VARIANT (.influencer_card_white)
 * ============================================================== */
.influencer_card_white {
    background: #ffffff !important;
    border: 1px solid #eef2f6 !important;
    box-shadow: 0 4px 22px -2px rgba(15, 23, 42, 0.06) !important;
    color: #1e293b !important;
}
.influencer_card_white:hover {
    box-shadow: 0 16px 36px -4px rgba(15, 23, 42, 0.12) !important;
    border-color: #cbd5e1 !important;
}
.influencer_card_white .influencer_card_name {
    color: #0f172a !important;
}
.influencer_card_white .influencer_card_tagline {
    color: #475569 !important;
}
.influencer_card_white .influencer_card_location {
    color: #64748b !important;
}
.influencer_card_white .influencer_card_stats_row {
    background: #f8fafc !important;
    border: 1px solid #f1f5f9 !important;
}
.influencer_card_white .influencer_card_stat_val {
    color: #0f172a !important;
}
.influencer_card_white .influencer_card_stat_val.influencer_card_er_green {
    color: #10b981 !important;
}
.influencer_card_white .influencer_card_stat_label {
    color: #64748b !important;
}
.influencer_card_white .influencer_card_collabs_label {
    color: #64748b !important;
}
.influencer_card_white .influencer_card_btn_contact {
    background: #2563eb !important;
    color: #ffffff !important;
    box-shadow: 0 4px 14px -2px rgba(37, 99, 235, 0.45) !important;
}
.influencer_card_white .influencer_card_btn_contact:hover {
    background: #1d4ed8 !important;
    box-shadow: 0 6px 18px -2px rgba(37, 99, 235, 0.6) !important;
}

/* ==============================================================
 * 2. BLACK / DARK CARD VARIANT (.influencer_card_black)
 * ============================================================== */
.influencer_card_black {
    background: #12161e !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
    color: #ffffff !important;
}
.influencer_card_black:hover {
    border-color: rgba(232, 58, 38, 0.45) !important;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.75) !important;
}
.influencer_card_black .influencer_card_name {
    color: #ffffff !important;
}
.influencer_card_black .influencer_card_tagline {
    color: rgba(255, 255, 255, 0.7) !important;
}
.influencer_card_black .influencer_card_location {
    color: rgba(255, 255, 255, 0.65) !important;
}
.influencer_card_black .influencer_card_stats_row {
    background: #181d27 !important;
    border: 1px solid rgba(255, 255, 255, 0.08) !important;
}
.influencer_card_black .influencer_card_stat_val {
    color: #ffffff !important;
}
.influencer_card_black .influencer_card_stat_val.influencer_card_er_green {
    color: #34d399 !important;
}
.influencer_card_black .influencer_card_stat_label {
    color: rgba(255, 255, 255, 0.5) !important;
}
.influencer_card_black .influencer_card_collabs_label {
    color: rgba(255, 255, 255, 0.65) !important;
}
.influencer_card_black .influencer_card_btn_contact {
    background: #e83a26 !important;
    color: #ffffff !important;
    box-shadow: 0 4px 14px -2px rgba(232, 58, 38, 0.5) !important;
}
.influencer_card_black .influencer_card_btn_contact:hover {
    background: #d22d1b !important;
    box-shadow: 0 6px 20px -2px rgba(232, 58, 38, 0.7) !important;
}

/* Top Profile Area */
.influencer_card_profile_top {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
    box-sizing: border-box;
}
.influencer_card_avatar_wrapper {
    position: relative;
    flex-shrink: 0;
}
.influencer_card_avatar {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    object-fit: cover;
    background: #334155;
    border: 2px solid #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    display: block;
}
.influencer_card_verified_badge {
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

.influencer_card_name_group {
    flex-grow: 1;
    min-width: 0;
}
.influencer_card_name {
    font-size: 20px;
    font-weight: 800;
    line-height: 1.3;
    margin: 0 0 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.influencer_card_tagline {
    font-size: 13.5px;
    line-height: 1.4;
    margin: 0 0 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.influencer_card_location {
    font-size: 13px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-weight: 500;
}

/* Stats Row Container */
.influencer_card_stats_row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    border-radius: 14px;
    padding: 16px 14px;
    margin-bottom: 22px;
    text-align: center;
    box-sizing: border-box;
}
.influencer_card_stat_item {
    display: flex;
    flex-direction: column;
}
.influencer_card_stat_val {
    font-size: 21px;
    font-weight: 800;
    line-height: 1.2;
}
.influencer_card_stat_label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 4px;
}

/* Collabs & CTA Bottom Row */
.influencer_card_bottom_action {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: auto;
    box-sizing: border-box;
}
.influencer_card_collabs_group {
    display: flex;
    align-items: center;
    gap: 8px;
}
.influencer_card_collabs_badges {
    display: flex;
    align-items: center;
    gap: 5px;
}
.influencer_card_brand_chip {
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
    box-sizing: border-box;
}
.influencer_card_collabs_label {
    font-size: 13px;
    font-weight: 600;
}

.influencer_card_btn_contact {
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
    box-sizing: border-box;
}
.influencer_card_btn_contact:hover {
    transform: translateY(-1px);
}
@media (max-width: 767px) {
  .influencer_card_container {
          padding: 40px 24px ;
}
.influencer_card_title {
    font-size: 28px;
    font-weight: 500;
    margin: 0;
}

}

@media (max-width: 575px) {
    .influencer_card_card {
        padding: 20px 18px;
    }
    .influencer_card_name {
        font-size: 17px;
    }
    .influencer_card_stat_val {
        font-size: 18px;
    }
    .influencer_card_bottom_action {
        flex-direction: column;
        align-items: stretch;
    }
    .influencer_card_btn_contact {
        justify-content: center;
        width: 100%;
    }
    
}
</style>

<div class="influencer_card_wrapper <?= htmlspecialchars($wrapperThemeClass) ?>">
    <div class="influencer_card_container">

        <!-- Top Section Header (Shown only if title is given) -->
        <?php if (!empty($title)): ?>
            <div class="influencer_card_header">
                <h2 class="influencer_card_title" style="color: <?= htmlspecialchars($titleColor) ?> !important;">
                    <?= htmlspecialchars($title) ?>
                </h2>
            </div>
        <?php endif; ?>

        <!-- Influencer Cards Grid -->
        <div class="influencer_card_row">
            <?php foreach ($displayInfluencers as $inf): ?>
                <div class="influencer_card_col">
                    <div class="influencer_card_card <?= htmlspecialchars($cardThemeClass) ?>" id="<?= htmlspecialchars($inf['id'] ?? uniqid('inf-')) ?>">
                        
                        <!-- Top Profile Info -->
                        <div class="influencer_card_profile_top">
                            <div class="influencer_card_avatar_wrapper">
                                <img src="<?= htmlspecialchars($inf['avatar'] ?? '') ?>" 
                                     alt="<?= htmlspecialchars($inf['name'] ?? 'Influencer') ?>" 
                                     class="influencer_card_avatar" 
                                     loading="lazy">
                                <?php if (!empty($inf['verified'])): ?>
                                    <span class="influencer_card_verified_badge" title="Verified Creator">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="influencer_card_name_group">
                                <h3 class="influencer_card_name"><?= htmlspecialchars($inf['name'] ?? '') ?></h3>
                                <?php if (!empty($inf['tagline'])): ?>
                                    <p class="influencer_card_tagline"><?= htmlspecialchars($inf['tagline']) ?></p>
                                <?php endif; ?>
                                <span class="influencer_card_location">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    <?= htmlspecialchars($inf['location'] ?? 'Global') ?>
                                </span>
                            </div>
                        </div>

                        <!-- Key Metrics Row (Followers, Smart Avg Views, Smart ER) -->
                        <div class="influencer_card_stats_row">
                            <div class="influencer_card_stat_item">
                                <span class="influencer_card_stat_val"><?= htmlspecialchars($inf['followers'] ?? '—') ?></span>
                                <span class="influencer_card_stat_label">Followers</span>
                            </div>
                            <div class="influencer_card_stat_item">
                                <span class="influencer_card_stat_val"><?= htmlspecialchars($inf['avg_views'] ?? '—') ?></span>
                                <span class="influencer_card_stat_label">Smart Avg Views</span>
                            </div>
                            <div class="influencer_card_stat_item">
                                <span class="influencer_card_stat_val influencer_card_er_green"><?= htmlspecialchars($inf['engagement_rate'] ?? '—') ?></span>
                                <span class="influencer_card_stat_label">Smart ER</span>
                            </div>
                        </div>

                        <!-- Bottom Row: Recent Collabs + Get Contact Button -->
                        <div class="influencer_card_bottom_action">
                            <?php if (!empty($inf['collabs'])): ?>
                                <div class="influencer_card_collabs_group">
                                    <div class="influencer_card_collabs_badges">
                                        <?php foreach (array_slice($inf['collabs'], 0, 3) as $collab): ?>
                                            <div class="influencer_card_brand_chip" 
                                                 title="<?= htmlspecialchars($collab['name'] ?? '') ?>"
                                                 style="background: <?= htmlspecialchars($collab['bg'] ?? '#1e293b') ?>; color: <?= htmlspecialchars($collab['color'] ?? '#ffffff') ?>;">
                                                <?= htmlspecialchars($collab['label'] ?? substr($collab['name'] ?? 'B', 0, 2)) ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <span class="influencer_card_collabs_label">Recent collabs</span>
                                </div>
                            <?php else: ?>
                                <div></div>
                            <?php endif; ?>

                            <a href="<?= htmlspecialchars($inf['contact_url'] ?? '#contact-influencer') ?>" 
                               class="influencer_card_btn_contact"
                               data-influencer-name="<?= htmlspecialchars($inf['name'] ?? '') ?>"
                               onclick="handleInfluencerCardContact(this, event)">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                Get Contact
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<script>
// Contact button handler with unique prefix
if (typeof handleInfluencerCardContact === 'undefined') {
    function handleInfluencerCardContact(el, e) {
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
