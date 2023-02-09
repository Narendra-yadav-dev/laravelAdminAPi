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
              <h5 class="card-title">User</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{ route('createuser') }}" enctype="multipart/form-data">
                @csrf 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email"  class="form-control">
                  </div>
                </div>     
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Street Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="street_address"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Country</label>
                  <div class="col-sm-10">
                    <input type="text" name="country"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">State</label>
                  <div class="col-sm-10">
                    <input type="text" name="state"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" name="city"  class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="pincode"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description"  class="form-control"> </textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
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
                    <input type="text" name="shipping_name"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="shipping_email"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_phone"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Street Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_street_address"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Country</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_country"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> State</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_state"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> City</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_city"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="shipping_pincode"  class="form-control">
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
                    <input type="text" name="billing_name"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="billing_email"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_phone"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Street Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_street_address"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Country</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_country"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> State</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_state"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> City</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_city"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label"> Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" name="billing_pincode"  class="form-control">
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
