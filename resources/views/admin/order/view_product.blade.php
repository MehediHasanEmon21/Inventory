@extends('layouts.app')
@section('title','View-Product')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">



            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                                   
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Pending Product <br>
                                                    <strong>{{ date('d/m/y') }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      Name : <strong>{{ $order->name }}</strong><br>
                                                      ShopName : <strong>{{ $order->shopname }}</strong><br>
                                                      {{ $order->address }}<br>
                                                      <abbr title="Phone">P:</abbr> {{ $order->phone }}
                                                  </address>
                                              </div>
                                              <div class="pull-right m-t-30">
                                                <p><strong>Order Date: </strong> {{ date('l jS \of F Y') }}</p>
                                                <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                <p class="m-t-10"><strong>Order ID: </strong> {{ $order->id }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-h-50"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-30">
                                                    <thead>
                                                        <tr><th>Sl</th>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $i = 0;
                                                            @endphp
                                                            @foreach($order_details as $content)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $content->product_name }}</td>
                                                                <td>{{ $content->product_code }}</td>
                                                                <td>{{ $content->quantity }}</td>
                                                                <td>{{ $content->unitcost }}</td>
                                                                <td>{{ $content->quantity*$content->unitcost }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row" style="border-radius: 0px;">

                                            <div class="col-md-9">
                                                <h4>Payment By : {{ $order->payment_status }}</h4>
                                                <h4>Pay : {{ $order->pay }}</h4>
                                                <h4>Due : {{ $order->due }}</h4>
                                            </div>

                                            <div class="col-md-3">
                                                <p class="text-right"><b>Sub-total:</b> {{ $order->subtotal }}</p>
                                               <!--  <p class="text-right">Discout: 12.9%</p> -->
                                                <p class="text-right">VAT: {{ $order->vat }}</p>
                                                <hr>
                                                <h3 class="text-right">Total {{ $order->total }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($order->order_status == "success")

                                        @else
                                              <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                
                                                <a href="{{ route('confirm.order',$order->id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
                                               

                                            </div>
                                        </div>
                                        @endif
                                      
                                    </div>
                                </div>

                            </div>

                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->



            </div>
@php
    $subtotal = Cart::Subtotal();
@endphp

{{-- <form action="{{ route('final.invoice') }}" method="POST">
    @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">{{ Cart::total() }}×</button> 
                    <h4 class="modal-title">Invoice Of {{ $customer->name }}</h4> 
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
                                <label for="name" class="control-label">Payment Status</label> 
                                <select name="payment_status" class="form-control">
                                    <option value="Handcash">Handcash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Due">Due</option>
                                </select>
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="pay" class="control-label">Pay</label> 
                                <input type="text" name="pay" class="form-control" id="pay" placeholder="Pay"> 
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="due" class="control-label">Due</label> 
                                <input type="text" name="due" class="form-control" id="due" placeholder="Due"> 
                            </div> 
                        </div>
                        <input type="hidden" name="customer_id" value="{{ $customer->id }}"> 
                        <input type="hidden" name="order_date" value="{{ date('d/m/y') }}"> 
                        <input type="hidden" name="order_status" value="pending"> 
                        <input type="hidden" name="subtotal" value="{{ Cart::Subtotal() }}"> 
                        <input type="hidden" name="vat" value="{{ Cart::tax() }}"> 
                        <input type="hidden" name="total" value="{{ Cart::total() }}"> 
                    </div> 
         
            
                          
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-info waves-effect waves-light">Create</button> 
                </div> 
            </div> 
        </div>
    </div><!-- /.modal -->

</form>
 --}}




@endsection
