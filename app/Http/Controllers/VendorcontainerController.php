<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Vendorcontainer;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VendorcontainerImport;
class VendorcontainerController extends Controller
{
    function json(){
        return Datatables::of(Vendorcontainer::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-container/'.$row->id_vendor.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-container/'.$row->id_vendor,'method'=>'delete','style'=>'float:right']);
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
        $vendorcontainers = Vendorcontainer::all();
        return view('jasacontainer.vendorcontainer.index', compact('vendorcontainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasacontainer.vendorcontainer.create');
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
            // 'id_vendor' => 'required|unique:vendor_container|min:4',
            'nama_vendor' => 'required',
            'keterangan_vendor'     =>'required',
        ]);

        $vendorcontainer =  New Vendorcontainer();
        $vendorcontainer->create($request -> all());
        return redirect("/vendor-container") ->with('status','Data vendor container Berhasil disimpan');
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
        $data['vendor_container'] = Vendorcontainer::where('id_Vendor',$id)->first();
        return view('jasacontainer.vendorcontainer.edit',$data);
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
            'nama_vendor' => 'required',
            'keterangan_vendor'     =>'required',
        ]);

        $vendorcontainer =  Vendorcontainer::where('id_Vendor','=',$id_Vendor);
        $vendorcontainer->update($request -> except('_method','_token'));
        return redirect("/vendor-container");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendorcontainer = Vendorcontainer::where('id_Vendor','=',$id_Vendor);
        $vendorcontainer->delete();
        return redirect("/vendor-container");
    }

    public function importDataVendorcontainer(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-container');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendorcontainer',$namaFile);
        // // dd($file);
        \Excel::import(new VendorcontainerImport, public_path('datavendorcontainer/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-container')->with('success', 'All good!');
    }
}
