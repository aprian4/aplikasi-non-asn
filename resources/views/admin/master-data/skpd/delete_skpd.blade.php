<div id="modal-hapus-skpd" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/admin/skpd/delete') }}" method="POST" enctype="multipart/form-data">
                <!-- BEGIN: Modal Header -->
                <div class="modal-body p-0">
                    <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Yakin?</div>
                        <div class="text-slate-500 mt-2">Akan menghapus data skpd ini?</div>
                        @csrf
                        <input name="id" type="hidden" class="form-control hapus_id_skpd">
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> <button type="submit" class="btn btn-danger w-24">Delete</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>