@extends('layouts.app')
@section('title','Supplier')
@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">



        <div class="wraper container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-picture text-center" style="background-image:url('{{ asset('public/admin/images/big/bg.jpg') }}')">
                        <div class="bg-picture-overlay"></div>
                        <div class="profile-info-name">
                            <img src="{{ URL::to($supplier->photo) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                            <h3 class="text-white">{{ $supplier->name }}</h3>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <div class="row user-tabs">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <ul class="nav nav-tabs tabs">
                        <li class="active tab">
                            <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active"> 
                                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                <span class="hidden-xs">About Me</span> 
                            </a> 
                        </li> 

                        <li class="tab" > 
                            <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                <span class="hidden-xs">Settings</span> 
                            </a> 
                        </li> 
                        <div class="indicator"></div></ul> 
                    </div>
                    <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
                        <div class="pull-right">
                            <div class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#"> Following <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li><a href="#">Poke</a></li>
                                    <li><a href="#">Private message</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Unfollow</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"> 

                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Name</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $supplier->name }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $supplier->phone }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $supplier->email }}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Location</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $supplier->city }}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Type</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $supplier->type }}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Account No.</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $supplier->account_number }}</p>
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->


                                    </div>



                                </div>
                            </div> 



                            <div class="tab-pane" id="settings-2">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit Profile</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="FullName">Full Name</label>
                                                <input type="text" value="John Doe" id="FullName" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Username">Username</label>
                                                <input type="text" value="john" id="Username" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="RePassword">Re-Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="AboutMe">About Me</label>
                                                <textarea style="height: 125px;" id="AboutMe" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                            </div>
                                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                        </form>

                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 
                        </div> 
                    </div>
                </div>
            </div> <!-- container -->

        </div> <!-- content -->


    </div>


@endsection
