@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Departamento</div>

                <div class="card-body">
                   <p><strong>Nombre: </strong>{{ $department->name }}</p>
                   <p><strong>Descripcion: </strong>{{ $department->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection