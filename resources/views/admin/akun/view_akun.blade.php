@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                AKUN USER
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
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-tambah-user" class="btn btn-primary"><i data-lucide="plus" class="w-5 h-5"></i>Tambah</a> </div> <!-- END: Modal Toggle -->
            </div>
            <div class="overflow-x-auto">
                <table id="tabel-akun" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>SKPD</th>
                            <th>Role User</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akun as $ak)
                        <tr>
                            <td>{{ $ak->nama }}</td>
                            <td>{{ $ak->username }}</td>
                            <td>{{ $ak->skpd->alias_skpd }}</td>
                            @if ($ak->level == 1)
                            <td>Super Admin</td>
                            @elseif ($ak->level == 2)
                            <td>Admin SKPD</td>
                            @else
                            <td>User</td>
                            @endif
                            <td>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-edit-user" class="btn btn-warning btn_ubah" data-id="{{ $ak->id }}" data-nama="{{ $ak->nama }}" data-username="{{ $ak->username }}" data-skpd_id="{{ $ak->skpd_id }}" data-level="{{ $ak->level }}"><i data-lucide="edit" class="w-5 h-5"></i></a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-ubah-password" class="btn btn-success btn_ubah_password" data-id="{{ $ak->id }}" data-nama="{{ $ak->nama }}"><i data-lucide="lock" class="w-5 h-5"></i></a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-hapus-user" class="btn btn-danger btn_hapus" data-id="{{ $ak->id }}"><i data-lucide="trash" class="w-5 h-5"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- BEGIN: Modal Content -->
            @include('admin.akun.store_akun')
            @include('admin.akun.update_akun')
            @include('admin.akun.delete_akun')
            @include('admin.akun.update_password')
            <!-- END: Modal Content -->
        </div>
        <!-- END: HTML Table Data -->
    </div>
    <!-- END: Content -->
</div>


@endsection