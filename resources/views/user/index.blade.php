@extends('layout')

@section('content')
    <div class="row">
        <div class="col text-right">
            <small><a href="{{route('logout')}}">Выход</a></small>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            Добро пожаловать <strong>{{session('username') ?? 'unknown'}}</strong>
        </div>
    </div>
    <div class="row">
        @include('user.menu')
    </div>
@endsection
