<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException; //response json
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ModificaUtenteRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $user = Auth::user();
        return [
            
            'password' => ['required_with:oldpassword', 'nullable', 'string', 'min:8', 'confirmed'],
            'oldpassword' => 'required_with:password',
            'nome' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
            'età' => ['required', 'int'],
  
        ];
    }

    /**
     * Response in Json Format
     * Override Form Request    
     * 
     */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}

