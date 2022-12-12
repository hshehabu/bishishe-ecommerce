@extends('layouts.app')
@extends('layouts.scripts')
@section('content')
<div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
<div class="container">
    <div class="row no-gutters">
        <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1 mx-auto">
            <div class="d-flex align-items-center h-100-vh">
            <div class="login p-50">
                 <h1 class="mb-2 "> {{ __('Login') }}</h1>
               
                 @if (session('error'))
                 <div class="alert alert-danger">
                      {{ session('error') }}
                 </div>
              @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row ">
                            <div class="col-12">
                            <label for="email" class="control-label">{{ __('Email Address') }}</label>
                                <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                              
                            </div>
                       

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password" class="control-label">{{ __('Password') }}</label>

                            
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                </div>
                              
                            </div>
                        

                        
                            <div class="col-12 ml-4">
                                <div class="d-block d-sm-flex  align-items-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                       
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
