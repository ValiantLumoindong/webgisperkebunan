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
class AdminController extends Controller
{
    //

	public function Home(){

		$tahun = date('Y');
		$kecamatan = kecamatan::orderBy('created_at', 'DESC')->limit(5)->get();			
		
	   // Assuming you are using a Kebun model
    $kecamatan = kecamatan::all();
    $jenis_kebun = jenis_kebun::all();
    $kebun = kebun::all();

    // Count for dashboard
    $countkecamatan = $kecamatan->count();
    $countjenis_kebun = $jenis_kebun->count();
    $countkebun = $kebun->count();

               // Filter unverified kebun only created by users with level 'pengguna'
        $kebunPending = Kebun::where('status', 'pending')
            ->whereHas('foreign_user', function ($query) {
                $query->where('level', 'pengguna');
            })
            ->get();

    return view('layouts.admin.home', compact('kecamatan', 'jenis_kebun', 'countkecamatan', 'countjenis_kebun', 'countkebun', 'kebunPending'));
    }

    public function tampilKebunPending()
    {
        $kebunPending = Kebun::where('status', 'Pending')
            ->with('foreign_kecamatan')
            ->with('foreign_jeniskebun')
            ->get();

        return view('layouts.admin.tampilkebunpending', compact('kebunPending'));
    }

public function verifikasiKebun($id)
{
    // Temukan kebun berdasarkan ID
    $kebun = Kebun::find($id);
    
    // Pastikan kebun ditemukan dan statusnya "Pending"
    if ($kebun && $kebun->status === 'Pending') {
        // Lakukan proses verifikasi
        $kebun->status = 'Diverifikasi';
        $kebun->save();
        return redirect()->route('admin.home')->with('success', 'Kebun berhasil diverifikasi.');
    } else {
        // Jika kebun tidak ditemukan atau sudah diverifikasi, kembalikan pesan kesalahan
        return redirect()->route('admin.tampilKebunPending')->with('error', 'Kebun tidak ditemukan atau sudah diverifikasi.');
    }
}



 


	//mulai kecamatan
	
	public function tampilkecamatan(){
		$kecamatan = kecamatan::all();
		return view('layouts.admin.tampilkecamatan', compact('kecamatan'));
	}	
	
	public function tambahkecamatan(){
		return view('layouts.admin.tambahkecamatan');
	}		
	
