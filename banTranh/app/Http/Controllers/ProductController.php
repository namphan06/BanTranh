<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

     public function index(): View
{
    // Lấy danh sách danh mục từ cơ sở dữ liệu
    $categories = Category::all();

    // Lấy danh sách sản phẩm từ cơ sở dữ liệu, phân trang 6 sản phẩm mỗi trang
    $products = Product::latest()->paginate(6);

    // Truyền cả products và categories vào View
    return view('products.index', compact('products', 'categories'));
}
     

    public function admin(): View
    {
        $products = Product::latest()->paginate(5);

        return view('products.admin', compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function showdetail2($id)
{
    $product = Product::findOrFail($id);
    return view('products.showdetail2', compact('product'));
}
public function buy($id)
{
    $product = Product::findOrFail($id);

    Order::create([
        'name' => $product->name,
        'price' => $product->price,
        'img' => $product->image,
        'order_time' => now(),
    ]);

    return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
}

public function filter(Request $request): View
{
    $query = Product::query();

    if ($request->has('category') && $request->category != '') {
        $query->where('category_id', $request->category);
    }

    if ($request->has('min_price') && $request->min_price != '') {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->has('max_price') && $request->max_price != '') {
        $query->where('price', '<=', $request->max_price);
    }

    // Lấy danh sách các category
    $categories = Category::all();

    // Lấy sản phẩm theo các bộ lọc
    $products = $query->paginate(6);

    // Trả về view cùng với cả products và categories
    $category = Category::find($request->category); // Lấy category theo id nếu có filter
    return view('categories.showFilterProducts', compact('products', 'categories', 'category'));
}

public function learnMore()
    {
        return view('products.learnmore');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    // Truyền vào chỉ category_id chứ không cần lấy thông tin chi tiết của category
    return view('products.admin');
}

    

    /**
     * Store a newly created resource in storage.
     */
    // app/Http/Controllers/ProductController.php
public function store(ProductStoreRequest $request,$categoryId): RedirectResponse
{
    $validated = $request->validated();

    // Kiểm tra và xử lý file ảnh
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('uploads/product/'), $filename);
        $validated['image'] = 'uploads/product/' . $filename;
    }

    // Lưu sản phẩm với thông tin category
    Product::create([
        'name' => $validated['name'],
        'price' => $validated['price'],
        'image' => $validated['image'],
        'category_id' => $categoryId, // Thêm category_id
    ]);

    return redirect()->route('products.admin')
                     ->with('success', 'Product created successfully.');
}

public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
{
    $validated = $request->validated();

    // Kiểm tra và xử lý file ảnh khi cập nhật
    $validated = $request->validated();

    // Kiểm tra và xử lý file ảnh khi cập nhật
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('uploads/product/'), $filename);
        $validated['image'] = 'uploads/product/' . $filename;
    }

    // Cập nhật danh mục
    $product->update($validated);

    return redirect()->route('categories.index')
                     ->with('success', 'Product updated successfully.');
}
// App\Http\Controllers\ProductController.php

public function edit(Product $product): View
{
    // Truyền sản phẩm cần chỉnh sửa vào view
    return view('products.edit', compact('product'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.admin')
                         ->with('success', 'Product deleted successfully.');
    }
}