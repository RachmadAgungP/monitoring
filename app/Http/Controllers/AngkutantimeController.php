<?php

namespace App\Http\Controllers;
use DataTables;

use Illuminate\Http\Request;
use App\Angkutantime;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\AngkutantimeImport;

class AngkutantimeController extends Controller
{
    function json(){
        return Datatables::of(Angkutantime::all())
        ->addColumn('action', function ($row){
            $action = '<a href= "/angkutan-time/'.$row->kode_angkutan.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'angkutan-time/'.$row->kode_angkutan,'method'=>'delete','style'=>'float:right']);
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
        $angkutantimes = Angkutantime::all();
        return view('jasatimecharter.angkutantime.index', compact('angkutantimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasatimecharter.angkutantime.create');
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
            // 'kode_angkutan' => 'required|unique:angkutan_time|min:4',
            'nama_angkutan' => 'required|min:2',
            'keterangan_angkutan'     =>'required',
        ]);

        $angkutantime =  New Angkutantime();
        $angkutantime->create($request -> all());
        return redirect("/angkutan-time") ->with('status','Data angkutan time Berhasil disimpan');
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
        $data['angkutan_time'] = Angkutantime::where('kode_angkutan',$id)->first();
        return view('jasatimecharter.angkutantime.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_angkutan)
    {
        $request->validate([
            'nama_angkutan' => 'required|min:2',
            'keterangan_angkutan'     =>'required',
        ]);

        $angkutantime =  Angkutantime::where('kode_angkutan','=',$kode_angkutan);
        $angkutantime->update($request -> except('_method','_token'));
        return redirect("/angkutan-time");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_angkutan)
    {
        $angkutantime = Angkutantime::where('kode_angkutan','=',$kode_angkutan);
        $angkutantime->delete();
        return redirect("/angkutan-time");
    }

    public function importDataAngkutantime(Request $request)
    {
        // dd($request->all());
        $file = $request->file('angkutan-time');
        $namaFile = $file->getClientOriginalName();
        $file->move('dataangkutantime',$namaFile);
        // // dd($file);
        \Excel::import(new AngkutantimeImport, public_path('dataangkutantime/'.$namaFile));

        // dd($file);
        
        return redirect('/angkutan-time')->with('success', 'All good!');
    }
}
