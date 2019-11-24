<div class="form-group">
    {{ form::label('name','Siglas del departamento') }}
    {{ form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('display_name','Nombre del producto') }}
    {{ form::text('display_name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('description','Descripcion del departamento') }}
    {{ form::text('description',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::submit('Guardar',['class'=>'btn btn-primary']) }}
</div>