<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class PosController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$products = DB::table('products')
                    ->join('categories','products.cat_id','=','categories.id')
                    ->select('products.*','categories.category_name')
                    ->get();
        $categories = DB::table('categories')->get();
        $customers = DB::table('customers')->get();
        $cart_products = Cart::content();
    	return view('admin.pos.index',compact('products','categories','customers','cart_products'));
    }
}
