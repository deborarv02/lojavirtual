<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('quantity', '>', 0);

        if ($request->type_id) {
            $query->where('type_id', $request->type_id);
        }

        $products = $query->get();
        $types = Type::all();

        return view('welcome', compact('products', 'types'));
    }
}