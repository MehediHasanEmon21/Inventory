<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Brian2694\Toastr\Facades\Toastr;
class CartController extends Controller
{	
	public function __construct(){
        $this->middleware('auth');
    }

    public function add_cart(Request $request){
    	$data = array();
    	$data['id'] = $request->id;
    	$data['name'] = $request->name;
    	$data['qty'] = $request->qty;
    	$data['price'] = $request->price;

    	$cart_add = Cart::add($data);

    	if ($cart_add) {
	        Toastr::success('Cart Added Successfully :)','Success');
	        return redirect()->back();
    	}
    }

    public function update_cart(Request $request,$rowId){

    	$qty = $request->qty;
    	$update = Cart::update($rowId,$qty);
    	if ($update) {
	        Toastr::success('Cart Product Updated Successfully :)','Success');
	        return redirect()->back();
    	}
    }

    public function delete_cart($rowId){
    	Cart::remove($rowId);
    	Toastr::success('Cart Product Deleted Successfully :)','Success');
	    return redirect()->back();
    }
}
