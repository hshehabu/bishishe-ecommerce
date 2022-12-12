@extends('layouts.app')
@section('content')
@include('layouts.sidebar')
<div class="app-main" id="main">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h2 class="text-white h2 d-inline">view orders</h2>
                        
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-dark ">

                                <div class="h2 font-weight-bold ">Shipping details</div>
                                <hr>
                                <label for="">first name</label>
                                <h3 class="border">{{ $orders->name }}</h3>
                                <label for="">last name</label>
                                <h3 class="border">{{ $orders->lname }}</h3>
                                <label for="">shipping address</label>
                                <h3 class="border">{{ $orders->address }}</h3>
                                <label for="">Contact No.</label>
                                <h3 class="border">{{ $orders->phone }}</h3>
                                <label for="">Status</label>
                                <h3 class="border">{{ $orders->status }}</h3>
                                <label for="">Ordered at</label>
                                <h3 class="border">{{ date('d M Y - H:i:s', $orders->created_at->timestamp) }}</h3>

                            </div>
                            <div class="col-md-6 ">
                                <div class="h2 font-weight-bold text-dark">Order details</div>
                                <table class="table table-bordered text-dark">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name ?? 'item deleted'}}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img src="/storage/{{ $item->products->gallery ?? ''}}"
                                                    alt="{{ $item->products->name ?? 'deleted'}} image" height="70px" width="70px">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p class="h2 text-dark px-2">Total Price: {{ $orders->total }} Birr</p>
                                <div class="mt-5 mx-auto">
                                    <label for="" class="text-dark h4">Order status</label>
                                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <select class="form-select" name="status">
                                        <option {{ $orders->status=='pending'? 'selected':'' }} value="0">pending</option>
                                        <option {{ $orders->status=='completed'? 'selected':'' }} value="1">completed</option>
                                    </select>
                                    <div class="mt-4">
                                        <label for="" class="text-dark h4">visible to users</label>
                                        <input type="checkbox" name="visible" {{ $orders->visible=='1'? 'checked':'' }}> 
                                        
                                    </div>
                                    <button class="btn btn-success float-right" type="submit">update</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--
            <form action="{{url('delivered/'.$item->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-warning">delivered</button>
            </form> --}}






        </div>

    </div>
</div>
@endsection