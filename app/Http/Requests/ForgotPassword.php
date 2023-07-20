<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPassword extends FormRequest
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
            "email"  => ["required", "email"],
            "canal"  => ["required"]
        ];
    }

    public function attributes()
    {
        return [
            "email" => "e-mail",
            "canal" => "canal de envio"
        ];
    }
}
