<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function create()
    {
        return view('User.create');//возвращаем представление с формой регистрации
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);//валидация
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);//создание юзера
        session()->flash('success', 'Регистрация прошла успешно');//передаем в сессию сообщение о успешной регистрации
        Auth::login($user);//проводим авторизацию по полученным данным
        return redirect()->route('company.index');//редирект на компанию
    }
    public function loginForm()
    {
        return view('User.login');//возвращаем представление с формой авторизации

    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);//валидация
       if( Auth::attempt([
            'email' =>$request->email,
            'password' =>$request->password,
        ])){//проверкаа по данным и проведение авторизации
           session()->flash('success', 'Вы авторизованы');//передаем сообщение
           return redirect()->route('company.index');//направляем на компанию
       }
       else{
           return redirect()->back()->with('error', 'Неправильный логин или пароль');//делаем редирект обратно с сообщением
       }
    }
    public function logout(){
        Auth::logout();//проводим выход из системы
        return redirect()->route('login.create');//возвращаем форму авторизации
    }
}
