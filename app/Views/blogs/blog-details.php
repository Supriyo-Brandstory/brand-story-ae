<section class="new-blog-heading-section sp-80">
    <div class="container text-center">
        <h4 class="text-white mb-4 text-uppercase">BLOG</h4>
        <h1 class="text-center mb-4"><?= htmlspecialchars($blog['title']) ?></h1>
        <div class="newblog-btn d-flex justify-content-center">
            <a href="<?= route('contact') ?>">Contact Us</a>
        </div>
    </div>
</section>

<section class="new-blog-banner">
    <?php if (!empty($blog['image'])): ?>
        <img class="w-100" src="<?= base_url($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
    <?php else: ?>
        <img class="w-100" src="<?= base_url('assets/images/blog/default.jpg') ?>" alt="Default Blog Image">
    <?php endif; ?>
</section>

<section class="new-blog-content-section sp-80">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="table-content d-md-block d-none">
                    <ul class="mb-0 list-unstyled p-0" id="toc-list">
                        <!-- TOC will be auto-generated from h1, h2, h3 tags in description -->
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="new-blog-cnt-main">
                    <div class="blog-date mb-3 text-muted">
                        <i class="bi bi-calendar3"></i> <?= date('F d, Y', strtotime($blog['created_at'])) ?>
                    </div>

                    <!-- Blog Content -->
                    <div id="tabel-00" class="blog-description">
                        <?= $blog['description'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script for sticky nav -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contentContainer = document.querySelector('.blog-description');
        const tocContainer = document.getElementById('toc-list');
        if (!contentContainer || !tocContainer) return;

        // Find all h2, h3 headings (exclude h1)
        const headers = contentContainer.querySelectorAll('h2, h3');

        // Ensure headings have a scroll margin so they aren't hidden behind a fixed header
        const style = document.createElement('style');
        style.innerHTML = '.blog-description h2, .blog-description h3 { scroll-margin-top: 80px; }';
        document.head.appendChild(style);



        // Add headings to TOC
        headers.forEach((header, idx) => {
            if (!header.id) {
                header.id = 'tabel-' + String(idx + 1).padStart(2, '0');
            }
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + header.id;
            a.textContent = header.textContent.trim();
            li.appendChild(a);
            tocContainer.appendChild(li);
        });

        const navLinks = tocContainer.querySelectorAll('li a');
        const offset = 80; // offset for smooth scrolling

        // Smooth scrolling with offset
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetEl = document.getElementById(targetId);
                if (targetEl) {
                    const top = targetEl.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({
                        top,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active section detection (matches the same offset)
        const allSections = headers; // only headings are tracked for active state
        const detectionOffset = 80; // same offset as scroll margin

        function getActiveSection() {
            let closestSection = null;
            let closestDistance = window.innerHeight;
            allSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                const distance = Math.abs(rect.top);
                if (rect.top <= detectionOffset && distance < closestDistance) {
                    closestDistance = distance;
                    closestSection = section;
                }
            });
            if (closestSection) {
                const id = closestSection.id || 'tabel-00';
                navLinks.forEach(link => {
                    link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
                });
            }
        }

        window.addEventListener('scroll', getActiveSection);
        getActiveSection(); // initial call
    });
</script>