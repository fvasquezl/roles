@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(isset($title))
            <h4 class="mb-3">{{ $title }}</h4>
            @endif

            @foreach ($posts as $post)
            <div class="card shadow p-2  mb-4 card-outline card-primary">
                <div class="card-header ">
                    <h5>
                        <i class="far fa-file-alt mr-1"></i>
                        {{ $post->title }}
                    </h5>
                    <div class="d-flex justify-content-between">
                        <div class="text-muted mt-1"><i class="fas fa-user"></i> {{ $post->present()->owner() }} /
                            <i class="fas fa-calendar-alt"></i> {{ $post->present()->publishedAt() }}
                        </div>
                        <div>
                            <a href="{{ route('categories.show',$post->category) }}" class="btn btn-success btn-flat">
                                {{ $post->present()->category() }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <p class="card-text">{!! $post->excerpt !!}</p>
                    <p>
                        <a href="{{ route('posts.show',$post) }}" class="text-uppercase text-info h4 font-weight-bold">
                            Leer M&aacute;s</a>
                    </p>
                    <hr>
                    @if($post->documents->count())
                    <ul class="list-unstyled">
                        @foreach ($post->documents as $document)
                        <li>
                            <i class="fas fa-file-pdf fa-2x text-danger"></i>
                            <a href="{{ url($document->url) }}" target="_blank">{{ $document->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <p class="text-right card-text">
                        <i class="fas fa-tags fa-sm"></i>
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tags.show',$tag) }}">#{{ $tag->name }}</a>
                        @endforeach

                    </p>
                </div>
            </div>
            @endforeach
            {{ $posts->render() }}
        </div>
    </div>
</div>
</div>
@endsection