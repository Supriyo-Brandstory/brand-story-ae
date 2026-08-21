<?php
/**
 * Reusable Blog Carousel Component
 * 
 * Usage in any view file:
 *   <?php 
 *     $category = 'UI/UX Design'; 
 *     include __DIR__ . '/../component/blog_carousel.php'; 
 *   ?>
 */

$padding= $padding ?? "spb-50";
$category_name = $category_name ?? $category ?? '';
if (!empty($category_name)) {
    $section_title = $section_title ?? "Latest Blogs on <span class='ba2-title-gradient'>" . htmlspecialchars($category_name) . "</span>";
} else {
    $section_title = $section_title ?? "Latest <span class='ba2-title-gradient'>Blogs</span>";
}
$section_subtitle = $section_subtitle ?? "Explore our latest articles, insights, and industry updates.";
$max_items = $max_items ?? 6;


$blogs = [];

// Dynamic database query for category-filtered blogs
try {
    if (class_exists('\App\Models\Blog')) {
        $blogModel = new \App\Models\Blog();
        $sql = "SELECT b.*, c.name as category_name, c.slug as category_slug 
                FROM blogs b 
                LEFT JOIN blog_categories c ON b.blog_category_id = c.id 
                WHERE (c.name LIKE ? OR b.title LIKE ?)
                ORDER BY b.created_at DESC LIMIT " . (int)$max_items;
        $dbBlogs = $blogModel->query($sql, ["%" . $category_name . "%", "%" . $category_name . "%"]);
        if (!empty($dbBlogs)) {
            $blogs = $dbBlogs;
        }
    }
} catch (\Throwable $e) {
    $blogs = [];
}

// Fallback category articles if DB results are empty
if (empty($blogs)) {
    $allFallbacks = [
        'UI/UX Design' => [
            [
                'title' => 'Top UI/UX Design Trends Driving Conversions in Dubai 2025',
                'slug' => 'top-ui-ux-design-trends-dubai-2025',
                'description' => 'Explore the futuristic UI/UX trends shaping mobile app and web experiences across Dubai and the wider GCC region.',
                'image' => 'assets/images/blog/The-Most-Important-Elements-of-A-Website-Design.png',
                'category' => 'UI/UX Design',
                'date' => 'May 14, 2025'
            ],
            [
                'title' => 'How User Research & Prototyping Reduce Website Redesign Costs',
                'slug' => 'how-user-research-prototyping-reduce-costs',
                'description' => 'Learn why interactive wireframing and user testing eliminate expensive revisions during digital product development.',
                'image' => 'assets/images/blog/5-Digital-Marketing-Trends-And-Innovations-For-2020.png',
                'category' => 'UI/UX Design',
                'date' => 'Apr 28, 2025'
            ],
            [
                'title' => 'Building Inclusive & Accessible Digital Experiences (WCAG 2.2)',
                'slug' => 'building-accessible-digital-experiences-wcag',
                'description' => 'A comprehensive guide on creating high-contrast, screen-reader friendly web interfaces that engage every customer.',
                'image' => 'assets/images/blog/SEO-Tips-and-Tricks-to-attract-more-web-traffic.png',
                'category' => 'UI/UX Design',
                'date' => 'Mar 10, 2025'
            ],
            [
                'title' => 'Design Systems vs Component Libraries: What Scaling Brands Need',
                'slug' => 'design-systems-vs-component-libraries',
                'description' => 'Discover how a unified design system speeds up cross-platform deployment for web and native mobile applications.',
                'image' => 'assets/images/blog/advanced-keyword-tactics-banner-2.webp',
                'category' => 'UI/UX Design',
                'date' => 'Feb 18, 2025'
            ]
        ],
        'Branding' => [
            [
                'title' => 'Crafting an Iconic Brand Identity for GCC & Middle East Markets',
                'slug' => 'crafting-iconic-brand-identity-gcc',
                'description' => 'How strategic brand positioning, cultural storytelling, and visual guidelines set market leaders apart.',
                'image' => 'assets/images/blog/arabic-seo-in-dubai/img1.jpg',
                'category' => 'Branding',
                'date' => 'Jun 01, 2025'
            ],
            [
                'title' => 'The ROI of Rebranding: When and How to Refresh Your Corporate Identity',
                'slug' => 'roi-of-rebranding-corporate-identity',
                'description' => 'Key indicators that your corporate identity needs a refresh to capture new high-value audience segments.',
                'image' => 'assets/images/blog/seo-camp-results/seo-camp-img1.png',
                'category' => 'Branding',
                'date' => 'May 20, 2025'
            ]
        ],
        'Digital Marketing' => [
            [
                'title' => 'AI-Driven Marketing Strategies for UAE Businesses in 2025',
                'slug' => 'ai-driven-marketing-strategies-uae-2025',
                'description' => 'Master data-backed performance marketing, omni-channel campaigns, and AI conversion rate optimization.',
                'image' => 'assets/images/blog/mobile-seo-2025-banner-2.webp',
                'category' => 'Digital Marketing',
                'date' => 'Jun 12, 2025'
            ],
            [
                'title' => 'Maximizing ROAS with High-Intent Performance Campaigns',
                'slug' => 'maximizing-roas-performance-campaigns',
                'description' => 'A proven framework to lower Customer Acquisition Cost (CAC) while scaling paid media campaigns across Dubai.',
                'image' => 'assets/images/blog/ai-overviews-google-search-2025-banner-2.webp',
                'category' => 'Digital Marketing',
                'date' => 'May 30, 2025'
            ]
        ]
    ];

    $selectedKey = 'UI/UX Design';
    foreach ($allFallbacks as $k => $items) {
        if (stripos($category_name, $k) !== false || stripos($k, $category_name) !== false) {
            $selectedKey = $k;
            break;
        }
    }
    $blogs = $allFallbacks[$selectedKey] ?? $allFallbacks['UI/UX Design'];
}
?>

