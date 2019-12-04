@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card mb-4 shadow-sm card-outline card-primary">
                        <div class="card-header ">
                            <h5>
                                <i class='fas fa-external-link-alt'></i>
                                {{ $post->title }}
                            </h3>
                            <small class="text-muted"> {{ $post->user->name }} / {{ $post->present()->publishedAt() }}</small>
                        </div>

                        <div class="card-body">
                            <p class="card-text">{!! $post->excerpt !!}</p>
                            <p>
                                <a href="{{ route('posts.show',$post) }}" 
                                class="text-uppercase text-info font-weight-bold">
                                Leer M&aacute;s</a>
                            </p>


                             {{-- <ul class="list-unstyled">
                                {{--@foreach ($post->documents as $document)--}}
                                    {{--<li>--}}
                                        {{--<i class="far fa-file-pdf"></i> <a href="{{ $document->path }}">{{ $document->title }}</a>--}}
                                    {{--</li>--}}
                                {{--@endforeach
                                </ul>--}}

                        </div>
                    </div>
                @endforeach
                {{--{{ $posts->render() }}--}}
            </div>
        </div>
    </div>
    </div>
@endsection
