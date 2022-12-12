<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Bishishe</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('assets/js/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <link rel="stylesheet"  href="{{asset('css/bootstrap5.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('style2.css')}}" />
        <script src="https://kit.fontawesome.com/2f4b5409be.js" crossorigin="anonymous"></script>

    <!-- custom app -->
   
    
</head>

<body>
  
    
  {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

@if (session('status'))
<script>
  swal("{{ session('status') }}");
</script>
    
 
 @endif

    
</body>
<style>

#cover{
    background-image: url({{asset('fruit.jpg')}});
    width: 100%;
    height: auto;
    background-size: cover;
 
}
.cust-btn:hover {
  background-color: #000 !important;
  color: #FFC107;
}

    .cust {
  
  transition: 0.2s;
}
 @media only screen and (max-width: 600px) {
  .car{
    width: 100%;
  }
} 
/*
@media only screen and (min-width: 768px) {
  .mobile{
		display:none
	}
 } */
/* On mouse-over, add a deeper shadow */
.cust:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);

}


    .par{
position: relative;
}
.par span{
position: absolute;
top: -10px;
right: -8px; 
}
    .form-group.required .control-label:after { 
    color: #d00;
    content: "*";
    position: absolute;
    margin-left: 3px;
    top:1px;
   
}
.wana{
    width: 80%;
    margin-right: auto;
    margin-left: auto;

}
article{
    display: block;
}
.user_card{
    
    width:20%;
    border:1px solid silver;
    border-radius: 5px;
    padding:5px;
    margin: 5px;
    text-align: center;
    float: left;
    height: auto;
    margin-bottom: 20px;
   

}
    .checkout-form label{
        font-size: 16px;
        font-weight:bold;
        color: #000;
    }
    .checkout-form input{
        font-size: 14px;
        padding: 5px;
        font-weight: 400;
    }
    .btn:focus {
        box-shadow: none;
        outline: none;
    }

    .logo {
        width: 25%;
    }

    

    img.slider-img {
        height: 400px !important
    }

    .custom-product {
        height: 600px
    }

    .slider-text {
        background-color: #35443585 !important;
    }

    

    .trening-item {

        float: left;
        width: 20%;
        margin-left: 30px;
        height: 300px;
    }

    .search-box {
        width: 500px !important
    }

    .cart-list-devider {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px
    }

    .item {
        float: left;
        width: 30%;

    }

    .order_now {
        text-align: center;

        &_btn {
            width: 200px;
        }
    }

    .value-button {
        display: inline-block;
        border: 1px solid #ddd;
        margin: 0px;
        width: 40px;
        height: 20px;
        text-align: center;
        vertical-align: middle;
        padding: 11px 0;
        background: #eee;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .value-button:hover {
        cursor: pointer;
    }

    form #decrease {
        margin-right: -4px;
        border-radius: 8px 0 0 8px;
    }

    form #increase {
        margin-left: -4px;
        border-radius: 0 8px 8px 0;
    }

    form #input-wrap {
        margin: 0px;
        padding: 0px;
    }

    input#number {
        text-align: center;
        border: none;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        margin: 0px;
        width: 40px;
        height: 40px;
    }
    .btn{
	box-shadow: none !important
}
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

</html>