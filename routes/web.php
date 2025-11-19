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
Route::get('/seo-audit-services-in-dubai', 'FrontendController@seoAuditServicesInDubai', 'seoauditservicesdubai');
Route::get('/online-reputation-management-services-in-dubai', 'FrontendController@onlineReputationManagementServicesInDubai', 'onlinereputationmanagementservicesindubai');
Route::get('/content-marketing-agency-dubai', 'FrontendController@contentMarketingAgencyDubai', 'contentmarketingagencydubai');
Route::get('/ui-ux-design-company-in-dubai', 'FrontendController@uiuxDesignCompanyInDubai', 'uiuxdesigncompanyindubai');
Route::get('/logo-designing-dubai', 'FrontendController@logoDesigningDubai', 'logodesigningdubai');
Route::get('/creative-advertising-agency-in-dubai', 'FrontendController@creativeAdvertisingAgencyDubai', 'creativeadvertisingagencydubai');
Route::get('/wordpress-development-company-in-dubai', 'FrontendController@wordpressDevelopmentCompanyInDubai', 'wordpressdevelopmentcompanyindubai');
Route::get('/magento-website-development-dubai', 'FrontendController@megentoWebsiteDevelopmentDubai', 'megentowebsitedevelopmentdubai');
Route::get('/drupal-website-development-company-in-dubai', 'FrontendController@durpalWebsiteDevelopmentCompanyInDubai', 'durpalwebsitedevelopmentcompanyindubai');
Route::get('/ecommerce-development-company-dubai', 'FrontendController@ecommerceDevelopmentCompanyInDubai', 'ecommercedevelopmentcompanyindubai');

// industries
Route::get('/industries/real-estate-marketing-services', 'FrontendController@realEstateMerketingServices', 'realestatemerketingservices');
Route::get('/industries/e-commerce-marketing-service', 'FrontendController@ecommerceMarketingServices', 'ecommercemarketingservices');
Route::get('/industries/healthcare-marketing-services', 'FrontendController@healthcareMarketingServices', 'healthcaremarketingservices');
Route::get('/industries/education-marketing-services', 'FrontendController@educationMarketingServices', 'educationmarketingservices'); 
Route::get('/industries/b2b-corporate-marketing-services', 'FrontendController@b2bCorporateMarketingServices', 'b2bcorporatemarketingservices'); 
Route::get('/industries/travel-agency-marketing-services', 'FrontendController@travelAgencyMarketingServices', 'travelagencymanagementservices');

// case studies 
Route::get('/case-study', 'FrontendController@casestudies', 'casestudies');
