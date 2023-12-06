<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::orderBy('produk', 'asc')->get();

        return response()->json([
            'message' => 'success',
            'data' => $products,
        ], 200);
    }
    public function getProductId($id)
    {
        $products = Product::find($id);

        if (!$products) {
            return response()->json([
                'message' => 'Product not found!',
                'data' => $products,
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $products,
        ], 200);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "produk" => "required",
            "harga" => "required|numeric",
        ]);

        // Konversi waktu ke dalam zona waktu yang diinginkan (Asia/Jakarta)
        $validatedData['created_at'] = Carbon::now('Asia/Jakarta');
        $validatedData['updated_at'] = Carbon::now('Asia/Jakarta');

        $produk = Product::create($validatedData);

        return response()->json([
            "message" => "Product created successfully",
            "data" => $produk,
        ]);
    }
    public function destroy($id)
    {
        $products = Product::find($id);

        if (!$products) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
        $products->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'produk' => 'required',
            'harga' => 'required|numeric',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Konversi waktu ke dalam zona waktu yang diinginkan (Asia/Jakarta)
        $validatedData['updated_at'] = Carbon::now('Asia/Jakarta');

        $product->update($validatedData);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product,
        ], 200);
    }
}