	public function prosestambahkecamatan(Request $request){
			$kecamatan = new kecamatan();
			$kecamatan->nama_kecamatan = $request->input('nama_kecamatan');
			$kecamatan->informasi_tambahan = $request->input('informasi_tambahan');
			$kecamatan->save();
			return redirect()->route('kecamatan.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editkecamatan($id)
   {
       $kecamatan = kecamatan::find($id);
       return view('layouts.admin.editkecamatan', compact('kecamatan'));		
   }  	
	
   public function prosesupdatekecamatan(Request $request, $id)
   {
       $ubh = kecamatan::findorfail($id);
           $dt = [
               'nama_kecamatan' => $request['nama_kecamatan'],
               'informasi_tambahan' => $request['informasi_tambahan'],
           ];	
           $ubh->update($dt);
           return redirect()->route('kecamatan.home')->with('success', 'Data Berhasil di ubah');	
   } 	
   
	public function hapuskecamatan($id){
		$kecamatan = kecamatan::find($id);
		$kecamatan->delete(); 		
		return redirect()->route('kecamatan.home')->with('success', 'Data Berhasil di hapus');
	}	

	//end

	// Mulai produksi
	
	public function tampilproduksi(){
		$produksi = produksi::with('foreign_kecamatan')->get();
		return view('layouts.admin.tampilproduksi', compact('produksi'));
	}	
	
	public function tambahproduksi(){
		$kecamatan = kecamatan::all();
		return view('layouts.admin.tambahproduksi', compact('kecamatan'));
	}		
	
	public function prosestambahproduksi(Request $request){
		
			//$datauser_aktif = Auth::user()->id;
			
			$request->validate([
				'gambar' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
			]);		
			
			$nama_file = $request->gambar;			
			$filegambar = time().rand(100,999).".".$nama_file->getClientOriginalName();			
		
			$produksi = new produksi();
			$produksi->id_kecamatan = $request->input('id_kecamatan');
			$produksi->nama_produksi = $request->input('nama_produksi');
			$produksi->luas_tanam = $request->input('luas_tanam');
			$produksi->luas_panen = $request->input('luas_panen');
			$produksi->produksi = $request->input('produksi');
			$produksi->tanggal = $request->input('tanggal');
			$produksi->lokasi_gps = $request->input('lokasi_gps');
			$produksi->informasi_tambahan = $request->input('informasi_tambahan');
			$produksi->gambar = $filegambar;
			$produksi->save();
			
			$nama_file->move(public_path().'/gambarproduksi/', $filegambar);
			return redirect()->route('produksi.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editproduksi($id)
   {
       $produksi = produksi::with('foreign_kecamatan')->find($id);
	   $kecamatan = kecamatan::all();
       return view('layouts.admin.editproduksi', compact('produksi','kecamatan'));		
   }  	
	
   public function prosesupdateproduksi(Request $request, $id)
   {
       $ubh = produksi::findorfail($id);
	   $data_awal = $ubh->gambar;
		if ($request->gambar == '')
		{	   
           $dt = [
               'id_kecamatan' => $request['id_kecamatan'],
               'nama_produksi' => $request['nama_produksi'],
               'luas_tanam' => $request['luas_tanam'],
               'luas_panen' => $request['luas_panen'],
               'produksi' => $request['produksi'],
               'tanggal' => $request['tanggal'],
               'lokasi_gps' => $request['lokasi_gps'],
               'informasi_tambahan' => $request['informasi_tambahan'],
           ];	
           $ubh->update($dt);
           return redirect()->route('produksi.home')->with('success', 'Data Berhasil di ubah');	
		}
		else {
		   
			$request->validate([
				'gambar' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
			]);				   
		   			
           $dt = [
               'id_kecamatan' => $request['id_kecamatan'],
               'nama_produksi' => $request['nama_produksi'],
               'luas_tanam' => $request['luas_tanam'],
               'luas_panen' => $request['luas_panen'],
               'produksi' => $request['produksi'],
               'tanggal' => $request['tanggal'],
               'lokasi_gps' => $request['lokasi_gps'],
               'informasi_tambahan' => $request['informasi_tambahan'],
               'gambar' => $data_awal,
           ];	
		   $request->gambar->move(public_path().'/gambarproduksi/', $data_awal);
           $ubh->update($dt);
           return redirect()->route('produksi.home')->with('success', 'Data Berhasil di ubah');				
		}
   } 	
   
	public function hapusproduksi($id){
		$produksi = produksi::find($id);
		$produksi->delete(); 		
		return redirect()->route('produksi.home')->with('success', 'Data Berhasil di hapus');
	}		
//

	//mulai jenis_kebun
	
	public function tampiljenis_kebun(){
		$jenis_kebun = jenis_kebun::all();
		return view('layouts.admin.tampiljenis_kebun', compact('jenis_kebun'));
	}	
	
	public function tambahjenis_kebun(){
		return view('layouts.admin.tambahjenis_kebun');
	}		
	
	public function prosestambahjenis_kebun(Request $request){
			$jenis_kebun = new jenis_kebun();
			$jenis_kebun->jenis_kebun = $request->input('jenis_kebun');
			$jenis_kebun->save();
			return redirect()->route('jenis_kebun.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editjenis_kebun($id)
   {
       $jenis_kebun = jenis_kebun::find($id);
       return view('layouts.admin.editjenis_kebun', compact('jenis_kebun'));		
   }  	
	
   public function prosesupdatejenis_kebun(Request $request, $id)
   {
       $ubh = jenis_kebun::findorfail($id);
           $dt = [
               'jenis_kebun' => $request['jenis_kebun'],
           ];	
           $ubh->update($dt);
           return redirect()->route('jenis_kebun.home')->with('success', 'Data Berhasil di ubah');	
   } 	
   
	public function hapusjenis_kebun($id){
		$jenis_kebun = jenis_kebun::find($id);
		$jenis_kebun->delete(); 		
		return redirect()->route('jenis_kebun.home')->with('success', 'Data Berhasil di hapus');
	}	

	//end

	// Mulai kebun
	
public function tampilkebun()
{
    $kebun = Kebun::with(['foreign_kecamatan', 'foreign_jeniskebun', 'foreign_user'])->orderBy('created_at','DESC')->get();
    return view('layouts.admin.tampilkebun', compact('kebun'));
}
	
	public function tambahkebun(){
		$kecamatan = kecamatan::all();
		$jenis_kebun = jenis_kebun::all();
		return view('layouts.admin.tambahkebun', compact('kecamatan','jenis_kebun'));
	}		
	
	public function prosestambahkebun(Request $request){
		
			//$datauser_aktif = Auth::user()->id;
			
			$request->validate([
				'gambar' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
			]);		
			
			$nama_file = $request->gambar;			
			$filegambar = time().rand(100,999).".".$nama_file->getClientOriginalName();			
		
			$kebun = new kebun();
			$kebun->id_kecamatan = $request->input('id_kecamatan');
			$kebun->nama = $request->input('nama');
			$kebun->jenis_kebun = $request->input('jenis_kebun');
			$kebun->informasi_tambahan = $request->input('informasi_tambahan');
			$kebun->tanggal = $request->input('tanggal');
			$kebun->lokasi_gps = $request->input('lokasi_gps');
            $kebun->warna_zone = $request->input('warna_zone');
			$kebun->gambar = $filegambar;

			    // Check if the user is an admin
    if (Auth::user()->level == 'admin') {
        $kebun->status = 'Diverifikasi';
    } else {
        $kebun->status = 'Pending';
    }



			$kebun->save();
			
			$nama_file->move(public_path().'/gambarkebun/', $filegambar);
			return redirect()->route('kebun.home')->with('success', 'Berhasil Menambah Data');
	}
	
   public function editkebun($id)
   {
       $kebun = kebun::with('foreign_kecamatan')->with('foreign_jeniskebun')->find($id);
	   $kecamatan = kecamatan::all();
	   $jenis_kebun = jenis_kebun::all();
       return view('layouts.admin.editkebun', compact('kebun','kecamatan','jenis_kebun'));		
   }  	
	
   public function prosesupdatekebun(Request $request, $id)
   {
       $ubh = kebun::findorfail($id);
	   $data_awal = $ubh->gambar;
        if ($request->gambar == '') {   
            $dt = [
                'id_kecamatan' => $request['id_kecamatan'],
                'nama' => $request['nama'],
                'jenis_kebun' => $request['jenis_kebun'], // Ensure this is an integer ID
                'informasi_tambahan' => $request['informasi_tambahan'],
                'tanggal' => $request['tanggal'],
                'warna_zone'=>$request['warna_zone'],
                'lokasi_gps' => $request['lokasi_gps'],
            ];  
            $ubh->update($dt);
           return redirect()->route('kebun.home')->with('success', 'Data Berhasil di ubah');	
		}
		else {
		   
            $request->validate([
                'gambar' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:2048',
            ]);  

            $dt = [
                'id_kecamatan' => $request['id_kecamatan'],
                'nama' => $request['nama'],
                'jenis_kebun' => $request['jenis_kebun'], // Ensure this is an integer ID
                'informasi_tambahan' => $request['informasi_tambahan'],
                'tanggal' => $request['tanggal'],
                'warna_zone'=>$request['warna_zone'],
                'lokasi_gps' => $request['lokasi_gps'],
                'gambar' => $data_awal,
            ];  
            $request->gambar->move(public_path().'/gambarkebun/', $data_awal);
            $ubh->update($dt);
           return redirect()->route('kebun.home')->with('success', 'Data Berhasil di ubah');				
		}
   } 	
   
	public function hapuskebun($id){
		$kebun = kebun::find($id)->delete();
		// $kebun->delete(); 		
		return redirect()->route('kebun.home')->with('success', 'Data Berhasil di hapus');
	}		
//	

}
