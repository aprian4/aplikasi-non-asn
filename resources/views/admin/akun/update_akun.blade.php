<div id="modal-edit-user" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/admin/akun/update') }}" method="POST" enctype="multipart/form-data">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Ubah User</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    @csrf
                    <div class="col-span-12 sm:col-span-12">
                        <label for="nama" class="form-label">Nama User</label>
                        <input name="id" type="hidden" class="form-control ubah_id">
                        <input name="nama" type="text" class="form-control ubah_nama" placeholder="Nama User" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control ubah_username" placeholder="Username" readonly>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="skpd_id" class="form-label">OPD</label>
                        <select name="skpd_id" class="tom-select w-full ubah_skpd_id" required>
                            @foreach ($skpd as $skpds)
                            <option value="<?= $skpds->id ?>">{{ $skpds->nama_skpd }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="level" class="form-label" required>Role</label>
                        <select name="level" class="form-select ubah_level">
                            <option value="3">User</option>
                            <option value="2">Admin SKPD</option>
                            <option value="1">Super Admin</option>
                        </select>
                    </div>
                </div> <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Batal</button>
                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div>