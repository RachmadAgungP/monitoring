<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Jasatimecharter;
use App\Angkutantime;
use App\KelasKapasitastime;
use App\Vendortime;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\JasatimecharterImport;

include(app_path() . '/Http/Controllers/charters_filter.php');

class JasatimecharterController extends Controller
{
    function json(Request $request)
    {

        $data['jasatimecharter'] = \DB::table('jasatimecharter')
            ->join('angkutan_time', 'angkutan_time.nama_angkutan', '=', 'jasatimecharter.nama_angkutan')
            // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','jasatimecharter.id_kelas_kapasitas')
            // ->join('vendor_time','nama_vendor','=','jasatimecharter.nama_vendor')

            ->get();

        if ($request->input('statuscategorys') != 0) {
            $data['jasatimecharters'] = data_filter($data['jasatimecharter'], $request->statuscategorys);
        } else {
            $data['jasatimecharters'] =  $data['jasatimecharter'];
        }
        return Datatables::of($data['jasatimecharters'])
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
                $action = '<a href= "/jasa-time-charter/' . $row->id . '/edit" class="btn btn-primary"><i class= "fas fa-pencil-alt"></i> Edit</a>';
                $action .= \Form::open(['url' => 'jasa-time-charter/' . $row->id, 'method' => 'delete', 'style' => 'float:right']);
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
        return view('jasatimecharter.index', array('default_key' => $request['cat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['angkutan_time'] = Angkutantime::pluck('nama_angkutan', 'nama_angkutan');
        $data['kelas_kapasitas_time'] = KelasKapasitastime::pluck('kelas_kapasitas', 'kelas_kapasitas');
        $data['vendor_time'] = Vendortime::pluck('nama_vendor', 'nama_vendor');
        return view('jasatimecharter.create', $data);
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
            'id'=> 'required',
            'nama_angkutan'=> 'required',
            'nama_vendor' => 'required',
            'kelas_kapasitas' => 'required',
            'tarif' => 'required',
            'kontrak'     =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);
        $jasatimecharter =  new Jasatimecharter();
        $jasatimecharter->create($request->all());
        return redirect("/jasa-time-charter")->with('status', 'Data Jasa time charter Berhasil disimpan');
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
        $data['angkutan_time'] = Angkutantime::pluck('nama_angkutan', 'nama_angkutan');
        $data['kelas_kapasitas_time'] = KelasKapasitastime::pluck('kelas_kapasitas', 'kelas_kapasitas');
        $data['vendor_time'] = Vendortime::pluck('nama_vendor', 'nama_vendor');
        $data['jasatimecharter'] = Jasatimecharter::where('id', $id)->first();

        return view('jasatimecharter.edit', $data);
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
            'nama_vendor' => 'required',
            'kelas_kapasitas' => 'required',
            'tarif' => 'required',
            'kontrak'     =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);
        $jasatimecharter =  Jasatimecharter::where('id', '=', $id);
        $jasatimecharter->update($request->except('_method', '_token'));
        return redirect("/jasa-time-charter");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasatimecharter = Jasatimecharter::where('id', '=', $id);
        $jasatimecharter->delete();
        return redirect("/jasa-time-charter");
    }

    public function importDataJasatimeCharter(Request $request)
    {
        // return  dd($request->all());
        $file = $request->file('jasa-time-charter');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajasatimecharter', $namaFile);
        // // dd($file);
        // return dd($file);
        \Excel::import(new JasatimecharterImport, public_path('datajasatimecharter/' . $namaFile));



        return redirect('/jasa-time-charter')->with('success', 'All good!');
    }
}
