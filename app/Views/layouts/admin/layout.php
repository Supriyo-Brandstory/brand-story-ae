<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $meta['title'] ?? 'Admin Panel' ?></title>

    <!-- Bootstrap 5.3 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background: #212529;
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 0.375rem;
            margin: 0.25rem 1rem;
            padding: 0.75rem 1rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #343a40;
            color: #fff;
        }

        .sidebar .nav-link i {
            width: 24px;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                margin-left: -280px;
            }

            .sidebar.show {
                margin-left: 0;
            }

            .content-wrapper {
                margin-left: 0 !important;
            }
        }
    </style>
</head>

<body class="d-flex flex-column">

    <?php if (isset($_COOKIE['admin_token'])): ?>


        <!-- Offcanvas Sidebar for Mobile + Desktop Sidebar -->
        <div class="sidebar position-fixed top-0 start-0 d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; z-index: 1000;">
            <div class="d-flex align-items-center mb-3 mb-md-4 px-3">
                <h5 class="fs-4 mb-0 text-white"><i class="bi bi-shield-lock me-2"></i> Admin Panel</h5>
                <button class="btn btn-link text-white d-lg-none ms-auto" data-bs-dismiss="offcanvas">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <hr class="text-white-50">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= route('admin.dashboard') ?>" class="nav-link <?= ($currentRouteName === 'admin.dashboard') ? 'active' : '' ?>">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin.blogCategories.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.blogCategories') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-tags"></i> Blog Categories
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin.blogs_admin.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.blogs_admin') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-journal-text"></i> Blog Posts
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin.seo.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.seo') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-search"></i> SEO
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin.sitemap.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.sitemap') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-diagram-3"></i> Sitemap
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin.robots.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.robots') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-robot"></i> Robots.txt
                    </a>
                </li>
                <!-- <?php var_dump($currentRouteName); ?> -->
            </ul>
            <hr class="text-white-50">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <div>
                        <strong><?= $admin_name ?? 'Admin' ?></strong><br>
                        <small><?= $admin_email ?? 'admin@example.com' ?></small>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="<?= route('admin.profile') ?>"><i class="bi bi-person me-2"></i>Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="<?= route('admin.logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>



        <!-- Main Content Area -->
        <div class="content-wrapper" style="margin-left: 280px;">
            <?= $content ?>

        </div>

        <!-- Offcanvas for Mobile Sidebar -->
        <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarOffcanvas" style="width: 280px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title"><i class="bi bi-shield-lock"></i> Admin Panel</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body p-0">
                <!-- Same nav as sidebar above -->
                <ul class="nav nav-pills flex-column mb-auto px-3">
                    <li class="nav-item">
                        <a href="<?= route('admin.dashboard') ?>" class="nav-link text-white <?= ($currentRouteName === 'admin.dashboard') ? 'active' : '' ?>">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('admin.blogCategories.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.blogCategories') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-tags"></i> Blog Categories
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('admin.blogs_admin.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.blogs_admin') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-journal-text"></i> Blog Posts
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('admin.seo.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.seo') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-search"></i> SEO
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('admin.sitemap.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.sitemap') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-diagram-3"></i> Sitemap
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('admin.robots.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.robots') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-robot"></i> Robots.txt
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    <?php else: ?>
        <div class="container d-flex vh-100 align-items-center justify-content-center">
            <div class="text-center">
                <h1>Access Denied</h1>
                <p>Please log in as administrator.</p>
            </div>
        </div>
    <?php endif; ?>

    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote Lite -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.rich-text-editor').summernote({
                placeholder: 'Write your content here...',
                tabsize: 2,
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>