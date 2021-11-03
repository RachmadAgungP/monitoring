<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jasa-voyage-charter/json', 'JasavoyagecharterController@json');
Route::get('/jalur-voyage/json', 'JalurvoyageController@json');
Route::get('/vendor-voyage/json', 'VendorvoyageController@json');
Route::get('/status-pemenang/json', 'StatusPemenangController@json');

Route::post('/import-jasa-voyage-charter','JasavoyagecharterController@importDataJasavoyageCharter')->name('importdatavoyagecharter');
Route::post('/import-jalur-voyage','JalurvoyageController@importDataJalurvoyage')->name('importdatajalurvoyage');
Route::post('/import-vendor-voyage','VendorvoyageController@importDataVendorvoyage')->name('importdatavendorvoyage');

Route::resource('/jasa-voyage-charter', 'JasavoyagecharterController');
Route::resource('/jalur-voyage', 'JalurvoyageController');
Route::resource('/vendor-voyage', 'VendorvoyageController');
Route::resource('/status-pemenang', 'StatusPemenangController');

// jasa Time charter
Route::post('/import-jasa-time-charter','JasatimecharterController@importDataJasatimeCharter')->name('importdatatimecharter');
Route::post('/import-angkutan-time','AngkutantimeController@importDataAngkutantime')->name('importdataangkutantime');
Route::post('/import-vendor-time','VendortimeController@importDataVendortime')->name('importdatavendortime');
Route::post('/import-kelaskapasitas-time','KelaskapasitastimeController@importDataKelaskapasitastime')->name('importdatakelaskapasitastime');

Route::get('/jasa-time-charter/json', 'JasatimecharterController@json');
Route::get('/angkutan-time/json', 'AngkutantimeController@json');
Route::get('/vendor-time/json', 'VendortimeController@json');
Route::get('/kelaskapasitas-time/json', 'KelaskapasitastimeController@json');

Route::resource('/jasa-time-charter', 'JasatimecharterController');
Route::resource('/angkutan-time', 'AngkutantimeController');
Route::resource('/vendor-time', 'VendortimeController');
Route::resource('/kelaskapasitas-time', 'KelasKapasitastimeController');

// jasa Container
Route::post('/import-jasa-container','JasacontainerController@importDataJasacontainer')->name('importdatacontainer');
Route::post('/import-jalur-container','JalurcontainerController@importDataJalurcontainer')->name('importdatajalurcontainer');
Route::post('/import-vendor-container','VendorcontainerController@importDataVendorcontainer')->name('importdatavendorcontainer');

Route::get('/jasa-container/json', 'JasacontainerController@json');
Route::get('/jalur-container/json', 'JalurcontainerController@json');
Route::get('/vendor-container/json', 'VendorcontainerController@json');

Route::resource('/jasa-container', 'JasacontainerController');
Route::resource('/jalur-container', 'JalurcontainerController');
Route::resource('/vendor-container', 'VendorcontainerController');

// jasa General Cargo
Route::post('/import-jasa-general-cargo','JasageneralcargoController@importDataJasageneralcargo')->name('importdatageneralcargo');
Route::post('/import-jalur_general-cargo','JalurgeneralcargoController@importDataJalurgeneralcargo')->name('importdatajalurgeneralcargo');
Route::post('/import-vendor-general-cargo', 'VendorgeneralcargoController@importDataVendorgeneralcargo')->name('importdatavendorgeneralcargo');

Route::get('/jasa-general-cargo/json', 'JasageneralcargoController@json');
Route::get('/jalur-general-cargo/json','JalurgeneralcargoController@json');
Route::get('/vendor-general-cargo/json', 'VendorgeneralcargoController@json');

Route::resource('/jasa-general-cargo', 'JasageneralcargoController');
Route::resource('/jalur-general-cargo', 'JalurgeneralcargoController');
Route::resource('/vendor-general-cargo', 'VendorgeneralcargoController');

// JASA KAPAL LAYAR MOTOR
Route::post('/import-jasa-kapal-layar','JasakapallayarController@importDataJasakapallayar')->name('importdatakapallayar');
Route::post('/import-jalur-kapal-layar','JalurkapallayarController@importDataJalurkapallayar')->name('importdatajalurkapallayar');
Route::post('/import-vendor-kapal-layar', 'VendorkapallayarController@importDataVendorkapallayar')->name('importdatavendorkapallayar');

Route::get('/jasa-kapal-layar/json', 'JasakapallayarController@json');
Route::get('/jalur-kapal-layar/json','JalurkapallayarController@json');
Route::get('/vendor-kapal-layar/json', 'VendorkapallayarController@json');

Route::resource('/jasa-kapal-layar', 'JasakapallayarController');
Route::resource('/jalur-kapal-layar', 'JalurkapallayarController');
Route::resource('/vendor-kapal-layar', 'VendorkapallayarController');


// JASA GUDANG PKG
Route::post('/import-gudang-pkg','GudangPKGController@importDataGudangPKG')->name('importDataGudangPKG');
Route::post('/import-provinsi','ProvinsiController@importDataProvinsi')->name('importDataprovinsi');

