@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                DETAIL DATA PEGAWAI
            </h2>
        </div>
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box px-5 pt-2 mt-5">
            <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                        <?php
                        if ($foto) {
                        ?>
                            <img alt="" src="{{ url($foto) }}">
                        <?php } else {
                        ?>
                            <img alt="" src="{{ url('images/profil.webp') }}">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="ml-5">
                        <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $identitas->nama }}</div>
                        <div class="text-slate-500">NIK. {{ $identitas->nik }}</div>
                        <div class="text-slate-500">{{ $identitas->skpd->nama_skpd }}</div>
                    </div>
                </div>
            </div>
            <?php
            if ($_GET && isset($_GET['tab']) && $_GET['tab'] && $_GET['tab'] == 2) {
                $tab1 = "";
                $tab2 = " active";
                $tab3 = "";
            } else if ($_GET && isset($_GET['tab']) && $_GET['tab'] && $_GET['tab'] == 3) {
                $tab1 = "";
                $tab2 = "";
                $tab3 = " active";
            } else {
                $tab1 = " active";
                $tab2 = "";
                $tab3 = "";
            }
            ?>
            <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
                <li id="biodata-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-4 {{ $tab1 }}" data-tw-target="#biodata" aria-controls="biodata" aria-selected="true" role="tab"> BIODATA </a> </li>
                <li id="riwayat-jabatan-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-4 {{ $tab2 }}" data-tw-target="#riwayat-jabatan" aria-selected="false" role="tab"> RIWAYAT JABATAN </a> </li>
                <li id="riwayat-pendidikan-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-4 {{ $tab3 }}" data-tw-target="#riwayat-pendidikan" aria-selected="false" role="tab"> RIWAYAT PENDIDIKAN </a> </li>
            </ul>
        </div>@if ($errors->any())
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
        <!-- END: Profile Info -->
        <div class="intro-y tab-content mt-5">
            @include('admin.identitas.biodata')
            @include('admin.identitas.riwayat-jabatan')
            @include('admin.identitas.riwayat-pendidikan')
        </div>
    </div>
    <!-- END: Content -->
</div>

@endsection