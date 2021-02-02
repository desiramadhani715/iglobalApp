<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\Validator;
use App\Models\product;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    
    }
    public function proses_login(Request $request)
    {
        // $request()->validate(
        //     [
        //         'username'=>'required',
        //         'password'=>'reqiured',
        //     ]);
        
        $kredensil = $request->only('username','password');
        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level=='admin') {
                return redirect()->intended('admin');
            }elseif ($user->level=='employee') {
                return redirect()->intended('employee');
            }
            return redirect()->intended('/');
        }
        return redirect()->intended('login');

    }

    public function logout(Request $request)
    {
            $request->session()->flush();
            Auth::logout();
            return redirect('login');
    }
}