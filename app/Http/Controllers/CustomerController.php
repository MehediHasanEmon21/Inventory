<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class CustomerController extends Controller
{	
	public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $customers = DB::table('customers')->get();
        return view('admin.customer.index',compact('customers'));
    }

    public function create(){
    	return view('admin.customer.create');
    }

    public function store(Request $request){

    	$this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:customers',
            'phone'=>'required',
            'address'=>'required',
            'photo'=>'required|image|mimes:jpeg,jpg,png,bmp',
            'account_holder'=>'required',
            'account_number'=>'required|unique:customers',
            'bank_name'=>'required',
            'bank_branch'=>'required',
            'city'=>'required',
        ]);

        $image = $request->file('photo');
        $slug = str_slug($request->name);

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/customer/';
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
        $data['shopname'] = $request->shopname;
        $data['photo'] = $image_url;
        $data['nid_no'] = $request->nid_no;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;


        DB::table('customers')->insert($data);
        Toastr::success('Customer Successfully Added :)','Success');
        return redirect()->back();
    }

    public function show($id){
        $customer = DB::table('customers')->where('id',$id)->first();
        return view('admin.customer.show',compact('customer'));
    }

    public function edit($id){
        $customer = DB::table('customers')->where('id',$id)->first();
        return view('admin.customer.edit',compact('customer'));
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

        $customer = DB::table('customers')->where('id',$id)->first();
        $image_path = $customer->photo;

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/customer/';
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
        $data['shopname'] = $request->shopname;
        $data['photo'] = $image_url;
        $data['nid_no'] = $request->nid_no;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        DB::table('customers')->where('id',$id)->update($data);
        Toastr::success('Customer Successfully Updated :)','Success');
        return redirect()->route('customer.index');

     }

     public function destroy($id){

        $customer = DB::table('customers')
                    ->where('id',$id)
                    ->first();
        $image_path = $customer->photo;
        if ($image_path) {
           unlink($image_path);
        }
        
        DB::table('customers')->where('id',$id)->delete();
        Toastr::success('Customer Successfully Deleted :)','Success');
        return redirect()->route('customer.index');

    }
}
