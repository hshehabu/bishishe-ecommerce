@extends('layouts.app')
@include('layouts.scripts')
@section('content')
@include('layouts.sidebar')

<div class="app-main" id="main">
    <div class="container-fluid">
        <div class="row account-contant">
            <div class="col-6 mx-auto">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="row no-gutters">

                            <div class="col-12">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2 h2">Edit Sales Detail</h5>
                                    </div>
                                    <div class="p-4">
                                        <form method="post" action="/update/{{$detail->id}}"
                                            enctype="multipart/form-data">
                                            @csrf



                                            <div class="row ">
                                                <div class="col-8 mx-auto mb-4">

                                                    <label>Sales Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value=" {{$detail->name}}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-8 mx-auto mb-4">
                                                    <div class="form-group">
                                                        <label>User name</label>
                                                        <input type="text"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            name="username" value="{{$detail['username']}}">
                                                        @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-8 mx-auto mb-4">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{$detail['email']}}">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>

                                                </div>
                                                <div class="col-8 mx-auto mb-4">
                                                    <div class="form-group">
                                                        <label >status</label>
                                                        <input id="status" type="checkbox"
                                                            name="status" autocomplete="status" {{
                                                            $detail['status']=='1' ? 'checked' :'' }}>

                                                    </div>

                                                </div>

                                                <div class="col-8 mx-auto col-sm-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        update
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
    </div>

</div>
@endsection