<div id="sptjm" class="tab-pane {{ $tab4 }}" role="tabpanel" aria-labelledby="sptjm-tab">
    <div class="grid grid-cols-12 gap-12">
        <!-- BEGIN: Top Categories -->
        <div class="intro-y box col-span-12 lg:col-span-12">
            <div id="horizontal-form" class="p-5">
                <?php
                if ($user->level == 1) {
                ?>
                    <form action="{{ url('admin/pegawai-admin/sptjm') }}" method="POST" enctype="multipart/form-data">
                    <?php
                } else { ?>
                        <form action="{{ url('admin/pegawai/sptjm') }}" method="POST" enctype="multipart/form-data">
                        <?php
                    }
                        ?>
                        <div class="preview">
                            @csrf

                            <?php
                            if ($sptjm) {
                                $req_sptjm = "";
                            } else {
                                $req_sptjm = " required";
                            }
                            ?>

                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-4">
                                    <input name="id" type="hidden" value="{{ $identitas->id }}">
                                    <input name="nama" type="hidden" value="{{ $identitas->nama }}">
                                    <label for="horizontal-form-2" class="form-label">*Upload Surat Pertanggungjawaban Mutlak (SPTJM)</label>
                                    <br>
                                </div>
                                <div class="form-inline mt-4 col-span-4">
                                    <input class="form-control" type="file" name="sptjm" id="sptjm" {{ $req_sptjm }}>
                                    <br>
                                </div>
                                <div class="form-inline mt-4 col-span-4">
                                    <?php
                                    //dd(asset($sptjm));
                                    if ($sptjm) {
                                        //dd(asset($sptjm));
                                    ?>
                                        <div class="row justify-content-center">
                                            <a class="btn btn-elevated-rounded-success mr-2 mb-2" href="{{ asset($sptjm) }}" target="_blank"> <i data-lucide="file"> </i> Buka SPTJM</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="grid grid-cols-12 gap-2">
                                <div class="form-inline mt-4 col-span-6">
                                </div>
                                <div class="form-inline mt-4 col-span-4">
                                </div>
                                <div class="form-inline mt-10  col-span-2">
                                    <button type="submit" class="btn btn-rounded-primary mr-1">Simpan Data</button>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        </form>
            </div>
            <!-- END: Top Categories -->
        </div>

    </div>
</div>