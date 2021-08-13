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
    $Companies = Company::paginate(2);//получаетм все компании
    $count = ["LengthAwePagination " => count($Companies)];
    return response()->json( [$Companies,$count], 200);//возвращаем коллекцию компаний
}

    public function  Company($id)
{
    $Company = Company::where('id', $id)->get();//получаем одну компанию по ID
    return response()->json( $Company, 200);//возвращаем коллекцию из одной компании
}
}
