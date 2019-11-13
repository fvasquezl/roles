@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Departamento</div>

                <div class="card-body">
                    {!! Form::model($department,['route'=>['departments.update',$department->id],'method'=>'PUT']) !!}
                    @include('departments.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection