<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Provinsi;
use App\Imports\ProvinsiImport;
class provinsiController extends Controller
{
    function json(){
        return Datatables::of(Provinsi::all())
        ->addColumn('action', function ($row){
            
            $action = \Form::open(['url'=>'provinsi/'.$row->id_prov,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Hapus</button>";
            $action .= \Form::Close();

            return $action; })
        ->make(true);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['provinsi'] = Provinsi::all();
        return view('gudangpkg.provinsi.index',$data);
    }

    public function create()
    {
        return view('gudangpkg.provinsi.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'status_pemenang' => 'required|min:2',
        //     'kontrak'     =>'required',
        //     'tgl_kontrak'=>'required',
        //     'mulai'=>'required',
        //     'akhir'=>'required',
        // ]);

        $provinsi =  New Provinsi();
        $provinsi->create($request -> all());
        return redirect("provinsi") ->with('status','Data Jalur Voyage Berhasil disimpan');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_prov)
    {
        $provinsi = Provinsi::where('id_prov','=',$id_prov);
        $provinsi->delete();
        return redirect("/provinsi");
    }
    public function importDataProvinsi(Request $request)
    {
        // dd($request->all());
        $file = $request->file('provinsi');
        $namaFile = $file->getClientOriginalName();
        $file->move('dataprovinsi',$namaFile);
        // // dd($file);
        \Excel::import(new ProvinsiImport, public_path('dataprovinsi/'.$namaFile));

        // dd($file);
        
        return redirect('/provinsi')->with('success', 'All good!');
    }
}
