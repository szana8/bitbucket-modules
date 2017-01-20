@extends('layout')
@extends('layouts.header')

@section('content')
    You are logged in as: {{ Auth::user()->email }}
    {{ link_to('/logout', 'Logout') }}
@endsection