@extends('layouts/navbar')
@section('chatwrapper')
<style>
    .p-1{
        font-size: 10px !important;
    }
    .p2{
        text-align: center !important;
        font-size: 15px !important;
    }
</style>
<div class="wrapper">
        <div class="logo">
            <img src="{{asset('assets/img/sbllogo.png')}}" alt="sbl logo">
        </div>
        <div class="text-center mt-4 name">
            SBL CHATBOX
        </div>
    @if (session('fail'))
        <div class="alert alert-danger p2">{{ session('fail') }}</div>
    @endif
        <form class="p-3 mt-3" action="{{ url('passstore') }}" method="POST">
        @csrf
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-user"></span>
            <input type="text" name="name" id="name" placeholder="name" value="{{old('name')}}">
            </div>
            @error('name')<div class="alert alert-danger p-1">{{ $message }}</div>@enderror
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            @error('password')<div class="alert alert-danger p-1">{{ $message }}</div>@enderror
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-key"></span>
                <input type="password" name="newpassword" id="npwd" placeholder="New Password">
            </div>
            @error('newpassword')<div class="alert alert-danger p-1">{{ $message }}</div>@enderror
            <button class="btn mt-3">Set Password</button>
        </form>
        <div class="text-center fs-6">
            <a href="{{route('Auth.signup')}}">Sign up</a> or <a href="{{route('login')}}">Login</a>
        </div>
    </div>
    @endsection