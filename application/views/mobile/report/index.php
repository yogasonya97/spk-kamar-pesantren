<!-- Categories Swiper -->
<!-- <div class="title-bar mb-0">
	<h5 class="title">Data Kamar</h5>
</div> -->

<div class="row">
	<div class="col-md-6">
		<select class="form-control" name="filterPer" id="filterPer">
			<option value="">Pilih</option>
			<option value="1">Per Bulan</option>
			<option value="2">Per Tahun</option>
		</select>
	</div>
	<div class="col-md-6">
		<div class="form-group row">
			<div class="col-md-6">
				<?php $getMonth = date('m');  ?>
				<select class="form-control" name="bulan" id="filterBulan" style="display:none">
					<option value="">Pilih Bulan</option>
					<option value="01" <?= $getMonth == '01' ? 'selected' : '' ?>>Januari</option>
					<option value="02" <?= $getMonth == '02' ? 'selected' : '' ?>>Februari</option>
					<option value="03" <?= $getMonth == '03' ? 'selected' : '' ?>>Maret</option>
					<option value="04" <?= $getMonth == '04' ? 'selected' : '' ?>>April</option>
					<option value="05" <?= $getMonth == '05' ? 'selected' : '' ?>>Mei</option>
					<option value="06" <?= $getMonth == '06' ? 'selected' : '' ?>>Juni</option>
					<option value="07" <?= $getMonth == '07' ? 'selected' : '' ?>>Juli</option>
					<option value="08" <?= $getMonth == '08' ? 'selected' : '' ?>>Agustus</option>
					<option value="09" <?= $getMonth == '09' ? 'selected' : '' ?>>September</option>
					<option value="10" <?= $getMonth == '10' ? 'selected' : '' ?>>Oktober</option>
					<option value="11" <?= $getMonth == '11' ? 'selected' : '' ?>>November</option>
					<option value="12" <?= $getMonth == '12' ? 'selected' : '' ?>>Desember</option>
				</select>
			</div>
			<div class="col-md-6">
				<input type="number" name="tahun" id="filterTahun" class="form-control" placeholder="" value="<?= date('Y') ?>" style="display:none">
			</div>
		</div>
	</div>
	<div class="col-md-12 mt-4">
		<button type="button" id="cetakRank" class="btn btn-success btn-sm">Cetak</button>
	</div>
	<div class="col-md-12 mt-4">
		<ul class="featured-list" id="listRankKamarPerFilter">
		</ul>
	</div>
</div>

<script>
	let parentUrl = `/report/rank`;
	const setListRankKamar = async (data) => {
		try {
			let html = urutkanRankTerbesar(data).map((v, i) => {
				let index = i + 1;
				let content = '';
				if (index <= 3) {
					content = `
						<li>
							<div class="dz-card list">
								<div class="dz-media border bg-primary rounded">
									<a href="product-detail.html"><img src="<?= base_url() ?>assets/mobile/assets/images/icon/door.png"
										alt="" /></a>
									<div class="dz-rating w-100 text-center" style="left:0;">Juara ${i + 1}</div>
								</div>
								<div class="dz-content">
									<ul class="dz-meta">
										<li class="dz-price flex-1 text-secondary" style="font-size: 12px;">${v.namaAsrama} (${v.jenisKamar == 'A' ? 'Akhwat':'Ikhwan'})</li>
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
			$(`#listRankKamarPerFilter`).html(html);
		} catch (error) {
			console.log();
		}
	}

	const filterKamarPerMonth = async() => {
		try {
			const {data} = await axios.get(`/report/rank/filter-per-month`, {
				params:{
					filterBulan: $(`#filterBulan`).val(),
					filterTahun: $(`#filterTahun`).val()
				}
			});
			setListRankKamar(data);
			return data;
		} catch (error) {
			console.log(error);
		}
	}

	const filterKamarPerYear = async() => {
		try {
			const {data} = await axios.get(`/report/rank/filter-per-year`, {
				params:{
					filterTahun: $(`#filterTahun`).val()
				}
			});	
			setListRankKamar(data);
			return data;
		} catch (error) {
			console.log(error);
		}
	}

	const showFilterBulan = (sts) => {
		if (!sts) {
			$(`#filterBulan`).hide();
			return 
		}
		$(`#filterBulan`).show();
	}

	const showFilterTahun = (sts) => {
		if (!sts) {
			$(`#filterTahun`).hide();
			return 
		}
		$(`#filterTahun`).show();
	}

	const filterData = (e) => {
		let sts = $(e.target).val();
		let filterBulan = $(`#filterBulan`).val();
		let filterTahun = $(`#filterTahun`).val();
		if (sts == '1') {
			if (filterBulan && filterTahun) {
				filterKamarPerMonth();
			}
		}else {
			if (filterTahun) {
				filterKamarPerYear();
			}
		}

	}

	const changeFilter = () => {
		resetListContentRank()
		let filter = $(`#filterPer`).val();
		let filterBulan = $(`#filterBulan`).val();
		let filterTahun = $(`#filterTahun`).val();

		if (filter == '1') {
			if (filterBulan && filterTahun) {
				filterKamarPerMonth();
			}
		} else if (filter == '2') {
			if (filterTahun) {
				filterKamarPerYear();
			}
		}
	}

	const resetListContentRank = () => {
		$(`#listRankKamarPerFilter`).empty();
	}

	$(document).ready(function () {
		// setListRankKamarPerFilter();

		$(`#filterPer`).on('change', (e) => {
			resetListContentRank()
			let val = $(e.target).val();
			let filterBulan = $(`#filterBulan`).val();
			let filterTahun = $(`#filterTahun`).val();
			
			if (val == '1') {
				showFilterBulan(true);
				showFilterTahun(true);
				if (filterBulan && filterTahun) {
					filterKamarPerMonth();
				}
			} else if (val == '2') {
				showFilterBulan(false);
				showFilterTahun(true);
				if (filterTahun) {
					filterKamarPerYear();
				}
			}
		});

		$(`#filterBulan, #filterTahun`).on('change', (e) => {
			changeFilter();
		});
		
		$(`#filterTahun`).on('keyup', (e) => {
			changeFilter();
		});

		$(`#cetakRank`).on('click', (e) => {
			let elementFilter = $(`#filterPer`).val();
			let filterBulan = $(`#filterBulan`).val();
			let filterTahun = $(`#filterTahun`).val();

			let typePrint = '';

			if (elementFilter == '1') {
				typePrint = 1;
			} else {
				typePrint = 2;
			}
			
			if (elementFilter) {
				window.open(`/report/rank/cetak-pdf?typePrint=${typePrint}&filterBulan=${filterBulan}&filterTahun=${filterTahun}`, '_blank');
			}
		});

	})
</script>
<!-- Categories Swiper -->