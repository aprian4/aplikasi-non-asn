<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Skpd;
use App\Models\Identitas;
use DateTime;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class AkunController extends Controller
{
    public function index()
    {
        $data['sidebar'] = "";
        $data['count_pendataan'] = 0;
        $data['count_thk2'] = 0;
        $data['count_status_aktif'] = 0;
        $data['count_status_diangkat'] = 0;
        $data['count_status_pindah'] = 0;
        $data['count_status_resign'] = 0;
        $data['count_kelengkapan'] = 0;
        $data['count_kelengkapan_tidak'] = 0;
        $data['count_identitas'] = 0;
        $data['user'] = Auth::user();
        $data['akun'] = User::where('is_active', 1)->get();
        $data['skpd'] = Skpd::where('is_active', 1)->get();
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        //dd($data['skpd']);
        return view('admin.akun.view_akun', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|unique:users|max:255',
            'skpd_id' => 'required',
            'level' => 'required',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->skpd_id = $request->skpd_id;
        $user->level = $request->level;
        $user->is_active = 1;
        $user->created_by = Auth::user()->username;
        $user->created_at = new DateTime();
        $user->password = isEmpty($request->password) ?  Hash::make("bkpsdm123") : Hash::make($request->password);
        $user->save();
        if ($user->save()) {
            return redirect('/admin/akun')->with('sukses', 'User Berhasil Ditambahkan!');
        } else {
            return redirect('/admin/akun')->with('gagal', 'User Gagal Ditambahkan!');
        }
    }

    public function update(Request $request)
    {

        $request->validate([
            'nama' => 'required|max:255',
            'skpd_id' => 'required',
            'level' => 'required',
        ]);

        $user = User::find($request->id);
        $user->nama = $request->nama;
        $user->skpd_id = $request->skpd_id;
        $user->level = $request->level;
        $user->updated_by = Auth::user()->username;
        $user->updated_at = new DateTime();
        if ($user->save()) {
            return redirect('/admin/akun')->with('sukses', 'User Berhasil Diubah!');
        } else {
            return redirect('/admin/akun')->with('gagal', 'User Gagal Diubah!');
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->updated_at = new DateTime();
        if ($user->save()) {
            return redirect('/admin/akun')->with('sukses', 'Password Berhasil Diubah!');
        } else {
            return redirect('/admin/akun')->with('gagal', 'Password Gagal Diubah!');
        }
    }

    public function delete(Request $request)
    {

        $user = User::findOrFail($request->id);

        if ($user->delete()) {
            return redirect('/admin/akun')->with('sukses', 'User Berhasil Dihapus!');
        } else {
            return redirect('/admin/akun')->with('gagal', 'User Gagal Dihapus!');
        }
    }
}
