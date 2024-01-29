<div class="page-content">
	<div class="page-subtitle">
		<h1>Detail<br> Order Laundry</h1>
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
		
		
		<?php foreach ($getDetailOrderLaundry as $dataDetailOrder) {
			$id_order = $dataDetailOrder['id_order'];
			$lat_kurir = $dataDetailOrder['lat_kurir'];
			$long_kurir = $dataDetailOrder['long_kurir'];
		} ?>

		<h3>Detail Order</h3>
		<table width="100%" border="0">
			<tr>
				<td>No.Invoice </td>
				<td>:</td>
				<td><?php echo $id_order; ?></td>
			</tr>
			<tr>
				<td>Nama Pelanggan </td>
				<td>:</td>
				<td><?php echo $namaPelanggan; ?></td>
			</tr>
			<tr>
				<td>Status </td>
				<td>:</td>
				<td><?php echo $dataDetailOrder['nama_status_order']; ?></td>
			</tr>
			<tr>
				<td>Akumulasi Berat Laundry </td>
				<td>:</td>
				<td><?php echo $akumulasi->jml_berat; ?> Kg</td>
			</tr>
			<tr>
				<td>Diskon/Kg </td>
				<td>:</td>
				<?php if($akumulasi->jml_berat>=50){ ?>
				<td>20% / Kg</td>
				<?php }else { ?>
				<td>-</td>
				<?php } ?>
			</tr>
		</table>
		<div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
			<p id="tampilkan"></p>
			
			
			<!-- <a href="#" class="btn-sm btn-primary ActGetLocationKurir">Lihat Posisi</a> --> 
			<div class="table-responsive">
				<table id="example3" class="table table-bordered display" width="100%">
					<thead>
						<tr>                                           
							<th>Jenis Laundry</th>
							<th>Berat</th>
							<th>Harga/kg</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody id="rincianBody">
					</tbody>
					<tfoot id="footRincian">
					</tfoot>
				</table>
			</div>
		</div>
		<p><h4>Lokasi Kurir</h4></p>
		<p>Nama Kurir :&nbsp;<?php echo $dataDetailOrder['nama_kurir'];?> <br>
		No.Hp :&nbsp;<?php echo $dataDetailOrder['telp_kurir'];?></p>
	
		<a href="http://maps.google.com/maps?daddr=<?php echo $lat_kurir;?>,<?php echo $long_kurir;?>&amp;ll=" class="btn-sm btn-primary">Arahkan!</a></p>
		<div id="mapcanvas" style="width:360px;height:300px"></div>
	</div>
	<div class="divider divider-margins opacity-90"></div>

</div>

<script type="text/javascript">
	var mapMarker = function(latlog) {
		$.getJSON(`<?php echo base_url();?>pelanggan/getPositionKurirByIdOrder/<?php echo $id_order;?>`, function(data) {
			lat = data[0].lat_kurir;
			lon = data[0].long_kurir;

			latlog = new google.maps.LatLng(lat, lon);
			mapOptions = {
				center:latlog,
				zoom:18,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			}
			var maps = new google.maps.Map(document.getElementById("mapcanvas"), mapOptions);
			var imageURL= "<?php echo base_url(); ?>assets/pin/pin.png"; 
			var pinImage = new google.maps.MarkerImage(imageURL,
				new google.maps.Size(30, 30),
				new google.maps.Point(0,0),
				new google.maps.Point(10, 34)); 
			var marker = new google.maps.Marker({
				position:latlog,
				animation: google.maps.Animation.BOUNCE,
				map:maps,
				icon: pinImage,
				title:"Disini!"
			});
		});
	}
	google.maps.event.addDomListener(window, 'load', mapMarker);

	function dataDetailOrder() {
		$.getJSON(`<?= base_url('pelanggan/getDataOrderDetail'); ?>/<?php echo $id_order; ?>`, function(response) {
			data = response.data;
			// console.log('rinci',data.length);
			let rincian = [];
			let footRincian = [];
            // let total = [];
            
            // var sumTotalBayar = 0;
            if (data.length==0) {
            	rincian.push(`<tr><th colspan="4"><center>Belum Ada Pesanan</center></th></tr>`);
            	totalBayar = 0;
            }else if (data.length!=0) {
            	$.each(data, function(index, val) {
            		var jenisOrder = val.jenis_order;
            		if (jenisOrder == 'Express') {
            			var berat = parseInt(val.berat_laundry);
            			var hargaPerKilo = parseInt(val.harga_laundry_kg)+2000;
            			var totalHarga = berat*hargaPerKilo;
            		} else {
            			var berat = val.berat_laundry;
            			var hargaPerKilo = val.harga_laundry_kg;
            			var totalHarga = berat*hargaPerKilo;
            		}

            		rincian.push(`
            			<tr>
            			<th>${val.nama_jenis_laundry}</th>
            			<th>${berat} KG</th>
            			<th>Rp.${hargaPerKilo}</th>
            			<th>Rp.${totalHarga}</th>
            			</tr>
            			`);

            		totalBayar = val.total_bayar;


            	});
            }
            // sum += Number(total.join(""));

            footRincian.push(`
            	<tr>
            	<th colspan="3">Total Harga Keseluruhan</th>
            	<th>Rp.${totalBayar}</th>
            	</tr>
            	`);

            $( "#rincianBody" ).html(rincian.join( "" ));
            $( "#footRincian" ).html(footRincian.join( "" ));
        });
	}

	window.onload = dataDetailOrder();

	$(document).ready(() => {
		$(`.ActGetLocationKurir`).on('click', function(event) {
			return mapMarker();
		});

		setInterval(`mapMarker()`, 10000);
		
	});
</script>
