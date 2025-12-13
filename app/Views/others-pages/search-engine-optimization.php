<style>
    .smm-banner-red {
        height: 90vh;
    }

    .smm-banner-red {
        background-repeat: no-repeat;
        background-color: #000;
        background-image: url(/assets/images/sec-bg.png);
        background-position: right;
        background-size: cover;
    }

    .dbox {
        backdrop-filter: blur(52px);
        background-color: #ffffff42;
    }

    .form-control {
        font-size: 15px !important;

    }

    .form-group {
        margin-bottom: 1rem;
    }

    .sec-2 {
        background: #F5F8FF;
    }

    textarea.form-control {
        height: 120px;
    }

    .sec-img {
        padding: 20px 30px;
    }

    .form {
        background: #fff;
        padding: 50px;
        position: relative;
        top: 0px;
    }

    .sec-img img {
        padding-bottom: 15px;
    }

    .sec-img p {
        font-size: 18px;
    }

    .smm-banner-red input {
        border: 1px solid #E7E5E3 !important;
    }

    .smm-banner-red label {
        font-size: 14px;
        line-height: 21px;
        color: #000;
        margin-bottom: 5px !important;
    }

    .text-l-black {
        color: #212529;
    }

    .text-pink {
        color: #E7106E;
    }

    .fs-18 {
        font-size: 18px;
    }

    .fs-20 {
        font-size: 20px;
    }

    .lh-34 {
        line-height: 34px;
    }

    .text-green {
        color: #1BC6AF;
    }

    .fs-32 {
        font-size: 32px;
    }

    .fw-600 {
        font-weight: 600;
    }

    .fw-500 {
        font-weight: 500;
    }

    .number-content {
        background-color: #ECFFFC;
        padding: 20px;
        box-shadow: 0px 12px 15px 0px #5252521A;
        width: 100%;
    }

    @media (min-width: 992px) {
        .max-900 {
            max-width: 900px;
            margin: auto;
        }

        .desk-pt {
            padding-top: 130px;
        }
    }

    @media (min-width: 768px) {
        .bor-1 {
            border-right: 1px solid #dfdfdf;
            border-bottom: 1px solid #dfdfdf;
        }

        .bor-2 {
            border-bottom: 1px solid #dfdfdf;
        }

        .bor-3 {
            border-right: 1px solid #dfdfdf;
        }

        .sec-img {
            padding: 50px 30px;
        }
    }

    .list-content ul {
        list-style-type: none;
        list-style-image: url(/assets/images/icon-green.svg);
    }

    .list-content ul li {
        font-size: 20px;
        line-height: 30px;
        margin-bottom: 25px;
    }

    .shadow {
        box-shadow: 0px 12px 25px 0px #5252521A;
        border-radius: 16px;
    }

    .fs-26 {
        font-size: 26px;
    }

    .lh-39 {
        line-height: 39px;
    }

    .bg-red {
        background-color: #E83A25;
    }

    .blue-list {
        list-style-type: none;
        list-style-image: url(/assets/images/icon-blue.svg);
        border-bottom: 2px solid #B3DBFF;
    }

    .blue-list li {
        font-size: 18px;
        line-height: 27px;
        margin-bottom: 25px;
        color: #fff;
    }

    .yellow-list {
        list-style-type: none;
        list-style-image: url(/assets/images/icon-yellow.svg);
        border-bottom: 2px solid #FFEFB3;
    }

    .yellow-list li {
        font-size: 18px;
        line-height: 27px;
        margin-bottom: 25px;
        color: #fff;
    }

    .red-list {
        list-style-type: none;
        list-style-image: url(/assets/images/icon-red.svg);
        border-bottom: 2px solid #FFCBD5;
    }

    .red-list li {
        font-size: 18px;
        line-height: 27px;
        margin-bottom: 25px;
        color: #fff;
    }

    .brown-list {
        list-style-type: none;
        list-style-image: url(/assets/images/icon-brown.svg);
        border-bottom: 2px solid #FFD9D3;
    }

    .brown-list li {
        font-size: 18px;
        line-height: 27px;
        margin-bottom: 25px;
        color: #fff;
    }

    .faq .accordion-item {
        border: unset !important;
    }

    .faq .accordion-button {
        padding: 20px !important;
        font-size: 22px;
        font-weight: 500;
    }

    .faq .accordion-button:not(.collapsed) {
        color: #000 !important;
        background-color: #fff !important;
        box-shadow: none !important;
    }

    .faq .accordion-button:not(.collapsed)::after {
        background: unset !important;
        content: url("/assets/images/Arrow - Down Circle.svg") !important;
        transform: unset !important;
    }

    .faq .accordion-button::after {
        background: unset !important;
        content: url("/assets/images/Vector.svg") !important;
        transform: unset !important;
    }

    @media (max-width: 768px) {
        .smm-banner-red {
            height: auto;
        }
    }

    .arrow-btn:after {
        content: url("/assets/images/arrow.svg");
        margin-left: 10px;
    }
