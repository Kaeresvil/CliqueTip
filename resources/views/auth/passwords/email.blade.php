@extends('layouts.app')

@section('content')
<div class="d-flex flex-column container mt-3" style="width: 25vw; border-radius: 35px; background-color: #1c435a;">

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="d-flex justify-content-center input-group mb-2">
            <h2 class="text-center text-white pt-5" STYLE="font-size: 2vw;"> <b cl>RESET PASSWORD</b> </h2>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="d-flex justify-content-center input-group mb-4">
            <div>
                <label for="email" class="input-group text-white" style="font-size: 1vw;">{{ __('Email Address') }}</label>
                <input style="border-radius: 10px; font-size: 1.2vw;" id="email" type="email" class="form-control @error('email') is-invalid @enderror input-group round-4" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>



        <div class="d-flex justify-content-center input-group">
            <div >
                <button style="border-radius: 15px; font-size: 1.2vw; background-color: #eac145;" type="submit" class="btn btn-primary btn-block w-100 text-dark">{{ __('Send Password Reset Link') }}</button>
            </div>
        </div>

        <div class="d-flex justify-content-center input-group mb-4">
            <div class=" ">
                @if (Route::has('password.request'))
                    <a class="btn btn-link pt-0 " style="font-size: 1vw;" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                @endif
            </div>
        </div>

    </form>
</div>
@endsection
