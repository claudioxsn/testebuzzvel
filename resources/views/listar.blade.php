@extends('template.template')

@section('corpo')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ route('hoteis.find') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Pesquisar" name="pesquisa" required
                                        aria-label="Pesquisar" aria-describedby="button-addon2">
                                    <button type="submit" class="btn btn-outline-secondary" type="button"
                                        id="button-addon2">Pesquisar</button>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="ordenacao" id="ordenacao" class="custom-select">
                                        <option value="2">Distância - Maior > Menor</option>
                                        <option selected value="3">Distancia - Menor > Maior</option>
                                        <option value="0">Valor - Maior > Menor</option>
                                        <option value="1">Valor - Menor > Maior</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- DATA TABLE -->
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-hover table-data2">
                        <thead>
                            <tr class="bg-white">
                                <th class="w-25 p-3">Hotel</th>
                                <th class="w-10 p-3">Distancia</th>
                                <th class="w-20 p-3">Valor (EUR)</th>
                            </tr>
                            <tr class="spacer"></tr>
                        </thead>
                        <tbody>

                            @if (is_null($lista)){
                                <tr class="tr-shadow">
                                    <td class="w-5 p-3">
                                        <p>Não há usuários cadastrados</p>
                                    </td>
                                </tr>
                                }
                            @endif

                            @foreach ($lista as $l)
                                <tr class="tr-shadow">
                                    <td class="w-25 p-3">{{ $l['hotel'] }}</td>
                                    <td class="w-10 p-3">{{ $l['distancia'] . ' Km' }}</td>
                                    <td class="w-10 p-3">{{ $l['valor'] . ' EUR' }}</td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
            </div>
        </div>
    </div>

@endsection
