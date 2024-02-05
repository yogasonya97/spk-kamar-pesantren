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
                            Kode Kamar
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="kodeKamar" name="kodeKamar" class="form-control" placeholder="Masukkan Kode Kamar*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Kode Kamar Wajib Di isi.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Nama Kamar
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="namaKamar" name="namaKamar" class="form-control" placeholder="Masukkan Kode Kamar*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Nama Kamar Wajib Di isi.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Nama Alias Kamar
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="aliasKamar" name="aliasKamar" class="form-control" placeholder="Masukkan Kode Kamar*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Nama Alias Kamar Wajib Di isi.
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