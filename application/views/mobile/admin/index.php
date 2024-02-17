<div class="dz-categories-bx mb-3 bg-primary">
	<div class="dz-content w-100 d-flex justify-content-between align-items-center">
		<div>
			<h6 class="title text-white">
				Jumlah seluruh
			</h6>
			<h6 class="menus text-white">pengguna</h6>
		</div>
		<h6 class="title text-white" style="font-size: 4em"><?= $totalClient; ?></h6>
	</div>
</div>
<div class="dz-categories-bx mb-5 bg-primary">
	<div class="dz-content w-100 d-flex justify-content-between align-items-center">
		<div>
			<h6 class="title text-white">
				Jumlah seluruh
			</h6>
			<h6 class="menus text-white">kamar</h6>
		</div>
		<h6 class="title text-white" style="font-size: 4em"><?= $totalKamar; ?></h6>
	</div>
</div>

<div class="title-bar">
	<h5 class="title">3 Kamar terbaik</h5>
	<a href="products.html"><?= $bulanIni; ?></a>
</div>

<ul class="featured-list" id="listRankKamarPerMonth">
</ul>
<script>
	const setListRankKamarPerMonth = async () => {
		try {
			const { data } = await axios.get(`/admin/get-rank-kamar-per-month`);
			let html = urutkanRankTerbesar(data).map((v, i) => {
				let index = i+1;
				let content = '';
				if (index <= 3) {
					content = `
						<li>
							<div class="dz-card list">
								<div class="dz-media border bg-primary rounded">
									<a href="javascript:void(0)"><img src="<?= base_url() ?>assets/mobile/assets/images/icon/door.png"
										alt="" /></a>
									<div class="dz-rating w-100 text-center" style="left:0;">Juara ${i+1}</div>
								</div>
								<div class="dz-content">
									<ul class="dz-meta">
										<li class="dz-price flex-1 text-secondary" style="font-size: 12px;">${v.namaAsrama}</li>
									</ul>
									<div class="dz-head">
										<h6 class="title">
											${v.namaKamar} (${v.pembinaKamar})
										</h6>
									</div>
									<div class="dz-body">
										<span class="text-primary">
											Score: ${v.jumlahNilai}
										</span>
									</div>
								</div>
							</div>
						</li>
					`;
				}
				return content;
			});
			$(`#listRankKamarPerMonth`).html(html);
		} catch (error) {
			console.log();
		}
	}

	$(document).ready(function () {
		setListRankKamarPerMonth();
	})
</script>