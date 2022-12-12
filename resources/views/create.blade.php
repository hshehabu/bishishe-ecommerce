@extends('layouts.app')
@include('layouts.scripts')
@section('content')
@include('layouts.sidebar')


    <div class="app-main" id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 m-b-30 mx-auto ">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mr-4 pr-4 border-right ">
                            <h1>Add new Product</h1>
                            
                            
                        </div>

                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <div class="row account-contant">
                <div class="col-10 mx-auto">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="row no-gutters">

                                <div class="col-12">
                                    <div class="page-account-form">

                                        <form method="post" action="{{ route('create.store') }}"
                                            enctype="multipart/form-data" id="upload-image">
                                            <!-- Add CSRF Token -->
                                            @csrf

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group ">
                                                        <label>Product Name</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" >
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group ">
                                                        <label> Description</label>
                                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="10"
                                                            rows="5">

                                                       </textarea>
                                                       @error('description')
                                                       <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                       </span>
                                                   @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group ">
                                                        <label>Category</label>
                                                        <select name="category" class="form-control">
                                                            <option value="super_market">super_market</option>
                                                            <option value="Asbeza">Asbeza</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group ">
                                                        <label>Price</label>
                                                        <input type="text"  class="form-control @error('price') is-invalid @enderror" name="price" min="1">
                                                        @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group ">
                                                        <label>Quantity</label>
                                                        <input type="number"  class="form-control @error('qty') is-invalid @enderror" name="qty"  min="1">
                                                        @error('qty')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group ">
                                                        <label>Status</label>
                                                        <input type="checkbox" class="form-control" name="status">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div class="p text-dark"></div>
                                                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" data-bs-toggle="tooltip" data-bs-placement="right" title="please use images with white bg">
                                                        @error('file')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-primary">Submit</button>

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
    @endsection
    @section('contents')

    <form action="/search" class="navbar-form ">
        <input type="text" name="query" placeholder="Search item" style="width: 300px;">
        <button type="submit" class="btn btn-primary ">Search</button>
    </form>
    </li>

    @endsection