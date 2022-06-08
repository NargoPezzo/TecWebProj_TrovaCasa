<?php

namespace App;

use App\Models\Resources\Chat;
use App\Models\Resources\Messaggio;
use App\Models\Resources\Opzione;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cognome', 'età', 'genere', 'email', 'cellulare', 'username', 'password', 'livello',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hasRole($livello) {
        $livello = (array)$livello;
        return in_array($this->livello, $livello);
    }
    
    public function getChat($user) {
        return Chat::where('user1', $user)
                ->orWhere('user2', $user)->get();
    }
    
    public function getMessaggi($chat) {
        
        $messaggi=array();
        
        foreach($chat as $singolachat) {
            array_push($messaggi, (Messaggio::where('mittente', $singolachat->user1)
                                   ->orWhere('destinatario', $singolachat->user1)
                                    ->where('mittente', $singolachat->user2)
                                     ->orWhere('destinatario', $singolachat->user2)->get()));
        }
        return $messaggi;
        
    }
    
    public function getMessaggiUser($user) {
        
        $authuser = auth()->user()->username;
        
        return Messaggio::where('mittente', $authuser)->where('destinatario', $user)
                ->orWhere('destinatario', $authuser)->where('mittente', $user)->get();

    }
    
    public function getRichieste($house_id) {
        $richiedenti = new User();
        $richieste = Opzione::select('locatario_id')->where('house_id', $house_id)->get();
        Log::info('richieste');
        Log::info($richieste);
        foreach ($richieste as $richiesta) {
            $richiedenti = User::where('id', $richiesta->locatario_id)->get();
        }
        Log::info('getRichieste');
        Log::info($richiedenti);
        
        return $richiedenti;
    }
    
}
