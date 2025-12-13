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

        $sql .= " ORDER BY b.id DESC";

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

        $meta = [
            'classname' => 'new-blogs-single-page'

        ];

        return $this->view('blogs/blog-details', ['meta' => $meta, 'blog' => $blog]);
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
        $meta = [];
        return $this->view('services/seo-services-company-in-dubai', ['meta' => $meta]);
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



    //  industries
    public function realEstateMerketingServices()
    {
        $meta = [
            'classname' => 'industry-page'
        ];
        return $this->view('industries/real-estate-marketing-services', ['meta' => $meta]);
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



    // case studies 

    public function casestudies()
    {
        $meta = [
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/index', ['meta' => $meta]);
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
            'classname' => 'industry-page'
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
            'classname' => 'industry-page'
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
        return $this->view('others-pages/seo-services-in-dubai', ['meta' => $meta]);
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

        // Gather form data
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $country = trim($_POST['country'] ?? '');
        $country_code = trim($_POST['country_code'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $company = trim($_POST['company'] ?? '');
        $designation = trim($_POST['designation'] ?? '');
        $services = isset($_POST['services']) && is_array($_POST['services']) ? implode(", ", $_POST['services']) : '';
        $budget = trim($_POST['budget'] ?? '');
        $message = trim($_POST['message'] ?? '');
        $httpReferer = $_SERVER['HTTP_REFERER'] ?? '';
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
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'leads@brandstory.in';
            $mail->Password   = 'orobhktghruvofbg'; // TODO: Move to environment variable
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Email settings
            $mail->setFrom('info@brandstory.ae', 'BrandStory AE');
            $mail->addAddress('tapas@brandstory.in');
            $mail->addCC('supriyo@brandstory.in');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $emailBody;
            $mail->AltBody = strip_tags($emailBody);

            $mail->send();

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
                '75,000 - 2 Lakhs',
                '2 Lakhs - 5 Lakhs',
                '5 Lakhs - 8 Lakhs',
                '8 Lakhs - 10 Lakhs',
                'Above 10 Lakhs'
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
            $curlError = curl_error($ch);
            curl_close($ch);

            // Output JSON response
            if ($curlError) {
                echo json_encode(["status" => "error", "message" => $curlError]);
            } else {
                echo json_encode(["status" => "success", "message" => "Form submitted successfully!", "monday_response" => json_decode($response)]);
            }
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            echo json_encode(["status" => "error", "message" => "Email error: " . $mail->ErrorInfo]);
        } catch (\Exception $e) {
            echo json_encode(["status" => "error", "message" => "Server error: " . $e->getMessage()]);
        }
    }
}
