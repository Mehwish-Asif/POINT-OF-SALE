<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OrderController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        //LETS ORDER  DETAILS
        $lastID = Order_Detail::max('order_id');
        $order_receipt = Order_Detail::where('order_id', $lastID)->get();
        return view('orders.index',
        ['products' => $products, 
         'orders' => $orders,
         'order_receipt' => $order_receipt]);
    }

public function store(Request $request)
{
    try {
        // Wrap the database operations in a transaction
        DB::transaction(function () use ($request) {
            // Create an order
            $order = new Order;
            $order->name = $request->customer_name;
            $order->phone = $request->customer_phone;
            $order->save();
            
            // Retrieve the ID of the newly created order
            $order_id = $order->id;

            $totalAmount = 0; // Initialize total amount variable

            // Loop through each product in the request and create order details
            foreach ($request->product_id as $index => $product_id) {
                $order_detail = new Order_Detail;
                $order_detail->order_id = $order_id;
                $order_detail->product_id = $product_id;
                $order_detail->quantity = $request->quantity[$index];
                $order_detail->unitprice = $request->price[$index];
                $order_detail->amount = $request->total_amount[$index];
                $order_detail->discount = $request->discount[$index];
                $order_detail->save();

                // Accumulate the amount for each product
                $totalAmount += $request->total_amount[$index];
            }

            // Create a transaction
            $transaction = new Transaction;
            $transaction->order_id = $order_id;
            $transaction->user_id = auth()->user()->id; // Assuming you're using authentication
            $transaction->balance = $request->balance;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->payment_method = $request->payment_method;
            $transaction->transac_amount = $totalAmount; // Set the total amount
            $transaction->transac_date = Carbon::now()->format('Y-m-d');
            $transaction->save();

            // Fetch necessary data for view
            $products = Product::all(); // Assuming you have a Product model
            $order_details = Order_Detail::where('order_id', $order_id)->get();
            $orderedBy = Order::where('id', $order_id)->get();

            // Return a view with the fetched data
            return view('orders.index', [
                'products' => $products,
                'order_details' => $order_details,
                'customer_orders' => $orderedBy
            ]);
        });
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error in storing order: ' . $e->getMessage());
        return back()->with("Error occurred while processing the order. Please try again.");
    }

    return back()->with("Product orders failed to be inserted! Check your inputs");
}

public function receipt()
{
    // Fetch the order details for the latest order
    $lastID = Order_Detail::max('order_id');
    $order_receipt = Order_Detail::where('order_id', $lastID)->get();

    // Pass $order_receipt to the 'reports.receipt' view
    return view('reports.receipt', ['order_receipt' => $order_receipt]);
}

}
