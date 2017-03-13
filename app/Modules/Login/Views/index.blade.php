@extends('layout')
@extends('layouts.navbar')
@extends('layouts.header')

@section('content')
        <md-layout :md-gutter="40">

            <md-layout></md-layout>

            <md-layout style="margin-top: 20px;">
                <md-card md-with-hover>
                    <md-card-header style="width: 550px; text-align: center;">
                        <div class="md-title">{{ trans('Login::login.login-form-title') }}</div>
                        <div class="md-subhead">{{ trans('Login::login.login-form-header-subtitle') }}</div>
                    </md-card-header>

                    <md-card-content>

                        <form @keydown="form.errors.clear($event.target.name)">

                            <md-input-container>
                                <label>{{ trans('Login::login.login-form-email-label') }}</label>
                                <md-input name="email" v-model="form.email" autocomplete="off"></md-input>
                                <span class="error text-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                            </md-input-container>

                            <md-input-container md-has-password>
                                <label>{{ trans('Login::login.login-form-password-label') }}</label>
                                <md-input type="password" name="password" v-model="form.password" autocomplete="off"></md-input>
                                <span class="error text-danger" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                            </md-input-container>

                            <md-layout>
                                <md-switch v-model="form.stay_signed_in" class="md-primary">{{ trans('Login::login.login-form-stay-signed-in-label') }}</md-switch>
                            </md-layout>

                            <md-layout md-align="end">
                                <md-button class="md-raised md-primary md-fab-bottom-right" @click.native="login" :disabled="form.errors.any()">{{ trans('Login::login.login-form-sing-in-label') }}</md-button>
                            </md-layout>

                        </form>

                    </md-card-content>

                </md-card>

                <md-layout>
                    <md-layout md-column md-gutter>
                        <md-layout md-align="center">
                            <h2>{{ trans('Login::login.login-form-other-option') }}</h2>
                        </md-layout>

                        <md-layout md-align="center">
                            <md-button class="md-raised" @click.native="facebookLogin"><i class="fa fa-facebook"></i> Facebook</md-button>
                            <md-button class="md-raised"><i class="fa fa-github"></i> Github</md-button>
                            <md-button class="md-raised"><i class="fa fa-bitbucket"></i> Bitbucket</md-button>
                        </md-layout>
                    </md-layout>

                </md-layout>

            </md-layout>

            <md-layout></md-layout>

        </md-layout>

@endsection

@section('contentjavascript')
    <script>
        new Vue({
            el: '#app',

            data: {
                alert: new Alert({}),
                form: new Form({
                    stay_signed_in: true,
                    email: null,
                    password: null
                })
            },

            methods: {

                login() {
                    this.form.post('{!! url('authenticate') !!}')
                        .then(data => {
                            this.alert.setMessage(data.message).setType('success').showAlert();
                            window.location.href = "{{ url('/') }}";
                        })
                        .catch(error => {
                            console.log(error);
                            this.alert.setMessage(error.error.message).setType('error').showAlert();
                        });
                },

                facebookLogin() {
                    window.location.href = "{{ url('api/v1/authentication/facebook/login') }}";
                }
            }

        });

    </script>
@endsection