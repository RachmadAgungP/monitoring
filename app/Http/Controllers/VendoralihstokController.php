<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Vendoralihstok;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VendoralihstokImport;


class VendoralihstokController extends Controller
{
    function json(){
        return Datatables::of(Vendoralihstok::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-alihstok/'.$row->id_vendor.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-alihstok/'.$row->id_vendor,'method'=>'delete','style'=>'float:right']);
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
        $vendoralihstoks = Vendoralihstok::all();
        return view('rekapalihstok.vendoralihstok.index', compact('vendoralihstoks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekapalihstok.vendoralihstok.create');
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
            // 'id_vendor' => 'required|unique:vendor_alihstok|min:4',
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendoralihstok =  New Vendoralihstok();
        $vendoralihstok->create($request -> all());
        return redirect("/vendor-alihstok") ->with('status','Data vendor alihstok Berhasil disimpan');
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
        $data['vendor_alihstok'] = Vendoralihstok::where('id_Vendor',$id)->first();
        return view('rekapalihstok.vendoralihstok.edit',$data);
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

        $vendoralihstok =  Vendoralihstok::where('id_Vendor','=',$id_Vendor);
        $vendoralihstok->update($request -> except('_method','_token'));
        return redirect("/vendor-alihstok");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendoralihstok = Vendoralihstok::where('id_Vendor','=',$id_Vendor);
        $vendoralihstok->delete();
        return redirect("/vendor-alihstok");
    }

    public function importDataVendoralihstok(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-alihstok');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendoralihstok',$namaFile);
        // // dd($file);
        \Excel::import(new VendoralihstokImport, public_path('datavendoralihstok/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-alihstok')->with('success', 'All good!');
    }
}
