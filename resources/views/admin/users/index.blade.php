@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Usuarios</h4>
                    @can('admin.users.create')
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Crear Usuario
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    @can('admin.users.show')
                                    <a href="{{ route('admin.users.show',$user->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Ver</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.users.edit')
                                    <a href="{{ route('admin.users.edit',$user->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Editar</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.users.destroy')
                                    {!! Form::open(['route'=>['admin.users.destroy',$user->id],'method'=>'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection