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
                    {!! Form::button("Редактировать",['class' => 'btn btn-primary form-control changePost', 'value' => $message->id]) !!}
                </div>
                <div class="form-group">
                    {!! Form::button("Удалить",['class' => 'btn btn-primary form-control deletePost', 'value' => $message->id]) !!}
                </div>
            </div>
        @endif
    </div>
@endforeach
    <div class="text-center" style="color: saddlebrown;">
        {{ $messages->links() }}
    </div>