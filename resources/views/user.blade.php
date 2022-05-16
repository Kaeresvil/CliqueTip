
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .myimg{
        width:130px;
        height:130px;
        object-fit:cover;
        font-size:1vw;
    }
</style>
@endsection


@section('content')
<!-- User Information -->
<div class="d-flex flex-column w-75 container">
    <div class="d-flex justify-content-center">
        <div class="mr-3">
            @if(Auth::user()->prof_image == null)
                <img src="{{ asset('uploads/user/profile.png')}}" class="border img-circle elevation-2 myimg" alt="User Image" style="border-radius: 50%; ">
            @elseif(Auth::user()->prof_image != null)
                <img src="{{ asset('uploads/user/'.(Auth::user()->prof_image))}}" class="border img-circle elevation-2 myimg" alt="User Image" style="border-radius: 50%;">
            @endif
        </div>
        <div class="text-start d-flex align-items-center ml-3">
            <div>
                <h1 class="" style="font-size:2.5vw; color: #64707d;">Name: {{Auth::user()->name}}</h1>
                <h4 class="" style="font-size:1vw; color: #64707d;">Email: {{Auth::user()->email}}</h4>
                <h4  style="font-size:1vw;">
                    <a style="font-size:1vw; color: #4081c5;" data-bs-toggle="collapse" href="#collapse_editProfile" role="button" aria-expanded="false" aria-controls="collapse_editProfile">
                        Edit Profile
                    </a>
                </h4>
            </div>
        </div>
    </div>
    <!-- Edit Profile Collapse -->
    <div class="d-flex justify-content-center" >
        <div class="collapse w-50 " id="collapse_editProfile" >
            <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-body mt-3" style="background-color: #1c435a;">
                    <div class="d-flex justify-content-center">
                        <h2 class="text-white" style="font-size:2vw;">User Information</h2>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <div class="w-50">
                            <label for="name" class="input-group text-white" style="font-size:1vw;">{{ __('Name') }}</label>
                            <input style="border-radius: 10px; font-size:1vw;" id="name" type="text" class="form-control @error('name') is-invalid @enderror input-group" value="{{Auth::user()->name}}" name="name" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="font-size:1vw;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <div class="w-50 text-white">
                            <label for="profilePicture" class="input-group text-white" style="font-size:1vw;">Profile Picture</label>
                            <input type="file" class="form-control-file" id="profilePicture" name="profilePicture" style="font-size:1vw;">
                        </div>
                    </div>

                    <div class="d-flex justify-content-around">
                        <button data-bs-toggle="collapse" href="#collapse_editProfile" role="button" aria-expanded="false" aria-controls="collapse_editProfile" style="border-radius: 15px; font-size:1vw;" type="button" data-bs-toggle="collapse" class="btn btn-cancel text-white">Cancel</button>
                        <button style="border-radius: 15px; font-size:1vw;" type="submit" class="btn btn-yellow text-white">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- //Edit Profile Collapse -->


    <hr style="height: 2px;">

    <div>
        <h4 class="fw-bolder" style="font-size:2vw">My Posts</h4>
    </div>
    <div>
        <div class="card card-body" style="background-color: #1c435a;">
            <div class="card card-body" style="background-color: #fff;">

            </div>
        </div>
    </div>
</div>
<!-- //User Information -->

@endsection

@section('js')

@endsection
