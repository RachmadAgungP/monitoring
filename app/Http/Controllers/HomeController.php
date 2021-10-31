<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

include(app_path().'/Http/Controllers/charters_filter.php');


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['jasavoyagecharter'] = \DB::table('jasavoyagecharter')
                                        ->join('jalur_voyage','jalur_voyage.kode_rute','=','jasavoyagecharter.kode_rutes')
                                        // ->join('vendor_voyage','nama_vendor','=','jasavoyagecharter.pemegang_kontrak')
                                        ->get();

        $data['jasatimecharter'] = \DB::table('jasatimecharter')
                                        ->join('angkutan_time','angkutan_time.nama_angkutan','=','jasatimecharter.nama_angkutan')
                                        // ->join('kelas_kapasitas_time','id_kelas_kapasitas','=','jasatimecharter.id_kelas_kapasitas')
                                        // ->join('vendor_time','nama_vendor','=','jasatimecharter.nama_vendor')
                                        ->get();

        $data_voyage1 = data_filter($data['jasavoyagecharter'], '1');
        $data_voyage2 = data_filter($data['jasavoyagecharter'], '2');
        $data_voyage3 = data_filter($data['jasavoyagecharter'], '3');
        $data_voyage4 = data_filter($data['jasavoyagecharter'], '4');
        $data_voyage5 = data_filter($data['jasavoyagecharter'], '5');

        $data_time1 = data_filter($data['jasatimecharter'], '1');
        $data_time2 = data_filter($data['jasatimecharter'], '2');
        $data_time3 = data_filter($data['jasatimecharter'], '3');
        $data_time4 = data_filter($data['jasatimecharter'], '4');
        $data_time5 = data_filter($data['jasatimecharter'], '5');

        $data = array(
            'len_data_voyage1' => count($data_voyage1),
            'len_data_voyage2' => count($data_voyage2),
            'len_data_voyage3' => count($data_voyage3),
            'len_data_voyage4' => count($data_voyage4),
            'len_data_voyage5' => count($data_voyage5),
            
            'len_data_time1' => count($data_time1),
            'len_data_time2' => count($data_time2),
            'len_data_time3' => count($data_time3),
            'len_data_time4' => count($data_time4),
            'len_data_time5' => count($data_time5),
        );
        

        return view('home', $data);
    }
}
