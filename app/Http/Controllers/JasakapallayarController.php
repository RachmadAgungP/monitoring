<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Jasakapallayar;
use App\Jalurkapallayar;
use App\Vendorkapallayar;
use App\StatusPemenang;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JasakapallayarImport;
include(app_path().'/Http/Controllers/charters_filter.php');


class JasakapallayarController extends Controller
{
    function json(Request $request)
    {

        $data['jasakapallayar'] = \DB::table('jasakapallayar')
            ->join('jalur_kapallayar', 'jalur_kapallayar.kode_rute', '=', 'jasakapallayar.kode_rutes')
            // ->join('vendor_kapallayar','nama_vendor','=','jasakapallayar.pemegang_kontrak')
            ->get();
        if ($request->input('statuscategorys') != 0) {
            $data['jasakapallayars'] = data_filter($data['jasakapallayar'], $request->statuscategorys);
        } else {
            $data['jasakapallayars'] =  $data['jasakapallayar'];
        }
        return Datatables::of($data['jasakapallayars'])
            ->addColumn('status', function ($row) {
                $diff  = date_diff(date_create(),date_create($row->akhir));
                $status = $diff->format('%r%a hari');
                return $status;
            })

            ->addColumn('statuscategory', function ($row) {
                $diff  = date_diff( date_create(),date_create($row->akhir));
                $statushari = (int)$diff->format('%r%a');
                $statuscategory = data_tglfilters($statushari);
                return $statuscategory;
            })
            ->addColumn('action', function ($row) {
                $action = '<a href= "/jasa-kapal-layar/' . $row->id . '/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
                $action .= \Form::open(['url' => 'jasa-kapal-layar/' . $row->id, 'method' => 'delete', 'style' => 'float:right']);
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
        return view('jasakapallayar.index', array('default_key' => $request['cat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jalur_kapallayar'] = Jalurkapallayar::pluck('kode_rute', 'kode_rute');
        $data['vendor_kapallayar'] = Vendorkapallayar::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        return view('jasakapallayar.create', $data);
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
            'kapasitas' => 'required',
            'kontrak'     =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);

        $jasakapallayar =  new Jasakapallayar();
        $jasakapallayar->create($request->all());
        return redirect("/jasa-kapal-layar")->with('status', 'Data Jalur general cargo Berhasil disimpan');
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
        $data['jalur_kapallayar'] = Jalurkapallayar::pluck('kode_rute', 'kode_rute');
        $data['vendor_kapallayar'] = Vendorkapallayar::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        $data['jasakapallayar'] = Jasakapallayar::where('id', $id)->first();
        return view('jasakapallayar.edit', $data);
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
            'kontrak'     =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);


        $jasakapallayar =  Jasakapallayar::where('id', '=', $id);
        $jasakapallayar->update($request->except('_method', '_token'));
        return redirect("/jasa-kapal-layar");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasakapallayar = Jasakapallayar::where('id', '=', $id);
        $jasakapallayar->delete();
        return redirect("/jasa-kapal-layar");
    }

    public function importDataJasakapallayar(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jasa-kapal-layar');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajasakapallayar', $namaFile);
        // // dd($file);
        \Excel::import(new JasakapallayarImport, public_path('datajasakapallayar/' . $namaFile));

        return redirect('/jasa-kapal-layar')->with('success', 'All good!');
    }
}
