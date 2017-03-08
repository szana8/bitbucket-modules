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

                        <form novalidate @submit.stop.prevent="submit">

                            <md-input-container>
                                <label>{{ trans('Login::login.login-form-email-label') }}</label>
                                <md-input v-model="email"></md-input>
                            </md-input-container>

                            <md-input-container md-has-password>
                                <label>{{ trans('Login::login.login-form-password-label') }}</label>
                                <md-input type="password"></md-input>
                            </md-input-container>

                            <md-layout>
                                <md-switch v-model="stay_signed_in" class="md-primary">{{ trans('Login::login.login-form-stay-signed-in-label') }}</md-switch>
                            </md-layout>

                            <md-layout md-align="end">
                                <md-button class="md-raised md-primary md-fab-bottom-right">{{ trans('Login::login.login-form-sing-in-label') }}</md-button>
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
                            <md-button class="md-raised"><i class="fa fa-facebook"></i> Facebook</md-button>
                            <md-button class="md-raised"><i class="fa fa-github"></i> Github</md-button>
                            <md-button class="md-raised"><i class="fa fa-bitbucket"></i> Bitbucket</md-button>
                        </md-layout>
                    </md-layout>

                </md-layout>

            </md-layout>

            <md-layout></md-layout>

        </md-layout>
@endsection