<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts(){
        $products = Product::orderBy('produk','asc')->get();

        return response() -> json([
            'message' => 'success',
            'data' => $products,
        ], 200);
    }
}
