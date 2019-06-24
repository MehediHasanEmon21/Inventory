@extends('layouts.app')
@section('title','Supplier')
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
                        <li><a href="{{ route('supplier.index') }}">supplier</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">UPDATE supplier INFO</h3></div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('supplier.update',$supplier->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $supplier->email }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $supplier->phone }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $supplier->address }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="shopname">Shop</label>
                                    <input type="text" class="form-control" id="shop" name="shop" value="{{ $supplier->shop }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="address">Seller Type</label>
                                    <select name="type" class="form-control">
                                        <option value="{{ $supplier->type }}">{{ $supplier->type }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="account_holder">Account Holder</label>
                                    <input type="text" class="form-control" id="account_holder" name="account_holder" value="{{ $supplier->account_holder }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $supplier->account_number }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $supplier->bank_name }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="bank_branch">Bank Branch</label>
                                    <input type="text" class="form-control" id="bank_branch" name="bank_branch" value="{{ $supplier->bank_branch }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $supplier->city }}" required="">
                                </div>

                                <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" accept="image/*" onchange="readURL(this);">
                                </div>
                                <div class="form-group">
                                    <img src="{{ URL::to($supplier->photo) }}" width="80" height="80">
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
