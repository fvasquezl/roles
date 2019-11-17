@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')
            {{--<div class="card">--}}
                {{--<div class="card-header d-flex justify-content-between">--}}
                    {{--<h4>Publicaciones</h4>--}}
                    @can('posts.create')
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        Crear Publicacion
                    </a>
                    @endcan
                {{--</div>--}}

                {{--<div class="card-body">--}}
                    {{--<table class="table table-striped table-hover">--}}
                        {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th width="10px">ID</th>--}}
                                {{--<th>Nombre</th>--}}
                                {{--<th colspan="3">&nbsp;</th>--}}
                            {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                            @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">
                                @can('posts.show')
                                    <a href="{{ route('posts.show',$post->id) }}">{{$post->title}}</a>
                                    @else
                                    {{$post->title}}
                                @endcan
                            </h5>

                                {{ $post->id }}
                                {{ $post->excerpt }}
                                {{--<td width="10px">--}}
                                    @can('posts.show')
                                    <a href="{{ route('posts.show',$post->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Ver</a>
                                    @endcan
                                {{--</td>--}}
                                {{--<td width="10px">--}}
                                    {{--@can('posts.edit')--}}
                                    {{--<a href="{{ route('posts.edit',$post->id) }}"--}}
                                        {{--class="btn btn-sm btn-outline-secondary">Editar</a>--}}
                                    {{--@endcan--}}
                                {{--</td>--}}
                                {{--<td width="10px">--}}
                                    {{--@can('posts.destroy')--}}
                                    {{--{!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}--}}
                                    {{--<button class="btn btn-sm btn-danger">Eliminar</button>--}}
                                    {{--{!! Form::close() !!}--}}
                                    {{--@endcan--}}
                                {{--</td>--}}
                        </div>
                    </div>
                            @endforeach
                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{ $posts->render() }}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
@endsection