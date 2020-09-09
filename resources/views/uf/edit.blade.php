@extends('layouts.app')
@section('content')
<h1>Edit a product</h1>
<form action="{{route('uf.update', ['uf' => $uf->id])}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row col-md-6">
        <label>Valor</label>
        <input class="form-control" type="number" min="1" name="value" value="{{ old('value') ??  $uf->value }}" required>
    </div>
    <div class="form-row col-md-6">
        <label>Fecha</label>
        <input class="form-control" type="date" max="{{ date("Y-m-d") }}" name="date_check" value="{{ old('date_check') ?? $uf->date_check }}" required>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Editar Registro</button>
    </div>
</form>
@endsection