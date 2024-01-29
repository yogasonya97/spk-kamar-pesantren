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
	<div class="container">
		<div class="row" style="margin-bottom:2px;">
			<div class="col">
				<div class="alert alert-secondary" role="alert">
					<p class="font-12" style="margin-bottom:-5px;">Catatan Informasi:</p><hr>
					<p class="font-10" style="margin-top:-5px;margin-bottom:-3px;">
						Keterangan :
					</p>
					<ul class="font-10">
							<li>Pesanan Masuk: Total pesanan masuk yang harus di jemput</li>
							<!-- <li>75Kg: Diskon 2%/Kg</li> -->
							<li>Pesanan Selesai: Total pesanan yang telah selesai di antar</li>
						</ul>
					<!-- <hr> -->
					<!-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
				</div>
			</div>
		</div>
		<div class="row no-gutters" style="margin-bottom:-5px;">
			<div class="col">
				<div class="card shadow bg-danger">
					<div class="card-body">
						<i class="fa fa-clock iconBg"></i>
						<p class="text-light text-center" style="font-size:15px;margin-bottom:-2px;">Pesanan Masuk</p>
						<h1 class="text-center" id="countPesananMasuk"></h1>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card shadow bg-success">
					<div class="card-body">
						<i class="fa fa-check iconBg"></i>
						<p class="text-light text-center" style="font-size:15px;margin-bottom:-2px;">Pesanan Selesai</p>
						<h1 class="text-center" id="countPesananSelesai"></h1>
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

	loadPesanan = () => {
		$.getJSON(`<?= base_url('kurir/dashboardKurir'); ?>`, function(json) {
			let dataMenunggu = json.pesananMasuk[0].jmlTotalPesananMasuk;
			let dataSelesai = json.pesananSelesai[0].jmlTotalPesananSelesai;
			$(`#countPesananMasuk`).html(dataMenunggu);
			$(`#countPesananSelesai`).html(dataSelesai);
		});
	}

	$(document).ready(function() {
		// loadBeratOrderLaundryPelanggan();
		loadPesanan();
		// setInterval(loadBeratOrderLaundryPelanggan, 3000);
		setInterval(loadPesanan, 3000);
	});
</script>

