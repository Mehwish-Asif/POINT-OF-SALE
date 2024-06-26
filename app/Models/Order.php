<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['name','phone'];

    public function orderdetail()
    {
      return $this->hasMany('App\Order_Detail');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
