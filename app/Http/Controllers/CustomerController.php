<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = product::all();
        if($request->has('cari')){
            $customer = Customer::where('customer','LIKE','%'.$request->cari.'%')->get()->simplePaginate(5);
        }else{
            $customer = Customer::paginate(5);
        }
        return view("Employee.Customers.index", compact('customer','product'));
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
        $request->validate([
            'customer_name' => 'required',
            'address'=> 'required',
            'city'=> 'required'
        ]);
        Customer::create($request->all());
        return redirect('/employee/customer')->with('status','data berhasil di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('post')){
            $customer = $request->all();

            Customer::where(['customer_id'=>$id])->update(['customer_name'=>$customer['customer_name'],'address'=>$customer['address'],'city'=>$customer['city']]);
            return redirect()->back()->with('status','Data Berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('/employee/customer')->with('status', 'Data berhasil di Hapus!');
    }
}