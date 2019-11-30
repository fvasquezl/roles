@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Roles
                <small class="text-muted text-md">Administracion</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 my-3">
        <div class="card mb-4 shadow-sm card-outline card-primary">
            <div class="card-header ">
                <h3 class="card-title mt-1">
                    Listado de roles
                </h3>
                <div class="card-tools">
                    @can('admin.roles.create')
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i>
                        Crear Rol
                    </button>
                    @endcan
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover" id="rolesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            <th>Descripcion</th>
                            <th>Actiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                @can('admin.roles.show')
                                <a href="{{ route('admin.roles.show',$role) }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endcan

                                @can('admin.roles.edit')
                                <a href="{{ route('admin.roles.edit',$role) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan

                                @can('admin.roles.destroy')
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                    style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#rolesTable').DataTable();
    });
</script>
@endpush