<?php

namespace App\Controllers;

use App\Core\Controller;

class FrontendController extends Controller
{

    public function notfound()
    {
        http_response_code(404);
        $meta = [
            'title' => '404 - Page Not Found',
            'description' => 'The page you are looking for does not exist.'
        ];
        return $this->view('404', ['meta' => $meta]);
    }
    public function index()
    {
        $meta = [
            'title' => 'BrandStoryAE — Home',
            'description' => 'BrandStoryAE — Creative digital agency.',
            "classname" => 'dm-agency-dubai'
        ];
        return $this->view('home', ['meta' => $meta]);
    }
    public function about()
    {
        $meta = [
            'title' => 'About BrandStoryAE',
            'description' => 'About our creative agency and services.'
        ];
        return $this->view('about', ['meta' => $meta]);
    }

    public function contat()
    {
        $meta = [
            'title' => 'Contact Us - BrandStoryAE',
            'description' => 'Contact us for any inquiries.',
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

        $meta = [
            'title' => 'Latest Blogs | Digital Marketing Insights & Trends',
            'description' => 'Here are the latest tips and tricks of digital marketing techniques learn now'
        ];
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
            'title' => $blog['title'],
            'description' => substr(strip_tags($blog['description']), 0, 160),
            'classname' => 'new-blogs-single-page'

        ];

        return $this->view('blogs/blog-details', ['meta' => $meta, 'blog' => $blog]);
    }

