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
            @if (session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{route('profile.update')}}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td colspan="2">Имя: <strong>{{$user->name ?? 'unknown'}}</strong></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input class="form-control" type="text" name="email" value="{{$user->email}}"></td>
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
                    <input class="btn btn-warning" type="submit" value="Сохранить">
                </div>
            </form>
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
