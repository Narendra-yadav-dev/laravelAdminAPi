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
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ url('admin/updateproduct/'.$data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                    <select name="catId" class="form-select" aria-lable="Select Learn">
                      <option>Please Select Category</option>
                      @foreach ($cat as $key => $value)
                        <option value="{{ $key }}" {{ $data->catId == $key ? 'selected' : '' }} > 
                            {{ $value }} 
                        </option>
                      @endforeach    
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{$data->name}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="teext" name="title" value="{{$data->title}}" class="form-control">
                  </div>
                </div>   
                <div class="row mb-3">
                  <label for="inputSku" class="col-sm-2 col-form-label">SKU</label>
                  <div class="col-sm-10">
                    <input type="text" name="sku"  value="{{$data->sku}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" value="{{$data->price}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3 add-more">
                  <label for="inputColor" class="col-sm-2 col-form-label">Color</label>
                  <div class="col-sm-10">
                    <div class="color_records row">
                      <div class="col-sm-10">
                        <input name="color[]" type="text"  value="{{$color[0]->name}}" class="form-control" >
                      </div>
                      <div class="col-sm-2">
                        <a class="extra-fields-color btn btn-success">Add More</a>
                      </div>
                    </div>
                    @if(count($color) > 1)
                      @for($i = 1; $i < count($color); $i++)
                        <div class="remove row">
                          <div class="col-sm-10">
                            <input name="color[]" type="text" value="{{$color[$i]->name}}"  class="form-control">
                          </div>
                          <div class="col-sm-2"><a class="remove-field btn-remove-color btn btn-danger">Remove</a></div>
                        </div>
                      @endfor
                    @endif
                    
                    <div class="color_records_dynamic"></div>
                  </div>
                </div>
                <div class="row mb-3 add-more">
                  <label for="inputSize" class="col-sm-2 col-form-label">Size</label>
                  <div class="col-sm-10">
                    <div class="size_records row">
                      <div class="col-sm-10">
                        <input name="size[]" type="text" value="{{$size[0]->name}}" class="form-control" >
                      </div>
                      <div class="col-sm-2">
                        <a class="extra-fields-size btn btn-success">Add More</a>
                      </div>
                    </div>
                    @if(count($size) > 1)
                      @for($i = 1; $i < count($size); $i++)
                        <div class="remove row">
                          <div class="col-sm-10">
                            <input name="size[]" type="text" value="{{$size[$i]->name}}" class="form-control">
                          </div>
                          <div class="col-sm-2"><a class="remove-field btn-remove-color btn btn-danger">Remove</a></div>
                        </div>
                      @endfor
                    @endif
                    <div class="size_records_dynamic"></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                  <div class="col-sm-10">
                    <input type="text" name="quantity" value="{{$data->quantity}}"   class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputModel" class="col-sm-2 col-form-label">Model</label>
                  <div class="col-sm-10">
                    <input type="text" name="model" value="{{$data->model}}"   class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
                  <div class="col-sm-10">
                    <input type="text" name="discount" value="{{$data->discount}}"  class="form-control">
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description"  class="form-control"> {{$data->description}}</textarea>
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <select name="status" class="form-select">
                          <option value="1" {{ $data->status == '1' ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $data->status == '0' ? 'selected' : '' }}>InActive</option>
                      </select>                       
                  </div>
                </fieldset> 
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10 imageupload">
                  @if ("{{ config('app.url', 'basepath') }}{{ $data->image }}")
                      <img src="{{ config('app.url', 'basepath') }}{{ $data->image }}" width="100px" height="100px">
                  @else
                          <p>No image found</p>
                  @endif
                    <input type="file" class="form-control" name="image" id="fullimage" />
                  </div>
                </div>  
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Thumbnail Image</label>
                  <div class="col-sm-10 imageupload">
                    @if ("{{ config('app.url', 'basepath') }}{{ $data->thumbnail }}")
                        <img src="{{ config('app.url', 'basepath') }}{{ $data->thumbnail }}" width="100px" height="100px">
                    @else
                            <p>No image found</p>
                    @endif
                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Gallary Image (Multiple)</label>
                  <div class="col-sm-10">
                    <div class="gallery">
                      @php
                          $gallary = json_decode($data->gallary);
                      @endphp
                        @if(count($gallary) > 0)
                          @for($i = 0; $i < count($gallary); $i++)
                            @if ("{{ config('app.url', 'basepath') }}{{ $gallary[$i] }}")
                                <img src="{{ config('app.url', 'basepath') }}{{ $gallary[$i] }}" width="100px" height="100px">
                            @else
                                    <p>No image found</p>
                            @endif
                          @endfor
                        @endif
                      </div>
                    <input type="file" class="form-control" multiple name="gallary[]" id="gallary-photo-add" />
                  </div>
                </div>
                         
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="col-sm-5">
                    <a class="btn btn-primary" href="{{ url('admin/products') }}">Back</a>
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
