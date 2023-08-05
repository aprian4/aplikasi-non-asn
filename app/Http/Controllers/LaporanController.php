<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\RiwayatJabatan;
use App\Models\Skpd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index($satus_pegawai = null, $pendataan_2022 = null)
    {
        $data['count_pendataan'] = 0;
        $data['count_thk2'] = 0;
        $data['count_status_aktif'] = 0;
        $data['count_status_diangkat'] = 0;
        $data['count_status_pindah'] = 0;
        $data['count_status_resign'] = 0;
        $data['count_kelengkapan'] = 0;
        $data['count_kelengkapan_tidak'] = 0;
        $data['count_identitas'] = 0;
        $data['identitas'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->orderBy('nama', 'ASC')->get();
        $data['rjabatan'] = RiwayatJabatan::orderBy('id', 'ASC')->get();
        $masa_kerja = [];
        foreach ($data['identitas'] as $identitass) {
            $masa_kerja[$identitass->id] = 0;
            foreach ($data['rjabatan'] as $rjabatans) {
                if ($rjabatans->identitas_id == $identitass->id) {
                    $tgl_mulai  = date_create($rjabatans->tgl_mulai);
                    $tgl_akhir  = date_create($rjabatans->tgl_akhir);
                    $diff = date_diff($tgl_mulai, $tgl_akhir);
                    $masa_kerja[$identitass->id] = $masa_kerja[$identitass->id] + $diff->m;
                }
            }
        }
        $data['masa_kerja'] = $masa_kerja;
        // dd($data['masa_kerja']);
        $data['user'] = Auth::user();
        $data['sidebar'] = "full";
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        //dd($data['skpd']);
        return view('admin.laporan.view_laporan_pegawai', $data);
    }

    public function index2(Request $request)
    {
        $status_pegawai = $request->status_pegawai ? $request->status_pegawai : 0;
        $status_pendataan = $request->status_pendataan ? $request->status_pendataan : 0;
        $opd = $request->skpd_id ? $request->skpd_id : 0;
        //dd($request);
        $data['count_pendataan'] = 0;
        $data['count_thk2'] = 0;
        $data['count_status_aktif'] = 0;
        $data['count_status_diangkat'] = 0;
        $data['count_status_pindah'] = 0;
        $data['count_status_resign'] = 0;
        $data['count_kelengkapan'] = 0;
        $data['count_kelengkapan_tidak'] = 0;
        $data['count_identitas'] = 0;
        //$data['identitas'] = Identitas::where('is_active', 1)->orderBy('nama', 'ASC')->get();
        $data['skpd'] = Skpd::where(['is_active' => 1])->get();
        if ($request->search > 0) {
            if (($status_pegawai > 0) && ($status_pendataan > 0) && ($opd > 0)) {
                $data['identitas'] = Identitas::where(['status_pegawai' => $status_pegawai, 'pendataan_2022' => $status_pendataan, 'skpd_id' => $opd, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
            } else if (($status_pegawai > 0) && ($opd > 0)) {
                $data['identitas'] = Identitas::where(['status_pegawai' => $status_pegawai, 'skpd_id' => $opd, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
            } else if (($status_pendataan > 0) && ($opd > 0)) {
                $data['identitas'] = Identitas::where(['pendataan_2022' => $status_pendataan, 'skpd_id' => $opd, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
            } else if (($status_pegawai > 0) && ($status_pendataan > 0)) {
                $data['identitas'] = Identitas::where(['status_pegawai' => $status_pegawai, 'pendataan_2022' => $status_pendataan, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
            } else if (($status_pegawai > 0)) {
                $data['identitas'] = Identitas::where(['status_pegawai' => $status_pegawai, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
            } else if (($status_pendataan > 0)) {
                $data['identitas'] = Identitas::where(['pendataan_2022' => $status_pendataan, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
            } else if (($opd > 0)) {
                $data['identitas'] = Identitas::where(['skpd_id' => $opd, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
            } else {
                $data['identitas'] = Identitas::where(['is_active' => 1])->orderBy('nama', 'ASC')->get();;
            }
        } else {
            $data['identitas'] = [];
        }
        $data['rjabatan'] = RiwayatJabatan::orderBy('id', 'ASC')->get();
        $masa_kerja = [];
        foreach ($data['identitas'] as $identitass) {
            $masa_kerja[$identitass->id] = 0;
            foreach ($data['rjabatan'] as $rjabatans) {
                if ($rjabatans->identitas_id == $identitass->id) {
                    $tgl_mulai  = date_create($rjabatans->tgl_mulai);
                    $tgl_akhir  = date_create($rjabatans->tgl_akhir);
                    $diff = date_diff($tgl_mulai, $tgl_akhir);
                    $masa_kerja[$identitass->id] = $masa_kerja[$identitass->id] + $diff->m;
                }
            }
        }
        $data['masa_kerja'] = $masa_kerja;
        $data['user'] = Auth::user();
        $data['sidebar'] = "full";
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        //dd($data['skpd']);
        return view('admin.laporan.view_laporan_pegawai', $data);
    }
}
