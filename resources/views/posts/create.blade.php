@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                Publicaciones
                <small class="text-muted text-md">Crear publicacion</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop


@section('content')
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Titulo de la publicacion</label>
                        <input name="title" class="form-control"
                            placeholder="Inresa aqu&iacute; el t&iacute;tulo de la publicaci&oacute;n">
                    </div>
                    <div class="form-group">
                        <label>Extracto de la publicacion</label>
                        <textarea class="form-control" id="editor"
                            placeholder="Inresa aqu&iacute; el extracto de la publicaci&oacute;n"
                            name="excerpt"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Fecha de publicacion:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input name="published_at" type="text" class="form-control float-right" id="datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Categorias</label>
                        <select name="category" class="form-control">
                            <option value="">Selecciona una categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                            <label>Etiquetas</label>
                            <select class="select2" multiple="multiple" data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;">
                              <option>Alabama</option>
                              <option>Alaska</option>
                              <option>California</option>
                              <option>Delaware</option>
                              <option>Tennessee</option>
                              <option>Texas</option>
                              <option>Washington</option>
                            </select>
                          </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')

<script>
    $(function () {
        $('#datepicker').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $('#editor').summernote({
            height:'300px'
        });
        $('.select2').select2()
    });
</script>

@endpush