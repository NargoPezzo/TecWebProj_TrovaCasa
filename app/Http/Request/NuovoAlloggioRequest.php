<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NuovoAlloggioRequest extends FormRequest {

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
        \Illuminate\Support\Facades\Log::info('nella richiesta');
        return [
            
            'titolo' => 'required|string|max:50',
            'data_inserimento' => 'required|date',
            'prezzo' => 'required|numeric|min:0',
            'descrizione' => 'string|max:2500',
            'tipologia' => 'required|string',
            'n_camere' => 'required|int',
            'n_posti_letto_totali' => 'required|int',
            'indirizzo' => 'required|string|max:255',
            'cap' => 'required|numeric|max:5',
            'città' => 'required|string|max:255',
            'provincia' => 'required|string|max:2',
            'superficie' => 'required|int',
            'immagine' => 'image|max:1024',
        ];
    }

}
