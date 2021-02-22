@extends('Employee/Layout/main')

@section('title','Employee IGlobalApp')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
          @endif
            <div class="row mb-2">
                <div class="card col-sm-12">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Order Entry</h1>
                            </div><!-- /.col --> 
                        </div>
                    </div>
                    <div class="col-sm-10 ">
                        <div class="card mt-3 my-3">
                            <div class="card-body">
                                <form action="order" method="POST" role="form">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="order_date" class="col-sm-2 col-form-label">Tanggal </label>
                                        <div class="col-sm-4">
                                            <input type="date" class="datepicker" name="order_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="customer_name" class="col-sm-2 col-form-label">Customer</label>
                                        <div class="col-sm-4">
                                            <select name="customer_name" id="customer_name" class="form-control">
                                                <option value="">--PILIH CUSTOMER--</option>
                                                @foreach($customer as $cs)
                                                <option value="{{$cs->customer_name}}">{{$cs->customer_name}}  --  {{$cs->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="product" class="col-sm-2 col-form-label">Product</label>
                                    </div>
                                    <div class=" mb-3 variasi1 ">
                                        <div class="col-sm-10">
                                            <label for="pilihanVariasi" class="col-form-label">Pilihan produk 1</label>
                                            <div class="form-row"   >
                                                <div class="col-sm-4">
                                                    <select class="form-control" id="product" name="product[]">
                                                        <option value="">Product</option>
                                                        @foreach($product as $p)
                                                        <option value="{{$p->product_id}}">{{$p->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" name="qty[]" placeholder="Jumlah">
                                                </div>
                                            </div>
            
                                            <div id="rowDinamis">
            
                                            </div>
            
                                            <input type="button" class="form-control my-3 btn btn-outline-primary col-sm-8"
                                                style="border-style:dashed" value="Tambahkan Pilihan" onclick="addRow()">
            
                                            <input type="hidden" id="numbRows" value="1">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-sm-6"></div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection