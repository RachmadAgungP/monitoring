<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Jasacontainer;
use App\Jalurcontainer;
use App\Vendorcontainer;
use App\StatusPemenang;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\JasacontainerImport;

include(app_path() . '/Http/Controllers/charters_filter.php');
class JasacontainerController extends Controller
{
    function json(Request $request)
    {

        $data['jasacontainer'] = \DB::table('jasacontainer')
            ->join('jalur_container', 'jalur_container.kode_rute', '=', 'jasacontainer.kode_rutes')
            // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','jasacontainer.id_kelas_kapasitas')
            // ->join('vendor_time','nama_vendor','=','jasacontainer.nama_vendor')

            ->get();

        if ($request->input('statuscategorys') != 0) {
            $data['jasacontainers'] = data_filter($data['jasacontainer'], $request->statuscategorys);
        } else {
            $data['jasacontainers'] =  $data['jasacontainer'];
        }
        return Datatables::of($data['jasacontainers'])
            ->addColumn('status', function ($row) {
                $diff  = date_diff(date_create(), date_create($row->akhir));
                $status = $diff->format('%r%a hari');
                return $status;
            })
            ->addColumn('statuscategory', function ($row) {
                $diff  = date_diff(date_create(), date_create($row->akhir));
                $statushari = (int)$diff->format('%r%a');
                $statuscategory = data_tglfilters($statushari);
                return $statuscategory;
            })
            ->addColumn('action', function ($row) {
                $action = '<a href= "/jasa-container/' . $row->id . '/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
                $action .= \Form::open(['url' => 'jasa-container/' . $row->id, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Hapus</button>";
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
        $data['jasacontainer'] = \DB::table('jasacontainer')
            ->join('jalur_container', 'jalur_container.kode_rute', '=', 'jasacontainer.kode_rutes')
            // ->join('angkutan_time','angkutan_time.kode_angkutan','=','jasacontainer.kode_angkutan')
            ->get();
        return view('jasacontainer.index', array('default_key' => $request['cat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jalur_container'] = Jalurcontainer::pluck('kode_rute', 'kode_rute');
        $data['vendor_container'] = Vendorcontainer::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        return view('jasacontainer.create', $data);
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
            'kode_rutes' => 'required',
            'nama_vendor' => 'required',
            'status_pemenang' => 'required',
            'kontrak'     => 'required',
            'tgl_kontrak' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
        ]);
        $jasacontainer =  new Jasacontainer();
        $jasacontainer->create($request->all());
        return redirect("/jasa-container")->with('status', 'Data Jasa time charter Berhasil disimpan');
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
        $data['jalur_container'] = Jalurcontainer::pluck('kode_rute', 'kode_rute');
        $data['vendor_container'] = Vendorcontainer::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        $data['jasacontainer'] = Jasacontainer::where('id', $id)->first();

        return view('jasacontainer.edit', $data);
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
            'kode_rutes' => 'required',
            'nama_vendor' => 'required',
            'status_pemenang' => 'required',
            'kontrak'     => 'required',
            'tgl_kontrak' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
        ]);
        $jasacontainer =  Jasacontainer::where('id', '=', $id);
        $jasacontainer->update($request->except('_method', '_token'));
        return redirect("/jasa-container");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasacontainer = Jasacontainer::where('id', '=', $id);
        $jasacontainer->delete();
        return redirect("/jasa-container");
    }

    public function importDataJasacontainer(Request $request)
    {
        // return  dd($request->all());
        $file = $request->file('jasa-container');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajasacontainer', $namaFile);
        // // dd($file);
        // return dd($file);
        \Excel::import(new JasacontainerImport, public_path('datajasacontainer/' . $namaFile));
        return redirect('/jasa-container')->with('success', 'All good!');
    }
}