</style>
<section class="smm-banner-red sp-50">
    <div class="container">
        <div class="row g-3 mx-auto">
            <div class="col-md-6 mt-0 pe-0 pe-md-5 pt-4">
                <div class="dbox py-3 ps-3 pe-0 pe-md-5">
                    <h1 class="text-white">Capture the Traffic That Matters with SEO</h1>
                    <p class="text-white">Dominate search results and drive conversions with our expert SEO strategies tailored for your business success.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form px-5" id="form-yt">
                    <h2 class="text-center">Get in Touch</h2>
                    <?php include __DIR__ . '/../component/forms/contact-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-2 sp-50">
    <div class="container">
        <div class="row mx-auto desk-pt">
            <div class="col-md-3 bor-1">
                <div class="sec-img">
                    <img src="/assets/images/pg1.png">
                    <p>Customized SEO Plans</p>
                </div>
            </div>
            <div class="col-md-3 bor-1">
                <div class="sec-img">
                    <img src="/assets/images/pg2.png">
                    <p>Expert Teams with Proven Skills</p>
                </div>
            </div>
            <div class="col-md-3 bor-1">
                <div class="sec-img">
                    <img src="/assets/images/pg3.png">
                    <p>10+ Years of Industry Experience</p>
                </div>
            </div>
            <div class="col-md-3 bor-2">
                <div class="sec-img">
                    <img src="/assets/images/pg4.png">
                    <p>Diverse B2B and B2C portfolios</p>
                </div>
            </div>
            <div class="col-md-3 bor-3">
                <div class="sec-img ">
                    <img src="/assets/images/pg5.png">
                    <p>Advanced Technology Knowledge</p>
                </div>
            </div>
            <div class="col-md-3 bor-3">
                <div class="sec-img">
                    <img src="/assets/images/pg6.png">
                    <p>Skilled Content Creation Team</p>
                </div>
            </div>
            <div class="col-md-3 bor-3">
                <div class="sec-img">
                    <img src="/assets/images/pg7.png">
                    <p>Regular and Transparent Reporting</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sec-img">
                    <img src="/assets/images/pg8.png">
                    <p>Dedicated Account Manager for Support</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="#form-yt" class="btn btn-blue py-3">Let’s turn your plans into action! Get in touch!</a>
        </div>
    </div>
</section>

