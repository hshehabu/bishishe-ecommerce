@extends('layouts.app')
@include('layouts.scripts')
@section('content')
@include('layouts.sidebar')
<div class="app-main" id="main">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 m-b-30">
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="h2 d-inline text-white">Products posted</h4>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>image</th>
                                    <th>name</th>
                                    <th>Stock</th>
                                    <th>price</th>
                                    <th>category</th>
                                    <th>posted at</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($earlier as $item)
                                <tr>
                                    <td><img src="/storage/{{$item->gallery}}" alt="{{$item['name']}} image"  height="70px" width="70px"></td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>{{$item['price']}} ETB</td>
                                    <td>{{$item['category']}}</td>
                                    <td>{{ date('d M Y - H:i:s', $item->created_at->timestamp) }}</td>
                                    <td><span class="{{ $item->status=='1'?'badge badge-success-inverse' : 'badge badge-danger-inverse'}}">{{ $item->status=='1'? 'Active':'hidden'}}</span></td>

                                    <td>
                                    <a href="edit_item/{{$item['id']}}" class="btn btn-xs btn-success btn-flat mx-2"><i class="fa fa-edit"></i> edit</a>
                                    <form action="{{ url('remove_item/'.$item->id)}}" method="post" class="d-inline">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm d-inline" data-toggle="tooltip" title='Delete'><i class="fa fa-minus"></i> Delete</button>
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
@section('contents')  
                                        
                        <form action="/search" class="navbar-form ">
                            <input type="text" name="query" placeholder="Search item"  style="width: 300px;">
                            <button type="submit" class="btn btn-primary ">Search</button>
                        </form>
                        
@endsection