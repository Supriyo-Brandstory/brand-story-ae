<?php

use App\Core\Route;

// Define routes (path, "Controller@method", name)
Route::get('/', 'FrontendController@index', 'home');
Route::get('/about', 'FrontendController@about', 'about');
Route::get('/contact', 'FrontendController@contat', 'contact');
Route::post('/contact/submit', 'FrontendController@sendContactInformation', 'contact.submit');
Route::get('/blog', 'FrontendController@blogs', 'blogs');
Route::get('/blogs/{slug}', 'FrontendController@blogDetail', 'blogs.show');
Route::get('/services', 'FrontendController@services', 'services');
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
Route::group(['prefix' => '/industries'], function () {
    Route::get('/real-estate-marketing-services', 'FrontendController@realEstateMerketingServices', 'realestatemerketingservices');
    Route::get('/e-commerce-marketing-service', 'FrontendController@ecommerceMarketingServices', 'ecommercemarketingservices');
    Route::get('/healthcare-marketing-services', 'FrontendController@healthcareMarketingServices', 'healthcaremarketingservices');
    Route::get('/education-marketing-services', 'FrontendController@educationMarketingServices', 'educationmarketingservices');
    Route::get('/b2b-corporate-marketing-services', 'FrontendController@b2bCorporateMarketingServices', 'b2bcorporatemarketingservices');
    Route::get('/travel-agency-marketing-services', 'FrontendController@travelAgencyMarketingServices', 'travelagencymanagementservices');
});

// case studies 
// Route::get('/case-study', 'FrontendController@casestudies', 'casestudies');
Route::group(['prefix' => '/case-study'], function () {
    Route::get('/', 'FrontendController@casestudies', 'casestudies');
    Route::get('/cover-b-wesite', 'FrontendController@coverbwesite', 'coverbwesite');
    Route::get('/e-commerce', 'FrontendController@ecommerce', 'ecommerce');
    Route::get('/education-institution', 'FrontendController@educationinstitution', 'educationinstitution');
    Route::get('/equence', 'FrontendController@equence', 'equence');
    Route::get('/hotel', 'FrontendController@hotel', 'hotel');
    Route::get('/leading-consulting-firm-branding', 'FrontendController@leadingconsultingfirmbranding', 'leadingconsultingfirmbranding');
    Route::get('/leading-consulting-firm-website', 'FrontendController@leadingconsultingfirmwebsite', 'leadingconsultingfirmwebsite');
    Route::get('/nanoprecise-sci-corp', 'FrontendController@nanoprecisescicorp', 'nanoprecisescicorp');
    Route::get('/sherpa-communications', 'FrontendController@sherpacommunications', 'sherpacommunications');
    Route::get('/travel-agency', 'FrontendController@travelagency', 'travelagency');
    Route::get('/wipro-infrastructure-engineering', 'FrontendController@wiproinfrastructureengineering', 'wiproinfrastructureengineering');
});




