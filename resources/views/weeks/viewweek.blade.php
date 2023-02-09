@extends('layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>View</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item"><a href="{{ url('admin/weeks') }}">Weeks</a></li>
            <li class="breadcrumb-item active">View Week</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body"> 

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    : {{$name}}
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    : {{$title}}
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputSlug" class="col-sm-2 col-form-label">Duration</label>
                  <div class="col-sm-10">
                    : {{$duration}}
                  </div>
                </div>
                 
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10"> 
                      : {{ $status == '1' ? 'Active' : 'InActive' }}     
                  </div>
                </fieldset> 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Details</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Description Name</label>
                        <label for="inputText" class="col-sm-2 col-form-label">Description Title</label>
                        <label for="inputText" class="col-sm-4 col-form-label">Video</label>
                        <label for="inputText" class="col-sm-4 col-form-label">PDF</label>
                      </div>
                      <div class="customer_records row">
                        @foreach($week as $weeeks)  
                            <div class="col-sm-2">
                               {{$weeeks->description_name}}
                            </div>
                            <div class="col-sm-2">
                              {{$weeeks->description_title}}
                            </div>
                            <div class="col-sm-4">
                            <video width="320" height="100" controls>
                              <source src="{{ config('app.url', 'basepath') }}assets/img/week/video/{{$weeeks->description_video}}" type="video/mp4">
                              <source src="{{ config('app.url', 'basepath') }}assets/img/week/video/{{$weeeks->description_video}}" type="video/ogg">
                            </video>
                            </div>
                            <div class="col-sm-4">
                              {{ $weeeks->description_pdf }}
                            </div>
                            <div class="col-sm-12">
                              <div class="row">
                                <label for="inputText" class="col-sm-2 col-form-label extra_lable">Description</label>
                                <div class="col-sm-10">{{$weeeks->description_content}} </div>
                              </div>
                              <hr>
                            </div> 
                          @endforeach
                      </div> 
                    </div>
                </div>  
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <a class="btn btn-success" href="{{ url('admin/weeks') }}"> Back </a>
                  </div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
@endsection
