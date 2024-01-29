<div class="page-content">
	<div class="page-subtitle">
		<h1>Permohonan<br> Surat</h1>
		<!-- <a href="#" class="page-subtitle-icon show-on-theme-light" data-toggle-theme><i class="fa fa-moon color-theme"></i></a>
		<a href="#" class="page-subtitle-icon show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
		<a href="#" class="page-subtitle-icon" data-menu="menu-main"><i class="fa fa-bars color-theme"></i></a> -->
	</div>
	<div class="content">
		<h4>List Permohonan Surat</h4>
		<p>
			Daftar Permohonan Suratmu
		</p>
		<div class="table-responsive">
			<table class="table table-borderless text-center" style="overflow: hidden;">

				<thead>
					<tr class="bg-blue-dark">
						<th scope="col" class="color-white">Tgl. Surat</th>
						<th scope="col" class="color-white">No. Antrian</th>
						<th scope="col" class="color-white">Kategori Surat</th>
						<th scope="col" class="color-white">Nama Surat</th>
						<th scope="col" class="color-white">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($getAdministrasiSurat as $a) {?>
						<tr>
							<td scope="row" class="color-white"><?php echo $a['tgl_pengajuan']; ?></td>
							<td scope="row" class="color-white"><?php echo $a['no_antrian']; ?></td>
							<td scope="row" class="color-white"><?php echo $a['jenis_surat']; ?></td>
							<td scope="row" class="color-white"><?php echo $a['nama_surat']; ?></td>
							<?php if ($a['status']=='Selesai') { ?>
								<td scope="row" class="color-green-dark"><?php echo $a['status']; ?></td>
							<?php } elseif ($a['status']=='Menunggu') { ?>
								<td scope="row" class="color-yellow-dark"><?php echo $a['status']; ?></td>
							<?php } elseif ($a['status']=='Disetujui') {?>
								<td scope="row" class="color-blue-dark"><?php echo $a['status']; ?></td>
							<?php } ?>

						</tr>
					<?php } ?>
				</tbody>
			</table></div>
		</div>

	</div>


