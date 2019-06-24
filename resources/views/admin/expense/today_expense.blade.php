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
              <div class="col-md-12">
                <h3 class="text-center" style="color: red">TODAY EXPENSE : {{ $amount }} </h3>
                <div class="panel panel-default">
                    <div class="panel-heading bg-info">
                        <h3 class="panel-title">ALL EXPENSE<a href="{{ route('expense.create') }}"><span class="pull-right btn btn-sm btn-primary">Add Expense</span></a></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->details }}</td>
                                            
                                            <td>{{ $expense->amount }}</td>
                                            <td>

                                                <a href="{{ route('expense.edit',$expense->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>

                                                <a id="delete" href="{{ route('expense.destroy',$expense->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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

<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
