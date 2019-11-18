@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')

            <div class="text-right mb-3">
                @can('posts.create')
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <i class="far fa-edit"></i> Crear Publicacion
                </a>
                @endcan
            </div>

            @foreach ($posts as $post)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">

                    <div class="card-title d-flex justify-content-between">
                        @can('posts.show')
                        {{ $post->present()->postTitle() }}
                        @endcan
                    </div>

                    <p class="card-text">{{ $post->excerpt }}</p>

                    <div class="d-flex justify-content-between">
                        <small class='text-muted'>{{ $post->present()->dateForHumans()}}</small>

                        <div class="btn-group">
                            @can('posts.show')
                            <a href="{{ route('posts.show',$post->id) }}"
                                class="btn btn-sm btn-outline-secondary">Ver</a>
                            @endcan

                            @can('posts.edit')
                            <a href="{{ route('posts.edit',$post->id) }}"
                                class="btn btn-sm btn-outline-secondary">Editar</a>
                            @endcan

                            @can('posts.destroy')
                            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                            <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                            {!! Form::close() !!}
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $posts->render() }}
        </div>
    </div>
</div>
</div>
@endsection