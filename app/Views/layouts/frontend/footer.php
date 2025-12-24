<section class="footer-top sp-50"><!--Footer top start-->
  <div class="container"><!--Container Start-->
    <div class="row gx-lg-4">
      <div class="col-md-12 col-lg-3">
        <div class="ftr-logo">
          BRANDSTORY
        </div>
        <p class="ftr-desc">
          BrandStory is a premier digital transformation agency in Dubai. We excel in digital marketing, web design, and branding expertise to help UAE-based businesses connect, expand, and succeed.

        </p>
        <div class="ftr-btn"><a href="/contact/" class="btn">Contact Sales</a></div>
        <p><b>BrandStory UAE</b><br>
          Proudly celebrating 14 passionate years as a trusted digital marketing partner to 350+ clients.
        </p>
      </div>
      <div class="col-md-4 col-lg-3">
        <h5 class="ftr-sub-title">Useful Links</h5>
        <div class="ftr-links-col">
          <ul class="ftr-links">
            <li><a href="/">Home</a>
            </li>
            <li><a href="/about/">About Us</a>
            </li>
            <li><a href="/services/">Our Services </a></li>

            <li><a href="/contact/">Contact Us </a>
            </li>
            <li><a href="/case-study/">Case Studies </a></li>
            <li><a href="/blog/">Latest Blogs</a></li>
            <li><a href="/careers/">Careers</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 ftr-service-col">
        <h5 class="ftr-sub-title">Our Services</h5>
        <ul class="ftr-links">
          <li><a href="/">Digital Marketing</a></li>
          <li><a href="/seo-services-company-in-dubai/">Search Engine Optimization</a></li>
          <li><a href="/social-media-marketing-agency-in-dubai/">Social Media Marketing</a></li>
          <li><a href="/pay-per-click-ppc-services-in-dubai/">Pay-Per-Click Ads</a></li>
          <li><a href="/email-marketing-company-in-dubai/">Email Marketing</a>
          </li>
          <li><a href="/branding-agency-in-dubai/">Branding Services</a></li>
          <li><a href="/website-design-company-in-dubai/">Web Design & Development</a></li>
          <li><a href="/ui-ux-design-company-in-dubai/">UI UX Design</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-2 col-lg-2">
        <h5 class="ftr-sub-title">Contact</h5>
        <div class="ftr-india">Phone: <br><a href="tel:+971-522831655">+971 52 283 1655</a></div>
        <div class="ftr-email">Email:<br><a href="mailto:info@brandstory.ae">info@brandstory.ae</a></div>
        <div class="ftr-adrr">
          <p>Address:<br><a
              href="https://g.co/kgs/4bHRtr4"
              target="_blank">G5, Al Meheri Plaza, opp DBC Building, Al Khabaisi Area, Deira Dubai - 81577, United Arab
              Emirates</a></p>
        </div>
      </div>
      <div class="col-6 col-md-2 col-lg-1">
        <h5 class="ftr-sub-title">Follow us</h5>
        <div class="linkedin"><a href="https://ae.linkedin.com/company/brandstory-uae/" target="_blank"
            alt="Linkedin">Linkedin</a></div>
        <div class="youtube"><a href="https://www.youtube.com/channel/UC3j_F7hY4JT6B_drs3-68vA"
            target="_blank" alt="Youtube">Youtube</a></div>
        <div class="fb"><a href="https://www.facebook.com/BrandStory-UAE-100351595015257/" target="_blank"
            alt="Facebook">Facebook</a></div>
        <div class="insta"><a href="https://www.instagram.com/brandstory_uae/" target="_blank"
            alt="Instagram">Instagram</a></div>
        <div class="twit"><a href="https://twitter.com/BrandStory_UAE" target="_blank" alt="Twitter">Twitter</a></div>
      </div>
    </div>
  </div><!--Container end-->
</section><!--Footer top end-->
<section class="footer-btm"><!--Footer bottom start-->
  <div class="container"><!--Container Start-->
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="copy">All Rights Reserved © BrandStory 2012-<?php echo date('Y'); ?> | <a
            href="/terms-and-conditions/">Terms & Conditions</a> | <a
            href="/privacy-policy/">Privacy Policy</a></div>
      </div>
    </div>
  </div><!--Container end-->
</section><!--Footer bottom end-->
<section class="footer-partners"><!--Footer partners start-->
  <div class="container"><!--Container Start-->
    <div class="text-center d-flex align-items-center justify-content-center flex-wrap gap-4">
      <a href="https://www.google.com/partners/agency?id=1975289574"><img src="/assets/images/footerlogo/img-1.webp" class="img-fluid" alt="google-partners" width="150"></a>
      <img src="/assets/images/footerlogo/img-2.webp" class="img-fluid" alt="bing-partners" width="150">
      <img src="/assets/images/footerlogo/img-3.webp" class="img-fluid" alt="facebook-marketing-partners" width="130">
      <img src="/assets/images/footerlogo/img-4.webp" class="img-fluid" alt="hubspot-partners" width="130">

    </div>
  </div><!--Container end-->
