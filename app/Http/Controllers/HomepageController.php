<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kecamatan;
use App\Models\produksi;
use App\Models\kebun;
use App\Models\jenis_kebun;
use App\Models\ZonasiLahanModel;


class HomepageController extends Controller
{
    //
	public function index(){
		$menukecamatan = kecamatan::all();

		// $produksiterbaru = produksi::with('foreign_kecamatan')->orderBy('created_at','DESC')->limit(3)->get();

		$kebunterbaru = kebun::with('foreign_kecamatan')->with('foreign_jeniskebun')->orderBy('created_at','DESC')->limit(3)->get();
		$mapskebun = kebun::all();

		$countkecamatan = kecamatan::count();
		$countkebun = kebun::count();
		$countjenis_kebun = jenis_kebun::count();
		$countproduksi = produksi::count();
		$zonasi = ZonasiLahanModel::leftJoin('kebuns','kebuns.id','table_zonasi.id_kebun')
							->select('table_zonasi.*','kebuns.warna_zone as warna','kebuns.nama as kebun')
							->orderBy('created_at','DESC')->get();
		return view('layouts.homepage.index', compact('countjenis_kebun','zonasi','countkebun','menukecamatan','countkecamatan','countproduksi','mapskebun','kebunterbaru'));
		
	}

	public function hasilproduksi(){
		$menukecamatan = kecamatan::all();

		$produksiterbaru = produksi::with('foreign_kecamatan')->orderBy('created_at','DESC')->get();

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();

		return view('layouts.homepage.produksi', compact('menukecamatan','produksiterbaru'));
		
	}

	public function kebun(){
		$menukecamatan = kecamatan::all();

		$kebunterbaru = kebun::with('foreign_kecamatan')->with('foreign_jeniskebun')->orderBy('created_at','DESC')->get();

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();

		return view('layouts.homepage.kebun', compact('menukecamatan','kebunterbaru'));
		
	}	

    public function detailkebun($id)
    {
		$menukecamatan = kecamatan::all();

		$kebunterbaru = kebun::with('foreign_kecamatan')->with('foreign_jeniskebun')->find($id);

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();
		$zonasi = ZonasiLahanModel::leftJoin('kebuns','kebuns.id','table_zonasi.id_kebun')
							->select('table_zonasi.*','kebuns.warna_zone as warna','kebuns.nama as kebun')
							->where('table_zonasi.id_kebun',$id)
							->orderBy('created_at','DESC')->get();

		return view('layouts.homepage.detailkebun', compact('menukecamatan','kebunterbaru','zonasi'));	
    } 

	public function carikebun(Request $request){
		//        $modul = modul::paginate(2);
		$menukecamatan = kecamatan::all();
				$datacari = $request->input('cari');
				$kebunterbaru = kebun::with('foreign_kecamatan')->with('foreign_jeniskebun')->where('nama','like',"%".$datacari."%")->get();
				return view('layouts.homepage.carikebun', compact('kebunterbaru','datacari','menukecamatan'));    
			}  

    public function detailproduksi($id)
    {
		$menukecamatan = kecamatan::all();

		$produksiterbaru = produksi::with('foreign_kecamatan')->find($id);

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();

		return view('layouts.homepage.detailproduksi', compact('menukecamatan','produksiterbaru'));	
    }  	    

    public function detailkecamatan($id)
    {
		$menukecamatan = kecamatan::all();

		$detailkecamatan = kecamatan::find($id);

        $produksikecamatan = kebun::with('foreign_kecamatan')->where('id_kecamatan', $id)->get();

		//$countkecamatan = kecamatan::count();
		//$countproduksi = produksi::count();
		$zonasi = ZonasiLahanModel::leftJoin('kebuns','kebuns.id','table_zonasi.id_kebun')
							->select('table_zonasi.*','kebuns.warna_zone as warna','kebuns.nama as kebun')
							->where('table_zonasi.id_kecamatan',$id)
							->orderBy('created_at','DESC')->get();

		return view('layouts.homepage.detailkecamatan', compact('menukecamatan','zonasi','detailkecamatan','produksikecamatan'));	
    }  	        


}
