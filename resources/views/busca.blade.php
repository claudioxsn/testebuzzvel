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
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
            </div>
        </div>
    </div>

@endsection
