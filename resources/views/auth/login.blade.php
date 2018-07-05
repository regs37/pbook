@extends('layouts.app')

@section('nav')
   
@endsection

@section('style')
<style type="text/css">
    body{
        background-color: rgba(0,0,0,0.025);
    }
    .panel-default .panel-body{
        padding: 20px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default login">
                <div class="panel-body">
                    <center>
                        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-3.png') }}" width="100"></a>
                        <p>LOGIN</p>
                    </center>
                    <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=" control-label">E-Mail Address</label>

                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class=" control-label">Password</label>

                            <div class="">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block btn-gradient">
                                    Login
                                </button><br>
                                <div class="form-group">
                                    <div class="">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <center>
                <a class="" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a><br>
                <a class="" href="{{ route('register') }}">
                    Don't have an account yet?
                </a>
            </center>
        </div>
    </div>
</div>
@endsection
