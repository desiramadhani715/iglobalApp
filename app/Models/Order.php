<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
 
    protected $table        = 'order_detail';
    protected $foreignkey   = 'order_id';
    protected $fillable     = ['order_id','product_id','qty','subtotal'];

}