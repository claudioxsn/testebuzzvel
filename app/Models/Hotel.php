<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Hotel extends Model
{
    use HasFactory;

    //captura os valores da api buzzvell
    public function listarHoteis()
    {
        try {
            return Http::get('https://buzzvel-interviews.s3.eu-west-1.amazonaws.com/hotels.json');
        } catch (Exception $e) {
            return $e;
        }
    }

    // função criada apenas para estruturar o array e não ficar trabalhando com o nível dos índices retornados pela api
    public function convertHotelsToArray($arr)
    {
        $collection = collect();
        for ($i = 0; $i < count($arr); $i++) {
            $collection->push([
                'hotel' => $arr[$i][0],
                'latitude' => $arr[$i][1],
                'longitude' => $arr[$i][2],
                'valor' => $arr[$i][3],
            ]);
            $i++;
        }
        return $collection;
    }


}
