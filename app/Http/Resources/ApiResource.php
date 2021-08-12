<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
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
            'Company_id' => $this->id,
            'Company_name' => $this->name,
            'Company_phone' => $this->phone,
            'Company_email' => $this->email,
            'Company_website' => $this->website,
            'Company_logo' => $this->logo,

        ];//функция возврата полей из таблицы

    }
}
