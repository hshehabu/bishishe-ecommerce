@extends('master')
@section("content")
@if (session('limit'))
<div class="alert alert-success">
    {{ session('limit') }}
    <a href="/ordernow" class="btn btn-success">አሁን እዘዝ</a>
</div>
@endif
      <div class="">
        <img src="{{asset('img2.jpg')}}" class="d-block mx-auto" style="height: 500px;min-width:90%;max-width:100%;" alt="First slide">
      </div>
     
   


<div class="container mt-2">
  <h2 class="decorated pt-3"><span>Super Market</span></h2>
  <div class="py-4">
    <div class="container">
      <div class="row">
        @foreach($product as $item)
        <div class="col-sm-6 col-md-3 mb-4">
          <a href="product/{{ $item['id'] }}">
          <div class="card h-100 pb-4 cust" >
            <div class="card-body text-center">
            <img src="\storage\{{$item['gallery']}} " class="img-fluid" alt="">

              <div class="d-flex justify-content-center align-items-center">
                <h4 >{{ $item->name }}</h4>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <h5>Br {{ $item->price }}</h5>
              </div>
              
            </div>
            <div class="card-text bg-white text-center ">
              <form name="kilo" action="/add_to_cart" method="POST">
                @csrf

               <button class="btn btn-warning " type="submit">ወደ ዘንቢል <i class="fa fa-shopping-cart"></i>
 
                <input type="hidden" name="cate" value="2">
                <input type="hidden" name="qnty" value="1">
                <input type="hidden" name="price" value="{{$item['price']}} ">
                <input type="hidden" name="name" value="{{ $item['name'] }}">
                <input type="hidden" name='product_id' value={{$item['id']}}>
               </form>
            </div>
          </div>
        </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
  






@endsection