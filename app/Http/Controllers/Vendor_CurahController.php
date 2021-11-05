<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Vendor_Curah;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Vendor_CurahImport;

class Vendor_CurahController extends Controller
{
    function json(){
        return Datatables::of(Vendor_Curah::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-Curah/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-Curah/'.$row->id,'method'=>'delete','style'=>'float:right']);
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
        $vendorcurahs = Vendor_Curah::all();
        return view('jasa_ppmemkl_curah.vendorcurah.index', compact('vendorcurahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa_ppmemkl_curah.vendorcurah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required|unique:vendor_Curah|min:4',
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendorcurah =  New Vendor_Curah();
        $vendorcurah->create($request -> all());
        return redirect("/vendor-Curah") ->with('status','Data vendor Curah Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['vendor_Curah'] = Vendor_Curah::where('id',$id)->first();
        return view('jasa_ppmemkl_curah.vendorcurah.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_Vendor)
    {
        $request->validate([
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendorcurah =  Vendor_Curah::where('id','=',$id_Vendor);
        $vendorcurah->update($request -> except('_method','_token'));
        return redirect("/vendor-Curah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendorcurah = Vendor_Curah::where('id','=',$id_Vendor);
        $vendorcurah->delete();
        return redirect("/vendor-Curah");
    }

    public function importDataVendor_curah(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-Curah');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendor_curah',$namaFile);
        // // dd($file);
        \Excel::import(new Vendor_CurahImport, public_path('datavendor_curah/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-Curah')->with('success', 'All good!');
    }
}
