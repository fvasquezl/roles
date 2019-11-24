@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Departamento</div>

                <div class="card-body">
                    <p><strong>Siglas: </strong>{{ $department->name }}</p>
                    <p><strong>Nombre: </strong>{{ $department->display_name }}</p>
                    <p><strong>Descripcion: </strong>{{ $department->description }}</p>
                    <hr>
                    <h3>Integrantes</h3>
                    <p>{{ $department->present()->usersByDepartment()}}</p>
                    {{-- <table>
                        <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                            <td>{{$user->name}}</td>

                    <td>{{$user->roles()->role}}</td>

                    </tr>
                    @endforeach
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection