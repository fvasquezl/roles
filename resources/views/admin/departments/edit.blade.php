@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')
            <div class="card">
                <div class="card-header">Departamento</div>
                <div class="card-body">
                    {!! Form::model($department,['route'=>['admin.departments.update',$department->id],'method'=>'PUT']) !!}
                    @include('admin.departments.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection