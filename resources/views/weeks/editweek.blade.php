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
            <li class="breadcrumb-item"><a href="{{ url('admin/weeks') }}">Weeks</a></li>
            <li class="breadcrumb-item active">Week</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body"> 

              <!-- General Form Elements -->
              <form method="POST" action="{{ url('admin/updateweek/'.$learnId) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{$name}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="{{$title}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputSlug" class="col-sm-2 col-form-label">Duration</label>
                  <div class="col-sm-10">
                    <input type="text" name="duration"  value="{{$duration}}"  class="form-control">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <select name="status" class="form-select">
                          <option value="1" {{ $status == '1' ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $status == '0' ? 'selected' : '' }}>InActive</option>
                      </select>                       
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
                        @php
                          $count = 0;
                        @endphp
                        @foreach($week as $weeeks) 
                          @if($count == 0)  
                            <div class="col-sm-2">
                              <input name="description_name[]" value="{{$weeeks->description_name}}" type="text" placeholder="Name" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                              <input name="description_title[]" value="{{$weeeks->description_title}}" type="text" placeholder="Title" class="form-control">
                            </div>
                            <div class="col-sm-4">
                              <input name="description_video[]" type="file" class="form-control">
                            </div>
                            <div class="col-sm-4">
                              <input name="description_pdf[]" type="file" class="form-control">
                            </div>
                            <div class="col-sm-10">
                            <label for="inputText" class="col-sm-2 col-form-label extra_lable">Description</label>
                              <textarea name="description_content[]" class="form-control" rows="5" placeholder="Contect">{{$weeeks->description_content}}  </textarea>
                            </div>
                            <div class="col-sm-2">
                              <a class="extra-fields-customer btn btn-success">Add More</a>
                            </div>
                            @endif
                            @php
                              $count ++;
                            @endphp
                          @endforeach
                      </div>
                      <div class="customer_records_dynamic">
                          @php
                              $count2 = 0;
                          @endphp
                            @foreach($week as $weeek2) 
                              @if($count2 != 0)  
                                <div class="remove row">
                                  <div class="col-sm-2">
                                    <input name="description_name[]" value="{{$weeek2->description_name}}" type="text" placeholder="Name" class="form-control">
                                  </div>
                                  <div class="col-sm-2">
                                    <input name="description_title[]" value="{{$weeek2->description_name}}" type="text" placeholder="Title" class="form-control">
                                  </div>
                                  <div class="col-sm-4">
                                    <input name="description_video[]" type="file" class="form-control">
                                  </div>
                                  <div class="col-sm-4">
                                    <input name="description_pdf[]" type="file" class="form-control">
                                  </div>
                                  <div class="col-sm-10">
                                  <label for="inputText" class="col-sm-2 col-form-label extra_lable">Description</label>
                                    <textarea name="description_content[]" class="form-control" rows="5" placeholder="Contect">{{$weeek2->description_content}} </textarea>
                                  </div>                          
                                  <div class="col-sm-2"><a class="remove-field btn-remove-customer btn btn-danger">Remove</a></div>
                                </div>
                              @endif
                                @php
                                  $count2 ++;
                                @endphp
                            @endforeach
                      </div>
                    </div>
                </div>                  
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="col-sm-5">
                    <a class="btn btn-primary" href="{{ url('admin/weeks') }}">Back</a>
                  </div>
                </div>

              </form>
              <!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
@endsection
