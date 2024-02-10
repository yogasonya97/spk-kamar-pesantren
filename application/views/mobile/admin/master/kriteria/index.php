<!-- Categories Swiper -->
<!-- <div class="title-bar mb-0">
	<h5 class="title">Data Kriteria</h5>
</div> -->

<div class="row">
	<div class="col-md-12">
		<button onclick="addKriteriaModal()" class="btn btn-primary btn-sm float-end mb-4 add"><i class="fa-solid fa-add"></i>
			Kriteria</button>
	</div>
	<div class="col-md-12">
		<div class="search-box">
			<div class="input-group input-radius input-rounded input-lg">
				<input type="text" id="search-kriteria" placeholder="Cari Nama Kriteria" class="form-control">
				<span class="input-group-text">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M9.65925 19.3102C11.8044 19.3103 13.8882 18.5946 15.5806 17.2764L21.9653 23.6612C22.4423 24.1218 23.2023 24.1086 23.663 23.6316C24.1123 23.1664 24.1123 22.4288 23.663 21.9635L17.2782 15.5788C20.5491 11.3682 19.7874 5.30333 15.5769 2.03243C11.3663 -1.23848 5.30149 -0.476799 2.03058 3.73374C-1.24033 7.94428 -0.478646 14.0092 3.73189 17.2801C5.42702 18.5969 7.51269 19.3113 9.65925 19.3102ZM4.52915 4.5273C7.36245 1.69394 11.9561 1.69389 14.7895 4.5272C17.6229 7.3605 17.6229 11.9542 14.7896 14.7876C11.9563 17.6209 7.36261 17.621 4.52925 14.7877C4.5292 14.7876 4.5292 14.7876 4.52915 14.7876C1.69584 11.9749 1.67915 7.39794 4.49181 4.56464C4.50424 4.55216 4.51667 4.53973 4.52915 4.5273Z"
							fill="#C9C9C9"></path>
					</svg>
				</span>
			</div>
		</div>
	</div>

	<div class="col-md-12" id="listKriteriaDiv">
	</div>
</div>

<script>
	let parentUrl = `/admin/master/kriteria`;
	let typeForm = '';
	let listKriteriaG = [];

	// Fungsi pencarian
	function filterFunction(e) {
		const inputPencarian = e.target.value.toLowerCase();
		// Filter dan tampilkan hasil pencarian
		const hasilPencarian = listKriteriaG.filter(item => item.namaKriteria.toLowerCase().includes(inputPencarian));
		setList(hasilPencarian)

	}

	const loadListKriteria = async () => {
		const { data } = await axios.get(`${parentUrl}/get-list-data-kriteria`);
		listKriteriaG = data;
		setList(data)
	}

	const setList = (data) => {
		const html = data.map((v) => {
			return ` 
				<div class="dz-categories-bx mb-3 align-items-center">
					<div class="icon-bx">
						<a href="products.html">
							<svg enable-background="new 0 0 48 48" height="24" viewBox="0 0 48 48" width="24"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="m30.1 47.5h-21.8c-.9 0-1.7-.7-1.9-1.6l-5.9-30.5c-.1-.6 0-1.2.4-1.6.4-.5.9-.7 1.5-.7h33.5c.6 0 1.1.3 1.5.7s.5 1 .4 1.6l-5.8 30.5c-.2.9-1 1.6-1.9 1.6zm-20.2-3.9h18.6l5.1-26.6h-28.8z"
									fill="#fff" />
								<path
									d="m31.3 42.3c-.5 0-1.1-.2-1.5-.7-.7-.8-.6-2.1.2-2.8 3.9-3.4 6.1-5.5 9-8.2 1-.9 2-1.9 3.2-3 1.8-1.7 1.4-3.4.9-4.2-.9-1.7-3.3-3.1-6.5-2.4-1.1.2-2.1-.4-2.3-1.5s.4-2.1 1.5-2.3c4.5-1 8.9.9 10.8 4.5 1.6 3 .9 6.4-1.8 8.9-1.2 1.1-2.2 2.1-3.2 3-2.8 2.6-5.2 4.9-9.1 8.3-.3.2-.7.4-1.2.4z"
									fill="#fff" />
								<path d="m9.3 10.1c-1.1 0-2-.9-2-2v-5.6c0-1.1.9-2 2-2s2 .9 2 2v5.7c-.1 1-.9 1.9-2 1.9z"
									fill="#fff" />
								<path d="m18.1 10.1c-1.1 0-2-.9-2-2v-5.6c0-1.1.9-2 2-2s2 .9 2 2v5.7c-.1 1-.9 1.9-2 1.9z"
									fill="#fff" />
								<path d="m26.9 10.1c-1.1 0-2-.9-2-2v-5.6c0-1.1.9-2 2-2s2 .9 2 2v5.7c-.1 1-.9 1.9-2 1.9z"
									fill="#fff" />
							</svg>
						</a>
					</div>
					<div class="dz-content w-100">
						<div class="row gap-2 justify-content-between gap-md-0">
							<div class="col-md-9">
								<h6 class="title fw-bold list-item">
									${v.namaKriteria}
								</h6>
								<span class="menus text-primary list-item">${v.kodeKriteria}</span>
							</div>
							<div class="col-md-3">
								<div class="d-flex gap-2">
									<button onclick="updateKriteriaModel('${v.kriteriaId}')" type="button" class="btn btn-warning btn-sm mr-3 edit"><i class="fa fa-edit"></i></button>
									<button onclick="deleteKriteria('${v.kriteriaId}')" type="button" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			`;
		});
		$(`#listKriteriaDiv`).html(html);
	}

	const addKriteriaModal = () => {
		typeForm = 'add';
		$(`#titleModalKriteriaId`).html(`Tambah`);
		$(`#typeForm`).val(typeForm);
		$(`#modalActKriteriaId`).modal('show');
	}

	const updateKriteriaModel = (id) => {
		typeForm = 'edit';
		$(`#titleModalKriteriaId`).html(`Edit`);
		$(`#typeForm`).val(typeForm);
		$(`#kriteriaId`).val(id);
		let getExist = Object.values(listKriteriaG).find(v => v.kriteriaId == id);
		$.each(getExist, (i, v) => {
			$(`#${i}`).val(v);
		});
		$(`#modalActKriteriaId`).modal('show');
	}

	const saveKriteria = async (e) => {
		try {
			let formData = $(`#formActKriteriaId`).serialize();
			const { data } = await axios.post(`${parentUrl}/save`, formData);
			return data;
		} catch (error) {
			console.log(error);
		}
	}

	const deleteKriteria = async (kriteriaId) => {
		try {
			const { data } = await axios.delete(`${parentUrl}/delete`, {
				params: {
					kriteriaId
				}
			});
			responCheck(data, () => {
				loadListKriteria();
			})
		} catch (error) {
			console.log(error);
		}
	}

	$(document).ready(function () {
		loadListKriteria();
		$('#search-kriteria').on('input', filterFunction);
		closeModal(`modalActKriteriaId`, () => {
			clearForm(`formActKriteriaId`, `formActKriteriaClass`);
		});
		$(`#formActKriteriaId`).submit(async (e) => {
			e.preventDefault();
			validationForm(e, async () => {
				const res = await saveKriteria(e);
				responCheck(res, () => {
					loadListKriteria();
					$(`#modalActKriteriaId`).modal('hide');
				});
			}, `formActKriteriaClass`)
		});
	});
</script>
<!-- Categories Swiper -->
