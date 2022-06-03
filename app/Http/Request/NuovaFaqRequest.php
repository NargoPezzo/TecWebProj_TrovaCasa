<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NuovaFaqRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        
        return [
            'domanda' => 'required|string|max:500',
            'risposta' => 'required|string|max:100000',
        ];
    }

}

