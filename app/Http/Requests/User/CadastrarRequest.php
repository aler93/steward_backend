<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CadastrarRequest extends FormRequest
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
            "perfil.nome" => ["required", "max:80"],
            "email"       => ["required", "max:250", "email", "unique:users"],
            "password"    => ["required", "min:6"],
        ];
    }

    public function attributes()
    {
        return [
            "perfil.nome" => "nome"
        ];
    }
}
