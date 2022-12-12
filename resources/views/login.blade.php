@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto" style="padding-top: 200px;padding-bottom:250px;">
            <form method="POST" action="/log" enctype="multipart/form-data">
               @csrf
               <div class="form-group ">
                  <input class="text-dark form-control " type="tel"  name="phone" placeholder="ስልክ ቁጥር ያስገቡ"  required >
                <button type="submit" class="btn btn-warning mt-4 form-control">ግባ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection