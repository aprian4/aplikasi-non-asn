<div id="modal-tambah-riwayat-pendidikan" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <?php
            if ($user->level == 1) {
            ?>
                <form action="{{ url('admin/pegawai-admin/rpendidikan') }}" method="POST" enctype="multipart/form-data">
                <?php
            } else { ?>
                    <form action="{{ url('admin/pegawai/rpendidikan') }}" method="POST" enctype="multipart/form-data">
                    <?php
                }
                    ?>
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Riwayat Pendidikan</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body">
                        @csrf
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-1">
                                <input name="id" type="hidden" value="{{ $identitas->id }}">
                                <input name="nama" type="hidden" value="{{ $identitas->nama }}">
                                <label for="no_ijazah" class="form-label">*Nomor Ijazah</label>
                            </div>
                            <div class="form-inline mt-4 col-span-5">
                                <input name="no_ijazah" type="text" class="form-control" placeholder="Nomor Ijazah" required>
                            </div>
                            <div class="form-inline mt-4 col-span-1">
                                <label for="tgl_ijazah" class="form-label">*Tanggal Ijazah</label>
                            </div>
                            <div class="form-inline mt-4 col-span-5">
                                <input name="tgl_ijazah" type="date" max="{{ date('Y-m-d') }}" class="form-control" placeholder="Tanggal Ijazah" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-1">
                                <label for="pendidikan_id" class="form-label">*Pendidikan</label>
                            </div>
                            <div class="form-inline mt-4 col-span-5">
                                <select name="pendidikan_id" class="form-control tom-select w-full" required>
                                    <option>-- Pilih Pendidikan --</option>
                                    @foreach ($pendidikan as $pendidikans)
                                    <option value="<?= $pendidikans->id ?>">{{ $pendidikans->jenjang_pendidikan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-4 col-span-1">
                                <label for="lembaga_pendidikan" class="form-label">*Lembaga pendidikan</label>
                            </div>
                            <div class="form-inline mt-4 col-span-5">
                                <input name="lembaga_pendidikan" type="text" class="form-control" placeholder="Lembaga pendidikan" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-1">
                                <label for="gelar_depan" class="form-label">Gelar Depan</label>
                            </div>
                            <div class="form-inline mt-4 col-span-5">
                                <input name="gelar_depan" type="text" class="form-control" placeholder="(Opsional)">
                            </div>
                            <div class="form-inline mt-4 col-span-1">
                                <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                            </div>
                            <div class="form-inline mt-4 col-span-5">
                                <input name="gelar_belakang" type="text" class="form-control" placeholder="(Opsional)">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-12">
                                <label for="horizontal-form-2" class="form-label">*Upload Ijazah dan Transkrip (.pdf|Max.1MB)</label>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-12">
                                <input class="form-control" type="file" name="ijazah" id="ijazah" required>
                                <br>
                            </div>
                        </div>
                    </div> <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-12"><b></b></div>
                        </div>
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                        <button type="submit" class="btn btn-primary w-20">Simpan</button>
                    </div> <!-- END: Modal Footer -->
                    </form>
        </div>
    </div>
</div>