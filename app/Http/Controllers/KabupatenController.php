<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Kabupaten;
use App\Provinsi;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\KabupatenImport;


class KabupatenController extends Controller
{
    function json(){
        $data['kabupaten'] = \DB::table('kabupaten')
                                        ->join('provinsi','provinsi.nama_provinsi','=','kabupaten.provinsi')
                                        // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','jasatimecharter.id_kelas_kapasitas')
                                        // ->join('vendor_time','nama_vendor','=','jasatimecharter.nama_vendor')
                                        
                                        ->get();
        return Datatables::of($data['kabupaten'])
        
        ->addColumn('action', function ($row){
            $action = '<a href= "/kabupaten/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'kabupaten/'.$row->id,'method'=>'delete','style'=>'float:right']);
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
        $data['kabupaten'] = \DB::table('kabupaten')
                                        ->join('provinsi','provinsi.nama_provinsi','=','kabupaten.provinsi')
                                       
                                        ->get();
        return view('kabupaten.index',$data);
    }

    public function create()
    {
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        return view('kabupaten.create',$data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'status_pemenang' => 'required|min:2',
        //     'kontrak'     =>'required',
        //     'tgl_kontrak'=>'required',
        //     'mulai'=>'required',
        //     'akhir'=>'required',
        // ]);

        $kabupaten =  New Kabupaten();
        $kabupaten->create($request -> all());
        return redirect("kabupaten") ->with('status','Data Kabupaten Berhasil disimpan');
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
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        $data['kabupaten'] = Kabupaten::where('id',$id)->first();

        return view('kabupaten.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kabupaten =  Kabupaten::where('id','=',$id);
        $kabupaten->update($request -> except('_method','_token'));
        return redirect("/kabupaten");
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kabupaten = Kabupaten::where('id','=',$id);
        $kabupaten->delete();
        return redirect("/kabupaten");
    }

    public function importDataKabupaten(Request $request)
    {
        // dd($request->all());
        $file = $request->file('kabupaten');
        $namaFile = $file->getClientOriginalName();
        $file->move('datakabupaten',$namaFile);
        // // dd($file);
        \Excel::import(new KabupatenImport, public_path('datakabupaten/'.$namaFile));

        // dd($file);
        
        return redirect('/kabupaten')->with('success', 'All good!');
    }
}
