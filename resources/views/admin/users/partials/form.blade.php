<div class="form-group">
    {{ form::label('name','Nombre', array('class' => 'font-weight-bolder')) }}
    {{ form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('name','Email', array('class' => 'font-weight-bolder')) }}
    {{ form::email('email',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('name','Password', array('class' => 'font-weight-bolder')) }}
    {{ form::password('password',['class'=>'form-control']) }}
</div>

<h3>Lista de Departamentos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($departments as $department)
            <li>
                <label>
                    {{ Form::checkbox('departments[]',$department->id,null) }}
                    {{ $department->name }}
                    <em>({{ $department->display_name ?? 'N/A'}})</em>
                </label>
            </li>
        @endforeach
    </ul>
</div>
<hr>
<h3>Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
            <li>
                <label>
                    {{ Form::checkbox('roles[]',$role->id,null) }}
                    {{ $role->name }}
                    <em>({{ $role->description ?? 'N/A'}})</em>
                </label>
            </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ form::submit('Guardar',['class'=>'btn btn-primary']) }}
</div>