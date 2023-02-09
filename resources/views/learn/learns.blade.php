@extends('layouts.app')

@section('content')
<main id="main" class="main">
@if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif 
    <div class="pagetitle"> 
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item active">Learns</li>
            </ol>
        </nav>
        <a class="btn btn-success add-new-btn" href="{{ route('addlearn') }}"> Add Learn </a>
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
                                        <th scope="col">Created Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($learns as $learn)                 
                                    <tr>
                                        <th scope="row">{{$learn->id}}</th>
                                        <td>{{$learn->name}}</td>
                                        <td>{{$learn->title}}</td>
                                        <td>{{$learn->status == 1 ? 'Active':'InActive'}}</td> 
                                        <td>{{$learn->created_at}}</td>
                                        <td> <a class="btn btn-success" href="{{ route('viewlearn', $learn->id) }}"> View </a> | <a class="btn btn-success" href="{{ route('editlearn', $learn->id) }}"> Edit </a> | <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('deletelearn', $learn->id) }}"> Delete </a></td>
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
