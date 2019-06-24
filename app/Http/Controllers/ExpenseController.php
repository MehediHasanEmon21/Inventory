<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use DB;
class ExpenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$date = date('d/m/y');
    	$expenses = DB::table('expenses')->where('date',$date)->get();
    	$amount = DB::table('expenses')->where('date',$date)->get()->sum('amount');
    	return view('admin.expense.today_expense',compact('expenses','amount'));
    }

    public function monthly_expense(){

    	$month = date('F');
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function yearly_expense(){

    	$year = date('Y');
    	$expenses = DB::table('expenses')->where('year',$year)->get();
    	$amount = DB::table('expenses')->where('year',$year)->get()->sum('amount');
    	return view('admin.expense.yearly_expense',compact('expenses','amount'));
    }

    public function create(){

    	return view('admin.expense.create');
    }

    public function store(Request $request){


    	$this->validate($request,[
    		'details'=>'required',
    		'amount'=>'required',
    		'month'=>'required',
    		'date'=>'required',
    		'year'=>'required',
    	]);

    	

    	$data = array();
    	$data['details'] = $request->details;
    	$data['amount'] = $request->amount;
    	$data['month'] = $request->month;
    	$data['date'] = $request->date;
    	$data['year'] = $request->year;

    	DB::table('expenses')->insert($data);
    	Toastr::success('Expense Successfully Added :)','Success');
    	return redirect()->route('today-expense.index');
    }

    public function destroy($id){

        $expense = DB::table('expenses')
                    ->where('id',$id)
                    ->first();
   
        
        DB::table('expenses')->where('id',$id)->delete();
        Toastr::success('Expense Successfully Deleted :)','Success');
        return redirect()->route('today-expense.index');

    }

    public function edit($id){
        $expense = DB::table('expenses')->where('id',$id)->first();
          return view('admin.expense.edit',compact('expense'));
    }

    public function update(Request $request,$id){

       $this->validate($request,[
    		'details'=>'required',
    		'amount'=>'required',
    		'month'=>'required',
    		'date'=>'required',
    		'year'=>'required',
    	]);

        $data = array();
    	$data['details'] = $request->details;
    	$data['amount'] = $request->amount;
    	$data['month'] = $request->month;
    	$data['date'] = $request->date;
    	$data['year'] = $request->year;


        DB::table('expenses')->where('id',$id)->update($data);
        Toastr::success('Expense Successfully Updated :)','Success');
        return redirect()->route('today-expense.index');

    }

    public function january_expense(){

    	$month = 'January';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function february_expense(){

    	$month = 'February';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function march_expense(){

    	$month = 'March';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function april_expense(){

    	$month = 'April';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function may_expense(){

    	$month = 'May';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function june_expense(){

    	$month = 'June';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function july_expense(){

    	$month = 'July';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function august_expense(){

    	$month = 'August';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function septemner_expense(){

    	$month = 'September';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function october_expense(){

    	$month = 'October';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function november_expense(){

    	$month = 'November';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }

    public function december_expense(){

    	$month = 'December';
    	$expenses = DB::table('expenses')->where('month',$month)->get();
    	$amount = DB::table('expenses')->where('month',$month)->get()->sum('amount');
    	return view('admin.expense.monthly_expense',compact('expenses','amount'));
    }


}
