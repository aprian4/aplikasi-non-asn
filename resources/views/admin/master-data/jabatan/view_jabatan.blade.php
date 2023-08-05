@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                MASTER JABATAN
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
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-tambah-jabatan" class="btn btn-primary"><i data-lucide="plus" class="w-5 h-5"></i>Tambah</a> </div> <!-- END: Modal Toggle -->
            </div>
            <div class="overflow-x-auto">
                <table id="tabel-jabatan" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Jabatan</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($jabatan as $jabatans)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $jabatans->nama_jabatan }}</td>
                            <td>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-edit-jabatan" class="btn btn-warning btn_ubah_jabatan" data-id="{{ $jabatans->id }}" data-nama_jabatan="{{ $jabatans->nama_jabatan }}"><i data-lucide="edit" class="w-5 h-5"></i></a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-hapus-jabatan" class="btn btn-danger btn_hapus_jabatan" data-id="{{ $jabatans->id }}"><i data-lucide="trash" class="w-5 h-5"></i></a>
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
            @include('admin.master-data.jabatan.store_jabatan')
            @include('admin.master-data.jabatan.update_jabatan')
            @include('admin.master-data.jabatan.delete_jabatan')
            <!-- END: Modal Content -->
        </div>
        <!-- END: HTML Table Data -->
    </div>
    <!-- END: Content -->
</div>


@endsection