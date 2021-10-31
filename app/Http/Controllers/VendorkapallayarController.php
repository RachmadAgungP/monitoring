<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Vendorkapallayar;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VendorkapallayarImport;


class VendorkapallayarController extends Controller
{
    function json(){
        return Datatables::of(Vendorkapallayar::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-kapal-layar/'.$row->id_vendor.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-kapal-layar/'.$row->id_vendor,'method'=>'delete','style'=>'float:right']);
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
        $vendorkapallayars = Vendorkapallayar::all();
        return view('jasakapallayar.vendorkapallayar.index', compact('vendorkapallayars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasakapallayar.vendorkapallayar.create');
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
            // 'id_vendor' => 'required|unique:vendor_voyage|min:4',
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendorkapallayar =  New Vendorkapallayar();
        $vendorkapallayar->create($request -> all());
        return redirect("/vendor-kapal-layar") ->with('status','Data vendor Voyage Berhasil disimpan');
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
        $data['vendor_kapallayar'] = Vendorkapallayar::where('id_Vendor',$id)->first();
        return view('jasakapallayar.vendorkapallayar.edit',$data);
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

        $vendorkapallayar =  Vendorkapallayar::where('id_Vendor','=',$id_Vendor);
        $vendorkapallayar->update($request -> except('_method','_token'));
        return redirect("/vendor-kapal-layar");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendorkapallayar = Vendorkapallayar::where('id_Vendor','=',$id_Vendor);
        $vendorkapallayar->delete();
        return redirect("/vendor-kapal-layar");
    }

    public function importDataVendorkapallayar(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-kapal-layar');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendorkapallayar',$namaFile);
        // // dd($file);
        \Excel::import(new VendorkapallayarImport, public_path('datavendorkapallayar/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-kapal-layar')->with('success', 'All good!');
    }
}
