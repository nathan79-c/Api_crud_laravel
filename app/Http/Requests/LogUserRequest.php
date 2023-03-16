<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class LogUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' =>false,
            'status_code'=>422,
            'error' =>true,
            'message' =>'erreur de validation',
            'errorsList' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
    
                'email.required'=> 'le mail est requis',
                'email.unique' =>'le mail est unique',
                'password.required'=> 'le mot de passe est requis'
        ];
    }
}
