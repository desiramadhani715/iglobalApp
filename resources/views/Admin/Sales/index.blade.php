@extends('Admin/Layout/main')

@section('title','Data Sales')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="card col-sm-12">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Data Penjualan</h1>
                            </div><!-- /.col -->  
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                </ol>
                            </div><!-- /.col -->  
                        </div>
                    </div>
                    <div class="col-sm-10 align-self-center">
                        <table class="table mt-3 text-center">
                            <thead class="table-active">
                                <th>No. </th>
                                <th>Tanggal</th>
                                <th>Nama Customer</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                <tr>                        
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$sale->order_date}}</td> 
                                    <td>{{$sale->customer_name  }}</td> 
                                    <td>{{$sale->total_price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sales->onEachSide(5)->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->

@endsection