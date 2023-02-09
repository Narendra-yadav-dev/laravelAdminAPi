@extends('layouts.app')

@section('content')
<main id="main" class="main">
  @if($errors->any())         
          <p class="alert alert-info">{{ implode('', $errors->all(':message')) }}</p> 
  @endif
    <div class="pagetitle">
        <h1>Add</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item"><a href="{{ url('admin/category') }}">Categories</a></li>
            <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('createCategory') }}">
                @csrf 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDetails" class="col-sm-2 col-form-label">Details</label>
                  <div class="col-sm-10">
                    <input type="text" name="details"  class="form-control">
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
