<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Vendortaripfranco;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VendortaripfrancoImport;


class VendortaripfrancoController extends Controller
{
    function json(){
        return Datatables::of(Vendortaripfranco::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/vendor-taripfranco/'.$row->id_vendor.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'vendor-taripfranco/'.$row->id_vendor,'method'=>'delete','style'=>'float:right']);
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
        $vendortaripfrancos = Vendortaripfranco::all();
        return view('rekaptaripfranco.vendortaripfranco.index', compact('vendortaripfrancos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekaptaripfranco.vendortaripfranco.create');
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
            // 'id_vendor' => 'required|unique:vendor_taripfranco|min:4',
            'nama_vendor' => 'required|min:2',
            'keterangan_vendor'     =>'required',
        ]);

        $vendortaripfranco =  New Vendortaripfranco();
        $vendortaripfranco->create($request -> all());
        return redirect("/vendor-taripfranco") ->with('status','Data vendor taripfranco Berhasil disimpan');
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
        $data['vendor_taripfranco'] = Vendortaripfranco::where('id_Vendor',$id)->first();
        return view('rekaptaripfranco.vendortaripfranco.edit',$data);
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

        $vendortaripfranco =  Vendortaripfranco::where('id_Vendor','=',$id_Vendor);
        $vendortaripfranco->update($request -> except('_method','_token'));
        return redirect("/vendor-taripfranco");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Vendor)
    {
        $vendortaripfranco = Vendortaripfranco::where('id_Vendor','=',$id_Vendor);
        $vendortaripfranco->delete();
        return redirect("/vendor-taripfranco");
    }

    public function importDataVendortaripfranco(Request $request)
    {
        // dd($request->all());
        $file = $request->file('vendor-taripfranco');
        $namaFile = $file->getClientOriginalName();
        $file->move('datavendortaripfranco',$namaFile);
        // // dd($file);
        \Excel::import(new VendortaripfrancoImport, public_path('datavendortaripfranco/'.$namaFile));

        // dd($file);
        
        return redirect('/vendor-taripfranco')->with('success', 'All good!');
    }
}
