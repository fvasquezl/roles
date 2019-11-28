<div class="modal fade" id="usersModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Creacion de nuevo usuario del sistema</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Inresa aqu&iacute; el nombre del nuevo usuario">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Inresa aqu&iacute; el email del nuevo usuario">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Inresa aqu&iacute; el password del nuevo usuario">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmar Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirma el password">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Crear Usuario</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>~
    <!-- /.modal-dialog -->
</div>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.show_messages')
            <div class="card">
                <div class="card-header">Usuario</div>

                <div class="card-body">
                    {!! Form::open(['route'=>'admin.users.store']) !!}
                    @include('admin.users.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}