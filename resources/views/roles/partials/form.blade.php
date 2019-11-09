<div class="form-group">
    {{ form::label('name','Nombre') }}
    {{ form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('slug','URL Amigable') }}
    {{ form::text('slug',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('description','Descripcion') }}
    {{ form::textarea('description',null,['class'=>'form-control']) }}
</div>
<hr>
<h3>Permiso especiale</h3>
<div class="form-group">
    <label>{{ Form::radio('special','all-access') }} Acceso Total</label>
    <label>{{ Form::radio('special','no-access') }} Ningun Acceso</label>
</div>
<h3>Lista de Permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
            <li>
                <label>
                    {{ Form::checkbox('permissions[]',$permission->id,null) }}
                    {{ $permission->name }}
                    <em>({{ $permission->description ?? 'Sin Descripcion'}})</em>
                </label>
            </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ form::submit('Guardar',['class'=>'btn btn-sm btn-primary']) }}
</div>