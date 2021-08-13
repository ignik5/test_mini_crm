<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ApiStaffResource;
use App\Http\Controllers\Controller;
use App\Models\Staff;


class StaffApiController extends Controller
{
    public function index()
    {
        $Staff = Staff::paginate(2);//получаем всех сотрудников
        $count = ["LengthAwePagination " => count($Staff)];

        return response()->json( [$Staff,$count], 200);//возвращаем  сотрудников


    }


    public function Staff($id)
    {
        $Stafing = Staff::where('id', $id)->get();//получаем одного сотрудника
        return response()->json( $Stafing, 200);//возвращаем  коллекцию из одного  сотрудника
    }
}
