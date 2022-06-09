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
    
    public function getSingleChat($user1, $user2) {

        return Chat::where('user1', $user1)->where('user2',$user2)->get()->first();

    }
    
    public function getMessaggi($chats) {
        
        $messaggi=array();
        
        foreach($chats as $chat) {
            array_push($messaggi, (Messaggio::where('mittente', $chat->user1)
                                   ->orWhere('destinatario', $chat->user1)
                                    ->where('mittente', $chat->user2)
                                     ->orWhere('destinatario', $chat->user2)->get()));
        }
        return $messaggi;
        
    }
    
    public function getMessaggiUser($user) {
        
        $authuser = auth()->user()->username;
        
        return Messaggio::where('mittente', $authuser)->where('destinatario', $user)
                ->orWhere('destinatario', $authuser)->where('mittente', $user)->get();
    }
    
    public function getRichieste($house_id) {

        $richieste = Opzione::select('locatario_id')->where('house_id', $house_id)->get();
        Log::info('richieste');
        Log::info($richieste);
        $idRichieste = array();
        
        foreach ($richieste as $richiesta) {
            array_push($idRichieste, $richiesta->locatario_id);
        }
        $richiedenti = User::whereIn('id', $idRichieste)->get();
        Log::info('getRichieste');
        Log::info($richiedenti);
        
        return $richiedenti;
    }
    
    public function getDestById($id) {
        $destinatario = $this->where('id', '=', $id)->first();
        return $destinatario->username;
    }
    
}
