<div class="site-form form-light">
    <form id="contact" action="<?= route('contact.submit') ?>" method="post">
        <?= csrf_token() ?>
        <div class="row">
            <div class="col-12">
                <label for="name">Name*</label>
                <input type="text" name="name" id="name" class="form-control" pattern="[a-zA-Z ]*" required>
            </div>

            <div class="col-12 col-md-6">
                <label for="email">Email*</label>
                <input type="email" name="email" id="email" class="form-control"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                    oninvalid="this.setCustomValidity('Please enter a valid work e-mail ID')"
                    onchange="this.setCustomValidity('')" required>
            </div>
            <div class="col-12 col-md-6">
                <label for="phone">Phone number*</label>
                <input type="tel" name="phone" id="phone" class="form-control phone-input" maxlength="12" minlength="8"
                    pattern="^((\\+91-?)|0)?[0-9]{10,11}$" required>
            </div>
            <div class="col-12 col-md-6">
                <label for="company">Company*</label>
                <input type="text" name="company" id="company" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label for="designation">Designation*</label>
                <input type="text" name="designation" id="designation" class="form-control" required>
            </div>




            <div class="col-12 col-md-6">
                <label for="services">How can we help you? *</label>
                <?php
                $servicesdata = $servicesdata ?? '';
                ?>

                <select name="services[]" id="services" title="Select Service" class="form-select">
                    <option selected="true" disabled <?= empty($servicesdata) ? 'selected' : '' ?>>Select Service</option>

                    <option value="Social Media" <?= ($servicesdata === 'Social Media') ? 'selected' : '' ?>>
                        Social Media
                    </option>

                    <option value="Digital Marketing" <?= ($servicesdata === 'Digital Marketing') ? 'selected' : '' ?>>
                        Digital Marketing
                    </option>

                    <option value="Website Development" <?= ($servicesdata === 'Website Development') ? 'selected' : '' ?>>
                        Website Development
                    </option>

                    <option value="SEO" <?= ($servicesdata === 'SEO') ? 'selected' : '' ?>>
                        SEO
                    </option>

                    <option value="Content Marketing" <?= ($servicesdata === 'Content Marketing') ? 'selected' : '' ?>>
                        Content Marketing
                    </option>

                    <option value="Performance Marketing" <?= ($servicesdata === 'Performance Marketing') ? 'selected' : '' ?>>
                        Performance Marketing
                    </option>

                    <option value="Others" <?= ($servicesdata === 'Others') ? 'selected' : '' ?>>
                        Others
                    </option>
                </select>

            </div>
            <div class="col-12 col-md-6">
                <label for="budget">Budget*</label>
                <select name="budget" id="budget" class="form-select">
                    <option selected disabled>Select Budget</option>
                    <option value="AED 3000 - 5000">AED 3000 - 5000</option>
                    <option value="AED 5000 - 10000">AED 5000 - 10000</option>
                    <option value="AED 10000 - 15000">AED 10000 - 15000</option>
                    <option value="AED 15000 - 20000">AED 15000 - 20000</option>
                    <option value="Above AED 20000">Above AED 20000</option>
                </select>

            </div>

            <div class="col-md-12">
                <hr class="form-hr">
            </div>
            <div class="col-12">
                <label for="message">Anything else? (optional)</label>
                <textarea type="text" name="message" id="message" class="form-control" rows="<?php echo $textrow ?? 2; ?>"></textarea>
            </div>
            <div class="contact-btn mt-2">
                <input type="hidden" id="country" name="country" value="" />
                <input type="hidden" id="country_code" name="country_code" value="" />
                <input type="hidden" name="valid_email" id="valid_email" value="0">
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                <input type="text" name="honeypot" id="honeypot" style="display:none;">
                <button id="api_btn" class="btn btn-blue" type="submit">Submit</button>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <p class="form-messege"></p>
            </div>
        </div>
    </form>
</div>
<style>
    .iti {
        position: relative;
        display: inline-block;
        width: 100% !important;
    }

    .iti--separate-dial-code .iti__selected-flag {
        background-color: rgb(242 242 242) !important;
    }

    #phone {
        padding-left: 95px !important;
    }
</style>
<script>
    // Real-time input restrictions and AJAX handler for multiple forms
    (function() {
        document.querySelectorAll('form').forEach(form => {
            if (form.id !== 'contact' || form.dataset.initialized) return;
            form.dataset.initialized = 'true';

            // Input restrictions
            const inputRegex = {
                'name': /[^A-Za-z\s]/g,
                'company': /[^A-Za-z0-9\s&.,'-]/g,
                'designation': /[^A-Za-z\s&.,'-]/g,
                'phone': /[^0-9]/g
            };

            Object.keys(inputRegex).forEach(name => {
                const el = form.querySelector(`[name="${name}"]`);
                if (el) {
                    el.addEventListener('input', function() {
                        this.value = this.value.replace(inputRegex[name], '');
                    });
                }
            });

            // AJAX Submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = form.querySelector('button[type="submit"]');
                const messageEl = document.querySelector('.form-messege'); // Keep global if it's outside form

                if (!submitBtn) return;
                submitBtn.disabled = true;
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Submitting...';

                const formData = new FormData(this);
                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            if (messageEl) {
                                messageEl.textContent = data.message;
                                messageEl.className = 'form-messege success text-success alert alert-success mt-3';
                            }
                            form.reset();
                            if (data.redirect_url) setTimeout(() => window.location.href = data.redirect_url, 1500);
                        } else {
                            if (messageEl) {
                                messageEl.textContent = data.message || 'An error occurred.';
                                messageEl.className = 'form-messege error text-danger alert alert-danger mt-3';
                            }
                        }
                    })
                    .catch(err => {
                        if (messageEl) {
                            messageEl.textContent = 'Network error. Please try again.';
                            messageEl.className = 'form-messege error text-danger alert alert-danger mt-3';
                        }
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                    });
            });
        });
    })();
</script>