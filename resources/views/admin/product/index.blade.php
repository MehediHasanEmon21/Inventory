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
              <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-info">
                        <h3 class="panel-title">ALL PRODUCT<a href="{{ route('product.create') }}"><span class="pull-right btn btn-sm btn-primary">Add Product</span></a></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Code</th>
                                            <th>Selling Price</th>
                                            <th>Garage</th>
                                            <th>Route</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>{{ $product->product_garage }}</td>
                                            <td>{{ $product->product_route }}</td>
                                            <td><img src="{{ $product->product_image }} " width="80" height="80" class="img-fluid"></td>
                                            <td>
                                                <a href="{{ route('product.show',$product->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>

                                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>

                                                <a id="delete" href="{{ route('product.destroy',$product->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
