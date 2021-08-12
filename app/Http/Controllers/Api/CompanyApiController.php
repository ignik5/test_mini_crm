<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;
use Illuminate\Support\Facades\DB;
class CompanyApiController extends Controller
{
    public function index()
{
    $Companies = Company::get();//получаетм все компании
    return ApiResource::collection($Companies);//возвращаем коллекцию компаний
}

    public function  Company($id)
{
    $Company = Company::where('id', $id)->get();//получаем одну компанию по ID
    return ApiResource::collection($Company);//возвращаем коллекцию из одной компании
}
}