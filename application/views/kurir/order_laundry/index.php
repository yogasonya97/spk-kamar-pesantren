
<div class="page-content">
	<div class="page-subtitle">
		<h1>Order<br> Laundry</h1>
		<a href="#" class="page-subtitle-icon show-on-theme-light" data-toggle-theme><i class="fa fa-moon color-theme"></i></a>
		<a href="#" class="page-subtitle-icon show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
		<!-- <a href="#" class="page-subtitle-icon" data-menu="menu-main"><i class="fa fa-bars color-theme"></i></a> -->
	</div>
	
	<div class="content mt-n3">
		<p>
			Pesan Laundry <?php echo $id_user; ?>
		</p>
	</div>
		
	<?php foreach ($getOrderLaundry->result_array() as $listOrder) { ?>
		<div class="list-group list-custom-large px-3 check-visited">
			<a href="<?php echo base_url(); ?>kurir/detail_order/<?php echo $listOrder['id_order']; ?>" aria-expanded="false">
				<i class="fa fa-file bg-yellow-dark rounded-xl shadow-xl"></i>
				<span>Pesanan <?php echo $listOrder['id_order']; ?></span>
				<strong>Tgl : <?php echo $listOrder['tgl_order']; ?> | Status : <?php echo $listOrder['nama_status_order'];?></strong>
				<!-- <strong>Status : Menunggu Konfirmasi</strong> -->
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
	<?php } ?>
		
	<div class="divider divider-margins opacity-90"></div>

</div>