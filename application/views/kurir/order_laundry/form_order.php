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
		
		<h4>Form Order <?php echo $id_order; ?> </h4>
		<p>
			
		</p>
		<form action="<?php echo base_url();?>kurir/tambahOrderDetails" class="ModalAjax" method="post" accept-charset="utf-8">
			
				<input type="hidden" name="id_order" value="<?php echo $id_order;?>">
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
				<input type="text" id="form12ab" name="jenis_order" placeholder="Jenis Order" class="form-control bg-light validate-name JenisOrder" value="<?php echo $dataOrderByIdOrder->jenis_order;?>" readonly="">
					<label for="form12ab" class="color-theme text-uppercase font-700 font-10">Jenis Order</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<select id="form12ab" name="id_jenis_laundry" id="id_jenis_laundry" class="form-control validate-name JenisLaundry" required>
						<option value="" style="font-weight:bold;color:black;">Pilih Jenis Laundry</option>
						<?php foreach($allJenis_Laundry as $jenis) { ?>
							<option value="<?php echo $jenis['id_jenis_laundry']; ?>" style="font-weight:bold;color:black;"><?php echo $jenis['nama_jenis_laundry']; ?></option>
						<?php } ?>
					</select>
					<label for="form12ab" class="color-theme text-uppercase font-700 font-10">Jenis Laundry</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				<!-- <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<input type="text" id="form13ab" name="harga_kilo" placeholder="Harga Perkilo" class="form-control bg-light validate-name DiscountKilo" readonly="">
					<label for="form13ab" class="color-theme text-uppercase font-700 font-10">Discount Perkilo</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div> -->
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<input type="text" id="form14ab" name="harga_kilo" placeholder="Harga Perkilo" class="form-control bg-light validate-name HargaKilo" readonly="">
					<label for="form14ab" class="color-theme text-uppercase font-700 font-10">Harga Perkilo</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<input type="number" id="form15ab" name="berat_laundry" min="1" placeholder="Berat Laundry" class="form-control validate-name BeratLaundry" value="1" required>
					<label for="form15ab" class="color-theme text-uppercase font-700 font-10">Berat Laundry</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
					<input type="text" id="form16ab" name="total_harga" placeholder="Total Harga" class="form-control bg-light validate-name TotalHarga" readonly="">
					<label for="form16ab" class="color-theme text-uppercase font-700 font-10">Total Harga</label>
					<i class="fa fa-times disabled invalid color-red-dark"></i>
					<i class="fa fa-check disabled valid color-green-dark"></i>
					<em>(required)</em>
				</div>
				
				<div class="input-style input-style-always-active has-borders no-icon validate-field mt-4">
					<button type="submit" name="submit" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-900 shadow-s bg-blue-dark">Kirim</button>
				</div>
			</form>
		</div>
		<div class="divider divider-margins opacity-90"></div>

	</div>

	<script type="text/javascript">
		$(document).ready(() => {
			let jenis_order = $(`.JenisOrder`).val();
			let id_jenis_laundry = $(`.JenisLaundry`).val();
			var berat_laundry = $(`.BeratLaundry`).val();
			$.getJSON(`<?= base_url('kurir/getHargaJenisLaundry'); ?>/${id_jenis_laundry}`, function(data) {
				$.getJSON(`<?= base_url('kurir/getBeratLaundryUserPelanggan'); ?>/<?php echo $id_user_pelanggan; ?>`, function(msg) {
						let dataBerat = msg[0].jml_berat;
						// console.log('jenis_order',jenis_order);
						if (jenis_order == `Express`) {
							if (dataBerat >=50 && dataBerat <=99) {
								var harga_laundry_kg_sementara = parseInt(data.harga_laundry_kg)+2000;
								var discount = harga_laundry_kg_sementara*0.05;
								var harga_laundry_kg = (harga_laundry_kg_sementara-discount);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
								
								// var total_harga = (total_harga_sementara-discount);
							}else if (dataBerat >=100) {
								var harga_laundry_kg_sementara = parseInt(data.harga_laundry_kg)+2000;
								var discount = harga_laundry_kg_sementara*0.1;
								var harga_laundry_kg = (harga_laundry_kg_sementara-discount);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
								
								// var total_harga = (total_harga_sementara-discount);
							}else {
								var harga_laundry_kg = parseInt(data.harga_laundry_kg)+2000;
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
							}
							
						} else {
							if (dataBerat >=50 && dataBerat <=99) {
								var harga_laundry_kg_sementara = parseInt(data.harga_laundry_kg);
								var discount = harga_laundry_kg_sementara*0.05;
								var harga_laundry_kg = (harga_laundry_kg_sementara-discount);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
								// var discount = harga_laundry_kg*0.2;
								// var total_harga = (total_harga_sementara-discount);
							}else if (dataBerat >=100) {
								var harga_laundry_kg_sementara = parseInt(data.harga_laundry_kg);
								var discount = harga_laundry_kg_sementara*0.1;
								var harga_laundry_kg = (harga_laundry_kg_sementara-discount);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
								// var discount = harga_laundry_kg*0.2;
								// var total_harga = (total_harga_sementara-discount);
							}else {
								var harga_laundry_kg = parseInt(data.harga_laundry_kg);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
							}
							
						}
						
						$( ".HargaKilo" ).val(harga_laundry_kg);
						// $(`.DiscountKilo`).val(discount);
						$( ".TotalHarga" ).val(total_harga);

						
						// console.log(dataBerat);
					});
			});

			$( ".JenisLaundry" ).on('change', function(event){
				event.preventDefault();
				let id_jenis_laundry = $(this).val();
				var berat_laundry = $(`.BeratLaundry`).val();
				var jenis_order = $(`.JenisOrder`).val();
				loadDataOrder(berat_laundry,jenis_order,id_jenis_laundry);
           	});

			$( ".BeratLaundry" ).on('keyup', function(event){
               event.preventDefault();
               var berat_laundry = $(this).val();
               var jenis_order = $('.JenisOrder').val();
               var id_jenis_laundry = $('.JenisLaundry').val();
			   loadDataOrder(berat_laundry,jenis_order,id_jenis_laundry);
		   	});
		   
		   function loadDataOrder(berat_laundry,jenis_order,id_jenis_laundry)
		   {
			$.getJSON(`<?= base_url('kurir/getHargaJenisLaundry'); ?>/${id_jenis_laundry}`, function(data) {
				$.getJSON(`<?= base_url('kurir/getBeratLaundryUserPelanggan'); ?>/<?php echo $id_user_pelanggan; ?>`, function(msg) {
						let dataBerat = msg[0].jml_berat;
						// console.log('jenis_order',jenis_order);
						if (jenis_order == `Express`) {
							if (dataBerat >=50) {
								var harga_laundry_kg_sementara = parseInt(data.harga_laundry_kg)+2000;
								var discount = harga_laundry_kg_sementara*0.2;
								var harga_laundry_kg = (harga_laundry_kg_sementara-discount);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
								
								// var total_harga = (total_harga_sementara-discount);
							}else {
								var harga_laundry_kg = parseInt(data.harga_laundry_kg)+2000;
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
							}
							
						} else {
							if (dataBerat >=50) {
								var harga_laundry_kg_sementara = parseInt(data.harga_laundry_kg);
								var discount = harga_laundry_kg_sementara*0.2;
								var harga_laundry_kg = (harga_laundry_kg_sementara-discount);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
								// var discount = harga_laundry_kg*0.2;
								// var total_harga = (total_harga_sementara-discount);
							}else {
								var harga_laundry_kg = parseInt(data.harga_laundry_kg);
								var total_harga = parseInt(harga_laundry_kg)*parseInt(berat_laundry);
							}
							
						}
						
						$( ".HargaKilo" ).val(harga_laundry_kg);
						// $(`.DiscountKilo`).val(discount);
						$( ".TotalHarga" ).val(total_harga);

						
						// console.log(dataBerat);
					});
			});
		   }
		});
	</script>
