<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class EmployeeController extends Controller
{	
	 public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$employees = DB::table('employees')->get();
    	return view('admin.employee.index',compact('employees'));
    }

    public function create(){

    	return view('admin.employee.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required|unique:employees',
    		'phone'=>'required',
    		'address'=>'required',
    		'experience'=>'required',
    		'photo'=>'required|image|mimes:jpeg,jpg,png,bmp',
    		'nid_no'=>'required|unique:employees',
    		'salary'=>'required',
    		'vacation'=>'required',
    		'city'=>'required',
    	]);

    	$image = $request->file('photo');
    	$slug = str_slug($request->name);

    	if (isset($image)) {
    		
    		$currentDate = Carbon::now()->toDateString();
    		$imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
    		$upload_path ='public/employee/';
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
    	$data['experience'] = $request->experience;
    	$data['photo'] = $image_url;
    	$data['nid_no'] = $request->nid_no;
    	$data['salary'] = $request->salary;
    	$data['vacation'] = $request->vacation;
    	$data['city'] = $request->city;

    	DB::table('employees')->insert($data);
    	Toastr::success('Employee Successfully Added :)','Success');
    	return redirect()->route('employee.index');
    }

    public function show($id){
        $employee = DB::table('employees')->where('id',$id)->first();
        return view('admin.employee.show',compact('employee'));
    }

    public function destroy($id){

        $employee = DB::table('employees')
                    ->where('id',$id)
                    ->first();
        $image_path = $employee->photo;
        if ($image_path) {
           unlink($image_path);
        }
        
        DB::table('employees')->where('id',$id)->delete();
        Toastr::success('Employee Successfully Deleted :)','Success');
        return redirect()->route('employee.index');

    }

    public function edit($id){
        $employee = DB::table('employees')->where('id',$id)->first();
        return view('admin.employee.edit',compact('employee'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'experience'=>'required',
            'photo'=>'image|mimes:jpeg,jpg,png,bmp',
            'nid_no'=>'required',
            'salary'=>'required',
            'vacation'=>'required',
            'city'=>'required',
        ]);

        $image = $request->file('photo');
        $slug = str_slug($request->name);

        $employee = DB::table('employees')->where('id',$id)->first();
        $image_path = $employee->photo;

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/employee/';
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
        $data['experience'] = $request->experience;
        $data['photo'] = $image_url;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;

        DB::table('employees')->where('id',$id)->update($data);
        Toastr::success('Employee Successfully Updated :)','Success');
        return redirect()->route('employee.index');

    }
}
