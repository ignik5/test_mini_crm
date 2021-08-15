<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;


class CompanyApiController extends Controller
{
    public function index(Request $request)
        {
            $per_page = $request->get('per_page');
            $Companies = Company::limit($per_page)->paginate($per_page);//получаетм все компании
           // $count = ["LengthAwePagination" => count($Companies)];
            return response()->json($Companies, 200);//возвращаем коллекцию компаний
        }

    public function  Company($id)
        {
            $Company = Company::where('id', $id)->get();//получаем одну компанию по ID
            return $Company->all();//возвращаем коллекцию из одной компании
        }
}
