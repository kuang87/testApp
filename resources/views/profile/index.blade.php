@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-8 text-left">
            <a href="{{route('home')}}">На главную</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3>Редактирование профиля</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td colspan="2">Имя: <strong>{{$user->name ?? 'unknown'}}</strong></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$user->email}}</td>
                </tr>
                </thead>
                <tbody>
                <tr class="table">
                    <th>Дата регистрации</th>
                    <td>{{$user->created_at ?? ''}}</td>
                </tr>
                </tbody>
            </table>
            <div>
                <a href="{{route('profile.edit')}}" class="btn btn-primary">Изменить</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
