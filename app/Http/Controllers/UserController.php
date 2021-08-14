<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function create()
    {
        return view('User.create');//возвращаем представление с формой регистрации
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RegistrateRequest  $request
     *
     */
    public function store(RegistrateRequest  $request)
    {
        $request->validated();//вызываем валидацию
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
    public function login(UserRequest $request)
    {
       $request->validated();//вызываем валидацию
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
    public function logout()
    {
        Auth::logout();//проводим выход из системы
        return redirect()->route('login.create');//возвращаем форму авторизации
    }
}
