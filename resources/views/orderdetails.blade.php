@extends('master')
@section("content")
<div class="container pt-4 pb-4">
  <div class="card">
    <div class="card-header bg-success">
      <h4>Your order view</h4>
    </div>
    <div class="card-body">
  <div class="row">
    <div class="col-md-7">
      <table class="table table-bordered">

        <thead>
          <tr>
            <th>name</th>
            <th>last name</th>
            <th>Shipping address</th>
             <th>Contact No.</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td>{{$order->name}}</td>
            <td>{{$order->lname }}</td>
            <td>{{$order->address}}</td>
            <td>{{ $order->phone }}</td>
            <td>{{$order->status}}</td>
          </tr>
     
        </tbody>
      </table>
    </div>
    <div class="col-md-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>image</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($order->orderitems as $item)
              <tr>
                <td>{{ $item->products->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>
                  <img src="/storage/{{ $item->products->gallery }}" alt="{{ $item->products->name }} image" height="70px" width="70px">
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
  <div class="card-footer">
    <h4 class="float-right">Grand total: {{$order->total}} ETB</h4>
  </div>
</div>
</div>

@endsection 