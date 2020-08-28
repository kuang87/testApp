<?php

namespace App\Http\Controllers;

use App\Log;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function orders(Request $request)
    {
        Log::create([
            'user' => $request->session()->get('username') ?? 'unknown',
            'type_event_id' => 5,
            'description' => 'Просмотр таблицы Заказы',
        ]);

        $userId = $request->session()->get('user');

        $orders = Order::query()->where('user_id', $userId)->latest()->paginate(10);

        return view('user.orders', [
            'orders' => $orders,
        ]);
    }

    public function deleteOrder(Request $request, Order $order)
    {
        $user = User::findOrFail($request->session()->get('user'));
        if ($order->user_id === $user->id){
            Log::create([
                'user' => $user->name ?? 'unknown',
                'type_event_id' => 7,
                'description' => 'Заказ ' . $order->id . ' удален',
            ]);
            $order->delete();
            return back()->with(['message' => 'Заказ удален']);
        }

        return back()->with(['message' => 'Заказ не может быть удален']);
    }
}
