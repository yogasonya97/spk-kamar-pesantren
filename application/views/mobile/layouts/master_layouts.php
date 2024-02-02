<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>
		SPK Kamar
    </title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="DexignZone" />
    <meta name="robots" content="index, follow" />

    <meta
      name="keywords"
      content="android, ios, mobile, mobile template, mobile app, ui kit, dark layout, app, delivery, ecommerce, material design, mobile, mobile web, order, phonegap, pwa, store, web app, Ombe, coffee app, coffee template, coffee shop, mobile UI, coffee design, app template, responsive design, coffee showcase, style app, trendy app, modern UI, technology, User-Friendly Interface, Coffee Shop App, PWA (Progressive Web App), Mobile Ordering, Coffee Experience, Digital Menu, Innovative Technology, App Development, Coffee Experience, cafe, bootatrap, Bootstrap Framework, UI/UX Design, Coffee Shop Technology, Online Presence, Coffee Shop Website, Cafe Template, Mobile App Design, Web Application, Digital Presence, Bootstrap, caffine"
    />

    <meta
      name="description"
      content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence."
    />

    <meta
      property="og:title"
      content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone"
    />
    <meta
      property="og:description"
      content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence."
    />

    <meta property="og:image" content="../../xhtml/social-image.png" />

    <meta name="format-detection" content="telephone=no" />

    <meta
      name="twitter:title"
      content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone"
    />
    <meta
      name="twitter:description"
      content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence."
    />

    <meta name="twitter:image" content="../../xhtml/social-image.png" />
    <meta name="twitter:card" content="summary_large_image" />

    <!-- Mobile Specific -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover"
    />

    <!-- Favicons Icon -->
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="<?= base_url() ?>assets/mobile/assets/images/app-logo/favicon.png"
    />

    <!-- PWA Version -->
    <link rel="manifest" href="<?= base_url() ?>assets/mobile/manifest.json" />

    <!-- Global CSS -->
    <link
      href="<?= base_url() ?>assets/mobile/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="<?= base_url() ?>assets/mobile/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css"
    />
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/mobile/assets/vendor/swiper/swiper-bundle.min.css" /> -->

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/mobile/assets/css/style.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;family=Raleway:wght@300;400;500&amp;display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="page-wrapper">
      <!-- Preloader -->
      <div id="preloader">
        <div class="loader">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
      <!-- Preloader end-->

      <!-- Sidebar -->
	  <?php include(APPPATH.'views/mobile/layouts/sub_layouts/sidebar.php') ?>
      <!-- Sidebar End -->

      <!-- Nav Floting Start -->
      <div class="dz-nav-floting">
        <!-- Header -->
		<?php include(APPPATH.'views/mobile/layouts/sub_layouts/header.php') ?>
        <!-- Header -->

        <!-- Main Content Start -->
        <main class="page-content bg-white p-b60">
          <div class="container">
		  	<?= $_content; ?>
          </div>
        </main>
        <!-- Main Content End -->

        <!-- Menubar -->
		<?php include(APPPATH.'views/mobile/layouts/sub_layouts/bottom_navbar.php') ?>
        <!-- Menubar -->
      </div>
      <!-- Nav Floting End -->

      <!-- Modal -->
      <div
        class="modal fade dz-pwa-modal"
        id="pwaModal"
        tabindex="-1"
        aria-labelledby="pwaModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <a
              href="javascript:void(0);"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              ><i class="feather icon-x"></i
            ></a>
            <img
              class="logo dark"
              src="<?= base_url() ?>assets/mobile/assets/images/app-logo/logo.png"
              alt=""
            />
            <img
              class="logo light"
              src="<?= base_url() ?>assets/mobile/assets/images/app-logo/logo-white.png"
              alt=""
            />
            <h5 class="title">Ombe - Coffee Shop Mobile App Template</h5>
            <p class="pwa-text">
              Install "Ombe Coffee Shop Mobile App Template" to your home screen
              for easy access, just like any other app
            </p>
            <button type="button" class="btn pwa-btn">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12 16.0001V13.0001M12 13.0001V10.0001M12 13.0001H9M12 13.0001H15M4 16.8002V11.4522C4 10.9179 4 10.6506 4.06497 10.4019C4.12255 10.1816 4.2173 9.97307 4.34521 9.78464C4.48955 9.57201 4.69064 9.39569 5.09277 9.04383L9.89436 4.84244C10.6398 4.19014 11.0126 3.86397 11.4324 3.73982C11.8026 3.63035 12.1972 3.63035 12.5674 3.73982C12.9875 3.86406 13.3608 4.19054 14.1074 4.84383L18.9074 9.04383C19.3096 9.39569 19.5102 9.57201 19.6546 9.78464C19.7825 9.97307 19.8775 10.1816 19.9351 10.4019C20 10.6505 20 10.9184 20 11.4522V16.8037C20 17.9216 20 18.4811 19.7822 18.9086C19.5905 19.2849 19.2842 19.5906 18.9079 19.7823C18.4805 20.0001 17.9215 20.0001 16.8036 20.0001H7.19691C6.07899 20.0001 5.5192 20.0001 5.0918 19.7823C4.71547 19.5906 4.40973 19.2849 4.21799 18.9086C4 18.4807 4 17.9203 4 16.8002Z"
                  stroke="#03764D"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span>Add to Home Screen</span>
            </button>
          </div>
        </div>
      </div>
      <!-- PWA End -->
    </div>
    <!--**********************************
    Scripts
***********************************-->
    <script src="<?= base_url() ?>assets/mobile/assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/mobile/assets/vendor/swiper/swiper-bundle.min.js"></script> -->
    <script src="<?= base_url() ?>assets/mobile/assets/js/dz.carousel.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/js/settings.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>assets/mobile/index.js"></script>
  </body>
</html>
