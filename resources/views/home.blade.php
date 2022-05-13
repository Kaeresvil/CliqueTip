@extends('layouts.app')

@section('css')
<style>
    .myimg{
        width:150px;
        height:150px;
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
                    <div class="d-flex justify-content-start p-1">
                        <div class="border" style="margin-left: 10%;">
                            <img src="{{ asset('uploads/profile/Patrick.jpg')}}" class="img-circle elevation-2 myimg" alt="User Image" style="border-radius: 50%;">
                        </div>
                        <div class="border" style="margin-left: 10%;"> 
                            <li>
                                Full Name
                            </li>
                            <li>
                                Edit Profile
                            </li>
                            <li>
                                Account Setting
                            </li>
                        </div>  
                        <div class="border" style="margin-left: 10%; width: 30%;"> 
                            <li>
                                Interests
                            </li>
                            <li>
                                Description
                            </li>
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