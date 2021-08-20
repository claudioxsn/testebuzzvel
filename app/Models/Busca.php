<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Busca extends Model
{
    use HasFactory;

    //efetua a busca do local fornecido na API MapQuest
    public function buscarLocal($local)
    {
        try {
            return Http::post(
                env('MAP_REQUEST_DIRECTION') . env('MAP_REQUEST_API_KEY') . "&location=" . $local,
            )['results'][0];
        } catch (Exception $e) {
            return $e;
        }
    }

    //formula para efetuar o calculo da distancia
    function distancia($lat1, $lon1, $lat2, $lon2)
    {
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);
        $dist = (6371 * acos(cos($lat1) * cos($lat2) * cos($lon2 - $lon1) + sin($lat1) * sin($lat2)));
        $dist = number_format($dist, 2, '.', '');
        return $dist;
    }

    //cria uma coleção com todas os dados da api buzzvell com seus valores prontos para serem utilizados na view
    public function calcularDistancia($arr, $pesquisa)
    {
        $lista = collect();
        for ($i = 0; $i < count($arr); $i++) {
            $distancia = $this->distancia(floatval($arr[$i]['latitude']), floatval($arr[$i]['longitude']), floatval($pesquisa['locations'][0]['latLng']['lat']), floatval($pesquisa['locations'][0]['latLng']['lng']));
            $lista->push([
                'hotel' => $arr[$i]['hotel'],
                'distancia' => $distancia,
                'valor' => $arr[$i]['valor'],
            ]);
        }
        return $lista;
    }
}
