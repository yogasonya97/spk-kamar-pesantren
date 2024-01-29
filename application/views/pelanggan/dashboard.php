<style>
	.card {
		border-radius: 10px;
	}
	.bgCard {
		background-image: linear-gradient(to right top, #bce8dc, #ade7de, #9ce7e3, #8ae6e9, #77e4f1);
	}
	.m-right {
		margin-right: 18px;
	}
	.big-center-icon {
		font-size:144px;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.iconBg {
		font-size: 5em;
		opacity: 0.2;
		position: absolute;
	}
</style>
<div class="page-content">
	<div class="page-title">
		<h1>E-LAUNDRY<span class="color-highlight">Fifah Laundry</span></h1>
		<a href="#" class="page-title-icon" data-toggle-theme><i class="fa fa-moon font-16 color-theme"></i></a>
		<a href="#" class="page-title-icon" data-menu="menu-share"><i class="fa fa-share-alt font-16 color-theme"></i></a>
	</div>
	<div class="divider divider-margins mt-n2"></div>
	<!-- <div class="splide single-slider boxed-slider slider-no-arrows slider-no-dots" id="single-slider-1">
		<div class="splide__track">
			<div class="splide__list">
				
					<div class="splide__slide">
						<div class="card mx-2 card-style" data-card-height="250">
							<img src="<?php echo base_url(); ?>assets/foto_banner" class="rounded" alt="Foto Banner" width="100%">
							<div class="card-bottom text-center">
								<h1 class="color-white mb-n2">
								 
								</h1>
								<p class="color-highlight mb-3"></p>
							</div>
							<div class="card-overlay bg-gradient"></div>
						</div>
						<div class="boxed-text-l mt-n3">
						</div>
					</div>
				

			</div>
		</div>
	</div> -->
	<div class="container">
		<div class="row" style="margin-bottom:2px;">
			<div class="col">
				<div class="alert alert-secondary" role="alert">
					<p class="font-12" style="margin-bottom:-5px;">Catatan Informasi:</p><hr>
					<p class="font-10" style="margin-top:-5px;margin-bottom:-3px;">
						Jika akumulasi berat laundry mencapai:
					</p>
					<ul class="font-10">
							<li>50Kg: Diskon 5%/Kg</li>
							<!-- <li>75Kg: Diskon 2%/Kg</li> -->
							<li>100Kg: Diskon 10%/Kg</li>
						</ul>
					<!-- <hr> -->
					<!-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
				</div>
			</div>
			<div class="col">
				<div class="row no-gutters" style="margin-bottom:-5px;">
					<div class="col">
						<div class="card shadow bg-info">
							<div class="card-body">
								<i class="fa fa-balance-scale iconBg"></i>
								<p class="text-light text-center" style="font-size:15px;margin-bottom:-4px;">Akumulasi Berat</p>
								<h1 class="text-center" id="jmlBerat">50Kg</h1>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card shadow bg-warning">
							<div class="card-body">
								<i class="fa fa-percent iconBg"></i>
								<p class="text-light text-center" style="font-size:15px;margin-bottom:-4px;">Akumulasi Diskon</p>
								<h1 class="text-center" id="jmlDiskon">50%</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row no-gutters" style="margin-bottom:-5px;">
			<div class="col">
				<div class="card shadow bg-danger">
					<div class="card-body">
						<i class="fa fa-clock iconBg"></i>
						<p class="text-light text-center" style="font-size:15px;margin-bottom:-2px;">Proses Pesanan Menunggu</p>
						<h1 class="text-center" id="countMenunggu"></h1>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card shadow bg-success">
					<div class="card-body">
						<i class="fa fa-check iconBg"></i>
						<p class="text-light text-center" style="font-size:15px;margin-bottom:-2px;">Proses Pesanan Selesai</p>
						<h1 class="text-center" id="countSelesai"></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="text-center my-4">
		<a href="#" class="icon icon-m shadow-xl bg-facebook rounded-xl"><i class="fab fa-facebook-f font-16"></i></a>
		<a href="#" class="icon icon-m shadow-xl bg-green-dark mx-3 rounded-xl"><i class="fa fa-phone font-16"></i></a>
		<a href="#" class="icon icon-m shadow-xl bg-twitter rounded-xl"><i class="fab fa-twitter font-16"></i></a>
	</div>

	<!-- <div class="divider divider-margins"></div>
		<div class="content text-center">
			<h1>
			</h1>
			<p class="boxed-text-xl">
			</p>
			<a href="#" class="btn btn-center-l btn-m rounded-xl shadow-xl bg-highlight font-700 text-uppercase">Lihat Lebih Banyak...</a>
		</div><br>
	<div class="divider divider-margins"></div> -->

</div>
<script>
	loadBeratOrderLaundryPelanggan = () => {
		let id_user_pelanggan = `<?php echo $id_user_pelanggan; ?>`;
		$.getJSON(`<?= base_url('kurir/getBeratLaundryUserPelanggan'); ?>/${id_user_pelanggan}`, function(json) {
			let dataBerat = json[0].jml_berat;
			// let dataBerat = 5;
			$(`#jmlBerat`).html(dataBerat??'0'+' Kg');
			if (dataBerat >=50 && dataBerat <= 99) {
				$(`#jmlDiskon`).html(5+' %');
			}else if(dataBerat >=100) {
				$(`#jmlDiskon`).html(10+' %');
			}else {
				$(`#jmlDiskon`).html(0+' %');
			}
		});
	}

	loadPesanan = () => {
		$.getJSON(`<?= base_url('pelanggan/getTotalPesanan'); ?>`, function(json) {
			let dataMenunggu = json.dataMenunggu[0].jml_pesanan;
			let dataSelesai = json.dataSelesai[0].jml_pesanan;
			$(`#countMenunggu`).html(dataMenunggu);
			$(`#countSelesai`).html(dataSelesai);
		});
	}

	$(document).ready(function() {
		loadBeratOrderLaundryPelanggan();
		loadPesanan();
		setInterval(loadBeratOrderLaundryPelanggan, 3000);
		setInterval(loadPesanan, 3000);
	});
</script>

