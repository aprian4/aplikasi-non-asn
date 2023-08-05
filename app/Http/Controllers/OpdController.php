<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Identitas;
use Illuminate\Http\Request;

class OpdController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $data['sidebar'] = "";
        $data['count_pendataan'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->where('pendataan_2022', '<', 3)->count();
        $data['count_thk2'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->where('pendataan_2022', 2)->count();
        $data['count_status_aktif'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->where('status_pegawai', 1)->count();
        $data['count_status_diangkat'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->where('status_pegawai', 2)->count();
        $data['count_status_pindah'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->where('status_pegawai', 3)->count();
        $data['count_status_resign'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->where('status_pegawai', 4)->count();
        $data['count_kelengkapan'] = Identitas::where(['skpd_id' => Auth::user()->skpd_id, 'status_kelengkapan' => 4])->count();
        $data['count_kelengkapan_tidak'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->where('status_kelengkapan', '<', 4)->count();
        $data['count_identitas'] = Identitas::where('skpd_id', Auth::user()->skpd_id)->count();
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        return view('admin.index', $data);
    }
}
