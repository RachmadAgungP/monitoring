<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Jasavoyagecharter;
use App\Jalurvoyage;
use App\Vendorvoyage;
use App\StatusPemenang;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\JasavoyagecharterImport;
include(app_path().'/Http/Controllers/charters_filter.php');


class JasavoyagecharterController extends Controller
{
    
    function json(Request $request){
       
        $data['jasavoyagecharter'] = \DB::table('jasavoyagecharter')
                                        ->join('jalur_voyage','jalur_voyage.kode_rute','=','jasavoyagecharter.kode_rutes')
                                        // ->join('vendor_voyage','nama_vendor','=','jasavoyagecharter.pemegang_kontrak')
                                        ->get();
        
        if ($request->input('statuscategorys')!=0){
            $data['jasavoyagecharters'] = data_filter($data['jasavoyagecharter'], $request->statuscategorys);


        }else{
            $data['jasavoyagecharters'] =  $data['jasavoyagecharter'];
        }
        return Datatables::of($data['jasavoyagecharters'])
        ->addColumn('status', function ($row){
            $diff  = date_diff(date_create()  ,date_create($row->akhir) );
            $status = (int)$diff->format('%r%a hari');
            return $status;
        })

        ->addColumn('statuscategory', function ($row){
            $diff  = date_diff(  date_create() ,date_create($row->akhir));
            $statushari = (int)$diff->format('%r%a');
            $statuscategory = data_tglfilters($statushari);
            return $statuscategory;
        })
        ->addColumn('action', function ($row){
            $action = '<a href= "/jasa-voyage-charter/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jasa-voyage-charter/'.$row->id,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Hapus</button>";
            $action .= \Form::Close();

            return $action; })

        ->rawColumns(['statuscategory', 'action'])
        ->make(true);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('jasavoyagecharter.index', array('default_key' => $request['cat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $data['jalur_voyage'] = Jalurvoyage::pluck('kode_rute','kode_rute');
        $data['vendor_voyage'] = Vendorvoyage::pluck('nama_vendor','nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang','status_pemenang');
        return view('jasavoyagecharter.create',$data);
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
            'kode_rutes'=> 'required',
            'nama_vendor'=> 'required',
            'status_pemenang' => 'required',
            'kontrak'     =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);

        $jasavoyagecharter =  New Jasavoyagecharter();
        $jasavoyagecharter->create($request -> all());
        return redirect("/jasa-voyage-charter") ->with('status','Data Jalur Voyage Berhasil disimpan');
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
        $data['jalur_voyage'] = Jalurvoyage::pluck('kode_rute','kode_rute');
        $data['vendor_voyage'] = Vendorvoyage::pluck('nama_vendor','nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang','status_pemenang');
        $data['jasavoyagecharter'] = Jasavoyagecharter::where('id',$id)->first();

        return view('jasavoyagecharter.edit',$data);
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
        $request->validate([
            'kode_rutes'=> 'required',
            'nama_vendor'=> 'required',
            'status_pemenang' => 'required',
            'kontrak'     =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);

        $jasavoyagecharter =  Jasavoyagecharter::where('id','=',$id);
        $jasavoyagecharter->update($request -> except('_method','_token'));
        return redirect("/jasa-voyage-charter");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasavoyagecharter = Jasavoyagecharter::where('id','=',$id);
        $jasavoyagecharter->delete();
        return redirect("/jasa-voyage-charter");
    }

    public function importDataJasavoyageCharter(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jasa-voyage-charter');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajasavoyagecharter',$namaFile);
        // // dd($file);
        \Excel::import(new JasavoyagecharterImport, public_path('datajasavoyagecharter/'.$namaFile));

        // dd($file);
        
        return redirect('/jasa-voyage-charter')->with('success', 'All good!');
    }
}
