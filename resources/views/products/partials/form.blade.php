<div class="form-group">
    {{ form::label('name','Nombre del producto') }}
    {{ form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('description','Descripcion del producto') }}
    {{ form::text('description',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::submit('Guardar',['class'=>'btn btn-primary']) }}
</div>