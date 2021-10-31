<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;

use App\Vendorgeneralcargo;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VendorgeneralcargoImport;


class VendorgeneralcargoController extends Controller
{
    function json(){
        return Datatables::of(Vendorgeneralcargo::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-general-cargo/'.$row->id_vendor.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-general-cargo/'.$row->id_vendor,'method'=>'delete','style'=>'float:right']);
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
        $vendorgeneralcargos = Vendorgeneralcargo::all();
        return view('jasageneralcargo.vendorgeneralcargo.index', compact('vendorgeneralcargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasageneralcargo.vendorgeneralcargo.create');
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

        $vendorgeneralcargo =  New Vendorgeneralcargo();
        $vendorgeneralcargo->create($request -> all());
        return redirect("/vendor-general-cargo") ->with('status','Data vendor Voyage Berhasil disimpan');
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
        $data['vendor_generalcargo'] = Vendorgeneralcargo::where('id_Vendor',$id)->first();
        return view('jasageneralcargo.vendorgeneralcargo.edit',$data);
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

        $vendorgeneralcargo =  Vendorgeneralcargo::where('id_Vendor','=',$id_Vendor);
        $vendorgeneralcargo->update($request -> except('_method','_token'));
        return redirect("/vendor-general-cargo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendorgeneralcargo = Vendorgeneralcargo::where('id_Vendor','=',$id_Vendor);
        $vendorgeneralcargo->delete();
        return redirect("/vendor-general-cargo");
    }

    public function importDataVendorgeneralcargo(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-general-cargo');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendorgeneralcargo',$namaFile);
        // // dd($file);
        \Excel::import(new VendorgeneralcargoImport, public_path('datavendorgeneralcargo/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-general-cargo')->with('success', 'All good!');
    }
}
