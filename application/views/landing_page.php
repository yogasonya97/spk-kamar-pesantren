<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Laundry Fifah Laundry</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="E-Laundry" name="keywords">
    <meta content="E-laundry" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url() ?>assets/landing_page/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url() ?>assets/landing_page/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url() ?>assets/landing_page/css/style.css" rel="stylesheet">

    <script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz0Zo9jDoAopzVB9cqzFzT8onr8XdQ_pk&sensor=false">
	</script>
    
    <style>
        .navBtn {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white pr-3" href="">FAQs</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="">Help</a>
                        <span class="text-white">|</span>
                        <a class="text-white pl-3" href="">Support</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 pl-3 pl-lg-5">
                <div >
                    <a href="" class="navbar-brand" style="display: flex;flex-wrap: nowrap;">
                        <img src="<?php echo base_url() ?>assets/logo.png" width="50px" alt=""><h1 class="m-0 text-secondary"><span class="text-primary">FIFAH</span> LAUNDRY</h1>
                    </a>
                </div>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="<?php echo base_url()?>" class="navBtn nav-item nav-link active">Home</a>
                        <a class="navBtn nav-item nav-link" data-unique="about">Tentang</a>
                        <a class="navBtn nav-item nav-link" data-unique="services">Layanan</a>
                        <a class="navBtn nav-item nav-link" data-unique="pricing">Diskon</a>
                        <a href="<?php echo base_url() ?>pelanggan/login" class="nav-item nav-link btn btn-primary" style="border-radius:8px">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?php echo base_url() ?>assets/landing_page/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Laundry & Cuci Kering</h4>
                            <h1 class="display-3 text-white mb-md-4">Layanan Terbaik Untuk Laundry</h1>
                            <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Lebih Banyak</a> -->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo base_url() ?>assets/landing_page/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Laundry & Cuci Kering</h4>
                            <h1 class="display-3 text-white mb-md-4">Pegawai yang Sangat Profesional</h1>
                            <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2"></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Contact Info Start -->
    <div class="container-fluid contact-info mt-5 mb-4">
        <div class="container" style="padding: 0 30px;">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex"> 
                        <i class="fa fa-2x fa-map-marker-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column" onclick="viewMapsLaundry()">
                            <h5 class="text-white font-weight-medium">Lokasi Kami</h5>
                            <p class="m-0 text-white">Palembang, Plaju</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-envelope text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Email Kami</h5>
                            <p class="m-0 text-white">fifahlaundry@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-phone-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Hubungi Kami</h5>
                            <p class="m-0 text-white">+62822-6900-5462</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->


    <!-- About Start -->
<section id="about">
    <div class="container-fluid py-5">
        <div class="container pt-0 pt-lg-4">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/landing_page/img/about.jpg" alt="">
                </div>
                <div class="col-lg-7 mt-5 mt-lg-0 pl-lg-5">
                    <h6 class="text-secondary text-uppercase font-weight-medium mb-3">Pelajari Tentang Kami</h6>
                    <h1 class="mb-4">Kami Adalah Penyedia Laundry Berkualitas Di Kota Anda</h1>
                    <h5 class="font-weight-medium font-italic mb-4">Fifah Laundry.</h5>
                    <p class="mb-2">Fifah Laundry adalah usaha jasa pencucian seperti pakaian, jas, ambal, dan lainnya. berawal dari lingkungan rumah saja, yang termotivasi karena banyaknya anak kos-kosan yang membutuhkan jasa laundry. Apa lagi warga kota yang di sibukan pekerjaan dan beberapa aktivitas. Yang membawakan peluang besar bagi wirausaha laundry. Adapun hal yang kami tawarkan:</p>
                    <div class="row">
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Layanan Laundry Berkualitas</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Pengiriman Cepat Ekspres</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Staf yang Sangat Profesional</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Jaminan Kepuasan 100%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- About End -->


    <!-- Services Start -->
<section id="services">
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Layanan</h6>
            <h1 class="display-4 text-center mb-5">Apa Yang Kita Tawarkan ?</h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-3x fa-cloud-sun text-secondary"></i>
                        </div>
                        <h4 class="font-weight-bold m-0">Cuci Kering</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4" style="width: 100px; height: 100px;">
                            <i class="fas fa-3x fa-soap text-secondary"></i>
                        </div>
                        <h4 class="font-weight-bold m-0">Cuci & Laundry</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-3x fa-burn text-secondary"></i>
                        </div>
                        <h4 class="font-weight-bold m-0">Laundry Tirai</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-3x fa-tshirt text-secondary"></i>
                        </div>
                        <h4 class="font-weight-bold m-0">Pembersihan Jas</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Services End -->


    <!-- Features Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-0 my-lg-5 pt-0 pt-lg-5 pr-lg-5">
                    <h6 class="text-secondary text-uppercase font-weight-medium mb-3">Our Features</h6>
                    <h1 class="mb-4">Why Choose Us</h1>
                    <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor</p>
                    <div class="row">
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">10</h1>
                            <h5 class="font-weight-bold">Years Expereince</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">250</h1>
                            <h5 class="font-weight-bold">Expert Worker</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">1250</h1>
                            <h5 class="font-weight-bold">Happy Clients</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">9550</h1>
                            <h5 class="font-weight-bold">Dry Cleaning</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-column align-items-center justify-content-center bg-secondary h-100 py-5 px-3">
                        <i class="fa fa-5x fa-certificate text-white mb-5"></i>
                        <h1 class="display-1 text-white mb-3">10+</h1>
                        <h1 class="text-white m-0">Years Experience</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Features End -->


    <!-- Working Process Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Proses Pengerjaan</h6>
            <h1 class="display-4 text-center mb-5">Bagaimana Kami Mengerjakannya</h1>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">1</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Registrasi Akun</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">2</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Order Ditempat</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">3</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Penjemputan Kurir</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">4</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Kurir Melihat Lokasi Anda</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">5</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Proses Laundry</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">6</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Anda Memantau Status Pesanan</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">7</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Kurir Mengantar Pesanan Laundry</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">6</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Selesai</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Working Process End -->


    <!-- Pricing Plan Start -->
<section id="pricing">
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Diskon Harga Kami</h6>
            <h1 class="display-4 text-center mb-5">Diskon Terbaik</h1>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-secondary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h6 class="text-white">Akumulasi Berat<br>50Kg</h6>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;"></small>5<small class="align-bottom" style="font-size: 16px; line-height: 40px;">%/ Kg</small>
                            </h1>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Mendapatkan Diskon<br>5%/Kg<br> jika akumulasi berat pesanan<br> laundry mencapai 50Kg</p>
                        </div>
                        <a href="<?php echo base_url('pelanggan/signup') ?>" class="btn btn-secondary py-2 px-4">Daftar Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-primary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h6 class="text-white">Akumulasi Berat<br>100Kg</h6>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;"></small>10<small class="align-bottom" style="font-size: 16px; line-height: 40px;">%/ Kg</small>
                            </h1>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                        <p>Mendapatkan Diskon<br>10%/Kg<br> jika akumulasi berat pesanan<br> laundry mencapai 100Kg</p>
                        </div>
                        <a href="<?php echo base_url() ?>pelanggan/signup" class="btn btn-primary py-2 px-4">Daftar Sekarang</a>
                    </div>
                </div>
                <!-- <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-secondary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">Premium</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                            </h1>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>HTML5 & CSS3</p>
                            <p>Bootstrap 4</p>
                            <p>Responsive Layout</p>
                            <p>Compatible With All Browsers</p>
                        </div>
                        <a href="" class="btn btn-secondary py-2 px-4">Signup Now</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
    <!-- Pricing Plan End -->


    <!-- Testimonial Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Testimonial</h6>
            <h1 class="display-4 text-center mb-5">Our Clients Say</h1>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="<?php echo base_url() ?>assets/landing_page/img/testimonial-1.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">Client Name</h5>
                        <p class="text-muted font-italic">Profession</p>
                        <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor ipsum clita</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="<?php echo base_url() ?>assets/landing_page/img/testimonial-2.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">Client Name</h5>
                        <p class="text-muted font-italic">Profession</p>
                        <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor ipsum clita</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="<?php echo base_url() ?>assets/landing_page/img/testimonial-3.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">Client Name</h5>
                        <p class="text-muted font-italic">Profession</p>
                        <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor ipsum clita</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="<?php echo base_url() ?>assets/landing_page/img/testimonial-4.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">Client Name</h5>
                        <p class="text-muted font-italic">Profession</p>
                        <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor ipsum clita</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 pt-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href=""><h1 class="text-secondary mb-3"><span class="text-white">FIFAH</span>LAUNDRY</h1></a>
                <!-- <p>Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sit no, sed kasd et ipsum dolor duo dolor</p> -->
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white mb-4">Alamat</h4>
                <!-- <p>Dolor clita stet nonumy clita diam vero, et et ipsum diam labore</p> -->
                <p><i class="fa fa-map-marker-alt mr-2"></i>PALEMBANG, PLAJU</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+62822-6900-5462</p>
                <p><i class="fa fa-envelope mr-2"></i>fifahlaundry@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="navBtn text-white mb-2" href="<?php echo base_url(); ?>"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#about" data-unique="about"><i class="fa fa-angle-right mr-2"></i>Tentang</a>
                    <a class="text-white mb-2" href="#services"><i class="fa fa-angle-right mr-2"></i>Layanan</a>
                    <a class="text-white mb-2" href="#pricing"><i class="fa fa-angle-right mr-2"></i>Diskon</a>
                    <!-- <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white mb-4">Newsletter</h4>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control border-0" placeholder="Your Name" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0" placeholder="Your Email" required="required" />
                    </div>
                    <div>
                        <button class="btn btn-lg btn-secondary btn-block border-0" type="submit">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center text-white">
            &copy; <a class="text-white font-weight-medium" href="#">E-Laundry FIFAH</a>. All Rights Reserved. 
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/landing_page/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url() ?>assets/landing_page/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets/landing_page/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo base_url() ?>assets/landing_page/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?php echo base_url() ?>assets/landing_page/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?php echo base_url() ?>assets/landing_page/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url() ?>assets/landing_page/js/main.js"></script>
    <script>
        $('.navBtn').click(function (e) {
            let selector = $(this).data('unique');
            $('html, body').animate({
                scrollTop: $(`#${selector}`).offset().top
            }, 1500);
            return false;
        });
    </script>
</body>

</html>