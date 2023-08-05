@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                DASHBOARD
            </h2>
        </div>
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

        <!-- BEGIN: General Report -->
        <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                <div class="box p-5 zoom-in">
                    <div class="flex items-center">
                        <div class="flex-none">
                            <div class="text-slate-500 mt-1">TOTAL DATA PEGAWAI</div>
                            <div class="text-3xl font-medium leading-8 mt-4">{{ $count_identitas }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                <div class="box p-5 zoom-in">
                    <div class="flex items-center">
                        <div class="flex-none">
                            <div class="text-slate-500 mt-1">TERDAFTAR PENDATAAN NON-ASN 2022</div>
                            <div class="text-3xl font-medium leading-8 mt-4">{{ $count_pendataan }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                <div class="box p-5 zoom-in">
                    <div class="flex items-center">
                        <div class="flex-none">
                            <div class="text-slate-500 mt-1">PEGAWAI AKTIF</div>
                            <div class="text-3xl font-medium leading-8 mt-4">{{ $count_status_aktif }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-span-12 sm:col-span-6 2xl:col-span-3 intro-y">
                <div class="box p-5 zoom-in">
                    <div class="flex items-center">
                        <div class="flex-none">
                            <div class="text-slate-500 mt-1">PEGAWAI SUDAH DIANGKAT PPPK/PNS</div>
                            <div class="text-3xl font-medium leading-8 mt-4">{{ $count_status_diangkat }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- BEGIN: General Report -->

        <!-- BEGIN: General Report -->
        <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
            <div class="col-span-12 sm:col-span-4 2xl:col-span-4 intro-y">
                <div class="box p-5 zoom-in">
                    <div class="flex items-center">
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 2xl:col-span-4 intro-y">
                <div class="box p-5 zoom-in">
                    <div class="flex items-center">
                        <div id="piechart2"></div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 2xl:col-span-4 intro-y">
                <div class="box p-5 zoom-in">
                    <div class="flex items-center">
                        <div id="piechart3"></div>
                    </div>
                </div>
            </div>
        </div><!-- BEGIN: General Report -->

    </div>
</div>



@endsection