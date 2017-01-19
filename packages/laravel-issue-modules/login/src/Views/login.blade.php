@extends('layout')
@extends('layouts.header')

@section('content')

    {!! Html::style('laravel-issue-tracker/css/login.css') !!}

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>{{ trans('login::login.login-form-title') }}</h3>
                            <p>{{ trans('login::login.login-form-header-subtitle') }}</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom" id="login-form">
                        <form role="form" method="post" class="login-form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                        {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="sr-only" for="form-email">{{ trans('login::login.login-form-email-label') }}</label>

                                <input type="text" name="email" class="form-username form-control" placeholder="{{ trans('login::login.login-form-email-label') }}..." id="email" v-model="form.email">

                                <span class="control-label" v-if="form.errors.has('email')" for="inputError1" v-text="form.errors.get('email')"></span>
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-password">{{ trans('login::login.login-form-password-label') }}</label>

                                <input type="password" name="password" placeholder="{{ trans('login::login.login-form-password-label') }}..." class="form-password form-control" id="password" v-model="form.password">

                                <label class="control-label" v-if="form.errors.has('password')" for="inputError1" v-text="form.errors.get('password')"></label>
                            </div>

                            <button type="submit" class="btn" :disabled="form.errors.any()">{{ trans('login::login.login-form-sing-in-label') }}</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 social-login">
                    <h3>{{ trans('login::login.login-form-other-option') }}</h3>
                    <div class="social-login-buttons">
                        <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                            <i class="fa fa-facebook"></i> Facebook
                        </a>
                        <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                            <i class="fa fa-github"></i> Github
                        </a>
                        <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                            <i class="fa fa-bitbucket"></i> Bitbucket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Html::script('laravel-issue-tracker/js/login.js') !!}
@endsection