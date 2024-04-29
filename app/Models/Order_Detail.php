<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = ['order_id',
                           'product_id',
                           'unitprice',
                           'quantity',
                           'amount',
                           'discount'];
                           public function product()
                           {
                               return $this->belongsTo(Product::class); // Adjust namespace
                           }
                       
                           public function order()
                           
                           {
                               return $this->belongsTo(Order::class); // Adjust namespace
                           }
}