    public function services()
    {
        $meta = [
            'title' => 'Our Services - BrandStoryAE',
            'description' => 'Discover the services offered by BrandStoryAE.'
        ];
        return $this->view('services', ['meta' => $meta]);
    }
    // service 
    public function socialMediaMarketingDubai()
    {
        $meta = [
            'title' => 'Our Services - BrandStoryAE',
            'description' => 'Discover the services offered by BrandStoryAE.'
        ];
        return $this->view('services/social-media-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function seoServicesDubai()
    {
        $meta = [
            'title' => 'SEO Services Company in Dubai - BrandStoryAE',
            'description' => 'Explore our SEO services designed to boost your online presence and drive organic traffic.'
        ];
        return $this->view('services/seo-services-company-in-dubai', ['meta' => $meta]);
    }
    public function brandAgencyDubai()
    {
        $meta = [
            'title' => 'Branding Agency in Dubai - BrandStoryAE',
            'description' => 'Learn about our branding services that help businesses establish a strong and memorable identity.'
        ];
        return $this->view('services/branding-agency-in-dubai', ['meta' => $meta]);
    }
    public function websiteDesignDubai()
    {
        $meta = [
            'title' => 'Website Design Company in Dubai - BrandStoryAE',
            'description' => 'Discover our website design services that create visually appealing and user-friendly websites.'
        ];
        return $this->view('services/website-design-company-in-dubai', ['meta' => $meta]);
    }
    public function fullFunnelPerformanceMarketing()
    {
        $meta = [
            'title' => 'Full Funnel Performance Marketing - BrandStoryAE',
            'description' => 'Explore our full funnel performance marketing services designed to drive conversions and maximize ROI.',
            'classname' => 'full-funnel-page service-page'
        ];
        return $this->view('services/full-funnel-performance-marketing', ['meta' => $meta]);
    }
    public function emailMarketingDubai()
    {
        $meta = [
            'title' => 'Email Marketing Company in Dubai - BrandStoryAE',
            'description' => 'Discover our email marketing services that help businesses engage with their audience and drive conversions.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('services/email-marketing-company-in-dubai', ['meta' => $meta]);
    }

    public function payPerClickServicesDubai()
    {
        $meta = [
            'title' => 'PPC Services in Dubai - BrandStoryAE',
            'description' => 'Explore our PPC services designed to boost your online visibility and drive targeted traffic to your website.',
            'classname' => 'dm-page service-page ppc'
        ];
        return $this->view('services/pay-per-click-ppc-services-in-dubai', ['meta' => $meta]);
    }

    public function videoMarketingDubai()
    {
        $meta = [
            'title' => 'Video Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Explore our video marketing services designed to engage your audience and drive conversions.',
            'classname' => 'dm-page'
        ];
        return $this->view('services/video-marketing-agency-dubai', ['meta' => $meta]);
    }
    public function facebookMarketingDubai()
    {
        $meta = [
            'title' => 'Facebook Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Facebook marketing services that help businesses reach and engage their target audience effectively.',
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/facebook-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function instagramMarketingDubai()
    {
        $meta = [
            'title' => 'Instagram Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Instagram marketing services that help businesses reach and engage their target audience effectively.',
            'classname' => 'em-dubai-page service-pages'

        ];
        return $this->view('services/instagram-advertising-agency-in-dubai', ['meta' => $meta]);
    }
    public function twitterMarketingDubai()
    {
        $meta = [
            'title' => 'Twitter Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Twitter marketing services that help businesses reach and engage their target audience effectively.',
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/twitter-advertising-dubai', ['meta' => $meta]);
    }
    public function pinterestMarketingDubai()
    {
        $meta = [
            'title' => 'Pinterest Marketing Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Pinterest marketing services that help businesses reach and engage their target audience effectively.',
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/pinterest-advertising-services-in-dubai', ['meta' => $meta]);
    }
    public function tiktokMarketingDubai()
    {
        $meta = [
            'title' => 'TikTok Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our TikTok marketing services that help businesses reach and engage their target audience effectively.',
            'classname' => 'em-dubai-page service-pages'
        ];
        return $this->view('services/tiktok-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function seoAuditServicesInDubai()
    {
        $meta = [
            'title' => 'SEO Audit Services in Dubai - BrandStoryAE',
            'description' => 'Discover our SEO Audit services designed to boost your online presence and drive organic traffic.',
            'classname' => 'redes-page service-page'
        ];
        return $this->view('services/seo-audit-services-in-dubai', ['meta' => $meta]);
    }
    public function onlineReputationManagementServicesInDubai()
    {
        $meta = [
            'title' => 'Online Reputation Management Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Online Reputation Management services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('services/online-reputation-management-services-in-dubai', ['meta' => $meta]);
    }
    public function contentMarketingAgencyDubai()
    {
        $meta = [
            'title' => 'Content Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Content Marketing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('services/content-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function uiuxDesignCompanyInDubai()
    {
        $meta = [
            'title' => 'Best UI/UX Design Agency in Dubai | UI UX Design Company in Dubai | Leading UI UX Companies in Dubai | Top UX Agency Dubai | UX Design Companies in Dubai | Brandstory',
            'description' => 'BrandStory UAE is a leading UI/UX design agency in Dubai, crafting innovative, user-centric digital solutions to elevate your brand. Get in touch for top-notch UI/UX designs that drive results!',
            'classname' => 'ui-ux-new-test'
        ];
        return $this->view('services/ui-ux-design-company-in-dubai', ['meta' => $meta]);
    }
    public function logoDesigningDubai()
    {
        $meta = [
            'title' => 'Logo Designing Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Logo Designing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/logo-designing-company-in-dubai', ['meta' => $meta]);
    }
    public function creativeAdvertisingAgencyDubai()
    {
        $meta = [
            'title' => 'Creative Advertising Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Creative Advertising services designed to boost your online presence and drive organic traffic.',
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/creative-advertising-agency-in-dubai', ['meta' => $meta]);
    }

    public function wordpressDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'WordPress Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our WordPress Development services designed to boost your online presence and drive organic traffic.',
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/wordpress-development-company-in-dubai', ['meta' => $meta]);
    }
    public function megentoWebsiteDevelopmentDubai()
    {
        $meta = [
            'title' => 'Megento Website Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Megento Website Development services designed to boost your online presence and drive organic traffic.',
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/magento-website-development-dubai', ['meta' => $meta]);
    }
    public function durpalWebsiteDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'Durpal Website Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Durpal Website Development services designed to boost your online presence and drive organic traffic.',
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/drupal-website-development-company-in-dubai', ['meta' => $meta]);
    }
    public function ecommerceDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'Ecommerce Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Ecommerce Development services designed to boost your online presence and drive organic traffic.',
            'classname' => 'dm-page service-page'
        ];
        return $this->view('services/ecommerce-development-company-dubai', ['meta' => $meta]);
    }



    //  industries
    public function realEstateMerketingServices()
    {
        $meta = [
            'title' => 'Real Estate Marketing Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Real Estate Marketing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('industries/real-estate-marketing-services', ['meta' => $meta]);
    }
    public function ecommerceMarketingServices()
    {
        $meta = [
            'title' => 'Ecommerce Marketing Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Ecommerce Marketing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('industries/e-commerce-marketing-service', ['meta' => $meta]);
    }
    public function healthcareMarketingServices()
    {
        $meta = [
            'title' => 'Healthcare Marketing Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Healthcare Marketing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('industries/healthcare-marketing-services', ['meta' => $meta]);
    }
    public function educationMarketingServices()
    {
        $meta = [
            'title' => 'Education Marketing Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Education Marketing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('industries/education-marketing-services', ['meta' => $meta]);
    }
    public function b2bCorporateMarketingServices()
    {
        $meta = [
            'title' => 'B2B Corporate Marketing Services in Dubai - BrandStoryAE',
            'description' => 'Discover our B2B Corporate Marketing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('industries/b2b-corporate-marketing-services', ['meta' => $meta]);
    }
    public function travelAgencyMarketingServices()
    {
        $meta = [
            'title' => 'Travel Agency Management Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Travel Agency Management services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('industries/travel-agency-marketing-services', ['meta' => $meta]);
    }



    // case studies 

    public function casestudies()
    {
        $meta = [
            'title' => 'Latest Case Studies | Digital Marketing Company in Dubai',
            'description' => 'Latest Case Studies | Digital Marketing Company in Dubai',
            'classname' => 'main-cs-pg'
        ];
        return $this->view('case-study/index', ['meta' => $meta]);
    }

    // others pages
    public function b2bCompanyInDubai()
    {
        $meta = [
            'title' => 'B2B Company in Dubai - BrandStoryAE',
            'description' => 'Discover our B2B Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/b2b-company-in-dubai', ['meta' => $meta]);
    }
    public function contentWritingCompanyInDubai()
    {
        $meta = [
            'title' => 'Content Writing Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Content Writing services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/content-writing-company-in-dubai', ['meta' => $meta]);
    }

    public function corporateEventManagementCompanyInDubai()
    {
        $meta = [
            'title' => 'Corporate Event Management Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Corporate Event Management services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-event-management-company-in-dubai', ['meta' => $meta]);
    }
    public function corporateEventPlannersInDubai()
    {
        $meta = [
            'title' => 'Corporate Event Planners in Dubai - BrandStoryAE',
            'description' => 'Discover our Corporate Event Planners services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-event-planners-in-dubai', ['meta' => $meta]);
    }
    public function corporatePhotographersInAlAin()
    {
        $meta = [
            'title' => 'Corporate Photographers in Al Ain - BrandStoryAE',
            'description' => 'Discover our Corporate Photographers services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-al-ain', ['meta' => $meta]);
    }
    public function corporatePhotographersInFujairah()
    {
        $meta = [
            'title' => 'Corporate Photographers in Fujairah - BrandStoryAE',
            'description' => 'Discover our Corporate Photographers services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-fujairah', ['meta' => $meta]);
    }

    public function corporatePhotographersInRasAlKhaimah()
    {
        $meta = [
            'title' => 'Corporate Photographers in Ras Al Khaimah - BrandStoryAE',
            'description' => 'Discover our Corporate Photographers services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function corporatePhotographersInUmmAlQuwain()
    {
        $meta = [
            'title' => 'Corporate Photographers in Umm Al Quwain - BrandStoryAE',
            'description' => 'Discover our Corporate Photographers services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photographers-in-umm-al-quwain', ['meta' => $meta]);
    }
    public function corporatePhotographyInAbuDhabi()
    {
        $meta = [
            'title' => 'Corporate Photography in Abu Dhabi - BrandStoryAE',
            'description' => 'Discover our Corporate Photography services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-abu-dhabi', ['meta' => $meta]);
    }

    public function corporatePhotographyInDubai()
    {
        $meta = [
            'title' => 'Corporate Photography in Dubai - BrandStoryAE',
            'description' => 'Discover our Corporate Photography services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-dubai', ['meta' => $meta]);
    }
    public function corporatePhotographyInSaudiArabia()
    {
        $meta = [
            'title' => 'Corporate Photography in Saudi Arabia - BrandStoryAE',
            'description' => 'Discover our Corporate Photography services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-saudi-arabia', ['meta' => $meta]);
    }
    public function corporatePhotographyInSharjah()
    {
        $meta = [
            'title' => 'Corporate Photography in Sharjah - BrandStoryAE',
            'description' => 'Discover our Corporate Photography services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-photography-in-sharjah', ['meta' => $meta]);
    }
    public function corporateVideoProductionAgencyInSaudiArabia()
    {
        $meta = [
            'title' => 'Corporate Video Production Agency in Saudi Arabia - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-agency-in-saudi-arabia', ['meta' => $meta]);
    }
    public function corporateVideoProductionCompanyInAbuDhabi()
    {
        $meta = [
            'title' => 'Corporate Video Production Company in Abu Dhabi - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function corporateVideoProductionCompanyInAlAin()
    {
        $meta = [
            'title' => 'Corporate Video Production Company in Al Ain - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-al-ain', ['meta' => $meta]);
    }

    public function corporateVideoProductionCompanyInFujairah()
    {
        $meta = [
            'title' => 'Corporate Video Production Company in Fujairah - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-fujairah', ['meta' => $meta]);
    }

    public function corporateVideoProductionCompanyInSharjah()
    {
        $meta = [
            'title' => 'Corporate Video Production Company in Sharjah - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-sharjah', ['meta' => $meta]);
    }
    public function corporateVideoProductionCompanyInUmmAlQuwain()
    {
        $meta = [
            'title' => 'Corporate Video Production Company in Umm Al Quwain - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-company-in-umm-al-quwain', ['meta' => $meta]);
    }

    public function corporateVideoProductionInAjman()
    {
        $meta = [
            'title' => 'Corporate Video Production in Ajman - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-in-ajman', ['meta' => $meta]);
    }
    public function corporateVideoProductionInRasAlKhaimah()
    {
        $meta = [
            'title' => 'Corporate Video Production in Ras Al Khaimah - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function corporateVideoProductionServicesInDubai()
    {
        $meta = [
            'title' => 'Corporate Video Production Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Corporate Video Production Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/corporate-video-production-services-in-dubai', ['meta' => $meta]);
    }
    public function creativeAdvertisingAgencyInAbuDhabi()
    {
        $meta = [
            'title' => 'Creative Advertising Agency in Abu Dhabi - BrandStoryAE',
            'description' => 'Discover our Creative Advertising Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/creative-advertising-agency-in-abu-dhabi', ['meta' => $meta]);
    }

    public function cryptocurrencyMarketingAgencyDubai()
    {
        $meta = [
            'title' => 'Cryptocurrency Marketing Agency Dubai - BrandStoryAE',
            'description' => 'Discover our Cryptocurrency Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/cryptocurrency-marketing-agency-dubai', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinabudhabi()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Abu Dhabi - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-abu-dhabi', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinajman()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Ajman - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-ajman', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinalain()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Al Ain - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-al-ain', ['meta' => $meta]);
    }
    public function digitalmarketingagencyindubaiuae()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-dubai-uae', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinfujairah()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Fujairah - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-fujairah', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinarasalkhaimah()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Ras Al Khaimah - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-ras-al-khaimah', ['meta' => $meta]);
    }

    public function digitalmarketingagencyinsharjah()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Sharjah - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-sharjah', ['meta' => $meta]);
    }
    public function digitalmarketingagencyinummalquwain()
    {
        $meta = [
            'title' => 'Digital Marketing Agency in Umm Al Quwain - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Agency services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/digital-marketing-agency-in-umm-al-quwain', ['meta' => $meta]);
    }

    public function ecommercwebdevelopmentservices()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ecommerce-web-development-services', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinajman()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-ajman', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinalquwain()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-al-quwain', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinfujairah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-fujairah', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinrasalkhaimah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinsharjah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-sharjah', ['meta' => $meta]);
    }
    public function emailmarketingcompanyinummalquwain()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/email-marketing-company-in-umm-al-quwain', ['meta' => $meta]);
    }
    public function eventphotographyindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/event-photography-in-dubai', ['meta' => $meta]);
    }
    public function eventvideoproductioncompanyindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/event-video-production-company-in-dubai', ['meta' => $meta]);
    }
    public function googlepenaltyrecoveryservicesindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/google-penalty-recovery-services-in-dubai', ['meta' => $meta]);
    }
    public function graphicdesigncompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/graphic-design-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function instagramadvertisingagencyindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/instagram-advertising-agency-in-dubai', ['meta' => $meta]);
    }
    public function mobileappdevelopmentcompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/mobile-app-development-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function mobileappdevelopmentindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/mobile-app-development-in-dubai', ['meta' => $meta]);
    }
    public function mobileappmarketingdubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/mobile-app-marketing-dubai', ['meta' => $meta]);
    }
    public function performancemarketing()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/performance-marketing', ['meta' => $meta]);
    }
    public function ppccompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ppc-company-in-abu-dhabi', ['meta' => $meta]);
    }
    public function pragencydubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/pr-agency-dubai', ['meta' => $meta]);
    }
    public function pragencyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/pr-agency-in-abu-dhabi', ['meta' => $meta]);
    }
    public function privacypolicy()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/privacy-policy', ['meta' => $meta]);
    }
    public function quoramarketing()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/quora-marketing', ['meta' => $meta]);
    }
    public function retailmarketingagencydubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/retail-marketing-agency-dubai', ['meta' => $meta]);
    }

    public function seoagenciesindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agencies-in-dubai', ['meta' => $meta]);
    }

    public function seoagencyadenyemen()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-aden-yemen', ['meta' => $meta]);
    }

    public function seoagencyalkhobarsaudiarabia()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-al-khobar-saudi-arabia', ['meta' => $meta]);
    }

    public function seoagencyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-abu-dhabi', ['meta' => $meta]);
    }
    public function seoagencyinajman()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-ajman', ['meta' => $meta]);
    }

    public function seoagencyinbaghdad()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-baghdad', ['meta' => $meta]);
    }

