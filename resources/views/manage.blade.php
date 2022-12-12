@extends('layouts.app')
@include('layouts.scripts')
@section('content')
@include('layouts.sidebar')

<div class="app-main" id="main">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 m-b-30">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="h2 d-inline text-white">Bishishe Sellers</h4>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>hired at</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($manage as $sales)
                                <tr>
                                    <td>{{ $sales['id'] }}</td>
                                    <td>{{$sales['name']}}</td>
                                    <td> {{$sales['username']}}</td>
                                    <td>{{$sales['email']}}</td>
                                    <td>{{ date('d M Y - H:i:s', $sales->created_at->timestamp) }}</td>
                                    
                                    <td><span class="{{ $sales->status=='1'?'badge badge-success-inverse' : 'badge badge-danger-inverse'}}">{{ $sales->status=='1'? 'Active':'suspended'}}</span></td>
                                    <td>
                                        <a href="edit/{{$sales['id']}}" class="btn btn-xs btn-success btn-flat mx-2"><i class="fa fa-edit"></i> edit</a>
                                        <form action="{{ url('remove/'.$sales->id)}}" method="post" class="d-inline">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm_sales d-inline" data-toggle="tooltip" title='Delete'><i class="fa fa-minus"></i>Fire</button>
                                         </form>
                                        
                                        </td>
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