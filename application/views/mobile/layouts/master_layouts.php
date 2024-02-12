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

	<meta name="description" content="SPK Penilaian Kamar Yayasan Al-Fahd" />

	<meta property="og:title" content="SPK Penilaian Kamar Yayasan Al-Fahd" />
	<meta property="og:description" content="SPK Penilaian Kamar Yayasan Al-Fahd" />

	<meta property="og:image" content="../../xhtml/social-image.png" />

	<meta name="format-detection" content="telephone=no" />

	<meta name="twitter:title" content="SPK Penilaian Kamar Yayasan Al-Fahd" />
	<meta name="twitter:description" content="SPK Penilaian Kamar Yayasan Al-Fahd" />

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
	<?php $buttonActPermission = json_encode($this->session->userdata('buttonActPermission')); ?>
	<script src="<?= base_url() ?>assets/mobile/assets/js/jquery.js"></script>
	<script src="<?= base_url() ?>assets/mobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- <script src="<?= base_url() ?>assets/mobile/assets/vendor/swiper/swiper-bundle.min.js"></script> -->
	<script src="<?= base_url() ?>assets/mobile/assets/js/dz.carousel.js"></script>

	<script src="<?= base_url() ?>assets/mobile/assets/js/axios.min.js"></script>
	<script>
		const btnActPermit = JSON.parse('<?= $buttonActPermission; ?>');
	
	</script>
	<div class="page-wrapper">
		<!-- Preloader -->		
		<?php include(APPPATH . 'views/mobile/layouts/loading_screen.php') ?>
		<!-- Preloader end-->


		<!-- Sidebar -->
		<?php include(APPPATH . 'views/mobile/layouts/sub_layouts/sidebar.php') ?>
		<!-- Sidebar End -->

		<!-- Nav Floting Start -->
		<div class="dz-nav-floting">
			<!-- Header -->
			<?php include(APPPATH . 'views/mobile/layouts/sub_layouts/header.php') ?>
			<!-- Header -->

			<!-- Main Content Start -->
			<main class="page-content bg-white <?php if ($this->session->userdata('role') == '2') : ?>h-100<?php endif; ?>">
				<div class="container">
					<?= $_content; ?>

				</div>
			</main>

			<!-- Main Content End -->

			<!-- Menubar -->
			<?php if ($this->session->userdata('role') == '2') : ?>
				<?php include(APPPATH . 'views/mobile/layouts/sub_layouts/bottom_navbar.php') ?>
			<?php endif; ?>
			<!-- Menubar -->
		</div>
		<!-- Nav Floting End -->
	</div>
	<!--**********************************
		Scripts
***********************************-->
	<script src="<?= base_url() ?>assets/mobile/assets/js/settings.js"></script>
	<script src="<?= base_url() ?>assets/mobile/assets/js/custom.js"></script>
	<script src="<?= base_url() ?>assets/mobile/index.js"></script>
	<script>
		function cariRankTerbesar(data) {
			// Urutkan array berdasarkan jumlahNilai secara menurun
			data.sort((a, b) => b.jumlahNilai - a.jumlahNilai);

			// Ambil objek pertama (dengan nilai terbesar)
			const rankTerbesar = data[0];
			
			return rankTerbesar;
		}

		function urutkanRankTerbesar(data) {
			// Urutkan array berdasarkan jumlahNilai secara menurun
			data.sort((a, b) => b.jumlahNilai - a.jumlahNilai);
			
			return data;
		}
		
		const showPerimitedCrudBtn = (type,sts) => {
			if (sts) {
				$(`.${type}`).removeClass('d-none');
				return;
			}
			$(`.${type}`).addClass('d-none');
			return;
		}

		const validationBtnPermitedCrud = () => {
			$.each(btnActPermit, (i, v) => {
				showPerimitedCrudBtn(i, v);
			})
		}

		$(document).ready(function() {
			setTimeout(() => {
				validationBtnPermitedCrud();
			}, 500);
		});


		const validationForm = (e, callback, setForm = null) => {
			let forms = document.getElementsByClassName(setForm != null ? setForm : `needs-validation`);
			let validation = Array.prototype.filter.call(forms, function (form) {
				if (form.checkValidity() === false) {
					e.stopPropagation();
					form.classList.add("was-validated");
					let formRequired = $(`.form-control:invalid`);
					let inputId = formRequired[0].id;
					scrollToSelector(`#` + inputId);
				} else {
					callback();
				}
			});
		};

		const scrollToSelector = (selector) => {
			$("html, body").animate({
				scrollTop: $(selector).offset().top - 200
			}, "slow", () => {
				$(selector).focus();
			});
		};

		// Untuk Clear Validation Merah
		const clearValidationForm = (setForm = null) => {
			let forms = document.getElementsByClassName(setForm != null ? setForm : `needs-validation`);
			let validation = Array.prototype.filter.call(forms, function (form) {
				form.classList.remove("was-validated");
			});
		};

		// Untuk Reset Form
		const clearForm = (selectorFormId, setForm = null) => {
			let idForm = document.getElementById(selectorFormId);
			idForm.reset();
			clearValidationForm(setForm);
		};

		// Untuk Eksekusi Tutup Modal
		const closeModal = (selectorModalId, callback) => {
			$(`#${selectorModalId}`).on("hidden.bs.modal", function () {
				callback();
			});
		}

		// HandleResponse
		const responCheck = ({
			responseCode,
			response
		}, callBackSuccess = () => {
		}, callBackGagal = () => {
		}) => {
			if (responseCode == 1) {
				toast.success(response);
				callBackSuccess();
			} else {
				toast.danger(response);
				callBackGagal();
			}
		};

		const toast = {
			success: (msg) => {
				const myToastEl = document.getElementById('toastSuccess')
				const myToast = bootstrap.Toast.getOrCreateInstance(myToastEl)
				const toastMsg = document.getElementById('toastSuccessMsg')

				toastMsg.innerHTML = msg

				myToast.show()
			},
			danger: (msg) => {
				const myToastEl = document.getElementById('toastDanger')
				const myToast = bootstrap.Toast.getOrCreateInstance(myToastEl)
				const toastMsg = document.getElementById('toastDangerMsg')

				toastMsg.innerHTML = msg

				myToast.show()
			}
		}

	</script>
</body>

</html>
