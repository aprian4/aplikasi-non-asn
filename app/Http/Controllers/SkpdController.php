<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Skpd;
use App\Models\Identitas;
use DateTime;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class SkpdController extends Controller
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
        $data['skpd'] = Skpd::where('is_active', 1)->get();
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        //dd($data['skpd']);
        return view('admin.master-data.skpd.view_skpd', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_skpd' => 'required|unique:skpds|max:255',
            'alias_skpd' => 'required|unique:skpds|max:50',
        ]);

        $skpd = new Skpd;
        $skpd->nama_skpd = $request->nama_skpd;
        $skpd->alias_skpd = $request->alias_skpd;
        $skpd->is_active = 1;
        $skpd->created_by = Auth::user()->username;
        $skpd->created_at = new DateTime();
        $skpd->save();
        if ($skpd->save()) {
            return redirect('/admin/master/skpd')->with('sukses', 'SKPD Berhasil Ditambahkan!');
        } else {
            return redirect('/admin/master/skpd')->with('gagal', 'SKPD Gagal Ditambahkan!');
        }
    }

    public function update(Request $request)
    {

        $request->validate([
            'nama_skpd' => 'required|max:255',
            'alias_skpd' => 'required|max:50',
        ]);

        $skpd = Skpd::find($request->id);
        $skpd->nama_skpd = $request->nama_skpd;
        $skpd->alias_skpd = $request->alias_skpd;
        $skpd->updated_by = Auth::user()->username;
        $skpd->updated_at = new DateTime();
        if ($skpd->save()) {
            return redirect('/admin/master/skpd')->with('sukses', 'SKPD Berhasil Diubah!');
        } else {
            return redirect('/admin/master/skpd')->with('gagal', 'SKPD Gagal Diubah!');
        }
    }


    public function delete(Request $request)
    {

        $skpd = Skpd::findOrFail($request->id);

        if ($skpd->delete()) {
            return redirect('/admin/master/skpd')->with('sukses', 'SKPD Berhasil Dihapus!');
        } else {
            return redirect('/admin/master/skpd')->with('gagal', 'SKPD Gagal Dihapus!');
        }
    }
}
