@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            @if (session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif

            @if(session('logged'))
                <h4>
                    <a href="{{route('logout')}}">Выход из системы</a>
                </h4>
            @else
                <h3>Вход</h3>
                <form method="POST" action="{{route('login')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="username">Логин</label>
                        <input type="text" name="name" class="form-control" id="username" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                </form>
            @endif
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