    public function seoagencyincairo()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-cairo', ['meta' => $meta]);
    }

    public function seoagencyinfujairah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-fujairah', ['meta' => $meta]);
    }

    public function seoagencyinaraskhaimah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-ras-al-khaimah', ['meta' => $meta]);
    }
    public function seoagencyinsalalah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-salalah', ['meta' => $meta]);
    }
    public function seoagencyinsharjah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-sharjah', ['meta' => $meta]);
    }

    public function seoagencyinummalquwain()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-in-umm-al-quwain', ['meta' => $meta]);
    }

    public function seoagencykuwaitcity()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-agency-kuwait-city', ['meta' => $meta]);
    }

    public function seocompanyinadenyemen()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-aden-yemen', ['meta' => $meta]);
    }

    public function seocompanyinalepposyria()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-aleppo-syria', ['meta' => $meta]);
    }

    public function seocompanyindhahranksa()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-dhahran-ksa', ['meta' => $meta]);
    }
    public function seocompanyinkhorfakken()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-in-khor-fakken', ['meta' => $meta]);
    }

    public function seocompanyjordan()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-company-jordan', ['meta' => $meta]);
    }
    public function seoinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-abu-dhabi', ['meta' => $meta]);
    }
    public function seoinalkhobarsaudiarabia()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-al-khobar-saudi-arabia', ['meta' => $meta]);
    }

    public function seoinbahrain()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-bahrain', ['meta' => $meta]);
    }

    public function seoindammam()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-dammam', ['meta' => $meta]);
    }

    public function seoindhahranksa()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-dhahran-ksa', ['meta' => $meta]);
    }


    public function seoinhawallykuwait()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-hawally-kuwait', ['meta' => $meta]);
    }
    public function seoinjeddah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-jeddah', ['meta' => $meta]);
    }
    public function seoinjordan()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-jordan', ['meta' => $meta]);
         }
         public function seoinkuwait()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-kuwait', ['meta' => $meta]);
         }
         public function seoinmeccasaudiarabia()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-mecca-saudi-arabia', ['meta' => $meta]);
         }
         public function seoinmedinasaudiarabia()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-medina-saudi-arabia', ['meta' => $meta]);
         }
         public function seoinmuscat()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-muscat', ['meta' => $meta]);
         }
         public function seoinqatar()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-qatar', ['meta' => $meta]);
         }
         public function seoinriyadh()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-riyadh', ['meta' => $meta]);
         }
         public function seoinsaudiarabia()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-in-saudi-arabia', ['meta' => $meta]);
         }
         public function seopageone()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-page-one', ['meta' => $meta]);
         }
         public function seoservicescompanyindubaidevoldd()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-company-in-dubai-dev-oldd', ['meta' => $meta]);
         }
         public function seoservicesindhahran()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-in-dhahran', ['meta' => $meta]);
         }
         public function seoservicescompanyindubaiNov()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-company-in-dubaiNov25', ['meta' => $meta]);
         }
