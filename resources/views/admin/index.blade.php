@extends('layout')

@section('content')
    <div class="row">
        <div class="col text-right">
            <small>Вы вошли как <strong>{{session('username') ?? 'unknown'}}</strong>(<a href="{{route('logout')}}">выйти</a>)</small>
        </div>
    </div>
    <div class="row">
        @include('admin.menu')
    </div>
@endsection
