@extends('layouts.app')
@section('title','Customer')
@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row clearfix">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">{{ config('app.name') }} !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('customer.index') }}">customer</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">UPDATE customer INFO</h3></div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('customer.update',$customer->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="shopname">ShopName</label>
                                    <input type="text" class="form-control" id="shopname" name="shopname" value="{{ $customer->shopname }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="nid_no">Nid No</label>
                                    <input type="text" class="form-control" id="nid_no" name="nid_no" value="{{ $customer->nid_no }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="account_holder">Account Holder</label>
                                    <input type="text" class="form-control" id="account_holder" name="account_holder" value="{{ $customer->account_holder }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $customer->account_number }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $customer->bank_name }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="bank_branch">Bank Branch</label>
                                    <input type="text" class="form-control" id="bank_branch" name="bank_branch" value="{{ $customer->bank_branch }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $customer->city }}" required="">
                                </div>

                                <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" accept="image/*"  required onchange="readURL(this);" required="">
                                </div>
                                <div class="form-group">
                                    <img src="{{ URL::to($customer->photo) }}" width="80" height="80">
                                </div>
                               
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div> 
            <!-- End row--


           

            </div> <!-- container -->

        </div> <!-- content -->

        
    </div>

<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
