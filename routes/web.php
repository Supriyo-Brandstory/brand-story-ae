<?php
use App\Core\Route;

// Define routes (path, "Controller@method", name)
Route::get('/', 'FrontendController@index', 'home');
Route::get('/about', 'FrontendController@about', 'about');
Route::get('/social-media-marketing-agency-in-dubai', 'FrontendController@socialMediaMarketingDubai', 'socialmediamarketingdubai');
Route::get('/seo-services-company-in-dubai', 'FrontendController@seoServicesDubai', 'seoservicesdubai');
Route::get('/branding-agency-in-dubai', 'FrontendController@brandAgencyDubai', 'brandagencydubai');
Route::get('/website-design-company-in-dubai', 'FrontendController@websiteDesignDubai', 'websitedesigndubai');
Route::get('/full-funnel-performance-marketing', 'FrontendController@fullFunnelPerformanceMarketing', 'fullFunnelPerformanceMarketing');
Route::get('/email-marketing-company-in-dubai', 'FrontendController@emailMarketingDubai', 'emailmarketingdubai');
Route::get('/pay-per-click-ppc-services-in-dubai', 'FrontendController@payPerClickServicesDubai', 'payperclickservicesdubai');
Route::get('/video-marketing-agency-dubai', 'FrontendController@videoMarketingDubai', 'videomarketingdubai');
Route::get('/facebook-marketing-agency-in-dubai', 'FrontendController@facebookMarketingDubai', 'facebookmarketingdubai');
Route::get('/instagram-advertising-agency-in-dubai', 'FrontendController@instagramMarketingDubai', 'instagrammarketingdubai');
Route::get('/twitter-advertising-dubai', 'FrontendController@twitterMarketingDubai', 'twittermarketingdubai');
Route::get('/pinterest-advertising-services-in-dubai', 'FrontendController@pinterestMarketingDubai', 'pinterestmarketingdubai');
Route::get('/tiktok-marketing-agency-in-dubai', 'FrontendController@tiktokMarketingDubai', 'tiktokmarketingdubai');
