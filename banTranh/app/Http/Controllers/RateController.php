<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Product;
use App\Models\Order;

class RateController extends Controller
{
    // Lưu đánh giá mới
    public function store(Request $request, $product_id, $email, $order_id)
{
    $request->validate([
        'stars' => 'required|integer|min:1|max:5',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'comment' => 'nullable|string',
    ]);

    $validated = [];
    
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('uploads/rate/'), $filename);
        $validated['image'] = 'uploads/rate/' . $filename;
    }

    Rate::create([
        'product_id' => $product_id,
        'order_id' => $order_id,
        'email' => $email,
        'stars' => $request->stars,
        'image' => isset($validated['image']) ? $validated['image'] : null, // Sử dụng giá trị image đã xác thực
        'comment' => $request->comment,
        'rated_at' => now(),
    ]);

    $order = Order::where('product_id', $product_id)->where('email', $email)->where('id', $order_id)->first();
    if ($order) {
        $order->check = true; // Đánh dấu đã được đánh giá
        $order->save();
    }

    return redirect()->route('products.index')->with('success', 'Đánh giá đã được gửi thành công!');

}


    // Hiển thị danh sách đánh giá theo product_id
    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        $rates = Rate::where('product_id', $product_id)->latest()->get();

        return view('rates.show', compact('product', 'rates'));
    }
    public function showByEmail($email, $product_id)
{
    // Lấy tất cả đánh giá từ email được cung cấp
    $rates = Rate::where('email', $email)->orderBy('rated_at', 'desc')->get();

    // Lấy danh sách product_id từ rates
    $productIds = $rates->pluck('product_id')->unique();

    // Lấy danh sách sản phẩm từ product_id
    $products = Product::whereIn('id', $productIds)->pluck('name', 'id');

    return view('rate.showrate', compact('email', 'rates', 'product_id', 'products'));
}

}