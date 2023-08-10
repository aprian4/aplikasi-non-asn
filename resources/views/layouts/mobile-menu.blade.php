<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="" class="w-9" src="{{ url('images/logo.png') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            <?php
            if ($user->level == 1) {
            ?>
                <li>
                    <a href="{{ url('/admin')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="layout-dashboard"></i> </div>
                        <div class="menu__title"> DASHBOARD </div>
                    </a>
                </li>
            <?php
            } else {
            ?>
                <li>
                    <a href="{{ url('/opd')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="layout-dashboard"></i> </div>
                        <div class="menu__title"> DASHBOARD </div>
                    </a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($user->level == 1) {
            ?>
                <li>
                    <a href="{{ url('/admin/pegawai-admin?skpd_id=0&search=0')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="menu__title"> DATA PEGAWAI </div>
                    </a>
                </li>
            <?php
            } else {
            ?>
                <li>
                    <a href="{{ url('/admin/pegawai')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="menu__title"> DATA PEGAWAI </div>
                    </a>
                </li>
            <?php
            }
            if ($user->level == 1) {
            ?>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="folder"></i> </div>
                        <div class="menu__title"> DATA MASTER <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ url('admin/master/skpd')}}" class="menu">
                                <div class="menu__icon"></i> </div>
                                <div class="menu__title"> MASTER SKPD </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/master/jabatan')}}" class="menu">
                                <div class="menu__icon"></i> </div>
                                <div class="menu__title"> MASTER JABATAN </div>
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
                    <a href="{{ url('admin/laporan-admin?status_pendataan=0&skpd_id=0&status_pegawai=0&search=0')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="menu__title"> LAPORAN </div>
                    </a>
                </li>
            <?php
            } else {
            ?>
                <li>
                    <a href="{{ url('admin/laporan?status_pendataan=0&status_pegawai=0&search=0')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="menu__title"> LAPORAN </div>
                    </a>
                </li>
            <?php
            }
            ?>

            <?php
            if ($user->level == 1) {
            ?>
                <li>
                    <a href="{{ url('admin/akun')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="settings"></i> </div>
                        <div class="menu__title"> AKUN USER </div>
                    </a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($user->level == 1) {
            ?>

                <li>
                    <a href="{{ url('/ganti-password-admin') }}" class="menu">
                        <div class="menu__icon"> <i data-lucide="lock"></i> </div>
                        <div class="menu__title"> GANTI PASSWORD </div>
                    </a>
                </li>
            <?php
            } else {
            ?>
                <li>
                    <a href="{{ url('/ganti-password') }}" class="menu">
                        <div class="menu__icon"> <i data-lucide="lock"></i> </div>
                        <div class="menu__title"> GANTI PASSWORD </div>
                    </a>
                </li>
            <?php
            }
            ?>
            <li>
                <a href="" class="menu">
                    <div class="menu__icon"> <i data-lucide="log-out"></i> </div>
                    <div class="menu__title">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"></i> LOGOUT </button>
                        </form>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>