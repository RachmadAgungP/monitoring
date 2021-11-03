<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Vendor_InBAG;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\Vendor_InBAGImport;

class Vendor_InBAGController extends Controller
{
    function json(){
        return Datatables::of(Vendor_InBAG::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-Inbag/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-Inbag/'.$row->id,'method'=>'delete','style'=>'float:right']);
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
        $vendorinbags = Vendor_InBAG::all();
        return view('jasa_ppmemkl_inbag.vendorinbag.index', compact('vendorinbags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa_ppmemkl_inbag.vendorinbag.create');
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
            // 'id' => 'required|unique:vendor_Inbag|min:4',
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendorinbag =  New Vendor_InBAG();
        $vendorinbag->create($request -> all());
        return redirect("/vendor-Inbag") ->with('status','Data vendor alihstok Berhasil disimpan');
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
        $data['vendor_Inbag'] = Vendor_InBAG::where('id',$id)->first();
        return view('jasa_ppmemkl_inbag.vendorinbag.edit',$data);
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

        $vendorinbag =  Vendor_InBAG::where('id','=',$id_Vendor);
        $vendorinbag->update($request -> except('_method','_token'));
        return redirect("/vendor-Inbag");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendorinbag = Vendor_InBAG::where('id','=',$id_Vendor);
        $vendorinbag->delete();
        return redirect("/vendor-Inbag");
    }

    public function importDataVendor_inbag(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-Inbag');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendor_inBag',$namaFile);
        // // dd($file);
        \Excel::import(new Vendor_InBagImport, public_path('datavendor_inBag/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-Inbag')->with('success', 'All good!');
    }
}
