@extends('layouts.app')
@section('title','Product')
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
                        <li><a href="{{ route('product.index') }}">Product</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">EDIT PRODUCT</h3>
                           @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product_name" value="{{ $product->product_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="product_code">Product code</label>
                                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter product_code" value="{{ $product->product_code }}">
                                </div>

                                <div class="form-group">
                                    <label for="cat_id">Category Name</label>
                                    <select id="cat_id" name="cat_id" class="form-control">
                                       
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->cat_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sup_id">Supplier Name</label>
                                    <select id="sup_id" name="sup_id" class="form-control">
                                       
                                        @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $product->sup_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                         @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="product_garage">Goudune</label>
                                    <input type="text" class="form-control" id="product_garage" name="product_garage" placeholder="Enter product_garage" value="{{ $product->product_garage }}">
                                </div>


                                <div class="form-group">
                                    <label for="product_route">Route</label>
                                    <input type="text" class="form-control" id="product_route" name="product_route" placeholder="Enter product route" value="{{ $product->product_route }}">
                                </div>

                                <div class="form-group">
                                    <label for="product_buy_date">Buy Date</label>
                                    <input type="date" class="form-control" id="product_buy_date" name="product_buy_date" placeholder="Enter buy date" value="{{ $product->product_buy_date }}">
                                </div>

                                <div class="form-group">
                                    <label for="product_expire_date">Expire Date</label>
                                    <input type="date" class="form-control" id="product_expire_date" name="product_expire_date" placeholder="Enter expire date" value="{{ $product->product_expire_date }}">
                                </div>

                                <div class="form-group">
                                    <label for="buying_price">Buying Price</label>
                                    <input type="text" class="form-control" id="buying_price" name="buying_price" placeholder="Enter buing price" value="{{ $product->buying_price }}">
                                </div>

                                <div class="form-group">
                                    <label for="selling_price">Selling Price</label>
                                    <input type="text" class="form-control" id="selling_price" name="selling_price" placeholder="Enter selling price" value="{{ $product->selling_price }}">
                                </div>

                                <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="photo">Product Image</label>
                                    <input type="file" name="product_image" accept="image/*" onchange="readURL(this);">
                                </div>
                                <div class="form-group">
                                    <img src="{{ URL::to($product->product_image) }}" width="80" height="80">
                                </div>
                               
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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
