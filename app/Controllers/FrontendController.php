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
    public function about()
    {
        $meta = [];
        return $this->view('about', ['meta' => $meta]);
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

    public function blogs()
    {
        $blogModel = new \App\Models\Blog();
        $categoryModel = new \App\Models\BlogCategory();

        $categorySlug = $_GET['category'] ?? null;
        $sql = "SELECT b.*, c.name as category_name, c.slug as category_slug FROM blogs b LEFT JOIN blog_categories c ON b.blog_category_id = c.id";
        $params = [];

        if ($categorySlug) {
            $sql .= " WHERE c.slug = ?";
            $params[] = $categorySlug;
        }

        $sql .= " ORDER BY b.created_at DESC";

        $blogs = $blogModel->query($sql, $params);
        $categories = $categoryModel->findAll();

        $meta = [];
        return $this->view('blogs/index', ['meta' => $meta, 'blogs' => $blogs, 'categories' => $categories]);
    }
    public function blogDetail($slug)
    {
        $blogModel = new \App\Models\Blog();

        $result = $blogModel->query("SELECT * FROM blogs WHERE slug = ? LIMIT 1", [$slug]);

        if (empty($result)) {
            return $this->notfound();
        }

        $blog = $result[0];

        // Fetch related blogs (exclude current, limit 4)
        $related_blogs = $blogModel->query("SELECT * FROM blogs WHERE slug != ? ORDER BY created_at DESC LIMIT 6", [$slug]);

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
    public function seoServicesDubai()
    {
        $meta = [
            'classname' => 'seo-pillar-page'
        ];
        return $this->view('services/seo-services-in-dubai', ['meta' => $meta]);
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
    public function conversionRateOptimizationAgencyDubai()
    {
        $meta = [];
        return $this->view('services/conversion-rate-optimization-agency-dubai', ['meta' => $meta]);
    }


    //  industries
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
    public function leadingconsultingfirmbranding()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/leading-consulting-firm-branding', ['meta' => $meta]);
    }
    public function leadingconsultingfirmwebsite()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/leading-consulting-firm-website', ['meta' => $meta]);
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

    public function seoagenciesindubai()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agencies-in-dubai', ['meta' => $meta]);
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

    public function aeoAgencyDubai()
    {
        $meta = [
            'classname' => 'dm-agency-dubai'
        ];
        return $this->view('others-pages/aeo-agency-dubai', ['meta' => $meta]);
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
            $boardId = '2040169984';
            $groupId = 'group_mkx15g65';
            $itemName = $name . " | " . $company;

            // Map Services Dropdown
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
            $serviceDropdown = !empty($selectedServices) ? ["labels" => $selectedServices] : null;

            // Budget Dropdown
            $validBudgets = [
                'AED 3000 - 5000',
                'AED 5000 - 10000',
                'AED 10000 - 15000',
                'AED 15000 - 20000',
                'Above AED 20000'
            ];
            $budgetDropdown = in_array($budget, $validBudgets) ? ["labels" => [$budget]] : null;

            // Build Column Values
            $columnValues = [
                "lead_company" => $company ?: null,
                "lead_status" => ["label" => "Unassigned"],
                "lead_owner" => null,
                "lead_email" => ["email" => $email, "text" => $email],
                "lead_phone" => ["phone" => $country_code . $phone],
                "dropdown_mksymde0" => $serviceDropdown,
                "dropdown_mkt3d3zq" => $budgetDropdown,
                "color_mksy4wnf" => ["label" => "No Remarks"],
                "long_text_mkspy9pz" => $message ?: null,
                "long_text_mkssakn4" => "Website",
                "long_text_mksp87pv" => $actualLink,
                "long_text_mkt2d6j" => $designation ?: null,
                "date_mkspj6x" => null
            ];

            // Encode JSON safely
            $columnValuesJson = json_encode($columnValues, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            $escapedColumnValues = addslashes($columnValuesJson);

            // Build GraphQL Query
            $query = 'mutation {
                create_item (
                    board_id: "' . $boardId . '",
                    group_id: "' . $groupId . '",
                    item_name: "' . addslashes($itemName) . '",
                    column_values: "' . $escapedColumnValues . '"
                ) {
                    id
                }
            }';

            // Send Request to Monday.com
            $postData = json_encode(["query" => $query]);

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

            // Output JSON response
            if ($curlError) {
                echo json_encode(["status" => "error", "message" => $curlError]);
            } else {
                echo json_encode([
                    "status" => "success",
                    "message" => "Form submitted successfully!",
                    "redirect_url" => route('thankyou')
                ]);
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

        // Rate Limiting (1 submission per 60 seconds)
        if (!empty($_SESSION['last_career_submission_time']) && (time() - $_SESSION['last_career_submission_time'] < 60)) {
            echo json_encode(["status" => "error", "message" => "Please wait a minute before submitting again."]);
            return;
        }
        $_SESSION['last_career_submission_time'] = time();

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
            $boardId = '2040169984';
            $groupId = 'group_mkx15g65';
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
}
