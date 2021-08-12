<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name', 'email', 'phone', 'website', 'logo' ,'updated_at', 'created_at', 'deleted_at'];//разрешаем запись в полях бд
    public function Staff(){
        return $this->hasMany(Staff::class,'company_id')->get();//фуникция для получения всез сотрудников для одной компании
    }


}
