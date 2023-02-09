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
            <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
            <li class="breadcrumb-item active">User</li>
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
              <form method="POST" action="{{ url('admin/updateuser/'.$users->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="{{$users->name}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value="{{$users->email}}" class="form-control">
                  </div>
                </div>   
                <div class="row mb-3">
                  <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone"  value="{{$users->phone}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Street Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="street_address" value="{{$users->street_address}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Country</label>
                  <div class="col-sm-10">
                    <input type="text" name="country" value="{{$users->country}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">State</label>
                  <div class="col-sm-10">
                    <input type="text" name="state" value="{{$users->state}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" name="city"  value="{{$users->city}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="pincode" value="{{$users->pincode}}"  class="form-control">
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description"  class="form-control"> {{$users->description}}</textarea>
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{ $users->status == '1' ? 'checked' : '' }} >
                      <label class="form-check-label" for="status1">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="status2" value="0" {{ $users->status == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="status2">
                        InActive
                      </label>
                    </div>                     
                  </div>
                </fieldset> 
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                  @if ("{{ config('app.url', 'basepath') }}assets/img/users/{{ $users->image }}")
                      <img src="{{ config('app.url', 'basepath') }}assets/img/users/{{ $users->image }}" width="100px" height="100px">
                  @else
                          <p>No image found</p>
                  @endif
                    <input type="file" class="form-control" name="image" />
                  </div>
                </div>  
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">
                    <hr/>
                    <h4>Shipping Details</h4>   
                  </lable>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_name" value="{{$users->shipping_name}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="shipping_email"  value="{{$users->shipping_email}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_phone" value="{{$users->shipping_phone}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Street Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_street_address" value="{{$users->shipping_street_address}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Country</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_country" value="{{$users->shipping_country}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> State</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_state" value="{{$users->shipping_state}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> City</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_city" value="{{$users->shipping_city}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_pincode" value="{{$users->shipping_pincode}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">
                    <hr/>
                    <h4>Billing Details</h4>
                  </label>
                   
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_name"  value="{{$users->billing_name}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="billing_email" value="{{$users->billing_email}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_phone" value="{{$users->billing_phone}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Street Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_street_address" value="{{$users->billing_street_address}}"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Country</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_country"  value="{{$users->billing_country}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> State</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_state" value="{{$users->billing_state}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> City</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_city" value="{{$users->billing_city}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_pincode" value="{{$users->billing_pincode}}"  class="form-control">
                  </div>
                </div>   
                         
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="col-sm-5">
                    <a class="btn btn-primary" href="{{ url('admin/users') }}">Back</a>
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
