<div id="modal-hapus-rjabatan" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            if ($user->level == 1) {
            ?>
                <form action="{{ url('/admin/pegawai-admin/rjabatan/delete') }}" method="POST" enctype="multipart/form-data">
                <?php
            } else { ?>
                    <form action="{{ url('/admin/pegawai/rjabatan/delete') }}" method="POST" enctype="multipart/form-data">
                    <?php
                }
                    ?>
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Yakin?</div>
                            <div class="text-slate-500 mt-2">Akan menghapus data Riwayat Jabatan ini?</div>
                            @csrf
                            <input name="id" type="hidden" class="form-control hapus_id_rjabatan">
                            <input name="spk_id" type="hidden" class="form-control hapus_spk_id">
                            <input name="ledger_id" type="hidden" class="form-control hapus_ledger_id">
                            <input name="identitas_id" type="hidden" class="form-control hapus_identitas_id">
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> <button type="submit" class="btn btn-danger w-24">Delete</button> </div>
                    </div>
                    </form>
        </div>
    </div>
</div>