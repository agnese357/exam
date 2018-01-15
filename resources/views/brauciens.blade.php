@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Brauciena informācija</div>

                    <div class="panel-body">
                       <h3>{{$braucieni->starts}} -> {{$braucieni->merkis}}</h3>
                        <p>Izbraukšana {{$braucieni->izbrauksana}}</p>
                        <p>Cena {{$braucieni->cena}}</p>
                        <p>Vietu skaits {{$braucieni->pasazieru_sk}} (vajag izrēķināt atlikušo vietu skaitu)</p>
                        <p>Piezīmes: {{$braucieni->piezimes}}</p>
                        <p>Vadītājs: <a href="{{ url('user', $braucieni['user_id']) }}">
                                {{$braucieni->user->vards}} {{$braucieni->user->uzvards}}
                            </a></p>
                        <p>Caurbrauc:</p>
                        <ul>
                            @foreach ($braucieni->pieturas as $piet)
                                <li>{{$piet->pilseta}}</li>
                            @endforeach
                        </ul>


                        <button>Braukt līdzi!</button> vajag onclick, ka piesakās un ieiet ieraksts pasažietu tabulābrauciens.blade.php

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
