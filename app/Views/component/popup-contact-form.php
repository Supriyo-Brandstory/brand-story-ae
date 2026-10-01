<div class="custom-contact-popup-overlay" id="customContactPopup" style="display: none;">
    <div class="custom-contact-popup-content">
        <button class="custom-contact-popup-close" id="closeCustomPopup">&times;</button>
        <div class="popup-header text-center">
            <h3>Get a Free Consultation</h3>
            <p>Fill out the form below and our experts will get back to you shortly.</p>
        </div>
        <div class="popup-form-wrapper">
            <?php 
            $textrow = 2; 
            include __DIR__ . '/forms/contact-form.php'; 
            ?>
        </div>
    </div>
</div>

<style>
    .custom-contact-popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(5px);
        display: none; 
        justify-content: center;
        align-items: center;
        z-index: 10000;
        padding: 20px;
    }

    .custom-contact-popup-content {
        background: #fff;
        width: 100%;
        max-width: 600px;
        max-height: 90vh;
        border-radius: 20px;
        position: relative;
        padding: 40px;
        overflow-y: auto;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .custom-contact-popup-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #f0f0f0;
        border: none;
        font-size: 30px;
        line-height: 1;
        cursor: pointer;
        color: #333;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .custom-contact-popup-close:hover {
        background: #855BFF;
        color: #fff;
    }

    .popup-header h3 {
        font-weight: 700;
        margin-bottom: 10px;
        color: #000 !important;
    }

    .popup-header p {
        color: #666 !important;
    }
    .iti {
      color: #000 !important;
}
</style>

<script>
    (function() {
        window.openContactPopup = function() {
            var popup = document.getElementById('customContactPopup');
            if (!popup) return;
            popup.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            
            try {
                if (window.jQuery && jQuery.fn.intlTelInput) {
                    var $phoneInput = jQuery(popup).find(".phone-input");
                    if ($phoneInput.length > 0) {
                        var countryData = $phoneInput.intlTelInput("getSelectedCountryData");
                        if (countryData && countryData.iso2) {
                            $phoneInput.intlTelInput("setCountry", countryData.iso2);
                        }
                    }
                }
            } catch (e) {}
        };

        window.closeContactPopup = function() {
            var popup = document.getElementById('customContactPopup');
            if (!popup) return;
            popup.style.display = 'none';
            document.body.style.overflow = 'auto';
        };

        document.addEventListener('click', function(e) {
            // Close button click
            if (e.target.closest('#closeCustomPopup')) {
                closeContactPopup();
                return;
            }

            // Backdrop click
            var popup = document.getElementById('customContactPopup');
            if (popup && e.target === popup) {
                closeContactPopup();
                return;
            }

            // Trigger on contact CTA buttons
            var btn = e.target.closest('.uniq-contact-lead-btn, .open-popup-btn');
            if (btn) {
                e.preventDefault();
                openContactPopup();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeContactPopup();
        });

        // Scroll-triggered popup (appears after user scrolls down the page)
        <?php 
        $currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        $excludedPaths = ['/admin'];
        $shouldShowPopup = true;
        foreach ($excludedPaths as $path) {
            if (strpos($currentPath, $path) === 0) {
                $shouldShowPopup = false;
                break;
            }
        }
        ?>
        <?php if ($shouldShowPopup): ?>
        var scrollTriggered = false;
        function handleScrollPopup() {
            if (scrollTriggered) return;
            var scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
            // Trigger after scrolling down 400px
            if (scrollY >= 400) {
                scrollTriggered = true;
                window.removeEventListener('scroll', handleScrollPopup);
                openContactPopup();
            }
        }
        window.addEventListener('scroll', handleScrollPopup, { passive: true });
        <?php endif; ?>
    })();
</script>
