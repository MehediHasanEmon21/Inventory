<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    public function index(){

    	$orders = DB::table('orders')
    					->join('customers','orders.customer_id','customers.id')
    					->where('order_status','pending')
    					->select('orders.*','customers.name')
    					->get();
    	return view('admin.order.pending',compact('orders'));
    }

    public function view_order($id){

    	$order = DB::table('orders')
    			 ->join('customers','orders.customer_id','customers.id')
    			 ->where('orders.id',$id)
    			 ->select('customers.*','orders.*')
    			 ->first();

    	 $order_details = DB::table('order_details')
		    					->join('products','order_details.product_id','products.id')
		    					->where('order_id',$id)
		    					->select('order_details.*','products.product_name','products.product_code')
		    					->get();

		return view('admin.order.view_product',compact('order','order_details'));


	}

	public function confirm_order($id){

		$success = DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
		if ($success) {
			Toastr::success('Successfully Order Confirmed :) And All Products Delivered','Success');
        	return redirect()->route('pending.index');
		}
	}

	public function success_order(){

		$success_orders = DB::table('orders')
    					->join('customers','orders.customer_id','customers.id')
    					->where('order_status','success')
    					->select('orders.*','customers.name')
    					->get();
    	return view('admin.order.success',compact('success_orders'));
	}
}
