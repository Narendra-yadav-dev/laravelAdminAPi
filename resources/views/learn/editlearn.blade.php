@extends('layouts.app')

@section('content')
<main id="main" class="main">
@if($errors->any())         
            <p class="alert alert-info">{{ implode('', $errors->all(':message')) }}</p> 
    @endif
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
    <div class="pagetitle">
        <h1>Edit</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item"><a href="{{ url('admin/pages') }}">Pages</a></li>
            <li class="breadcrumb-item active">Page</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body"> 

              <!-- General Form Elements -->
              <form method="POST" action="{{ url('admin/updatelearn/'.$learns->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{$learns->name}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="{{$learns->title}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputSlug" class="col-sm-2 col-form-label">Step Start</label>
                  <div class="col-sm-10">
                    <input type="text" name="step_start" value="{{$learns->step_start}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3"> 
                      <label for="inputtext" class="col-sm-2 col-form-label">Step End</label>
                      <div class="col-sm-10"> 
                        <input type="text" class="form-control" value="{{$learns->step_end}}" name="step_end" /> 
                      </div>                
                </div>   
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <select name="status" class="form-select">
                          <option value="1" {{ $learns->status == '1' ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $learns->status == '0' ? 'selected' : '' }}>InActive</option>
                      </select>                       
                  </div>
                </fieldset> 
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                  @if ("{{ config('app.url', 'basepath') }}assets/img/learn/{{ $learns->image }}")
                      <img src="{{ config('app.url', 'basepath') }}assets/img/learn/{{ $learns->image }}" width="100px" height="100px">
                  @else
                          <p>No image found</p>
                  @endif
                    <input type="file" class="form-control" name="image" />
                  </div>
                </div>                  
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="col-sm-5">
                    <a class="btn btn-primary" href="{{ url('admin/learn') }}">Back</a>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
@endsection
