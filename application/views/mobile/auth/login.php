<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

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

</head>

<body class="theme-light">
    <div aria-live="polite" aria-atomic="true" class="position-relative" style="display:none">
        <!-- Position it: -->
        <!-- - `.toast-container` for spacing between toasts -->
        <!-- - `.position-absolute`, `top-0` & `end-0` to position the toasts in the upper right corner -->
        <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="..." class="rounded me-2" alt="...">
                    <strong class="me-auto">Bootstrap</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    See? Just like this.
                </div>
            </div>
        </div>
    </div>
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">
        <div class="page-content header-clear-medium">
            <form id="formLoginId">
                <div class="card card-style">
                    <div class="content">
                        <h1 class="text-center font-800 font-30 mb-2">Sign In</h1>
                        <p class="text-center font-13 mt-n2 mb-3">Enter your Credentials</p>
                        <div class="form-custom form-label form-icon mb-3">
                            <i class="bi bi-person-circle font-14"></i>
                            <input type="email" class="form-control rounded-xs" id="email" name="email"
                                placeholder="Masukkan Email" required />
                            <label for="email" class="color-theme">Email</label>
                            <span>(required)</span>
                        </div>
                        <div class="form-custom form-label form-icon mb-3">
                            <i class="bi bi-asterisk font-12"></i>
                            <input type="password" class="form-control rounded-xs" id="password" placeholder="Password"
                                required />
                            <label for="password" class="color-theme">Password</label>
                            <span>(required)</span>
                        </div>
                        <button type="submit"
                            class="btn rounded-sm btn-m gradient-green text-uppercase font-700 mt-4 mb-3 btn-full shadow-bg shadow-bg-s w-100">Sign
                            In</>
                            <!-- <div class="d-flex">
                                <div>
                                    <a
                                        href="page-forgot-1.html"
                                        class="color-theme opacity-30 font-12"
                                        >Recover Account</a
                                    >
                                </div>
                                <div class="ms-auto">
                                    <a
                                        href="page-register-1.html"
                                        class="color-theme opacity-30 font-12"
                                        >Create Account</a
                                    >
                                </div>
                            </div> -->
                    </div>
                </div>
            </form>
        </div>

        <script src="<?= base_url() ?>assets/mobile/scripts/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/mobile/scripts/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/mobile/scripts/custom.js"></script>
        <script src="<?= base_url() ?>assets/mobile/scripts/axios.min.js"></script>
        <script>
            $(document).ready(function () {
                $(`#formLoginId`).submit(async (e) => {
                    e.preventDefault();
                    try {
                        let formData = $(`#formLoginId`).serialize();
                        const { data } = await axios.post(`/auth/login-proses`, formData);
                        if (data[0].responCode != 1) {
                            alert()
                        }
                        return location.href = ``;
                        console.log(data);
                    } catch (error) {
                        console.log(error);
                    }
                });
            });
        </script>
</body>

</html>