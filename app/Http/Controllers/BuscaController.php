<?php

namespace App\Http\Controllers;

use App\Models\Busca;
use App\Models\Hotel;
use Illuminate\Http\Request;

class BuscaController extends Controller
{
    public function buscarHoteis(Request $request)
    {
        $hoteis = new Hotel();
        $busca = new Busca();

        //é feito uma busca por cidade, endereço, país
        $pesquisa = $busca->buscarLocal($request->input('pesquisa'));

        // é feito a busca dos hotéis
        $arr =  $hoteis->convertHotelsToArray($hoteis->listarHoteis()['message']);

        //chama a função que efetua o calculo de distancia e retorna ordenado por preço ou por distancia
        if ($request->input('ordenacao') == '0') {
            $lista = $busca->calcularDistancia($arr, $pesquisa)->sortByDesc('valor');
        } else if ($request->input('ordenacao') == '1') {
            $lista = $busca->calcularDistancia($arr, $pesquisa)->sortBy('valor');
        } else if ($request->input('ordenacao') == '2') {
            $lista = $busca->calcularDistancia($arr, $pesquisa)->sortByDesc('distancia');
        } else if ($request->input('ordenacao') == '3') {
            $lista = $busca->calcularDistancia($arr, $pesquisa)->sortBy('distancia');
        }

        //  dd($lista);
        // retorna a view de pesquisa
        return view('listar', compact('pesquisa'), compact('lista'));
    }
}
