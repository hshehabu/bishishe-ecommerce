@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto" style="padding-top: 200px;padding-bottom:250px;">
            <form method="POST" action="/reg" enctype="multipart/form-data">
               @csrf
               <div class="form-group ">
                
                <input class="text-dark form-control @error('phone') is-invalid @enderror"  type="tel"  name="phone" placeholder="ስልክ ቁጥር ያስገቡ"  pattern=[0-9]{10} required >
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              <button type="submit" class="btn btn-primary mt-4 form-control">መዝግብ</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection