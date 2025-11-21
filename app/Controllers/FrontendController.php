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
