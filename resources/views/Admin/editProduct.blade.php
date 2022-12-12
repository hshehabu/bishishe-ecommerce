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
                                        <h5 class="mb-0 py-2 h2">Edit Product Detail</h5>
                                    </div>
                                    <div class="p-4">
                                        <form method="post" action="/update_item/{{$detail->id}}"
                                            enctype="multipart/form-data">
                                            @csrf



                                            <div class="row ">
                                                <div class="col-8 mx-auto mb-4">

                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value=" {{$detail->name}}">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                
                                                <div class="col-8 mx-auto mb-4">
                                                    <div class="form-group">
                                                        <label> Description</label>
                                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="10"
                                                            rows="5">
                                                                    {{$detail->description}}
                                                        </textarea>
                                                        @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>

                                                </div>

                                                <div class="col-8 mx-auto mb-4">
                                                    <label>Category</label>
                                                    <select name="category" class="form-control">
                                                        <option value="super_market">super_market</option>
                                                        <option value="Asbeza">Asbeza</option>


                                                    </select>

                                                </div>

                                            </div>

                                            <div class="form-group ">

                                                <div class="col-8 mx-auto ">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                                            value="{{$detail['price']}}">
                                                            @error('price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>

                                                </div>
                                                <div class="col-8 mx-auto ">
                                                <div class="form-group ">
                                                    <label>Quantity</label>
                                                    <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $detail['quantity'] }}">
                                                    @error('qty')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                </div>
                                                <div class="col-8 mx-auto ">
                                                <div class="form-group ">
                                                    <label>Status</label>
                                                    <input type="checkbox" class="form-control" name="status" {{ $detail->status=='1'? 'checked':'' }}>
                                                </div>
                                            </div>
                                                <div class="col-8 mx-auto">
                                                    <div class="p text-dark">please use images with white bg</div>
                                                    <div class="form-group">
                                                        <input type="file" name="file"
                                                            placeholder="/storage/{{$detail['gallery']}}" class="form-control @error('file') is-invalid @enderror">
                                                            
                                                            @error('file')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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