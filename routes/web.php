<?php

use App\Models\Busca;
use App\Models\Hotel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::post('/', 'App\Http\Controllers\BuscaController@buscarHoteis')->name('hoteis.find');


Route::get('/', function () {

    return view('busca');
    //$busca = new Busca(); 
     //print_r($busca->buscarPorLatLong());


  /*  $local = [
        'locations' => [
            "Presidente Prudente, SP, Brazil",
            "Caiuá, SP, Brazil"
        ],
        'options' => [
            "avoids" => [],
            "avoidTimedConditions" => false,
            "doReverseGeocode" => true,
            "shapeFormat" => "raw",
            "generalize" => 0,
            "routeType" => "fastest",
            "timeType" => 1,
            "locale" => "en_US",
            "unit" => "m",
            "enhancedNarrative" => false,
            "drivingStyle" => 2,
            "highwayEfficiency" => 21.0
        ]
    ];
    //  print_r(json_encode($local));
    $resposta = json_encode(Http::post(
        "http://www.mapquestapi.com/directions/v2/route?key=CbqVWWFAC9gPKIWqAA3PACvboEEIKTNO",
        $local
    )['route'], JSON_UNESCAPED_UNICODE);

    echo $resposta;*/

   // echo env('MAP_REQUEST') . "". env('MAP_REQUEST_API_KEY');


  // $hoteis = new Hotel(); 
 //  $arr =  $hoteis->convertToArray($hoteis->listarHoteis()['message']);
 //  $arr->sortByDesc('valor')->each(function($hotel)
//{ print_r($hotel); });
});
