@extends('layouts.app')

@section('css')

<style>
    .myimg{
        width:200px;
        height:200px;
        object-fit:cover;
    }
</style>
@endsection


@section('content')
<!-- User Information -->
<div class="d-flex flex-column container w-75 mt-2">
    <div class="d-flex justify-content-start p-1 ">

        <div style="margin-left: 7%; margin-top: 1%;">
            @if(Auth::user()->prof_image == null)
                <img src="{{ asset('uploads/user/profile.png')}}" class="img-circle elevation-2 myimg" alt="User Image" style="border-radius: 50%;">
            @elseif(Auth::user()->prof_image != null)
                <img src="{{ asset('uploads/user/'.(Auth::user()->prof_image))}}" class="img-circle elevation-2 myimg" alt="User Image" style="border-radius: 50%;">
            @endif
            
        </div>

        <div class="d-flex align-items-center w-25" style="margin-left: 5%;">
            <div class=" d-flex align-items-start flex-column" > 
                <div class="">
                    <h4 class="text-center mt-3 ">Name: {{Auth::user()->name}}</h4>
                </div>
                <div class="">
                    <h4 class="text-center mt-2 ">Email: {{Auth::user()->email}}</h4>
                </div>
                
                <div class="mt-3">
                    <a data-bs-toggle="collapse" href="#collapse_editProfile" role="button" aria-expanded="false" aria-controls="collapse_editProfile">
                        Edit Profile
                    </a>
                </div>
            </div>  
        </div>

        <!-- Description -->
        <div class="d-flex flex-column" style="margin-left: 0%; width: 40%;"> 
            <div class="p-2 mt-3">
                <h5 class="text-center">Description</h5>
                <div class="border h-100" style="border-radius: 10px; background-color: #c5a133;">
                    <p class="p-2 text-white text-center">
                        {{Auth::user()->description}}
                    </p>
                </div>

            </div>
        </div>  
        <!-- //Description -->
    </div>

    <!-- Edit Profile Collapse -->
    <div class="d-flex justify-content-center">
        <div class="collapse w-75 " id="collapse_editProfile">
            <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-body mt-3">
                    <div class="d-flex justify-content-center">
                        <h2>User Information</h2>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <div class="w-50">
                            <label for="name" class="input-group">{{ __('Name') }}</label>
                            <input style="border-radius: 10px;" id="name" type="text" class="form-control @error('name') is-invalid @enderror input-group" value="{{Auth::user()->name}}" name="name" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center mb-4">
                        <div class="w-50">
                            <label for="description" class="input-group">{{ __('Description') }}</label>
                            <textarea style="border-radius: 10px; height: 100px" class="form-control" placeholder="{{Auth::user()->description}}" id="description" name="description" autocomplete="description" autofocus></textarea>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <div class="w-50">
                            <label for="profilePicture" class="input-group">Profile Picture</label>
                            <input type="file" class="form-control-file" id="profilePicture" name="profilePicture">
                        </div>
                    </div>

                    <div class="d-flex justify-content-around">
                        <button data-bs-toggle="collapse" href="#collapse_editProfile" role="button" aria-expanded="false" aria-controls="collapse_editProfile" style="border-radius: 15px;" type="button" data-bs-toggle="collapse" class="btn btn-cancel text-dark">Cancel</button>
                        <button style="border-radius: 15px;" type="submit" class="btn btn-yellow text-dark">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- //Edit Profile Collapse -->

    <hr style="height: 3px;">
</div>
<!-- //User Information -->

@endsection

@section('js')

@endsection
