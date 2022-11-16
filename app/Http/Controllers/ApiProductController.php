<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function list()
    {
        $products = $this->product->get();
        return response()->json($products);
    }

    public function detailProduct($id)
    {
        $detailProduct = $this->product->find($id);
        return response()->json($detailProduct);
    }

    public function searchProduct($data)
    {
        $searchProducts = $this->product->where('name','LIKE','%'.$data.'%')->get();
        return response()->json($searchProducts);
    }
}
