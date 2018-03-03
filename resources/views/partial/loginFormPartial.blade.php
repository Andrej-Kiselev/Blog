<form role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input placeholder="Email" style="margin-top: 20px; height: 40px" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" placeholder="Пароль" style="margin-top: 15px; height: 40px; margin-bottom: 20px" class="form-control" name="password" required >
    </div>
    <input class="btn btn-default" type="submit" name="signInUser" value="Вход" style="margin-right: 15px;width: 320px">

</form>