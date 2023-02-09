@extends('layouts.app')

@section('content')
<main id="main" class="main">
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif 
    <div class="pagetitle">
        <h1>Products Table</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
        <a class="btn btn-success add-new-btn" href="{{ route('addproduct') }}"> Add Product </a>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <!-- Default Table -->
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th> 
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $datas) 
                                    
                                    <tr>
                                        <th scope="row">{{$datas->id}}</th>
                                        <td><img src="{{ config('app.url', 'basepath') }}{{ $datas->image}}" alt="products image" title="products image" width="50px" height="50px" /></td>
                                        <td>{{$datas->name}}</td>
                                        <td>{{$datas->cname}}</td>
                                        <td>{{$datas->title}}</td>
                                        <td>{{$datas->price}}</td>
                                        <td>{{$datas->quantity}}</td>
                                        <td>{{$datas->status == 1 ? 'Active':'InActive'}}</td> 
                                        <td> <a class="btn btn-success" href="{{ route('editproduct', $datas->id) }}"> Edit </a> | <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('deleteproduct', $datas->id) }}"> Delete </a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- End Default Table Example -->                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
