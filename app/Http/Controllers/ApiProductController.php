<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    private $product;
    private $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function list()
    {
        $products = $this->product->get();
        return response()->json($products);
    }

    public function detailProduct($id)
    {
        $detailProduct = $this->product->find($id);
        return response()->json([
            "data" => $detailProduct,
            "color" => [
                "yellow",
                "red",
                "blue"
            ]
        ]);
    }

    public function searchProduct($data)
    {
        $searchProducts = $this->product->where('name','LIKE','%'.$data.'%')->get();
        return response()->json($searchProducts);
    }
}
