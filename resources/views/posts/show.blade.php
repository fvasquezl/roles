@extends('layouts.app')

@section('meta-title',$post->title)
@section('meta-description',$post->excerpt)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm card-outline card-primary">
                <div class="card-header ">
                    <h5>
                        <i class='fas fa-external-link-alt'></i>
                        {{ $post->title }}
                    </h5>
                    <div>
                        <small class="text-muted"> {{ $post->present()->owner() }} /
                            {{ $post->present()->publishedAt() }}
                        </small>
                        <span class="float-right">
                            <a href="#" class="btn btn-xs btn-success btn-flat">
                                {{ $post->present()->category() }}
                            </a>
                        </span>
                    </div>

                </div>

                <div class="card-body">
                    <p class="card-text">{!! $post->excerpt !!}</p>
                    <p class="text-right">
                        {{ $post->present()->tags() }}
                    </p>
                    

                    {{-- <p>
                     <a href="#" class="text-right text-default">
                            {{ $post->present()->category() }}
                     </a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection