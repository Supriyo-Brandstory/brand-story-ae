  <header class="header sticky-top">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-5 col-md-3 col-lg-2 col-xl-3">
                  <div class="header-logo">
                      <a href="<?= route('home') ?>">
                          <img src="<?= base_url('assets/images/logo.svg') ?>" class="img-fluid" alt="BrandStory"></a>
                      </a>
                  </div>
              </div>
              <div class="col-7 col-md-9 col-lg-10 col-xl-9 d-none d-md-block">
                  <?php include 'menu.php' ?>
              </div>
              <div class="cnt-btn "><a href="<?= route('contact') ?>" class="btn kwi2">Contact Us</a>
              </div>

              <div class="mobile--menu"><?php include 'menu.php' ?></div>
          </div>
      </div>
  </header>