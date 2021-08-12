<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiStaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Staff_id' => $this->id,
            'Staff_name' => $this->first_name,
            'Staff_name' => $this->last_name,
            'Staff_company_id' => $this->company_id,
            'Staff_phone' => $this->phone,
            'Staff_email' => $this->email
        ];
    }//функция возврата полей из таблицы
}
