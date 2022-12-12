<?php 
use App\Http\Controllers\ProductControllerCopy;
$total=0;
if(Session::has('user'))
{
  $total= ProductControllerCopy::cartItem();
  
  
}

?>

<nav class="navbar navbar-expand-lg navbar m-0 p-0">
    <div id="cover">
  <div class="container-fluid">
    <div class="row">
      <div class="col-8 mx-auto py-4">
        <a href="/"><img class="w-100" style="min-height: 50px;" src="{{asset('Bishishe.png')}}"
          alt="bishishe logo"></a>
      </div>
      
   
    </div>
  </div>
  </div>
</nav>
<div class=" bg-warning pt-2 pb-2">
  <div class="container-fluid">
    <div class="row ">
      <div class="col-4 px-1">
        <form action="/category" method="get">
          <button type="submit" class="btn btn-outline-warning btn-block" value="super_market" name="category">
            
            <span class="text-dark font-weight-bold">
              
              ሱፐር ማርኬት
            </span>
          </button>
        </form>
      </div>
      <div class="col-4 px-1">
        <form action="/category" method="get">
          <button type="submit" class="btn btn-outline-warning btn-block" value="Asbeza" name="category">
            <span class="text-dark font-weight-bold">
              አስቤዛ
            </span>
            </buttton>
        </form>
      </div>
      <div class="col-4">
       
            <div class="float-end  ">
             
            @if(Session::has('user'))
             <a href="/cartlist" class="pr-3 pl-2"><span class="par">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" fill="dark" class="bi bi-cart4"
                  viewBox="0 0 16 16">
                  <path
                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                </svg>
                <span class=" badge rounded-pill bg-dark"> {{$total}}</span>
              </span>

            </a>
            <div class="btn-group dropdown pr-3">
              <i class="fa fa-user-circle text-success" style="font-size: 25px" data-bs-toggle="dropdown" aria-expanded="false">
               
              </i>
              <ul class="dropdown-menu">
                <li><a href="/myorders"  class="dropdown-item">የኔ ትእዛዞች</a></li>
                <li><a href="/logout" class="dropdown-item">ውጣ</a></li>
              </ul>
            </div>
            @else
            <a href="/log" class="pr-2 text-dark font-weight-bold"> Login</a>
            <a href="/reg" class="text-dark font-weight-bold">Register</a>
           @endif
         
            </div>
          </div>
          
       
    </div>




  </div>
</div>