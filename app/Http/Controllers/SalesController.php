<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Pagination\Paginator;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $sales = Order_header::where('customers_name','LIKE','%'.$request->cari.'%')->get()->simplePaginate(5);
        }else{
            $sales = Order_header::paginate(5);
        }
        // $order = Order::all();
        // $sales = Order_header::all();
        // $sales = DB::table('order_detail')
        // ->join('order_detail', 'order_header.order_id', '=', 'order_detail.order_id')
        // ->get();
        // dd($sales);
        return view("Admin.Sales.index", compact('sales'));
    }
}
?>