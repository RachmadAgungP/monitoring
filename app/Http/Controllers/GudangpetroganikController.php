<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Gudangpetroganik;
use Maatwebsite\Excel\Facades\Excel;
use App\Provinsi;

use App\Imports\GudangpetroganikImport;

class GudangpetroganikController extends Controller
{
    function json(Request $request){
       
        $data['gudangpetroganik'] = \DB::table('gudang_petroganik')
                                        // ->join('jalur_container','jalur_container.kode_rute','=','gudangpetroganik.kode_rute')
                                        // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','gudangpetroganik.id_kelas_kapasitas')
                                        // ->join('vendor_time','nama_vendor','=','gudangpetroganik.nama_vendor')
                                        
                                        ->get();

        if ($request->input('statuscategorys')!=0){
            if ($request->statuscategorys == '1'){
                $filter_periodes = now()->addDays(730)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(364)->format('Y-m-d'); 
                $data['gudangpetroganiks'] =  $data['gudangpetroganik']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '2'){
                $filter_periodes = now()->addDays(364)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(182)->format('Y-m-d');
                $data['gudangpetroganiks'] =  $data['gudangpetroganik']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '3'){
                $filter_periodes = now()->addDays(182)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(91)->format('Y-m-d');
                $data['gudangpetroganiks'] =  $data['gudangpetroganik']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '4'){
                $filter_periodes = now()->addDays(91)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(45)->format('Y-m-d');
                $data['gudangpetroganiks'] =  $data['gudangpetroganik']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }else{
                $filter_periodes = now()->addDays(45)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(1)->format('Y-m-d');
                $data['gudangpetroganiks'] =  $data['gudangpetroganik']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }

        }else{
            $data['gudangpetroganiks'] =  $data['gudangpetroganik'];
        }
        return Datatables::of($data['gudangpetroganiks'])
        // ->addColumn('status', function ($row){
        //     $diff  = date_diff( date_create($row->akhir), date_create() );
        //     $status = $diff->format('%a hari');
        //     return $status;
        // })

        // ->addColumn('statuscategory', function ($row){
        //     $diff  = date_diff( date_create($row->akhir), date_create() );
        //     $statushari = (int)$diff->format('%a');
        //     $statuscategory = "";
        //     if ( $statushari >= 364 && $statushari <= 730){
        //         $statuscategory = "<div class='p-2 mb-2 bg-success text-white'> Masih Lama </div>";
        //     }elseif($statushari >= 182 && $statushari <= 364){
        //         $statuscategory = "<div class='p-2 mb-2 bg-primary text-white'> Kurang dari 1 tahun </div>";
        //     }elseif($statushari >= 91 && $statushari <= 182 ){
        //         $statuscategory = "<div class='p-2 mb-2 bg-secondary text-white'> Kurang dari 6 bulan </div>";
        //     }elseif($statushari >= 45 && $statushari <= 91){
        //         $statuscategory = "<div class='p-2 mb-2 bg-warning text-white'> Kurang dari 3 bulan </div>";
        //     }else{
        //         $statuscategory = "<div class='p-2 mb-2 bg-danger text-white'> Perlu dipantau </div>";
        //     }
        //     // if ( $statushari >= 364 && $statushari <= 730){
        //     //     $statuscategory = "Masih Lama";
        //     // }elseif($statushari >= 182 && $statushari <= 364){
        //     //     $statuscategory = "< 1 tahun";
        //     // }elseif($statushari >= 91 && $statushari <= 182 ){
        //     //     $statuscategory = "< 6 bulan";
        //     // }elseif($statushari >= 45 && $statushari <= 91){
        //     //     $statuscategory = "< 3 bulan";
        //     // }else{
        //     //     $statuscategory = "Perlu dipantau";
        //     // }
        //     return $statuscategory;
        // })
        ->addColumn('action', function ($row){
            $action = '<a href= "/gudang-petroganik/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'gudang-petroganik/'.$row->id,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Hapus</button>";
            $action .= \Form::Close();

            return $action; })

        // ->rawColumns(['statuscategory', 'action'])
        ->make(true);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $data['gudangpetroganik'] = \DB::table('gudang_petroganik')
    // ->join('jalur_container','jalur_container.kode_rute','=','gudangpetroganik.kode_rute')
                                    // ->join('angkutan_time','angkutan_time.kode_angkutan','=','gudangpetroganik.kode_angkutan')
                                    ->get();
    return view('gudangpetroganik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['jalur_container'] = Jalurcontainer::pluck('kode_rute','kode_rute');
        // $data['vendor_container'] = Vendorcontainer::pluck('nama_vendor','nama_vendor');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        return view('gudangpetroganik.create',$data);
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
        $gudangpetroganik =  New Gudangpetroganik();
        $gudangpetroganik->create($request -> all());
        return redirect("/gudang-petroganik") ->with('status','Data Jasa time charter Berhasil disimpan');
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
        // $data['jalur_container'] = Jalurcontainer::pluck('kode_rute','kode_rute');
        // $data['vendor_container'] = Vendorcontainer::pluck('nama_vendor','nama_vendor');
        
        // $data['statuspemenang'] = StatusPemenang::pluck('nama_provinsi','nama_provinsi');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        $data['gudangpetroganik'] = Gudangpetroganik::where('id',$id)->first();

        return view('gudangpetroganik.edit',$data);
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
        $gudangpetroganik =  Gudangpetroganik::where('id','=',$id);
        $gudangpetroganik->update($request -> except('_method','_token'));
        return redirect("/gudang-petroganik");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudangpetroganik = Gudangpetroganik::where('id','=',$id);
        $gudangpetroganik->delete();
        return redirect("/gudang-petroganik");
    }

    public function importDataGudangpetroganik(Request $request)
    {
        // return  dd($request->all());
        $file = $request->file('gudang-petroganik');
        $namaFile = $file->getClientOriginalName();
        $file->move('datagudangpetroganik',$namaFile);
        // // dd($file);
        // return dd($file);
        \Excel::import(new GudangpetroganikImport, public_path('datagudangpetroganik/'.$namaFile));
        return redirect('/gudang-petroganik')->with('success', 'All good!');
    }
}
