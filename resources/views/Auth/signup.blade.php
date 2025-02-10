@extends('layouts/navbar')
@section('chatwrapper')
<style>
    .p-1{
        font-size: 10px !important;
    }
</style>
<div class="wrapper">
        <div class="logo">
            <img src="{{asset('assets/img/sbllogo.png')}}" alt="sbl logo">
        </div>
        <div class="text-center mt-4 name">
            SBL CHATBOX
        </div>
        <form class="p-3 mt-3" action="{{ url('register') }}" method="POST">
        @csrf
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-phone"></span>
                <input type="text" name="number" id="number" value="{{old('number')}}" placeholder="Mobile" required>
            </div>
            @error('number')<div class="alert alert-danger p-1">{{ $message }}</div>@enderror
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-user"></span>
                <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="name" required>
            </div>
            @error('name')<div class="alert alert-danger p-1">{{ $message }}</div>@enderror
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-key"></span>
                <input type="password" name="password_confirmation" id="cpwd" placeholder="Confirm Password" required>
            </div>
            @error('password')<div class="alert alert-danger p-1">{{ $message }}</div>@enderror


            <div class="form-field d-flex align-items-center">
                <span class="fa-address-card"></span>
                <input type="empid" name="empid" id="empid" placeholder="Employeeid" required>
            </div>
            @error('empid')<div class="alert alert-danger p-1">{{ $empid }}</div>@enderror

            <div class="form-field d-flex align-items-center">
                <span class="fa-address-card"></span>
                <input type="Department" name="Department" id="cpwd" placeholder="Department" required>
            </div>
            @error('Department')<div class="alert alert-danger p-1">{{ $Department }}</div>@enderror
            <button class="btn mt-3">Sign Up</button>
        </form>
        <div class="text-center fs-6">
            <a href="{{route('Auth.newpassword')}}">Forget password?</a> or <a href="{{route('login')}}">Login</a>
        </div>
    </div>
    @endsection
