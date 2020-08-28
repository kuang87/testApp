<?php

namespace App\Http\Controllers;

use App\Log;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail($request->session()->get('user'));

        Log::create([
            'user' => $user->name ?? 'unknown',
            'type_event_id' => 5,
            'description' => 'Просмотр профиля',
        ]);

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request)
    {
        $user = User::findOrFail($request->session()->get('user'));

        Log::create([
            'user' => $user->name ?? 'unknown',
            'type_event_id' => 5,
            'description' => 'Редактирование профиля',
        ]);

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->session()->get('user'));

        $request->validate([
            'email' => 'required|email|unique:users,email,'. $user->id .',id',
        ]);

        $user->email = $request->email;
        $user->save();

        Log::create([
            'user' => $user->name ?? 'unknown',
            'type_event_id' => 6,
            'description' => 'Профиль отредактирован',
        ]);

        return back()->with(['message' => 'Профиль отредактирован']);
    }
}
