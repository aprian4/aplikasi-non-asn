<div id="modal-edit-skpd" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/admin/skpd/update') }}" method="POST" enctype="multipart/form-data">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Ubah SKPD</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    @csrf
                    <div class="col-span-12 sm:col-span-12">
                        <label for="nama" class="form-label">Nama SKPD</label>
                        <input name="id" type="hidden" class="form-control ubah_id_skpd">
                        <input name="nama_skpd" type="text" class="form-control ubah_nama_skpd" placeholder="Nama SKPD" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="alias_skpd" class="form-label">Alias SKPD</label>
                        <input name="alias_skpd" type="text" class="form-control ubah_alias_skpd" placeholder="Alias SKPD" required>
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