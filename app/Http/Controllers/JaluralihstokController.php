<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Jaluralihstok;
use App\GudangPKG;
use App\Gudangpetroganik;

use App\Imports\JaluralihstokImport;
use App\Provinsi;

class JaluralihstokController extends Controller
{
    function json(){
        return Datatables::of(Jaluralihstok::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/jalur-alihstok/'.$row->kode_rute.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jalur-alihstok/'.$row->kode_rute,'method'=>'delete','style'=>'float:right']);
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
        $jaluralihstoks = Jaluralihstok::all();
        return view('rekapalihstok.jaluralihstok.index', compact('jaluralihstoks'));
    }

    public function getgudang($category_id)
{
    if ($category_id == 1){
       $data['Gudang'] = GudangPKG::pluck('lokasi_gudang','id');
    }elseif($category_id == 2){
        $data['Gudang']= Gudangpetroganik::pluck('nama_rekanan','id');
    }
    return response()->json($data);    
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $asal = $request->get('asal');
        // $tujuan = $request->get('tujuan');
        // // print($asal);
        // $data['asal'] = $asal;
        // $data['tujuan'] = $tujuan;
        $data['asal'] = GudangPKG::pluck('lokasi_gudang','lokasi_gudang');
        $data['tujuan'] = GudangPKG::pluck('lokasi_gudang','lokasi_gudang');
        $data['wilayah'] = Provinsi::pluck('nama_provinsi','nama_provinsi');

        
        return view('rekapalihstok.jaluralihstok.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $asal = $request->get('asal');
        // $tujuan = $request->get('tujuan');
        $request->validate([
            // 'kode_rute' => 'required|unique:jalur_container|min:4',
            'tarif'=> 'required',
            'wilayah'=> 'required',
            // 'jenis_gudang'=> 'required',
            'asal'=> 'required',
            'tujuan'=> 'required',

        ]);

        $jaluralihstok =  New Jaluralihstok();
        $jaluralihstok->create($request -> all());
        return redirect("/jalur-alihstok") ->with('status','Data jalur alih stok Berhasil disimpan');
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
        $data['asal'] = GudangPKG::pluck('lokasi_gudang','lokasi_gudang');
        $data['tujuan'] = GudangPKG::pluck('lokasi_gudang','lokasi_gudang');
        $data['wilayah'] = Provinsi::pluck('nama_provinsi','nama_provinsi');

        $data['jalur_alihstok'] = Jaluralihstok::where('kode_rute',$id)->first();
        return view('rekapalihstok.jaluralihstok.edit',$data);
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

        $jaluralihstok =  Jaluralihstok::where('kode_rute','=',$kode_rute);
        $jaluralihstok->update($request -> except('_method','_token'));
        return redirect("/jalur-alihstok");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_rute)
    {
        $jaluralihstok = Jaluralihstok::where('kode_rute','=',$kode_rute);
        $jaluralihstok->delete();
        return redirect("/jalur-alihstok");
    }

    public function importDataJaluralihstok(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jalur-alihstok');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajaluralihstok',$namaFile);
        // // dd($file);
        \Excel::import(new JaluralihstokImport, public_path('datajaluralihstok/'.$namaFile));

        // dd($file);
        
        return redirect('/jalur-alihstok')->with('success', 'All good!');
    }
}
