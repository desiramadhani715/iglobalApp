@extends('Employee/Layout/main')

@section('title','Employee IGlobalApp')

@section('content')


<!-- add customer Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action='/employee/customer' method="post" role="form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  
          @csrf
          <div class="row ">
            <label for="customer_name" class="col-sm-2 col-form-label">Nama Customer</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name">@error('customer_name') <div class="invalid-feedback"> {{@message}}</div>@enderror
            </div>
          </div>
          <div class="row ">
            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" name="address">
            </div>
          </div><br>
          <div class="row ">
            <label for="city" class="col-sm-2 col-form-label">Kota</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="city" name="city">
            </div>
          </div>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Data</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--end of add customer Modal -->

{{-- edit customer modal --}}
@foreach($customer as $cs)
<div class="modal fade" id="editCsModal-{{$cs->customer_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action='{{ url('customer/edit/'.$cs->customer_id)}}' method="post" role="form">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">    
          @csrf
          <div class="row ">
            <label for="customer_name" class="col-sm-2 col-form-label">Nama Customer</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $cs->customer_name }}">
            </div>
          </div>
          <div class="row ">
            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" name="address" value="{{ $cs->address }}">
            </div>
          </div><br>
          <div class="row ">
            <label for="city" class="col-sm-2 col-form-label">Kota</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="city" name="city" value="{{ $cs->city }}">
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
                                <h1 class="m-0 text-dark">Data Customer</h1>
                            </div><!-- /.col -->  
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                        Tambah Data
                                      </button>
                                      <!-- Button trigger modal -->
                                    

                                </ol>
                            </div><!-- /.col -->  
                        </div>
                    </div>
                    <div class="col-sm-10 align-self-center">
                        <table class="table mt-3 text-center">
                            <thead class="table-active">
                                <th>No. </th>
                                <th>Nama Customer</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($customer as $cs)
                                <tr>                        
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$cs->customer_name}}</td> 
                                    <td>{{$cs->address}}</td>
                                    <td>{{$cs->city}}</td>
                                    <td>
                                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCsModal-{{$cs->customer_id}}">
                                        <i class="fa fa-pen"></i>
                                      </button> 

                                      <form action="{{url('customer/'.$cs->customer_id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin ?')">
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
                        {{ $customer->onEachSide(5)->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
   
      
    
</div>

@endsection