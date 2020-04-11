@extends('layouts.master')


@section('content-header')
@include('layouts.partials.contentHeader',$info =[
'title' =>'Publicaciones',
'subtitle' => 'Administracion',
'breadCrumbs' =>['posts','index']
])
@stop

