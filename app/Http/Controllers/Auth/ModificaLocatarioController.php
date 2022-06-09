<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Request\ModificaUtenteRequest;
use Illuminate\Http\Exceptions\HttpResponseException; //response json
use Symfony\Component\HttpFoundation\Response;

class ModificaLocatarioController extends Controller {

    public function __construct() {
       
        $this->middleware('can:isLocatario');
       
    }
    

    public function editAccount() {

        $user = Auth::user();
        return view('auth.modificautente')
                        ->with('user', $user);
    }

    public function saveAccount(ModificaUtenteRequest $request) {

        $user = Auth::user();

        $validated = $request->validated();


        if ($request['oldpassword'] != null && $validated['password'] != null) {
            if (Hash::check($request['oldpassword'], $user->password)) {
                $user->password = Hash::make($validated['password']);
            } else
                throw new HttpResponseException(response('{"oldpassword":["Password errata!"]}', Response::HTTP_UNPROCESSABLE_ENTITY));
        }

        $user->nome = $validated['nome'];
        $user->cognome = $validated['cognome'];
        $user->età = $validated['età'];

        $user->save();

            return redirect()->route('home');
        
    }

}
