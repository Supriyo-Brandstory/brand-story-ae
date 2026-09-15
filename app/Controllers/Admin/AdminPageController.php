<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseController;
use App\Models\Page;
use App\Services\SitemapService;

class AdminPageController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->requireAdminAuth();
    }

    public function index()
    {
        $pageModel = new Page();
        $search = trim($_GET['search'] ?? '');
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $perPage = 10;
        
        $paginatedData = $pageModel->searchPages($search, $perPage, $page);

        $this->adminView('pages/index', [
            'title' => 'Pages Management',
            'pages' => $paginatedData['data'],
            'currentPage' => $paginatedData['current_page'],
            'totalPages' => $paginatedData['last_page'],
            'total' => $paginatedData['total'],
            'perPage' => $perPage,
            'search' => $search
        ]);
    }

    public function create()
    {
        $templates = $this->getTemplates();

        $this->adminView('pages/create', [
            'title' => 'Create New Page',
            'templates' => $templates
        ]);
    }

    public function store()
    {
        $data = [
            'title' => $_POST['title'] ?? '',
            'slug' => $_POST['slug'] ?? '',
            'template' => $_POST['template'] ?? '',
            'content' => $_POST['content'] ?? '',
            'custom_class' => $_POST['custom_class'] ?? ''
        ];

        // Debug Log
        file_put_contents('/tmp/admin_save_debug.log', "STORE Time: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
        file_put_contents('/tmp/admin_save_debug.log', "POST Data: " . json_encode($_POST) . "\n\n", FILE_APPEND);

        // Basic Validation
        if (empty($data['title']) || empty($data['slug']) || empty($data['template'])) {
            $_SESSION['error'] = "Title, Slug, and Template are required fields.";
            header('Location: ' . route('admin.pages.create'));
            exit;
        }

        $pageModel = new Page();

        // Ensure slug is unique
        $data['slug'] = $this->generateUniqueSlug($data['slug']);

        try {
            if ($pageModel->save($data)) {
                $insertedId = \App\Core\Database::connect()->lastInsertId();

                // 1. Auto sync to Sitemap with structured format & trailing slash
                SitemapService::addPages([$data['slug']]);

                // 2. Auto generate canonical URL and register in SEO table
                try {
                    $seoModel = new \App\Models\Seo();
                    $pageUrl = '/' . ltrim($data['slug'], '/');
                    $existingSeo = $seoModel->query("SELECT id, other_script_or_tag FROM seo WHERE page_url = ? LIMIT 1", [$pageUrl]);
                    if (!empty($existingSeo)) {
                        $tags = SitemapService::syncCanonicalInTags($existingSeo[0]['other_script_or_tag'] ?? '', $data['slug']);
                        $seoModel->save([
                            'id' => $existingSeo[0]['id'],
                            'page_url' => $pageUrl,
                            'meta_title' => $data['title'],
                            'other_script_or_tag' => $tags
                        ]);
                    } else {
                        $tags = SitemapService::syncCanonicalInTags('', $data['slug']);
                        $seoModel->save([
                            'page_url' => $pageUrl,
                            'meta_title' => $data['title'],
                            'meta_description' => '',
                            'other_script_or_tag' => $tags
                        ]);
                    }
                } catch (\Throwable $e) {
                    error_log("SEO save error on create: " . $e->getMessage());
                }

                $_SESSION['success'] = "Page created successfully.";
                
                if (isset($_POST['redirect_edit']) && $insertedId) {
                    header('Location: ' . route('admin.pages.edit', ['id' => $insertedId]));
                } else {
                    header('Location: ' . route('admin.pages.index'));
                }
            } else {
                $_SESSION['error'] = "Failed to save the page.";
                header('Location: ' . route('admin.pages.create'));
            }
        } catch (\Exception $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            header('Location: ' . route('admin.pages.create'));
        }
    }

    public function edit($id)
    {
        $pageModel = new Page();
        $page = $pageModel->find($id);

        if (!$page) {
            header('Location: ' . route('admin.pages.index'));
            exit;
        }

        $templates = $this->getTemplates();

        $this->adminView('pages/edit', [
            'title' => 'Edit Page',
            'page' => $page,
            'templates' => $templates
        ]);
    }

    public function update($id)
    {
        $id = (int)$id; 
        $data = [
            'id' => $id,
            'title' => $_POST['title'] ?? '',
            'slug' => $_POST['slug'] ?? '',
            'template' => $_POST['template'] ?? '',
            'content' => $_POST['content'] ?? '',
            'custom_class' => $_POST['custom_class'] ?? ''
        ];

        // Debug Log
        file_put_contents('/tmp/admin_save_debug.log', "Update ID: $id Time: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
        if (empty($data['title'])) file_put_contents('/tmp/admin_save_debug.log', "ERROR: Empty title\n", FILE_APPEND);
        file_put_contents('/tmp/admin_save_debug.log', "Content Length: " . strlen($data['content']) . "\n", FILE_APPEND);
        file_put_contents('/tmp/admin_save_debug.log', "POST Data: " . json_encode($_POST) . "\n\n", FILE_APPEND);

        $data['content'] = preg_replace_callback('/style=["\'][^"\']*url\("([^"]+)"\)[^"\']*["\']/', function($matches) {
            return str_replace(['url("', '")'], ["url('", "')"], $matches[0]);
        }, $data['content']);

        if (empty($data['title']) || empty($data['slug']) || empty($data['template'])) {
            $_SESSION['error'] = "Title, Slug, and Template cannot be empty.";
            header('Location: ' . route('admin.pages.edit', ['id' => $id]));
            exit;
        }

        $pageModel = new Page();
        $oldPage = $pageModel->find($id);

        // Ensure slug is unique (excluding currently edited page)
        $data['slug'] = $this->generateUniqueSlug($data['slug'], $id);

        try {
            if ($pageModel->save($data)) {
                // 1. Update Sitemap entry in-place if slug changed
                if ($oldPage && !empty($oldPage['slug']) && $oldPage['slug'] !== $data['slug']) {
                    SitemapService::updatePageSlug($oldPage['slug'], $data['slug']);

                    // Update SEO table record URL and canonical link
                    try {
                        $seoModel = new \App\Models\Seo();
                        $oldPageUrl = '/' . ltrim($oldPage['slug'], '/');
                        $newPageUrl = '/' . ltrim($data['slug'], '/');
                        $existingSeo = $seoModel->query("SELECT id, other_script_or_tag FROM seo WHERE page_url = ? LIMIT 1", [$oldPageUrl]);
                        if (!empty($existingSeo)) {
                            $tags = SitemapService::syncCanonicalInTags($existingSeo[0]['other_script_or_tag'] ?? '', $data['slug']);
                            $seoModel->save([
                                'id' => $existingSeo[0]['id'],
                                'page_url' => $newPageUrl,
                                'meta_title' => $data['title'],
                                'other_script_or_tag' => $tags
                            ]);
                        } else {
                            $tags = SitemapService::syncCanonicalInTags('', $data['slug']);
                            $seoModel->save([
                                'page_url' => $newPageUrl,
                                'meta_title' => $data['title'],
                                'meta_description' => '',
                                'other_script_or_tag' => $tags
                            ]);
                        }
                    } catch (\Throwable $e) {
                        error_log("SEO update error on slug change: " . $e->getMessage());
                    }
                } else {
                    SitemapService::addPages([$data['slug']]);

                    // Ensure canonical link is up to date in SEO table
                    try {
                        $seoModel = new \App\Models\Seo();
                        $pageUrl = '/' . ltrim($data['slug'], '/');
                        $existingSeo = $seoModel->query("SELECT id, other_script_or_tag FROM seo WHERE page_url = ? LIMIT 1", [$pageUrl]);
                        if (!empty($existingSeo)) {
                            $tags = SitemapService::syncCanonicalInTags($existingSeo[0]['other_script_or_tag'] ?? '', $data['slug']);
                            $seoModel->save([
                                'id' => $existingSeo[0]['id'],
                                'meta_title' => $data['title'],
                                'other_script_or_tag' => $tags
                            ]);
                        } else {
                            $tags = SitemapService::syncCanonicalInTags('', $data['slug']);
                            $seoModel->save([
                                'page_url' => $pageUrl,
                                'meta_title' => $data['title'],
                                'meta_description' => '',
                                'other_script_or_tag' => $tags
                            ]);
                        }
                    } catch (\Throwable $e) {}
                }

                $_SESSION['success'] = "Page updated successfully.";
                
                if (isset($_POST['redirect_edit'])) {
                    header('Location: ' . route('admin.pages.edit', ['id' => $id]));
                } else {
                    header('Location: ' . route('admin.pages.index'));
                }
            } else {
                $_SESSION['error'] = "Failed to update the page.";
                header('Location: ' . route('admin.pages.edit', ['id' => $id]));
            }
        } catch (\Exception $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            header('Location: ' . route('admin.pages.edit', ['id' => $id]));
        }
    }

    public function destroy($id)
    {
        $pageModel = new Page();
        $page = $pageModel->find($id);
        if ($page) {
            $pageModel->delete($id);
            try {
                $seoModel = new \App\Models\Seo();
                $pageUrl = '/' . ltrim($page['slug'], '/');
                $seoModel->query("DELETE FROM seo WHERE page_url = ?", [$pageUrl]);
            } catch (\Throwable $e) {}
            if (!empty($page['slug'])) {
                SitemapService::removePages([$page['slug']]);
            }
        }
        $_SESSION['success'] = "Page deleted.";
        header('Location: ' . route('admin.pages.index'));
    }

    public function bulkDestroy()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . route('admin.pages.index'));
            exit;
        }

        $ids = $_POST['page_ids'] ?? [];
        if (!empty($ids) && is_array($ids)) {
            $pageModel = new Page();
            $seoModel = new \App\Models\Seo();
            $deletedCount = 0;
            $deletedSlugs = [];
            foreach ($ids as $id) {
                $page = $pageModel->find((int)$id);
                if ($page && $pageModel->delete((int)$id)) {
                    try {
                        $pageUrl = '/' . ltrim($page['slug'], '/');
                        $seoModel->query("DELETE FROM seo WHERE page_url = ?", [$pageUrl]);
                    } catch (\Throwable $e) {}
                    if (!empty($page['slug'])) {
                        $deletedSlugs[] = $page['slug'];
                    }
                    $deletedCount++;
                }
            }
            if (!empty($deletedSlugs)) {
                SitemapService::removePages($deletedSlugs);
            }
            if ($deletedCount > 0) {
                $_SESSION['success'] = "{$deletedCount} page(s) deleted successfully.";
            } else {
                $_SESSION['error'] = "Failed to delete selected pages.";
            }
        } else {
            $_SESSION['error'] = "No pages selected for deletion.";
        }
        
        header('Location: ' . route('admin.pages.index'));
        exit;
    }

    public function deleteAll()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . route('admin.pages.index'));
            exit;
        }

        $pageModel = new Page();
        $seoModel = new \App\Models\Seo();
        $pages = $pageModel->findAll();
        $deletedSlugs = [];
        foreach ($pages as $p) {
            if (!empty($p['slug'])) {
                $deletedSlugs[] = $p['slug'];
                try {
                    $pageUrl = '/' . ltrim($p['slug'], '/');
                    $seoModel->query("DELETE FROM seo WHERE page_url = ?", [$pageUrl]);
                } catch (\Throwable $e) {}
            }
        }
        if ($pageModel->deleteAll()) {
            if (!empty($deletedSlugs)) {
                SitemapService::removePages($deletedSlugs);
            }
            $_SESSION['success'] = "All pages deleted successfully.";
        } else {
            $_SESSION['error'] = "Failed to delete all pages.";
        }

        header('Location: ' . route('admin.pages.index'));
        exit;
    }

    public function preview()
    {
        $content = $_POST['content'] ?? '';
        $template = $_POST['template'] ?? 'blank.php';
        $custom_class = $_POST['custom_class'] ?? '';
        $custom_css = $_POST['custom_css'] ?? '';
        $title = $_POST['title'] ?? 'Preview Page';

        $page = [
            'content' => $content,
            'template' => $template,
            'custom_class' => $custom_class,
            'title' => $title,
            'slug' => 'preview'
        ];

        $classname = 'dm-agency-dubai';
        $templatePath = __DIR__ . '/../../Views/customlayout/' . $template;
        if (file_exists($templatePath)) {
            $templateFileContent = file_get_contents($templatePath);
            if (preg_match('/\$classname\s*=\s*\'([^\']+)\';/', $templateFileContent, $matches)) {
                $classname = $matches[1];
            }
        }
        if (!empty($custom_class)) {
            $classname = $custom_class;
        }

        $meta = [
            'classname' => $classname,
            'title' => $title
        ];

        // We need to bypass the standard view rendering if it doesn't support direct include
        // But the layout expect $content.
        
        // Capture dynamic_renderer output
        ob_start();
        extract(['page' => $page]);
        include __DIR__ . '/../../Views/customlayout/dynamic_renderer.php';
        $content = ob_get_clean();

        // Render layout
        extract(['meta' => $meta, 'content' => $content]);
        
        // Set preview mode true for components
        define('IS_PREVIEW', true);

        $this->singleView('admin/pages/preview', [
            'meta' => $meta,
            'title' => $title,
            'content' => $content,
            'custom_class' => $custom_class,
            'custom_css' => $custom_css,
            'template' => $template,
            'is_live_editor' => isset($_POST['is_live_editor'])
        ]);
        exit;
    }

    private function generateUniqueSlug($slug, $excludeId = null)
    {
        $pageModel = new Page();
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $sql = "SELECT id FROM pages WHERE slug = ? ";
            $params = [$slug];
            if ($excludeId) {
                $sql .= " AND id != ?";
                $params[] = $excludeId;
            }

            $exists = $pageModel->query($sql, $params);

            if (empty($exists)) {
                return $slug;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
    }

    public function bulkUpload()
    {
        $this->adminView('pages/bulk_upload', [
            'title' => 'Bulk Upload ZIP'
        ]);
    }

    public function processBulkUpload()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . route('admin.pages.index'));
            exit;
        }

        if (!isset($_FILES['zip_file']) || $_FILES['zip_file']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Please upload a valid ZIP file.';
            header('Location: ' . route('admin.pages.bulk_upload'));
            exit;
        }

        $zipFile = $_FILES['zip_file']['tmp_name'];
        $zip = new \ZipArchive();
        
        if ($zip->open($zipFile) !== true) {
            $_SESSION['error'] = 'Could not open the uploaded ZIP file.';
            header('Location: ' . route('admin.pages.bulk_upload'));
            exit;
        }

        $extractPath = '/tmp/brandstory_bulk_upload_' . time();
        if (!is_dir($extractPath)) {
            mkdir($extractPath, 0755, true);
        }

        $zip->extractTo($extractPath);
        $zip->close();

        // 1. Prepare public/uploads directory
        $publicDir = realpath(__DIR__ . '/../../../public');
        $uploadsDir = $publicDir . '/uploads';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
        }

        // 2. Discover and copy all asset folders and image files to public/uploads
        $copiedFolders = [];
        $imageExtensions = ['png', 'jpg', 'jpeg', 'webp', 'gif', 'svg', 'ico', 'bmp', 'tiff', 'ttf', 'otf', 'woff', 'woff2', 'eot'];

        $dirIterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($extractPath, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($dirIterator as $item) {
            $pathname = $item->getPathname();
            $basename = $item->getBasename();

            // Skip macOS metadata files and hidden files
            if (str_contains($pathname, '__MACOSX') || str_starts_with($basename, '.')) {
                continue;
            }

            if ($item->isDir()) {
                $dirName = $basename;
                if ($dirName !== '.' && $dirName !== '..') {
                    $targetDir = $uploadsDir . '/' . $dirName;
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0755, true);
                    }
                    exec("cp -r " . escapeshellarg($pathname) . "/* " . escapeshellarg($targetDir) . " 2>/dev/null");
                    $copiedFolders[$dirName] = true;
                }
            } elseif ($item->isFile()) {
                $ext = strtolower($item->getExtension());
                if (in_array($ext, $imageExtensions)) {
                    copy($pathname, $uploadsDir . '/' . $basename);
                }
            }
        }

        $pageModel = new Page();
        $processedCount = 0;
        $createdSlugs = [];
        
        // Scan the extracted directory for HTML files
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($extractPath));
        foreach ($iterator as $file) {
            if ($file->isDir()) {
                continue;
            }

            $filePath = $file->getPathname();
            $fileBasename = $file->getBasename();

            // Skip macOS metadata files (like __MACOSX/._page.html) and hidden files
            if (str_contains($filePath, '__MACOSX') || str_starts_with($fileBasename, '.')) {
                continue;
            }

            $ext = strtolower($file->getExtension());
            if ($ext === 'html' || $ext === 'htm') {
                $content = file_get_contents($filePath);
                if ($content === false || strlen(trim($content)) === 0) {
                    continue;
                }

                // Clean & normalize UTF-8 encoding
                if (!mb_check_encoding($content, 'UTF-8')) {
                    $content = mb_convert_encoding($content, 'UTF-8', 'auto');
                }
                $content = iconv('UTF-8', 'UTF-8//IGNORE', $content);
                $content = str_replace("\0", '', $content);
                
                // 1. Extract Meta Title from <title>
                $metaTitle = '';
                if (preg_match('/<title[^>]*>(.*?)<\/title>/is', $content, $titleMatches)) {
                    $metaTitle = trim(html_entity_decode(strip_tags($titleMatches[1]), ENT_QUOTES, 'UTF-8'));
                }

                // 2. Extract Meta Description from <meta name="description">
                $metaDescription = '';
                if (preg_match('/<meta\s+[^>]*name=["\']description["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $descMatches)) {
                    $metaDescription = trim(html_entity_decode($descMatches[1], ENT_QUOTES, 'UTF-8'));
                } elseif (preg_match('/<meta\s+[^>]*content=["\']([^"\']*)["\'][^>]*name=["\']description["\']/is', $content, $descMatches)) {
                    $metaDescription = trim(html_entity_decode($descMatches[1], ENT_QUOTES, 'UTF-8'));
                }

                // 3. Extract other custom head tags/scripts (JSON-LD, canonical, keywords, OG, twitter tags)
                $otherHeadTags = '';
                if (preg_match('/<head[^>]*>(.*?)<\/head>/is', $content, $headMatches)) {
                    $headHtml = $headMatches[1];
                    
                    // JSON-LD scripts
                    if (preg_match_all('/<script\b[^>]*type=["\']application\/ld\+json["\'][^>]*>.*?<\/script>/is', $headHtml, $schemaMatches)) {
                        foreach ($schemaMatches[0] as $sTag) {
                            $otherHeadTags .= $sTag . "\n";
                        }
                    }
                    // Meta keywords, OG, Twitter
                    if (preg_match_all('/<meta\s+[^>]*(property|name)=["\'](og:|twitter:|keywords)[^"\']*["\'][^>]*>/is', $headHtml, $metaTagsMatches)) {
                        foreach ($metaTagsMatches[0] as $mTag) {
                            $otherHeadTags .= $mTag . "\n";
                        }
                    }
                    // Canonical link
                    if (preg_match_all('/<link\s+[^>]*rel=["\']canonical["\'][^>]*>/is', $headHtml, $canonicalMatches)) {
                        foreach ($canonicalMatches[0] as $cTag) {
                            $otherHeadTags .= $cTag . "\n";
                        }
                    }
                }

                // Extract body content
                $bodyContent = '';
                if (preg_match('/<body[^>]*>(.*?)<\/body>/is', $content, $matches)) {
                    $bodyContent = $matches[1];
                } else {
                    $bodyContent = $content;
                }
                
                // Extract CSS
                $styleContent = '';
                if (preg_match_all('/<style[^>]*>(.*?)<\/style>/is', $content, $styleMatches)) {
                    foreach ($styleMatches[0] as $styleTag) {
                        $styleContent .= $styleTag . "\n";
                    }
                }
                
                $finalContent = $styleContent . $bodyContent;

                // 4. Rewrite image/asset paths to point to /uploads/
                foreach (array_keys($copiedFolders) as $folder) {
                    // HTML attributes
                    $finalContent = preg_replace(
                        '/(src|href|poster|data-src|srcset)=([\'"])' . preg_quote($folder, '/') . '\//i',
                        '$1=$2/uploads/' . $folder . '/',
                        $finalContent
                    );
                    // CSS url(...)
                    $finalContent = preg_replace(
                        '/url\(\s*([\'"]?)' . preg_quote($folder, '/') . '\//i',
                        'url($1/uploads/' . $folder . '/',
                        $finalContent
                    );
                }

                // Also rewrite standalone image references
                $imgExtRegex = implode('|', $imageExtensions);
                $finalContent = preg_replace(
                    '/(src|href|poster|data-src)=([\'"])(?!https?:\/\/|\/|data:)([^\'"]+\.(' . $imgExtRegex . '))([\'"])/i',
                    '$1=$2/uploads/$3$5',
                    $finalContent
                );
                $finalContent = preg_replace(
                    '/url\(\s*([\'"]?)(?!https?:\/\/|\/|data:)([^\'")]+\.(' . $imgExtRegex . '))([\'"]?)\s*\)/i',
                    'url($1/uploads/$2$4)',
                    $finalContent
                );
                
                $filename = $file->getBasename('.html');
                if (empty($filename) || $filename === '.html') {
                    $filename = $file->getBasename('.htm');
                }
                $title = !empty($metaTitle) ? $metaTitle : ucwords(str_replace('-', ' ', $filename));
                $slug = $this->generateUniqueSlug($filename);

                // Final safety cleaning for DB insertion
                $title = iconv('UTF-8', 'UTF-8//IGNORE', $title);
                $finalContent = iconv('UTF-8', 'UTF-8//IGNORE', $finalContent);
                $finalContent = str_replace("\0", '', $finalContent);
                
                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'template' => 'blank.php', // Use blank so we only rely on the system header/footer
                    'content' => $finalContent,
                    'custom_class' => ''
                ];
                
                try {
                    if ($pageModel->save($data)) {
                        $processedCount++;
                        $createdSlugs[] = $slug;

                        // Automatically save SEO metadata & Canonical in seo table
                        try {
                            $seoModel = new \App\Models\Seo();
                            $pageUrl = '/' . ltrim($slug, '/');
                            $finalOtherHeadTags = SitemapService::syncCanonicalInTags($otherHeadTags, $slug);
                            $existingSeo = $seoModel->query("SELECT id FROM seo WHERE page_url = ? LIMIT 1", [$pageUrl]);
                            $seoData = [
                                'page_url' => $pageUrl,
                                'meta_title' => !empty($metaTitle) ? $metaTitle : $title,
                                'meta_description' => $metaDescription,
                                'other_script_or_tag' => trim($finalOtherHeadTags)
                            ];
                            if (!empty($existingSeo)) {
                                $seoData['id'] = $existingSeo[0]['id'];
                            }
                            $seoModel->save($seoData);
                        } catch (\Throwable $e) {
                            // Silently continue if SEO save encounters non-fatal issue
                        }
                    }
                } catch (\Throwable $e) {
                    error_log("Bulk upload error saving page {$filename}: " . $e->getMessage());
                }
            }
        }
        
        // Auto update sitemap with newly created page URLs
        if (!empty($createdSlugs)) {
            SitemapService::addPages($createdSlugs);
        }

        // Cleanup
        exec("rm -rf " . escapeshellarg($extractPath));

        $_SESSION['success'] = "Successfully processed and created {$processedCount} pages from ZIP, and updated Sitemap.";
        header('Location: ' . route('admin.pages.index'));
        exit;
    }

    public function getTemplateContent()
    {
        header('Content-Type: application/json');
        $template = $_GET['template'] ?? '';
        if (empty($template)) {
            echo json_encode(['status' => 'error', 'message' => 'Template not specified.']);
            return;
        }

        $filePath = __DIR__ . '/../../Views/customlayout/' . $template;

        if (file_exists($filePath)) {
            $content = file_get_contents($filePath);
            echo json_encode(['status' => 'success', 'content' => $content]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Template not found.']);
        }
    }

    /**
     * Get templates from customlayout folder
     */
    private function getTemplates()
    {
        $dir = __DIR__ . '/../../Views/customlayout/';
        $templates = [];
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file !== 'dynamic_renderer.php') {
                    $templates[] = $file;
                }
            }
        }
        return $templates;
    }
}
