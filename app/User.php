<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
    
    public function getId() {
        $id = (array)$id;
        return in_array($this->id, $id);
    }
    
    public function getAlloggi() {
        if ($this->livello == 'locatore') {
            $id = getId();
            return House::where('locatore_id', $id)->get();
        }
    }
    
}
