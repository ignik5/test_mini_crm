<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//разрешаем пользователю выполнять этот запрос
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /**
     * Остановить валидацию после первой неуспешной проверки.
     *
     * @var bool
     */

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'website' => 'required',
            'logo' => 'required',
        ];//правила валидации
    }
}
