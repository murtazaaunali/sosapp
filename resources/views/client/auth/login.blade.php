@extends('client.layout.newauth')

@section('content')
<div class="container-fluid">
        <div class="loginForm">
            <div class="mainLogo">
                <a href="javascript:;">
                    <img src="../img/logo1.png" alt="">
                </a>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/client/login') }}">
                {{ csrf_field() }}
                <div class="loginSignupForm">
                    <div class="c-field style1{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="c-field__label">Email</label>
                        <input id="email" type="email" class="c-input" name="email" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                        <small class="c-field__message u-color-danger">
                            <i class="fa fa-times-circle"></i>{{ $errors->first('email') }}
                        </small>
                        @endif
                    </div>
                    <div class="c-field style1{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="c-field__label">Password</label>
                        <input id="password" type="password" class="c-input" name="password">
                        @if ($errors->has('password'))
                        <small class="c-field__message u-color-danger">
                            <i class="fa fa-times-circle"></i>{{ $errors->first('password') }}
                        </small>
                        @endif
                    </div>
                    <div class="c-field style1">
                        <label class="c-field__label">&nbsp;</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember">
                                <span></span>
                                <strong>Remember Me</strong>
                            </label>
                        </div>
                    </div>
                    <div class="c-field style1">
                        <label class="c-field__label">&nbsp;</label>
                        <div class="wd-per100">
                            <button class="c-btn style1">
                                <span>Login</span>
                            </button>
                            <a href="{{ url('/client/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- // .loginForm -->
    </div>
@endsection