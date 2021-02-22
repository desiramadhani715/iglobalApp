<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_header;
use App\Models\Customer;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        $product = product::all();
        return view("Employee.Orders.index", compact('customer','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $order_detail = DB::table('order_detail');
        $detail= $request->all();
        $total=0;
        $countProduct = count($detail['product']);
        if($countProduct!=1){
            for($i=0;$i<$countProduct;$i++){
                $product = product::find($detail['product'][$i]);
                $price = $product['price'];
                $subtotal = $detail['qty'][$i] * $price;
                $total +=  $subtotal;
            }
            $data = array(
                'order_date' => $detail['order_date'],
                'customer_name' => $detail['customer_name'],
                'total_price' => $total
              );
              
            Order_header::create($data);
            $order_header = DB::table('order_header')->orderBy('order_id', 'desc')->first();
            $id_order = $order_header->order_id;
            for($i=0;$i<$countProduct;$i++){
                $product = product::find($detail['product'][$i]);
                $price = $product['price'];
                $subtotal = $detail['qty'][$i] * $price;
                $total +=  $subtotal;
                $data = array(
                    'order_id' => $id_order,
                    'product_id' => $detail['product'][$i],
                    'qty' => $detail['qty'][$i],
                    'subtotal' => $subtotal
                ); 
                Order::create($data);
            }
        }
        else{
            $product = product::find($detail['product'][0]);
            $price = $product['price'];
            $data = array(
                'order_date' => $detail['order_date'],
                'customer_name' => $detail['customer_name'],
                'total_price' => $price
              );
              
            Order_header::create($data);
            $order_header = DB::table('order_header')->orderBy('order_id', 'desc')->first();
            $id_order = $order_header->order_id;
            $subtotal = $detail['qty'][0] * $price;
            $data = array(
                'order_id' => $id_order,
                'product_id' => $detail['product'][0],
                'qty' => $detail['qty'][0],
                'subtotal' => $subtotal
            ); 
            Order::create($data);
        }
        return redirect('/employee/order')->with('status','data berhasil di Simpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}