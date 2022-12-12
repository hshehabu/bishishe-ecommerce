@extends('master')
@section("content")
<div class="container pt-4">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">

        <thead>
          <tr>
            <th>name</th>
            <th>Address</th>
            <th>Status</th>
            <th>total</th>
            <th>detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $item)
          <tr>
            <td> {{$item->name}}{{ $item->lname }}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->total}}</td>
            <td><a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">view</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection 