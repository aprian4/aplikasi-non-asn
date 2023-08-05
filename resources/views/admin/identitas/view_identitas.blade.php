@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                DATA PEGAWAI
            </h2>
        </div><!-- BEGIN: HTML Table Data -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        @if ($message = Session::get('sukses'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @elseif ($message = Session::get('gagal'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="intro-y box p-5 mt-5">
            <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-tambah-identitas" class="btn btn-primary"><i data-lucide="plus" class="w-5 h-5"></i>Tambah</a> </div> <!-- END: Modal Toggle -->
            </div>
            <div class="overflow-x-auto">
                <table id="tabel-identitas" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Perangkat Daerah</th>
                            <th>Pendataan Non ASN 2022</th>
                            <th>Status</th>
                            <th>Kelengkapan Data</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($identitas as $identitass)
                        <?php

                        if ($identitass->status_kelengkapan == 2) {
                            $persentase = 50;
                            $width = "w-2/4";
                        } else if ($identitass->status_kelengkapan == 3) {
                            $persentase = 75;
                            $width = "w-3/4";
                        } else if ($identitass->status_kelengkapan == 4) {
                            $persentase = 100;
                            $width = "w-4/4";
                        } else {
                            $persentase = 25;
                            $width = "w-4";
                        }
                        ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $identitass->nama }}</td>
                            <td>{{ $identitass->nik }}</td>
                            <td>{{ $identitass->skpd->nama_skpd }}</td>
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
                                    echo "SUDAH DIANGKAT PPPK/PNS";
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
                                <div class="progress h-5">
                                    <div class="progress-bar {{ $width }}" role="progressbar" aria-valuenow=" {{ $persentase }}" aria-valuemin="0" aria-valuemax="100">
                                        <p style="font-size: 10px;">{{ $persentase }}%</p>
                                    </div>
                                </div>
                            </td>
                            <td><a href="{{ url('/admin/pegawai/detail') . '/' . $identitass->id }}" data-tw-toggle="modal" data-tw-target="#modal-lengkapi-identitas" style="width:95px" class="btn btn-primary btn-sm mr-1 mb-2">Lengkapi</a><br>
                                <a href=" javascript:;" data-tw-toggle="modal" data-tw-target="#modal-edit-identitas" class="btn btn-warning btn-sm mr-1 mb-2 btn_ubah_identitas" data-id="{{ $identitass->id }}" data-nama="{{ $identitass->nama }}" data-nik="{{ $identitass->nik }}" data-skpd_id="{{ $identitass->skpd_id }}" data-nama_skpd="{{ $identitass->skpd->nama_skpd }}" data-pendataan_2022="{{ $identitass->pendataan_2022 }}" data-status_pegawai="{{ $identitass->status_pegawai }}"><i data-lucide="edit" class="w-5 h-5"></i></a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-hapus-identitas" class="btn btn-danger btn-sm mr-1 mb-2 btn_hapus_identitas" data-id="{{ $identitass->id }}" data-nama="{{ $identitass->nama }}" data-pendataan_2022="{{ $identitass->pendataan_2022 }}"><i data-lucide="trash" class="w-5 h-5"></i></a>
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
            @include('admin.identitas.store_identitas')
            @include('admin.identitas.update_identitas')
            @include('admin.identitas.delete_identitas')
            <!-- END: Modal Content -->
        </div>
        <!-- END: HTML Table Data -->
    </div>
    <!-- END: Content -->
</div>


@endsection