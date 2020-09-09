@extends('layouts.app')
@section('content')
    <a class="btn btn-success mb-3"  href="{{route('uf.create')}}">Ingresar UF</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ufs as $ufdata)
                    <tr>
                        <td>{{ $ufdata->id}}</td>
                        <td>${{ number_format($ufdata->value)}}</td>
                        <td>{{ $ufdata->date_check}}</td>
                        <th>
                            <a  class="btn btn-link" href="{{ route('uf.show',['uf' => $ufdata->id ]) }}">Mostrar</a>
                            <a  class="btn btn-link" href="{{ route('uf.edit',['uf' => $ufdata->id ]) }}">Editar</a>
                            <form class="d-inline" action="{{ route('uf.destroy',['uf' => $ufdata->id ])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Eliminar</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection