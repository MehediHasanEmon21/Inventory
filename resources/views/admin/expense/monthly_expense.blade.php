@extends('layouts.app')
@section('title','Expense')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row clearfix">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">{{ config('app.name') }} !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('today-expense.index') }}">Expense</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div>
                <a class="btn btn-sm bg-info text-white" href="{{ route('january.expense') }}">January</a>
                <a class="btn btn-sm bg-success text-white" href="{{ route('february.expense') }}">February</a>
                <a class="btn btn-sm bg-primary text-white" href="{{ route('march.expense') }}">March</a>
                <a class="btn btn-sm bg-danger text-white" href="{{ route('april.expense') }}">April</a>
                <a class="btn btn-sm bg-primary text-white" href="{{ route('may.expense') }}">May</a>
                <a class="btn btn-sm bg-warning text-white" href="{{ route('june.expense') }}">June</a>
                <a class="btn btn-sm bg-info text-white" href="{{ route('july.expense') }}">July</a>
                <a class="btn btn-sm bg-success text-white" href="{{ route('august.expense') }}">August</a>
                <a class="btn btn-sm bg-primary text-white" href="{{ route('september.expense') }}">September</a>
                <a class="btn btn-sm bg-danger text-white" href="{{ route('october.expense') }}">October</a>
                <a class="btn btn-sm bg-info text-white" href="{{ route('november.expense') }}">November</a>
                <a class="btn btn-sm bg-success text-white" href="{{ route('december.expense') }}">December</a>
            </div>
            <!-- Start Widget -->
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-info">
                        <h3 class="panel-title"> {{ date('F') }} MONTHLY EXPENSE<a href="{{ route('yearly.expense') }}"><span class="pull-right btn btn-sm btn-primary">Yearly Expense</span></a></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Details</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->details }}</td>
                                            
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->amount }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <h4 style="color: red">Total Expense : {{ $amount }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
            <!-- End row--


           

            </div> <!-- container -->

        </div> <!-- content -->

        
    </div>

@endsection
