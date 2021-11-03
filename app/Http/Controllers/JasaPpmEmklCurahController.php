<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Provinsi;
use App\Kabupaten;
use App\Jasa_PpmEmkl_Curah;
use App\Vendor_Curah;
use App\StatusPemenang;

use App\Imports\Jasa_PpmEmkl_CurahImport;

include(app_path() . '/Http/Controllers/charters_filter.php');
use Maatwebsite\Excel\Facades\Excel;
class JasaPpmEmklCurahController extends Controller
{
    function json(Request $request)
    {

        $data['jasa_ppmemkl_curah'] = \DB::table('jasa_ppmemkl_curah')
            // ->join('angkutan_time', 'angkutan_time.nama_angkutan', '=', 'jasa_ppmemkl_curah.nama_angkutan')
            // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','jasa_ppmemkl_curah.id_kelas_kapasitas')
            // ->join('vendor_time','nama_vendor','=','jasa_ppmemkl_curah.nama_vendor')

            ->get();

        if ($request->input('statuscategorys') != 0) {
            $data['jasa_ppmemkl_curahs'] = data_filter($data['jasa_ppmemkl_curah'], $request->statuscategorys);
        } else {
            $data['jasa_ppmemkl_curahs'] =  $data['jasa_ppmemkl_curah'];
        }
        return Datatables::of($data['jasa_ppmemkl_curahs'])
            ->addColumn('status', function ($row) {
                $diff  = date_diff(date_create(), date_create($row->akhir));
                $status = $diff->format('%r%a Hari');
                return $status;
            })

            ->addColumn('statuscategory', function ($row) {
                $diff  = date_diff(date_create(), date_create($row->akhir));
                $statushari = (int)$diff->format('%r%a');
                $statuscategory = data_tglfilters($statushari);
                return $statuscategory;
            })
            ->addColumn('action', function ($row) {
                $action = '<a href= "/jasa-ppmemkl-curah/' . $row->id . '/edit" class="btn btn-primary"><i class= "fas fa-pencil-alt"></i> Edit</a>';
                $action .= \Form::open(['url' => 'jasa-ppmemkl-curah/' . $row->id, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit'class='btn btn-danger'><i class='fas fa-trash-alt'></i> Hapus</button>";
                $action .= \Form::Close();

                return $action;
            })

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
        return view('jasa_ppmemkl_curah.index', array('default_key' => $request['cat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tujuan'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        $data['vendor_curah'] = Vendor_Curah::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        return view('jasa_ppmemkl_curah.create', $data);
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

        'tujuan' =>     'required',
        'wilayah' =>        'required',
        'tarif_PBM' =>      'required',
        'tarif_EMKL' =>     'required',
        'total_PBM_EMKL'=>  'required',
        'crane'=>           'required',
        'pemegang_kontrak'=>'required',
        'status_pemenang'=> 'required',
        'kontrak'=>         'required',
        'tgl_kontrak'=>     'required',
        'mulai'=>           'required',
        'akhir'=>           'required',
        'keterangan' =>     'required',
        
        ]);
        $jasa_ppmemkl_curah =  new Jasa_PpmEmkl_Curah();
        $jasa_ppmemkl_curah->create($request->all());
        return redirect("/jasa-ppmemkl-curah")->with('status', 'Data Jasa time charter Berhasil disimpan');
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
        $data['tujuan'] = Kabupaten::pluck('nama_kabupaten','nama_kabupaten');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi','nama_provinsi');
        $data['vendor_curah'] = Vendor_Curah::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        $data['jasa_ppmemkl_curah'] = jasa_ppmemkl_Curah::where('id', $id)->first();

        return view('jasa_ppmemkl_curah.edit', $data);
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

            'tujuan' =>     'required',
            'wilayah' =>        'required',
            'tarif_PBM' =>      'required',
            'tarif_EMKL' =>     'required',
            'total_PBM_EMKL'=>  'required',
            'crane'=>           'required',
            'pemegang_kontrak'=>'required',
            'status_pemenang'=> 'required',
            'kontrak'=>         'required',
            'tgl_kontrak'=>     'required',
            'mulai'=>           'required',
            'akhir'=>           'required',
            'keterangan' =>     'required',
            
            ]);
        $jasa_ppmemkl_curah =  jasa_ppmemkl_Curah::where('id', '=', $id);
        $jasa_ppmemkl_curah->update($request->except('_method', '_token'));
        return redirect("/jasa-ppmemkl-curah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasa_ppmemkl_curah = jasa_ppmemkl_Curah::where('id', '=', $id);
        $jasa_ppmemkl_curah->delete();
        return redirect("/jasa-ppmemkl-curah");
    }

    public function importDataJasaCurah(Request $request)
    {
        $file = $request->file('jasa-ppmemkl-curah');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajasaincurah', $namaFile);
        \Excel::import(new jasa_ppmemkl_CurahImport, public_path('datajasaincurah/'.$namaFile));
        return redirect('/jasa-ppmemkl-curah')->with('success', 'All good!');
    }
}