</section><!--Footer partners end-->
<a href="javascript:" id="return-to-top"><span class="upIcon"></span></a>
</div><!-- Page Content End-->
<div class="uniq-contact-lead-popup-overlay" style="display: none;">
  <div class="uniq-contact-lead-popup">
    <button class="uniq-contact-lead-close">&times;</button>
    <h3 class="text-center mb-0">Get in Touch </h3>
    <!-- Add your contact form or content here -->
    <?php
    $textrow = 2;
    include __DIR__ . '/../../component/forms/contact-form.php' ?>
  </div>
</div>
<?php
// Default Services List - can be overwritten by passing $stickyServices to the view
$stickyServices = $stickyServices ?? [
  ['label' => 'SEO Services', 'url' => '/seo-services-company-in-dubai'],
  ['label' => 'Digital Marketing', 'url' => '/'],
    ['label' => 'PPC Services', 'url' => '/pay-per-click-ppc-services-in-dubai'],
  ['label' => 'Social Media', 'url' => '/social-media-marketing-agency-in-dubai'],
  ['label' => 'Branding Services', 'url' => '/branding-agency-in-dubai'],
  ['label' => 'Website Development', 'url' => '/website-design-company-in-dubai'],
];
?>
<div class="unique-sticky-container" role="navigation" aria-label="Quick actions">
  <!-- Services List (Desktop Only) -->
  <div class="unique-sticky-services-wrapper desktop-only">
    <a
      class="unique-sticky-btn unique-sticky-services"
      href="javascript:void(0);">
      <img src="/assets/images/repairing-service.png" alt="" class="unique-sticky-icon" />
      <span class="unique-sticky-label">SEO Services</span>
    </a>
    <div class="unique-sticky-dropdown">
      <ul>
        <?php foreach ($stickyServices as $service): ?>
          <li><a href="<?= $service['url'] ?>"><?= $service['label'] ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <!-- Call (Mobile Only) -->
  <a
    class="unique-sticky-btn unique-sticky-call mobile-only"
    href="tel:+971522831655"
    aria-label="Call us">
    <img src="/assets/images/call-sticky.png" alt="" class="unique-sticky-icon" />
    <span class="unique-sticky-label">Call Us</span>
  </a>

  <span class="unique-sticky-separator">|</span>

  <a
    class="unique-sticky-btn unique-sticky-msg uniq-contact-lead-btn"
    href="javascript:void(0);">
    <img src="/assets/images/mail-sticky.png" alt="" class="unique-sticky-icon uniq-contact-lead-btn" />
    <span class="unique-sticky-label">Enquire</span>
  </a>

</div>
<!-- Toggle Translate Button (protected from translation) -->


<!-- Hidden Google Translate container -->
<style>
  label {
    color: #000;
    font-size: 16px !important;
    font-weight: 500 !important;
  }

  .form-control,
  .form-select {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
  }

  @media screen and (min-width:168px) and (max-width:580px) {
    .play-btn {
      width: 50px;
      height: 50px;
    }
  }
</style>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/menu.js?key=' . time()) ?>"></script>
<script src="<?= base_url('assets/js/swiper.js') ?>"></script>
<script src="<?= base_url('assets/js/slick.min.js') ?>"></script>
<script src="<?= base_url('assets/js/ScrollTrigger.min.js') ?>"></script>
<script src="<?= base_url('assets/js/gsap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/site.js?key=' . time()) ?>"></script>
<script src="<?= base_url('assets/js/slider.js?key=' . time()) ?>"></script>
<script src="<?= base_url('assets/js/anim.js?key=' . time()) ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.js"
  integrity="sha512-xwqnc1RvEZzvtrcgbWmJsfo7X8+fm1xZy7ThOG1Xx+2iKB+vrBuktU0sSyVguTWbfCXrqAXhMezFG13I9c4ouA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $("input").keypress(function() {
      $(this).removeClass('error');
    });
    $("#phone").intlTelInput({
      allowDropdown: true,
      separateDialCode: true,
      localizedCountries: null,
      preferredCountries: ["ae", "in", "us", "gb", "sg"],
    });
    var countryData = $("#phone").intlTelInput("getSelectedCountryData");
    $("#country").val(countryData.iso2);
    $("#country_code").val(countryData.dialCode);
  });
</script>
<script>
  const readMoreBtn = document.getElementById("readMoreBtn");
  const content = document.querySelector(".content-read-more");
  let isVisible = false;

  if (readMoreBtn) {
    readMoreBtn.addEventListener("click", function() {
      if (!isVisible) {
        content.classList.add("active");
        readMoreBtn.querySelector("span").innerText = "Read Less ➤";
      } else {
        content.classList.remove("active");
        readMoreBtn.querySelector("span").innerText = "➤ Read More";
      }
      isVisible = !isVisible;
    });
  }
</script>