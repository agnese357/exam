@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Brauciena informācija</h2></div>

                    <div class="panel-body">
                       <h3>{{$braucieni->starts}} -> {{$braucieni->merkis}}</h3>
                        <p>Izbraukšana {{$braucieni->izbrauksana}}</p>
                        <p><b>Cena </b>{{$braucieni->cena}}</p>
                        <p><b>Brīvo vietu skaits </b>{{$braucieni->pasazieru_sk-count($braucieni->pasazieri)}}</p>
                        <p><b>Piezīmes: </b>{{$braucieni->piezimes}}</p>
                        <p><b>Vadītājs: </b><a href="{{ url('user', $braucieni['user_id']) }}">
                                {{$braucieni->user->vards}} {{$braucieni->user->uzvards}}
                            </a></p>
                        <p><b>Caurbrauc:</b></p>
                        @if(count($braucieni->pieturas)==0) <p>Šobrīd braucienam pieturu nav!</p>
                        @else
                        <ul>
                            @foreach ($braucieni->pieturas as $piet)
                                <li>{{$piet->pilseta}}</li>
                            @endforeach
                        </ul>
                        @endif

                        <br>

                        <p><b>Pasažieri:</b></p>
                        @if(count($braucieni->pasazieri)==0) <p>Šobrīd braucienam pasažieru nav!</p>
                        @else
                            <ul>
                                @foreach ($braucieni->pasazieri as $pas)
                                    <li>{{$pas->user->vards}} {{$pas->user->uzvards}}</li>
                                @endforeach
                            </ul>
                        <br>
                        @endif

                        @if (Auth::check())
                            @if($braucieni->pasazieru_sk > count($braucieni->pasazieri) && $braucieni->user_id != auth()->user()->id)
                                {!! Form::open(['action' => ['PasazieriController@store'], 'method' => 'POST']) !!}
                                {{Form::hidden('brauciena_id', $braucieni->id)}}
                                {{Form::submit('Braukt līdzi', ['class' => 'btn'])}}
                                {!! Form::close() !!}
                            @else <p><i>Šim braucienam nav iespējams pieteikties</i></p>
                            @endif
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
