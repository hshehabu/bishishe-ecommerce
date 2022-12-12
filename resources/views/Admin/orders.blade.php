@extends('layouts.app')
@section('content')
@include('layouts.sidebar')
<div class="app-main" id="main">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 m-b-30">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="h2 d-inline text-white">All orders</h4>
                        <a href="{{ url('completed') }}" class="btn-sm btn-success float-right mx-2">completed</a>
                        <a href="{{ url('pending') }}" class="btn-sm btn-warning float-right">pending</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>total_payment</th>
                                    <th>ordered at</th>
                                    <th>product</th>
                                    <th>detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                <tr>
                                    <td>{{$item->name}}{{ $item->lname }}</td>
                                    <td>{{$item->address}}</td>
                                    <td><span class="{{ $item->status=='pending'? 'badge badge-warning-inverse':'badge badge-success-inverse' }}">{{ $item->status }}</span></td>
                                    <td>{{$item->total}} birr</td>
                                    <td>{{ date('d M Y - H:i:s', $item->created_at->timestamp) }}</td>
                                    <td>{{ $item->visible=='1'? 'present':'deleted' }}</td>
                                    <td><a href="{{ url('view/'.$item->id) }}" class="btn btn-primary">view</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>









        </div>

    </div>
</div>
@endsection