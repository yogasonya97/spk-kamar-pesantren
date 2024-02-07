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

    <meta name="keywords"
        content="android, ios, mobile, mobile template, mobile app, ui kit, dark layout, app, delivery, ecommerce, material design, mobile, mobile web, order, phonegap, pwa, store, web app, Ombe, coffee app, coffee template, coffee shop, mobile UI, coffee design, app template, responsive design, coffee showcase, style app, trendy app, modern UI, technology, User-Friendly Interface, Coffee Shop App, PWA (Progressive Web App), Mobile Ordering, Coffee Experience, Digital Menu, Innovative Technology, App Development, Coffee Experience, cafe, bootatrap, Bootstrap Framework, UI/UX Design, Coffee Shop Technology, Online Presence, Coffee Shop Website, Cafe Template, Mobile App Design, Web Application, Digital Presence, Bootstrap, caffine" />

    <meta name="description"
        content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence." />

    <meta property="og:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone" />
    <meta property="og:description"
        content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence." />

    <meta property="og:image" content="../../xhtml/social-image.png" />

    <meta name="format-detection" content="telephone=no" />

    <meta name="twitter:title" content="Ombe- Coffee Shop Mobile App Template (Bootstrap + PWA) | DexignZone" />
    <meta name="twitter:description"
        content="Discover the perfect blend of design and functionality with Ombe, a Coffee Shop Mobile App Template crafted with Bootstrap and enhanced with Progressive Web App (PWA) capabilities. Elevate your coffee shop's online presence with a seamless, responsive, and feature-rich template. Explore a modern design, user-friendly interface, and PWA technology for an immersive mobile experience. Brew success for your coffee shop effortlessly – Ombe is the ideal template to caffeinate your digital presence." />

    <meta name="twitter:image" content="../../xhtml/social-image.png" />
    <meta name="twitter:card" content="summary_large_image" />

    <!-- Mobile Specific -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover" />

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="<?= base_url() ?>assets/mobile/assets/images/app-logo/favicon.png" />

    <!-- PWA Version -->
    <link rel="manifest" href="<?= base_url() ?>assets/mobile/manifest.json" />

    <!-- Global CSS -->
    <link href="<?= base_url() ?>assets/mobile/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="<?= base_url() ?>assets/mobile/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" />
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/mobile/assets/vendor/swiper/swiper-bundle.min.css" /> -->

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/mobile/assets/css/style.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;family=Raleway:wght@300;400;500&amp;display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
		<?php include(APPPATH . 'views/mobile/layouts/loading_screen.php') ?>
        <!-- Preloader end-->

        <!-- Main Content Start  -->
        <main class="page-content">
            <div class="container py-0">
                <div class="dz-authentication-area">
                    <div class="main-logo">
                        <div class="logo">
                            <img src="<?= base_url() ?>assets/mobile/assets/images/app-logo/logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="section-head">
                        <h3 class="title">Masuk</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p> -->
                    </div>
                    <div class="account-section">
                        <form id="formLoginId" class="m-b30">
                            <div class="mb-4">
                                <label class="form-label" for="name">Email</label>
                                <div class="input-group input-mini input-lg">
                                    <input type="email" id="email" name="email" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="m-b30">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-mini input-lg">
                                    <input type="password" id="password" name="password" class="form-control dz-password"
                                        value="" required>
                                    <span class="input-group-text show-pass">
                                        <i class="icon feather icon-eye-off eye-close"></i>
                                        <i class="icon feather icon-eye eye-open"></i>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-thin btn-lg w-100 btn-primary rounded-xl mb-3">Masuk</button>
                        </form>
                        <div class="text-center account-footer">
                            <p class="text-light">Belum punya akun?</p>
                            <a href="/register" class="btn btn-secondary btn-lg btn-thin rounded-xl w-100">Buat Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content End  -->


    </div>
    <!--**********************************
    Scripts
***********************************-->
    <script src="<?= base_url() ?>assets/mobile/assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/js/dz.carousel.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/js/settings.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>assets/mobile/index.js"></script>
    <script src="<?= base_url() ?>assets/mobile/assets/js/axios.min.js"></script>
    <script>
        $(document).ready(function () {
            $(`#formLoginId`).submit(async (e) => {
                e.preventDefault();
                try {
                    let formData = $(`#formLoginId`).serialize();
                    const { data } = await axios.post(`/auth/login-proses`, formData);
                    if (data.responseCode != 1) {
                        return alert(data.response);
                    }

                    if (data.role == '1') {
                        location.href = '/admin';
                    } else {
                        location.href = '/client';
                    }
                } catch (error) {
                    console.log(error);
                }
            });
        });
    </script>
</body>

</html>
