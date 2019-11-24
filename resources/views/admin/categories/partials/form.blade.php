<div class="form-group">
    {{ form::label('name','Nombre') }}
    {{ form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::submit('Guardar',['class'=>'btn btn-primary']) }}
</div>