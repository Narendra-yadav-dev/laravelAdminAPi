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
            <li class="breadcrumb-item"><a href="{{ url('admin/products') }}">Products</a></li>
            <li class="breadcrumb-item active">Product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('createproduct') }}" enctype="multipart/form-data">
                @csrf 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                    <select name="catId" class="form-select" aria-lable="Select Learn">
                      <option>Please Select Category</option>
                      @foreach ($data as $key => $value)
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
                  <label for="inputSku" class="col-sm-2 col-form-label">SKU</label>
                  <div class="col-sm-10">
                    <input type="text" name="sku"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3 add-more">
                  <label for="inputColor" class="col-sm-2 col-form-label">Color</label>
                  <div class="col-sm-10">
                    <div class="color_records row">
                      <div class="col-sm-10">
                        <input name="color[]" type="text" placeholder="Color" class="form-control" >
                      </div>
                      <div class="col-sm-2">
                        <a class="extra-fields-color btn btn-success">Add More</a>
                      </div>
                    </div>
                    <div class="color_records_dynamic"></div>
                  </div>
                </div>
                <div class="row mb-3 add-more">
                  <label for="inputSize" class="col-sm-2 col-form-label">Size</label>
                  <div class="col-sm-10">
                    <div class="size_records row">
                      <div class="col-sm-10">
                        <input name="size[]" type="text" placeholder="Size" class="form-control" >
                      </div>
                      <div class="col-sm-2">
                        <a class="extra-fields-size btn btn-success">Add More</a>
                      </div>
                    </div>
                    <div class="size_records_dynamic"></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                  <div class="col-sm-10">
                    <input type="text" name="quantity"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputModel" class="col-sm-2 col-form-label">Model</label>
                  <div class="col-sm-10">
                    <input type="text" name="model"  class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
                  <div class="col-sm-10">
                    <input type="text" name="discount"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description"  class="form-control"> </textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Full Image</label>
                  <div class="col-sm-10 imageupload">
                    <input type="file" class="form-control" name="image" id="fullimage" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Thumbnail Image</label>
                  <div class="col-sm-10 imageupload ">
                    <input type="file" class="form-control" name="thumbnail" id="thumbnail"/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Gallary Image (Multiple)</label>
                  <div class="col-sm-10 imageupload">
                    <div class="gallery"></div>
                    <input type="file" class="form-control" multiple name="gallary[]" id="gallary-photo-add"/>
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
