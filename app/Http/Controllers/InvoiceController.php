<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Brian2694\Toastr\Facades\Toastr;
class InvoiceController extends Controller
{
    public function index(Request $request){
    	$this->validate($request,[
            'customer_id'=>'required',
            
        ],[
        	'customer_id.required'=>'Select a Customer first !'
        ]);
    	$customer_id = $request->customer_id;
    	$customer = DB::table('customers')->where('id',$customer_id)->first();
    	$contents = Cart::content();

        return view ('admin.invoice.index',compact('customer','contents'));
    }

    public function final_invoice(Request $request){

       
        $data = array();

        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['subtotal'] = $request->subtotal;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

       $order_id = DB::table('orders')->insertGetId($data);
       // echo "<pre>";
       //  print_r($order_id);
       //  echo "</pre>";
       $contents = Cart::content();

       $odata = array();

       foreach ($contents as $content) {
           $odata['order_id'] = $order_id;
           $odata['product_id'] = $content->id;
           $odata['quantity'] = $content->qty;
           $odata['unitcost'] = $content->price;
           $odata['total'] = $content->total;

           $all_order = DB::table('order_details')->insert($odata);

       }

       if ($all_order) {
           Cart::destroy();
           Toastr::success('Succesfully invoice created ! Please delivered the product and accept status','Success');
           return redirect()->route('home');
       }
    }


}
