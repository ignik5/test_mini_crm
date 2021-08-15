<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Companies = Company::paginate(10);
         return view('Companies.index', compact('Companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $params = $request->validated(); //сохраняем в переменную все значения из request
        unset($params['logo']);
        if ($request->has('logo')) {
            $params['logo'] = $request->file('logo')->store('public');//если переменная с картинкой не пустая то сохраняем в Storage
        }
        Company::create($params);//создаем новогую компанию по данным
        return redirect()->route('company.index')->with('success','Компания создана!');//переадресация на index и сообщение
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $Company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $Company)
    {
        $Staff = $Company->Staff()->all();//получаем сотрудников которые работают в этой компании
        return view('Companies.show', compact('Company', 'Staff'));//вызываем вид и передаем туда переменные
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $Company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $Company)
    {
        return view('Companies.form', compact('Company'));//возвращаем вид и передаем компании
    }

    /**
     * Update the specified resource in storage.
     *
     *  @param \App\Models\Company $Company
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $Company)
    {
        $params = $request->validated(); //если валидация прошла то сохраняем все данные в переменную
        unset($params['logo']);
        if ($request->has('logo')) {
            Storage::delete($Company->logo);
            $params['logo'] = $request->file('logo')->store('public');
        }//если есть изображение то сохраняем его в сторадж паблик и записываем путь до картинки в переменную
        $Company->update($params);//обновление данных
        return redirect()->route('company.index')->with('success','Компания обновлена!');//редиректит на index
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param \App\Models\Company $Company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $Company)
    {
        $Company->delete();//удаляет выбранную компанию
        return redirect()->route('company.index');//редиректит на index
    }

}
