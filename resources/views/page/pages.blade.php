@extends('layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle"> 
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item active">Pages</li>
            </ol>
        </nav>
        <a class="btn btn-success add-new-btn" href="{{ route('addpage') }}"> Add Page </a>
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th> 
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)                 
                                    <tr>
                                        <th scope="row">{{$page->id}}</th>
                                        <td>{{$page->name}}</td>
                                        <td>{{$page->title}}</td>
                                        <td>{{$page->status == 1 ? 'Active':'InActive'}}</td> 
                                        <td>{{$page->created_at}}</td>
                                        <td> <a class="btn btn-success" href="{{ route('viewpage', $page->id) }}"> View </a> | <a class="btn btn-success" href="{{ route('editpage', $page->id) }}"> Edit </a> | <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('delete', $page->id) }}"> Delete </a></td>
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
