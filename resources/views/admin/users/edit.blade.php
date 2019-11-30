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
{!! Form::model($user,['route'=>['admin.users.update',$user->id],'method'=>'PUT']) !!}
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('name','Nombre', array('class' => 'font-weight-bolder')) }}
                    {{ Form::text('name',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name','Email', array('class' => 'font-weight-bolder')) }}
                    {{ Form::email('email',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name','Password', array('class' => 'font-weight-bolder')) }}
                    {{ Form::password('password',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name','Password', array('class' => 'font-weight-bolder')) }}
                    {{ Form::password('password',['class'=>'form-control']) }}
                </div>
                <h3>Lista de Departamentos</h3>
                <div class="form-group">
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
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
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
    </div>
</div>
{!! Form::close() !!}
@endsection