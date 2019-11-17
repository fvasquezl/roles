<div class="form-group">
    {{ form::label('title','Titulo de la publicacion') }}
    {{ form::text('title',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('excerpt','Extracto de la publicacion') }}
    {{ form::text('excerpt',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::label('published_at','Fecha de publicacion') }}
    {{ form::text('published_at',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ form::submit('Guardar',['class'=>'btn btn-primary']) }}
</div>