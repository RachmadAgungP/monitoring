<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Kelaskapasitastime;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\KelaskapasitastimeImport;

class KelaskapasitastimeController extends Controller
{
    function json(){
        return Datatables::of(kelaskapasitastime::all())
        ->addColumn('action', function ($row){
            // $action = '<a href= "/kelaskapasitas-time/'.$row->id_kelas_kapasitas.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action = \Form::open(['url'=>'kelaskapasitas-time/'.$row->id_kelas_kapasitas,'method'=>'delete','style'=>'float:center']);
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
        $kelaskapasitastimes = Kelaskapasitastime::all();
        return view('jasatimecharter.kelaskapasitastime.index', compact('kelaskapasitastimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasatimecharter.kelaskapasitastime.create');
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
            'kelas_kapasitas' => 'required',
        ]);

        $kelaskapasitastime =  New Kelaskapasitastime();
        $kelaskapasitastime->create($request -> all());
        return redirect("/kelaskapasitas-time") ->with('status','Data kelaskapasitas time Berhasil disimpan');
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
        $data['kelaskapasitas_time'] = Kelaskapasitastime::where('id_kelas_kapasitas',$id)->first();
        return view('jasatimecharter.kelaskapasitastime.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelas_kapasitas)
    {
        $request->validate([
            'kelas_kapasitas' => 'required',
        ]);

        $kelaskapasitastime =  Kelaskapasitastime::where('id_kelas_kapasitas','=',$id_kelas_kapasitas);
        $kelaskapasitastime->update($request -> except('_method','_token'));
        return redirect("/kelaskapasitas-time");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelas_kapasitas)
    {
        $kelaskapasitastime = Kelaskapasitastime::where('id_kelas_kapasitas','=',$id_kelas_kapasitas);
        $kelaskapasitastime->delete();
        return redirect("/kelaskapasitas-time");
    }

    public function importDataKelaskapasitastime(Request $request)
    {
        // dd($request->all());
        $file = $request->file('kelaskapasitas-time');
        $namaFile = $file->getClientOriginalName();
        $file->move('datakelaskapasitastime',$namaFile);
        // // dd($file);
        \Excel::import(new KelaskapasitastimeImport, public_path('datakelaskapasitastime/'.$namaFile));

        // dd($file);
        
        return redirect('/kelaskapasitas-time')->with('success', 'All good!');
    }
}
