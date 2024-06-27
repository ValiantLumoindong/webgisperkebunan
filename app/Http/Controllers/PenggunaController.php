<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//user
use Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\kecamatan;
use App\Models\produksi;
use App\Models\jenis_kebun;
use App\Models\kebun;
use App\Models\user;

class PenggunaController extends Controller
{
   public function home()
    {
        $tahun = date('Y');
        $kecamatan = kecamatan::orderBy('created_at', 'DESC')->limit(5)->get();         

        $countkecamatan = kecamatan::count();
        $countproduksi = produksi::count();
        $countjenis_kebun = jenis_kebun::count();
        $countkebun = kebun::count();

        $statusData = $this->statusData(); // Panggil method statusData untuk mendapatkan informasi status data

        return view('layouts.pengguna.home', compact(
            'statusData',
            'tahun', 
            'kecamatan',
            'countkecamatan',
            'countproduksi',
            'countjenis_kebun',
            'countkebun'
        ));
    }

    public function tambahkebun(Request $request)
    {
        $kecamatan = kecamatan::all();
        $jenis_kebun = jenis_kebun::all();
        return view('layouts.pengguna.tambahkebun', compact('kecamatan', 'jenis_kebun'));
    }       

    public function prosestambahkebun(Request $request)
    {
        $request->validate([
            'gambar' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
        ]);     
        $datauser_aktif = Auth::user()->id;
        $nama_file = $request->gambar;          
        $filegambar = time().rand(100,999).".".$nama_file->getClientOriginalName();         

        $kebun = new kebun();
        $kebun->id_kecamatan = $request->input('id_kecamatan');
        $kebun->nama = $request->input('nama');
        $kebun->jenis_kebun = $request->input('jenis_kebun');
        $kebun->informasi_tambahan = $request->input('informasi_tambahan');
        $kebun->tanggal = $request->input('tanggal');
        $kebun->lokasi_gps = $request->input('lokasi_gps');
        $kebun->gambar = $filegambar;
        $kebun->status = 'Pending';
        $kebun->warna_zone = $request->input('warna_zone');
        $kebun->user_id = $datauser_aktif; // Set user_id dengan ID pengguna aktif
        $kebun->save();

        $nama_file->move(public_path().'/gambarkebun/', $filegambar);
        return redirect()->route('pengguna.home')->with('success', 'Berhasil Menambah Data');
    }

    // Method untuk mendapatkan informasi status data pada pengguna
    private function statusData()
    {
        $datauser_aktif = Auth::user()->id;
        $kebunselesai = kebun::where('user_id', $datauser_aktif)->where('status', 'Diverifikasi')->count();   
        $kebunpending = kebun::where('user_id', $datauser_aktif)->where('status', 'Pending')->count();    
        $kebunall = kebun::where('user_id', $datauser_aktif)->count();    
        $kebunuser = kebun::where('user_id', $datauser_aktif)->get();

        return [
            'kebunselesai' => $kebunselesai,
            'kebunpending' => $kebunpending,
            'kebunall' => $kebunall,
            'kebunuser' => $kebunuser,
        ];
    }
}
