@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6 mx-auto text-center">
            <div>
                <h2>Выбор раздела</h2>
            </div>

            <table class="table table-bordered text-center">
                <tbody>
                <tr>
                    <td><a class="btn btn-success" href="{{route('admin.index')}}">Администраторы</a></td>
                    <td><a class="btn btn-warning" href="{{route('user.index')}}">Пользователи</a></td>
                </tr>
                </tbody>
            </table>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
@endsection
