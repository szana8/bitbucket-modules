@extends('layout')
@extends('layouts.header')

@section('content')

    {!! Html::style('css/login.css') !!}

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>{{ trans('Login::login.login-form-title') }}</h3>
                            <p>{{ trans('Login::login.login-form-header-subtitle') }}</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom" id="login-form">
                        <form role="form" method="post" class="login-form" action="{{ url('authenticate') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" value="{{ url('/') }}" id="redirect" />

                            <div class="form-group">
                                <label class="sr-only" for="form-email">{{ trans('Login::login.login-form-email-label') }}</label>

                                <input type="text" name="email" class="form-username form-control" placeholder="{{ trans('Login::login.login-form-email-label') }}..." id="email">

                                <label class="control-label" for="inputError1"></label>
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-password">{{ trans('Login::login.login-form-password-label') }}</label>

                                <input type="password" name="password" placeholder="{{ trans('Login::login.login-form-password-label') }}..." class="form-password form-control" id="password">

                            </div>



                            <button type="submit" class="btn btn-default">{{ trans('Login::login.login-form-sing-in-label') }}</button>

                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 social-login">
                    <h3>{{ trans('Login::login.login-form-other-option') }}</h3>
                    <div class="social-login-buttons">
                        <a class="btn btn-link-1 btn-link-1-facebook" href="{{ url('api/v1/authentication/facebook/login') }}">
                            <i class="fa fa-facebook"></i> Facebook
                        </a>
                        <a class="btn btn-link-1 btn-link-1-google-plus" href="{{ url('api/v1/authentication/github/login') }}">
                            <i class="fa fa-github"></i> Github
                        </a>
                        <a class="btn btn-link-1 btn-link-1-twitter" href="{{ url('api/v1/authentication/bitbucket/login') }}">
                            <i class="fa fa-bitbucket"></i> Bitbucket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Html::script('js/login.js') !!}
@endsection