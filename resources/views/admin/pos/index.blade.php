@extends('layouts.app')
@section('title','Category')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row clearfix bg-info">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title text-white">POS</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="" class="text-white">pos</a></li>
                        <li class="text-white">{{ date('d/m/y') }}</li>
                    </ol>
                </div>
            </div>
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        @foreach($categories as $category)
                        <a href="#" data-filter="*" class="current">{{ $category->category_name }}</a>
                        @endforeach
                    </div>
            </div>
            <br><br>
             <div class="row">
                
                 <div class="col-lg-6">
                     <div class="panel">
                         
                         
                        <div class="panel-body">
                           <div class="price_card text-center">
                                
                                <table class="table">
                                    <thead class="bg-info">
                                        <tr>
                                            <th class="text-white">Name</th>
                                            <th class="text-white">Qty</th>
                                            <th class="text-white">Single Price</th>
                                            <th class="text-white">Subtotal</th>
                                            <th class="text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart_products as $cart_product)
                                        <tr>
                                            <td>{{ $cart_product->name }}</td>
                                            <td>
                                            <form action="{{ route('cart.update',$cart_product->rowId) }}" method="POST">
                                                @csrf
                                             <input type="number" name="qty" value="{{ $cart_product->qty }}" style="width: 40px" name="">
                                             <button style="margin-top: -4px" class="btn btn-sm btn-warning text-white"><i class="fas fa-check"></i></button>
                                             </form>
                                            </td>
                                            <td>{{ $cart_product->price }}</td>
                                            <td>{{ $cart_product->price*$cart_product->qty }}</td>
                                            <td>
                                                <a href="{{ route('cart.delete',$cart_product->rowId) }}"><i class="fas fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pricing-header bg-primary">
                                    <p style="font-size: 20px">Qty : {{ Cart::count() }}</p>
                                    <p style="font-size: 20px">Subtotal : {{ Cart::subtotal() }}</p>
                                    <p>Vat : {{ Cart::tax() }}</p>
                                    <hr>
                                    <p>
                                        <h2 class="text-white">Total : {{ Cart::total() }}</h2>
                                    </p>
                                </div>
                                
                            </div> <!-- end Pricing_card -->
                            <div>
                                <form action="{{ route('invoice.index') }}" method="POST">
                                    @csrf
                                    <div class="panel-heading">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                     <h4 class="text-info">Customers<button class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</button></h4><br>
                                     <select class="form-control" name="customer_id">
                                         <option disabled="" selected="">Select Customer</option>
                                         @foreach($customers as $customer)
                                         <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                         @endforeach
                                     </select>

                                  </div>
                                    <button class="btn btn-success waves-effect waves-light w-md" style="margin-left: 154px">Create Invoice</button>
                                </form>
                                 

                            </div>
                            
                        </div>   
                            
                               
                         
                     </div>
                 </div>
                 <div class="col-lg-6">
                     
                     <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Product Code</th>
                                            <th></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                          <form action="{{ route('cart.add') }}" method="POST">
                                          @csrf
                                          <input type="hidden" name="id" value="{{ $product->id }}">  
                                          <input type="hidden" name="name" value="{{ $product->product_name }}">  
                                          <input type="hidden" name="qty" value="1">  
                                          <input type="hidden" name="price" value="{{ $product->selling_price }}">  
                                            <td>
                                                <img src="{{ $product->product_image }} " width="80" height="80" class="img-fluid"></td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td><button type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                 </div>
             </div>


           

            </div> <!-- container -->

        </div> <!-- content -->

        
    </div>



<form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">Add Customer</h4> 
                </div> 
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="modal-body"> 
                    
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="name" class="control-label">Name</label> 
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="email" class="control-label">Email</label> 
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="phone" class="control-label">Phone</label> 
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="phone"> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                         <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="address" class="control-label">Address</label> 
                                <input type="text" name="address" class="form-control" id="address" placeholder="Address"> 
                            </div> 
                        </div> 

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="shopname" class="control-label">Shopname</label> 
                                <input type="text" name="shopname" class="form-control" id="shopname" placeholder="Shopname"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="nid_no" class="control-label">Nid No</label> 
                                <input type="text" name="nid_no" class="form-control" id="nid_no" placeholder="Nid no"> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="account_holder" class="control-label">Account holder</label> 
                                <input type="text" name="account_holder" class="form-control" id="account_holder" placeholder="Account holder"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="account_number" class="control-label">Account number</label> 
                                <input type="text" name="account_number" class="form-control" id="account_number" placeholder="Account number"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="bank_name" class="control-label">Bank name</label> 
                                <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Bank name"> 
                            </div> 
                        </div> 
                        
                        
                    </div>
                     <div class="row"> 
                        
                        
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="bank_branch" class="control-label">Bank Branch holder</label> 
                                <input type="text" name="bank_branch" class="form-control" id="bank_branch" placeholder="Bank Branch"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="city" class="control-label">City</label> 
                                <input type="text" name="city" class="form-control" id="city" placeholder="City"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" accept="image/*"  required onchange="readURL(this);">
                            </div>
                        </div> 
                    </div>
                          
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-info waves-effect waves-light">Add Customer</button> 
                </div> 
            </div> 
        </div>
    </div><!-- /.modal -->

</form>





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
