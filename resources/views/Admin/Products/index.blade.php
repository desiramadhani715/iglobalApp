@extends('Admin/Layout/main')

@section('title','Data Product')

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
                                <h1 class="m-0 text-dark">Data Produk</h1>
                            </div><!-- /.col -->  
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    {{-- <a href="#" data-bs-toggle="modal" data-bs-target="addProductModal" class="btn btn-primary">Tambah Data</a></li> --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                        Tambah Data
                                      </button>
                                </ol>
                            </div><!-- /.col -->  
                        </div>
                    </div>
                    <div class="col-sm-10 align-self-center">
                        <table class="table mt-3 text-center">
                            <thead class="table-active">
                                <th>No. </th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($product as $p)
                                <tr>                        
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$p->product_name}}</td> 
                                    <td>{{$p->price}}</td>
                                    <td>
                                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal-{{$p->product_id}}">
                                        <i class="fa fa-pen"></i>
                                      </button> 

                                      <form action="{{url('product/'.$p->product_id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin ?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger ">
                                          <i class="fa fa-trash"></i>
                                        </button>
                                      </form>
                                        
                                    </td>
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
   
      
    <!-- add product Modal -->
      <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action='/admin/product' method="post" role="form">
                  @csrf
                    <div class="row ">
                      <label for="product_name" class="col-sm-2 col-form-label">Nama Produk</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name">
                        @error('nama') <div class="invalid-feedback"> {{@message}}</div>@enderror
                      </div>
                    </div>
                    <div class="row ">
                      <label for="price" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price">
                      </div>
                    </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    <!--end of add product Modal -->

    {{-- edit product modal --}}
    @foreach($product as $p)
    <div class="modal fade" id="editProductModal-{{$p->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action='{{ url('product/edit/'.$p->product_id)}}' method="post" role="form">
                @csrf
                  <div class="row ">
                    <label for="product_name" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $p->product_name }}">
                    </div>
                  </div>
                  <div class="row ">
                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="price" name="price" value="{{ $p->price }}">
                    </div>
                  </div>
                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    @endforeach
    {{-- end of edit product modal --}}
</div>

<!-- Button trigger modal -->

@endsection