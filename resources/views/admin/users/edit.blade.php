@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')
            <div class="card">
                <div class="card-header">Usuario</div>

                <div class="card-body">
                    {!! Form::model($user,['route'=>['admin.users.update',$user->id],'method'=>'PUT']) !!}
                    @include('admin.users.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection