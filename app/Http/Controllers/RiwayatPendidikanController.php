<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Models\Dokumen;
use App\Models\Identitas;

class RiwayatPendidikanController extends Controller
{

    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'no_ijazah' => 'required',
            'tgl_ijazah' => 'required',
            'pendidikan_id' => 'required|min_digits:1',
            'lembaga_pendidikan' => 'required',
            'ijazah' => 'mimes:pdf|max:1000'
        ]);

        $explode = explode('-', $request->tgl_ijazah);
        $tahun_lulus = $explode[0];

        $rpendidikan = new RiwayatPendidikan;
        $rpendidikan->no_ijazah = $request->no_ijazah;
        $rpendidikan->tgl_ijazah = $request->tgl_ijazah;
        $rpendidikan->identitas_id = $request->id;
        $rpendidikan->pendidikan_id = $request->pendidikan_id;
        $rpendidikan->tahun_lulus = $tahun_lulus;
        $rpendidikan->lembaga_pendidikan = $request->lembaga_pendidikan;
        $rpendidikan->gelar_depan = ($request->gelar_depan ? $request->gelar_depan : null);
        $rpendidikan->gelar_belakang = ($request->gelar_belakang ? $request->gelar_belakang : null);
        $rpendidikan->is_active = 1;
        $rpendidikan->created_by = Auth::user()->username;
        $rpendidikan->created_at = new DateTime();
        $rpendidikan->save();
        $id_terakhir = $rpendidikan->id;
        //dd($rpendidikan->id);

        if ($request->hasFile('ijazah')) {
            $path = $request->file('ijazah')->store('public/images/ijazah');
            // dd($path);
            $dokumen = new Dokumen;
            $dokumen->identitas_id = $request->id;
            $dokumen->tabel_id = $id_terakhir;
            $dokumen->jenis_dokumen = "ijazah";
            $dokumen->path = $path;
            $dokumen->is_active = 1;
            $dokumen->created_by = Auth::user()->username;
            $dokumen->created_at = new DateTime();
            $dokumen->save();
        }

        if ($rpendidikan->save()) {
            $identitas = Identitas::findOrFail($request->id);
            if ($identitas->status_kelengkapan == 1) {
                $identitas->status_kelengkapan = 2;
            } else if ($identitas->status_kelengkapan == 2) {
                $identitas->status_kelengkapan = 3;
            } else if ($identitas->status_kelengkapan == 3) {
                $identitas->status_kelengkapan = 4;
            }
            $identitas->updated_by = Auth::user()->username;
            $identitas->updated_at = new DateTime();
            $identitas->save();
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $request->id . '?tab=3')->with('sukses', 'Riwayat Pendidikan a.n ' . $request->nama . ' Berhasil Ditambahkan!');
            } else {
                return redirect('/admin/pegawai/detail/' . $request->id . '?tab=3')->with('sukses', 'Riwayat Pendidikan a.n ' . $request->nama . ' Berhasil Ditambahkan!');
            }
        } else {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $request->id . '?tab=3')->with('gagal', 'Riwayat Pendidikan Gagal Ditambahkan!');
            } else {
                return redirect('/admin/pegawai/detail/' . $request->id . '?tab=3')->with('gagal', 'Riwayat Pendidikan Gagal Ditambahkan!');
            }
        }
    }

    public function update(Request $request)
    {
        //dd($request);

        $request->validate([
            'no_ijazah' => 'required',
            'tgl_ijazah' => 'required',
            'pendidikan_id' => 'required|min_digits:1',
            'lembaga_pendidikan' => 'required',
            'ijazah' => 'mimes:pdf|max:1000'
        ]);

        $explode = explode('-', $request->tgl_ijazah);
        $tahun_lulus = $explode[0];

        $rpendidikan = RiwayatPendidikan::find($request->id);
        $rpendidikan->no_ijazah = $request->no_ijazah;
        $rpendidikan->tgl_ijazah = $request->tgl_ijazah;
        $rpendidikan->identitas_id = $request->identitas_id;
        $rpendidikan->pendidikan_id = $request->pendidikan_id;
        $rpendidikan->tahun_lulus = $tahun_lulus;
        $rpendidikan->lembaga_pendidikan = $request->lembaga_pendidikan;
        $rpendidikan->gelar_depan = ($request->gelar_depan ? $request->gelar_depan : null);
        $rpendidikan->gelar_belakang = ($request->gelar_belakang ? $request->gelar_belakang : null);
        $rpendidikan->is_active = 1;
        $rpendidikan->created_by = Auth::user()->username;
        $rpendidikan->created_at = new DateTime();
        $rpendidikan->save();
        $id_terakhir = $rpendidikan->id;
        //dd($rpendidikan->id);

        if ($request->hasFile('ijazah')) {
            $dokumen_lama2 = Dokumen::where(['identitas_id' => $request->identitas_id, 'tabel_id' => $request->id, 'jenis_dokumen' => 'ijazah'])->first();
            if ($dokumen_lama2) {
                $dokumen_hapus2 = Dokumen::findOrFail($dokumen_lama2->id);
                $dokumen_hapus2->delete();
                Storage::delete($dokumen_lama2->path);
            }
            $path = $request->file('ijazah')->store('public/images/ijazah');
            // dd($path);
            $dokumen2 = new Dokumen;
            $dokumen2->identitas_id = $request->identitas_id;
            $dokumen2->tabel_id = $id_terakhir;
            $dokumen2->jenis_dokumen = "ijazah";
            $dokumen2->path = $path;
            $dokumen2->is_active = 1;
            $dokumen2->created_by = Auth::user()->username;
            $dokumen2->created_at = new DateTime();
            $dokumen2->save();
        }

        if ($rpendidikan->save()) {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $request->identitas_id . '?tab=3')->with('sukses', 'Riwayat Pendidikan Berhasil Diubah!');
            } else {
                return redirect('/admin/pegawai/detail/' . $request->identitas_id . '?tab=3')->with('sukses', 'Riwayat Pendidikan Berhasil Diubah!');
            }
        } else {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $request->identitas_id . '?tab=3')->with('gagal', 'Riwayat Pendidikan Gagal Diubah!');
            } else {

                return redirect('/admin/pegawai/detail/' . $request->identitas_id . '?tab=3')->with('gagal', 'Riwayat Pendidikan Gagal Diubah!');
            }
        }
    }

    public function delete(Request $request)
    {

        //dd($request);
        $rpendidikan = RiwayatPendidikan::findOrFail($request->id);
        //dd($rpendidikan->identitas_id);

        if ($rpendidikan->delete()) {
            $dokumen_ijazah = Dokumen::findOrFail($request->ijazah_id);
            Storage::delete($dokumen_ijazah->path);
            $dokumen_ijazah->delete();

            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $rpendidikan->identitas_id . '?tab=3')->with('sukses', 'Riwayat Pendidikan Berhasil Dihapus!');
            } else {

                return redirect('/admin/pegawai/detail/' . $rpendidikan->identitas_id . '?tab=3')->with('sukses', 'Riwayat Pendidikan Berhasil Dihapus!');
            }
        } else {

            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $rpendidikan->identitas_id . '?tab=3')->with('gagal', 'Riwayat Pendidikan Gagal Dihapus!');
            } else {
                return redirect('/admin/pegawai/detail/' . $rpendidikan->identitas_id . '?tab=3')->with('gagal', 'Riwayat Pendidikan Gagal Dihapus!');
            }
        }
    }
}