// others pages
Route::get('/b2b-company-in-dubai', 'FrontendController@b2bCompanyInDubai', 'b2bcompanyindubai');
Route::get('/content-writing-company-in-dubai', 'FrontendController@contentWritingCompanyInDubai', 'contentwritingcompanyindubai');
Route::get('/corporate-event-management-company-in-dubai', 'FrontendController@corporateEventManagementCompanyInDubai', 'corporateeventmanagementcompanyindubai');
Route::get('/corporate-event-planners-in-dubai', 'FrontendController@corporateEventPlannersInDubai', 'corporateeventplannersindubai');
Route::get('/corporate-photographers-in-al-ain', 'FrontendController@corporatePhotographersInAlAin', 'corporatephotographersinalain');
Route::get('/corporate-photographers-in-fujairah', 'FrontendController@corporatePhotographersInFujairah', 'corporatephotographersinfujairah');
Route::get('/corporate-photographers-in-ras-al-khaimah', 'FrontendController@corporatePhotographersInRasAlKhaimah', 'corporatephotographersinarasalkhaimah');
Route::get('/corporate-photographers-in-umm-al-quwain', 'FrontendController@corporatePhotographersInUmmAlQuwain', 'corporatephotographersinummalquwain');
Route::get('/corporate-photography-in-dubai', 'FrontendController@corporatePhotographyInDubai', 'corporatephotographyindubai');
Route::get('/corporate-photography-in-abu-dhabi', 'FrontendController@corporatePhotographyInAbuDhabi', 'corporatephotographyinabudhabi');
Route::get('/corporate-photography-in-saudi-arabia', 'FrontendController@corporatePhotographyInSaudiArabia', 'corporatephotographyinsaudiarabia');
Route::get('/corporate-photography-in-sharjah', 'FrontendController@corporatePhotographyInSharjah', 'corporatephotographyinsharjah');
Route::get('/corporate-video-production-agency-in-saudi-arabia', 'FrontendController@corporateVideoProductionAgencyInSaudiArabia', 'corporatevideoproductionagencyinsaudiarabia');
Route::get('/corporate-video-production-company-in-abu-dhabi', 'FrontendController@corporateVideoProductionCompanyInAbuDhabi', 'corporatevideoproductioncompanyinabudhabi');
Route::get('/corporate-video-production-company-in-al-ain', 'FrontendController@corporateVideoProductionCompanyInAlAin', 'corporatevideoproductioncompanyinalain');
Route::get('/corporate-video-production-company-in-fujairah', 'FrontendController@corporateVideoProductionCompanyInFujairah', 'corporatevideoproductioncompanyinfujairah');
Route::get('/corporate-video-production-company-in-sharjah', 'FrontendController@corporateVideoProductionCompanyInSharjah', 'corporatevideoproductioncompanyinsharjah');
Route::get('/corporate-video-production-company-in-umm-al-quwain', 'FrontendController@corporateVideoProductionCompanyInUmmAlQuwain', 'corporatevideoproductioncompanyinummalquwain');
Route::get('/corporate-video-production-in-ajman', 'FrontendController@corporateVideoProductionInAjman', 'corporatevideoproductioninajman');
Route::get('/corporate-video-production-in-ras-al-khaimah', 'FrontendController@corporateVideoProductionInRasAlKhaimah', 'corporatevideoproductioninarasalkhaimah');
Route::get('/corporate-video-production-services-in-dubai', 'FrontendController@corporateVideoProductionServicesInDubai', 'corporatevideoproductionservicesindubai');
Route::get('/creative-advertising-agency-in-abu-dhabi', 'FrontendController@creativeAdvertisingAgencyInAbuDhabi', 'creativeadvertisingagencyinabudhabi');
Route::get('/crypto/cryptocurrency-marketing-agency-dubai', 'FrontendController@cryptocurrencyMarketingAgencyDubai', 'cryptocurrencymarketingagencydubai');
Route::get('/digital-marketing-agency-in-abu-dhabi', 'FrontendController@digitalmarketingagencyinabudhabi', 'digitalmarketingagencyinabudhabi');
Route::get('/digital-marketing-agency-in-ajman', 'FrontendController@digitalmarketingagencyinajman', 'digitalmarketingagencyinajman');
Route::get('/digital-marketing-agency-in-al-ain', 'FrontendController@digitalmarketingagencyinalain', 'digitalmarketingagencyinalain');
Route::get('/digital-marketing-agency-in-dubai', 'FrontendController@digitalmarketingagencyindubai', 'digitalmarketingagencyindubai');
Route::get('/digital-marketing-agency-in-dubai-uae', 'FrontendController@digitalmarketingagencyindubaiuae', 'digitalmarketingagencyindubaiuae');
Route::get('/digital-marketing-agency-in-fujairah', 'FrontendController@digitalmarketingagencyinfujairah', 'digitalmarketingagencyinfujairah');
Route::get('/digital-marketing-agency-in-ras-al-khaimah', 'FrontendController@digitalmarketingagencyinarasalkhaimah', 'digitalmarketingagencyinarasalkhaimah');
Route::get('/digital-marketing-agency-in-sharjah', 'FrontendController@digitalmarketingagencyinsharjah', 'digitalmarketingagencyinsharjah');
Route::get('/digital-marketing-agency-in-umm-al-quwain', 'FrontendController@digitalmarketingagencyinummalquwain', 'digitalmarketingagencyinummalquwain');
Route::get('/ecommerce-web-development-services', 'FrontendController@ecommercwebdevelopmentservices', 'ecommercewebdevelopmentservices');
Route::get('/email-marketing-company-in-abu-dhabi', 'FrontendController@emailmarketingcompanyinabudhabi', 'emailmarketingcompanyinabudhabi');
Route::get('/email-marketing-company-in-ajman', 'FrontendController@emailmarketingcompanyinajman', 'emailmarketingcompanyinajman');
Route::get('/email-marketing-company-in-al-quwain', 'FrontendController@emailmarketingcompanyinalquwain', 'emailmarketingcompanyinalquwain');
Route::get('/email-marketing-company-in-fujairah', 'FrontendController@emailmarketingcompanyinfujairah', 'emailmarketingcompanyinfujairah');
Route::get('/email-marketing-company-in-ras-al-khaimah', 'FrontendController@emailmarketingcompanyinrasalkhaimah', 'emailmarketingcompanyinrasalkhaimah');
Route::get('/email-marketing-company-in-sharjah', 'FrontendController@emailmarketingcompanyinsharjah', 'emailmarketingcompanyinsharjah');
Route::get('/email-marketing-company-in-umm-al-quwain', 'FrontendController@emailmarketingcompanyinummalquwain', 'emailmarketingcompanyinummalquwain');
Route::get('/event-photography-in-dubai', 'FrontendController@eventphotographyindubai', 'eventphotographyindubai');
Route::get('/event-video-production-company-in-dubai', 'FrontendController@eventvideoproductioncompanyindubai', 'eventvideoproductioncompanyindubai');
Route::get('/google-penalty-recovery-services-in-dubai', 'FrontendController@googlepenaltyrecoveryservicesindubai', 'googlepenaltyrecoveryservicesindubai');
Route::get('/graphic-design-company-in-abu-dhabi', 'FrontendController@graphicdesigncompanyinabudhabi', 'graphicdesigncompanyinabudhabi');
Route::get('/instagram-advertising-agency-in-dubai', 'FrontendController@instagramadvertisingagencyindubai', 'instagramadvertisingagencyindubai');
Route::get('/mobile-app-development-company-in-abu-dhabi', 'FrontendController@mobileappdevelopmentcompanyinabudhabi', 'mobileappdevelopmentcompanyinabudhabi');
Route::get('/mobile-app-development-in-dubai', 'FrontendController@mobileappdevelopmentindubai', 'mobileappdevelopmentindubai');
Route::get('/mobile-app-marketing-dubai', 'FrontendController@mobileappmarketingdubai', 'mobileappmarketingdubai');
Route::get('/new-about-us', 'FrontendController@newaboutus', 'newaboutus');
Route::get('/performance-marketing', 'FrontendController@performancemarketing', 'performancemarketing');
Route::get('/ppc-company-in-abu-dhabi', 'FrontendController@ppccompanyinabudhabi', 'ppccompanyinabudhabi');
Route::get('/pr-agency-dubai', 'FrontendController@pragencydubai', 'pragencydubai');
Route::get('/pr-agency-in-abu-dhabi', 'FrontendController@pragencyinabudhabi', 'pragencyinabudhabi');
Route::get('/privacy-policy', 'FrontendController@privacypolicy', 'privacypolicy');
Route::get('/quora-marketing', 'FrontendController@quoramarketing', 'quoramarketing');
Route::get('/retail-marketing-agency-dubai', 'FrontendController@retailmarketingagencydubai', 'retailmarketingagencydubai');
Route::get('/seo-agencies-in-dubai', 'FrontendController@seoagenciesindubai', 'seoagenciesindubai');
Route::get('/seo-agency-aden-yemen', 'FrontendController@seoagencyadenyemen', 'seoagencyadenyemen');
Route::get('/seo-agency-al-khobar-saudi-arabia', 'FrontendController@seoagencyalkhobarsaudiarabia', 'seoagencyalkhobarsaudiarabia');
Route::get('/seo-agency-in-abu-dhabi', 'FrontendController@seoagencyinabudhabi', 'seoagencyinabudhabi');
Route::get('/seo-agency-in-ajman', 'FrontendController@seoagencyinajman', 'seoagencyinajman');
Route::get('/seo-agency-in-baghdad', 'FrontendController@seoagencyinbaghdad', 'seoagencyinbaghdad');
Route::get('/seo-agency-in-cairo', 'FrontendController@seoagencyincairo', 'seoagencyincairo');
Route::get('/seo-agency-in-fujairah', 'FrontendController@seoagencyinfujairah', 'seoagencyinfujairah');
Route::get('/seo-agency-in-ras-al-khaimah', 'FrontendController@seoagencyinaraskhaimah', 'seoagencyinaraskhaimah');
Route::get('/seo-agency-in-salalah', 'FrontendController@seoagencyinsalalah', 'seoagencyinsalalah');
Route::get('/seo-agency-in-sharjah', 'FrontendController@seoagencyinsharjah', 'seoagencyinsharjah');
Route::get('/seo-agency-in-umm-al-quwain', 'FrontendController@seoagencyinummalquwain', 'seoagencyinummalquwain');
Route::get('/seo-agency-kuwait-city', 'FrontendController@seoagencykuwaitcity', 'seoagencykuwaitcity');
Route::get('/seo-company-in-aden-yemen', 'FrontendController@seocompanyinadenyemen', 'seocompanyinadenyemen');
Route::get('/seo-company-in-aleppo-syria', 'FrontendController@seocompanyinalepposyria', 'seocompanyinalepposyria');
Route::get('/seo-company-in-dhahran-ksa', 'FrontendController@seocompanyindhahranksa', 'seocompanyindhahranksa');
Route::get('/seo-company-in-khor-fakken', 'FrontendController@seocompanyinkhorfakken', 'seocompanyinkhorfakken');
Route::get('/seo-company-jordan', 'FrontendController@seocompanyjordan', 'seocompanyjordan');
Route::get('/seo-in-abu-dhabi', 'FrontendController@seoinabudhabi', 'seoinabudhabi');
Route::get('/seo-in-al-khobar-saudi-arabia', 'FrontendController@seoinalkhobarsaudiarabia', 'seoinalkhobarsaudiarabia');
Route::get('/seo-in-bahrain', 'FrontendController@seoinbahrain', 'seoinbahrain');
Route::get('/seo-in-dammam', 'FrontendController@seoindammam', 'seoindammam');
Route::get('/seo-in-dhahran-ksa', 'FrontendController@seoindhahranksa', 'seoindhahranksa');
Route::get('/seo-in-hawally-kuwait', 'FrontendController@seoinhawallykuwait', 'seoinhawallykuwait');
Route::get('/seo-in-jeddah', 'FrontendController@seoinjeddah', 'seoinjeddah');
Route::get('/seo-in-jordan', 'FrontendController@seoinjordan', 'seoinjordan');
Route::get('/seo-in-kuwait', 'FrontendController@seoinkuwait', 'seoinkuwait');
Route::get('/seo-in-mecca-saudi-arabia', 'FrontendController@seoinmeccasaudiarabia', 'seoinmeccasaudiarabia');
Route::get('/seo-in-medina-saudi-arabia', 'FrontendController@seoinmedinasaudiarabia', 'seoinmedinasaudiarabia');
Route::get('/seo-in-muscat', 'FrontendController@seoinmuscat', 'seoinmuscat');
Route::get('/seo-in-qatar', 'FrontendController@seoinqatar', 'seoinqatar');
Route::get('/seo-in-riyadh', 'FrontendController@seoinriyadh', 'seoinriyadh');
Route::get('/seo-in-saudi-arabia', 'FrontendController@seoinsaudiarabia', 'seoinsaudiarabia');
Route::get('/seo-page-one', 'FrontendController@seopageone', 'seopageone');
Route::get('/seo-services-in-dhahran', 'FrontendController@seoservicesindhahran', 'seoservicesindhahran');
Route::get('/seo-services-in-dubai', 'FrontendController@seoservicesindubai', 'seoservicesindubai');
Route::get('/seo-services-in-mecca-saudi-arabia', 'FrontendController@seoservicesinmeccasaudiarabia', 'seoservicesinmeccasaudiarabia');
Route::get('/seo-services-manama', 'FrontendController@seoservicesmanama', 'seoservicesmanama');
Route::get('/seo-services-salalah', 'FrontendController@seoservicessalalah', 'seoservicessalalah');
Route::get('/sms-marketing-dubai', 'FrontendController@smsmarketingdubai', 'smsmarketingdubai');
Route::get('/social-media-marketing-company-in-abu-dhabi', 'FrontendController@socialmediamarketingcompanyinabudhabi', 'socialmediamarketingcompanyinabudhabi');
Route::get('/start-with-full-funnel-performance-marketing', 'FrontendController@startwithfullfunnelperformancemarketing', 'startwithfullfunnelperformancemarketing');
Route::get('/technology-content-writing-company-in-dubai', 'FrontendController@technologycontentwritingcompanyindubai', 'technologycontentwritingcompanyindubai');
Route::get('/terms-and-conditions', 'FrontendController@termsandconditions', 'termsandconditions');
Route::get('/ui-ux-design-company-in-abu-dhabi', 'FrontendController@uiuxdesigncompanyinabudhabi', 'uiuxdesigncompanyinabudhabi');
Route::get('/ui-ux-design-company-in-ajman', 'FrontendController@uiuxdesigncompanyinajman', 'uiuxdesigncompanyinajman');
Route::get('/ui-ux-design-company-in-al-ain', 'FrontendController@uiuxdesigncompanyinalain', 'uiuxdesigncompanyinalain');
Route::get('/ui-ux-design-company-in-fujairah', 'FrontendController@uiuxdesigncompanyinfujairah', 'uiuxdesigncompanyinfujairah');
Route::get('/ui-ux-design-company-in-ras-al-khaimah', 'FrontendController@uiuxdesigncompanyinrasalkhaimah', 'uiuxdesigncompanyinrasalkhaimah');
Route::get('/ui-ux-design-company-in-sharjah', 'FrontendController@uiuxdesigncompanyinsharjah', 'uiuxdesigncompanyinsharjah');
Route::get('/ui-ux-design-company-in-umm-al-quwain', 'FrontendController@uiuxdesigncompanyinummalquwain', 'uiuxdesigncompanyinummalquwain');
Route::get('/website-design-company-in-abu-dhabi', 'FrontendController@websitedesigncompanyinabudhabi', 'websitedesigncompanyinabudhabi');
Route::get('/website-development-company-in-abu-dhabi', 'FrontendController@websitedevelopmentcompanyinabudhabi', 'websitedevelopmentcompanyinabudhabi');
Route::get('/website-maintenance-company-in-abu-dhabi', 'FrontendController@websitemaintenancecompanyinabudhabi', 'websitemaintenancecompanyinabudhabi');
Route::get('/whatsapp-marketing-in-dubai', 'FrontendController@whatsappmarketingindubai', 'whatsappmarketingindubai');
Route::get('/search-engine-optimization', 'FrontendController@searchEngineOptimization', 'searchengineoptimization');
Route::get('/ecommerce-website-development-company-in-abu-dhabi', 'FrontendController@ecommercewebsitedevelopmentcompanyinabudhabi', 'ecommercewebsitedevelopmentcompanyinabudhabi');
Route::get('/logo-design-company-in-abu-dhabi', 'FrontendController@logodesigncompanyinabudhabi', 'logodesigncompanyinabudhabi');

