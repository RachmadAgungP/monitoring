<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\GudangPenyangga;
use App\Provinsi;
use App\Imports\GudangPenyanggaImport;

class GudangPenyanggaController extends Controller
{
    function json(Request $request){
        $data['gudangpenyangga'] = \DB::table('gudang_penyangga')
                                        // ->join('jalur_container','jalur_container.kode_rute','=','gudangpenyangga.kode_rute')
                                        // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','gudangpenyangga.id_kelas_kapasitas')
                                        // ->join('vendor_time','nama_vendor','=','gudangpenyangga.nama_vendor')
                                        
                                        ->get();

        if ($request->input('statuscategorys')!=0){
            if ($request->statuscategorys == '1'){
                $filter_periodes = now()->addDays(730)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(364)->format('Y-m-d'); 
                $data['gudangpenyanggas'] =  $data['gudangpenyangga']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '2'){
                $filter_periodes = now()->addDays(364)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(182)->format('Y-m-d');
                $data['gudangpenyanggas'] =  $data['gudangpenyangga']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '3'){
                $filter_periodes = now()->addDays(182)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(91)->format('Y-m-d');
                $data['gudangpenyanggas'] =  $data['gudangpenyangga']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }elseif($request->statuscategorys == '4'){
                $filter_periodes = now()->addDays(91)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(45)->format('Y-m-d');
                $data['gudangpenyanggas'] =  $data['gudangpenyangga']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }else{
                $filter_periodes = now()->addDays(45)->format('Y-m-d'); 
                $filter_periodes1 = now()->addDays(1)->format('Y-m-d');
                $data['gudangpenyanggas'] =  $data['gudangpenyangga']->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
            }

        }else{
            $data['gudangpenyanggas'] =  $data['gudangpenyangga'];
        }
        return Datatables::of($data['gudangpenyanggas'])
    
        ->addColumn('action', function ($row){
            $action = '<a href= "/gudang-penyangga/'.$row->id.'/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
            $action .= \Form::open(['url'=>'gudang-penyangga/'.$row->id,'method'=>'delete','style'=>'float:right']);
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
    $data['gudangpenyangga'] = \DB::table('gudang_penyangga')
    // ->join('jalur_container','jalur_container.kode_rute','=','gudangpenyangga.kode_rute')
                                    // ->join('angkutan_time','angkutan_time.kode_angkutan','=','gudangpenyangga.kode_angkutan')
                                    ->get();
    return view('gudangpenyangga.index', $data);
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
        return view('gudangpenyangga.create',$data);
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
        $gudangpenyangga =  New GudangPenyangga();
        $gudangpenyangga->create($request -> all());
        return redirect("/gudang-penyangga") ->with('status','Data Jasa time charter Berhasil disimpan');
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
        $data['gudangpenyangga'] = GudangPenyangga::where('id',$id)->first();

        return view('gudangpenyangga.edit',$data);
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
        $gudangpenyangga =  GudangPenyangga::where('id','=',$id);
        $gudangpenyangga->update($request -> except('_method','_token'));
        return redirect("/gudang-penyangga");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudangpenyangga = GudangPenyangga::where('id','=',$id);
        $gudangpenyangga->delete();
        return redirect("/gudang-penyangga");
    }

    public function importDataGudangpenyangga(Request $request)
    {
        // return  dd($request->all());
        $file = $request->file('gudang-penyangga');
        $namaFile = $file->getClientOriginalName();
        $file->move('datagudangpenyangga',$namaFile);
        // // dd($file);
        // return dd($file);
        \Excel::import(new GudangPenyanggaImport, public_path('datagudangpenyangga/'.$namaFile));
        return redirect('/gudang-penyangga')->with('success', 'All good!');
    }
}
