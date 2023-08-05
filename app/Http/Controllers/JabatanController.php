<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Jabatan;
use App\Models\Identitas;
use DateTime;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class JabatanController extends Controller
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
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        $data['user'] = Auth::user();
        $data['jabatan'] = Jabatan::where('is_active', 1)->get();
        //dd($data['jabatan']);
        return view('admin.master-data.jabatan.view_jabatan', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_jabatan' => 'required|unique:jabatans|max:255',
        ]);

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->is_active = 1;
        $jabatan->created_by = Auth::user()->username;
        $jabatan->created_at = new DateTime();
        $jabatan->save();
        if ($jabatan->save()) {
            return redirect('/admin/master/jabatan')->with('sukses', 'Jabatan Berhasil Ditambahkan!');
        } else {
            return redirect('/admin/master/jabatan')->with('gagal', 'Jabatan Gagal Ditambahkan!');
        }
    }

    public function update(Request $request)
    {

        $request->validate([
            'nama_jabatan' => 'required|max:255',
        ]);

        $jabatan = Jabatan::find($request->id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->updated_by = Auth::user()->username;
        $jabatan->updated_at = new DateTime();
        if ($jabatan->save()) {
            return redirect('/admin/master/jabatan')->with('sukses', 'Jabatan Berhasil Diubah!');
        } else {
            return redirect('/admin/master/jabatan')->with('gagal', 'Jabatan Gagal Diubah!');
        }
    }


    public function delete(Request $request)
    {

        $jabatan = Jabatan::findOrFail($request->id);

        if ($jabatan->delete()) {
            return redirect('/admin/master/jabatan')->with('sukses', 'Jabatan Berhasil Dihapus!');
        } else {
            return redirect('/admin/master/jabatan')->with('gagal', 'Jabatan Gagal Dihapus!');
        }
    }
}