//kuwait pages
Route::group(['prefix' => '/kuwait'], function () {
    Route::get('/b2b-marketing-services', 'FrontendController@b2bmarketingserviceskuwait', 'b2bmarketingagencyindubai');
    Route::get('/content-writing-services', 'FrontendController@contentwritingserviceskuwait', 'contentwritingservices');
    Route::get('/digital-marketing-services', 'FrontendController@digitalmarketingserviceskuwait', 'digitalmarketingservices');
    Route::get('/email-marketing-services', 'FrontendController@emailmarketingserviceskuwait', 'emailmarketingservices');
    Route::get('/ppc-services', 'FrontendController@ppcserviceskuwait', 'ppcservices');
    Route::get('/pr-services', 'FrontendController@prserviceskuwait', 'prservices');
    Route::get('/seo-services', 'FrontendController@seoserviceskuwait', 'seoservices');
    Route::get('/social-media-marketing-services', 'FrontendController@socialmediamarketingserviceskuwait', 'socialmediamarketingservices');
    Route::get('/ui-ux-design-services', 'FrontendController@uixuxdesignserviceskuwait', 'uixuxdesignservices');
    Route::get('/website-design-and-development-services', 'FrontendController@websitedesignanddevelopmentserviceskuwait', 'websitedesignanddevelopmentservices');
});

