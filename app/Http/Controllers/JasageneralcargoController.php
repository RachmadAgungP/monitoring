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

include(app_path() . '/Http/Controllers/charters_filter.php');
class JasageneralcargoController extends Controller
{
    function json(Request $request)
    {

        $data['jasageneralcargo'] = \DB::table('jasageneralcargo')
            ->join('jalur_generalcargo', 'jalur_generalcargo.kode_rute', '=', 'jasageneralcargo.kode_rutes')
            // ->join('vendor_generalcargo','nama_vendor','=','jasageneralcargo.pemegang_kontrak')
            ->get();


        if ($request->input('statuscategorys') != 0) {
            $data['jasageneralcargos'] = data_filter($data['jasageneralcargo'], $request->statuscategorys);
        } else {
            $data['jasageneralcargos'] =  $data['jasageneralcargo'];
        }
        return Datatables::of($data['jasageneralcargos'])
        ->addColumn('status', function ($row) {
            $diff  = date_diff(date_create(), date_create($row->akhir));
            $status = (int)$diff->format('%r%a hari');
            return $status;
        })

        ->addColumn('statuscategory', function ($row) {
            $diff  = date_diff(date_create(), date_create($row->akhir));
            $statushari = (int)$diff->format('%r%a');
            $statuscategory = data_tglfilters($statushari);
            return $statuscategory;
        })
            ->addColumn('action', function ($row) {
                $action = '<a href= "/jasa-general-cargo/' . $row->id . '/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
                $action .= \Form::open(['url' => 'jasa-general-cargo/' . $row->id, 'method' => 'delete', 'style' => 'float:right']);
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
        return view('jasageneralcargo.index', array('default_key' => $request['cat']));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jalur_generalcargo'] = Jalurgeneralcargo::pluck('kode_rute', 'kode_rute');
        $data['vendor_generalcargo'] = Vendorgeneralcargo::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        return view('jasageneralcargo.create', $data);
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
            'nama_vendor' => 'required',
            'kelas_kapasitas' => 'required',
            'tarif' => 'required',
            'kontrak'     =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);

        $jasageneralcargo =  new Jasageneralcargo();
        $jasageneralcargo->create($request->all());
        return redirect("/jasa-general-cargo")->with('status', 'Data Jalur general cargo Berhasil disimpan');
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
        $data['jalur_generalcargo'] = Jalurgeneralcargo::pluck('kode_rute', 'kode_rute');
        $data['vendor_generalcargo'] = Vendorgeneralcargo::pluck('nama_vendor', 'nama_vendor');
        $data['statuspemenang'] = StatusPemenang::pluck('status_pemenang', 'status_pemenang');
        $data['jasageneralcargo'] = Jasageneralcargo::where('id', $id)->first();
        return view('jasageneralcargo.edit', $data);
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
            'kontrak' =>'required',
            'tgl_kontrak'=>'required',
            'mulai'=>'required',
            'akhir'=>'required',
        ]);

        $jasageneralcargo =  Jasageneralcargo::where('id', '=', $id);
        $jasageneralcargo->update($request->except('_method', '_token'));
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
        $jasageneralcargo = Jasageneralcargo::where('id', '=', $id);
        $jasageneralcargo->delete();
        return redirect("/jasa-general-cargo");
    }

    public function importDataJasageneralcargo(Request $request)
    {
        // dd($request->all());
        $file = $request->file('jasa-general-cargo');
        $namaFile = $file->getClientOriginalName();
        $file->move('datajasageneralcargo', $namaFile);
        // // dd($file);
        \Excel::import(new JasageneralcargoImport, public_path('datajasageneralcargo/' . $namaFile));

        return redirect('/jasa-general-cargo')->with('success', 'All good!');
    }
}
