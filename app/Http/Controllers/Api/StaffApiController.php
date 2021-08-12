<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ApiStaffResource;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffApiController extends Controller
{
    public function index()
    {
        $Staff = Staff::get();//получаем всех сотрудников
        return ApiStaffResource::collection($Staff);//возвращаем  коллекцию сотрудников
    }


    public function Staff($id)
    {
        $Stafing = Staff::where('id', $id)->get();//получаем одного сотрудника
        return ApiStaffResource::collection($Stafing);//возвращаем  коллекцию из одного  сотрудника
    }
}
