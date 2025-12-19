<form id="careers-form" enctype="multipart/form-data">
    <?= csrf_token() ?>
    <div class="form-group"><label for="firstName">First Name<span class="required_lable">*</span></label><input type="text" name="name" class="form-control banner-form-field" required></div>
    <div class="form-group"><label for="email">Email<span class="required_lable">*</span></label><input type="email" name="email" onkeyup="this.value = this.value.toLowerCase();" class="form-control banner-form-field" required>
        <input type="text" name="email_sp" style="display: none;">
    </div>
    <div class="form-group"><label for="linkedURL">LinkedIn URL</label><input type="url" name="linkedurl" class="form-control banner-form-field"></div>
    <div class="form-group"><label for="mobile">Mobile<span class="required_lable">*</span></label><input type="tel" name="phone" class="form-control banner-form-field" required></div>
    <div class="form-group"><label for="experience">Experience in years<span class="required_lable">*</span></label><input type="text" name="experience" class="form-control banner-form-field" required></div>
    <div class="form-group"><label for="current_employer">Current Employer</label><input type="text" name="current_employer" class="form-control banner-form-field"></div>
    <div class="form-group"><label for="current_ctc">Current CTC (LPA)<span class="required_lable">*</span></label><input type="number" name="cctc" min="1" max="100" class="form-control banner-form-field" required></div>
    <div class="form-group"><label for="expected_ctc">Expected CTC (LPA)<span class="required_lable">*</span></label><input type="number" name="ectc" min="1" max="100" class="form-control banner-form-field" required></div>
    <div class="form-group"><label for="notice_period">Notice period<span class="required_lable">*</span></label><input type="text" name="notice" class="form-control banner-form-field" required></div>
    <div class="form-group"><label for="resume">Resume<span class="required_lable">*</span></label><input type="file" name="resume" accept=".doc, .docx, .txt, .pdf" class="form-control-file resume_input" required></div>
    <div class="form-group text-center"><button type="submit" id="submit-btn" class="get-quote-btn btn btn-all btn-blue">Submit</button></div>
    <div id="form-message" style="margin-top: 10px; text-align: center;"></div>
</form>

<script>
    document.getElementById('careers-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);
        const submitBtn = document.getElementById('submit-btn');
        const messageDiv = document.getElementById('form-message');

        submitBtn.disabled = true;
        submitBtn.innerText = 'Submitting...';
        messageDiv.innerText = '';

        fetch('<?= route('careers.submit') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    messageDiv.style.color = 'green';
                    messageDiv.innerText = data.message;
                    form.reset();
                } else {
                    messageDiv.style.color = 'red';
                    messageDiv.innerText = data.message;
                }
            })
            .catch(error => {
                messageDiv.style.color = 'red';
                messageDiv.innerText = 'An error occurred. Please try again.';
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Submit';
            });
    });
</script>