@extends('layouts.master')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                GANTI PASSWORD
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
            <!-- BEGIN: Modal Content -->
            <?php
            if ($user->level == 1) {
            ?>
                <form action="{{ url('update-password-admin') }}" method="POST" enctype="multipart/form-data">
                <?php
            } else {
                ?>
                    <form action="{{ url('update-password') }}" method="POST" enctype="multipart/form-data">
                    <?php
                }
                    ?>
                    @csrf
                    <div class="preview">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-6">
                                <input name="id" type="hidden" value="{{ $user->id }}">
                                <label for="nama" class="form-label sm:w-20">Nama user</label>
                                <input id="nama" name="nama" type="text" class="form-control" value="{{ $user->nama }}" readonly>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-6">
                                <label for="password" class="form-label sm:w-20">password Baru</label>
                                <input id="password" name="password" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                            <div class="form-inline mt-4 col-span-4">
                            </div>
                            <div class="form-inline mt-10  col-span-2">
                                <button type="submit" class="btn btn-rounded-primary mr-1">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- END: Modal Content -->
        </div>
        <!-- END: HTML Table Data -->
    </div>
    <!-- END: Content -->
</div>


@endsection