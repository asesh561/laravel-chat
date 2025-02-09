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
    @if (session('success'))
        <div class="alert alert-success p2">{{ session('success') }}</div>
    @endif
    @if (session('fail'))
        <div class="alert alert-danger p2">{{ session('fail') }}</div>
    @endif
        <form class="p-3 mt-3" action="{{ url('logincheck') }}" method="POST">
        @csrf
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-user"></span>
                <input type="text" name="name" id="name" placeholder="name" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-user"></span>
                <input type="text" name="empid" id="empid" placeholder="Employee ID" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fa fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="{{route('Auth.newpassword')}}">Forget password?</a> or <a href="{{route('Auth.signup')}}">Sign up</a>
        </div>
    </div>
    @endsection
