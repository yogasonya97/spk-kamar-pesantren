<style>
	input[type="number"] {
		-webkit-appearance: textfield;
		-moz-appearance: textfield;
		appearance: textfield;
	}

	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
	}

	#imagePreview {
        width: 200px;
        height: 200px;
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        margin-top: 10px;
		margin-bottom: 20px;
		display: none;
    }
    #imagePreview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<div class="row">
	<div class="col-md-12">
		<div class="dz-categories-bx mb-3 bg-primary">
			<div class="dz-content w-100 d-flex justify-content-between align-items-center">
				<div>
					<h4 class="title text-white">
						<?= $detailKamar->namaKamar ?>
					</h4>
					<h6 class="menus text-white">
						<?= $detailKamar->namaAsrama ?> (
						<?= $detailKamar->namaPembina ?> )
					</h6>
				</div>
			</div>
		</div>
		<h6>Form Entry Nilai</h6>
		<form id="formEntryKamar" class="validation-form-kamar" novalidate>
			<?php foreach ($kriteria as $key => $item): ?>
				<div class="mb-3">
					<label class="form-label">
						<?= $item->namaKriteria ?>
					</label>
					<div class="input-group">
						<span class="input-group-text" style="width:80%;">
							<input type="range" value="0" min="0" max="100" class="form-range" id="inputRange_<?= $key ?>"
								oninput="handleChangeEntry(this.value, <?= $key ?>)" required>
						</span>
						<input type="number" max="100" min="0" value="0" class="form-control h-100 text-center"
							name="nilai[<?=$item->kriteriaId;?>]" oninput="handleChangeEntry(this.value, <?= $key ?>)" onfocus="this.select()"
							id="outputRange_<?= $key ?>" required>
					</div>
				</div>
			<?php endforeach; ?>
			<div class="mb-3">
				<label for="catatanNilai" class="form-label">Masukkan Catatan</label>
				<textarea class="form-control" id="catatanNilai" name="notes" rows="3" required></textarea>
			</div>
			<div class="mb-3">
				<label for="fileInput" class="form-label">Upload Gambar <br> <span style="font-size:10px">Ukuran gambar
						maksimal 2 Mb dan Hanya tipe file .jpg/.png</span></label>
				<input class="form-control" type="file" id="fileInput" name="fileInput" accept="image/jpg, image/png" required>
			</div>
			<div id="imagePreview"></div>
			<button type="submit" class="btn btn-primary w-100 gap-2"><i class="fa fa-save"></i> Simpan</button>
		</form>
	</div>
</div>

<script>
	let kamarIdG = '<?= $kamarId ?>';
	
	const handleChangeEntry = (value, index) => {

		$(`#outputRange_${index}`).val(value);
		$(`#inputRange_${index}`).val(value);
	}

	const saveNilaiKamar = async(formData) => {
		try {
			const {data} = await axios.post(`/client/nilai/save-nilai-kamar`,formData,{
				headers: {
					'Content-Type': 'multipart/form-data'
				}
			});
			return data;
		} catch (error) {
			console.log(error);
		}
	}

	$(document).ready(async function () {
		$(`#formEntryKamar`).submit(async (e) => {
			e.preventDefault();
			const form = document.getElementById('formEntryKamar');
       		const formData = new FormData(form);
			formData.append('kamarId', kamarIdG);

			validationForm(e, () => {
				swalConfirm('Anda yakin ?', async() => {
					const res = await saveNilaiKamar(formData);
					responCheck(res, () => {
						setTimeout(() => {
							window.location.href = `<?= base_url() ?>client/nilai`;
						}, 1000);
					});
				}, `Pastikan terlebih dahulu data benar, karena data tidak bisa di ubah`)
			}, `validation-form-kamar`);
		});

		$('#fileInput').change(function(){
            var file = this.files[0];
            var fileSize = file.size; // Ukuran file dalam bytes
            var fileType = file.type; // Jenis file
            
            // Maksimal 2MB
            var maxSize = 10 * 1024 * 1024; // Konversi MB ke bytes
            // Pemeriksaan ukuran file dan jenis file
            if (fileSize <= maxSize && (fileType === 'image/jpeg' || fileType === 'image/png')) {				
				$('#imagePreview').show();
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Ketika gambar berhasil dibaca, kita akan menampilkan preview gambar
                    $('#imagePreview').html('<img src="' + e.target.result + '">');
					toast.success('Berhasil upload gambar.');
                }

                // Membaca file sebagai URL data
                reader.readAsDataURL(file);
            } else {
                // Jika tidak memenuhi syarat, memberikan pesan kesalahan               
				toast.danger('Please select a JPEG or PNG file, maximum size is 2MB.');
                // Mengosongkan input file
                $('#fileInput').val('');
                // Membersihkan preview gambar
                $('#imagePreview').html('');
				$('#imagePreview').hide();
            }
        });
	});

</script>
