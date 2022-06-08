<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException; //response json
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ModificaAlloggioRequest extends FormRequest {

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
        return [
            
            'titolo' => 'string|max:50',
            'prezzo' => 'numeric|min:0',
            'descrizione' => 'string|max:2500',
            'tipologia' => 'string',
            'n_camere' => 'int',
            'n_posti_letto_totali' => 'int',
            'indirizzo' => 'string|max:255',
            'cap' => 'numeric',
            'città' => 'string|max:255',
            'provincia' => 'string|max:2',
            'superficie' => 'int',
            'immagine' => 'image|max:1024',
            "servizi"    => '',
            'id' => '',
            "data_min" => "date",
            "data_max" => "date",
            "età_min" => "numeric",
            "età_max" => "numeric",
            "genere" => "string"
            
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

