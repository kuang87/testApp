<?php

namespace App\Http\Controllers;

use App\Log;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users(Request $request)
    {
        Log::create([
            'user' => $request->session()->get('username') ?? 'unknown',
            'type_event_id' => 5,
            'description' => 'Просмотр таблицы Пользователи',
        ]);

        $users = User::paginate(10);
        return view('admin.users', [
            'users' => $users,
        ]);
    }

    public function log(Request $request)
    {
        Log::create([
            'user' => $request->session()->get('username') ?? 'unknown',
            'type_event_id' => 5,
            'description' => 'Просмотр журнала событий',
        ]);

        $events = Log::latest('id')->paginate(10);
        return view('admin.log', [
            'events' => $events,
        ]);
    }
}