<section class="ba2-section blog-carousel-section <?= $padding ?>">
  <div class="container">
    <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-5 gap-3">
      <div>
       
        <h2 class="ba2-title-large text-white mb-2"><?= $section_title ?></h2>
        <p class="text-white mb-0"><?= htmlspecialchars($section_subtitle) ?></p>
      </div>

      <!-- Navigation buttons -->
      <div class="blog-carousel-controls d-flex align-items-center gap-3">
        <button class="blog-carousel-btn blog-carousel-prev" aria-label="Previous Slide">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
        </button>
        <button class="blog-carousel-btn blog-carousel-next" aria-label="Next Slide">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </button>
      </div>
    </div>

    <!-- Swiper Carousel Container -->
    <div class="swiper blog-carousel-swiper-container">
      <div class="swiper-wrapper">
        <?php foreach ($blogs as $b): ?>
          <?php 
            $b_title = is_array($b) ? ($b['title'] ?? '') : ($b->title ?? '');
            $b_slug = is_array($b) ? ($b['slug'] ?? '') : ($b->slug ?? '');
            $b_desc = is_array($b) ? ($b['description'] ?? '') : ($b->description ?? '');
            $b_img = is_array($b) ? ($b['image'] ?? '') : ($b->image ?? '');
            $b_cat = is_array($b) ? ($b['category'] ?? $b['category_name'] ?? $category_name) : ($b->category_name ?? $category_name);
            $img_url = $b_img ? (strpos($b_img, 'http') === 0 ? $b_img : base_url($b_img)) : base_url('assets/images/blog/The-Most-Important-Elements-of-A-Website-Design.png');
          ?>
          <div class="swiper-slide">
            <article class="blog-carousel-card">
              <div class="blog-carousel-img-box">
                <img src="<?= $img_url ?>" alt="<?= htmlspecialchars($b_title) ?>" class="blog-carousel-img" loading="lazy">
                <span class="blog-carousel-cat-badge"><?= htmlspecialchars($b_cat) ?></span>
              </div>
              <div class="blog-carousel-card-body">
                <h3 class="blog-carousel-card-title">
                  <a href="<?= base_url('blogs/' . $b_slug . '/') ?>"><?= htmlspecialchars($b_title) ?></a>
                </h3>
                <p class="blog-carousel-card-excerpt">
                  <?= htmlspecialchars(substr(strip_tags($b_desc), 0, 120)) ?>...
                </p>
                <div class="blog-carousel-card-footer mt-auto pt-3">
                  <a href="<?= base_url('blogs/' . $b_slug . '/') ?>" class="blog-carousel-read-more">
                    <span>Read Article</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                      <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                  </a>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<style>
  .blog-carousel-section {
    position: relative;
    z-index: 2;
  }

  .blog-carousel-controls {
    flex-shrink: 0;
  }

  .blog-carousel-btn {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .blog-carousel-btn:hover {
    background: #855bff;
    border-color: #855bff;
    box-shadow: 0 0 20px rgba(133, 91, 255, 0.4);
    transform: translateY(-2px);
  }

  .blog-carousel-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(15px);
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .blog-carousel-card:hover {
    border-color: rgba(133, 91, 255, 0.4);
    background: rgba(133, 91, 255, 0.06);
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
  }

  .blog-carousel-img-box {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    overflow: hidden;
  }

  .blog-carousel-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .blog-carousel-card:hover .blog-carousel-img {
    transform: scale(1.06);
  }

  .blog-carousel-cat-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    padding: 4px 12px;
    border-radius: 50px;
    background: rgba(13, 15, 22, 0.85);
    border: 1px solid rgba(133, 91, 255, 0.3);
    color: #b599ff;
    font-size: 12px;
    font-weight: 600;
    backdrop-filter: blur(8px);
  }

  .blog-carousel-card-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .blog-carousel-card-title {
    font-size: 19px;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .blog-carousel-card-title a {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .blog-carousel-card-title a:hover {
    color: #b599ff;
  }

  .blog-carousel-card-excerpt {
    color: rgba(255, 255, 255, 0.65);
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 0;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .blog-carousel-read-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #b599ff;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none !important;
    transition: all 0.3s ease;
  }

  .blog-carousel-read-more:hover {
    color: #ffffff;
    gap: 12px;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    function initBlogCarousel() {
      if (typeof Swiper === 'undefined') {
        setTimeout(initBlogCarousel, 100);
        return;
      }
      new Swiper('.blog-carousel-swiper-container', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.blog-carousel-next',
          prevEl: '.blog-carousel-prev',
        },
        breakpoints: {
          640: { slidesPerView: 1, spaceBetween: 20 },
          768: { slidesPerView: 2, spaceBetween: 24 },
          1024: { slidesPerView: 3, spaceBetween: 30 }
        }
      });
    }
    initBlogCarousel();
  });
</script>
