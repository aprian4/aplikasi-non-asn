@php
$menu_aktif = 0;

@endphp

<?php
if ($sidebar == "full") {
    $side = " side-nav--simple";
    $hide = " hidden";
} else {
    $side = "";
    $hide = "";
}

?>

<nav id="maximini" class="side-nav {{ $side }}">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Aplikasi Pegawai Non-ASN Kota Tangerang Selatan" class="w-9" src="{{ url('images/logo.png') }}">
        <div id="font-lasik" {{ $hide }}> <span class="hidden xl:block text-white text-lg ml-3"> E-NonASN </span></div>
    </a>
    <div class="side-nav__devider my-6"></div>

    <div id="side-profil" {{ $hide }}>
        <center>
            <div class="w-24 h-24 image-fit relative">
                <img alt="" class="rounded-full border-white shadow-md tooltip" src="{{ url('images/profil.webp') }}">
            </div>
            <div class="side-menu__title text-white mt-2">
                <p><b>{{ Auth::user()->nama }}</b></p>
                <p><b>{{ Auth::user()->skpd->alias_skpd }}</b></p>
            </div>
        </center>
        <div class="side-nav__devider my-6"></div>
    </div>

    <ul>
        <?php
        if ($user->level == 1) {
        ?>
            <li>
                <a href="{{ url('/admin')}}" class="side-menu{{ (request()->is('admin')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="DASHBOARD"> <i data-lucide="layout-dashboard"></i> </div>
                    <div class="side-menu__title">
                        DASHBOARD
                    </div>
                </a>
            </li>
        <?php
        } else {
        ?>
            <li>
                <a href="{{ url('/opd')}}" class="side-menu{{ (request()->is('opd')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="DASHBOARD"> <i data-lucide="layout-dashboard"></i> </div>
                    <div class="side-menu__title">
                        DASHBOARD
                    </div>
                </a>
            </li>
        <?php
        }
        ?>

        <?php
        if ($user->level == 2) {
        ?>
            <li>
                <a href="{{ url('/admin/pegawai')}}" class="side-menu{{ (request()->is('admin/pegawai*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="DATA PEGAWAI"> <i data-lucide="user"></i> </div>
                    <div class="side-menu__title">
                        DATA PEGAWAI
                    </div>
                </a>
            </li>
        <?php
        } else {
        ?>
            <li>
                <a href="{{ url('/admin/pegawai-admin?skpd_id=0&search=0')}}" class="side-menu{{ (request()->is('admin/pegawai*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="DATA PEGAWAI"> <i data-lucide="user"></i> </div>
                    <div class="side-menu__title">
                        DATA PEGAWAI
                    </div>
                </a>
            </li>
        <?php
        }
        if ($user->level == 1) {
        ?>
            <li>
                <a href="javascript:;" class="side-menu{{ (request()->is('admin/master*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="DATA MASTER"> <i data-lucide="folder"></i> </div>
                    <div class="side-menu__title">
                        DATA MASTER
                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                    </div>
                </a>
                <ul class="{{ (request()->is('admin/master*')) ? 'side-menu__sub-open' : '' }}">
                    <li>
                        <a href="{{ url('admin/master/skpd')}}" class="side-menu{{ (request()->is('admin/master/skpd')) ? ' side-menu--active' : '' }}">
                            <div class="side-menu__icon cursor-pointer" title="Master SKPD"> <i data-lucide="circle"></i> </div>
                            <div class="side-menu__title"> MASTER SKPD </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/master/jabatan')}}" class="side-menu{{ (request()->is('admin/master/jabatan*')) ? ' side-menu--active' : '' }}">
                            <div class="side-menu__icon cursor-pointer" title="Master SKPD"> <i data-lucide="circle"></i> </div>
                            <div class="side-menu__title"> MASTER JABATAN </div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php
        }
        ?>

        <?php
        if ($user->level == 1) {
        ?>
            <li>
                <a href="{{ url('admin/laporan-admin?status_pendataan=0&skpd_id=0&status_pegawai=0&search=0')}}" class="side-menu{{ (request()->is('/admin/laporan-admin*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="LAPORAN"> <i data-lucide="file"></i> </div>
                    <div class="side-menu__title">
                        LAPORAN
                    </div>
                </a>
            </li>
        <?php
        } else {
        ?>
            <li>
                <a href="{{ url('admin/laporan?status_pendataan=0&status_pegawai=0&search=0')}}" class="side-menu{{ (request()->is('/admin/laporan*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="LAPORAN"> <i data-lucide="file"></i> </div>
                    <div class="side-menu__title">
                        LAPORAN
                    </div>
                </a>
            </li>
        <?php
        }
        ?>

        <?php
        if ($user->level == 1) {
        ?>
            <li>
                <a href="{{ url('/admin/akun')}}" class="side-menu{{ (request()->is('admin/akun*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="AKUN USER"> <i data-lucide="settings"></i> </div>
                    <div class="side-menu__title">
                        AKUN USER
                    </div>
                </a>
            </li>
        <?php
        }
        ?>
        <!-- <li>
            <a href="javascript:;" class="side-menu btn_ubah_password" data-tw-toggle="modal" data-tw-target="#modal2-ubah-password" data-id="{{ $user->id }}" data-nama="{{ $user->nama }}">
                <div class=" side-menu__icon cursor-pointer" title="GANTI PASSWORD"> <i data-lucide="lock"></i> </div>
                <div class="side-menu__title">
                    GANTI PASSWORD
                </div>
            </a>
        </li> -->
        <?php
        if ($user->level == 1) {
        ?>
            <li>
                <a href="{{ url('/ganti-password-admin') }}" class="side-menu{{ (request()->is('ganti-password*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="GANTI PASSWORD"> <i data-lucide="lock"></i> </div>
                    <div class="side-menu__title">
                        GANTI PASSWORD
                    </div>
                </a>
            </li>
        <?php
        } else {
        ?>
            <li>
                <a href="{{ url('/ganti-password') }}" class="side-menu{{ (request()->is('ganti-password*')) ? ' side-menu--active' : '' }}">
                    <div class="side-menu__icon cursor-pointer" title="GANTI PASSWORD"> <i data-lucide="lock"></i> </div>
                    <div class="side-menu__title">
                        GANTI PASSWORD
                    </div>
                </a>
            </li>
        <?php
        }
        ?>
        <!-- <li>
            <a href="" class="side-menu">
                <div class="side-menu__icon cursor-pointer" title="DATA AKUN USER"> <i data-lucide="log-out"></i> </div>
                <div class="side-menu__title">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"></i> LOGOUT </button>
                    </form>
                </div>
            </a>
        </li> -->
    </ul>
</nav>