<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroCadastro extends FormRequest
{
    use BaseRequest;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "marca" => ["required", "max:30"],
            "modelo" => ["required", "max:60"],
        ];
    }
}
