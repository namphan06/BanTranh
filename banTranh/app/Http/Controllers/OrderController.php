<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()->paginate(6); 

        return view('orders.index', compact('orders'));
    }

    public function getOrderEmail(): View
    {
        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Lọc các đơn hàng theo email của người dùng hiện tại
        $orders = Order::where('email', $user->email)->latest()->paginate(6); 

        return view('orders.index', compact('orders'));
    }

}