<section class="sp-50 counter">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="heading-content">
                    <h2 class="text-lblack">BrandStory Digital is a fully integrated, technologically <span class="text-pink">strong digital marketing agency in Dubai</span></h2>
                    <p class="mt-3">At BrandStory, we specialize in creating powerful digital marketing campaigns that elevate your brand's online presence. Our team of SEO experts ensures that your business stands out in search results, driving high-quality traffic and increasing conversions. Let us help you capture the traffic that truly matters.</p>
                </div>
            </div>
            <div class="col-md-6 align-self-center">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="number-content">
                            <p class="fs-18 text-green fw-500"><span class="fs-32 fw-600">10+</span> Years</p>
                            <p>of industry expertise and dominance</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="number-content">
                            <p class="fs-18 text-green fw-500"><span class="fs-32 fw-600">500+</span> Clients</p>
                            <p>around the world and across all the sectors</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="number-content">
                            <p class="fs-18 text-green fw-500"><span class="fs-32 fw-600">200+</span> Digital experts</p>
                            <p>working towards achieving service excellence </p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="number-content">
                            <p class="fs-18 text-green fw-500"><span class="fs-32 fw-600">4+</span> Offices</p>
                            <p>set up around the world catering to diverse market demands</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-900 mt-5 shadow p-5">
                <div class="row gx-5">
                    <div class="col-md-5">
                        <div class="content-title">
                            <h2 class="text-lblack text-center text-md-end">Here's What You Get:</h2>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="list-content">
                            <ul>
                                <li>Visibility that Puts You Ahead</li>
                                <li>Content Crafted to Engage</li>
                                <li>A Seamless Path for Customers</li>
                                <li>Authority That Commands Attention</li>
                                <li>Strategies That Keep You on Top</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="more-content">
                    <p class="fs-26 lh-39 fw-500 text-end mb-0">...& more</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="#form-yt" class="btn bg-red p-3 text-white">Think we’re a match? Then let’s catch up!</a>
        </div>
    </div>
</section>

<section class="black-section sp-50 bg-black">
    <div class="container">
        <div class="heading text-center">
            <h2 class="text-white">Our Core Approach </h2>
            <h3 class="text-white fw-light">With which we drive our SEO strategies and decisions</h3>
        </div>
        <div class="row mt-0 mt-md-5 g-5">
            <div class="col-md-5 align-self-center">
                <div class="image">
                    <img src="/assets/images/round-content.png" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-md-7">
                <div class="black-list-content">
                    <ul class="blue-list">
                        <li><span class="ps-1">SEO and objective focused content strategy</span></li>
                        <li><span class="ps-1">With a well structured and detailed content</span></li>
                        <li><span class="ps-1">Optimizing the pages with the right on page strategy</span></li>
                    </ul>
                    <ul class="yellow-list mt-5">
                        <li><span class="ps-1">Optimised with the right set of keywords</span></li>
                        <li><span class="ps-1">Through right keywords usage</span></li>
                    </ul>
                    <ul class="red-list mt-5">
                        <li><span class="ps-1">Making sure the visuals and the website performance are intact with an intuitive UI and a good tech optimization to make the user engagement with the site better</span></li>
                    </ul>
                    <ul class="brown-list mt-5">
                        <li><span class="ps-1">Building a healthy list of backlinks that are less in spam score</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="" class="btn bg-red p-3 text-white">Contact us! Unlock the potential of intent-Driven visitors.</a>
        </div>
    </div>
</section>

<section class="sp-50 faq">
    <div class="container">
        <div class="heading-content">
            <h2 class="text-lblack text-center">Our SEO Workflow</h2>
            <h3 class="text-center text-lblack fw-light">To shape your online dominance</h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-5">
                <div class="faq-image">
                    <img src="/assets/images/faq-img.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-md-7">
                <div class="faq-content">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Business Understanding and Requirement Gathering
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We start by deeply understanding your business goals and gathering detailed requirements to ensure our SEO strategy aligns perfectly with your objectives.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Brand, Market & Competition Research
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Our team conducts thorough research on your brand, market, and industry to uncover insights and identify opportunities that will give you a competitive edge.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Auditing: What's Missing, What's Good So Far, What Can Be Done Better
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We perform a comprehensive audit to evaluate your current SEO status, highlighting strengths, identifying gaps, and suggesting areas for improvement.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    SEO Strategy Development with a Clear Structured Road Map
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Based on our research and audit, we develop a tailored SEO strategy complete with a structured roadmap to guide your business towards achieving its SEO goals.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Regular Catch-Up and Discussion of Project Status with Stakeholders
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We maintain transparent communication through regular catch-ups and status updates, ensuring stakeholders are always informed and involved in the project’s progress.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                    Adjustment, Improvement, Enhancement, and Domination
                                </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We continuously refine and enhance our SEO efforts, making necessary adjustments to ensure your business dominates search results and achieves long-term success.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark py-5 py-md-0">
    <div class="container">
        <div class="row g-md-0 g-3">
            <div class="col-md-6">
                <img src="/assets/images/transparent-image.png" class="img-fluid">
            </div>
            <div class="col-md-6 align-self-center">
                <div class="content">
                    <p class="fs-20 lh-34 text-white fw-light">Reach out to BrandStory</p>
                    <h2 class="text-white">To turn your marketing strategy into a new industrial benchmark</h2>
                    <a class="arrow-btn text-white">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="position-fixed d-md-none d-block btn-primary text-center w-100" style="bottom:0px;">
    <div class="container">
        <div class="row">
            <div class="col-6 align-self-center">
                <a href="tel:+971522831655" class="text-white text-center">+971 52 283 1655</a>
            </div>
            <div class="col-6">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="py-3 btn btn-primary text-center text-white w-100 position-sticky border-0" style="bottom: 0px;z-index: 1000;border-radius:0px;">Get in Touch</button>
            </div>
        </div>
    </div>
