<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Models\Dokumen;
use App\Models\Identitas;

class RiwayatJabatanController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'no_spk' => 'required',
            'tgl_mulai' => 'required',
            'tgl_spk' => 'required',
            'tgl_akhir' => 'required',
            'nama_skpd' => 'required',
            'jabatan_id' => 'required|min_digits:1',
            'pendidikan_id' => 'required|min_digits:1',
            'pembayaran' => 'required',
            'tandatangan' => 'required',
            'tgl_akhir' => 'required',
            'spk' => 'mimes:pdf|max:1000',
            'ledger' => 'mimes:pdf|max:2000',
        ]);


        $rjabatan = new RiwayatJabatan;
        $rjabatan->no_spk = $request->no_spk;
        $rjabatan->tgl_spk = $request->tgl_spk;
        $rjabatan->identitas_id = $request->id;
        $rjabatan->tgl_mulai = $request->tgl_mulai;
        $rjabatan->tgl_akhir = $request->tgl_akhir;
        $rjabatan->nama_skpd = $request->nama_skpd;
        $rjabatan->jabatan_id = $request->jabatan_id;
        $rjabatan->unit_kerja = $request->unit_kerja;
        $rjabatan->pendidikan_id = $request->pendidikan_id;
        $rjabatan->pembayaran = $request->pembayaran;
        $rjabatan->tandatangan = $request->tandatangan;
        $rjabatan->skpd_id = 0;
        $rjabatan->is_active = 1;
        $rjabatan->status = 1;
        $rjabatan->created_by = Auth::user()->username;
        $rjabatan->created_at = new DateTime();
        $rjabatan->save();
        $id_terakhir = $rjabatan->id;
        //dd($rjabatan->id);

        if ($request->hasFile('spk')) {
            $path = $request->file('spk')->store('public/images/spk');
            // dd($path);
            $dokumen = new Dokumen;
            $dokumen->identitas_id = $request->id;
            $dokumen->tabel_id = $id_terakhir;
            $dokumen->jenis_dokumen = "spk";
            $dokumen->path = $path;
            $dokumen->is_active = 1;
            $dokumen->created_by = Auth::user()->username;
            $dokumen->created_at = new DateTime();
            $dokumen->save();
        }

        if ($request->hasFile('ledger')) {
            $path = $request->file('ledger')->store('public/images/ledger');
            // dd($path);
            $dokumen = new Dokumen;
            $dokumen->identitas_id = $request->id;
            $dokumen->tabel_id = $id_terakhir;
            $dokumen->jenis_dokumen = "ledger";
            $dokumen->path = $path;
            $dokumen->is_active = 1;
            $dokumen->created_by = Auth::user()->username;
            $dokumen->created_at = new DateTime();
            $dokumen->save();
        }

        if ($rjabatan->save()) {
            $identitas = Identitas::findOrFail($request->id);
            $identitas->status_kelengkapan = 3;
            $identitas->updated_by = Auth::user()->username;
            $identitas->updated_at = new DateTime();
            $identitas->save();
            return redirect('/admin/pegawai/detail/' . $request->id . '?tab=2')->with('sukses', 'Riwayat Jabatan a.n ' . $request->nama . ' Berhasil Ditambahkan!');
        } else {
            return redirect('/admin/pegawai/detail/' . $request->id . '?tab=2')->with('gagal', 'Riwayat Jabatan Gagal Ditambahkan!');
        }
    }

    public function update(Request $request)
    {

        $request->validate([
            'no_spk' => 'required',
            'tgl_mulai' => 'required',
            'tgl_spk' => 'required',
            'tgl_akhir' => 'required',
            'nama_skpd' => 'required',
            'jabatan_id' => 'required|min_digits:1',
            'pendidikan_id' => 'required|min_digits:1',
            'pembayaran' => 'required',
            'tandatangan' => 'required',
            'tgl_akhir' => 'required',
            'spk' => 'mimes:pdf|max:1000',
            'ledger' => 'mimes:pdf|max:1000',
        ]);

        $rjabatan = RiwayatJabatan::find($request->id);
        $rjabatan->no_spk = $request->no_spk;
        $rjabatan->tgl_spk = $request->tgl_spk;
        $rjabatan->identitas_id = $request->identitas_id;
        $rjabatan->tgl_mulai = $request->tgl_mulai;
        $rjabatan->tgl_akhir = $request->tgl_akhir;
        $rjabatan->nama_skpd = $request->nama_skpd;
        $rjabatan->jabatan_id = $request->jabatan_id;
        $rjabatan->unit_kerja = $request->unit_kerja;
        $rjabatan->pendidikan_id = $request->pendidikan_id;
        $rjabatan->pembayaran = $request->pembayaran;
        $rjabatan->tandatangan = $request->tandatangan;
        $rjabatan->skpd_id = 0;
        $rjabatan->is_active = 1;
        $rjabatan->status = 1;
        $rjabatan->updated_by = Auth::user()->username;
        $rjabatan->updated_at = new DateTime();
        $rjabatan->save();
        $id_terakhir = $rjabatan->id;
        //dd($rjabatan->id);

        if ($request->hasFile('spk')) {
            $dokumen_lama = Dokumen::where(['identitas_id' => $request->identitas_id, 'tabel_id' => $request->id, 'jenis_dokumen' => 'spk'])->first();
            if ($dokumen_lama) {
                $dokumen_hapus = Dokumen::findOrFail($dokumen_lama->id);
                $dokumen_hapus->delete();
                Storage::delete($dokumen_lama->path);
            }
            $path = $request->file('spk')->store('public/images/spk');
            // dd($path);
            $dokumen = new Dokumen;
            $dokumen->identitas_id = $request->identitas_id;
            $dokumen->tabel_id = $id_terakhir;
            $dokumen->jenis_dokumen = "spk";
            $dokumen->path = $path;
            $dokumen->is_active = 1;
            $dokumen->created_by = Auth::user()->username;
            $dokumen->created_at = new DateTime();
            $dokumen->save();
        }

        if ($request->hasFile('ledger')) {
            $dokumen_lama2 = Dokumen::where(['identitas_id' => $request->identitas_id, 'tabel_id' => $request->id, 'jenis_dokumen' => 'ledger'])->first();
            if ($dokumen_lama2) {
                $dokumen_hapus2 = Dokumen::findOrFail($dokumen_lama2->id);
                $dokumen_hapus2->delete();
                Storage::delete($dokumen_lama2->path);
            }
            $path = $request->file('ledger')->store('public/images/ledger');
            // dd($path);
            $dokumen2 = new Dokumen;
            $dokumen2->identitas_id = $request->identitas_id;
            $dokumen2->tabel_id = $id_terakhir;
            $dokumen2->jenis_dokumen = "ledger";
            $dokumen2->path = $path;
            $dokumen2->is_active = 1;
            $dokumen2->created_by = Auth::user()->username;
            $dokumen2->created_at = new DateTime();
            $dokumen2->save();
        }

        if ($rjabatan->save()) {

            return redirect('/admin/pegawai/detail/' . $request->identitas_id . '?tab=2')->with('sukses', 'Riwayat Jabatan Berhasil Diubah!');
        } else {
            return redirect('/admin/pegawai/detail/' . $request->identitas_id . '?tab=2')->with('gagal', 'Riwayat Jabatan Gagal Diubah!');
        }
    }

    public function delete(Request $request)
    {

        //dd($request->ledger_id);
        $rjabatan = RiwayatJabatan::findOrFail($request->id);
        //dd($rjabatan->identitas_id);

        if ($rjabatan->delete()) {
            $dokumen_spk = Dokumen::findOrFail($request->spk_id);
            Storage::delete($dokumen_spk->path);
            $dokumen_spk->delete();
            //dd($dokumen_spk->path);

            $dokumen_ledger = Dokumen::findOrFail($request->ledger_id);
            Storage::delete($dokumen_ledger->path);
            $dokumen_ledger->delete();

            return redirect('/admin/pegawai/detail/' . $rjabatan->identitas_id . '?tab=2')->with('sukses', 'Riwayat Jabatan Berhasil Dihapus!');
        } else {
            return redirect('/admin/pegawai/detail/' . $rjabatan->identitas_id . '?tab=2')->with('gagal', 'Riwayat Jabatan Gagal Dihapus!');
        }
    }
}
