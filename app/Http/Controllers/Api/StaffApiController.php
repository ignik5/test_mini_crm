<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;


class StaffApiController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->get('per_page');
        $Staff = Staff::limit($per_page)->paginate($per_page);//получаем всех сотрудников
        //$count = ["LengthAwePagination" => count(Staff::paginate($per_page))];
        //dd((Staff::all()->count())/$per_page);
        $arrayStaff = ["Staff" => $Staff ,"LengthAwePagination" => Staff::all()->count()/$per_page];
        return response()->json($arrayStaff, 200);//возвращаем  сотрудников
    }


    public function Staff($id)
    {
        $Stafing = Staff::where('id', $id)->get();//получаем одного сотрудника
        return $Stafing->all();//возвращаем  коллекцию из одного  сотрудника
    }
}
