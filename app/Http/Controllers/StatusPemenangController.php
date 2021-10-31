<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Statuspemenang;

class StatusPemenangController extends Controller
{
    function json(){
        return Datatables::of(Statuspemenang::all())
        ->addColumn('action', function ($row){
            
            $action = \Form::open(['url'=>'status-pemenang/'.$row->id,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Hapus</button>";
            $action .= \Form::Close();

            return $action; })
        ->make(true);

    }
    public function index()
    {
        // $data['vendor_voyage'] = Vendorvoyage::pluck('nama_vendor','id_vendor');
        $data['statuspemenang'] = Statuspemenang::all();
        return view('statuspemenang.index',$data);
    }

    public function create()
    {
        return view('statuspemenang.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'status_pemenang' => 'required|min:2',
        //     'kontrak'     =>'required',
        //     'tgl_kontrak'=>'required',
        //     'mulai'=>'required',
        //     'akhir'=>'required',
        // ]);

        $statuspemenang =  New Statuspemenang();
        $statuspemenang->create($request -> all());
        return redirect("status-pemenang") ->with('status','Data Jalur Voyage Berhasil disimpan');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statuspemenang = Statuspemenang::where('id','=',$id);
        $statuspemenang->delete();
        return redirect("/status-pemenang");
    }
}
