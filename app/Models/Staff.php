<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['first_name', 'last_name', 'company_id', 'phone', 'email'];//разрешаем редактировать поля для базы

    public function Company(){

        return $this->belongsTo(Company::class, 'company_id')->first();//функция ля получения компании
    }

}
