@extends('layouts.app')

@section('content')
<main id="main" class="main">
    @if(Session::has('alert_message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('alert_message') }}</p>
    @endif
    <div class="pagetitle">
        <h1>Category Table</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
        <a class="btn btn-success add-new-btn" href="{{ route('addcategory') }}"> Add Category </a>
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
                                        <th scope="col">Name</th> 
                                        <th scope="col">Details</th> 
                                        <th scope="col">Status</th> 
                                        <th scope="col">Create Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $cate)                 
                                    <tr>
                                        <th scope="row">{{$cate->id}}</th>
                                        <td>{{$cate->name}}</td> 
                                        <td>{{$cate->details}}</td> 
                                        <td>{{$cate->status == 1 ? 'Active':'InActive'}}</td> 
                                        <td>{{$cate->created_at}}</td>
                                        <td> <a class="btn btn-success" href="{{ route('editcategory', $cate->id) }}"> Edit </a> | <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('deleteCategory', $cate->id) }}"> Delete </a></td>
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
