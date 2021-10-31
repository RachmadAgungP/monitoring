<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Vendortime;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VendortimeImport;

class VendortimeController extends Controller
{
    function json(){
        return Datatables::of(Vendortime::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-time/'.$row->id_vendor.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-time/'.$row->id_vendor,'method'=>'delete','style'=>'float:right']);
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
        $vendortimes = Vendortime::all();
        return view('jasatimecharter.vendortime.index', compact('vendortimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasatimecharter.vendortime.create');
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
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendortime =  New Vendortime();
        $vendortime->create($request -> all());
        return redirect("/vendor-time") ->with('status','Data vendor time Berhasil disimpan');
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
        $data['vendor_time'] = Vendortime::where('id_Vendor',$id)->first();
        return view('jasatimecharter.vendortime.edit',$data);
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

        $vendortime =  Vendortime::where('id_Vendor','=',$id_Vendor);
        $vendortime->update($request -> except('_method','_token'));
        return redirect("/vendor-time");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendortime = Vendortime::where('id_Vendor','=',$id_Vendor);
        $vendortime->delete();
        return redirect("/vendor-time");
    }

    public function importDataVendortime(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-time');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendortime',$namaFile);
        // // dd($file);
        \Excel::import(new VendortimeImport, public_path('datavendortime/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-time')->with('success', 'All good!');
    }
}
