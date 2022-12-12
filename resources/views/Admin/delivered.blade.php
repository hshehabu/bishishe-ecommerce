@extends('layouts.app')
@section('content')
@include('layouts.sidebar')
<div class="app-main" id="main">
     <div class="container-fluid">
        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-lg-flex flex-nowrap align-items-center">
                                    <div class="page-title mr-4 pr-4 border-right ">
                                        <h1>Delivered items</h1>
                                    </div>
                    
                                </div>
                                <!-- end page title -->
                            </div>
                            <div class="col-sm-4">
                        @foreach($delivered as $item)
                                    <p class="h4">Name : {{$item->name}}</p >
                                    <p class="h6">quantity : {{$item->quantity}}</p >
                                     <p class="h6 bold">Delivery Status : {{$item->status}}</p>
                                    <p class="h6 bold">Address : {{$item->address}}</p>
                                    <p class="h6 bold">Payment Status : {{$item->payment_status}}</p>
                                    <p class="h6 bold">Payment Method : {{$item->payment_method}}</h5>
                                    <form action="{{url('done/'.$item->id)}}" method="post">
                                        @csrf
                                    <button type="submit" class="btn btn-warning">Done</button>
                                     </form>
                                    @endforeach
                                   
                        </div>
                        
          
   
          
        </div>
    </div>
</div>
@endsection