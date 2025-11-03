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
}