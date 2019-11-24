@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.show_messages')

                @foreach ($posts as $post)
                    <div class="card mb-4 shadow-sm card-outline card-primary">
                        <div class="card-header ">
                            <h3 class="card-title mt-1">
                                <i class='fas fa-external-link-alt'></i>{{ $post->present()->postTitle() }}
                            </h3>
                            <div class="card-tools">
                                <small class='text-muted'><i class='fas fa-user-edit'></i>
                                    {{ $post->present()->owner() }}</small>
                            </div>
                        </div>

                        <div class="card-body">

                            <p class="card-text">{{ $post->excerpt }}</p>


                            <ul class="list-unstyled">
                                @foreach ($post->documents as $document)
                                    <li><i class="far fa-file-pdf"></i> <a href="{{ $document->path }}">{{ $document->title }}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <small class='text-muted text-right'>{{ $post->present()->category()}}</small>
                            <div class="d-flex justify-content-between">
                                <small class='text-muted'>{{ $post->present()->dateForHumans()}}</small>
                                <div class="btn-group">
                                    @can('posts.show')
                                        <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-eye"></i></a>
                                    @endcan

                                    @can('posts.edit')
                                        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-edit"></i></a>
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
