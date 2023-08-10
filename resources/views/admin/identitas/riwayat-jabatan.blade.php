<div id="riwayat-jabatan" class="tab-pane {{ $tab2 }}" role="tabpanel" aria-labelledby="riwayat-jabatan-tab">
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <div class="mt-2 xl:mt-0">
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-tambah-riwayat-jabatan" class="btn btn-primary"><i data-lucide="plus" class="w-5 h-5"></i>Tambah</a> </div> <!-- END: Modal Toggle -->
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap" style="width: 5%;">No.</th>
                    <th class="whitespace-nowrap">Perangkat Daerah</th>
                    <th class="whitespace-nowrap">Jabatan</th>
                    <th class="whitespace-nowrap">Periode</th>
                    <th class="whitespace-nowrap">Masa Kerja</th>
                    <th class="whitespace-nowrap">SPK</th>
                    <th class="whitespace-nowrap">Daftar Gaji</th>
                    <th class="whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @if($rjabatan)
                @foreach ($rjabatan as $rjabatans)
                <?php
                $tgl_mulai  = date_create($rjabatans->tgl_mulai);
                $tgl_akhir  = date_create($rjabatans->tgl_akhir);
                $convert_tgl_mulai = date_format($tgl_mulai, "d-m-Y");
                $convert_tgl_akhir = date_format($tgl_akhir, "d-m-Y");
                $diff = date_diff($tgl_mulai, $tgl_akhir);
                $convert_tgl_mulai_view = date_format($tgl_mulai, "d M Y");
                $convert_tgl_akhir_view = date_format($tgl_akhir, "d M Y");
                ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $rjabatans->nama_skpd }}</td>
                    <td>{{ $rjabatans->jabatan->nama_jabatan }}</td>
                    <td>{{ $convert_tgl_mulai_view }} <b>s/d</b> {{ $convert_tgl_akhir_view }}</td>
                    <td>{{ $diff->m + 1 }} Bulan</td>
                    <td>
                        <?php
                        foreach ($spk as $spks) {
                            if ($spks->tabel_id == $rjabatans->id) {
                                $path_spk = $spks->path;
                                $spk_id = $spks->id;
                                $path_ok = preg_replace("/public/", "storage", $path_spk);
                                // dd($path_ok);
                            }
                        }
                        ?>
                        <div class="row justify-content-center">
                            <a href="{{ asset($path_ok) }}" target="_blank"><img alt="" class="w-9" src="{{ url('images/pdf.png') }}"></img></a>
                        </div>
                    </td>
                    <td>
                        <?php
                        foreach ($ledger as $ledgers) {
                            if ($ledgers->tabel_id == $rjabatans->id) {
                                $path_ledger = $ledgers->path;
                                $ledger_id = $ledgers->id;
                                $path_ok2 = preg_replace("/public/", "storage", $path_ledger);
                                //dd($ledger_id);
                            }
                        }
                        ?>
                        <div class="row justify-content-center">
                            <a href="{{ asset($path_ok2) }}" target="_blank"><img alt="" class="w-9" src="{{ url('images/pdf.png') }}"></img></a>
                        </div>
                    </td>
                    <td>
                        <a href=" javascript:;" data-tw-toggle="modal" data-tw-target="#modal-edit-rjabatan" class="btn btn-warning btn-sm mr-1 mb-2 btn_ubah_rjabatan" data-id="{{ $rjabatans->id }}" data-no_rek="{{ $rjabatans->no_rek }}" data-gaji="{{ $rjabatans->gaji }}" data-ledger_id="{{ $ledger_id }}" data-identitas_id="{{ $rjabatans->identitas_id }}" data-no_spk="{{ $rjabatans->no_spk }}" data-tgl_spk="{{ $rjabatans->tgl_spk }}" data-tgl_mulai="{{ $rjabatans->tgl_mulai }}" data-tgl_akhir="{{ $rjabatans->tgl_akhir }}" data-nama_skpd="{{ $rjabatans->nama_skpd }}" data-unit_kerja="{{ $rjabatans->unit_kerja }}" data-jabatan_id="{{ $rjabatans->jabatan_id }}" data-pendidikan_id="{{ $rjabatans->pendidikan_id }}" data-pembayaran="{{ $rjabatans->pembayaran }}" data-tandatangan="{{ $rjabatans->tandatangan }}" data-spk_id="{{ $spk_id }}"> <i data-lucide="edit" class="w-5 h-5"></i></a>
                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-hapus-rjabatan" class="btn btn-danger btn-sm mr-1 mb-2 btn_hapus_rjabatan" data-id="{{ $rjabatans->id }}" data-ledger_id="{{ $ledger_id }}" data-identitas_id="{{ $rjabatans->identitas_id }}" data-spk_id="{{ $spk_id }}"><i data-lucide="trash" class="w-5 h-5"></i></a>
                    </td>
                </tr>
                <?php
                $i++;
                ?>
                @endforeach

                @else
                <tr>
                    <td colspan="6">
                        <center>Tidak Ada Data</center>
                    </td>
                </tr>
                @endif
        </table>
    </div>
    <!-- END: HTML Table Data -->

    <!-- BEGIN: Modal Content -->
    @include('admin.identitas.store_riwayat_jabatan')
    @include('admin.identitas.update_riwayat_jabatan')
    @include('admin.identitas.delete_riwayat_jabatan')
    <!-- END: Modal Content -->
</div>