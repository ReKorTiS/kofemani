<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    public function index(){
        return view('account.index');
    }
    public function changepassword(Request $request){
        $credentials = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if (Hash::check($credentials['old_password'], Auth::user()->password)) {
            Auth::user()->update(['password' => Hash::make($credentials['password'])]);

            session()->flash('yes', 'Смена пароля успешна!');
            return back();
            
        }
        session()->flash('no', 'Пароль не изменен, вы ввели не верный текущий пароль');
        return back();
    }
}
