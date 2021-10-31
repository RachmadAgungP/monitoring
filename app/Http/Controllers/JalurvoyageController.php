<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Jalurvoyage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JalurvoyageImport;
use App\Kabupaten;

class JalurvoyageController extends Controller
{
    function json(){
        return Datatables::of(Jalurvoyage::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/jalur-voyage/'.$row->kode_rute.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jalur-voyage/'.$row->kode_rute,'method'=>'delete','style'=>'float:right']);
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
        $jalurvoyages = Jalurvoyage::all();
        return view('jasavoyagecharter.jalurvoyage.index', compact('jalurvoyages'));
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

        return view('jasavoyagecharter.jalurvoyage.create',$data);
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
            'kode_rute' => 'required|unique:jalur_voyage|min:4',
            'tarif_lebihdari_10000ton'=>'required',
            'tarif_kurangdari_10000ton'=>'required'
        ]);

        $jalurvoyage =  New Jalurvoyage();
        $jalurvoyage->create($request -> all());
        return redirect("/jalur-voyage") ->with('status','Data Jalur Voyage Berhasil disimpan');
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
        $data['jalur_voyage'] = Jalurvoyage::where('kode_rute',$id)->first();
        return view('jasavoyagecharter.jalurvoyage.edit',$data);
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
            'tarif_lebihdari_10000ton'=>'required',
            'tarif_kurangdari_10000ton'=>'required'
        ]);

        $jalurvoyage =  Jalurvoyage::where('kode_rute','=',$kode_rute);
        $jalurvoyage->update($request -> except('_method','_token'));
        return redirect("/jalur-voyage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_rute)
    {
        $jalurvoyage = Jalurvoyage::where('kode_rute','=',$kode_rute);
        $jalurvoyage->delete();
        return redirect("/jalur-voyage");
    }

    public function importDataJalurvoyage(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jalur-voyage');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajalurvoyage',$namaFile);
        // // dd($file);
        \Excel::import(new JalurvoyageImport, public_path('datajalurvoyage/'.$namaFile));

        // dd($file);
        
        return redirect('/jalur-voyage')->with('success', 'All good!');
    }
}
