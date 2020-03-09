@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card bg-light col-md-8">
            <form method="GET" action="{{ route('home') }}" role="search">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <input type="search" 
                                name="search" 
                                class="form-control" 
                                value="{{old('search',$search)}}"
                                placeholder="Search..">
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="category">
                                 <option value="">Todas las Categorias</option>
                                @foreach($categories as $category)
                                <option 
                                {{ ($category->id==$cat) ? 'selected':''}}
                                value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-block btn-info">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>


    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(isset($title))
            <h4 class="mb-3">{{ $title }}</h4>
            @endif

            @foreach ($posts as $post)

            <div class="card shadow p-2  mb-4 card-outline card-primary">
                @include('posts.partials.header')

                <div class="card-body">
                    <p class="card-text">{!! $post->excerpt !!}</p>
                    <p>
                        <a href="{{ route('posts.show',$post) }}" class="text-uppercase text-info h4 font-weight-bold">
                            Leer M&aacute;s</a>
                    </p>
                    @include('posts.partials.footer')
                </div>
            </div>

            @endforeach
            {{ $posts->render() }}
        </div>
    </div>
</div>
</div>
@endsection