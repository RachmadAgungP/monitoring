<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Jalurtaripfranco ;

use App\Gudangpetroganik;
use App\Provinsi;
use App\GudangPenyangga;

use App\Imports\JalurtaripfrancoImport;
use App\Kabupaten;
include(app_path() . '/Http/Controllers/charters_filter.php');
class JalurtaripfrancoController extends Controller
{
    function json(){
        return Datatables::of(Jalurtaripfranco::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/jalur-taripfranco/'.$row->kode_rute.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jalur-taripfranco/'.$row->kode_rute,'method'=>'delete','style'=>'float:right']);
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
        $jalurtaripfrancos = Jalurtaripfranco::all();
        return view('rekaptaripfranco.jalurtaripfranco.index', compact('jalurtaripfrancos'));
    }

    public function getgudang($category_id)
{
    if ($category_id == 1){
       $data['Gudang'] = GudangPenyangga::pluck('lokasi_gudang','id');
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
        $data['asal'] = GudangPenyangga::pluck('lokasi_gudang','lokasi_gudang');
        $data['tujuan'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        return view('rekaptaripfranco.jalurtaripfranco.create',$data);
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
            'asal'=> 'required',
            'tujuan'=> 'required',

        ]);

        $jalurtaripfranco =  New Jalurtaripfranco();
        $jalurtaripfranco->create($request -> all());
        return redirect("/jalur-taripfranco") ->with('status','Data jalur alih stok Berhasil disimpan');
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
        $data['asal'] = GudangPenyangga::pluck('lokasi_gudang','lokasi_gudang');
        $data['tujuan'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');

        $data['jalur_taripfranco'] = Jalurtaripfranco::where('kode_rute',$id)->first();
        $datas = select_jenisGudang($data['jalur_taripfranco']);
        $data['asal'] = $datas['asal'];
        $data['val_asal'] = $datas['val_asal'];
        return view('rekaptaripfranco.jalurtaripfranco.edit',$data);
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

        $jalurtaripfranco =  Jalurtaripfranco::where('kode_rute','=',$kode_rute);
        $jalurtaripfranco->update($request -> except('_method','_token'));
        return redirect("/jalur-taripfranco");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_rute)
    {
        $jalurtaripfranco = Jalurtaripfranco::where('kode_rute','=',$kode_rute);
        $jalurtaripfranco->delete();
        return redirect("/jalur-taripfranco");
    }

    public function importDataJalurtaripfranco(Request $request)
    {
        $file = $request->file('jalur-taripfranco');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajalurtaripfranco',$namaFile);
        // // dd($file);
        \Excel::import(new JalurtaripfrancoImport, public_path('datajalurtaripfranco/'.$namaFile));

        // dd($file);
        
        return redirect('/jalur-taripfranco')->with('success', 'All good!');
    }
}
