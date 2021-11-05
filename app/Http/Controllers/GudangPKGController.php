<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\GudangPKG;
use App\GudangPenyangga;
use App\StatusPemenang;
use Maatwebsite\Excel\Facades\Excel;
use App\Provinsi;
use App\Imports\GudangPKGImport;

include(app_path() . '/Http/Controllers/charters_filter.php');

class GudangPKGController extends Controller
{
    function json(Request $request)
    {
        $data['gudangpkg'] = \DB::table('gudang_pkg')
            ->join('gudang_penyangga','gudang_penyangga.lokasi_gudang','=','gudang_pkg.lokasi_gudangs')
            // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','gudangpkg.id_kelas_kapasitas')
            // ->join('vendor_time','nama_vendor','=','gudangpkg.nama_vendor')

            ->get();

        if ($request->input('statuscategorys') != 0) {
            $data['gudangpkgs'] = data_filter($data['gudangpkg'], $request->statuscategorys);
        } else {
            $data['gudangpkgs'] =  $data['gudangpkg'];
        }
        return Datatables::of($data['gudangpkgs'])
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
                $action = '<a href= "/gudang-pkg/' . $row->ids . '/edit" class="btn btn-primary btn-sm"><i class= "fas fa-pencil-alt"></i> Edit</a>';
                $action .= \Form::open(['url' => 'gudang-pkg/' . $row->ids, 'method' => 'delete', 'style' => 'float:right']);
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
        return view('gudangpkg.index', array('default_key' => $request['cat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['jalur_container'] = Jalurcontainer::pluck('kode_rute','kode_rute');
        $data['gudang_penyangga'] = GudangPenyangga::pluck('lokasi_gudang','lokasi_gudang');
        $data['provinsi'] = Provinsi::pluck('nama_provinsi', 'nama_provinsi');
        return view('gudangpkg.create', $data);
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
        'ids' => 'required',
        'lokasi_gudangs'=> 'required',
        'kap_GP_Ton'=> 'required',
        'Kapasitas_Anper_Lain'=> 'required',
        'sewa_Gudang_(Rp/bulan)'=> 'required',
        'pengelolan_Stock_(Rp/bulan)'=> 'required',
        'B/M_(Rp/Ton)'=> 'required',
        'rebag_(Rp/Ton)'=> 'required',
        'lembur_(Rp/Ton)'=> 'required',
        'restapel_(Rp/Ton)'=> 'required',
        'nomor_surat'=> 'required',
        'tgl_kontrak'=> 'required',
        'mulai'=> 'required',
        'akhir'=> 'required',
        'jenis_surat'=> 'required',
        'keterangan'=> 'required',
        ]);
        $gudangpkg =  new GudangPKG();
        $gudangpkg->create($request->all());
        return redirect("/gudang-pkg")->with('status', 'Data Jasa time charter Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ids)
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
        $data['gudang_penyangga'] = GudangPenyangga::pluck('lokasi_gudang','lokasi_gudang');

        $data['provinsi'] = Provinsi::pluck('nama_provinsi', 'nama_provinsi');
        $data['gudangpkg'] = GudangPKG::where('ids', $id)->first();

        return view('gudangpkg.edit', $data);
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
            'lokasi_gudangs' => 'required',
            'nomor_surat'=> 'required',
            'tgl_kontrak'=> 'required',
            'mulai'=> 'required',
            'akhir'=> 'required',
            'jenis_surat'=> 'required',
            'keterangan'=> 'required',
            ]);

        $gudangpkg =  GudangPKG::where('ids', '=', $id);
        $gudangpkg->update($request->except('_method', '_token'));
        return redirect("/gudang-pkg");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudangpkg = GudangPKG::where('ids', '=', $id);
        $gudangpkg->delete();
        return redirect("/gudang-pkg");
    }

    public function importDataGudangPKG(Request $request)
    {
        // return  dd($request->all());
        $file = $request->file('gudang-pkg');
        $namaFile = $file->getClientOriginalName();
        $file->move('datagudangpkg', $namaFile);
        // // dd($file);
        // return dd($file);
        \Excel::import(new GudangPKGImport, public_path('datagudangpkg/' . $namaFile));
        return redirect('/gudang-pkg')->with('success', 'All good!');
    }
}
