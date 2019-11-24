@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Categories</h4>
                    @can('admin.categories.create')
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                        <i class="fas fa-sitemap"></i> Crear Categoria
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td width="10px">
                                    @can('admin.categories.show')
                                    <a href="{{ route('admin.categories.show',$category->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Ver</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                   @can('admin.categories.edit')
                                    <a href="{{ route('admin.categories.edit',$category->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Editar</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.categories.destroy')
                                    {!!
                                    Form::open(['route'=>['admin.categories.destroy',$category->id],'method'=>'DELETE'])
                                    !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection