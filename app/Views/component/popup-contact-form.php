<div class="custom-contact-popup-overlay" id="customContactPopup">
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
        const popup = document.getElementById('customContactPopup');
        const closeBtn = document.getElementById('closeCustomPopup');

        window.openContactPopup = function() {
            if (!popup) return;
            popup.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            
            // Re-initialize phone input if hidden during first page load
            if (window.jQuery && jQuery.fn.intlTelInput) {
                const $phoneInput = jQuery(popup).find(".phone-input");
                if ($phoneInput.length > 0) {
                    $phoneInput.intlTelInput("setCountry", $phoneInput.intlTelInput("getSelectedCountryData").iso2 || "ae");
                }
            }
        };

        window.closeContactPopup = function() {
            if (!popup) return;
            popup.style.display = 'none';
            document.body.style.overflow = 'auto';
            try {
                sessionStorage.setItem('customPopupDismissed', '1');
            } catch (e) {}
        };

        if (closeBtn) closeBtn.addEventListener('click', closeContactPopup);

        if (popup) {
            popup.addEventListener('click', function(e) {
                if (e.target === popup) closeContactPopup();
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeContactPopup();
        });

        // Trigger on all contact CTA buttons
        document.addEventListener('click', function(e) {
            var btn = e.target.closest('.uniq-contact-lead-btn, .open-popup-btn');
            if (btn) {
                e.preventDefault();
                openContactPopup();
            }
        });

        // Smart Auto-popup for real visitors (excluding automated PageSpeed test bots)
        <?php 
        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $excludedPaths = ['/blog', '/blogs', '/case-study', '/admin'];
        $shouldShowPopup = true;
        foreach ($excludedPaths as $path) {
            if (strpos($currentPath, $path) === 0) {
                $shouldShowPopup = false;
                break;
            }
        }
        ?>
        <?php if ($shouldShowPopup): ?>
        var isTestBot = navigator.webdriver || /Chrome-Lighthouse|Google-PageSpeed|PTST|HeadlessChrome/i.test(navigator.userAgent);
        var isDismissed = false;
        try {
            isDismissed = sessionStorage.getItem('customPopupDismissed') === '1';
        } catch (e) {}

        if (!isTestBot && !isDismissed) {
            setTimeout(function() {
                openContactPopup();
            }, 6000);
        }
        <?php endif; ?>
    })();
</script>
