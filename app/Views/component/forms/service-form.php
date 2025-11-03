<div class="site-form form-light">
  <form id="service-form" action="../service_form_validation/" method="post" onsubmit="return checkdata(this);">
    <div class="row">
      <div class="col-12">
        <label>Name*
          <input type="text" name="name" id="firstname" class="form-control" pattern="[a-zA-Z ]*" required>
      </div>
      <div class="col-12 col-md-6">
        <label>Contact number*</label>
        <input type="tel" name="phone" id="phone" class="form-control" maxlength="12" minlength="10"
          pattern="^((\\+91-?)|0)?[0-9]{10,11}$" required>
      </div>
      <div class="col-12 col-md-6">
        <label>Email*</label>
        <input type="email" name="email" id="email" class="form-control"
          pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
          oninvalid="this.setCustomValidity('Please enter a valid work e-mail ID')"
          onchange="this.setCustomValidity('')" required>
        <input type="text" name="email_sp" style="display: none;">
      </div>
      <div class="col-12">
        <label>Company*</label>
        <input type="text" name="company" id="company" class="form-control" required>
      </div>
      <div class="col-md-12">
        <label>Services*</label>
        <select name="services[]" id="services" title="Select Hiring Type" class="form-select">
          <option selected="true" disabled="disabled">Select Service</option>
          <option value="Digital Marketing">Digital Marketing</option>
          <option value="UI/UX Services">UI/UX Services</option>
          <option value="Website Services">Website Services</option>
          <option value="SEO Services">SEO Services</option>
          <option value="SMM Services">SMM Services</option>
          <option value="Email Marketing">Email Marketing</option>
          <option value="PPC Services">PPC Services</option>
          <option value="PR Services">PR Services</option>
          <option value="B2B Services">B2B Services</option>
          <option value="Content Writing Services">Content Writing Services</option>
        </select>
      </div>
      <div class="col-12">
        <label>Your Message</label>
        <textarea placeholder="Message *" name="message" class="form-control"></textarea>
      </div>
      <div class="contact-btn mt-2">
        <input type="hidden" id="country" name="country" value="" />
        <input type="hidden" name="valid_email" id="valid_email" value="0">
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

        <input type="hidden" name="page"
          value="<?php echo ucfirst(str_replace("-", " ", str_replace(".php", "", basename($_SERVER['PHP_SELF'])))); ?>">
        <button id="api_btn" class="btn btn-blue" type="submit">Submit</button>
      </div>
      <div class="col-12 d-flex justify-content-center">
        <p class="form-messege"></p>
      </div>
    </div>
  </form>
</div>
<script>





  function checkdata(form, event) {
    // Prevent the form from submitting by default
    event.preventDefault();

    // If valid_email is already set, allow submission
    if ($("#valid_email").val() > 0) {
      return true;
    }

    // Disable the API button
    $("#api_btn").prop('disabled', true);

    // Set country code from phone input
    $("#country").val($("#phone").intlTelInput("getSelectedCountryData").dialCode);

    // First validation step: Check email and phone in the service
    $.post("/service_form_validation/?CheckData=2", {
      email: $("#email").val(),
      phone: $("#country").val() + $("#phone").val()
    },
      function (data, status) {
        var jdata = JSON.parse(data);

        // Handle email and phone number validation
        if (jdata.Email) {
          $("#email").val('').focus().addClass('error').attr('placeholder', 'Email Already Exist');
        } else if (jdata.Phone) {
          $("#phone").val('').focus().addClass('error').attr('placeholder', 'Phone number Already exist');
        } else {
          // If both email and phone are valid, make the second check
          $.post("/checkdata/", {
            email: $("#email").val(),
            phone: $("#country").val() + $("#phone").val()
          },
            function (data, status) {
              var jdata = JSON.parse(data);

              // Handle the result of the second validation
              if (jdata.check && jdata.check_phone) {
                $("#valid_email").val(1); // Mark email as valid
                form.submit();            // Submit the form
              } else if (!jdata.check) {
                $("#email").val('').focus().addClass('error').attr('placeholder', 'Please enter valid work email');
              } else if (!jdata.check_phone) {
                $("#phone").val('').focus().addClass('error').attr('placeholder', 'Please enter valid Phone number');
              }
            }
          );
        }
      }
    ).always(function () {
      // Re-enable the button after the asynchronous requests are completed
      $("#api_btn").prop('disabled', false);
    });

    return false; // Prevent form submission for now
  }
</script>