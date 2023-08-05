<div id="riwayat-pendidikan" class="tab-pane {{ $tab3 }}" role="tabpanel" aria-labelledby="riwayat-pendidikan-tab">
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <div class="mt-2 xl:mt-0">
                <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-tambah-riwayat-pendidikan" class="btn btn-primary"><i data-lucide="plus" class="w-5 h-5"></i>Tambah</a> </div> <!-- END: Modal Toggle -->
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="whitespace-nowrap" style="width: 5%;">No.</th>
                    <th class="whitespace-nowrap">Pendidikan</th>
                    <th class="whitespace-nowrap">Lembaga Pendidikan</th>
                    <th class="whitespace-nowrap">Tahun Lulus</th>
                    <th class="whitespace-nowrap">Dokumen</th>
                    <th class="whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @if($rpendidikan)
                @foreach ($rpendidikan as $rpendidikans)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $rpendidikans->pendidikan->jenjang_pendidikan }}</td>
                    <td>{{ $rpendidikans->lembaga_pendidikan }}</td>
                    <td>{{ $rpendidikans->tahun_lulus }}</td>
                    <td>
                        <?php
                        foreach ($ijazah as $ijazahs) {
                            if ($ijazahs->tabel_id == $rpendidikans->id) {
                                $path_ijazah = $ijazahs->path;
                                $ijazah_id = $ijazahs->id;
                                $path_ok = preg_replace("/public/", "storage", $path_ijazah);
                                // dd($path_ok);
                            }
                        }
                        ?>
                        <div class="row justify-content-center">
                            <a href="{{ asset($path_ok) }}" target="_blank"><img alt="" class="w-9" src="{{ url('images/pdf.png') }}"></img></a>
                        </div>
                    </td>
                    <td>
                        <a href=" javascript:;" data-tw-toggle="modal" data-tw-target="#modal-edit-rpendidikan" class="btn btn-warning btn-sm mr-1 mb-2 btn_ubah_rpendidikan" data-id="{{ $rpendidikans->id }}" data-identitas_id="{{ $rpendidikans->identitas_id }}" data-ijazah_id="{{ $ijazah_id }}" data-no_ijazah="{{ $rpendidikans->no_ijazah }}" data-tgl_ijazah="{{ $rpendidikans->tgl_ijazah }}" data-pendidikan_id="{{ $rpendidikans->pendidikan_id }}" data-lembaga_pendidikan="{{ $rpendidikans->lembaga_pendidikan }}" data-gelar_depan="{{ $rpendidikans->gelar_depan }}" data-gelar_belakang="{{ $rpendidikans->gelar_belakang }}"> <i data-lucide="edit" class="w-5 h-5"></i></a>
                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modal-hapus-rpendidikan" class="btn btn-danger btn-sm mr-1 mb-2 btn_hapus_rpendidikan" data-id="{{ $rpendidikans->id }}" data-identitas_id="{{ $rpendidikans->identitas_id }}" data-ijazah_id="{{ $ijazah_id }}"><i data-lucide="trash" class="w-5 h-5"></i></a>
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
                @endempty
        </table>
    </div>
    <!-- END: HTML Table Data -->

    <!-- BEGIN: Modal Content -->
    @include('admin.identitas.store_riwayat_pendidikan')
    @include('admin.identitas.update_riwayat_pendidikan')
    @include('admin.identitas.delete_riwayat_pendidikan')
    <!-- END: Modal Content -->
</div>