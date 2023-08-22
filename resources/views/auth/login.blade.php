<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="images/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Login</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="template/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-10">
                    <img width="50px" src="images/logo.png">
                    <span class="text-white text-lg ml-3"> BKPSDM - KOTA TANGERANG SELATAN </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="template/dist/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        E-NonASN
                    </div>
                    <div class="-intro-x mt-0 text-lg text-white text-opacity-70 dark:text-slate-400">
                        Aplikasi Kepegawaian Non ASN Kota Tangerang Selatan</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">

                    @if(session()->has('loginError'))
                    <div class="alert alert-dark-soft show flex items-center mb-2" role="alert"> <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i>
                        {{ session('loginError') }}
                    </div>
                    @endif

                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        LOGIN
                    </h2>

                    <form action="{{ route('postlogin') }}" method="post">
                        @csrf
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">APLIKASI KEPEGAWAIAN NON ASN KOTA TANGERANG SELATAN</div>
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block @error('username') is-invalid @enderror" placeholder="Username" name="username" id="username" autofocus required value="{{ old('username') }}">
                            @error('username')
                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">
                                {{ $message }}
                            </span>
                            @enderror
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" name="password" id="password" autofocus required>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top form-control" type="submit">LOGIN</button>
                            <a href="{{ url('images/panduan-aplikasi-enonasn.pdf') }}" target="_blank" <button class="btn btn-secondary align-top py-3 px-4 xl:mr-3" type="button">BUKU PANDUAN </button></a>
                        </div>
                        <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">&copy;<?php echo date('Y'); ?> BKPSDM Kota Tangerang Selatan</div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <!-- BEGIN: JS Assets-->
    <script src="template/dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>