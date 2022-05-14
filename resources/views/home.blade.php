@extends('layouts.app')

@section('css')
<style>
    .myimg{
        width:125px;
        height:125px;
        object-fit:cover;
    }
</style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-start p-1 ">
                        <div class="border" style="margin-left: 10%;">
                            <img src="{{ asset('uploads/profile/Patrick.jpg')}}" class="img-circle elevation-2 myimg" alt="User Image" style="border-radius: 50%;">
                            <h4 class="text-center mt-2 ">{{Auth::user()->name}}</h4>
                        </div>
                        <div class="border d-flex align-items-center" style="margin-left: 10%;">
                            <div class=" d-flex align-items-start flex-column" > 
                                <div class="">
                                    <a href="">Edit Profile</a>
                                </div>
                                <div class="mt-3">
                                    <a href="">Account Setting</a>
                                </div>
                            </div>  
                        </div>

                        <div class="border d-flex flex-column" style="margin-left: 10%; width: 40%;"> 
                            <div class="border p-2">
                                <h6 class="text-center">Interests</h6>
                                <h6 class="text-center">#Interests</h6>
                            </div>
                            <div class="border p-2">
                                <h6 class="text-center">Description</h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Post!') }}
                    {{ __('Feeds!') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection