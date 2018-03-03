@extends('masterPage')

@section('bodyPage')
    <div class="container" style="color: white;">
        <h1 style="margin-top: 100px; color: white;">(Админ панель) Редактирования поста с названием
            "{!!$input->title !!}"</h1>
        {!! Form::model($input, ['method' => 'PATCH', 'action' => ['blogPageController@update', $input->id]]) !!}
            @include('partial.formPartial', ['buttonText' => 'Внести изменения'])
        {!! Form::close() !!}
    </div>
@stop