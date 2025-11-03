<?php
namespace App\Controllers;

use App\Core\Controller;

class FrontendController extends Controller
{
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

}
