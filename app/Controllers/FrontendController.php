<?php
namespace App\Controllers;

use App\Core\Controller;

class FrontendController extends Controller
{
    public function notfound(){
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
    public function socialMediaMarketingDubai()
    {
        $meta = [
            'title' => 'Our Services - BrandStoryAE',
            'description' => 'Discover the services offered by BrandStoryAE.'
        ];
        return $this->view('services/social-media-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function seoServicesDubai(){
        $meta = [
            'title' => 'SEO Services Company in Dubai - BrandStoryAE',
            'description' => 'Explore our SEO services designed to boost your online presence and drive organic traffic.'
        ];
        return $this->view('services/seo-services-company-in-dubai', ['meta' => $meta]);
    }
    public function brandAgencyDubai(){
        $meta = [
            'title' => 'Branding Agency in Dubai - BrandStoryAE',
            'description' => 'Learn about our branding services that help businesses establish a strong and memorable identity.'
        ];
        return $this->view('services/branding-agency-in-dubai', ['meta' => $meta]);
    }
    public function websiteDesignDubai(){
        $meta = [
            'title' => 'Website Design Company in Dubai - BrandStoryAE',
            'description' => 'Discover our website design services that create visually appealing and user-friendly websites.'
        ];
        return $this->view('services/website-design-company-in-dubai', ['meta' => $meta]);
    }
    public function fullFunnelPerformanceMarketing(){
        $meta = [
            'title' => 'Full Funnel Performance Marketing - BrandStoryAE',
            'description' => 'Explore our full funnel performance marketing services designed to drive conversions and maximize ROI.',
            'classname'=>'full-funnel-page service-page'
        ];
        return $this->view('services/full-funnel-performance-marketing', ['meta' => $meta]);
    }
    public function emailMarketingDubai(){
        $meta = [
            'title' => 'Email Marketing Company in Dubai - BrandStoryAE',
            'description' => 'Discover our email marketing services that help businesses engage with their audience and drive conversions.',
            'classname'=>'em-dubai-page service-page'
        ];
        return $this->view('services/email-marketing-company-in-dubai', ['meta' => $meta]);
    }

    public function payPerClickServicesDubai(){
        $meta = [
            'title' => 'PPC Services in Dubai - BrandStoryAE',
            'description' => 'Explore our PPC services designed to boost your online visibility and drive targeted traffic to your website.',
            'classname'=>'dm-page service-page ppc'  
        ];
        return $this->view('services/pay-per-click-ppc-services-in-dubai', ['meta' => $meta]);
    }

    public function videoMarketingDubai(){
        $meta = [
            'title' => 'Video Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Explore our video marketing services designed to engage your audience and drive conversions.',
            'classname'=>'dm-page'
        ];
        return $this->view('services/video-marketing-agency-dubai', ['meta' => $meta]);
    }
    public function facebookMarketingDubai(){
        $meta = [
            'title' => 'Facebook Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Facebook marketing services that help businesses reach and engage their target audience effectively.',
            'classname'=>'em-dubai-page service-pages'
        ];
        return $this->view('services/facebook-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function instagramMarketingDubai(){
        $meta = [
            'title' => 'Instagram Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Instagram marketing services that help businesses reach and engage their target audience effectively.',
            'classname'=>'em-dubai-page service-pages'

        ];
        return $this->view('services/instagram-advertising-agency-in-dubai', ['meta' => $meta]);
    }
    public function twitterMarketingDubai(){
        $meta = [
            'title' => 'Twitter Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Twitter marketing services that help businesses reach and engage their target audience effectively.',
            'classname'=>'em-dubai-page service-pages'
        ];
        return $this->view('services/twitter-advertising-dubai', ['meta' => $meta]);
    }
    public function pinterestMarketingDubai(){
        $meta = [
            'title' => 'Pinterest Marketing Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Pinterest marketing services that help businesses reach and engage their target audience effectively.',
            'classname'=>'em-dubai-page service-pages'
        ];
        return $this->view('services/pinterest-advertising-services-in-dubai', ['meta' => $meta]);
    }
    public function tiktokMarketingDubai(){
        $meta = [
            'title' => 'TikTok Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our TikTok marketing services that help businesses reach and engage their target audience effectively.',
            'classname'=>'em-dubai-page service-pages'
        ];
        return $this->view('services/tiktok-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function seoAuditServicesInDubai(){
        $meta = [
            'title' => 'SEO Audit Services in Dubai - BrandStoryAE',
            'description' => 'Discover our SEO Audit services designed to boost your online presence and drive organic traffic.',
            'classname'=>'redes-page service-page'
        ];
        return $this->view('services/seo-audit-services-in-dubai', ['meta' => $meta]);
    }
    public function onlineReputationManagementServicesInDubai(){
        $meta = [
            'title' => 'Online Reputation Management Services in Dubai - BrandStoryAE',
            'description' => 'Discover our Online Reputation Management services designed to boost your online presence and drive organic traffic.',
            'classname'=>'em-dubai-page service-page'
        ];
        return $this->view('services/online-reputation-management-services-in-dubai', ['meta' => $meta]);
    }
    public function contentMarketingAgencyDubai(){
        $meta = [
            'title' => 'Content Marketing Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Content Marketing services designed to boost your online presence and drive organic traffic.',
            'classname'=>'em-dubai-page service-page'
        ];
        return $this->view('services/content-marketing-agency-in-dubai', ['meta' => $meta]);
    }
    public function uiuxDesignCompanyInDubai(){
        $meta = [
            'title' => 'Best UI/UX Design Agency in Dubai | UI UX Design Company in Dubai | Leading UI UX Companies in Dubai | Top UX Agency Dubai | UX Design Companies in Dubai | Brandstory',
            'description' => 'BrandStory UAE is a leading UI/UX design agency in Dubai, crafting innovative, user-centric digital solutions to elevate your brand. Get in touch for top-notch UI/UX designs that drive results!',
            'classname'=>'ui-ux-new-test'
        ];
        return $this->view('services/ui-ux-design-company-in-dubai', ['meta' => $meta]);
    }
    public function logoDesigningDubai(){
        $meta = [
            'title' => 'Logo Designing Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Logo Designing services designed to boost your online presence and drive organic traffic.',
            'classname'=>'dm-page service-page'
        ];
        return $this->view('services/logo-designing-company-in-dubai', ['meta' => $meta]);
    }
    public function creativeAdvertisingAgencyDubai(){
        $meta = [
            'title' => 'Creative Advertising Agency in Dubai - BrandStoryAE',
            'description' => 'Discover our Creative Advertising services designed to boost your online presence and drive organic traffic.',
            'classname'=>'dm-page service-page'
        ];
        return $this->view('services/creative-advertising-agency-in-dubai', ['meta' => $meta]);
    }

    public function wordpressDevelopmentCompanyInDubai(){
        $meta = [
            'title' => 'WordPress Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our WordPress Development services designed to boost your online presence and drive organic traffic.',
            'classname'=>'dm-page service-page'
        ];
        return $this->view('services/wordpress-development-company-in-dubai', ['meta' => $meta]);
    }
    public function megentoWebsiteDevelopmentDubai(){
        $meta = [
            'title' => 'Megento Website Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Megento Website Development services designed to boost your online presence and drive organic traffic.',
            'classname'=>'dm-page service-page'
        ];
        return $this->view('services/magento-website-development-dubai', ['meta' => $meta]);
    }
    public function durpalWebsiteDevelopmentCompanyInDubai(){
        $meta = [
            'title' => 'Durpal Website Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Durpal Website Development services designed to boost your online presence and drive organic traffic.',
            'classname'=>'dm-page service-page'
        ];
        return $this->view('services/drupal-website-development-company-in-dubai', ['meta' => $meta]);
    }
    public function ecommerceDevelopmentCompanyInDubai(){
        $meta = [
            'title' => 'Ecommerce Development Company in Dubai - BrandStoryAE',
            'description' => 'Discover our Ecommerce Development services designed to boost your online presence and drive organic traffic.',
            'classname'=>'dm-page service-page'
        ];
        return $this->view('services/ecommerce-development-company-dubai', ['meta' => $meta]);
    }
}