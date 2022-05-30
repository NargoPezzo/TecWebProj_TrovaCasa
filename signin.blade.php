@extends('layouts.default')

@section('title') Registrati | @endsection

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4">
                <h1 class="display-5 text-center text-muted mt-4 pt-4">Registrati</h1>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Nome</label>
                        <input type="text" class="form-control " id="exampleInputText" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Cognome</label>
                        <input type="text" class="form-control " id="exampleInputText" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Username</label>
                        <input type="text" class="form-control " id="exampleInputText" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control " id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Data di nascita</label>
                        <input type="date" class="form-control " id="exampleInputDate">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control " id="exampleInputEmail" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control" id="exampleInputText" >
                    </div>
                    <div class="container">
                        <div class="form-check form-check-inline pt-1">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Maschio
                            </label>
                        </div>
                        <div class="form-check form-check-inline pt-1">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Femmina
                            </label>
                        </div>
                    </div>
                    <div class="container pt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Locatario
                            </label>
                        </div>
                        <div class="form-check form-check-inline pb-4 ">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Locatore
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
