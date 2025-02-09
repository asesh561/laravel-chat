<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.Login');
    }
    public function logincheck(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'empid' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['name' => $request->name, 'Employee_id' => $request->empid, 'password' => $request->password]) ||
            Auth::attempt(['number' => $request->name, 'Employee_id' => $request->empid, 'password' => $request->password])) {
            $request->session()->put('chat_name', $request->name);
            $request->session()->put('emp_id', $request->empid);
            return redirect('/');
        }
        return redirect()->back()->with('fail', 'The provided credentials do not match our records');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}

