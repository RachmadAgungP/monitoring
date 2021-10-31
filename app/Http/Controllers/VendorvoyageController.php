<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Vendorvoyage;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VendorvoyageImport;

class VendorvoyageController extends Controller
{
    function json(){
        return Datatables::of(Vendorvoyage::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-voyage/'.$row->id_vendor.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-voyage/'.$row->id_vendor,'method'=>'delete','style'=>'float:right']);
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
        $vendorvoyages = Vendorvoyage::all();
        return view('jasavoyagecharter.vendorvoyage.index', compact('vendorvoyages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasavoyagecharter.vendorvoyage.create');
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
            'id_vendor' => 'required|unique:vendor_voyage|min:4',
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendorvoyage =  New Vendorvoyage();
        $vendorvoyage->create($request -> all());
        return redirect("/vendor-voyage") ->with('status','Data vendor Voyage Berhasil disimpan');
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
        $data['vendor_voyage'] = Vendorvoyage::where('id_Vendor',$id)->first();
        return view('jasavoyagecharter.vendorvoyage.edit',$data);
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

        $vendorvoyage =  Vendorvoyage::where('id_Vendor','=',$id_Vendor);
        $vendorvoyage->update($request -> except('_method','_token'));
        return redirect("/vendor-voyage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendorvoyage = Vendorvoyage::where('id_Vendor','=',$id_Vendor);
        $vendorvoyage->delete();
        return redirect("/vendor-voyage");
    }

    public function importDataVendorvoyage(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-voyage');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendorvoyage',$namaFile);
        // // dd($file);
        \Excel::import(new VendorvoyageImport, public_path('datavendorvoyage/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-voyage')->with('success', 'All good!');
    }
}
