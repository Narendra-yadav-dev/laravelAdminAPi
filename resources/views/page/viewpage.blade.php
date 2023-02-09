@extends('layouts.app')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>View</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li> 
            <li class="breadcrumb-item"><a href="{{ url('admin/pages') }}">Pages</a></li>
            <li class="breadcrumb-item active">View Page</li>
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
                    {{$page->name}}
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    {{$page->title}}
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputSlug" class="col-sm-2 col-form-label">Slug</label>
                  <div class="col-sm-10">
                    {{$page->slug}}
                  </div>
                </div>
                <div class="row mb-3 extra-class-editer"> 
                      <label for="inputContent" class="col-sm-2 col-form-label">Content</label>
                      <div class="col-sm-10"> 
                        {!!  html_entity_decode($page->description) !!}
                      </div>                
                </div> 
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      {{ $page->status == '1' ? 'Active' : 'InActive' }}                        
                    </div>                     
                  </div>
                </fieldset> 
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                  @if ("{{ config('app.url', 'basepath') }}assets/img/pages/{{ $page->image }}")
                      <img src="{{ config('app.url', 'basepath') }}assets/img/pages/{{ $page->image }}" width="100px" height="100px">
                  @else
                          <p>No image found</p>
                  @endif
                     
                  </div>
                </div>                  
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <a class="btn btn-success" href="{{ url('admin/pages') }}"> Back </a>
                  </div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
@endsection
