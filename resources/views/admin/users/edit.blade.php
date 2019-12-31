@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Usuarios
                <small class="text-muted text-md">Edicion</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
@include('partials.show_messages')

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Datos Personales</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update',$user->id) }}">
                    @csrf
                    @method('PUT')
             
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name',$user->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email',$user->email) }}" class="form-control">
                    </div>
                  
                    <button class="btn btn-primary btn-block">Actualizar Usuario</button>
            
                </form>
                {{-- <h3>Lista de Departamentos</h3> --}}
                {{-- <div class="form-group">
                    <ul class="list-unstyled">
                        @foreach ($departments as $department)
                        <li>
                            <label>
                                {{ Form::checkbox('departments[]',$department->id,null) }}
                                {{ $department->name }}
                                <em>({{ $department->display_name ?? 'N/A'}})</em>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Lista de Roles</h3>
                <div class="form-group">
                    <ul class="list-unstyled">
                        @foreach ($roles as $role)
                        <li>
                            <label>
                                {{ Form::checkbox('roles[]',$role->id,null) }}
                                {{ $role->name }}
                                <em>({{ $role->description ?? 'N/A'}})</em>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    {{ form::submit('Guardar Usuario',['class'=>'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
{!! Form::close() !!}
@endsection