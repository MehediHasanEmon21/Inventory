<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$categories = DB::table('categories')->get();
    	return view('admin.category.index',compact('categories'));
    }

    public function create(){


    	return view('admin.category.create');
    }

    public function store(Request $request){

    	$this->validate($request,[
            'category_name'=>'required',
            
        ]);

        

        $data = array();
        $data['category_name'] = $request->category_name;


        DB::table('categories')->insert($data);
        Toastr::success('Category Successfully Added :)','Success');
        return redirect()->route('category.index');
     }

     public function edit($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){


        $this->validate($request,[
            'category_name'=>'required',
            
        ]);

        
        $data = array();
        $data['category_name'] = $request->category_name;

        DB::table('categories')->where('id',$id)->update($data);
        Toastr::success('Category Successfully Updated :)','Success');
        return redirect()->route('category.index');

     }

     public function destroy($id){

        $customer = DB::table('categories')
                    ->where('id',$id)
                    ->first();
        
        DB::table('categories')->where('id',$id)->delete();
        Toastr::success('Category Successfully Deleted :)','Success');
        return redirect()->route('category.index');

    }
}
