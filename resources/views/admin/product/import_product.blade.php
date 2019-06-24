@extends('layouts.app')
@section('title','Import-Export')
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
                        <li><a href="{{ route('category.index') }}">Category</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">PRODUCT IMPORT<a href="{{ route('export') }}"><span class="pull-right btn btn-sm btn-success">Download Xlss</span></a></h3>
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
                            <form role="form" method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="import_product">Xlss File Import </label>
                                    <input type="file" id="name" name="import_product">
                                </div>

                                
                               
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Upload</button>
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
