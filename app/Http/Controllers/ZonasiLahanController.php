<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZonasiLahanModel;
use App\Models\kecamatan;
use App\Models\kebun;
use Session, DB,Validator;


class ZonasiLahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ZonasiLahanModel::leftJoin('kecamatans','kecamatans.id','table_zonasi.id_kecamatan')
                        ->leftJoin('kebuns','kebuns.id','table_zonasi.id_kebun')
                        ->select('table_zonasi.*','kebuns.nama as kebun','kecamatans.nama_kecamatan as kecamatan')
                        ->paginate(15);
        return view('layouts.admin.zonasi.index',compact('data'));
    }
    public function getKebun($idKecamatan){
        $kebun = kebun::where('id_kecamatan',$idKecamatan)->get();
        return response()->json(['status'=>'success','data'=>$kebun],200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = kecamatan::get();
        $kebun = kebun::get();
        return view('layouts.admin.zonasi.create',compact('kecamatan','kebun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'id_kecamatan'=>'required',
            'id_kebun'=>'required',
            'zone_collections'=>'required'
        ]);
        if($validate->fails()){
            return redirect('admin/zonasi/create')->with('error','Data tidak lengkap!')->withInput($request->all());
        }
        try{
            $newData = ZonasiLahanModel::create([
                'id_kecamatan'=>$request->id_kecamatan,
                'id_kebun'=>$request->id_kebun,
                'zone_collections'=>$request->zone_collections
            ]);
            return redirect('admin/zonasi')->with('success','Data berhasil di tambahkan!');
        }catch(\Exception $e){
            return redirect('admin/zonasi/create')->with('error','Terjadi kesalahan : '.$e->getMessage())->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ZonasiLahanModel::leftJoin('kecamatans','kecamatans.id','table_zonasi.id_kecamatan')
                        ->leftJoin('kebuns','kebuns.id','table_zonasi.id_kebun')
                        ->select('table_zonasi.*','kebuns.nama as kebun','kebuns.lokasi_gps as gps','kebuns.warna_zone as warna','kecamatans.nama_kecamatan as kecamatan')
                        ->where('table_zonasi.id',$id)->first();
        if($data){
            return view('layouts.admin.zonasi.detail',compact("data"));
        }
        return redirect('admin/zonasi')->with('error','Data tidak di temukan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ZonasiLahanModel::leftJoin('kecamatans','kecamatans.id','table_zonasi.id_kecamatan')
                        ->leftJoin('kebuns','kebuns.id','table_zonasi.id_kebun')
                        ->select('table_zonasi.*','kebuns.nama as kebun','kebuns.lokasi_gps as gps','kebuns.warna_zone as warna','kecamatans.nama_kecamatan as kecamatan')
                        ->where('table_zonasi.id',$id)->first();
        if($data){
            $kecamatan = kecamatan::get();
            $kebun = kebun::get();
            return view('layouts.admin.zonasi.edit',compact('data','kecamatan','kebun'));
        }
        return redirect('admin/zonasi')->with('error','Data tidak di temukan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'id_kecamatan'=>'required',
            'id_kebun'=>'required',
            'zone_collections'=>'required'
        ]);
        if($validate->fails()){
            return redirect('admin/zonasi/'.$id.'/edit')->with('error','Data tidak lengkap!')->withInput($request->all());
        }
        try{
            DB::beginTransaction();
            $newData = ZonasiLahanModel::where('id',$id)->update([
                'id_kecamatan'=>$request->id_kecamatan,
                'id_kebun'=>$request->id_kebun,
                'zone_collections'=>$request->zone_collections
            ]);
            DB::commit();
            return redirect('admin/zonasi')->with('success','Data berhasil di ubahkan!');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('admin/zonasi/'.$id.'/edit')->with('error','Terjadi kesalahan : '.$e->getMessage())->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $delete = ZonasiLahanModel::where('id',$id)->delete();
            DB::commit();
            return redirect('admin/zonasi')->with('success','Data berhasil di hapus!');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('admin/zonasi')->with('error','Data gagal di hapus ! : '.$e->getMessage());
        }
    }
}
