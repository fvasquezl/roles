<div class="form-group">
    {{ form::label('name','Nombre de la publicacion') }}
    {{ form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('description','Descripcion de la publicacion') }}
    {{ form::text('description',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::submit('Guardar',['class'=>'btn btn-primary']) }}
</div>