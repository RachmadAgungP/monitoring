<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Rekapalihstok;
use App\Jaluralihstok;
use App\Vendoralihstok;
use App\StatusPemenang;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\RekapalihstokImport;


class RekapalihstokController extends Controller
{
    function json(Request $request){
       
        $data['rekapalihstok'] = \DB::table('rekapalihstok')
                                        ->join('Jalur_alihstok','Jalur_alihstok.kode_rute','=','rekapalihstok.kode_rute')
                                        // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','rekapalihstok.id_kelas_kapasitas')
                                        // ->join('vendor_time','nama_vendor','=','rekapalihstok.nama_vendor')
                                        ->get();

        if ($request->input('statuscategorys')!=0){
            if ($request->statuscategorys == '1'){
                $filter_periodes = now()->addDays(730)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(364)->format('Y-m-d'); 
                $data['rekapalihstoks'] =  $data['rekapalihstok']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '2'){
                $filter_periodes = now()->addDays(364)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(182)->format('Y-m-d');
                $data['rekapalihstoks'] =  $data['rekapalihstok']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '3'){
                $filter_periodes = now()->addDays(182)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(91)->format('Y-m-d');
                $data['rekapalihstoks'] =  $data['rekapalihstok']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '4'){
                $filter_periodes = now()->addDays(91)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(45)->format('Y-m-d');
                $data['rekapalihstoks'] =  $data['rekapalihstok']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }else{
                $filter_periodes = now()->addDays(45)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(1)->format('Y-m-d');
                $data['rekapalihstoks'] =  $data['rekapalihstok']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }

        }else{
            $data['rekapalihstoks'] =  $data['rekapalihstok'];
        }
        return Datatables::of($data['rekapalihstoks'])
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
            return $statuscategory;
        })
        ->addColumn('action', function ($row){
            $action = '<a href= "/rekap-alih-stok/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'rekap-alih-stok/'.$row->id,'method'=>'delete','style'=>'float:right']);
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
    $data['rekapalihstok'] = \DB::table('rekapalihstok')
    // ->join('Jalur_alihstok','Jalur_alihstok.kode_rute','=','rekapalihstok.kode_rute')
                                    // ->join('angkutan_time','angkutan_time.kode_angkutan','=','rekapalihstok.kode_angkutan')
                                    ->get();
    return view('rekapalihstok.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jalur_alihstok'] = Jaluralihstok::pluck('kode_rute','kode_rute');
        $data['vendor_alihstok'] = Vendoralihstok::pluck('nama_vendor','nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang','status_pemenang');
        return view('rekapalihstok.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request -> all();
        $rekapalihstok =  New Rekapalihstok();
        $rekapalihstok->create($request -> all());
        return redirect("/rekap-alih-stok") ->with('status','Data Rekap Alih Stok Berhasil disimpan');
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
        $data['jalur_alihstok'] = Jaluralihstok::pluck('kode_rute','kode_rute');
        $data['vendor_alihstok'] = Vendoralihstok::pluck('nama_vendor','nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang','status_pemenang');
        $data['rekapalihstok'] = Rekapalihstok::where('id',$id)->first();

        return view('rekapalihstok.edit',$data);
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
        $rekapalihstok =  Rekapalihstok::where('id','=',$id);
        $rekapalihstok->update($request -> except('_method','_token'));
        return redirect("/rekap-alih-stok");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekapalihstok = Rekapalihstok::where('id','=',$id);
        $rekapalihstok->delete();
        return redirect("/rekap-alih-stok");
    }

    public function importDataRekapalihstok(Request $request)
    {
        // return  dd($request->all());
        $file = $request->file('rekap-alih-stok');
        $namaFile = $file->getClientOriginalName();
        $file->move('datarekapalihstok',$namaFile);
        // // dd($file);
        // return dd($file);
        \Excel::import(new RekapalihstokImport, public_path('datarekapalihstok/'.$namaFile));
        return redirect('/rekap-alih-stok')->with('success', 'All good!');
    }
}