public function seoservicescompanyindubaitest()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-company-in-dubai-test-2', ['meta' => $meta]);
         }
         public function seoservicesindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-in-dubai', ['meta' => $meta]);
         }
         public function seoservicesinmeccasaudiarabia()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-in-mecca-saudi-arabia', ['meta' => $meta]);
         }
         public function seoservicesmanama()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-manama', ['meta' => $meta]);
         }
         public function seoservicessalalah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/seo-services-salalah', ['meta' => $meta]);
         }
        public function smsmarketingdubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/sms-marketing-dubai', ['meta' => $meta]);
         }
         public function socialmediamarketingcompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/social-media-marketing-company-in-abu-dhabi', ['meta' => $meta]);
         }
         public function startwithfullfunnelperformancemarketing()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/start-with-full-funnel-performance-marketing', ['meta' => $meta]);
         }
         public function technologycontentwritingcompanyindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/technology-content-writing-company-in-dubai', ['meta' => $meta]);
         }
         public function termsandconditions()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/terms-and-conditions', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-abu-dhabi', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyinajman()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-ajman', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyinalain()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-al-ain', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyindubaiold()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-dubai-old', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyinfujairah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-fujairah', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyinrasalkhaimah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-ras-al-khaimah', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyinsharjah()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-sharjah', ['meta' => $meta]);
         }
         public function uiuxdesigncompanyinummalquwain()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/ui-ux-design-company-in-umm-al-quwain', ['meta' => $meta]);
         }
         public function websitedesigncompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/website-design-company-in-abu-dhabi', ['meta' => $meta]);
         }
         public function websitedesigncompanyindubaiNov()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/website-design-company-in-dubai-Nov25', ['meta' => $meta]);
         }
         public function websitedevelopmentcompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/website-development-company-in-abu-dhabi', ['meta' => $meta]);
         }
         public function websitemaintenancecompanyinabudhabi()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/website-maintenance-company-in-abu-dhabi', ['meta' => $meta]);
         }
         public function whatsappmarketingindubai()
    {
        $meta = [
            'title' => 'Ecommerce Web Development Services - BrandStoryAE',
            'description' => 'Discover our Ecommerce Web Development Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'industry-page'
        ];
        return $this->view('others-pages/whatsapp-marketing-in-dubai', ['meta' => $meta]);
         }
    //development pages
    public function androidAppDevelopmentCompanyDubai()
    {
        $meta = [
            'title' => 'Android App Development Company Dubai - BrandStoryAE',
            'description' => 'Discover our Android App Development Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/android-app-development-company-dubai', ['meta' => $meta]);
    }
    public function crossPlatformAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'Cross Platform App Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Cross Platform App Development Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/cross-platform-app-development-company-in-dubai', ['meta' => $meta]);
    }

    public function flutterAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'Flutter App Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Flutter App Development Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/flutter-app-development-company-in-dubai', ['meta' => $meta]);
    }
    public function hybridAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'Hybrid App Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Hybrid App Development Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/hybrid-app-development-company-in-dubai', ['meta' => $meta]);
    }
    public function iosAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'iOS App Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our iOS App Development Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/ios-app-development-company-in-dubai', ['meta' => $meta]);
    }
    public function reactNativeAppDevelopmentCompanyInDubai()
    {
        $meta = [
            'title' => 'React Native App Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our React Native App Development Company services designed to boost your online presence and drive organic traffic.',
            'classname' => 'em-dubai-page service-page'
        ];
        return $this->view('development/react-native-app-development-company-in-dubai', ['meta' => $meta]);
    }

    // bahrain pages
    public function b2bMarketingServices()
    {
        $meta = [
            'title' => 'B2B Marketing Services - BrandStoryAE',
            'description' => 'Discover our B2B Marketing Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/b2b-marketing-services', ['meta' => $meta]);
    }
    public function contentWritingServices()
    {
        $meta = [
            'title' => 'Content Writing Services - BrandStoryAE',
            'description' => 'Discover our Content Writing Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/content-writing-services', ['meta' => $meta]);
    }
    public function digitalMarketingServices()
    {
        $meta = [
            'title' => 'Digital Marketing Services - BrandStoryAE',
            'description' => 'Discover our Digital Marketing Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/digital-marketing-services', ['meta' => $meta]);
    }
    public function emailMarketingServices()
    {
        $meta = [
            'title' => 'Email Marketing Services - BrandStoryAE',
            'description' => 'Discover our Email Marketing Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/email-marketing-services', ['meta' => $meta]);
    }
    public function ppcServices()
    {
        $meta = [
            'title' => 'PPC Services - BrandStoryAE',
            'description' => 'Discover our PPC Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/ppc-services', ['meta' => $meta]);
    }
    public function prServices()
    {
        $meta = [
            'title' => 'PR Services - BrandStoryAE',
            'description' => 'Discover our PR Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/pr-services', ['meta' => $meta]);
    }
    public function seoServices()
    {
        $meta = [
            'title' => 'SEO Services - BrandStoryAE',
            'description' => 'Discover our SEO Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/seo-services', ['meta' => $meta]);
    }
    public function socialMediaMarketingServices()
    {
        $meta = [
            'title' => 'Social Media Marketing Services - BrandStoryAE',
            'description' => 'Discover our Social Media Marketing Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/social-media-marketing-services', ['meta' => $meta]);
    }
    public function uiUxDesignServices()
    {
        $meta = [
            'title' => 'UI UX Design Services - BrandStoryAE',
            'description' => 'Discover our UI UX Design Services services designed to boost your online presence and drive organic traffic.',
            'classname' => 'bahrain-page'
        ];
        return $this->view('bahrain/ui-ux-design-services', ['meta' => $meta]);
    }
    public function websiteDesignAndDevelopmentServices()
    {
        $meta = [
            'title' => 'Website Design and Development Services - BrandStoryAE',
            'description' => 'Discover our Website Design and Development Services services designed to boost your online presence and drive organic traffic.',
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
