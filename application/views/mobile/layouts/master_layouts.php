<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>SPK Penilaian Kamar</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/mobile/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/mobile/fonts/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&amp;family=Roboto:wght@400;500;700&amp;display=swap"
        rel="stylesheet">
    <link rel="manifest" href="<?= base_url() ?>assets/mobile/_manifest.json">
    <meta id="theme-check" name="theme-color" content="#FFFFFF">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/mobile/app/icons/icon-192x192.png">
    <script src="<?= base_url() ?>assets/mobile/scripts/axios.min.js"></script>
</head>

<body class="theme-light">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">

        <div class="header-bar header-fixed header-app header-bar-detached">
            <a data-bs-toggle="offcanvas" data-bs-target="#menu-main" href="#"><i
                    class="bi bi-list color-theme"></i></a>
            <a href="#" class="header-title color-theme">Duo</a>
            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-color"><i
                    class="bi bi-palette-fill font-13 color-highlight"></i></a>
            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-bell"><em
                    class="badge bg-highlight ms-1">3</em><i class="font-14 bi bi-bell-fill"></i></a>
            <a href="#" class="show-on-theme-light" data-toggle-theme><i class="bi bi-moon-fill font-13"></i></a>
            <a href="#" class="show-on-theme-dark" data-toggle-theme><i
                    class="bi bi-lightbulb-fill color-yellow-dark font-13"></i></a>
        </div>

        <div id="footer-bar" class="footer-bar footer-bar-detached">
            <a href="index-pages.html"><i class="bi bi-heart-fill font-15"></i><span>Pages</span></a>
            <a href="index-components.html"><i class="bi bi-star-fill font-17"></i><span>Features</span></a>
            <a href="index.html" class="active-nav"><i class="bi bi-house-fill font-16"></i><span>Home</span></a>
            <a href="index-media.html"><i class="bi bi-image font-16"></i><span>Media</span></a>
            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-main"><i
                    class="bi bi-list"></i><span>Menu</span></a>
        </div>

        <div id="menu-main" data-menu-active="nav-homes" data-menu-load="/assets/mobile/components/menu-main.php" style="width:280px;"
            class="offcanvas offcanvas-start offcanvas-detached rounded-m">
        </div>

        <div id="menu-color" data-menu-load="menu-highlights.html" style="height:340px"
            class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        </div>

        <div id="menu-bell" data-menu-load="menu-bell.html" style="height:400px;"
            class="offcanvas offcanvas-top offcanvas-detached rounded-m">
        </div>

        <div class="page-content header-clear-medium">
            <?= $_content; ?>
        </div>

        <div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-ios">
            <div class="content">
                <img src="app/icons/icon-128x128.png" alt="img" width="80" class="rounded-l mx-auto my-4">
                <h1 class="text-center font-800 font-20">Add Duo to Home Screen</h1>
                <p class="boxed-text-xl">
                    Install Duo on your home screen, and access it just like a regular app. Open your Safari menu and
                    tap "Add to Home Screen".
                </p>
                <a href="#"
                    class="pwa-dismiss close-menu gradient-blue shadow-bg shadow-bg-s btn btn-s btn-full text-uppercase font-700  mt-n2"
                    data-bs-dismiss="offcanvas">Maybe Later</a>
            </div>
        </div>
        <div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-android">
            <div class="content">
                <img src="<?= base_url() ?>assets/mobile/app/icons/icon-128x128.png" alt="img" width="80"
                    class="rounded-m mx-auto my-4">
                <h1 class="text-center font-700 font-20">Install Duo</h1>
                <p class="boxed-text-l">
                    Install Duo to your Home Screen to enjoy a unique and native experience.
                </p>
                <a href="#"
                    class="pwa-install btn btn-m rounded-s text-uppercase font-900 gradient-highlight shadow-bg shadow-bg-s btn-full">Add
                    to Home Screen</a><br>
                <a href="#" data-bs-dismiss="offcanvas"
                    class="pwa-dismiss close-menu color-theme text-uppercase font-900 opacity-50 font-11 text-center d-block mt-n1">Maybe
                    later</a>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/mobile/scripts/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/mobile/scripts/custom.js"></script>
</body>