<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Jalurkapallayar;
use App\Kabupaten;
use App\Provinsi;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\JalurkapallayarImport;

class JalurkapallayarController extends Controller
{
    function json(){
        // $data['jalur_kapallayar'] = \DB::table('jalur_kapallayar')
        // ->join('jalur_kapallayar','jalur_kapallayar.kode_rute','=','jasakapallayar.kode_rute')
        // // ->join('vendor_kapallayar','nama_vendor','=','jasakapallayar.pemegang_kontrak')
        // ->get();

        return Datatables::of(Jalurkapallayar::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/jalur-kapal-layar/'.$row->kode_rute.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jalur-kapal-layar/'.$row->kode_rute,'method'=>'delete','style'=>'float:right']);
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
        $jalurkapallayars = Jalurkapallayar::all();
        return view('jasakapallayar.jalurkapallayar.index', compact('jalurkapallayars'));
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
        return view('jasakapallayar.jalurkapallayar.create',$data);
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
            // 'kode_rute' => 'required|unique:jalur_kapallayar',
            'tarif'=>'required',
            'wilayah'=>'required'
        ]);

        $jalurkapallayar =  New Jalurkapallayar();
        $jalurkapallayar->create($request -> all());
        return redirect("/jalur-kapal-layar") ->with('status','Data Jalur general cargo Berhasil disimpan');
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
        $data['jalur_kapallayar'] = Jalurkapallayar::where('kode_rute',$id)->first();
        return view('jasakapallayar.jalurkapallayar.edit',$data);
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
            // 'kode_rute' => 'required|unique:jalur_kapallayar',
            'tarif'=>'required',
            'wilayah'=>'required'
        ]);

        $jalurkapallayar =  Jalurkapallayar::where('kode_rute','=',$kode_rute);
        $jalurkapallayar->update($request -> except('_method','_token'));
        return redirect("/jalur-kapal-layar");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_rute)
    {
        $jalurkapallayar = Jalurkapallayar::where('kode_rute','=',$kode_rute);
        $jalurkapallayar->delete();
        return redirect("/jalur-kapal-layar");
    }

    public function importDataJalurkapallayar(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jalur-kapal-layar');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajalurkapallayar',$namaFile);
        // // dd($file);
        \Excel::import(new JalurkapallayarImport, public_path('datajalurkapallayar/'.$namaFile));

        // dd($file);
        
        return redirect('/jalur-kapal-layar')->with('success', 'All good!');
    }
}
