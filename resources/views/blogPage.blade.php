@extends('masterPage')

@section('bodyPage')
    <div class="container">
        <div class="row" class="content" style="top:50px">
            <div class="col-md-8 content" style="top: 50px;">
                    <h1>Блог</h1>
                <div id="updateDiv">
                    @foreach($messages as $message)
                    <div style="border: 2px solid black; padding: 5px; margin-bottom: 10px;">
                        <h2>{{$message->title}}</h2>
                        <h5>{{$message->message}}</h5>
                        <h5>Оставил пользователь: {{$message->postedBy}}</h5>
                        <article>ID: {{$message->id}}</article>
                        <article>At the: {{$message->atTime->formatLocalized('%A %d %B %Y') }}</article>
                        @if (Auth::check() && $st = Auth::user()->status == "admin")
                            <div>
                                <div class="form-group">
                                    {!! Form::button("Редактировать",['class' => 'btn btn-primary form-control changePost', 'id' => 'changePost', 'value' => $message->id]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::button("Удалить",array('class' => 'btn btn-primary form-control deletePost', 'id' => 'deletePost', 'value' => $message->id)) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    @endforeach

                        <div class="text-center" style="color: saddlebrown;">
                            {{ $messages->links() }}
                        </div>
                </div>
            </div>
            <div class="col-md-4 content" style="top: 50px;max-height: 1300px">
                @if (Auth::check())
                    <div style="font-size: 40px">
                        <p>{{Auth::user()->name}}</p>
                        <a class="btn btn-default" href="{{ url('/logout') }}" style="width: 150px">
                            Выйти
                        </a>
                    </div>
                @else
                <div class="container" id="registrationForm">
                    @include('partial.loginFormPartial')
                @endif
                @include('partial.addPostPartial')
                </div>
            </div>
            <script type="text/javascript">
            </script>
        </div>
    </div>
    <div id="newModal">
        <div style="padding: 40px">
            <h1>Редактирование поста</h1>
            {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('titles', 'Заголовок') !!}
                    {!! Form::text('titles', null, ['class' => 'form-control','style' => 'width: 100%']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('messages', 'Текст') !!}
                    {!! Form::textarea('messages', null, ['class' => 'form-control','style' => 'min-width: 100%; max-width: 100%; max-height: 150px;']) !!}
                </div>

                <div class="form-group">
                    {!! Form::button('Обновить',['class' => 'btn btn-primary form-control changeTrue', 'id' => 'changeTrue', 'value' => 'add']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div id="backs"></div>
@stop