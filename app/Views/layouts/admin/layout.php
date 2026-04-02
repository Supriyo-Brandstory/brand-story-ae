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
            height: 100vh;
            overflow-y: auto;
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
                    <a href="<?= route('admin.pages.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.pages') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-file-earmark-text"></i> Pages
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
                <li>
                    <a href="<?= route('admin.enquiries.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.enquiries') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-envelope-paper"></i> Enquiries
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin.backups.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.backups') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-cloud-arrow-up"></i> Backups
                    </a>
                </li>
                <li>
                    <a href="<?= route('admin.media.index') ?>" class="nav-link <?= (strpos($currentRouteName, 'admin.media') !== false) ? 'active' : '' ?>">
                        <i class="bi bi-images"></i> Media Manager
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
        <div class="content-wrapper" style="margin-left: 280px; padding-top: 20px;">
            <div class="container-fluid">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show mx-3" role="alert">
                        <i class="bi bi-check-circle me-2"></i><?= $_SESSION['success'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i><?= $_SESSION['error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
            </div>

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
                        <a href="<?= route('admin.pages.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.pages') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-file-earmark-text"></i> Pages
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
                    <li>
                        <a href="<?= route('admin.enquiries.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.enquiries') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-envelope-paper"></i> Enquiries
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('admin.backups.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.backups') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-cloud-arrow-up"></i> Backups
                        </a>
                    </li>
                    <li>
                        <a href="<?= route('admin.media.index') ?>" class="nav-link text-white <?= (strpos($currentRouteName, 'admin.media') !== false) ? 'active' : '' ?>">
                            <i class="bi bi-images"></i> Media Manager
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    <?php else: ?>
        <div class="container d-flex vh-100 align-items-center justify-content-center">
            <div class="text-center">
                <i class="bi bi-shield-lock text-danger" style="font-size: 4rem;"></i>
                <h1 class="mt-3">Access Denied</h1>
                <p class="text-muted">Please log in as an administrator to access this area.</p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Include Media Picker Component -->
    <?php include __DIR__ . '/../../admin/components/media_picker.php'; ?>

    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote Lite -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            // Define custom button for media picker
            const MediaPickerButton = function(context) {
                const ui = $.summernote.ui;
                const button = ui.button({
                    contents: '<i class="bi bi-images"></i>',
                    tooltip: 'Insert Media',
                    click: function() {
                        openMediaPicker(function(url) {
                            context.invoke('editor.insertImage', url);
                        });
                    }
                });
                return button.render();
            };

            // Custom button for replacing existing images
            const ChangeImageButton = function(context) {
                const ui = $.summernote.ui;
                const button = ui.button({
                    contents: '<i class="bi bi-pencil-square"></i> Change Path',
                    tooltip: 'Change image source',
                    click: function() {
                        const img = $(context.invoke('editor.restoreTarget'));
                        openMediaPicker(function(url) {
                            img.attr('src', url);
                            context.invoke('editor.afterCommand');
                        });
                    }
                });
                return button.render();
            };

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
                    ['insert', ['link', 'media', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['changeImage']]
                    ]
                },
                buttons: {
                    media: MediaPickerButton,
                    changeImage: ChangeImageButton
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>