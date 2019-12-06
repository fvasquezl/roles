@extends('layouts.app')

@section('meta-title',$post->title)
@section('meta-description',$post->excerpt)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                            <a href="#" class="btn btn-success btn-flat">
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
                            <a href="{{url($document->url) }}" target="_blank">{{ $document->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <p class="text-right card-text">
                        <i class="fas fa-tags fa-sm"></i> {{ $post->present()->tags() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection