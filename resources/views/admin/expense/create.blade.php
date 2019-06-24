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

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                            <h3 class="panel-title">ADD EXPENSE
                                <a href="{{ route('today-expense.index') }}"><span class="pull-right btn btn-sm btn-info">Today</span></a>
                                 <a href=""><span class="pull-right btn btn-sm btn-primary">This Month</span></a>
                        </h3>
                           @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('today-expense.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="details">Details</label>
                                    <textarea class="form-control" rows="5" name="details" ></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter amount">
                                </div>

                                

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="month" name="month" value="{{ date('F') }}">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="month" name="month" value="{{ date('F') }}">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="date" name="date" value="{{ date('d/m/y') }}">
                                </div>

                                 <div class="form-group">
                                    <input type="hidden" class="form-control" id="year" name="year" value="{{ date('Y') }}">
                                </div>

                                
                               
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div> 
            <!-- End row--


           

            </div> <!-- container -->

        </div> <!-- content -->

        
    </div>


@endsection
