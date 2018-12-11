@extends('auth.templates.templateform')

@section('content-form')

<div class="form-control">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
<form class="login form" method="POST" action="{{url('/password/email')}}">
    @csrf
    <div class="form-group{{$errors->has('email') ? 'has-error' : ''}} row">
        <div class="col-md-12">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-login">
        <i class="fa fa-btn fa-envelope"></i> Enviar link de recuperação</button>
    </div>
</form>
@endsection
