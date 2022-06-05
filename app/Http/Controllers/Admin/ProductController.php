<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{


public function index()
{
    return view('admin.products.index');
}

public function create()
{
    return view('admin\products\create');
}

public function store(Request $request)
{
    $product = new Product;
    $product->name = $request->product_name;
    $product->price = $request->product_price;
    $product->quantity = $request->product_qty;
    $product->save();

    return redirect()->back();
}

}
