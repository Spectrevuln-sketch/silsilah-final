@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('auth.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ trans('auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('auth.login') }}
                                </button>
                                
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('auth.forgot_password') }}
                                </a>
                            </div>
                        </div>
                        <div class="auth-factor">
                        

                            <div id="container-auth-fb" style="display: flex; justify-content: center; margin-top: 10px;">
                                <a href="{{ route('facebook.facebook_login') }}" class="btn btn-facebook btn-user btn-block">
                                    <i class="fa-brands fa-facebook-square"></i>
                                    Login Dengan Facebook
                                </a>
                            </div>
                            <div id="container-auth-tw" style="display: flex; justify-content: center; margin-top: 10px;">
                                <a href="{{ route('twitter.twitter_login') }}" class="btn btn-twitter btn-user btn-block">
                                    <i class="fa-brands fa-twitter"></i>
                                    Login Dengan Twitter
                                </a>
                            </div>
                            <div id="container-auth-gm" style="display: flex; justify-content: center; margin-top: 10px;">
                                <a href="{{ route('google.google_login') }}" class="btn btn-google btn-user btn-block">
                                    <i class="fa-brands fa-google"></i>
                                    Login Dengan Google
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
