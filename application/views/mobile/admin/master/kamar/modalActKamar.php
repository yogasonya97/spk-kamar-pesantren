<!-- Modal Add Edit -->
<div id="modalActKamarId" class="modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="titleModalKamarId"></span> Data Kamar</h5>
                <button class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form id="formActKamarId" class="formActKamarClass" novalidate>
                <input type="hidden" name="typeForm" id="typeForm">
                <input type="hidden" name="kamarId" id="kamarId">
                <div class="modal-body">
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Jenis Kamar
                        </lable>
                        <div class="col-md-12">
                                <select class="form-control" id="jenisKamar" name="jenisKamar" required>
                                    <option value="">Pilih Jenis Kamar</option>
                                    <option value="A">Akhwat</option>
                                    <option value="I">Ikhwan</option>
                                </select>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Jenis Kamar Wajib Di isi.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Nama Asrama
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="namaAsrama" name="namaAsrama" class="form-control"
                                placeholder="Masukkan Nama Asrama*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Nama Asrama Wajib Di isi.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Nama Kamar
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="namaKamar" name="namaKamar" class="form-control"
                                placeholder="Masukkan Nama Kamar*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Nama Kamar Wajib Di isi.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Nama Musyrif
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="aliasKamar" name="aliasKamar" class="form-control"
                                placeholder="Masukkan Nama Musyrif*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Nama Musyrif Wajib Di isi.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Nama Pembina
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="namaPembina" name="namaPembina" class="form-control"
                                placeholder="Masukkan Nama Pembina*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Nama Pembina Wajib Di isi.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>