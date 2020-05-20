@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-header">
                    Listado de Menu
                    <a class="float-right" href="{{ route('menus.create') }}">
                        Agregar Opción de Menu
                    </a>
                </div>

            <div class="card">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Padre</th>
                            <th scope="col">Orden</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>@foreach ($menues as $s)
                        <tr>
                            <th>{{ $s['name'] }}</th>
                            <th>{{ $s['slug'] }}</th>
                            <th>{{ $s['parent'] }}</th>
                            <th>{{ $s['order'] }}</th>
                            <th>
                                @if ($s['enabled'] == 1)
                                    Activo
                                @else
                                    Inactivo
                                @endif
                            </th>
                            <th>
                                <a href="{{ route('admin.menus.destroy', $s['id']) }}" class="btn btn-warning" onclick="return confirm('¿Seguro que desea eliminar este registro?')">
                                    X
                                </a>
                                <a href="{{ route('menus.edit', $s['id']) }}" class="btn btn-danger">
                                    Editar
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $menues->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
