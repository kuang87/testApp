@extends('layout')

@section('content')
    <div class="row">
        <div class="col text-right">
            <small><a href="{{route('logout')}}">Выход</a></small>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <h2>Мои заказы</h2>
        </div>
    </div>
    <div class="row">
        @include('user.menu')
        <div class="col">
            @if (session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th># Заказа</th>
                    <th>Состав</th>
                    <th>Дата</th>
                    <th>Сумма</th>
                    <th>Отмена</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr class="table">
                        <td>{{$order->id}}</td>
                        <td>{{$order->description}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->total}}</td>
                        <td>
                            <form method="POST" action="{{route('user.delete_order', $order->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="table">
                        <td colspan="4">Нет аказов</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $orders->links() }}
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
