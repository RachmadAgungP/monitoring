<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Jalurgeneralcargo;
use Maatwebsite\Excel\Facades\Excel;
use App\Kabupaten;
use App\Provinsi;

use App\Imports\JalurgeneralcargoImport;


class JalurgeneralcargoController extends Controller
{
    function json(){
        // $data['jalur_generalcargo'] = \DB::table('jalur_generalcargo')
        // ->join('jalur_generalcargo','jalur_generalcargo.kode_rute','=','jasageneralcargo.kode_rute')
        // // ->join('vendor_generalcargo','nama_vendor','=','jasageneralcargo.pemegang_kontrak')
        // ->get();

        return Datatables::of(Jalurgeneralcargo::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/jalur-general-cargo/'.$row->kode_rute.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jalur-general-cargo/'.$row->kode_rute,'method'=>'delete','style'=>'float:right']);
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
        $jalurgeneralcargos = Jalurgeneralcargo::all();
        return view('jasageneralcargo.jalurgeneralcargo.index', compact('jalurgeneralcargos'));
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
        return view('jasageneralcargo.jalurgeneralcargo.create',$data);
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
            // 'kode_rute' => 'required|unique:jalur_generalcargo',
            'tarif'=>'required',
            'wilayah'=>'required'
        ]);

        $jalurgeneralcargo =  New Jalurgeneralcargo();
        $jalurgeneralcargo->create($request -> all());
        return redirect("/jalur-general-cargo") ->with('status','Data Jalur general cargo Berhasil disimpan');
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
        $data['jalur_generalcargo'] = Jalurgeneralcargo::where('kode_rute',$id)->first();
        return view('jasageneralcargo.jalurgeneralcargo.edit',$data);
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
            // 'kode_rute' => 'required|unique:jalur_generalcargo',
            'tarif'=>'required',
            'wilayah'=>'required'
        ]);

        $jalurgeneralcargo =  Jalurgeneralcargo::where('kode_rute','=',$kode_rute);
        $jalurgeneralcargo->update($request -> except('_method','_token'));
        return redirect("/jalur-general-cargo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_rute)
    {
        $jalurgeneralcargo = Jalurgeneralcargo::where('kode_rute','=',$kode_rute);
        $jalurgeneralcargo->delete();
        return redirect("/jalur-general-cargo");
    }

    public function importDataJalurgeneralcargo(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jalur-general-cargo');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajalurgeneralcargo',$namaFile);
        // // dd($file);
        \Excel::import(new JalurgeneralcargoImport, public_path('datajalurgeneralcargo/'.$namaFile));

        // dd($file);
        
        return redirect('/jalur-general-cargo')->with('success', 'All good!');
    }
}
