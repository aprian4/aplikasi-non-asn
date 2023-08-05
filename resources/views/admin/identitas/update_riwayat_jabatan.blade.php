<div id="modal-edit-rjabatan" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ url('admin/pegawai/rjabatan/update') }}" method="POST" enctype="multipart/form-data">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Ubah Riwayat Jabatan</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body">
                    @csrf
                    <div class="grid grid-cols-12 gap-2">
                        <div class="form-inline mt-4 col-span-2">
                            <input name="id" class="form-label ubah_rjabatan_id" type="hidden">
                            <input name="ledger_id" class="form-label ubah_rjabatan_ledger_id" type="hidden">
                            <input name="spk_id" class="form-label ubah_rjabatan_spk_id" type="hidden">
                            <input name="identitas_id" class="form-label ubah_rjabatan_identitas_id" type="hidden">
                            <label for="no_spk" class="form-label">*Nomor SPK</label>
                        </div>
                        <div class="form-inline mt-4 col-span-5">
                            <input name="no_spk" type="text" class="form-control ubah_rjabatan_no_spk" required>
                        </div>
                        <div class="form-inline mt-4 col-span-2">
                            <label for="tgl_mulai" class="form-label">*Tanggal Mulai</label>
                        </div>
                        <div class="form-inline mt-4 col-span-3">
                            <input name="tgl_mulai" type="date" max="{{ date('Y-m-d') }}" class="form-control ubah_rjabatan_tgl_mulai" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="form-inline mt-4 col-span-2">
                            <label for="tgl_spk" class="form-label">*Tanggal SPK</label>
                        </div>
                        <div class="form-inline mt-4 col-span-5">
                            <input name="tgl_spk" type="date" max="{{ date('Y-m-d') }}" class="form-control ubah_rjabatan_tgl_spk" required>
                        </div>
                        <div class="form-inline mt-4 col-span-2">
                            <label for="tgl_akhir" max="{{ date('Y-m-d') }}" class="form-label">*Tanggal Akhir</label>
                        </div>
                        <div class="form-inline mt-4 col-span-3">
                            <input name="tgl_akhir" type="date" class="form-control ubah_rjabatan_tgl_akhir" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="form-inline mt-4 col-span-2">
                            <label for="nama_skpd" class="form-label">*Perangkat Daerah</label>
                        </div>
                        <div class="form-inline mt-4 col-span-5">
                            <input name="nama_skpd" type="text" class="form-control ubah_rjabatan_nama_skpd" required>
                        </div>
                        <div class="form-inline mt-4 col-span-2">
                            <label for="jabatan_id" class="form-label">*Jabatan</label>
                        </div>
                        <div class="form-inline mt-4 col-span-3">
                            <select name="jabatan_id" class="form-control ubah_rjabatan_jabatan_id" required>
                                @foreach ($jabatan as $jabatans)
                                <option value="<?= $jabatans->id ?>">{{ $jabatans->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="form-inline mt-4 col-span-2">
                            <label for="unit_kerja" class="form-label">Unit Kerja</label>
                        </div>
                        <div class="form-inline mt-4 col-span-5">
                            <input name="unit_kerja" type="text" class="form-control ubah_rjabatan_unit_kerja" placeholder="UPT/Kelurahan/Sekolah (Opsional)">
                        </div>
                        <div class="form-inline mt-4 col-span-2">
                            <label for="pendidikan_id" class="form-label">*Pendidikan</label>
                        </div>
                        <div class="form-inline mt-4 col-span-3">
                            <select name="pendidikan_id" class="form-control ubah_rjabatan_pendidikan_id" required>
                                @foreach ($pendidikan as $pendidikans)
                                <option value="<?= $pendidikans->id ?>">{{ $pendidikans->jenjang_pendidikan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="form-inline mt-4 col-span-2">
                            <label for="pembayaran" class="form-label">*Pembayaran</label>
                        </div>
                        <div class="form-inline mt-4 col-span-5">
                            <select name="pembayaran" class="form-control ubah_rjabatan_pembayaran" required>
                                <option value="APBD">APBD</option>
                                <option value="NON APBD">NON APBD</option>
                                <option value="NON APBN">APBN</option>
                            </select>
                        </div>
                        <div class="form-inline mt-4 col-span-2">
                            <label for="tandatangan" class="form-label">*Tandatangan</label>
                        </div>
                        <div class="form-inline mt-4 col-span-3">
                            <input name="tandatangan" type="text" class="form-control ubah_rjabatan_tandatangan" required>
                        </div>
                    </div>
                    <?php

                    ?>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="form-inline mt-4 col-span-2">
                            <label for="horizontal-form-2" class="form-label sm:w-20 col-span-6">*Upload SPK (.pdf|Max.1MB)</label>
                        </div>
                        <div class="form-inline mt-4 col-span-5">
                            <input class="form-control" type="file" name="spk" id="spk">
                            <br>
                        </div>
                        <div class="form-inline mt-4 col-span-2">
                            <label for="horizontal-form-2" class="form-label sm:w-20 col-span-6">*Upload Daftar Gaji (.pdf|Max.1MB)</label>
                        </div>
                        <div class="form-inline mt-4 col-span-3">
                            <input class="form-control" type="file" name="ledger" id="ledger">
                            <br>
                        </div>
                    </div>
                </div> <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <div class="grid grid-cols-12 gap-2">
                        <div class="form-inline mt-4 col-span-12"><b>Ket : SPK (Surat Perjanjian Kerja)</b></div>
                    </div>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div>