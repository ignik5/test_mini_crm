<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Company;
use App\Http\Requests\StaffRequest;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Staff = Staff::get();//получаем всех сотрудников
        return view('Staff.index', compact('Staff'));//передаем представление сотрудников и передаем переменную сотрудников
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Companies = Company::get();//получаем все компании
        return view('Staff.form', compact('Companies'));//направляем на представление вормы и передаем компании
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $params = $request->validated();//сохраняем все данные в переменную
        Staff::create($params);//создаем новогую компанию по данным
        return redirect()->route('staff.index')->with('success','Сотрудник создан!');//редиректим на индекс и передаем сообщение об успешном создании
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $Staff)
    {
        $Company = $Staff->Company()->all();//получаем сотрудников которые работают в этой компании
        return view('Staff.show', compact('Company', 'Staff'));//открываем представление сотрудников и передаем переменные компании и сотрудники
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $Staff)
    {
        $Companies = $Staff->Company()->all();//получаем все компании
        return view('Staff.form', compact('Staff','Companies'));//открываем представление формы создания сотрудников и передаем переменные компании и сотрудники

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StaffRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, Staff $Staff)
    {
        $params = $request->validated();
        $Staff->update($params);//сохраняем  измененные данные
        return redirect()->route('staff.index')->with('success','Данные о сотруднике обновлены!');//открываем представление сотрудников и передаем сообщение об успешном создании сотрудника
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $Staff)
    {
        $Staff->delete();//удалить сотрудника
        return redirect()->route('staff.index');//редирект на начальную страницу сотрудников
    }
}
