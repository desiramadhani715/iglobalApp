@extends('Employee/Layout/main')

@section('title','Data Product')

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
                                <h1 class="m-0 text-dark">Data Produk</h1>
                            </div><!-- /.col --> 
                        </div>
                    </div>
                    <div class="col-sm-10 align-self-center">
                        <table class="table mt-3 text-center">
                            <thead class="table-active">
                                <th>No. </th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                            </thead>
                            <tbody>
                                @foreach($product as $p)
                                <tr>                        
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$p->product_name}}</td> 
                                    <td>{{$p->price}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        {{ $product->onEachSide(5)->links() }}

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection