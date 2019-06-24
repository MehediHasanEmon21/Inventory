<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class SupplierController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$suppliers = DB::table('suppliers')->get();
    	return view('admin.supplier.index',compact('suppliers'));
    }

    public function create(){


    	return view('admin.supplier.create');
    }

    public function store(Request $request){

    	$this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:suppliers',
            'phone'=>'required',
            'address'=>'required',
            'type'=>'required',
            'shop'=>'required',
            'photo'=>'required|image|mimes:jpeg,jpg,png,bmp',
            'account_holder'=>'required',
            'account_number'=>'required|unique:suppliers',
            'bank_name'=>'required',
            'bank_branch'=>'required',
            'city'=>'required',
        ]);

        $image = $request->file('photo');
        $slug = str_slug($request->name);

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/supplier/';
            $image_url   = $upload_path.$imageName;
            $image->move($upload_path,$imageName);
        }else {
            $image_url = 'default.png';
        }

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['type'] = $request->type;
        $data['shop'] = $request->shop;
        $data['photo'] = $image_url;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;


        DB::table('suppliers')->insert($data);
        Toastr::success('Supplier Successfully Added :)','Success');
        return redirect()->route('supplier.index');
     }


     public function show($id){
        $supplier = DB::table('suppliers')->where('id',$id)->first();
        return view('admin.supplier.show',compact('supplier'));
    }

    public function edit($id){
        $supplier = DB::table('suppliers')->where('id',$id)->first();
        return view('admin.supplier.edit',compact('supplier'));
    }

    public function update(Request $request,$id){


        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'photo'=>'image|mimes:jpeg,jpg,png,bmp',
            'account_holder'=>'required',
            'account_number'=>'required',
            'bank_name'=>'required',
            'bank_branch'=>'required',
            'city'=>'required',
        ]);

        $image = $request->file('photo');
        $slug = str_slug($request->name);

        $supplier = DB::table('suppliers')->where('id',$id)->first();
        $image_path = $supplier->photo;

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/supplier/';
            $image_url   = $upload_path.$imageName;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image->move($upload_path,$imageName);
        }else {
            $image_url = $image_path;
        }

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['type'] = $request->type;
        $data['shop'] = $request->shop;
        $data['photo'] = $image_url;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        DB::table('suppliers')->where('id',$id)->update($data);
        Toastr::success('Supplier Successfully Updated :)','Success');
        return redirect()->route('supplier.index');

     }

     public function destroy($id){

        $supplier = DB::table('suppliers')
                    ->where('id',$id)
                    ->first();
        $image_path = $supplier->photo;
        if ($image_path) {
           unlink($image_path);
        }
        
        DB::table('suppliers')->where('id',$id)->delete();
        Toastr::success('Supplier Successfully Deleted :)','Success');
        return redirect()->route('supplier.index');

    }

}
