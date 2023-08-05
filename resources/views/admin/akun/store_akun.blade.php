<div id="modal-tambah-user" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/admin/akun/store') }}" method="POST" enctype="multipart/form-data">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Tambah User</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    @csrf
                    <div class="col-span-12 sm:col-span-12">
                        <label for="nama" class="form-label">Nama User</label>
                        <input name="nama" type="text" class="form-control" placeholder="Nama User" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="skpd_id" class="form-label">Perangkat Daerah</label>
                        <select name="skpd_id" class="tom-select w-full" required>
                            @foreach ($skpd as $skpds)
                            <option value="<?= $skpds->id ?>">{{ $skpds->nama_skpd }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="level" class="form-label" required>Role</label>
                        <select name="level" class="form-select">
                            <option value="3">User</option>
                            <option value="2">Admin OPD</option>
                            <option value="1">Super Admin</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="text" class="form-control" placeholder="Password (default:bkpsdm123)">
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