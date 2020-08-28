@extends('layout')

@section('content')
    <div class="row">
        <div class="col text-right">
            <small>Вы вошли как <strong>{{session('username') ?? 'unknown'}}</strong>(<a href="{{route('logout')}}">выйти</a>)</small>
        </div>
    </div>
    <div class="row">
        @include('admin.menu')
        <div class="col">
            <h2>Пользователи</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Дата регистрации</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr class="table">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at ?? ''}}</td>
                    </tr>
                @empty
                    <tr class="table">
                        <td colspan="4">Нет пользователей</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
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
