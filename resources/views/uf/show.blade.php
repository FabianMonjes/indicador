@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">UF</h5>
        <p class="card-text"><strong>${{number_format($uf->value)}}</strong></p>
        <p class="card-text"><strong>{{$uf->date_check}}</strong></p>
    </div>
</div>
@endsection