<?php
$blogModel = new \App\Models\Blog();
$category_name = $category_name ?? null;
$max_items = $max_items ?? 6;

$sql = "SELECT b.*, c.name as category_name, c.slug as category_slug FROM blogs b LEFT JOIN blog_categories c ON b.blog_category_id = c.id WHERE 1=1";
$params = [];

if ($category_name) {
    $sql .= " AND c.name = ?";
    $params[] = $category_name;
}

$sql .= " ORDER BY b.created_at DESC LIMIT " . (int)$max_items;
$blogs = $blogModel->query($sql, $params);
?>

<section class="dm-page service-page dynamic-blog-component">
    <div class="sp-50 dm-blog-section bg-white">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-7">
                    <h2 class="text-md-start text-center mb-0">Explore Related Articles<br>
                        In the Industry
                    </h2>
                </div>
                <div class="col-md-5 mt-md-0 mt-3 px-0">
                    <div class="blog-search-wrapper">
                        <div class="search-input-group">
                            <input type="text" id="blogSearchInput" placeholder="Search articles..." class="form-control" autocomplete="off">
                            <button class="search-btn"><i class="ion-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="position-relative delivertechmain">
                <div class="swiper dmblog-sld" id="dynamicBlogSwiper">
                    <div class="swiper-wrapper" id="blogSwiperWrapper">
                        <?php if (!empty($blogs)): ?>
                            <?php foreach ($blogs as $blog): ?>
                                <div class="swiper-slide">
                                    <div class="latest-blog-main">
                                        <img class="w-100 dm-blog-img" src="<?= $blog['image'] ? base_url($blog['image']) : base_url('assets/images/blog/blog-img-1.webp') ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
                                        <h3><a href="/blogs/<?= $blog['slug'] ?>/" style="color: #000; text-decoration: none;"><?= htmlspecialchars($blog['title']) ?></a></h3>
                                        <p class="fs-20"><?= substr(strip_tags($blog['description']), 0, 150) ?>...</p>
                                        <div class="casestydies-readmore">
                                            <a href="/blogs/<?= $blog['slug'] ?>/">Know more <img src="<?= base_url('assets/images/dm-agency-dubai/readmore-arrow.svg?v=1') ?>"></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="swiper-slide no-results">
                                <p class="text-center w-100">No articles found.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="swiper-button-next dmblog-next"></div>
                <div class="swiper-button-prev dmblog-prev"></div>
            </div>
        </div>
    </div>
</section>

<style>
    .dynamic-blog-component .blog-search-wrapper {
        position: relative;
        max-width: 400px;
        margin-left: auto;
    }

    .dynamic-blog-component .search-input-group {
        display: flex;
        border: 2px solid #f0f0f0;
        border-radius: 50px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: #fff;
    }

    .dynamic-blog-component .search-input-group:focus-within {
        border-color: #855BFF;
        box-shadow: 0 0 15px rgba(133, 91, 255, 0.1);
    }

    .dynamic-blog-component #blogSearchInput {
        border: none;
        padding: 16px 20px;
        flex-grow: 1;
        outline: none;
        font-size: 16px;
        margin: 0;
    }

    .dynamic-blog-component .search-btn {
        background: #855BFF;
        border: none;
        color: white;
        padding: 0 25px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .dynamic-blog-component .search-btn:hover {
        background: #6a42e5;
    }

    .dynamic-blog-component .latest-blog-main {
        padding: 20px;
        border-radius: 15px;
        background: #fff;
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .dynamic-blog-component .latest-blog-main:hover {
        transform: translateY(-5px);
    }

    .dynamic-blog-component .dm-blog-img {
        border-radius: 10px;
        margin-bottom: 20px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .dynamic-blog-component h3 {
        font-size: 22px;
        margin-bottom: 15px;
        height: 3em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        line-clamp: 2;
    }

    .dynamic-blog-component .search-btn i {
        font-size: 22px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let swiper = null;

        function initSwiper() {
            if (typeof Swiper === 'undefined') {
                setTimeout(initSwiper, 100);
                return;
            }
            if (swiper) swiper.destroy(true, true);
            swiper = new Swiper('#dynamicBlogSwiper', {
                slidesPerView: 1,
                spaceBetween: 40,
                loop: true,
                navigation: {
                    nextEl: '.dmblog-next',
                    prevEl: '.dmblog-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    }
                }
            });
        }

        initSwiper();

        const searchInput = document.getElementById('blogSearchInput');
        let debounceTimer;

        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const query = this.value;
                const category = '<?= $category_name ?>';
                const limit = '<?= $max_items ?>';

                fetch(`/api/blogs/search?q=${encodeURIComponent(query)}&limit=${limit}`)
                    .then(response => response.json())
                    .then(data => {
                        updateSlider(data);
                    })
                    .catch(err => console.error('Error searching blogs:', err));
            }, 500);
        });

        function updateSlider(blogs) {
            const wrapper = document.getElementById('blogSwiperWrapper');
            wrapper.innerHTML = '';
            const baseUrl = '<?= base_url() ?>'.replace(/\/+$/, '');
            const defaultImg = baseUrl + '/assets/images/blog/blog-img-1.webp';
            const arrowImg = baseUrl + '/assets/images/dm-agency-dubai/readmore-arrow.svg?v=1';

            if (blogs.length === 0) {
                wrapper.innerHTML = '<div class="swiper-slide"><p class="text-center w-100 py-5">No articles found matching your search.</p></div>';
                initSwiper();
                return;
            }

            blogs.forEach(blog => {
                const description = blog.description.replace(/<[^>]*>?/gm, '').substring(0, 150) + '...';
                const imgPath = blog.image ? (blog.image.startsWith('http') ? blog.image : baseUrl + '/' + blog.image.replace(/^\/+/, '')) : defaultImg;

                const slide = `
                <div class="swiper-slide">
                    <div class="latest-blog-main">
                        <img class="w-100 dm-blog-img" src="${imgPath}" alt="${blog.title}">
                        <h3><a href="/blogs/${blog.slug}/" style="color: #000; text-decoration: none;">${blog.title}</a></h3>
                        <p class="fs-20">${description}</p>
                        <div class="casestydies-readmore">
                            <a href="/blogs/${blog.slug}/">Know more <img src="${arrowImg}"></a>
                        </div>
                    </div>
                </div>
            `;
                wrapper.insertAdjacentHTML('beforeend', slide);
            });

            initSwiper();
        }
    });
</script>