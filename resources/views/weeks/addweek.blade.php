@extends('layouts.app')

@section('content')
<main id="main" class="main">
@if($errors->any())         
          <p class="alert alert-info">{{ implode('', $errors->all(':message')) }}</p> 
  @endif
    <div class="pagetitle"> 
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
              <h5 class="card-title">Week</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('createweek') }}" enctype="multipart/form-data">
                @csrf 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Learn</label>
                  <div class="col-sm-10">
                    <select name="learnId" class="form-select" aria-lable="Select Learn">
                      <option>Please Select Learn</option>
                      @foreach ($learns as $key => $value)
                        <option value="{{ $key }}" > 
                            {{ $value }} 
                        </option>
                      @endforeach    
                    </select>
                  </div>
                </div>
                  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputSlug" class="col-sm-2 col-form-label">Duration</label>
                  <div class="col-sm-10">
                    <input type="text" name="duration"  class="form-control">
                  </div>
                </div>
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
                        <div class="col-sm-2">
                          <input name="description_name[]" type="text" placeholder="Name" class="form-control" >
                        </div>
                        <div class="col-sm-2">
                          <input name="description_title[]" type="text" placeholder="Title" class="form-control">
                        </div>
                        <div class="col-sm-4">
                          <input name="description_video[]" type="file" class="form-control">
                        </div>
                        <div class="col-sm-4">
                          <input name="description_pdf[]" type="file" class="form-control">
                        </div>
                        <div class="col-sm-10">
                        <label for="inputText" class="col-sm-2 col-form-label extra_lable">Description</label>
                          <textarea name="description_content[]" class="form-control" rows="5" placeholder="Contect">  </textarea>
                        </div>
                        <div class="col-sm-2">
                          <a class="extra-fields-customer btn btn-success">Add More</a>
                        </div>
                      </div>
                      <div class="customer_records_dynamic"></div>
                    </div>
                </div>
                          
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
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