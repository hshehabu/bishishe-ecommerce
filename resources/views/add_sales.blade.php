@extends('layouts.app')
@include('layouts.scripts')
@section('content')
@include('layouts.sidebar')
<div class="app-main" id="main">
                <div class="container-fluid">
                        <!-- begin row -->
                            <div class="row">
                                <div class="col-md-6 m-b-30 mx-auto ">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mr-4 pr-4 border-right ">
                                        <h1>Add new Sales</h1>
                                    </div>
                                    
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->

                        <!--mail-Compose-contant-start-->
                        <div class="row account-contant">
                            <div class="col-6 mx-auto">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            
                                            <div class="col-12">
                                                <div class="page-account-form">

                                                    <div class="p-4">
                                                    <form method="POST" action="{{ route('add-sales') }}">
                                                             @csrf

                            <div class="row ">
                         <div class="col-8 mx-auto mb-4">
                            <label for="name" class="control-label">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"   autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                      

                         <div class="col-8 mx-auto mb-4">
                            <label for="email" class="control-label">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  autocomplete="email"
                                                          >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
              
                            <div class="col-8 mx-auto mb-4">
                                <div class="form-group">
                                <label for="username" class="control-label">username</label>
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username"   autocomplete="username"
                            >
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                               
                            </div>
                            <div class="col-8 mx-auto mb-4">
                                <div class="form-group">
                                <label for="status" class="control-label">status</label>
                                <input id="status" type="checkbox" class="form-control @error('status') is-invalid @enderror" name="status"   autocomplete="status"
                                >
                               
                                </div>
                               
                            </div>
                            
                                <input id="role" type="hidden" class="form-control @error('role') is-invalid @enderror" name="role"  value="sales">

                                
                            <!-- <input type="hidden" name="role" value="1"> -->
                            <div class="col-8 mx-auto ">
                                <div class="form-group">
                                <label for="password" class="control-label">Password</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                           </span>
                                   @enderror
                                </div>
                           
                            </div>
                            <div class="col-8 mx-auto">
                                <div class="from-group">
                            <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                                </div>

                            </div>
                            
                    
                            <div class="col-8 mx-auto col-sm-6 offset-md-4 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--mail-Compose-contant-end-->
                    </div>
</div>
@endsection