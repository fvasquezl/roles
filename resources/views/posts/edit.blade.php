@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.show_messages')

            <div class="card">
                <div class="card-header">Publicacion</div>

                <div class="card-body">
                    {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT']) !!}
                    @include('posts.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection