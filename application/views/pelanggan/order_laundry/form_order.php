<div class="page-content">
	<div class="page-subtitle">
		<h1>Tambah<br> Order Laundry</h1>
		<a href="#" class="page-subtitle-icon show-on-theme-light" data-toggle-theme><i class="fa fa-moon color-theme"></i></a>
		<a href="#" class="page-subtitle-icon show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
		<!-- <a href="#" class="page-subtitle-icon" data-menu="menu-main"><i class="fa fa-bars color-theme"></i></a> -->
	</div>
	<div class="content mt-n3">
		<p>
			E-Laundry Fifah Laundry
		</p>
	</div>
	<div class="content mb-0">
		
		<h4>Form Order </h4>
		<p>
			
		</p>
		<form action="<?php echo base_url();?>pelanggan/tambah_order" class="ModalAjax" method="post" accept-charset="utf-8">
			
				<!-- <div class="input-style input-style-always-active has-borders no-icon validate-field mt-4">
					<input type="file" class="form-control validate-name" accept="image/*" name="foto_kk" id="form2ab" placeholder="Upload Foto KK" required="">
					<label for="form2ab" class="color-theme text-uppercase font-700 font-10">Upload Foto KK</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div> -->
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<select id="form12ab" name="jenis_order" class="form-control validate-name">
						<option value="Express">Express</option>
						<option value="Reguler">Reguler</option>
					</select>
					<label for="form12ab" class="color-theme text-uppercase font-700 font-10">Paket</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<input type="text" id="form13ab" name="long" placeholder="Posisi Longtitude" class="form-control bg-light validate-name Long" readonly="">
					<label for="form13ab" class="color-theme text-uppercase font-700 font-10">Posisi Longtitude</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<input type="text" id="form14ab" name="lat" placeholder="Posisi Latitude" class="form-control bg-light validate-name Lat" readonly="">
					<label for="form14ab" class="color-theme text-uppercase font-700 font-10">Posisi Latitude</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<p id="tampilkan"></p>
					<a href="#" class="btn-sm btn-primary ActGetLocation">Get Posisi Sekarang</a>
				</div>
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<div id="mapcanvas"></div>
				</div>
				
				<div class="input-style input-style-always-active has-borders no-icon validate-field mt-4">
					<button type="submit" name="submit" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-900 shadow-s bg-blue-dark">KIRIM</button>
				</div>
			</form>
		</div>
		<div class="divider divider-margins opacity-90"></div>

	</div>

	<script type="text/javascript">
		$(document).ready(() => {
			$(`.ActGetLocation`).on('click', function(event) {
				return getLocation();
			});

			var view = document.getElementById("tampilkan");
			var positionOptions = {
				enableHighAccuracy: true,
				timeout: 10000000,
				maximumAge: 500
			}

			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPositionTambah, showError, positionOptions);
				} else {
					view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
				}
			}

			function showPositionTambah(position) {
				lat = position.coords.latitude;
				lon = position.coords.longitude;

				$(`.Long`).val(lon);
				$(`.Lat`).val(lat);

				latlon = new google.maps.LatLng(lat, lon)
				mapcanvas = document.getElementById('mapcanvas')
				mapcanvas.style.height = '300px';
				mapcanvas.style.width = '360px';

				var myOptions = {
					center:latlon,
					zoom:14,
					mapTypeId:google.maps.MapTypeId.ROADMAP
				}

				var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
				var marker = new google.maps.Marker({
					position:latlon,
					animation: google.maps.Animation.BOUNCE,
					map:map,
					title:"Disini!"
				});
			}

			function showError(error) {
				switch(error.code) {
					case error.PERMISSION_DENIED:
					view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
					break;
					case error.POSITION_UNAVAILABLE:
					view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
					break;
					case error.TIMEOUT:
					view.innerHTML = "Requestnya timeout bro"
					break;
					case error.UNKNOWN_ERROR:
					view.innerHTML = "An unknown error occurred."
					break;
				}
			}
		});
	</script>
