@if (Auth::check())
<div>
    <h3>Добавить запись в блог</h3>
    {!! Form::open() !!}
    @include('partial.formPartial', ['buttonText' => 'Добавить пост'])
    {!! Form::close() !!}
</div>
@endif