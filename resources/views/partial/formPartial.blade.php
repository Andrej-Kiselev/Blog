
<div class="form-group">
    {!! Form::label('title', 'Заголовок') !!}
    {!! Form::text('title', null, ['class' => 'form-control','style' => 'width: 100%']) !!}
</div>

<div class="form-group">
    {!! Form::label('message', 'Текст') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control','style' => 'min-width: 100%; max-width: 100%; max-height: 150px;']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText,['class' => 'btn btn-primary form-control savePost', 'id' => 'savePost', 'value' => 'add']) !!}
</div>