//development pages
Route::group(['prefix' => '/development'], function () {
    Route::get('/android-app-development-company-dubai', 'FrontendController@androidAppDevelopmentCompanyDubai', 'androidappdevelopmentcompanydubai');
    Route::get('/cross-platform-app-development-company-in-dubai', 'FrontendController@crossPlatformAppDevelopmentCompanyInDubai', 'crossplatformappdevelopmentcompanyindubai');
    Route::get('/flutter-app-development-company-in-dubai', 'FrontendController@flutterAppDevelopmentCompanyInDubai', 'flutterappdevelopmentcompanyindubai');
    Route::get('/hybrid-app-development-company-in-dubai', 'FrontendController@hybridAppDevelopmentCompanyInDubai', 'hybridappdevelopmentcompanyindubai');
    Route::get('/ios-app-development-company-in-dubai', 'FrontendController@iosAppDevelopmentCompanyInDubai', 'iosappdevelopmentcompanyindubai');
    Route::get('/react-native-app-development-company-in-dubai', 'FrontendController@reactNativeAppDevelopmentCompanyInDubai', 'reactnativeappdevelopmentcompanyindubai');
});

// bahrain pages
Route::group(['prefix' => '/bahrain'], function () {
    Route::get('/b2b-marketing-services', 'FrontendController@b2bMarketingServices', 'b2bmarketingagencyindubai');
    Route::get('/content-writing-services', 'FrontendController@contentWritingServices', 'contentwritingservices');
    Route::get('/digital-marketing-services', 'FrontendController@digitalMarketingServices', 'digitalmarketingservices');
    Route::get('/email-marketing-services', 'FrontendController@emailMarketingServices', 'emailmarketingservices');
    Route::get('/ppc-services', 'FrontendController@ppcServices', 'ppcservices');
    Route::get('/pr-services', 'FrontendController@prServices', 'prservices');
    Route::get('/seo-services', 'FrontendController@seoServices', 'seoservices');
    Route::get('/social-media-marketing-services', 'FrontendController@socialMediaMarketingServices', 'socialmedia  marketingagencyinbahrain');
    Route::get('/ui-ux-design-services', 'FrontendController@uiUxDesignServices', 'uiuxdesignservices');
    Route::get('/website-design-and-development-services', 'FrontendController@websiteDesignAndDevelopmentServices', 'websitedesignanddevelopmentservices');
});




Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'Admin\AdminController@index', 'admin.index');
    Route::get('/login', 'Admin\AdminController@login', 'admin.login');
    Route::post('/login', 'Admin\AdminController@processLogin', 'admin.processLogin');

    Route::middleware('AdminAuth', function () {
        Route::get('/dashboard', 'Admin\AdminController@dashboard', 'admin.dashboard');
        Route::get('/logout', 'Admin\AdminController@logout', 'admin.logout');
        Route::get('/profile', 'Admin\AdminController@profile', 'admin.profile');
        Route::post('/profile', 'Admin\AdminController@updateProfile', 'admin.updateProfile');
        // Blog Categories Management
        Route::get('/blog-categories', 'Admin\AdminBlogCategoryController@index', 'admin.blogCategories.index');
        Route::get('/blog-categories/create', 'Admin\AdminBlogCategoryController@create', 'admin.blogCategories.create');
        Route::post('/blog-categories', 'Admin\AdminBlogCategoryController@store', 'admin.blogCategories.store');
        Route::get('/blog-categories/{id}/edit', 'Admin\AdminBlogCategoryController@edit', 'admin.blogCategories.edit');
        Route::post('/blog-categories/{id}', 'Admin\AdminBlogCategoryController@update', 'admin.blogCategories.update');
        Route::post('/blog-categories/{id}/delete', 'Admin\AdminBlogCategoryController@destroy', 'admin.blogCategories.destroy');

        // Blog Posts Management
        Route::get('/blogs', 'Admin\AdminBlogController@index', 'admin.blogs_admin.index');
        Route::get('/blogs/create', 'Admin\AdminBlogController@create', 'admin.blogs_admin.create');
        Route::post('/blogs', 'Admin\AdminBlogController@store', 'admin.blogs_admin.store');
        Route::get('/blogs/{id}/edit', 'Admin\AdminBlogController@edit', 'admin.blogs_admin.edit');
        Route::post('/blogs/{id}', 'Admin\AdminBlogController@update', 'admin.blogs_admin.update');
        Route::post('/blogs/{id}/delete', 'Admin\AdminBlogController@destroy', 'admin.blogs_admin.destroy');

        // SEO Management
        Route::get('/seo', 'Admin\AdminSeoController@index', 'admin.seo.index');
        Route::get('/seo/create', 'Admin\AdminSeoController@create', 'admin.seo.create');
        Route::post('/seo', 'Admin\AdminSeoController@store', 'admin.seo.store');
        Route::get('/seo/{id}/edit', 'Admin\AdminSeoController@edit', 'admin.seo.edit');
        Route::post('/seo/{id}', 'Admin\AdminSeoController@update', 'admin.seo.update');
        Route::post('/seo/{id}/delete', 'Admin\AdminSeoController@destroy', 'admin.seo.destroy');
    });
});
