<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Identitas;
use App\Models\Skpd;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $data['sidebar'] = "";
        $data['count_pendataan'] = Identitas::where('pendataan_2022', '<', 3)->count();
        $data['count_thk2'] = Identitas::where('pendataan_2022', 2)->count();
        $data['count_status_aktif'] = Identitas::where('status_pegawai', 1)->count();
        $data['count_status_diangkat'] = Identitas::where('status_pegawai', 2)->count();
        //dd($data['count_status_diangkat']);
        $data['count_status_pindah'] = Identitas::where('status_pegawai', 3)->count();
        $data['count_status_resign'] = Identitas::where('status_pegawai', 4)->count();
        $data['count_kelengkapan'] = Identitas::where('status_kelengkapan', 4)->count();
        $data['count_kelengkapan_tidak'] = Identitas::where('status_kelengkapan', '<', 4)->count();
        $data['count_identitas'] = Identitas::where('is_active', 1)->count();
        $skpdcount = [];
        $identitascount = [];
        $get_skpd = Skpd::where('is_active', 1)->get();
        foreach ($get_skpd as $get_skpds) {
            $identitascount[] = Identitas::where(['is_active' => 1, 'skpd_id' => $get_skpds->id])->count();
            $skpdcount[] = $get_skpds->alias_skpd;
        }
        $data['nama_skpd'] = $skpdcount;
        $data['jml_pegawai'] = $identitascount;
        return view('admin.index2', $data);
    }
}
