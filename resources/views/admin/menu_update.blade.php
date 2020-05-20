@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edición de Elemento del Menu</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('menus.update', $mn['id']) }}">
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $mn->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">Slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $mn->slug }}" required autocomplete="slug">

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parent" class="col-md-4 col-form-label text-md-right">Padre</label>

                            <div class="col-md-6">

                                <select name="parent" id="parent" class="form-control @error('parent') is-invalid @enderror">
                                    <option value="0">Padre</option>
                                    @foreach ($menues as $s)
                                        @if ($s['id'] == $mn['parent'])
                                            <option selected value="{{ $s['id'] }}">{{ $s['name'] }}</option>
                                        @else
                                            <option value="{{ $s['id'] }}">{{ $s['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('parent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="orden" class="col-md-4 col-form-label text-md-right">Orden</label>

                                <div class="col-md-6">
                                    <input id="orden" type="text" class="form-control @error('orden') is-invalid @enderror" name="orden" value="{{ $mn->order }}" required autocomplete="orden">

                                    @error('orden')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="enabled" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">

                                <select name="enabled" id="enabled" class="form-control @error('enabled') is-invalid @enderror">
                                    @if ($mn['enabled'] == 1)
                                        <option selected value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    @elseif ($mn['enabled'] == 0)
                                        <option value="1">Activo</option>
                                        <option selected value="0">Inactivo</option>
                                    @endif
                                </select>

                                @error('enabled')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar Elemento del Menu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
