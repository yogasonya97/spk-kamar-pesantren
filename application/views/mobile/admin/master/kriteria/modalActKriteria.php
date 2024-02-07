<!-- Modal Add Edit -->
<div id="modalActKriteriaId" class="modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="titleModalKriteriaId"></span> Data Kriteria</h5>
                <button class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form id="formActKriteriaId" class="formActKriteriaClass" novalidate>
                <input type="hidden" name="typeForm" id="typeForm">
                <input type="hidden" name="kriteriaId" id="kriteriaId">
                <div class="modal-body">
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Kode Kriteria
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="kodeKriteria" name="kodeKriteria" class="form-control" placeholder="Masukkan Kode Kriteria*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Kode Kriteria Wajib Di isi.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Nama Kriteria
                        </lable>
                        <div class="col-md-12">
                            <input type="text" id="namaKriteria" name="namaKriteria" class="form-control" placeholder="Masukkan Kode Kriteria*" required>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Nama Kriteria Wajib Di isi.
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