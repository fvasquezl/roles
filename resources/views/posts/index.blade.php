@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')

            <div class="text-right mb-3">
                @can('posts.create')
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-square"></i> Crear Publicación
                </a>
                @endcan
            </div>

            @foreach ($posts as $post)
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    {{ $post->present()->postTitle() }}
                </div>

                <div class="card-body">

                    <p class="card-text">{{ $post->excerpt }}</p>


                    <ul class="list-unstyled">
                     @foreach ($post->documents as $document)
                        <li><i class="far fa-file-pdf"></i> <a href="{{ $document->path }}">{{ $document->title }}</a></li>
                    @endforeach
                    </ul>

                    <small class='text-muted text-right'>{{ $post->present()->categories()}}</small>
                    <div class="d-flex justify-content-between">
                        <small class='text-muted'>{{ $post->present()->dateForHumans()}}</small>
                        <div class="btn-group">
                            @can('posts.show')
                            <a href="{{ route('posts.show',$post->id) }}"
                                class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            @endcan

                            @can('posts.edit')
                            <a href="{{ route('posts.edit',$post->id) }}"
                                class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                            @endcan

                            @can('posts.destroy')
                            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
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