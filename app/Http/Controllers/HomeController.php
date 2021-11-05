<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

include(app_path() . '/Http/Controllers/charters_filter.php');


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
            ->join('jalur_voyage', 'jalur_voyage.kode_rute', '=', 'jasavoyagecharter.kode_rutes')
            ->get();

        $data['jasatimecharter'] = \DB::table('jasatimecharter')
            ->join('angkutan_time', 'angkutan_time.nama_angkutan', '=', 'jasatimecharter.nama_angkutan')
            ->get();

        $data['jasacontainer'] = \DB::table('jasacontainer')
            ->join('jalur_container', 'jalur_container.kode_rute', '=', 'jasacontainer.kode_rutes')
            ->get();

        $data['jasageneralcargo'] = \DB::table('jasageneralcargo')
            ->join('jalur_generalcargo', 'jalur_generalcargo.kode_rute', '=', 'jasageneralcargo.kode_rutes')
            ->get();

        $data['jasakapallayar'] = \DB::table('jasakapallayar')
            ->join('jalur_kapallayar', 'jalur_kapallayar.kode_rute', '=', 'jasakapallayar.kode_rutes')
            ->get();

        $data['gudangpkg'] = \DB::table('gudang_pkg')
            ->get();

        $data['rekapalihstok'] = \DB::table('rekapalihstok')
            ->join('Jalur_alihstok', 'Jalur_alihstok.kode_rute', '=', 'rekapalihstok.kode_rutes')
            ->get();
            
        $data['rekaptaripfranco'] = \DB::table('rekaptaripfranco')
        ->join('Jalur_taripfranco', 'Jalur_taripfranco.kode_rute', '=', 'rekaptaripfranco.kode_rutes')    
        ->get();

        $data['jasa_ppmemkl_inbag'] = \DB::table('jasa_ppmemkl_inbag')
        ->get();

        $data['jasa_ppmemkl_curah'] = \DB::table('jasa_ppmemkl_curah')
        ->get();

        $data_voyage1 = data_filter($data['jasavoyagecharter'], '1');
        $data_voyage2 = data_filter($data['jasavoyagecharter'], '2');
        $data_voyage3 = data_filter($data['jasavoyagecharter'], '3');
        $data_voyage4 = data_filter($data['jasavoyagecharter'], '4');
        $data_voyage5 = data_filter($data['jasavoyagecharter'], '5');
        $data_voyage6 = data_filter($data['jasavoyagecharter'], '6');

        $data_time1 = data_filter($data['jasatimecharter'], '1');
        $data_time2 = data_filter($data['jasatimecharter'], '2');
        $data_time3 = data_filter($data['jasatimecharter'], '3');
        $data_time4 = data_filter($data['jasatimecharter'], '4');
        $data_time5 = data_filter($data['jasatimecharter'], '5');
        $data_time6 = data_filter($data['jasatimecharter'], '6');

        $data_container1 = data_filter($data['jasacontainer'], '1');
        $data_container2 = data_filter($data['jasacontainer'], '2');
        $data_container3 = data_filter($data['jasacontainer'], '3');
        $data_container4 = data_filter($data['jasacontainer'], '4');
        $data_container5 = data_filter($data['jasacontainer'], '5');
        $data_container6 = data_filter($data['jasacontainer'], '6');

        $data_cargo1 = data_filter($data['jasageneralcargo'], '1');
        $data_cargo2 = data_filter($data['jasageneralcargo'], '2');
        $data_cargo3 = data_filter($data['jasageneralcargo'], '3');
        $data_cargo4 = data_filter($data['jasageneralcargo'], '4');
        $data_cargo5 = data_filter($data['jasageneralcargo'], '5');
        $data_cargo6 = data_filter($data['jasageneralcargo'], '6');

        $data_kapallayar1 = data_filter($data['jasakapallayar'], '1');
        $data_kapallayar2 = data_filter($data['jasakapallayar'], '2');
        $data_kapallayar3 = data_filter($data['jasakapallayar'], '3');
        $data_kapallayar4 = data_filter($data['jasakapallayar'], '4');
        $data_kapallayar5 = data_filter($data['jasakapallayar'], '5');
        $data_kapallayar6 = data_filter($data['jasakapallayar'], '6');

        $data_gudangpkg1 = data_filter($data['gudangpkg'], '1');
        $data_gudangpkg2 = data_filter($data['gudangpkg'], '2');
        $data_gudangpkg3 = data_filter($data['gudangpkg'], '3');
        $data_gudangpkg4 = data_filter($data['gudangpkg'], '4');
        $data_gudangpkg5 = data_filter($data['gudangpkg'], '5');
        $data_gudangpkg6 = data_filter($data['gudangpkg'], '6');

        $data_rekapalihstok1 = data_filter($data['rekapalihstok'], '1');
        $data_rekapalihstok2 = data_filter($data['rekapalihstok'], '2');
        $data_rekapalihstok3 = data_filter($data['rekapalihstok'], '3');
        $data_rekapalihstok4 = data_filter($data['rekapalihstok'], '4');
        $data_rekapalihstok5 = data_filter($data['rekapalihstok'], '5');
        $data_rekapalihstok6 = data_filter($data['rekapalihstok'], '6');
        
        $data_rekaptaripfranco1 = data_filter($data['rekaptaripfranco'], '1');
        $data_rekaptaripfranco2 = data_filter($data['rekaptaripfranco'], '2');
        $data_rekaptaripfranco3 = data_filter($data['rekaptaripfranco'], '3');
        $data_rekaptaripfranco4 = data_filter($data['rekaptaripfranco'], '4');
        $data_rekaptaripfranco5 = data_filter($data['rekaptaripfranco'], '5');
        $data_rekaptaripfranco6 = data_filter($data['rekaptaripfranco'], '6');

        $data_jasa_ppmemkl_inbag1 = data_filter($data['jasa_ppmemkl_inbag'], '1');
        $data_jasa_ppmemkl_inbag2 = data_filter($data['jasa_ppmemkl_inbag'], '2');
        $data_jasa_ppmemkl_inbag3 = data_filter($data['jasa_ppmemkl_inbag'], '3');
        $data_jasa_ppmemkl_inbag4 = data_filter($data['jasa_ppmemkl_inbag'], '4');
        $data_jasa_ppmemkl_inbag5 = data_filter($data['jasa_ppmemkl_inbag'], '5');
        $data_jasa_ppmemkl_inbag6 = data_filter($data['jasa_ppmemkl_inbag'], '6');

        $data_jasa_ppmemkl_curah1 = data_filter($data['jasa_ppmemkl_curah'], '1');
        $data_jasa_ppmemkl_curah2 = data_filter($data['jasa_ppmemkl_curah'], '2');
        $data_jasa_ppmemkl_curah3 = data_filter($data['jasa_ppmemkl_curah'], '3');
        $data_jasa_ppmemkl_curah4 = data_filter($data['jasa_ppmemkl_curah'], '4');
        $data_jasa_ppmemkl_curah5 = data_filter($data['jasa_ppmemkl_curah'], '5');
        $data_jasa_ppmemkl_curah6 = data_filter($data['jasa_ppmemkl_curah'], '6');
    
        $data = array(
            'len_data_voyage1' => count($data_voyage1),
            'len_data_voyage2' => count($data_voyage2),
            'len_data_voyage3' => count($data_voyage3),
            'len_data_voyage4' => count($data_voyage4),
            'len_data_voyage5' => count($data_voyage5),
            'len_data_voyage6' => count($data_voyage6),

            'len_data_time1' => count($data_time1),
            'len_data_time2' => count($data_time2),
            'len_data_time3' => count($data_time3),
            'len_data_time4' => count($data_time4),
            'len_data_time5' => count($data_time5),
            'len_data_time6' => count($data_time6),

            'len_data_container1' => count($data_container1),
            'len_data_container2' => count($data_container2),
            'len_data_container3' => count($data_container3),
            'len_data_container4' => count($data_container4),
            'len_data_container5' => count($data_container5),
            'len_data_container6' => count($data_container6),

            'len_data_cargo1' => count($data_cargo1),
            'len_data_cargo2' => count($data_cargo2),
            'len_data_cargo3' => count($data_cargo3),
            'len_data_cargo4' => count($data_cargo4),
            'len_data_cargo5' => count($data_cargo5),
            'len_data_cargo6' => count($data_cargo6),

            'len_data_kapallayar1' => count($data_kapallayar1),
            'len_data_kapallayar2' => count($data_kapallayar2),
            'len_data_kapallayar3' => count($data_kapallayar3),
            'len_data_kapallayar4' => count($data_kapallayar4),
            'len_data_kapallayar5' => count($data_kapallayar5),
            'len_data_kapallayar6' => count($data_kapallayar6),

            'len_data_gudangpkg1' => count($data_gudangpkg1),
            'len_data_gudangpkg2' => count($data_gudangpkg2),
            'len_data_gudangpkg3' => count($data_gudangpkg3),
            'len_data_gudangpkg4' => count($data_gudangpkg4),
            'len_data_gudangpkg5' => count($data_gudangpkg5),
            'len_data_gudangpkg6' => count($data_gudangpkg6),

            'len_data_rekapalihstok1' => count($data_rekapalihstok1),
            'len_data_rekapalihstok2' => count($data_rekapalihstok2),
            'len_data_rekapalihstok3' => count($data_rekapalihstok3),
            'len_data_rekapalihstok4' => count($data_rekapalihstok4),
            'len_data_rekapalihstok5' => count($data_rekapalihstok5),
            'len_data_rekapalihstok6' => count($data_rekapalihstok6),

            'len_data_rekaptaripfranco1' => count($data_rekaptaripfranco1),
            'len_data_rekaptaripfranco2' => count($data_rekaptaripfranco2),
            'len_data_rekaptaripfranco3' => count($data_rekaptaripfranco3),
            'len_data_rekaptaripfranco4' => count($data_rekaptaripfranco4),
            'len_data_rekaptaripfranco5' => count($data_rekaptaripfranco5),
            'len_data_rekaptaripfranco6' => count($data_rekaptaripfranco6),

            'len_data_jasa_ppmemkl_inbag1' => count($data_jasa_ppmemkl_inbag1),
            'len_data_jasa_ppmemkl_inbag2' => count($data_jasa_ppmemkl_inbag2),
            'len_data_jasa_ppmemkl_inbag3' => count($data_jasa_ppmemkl_inbag3),
            'len_data_jasa_ppmemkl_inbag4' => count($data_jasa_ppmemkl_inbag4),
            'len_data_jasa_ppmemkl_inbag5' => count($data_jasa_ppmemkl_inbag5),
            'len_data_jasa_ppmemkl_inbag6' => count($data_jasa_ppmemkl_inbag6),

            'len_data_jasa_ppmemkl_curah1' => count($data_jasa_ppmemkl_curah1),
            'len_data_jasa_ppmemkl_curah2' => count($data_jasa_ppmemkl_curah2),
            'len_data_jasa_ppmemkl_curah3' => count($data_jasa_ppmemkl_curah3),
            'len_data_jasa_ppmemkl_curah4' => count($data_jasa_ppmemkl_curah4),
            'len_data_jasa_ppmemkl_curah5' => count($data_jasa_ppmemkl_curah5),
            'len_data_jasa_ppmemkl_curah6' => count($data_jasa_ppmemkl_curah6),

        );


        return view('home', $data);
    }
}
