<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;


class TransactionController extends Controller
{
    //
    public function index()
    {
       // Fetch transactions with associated orders
       $transac = Transaction::with('order')->get();

       // Pass the data to the view
       return view('transaction.index', compact('transac'));
        
    }

    public function filter($interval)
{
    // Initialize date range
    $startDate = null;
    $endDate = null;

    // Calculate date range based on the selected interval
    switch ($interval) {
        case 'daily':
            $startDate = Carbon::today();
            $endDate = Carbon::tomorrow();
            break;
        case 'weekly':
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
            break;
        case 'monthly':
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
            break;
        case 'yearly':
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
            break;
        default:
            // Invalid interval, redirect back to all transactions
            return redirect()->route('transactions.index');
    }

    // Fetch transactions within the date range
    $transac = Transaction::with('order')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->get();

    // Pass the filtered transactions to the view
    return view('transaction.index', compact('transac'));
}





}
