<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function userUpdatePage(Request $request, User $user){
        return view('users.update', compact('user'));
    }
    
    public function userUpdate(Request $request, User $user){
        $credentials = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'patronymic' => 'required',
            'is_admin' => 'required',
            'login' => 'required|string',
            'password' => 'nullable',
        ]);           
        if(!$credentials['password'] == 'null'){
            $user->update([
                'firstname' => $credentials['firstname'],
                'lastname' => $credentials['lastname'],
                'patronymic' => $credentials['patronymic'],
                'is_admin' => $credentials['is_admin'],
                'login' => $credentials['login'],
            ]);
        }else{
        $user->update($credentials);
    }
        session()->flash('ok', 'Пользователь успешно сохранён!');
        return to_route('users.index');
    }
    public function userStorePage(Request $request){
        return view('users.store');
    }
    public function userStore(Request $request){
        if(
        $credentials = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'patronymic' => 'required',
            'is_admin' => 'required',
            'email' => 'required|unique:users,email',
            'login' => 'required|string|unique:users,login',
            'password' => 'required|confirmed',
        ])){
        User::create($credentials);  
        session()->flash('yes', 'Пользователь успешно создан!');
            return to_route('users.index');       
        }
        session()->flash('no', 'Что-то пошло не так');
        return back();   

    }
    public function userDelete(User $user){    

    session()->flash('ok', 'Пользователь успешно удалён!');
    $user->delete();


    return to_route('users.index'); 
    }
}
