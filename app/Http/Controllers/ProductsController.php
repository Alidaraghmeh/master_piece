<?php
// app/Http/Controllers/ProductsController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function showProducts(Request $request)
    {
        // Fetch all products with associated orphan names
        $products = Product::with('orphan')->get();
    
     
        return view('products', compact('products'));
    }
    

    public function checkout(Request $request)
    {
        $totalPrice = $request->input('total_price');
        
        
        return view('checkout', compact('totalPrice'));
    }
    
}
