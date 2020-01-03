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

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Datos Personales</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name',$user->name) }}"
                            class="form-control  @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email',$user->email) }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Contrasena:</label>
                        <input name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Contrasena">
                        <span class="text-muted">Dejar en blanco si no se quiere cambiar la contrasena</span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Repita la contrasena:</label>
                        <input name="password_confirmation" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Repite la contrasena">

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar Usuario</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Roles</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.roles.update',$user) }}">
                    @csrf
                    @method('PUT')

                    <ul class="list-unstyled">
                        @foreach ($roles as $id => $name)
                        <li>
                            <label>
                                <input name="roles[]" type="checkbox" value="{{ $id }}"
                                    {{ $user->roles->contains($id)? 'checked':'' }}>
                                {{ $name }}
                            </label>
                        </li>
                        @endforeach
                    </ul>

                    <button class="btn btn-primary btn-block">Actualizar roles</button>
                </form>
            </div>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3>Permisos</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.permissions.update',$user) }}">
                    @csrf
                    @method('PUT')

                    <ul class="list-unstyled">
                        @foreach ($permissions as $id => $name)
                        <li>
                            <label>
                                <input name="permissions[]" type="checkbox" value="{{ $id }}"
                                    {{ $user->permissions->contains($id)? 'checked':'' }}>
                                {{ $name }}
                            </label>
                        </li>
                        @endforeach
                    </ul>

                    <button class="btn btn-primary btn-block">Actualizar permisos</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection