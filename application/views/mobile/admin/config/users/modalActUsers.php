<!-- Modal Add Edit -->
<div id="modalActUsersId" class="modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="titleModalUsersId"></span> Data Users</h5>
                <button class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form id="formActUsersId" class="formActUsersClass" novalidate>
                <input type="hidden" name="typeForm" id="typeForm">
                <input type="hidden" name="userId" id="userId">
                <div class="modal-body">
                    <div class="row">
                        <lable class="col-md-12 font-weight-bold">
                            Akses Users
                        </lable>
                        <div class="col-md-12">
                                <select class="form-control" id="levelUser" name="levelUser" required>
                                    <option value="">Pilih Akses Users</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Penilai</option>
                                    <option value="3">Tamu</option>
                                </select>
                            <div class="invalid-feedback">
                                <i class="fa-solid fa-info-circle"></i> Akses Users Wajib Di isi.
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