<?php

namespace App\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Seo;
use App\Services\SitemapService;

class AdminBlogController extends AdminBaseController 
{
    private Blog $blogModel;
    private BlogCategory $blogCategoryModel;
    private Seo $seoModel;

    public function __construct()
    {
        parent::__construct(); 
        $this->blogModel = new Blog();
        $this->blogCategoryModel = new BlogCategory();
        $this->seoModel = new Seo();
        require_once __DIR__ . '/../../Core/helpers.php'; 
    }

    public function index()
    {
        $this->requireAdminAuth(); 

        $search = $_GET['search'] ?? '';
        $perPage = 10;
        $currentPage = (int)($_GET['page'] ?? 1);
        if ($currentPage < 1) $currentPage = 1;

        $where = [];
        if (!empty($search)) {
            $where['title'] = '%' . $search . '%';
        }

        $paginationData = $this->blogModel->paginate($perPage, $currentPage, $where);
        $blogs = $paginationData['data'];

        $blogCategories = $this->blogCategoryModel->findAll();
        $categoriesMap = [];
        foreach ($blogCategories as $category) {
            $categoriesMap[$category['id']] = $category['name'];
        }

        foreach ($blogs as &$blog) {
            $blog['category_name'] = $categoriesMap[$blog['blog_category_id']] ?? 'N/A';
            $blog['sub_category_name'] = $categoriesMap[$blog['blog_sub_category_id']] ?? 'N/A';
        }
        unset($blog); 

        return $this->adminView('blogs/index', [
            'blogs' => $blogs,
            'totalItems' => $paginationData['total'],
            'totalPages' => $paginationData['last_page'],
            'currentPage' => $paginationData['current_page'],
            'perPage' => $perPage,
            'search' => $search
        ]);
    }

    public function create()
    {
        $this->requireAdminAuth(); 
        $blogCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL ORDER BY name ASC");
        return $this->adminView('blogs/create', [
            'blogCategories' => $blogCategories
        ]);
    }

    public function store()
    {
        $this->requireAdminAuth(); 
        csrf_verify();

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $blog_category_id = (int)($_POST['blog_category_id'] ?? 0);
        $blog_sub_category_id = !empty($_POST['blog_sub_category_id']) ? (int)$_POST['blog_sub_category_id'] : null;

        if (empty($title) || empty($description) || empty($blog_category_id)) {
            $_SESSION['error'] = 'Title, description, and category are required.';
            header('Location: ' . route('admin.blogs_admin.create'));
            exit;
        }

        $slug = generateUniqueSlug($title, $this->blogModel);

        $imagePath = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = handleImageUpload($_FILES['image'], 'blog');
        }

        $created_at = !empty($_POST['created_at']) ? date('Y-m-d H:i:s', strtotime($_POST['created_at'])) : date('Y-m-d H:i:s');
        $is_arabic = isset($_POST['is_arabic']) && $_POST['is_arabic'] == '1' ? 1 : 0;

        $data = [
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'blog_category_id' => $blog_category_id,
            'blog_sub_category_id' => $blog_sub_category_id,
            'is_arabic' => $is_arabic,
            'created_at' => $created_at,
            'image' => $imagePath
        ];

        $this->blogModel->save($data);

        // Auto Sync SEO & Sitemap
        $this->syncBlogSeo($slug, $title, $description);
        SitemapService::addPages(['blog/' . ltrim($slug, '/')]);

        $_SESSION['success'] = 'Blog post created successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function edit($id)
    {
        $this->requireAdminAuth(); 
        $blog = $this->blogModel->find($id);
        $blogCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL ORDER BY name ASC");
        
        $subCategories = [];
        if (!empty($blog['blog_category_id'])) {
            $subCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id = ? ORDER BY sort_order ASC", [$blog['blog_category_id']]);
        }

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        return $this->adminView('blogs/edit', [
            'blog' => $blog,
            'blogCategories' => $blogCategories,
            'subCategories' => $subCategories
        ]);
    }

