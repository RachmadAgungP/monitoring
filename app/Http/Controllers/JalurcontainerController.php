<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Jalurcontainer;
use App\Imports\JalurcontainerImport;
use App\Kabupaten;
use App\Provinsi;


class JalurcontainerController extends Controller
{
    function json(){
        return Datatables::of(Jalurcontainer::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/jalur-container/'.$row->kode_rute.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jalur-container/'.$row->kode_rute,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Hapus</button>";
            $action .= \Form::Close();
            return $action;})
        ->make(true);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jalurcontainers = Jalurcontainer::all();
        return view('jasacontainer.jalurcontainer.index', compact('jalurcontainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['asal'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['tujuan'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        return view('jasacontainer.jalurcontainer.create',$data);
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
            // 'kode_rute' => 'required|unique:jalur_container|min:4',
            'tarif'=>'required',
            'wilayah'=>'required'
        ]);

        $jalurcontainer =  New Jalurcontainer();
        $jalurcontainer->create($request -> all());
        return redirect("/jalur-container") ->with('status','Data Jalur container Berhasil disimpan');
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
        $data['asal'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['tujuan'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        $data['jalur_container'] = Jalurcontainer::where('kode_rute',$id)->first();
        return view('jasacontainer.jalurcontainer.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_rute)
    {
        $request->validate([
            'tarif'=>'required',
            'wilayah'=>'required'
        ]);

        $jalurcontainer =  Jalurcontainer::where('kode_rute','=',$kode_rute);
        $jalurcontainer->update($request -> except('_method','_token'));
        return redirect("/jalur-container");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_rute)
    {
        $jalurcontainer = Jalurcontainer::where('kode_rute','=',$kode_rute);
        $jalurcontainer->delete();
        return redirect("/jalur-container");
    }

    public function importDataJalurcontainer(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jalur-container');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajalurcontainer',$namaFile);
        // // dd($file);
        \Excel::import(new JalurcontainerImport, public_path('datajalurcontainer/'.$namaFile));

        // dd($file);
        
        return redirect('/jalur-container')->with('success', 'All good!');
    }
}
