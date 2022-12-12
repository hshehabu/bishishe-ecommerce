@extends('master')
@section("content")

<?php 
use App\Http\Controllers\ProductControllerCopy;
$total=0;
if(Session::has('user'))
{
  $total= ProductControllerCopy::cartItem();
  
  
}

?>
            
            @php
              $total_price=0;
            @endphp
           @if (session('limit'))
           <div class="alert alert-success">
               {{ session('limit') }}
               <a href="/ordernow" class="btn btn-success">አሁን እዘዝ</a>
           </div>
           @endif 
           <div class="container my-5">
            <div class="card">
              <div class="card-body">
                @php
                  if(!$total){
                    echo "you haven't added item to the cart";
                  }
                @endphp
                @foreach($product as $item)
                <div class=" row product-data d-flex  justify-content-center align-items-center">
                 <div class="col-12 col-md-2 my-auto">
                    <a  href="product/{{ $item->product->id }}">
                        <img src="/storage/{{$item->product->gallery}}" height="100px" width="100px">
                      </a>
                 </div>
                 <div class="col-md-3 my-auto">
                  <h6>{{$item->product->name}}</h6>
                 </div>
                 <div class="col-md-2 my-auto">
                  <h6>{{$item->product->price}}</h6>
                        
                 </div>
                 <div class="col-md-3 my-auto">

                 <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                    <div class="input-group text-center mb-3" style="width:130px;">
                     <button class="input-group-text dec-btn changeQuantity" >-</button>
                     <input type="number"  name="qty" class="form-control qty-input text-center"  value="{{ $item->quantity }}">
                     <button class="input-group-text inc-btn changeQuantity">+</button>
                   
                   </div>
                  
                          {{-- @php
                            $single_price=$item->product->price * $item->quantity;
                          @endphp
                           <span >X{{ $item->quantity }}</span>
                           <span class="ml-8">{{ $single_price }} ETB</span> --}}
                        
                 </div>
                 <div class="col-md-2 my-auto">
                  <a href="/removecart/{{$item->id}}" class="btn btn-danger remove-item" ><i class="fa fa-trash"></i> አውጣ</a>
                  
                 </div>
                </div>
                @php
                  $total_price+=$item->product->price * $item->quantity;
                @endphp
                <hr>
                @endforeach
              </div>
              <div class="card-footer">
                <h5>Total: {{ $total_price }}</h5>
                @php
                  if($total){
                    echo '<a class="btn btn-success btn-lg float-right" href="/ordernow"><i class="fa fa-credit-card pr-2"></i>እዘዝ</a>';

                  }else {
                    echo '<a class="btn btn-success btn-lg float-right" href="/"><i class="fa fa-shopping-cart pr-2"></i>ወደ ግብይቱ ተመለስ</a>';
                  }
                @endphp
   
              </div>
            </div>
           </div>
            
          
      
          

     
@endsection 