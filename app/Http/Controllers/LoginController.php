<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        Log::create([
            'user' => '-UNAUTHORIZED-',
            'type_event_id' => 3,
            'description' => 'Попытка входа в систему',
        ]);

        $request->validate([
            'name' => 'required|alpha_dash|min:2|max:254',
            'password' => 'required|min:8|max:254'
        ]);

        Log::create([
            'user' => $request->name ?? '------',
            'type_event_id' => 3,
            'description' => 'Попытка входа в систему (validated)',
        ]);

        $user = DB::table('users')->where('name', $request->name)->first();
        if (!empty($user) && Hash::check($request->password, $user->password)){
            $request->session()->put([
                'logged' => 1,
                'user' => $user->id,
                'username' => $user->name,
            ]);
            $request->session()->regenerate();

            Log::create([
                'user' => $request->name,
                'type_event_id' => 1,
                'description' => 'Вход в систему',
            ]);

            return redirect()->route('home');
        }
        return back()->withErrors(['error' => 'Authentication error']);
    }
}
