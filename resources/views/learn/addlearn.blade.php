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
            <li class="breadcrumb-item"><a href="{{ url('admin/learn') }}">Learns</a></li>
            <li class="breadcrumb-item active">Learn</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Learn</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('createlearn') }}" enctype="multipart/form-data">
                @csrf 
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
                  <label for="inputSlug" class="col-sm-2 col-form-label">Step Start</label>
                  <div class="col-sm-10">
                    <input type="text" name="step_start"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3"> 
                      <label for="inputtext" class="col-sm-2 col-form-label">Step End</label>
                      <div class="col-sm-10"> 
                        <input type="text" class="form-control" name="step_end" /> 
                      </div>                
                </div>    
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="image" />
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