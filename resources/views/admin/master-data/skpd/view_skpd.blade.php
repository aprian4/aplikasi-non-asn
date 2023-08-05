@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                MASTER SKPD
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
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-tambah-skpd" class="btn btn-primary"><i data-lucide="plus" class="w-5 h-5"></i>Tambah</a> </div> <!-- END: Modal Toggle -->
            </div>
            <div class="overflow-x-auto">
                <table id="tabel-skpd" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alias</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($skpd as $skpds)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $skpds->nama_skpd }}</td>
                            <td>{{ $skpds->alias_skpd }}</td>
                            <td>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-edit-skpd" class="btn btn-warning btn_ubah_skpd" data-id="{{ $skpds->id }}" data-nama_skpd="{{ $skpds->nama_skpd }}" data-alias_skpd="{{ $skpds->alias_skpd }}"><i data-lucide="edit" class="w-5 h-5"></i></a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-hapus-skpd" class="btn btn-danger btn_hapus_skpd" data-id="{{ $skpds->id }}"><i data-lucide="trash" class="w-5 h-5"></i></a>
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
            @include('admin.master-data.skpd.store_skpd')
            @include('admin.master-data.skpd.update_skpd')
            @include('admin.master-data.skpd.delete_skpd')
            <!-- END: Modal Content -->
        </div>
        <!-- END: HTML Table Data -->
    </div>
    <!-- END: Content -->
</div>


@endsection