</section>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pull-left">Let us Talk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/mer/seo-validation/">
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" name="fName" placeholder="Enter Name" class="form-control" required>
                        <!---->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile Number*</label>
                                <input type="tel" name="fPhone" placeholder="Mobile Number" class="form-control " minlength="9" maxlength="9" required>
                                <!---->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Business Email*</label>
                                <input type="email" name="fEmail" placeholder="Enter Email" class="form-control" required>
                                <!---->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website Link*</label>
                                <input type="url" name="fService" placeholder="Website Link" class="form-control " required>
                                <!---->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. of Keywords to Focus </label>
                                <select name="fMessage" class="form-control ">
                                    <option value="">Select</option>
                                    <option value="50 to 100" class="ng-star-inserted">50 to 100 Keywords</option>
                                    <option value="100 to 200" class="ng-star-inserted">100 to 200 Keywords</option>
                                    <option value="More 200+" class="ng-star-inserted">More than 200+ Keyword</option>
                                    <!---->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="px-3 text-muted">Are you currently doing SEO*</label>
                        <select name="adstatus" class="form-control " required>
                            <option value="">Select</option>
                            <option value="Yes" class="ng-star-inserted">Yes</option>
                            <option value="No" class="ng-star-inserted">No</option>
                            <!---->
                        </select>
                        <!---->
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary text-center btn-blue border-0">Submit</button>
                </form>

                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<!--popup-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pull-left">Let us Talk</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="/mer/seo-validation/">
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" name="fName" placeholder="Enter Name" class="form-control" required>
                        <!---->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile Number*</label>
                                <input type="tel" name="fPhone" placeholder="Mobile Number" minlength="9" maxlength="9" class="form-control " required>
                                <!---->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Business Email*</label>
                                <input type="email" name="fEmail" placeholder="Enter Email" class="form-control" required>
                                <!---->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website Link*</label>
                                <input type="url" name="fService" placeholder="Website Link" class="form-control " required>
                                <!---->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. of Keywords to Focus </label>
                                <select name="fMessage" class="form-control ">
                                    <option value="">Select</option>
                                    <option value="50 to 100" class="ng-star-inserted">50 to 100 Keywords</option>
                                    <option value="100 to 200" class="ng-star-inserted">100 to 200 Keywords</option>
                                    <option value="More 200+" class="ng-star-inserted">More than 200+ Keyword</option>
                                    <!---->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="px-3 text-muted">Are you currently doing SEO*</label>
                        <select name="adstatus" class="form-control " required>
                            <option value="">Select</option>
                            <option value="Yes" class="ng-star-inserted">Yes</option>
                            <option value="No" class="ng-star-inserted">No</option>
                            <!---->
                        </select>
                        <!---->
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary text-center btn-blue border-0">Submit</button>
                </form>

                <br>
                <br>
            </div>
        </div>
    </div>
</div>