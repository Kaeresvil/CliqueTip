@extends('layouts.app')

@section('content')
<div class="d-flex flex-column container mt-5" style="width: 25vw; border-radius: 35px; background-color: #1c435a;">

    <form method="POST" action="{{ route('password.update') }}">
    @csrf
        <div class="d-flex justify-content-center input-group mb-2">
            <h2 class="text-center text-white pt-5" STYLE="font-size: 2vw;"> <b cl>RESET PASSWORD</b> </h2>
        </div>
        
        <div class="d-flex justify-content-center input-group mb-2">
            <div>
                <label for="email" class="input-group text-white" style="font-size: 1vw;">{{ __('Email Address') }}</label>
                <input style="border-radius: 10px; font-size: 1.2vw;" id="email" type="email" class="form-control @error('email') is-invalid @enderror input-group" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-center input-group mb-2">
            <div>
                <label for="password" class="input-group text-white" style="font-size: 1vw;">{{ __('Password') }}</label>
                <input style="border-radius: 10px; font-size: 1.2vw;" id="password" type="password" class="form-control @error('password') is-invalid @enderror input-group" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-center input-group mb-4">
            <div>
                <label for="password-confirm" class="input-group text-white" style="font-size: 1vw;">{{ __('Confirm Password') }}</label>
                <input style="border-radius: 10px; font-size: 1.2vw;" id="password-confirm" type="password" class="form-control input-group" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="d-flex justify-content-center  input-group mb-5">
            <div style="width: 16.5vw;">
                <button style="border-radius: 15px; font-size: 1.2vw; background-color: #eac145;" type="submit" class="btn btn-primary btn-block w-100 text-dark">{{ __('Reset Password') }}</button>
            </div>
        </div>

    </form>
</div>

@endsection
