<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth.signup');
    }
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'number' => 'required|digits:10',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::create([
            'name' => $request->name,
            'number' => $request->number,
            'Employee_id' => $request->empid,
            'Department' => $request->Department,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('login')->with('success', 'SignUp successful! You can now log in.');
    }
    public function newpassword()
    {
        return view('Auth.forgetpassword');
    }
    public function passstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'newpassword' => 'required|string|min:8',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $password=User::where('name',$request->name)->pluck('password')->first();
        if (!$password) {
            return redirect()->back()->with('fail', 'The provided credentials do not match our records');
        }else{
        if(!Hash::check($request->password, $password)){
            return redirect()->back()->with('fail', 'The provided credentials do not match our records');
        }}//Hash::make()
        $user = User::where('name', $request->name)->first();
            $user->update([
                'password' => Hash::make($request->newpassword),
            ]);
        return redirect()->route('login')->with('success', 'Password changed successful! You can now log in.');
    }

}
