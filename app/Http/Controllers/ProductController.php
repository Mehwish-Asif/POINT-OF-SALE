<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class ProductController extends Controller
{
     public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
        
    }

    
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user(); 
    
        $validatedData = $request->validate([
            'product_name' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'alert_stock' => 'required',
            'description' => 'required',
        ]);
    
        // Create a new Product instance and assign values from validated data
        $product = new Product;
        $product->product_name = $validatedData['product_name'];
        $product->brand = $validatedData['brand'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->alert_stock = $validatedData['alert_stock'];
        $product->description = $validatedData['description'];
    
        // Save the product
        $product->save();
    
        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }



    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

 
    
    public function update(Request $request, $id)
    {
        // Find the product by its ID
        $product = Product::FindOrFail($id);
    
        // Validate the request data
        $validatedData = $request->validate([
            'product_name' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'alert_stock' => 'required',
            'description' => 'required' // Ensure 'description' is included in the validation
        ]);
    
        // Update the product attributes
        $product->update( $validatedData);
    
        // Redirect back to the product index page with a success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

   


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }


   
}