Route::get('/gudang-pkg/json', 'GudangPKGController@json');
Route::get('/provinsi/json', 'ProvinsiController@json');

Route::resource('/gudang-pkg', 'GudangPKGController');
Route::resource('/provinsi', 'ProvinsiController');

// JASA GUDANG PETRORGANIK
Route::post('/import-gudang-petroganik','GudangpetroganikController@importdatagudangpetroganik')->name('importDataGudangpetroganik');
Route::get('/gudang-petroganik/json', 'GudangpetroganikController@json');
Route::resource('/gudang-petroganik', 'GudangpetroganikController');

// Rekap Alih Stock
Route::post('/import-rekap-alih-stok','RekapalihstokController@importDataRekapalihstok')->name('importdataRekapalihstok');
Route::post('/import-jalur-alihstok','JaluralihstokController@importDataJalurRekapalihstok')->name('importdatajaluralihstok');
Route::post('/import-vendor-alihstok', 'VendoralihstokController@importDataVendoralihstok')->name('importdatavendoralihstok');

Route::get('/rekap-alih-stok/json', 'RekapalihstokController@json');
Route::get('/jalur-alihstok/categoryasalgudang/{category_id}', 'JaluralihstokController@getgudang');
Route::get('/jalur-alihstok/categorytujuangudang/{category_id}', 'JaluralihstokController@getgudang');
// ------------------------> 
Route::get('/jalur-alihstok/json','JaluralihstokController@json');
Route::get('/vendor-alihstok/json', 'VendoralihstokController@json');

Route::resource('/rekap-alih-stok', 'RekapalihstokController');
Route::resource('/jalur-alihstok', 'JaluralihstokController');
Route::resource('/vendor-alihstok', 'VendoralihstokController');

// Rekap Tarip Franco
Route::post('/-import-rekap-tarip-franco','RekaptaripfrancoController@importDataRekaptaripfranco')->name('importdataRekaptaripfranco');
Route::post('/import-jalur-taripfranco','JalurtaripfrancoController@importDataJalurRekaptaripfranco')->name('importdatajalurtaripfranco');
Route::post('/import-vendor-taripfranco', 'VendortaripfrancoController@importDataVendortaripfranco')->name('importdatavendortaripfranco');

Route::get('/rekap-tarip-franco/json', 'RekaptaripfrancoController@json');
Route::get('/jalur-taripfranco/categoryasalgudang/{category_id}', 'JalurtaripfrancoController@getgudang');
Route::get('/jalur-taripfranco/categorytujuangudang/{category_id}', 'JalurtaripfrancoController@getgudang');
// ------------------------> 
Route::get('/jalur-taripfranco/json','JalurtaripfrancoController@json');
Route::get('/vendor-taripfranco/json', 'VendortaripfrancoController@json');

Route::resource('/rekap-tarip-franco', 'RekaptaripfrancoController');
Route::resource('/jalur-taripfranco', 'JalurtaripfrancoController');
Route::resource('/vendor-taripfranco', 'VendortaripfrancoController');

// Kabupaten
Route::post('/import-kabupaten','KabupatenController@importDataKabupaten')->name('importDataKabupaten');
Route::get('/kabupaten/json', 'KabupatenController@json');
Route::resource('/kabupaten', 'KabupatenController');

// JASA GUDANG PENYANGGA
Route::post('/import-gudang-penyangga','GudangPenyanggaController@importDataGudangpenyangga')->name('importDataGudangpenyangga');

Route::get('/gudang-penyangga/json', 'GudangPenyanggaController@json');

Route::resource('/gudang-penyangga', 'GudangPenyanggaController');

// Jasa In Bag
Route::post('/import-jasa-ppmemkl-inbag', 'JasaPpmEmklInBAGController@importDataJasainbag')->name('importDataJasainbag');
Route::post('/import-vendor-Inbag', 'Vendor_InBAGController@importDataVendor_inbag')->name('importDataVendor_inbag');

Route::get('/jasa-ppmemkl-inbag/json','JasaPpmEmklInBAGController@json');
Route::get('/vendor-Inbag/json', 'Vendor_InBAGController@json');

Route::resource('/jasa-ppmemkl-inbag','JasaPpmEmklInBAGController');
Route::resource('/vendor-Inbag', 'Vendor_InBAGController');

// Jasa In Curah
Route::post('/import-jasa-ppmemkl-curah', 'JasaPpmEmklCurahController@importDataJasacurah')->name('importDataJasacurah');
Route::post('/import-vendor-Curah', 'Vendor_CurahController@importDataVendor_curah')->name('importDataVendor_curah');

Route::get('/jasa-ppmemkl-curah/json','JasaPpmEmklCurahController@json');
Route::get('/vendor-Curah/json', 'Vendor_CurahController@json');

Route::resource('/jasa-ppmemkl-curah','JasaPpmEmklCurahController');
Route::resource('/vendor-Curah', 'Vendor_CurahController');