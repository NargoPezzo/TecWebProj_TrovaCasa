@extends('layouts.default')

@section('content')

    <div class="container pt-4" >
        <h1 class="display-3 text-center text-muted my-4 pt-4">Queste sono le domande più frequenti degli utenti</h1>
        @foreach(array_chunk($questions, 1) as $questions_chunk)
            <div class="row">
                @foreach($questions_chunk as $question)
                    <div class="col pt-5 mt-5">
                                <div class="card text-center">
                                        <div class="card-header">
                                         <h5 class="pt-2">  Domanda numero: {{$question['codice']}} </h5>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{$question['titolo']}}</h5>
                                            <p class="card-text">{{$question['corpo']}}</p>

                                        </div>
                                        <div class="card-footer text-muted">
                                            {{$question['created_at']}}
                                        </div>
                                    </div>
                    </div>
                    @endforeach
            </div>
         @endforeach
    </div>

@endsection


