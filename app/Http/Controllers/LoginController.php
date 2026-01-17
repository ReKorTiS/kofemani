<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('yes', 'Авторизация успешна!');
            return to_route('home');
            
        }
        session()->flash('no', 'Что-то пошло не так!');
        return back();

    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        session()->flash('yes', 'Вы вышли!');
        return to_route('home');
    }
}
