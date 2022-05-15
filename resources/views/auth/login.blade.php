@extends('layouts.app')

@section('content')
<div class="d-flex flex-column container w-25 mt-5" style=" border-radius: 35px; background-color: #1c435a;">

    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="d-flex justify-content-center input-group mb-2">
            <h2 class="text-center text-white pt-5"> <b cl>LOG IN</b> </h2>
        </div>
        
        <div class="d-flex justify-content-center input-group mb-4">
            <div>
                <label for="email" class="input-group text-white">{{ __('Email Address') }}</label>
                <input style="border-radius: 10px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror input-group round-4" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-center input-group mb-4">
            <div>
                <label for="password" class="input-group text-white">{{ __('Password') }}</label>
                <input style="border-radius: 10px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror input-group" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-center input-group">
            <div class=" w-50  ">
                <button style="border-radius: 15px; background-color: #eac145;" type="submit" class="btn btn-primary btn-block w-100 text-dark">Log in</button>
            </div>
        </div>

        <div class="d-flex justify-content-center input-group p-0 mb-5">
            <div class=" w-50  p-0">
                @if (Route::has('password.request'))
                    <a class="btn btn-link pt-0 pb-0" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

    </form>
</div>

@endsection
