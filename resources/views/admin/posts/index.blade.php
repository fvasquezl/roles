@extends('layouts.master')


@section('content-header')
    @include('layouts.partials.contentHeader',$info =[
           'title' =>'Publicaciones',
           'subtitle' => 'Administracion',
           'breadCrumbs' =>['posts','index']
           ])
@stop

{{-- @push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush --}}


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="card mb-4 shadow-sm card-outline card-primary">
                <div class="card-header ">
                    <h3 class="card-title mt-1">
                        Listado de publicaciones
                    </h3>
                    <div class="card-tools">

                        @can('create',$posts->first())
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                            Crear Publicacion
                        </button>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <poststable-component></poststable-component>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

{{-- @push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#postsTable').DataTable();
    });
</script>
@endpush --}}
