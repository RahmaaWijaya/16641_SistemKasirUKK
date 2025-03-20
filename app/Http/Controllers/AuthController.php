<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthVerifyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthController extends Controller
{
    //
     public function index() : View 
     {
        return view('auth.login');
     }

     public function verify(UserAuthVerifyRequest $request) : RedirectResponse
     {
        $data = $request->validated();

        if(Auth::guard('admin')->attempt(['email' =>$data['email'], 'password' =>$data['password'], 'user_priv'=>'admin'])){
         $request->session()->regenerate();
         return redirect()->route('admin.dashboard.index');
        } else if(Auth::guard('petugas')->attempt(['email'=>$data['email'], 'password'=>$data['password'], 'user_priv'=>'petugas'])){
         $request->session()->regenerate();
         return redirect()->route('petugas.dashboard.index');
        } else {
         return redirect(route('login'))->with('msg', 'email dan password salah');
        }
     }

     public function logout(Request $request) : RedirectResponse
     {
      if (Auth::guard('admin')->check()){
         Auth::guard('admin')->logout();
      }else if(Auth::guard('petugas')->check()){
         Auth::guard('petugas')->logout();
      }
      return redirect(route('login'));
     }
}
