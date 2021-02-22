<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_header extends Model
{
    use HasFactory;
 
    protected $table        = 'order_header';
    protected $primarykey   = 'order_id';
    protected $fillable     = ['order_date','customer_name','total_price'];

}