@extends('auth.templates.templateform')

@section('content-form')

<form class="login form" method="POST" role="form" action="{{ url('/login') }}">
    @csrf
    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="col-sm-4 col-form-label">E-Mail</label>
        <input id="email" type="email" class="form-control" name="email" 
        value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password" class="col-md-4 col-form-label">Password</label>
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-login">
            <i class="fa fa-btn fa-sign-in"></i>Entrar
        </button>
    </div>

    <div class="form-group text-right">
        <a class="recuperar" href="{{url('/password/reset')}}" class="recuperar">Recuperar Senha?</a>
    </div>
</form>
@endsection
