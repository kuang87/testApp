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
            <h2>Журнал событий</h2>
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Тип события</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Информация</th>
                    <th scope="col">Дата</th>
                </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                    <tr class="table">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$event->event()}}</td>
                        <td>{{$event->user}}</td>
                        <td>{{$event->description}}</td>
                        <td>{{$event->created_at}}</td>
                    </tr>
                @empty
                    <tr class="table">
                        <td colspan="5">Журнал пуст</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $events->links() }}

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
