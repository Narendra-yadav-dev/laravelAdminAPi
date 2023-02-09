@extends('layouts.app')

@section('content')
<main id="main" class="main">
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif 
    <div class="pagetitle">
        <h1>Users Table</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
        <a class="btn btn-success add-new-btn" href="{{ route('adduser') }}"> Add User </a>
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th> 
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $student)                 
                                    <tr>
                                        <th scope="row">{{$student->id}}</th>
                                        <td><img src="{{ config('app.url', 'basepath') }}assets/img/users/{{ $student->image}}" alt="user image" title="user image" width="50px" height="50px" /></td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>{{$student->status == 1 ? 'Active':'InActive'}}</td> 
                                        <td>{{$student->created_at}}</td>
                                        <td> <a class="btn btn-success" href="{{ route('edituser', $student->id) }}"> Edit </a> | <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('delete', $student->id) }}"> Delete </a></td>
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
