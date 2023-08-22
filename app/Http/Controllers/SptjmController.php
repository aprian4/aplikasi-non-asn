<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Models\Dokumen;
use App\Models\Identitas;

class SptjmController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'sptjm' => 'mimes:pdf|max:1000',
        ]);

        if ($request->hasFile('sptjm')) {
            $dokumen_lama = Dokumen::where(['identitas_id' => $request->id, 'jenis_dokumen' => 'sptjm'])->first();
            if ($dokumen_lama) {
                $dokumen_hapus = Dokumen::findOrFail($dokumen_lama->id);
                $dokumen_hapus->delete();
                Storage::delete($dokumen_lama->path);
            }

            $path = $request->file('sptjm')->store('public/images/sptjm');
            // dd($path);
            $dokumen = new Dokumen;
            $dokumen->identitas_id = $request->id;
            $dokumen->jenis_dokumen = "sptjm";
            $dokumen->path = $path;
            $dokumen->is_active = 1;
            $dokumen->created_by = Auth::user()->username;
            $dokumen->created_at = new DateTime();
            $dokumen->save();
        }

        $identitas = Identitas::find($request->id);

        if ($identitas->status_kelengkapan == 1) {
            $identitas->status_kelengkapan = 2;
        } else if ($identitas->status_kelengkapan == 2) {
            $identitas->status_kelengkapan = 3;
        } else if ($identitas->status_kelengkapan == 3) {
            $identitas->status_kelengkapan = 4;
        } else if ($identitas->status_kelengkapan == 4) {
            $identitas->status_kelengkapan = 5;
        }
        $identitas->updated_by = Auth::user()->username;
        $identitas->updated_at = new DateTime();


        if ($identitas->save()) {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $request->id . '?tab=4')->with('sukses', 'SPTJM a.n ' . $request->nama . ' Berhasil Diupload!');
            } else {
                return redirect('/admin/pegawai/detail/' . $request->id . '?tab=4')->with('sukses', 'SPTJM a.n ' . $request->nama . ' Berhasil Diupload!');
            }
        } else {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $request->id . '?tab=4')->with('gagal', 'SPTJM Gagal Diupload!');
            } else {

                return redirect('/admin/pegawai/detail/' . $request->id . '?tab=4')->with('gagal', 'SPTJM Gagal Diupload!');
            }
        }
    }
}
