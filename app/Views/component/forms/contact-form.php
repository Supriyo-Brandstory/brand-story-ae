<div class="site-form form-light">
    <form id="contact" action="<?= route('contact.submit') ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
        <div class="row">
            <div class="col-12">
                <label>Name*</label>
                <input type="text" name="name" id="name" class="form-control" pattern="[a-zA-Z ]*" required>
            </div>

            <div class="col-12 col-md-6">
                <label>Email*</label>
                <input type="email" name="email" id="email" class="form-control"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                    oninvalid="this.setCustomValidity('Please enter a valid work e-mail ID')"
                    onchange="this.setCustomValidity('')" required>
            </div>
            <div class="col-12 col-md-6">
                <label>Phone number*</label>
                <input type="tel" name="phone" id="phone" class="form-control" maxlength="12" minlength="8"
                    pattern="^((\\+91-?)|0)?[0-9]{10,11}$" required>
            </div>
            <div class="col-12 col-md-6">
                <label>Company*</label>
                <input type="text" name="company" id="company" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label>Designation*</label>
                <input type="text" name="designation" id="designation" class="form-control" required>
            </div>




            <div class="col-12 col-md-6">
                <label>How can we help you? *</label>
                <select name="services[]" id="services" title="Select Service" class="form-select">
                    <option selected="true" disabled="disabled">Select Service</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Website Development">Websites & Apps</option>
                    <option value="SEO">SEO</option>
                    <option value="Customer Experience">Customer Experience</option>
                    <option value="Full-Funnel Performance Marketing">Full-Funnel Performance Marketing</option>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label>Budget*</label>
                <select name="budget" id="budget" class="form-select">
                    <option selected disabled>Select Budget</option>
                    <option value="75,000 - 2 Lakhs">75,000 - 2 Lakhs</option>
                    <option value="2 Lakhs - 5 Lakhs">2 Lakhs - 5 Lakhs</option>
                    <option value="5 Lakhs - 8 Lakhs">5 Lakhs - 8 Lakhs</option>
                    <option value="8 Lakhs - 10 Lakhs">8 Lakhs - 10 Lakhs</option>
                    <option value="Above 10 Lakhs">Above 10 Lakhs</option>
                </select>

            </div>

            <div class="col-md-12">
                <hr class="form-hr">
            </div>
            <div class="col-12">
                <label>Anything else? (optional)</label>
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

    .iti__flag-container {}
</style>
<script>
    // Real-time input restrictions
    document.getElementById('name').addEventListener('input', function() {
        this.value = this.value.replace(/[^A-Za-z\s]/g, '');
    });
    document.getElementById('company').addEventListener('input', function() {
        this.value = this.value.replace(/[^A-Za-z0-9\s&.,'-]/g, '');
    });
    document.getElementById('designation').addEventListener('input', function() {
        this.value = this.value.replace(/[^A-Za-z\s&.,'-]/g, '');
    });
    document.getElementById('phone').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Form submission handler
    document.getElementById('contact').addEventListener('submit', function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById('api_btn');
        const messageEl = document.querySelector('.form-messege');

        // Disable button during submission
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';
        messageEl.textContent = '';
        messageEl.className = 'form-messege';

        // Get form data
        const formData = new FormData(this);

        // Submit via fetch
        fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    messageEl.textContent = data.message || 'Thank you! Your message has been sent successfully.';
                    messageEl.classList.add('success', 'text-success');
                    this.reset(); // Clear form
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    }
                } else {
                    messageEl.textContent = data.message || 'An error occurred. Please try again.';
                    messageEl.classList.add('error', 'text-danger');
                }
            })
            .catch(error => {
                messageEl.textContent = 'Network error. Please try again.';
                messageEl.classList.add('error', 'text-danger');
                console.error('Error:', error);
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit';
            });
    });
</script>