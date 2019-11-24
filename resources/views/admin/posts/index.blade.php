@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Publicaciones</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.show_messages')

            <div class="card mb-4 shadow-sm card-outline card-primary">
                <div class="card-header ">
                    <h3 class="card-title mt-1">
                        Listado de publicaciones
                    </h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                            Crear Publicacion
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Extracto</th>
                            <th>Fecha Publicacion</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->excerpt}}</td>
                                <td>{{$post->published_at}}</td>
                                <td>
                                    @can('admin.posts.show')
                                        <a href="{{ route('admin.posts.show',$post->id) }}"
                                           class="btn btn-sm btn-default"><i class="fas fa-eye"></i></a>
                                    @endcan

                                    @can('admin.posts.edit')
                                        <a href="{{ route('admin.posts.edit',$post->id) }}"
                                           class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    @endcan

                                    @can('admin.posts.destroy')
                                        {!! Form::open(['route'=>['admin.posts.destroy',$post->id],'method'=>'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')

@endpush