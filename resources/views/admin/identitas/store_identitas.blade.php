<div id="modal-tambah-identitas" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php
            if ($user->level == 1) {
            ?>
                <form action="{{ url('admin/pegawai-admin/store') }}" method="POST" enctype="multipart/form-data">
                <?php
            } else { ?>
                    <form action="{{ url('admin/pegawai/store') }}" method="POST" enctype="multipart/form-data">
                    <?php
                }
                    ?>
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Pegawai</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        @csrf
                        <div class="col-span-12 sm:col-span-12">
                            <label for="nik" class="form-label">NIK</label>
                            <input name="nik" type="number" class="form-control" placeholder="NIK KTP" required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control" id="nama_pegawai" onkeyup="myFunction()" placeholder="Nama Lengkap (Diisi Tanpa Gelar)" required>
                        </div>
                        <!-- <div class="col-span-12 sm:col-span-12">
                        <label>Apakah terdaftar saat pendataan Non ASN Tahun 2022?</label>
                        <div class="form-check mr-2">
                            <input id="pendataan_2022" class="form-check-input" type="radio" name="pendataan_2022" value="1" required>
                            <label class="form-check-label" for="radio-switch-1">Ya</label>
                        </div>
                        <div class="form-check mr-2 mt-2 sm:mt-0">
                            <input id="pendataan_2022" class="form-check-input" type="radio" name="pendataan_2022" value="0">
                            <label class="form-check-label" for="radio-switch-1">Tidak</label>
                        </div>
                    </div> -->
                        <input name="pendataan_2022" type="hidden" class="form-control" value="3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="skpd_id" class="form-label">Perangkat Daerah</label>
                            <?php
                            if ($user->level == 1) {
                            ?>
                                <select name="skpd_id" class="form-control">
                                    <option>-- Semua OPD --</option>
                                    @foreach ($skpd as $skpds)
                                    <option value="{{ $skpds->id }}" <?= $_GET['skpd_id'] == $skpds->id ? "selected" : ""; ?>>{{ $skpds->nama_skpd }}</option>
                                    @endforeach
                                </select>
                            <?php
                            } else { ?>
                                <input name="skpd_id" type="hidden" class="form-control" value="{{ Auth::user()->skpd_id }}">
                                <input name="skpd" type="text" class="form-control" value="{{ Auth::user()->skpd->nama_skpd }}" readonly>
                            <?php
                            }
                            ?>
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