<div id="modal-hapus-identitas" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/admin/pegawai/delete') }}" method="POST" enctype="multipart/form-data">
                <!-- BEGIN: Modal Header -->
                <div class="modal-body p-0">
                    <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Yakin?</div>
                        <div class="text-slate-500 mt-2">Akan menghapus data pegawai ini?</div>
                        @csrf
                        <input name="id" type="hidden" class="form-control hapus_id_identitas">
                        <input name="nama" type="hidden" class="form-control hapus_nama_identitas">
                        <input name="pendataan_2022" type="hidden" class="form-control hapus_pendataan_2022">
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> <button type="submit" class="btn btn-danger w-24">Delete</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>