<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

trait BaseRequest
{
    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
