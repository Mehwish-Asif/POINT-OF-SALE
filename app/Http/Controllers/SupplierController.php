<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller
{
    //
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
        
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'eddress' => 'required',
            'company' => 'required',
        ]);

        $supplier = new Supplier;
        $supplier->supplier_name = $validatedData['supplier_name'];
        $supplier->email = $validatedData['email'];
        $supplier->phone = $validatedData['phone'];
        $supplier->eddress = $validatedData['eddress'];
        $supplier->company = $validatedData['company'];

        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Supplier added successfully.');
    }

    

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

 
    
    public function update(Request $request, $id)
    {
        // Find the product by its ID
        $supplier = Supplier::FindOrFail($id);
    
        // Validate the request data
        $validatedData = $request->validate([
            'supplier_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'company' => 'required',
        ]);
    
        // Update the product attributes
        $supplier->update( $validatedData);
    
        // Redirect back to the product index page with a success message
        return redirect()->route('supplier.index')->with('success', 'Product updated successfully.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }


}
