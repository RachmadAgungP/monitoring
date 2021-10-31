<?php

namespace App\Http\Controllers;
use DataTables;

use Illuminate\Http\Request;
use App\Jasageneralcargo;
use App\Jalurgeneralcargo;
use App\Vendorgeneralcargo;
use App\StatusPemenang;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\JasageneralcargoImport;

class JasageneralcargoController extends Controller
{
    function json(Request $request){
       
        $data['jasageneralcargo'] = \DB::table('jasageneralcargo')
                                        ->join('jalur_generalcargo','jalur_generalcargo.kode_rute','=','jasageneralcargo.kode_rute')
                                        // ->join('vendor_generalcargo','nama_vendor','=','jasageneralcargo.pemegang_kontrak')
                                        ->get();
        
        if ($request->input('statuscategorys')!=0){
            if ($request->statuscategorys == '1'){
                $filter_periodes = now()->addDays(730)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(364)->format('Y-m-d'); 
                $data['jasageneralcargos'] =  $data['jasageneralcargo']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '2'){
                $filter_periodes = now()->addDays(364)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(182)->format('Y-m-d');
                $data['jasageneralcargos'] =  $data['jasageneralcargo']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '3'){
                $filter_periodes = now()->addDays(182)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(91)->format('Y-m-d');
                $data['jasageneralcargos'] =  $data['jasageneralcargo']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '4'){
                $filter_periodes = now()->addDays(91)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(45)->format('Y-m-d');
                $data['jasageneralcargos'] =  $data['jasageneralcargo']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }else{
                $filter_periodes = now()->addDays(45)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(1)->format('Y-m-d');
                $data['jasageneralcargos'] =  $data['jasageneralcargo']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }

        }else{
            $data['jasageneralcargos'] =  $data['jasageneralcargo'];
        }
        return Datatables::of($data['jasageneralcargos'])
        ->addColumn('status', function ($row){
            $diff  = date_diff( date_create($row->akhir), date_create() );
            $status = $diff->format('%a hari');
            return $status;
        })

        ->addColumn('statuscategory', function ($row){
            $diff  = date_diff( date_create($row->akhir), date_create() );
            $statushari = (int)$diff->format('%a');
            $statuscategory = "";
            if ( $statushari >= 364 && $statushari <= 730){
                $statuscategory = "<div class='p-2 mb-2 bg-success text-white'> Masih Lama </div>";
            }elseif($statushari >= 182 && $statushari <= 364){
                $statuscategory = "<div class='p-2 mb-2 bg-primary text-white'> Kurang dari 1 tahun </div>";
            }elseif($statushari >= 91 && $statushari <= 182 ){
                $statuscategory = "<div class='p-2 mb-2 bg-secondary text-white'> Kurang dari 6 bulan </div>";
            }elseif($statushari >= 45 && $statushari <= 91){
                $statuscategory = "<div class='p-2 mb-2 bg-warning text-white'> Kurang dari 3 bulan </div>";
            }else{
                $statuscategory = "<div class='p-2 mb-2 bg-danger text-white'> Perlu dipantau </div>";
            }
            // if ( $statushari >= 364 && $statushari <= 730){
            //     $statuscategory = "Masih Lama";
            // }elseif($statushari >= 182 && $statushari <= 364){
            //     $statuscategory = "< 1 tahun";
            // }elseif($statushari >= 91 && $statushari <= 182 ){
            //     $statuscategory = "< 6 bulan";
            // }elseif($statushari >= 45 && $statushari <= 91){
            //     $statuscategory = "< 3 bulan";
            // }else{
            //     $statuscategory = "Perlu dipantau";
            // }
            return $statuscategory;
        })
        ->addColumn('action', function ($row){
            $action = '<a href= "/jasa-general-cargo/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'jasa-general-cargo/'.$row->id,'method'=>'delete','style'=>'float:right']);
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
    public function index()
    {   
        $data['jasageneralcargo'] = \DB::table('jasageneralcargo')
                                        ->join('jalur_generalcargo','jalur_generalcargo.kode_rute','=','jasageneralcargo.kode_rute')
                                        // ->join('vendor_voyage','nama_vendor','=','jasageneralcargo.pemegang_kontrak')
                                        ->get();
        // $data['jasageneralcargos'] = \DB::table('jasageneralcargo')->where('kode_rute','=','Gresik-Lhokseumawe')->get();
        // dump($data['jasageneralcargos']);
        // $data['jalur_generalcargo'] = Jalurgeneralcargo::all();
        // $data['vendor_generalcargo'] = Vendorgeneralcargo::pluck('nama_vendor','id_vendor');
        // $jasageneralcargos = jasageneralcargo::all();
        return view('jasageneralcargo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jalur_generalcargo'] = Jalurgeneralcargo::pluck('kode_rute','kode_rute');
        $data['vendor_generalcargo'] = Vendorgeneralcargo::pluck('nama_vendor','nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang','status_pemenang');
        return view('jasageneralcargo.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'status_pemenang' => 'required|min:2',
        //     'kontrak'     =>'required',
        //     'tgl_kontrak'=>'required',
        //     'mulai'=>'required',
        //     'akhir'=>'required',
        // ]);

        $jasageneralcargo =  New Jasageneralcargo();
        $jasageneralcargo->create($request -> all());
        return redirect("/jasa-general-cargo") ->with('status','Data Jalur general cargo Berhasil disimpan');
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
        $data['jalur_generalcargo'] = Jalurgeneralcargo::pluck('kode_rute','kode_rute');
        $data['vendor_generalcargo'] = Vendorgeneralcargo::pluck('nama_vendor','nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang','status_pemenang');
        $data['jasageneralcargo'] = Jasageneralcargo::where('id',$id)->first();
        return view('jasageneralcargo.edit',$data);
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
        // $request->validate([
        //     'status_pemenang' => 'required|min:2',
        //     'kontrak'     =>'required',
        //     'tgl_kontrak'=>'required',
        //     'mulai'=>'required',
        //     'akhir'=>'required',
        // ]);

        $jasageneralcargo =  Jasageneralcargo::where('id','=',$id);
        $jasageneralcargo->update($request -> except('_method','_token'));
        return redirect("/jasa-general-cargo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasageneralcargo = Jasageneralcargo::where('id','=',$id);
        $jasageneralcargo->delete();
        return redirect("/jasa-general-cargo");
    }

    public function importDataJasageneralcargo(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jasa-general-cargo');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajasageneralcargo',$namaFile);
        // // dd($file);
        \Excel::import(new JasageneralcargoImport, public_path('datajasageneralcargo/'.$namaFile));

        return redirect('/jasa-general-cargo')->with('success', 'All good!');
    }
}
