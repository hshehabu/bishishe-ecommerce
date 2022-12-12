
@extends('layouts.app')
@include('layouts.scripts')
@section('content')

      <div class="container">
         <div class="row">
            
            <a href="/earlier">back</a>   
               @foreach($products as $item)
               <div class="item">
               <h2><span>Product name: </span> {{$item['name']}}</h2>
                  <h3><span>description: </span> {{$item['description']}}</3>
                    <h3><span>category: </span> {{$item['category']}}</h3>
                      <h3><span>Price: </span> {{$item['price']}}</h3>
               </div>
               
                        @endforeach

         
    
     </div>
   </div>
@endsection
               @section('contents')  
                                        
                    <form action="/search" class="navbar-form ">
                            <input type="text" name="query" placeholder="Search item"  style="width: 300px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                       </li>

                           @endsection
