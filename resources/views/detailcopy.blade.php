@extends("master")
@section("content")

<div class="container-fluid" style="margin-bottom: 100px;margin-top:50px;">
    <div class="row">
        <div class="col-md-9 mx-auto">
             <div class="card shadow">
        <div class="card-body">
            <div class="row product-data">
                <div class="col-md-4 border-right">
                    <img src="\storage\{{$product['gallery']}}" alt="{{$product['name']}}" class="w-50"
                    style="height:200px;">
                </div>
                <div class="col-md-8 ">
                    <h2 class="mb-0">
                        {{ $product->name }}
                    </h2>
                    <hr>
                    <label><h4>ዋጋ : {{ $product->price }}</h4></label>
                    
                        <h5>{{ $product->description }}</h5>
                    
                    <hr>
                    @if ($product->quantity > 0)
                        <label class="badge bg-success">ክምችት አለ</label>
                        @else
                        <label class="badge bg-danger">ክምችት አልቋል</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <form name="kilo" action="/add_to_cart" method="POST">
                                @csrf
                                <label for="qnty">ብዛት</label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text dec-btn ">-</button>
                                    <input type="number" min="1" max="25" name="qnty" value="1"
                                        class="form-control text-center qty-input" >
                                    <button class="input-group-text inc-btn ">+</button>
                
                                </div>
                        </div>
                                <input type="hidden" name="cate" value="0">
                                <input type="hidden" name="price" value="{{$product['price']}} ">
                                <input type="hidden" name="name" value="{{ $product['name'] }}">
                                <input type="hidden" name='product_id' value={{$product['id']}}>
                              @if ($product->quantity>0)
                              <div style="display: flex; flex-direction: column; display:inline;">
                                <button class="btn btn-warning " type="submit" style="align-self: flex-start">
                                    ወደ ዘንቢል <i class="fa fa-shopping-cart"></i>
                                </button>
                              </div>
                              @endif
                               
                               

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
   
</div>
{{-- 
<div class="container-fluid">
    <div class="row  product-data">
        <div class="col-12 col-sm-6 ms-auto">
            <img src="\storage\{{$product['gallery']}}" alt="{{$product['name']}}" class=""
                style="height:200px;">
        </div>
        <div class="col-12 col-sm-6 my-8">
            <a href="/">ወደኋላ ተመለስ</a>
            <h4>{{$product['name']}} </h4>
            <h4> {{$product['description']}} </h4>

            <h4><span class="price">ዋጋ</span> :{{$product['price']}} ETB </h4>

            <form name="kilo" action="/add_to_cart" method="POST">
                @csrf
                <label for="qnty"><h6>ብዛት</h6></label>
                <div class="input-group text-center mb-3" style="width:130px;">
                    <button class="input-group-text dec-btn ">-</button>
                    <input type="number" min="1" max="25" name="qnty" value="1"
                        class="form-control text-center qty-input">
                    <button class="input-group-text inc-btn ">+</button>

                </div>
                <input type="hidden" name="cate" value="0">
                <input type="hidden" name="price" value="{{$product['price']}} ">
                <input type="hidden" name="name" value="{{ $product['name'] }}">
                <input type="hidden" name='product_id' value={{$product['id']}}>
                <button class="btn btn-md  btn-warning my-4">ወደ ዘንቢል <i class="fa fa-shopping-cart"></i> </button>
            </form>

        </div>
    </div>
</div> --}}
@endsection