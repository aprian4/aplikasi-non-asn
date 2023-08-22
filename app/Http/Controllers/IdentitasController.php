<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Support\Facades\Auth;
use App\Models\Identitas;
use App\Models\Perkawinan;
use App\Models\User;
use App\Models\Skpd;
use App\Models\Pendidikan;
use App\Models\Jabatan;
use App\Models\Dokumen;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Storage;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class IdentitasController extends Controller
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
        $skpd_id = Auth::user()->skpd_id;
        $data['identitas'] = Identitas::where('skpd_id', $skpd_id)->orderBy('nama', 'asc')->get();
        $data['skpd'] = Skpd::where('is_active', 1)->get();
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        $data['path_foto'] = Dokumen::where('jenis_dokumen', 'foto')->get();
        //$data['jabatan'] = Jabatan::where('is_active', 1)->get();
        //dd($data['identitas']);
        return view('admin.identitas.view_identitas', $data);
    }
    public function index2(Request $request)
    {
        $opd = $request->skpd_id ? $request->skpd_id : 0;

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

        if (($opd > 0) && ($request->search > 0)) {
            $data['identitas'] = Identitas::where(['skpd_id' => $opd, 'is_active' => 1])->orderBy('nama', 'ASC')->get();
        } else {
            $data['identitas'] = [];
        }
        $data['skpd'] = Skpd::where('is_active', 1)->get();
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        $data['path_foto'] = Dokumen::where('jenis_dokumen', 'foto')->get();
        //$data['jabatan'] = Jabatan::where('is_active', 1)->get();
        //dd($data['identitas']);
        return view('admin.identitas.view_identitas', $data);
    }
    public function detail($id)
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
        //dd($id);
        $data['identitas'] = Identitas::where('id', $id)->first();
        $data['rjabatan'] = RiwayatJabatan::where('identitas_id', $id)->orderBy('tgl_akhir', 'DESC')->get();
        $data['rpendidikan'] = RiwayatPendidikan::where('identitas_id', $id)->orderBy('tahun_lulus', 'DESC')->get();
        $data['agama'] = Agama::where('is_active', 1)->get();
        $data['pendidikan'] = Pendidikan::where('is_active', 1)->get();
        $data['jabatan'] = Jabatan::where('is_active', 1)->get();
        $data['perkawinan'] = Perkawinan::get();
        $data['skpd'] = Skpd::where('is_active', 1)->get();

        $path_foto = Dokumen::where(['identitas_id' => $id, 'jenis_dokumen' => 'foto'])->first();
        $data['foto'] = $path_foto ? Storage::url($path_foto->path) : null;

        $path_ktp = Dokumen::where(['identitas_id' => $id, 'jenis_dokumen' => 'ktp'])->first();
        $data['ktp'] = $path_ktp ? Storage::url($path_ktp->path) : null;

        $path_sptjm = Dokumen::where(['identitas_id' => $id, 'jenis_dokumen' => 'sptjm'])->first();
        $data['sptjm'] = $path_sptjm ? Storage::url($path_sptjm->path) : null;

        $data['spk'] = Dokumen::where(['identitas_id' => $id, 'jenis_dokumen' => 'spk'])->get();
        //dd($data['spk']['']);
        $data['ledger'] = Dokumen::where(['identitas_id' => $id, 'jenis_dokumen' => 'ledger'])->get();
        $data['ijazah'] = Dokumen::where(['identitas_id' => $id, 'jenis_dokumen' => 'ijazah'])->get();
        // dd($data['active_tab']);

        // dd($data['foto']);
        $data['nama_skpd'] = [];
        $data['jml_pegawai'] = [];
        return view('admin.identitas.detail_identitas', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|unique:identitas|digits:16',
            'nama' => 'required',
            'skpd_id' => 'required',
            'pendataan_2022' => 'required',
        ]);
        //ADD PEGAWAI
        $identitas = new Identitas;
        $identitas->nik = $request->nik;
        $identitas->nama = $request->nama;
        $identitas->skpd_id = $request->skpd_id;
        $identitas->jabatan_id = 0;
        $identitas->pendidikan_id = 0;
        $identitas->pendataan_2022 = $request->pendataan_2022;
        $identitas->is_active = 1;
        $identitas->status = 1;
        $identitas->status_pegawai = 1;
        $identitas->status_kelengkapan = 1;
        $identitas->created_by = Auth::user()->username;
        $identitas->created_at = new DateTime();
        $identitas->save();
        if ($identitas->save()) {
            //ADD USER AKUN
            // $user = new User;
            // $user->nama = $request->nama;
            // $user->username = $request->nik;
            // $user->skpd_id = $request->skpd_id;
            // $user->level = 3;
            // $user->is_active = 1;
            // $user->created_by = Auth::user()->username;
            // $user->created_at = new DateTime();
            // $user->password = Hash::make("bkpsdm123");
            // $user->save();
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin?search=1&skpd_id=' . $request->skpd_id)->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Ditambahkan!');
            } else {
                return redirect('/admin/pegawai')->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Ditambahkan!');
            }
        } else {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin?search=1&skpd_id=' . $request->skpd_id)->with('gagal', 'Pegawai Gagal Ditambahkan!');
            } else {
                return redirect('/admin/pegawai')->with('gagal', 'Pegawai Gagal Ditambahkan!');
            }
        }
    }

    public function update(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'skpd_id' => 'required',
            'status_pegawai' => 'required',
        ]);
        //dd($request);
        $identitas = Identitas::find($request->id);

        if (($identitas->status_pegawai == 2) && (($identitas->pendataan_2022 == 1) || ($identitas->pendataan_2022 == 2))) {
            return redirect('/admin/pegawai')->with('gagal', 'Pegawai a.n ' . $request->nama . ' Tidak Dapat Diubah Statusnya Karena Sudah Diangkat PPPK/PNS!');
        } else {
            $identitas->nama = $request->nama;
            $identitas->skpd_id = $request->skpd_id;
            $identitas->status_pegawai = $request->status_pegawai;
            $identitas->updated_by = Auth::user()->username;
            $identitas->updated_at = new DateTime();
            if ($identitas->save()) {
                if (Auth::user()->level == 1) {
                    return redirect('/admin/pegawai-admin?search=1&skpd_id=' . $request->skpd_id)->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Diubah!');
                } else {
                    return redirect('/admin/pegawai')->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Diubah!');
                }
            } else {
                if (Auth::user()->level == 1) {
                    return redirect('/admin/pegawai-admin?search=1&skpd_id=' . $request->skpd_id)->with('gagal', 'Pegawai Gagal Diubah!');
                } else {
                    return redirect('/admin/pegawai')->with('gagal', 'Pegawai Gagal Diubah!');
                }
            }
        }
    }


    public function biodata(Request $request)
    {
        //dd($request);
        $request->validate([
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama_id' => 'required|min_digits:1',
            'perkawinan_id' => 'required|min_digits:1',
            'email' => 'required|email',
            'no_hp' => 'required',
            'no_npwp' => 'required',
            'no_bpjs' => 'required',
            'jabatan_id' => 'required|min_digits:1',
            'pendidikan_id' => 'required|min_digits:1',
            'foto' => 'mimes:jpg,jpeg,JPG,PNG,png|max:500',
            'ktp' => 'mimes:jpg,jpeg,JPG,PNG,png|max:500',
        ]);

        if ($request->hasFile('foto')) {
            $dokumen_lama = Dokumen::where(['identitas_id' => $request->id, 'jenis_dokumen' => 'foto'])->first();
            if ($dokumen_lama) {
                $dokumen_hapus = Dokumen::findOrFail($dokumen_lama->id);
                $dokumen_hapus->delete();
                Storage::delete($dokumen_lama->path);
            }

            $path = $request->file('foto')->store('public/images/foto');
            // dd($path);
            $dokumen = new Dokumen;
            $dokumen->identitas_id = $request->id;
            $dokumen->jenis_dokumen = "foto";
            $dokumen->path = $path;
            $dokumen->is_active = 1;
            $dokumen->created_by = Auth::user()->username;
            $dokumen->created_at = new DateTime();
            $dokumen->save();
        }

        if ($request->hasFile('ktp')) {
            $dokumen_lama = Dokumen::where(['identitas_id' => $request->id, 'jenis_dokumen' => 'ktp'])->first();
            if ($dokumen_lama) {
                $dokumen_hapus = Dokumen::findOrFail($dokumen_lama->id);
                $dokumen_hapus->delete();
                Storage::delete($dokumen_lama->path);
            }

            $path = $request->file('ktp')->store('public/images/ktp');

            $dokumen = new Dokumen;
            $dokumen->identitas_id = $request->id;
            $dokumen->jenis_dokumen = "ktp";
            $dokumen->path = $path;
            $dokumen->is_active = 1;
            $dokumen->created_by = Auth::user()->username;
            $dokumen->created_at = new DateTime();
            $dokumen->save();
        }

        $identitas = Identitas::find($request->id);
        $identitas->jenis_kelamin = $request->jenis_kelamin;
        $identitas->tempat_lahir = $request->tempat_lahir;
        $identitas->tanggal_lahir = $request->tanggal_lahir;
        $identitas->agama_id = $request->agama_id;
        $identitas->perkawinan_id = $request->perkawinan_id;
        $identitas->email = $request->email;
        $identitas->unit_kerja = $request->unit_kerja;
        $identitas->no_hp = $request->no_hp;
        $identitas->no_npwp = $request->no_npwp;
        $identitas->no_bpjs = $request->no_bpjs;
        $identitas->jabatan_id = $request->jabatan_id;
        $identitas->pendidikan_id = $request->pendidikan_id;
        $identitas->gelar_depan = ($request->gelar_depan ? $request->gelar_depan : null);
        $identitas->gelar_belakang = ($request->gelar_belakang ? $request->gelar_belakang : null);

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
                return redirect('/admin/pegawai-admin/detail/' . $request->id)->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Diubah!');
            } else {
                return redirect('/admin/pegawai/detail/' . $request->id)->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Diubah!');
            }
        } else {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin/detail/' . $request->id)->with('gagal', 'Pegawai Gagal Diubah!');
            } else {

                return redirect('/admin/pegawai/detail/' . $request->id)->with('gagal', 'Pegawai Gagal Diubah!');
            }
        }
    }


    public function delete(Request $request)
    {

        if ($request->pendataan_2022 < 3) {
            if (Auth::user()->level == 1) {
                return redirect('/admin/pegawai-admin?search=1&skpd_id=' . $request->skpd_id)->with('gagal', 'Pegawai a.n ' . $request->nama . ' Tidak Bisa Dihapus Karena Masuk Dalam Pendataaan Non ASN Tahun 2022!');
            } else {
                return redirect('/admin/pegawai')->with('gagal', 'Pegawai a.n ' . $request->nama . ' Tidak Bisa Dihapus Karena Masuk Dalam Pendataaan Non ASN Tahun 2022!');
            }
        } else {

            $identitas = Identitas::findOrFail($request->id);

            if ($identitas->delete()) {
                if (Auth::user()->level == 1) {
                    return redirect('/admin/pegawai-admin?search=1&skpd_id=' . $identitas->skpd_id)->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Dihapus!');
                } else {
                    return redirect('/admin/pegawai')->with('sukses', 'Pegawai a.n ' . $request->nama . ' Berhasil Dihapus!');
                }
            } else {
                if (Auth::user()->level == 1) {
                    return redirect('/admin/pegawai-admin?search=1&skpd_id=' . $identitas->skpd_id)->with('gagal', 'Pegawai Gagal Dihapus!');
                } else {
                    return redirect('/admin/pegawai')->with('gagal', 'Pegawai Gagal Dihapus!');
                }
            }
        }
    }
}
