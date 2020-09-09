@extends('layouts.app')
@section('content')
    <script src="{{ asset('js/index.js') }}"></script>
    <div class="title m-b-md">
        Tarea Indicadores
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="indicador">Seleccionar Indicador</label>
            <select name="indicador" class="form-control" id="indicador">
            </select>
        </div>
        <div class="col-md-4">
            <label for="desde">Desde</label>
            <input type="date" class="form-control" name="desde" value="{{ date("Y-m-d") }}" max="{{ date("Y-m-d") }}"   id="desde">
        </div>
        <div class="col-md-4">
            <label for="hasta">Hasta</label>
            <input type="date" class="form-control" name="hasta" value="{{ date("Y-m-d") }}" max="{{ date("Y-m-d") }}" id="hasta">
        </div>
    </div>
    <br>
    <center><button onclick="load_graphic();" class="btn btn-primary">Cargar Info</button></center>
    <br><br>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
@endsection