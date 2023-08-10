<div id="biodata" class="tab-pane {{ $tab1 }}" role="tabpanel" aria-labelledby="biodata-tab">
    <div class="grid grid-cols-12 gap-12">
        <!-- BEGIN: Top Categories -->
        <div class="intro-y box col-span-12 lg:col-span-12">
            <div id="horizontal-form" class="p-5">
                <?php
                if ($user->level == 1) {
                ?>
                    <form action="{{ url('admin/pegawai-admin/biodata') }}" method="POST" enctype="multipart/form-data">
                    <?php
                } else { ?>
                        <form action="{{ url('admin/pegawai/biodata') }}" method="POST" enctype="multipart/form-data">
                        <?php
                    }
                        ?>
                        <div class="preview">
                            @csrf
                            <?php
                            if (($identitas->pendataan_2022 == 1) || ($identitas->pendataan_2022 == 2)) {
                                $req = "readonly";
                            } else {
                                $req = "";
                            }
                            ?>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-3">
                                    <label for="gelar_depan" class="form-label sm:w-20">Nama dan Gelar Sesuai Ijazah</label>
                                    <input name="id" type="hidden" value="{{ $identitas->id }}">
                                    <input name="nik" type="hidden" value="{{ $identitas->nik }}">
                                    <input name="nama" type="hidden" value="{{ $identitas->nama }}">
                                    <input id=" gelar_depan" name="gelar_depan" type="text" class="form-control" value="{{ ($identitas->gelar_depan != null ? $identitas->gelar_depan : '') }}" placeholder="Gelar Depan">
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <input id="nama" id="nama" type="text" class="form-control" value="{{ $identitas->nama }}" readonly>
                                </div>
                                <div class="form-inline mt-4 col-span-3">
                                    <input id="gelar_belakang" name="gelar_belakang" type="text" class="form-control" value="{{ ($identitas->gelar_belakang != null ? $identitas->gelar_belakang : '') }}" placeholder="Gelar Belakang">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="nik" class="form-label sm:w-20 col-span-6">*NIK KTP</label>
                                    <input id="nik" name="nik" type="text" class="form-control" value="{{ $identitas->nik }}" readonly>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="jenis_kelamin" class="form-label sm:w-20 col-span-6">*Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" {{ $req }}>
                                        <option>-- Pilih Jenis Kelamin --</option>
                                        <option value="l" {{ ($identitas->jenis_kelamin == 'l' ? 'selected' : '') }}>Laki-laki</option>
                                        <option value="p" {{ ($identitas->jenis_kelamin == 'p' ? 'selected' : '') }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="tempat_lahir" class="form-label sm:w-20 col-span-6">*Tempat Lahir</label>
                                    <input id="tempat_lahir" name="tempat_lahir" onkeyup="myFunction2()" type="text" class="form-control" placeholder="Tempat Lahir" value="{{ ($identitas->tempat_lahir != null ? $identitas->tempat_lahir : '') }}" {{ $req }}>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="tanggal_lahir" class="form-label sm:w-20 col-span-6">*Tanggal Lahir</label>
                                    <input id="tanggal_lahir" name="tanggal_lahir" type="date" max="{{ date('Y-m-d') }}" class="form-control" placeholder="Tanggal Lahir" value="{{ ($identitas->tanggal_lahir != null ? $identitas->tanggal_lahir : '') }}" {{ $req }}>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="agama_id" class="form-label sm:w-20 col-span-6">*Agama</label>
                                    <select name="agama_id" class="form-control" {{ $req }}>
                                        <option>-- Pilih Agama --</option>
                                        @foreach ($agama as $agamas)
                                        <option value="<?= $agamas->id ?>" {{ ($identitas->agama_id == $agamas->id ? 'selected' : '') }}>{{ $agamas->nama_agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="perkawinan_id" class="form-label sm:w-20 col-span-6">*Status Kawin</label>
                                    <select name="perkawinan_id" class="form-control" required>
                                        <option>-- Pilih Status Perkawinan --</option>
                                        @foreach ($perkawinan as $perkawinans)
                                        <option value="<?= $perkawinans->id ?>" {{ ($identitas->perkawinan_id == $perkawinans->id ? 'selected' : '') }}>{{ $perkawinans->status_perkawinan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="email" class="form-label sm:w-20 col-span-6">*Email</label>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{ ($identitas->email != null ? $identitas->email : '') }}" required>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="no_hp" class="form-label sm:w-20 col-span-6">*No. HP</label>
                                    <input id="no_hp" name="no_hp" type="text" class="form-control" placeholder="No. HP" value="{{ ($identitas->no_hp != null ? $identitas->no_hp : '') }}" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="no_npwp" class="form-label sm:w-20 col-span-6">*No. NPWP</label>
                                    <input id="no_npwp" name="no_npwp" type="text" class="form-control" placeholder="No. NPWP" value="{{ ($identitas->no_npwp != null ? $identitas->no_npwp : '') }}" required>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="no_bpjs" class="form-label sm:w-20 col-span-6">*No. BPJS Kesehatan</label>
                                    <input id="no_bpjs" name="no_bpjs" type="text" class="form-control" placeholder="No. BPJS Kesehatan" value="{{ ($identitas->no_bpjs != null ? $identitas->no_bpjs : '') }}" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="skpd_id" class="form-label sm:w-20 col-span-6">*Perangkat Daerah</label>
                                    <select name="skpd_id" class="form-control" disabled>
                                        @foreach ($skpd as $skpds)
                                        <option value="<?= $skpds->id ?>" {{ ($identitas->skpd_id == $skpds->id ? 'selected' : '') }}>{{ $skpds->nama_skpd }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="unit_kerja" class="form-label sm:w-20 col-span-6">Unit Kerja</label>
                                    <input id="unit_kerja" name="unit_kerja" type="text" class="form-control" placeholder="Kelurahan/UPT/Sekolah" value="{{ ($identitas->unit_kerja != null ? $identitas->unit_kerja : '') }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="jabatan_id" class="form-label sm:w-20 col-span-6">*Jabatan (Sesuai Kontrak Kerja)</label>
                                    <select name="jabatan_id" class="form-control tom-select w-full" {{ $req }}>
                                        <option>-- Pilih Jabatan --</option>
                                        @foreach ($jabatan as $jabatans)
                                        <option value="<?= $jabatans->id ?>" {{ ($identitas->jabatan_id == $jabatans->id ? 'selected' : '') }}>{{ $jabatans->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="pendidikan_id" class="form-label sm:w-20 col-span-6">*Pendidikan (Sesuai Kontrak Kerja)</label>
                                    <select name="pendidikan_id" class="form-control tom-select w-full" {{ $req }}>
                                        <option>-- Pilih Pendidikan --</option>
                                        @foreach ($pendidikan as $pendidikans)
                                        <option value="<?= $pendidikans->id ?>" {{ ($identitas->pendidikan_id == $pendidikans->id ? 'selected' : '') }}>{{ $pendidikans->jenjang_pendidikan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <hr>

                            <?php
                            if ($foto) {
                                $req_foto = "";
                            } else {
                                $req_foto = " required";
                            }
                            if ($ktp) {
                                $req_ktp = "";
                            } else {
                                $req_ktp = " required";
                            }
                            ?>

                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="horizontal-form-2" class="form-label sm:w-20 col-span-6">*Upload Foto Formal Background Biru 4X6 (.jpg .png Max.500Kb)</label>
                                    <input class="form-control" type="file" name="foto" id="foto" {{ $req_foto }}>
                                    <br>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="horizontal-form-2" class="form-label sm:w-20 col-span-6">*Upload KTP (.jpg .png Max.500Kb)</label>
                                    <input class="form-control" type="file" name="ktp" id="ktp" {{ $req_ktp }}>
                                    <br>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="horizontal-form-2" class="form-label sm:w-20 col-span-6"></label>

                                    <?php
                                    //dd(asset($foto));
                                    if ($foto) {
                                        //dd(asset($foto));
                                    ?>
                                        <img width="150px" src="{{ asset($foto) }}">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-inline mt-4 col-span-6">
                                    <label for="horizontal-form-2" class="form-label sm:w-20 col-span-6"></label>

                                    <?php
                                    if ($ktp) {
                                        //dd(asset($ktp));
                                    ?>
                                        <img width="250px" alt="" src=" {{ asset($ktp) }}">
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                </div>
                                <div class="form-inline mt-4 col-span-4">
                                </div>
                                <div class="form-inline mt-10  col-span-2">
                                    <button type="submit" class="btn btn-rounded-primary mr-1">Simpan Data</button>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        </form>
            </div>
            <!-- END: Top Categories -->
        </div>

    </div>
</div>