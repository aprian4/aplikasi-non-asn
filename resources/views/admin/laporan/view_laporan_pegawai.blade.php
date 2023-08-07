@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                LAPORAN DATA PEGAWAI
            </h2>
        </div><!-- BEGIN: HTML Table Data -->
        <div class=" intro-y box p-5 mt-5">
            <?php
            if ($user->level == 1) {
            ?>
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <form action="{{ url('admin/laporan-admin') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <input name="search" type="hidden" value="1" class="form-control">
                        <div class="grid grid-cols-12 gap-2">
                            <select name="status_pegawai" class="form-control col-span-3">
                                <option>-- Semua Status Pegawai --</option>
                                <option value="1" <?= $_GET['status_pegawai'] == 1 ? "selected" : ""; ?>>AKTIF</option>
                                <option value="2" <?= $_GET['status_pegawai'] == 2 ? "selected" : ""; ?>>SUDAH DIANGKAT PPPK/PNS</option>
                                <option value="3" <?= $_GET['status_pegawai'] == 3 ? "selected" : ""; ?>>MUTASI KE OPD LAIN</option>
                                <option value="4" <?= $_GET['status_pegawai'] == 4 ? "selected" : ""; ?>>BERHENTI BEKERJA</option>
                            </select>
                            <select name="status_pendataan" class="form-control col-span-3">
                                <option>-- Semua Status Pendataan --</option>
                                <option value="1" <?= $_GET['status_pendataan'] == 1 ? "selected" : ""; ?>>TERDATA</option>
                                <option value="2" <?= $_GET['status_pendataan'] == 2 ? "selected" : ""; ?>>TERDATA (THK-II)</option>
                                <option value="3" <?= $_GET['status_pendataan'] == 3 ? "selected" : ""; ?>>TIDAK TERDATA</option>
                            </select>
                            <select name="skpd_id" class="form-control col-span-4">
                                <option>-- Semua OPD --</option>
                                @foreach ($skpd as $skpds)
                                <option value="{{ $skpds->id }}" <?= $_GET['skpd_id'] == $skpds->id ? "selected" : ""; ?>>{{ $skpds->nama_skpd }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-rounded-primary col-span-2">Submit Laporan</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
            <?php
            } else {
            ?>
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <form action="{{ url('admin/laporan') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <input name="search" type="hidden" value="1" class="form-control">
                        <div class="grid grid-cols-12 gap-2">
                            <select name="status_pegawai" class="form-control col-span-3">
                                <option>-- Semua Status Pegawai --</option>
                                <option value="1" <?= $_GET['status_pegawai'] == 1 ? "selected" : ""; ?>>AKTIF</option>
                                <option value="2" <?= $_GET['status_pegawai'] == 2 ? "selected" : ""; ?>>SUDAH DIANGKAT PPPK/PNS</option>
                                <option value="3" <?= $_GET['status_pegawai'] == 3 ? "selected" : ""; ?>>MUTASI KE OPD LAIN</option>
                                <option value="4" <?= $_GET['status_pegawai'] == 4 ? "selected" : ""; ?>>BERHENTI BEKERJA</option>
                            </select>
                            <select name="status_pendataan" class="form-control col-span-3">
                                <option>-- Semua Status Pendataan --</option>
                                <option value="1" <?= $_GET['status_pendataan'] == 1 ? "selected" : ""; ?>>TERDATA</option>
                                <option value="2" <?= $_GET['status_pendataan'] == 2 ? "selected" : ""; ?>>TERDATA (THK-II)</option>
                                <option value="3" <?= $_GET['status_pendataan'] == 3 ? "selected" : ""; ?>>TIDAK TERDATA</option>
                            </select>
                            <button type="submit" class="btn btn-rounded-primary col-span-2">Submit Laporan</button>
                        </div>
                    </form>
                </div>
                <br>
                <br>

            <?php
            }
            ?>
            <div class="text-center">
                LAPORAN PEGAWAI NON ASN
            </div>
            <div class="overflow-x-auto">
                <table id="tabel-laporan-pegawai" style="font-size: 12px;" class="responsive display nowrap" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Jabatan</th>
                            <th>Perangkat Daerah</th>
                            <th>Unit Kerja</th>
                            <th>Pendidikan</th>
                            <th>jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Status Kawin</th>
                            <th>No. NPWP</th>
                            <th>No. BPJS</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Pendataan Non ASN 2022</th>
                            <th>Status Pegawai</th>
                            <th>Masa Kerja</th>
                            <th>Kelengkapan Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        //dd($identitas);
                        ?>
                        @foreach ($identitas as $identitass)

                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $identitass->nama }}</td>
                            <td>{{ $identitass->nik }}</td>
                            <td>{{ $identitass->jabatan_id > 0 ? $identitass->jabatan->nama_jabatan : '' }}</td>
                            <td>{{ $identitass->skpd->nama_skpd }}</td>
                            <td>{{ $identitass->unit_kerja ? $identitass->unit_kerja : '' }}</td>
                            <td>{{ $identitass->pendidikan_id > 0 ? $identitass->pendidikan->jenjang_pendidikan : '' }}</td>
                            <td>
                                <?php
                                if ($identitass->jenis_kelamin == 'l') {
                                    echo "LAKI-LAKI";
                                } else {
                                    echo "PEREMPUAN";
                                }
                                ?>
                            </td>
                            <td>{{ $identitass->tempat_lahir }}</td>
                            <td>{{ $identitass->tanggal_lahir }}</td>
                            <td>{{ $identitass->agama_id > 0 ? $identitass->agama->nama_agama : '' }}</td>
                            <td><?php
                                if ($identitass->perkawinan) {
                                    echo $identitass->perkawinan->status_perkawinan;
                                } else {
                                    echo "";
                                }
                                ?>
                            </td>
                            <td>{{ $identitass->no_npwp }}</td>
                            <td>{{ $identitass->no_bpjs }}</td>
                            <td>{{ $identitass->email }}</td>
                            <td>{{ $identitass->no_hp }}</td>
                            <td>
                                <?php
                                if ($identitass->pendataan_2022 == 1) {
                                    echo "TERDATA";
                                } else if ($identitass->pendataan_2022 == 2) {
                                    echo "TERDATA (THK-II)";
                                } else {
                                    echo "TIDAK TERDATA";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($identitass->status_pegawai == 1) {
                                    echo "AKTIF";
                                } else if ($identitass->status_pegawai == 2) {
                                    echo "SUDAH DIANGKAT PNS/PPPK";
                                } else if ($identitass->status_pegawai == 3) {
                                    echo "MUTASI KE OPD LAIN";
                                } else if ($identitass->status_pegawai == 4) {
                                    echo "BERHENTI BEKERJA";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $masa_kerja_bulan = $masa_kerja[$identitass->id] % 12;
                                $masa_kerja_tahun = ($masa_kerja[$identitass->id] - $masa_kerja_bulan) / 12;

                                echo $masa_kerja_tahun . " Tahun " . $masa_kerja_bulan . " Bulan"
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($identitass->status_kelengkapan == 4) {
                                    echo "LENGKAP";
                                } else {
                                    echo "BELUM LENGKAP";
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                        ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- BEGIN: Modal Content -->
            <!-- END: Modal Content -->
        </div>
        <!-- END: HTML Table Data -->
    </div>
    <!-- END: Content -->
</div>


@endsection