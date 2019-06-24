<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$products = DB::table('products')->get();
    	return view('admin.product.index',compact('products'));
    }

    public function create(){

    	$categories = DB::table('categories')->get();
    	$suppliers = DB::table('suppliers')->get();
    	return view('admin.product.create',compact('categories','suppliers'));
    }

    public function store(Request $request){


    	$this->validate($request,[
    		'product_name'=>'required',
    		'cat_id'=>'required',
    		'sup_id'=>'required',
    		'product_code'=>'required',
    		'product_garage'=>'required',
    		'product_image'=>'required|image|mimes:jpeg,jpg,png,bmp',
    		'product_route'=>'required',
    		'product_buy_date'=>'required',
    		'product_expire_date'=>'required',
    		'buying_price'=>'required',
    		'selling_price'=>'required',
    	]);

    	$image = $request->file('product_image');
    	$slug = str_slug($request->product_name);

    	if (isset($image)) {
    		
    		$currentDate = Carbon::now()->toDateString();
    		$imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
    		$upload_path ='public/product/';
            $image_url   = $upload_path.$imageName;
            $image->move($upload_path,$imageName);
    	}else {
    		$image_url = 'default.png';
    	}

    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['cat_id'] = $request->cat_id;
    	$data['sup_id'] = $request->sup_id;
    	$data['product_code'] = $request->product_code;
    	$data['product_garage'] = $request->product_garage;
    	$data['product_image'] = $image_url;
    	$data['product_route'] = $request->product_route;
    	$data['product_buy_date'] = $request->product_buy_date;
    	$data['product_expire_date'] = $request->product_expire_date;
    	$data['buying_price'] = $request->buying_price;
    	$data['selling_price'] = $request->selling_price;

    	DB::table('products')->insert($data);
    	Toastr::success('Product Successfully Added :)','Success');
    	return redirect()->route('product.index');
    }

    public function show($id){
        $product = DB::table('products')
                    ->join('categories','products.cat_id','=','categories.id')
                    ->join('suppliers','products.sup_id','=','suppliers.id')
                    ->select('products.*','categories.category_name','suppliers.name')
                    ->where('products.id',$id)->first();
        return view('admin.product.show',compact('product'));
    }

    public function destroy($id){

        $product = DB::table('products')
                    ->where('id',$id)
                    ->first();
        $image_path = $product->product_image;
        if (file_exists($image_path)) {
           unlink($image_path);
        }
        
        DB::table('products')->where('id',$id)->delete();
        Toastr::success('Product Successfully Deleted :)','Success');
        return redirect()->route('product.index');

    }

    public function edit($id){
        $product = DB::table('products')->where('id',$id)->first();
        $categories = DB::table('categories')->get();
        $suppliers = DB::table('suppliers')->get();
        return view('admin.product.edit',compact('product','categories','suppliers'));
    }

    public function update(Request $request,$id){

       $this->validate($request,[
            'product_name'=>'required',
            'cat_id'=>'required',
            'sup_id'=>'required',
            'product_code'=>'required',
            'product_garage'=>'required',
            'product_image'=>'mimes:jpeg,jpg,png,bmp',
            'product_route'=>'required',
            'product_buy_date'=>'required',
            'product_expire_date'=>'required',
            'buying_price'=>'required',
            'selling_price'=>'required',
        ]);

        $image = $request->file('product_image');
        $slug = str_slug($request->product_name);

        $product = DB::table('products')->where('id',$id)->first();
        $image_path = $product->product_image;

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/product/';
            $image_url   = $upload_path.$imageName;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image->move($upload_path,$imageName);
        }else {
            $image_url = $image_path;
        }

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_image'] = $image_url;
        $data['product_route'] = $request->product_route;
        $data['product_buy_date'] = $request->product_buy_date;
        $data['product_expire_date'] = $request->product_expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        DB::table('products')->where('id',$id)->update($data);
        Toastr::success('Product Successfully Updated :)','Success');
        return redirect()->route('product.index');

    }

    public function import_product(){
        return view('admin.product.import_product');
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request) 
    {
        Excel::import(new ProductsImport, $request->import_product);
        
        Toastr::success('Product Imported Successfullt :)','Success');
        return redirect()->route('product.index');
    }
}
