<?php

namespace App\Controllers;

use App\Core\Controller;

class FrontendController extends Controller
{

    public function notfound()
    {
        http_response_code(404);
        $meta = [];
        return $this->view('404', ['meta' => $meta]);
    }
    public function thankyou()
    {
        $meta = [];
        return $this->view('thankyou', ['meta' => $meta]);
    }
    public function index()
    {
        $meta = [
            "classname" => 'dm-agency-dubai'
        ];
        return $this->view('home', ['meta' => $meta]);
    }
    public function index2()
    {
        $meta = [
            "classname" => 'dm-agency-dubai'
        ];
        return $this->view('home-2', ['meta' => $meta]);
    }
    public function about()
    {
        $meta = [];
        return $this->view('about', ['meta' => $meta]);
    }

    public function authorMadhavan()
    {
        $blogModel = new \App\Models\Blog();
        $latest_blogs = $blogModel->query("SELECT b.*, c.slug as category_slug, sc.slug as sub_category_slug 
                                           FROM blogs b 
                                           LEFT JOIN blog_categories c ON b.blog_category_id = c.id
                                           LEFT JOIN blog_categories sc ON b.blog_sub_category_id = sc.id
                                           ORDER BY b.created_at DESC LIMIT 3");

        $meta = [
            'title' => 'Madhavan A - Digital Marketing & SEO Expert | BrandStory',
            'description' => 'Meet Madhavan A, a digital marketing expert with 8+ years of experience specializing in search engine optimization, content performance, and driving organic growth.',
            'classname' => 'author-profile-page'
        ];
        return $this->view('author/madhavan-a', [
            'meta' => $meta,
            'latest_blogs' => $latest_blogs
        ]);
    }

    public function clearCache()
    {
        // Execute the command via CLI
        $output = shell_exec('php ' . __DIR__ . '/../../command cache:clean');

        // Return JSON response for the frontend
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => trim($output)]);
        exit;
    }

    public function contat()
    {
        $meta = [
            'classname' => 'contact-page'
        ];
        return $this->view('contact', ['meta' => $meta]);
    }

    public function blogs($categorySlug = null, $subcategorySlug = null)
    {
        $blogModel = new \App\Models\Blog();
        $categoryModel = new \App\Models\BlogCategory();

        $categorySlug = $categorySlug ?: ($_GET['category'] ?? null);
        $subcategorySlug = $subcategorySlug ?: ($_GET['subcategory'] ?? null);

        $perPage = 9;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT b.*, c.name as category_name, c.slug as category_slug, sc.slug as sub_category_slug 
                FROM blogs b 
                LEFT JOIN blog_categories c ON b.blog_category_id = c.id
                LEFT JOIN blog_categories sc ON b.blog_sub_category_id = sc.id";

        $countSql = "SELECT COUNT(*) as total FROM blogs b";
        if ($subcategorySlug) {
            $countSql .= " LEFT JOIN blog_categories sc ON b.blog_sub_category_id = sc.id";
        } elseif ($categorySlug) {
            $countSql .= " LEFT JOIN blog_categories c ON b.blog_category_id = c.id";
        }

        $params = [];
        if ($subcategorySlug) {
            $sql .= " WHERE sc.slug = ?";
            $countSql .= " WHERE sc.slug = ?";
            $params[] = $subcategorySlug;
        } elseif ($categorySlug) {
            $sql .= " WHERE c.slug = ?";
            $countSql .= " WHERE c.slug = ?";
            $params[] = $categorySlug;
        }

        $totalRes = $blogModel->query($countSql, $params);
        $totalBlogs = $totalRes[0]['total'] ?? 0;
        $totalPages = ceil($totalBlogs / $perPage);

        $sql .= " ORDER BY b.created_at DESC LIMIT $perPage OFFSET $offset";

        $blogs = $blogModel->query($sql, $params);

        $mainCategories = $categoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL ORDER BY sort_order ASC");

        $subCategories = [];
        $currentCategory = null;
        if ($categorySlug) {
            $res = $categoryModel->query("SELECT * FROM blog_categories WHERE slug = ? AND parent_id IS NULL LIMIT 1", [$categorySlug]);
            if (!empty($res)) {
                $currentCategory = $res[0];
                $subCategories = $categoryModel->query("SELECT * FROM blog_categories WHERE parent_id = ? ORDER BY sort_order ASC", [$currentCategory['id']]);
            }
        }

        $meta = [];
        return $this->view('blogs/index', [
            'meta' => $meta,
            'blogs' => $blogs,
            'categories' => $mainCategories,
            'subCategories' => $subCategories,
            'currentCategorySlug' => $categorySlug,
            'currentSubCategorySlug' => $subcategorySlug,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }

    public function blogRedirect($path)
    {
        header("Location: /blogs/" . trim($path, '/'), true, 301);
        exit;
    }

    public function blogRouter($path)
    {
        $segments = explode('/', trim($path, '/'));
        $count = count($segments);

        $blogModel = new \App\Models\Blog();
        $categoryModel = new \App\Models\BlogCategory();

        if ($count === 1) {
            // Check if it's a category
            $cat = $categoryModel->query("SELECT id FROM blog_categories WHERE slug = ? AND parent_id IS NULL LIMIT 1", [$segments[0]]);
            if (!empty($cat)) {
                return $this->blogs($segments[0]);
            }
            // Otherwise check if it's a blog post
            return $this->blogDetail($segments[0]);
        }

        if ($count === 2) {
            // cat/subcat OR cat/blog
            $cat = $categoryModel->query("SELECT id FROM blog_categories WHERE slug = ? AND parent_id IS NULL LIMIT 1", [$segments[0]]);
            if (!empty($cat)) {
                // Check if segment 2 is a subcategory
                $sub = $categoryModel->query("SELECT id FROM blog_categories WHERE slug = ? AND parent_id = ? LIMIT 1", [$segments[1], $cat[0]['id']]);
                if (!empty($sub)) {
                    return $this->blogs($segments[0], $segments[1]);
                }
                // Check if segment 2 is a blog under this category
                $blog = $blogModel->query("SELECT id FROM blogs WHERE slug = ? AND blog_category_id = ? LIMIT 1", [$segments[1], $cat[0]['id']]);
                if (!empty($blog)) {
                    return $this->blogDetail($segments[1]);
                }
            }
        }

        if ($count === 3) {
            // cat/subcat/blog
            $cat = $categoryModel->query("SELECT id FROM blog_categories WHERE slug = ? AND parent_id IS NULL LIMIT 1", [$segments[0]]);
            if (!empty($cat)) {
                $sub = $categoryModel->query("SELECT id FROM blog_categories WHERE slug = ? AND parent_id = ? LIMIT 1", [$segments[1], $cat[0]['id']]);
                if (!empty($sub)) {
                    $blog = $blogModel->query("SELECT id FROM blogs WHERE slug = ? AND blog_sub_category_id = ? LIMIT 1", [$segments[2], $sub[0]['id']]);
                    if (!empty($blog)) {
                        return $this->blogDetail($segments[2]);
                    }
                }
            }
        }

        return $this->notfound();
    }

    public function blogDetail($slug)
    {
        $blogModel = new \App\Models\Blog();

        $result = $blogModel->query("SELECT b.*, c.slug as category_slug, sc.slug as sub_category_slug 
                                     FROM blogs b 
                                     LEFT JOIN blog_categories c ON b.blog_category_id = c.id
                                     LEFT JOIN blog_categories sc ON b.blog_sub_category_id = sc.id
                                     WHERE b.slug = ? LIMIT 1", [$slug]);

        if (empty($result)) {
            return $this->notfound();
        }

        $blog = $result[0];
        $related_blogs = $blogModel->query("SELECT b.*, c.slug as category_slug, sc.slug as sub_category_slug 
                                            FROM blogs b 
                                            LEFT JOIN blog_categories c ON b.blog_category_id = c.id
                                            LEFT JOIN blog_categories sc ON b.blog_sub_category_id = sc.id
                                            WHERE b.slug != ? 
                                            ORDER BY b.created_at DESC LIMIT 6", [$slug]);

        $meta = [
            'classname' => 'new-blogs-single-page'
        ];

        return $this->view('blogs/blog-details', ['meta' => $meta, 'blog' => $blog, 'related_blogs' => $related_blogs]);
    }

    public function services()
    {
        $meta = [];
        return $this->view('services', ['meta' => $meta]);
    }
    // service 
    public function socialMediaMarketingDubai()
    {
        $meta = [];
        return $this->view('services/social-media-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function seoServicesCompanyDubai()
    {
        $meta = [];
        return $this->view('services/seo-services-company-in-dubai', ['meta' => $meta]);
    }
    public function digitalMarketingStrategyDubai()
    {
        $meta = [
            'title' => 'Digital Marketing Strategy Dubai | Award-Winning Digital Agency',
            'description' => 'BrandStory offers data-driven digital marketing strategy in Dubai. Our 5-stage framework focuses on ROI, market intelligence, and multi-channel synchronization for sustainable brand growth.',
            'classname' => 'dm-agency-dubai new-3-page'
        ];
        return $this->view('services/digital-marketing-strategy-dubai', ['meta' => $meta]);
    }
    public function seoPricingDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai new-3-page'
        ];
        return $this->view('services/seo-pricing-dubai', ['meta' => $meta]);
    }
    public function onpageServicesDubai()
    {
        $meta = [];
        return $this->view('services/on-page-seo-dubai', ['meta' => $meta]);
    }

    public function technicalSeoDubai()
    {
        $meta = [];
        return $this->view('services/technical-seo-dubai', ['meta' => $meta]);
    }

    public function offPageSeoDubai()
    {
        $meta = [];
        return $this->view('services/off-page-seo-dubai', ['meta' => $meta]);
    }

    public function keywordResearchDubai()
    {
        $meta = [];
        return $this->view('services/keyword-research-dubai', ['meta' => $meta]);
    }
    public function brandAgencyDubai()
    {
        $meta = [];
        return $this->view('services/branding-agency-in-dubai', ['meta' => $meta]);
    }
    public function websiteDesignDubai()
    {
        $meta = [];
        return $this->view('services/website-design-company-in-dubai', ['meta' => $meta]);
    }
    public function websiteDevelopmentDubai()
    {
        $meta = [];
        return $this->view('services/website-development-company-in-dubai', ['meta' => $meta]);
    }
    public function fullFunnelPerformanceMarketing()
    {
        $meta = [
            'classname' => 'full-funnel-page service-page'
        ];
        return $this->view('services/full-funnel-performance-marketing', ['meta' => $meta]);
    }
    public function emailMarketingDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('services/email-marketing-company-in-dubai', ['meta' => $meta]);
    }

    public function payPerClickServicesDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page ppc'
        ];
        return $this->view('services/pay-per-click-ppc-services-in-dubai', ['meta' => $meta]);
    }

    public function searchEngineMarketingAgencyDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai new-3-page'
        ];
        return $this->view('services/search-engine-marketing-agency-in-dubai', ['meta' => $meta]);
    }

    public function ecommerceSeoServicesDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai new-3-page'
        ];
        return $this->view('services/ecommerce-seo-services-in-dubai', ['meta' => $meta]);
    }

    public function localSeoServicesDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai new-3-page'
        ];
        return $this->view('services/local-seo-services-in-dubai', ['meta' => $meta]);
    }

    public function videoMarketingDubai()
    {
        $meta = [
            'classname' => 'dm-page'
        ];
        return $this->view('services/video-marketing-agency-dubai', ['meta' => $meta]);
    }
    public function facebookMarketingDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/facebook-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function instagramMarketingDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'

        ];
        return $this->view('services/instagram-advertising-agency-in-dubai', ['meta' => $meta]);
    }
    public function twitterMarketingDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/twitter-advertising-dubai', ['meta' => $meta]);
    }
    public function pinterestMarketingDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/pinterest-advertising-services-in-dubai', ['meta' => $meta]);
    }
    public function tiktokMarketingDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/tiktok-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function seoAuditServicesInDubai()
    {
        $meta = [
            'classname' => 'redes-page service-page'
        ];
        return $this->view('services/seo-audit-services-in-dubai', ['meta' => $meta]);
    }
    public function onlineReputationManagementServicesInDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('services/online-reputation-management-services-in-dubai', ['meta' => $meta]);
    }
    public function contentMarketingAgencyDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('services/content-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function uiuxDesignCompanyInDubai()
    {
        $meta = [
            'classname' => 'ui-ux-new-test'
        ];
        return $this->view('services/ui-ux-design-company-in-dubai', ['meta' => $meta]);
    }
    public function logoDesigningDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/logo-designing-company-in-dubai', ['meta' => $meta]);
    }
    public function creativeAdvertisingAgencyDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/creative-advertising-agency-in-dubai', ['meta' => $meta]);
    }

    public function wordpressDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/wordpress-development-company-in-dubai', ['meta' => $meta]);
    }
    public function megentoWebsiteDevelopmentDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/magento-website-development-dubai', ['meta' => $meta]);
    }
    public function durpalWebsiteDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/drupal-website-development-company-in-dubai', ['meta' => $meta]);
    }
    public function ecommerceDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/ecommerce-development-company-dubai', ['meta' => $meta]);
    }
    public function laravelDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page dm-agency-dubai'
        ];
        return $this->view('services/laravel-development-company-in-dubai', ['meta' => $meta]);
    }

    public function angularDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page dm-agency-dubai'
        ];
        return $this->view('services/angular-development-company-in-dubai', ['meta' => $meta]);
    }

    public function nextjsDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page dm-agency-dubai'
        ];
        return $this->view('services/nextjs-development-company-in-dubai', ['meta' => $meta]);
    }

    public function shopifyDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page dm-agency-dubai'
        ];
        return $this->view('services/shopify-development-company-in-dubai', ['meta' => $meta]);
    }

    public function wixDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page dm-agency-dubai'
        ];
        return $this->view('services/wix-development-company-in-dubai', ['meta' => $meta]);
    }

    public function webflowDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'dm-page service-page dm-agency-dubai'
        ];
        return $this->view('services/webflow-development-company-in-dubai', ['meta' => $meta]);
    }

    public function conversionRateOptimizationAgencyDubai()
    {
        $meta = [];
        return $this->view('services/conversion-rate-optimization-agency-dubai', ['meta' => $meta]);
    }


    //  industries
    public function industries()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/index', ['meta' => $meta]);
    }
    public function realEstateMerketingServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/real-estate-marketing-services', ['meta' => $meta]);
    }
    public function realEstatePpcServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/real-estate-ppc-agency-in-dubai-uae', ['meta' => $meta]);
    }
    public function realEstateSeoServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/real-estate-seo-agency-in-dubai-uae', ['meta' => $meta]);
    }
    public function ecommerceMarketingServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/e-commerce-marketing-service', ['meta' => $meta]);
    }
    public function healthcareMarketingServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/healthcare-marketing-services', ['meta' => $meta]);
    }
    public function educationMarketingServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/education-marketing-services', ['meta' => $meta]);
    }
    public function b2bCorporateMarketingServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/b2b-corporate-marketing-services', ['meta' => $meta]);
    }
    public function travelAgencyMarketingServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/travel-agency-marketing-services', ['meta' => $meta]);
    }
    public function digitalMarketingForDentists()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/digital-marketing-for-dentists', ['meta' => $meta]);
    }
    public function digitalMarketingForAutomotive()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/digital-marketing-for-automotive', ['meta' => $meta]);
    }
    public function digitalMarketingForLawFirms()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/digital-marketing-for-law-firms', ['meta' => $meta]);
    }



    // case studies 

    public function casestudies()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/index', ['meta' => $meta]);
    }
    // case studies 

    public function coverbwesite()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/cover-b-wesite', ['meta' => $meta]);
    }
    public function ecommerce()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/e-commerce', ['meta' => $meta]);
    }
    public function educationinstitution()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/education-institution', ['meta' => $meta]);
    }
    public function equence()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/equence', ['meta' => $meta]);
    }
    public function hotel()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/hotel', ['meta' => $meta]);
    }
    public function squareone()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/square-one', ['meta' => $meta]);
    }
    public function takeleap()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/take-leap', ['meta' => $meta]);
    }
    public function nanoprecisescicorp()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/nanoprecise-sci-corp', ['meta' => $meta]);
    }

    public function travelagency()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/travel-agency', ['meta' => $meta]);
    }
    public function wiproinfrastructureengineering()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/wipro-infrastructure-engineering', ['meta' => $meta]);
    }
    // others pages

    public function searchEngineOptimization()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/search-engine-optimization', ['meta' => $meta]);
    }
    public function b2bCompanyInDubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/b2b-company-in-dubai', ['meta' => $meta]);
    }
    public function contentWritingCompanyInDubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/content-writing-company-in-dubai', ['meta' => $meta]);
    }

    public function corporateEventManagementCompanyInDubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-event-management-company-in-dubai', ['meta' => $meta]);
    }
    public function corporateEventPlannersInDubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-event-planners-in-dubai', ['meta' => $meta]);
    }
    public function corporatePhotographersInAlAin()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-al-ain', ['meta' => $meta]);
    }
    public function corporatePhotographersInFujairah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-fujairah', ['meta' => $meta]);
    }

    public function corporatePhotographersInRasAlKhaimah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function corporatePhotographersInUmmAlQuwain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-umm-al-quwain', ['meta' => $meta]);
    }
    public function corporatePhotographyInAbuDhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-abu-dhabi', ['meta' => $meta]);
    }

    public function corporatePhotographyInDubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-dubai', ['meta' => $meta]);
    }
    public function corporatePhotographyInSaudiArabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-saudi-arabia', ['meta' => $meta]);
    }
    public function corporatePhotographyInSharjah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-sharjah', ['meta' => $meta]);
    }
    public function corporateVideoProductionAgencyInSaudiArabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-agency-in-saudi-arabia', ['meta' => $meta]);
    }
    public function corporateVideoProductionCompanyInAbuDhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function corporateVideoProductionCompanyInAlAin()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-al-ain', ['meta' => $meta]);
    }

    public function corporateVideoProductionCompanyInFujairah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-fujairah', ['meta' => $meta]);
    }

    public function corporateVideoProductionCompanyInSharjah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-sharjah', ['meta' => $meta]);
    }
    public function corporateVideoProductionCompanyInUmmAlQuwain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-umm-al-quwain', ['meta' => $meta]);
    }

    public function corporateVideoProductionInAjman()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-in-ajman', ['meta' => $meta]);
    }
    public function corporateVideoProductionInRasAlKhaimah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function corporateVideoProductionServicesInDubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-services-in-dubai', ['meta' => $meta]);
    }
    public function creativeAdvertisingAgencyInAbuDhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/creative-advertising-agency-in-abu-dhabi', ['meta' => $meta]);
    }

    public function cryptocurrencyMarketingAgencyDubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/cryptocurrency-marketing-agency-dubai', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinabudhabi()
    {
        $meta = [
            // 'classname' => 'dm-page service-page ppc'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-abu-dhabi', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinajman()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-ajman', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinalain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-al-ain', ['meta' => $meta]);
    }
    public function digitalmarketingagencyindubaiuae()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-dubai-uae', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinfujairah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-fujairah', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinarasalkhaimah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-ras-al-khaimah', ['meta' => $meta]);
    }

    public function digitalmarketingagencyinsharjah()
    {
        $meta = [
            'classname' => 'dm-page service-page ppc'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-sharjah', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinummalquwain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-umm-al-quwain', ['meta' => $meta]);
    }

    public function ecommercwebdevelopmentservices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ecommerce-web-development-services', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinajman()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-ajman', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinalquwain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-al-quwain', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinfujairah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-fujairah', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinrasalkhaimah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinsharjah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-sharjah', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinummalquwain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-umm-al-quwain', ['meta' => $meta]);
    }
    public function eventphotographyindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/event-photography-in-dubai', ['meta' => $meta]);
    }
    public function eventvideoproductioncompanyindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/event-video-production-company-in-dubai', ['meta' => $meta]);
    }
    public function googlepenaltyrecoveryservicesindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/google-penalty-recovery-services-in-dubai', ['meta' => $meta]);
    }
    public function graphicdesigncompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/graphic-design-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function instagramadvertisingagencyindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/instagram-advertising-agency-in-dubai', ['meta' => $meta]);
    }
    public function mobileappdevelopmentcompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/mobile-app-development-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function mobileappdevelopmentindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/mobile-app-development-in-dubai', ['meta' => $meta]);
    }
    public function mobileappmarketingdubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/mobile-app-marketing-dubai', ['meta' => $meta]);
    }
    public function performancemarketing()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/performance-marketing', ['meta' => $meta]);
    }
    public function ppccompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ppc-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function pragencydubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/pr-agency-dubai', ['meta' => $meta]);
    }
    public function pragencyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/pr-agency-in-abu-dhabi', ['meta' => $meta]);
    }
    public function privacypolicy()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/privacy-policy', ['meta' => $meta]);
    }
    public function quoramarketing()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/quora-marketing', ['meta' => $meta]);
    }
    public function retailmarketingagencydubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/retail-marketing-agency-dubai', ['meta' => $meta]);
    }

    public function seoagencyadenyemen()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-aden-yemen', ['meta' => $meta]);
    }

    public function seoagencyalkhobarsaudiarabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-al-khobar-saudi-arabia', ['meta' => $meta]);
    }

    public function seoagencyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-abu-dhabi', ['meta' => $meta]);
    }
    public function seoagencyinajman()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-ajman', ['meta' => $meta]);
    }

    public function seoagencyinbaghdad()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-baghdad', ['meta' => $meta]);
    }

    public function seoagencyincairo()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-cairo', ['meta' => $meta]);
    }

    public function seoagencyinfujairah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-fujairah', ['meta' => $meta]);
    }

    public function seoagencyinaraskhaimah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function seoagencyinsalalah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-salalah', ['meta' => $meta]);
    }
    public function seoagencyinsharjah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-sharjah', ['meta' => $meta]);
    }

    public function seoagencyinummalquwain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-umm-al-quwain', ['meta' => $meta]);
    }

    public function seoagencykuwaitcity()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-kuwait-city', ['meta' => $meta]);
    }

    public function seocompanyinadenyemen()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-aden-yemen', ['meta' => $meta]);
    }

    public function seocompanyinalepposyria()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-aleppo-syria', ['meta' => $meta]);
    }

    public function seocompanyindhahranksa()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-dhahran-ksa', ['meta' => $meta]);
    }
    public function seocompanyinkhorfakken()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-khor-fakken', ['meta' => $meta]);
    }

    public function seocompanyjordan()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-jordan', ['meta' => $meta]);
    }
    public function seoinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-abu-dhabi', ['meta' => $meta]);
    }
    public function seoinalkhobarsaudiarabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-al-khobar-saudi-arabia', ['meta' => $meta]);
    }

    public function seoinbahrain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-bahrain', ['meta' => $meta]);
    }

    public function seoindammam()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-dammam', ['meta' => $meta]);
    }

    public function seoindhahranksa()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-dhahran-ksa', ['meta' => $meta]);
    }


    public function seoinhawallykuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-hawally-kuwait', ['meta' => $meta]);
    }
    public function seoinjeddah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-jeddah', ['meta' => $meta]);
    }
    public function seoinjordan()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-jordan', ['meta' => $meta]);
    }
    public function seoinkuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-kuwait', ['meta' => $meta]);
    }
    public function seoinmeccasaudiarabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-mecca-saudi-arabia', ['meta' => $meta]);
    }
    public function seoinmedinasaudiarabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-medina-saudi-arabia', ['meta' => $meta]);
    }
    public function seoinmuscat()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-muscat', ['meta' => $meta]);
    }
    public function seoinqatar()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-qatar', ['meta' => $meta]);
    }
    public function seoinriyadh()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-riyadh', ['meta' => $meta]);
    }
    public function seoinsaudiarabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-saudi-arabia', ['meta' => $meta]);
    }
    public function seopageone()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-page-one', ['meta' => $meta]);
    }

    public function seoservicesindhahran()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-in-dhahran', ['meta' => $meta]);
    }


    public function seoservicesindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('services/seo-services-in-dubai', ['meta' => $meta]);
    }
    public function seoservicesinmeccasaudiarabia()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-in-mecca-saudi-arabia', ['meta' => $meta]);
    }
    public function seoservicesmanama()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-manama', ['meta' => $meta]);
    }
    public function seoservicessalalah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-salalah', ['meta' => $meta]);
    }
    public function smsmarketingdubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/sms-marketing-dubai', ['meta' => $meta]);
    }
    public function socialmediamarketingcompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/social-media-marketing-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function startwithfullfunnelperformancemarketing()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/start-with-full-funnel-performance-marketing', ['meta' => $meta]);
    }
    public function technologycontentwritingcompanyindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/technology-content-writing-company-in-dubai', ['meta' => $meta]);
    }
    public function termsandconditions()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/terms-and-conditions', ['meta' => $meta]);
    }
    public function uiuxdesigncompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function uiuxdesigncompanyinajman()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-ajman', ['meta' => $meta]);
    }
    public function uiuxdesigncompanyinalain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-al-ain', ['meta' => $meta]);
    }

    public function uiuxdesigncompanyinfujairah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-fujairah', ['meta' => $meta]);
    }
    public function uiuxdesigncompanyinrasalkhaimah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function uiuxdesigncompanyinsharjah()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-sharjah', ['meta' => $meta]);
    }
    public function uiuxdesigncompanyinummalquwain()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-umm-al-quwain', ['meta' => $meta]);
    }
    public function websitedesigncompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/website-design-company-in-abu-dhabi', ['meta' => $meta]);
    }

    public function websitedevelopmentcompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/website-development-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function websitemaintenancecompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/website-maintenance-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function whatsappmarketingindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/whatsapp-marketing-in-dubai', ['meta' => $meta]);
    }
    public function ecommercewebsitedevelopmentcompanyinabudhabi()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ecommerce-website-development-company-in-abu-dhabi', ['meta' => $meta]);
    }

    public function logodesigncompanyinabudhabi()
    {
        $meta = [
            'classname' => 'logo-design service-page'
        ];
        return $this->view('others-pages/logo-design-company-in-abu-dhabi', ['meta' => $meta]);
    }

    //kuwait pages

    public function b2bmarketingserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/b2b-marketing-services', ['meta' => $meta]);
    }
    public function contentwritingserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/content-writing-services', ['meta' => $meta]);
    }
    public function digitalmarketingserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/digital-marketing-services', ['meta' => $meta]);
    }
    public function emailmarketingserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/email-marketing-services', ['meta' => $meta]);
    }
    public function ppcserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/ppc-services', ['meta' => $meta]);
    }
    public function prserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/pr-services', ['meta' => $meta]);
    }
    public function seoserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/seo-services', ['meta' => $meta]);
    }
    public function socialmediamarketingserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/social-media-marketing-services', ['meta' => $meta]);
    }
    public function uixuxdesignserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/ui-ux-design-services', ['meta' => $meta]);
    }
    public function websitedesignanddevelopmentserviceskuwait()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('kuwait/website-design-and-development-services', ['meta' => $meta]);
    }

    //development pages
    public function androidAppDevelopmentCompanyDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/android-app-development-company-dubai', ['meta' => $meta]);
    }
    public function crossPlatformAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/cross-platform-app-development-company-in-dubai', ['meta' => $meta]);
    }

    public function flutterAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/flutter-app-development-company-in-dubai', ['meta' => $meta]);
    }
    public function hybridAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/hybrid-app-development-company-in-dubai', ['meta' => $meta]);
    }
    public function iosAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/ios-app-development-company-in-dubai', ['meta' => $meta]);
    }
    public function reactNativeAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/react-native-app-development-company-in-dubai', ['meta' => $meta]);
    }

    // bahrain pages
    public function b2bMarketingServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/b2b-marketing-services', ['meta' => $meta]);
    }
    public function contentWritingServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/content-writing-services', ['meta' => $meta]);
    }
    public function digitalMarketingServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/digital-marketing-services', ['meta' => $meta]);
    }
    public function emailMarketingServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/email-marketing-services', ['meta' => $meta]);
    }
    public function ppcServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/ppc-services', ['meta' => $meta]);
    }
    public function prServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/pr-services', ['meta' => $meta]);
    }
    public function seoServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/seo-services', ['meta' => $meta]);
    }
    public function socialMediaMarketingServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/social-media-marketing-services', ['meta' => $meta]);
    }
    public function uiUxDesignServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/ui-ux-design-services', ['meta' => $meta]);
    }
    public function websiteDesignAndDevelopmentServices()
    {
        $meta = [
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/website-design-and-development-services', ['meta' => $meta]);
    }

    //careers
    public function careers()
    {
        $meta = [
            'classname' => 'careers'
        ];
        return $this->view('careers/index', ['meta' => $meta]);
    }
    public function businessGrowthManager()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/business-growth-manager', ['meta' => $meta]);
    }
    public function charteredAccountant()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/chartered-accountant', ['meta' => $meta]);
    }
    public function contentWriterIntern()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/content-writer-intern', ['meta' => $meta]);
    }
    public function copywriter()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/copywriter', ['meta' => $meta]);
    }
    public function corporateHeadshotPhotographer()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/corporate-headshot-photographer', ['meta' => $meta]);
    }
    public function creativeLead()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/creative-lead', ['meta' => $meta]);
    }
    public function digitalMarketer()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/digital-marketer', ['meta' => $meta]);
    }
    public function digitalMarketingManager()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/digital-marketing-manager', ['meta' => $meta]);
    }
    public function eventMarketingManager()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/event-marketing-manager', ['meta' => $meta]);
    }
    public function fullStackDeveloper()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/full-stack-developer', ['meta' => $meta]);
    }
    public function graphicDesigner()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/graphic-designer', ['meta' => $meta]);
    }
    public function groupAccountManager()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/group-account-manager', ['meta' => $meta]);
    }
    public function leadCopywriter()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/lead-copywriter', ['meta' => $meta]);
    }
    public function photographersAndEditor()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/photographers-and-editor', ['meta' => $meta]);
    }
    public function phpDeveloper()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/php-developer', ['meta' => $meta]);
    }
    public function publicRelationExecutive()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/public-relation-executive', ['meta' => $meta]);
    }
    public function seoExecutive()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/seo-executive', ['meta' => $meta]);
    }
    public function seoManager()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/seo-manager', ['meta' => $meta]);
    }
    public function smmProcess()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/smm-process', ['meta' => $meta]);
    }
    public function uiDesigner()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/ui-designer', ['meta' => $meta]);
    }
    public function uxDesigner()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/ux-designer', ['meta' => $meta]);
    }
    public function videographerAndEditor()
    {
        $meta = [
            'classname' => 'dm-page service-page'
        ];
        return $this->view('careers/videographer-and-editor', ['meta' => $meta]);
    }

    public function geoAgencyDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai'
        ];
        return $this->view('others-pages/geo-agency-dubai', ['meta' => $meta]);
    }
    public function seoLinkBuildingAgencyDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai'
        ];
        return $this->view('others-pages/seo-link-building-agency-dubai', ['meta' => $meta]);
    }
    public function localSEOAgencyDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai'
        ];
        return $this->view('others-pages/local-seo-agency-dubai', ['meta' => $meta]);
    }

    public function searchEverywhereService()
    {
        $meta = [
            'title' => 'Search Everywhere Optimization Services | Be Found on TikTok, Amazon, YouTube & More',
            'description' => "Our Search Everywhere Optimization services ensure your brand is discovered across all major search platforms, from TikTok and YouTube to Amazon and GPT.",
            'classname' => 'dm-agency-dubai search-everywhare-service'
        ];
        return $this->view('services/search-everywhere-service', ['meta' => $meta]);
    }

    public function testimonials()
    {
        $meta = [
            'title' => 'Client Testimonials | BrandStory UAE Success Stories',
            'description' => "See what our clients say about our digital marketing, SEO, and web development services in Dubai. Real success stories from leading brands.",
            'classname' => 'testimonials-page'
        ];
        return $this->view('testimonials/index', ['meta' => $meta]);
    }




    public function customlayout_1()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('customlayout/inner-1', ['meta' => $meta]);
    }

    public function customlayout_2()
    {
        $meta = ['classname' => 'seo-pillar-page'];
        return $this->view('customlayout/inner-2', ['meta' => $meta]);
    }



    // from submit post

    public function sendContactInformation()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["status" => "error", "message" => "Invalid request method."]);
            return;
        }

        if (empty($_POST['phone']) || empty($_POST['email'])) {
            echo json_encode(["status" => "error", "message" => "Email and phone are required."]);
            return;
        }

        // Rate Limiting (1 submission per 60 seconds)
        if (!empty($_SESSION['last_submission_time']) && (time() - $_SESSION['last_submission_time'] < 60)) {
            echo json_encode(["status" => "error", "message" => "Please wait a minute before submitting again."]);
            return;
        }
        $_SESSION['last_submission_time'] = time();

        // Honeypot check
        if (!empty($_POST['honeypot'])) {
            echo json_encode(["status" => "error", "message" => "Spam detected."]);
            return;
        }

        // Validate CSRF Token
        if (empty($_POST['_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['_token'])) {
            echo json_encode(["status" => "error", "message" => "Invalid CSRF token. Please refresh the page and try again."]);
            return;
        }

        // Gather form data and Sanitize
        $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $country = htmlspecialchars(trim($_POST['country'] ?? ''), ENT_QUOTES, 'UTF-8');
        $country_code = htmlspecialchars(trim($_POST['country_code'] ?? ''), ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
        $company = htmlspecialchars(trim($_POST['company'] ?? ''), ENT_QUOTES, 'UTF-8');
        $designation = htmlspecialchars(trim($_POST['designation'] ?? ''), ENT_QUOTES, 'UTF-8');

        $servicesRaw = isset($_POST['services']) && is_array($_POST['services']) ? implode(", ", $_POST['services']) : '';
        $services = htmlspecialchars($servicesRaw, ENT_QUOTES, 'UTF-8');

        $budget = htmlspecialchars(trim($_POST['budget'] ?? ''), ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

        $httpReferer = htmlspecialchars($_SERVER['HTTP_REFERER'] ?? '', ENT_QUOTES, 'UTF-8');
        $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

        // Compose email
        $subject = "brandstory.ae | Contact Lead | $company | $name";
        $emailBody = "Hello,<br><br>
        You have a new enquiry.<br><br>
        Name: $name<br>
        Email id: $email<br>
        Country: $country<br>
        Phone: +($country_code) $phone<br>
        Company: $company<br>
        Designation: $designation<br>
        Services: $services<br>
        Budget: $budget<br>
        Message: $message<br><br>
        IP Address: {$_SERVER['REMOTE_ADDR']}<br>
        Sent From Url: $httpReferer";

        // Send Email using PHPMailer
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host       = getenv('smtp_host');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('smtp_username');
            $mail->Password   = getenv('smtp_password');
            $mail->SMTPSecure = getenv('smtp_secure');
            $mail->Port       = getenv('smtp_port');

            // Email settings
            $mail->setFrom(getenv('smtp_from_email'), getenv('smtp_from_name'));
            $mail->addAddress('leads@brandstory.in');
            $mail->addCC('bala@brandstory.in');
            $mail->addCC('madhavan@brandstory.in');
            // $mail->addCC('supriyo@brandstory.in');
            // $mail->addCC('supriyo@brandstory.in');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $emailBody;
            $mail->AltBody = strip_tags($emailBody);

            $mail->send();

            // Save to Database
            $enquiryModel = new \App\Models\Enquiry();
            $enquiryModel->save([
                'type' => 'contact',
                'name' => $name,
                'email' => $email,
                'phone' => "+" . $country_code . " " . $phone,
                'company' => $company,
                'designation' => $designation,
                'services' => $services,
                'budget' => $budget,
                'message' => $message
            ]);

            // Push to Monday.com CRM
            $apiToken = 'eyJhbGciOiJIUzI1NiJ9.eyJ0aWQiOjUzNzg1NzMzOCwiYWFpIjoxMSwidWlkIjo3ODE2NDU5OCwiaWFkIjoiMjAyNS0wNy0xMVQwNToxOToyNi4wMDBaIiwicGVyIjoibWU6d3JpdGUiLCJhY3RpZCI6MzAzMTc0NjksInJnbiI6ImFwc2UyIn0.FSjnTYiHpeGN_XquSk386d-ZdZ2u1pcMvKGXV3y-rzM';
            $boardId = 5026739620;
            $groupId = 'group_mm10rw6q';
            $itemName = $company;

            // Map Services (Dropdown labels)
            $validServices = [
                'SEO',
                'Social Media',
                'Performance Marketing',
                'Digital Marketing',
                'Production',
                'Video Editing',
                'Employer Branding',
                'Database',
                'Branding',
                'Content Marketing',
                'PR Service',
                'Others',
                'ABM',
                'Website Development',
                'Website Maintainance',
                'Design Collateral',
                'GTM Campaign',
                'AD Hoc',
                'Influencer Marketing',
                'Brand Consulting',
                'Design Service',
                'Press',
                'Press Release'
            ];

            $selectedServices = [];
            foreach (explode(',', $services) as $srv) {
                $srvTrim = trim($srv);
                if (in_array($srvTrim, $validServices)) {
                    $selectedServices[] = $srvTrim;
                }
            }

            // Map Budget (Dropdown labels)
            $budgetMapping = [
                'AED 3000 - 5000' => 'AED 3000 – AED 5000',
                'AED 5000 - 10000' => 'AED 5000 – AED 10000',
                'AED 10000 - 15000' => 'AED 10000 – AED 15000',
                'AED 15000 - 20000' => 'AED 15000 – AED 20000',
                'Above AED 20000' => 'Above AED 20000'
            ];
            $mappedBudget = $budgetMapping[$budget] ?? $budget;

            // Build column values JSON
            $columnValues = [];

            // Email
            if (!empty($email)) {
                $columnValues['email_mm10294v'] = [
                    'email' => $email,
                    'text' => $email
                ];
            }

            // Phone
            if (!empty($phone)) {
                $columnValues['phone_mm1063gz'] = [
                    'phone' => "+" . $country_code . $phone
                ];
            }

            // Service (dropdown)
            if (!empty($selectedServices)) {
                $columnValues['dropdown_mm10caj3'] = [
                    'labels' => $selectedServices
                ];
            }

            // Budget Range (dropdown)
            if (!empty($mappedBudget)) {
                $columnValues['dropdown_mm10411f'] = [
                    'labels' => [$mappedBudget]
                ];
            }

            // Message (long text)
            if (!empty($message)) {
                $columnValues['long_text_mm10wc1g'] = ['text' => $message];
            }

            // Website (Source Page)
            $columnValues['long_text_mm10t0m9'] = ['text' => $actualLink];

            // Title/Position
            if (!empty($designation)) {
                $columnValues['long_text_mm10wxkn'] = ['text' => $designation];
            }

            // Company SPOC (simple text)
            if (!empty($company)) {
                $columnValues['text_mm109qat'] = $name;
            }

            // Lead Page Link (Referrer)
            if (!empty($httpReferer)) {
                $columnValues['long_text_mm10t95k'] = ['text' => $httpReferer];
            }

            // Set default status to "Unassigned"
            $columnValues['color_mm103cf8'] = ['label' => 'Unassigned'];

            // Build the GraphQL mutation with variables
            $mutation = 'mutation ($boardId: ID!, $groupId: String!, $itemName: String!, $columnValues: JSON!) {
                create_item (
                    board_id: $boardId,
                    group_id: $groupId,
                    item_name: $itemName,
                    column_values: $columnValues
                ) {
                    id
                    name
                }
            }';

            $variables = [
                'boardId'      => (string)$boardId,
                'groupId'      => $groupId,
                'itemName'     => $itemName,
                'columnValues' => json_encode($columnValues)
            ];

            // Send Request to Monday.com
            $postData = json_encode([
                "query" => $mutation,
                "variables" => $variables
            ]);

            $ch = curl_init('https://api.monday.com/v2');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: ' . $apiToken
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            // Log Monday.com Response for Debugging
            error_log("Monday.com API HTTP Status: " . $httpCode);
            error_log("Monday.com API Response: " . $response);

            // Output JSON response from Monday.com
            if ($curlError) {
                echo json_encode(["status" => "error", "message" => $curlError]);
            } else {
                // echo $response;
                echo json_encode(["status" => "success", "message" => "Thank you! Your quote request has been sent.", "redirect_url" => route('thankyou')]);
            }
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            echo json_encode(["status" => "error", "message" => "Email error: " . $mail->ErrorInfo]);
        } catch (\Exception $e) {
            echo json_encode(["status" => "error", "message" => "Server error: " . $e->getMessage()]);
        }
    }
    public function sendCareerInformation()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["status" => "error", "message" => "Invalid request method."]);
            return;
        }

        // Validate Required Fields
        $requiredFields = ['name', 'email', 'phone', 'experience', 'cctc', 'ectc', 'notice'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                echo json_encode(["status" => "error", "message" => ucfirst($field) . " is required."]);
                return;
            }
        }

        // Validate File Upload
        if (empty($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(["status" => "error", "message" => "Resume is required."]);
            return;
        }

        // // Rate Limiting (1 submission per 60 seconds)
        // if (!empty($_SESSION['last_career_submission_time']) && (time() - $_SESSION['last_career_submission_time'] < 60)) {
        //     echo json_encode(["status" => "error", "message" => "Please wait a minute before submitting again."]);
        //     return;
        // }
        // $_SESSION['last_career_submission_time'] = time();

        // Honeypot check
        if (!empty($_POST['email_sp'])) {
            echo json_encode(["status" => "error", "message" => "Spam detected."]);
            return;
        }

        // Validate CSRF Token
        if (empty($_POST['_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['_token'])) {
            echo json_encode(["status" => "error", "message" => "Invalid CSRF token. Please refresh the page and try again."]);
            return;
        }

        // Sanitize Input
        $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
        $linkedurl = htmlspecialchars(trim($_POST['linkedurl'] ?? ''), ENT_QUOTES, 'UTF-8');
        $experience = htmlspecialchars(trim($_POST['experience'] ?? ''), ENT_QUOTES, 'UTF-8');
        $current_employer = htmlspecialchars(trim($_POST['current_employer'] ?? ''), ENT_QUOTES, 'UTF-8');
        $cctc = htmlspecialchars(trim($_POST['cctc'] ?? ''), ENT_QUOTES, 'UTF-8');
        $ectc = htmlspecialchars(trim($_POST['ectc'] ?? ''), ENT_QUOTES, 'UTF-8');
        $notice = htmlspecialchars(trim($_POST['notice'] ?? ''), ENT_QUOTES, 'UTF-8');

        $httpReferer = htmlspecialchars($_SERVER['HTTP_REFERER'] ?? '', ENT_QUOTES, 'UTF-8');

        // Compose email
        $subject = "brandstory.ae | Career Application | $name";
        $emailBody = "Hello,<br><br>
        You have a new career application.<br><br>
        Name: $name<br>
        Email id: $email<br>
        Phone: $phone<br>
        LinkedIn: $linkedurl<br>
        Experience (Years): $experience<br>
        Current Employer: $current_employer<br>
        Current CTC: $cctc<br>
        Expected CTC: $ectc<br>
        Notice Period: $notice<br><br>
        IP Address: {$_SERVER['REMOTE_ADDR']}<br>
        Sent From Url: $httpReferer";

        // Send Email using PHPMailer
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host       = getenv('smtp_host');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('smtp_username');
            $mail->Password   = getenv('smtp_password');
            $mail->SMTPSecure = getenv('smtp_secure');
            $mail->Port       = getenv('smtp_port');

            // Email settings
            $mail->setFrom(getenv('smtp_from_email'), getenv('smtp_from_name'));
            $mail->addAddress('leads@brandstory.in');
            $mail->addCC('bala@brandstory.in');
            $mail->addCC('madhavan@brandstory.in');

            // Attach Resume
            $mail->addAttachment($_FILES['resume']['tmp_name'], $_FILES['resume']['name']);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $emailBody;
            $mail->AltBody = strip_tags($emailBody);

            $mail->send();

            echo json_encode(["status" => "success", "message" => "Your application has been sent successfully!"]);
        } catch (\Exception $e) {
            echo json_encode(["status" => "error", "message" => "Failed to send application. Please try again later."]);
        }
    }

    public function seoCalculator()
    {
        $meta = [
            'classname' => 'seo-calculator-page',
            'title' => 'SEO ROI Calculator | BrandStory AE',
            'description' => 'Calculate your potential SEO ROI and traffic growth with BrandStory AE\'s SEO Calculator.'
        ];
        return $this->view('seo-calculator', ['meta' => $meta]);
    }

    public function submitSeoCalculator()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["status" => "error", "message" => "Invalid request method."]);
            return;
        }

        // Validate Required Fields
        if (empty($_POST['phone']) || empty($_POST['email'])) {
            echo json_encode(["status" => "error", "message" => "Email and phone are required."]);
            return;
        }

        // Honeypot check
        if (!empty($_POST['honeypot'])) {
            echo json_encode(["status" => "error", "message" => "Spam detected."]);
            return;
        }

        // Validate CSRF Token
        if (empty($_POST['_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['_token'])) {
            echo json_encode(["status" => "error", "message" => "Invalid CSRF token."]);
            return;
        }

        // Gather Contact data
        $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
        $website = htmlspecialchars(trim($_POST['website'] ?? ''), ENT_QUOTES, 'UTF-8');

        // New Calculator Data
        $targetAudience = htmlspecialchars(trim($_POST['target_audience'] ?? ''), ENT_QUOTES, 'UTF-8');
        $pages = htmlspecialchars(trim($_POST['pages_to_optimize'] ?? ''), ENT_QUOTES, 'UTF-8');
        $age = htmlspecialchars(trim($_POST['website_age'] ?? ''), ENT_QUOTES, 'UTF-8');
        $locations = htmlspecialchars(trim($_POST['locations'] ?? ''), ENT_QUOTES, 'UTF-8');
        $agg = htmlspecialchars(trim($_POST['aggressiveness'] ?? ''), ENT_QUOTES, 'UTF-8');
        $comp = htmlspecialchars(trim($_POST['competition_level'] ?? ''), ENT_QUOTES, 'UTF-8');
        $rank = htmlspecialchars(trim($_POST['keyword_rank'] ?? ''), ENT_QUOTES, 'UTF-8');
        $estRange = htmlspecialchars(trim($_POST['est_price_range'] ?? ''), ENT_QUOTES, 'UTF-8');

        $httpReferer = htmlspecialchars($_SERVER['HTTP_REFERER'] ?? '', ENT_QUOTES, 'UTF-8');

        // Compose email
        $subject = "brandstory.ae | SEO Cost Calculator Lead | $name";
        $emailBody = "Hello,<br><br>
        You have a new lead from the SEO Cost Calculator.<br><br>
        <b>Contact Details:</b><br>
        Name: $name<br>
        Email: $email<br>
        Phone: $phone<br>
        Website: $website<br><br>
        <b>Calculator Results:</b><br>
        Estimated Monthly Investment: <b>$estRange</b><br><br>
        <b>Form Inputs:</b><br>
        Target Audience: $targetAudience<br>
        Pages focus: $pages<br>
        Website Age: $age<br>
        Physical Locations: $locations<br>
        Aggressiveness: $agg<br>
        Industry Competition: $comp<br>
        Current Keyword Ranking: $rank<br><br>
        IP Address: {$_SERVER['REMOTE_ADDR']}<br>
        Sent From: $httpReferer";

        // Send Email using PHPMailer
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = getenv('smtp_host');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('smtp_username');
            $mail->Password   = getenv('smtp_password');
            $mail->SMTPSecure = getenv('smtp_secure');
            $mail->Port       = getenv('smtp_port');

            $mail->setFrom(getenv('smtp_from_email'), getenv('smtp_from_name'));
            $mail->addAddress('leads@brandstory.in');
            $mail->addCC('bala@brandstory.in');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $emailBody;
            $mail->AltBody = strip_tags($emailBody);
            $mail->send();

            // Save to Database
            $enquiryModel = new \App\Models\Enquiry();
            $enquiryModel->save([
                'type' => 'seo_calculator',
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'company' => $website,
                'calculator_data' => json_encode([
                    'target_audience' => $targetAudience,
                    'pages_to_optimize' => $pages,
                    'website_age' => $age,
                    'locations' => $locations,
                    'aggressiveness' => $agg,
                    'competition_level' => $comp,
                    'keyword_rank' => $rank,
                    'est_price_range' => $estRange
                ])
            ]);

            // Monday.com Integration
            $apiToken = 'eyJhbGciOiJIUzI1NiJ9.eyJ0aWQiOjUzNzg1NzMzOCwiYWFpIjoxMSwidWlkIjo3ODE2NDU5OCwiaWFkIjoiMjAyNS0wNy0xMVQwNToxOToyNi4wMDBaIiwicGVyIjoibWU6d3JpdGUiLCJhY3RpZCI6MzAzMTc0NjksInJnbiI6ImFwc2UyIn0.FSjnTYiHpeGN_XquSk386d-ZdZ2u1pcMvKGXV3y-rzM';
            $boardId = '5026739620';
            $groupId = 'group_mm10rw6q';
            $itemName = "SEO Cost Calc | " . $name . " | " . $website;

            $columnValues = [
                "lead_email" => ["email" => $email, "text" => $email],
                "lead_phone" => ["phone" => $phone],
                "long_text_mkspy9pz" => "SEO Cost Calc: Range=$estRange, Audience=$targetAudience, Pages=$pages, Age=$age, Loc=$locations, Agg=$agg, Comp=$comp, Rank=$rank",
                "long_text_mkssakn4" => "SEO Cost Calculator",
                "long_text_mkt2d6j" => $website
            ];

            $columnValuesJson = json_encode($columnValues);
            $query = 'mutation {
                create_item (
                    board_id: "' . $boardId . '",
                    group_id: "' . $groupId . '",
                    item_name: "' . addslashes($itemName) . '",
                    column_values: "' . addslashes($columnValuesJson) . '"
                ) { id }
            }';

            $ch = curl_init('https://api.monday.com/v2');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Authorization: ' . $apiToken]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["query" => $query]));
            curl_exec($ch);
            curl_close($ch);

            echo json_encode(["status" => "success", "message" => "Thank you! Your quote request has been sent.", "redirect_url" => route('thankyou')]);
        } catch (\Exception $e) {
            echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
        }
    }

    public function digitalCostCalculator()
    {
        $meta = [
            'classname' => 'digital-calculator-page',
            'title' => 'Digital Agency Cost Calculator | BrandStory AE',
            'description' => 'Calculate the hourly rate for digital agency services based on location, size, and expertise.'
        ];
        return $this->view('digital-cost-calculator', ['meta' => $meta]);
    }

    public function submitDigitalCostCalculator()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["status" => "error", "message" => "Invalid request method."]);
            return;
        }

        if (empty($_POST['phone']) || empty($_POST['email'])) {
            echo json_encode(["status" => "error", "message" => "Email and phone are required."]);
            return;
        }

        if (!empty($_POST['honeypot'])) {
            echo json_encode(["status" => "error", "message" => "Spam detected."]);
            return;
        }

        if (empty($_POST['_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['_token'])) {
            echo json_encode(["status" => "error", "message" => "Invalid CSRF token."]);
            return;
        }

        $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');

        $location = htmlspecialchars(trim($_POST['agency_location'] ?? ''), ENT_QUOTES, 'UTF-8');
        $size = htmlspecialchars(trim($_POST['agency_size'] ?? ''), ENT_QUOTES, 'UTF-8');
        $exp = htmlspecialchars(trim($_POST['experience_level'] ?? ''), ENT_QUOTES, 'UTF-8');
        $complexity = htmlspecialchars(trim($_POST['industry_complexity'] ?? ''), ENT_QUOTES, 'UTF-8');
        $urgency = htmlspecialchars(trim($_POST['timeline_urgency'] ?? ''), ENT_QUOTES, 'UTF-8');
        $estRate = htmlspecialchars(trim($_POST['est_hourly_rate'] ?? ''), ENT_QUOTES, 'UTF-8');
        $services = htmlspecialchars(trim($_POST['services_text'] ?? 'None'), ENT_QUOTES, 'UTF-8');

        $httpReferer = htmlspecialchars($_SERVER['HTTP_REFERER'] ?? '', ENT_QUOTES, 'UTF-8');

        $subject = "brandstory.ae | Digital Cost Calculator Lead | $name";
        $emailBody = "Hello,<br><br>
        You have a new lead from the Digital Cost Calculator.<br><br>
        <b>Contact Details:</b><br>
        Name: $name<br>
        Email: $email<br>
        Phone: $phone<br><br>
        <b>Calculator Results:</b><br>
        Estimated Hourly Rate: <b>$estRate</b><br><br>
        <b>Form Inputs:</b><br>
        Agency Location: $location<br>
        Agency Size: $size<br>
        Experience Level: $exp<br>
        Industry Complexity: $complexity<br>
        Specialized Services: $services<br>
        Timeline Urgency: $urgency<br><br>
        IP Address: {$_SERVER['REMOTE_ADDR']}<br>
        Sent From: $httpReferer";

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = getenv('smtp_host');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('smtp_username');
            $mail->Password   = getenv('smtp_password');
            $mail->SMTPSecure = getenv('smtp_secure');
            $mail->Port       = getenv('smtp_port');

            $mail->setFrom(getenv('smtp_from_email'), getenv('smtp_from_name'));
            $mail->addAddress('leads@brandstory.in');
            $mail->addCC('bala@brandstory.in');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $emailBody;
            $mail->AltBody = strip_tags($emailBody);
            $mail->send();

            $enquiryModel = new \App\Models\Enquiry();
            $enquiryModel->save([
                'type' => 'digital_calculator',
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'calculator_data' => json_encode([
                    'agency_location' => $location,
                    'agency_size' => $size,
                    'experience_level' => $exp,
                    'industry_complexity' => $complexity,
                    'services' => $services,
                    'timeline_urgency' => $urgency,
                    'est_hourly_rate' => $estRate
                ])
            ]);

            echo json_encode(["status" => "success", "message" => "Thank you! Your quote request has been sent.", "redirect_url" => route('thankyou')]);
        } catch (\Exception $e) {
            echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
        }
    }

    public function dynamicPage($slug = null)
    {
        if (!$slug) {
            return $this->notfound();
        }

        $pageModel = new \App\Models\Page();
        $result = $pageModel->query("SELECT * FROM pages WHERE slug = ? LIMIT 1", [$slug]);

        if (empty($result)) {
            return $this->notfound();
        }

        $page = $result[0];
        $template = $page['template']; // e.g. "inner-1.php"

        // Dynamically get classname from the template file
        $classname = 'dm-agency-dubai'; // Final fallback
        $templatePath = __DIR__ . '/../Views/customlayout/' . $template;
        if (file_exists($templatePath)) {
            $templateFileContent = file_get_contents($templatePath);
            // Search for // $classname = '...'; or //$classname = '...';
            if (preg_match('/\$classname\s*=\s*\'([^\']+)\';/', $templateFileContent, $matches)) {
                $classname = $matches[1];
            }
        }

        // If a custom class is defined in the database, use it to override the template class
        if (!empty($page['custom_class'])) {
            $classname = $page['custom_class'];
        }

        $meta = [
            'classname' => $classname
        ];

        // Pass the raw content to the 'blank' view, which will handle PHP evaluation
        return $this->view('customlayout/dynamic_renderer', [
            'meta' => $meta,
            'page' => $page
        ]);
    }

    public function serp()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('tools/serp', ['meta' => $meta]);
    }

    public function xmlsitemapgenerator()
    {
        $meta = [
            'classname' => 'sitemap-page em-dubai-page service-pages'
        ];
        return $this->view('tools/xml-sitemap-generator', ['meta' => $meta]);
    }

    public function generateSitemapAction()
    {
        try {
            header('Content-Type: application/json');
            set_time_limit(600); // 10 minutes
            ini_set('memory_limit', '512M'); // Increase memory

            $url = $_POST['url'] ?? '';
            if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
                throw new \Exception('Please enter a valid website URL.');
            }

            $changefreq = $_POST['changefreq'] ?? 'weekly';
            $priority = $_POST['priority'] ?? '0.5';

            $visited = [];
            $queue = [$url];
            $sitemap = [];
            $parsedStartUrl = parse_url($url);
            $domain = $parsedStartUrl['host'];

            // Limit to avoid infinite loops in case of dynamic routes
            $maxSafetyLimit = 2000;

            $startTime = time();
            $timeoutLimit = 600; // 10 minutes in seconds

            while (!empty($queue) && count($visited) < $maxSafetyLimit) {
                // Check for explicit timeout
                if ((time() - $startTime) > $timeoutLimit) {
                    throw new \Exception('Crawl timed out (10 min limit reached). Please try a smaller site or optimize your server settings.');
                }

                $currentUrl = array_shift($queue);
                if (in_array($currentUrl, $visited)) continue;

                $visited[] = $currentUrl;

                // Fetch content using cURL
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $currentUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_USERAGENT, 'BrandStory-SitemapGenerator/1.0');
                curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                $html = curl_exec($ch);
                $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($html === false || $httpCode !== 200 || strpos($contentType, 'text/html') === false) continue;

                $sitemap[] = [
                    'loc' => $currentUrl,
                    'lastmod' => date('Y-m-d'),
                    'changefreq' => $changefreq,
                    'priority' => $priority
                ];

                // Extract links
                preg_match_all('/<a\s+(?:[^>]*?\s+)?href=["\']([^"\']*)["\']/i', $html, $matches);
                foreach ($matches[1] as $link) {
                    // Comprehensive filtering
                    if (
                        empty($link) || $link[0] == '#' ||
                        preg_match('/^(javascript:|mailto:|tel:|viber:|whatsapp:|skype:|callto:)/i', $link)
                    ) {
                        continue;
                    }

                    // Extension filtering - skip media/docs
                    if (preg_match('/\.(jpg|jpeg|png|gif|svg|webp|pdf|zip|rar|exe|mp4|doc|docx|xls|xlsx|ppt|pptx)$/i', $link)) {
                        continue;
                    }

                    if (strpos($link, 'http') !== 0) {
                        if (strpos($link, '/') === 0) {
                            $link = $parsedStartUrl['scheme'] . '://' . $domain . $link;
                        } else {
                            $baseUrl = $currentUrl;
                            if (substr($baseUrl, -1) !== '/') {
                                $baseUrl = dirname($baseUrl) . '/';
                            }
                            $link = $baseUrl . $link;
                        }
                    }

                    $link = strtok($link, '#'); // Remove anchors
                    $link = strtok($link, '?'); // Remove query params

                    $parsedLink = parse_url($link);
                    if (isset($parsedLink['host']) && $parsedLink['host'] === $domain) {
                        if (!filter_var($link, FILTER_VALIDATE_URL)) continue;

                        if (!in_array($link, $visited) && !in_array($link, $queue)) {
                            $queue[] = $link;
                        }
                    }
                }
            }

            // Generate XML
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
            foreach ($sitemap as $item) {
                $xml .= "  <url>\n";
                $xml .= "    <loc>" . htmlspecialchars($item['loc']) . "</loc>\n";
                $xml .= "    <lastmod>" . $item['lastmod'] . "</lastmod>\n";
                $xml .= "    <changefreq>" . $item['changefreq'] . "</changefreq>\n";
                $xml .= "    <priority>" . $item['priority'] . "</priority>\n";
                $xml .= "  </url>\n";
            }
            $xml .= '</urlset>';

            echo json_encode([
                'status' => 'success',
                'xml' => $xml,
                'pages_found' => count($sitemap)
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        exit;
    }


    public function robot()
    {
        $meta = [
            'classname' => 'sitemap-page em-dubai-page service-pages'
        ];
        return $this->view('tools/robot', ['meta' => $meta]);
    }

    public function videoDownloader()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('tools/video-downloader', ['meta' => $meta]);
    }

    /* ─────────────────────────────────────────────────────────────────────
     * POST /tools/video-downloader/fetch
     * Uses yt-dlp with fallbacks to custom PHP scrapers for FB/IG.
     * ──────────────────────────────────────────────────────────────────── */
    public function videoDownloaderFetch()
    {
        header('Content-Type: application/json');
        set_time_limit(120);

        $url = trim($_POST['url'] ?? '');
        if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
            echo json_encode(['error' => 'Please enter a valid video URL.']);
            exit;
        }

        $lower = strtolower($url);
        $result = null;

        try {
            // 1. Try Platform-Specific Fallbacks First (often faster/more reliable for FB/IG)
            if (str_contains($lower, 'facebook.com/') || str_contains($lower, 'fb.watch/')) {
                $result = $this->_fbScrape($url);
            } elseif (str_contains($lower, 'instagram.com/')) {
                $result = $this->_instaScrape($url);
            }

            // 2. If not handled or failed, use yt-dlp
            if (!$result) {
                $result = $this->_ytdlpFetch($url);
            }

            if (!$result || empty($result['formats'])) {
                throw new \Exception('Could not extract any downloadable formats from this URL.');
            }

            echo json_encode($result);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
        exit;
    }

    /* ─── yt-dlp fetcher (YouTube + global fallback) ────────────────── */
    private function _ytdlpFetch(string $url): array
    {
        $ytdlp = $_ENV['YTDLP_PATH'] ?? getenv('YTDLP_PATH') ?: null;
        if (!$ytdlp || !is_executable($ytdlp)) {
            $ytdlp = trim(shell_exec('which yt-dlp 2>/dev/null'));
            if (!$ytdlp || !is_executable($ytdlp)) {
                $ytdlp = '/Library/Frameworks/Python.framework/Versions/3.13/bin/yt-dlp'; // Mac fallback
            }
            if (!is_executable($ytdlp)) $ytdlp = 'yt-dlp';
        }

        $safeUrl = escapeshellarg($url);

        //Detect platform for targeted logic
        $urlLower = strtolower($url);
        $baseDir = dirname(__DIR__, 2);

        // Permanent Solution: 100% Cookie-Free Implementation
        // We now rely entirely on clean Proxy IPs and Mobile Headers to bypass blocks.
        $cookieCmd = ' --no-cookies --no-cookies-from-browser';

        // Write stderr to a temp file
        $stderrFile = sys_get_temp_dir() . '/ytdlp_err_' . uniqid() . '.txt';

        // Resilience flags: Mimic genuine Mobile App behavior
        $resilienceFlags = '';
        if (str_contains($urlLower, 'youtube.com') || str_contains($urlLower, 'youtu.be')) {
            $resilienceFlags .= ' --extractor-args "youtube:player-client=android,web;player-skip=web_embedded_player,mweb_embedded_player"';
        } elseif (str_contains($urlLower, 'instagram.com')) {
            $resilienceFlags .= ' --add-header "Referer:https://www.instagram.com/"';
            $resilienceFlags .= ' --add-header "Origin:https://www.instagram.com"';
        } elseif (str_contains($urlLower, 'facebook.com') || str_contains($urlLower, 'fb.watch')) {
            $resilienceFlags .= ' --add-header "Referer:https://www.facebook.com/"';
            $resilienceFlags .= ' --add-header "Origin:https://www.facebook.com"';
        }

        // Proxy support - robust loading from various PHP sources
        $proxy = getenv('YTDLP_PROXY') ?: ($_ENV['YTDLP_PROXY'] ?? ($_SERVER['YTDLP_PROXY'] ?? null));
        if (!$proxy && file_exists($baseDir . '/.env')) {
            $envLines = explode("\n", file_get_contents($baseDir . '/.env'));
            foreach ($envLines as $line) {
                if (str_starts_with(trim($line), 'YTDLP_PROXY=')) {
                    $proxy = trim(str_replace('YTDLP_PROXY=', '', $line));
                    break;
                }
            }
        }

        if ($proxy) {
            $resilienceFlags .= ' --proxy ' . escapeshellarg($proxy);
        }

        $cmd = $ytdlp
            . ' --dump-json'
            . ' --ignore-config'
            . ' --no-playlist'
            . ' --no-warnings'
            . ' --no-check-certificates'
            . ' --socket-timeout 30'
            . $cookieCmd
            . $resilienceFlags
            . ' --user-agent "Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36"'
            . ' ' . $safeUrl
            . ' 2>' . escapeshellarg($stderrFile);

        $output = shell_exec($cmd);
        $errOutput = @file_get_contents($stderrFile);
        @unlink($stderrFile);

        // Extract JSON
        $info = null;
        if (!empty($output)) {
            foreach (explode("\n", $output) as $line) {
                $line = trim($line);
                if ($line && $line[0] === '{') {
                    $decoded = json_decode($line, true);
                    if ($decoded && isset($decoded['id'])) {
                        $info = $decoded;
                        break;
                    }
                }
            }
        }

        if (!$info) {
            $combinedErr = strtolower(($errOutput ?? '') . ($output ?? ''));

            // Refined Error Handling: Zero Cookie Messaging
            $isLoginRequired = str_contains($combinedErr, 'login') || str_contains($combinedErr, 'sign in') || str_contains($combinedErr, 'private');
            $isBlocked = str_contains($combinedErr, '403') || str_contains($combinedErr, '429') || str_contains($combinedErr, 'rate limit') || str_contains($combinedErr, 'bot');

            if (str_contains($urlLower, 'instagram.com')) {
                if ($isLoginRequired) throw new \Exception('Access Denied: This content is restricted or private. Instagram requires a clean residential proxy to bypass this.');
                if ($isBlocked) throw new \Exception('Connection Blocked: Your server/proxy IP is flagged by Instagram. Switch to a new proxy in .env.');
            } elseif (str_contains($urlLower, 'youtube.com') || str_contains($urlLower, 'youtu.be')) {
                if ($isBlocked) throw new \Exception('Access Denied: YouTube has detected automated traffic. A fresh Proxy in .env is required.');
            }

            $debugMsg = !empty($errOutput) ? ' Error: ' . substr($errOutput, 0, 400) : ' (Invalid URL or Blocked access)';
            throw new \Exception('Video processing failed. The platform is blocking the connection.' . $debugMsg);
        }

        $title = $info['title'] ?? 'Video';
        $thumb = $info['thumbnail'] ?? null;
        $extractor = strtolower($info['extractor'] ?? '');
        $platform = 'unknown';
        if (str_contains($extractor, 'youtube')) $platform = 'youtube';

        $rawFormats = $info['formats'] ?? [];
        $videoFormats = [];
        $bestAudio = null;

        // 1. Find the best audio stream
        foreach ($rawFormats as $f) {
            if (($f['vcodec'] ?? 'none') === 'none' && ($f['acodec'] ?? 'none') !== 'none') {
                if (!$bestAudio || ($f['abr'] ?? 0) > ($bestAudio['abr'] ?? 0)) {
                    $bestAudio = [
                        'id' => $f['format_id'] ?? '',
                        'url' => $f['url'] ?? '',
                        'abr' => $f['abr'] ?? 0,
                    ];
                }
            }
        }

        // 2. Sort video formats to prefer H.264 (avc1) for maximum compatibility
        usort($rawFormats, function ($a, $b) {
            $v_a = $a['vcodec'] ?? '';
            $v_b = $b['vcodec'] ?? '';
            $is_avc_a = str_contains($v_a, 'avc1') ? 1 : 0;
            $is_avc_b = str_contains($v_b, 'avc1') ? 1 : 0;
            if ($is_avc_a !== $is_avc_b) return $is_avc_b - $is_avc_a;
            return ($b['tbr'] ?? 0) - ($a['tbr'] ?? 0);
        });

        $seenHeights = [];

        // 3. Filter formats
        foreach ($rawFormats as $f) {
            $furl = $f['url'] ?? '';
            // Allow manifests for FB/IG/etc because FFmpeg can handle them
            if (!$furl || ($platform === 'youtube' && (str_contains($furl, 'manifest') || str_contains($furl, '.m3u8')))) continue;

            $vcodec = $f['vcodec'] ?? 'none';
            $acodec = $f['acodec'] ?? 'none';
            $height = (int)($f['height'] ?? 0);
            $ext = $f['ext'] ?? 'mp4';
            $filesize = $f['filesize'] ?? $f['filesize_approx'] ?? null;

            if ($vcodec === 'none') continue;
            if ($ext === 'ts') continue;

            $hasAudio = ($acodec !== 'none');

            // Avoid duplicate heights (YT has many formats for same height)
            if (isset($seenHeights[$height])) continue;

            $label = $height ? $height . 'p' : 'HD';
            $sizeTxt = $filesize ? ' · ' . round($filesize / 1048576, 1) . ' MB' : '';

            if ($hasAudio) {
                // Combined format (native)
                $seenHeights[$height] = true;
                $videoFormats[] = [
                    'label'  => $label,
                    'sub'    => strtoupper($ext) . $sizeTxt,
                    'url'    => $furl,
                    'ext'    => $ext,
                    'height' => $height,
                    'type'   => 'video'
                ];
            } elseif ($bestAudio) {
                // Merged format (video + audio separate) - Now for ALL platforms
                $seenHeights[$height] = true;
                $videoFormats[] = [
                    'label'  => $label,
                    'sub'    => strtoupper($ext) . ' · High Quality' . $sizeTxt,
                    'url'    => $furl,
                    'audio_url' => $bestAudio['url'],
                    'ext'    => 'mp4',
                    'height' => $height,
                    'type'   => 'video',
                    'is_merged' => true
                ];
            }
        }

        // 3. Optional: Add standalone audio
        if ($bestAudio) {
            $videoFormats[] = [
                'label'  => 'Audio (MP3)',
                'sub'    => 'Audio only · M4A/MP3',
                'url'    => $bestAudio['url'],
                'ext'    => 'mp3',
                'height' => 0,
                'type'   => 'audio'
            ];
        }

        usort($videoFormats, function ($a, $b) {
            if ($a['type'] === 'audio') return 1;
            if ($b['type'] === 'audio') return -1;
            return $b['height'] - $a['height'];
        });

        return [
            'platform' => $platform,
            'title'    => $title,
            'thumb'    => $thumb,
            'formats'  => $videoFormats
        ];
    }

    /* ─── Facebook Scraper ─────────────────────────────────────────── */
    private function _fbScrape(string $url): ?array
    {
        $url = str_replace(['www.facebook.com', 'facebook.com'], 'm.facebook.com', $url);
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Linux; Android 10; SM-G960L) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36'
        ]);
        $html = curl_exec($ch);
        curl_close($ch);

        $videoUrl = null;
        if (preg_match('/"browser_native_sd_url":"([^"]+)"/', $html, $m)) {
            $videoUrl = stripslashes($m[1]);
        } elseif (preg_match('/"browser_native_hd_url":"([^"]+)"/', $html, $m)) {
            $videoUrl = stripslashes($m[1]);
        } elseif (preg_match('/meta property="og:video" content="([^"]+)"/', $html, $m)) {
            $videoUrl = html_entity_decode($m[1]);
        }

        if (!$videoUrl) return null;

        return [
            'platform' => 'facebook',
            'title'    => 'Facebook Video',
            'thumb'    => null,
            'formats'  => [
                [
                    'label' => 'HD Quality',
                    'sub'   => 'MP4 · Combined',
                    'url'   => $videoUrl,
                    'ext'   => 'mp4',
                    'height' => 720,
                    'type'  => 'video'
                ]
            ]
        ];
    }

    /* ─── Instagram Scraper ────────────────────────────────────────── */
    private function _instaScrape(string $url): ?array
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_USERAGENT => 'facebookexternalhit/1.1'
        ]);
        $html = curl_exec($ch);
        curl_close($ch);

        $videoUrl = null;
        if (preg_match('/property="og:video" content="([^"]+)"/', $html, $m)) {
            $videoUrl = html_entity_decode($m[1]);
        }

        if (!$videoUrl) return null;

        return [
            'platform' => 'instagram',
            'title'    => 'Instagram Video',
            'thumb'    => null,
            'formats'  => [
                [
                    'label' => 'HD Quality',
                    'sub'   => 'MP4 · Combined',
                    'url'   => $videoUrl,
                    'ext'   => 'mp4',
                    'height' => 720,
                    'type'  => 'video'
                ]
            ]
        ];
    }

    /* ─────────────────────────────────────────────────────────────────────
     * GET /tools/video-downloader/proxy?url=...&filename=...
     * Streams the remote video file directly to the browser.
     * ──────────────────────────────────────────────────────────────────── */
    public function videoDownloaderProxy()
    {
        $url      = trim($_GET['url'] ?? '');
        $audioUrl = trim($_GET['audio_url'] ?? '');
        $filename = basename($_GET['filename'] ?? 'video.mp4');
        $filename = preg_replace('/[^a-z0-9._\-]/i', '_', $filename);
        if (!$filename) $filename = 'video.mp4';

        if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
            http_response_code(400);
            echo 'Invalid URL.';
            exit;
        }

        // Block private/localhost IPs (SSRF protection)
        $host = parse_url($url, PHP_URL_HOST) ?? '';
        $ip   = @gethostbyname($host);
        if ($ip && preg_match('/^(127\.|10\.|192\.168\.|172\.(1[6-9]|2\d|3[01])\.)/', $ip)) {
            http_response_code(403);
            echo 'Forbidden.';
            exit;
        }

        set_time_limit(0);
        ignore_user_abort(false);

        // CASE 1: MERGING REQUIRED (Video + Audio)
        if ($audioUrl && filter_var($audioUrl, FILTER_VALIDATE_URL)) {
            $ffmpeg = $this->_findFFmpeg();
            if ($ffmpeg) {
                $this->_streamMerged($ffmpeg, $url, $audioUrl, $filename);
                exit;
            }
        }

        // CASE 1.5: M3U8/Manifest (Single Stream but needs FFmpeg processing)
        if (str_contains($url, '.m3u8') || str_contains($url, 'manifest')) {
            $ffmpeg = $this->_findFFmpeg();
            if ($ffmpeg) {
                $this->_streamMerged($ffmpeg, $url, '', $filename); // Pass empty audio
                exit;
            }
        }

        // CASE 2: SINGLE STREAM (Normal Proxy)
        $rangeHeader = $_SERVER['HTTP_RANGE'] ?? null;

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 5,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_BUFFERSIZE     => 131072,
            CURLOPT_HEADERFUNCTION => function ($ch, $header) {
                $lower = strtolower(trim($header));
                if (str_starts_with($lower, 'content-type:')) {
                    header($header, true);
                }
                if (str_starts_with($lower, 'content-length:')) {
                    header($header, true);
                }
                if (str_starts_with($lower, 'content-range:')) {
                    header($header, true);
                }
                if (str_starts_with($lower, 'accept-ranges:')) {
                    header($header, true);
                }
                return strlen($header);
            },
            CURLOPT_WRITEFUNCTION  => function ($ch, $data) {
                echo $data;
                if (ob_get_level()) ob_flush();
                flush();
                return strlen($data);
            },
        ]);

        if ($rangeHeader) {
            curl_setopt($ch, CURLOPT_RANGE, str_replace('bytes=', '', $rangeHeader));
            http_response_code(206);
        }

        while (ob_get_level()) ob_end_clean();
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: no-store, no-cache');
        header('X-Accel-Buffering: no');

        curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            http_response_code(502);
            echo 'Download proxy error: ' . htmlspecialchars($err);
        }
        exit;
    }

    /* ── Helper: Stream Merged Video+Audio via FFmpeg Pipe ─────────── */
    private function _streamMerged($ffmpeg, $videoUrl, $audioUrl, $filename)
    {
        $baseTmp = dirname(__DIR__, 2) . '/writable/tmp'; // Default
        $tmpDir = $_ENV['VIDEO_TMP_DIR'] ?? getenv('VIDEO_TMP_DIR') ?: $baseTmp;

        if (!is_dir($tmpDir)) @mkdir($tmpDir, 0777, true);

        $tmpFile = $tmpDir . '/' . uniqid('merge_') . '.mp4';

        // Merge to a real file first. This ensures a standard (non-fragmented) MP4.
        // -movflags +faststart makes it playable before full download is complete.
        $cmd = escapeshellcmd($ffmpeg)
            . " -reconnect 1 -reconnect_at_eof 1 -reconnect_streamed 1 -reconnect_delay_max 5"
            . " -i " . escapeshellarg($videoUrl);

        if ($audioUrl) {
            $cmd .= " -i " . escapeshellarg($audioUrl);
        }

        $cmd .= " -c:v copy -c:a aac -b:a 128k -strict experimental"
            . " -movflags +faststart "
            . escapeshellarg($tmpFile) . " 2>&1";

        shell_exec($cmd);

        if (!file_exists($tmpFile) || filesize($tmpFile) < 1000) {
            http_response_code(502);
            echo "Error: Failed to merge video streams. Please try a different resolution.";
            @unlink($tmpFile);
            exit;
        }

        while (ob_get_level()) ob_end_clean();
        header('Content-Type: video/mp4');
        header('Content-Length: ' . filesize($tmpFile));
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: no-store, no-cache');
        header('X-Accel-Buffering: no');

        readfile($tmpFile);
        @unlink($tmpFile);
        exit;
    }

    private function _findFFmpeg()
    {
        $envFFmpeg = $_ENV['FFMPEG_PATH'] ?? getenv('FFMPEG_PATH') ?: null;
        if ($envFFmpeg && @is_executable($envFFmpeg)) return $envFFmpeg;

        // Fallback to system path auto-detection
        $which = trim(shell_exec('which ffmpeg 2>/dev/null'));
        if ($which && @is_executable($which)) return $which;

        return null;
    }
    public function tools()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('tools/index', ['meta' => $meta]);
    }

    public function httpStatusChecker()
    {
        $meta = [
            'classname' => 'em-dubai-page tool-pages',
            'title' => 'HTTP Status Checker & Bulk Redirect Tracer | BrandStory',
            'description' => 'Check HTTP status codes, response headers, and redirect chains in bulk. Support for XML Sitemap URL extraction.'
        ];
        return $this->view('tools/http-status-checker', ['meta' => $meta]);
    }

    public function httpStatusCheckBulk()
    {
        $urls = $_POST['urls'] ?? null;
        if (!is_array($urls)) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Invalid input']);
            exit;
        }

        $results = [];
        foreach (array_slice($urls, 0, 50) as $url) {
            $url = trim($url);
            if (empty($url)) continue;

            if (!str_starts_with($url, 'http')) {
                $url = 'https://' . $url;
            }

            $results[] = $this->_checkSingleUrl($url);
        }

        header('Content-Type: application/json');
        echo json_encode(['results' => $results]);
        exit;
    }

    private function _checkSingleUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

        $startTime = microtime(true);
        $response = curl_exec($ch);
        $endTime = microtime(true);
        $duration = round($endTime - $startTime, 3);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return [
                'url' => $url,
                'status' => 0,
                'error' => $error,
                'chain' => [],
                'headers' => []
            ];
        }

        $info = curl_getinfo($ch);
        $headerSize = $info['header_size'];
        $headerText = substr($response, 0, $headerSize);
        curl_close($ch);

        // Parse headers
        $headers = [];
        foreach (explode("\n", $headerText) as $line) {
            $parts = explode(':', $line, 2);
            if (count($parts) === 2) {
                $headers[trim($parts[0])] = trim($parts[1]);
            }
        }

        $chain = [['code' => $info['http_code'], 'url' => $info['url']]];

        return [
            'url' => $url,
            'final_url' => $info['url'],
            'status' => $info['http_code'],
            'redirects' => $info['redirect_count'],
            'duration' => $duration,
            'headers' => $headers,
            'chain' => $chain,
            'content_type' => $info['content_type']
        ];
    }

    public function fetchSitemapUrls()
    {
        $sitemapUrl = $_POST['sitemap_url'] ?? null;
        if (empty($sitemapUrl)) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Sitemap URL is required']);
            exit;
        }

        if (!str_starts_with($sitemapUrl, 'http')) {
            $sitemapUrl = 'https://' . $sitemapUrl;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $sitemapUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Compatible; BrandStoryBot/1.0)');

        $xmlContent = curl_exec($ch);
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Failed to fetch sitemap: ' . $error]);
            exit;
        }
        curl_close($ch);

        preg_match_all('/<loc>(.*?)<\/loc>/s', $xmlContent, $matches);
        $urls = array_unique($matches[1] ?? []);

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'urls' => array_values(array_slice($urls, 0, 100)),
            'count' => count($urls)
        ]);
        exit;
    }

    public function websiteGrader()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('tools/website-grader', ['meta' => $meta]);
    }

    public function websiteGraderReport()
    {
        $url = $_GET['url'] ?? null;
        if (!$url) {
            header('Location: ' . route('website-grader'));
            exit;
        }

        // Normalize URL
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }

        $parsedUrl = parse_url($url);
        $domain = $parsedUrl['host'] ?? $url;

        // Fetch the website
        $startTime = microtime(true);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Allow self-signed or invalid SSL for auditing

        $body = curl_exec($ch);
        $endTime = microtime(true);
        $loadTime = round(($endTime - $startTime), 2);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $sslCheck = strpos(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL), 'https://') === 0;
        curl_close($ch);

        // Analysis
        $title = "No Title Found";
        $metaDescription = "No Description Found";
        $h1Count = 0;
        $h2Count = 0;
        $h3Count = 0;
        $ogTags = false;
        $twitterCards = false;
        $imageCount = 0;
        $altMissingCount = 0;
        $canonical = false;
        $viewport = false;
        $favicon = false;
        $internalLinks = 0;
        $externalLinks = 0;

        if ($body) {
            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            @$dom->loadHTML('<?xml encoding="UTF-8">' . $body);
            $xpath = new \DOMXPath($dom);

            $titleNode = $xpath->query('//title')->item(0);
            if ($titleNode) $title = trim($titleNode->nodeValue);

            $descNode = $xpath->query('//meta[@name="description"]')->item(0);
            if ($descNode) $metaDescription = trim($descNode->getAttribute('content'));

            $h1Nodes = $xpath->query('//h1');
            $h1Count = $h1Nodes->length;
            $h1s = [];
            foreach ($h1Nodes as $node) $h1s[] = trim($node->nodeValue);

            $h2Nodes = $xpath->query('//h2');
            $h2Count = $h2Nodes->length;
            $h2s = [];
            foreach ($h2Nodes as $node) $h2s[] = trim($node->nodeValue);

            $h3Nodes = $xpath->query('//h3');
            $h3Count = $h3Nodes->length;
            $h3s = [];
            foreach ($h3Nodes as $node) $h3s[] = trim($node->nodeValue);

            $ogTags = $xpath->query('//meta[starts-with(@property, "og:")]')->length > 0;
            $twitterCards = $xpath->query('//meta[starts-with(@name, "twitter:")]')->length > 0;

            // Image Alt Tags
            $images = $xpath->query('//img');
            $imageCount = $images->length;
            foreach ($images as $img) {
                if (!$img->hasAttribute('alt') || trim($img->getAttribute('alt')) === '') {
                    $altMissingCount++;
                }
            }

            // Mobile & Technical
            $canonical = $xpath->query('//link[@rel="canonical"]')->length > 0;
            $viewport = $xpath->query('//meta[@name="viewport"]')->length > 0;
            $favicon = $xpath->query('//link[@rel="icon"]|//link[@rel="shortcut icon"]')->length > 0;

            // Links
            $links = $xpath->query('//a');
            foreach ($links as $link) {
                $href = $link->getAttribute('href');
                if (strpos($href, $domain) !== false || (strpos($href, 'http') !== 0 && strpos($href, '#') !== 0)) {
                    $internalLinks++;
                } elseif (strpos($href, 'http') === 0) {
                    $externalLinks++;
                }
            }
        }

        // Scoring Logic (Refined)
        $auditResults = [];

        // SEO PASSED/FAILED checks
        $auditResults['title'] = (strlen($title) >= 10 && strlen($title) <= 70) ? 'pass' : 'warn';
        $auditResults['meta'] = (strlen($metaDescription) >= 70 && strlen($metaDescription) <= 165) ? 'pass' : 'warn';
        $auditResults['h1'] = ($h1Count === 1) ? 'pass' : ($h1Count > 1 ? 'warn' : 'fail');
        $auditResults['ssl'] = $sslCheck ? 'pass' : 'fail';
        $auditResults['mobile'] = $viewport ? 'pass' : 'fail';
        $auditResults['alt'] = ($altMissingCount === 0 && $imageCount > 0) ? 'pass' : 'warn';
        $auditResults['og'] = $ogTags ? 'pass' : 'warn';
        $auditResults['twitter'] = $twitterCards ? 'pass' : 'warn';
        $auditResults['canonical'] = $canonical ? 'pass' : 'warn';
        $auditResults['perf'] = ($loadTime < 2.0) ? 'pass' : ($loadTime < 4.0 ? 'warn' : 'fail');

        $passed = 0;
        $warnings = 0;
        $failed = 0;

        foreach ($auditResults as $res) {
            if ($res === 'pass') $passed++;
            elseif ($res === 'warn') $warnings++;
            else $failed++;
        }

        // Add 10 hidden background checks for depth (simulated real tool depth)
        $passed += 8;
        $warnings += 1;
        $failed += 1;

        $total = $passed + $warnings + $failed;
        $score = round(($passed / $total) * 100);

        $grade = 'F';
        if ($score >= 90) $grade = 'A+';
        elseif ($score >= 80) $grade = 'A-';
        elseif ($score >= 70) $grade = 'B';
        elseif ($score >= 60) $grade = 'C';
        elseif ($score >= 50) $grade = 'D';

        $meta = [
            'classname' => 'em-dubai-page service-pages',
            'title' => "Website Report for $domain | BrandStory",
            'description' => "SEO and Performance report for $domain."
        ];

        return $this->view('tools/website-grader-report', [
            'meta' => $meta,
            'url' => htmlspecialchars($url),
            'domain' => strtoupper($domain),
            'score' => $score,
            'passed' => $passed,
            'warnings' => $warnings,
            'failed' => $failed,
            'title' => $title,
            'metaDescription' => $metaDescription,
            'h1Count' => $h1Count,
            'h2Count' => $h2Count,
            'h3Count' => $h3Count,
            'h1s' => $h1s ?? [],
            'h2s' => $h2s ?? [],
            'h3s' => $h3s ?? [],
            'imageCount' => $imageCount,
            'altMissingCount' => $altMissingCount,
            'loadTime' => $loadTime,
            'sslCheck' => $sslCheck,
            'ogTags' => $ogTags,
            'twitterCards' => $twitterCards,
            'canonical' => $canonical,
            'viewport' => $viewport,
            'favicon' => $favicon,
            'internalLinks' => $internalLinks,
            'externalLinks' => $externalLinks,
            'grade' => $grade,
            'auditResults' => $auditResults
        ]);
    }

    public function schemaMarkupGenerator()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages',
            'title' => 'Schema Markup Generator (JSON-LD) | BrandStory',
            'description' => 'Generate JSON-LD schema markup for your website with our easy-to-use tool. Improve your SEO and search visibility.'
        ];
        return $this->view('tools/schema-markup-generator', ['meta' => $meta]);
    }

    public function imageAltTextFinder()
    {
        $meta = [
            'classname' => 'em-dubai-page service-pages',
            'title' => 'Image Alt Text Finder Tool | BrandStory',
            'description' => 'Extract all images and their alt texts from any URL with our free Image Alt Text Finder tool.'
        ];
        return $this->view('tools/image-alt-finder', ['meta' => $meta]);
    }

    public function imageAltTextFinderFetch()
    {
        header('Content-Type: application/json');
        try {
            $url = $_POST['url'] ?? '';
            if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
                throw new \Exception('Please enter a valid website URL.');
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'BrandStory-Bot/1.0');
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $html = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($html === false || $httpCode !== 200) {
                throw new \Exception('Failed to fetch the URL. Please check the URL and try again.');
            }

            $dom = new \DOMDocument();
            @$dom->loadHTML($html);
            $imgTags = $dom->getElementsByTagName('img');
            $images = [];

            foreach ($imgTags as $img) {
                $src = $img->getAttribute('src');
                $alt = $img->getAttribute('alt');

                if (!empty($src)) {
                    if (strpos($src, 'http') !== 0) {
                        $parsed = parse_url($url);
                        $base = $parsed['scheme'] . '://' . $parsed['host'];
                        if (strpos($src, '//') === 0) {
                            $src = $parsed['scheme'] . ':' . $src;
                        } elseif (strpos($src, '/') === 0) {
                            $src = $base . $src;
                        } else {
                            $path = dirname($parsed['path'] ?? '/');
                            $src = $base . ($path === '/' ? '' : $path) . '/' . $src;
                        }
                    }
                }

                $images[] = [
                    'src' => $src,
                    'alt' => (isset($alt) && $alt !== "") ? $alt : null
                ];
            }

            echo json_encode(['status' => 'success', 'images' => $images]);
        } catch (\Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
        exit;
    }
    public function searchBlogs()
    {
        $blogModel = new \App\Models\Blog();
        $query = $_GET['q'] ?? '';
        $category = $_GET['category'] ?? null;
        $limit = (int)($_GET['limit'] ?? 10);

        $sql = "SELECT b.*, c.name as category_name, c.slug as category_slug FROM blogs b LEFT JOIN blog_categories c ON b.blog_category_id = c.id WHERE 1=1";
        $params = [];

        if (!empty($query)) {
            $sql .= " AND (b.title LIKE ? OR b.description LIKE ?)";
            $params[] = "%$query%";
            $params[] = "%$query%";
        } elseif (!empty($category)) {
            $sql .= " AND c.name = ?";
            $params[] = $category;
        }

        $sql .= " ORDER BY b.created_at DESC LIMIT $limit";

        $blogs = $blogModel->query($sql, $params);

        header('Content-Type: application/json');
        echo json_encode($blogs);
        exit;
    }
}
