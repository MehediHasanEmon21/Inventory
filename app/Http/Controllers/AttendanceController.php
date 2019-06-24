<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
class AttendanceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function take_attendance(){
    	$employees = DB::table('employees')->get();
    	return view('admin.attendance.take_attendance',compact('employees'));
    }

    public function store_attendance(Request $request){

        $date = $request->att_date;
        $att_date = DB::table('attendances')->where('att_date',$date)->first();
        if ($att_date) {
            Toastr::error('Today Attandance Already Taken );','Error');
            return redirect()->back();
        }else{

            foreach ($request->emp_id as $id) {
            $data[] = [
                'emp_id'=>$id,
                'attendance'=>$request->attendance[$id],
                'att_date'=>$request->att_date,
                'att_month'=>$request->att_month,
                'att_year'=>$request->att_year,
                'edit_date'=>$request->edit_date,
            ]; 
        }

        DB::table('attendances')->insert($data);
        Toastr::success('Attandance Taken Today :)','Success');
        return redirect()->back();
        }
    	
    }

    public function all_attendance(){

        $attendances = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('admin.attendance.all_attendance',compact('attendances'));
         
    } 

    public function edit_attendance($edit_date){

        $date = DB::table('attendances')->where('edit_date',$edit_date)->first();
        $employees_att = DB::table('attendances')
                        ->join('employees','attendances.emp_id','=','employees.id')
                        ->select('employees.name','employees.photo','attendances.*')
                        ->where('edit_date',$edit_date)->get();
        return view('admin.attendance.edit_attendance',compact('employees_att','date'));
    }

    public function update_attendance(Request $request){

        foreach ($request->id as $id) {
            $data = [
                'attendance'=>$request->attendance[$id],
                'att_date'=>$request->att_date,
                'att_month'=>$request->att_month,
                'att_year'=>$request->att_year,
                'edit_date'=>$request->edit_date,
            ];

            DB::table('attendances')->where(['edit_date'=>$request->edit_date,'id'=>$id])->update($data); 
        }

        Toastr::success('Attandance Updated Successfully :)','Success');
        return redirect()->route('all.attendance');
        
    }

    public function show_attendance($edit_date){

        $date = DB::table('attendances')->where('edit_date',$edit_date)->first();
        $employees_att = DB::table('attendances')
                        ->join('employees','attendances.emp_id','=','employees.id')
                        ->select('employees.name','employees.photo','attendances.*')
                        ->where('edit_date',$edit_date)->get();
        return view('admin.attendance.show_attendance',compact('employees_att','date'));
    }
}
