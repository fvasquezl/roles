@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publicacion</div>

                <div class="card-body">
                   <p><strong>Nombre: </strong>{{ $post->name }}</p>
                   <p><strong>Descripcion: </strong>{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection