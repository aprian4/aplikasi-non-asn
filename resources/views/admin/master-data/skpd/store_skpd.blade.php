<div id="modal-tambah-skpd" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('admin/skpd/store') }}" method="POST" enctype="multipart/form-data">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Tambah SKPD</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    @csrf
                    <div class="col-span-12 sm:col-span-12">
                        <label for="nama_skpd" class="form-label">Nama SKPD</label>
                        <input name="nama_skpd" type="text" class="form-control" placeholder="Nama SKPD" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="alias_skpd" class="form-label">Nama Alias</label>
                        <input name="alias_skpd" type="text" class="form-control" placeholder="Nama Alias" required>
                    </div>
                </div> <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div>