    public function update($id)
    {
        $this->requireAdminAuth(); 
        csrf_verify();

        $blog = $this->blogModel->find($id);

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $blog_category_id = (int)($_POST['blog_category_id'] ?? 0);
        $blog_sub_category_id = !empty($_POST['blog_sub_category_id']) ? (int)$_POST['blog_sub_category_id'] : null;

        if (empty($title) || empty($description) || empty($blog_category_id)) {
            $_SESSION['error'] = 'Title, description, and category are required.';
            header('Location: ' . route('admin.blogs_admin.edit', ['id' => $id]));
            exit;
        }

        $slugInput = trim($_POST['slug'] ?? '');
        if (!empty($slugInput)) {
            $slug = generateUniqueSlug($slugInput, $this->blogModel, $id);
        } else {
            $slug = generateUniqueSlug($title, $this->blogModel, $id);
        }

        $imagePath = $blog['image'] ?? null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newImage = handleImageUpload($_FILES['image'], 'blog');
            if ($newImage) {
                if (!empty($blog['image'])) {
                    $oldImagePath = __DIR__ . '/../../../public/' . $blog['image'];
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
                    }
                }
                $imagePath = $newImage;
            }
        }

        $created_at = !empty($_POST['created_at']) ? date('Y-m-d H:i:s', strtotime($_POST['created_at'])) : $blog['created_at'];
        $is_arabic = isset($_POST['is_arabic']) && $_POST['is_arabic'] == '1' ? 1 : 0;

        $data = [
            'id' => $id,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'blog_category_id' => $blog_category_id,
            'blog_sub_category_id' => $blog_sub_category_id,
            'is_arabic' => $is_arabic,
            'created_at' => $created_at,
            'image' => $imagePath
        ];

        $this->blogModel->save($data);

        if (!empty($blog['slug']) && $blog['slug'] !== $slug) {
            SitemapService::removePages(['blog/' . ltrim($blog['slug'], '/')]);
        }
        SitemapService::addPages(['blog/' . ltrim($slug, '/')]);

        // Auto sync SEO
        $this->syncBlogSeo($slug, $title, $description);

        $_SESSION['success'] = 'Blog post updated successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function destroy($id)
    {
        $this->requireAdminAuth(); 
        csrf_verify();
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        if (!empty($blog['image'])) {
            $imagePath = __DIR__ . '/../../../public/' . $blog['image'];
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
        }

        $this->blogModel->delete($id);

        if (!empty($blog['slug'])) {
            SitemapService::removePages(['blog/' . ltrim($blog['slug'], '/')]);
            // Remove SEO record if exists
            $this->seoModel->query("DELETE FROM seo WHERE page_url = ? OR page_url = ?", ['/blogs/' . $blog['slug'], '/blog/' . $blog['slug']]);
        }

        $_SESSION['success'] = 'Blog post deleted successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function bulkDestroy()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $ids = $_POST['ids'] ?? [];
        if (empty($ids) || !is_array($ids)) {
            $_SESSION['error'] = 'No blog posts selected for deletion.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        $deletedCount = 0;
        $slugsToRemove = [];

        foreach ($ids as $id) {
            $id = (int)$id;
            if ($id <= 0) continue;

            $blog = $this->blogModel->find($id);
            if ($blog) {
                if (!empty($blog['image'])) {
                    $img = __DIR__ . '/../../../public/' . $blog['image'];
                    if (file_exists($img)) {
                        @unlink($img);
                    }
                }
                if (!empty($blog['slug'])) {
                    $slugsToRemove[] = 'blog/' . ltrim($blog['slug'], '/');
                    $this->seoModel->query("DELETE FROM seo WHERE page_url = ? OR page_url = ?", ['/blogs/' . $blog['slug'], '/blog/' . $blog['slug']]);
                }
                $this->blogModel->delete($id);
                $deletedCount++;
            }
        }

        if (!empty($slugsToRemove)) {
            SitemapService::removePages($slugsToRemove);
        }

        $_SESSION['success'] = "Successfully deleted {$deletedCount} blog post(s).";
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    /* -------------------------------------------------------------
       BULK UPLOAD & DEMO FILES
    -------------------------------------------------------------- */

    public function bulkUpload()
    {
        $this->requireAdminAuth();
        $blogCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL ORDER BY name ASC");
        
        $bulkResults = $_SESSION['bulk_upload_results'] ?? null;
        unset($_SESSION['bulk_upload_results']);

        return $this->adminView('blogs/bulk_upload', [
            'blogCategories' => $blogCategories,
            'bulkResults' => $bulkResults
        ]);
    }

    public function processBulkUpload()
    {
        $this->requireAdminAuth();
        csrf_verify();

        if (!isset($_FILES['bulk_file']) || $_FILES['bulk_file']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Please select a valid CSV or ZIP file to upload.';
            header('Location: ' . route('admin.blogs_admin.bulk_upload'));
            exit;
        }

        $fileTmp = $_FILES['bulk_file']['tmp_name'];
        $fileName = $_FILES['bulk_file']['name'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $defaultCategoryId = !empty($_POST['default_category_id']) ? (int)$_POST['default_category_id'] : null;
        $updateMode = $_POST['update_mode'] ?? 'update_existing'; // 'update_existing', 'create_new_slug', 'skip_existing'
        $syncSeo = isset($_POST['sync_seo']) && $_POST['sync_seo'] == '1';
        $syncSitemap = isset($_POST['sync_sitemap']) && $_POST['sync_sitemap'] == '1';

        // Validate default category if none provided in file
        if (empty($defaultCategoryId)) {
            $firstCategory = $this->blogCategoryModel->query("SELECT id FROM blog_categories WHERE parent_id IS NULL ORDER BY id ASC LIMIT 1");
            if (!empty($firstCategory)) {
                $defaultCategoryId = (int)$firstCategory[0]['id'];
            }
        }

        $results = [
            'total' => 0,
            'created' => 0,
            'updated' => 0,
            'skipped' => 0,
            'errors' => [],
            'items' => []
        ];

        if ($ext === 'csv' || $ext === 'txt') {
            $this->processCsvUpload($fileTmp, $defaultCategoryId, $updateMode, $syncSeo, $syncSitemap, $results);
        } elseif ($ext === 'zip') {
            $this->processZipUpload($fileTmp, $defaultCategoryId, $updateMode, $syncSeo, $syncSitemap, $results);
        } else {
            $_SESSION['error'] = 'Unsupported file format. Please upload a .CSV or .ZIP file.';
            header('Location: ' . route('admin.blogs_admin.bulk_upload'));
            exit;
        }

        $_SESSION['bulk_upload_results'] = $results;
        
        $msg = "Bulk upload completed. Processed: {$results['total']} | Created: {$results['created']} | Updated: {$results['updated']} | Skipped: {$results['skipped']} | Errors: " . count($results['errors']);
        if (count($results['errors']) > 0) {
            $_SESSION['warning'] = $msg;
        } else {
            $_SESSION['success'] = $msg;
        }

        header('Location: ' . route('admin.blogs_admin.bulk_upload'));
        exit;
    }

    private function processCsvUpload(string $csvPath, ?int $defaultCategoryId, string $updateMode, bool $syncSeo, bool $syncSitemap, array &$results, ?string $extractedAssetsDir = null)
    {
        $handle = @fopen($csvPath, 'r');
        if (!$handle) {
            $results['errors'][] = 'Unable to read the CSV file.';
            return;
        }

        // Remove UTF-8 BOM if present
        $bom = fread($handle, 3);
        if ($bom !== "\xEF\xBB\xBF") {
            rewind($handle);
        }

        // Detect delimiter
        $firstLine = fgets($handle);
        rewind($handle);
        if ($bom === "\xEF\xBB\xBF") {
            fseek($handle, 3);
        }
        $delimiter = (substr_count($firstLine, ';') > substr_count($firstLine, ',')) ? ';' : ',';

        $header = fgetcsv($handle, 0, $delimiter, '"', "\\");
        if (!$header || empty($header)) {
            $results['errors'][] = 'CSV file is empty or missing headers.';
            fclose($handle);
            return;
        }

        // Normalize header keys
        $cleanHeaders = [];
        foreach ($header as $idx => $col) {
            $colName = strtolower(trim(preg_replace('/[^a-zA-Z0-9_]/', '_', trim($col))));
            $cleanHeaders[$idx] = $colName;
        }

        $rowNum = 1;
        $sitemapSlugs = [];

        while (($row = fgetcsv($handle, 0, $delimiter, '"', "\\")) !== false) {
            $rowNum++;
            if (empty(array_filter($row))) continue; // skip blank rows
            $results['total']++;

            $data = [];
            foreach ($cleanHeaders as $idx => $key) {
                $data[$key] = isset($row[$idx]) ? trim($row[$idx]) : '';
            }

            // Extract fields with fallbacks
            $title = $this->getCsvField($data, ['title', 'post_title', 'blog_title', 'heading', 'name']);
            if (empty($title)) {
                $results['errors'][] = "Row #{$rowNum}: Skipped because 'title' is required.";
                $results['skipped']++;
                continue;
            }

            $rawSlug = $this->getCsvField($data, ['slug', 'post_slug', 'url_slug']);
            $description = $this->getCsvField($data, ['description', 'content', 'body', 'post_content', 'html', 'article']);
            if (empty($description)) {
                $description = '<p>' . htmlspecialchars($title) . '</p>';
            }

            // Category & Subcategory resolution
            $categoryVal = $this->getCsvField($data, ['category', 'category_name', 'cat', 'blog_category', 'category_id']);
            $subCategoryVal = $this->getCsvField($data, ['subcategory', 'sub_category', 'sub_category_name', 'sub_category_id']);
            
            list($categoryId, $subCategoryId) = $this->resolveCategoryAndSubcategory($categoryVal, $subCategoryVal, $defaultCategoryId);

            // Arabic post flag
            $isArabicVal = $this->getCsvField($data, ['is_arabic', 'arabic', 'lang_ar', 'rtl']);
            $isArabic = in_array(strtolower($isArabicVal), ['1', 'true', 'yes', 'ar', 'arabic']) ? 1 : 0;
            if (!$isArabic && preg_match('/[\x{0600}-\x{06FF}]/u', $title)) {
                $isArabic = 1;
            }

            // Publish date
            $dateVal = $this->getCsvField($data, ['created_at', 'publish_date', 'published_at', 'date']);
            $createdAt = !empty($dateVal) ? date('Y-m-d H:i:s', strtotime($dateVal)) : date('Y-m-d H:i:s');

            // Image resolution
            $imageVal = $this->getCsvField($data, ['image', 'featured_image', 'thumbnail', 'img', 'banner']);
            $resolvedImage = $this->resolveImage($imageVal, $extractedAssetsDir);

            // Slug and record handling
            $slugCandidate = !empty($rawSlug) ? $rawSlug : $title;
            $slugCandidate = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slugCandidate), '-'));

            $existing = $this->blogModel->query("SELECT id, slug FROM blogs WHERE slug = ? LIMIT 1", [$slugCandidate]);
            
            $blogId = null;
            $finalSlug = $slugCandidate;

            if (!empty($existing)) {
                if ($updateMode === 'skip_existing') {
                    $results['skipped']++;
                    $results['items'][] = [
                        'status' => 'skipped',
                        'title' => $title,
                        'slug' => $slugCandidate,
                        'message' => 'Skipped because slug already exists.'
                    ];
                    continue;
                } elseif ($updateMode === 'create_new_slug') {
                    $finalSlug = generateUniqueSlug($slugCandidate, $this->blogModel);
                    $saveData = [
                        'blog_category_id' => $categoryId,
                        'blog_sub_category_id' => $subCategoryId,
                        'title' => $title,
                        'slug' => $finalSlug,
                        'description' => $description,
                        'image' => $resolvedImage,
                        'is_arabic' => $isArabic,
                        'created_at' => $createdAt
                    ];
                    $this->blogModel->save($saveData);
                    $results['created']++;
                    $results['items'][] = [
                        'status' => 'created',
                        'title' => $title,
                        'slug' => $finalSlug,
                        'message' => 'Created with new unique slug.'
                    ];
                } else { // 'update_existing'
                    $blogId = (int)$existing[0]['id'];
                    $saveData = [
                        'id' => $blogId,
                        'blog_category_id' => $categoryId,
                        'blog_sub_category_id' => $subCategoryId,
                        'title' => $title,
                        'slug' => $finalSlug,
                        'description' => $description,
                        'is_arabic' => $isArabic,
                        'created_at' => $createdAt
                    ];
                    if ($resolvedImage !== null) {
                        $saveData['image'] = $resolvedImage;
                    }
                    $this->blogModel->save($saveData);
                    $results['updated']++;
                    $results['items'][] = [
                        'status' => 'updated',
                        'title' => $title,
                        'slug' => $finalSlug,
                        'message' => 'Updated existing blog post.'
                    ];
                }
            } else {
                $finalSlug = generateUniqueSlug($slugCandidate, $this->blogModel);
                $saveData = [
                    'blog_category_id' => $categoryId,
                    'blog_sub_category_id' => $subCategoryId,
                    'title' => $title,
                    'slug' => $finalSlug,
                    'description' => $description,
                    'image' => $resolvedImage,
                    'is_arabic' => $isArabic,
                    'created_at' => $createdAt
                ];
                $this->blogModel->save($saveData);
                $results['created']++;
                $results['items'][] = [
                    'status' => 'created',
                    'title' => $title,
                    'slug' => $finalSlug,
                    'message' => 'Created successfully.'
                ];
            }

            // SEO handling
            if ($syncSeo) {
                $metaTitle = $this->getCsvField($data, ['meta_title', 'seo_title', 'meta_tag_title']);
                $metaDesc = $this->getCsvField($data, ['meta_description', 'seo_description', 'meta_desc']);
                $canonicalUrl = $this->getCsvField($data, ['canonical_url', 'canonical', 'canonical_link']);
                $otherHeadTags = $this->getCsvField($data, ['other_script_or_tag', 'schema', 'other_tags', 'scripts', 'json_ld']);

                $this->syncBlogSeo($finalSlug, $title, $description, $metaTitle, $metaDesc, $canonicalUrl, $otherHeadTags);
            }

            // Sitemap collection
            if ($syncSitemap) {
                $sitemapSlugs[] = 'blog/' . ltrim($finalSlug, '/');
            }
        }

        fclose($handle);

        if (!empty($sitemapSlugs)) {
            SitemapService::addPages($sitemapSlugs);
        }
    }

    private function processZipUpload(string $zipTmp, ?int $defaultCategoryId, string $updateMode, bool $syncSeo, bool $syncSitemap, array &$results)
    {
        $zip = new \ZipArchive();
        if ($zip->open($zipTmp) !== true) {
            $results['errors'][] = 'Could not open the uploaded ZIP archive.';
            return;
        }

        $extractPath = '/tmp/brandstory_bulk_blog_upload_' . time() . '_' . mt_rand(1000, 9999);
        if (!is_dir($extractPath)) {
            mkdir($extractPath, 0755, true);
        }

        $zip->extractTo($extractPath);
        $zip->close();

        // 1. Copy images from ZIP to public/uploads/images/blog/
        $publicBlogUploads = realpath(__DIR__ . '/../../../public') . '/uploads/images/blog';
        if (!is_dir($publicBlogUploads)) {
            mkdir($publicBlogUploads, 0755, true);
        }

        $imageExtensions = ['png', 'jpg', 'jpeg', 'webp', 'gif', 'svg', 'ico'];
        $dirIterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($extractPath, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($dirIterator as $item) {
            $pathname = $item->getPathname();
            $basename = $item->getBasename();

            if (str_contains($pathname, '__MACOSX') || str_starts_with($basename, '.')) {
                continue;
            }

            if ($item->isFile()) {
                $ext = strtolower($item->getExtension());
                if (in_array($ext, $imageExtensions)) {
                    copy($pathname, $publicBlogUploads . '/' . $basename);
                }
            }
        }

        // 2. Check if there's a CSV file in the ZIP archive
        $csvFiles = [];
        $htmlFiles = [];

        foreach ($dirIterator as $item) {
            if ($item->isFile()) {
                $p = $item->getPathname();
                $b = $item->getBasename();
                if (str_contains($p, '__MACOSX') || str_starts_with($b, '.')) continue;

                $ext = strtolower($item->getExtension());
                if ($ext === 'csv') {
                    $csvFiles[] = $p;
                } elseif ($ext === 'html' || $ext === 'htm') {
                    $htmlFiles[] = $p;
                }
            }
        }

        // If CSV exists, process it first
        if (!empty($csvFiles)) {
            foreach ($csvFiles as $csvFile) {
                $this->processCsvUpload($csvFile, $defaultCategoryId, $updateMode, $syncSeo, $syncSitemap, $results, $extractPath);
            }
        }

        // Process all HTML files
        if (!empty($htmlFiles)) {
            $sitemapSlugs = [];

            foreach ($htmlFiles as $filePath) {
                $results['total']++;
                $fileBasename = basename($filePath);
                $fileSlug = pathinfo($fileBasename, PATHINFO_FILENAME);

                $content = @file_get_contents($filePath);
                if ($content === false || strlen(trim($content)) === 0) {
                    $results['errors'][] = "File {$fileBasename}: File is empty.";
                    $results['skipped']++;
                    continue;
                }

                // Normalize UTF-8
                if (!mb_check_encoding($content, 'UTF-8')) {
                    $content = mb_convert_encoding($content, 'UTF-8', 'auto');
                }
                $content = iconv('UTF-8', 'UTF-8//IGNORE', $content);

                // 1. Extract Meta Title / Title
                $metaTitle = '';
                $title = '';
                if (preg_match('/<meta\s+[^>]*name=["\']title["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $metaTitle = trim(html_entity_decode($m[1], ENT_QUOTES, 'UTF-8'));
                } elseif (preg_match('/<title[^>]*>(.*?)<\/title>/is', $content, $m)) {
                    $metaTitle = trim(html_entity_decode(strip_tags($m[1]), ENT_QUOTES, 'UTF-8'));
                }

                if (preg_match('/<h1[^>]*>(.*?)<\/h1>/is', $content, $m)) {
                    $title = trim(html_entity_decode(strip_tags($m[1]), ENT_QUOTES, 'UTF-8'));
                } else {
                    $title = $metaTitle ?: ucwords(str_replace(['-', '_'], ' ', $fileSlug));
                }

                // 2. Extract Meta Description
                $metaDescription = '';
                if (preg_match('/<meta\s+[^>]*name=["\']description["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $metaDescription = trim(html_entity_decode($m[1], ENT_QUOTES, 'UTF-8'));
                } elseif (preg_match('/<meta\s+[^>]*content=["\']([^"\']*)["\'][^>]*name=["\']description["\']/is', $content, $m)) {
                    $metaDescription = trim(html_entity_decode($m[1], ENT_QUOTES, 'UTF-8'));
                }

                // 3. Extract Canonical URL
                $canonicalUrl = '';
                if (preg_match('/<link\s+[^>]*rel=["\']canonical["\'][^>]*href=["\']([^"\']*)["\']/is', $content, $m)) {
                    $canonicalUrl = trim($m[1]);
                }

                // 4. Extract Category & Subcategory
                $categoryVal = '';
                $subCategoryVal = '';
                if (preg_match('/<meta\s+[^>]*name=["\']category["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $categoryVal = trim($m[1]);
                }
                if (preg_match('/<meta\s+[^>]*name=["\']subcategory["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $subCategoryVal = trim($m[1]);
                }

                // Fallback to folder structure: extractPath/Category/SubCategory/file.html
                if (empty($categoryVal)) {
                    $relPath = trim(str_replace($extractPath, '', dirname($filePath)), '/');
                    if (!empty($relPath)) {
                        $parts = explode('/', $relPath);
                        if (isset($parts[0]) && !in_array(strtolower($parts[0]), ['images', 'assets', 'img'])) {
                            $categoryVal = $parts[0];
                            if (isset($parts[1])) {
                                $subCategoryVal = $parts[1];
                            }
                        }
                    }
                }

                list($categoryId, $subCategoryId) = $this->resolveCategoryAndSubcategory($categoryVal, $subCategoryVal, $defaultCategoryId);

                // 5. Extract Is Arabic & Created At
                $isArabic = 0;
                if (preg_match('/<html[^>]*lang=["\']ar["\']/i', $content) || preg_match('/<meta\s+[^>]*name=["\']is_arabic["\'][^>]*content=["\']1["\']/i', $content)) {
                    $isArabic = 1;
                } elseif (preg_match('/[\x{0600}-\x{06FF}]/u', $title)) {
                    $isArabic = 1;
                }

                $createdAt = date('Y-m-d H:i:s');
                if (preg_match('/<meta\s+[^>]*name=["\'](publish_date|date|created_at)["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $createdAt = date('Y-m-d H:i:s', strtotime($m[2]));
                }

                // 6. Extract Featured Image
                $featuredImage = null;
                if (preg_match('/<meta\s+[^>]*property=["\']og:image["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $featuredImage = $this->resolveImage(trim($m[1]), $extractPath);
                } elseif (preg_match('/<meta\s+[^>]*name=["\']image["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $featuredImage = $this->resolveImage(trim($m[1]), $extractPath);
                }

                // 7. Extract Body Content
                $bodyContent = '';
                if (preg_match('/<body[^>]*>(.*?)<\/body>/is', $content, $bodyMatches)) {
                    $bodyContent = trim($bodyMatches[1]);
                } elseif (preg_match('/<article[^>]*>(.*?)<\/article>/is', $content, $artMatches)) {
                    $bodyContent = trim($artMatches[1]);
                } else {
                    $bodyContent = trim($content);
                }

                // Normalize asset paths inside body HTML
                $bodyContent = preg_replace('/(src|href)=["\'](?:\.\/|\.\.\/)?(?:images|assets|img)\/([^"\']+)["\']/i', '$1="/uploads/images/blog/$2"', $bodyContent);

                // If no featured image extracted yet, try first img in body
                if ($featuredImage === null) {
                    if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $bodyContent, $imgMatch)) {
                        $src = $imgMatch[1];
                        if (str_starts_with($src, '/uploads/images/blog/')) {
                            $featuredImage = ltrim($src, '/');
                        } elseif (str_starts_with($src, 'uploads/images/blog/')) {
                            $featuredImage = $src;
                        } else {
                            $featuredImage = $this->resolveImage($src, $extractPath);
                        }
                    }
                }

                // 8. Extract other head scripts / JSON-LD / custom tags
                $otherHeadTags = '';
                if (preg_match('/<head[^>]*>(.*?)<\/head>/is', $content, $headMatches)) {
                    $headHtml = $headMatches[1];
                    if (preg_match_all('/<script\b[^>]*type=["\']application\/ld\+json["\'][^>]*>.*?<\/script>/is', $headHtml, $schemaMatches)) {
                        foreach ($schemaMatches[0] as $sTag) {
                            $otherHeadTags .= $sTag . "\n";
                        }
                    }
                    if (preg_match_all('/<meta\s+[^>]*(property|name)=["\'](og:|twitter:|keywords)[^"\']*["\'][^>]*>/is', $headHtml, $metaTagsMatches)) {
                        foreach ($metaTagsMatches[0] as $mTag) {
                            $otherHeadTags .= $mTag . "\n";
                        }
                    }
                }

                // 9. Slug resolution
                $customSlug = '';
                if (preg_match('/<meta\s+[^>]*name=["\']slug["\'][^>]*content=["\']([^"\']*)["\']/is', $content, $m)) {
                    $customSlug = trim($m[1]);
                }
                $slugCandidate = !empty($customSlug) ? $customSlug : $fileSlug;
                $slugCandidate = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slugCandidate), '-'));

                $existing = $this->blogModel->query("SELECT id, slug FROM blogs WHERE slug = ? LIMIT 1", [$slugCandidate]);

                if (!empty($existing)) {
                    if ($updateMode === 'skip_existing') {
                        $results['skipped']++;
                        $results['items'][] = [
                            'status' => 'skipped',
                            'title' => $title,
                            'slug' => $slugCandidate,
                            'message' => 'Skipped because slug already exists.'
                        ];
                        continue;
                    } elseif ($updateMode === 'create_new_slug') {
                        $finalSlug = generateUniqueSlug($slugCandidate, $this->blogModel);
                        $saveData = [
                            'blog_category_id' => $categoryId,
                            'blog_sub_category_id' => $subCategoryId,
                            'title' => $title,
                            'slug' => $finalSlug,
                            'description' => $bodyContent,
                            'image' => $featuredImage,
                            'is_arabic' => $isArabic,
                            'created_at' => $createdAt
                        ];
                        $this->blogModel->save($saveData);
                        $results['created']++;
                        $results['items'][] = [
                            'status' => 'created',
                            'title' => $title,
                            'slug' => $finalSlug,
                            'message' => 'Created with new unique slug from HTML file.'
                        ];
                    } else { // 'update_existing'
                        $blogId = (int)$existing[0]['id'];
                        $finalSlug = $slugCandidate;
                        $saveData = [
                            'id' => $blogId,
                            'blog_category_id' => $categoryId,
                            'blog_sub_category_id' => $subCategoryId,
                            'title' => $title,
                            'slug' => $finalSlug,
                            'description' => $bodyContent,
                            'is_arabic' => $isArabic,
                            'created_at' => $createdAt
                        ];
                        if ($featuredImage !== null) {
                            $saveData['image'] = $featuredImage;
                        }
                        $this->blogModel->save($saveData);
                        $results['updated']++;
                        $results['items'][] = [
                            'status' => 'updated',
                            'title' => $title,
                            'slug' => $finalSlug,
                            'message' => 'Updated existing blog from HTML file.'
                        ];
                    }
                } else {
                    $finalSlug = generateUniqueSlug($slugCandidate, $this->blogModel);
                    $saveData = [
                        'blog_category_id' => $categoryId,
                        'blog_sub_category_id' => $subCategoryId,
                        'title' => $title,
                        'slug' => $finalSlug,
                        'description' => $bodyContent,
                        'image' => $featuredImage,
                        'is_arabic' => $isArabic,
                        'created_at' => $createdAt
                    ];
                    $this->blogModel->save($saveData);
                    $results['created']++;
                    $results['items'][] = [
                        'status' => 'created',
                        'title' => $title,
                        'slug' => $finalSlug,
                        'message' => 'Created successfully from HTML file.'
                    ];
                }

                // SEO
                if ($syncSeo) {
                    $this->syncBlogSeo($finalSlug, $title, $bodyContent, $metaTitle, $metaDescription, $canonicalUrl, $otherHeadTags);
                }

                // Sitemap
                if ($syncSitemap) {
                    $sitemapSlugs[] = 'blog/' . ltrim($finalSlug, '/');
                }
            }

            if (!empty($sitemapSlugs)) {
                SitemapService::addPages($sitemapSlugs);
            }
        }

        // Clean up temporary extract folder
        $this->deleteDirectoryRecursively($extractPath);
    }

    private function resolveCategoryAndSubcategory(?string $categoryInput, ?string $subCategoryInput, ?int $defaultCategoryId): array
    {
        $categoryId = $defaultCategoryId;
        $subCategoryId = null;

        $categoryInput = trim((string)$categoryInput);
        $subCategoryInput = trim((string)$subCategoryInput);

        if (!empty($categoryInput)) {
            // Check if numeric ID
            if (is_numeric($categoryInput)) {
                $cat = $this->blogCategoryModel->find((int)$categoryInput);
                if ($cat) {
                    $categoryId = (int)$cat['id'];
                }
            } else {
                // Match by slug or name
                $catSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $categoryInput), '-'));
                $found = $this->blogCategoryModel->query("SELECT id FROM blog_categories WHERE (LOWER(name) = LOWER(?) OR slug = ?) AND parent_id IS NULL LIMIT 1", [$categoryInput, $catSlug]);
                
                if (!empty($found)) {
                    $categoryId = (int)$found[0]['id'];
                } else {
                    // Auto-create category on the fly
                    $newSlug = generateUniqueSlug($categoryInput, $this->blogCategoryModel);
                    $this->blogCategoryModel->save([
                        'name' => $categoryInput,
                        'slug' => $newSlug,
                        'parent_id' => null,
                        'sort_order' => 0
                    ]);
                    $newCat = $this->blogCategoryModel->query("SELECT id FROM blog_categories WHERE slug = ? LIMIT 1", [$newSlug]);
                    if (!empty($newCat)) {
                        $categoryId = (int)$newCat[0]['id'];
                    }
                }
            }
        }

        // Subcategory resolution
        if ($categoryId && !empty($subCategoryInput)) {
            if (is_numeric($subCategoryInput)) {
                $sub = $this->blogCategoryModel->find((int)$subCategoryInput);
                if ($sub && $sub['parent_id'] == $categoryId) {
                    $subCategoryId = (int)$sub['id'];
                }
            } else {
                $subSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $subCategoryInput), '-'));
                $foundSub = $this->blogCategoryModel->query("SELECT id FROM blog_categories WHERE (LOWER(name) = LOWER(?) OR slug = ?) AND parent_id = ? LIMIT 1", [$subCategoryInput, $subSlug, $categoryId]);
                
                if (!empty($foundSub)) {
                    $subCategoryId = (int)$foundSub[0]['id'];
                } else {
                    // Auto create subcategory under parent
                    $newSubSlug = generateUniqueSlug($subCategoryInput, $this->blogCategoryModel);
                    $this->blogCategoryModel->save([
                        'name' => $subCategoryInput,
                        'slug' => $newSubSlug,
                        'parent_id' => $categoryId,
                        'sort_order' => 0
                    ]);
                    $newSub = $this->blogCategoryModel->query("SELECT id FROM blog_categories WHERE slug = ? LIMIT 1", [$newSubSlug]);
                    if (!empty($newSub)) {
                        $subCategoryId = (int)$newSub[0]['id'];
                    }
                }
            }
        }

        return [$categoryId, $subCategoryId];
    }

    private function resolveImage(?string $imageInput, ?string $extractedDir = null): ?string
    {
        if (empty($imageInput)) return null;
        $imageInput = trim($imageInput);

        // Already relative uploads path
        if (str_starts_with($imageInput, 'uploads/')) {
            return $imageInput;
        }
        if (str_starts_with($imageInput, '/uploads/')) {
            return ltrim($imageInput, '/');
        }

        // Full URL starting with http
        if (str_starts_with($imageInput, 'http://') || str_starts_with($imageInput, 'https://')) {
            return $imageInput;
        }

        $cleanBase = basename($imageInput);
        $publicBlogTarget = realpath(__DIR__ . '/../../../public') . '/uploads/images/blog/' . $cleanBase;

        // If extracted dir is present, check if file exists and copy
        if ($extractedDir) {
            $possiblePaths = [
                $extractedDir . '/' . $imageInput,
                $extractedDir . '/images/' . $cleanBase,
                $extractedDir . '/assets/' . $cleanBase,
                $extractedDir . '/' . $cleanBase
            ];
            foreach ($possiblePaths as $srcPath) {
                if (file_exists($srcPath) && is_file($srcPath)) {
                    @copy($srcPath, $publicBlogTarget);
                    return 'uploads/images/blog/' . $cleanBase;
                }
            }
        }

        if (file_exists($publicBlogTarget)) {
            return 'uploads/images/blog/' . $cleanBase;
        }

        return 'uploads/images/blog/' . $cleanBase;
    }

    private function syncBlogSeo(string $slug, string $title, string $description, ?string $metaTitle = null, ?string $metaDescription = null, ?string $canonicalUrl = null, ?string $otherHeadTags = null): void
    {
        try {
            $pageUrl = '/blogs/' . ltrim($slug, '/');
            
            // Build Meta Title
            $finalMetaTitle = !empty($metaTitle) ? $metaTitle : $title . ' | BrandStory';
            
            // Build Meta Description
            if (!empty($metaDescription)) {
                $finalMetaDesc = $metaDescription;
            } else {
                $cleanText = trim(strip_tags($description));
                $finalMetaDesc = mb_substr($cleanText, 0, 160, 'UTF-8');
            }

            // Build Other Scripts / Tags (Canonical, JSON-LD Schema, etc.)
            $otherTags = '';

            // Handle Canonical URL
            if (!empty($canonicalUrl)) {
                $canonicalUrl = trim($canonicalUrl);
                if (!str_contains($canonicalUrl, '<link')) {
                    $otherTags .= "<link rel=\"canonical\" href=\"{$canonicalUrl}\">\n";
                } else {
                    $otherTags .= $canonicalUrl . "\n";
                }
            } else {
                $siteUrl = function_exists('base_url') ? base_url('blogs/' . ltrim($slug, '/')) : 'https://brandstory.ae/blogs/' . ltrim($slug, '/');
                $siteUrl = rtrim($siteUrl, '/') . '/';
                $otherTags .= "<link rel=\"canonical\" href=\"{$siteUrl}\">\n";
            }

            if (!empty($otherHeadTags)) {
                $otherTags .= trim($otherHeadTags) . "\n";
            }

            // Check if SEO record exists for page_url
            $existing = $this->seoModel->query("SELECT id FROM seo WHERE page_url = ? LIMIT 1", [$pageUrl]);
            if (!empty($existing)) {
                $this->seoModel->save([
                    'id' => (int)$existing[0]['id'],
                    'page_url' => $pageUrl,
                    'meta_title' => $finalMetaTitle,
                    'meta_description' => $finalMetaDesc,
                    'other_script_or_tag' => trim($otherTags)
                ]);
            } else {
                $this->seoModel->save([
                    'page_url' => $pageUrl,
                    'meta_title' => $finalMetaTitle,
                    'meta_description' => $finalMetaDesc,
                    'other_script_or_tag' => trim($otherTags)
                ]);
            }
        } catch (\Throwable $e) {
            error_log('Error syncing blog SEO: ' . $e->getMessage());
        }
    }

    private function getCsvField(array $row, array $possibleKeys): string
    {
        foreach ($possibleKeys as $key) {
            if (isset($row[$key]) && strlen(trim($row[$key])) > 0) {
                return trim($row[$key]);
            }
        }
        return '';
    }

    private function deleteDirectoryRecursively(string $dir): bool
    {
        if (!is_dir($dir)) return true;
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            $path = "$dir/$file";
            is_dir($path) ? $this->deleteDirectoryRecursively($path) : @unlink($path);
        }
        return @rmdir($dir);
    }

    /* -------------------------------------------------------------
       DEMO FILE GENERATOR / DOWNLOADS
    -------------------------------------------------------------- */

    public function downloadDemo(string $type = 'csv')
    {
        $this->requireAdminAuth();

        if ($type === 'csv') {
            $this->downloadDemoCsv();
        } elseif ($type === 'zip') {
            $this->downloadDemoZip();
        } else {
            $_SESSION['error'] = 'Invalid demo download type requested.';
            header('Location: ' . route('admin.blogs_admin.bulk_upload'));
            exit;
        }
    }

    private function downloadDemoCsv(): void
    {
        $filename = 'demo_bulk_blogs_template.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $out = fopen('php://output', 'w');

        // Write UTF-8 BOM for Microsoft Excel compatibility
        fwrite($out, "\xEF\xBB\xBF");

        // Header columns
        fputcsv($out, [
            'title',
            'slug',
            'category',
            'subcategory',
            'description',
            'meta_title',
            'meta_description',
            'canonical_url',
            'other_script_or_tag',
            'image',
            'is_arabic',
            'created_at'
        ], ',', '"', "\\");

        // Demo Row 1: English Digital Marketing Post
        fputcsv($out, [
            'The Ultimate Guide to Digital Marketing in Dubai (2026 Strategy)',
            'digital-marketing-strategy-dubai-2026',
            'Digital Marketing',
            'Marketing Strategy',
            '<h2>Accelerate Your Business Growth in Dubai</h2><p>In today\'s fast-paced digital landscape in Dubai and the UAE, having a solid online marketing roadmap is crucial for brand longevity and conversion rates.</p><h3>Key Pillars of Modern Digital Marketing</h3><ul><li><strong>Search Engine Optimization:</strong> Capture high-intent organic queries across the UAE.</li><li><strong>Performance Advertising:</strong> Target key demographics with hyper-focused ad spend.</li><li><strong>Content & Social Engagement:</strong> Build genuine customer trust through consistent, high-value storytelling.</li></ul><p>Partnering with an experienced digital agency ensures measurable ROI and long-term sustainable brand equity.</p>',
            'Digital Marketing Strategy Dubai (2026 Guide) | BrandStory',
            'Discover modern digital marketing strategies for brands in Dubai and UAE. Learn how SEO, PPC, and content marketing drive measurable business growth.',
            'https://brandstory.ae/blogs/digital-marketing-strategy-dubai-2026/',
            '<script type="application/ld+json">{"@context":"https://schema.org","@type":"Article","headline":"The Ultimate Guide to Digital Marketing in Dubai (2026 Strategy)","publisher":{"@type":"Organization","name":"BrandStory"}}</script>',
            'uploads/images/blog/sample-digital-marketing.webp',
            '0',
            date('Y-m-d H:i:s')
        ], ',', '"', "\\");

        // Demo Row 2: English SEO Guide
        fputcsv($out, [
            'Mastering Enterprise SEO in the UAE Market',
            'enterprise-seo-uae-guide',
            'SEO',
            'Enterprise SEO',
            '<h2>Dominating High-Volume Search Queries</h2><p>Enterprise SEO requires an intricate blend of technical crawlability, multi-language localization, and authoritative backlink acquisition.</p><h3>Why Core Web Vitals Matter</h3><p>Fast-loading websites with minimal layout shifts rank significantly higher and convert traffic faster across GCC markets.</p>',
            'Mastering Enterprise SEO in UAE | Complete 2026 Guide',
            'Learn how enterprise search engine optimization powers corporate visibility in Dubai and across the United Arab Emirates.',
            'https://brandstory.ae/blogs/enterprise-seo-uae-guide/',
            '<script type="application/ld+json">{"@context":"https://schema.org","@type":"Article","headline":"Mastering Enterprise SEO in the UAE Market","publisher":{"@type":"Organization","name":"BrandStory"}}</script>',
            'uploads/images/blog/sample-seo-banner.webp',
            '0',
            date('Y-m-d H:i:s', strtotime('-1 day'))
        ], ',', '"', "\\");

        // Demo Row 3: Arabic Blog Post
        fputcsv($out, [
            'دليلك الشامل لتحسين محركات البحث في دبي 2026',
            'seo-guide-dubai-arabic',
            'التسويق الرقمي',
            'تحسين محركات البحث',
            '<h2>كيف تحقق الصدارة في نتائج بحث جوجل داخل الإمارات</h2><p>يعد تحسين محركات البحث (SEO) أحد أهم الركائز الاستراتيجية لنمو الأعمال الرقمية في دبي والإمارات العربية المتحدة.</p><h3>أهم خطوات النجاح في السيو:</h3><ul><li><strong>البحث عن الكلمات المفتاحية:</strong> استهداف الكلمات ذات الصلة بنية الشراء.</li><li><strong>تحسين سرعة وتجربة الموقع:</strong> لضمان بقاء الزائر وتحويله إلى عميل.</li><li><strong>المحتوى العربي المتميز:</strong> تقديم قيمة حقيقية للجمهور العربي.</li></ul>',
            'دليل تحسين محركات البحث في دبي 2026 | براند ستوري',
            'تعرف على أحدث استراتيجيات السيو والتسويق الرقمي للشركات في دبي والإمارات لتحقيق أعلى المبيعات والوصول للجمهور المستهدف.',
            'https://brandstory.ae/blogs/seo-guide-dubai-arabic/',
            '<script type="application/ld+json">{"@context":"https://schema.org","@type":"Article","headline":"دليلك الشامل لتحسين محركات البحث في دبي 2026","inLanguage":"ar","publisher":{"@type":"Organization","name":"BrandStory"}}</script>',
            'uploads/images/blog/sample-arabic-banner.webp',
            '1',
            date('Y-m-d H:i:s', strtotime('-2 days'))
        ], ',', '"', "\\");

        fclose($out);
        exit;
    }

    private function downloadDemoZip(): void
    {
        $zipTempFile = tempnam(sys_get_temp_dir(), 'demo_blogs_zip_');
        $zip = new \ZipArchive();

        if ($zip->open($zipTempFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            $_SESSION['error'] = 'Failed to generate demo ZIP file.';
            header('Location: ' . route('admin.blogs_admin.bulk_upload'));
            exit;
        }

        // 1. Add README.txt
        $readme = "BRANDSTORY - BULK BLOGS UPLOAD INSTRUCTIONS\n";
        $readme .= "=================================================\n\n";
        $readme .= "This ZIP demo package contains two convenient methods for bulk uploading blogs:\n\n";
        $readme .= "METHOD A: CSV UPLOAD\n";
        $readme .= "--------------------\n";
        $readme .= "Use the included `demo_bulk_blogs_template.csv`.\n";
        $readme .= "Supported CSV columns:\n";
        $readme .= "- title (Required): Post title\n";
        $readme .= "- slug (Optional): URL slug (auto-generated if empty)\n";
        $readme .= "- category (Optional): Category name or ID (auto-created if new)\n";
        $readme .= "- subcategory (Optional): Subcategory name or ID\n";
        $readme .= "- description (Required): Full HTML article content\n";
        $readme .= "- meta_title (Optional): SEO Title tag\n";
        $readme .= "- meta_description (Optional): SEO Meta Description tag\n";
        $readme .= "- canonical_url (Optional): Canonical URL (e.g. https://brandstory.ae/blogs/my-post/)\n";
        $readme .= "- other_script_or_tag (Optional): JSON-LD Schema, OG tags, or custom scripts\n";
        $readme .= "- image (Optional): Featured image path or filename in images/ folder\n";
        $readme .= "- is_arabic (Optional): 1 for Arabic RTL, 0 for English\n";
        $readme .= "- created_at (Optional): Publish date (YYYY-MM-DD HH:MM:SS)\n\n";
        $readme .= "METHOD B: HTML FILES IN ZIP\n";
        $readme .= "---------------------------\n";
        $readme .= "You can upload a ZIP containing `.html` blog files and an `images/` directory.\n";
        $readme .= "The importer automatically extracts:\n";
        $readme .= "- Title: From <title> or <h1> or <meta name=\"title\">\n";
        $readme .= "- Meta Description: From <meta name=\"description\">\n";
        $readme .= "- Canonical URL: From <link rel=\"canonical\" href=\"...\">\n";
        $readme .= "- Category: From <meta name=\"category\" content=\"...\"> or folder name\n";
        $readme .= "- Subcategory: From <meta name=\"subcategory\" content=\"...\">\n";
        $readme .= "- Featured Image: From <meta property=\"og:image\"> or first <img>\n";
        $readme .= "- Schema: From <script type=\"application/ld+json\"> in <head>\n";
        $readme .= "- Content: From <body> or <article>\n";
        $readme .= "- Is Arabic: From <html lang=\"ar\"> or <meta name=\"is_arabic\" content=\"1\">\n";

        $zip->addFromString('README.txt', $readme);

        // 2. Add CSV Template inside ZIP
        ob_start();
        $csvOut = fopen('php://output', 'w');
        fwrite($csvOut, "\xEF\xBB\xBF");
        fputcsv($csvOut, ['title', 'slug', 'category', 'subcategory', 'description', 'meta_title', 'meta_description', 'canonical_url', 'other_script_or_tag', 'image', 'is_arabic', 'created_at'], ',', '"', "\\");
        fputcsv($csvOut, [
            'The Ultimate Guide to Digital Marketing in Dubai (2026 Strategy)',
            'digital-marketing-strategy-dubai-2026',
            'Digital Marketing',
            'Marketing Strategy',
            '<h2>Accelerate Your Business Growth in Dubai</h2><p>In today\'s fast-paced digital landscape in Dubai and the UAE, having a solid online marketing roadmap is crucial.</p>',
            'Digital Marketing Strategy Dubai (2026 Guide) | BrandStory',
            'Discover modern digital marketing strategies for brands in Dubai and UAE.',
            'https://brandstory.ae/blogs/digital-marketing-strategy-dubai-2026/',
            '<script type="application/ld+json">{"@context":"https://schema.org","@type":"Article","headline":"The Ultimate Guide to Digital Marketing in Dubai (2026 Strategy)","publisher":{"@type":"Organization","name":"BrandStory"}}</script>',
            'images/sample-digital-marketing.webp',
            '0',
            date('Y-m-d H:i:s')
        ], ',', '"', "\\");
        fputcsv($csvOut, [
            'Mastering Enterprise SEO in the UAE Market',
            'enterprise-seo-uae-guide',
            'SEO',
            'Enterprise SEO',
            '<h2>Dominating High-Volume Search Queries</h2><p>Enterprise SEO requires an intricate blend of technical crawlability and quality content.</p>',
            'Mastering Enterprise SEO in UAE | Complete 2026 Guide',
            'Learn how enterprise search engine optimization powers corporate visibility in Dubai and UAE.',
            'https://brandstory.ae/blogs/enterprise-seo-uae-guide/',
            '<script type="application/ld+json">{"@context":"https://schema.org","@type":"Article","headline":"Mastering Enterprise SEO in the UAE Market","publisher":{"@type":"Organization","name":"BrandStory"}}</script>',
            'images/sample-seo-banner.webp',
            '0',
            date('Y-m-d H:i:s', strtotime('-1 day'))
        ], ',', '"', "\\");
        fputcsv($csvOut, [
            'دليلك الشامل لتحسين محركات البحث في دبي 2026',
            'seo-guide-dubai-arabic',
            'التسويق الرقمي',
            'تحسين محركات البحث',
            '<h2>كيف تحقق الصدارة في نتائج بحث جوجل داخل الإمارات</h2><p>يعد تحسين محركات البحث أحد أهم الركائز لنمو الأعمال الرقمية في دبي.</p>',
            'دليل تحسين محركات البحث في دبي 2026 | براند ستوري',
            'تعرف على أحدث استراتيجيات السيو والتسويق الرقمي للشركات في دبي والإمارات.',
            'https://brandstory.ae/blogs/seo-guide-dubai-arabic/',
            '<script type="application/ld+json">{"@context":"https://schema.org","@type":"Article","headline":"دليلك الشامل لتحسين محركات البحث في دبي 2026","inLanguage":"ar","publisher":{"@type":"Organization","name":"BrandStory"}}</script>',
            'images/sample-arabic-banner.webp',
            '1',
            date('Y-m-d H:i:s', strtotime('-2 days'))
        ], ',', '"', "\\");
        fclose($csvOut);
        $csvContent = ob_get_clean();
        $zip->addFromString('demo_bulk_blogs_template.csv', $csvContent);

        // 3. Add Sample HTML Blog 1
        $html1 = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n";
        $html1 .= "    <meta charset=\"UTF-8\">\n";
        $html1 .= "    <title>Digital Marketing Strategy Dubai (2026 Guide) | BrandStory</title>\n";
        $html1 .= "    <meta name=\"description\" content=\"Discover modern digital marketing strategies for brands in Dubai and UAE. Learn how SEO, PPC, and content marketing drive growth.\">\n";
        $html1 .= "    <meta name=\"category\" content=\"Digital Marketing\">\n";
        $html1 .= "    <meta name=\"subcategory\" content=\"Strategy\">\n";
        $html1 .= "    <meta name=\"slug\" content=\"digital-marketing-strategy-dubai-2026\">\n";
        $html1 .= "    <link rel=\"canonical\" href=\"https://brandstory.ae/blogs/digital-marketing-strategy-dubai-2026/\">\n";
        $html1 .= "    <meta property=\"og:image\" content=\"images/sample-digital-marketing.webp\">\n";
        $html1 .= "    <script type=\"application/ld+json\">\n";
        $html1 .= "    {\n";
        $html1 .= "        \"@context\": \"https://schema.org\",\n";
        $html1 .= "        \"@type\": \"Article\",\n";
        $html1 .= "        \"headline\": \"The Ultimate Guide to Digital Marketing in Dubai (2026 Strategy)\",\n";
        $html1 .= "        \"author\": { \"@type\": \"Organization\", \"name\": \"BrandStory\" }\n";
        $html1 .= "    }\n";
        $html1 .= "    </script>\n";
        $html1 .= "</head>\n<body>\n";
        $html1 .= "    <h1>The Ultimate Guide to Digital Marketing in Dubai (2026 Strategy)</h1>\n";
        $html1 .= "    <img src=\"images/sample-digital-marketing.webp\" alt=\"Digital Marketing Dubai\">\n";
        $html1 .= "    <p>In today's fast-paced digital ecosystem in Dubai and the UAE, having a comprehensive marketing roadmap is essential.</p>\n";
        $html1 .= "    <h2>1. Organic Search Engine Optimization (SEO)</h2>\n";
        $html1 .= "    <p>Target high-intent keywords across the UAE to capture qualified leads organically.</p>\n";
        $html1 .= "    <h2>2. High-Performance Paid Advertising</h2>\n";
        $html1 .= "    <p>Utilize Google Ads, Meta Ads, and LinkedIn campaigns tailored to regional demographics.</p>\n";
        $html1 .= "</body>\n</html>";
        $zip->addFromString('digital-marketing-strategy-dubai-2026.html', $html1);

        // 4. Add Sample HTML Blog 2 (Arabic)
        $html2 = "<!DOCTYPE html>\n<html lang=\"ar\" dir=\"rtl\">\n<head>\n";
        $html2 .= "    <meta charset=\"UTF-8\">\n";
        $html2 .= "    <title>دليل تحسين محركات البحث في دبي 2026 | براند ستوري</title>\n";
        $html2 .= "    <meta name=\"description\" content=\"تعرف على أحدث استراتيجيات السيو والتسويق الرقمي للشركات في دبي والإمارات.\">\n";
        $html2 .= "    <meta name=\"category\" content=\"التسويق الرقمي\">\n";
        $html2 .= "    <meta name=\"subcategory\" content=\"تحسين محركات البحث\">\n";
        $html2 .= "    <meta name=\"is_arabic\" content=\"1\">\n";
        $html2 .= "    <meta name=\"slug\" content=\"seo-guide-dubai-arabic\">\n";
        $html2 .= "    <link rel=\"canonical\" href=\"https://brandstory.ae/blogs/seo-guide-dubai-arabic/\">\n";
        $html2 .= "    <meta property=\"og:image\" content=\"images/sample-arabic-banner.webp\">\n";
        $html2 .= "    <script type=\"application/ld+json\">\n";
        $html2 .= "    {\n";
        $html2 .= "        \"@context\": \"https://schema.org\",\n";
        $html2 .= "        \"@type\": \"Article\",\n";
        $html2 .= "        \"headline\": \"دليلك الشامل لتحسين محركات البحث في دبي 2026\",\n";
        $html2 .= "        \"inLanguage\": \"ar\",\n";
        $html2 .= "        \"author\": { \"@type\": \"Organization\", \"name\": \"BrandStory\" }\n";
        $html2 .= "    }\n";
        $html2 .= "    </script>\n";
        $html2 .= "</head>\n<body>\n";
        $html2 .= "    <h1>دليلك الشامل لتحسين محركات البحث في دبي 2026</h1>\n";
        $html2 .= "    <img src=\"images/sample-arabic-banner.webp\" alt=\"سيو دبي\">\n";
        $html2 .= "    <p>يعد تحسين محركات البحث (SEO) أحد أهم الركائز الاستراتيجية لنمو الأعمال الرقمية في دبي والإمارات.</p>\n";
        $html2 .= "    <h2>خطوات النجاح في السيو:</h2>\n";
        $html2 .= "    <ul>\n";
        $html2 .= "        <li>البحث المتقن عن الكلمات المفتاحية باللغتين العربية والإنجليزية.</li>\n";
        $html2 .= "        <li>تحسين سرعة وتجاوب الموقع على الهواتف الذكية.</li>\n";
        $html2 .= "        <li>بناء روابط خلفية قوية وموثوقة.</li>\n";
        $html2 .= "    </ul>\n";
        $html2 .= "</body>\n</html>";
        $zip->addFromString('seo-guide-dubai-arabic.html', $html2);

        // 5. Add Dummy Sample Images
        // A minimal 1x1 transparent/colored PNG/WebP byte string
        $dummyImagePng = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkWPjfDwAEeQHz4z4j4AAAAABJRU5ErkJggg==');
        $zip->addFromString('images/sample-digital-marketing.webp', $dummyImagePng);
        $zip->addFromString('images/sample-seo-banner.webp', $dummyImagePng);
        $zip->addFromString('images/sample-arabic-banner.webp', $dummyImagePng);

        $zip->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="demo_bulk_blogs_upload.zip"');
        header('Content-Length: ' . filesize($zipTempFile));
        header('Pragma: no-cache');
        header('Expires: 0');

        readfile($zipTempFile);
        @unlink($zipTempFile);
        exit;
    }
}
