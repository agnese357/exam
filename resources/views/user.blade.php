@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Lietotāja informācija</h2></div>
                    <div class="panel-body">
                       <h3>{{$user->vards}} {{$user->uzvards}}</h3>
                        <h4><b>Epasts </b>{{$user->email}}</h4>
                        <h4><b>Apraksts</b></h4>

                            @if ($user->apraksts = 'NULL') <p>Apraksts nav pievienots</p>
                            @else <p>{{$user->apraksts}}</p>
                                @endif
                        @if ($user->id == auth()->user()->id)
                            {!! Form::open(['action' => ['ProfilsController@destroy', $user->id], 'method' => 'DELETE'])!!}
                            {{Form::submit('Dzēst profilu', ['class' => 'btn'])}}
                            {!! Form::close() !!}
                        @endif

                        <h4><b>Aktīvie braucieni</b></h4>
                        @if (count($user->braucieni)== 0) <p>Lietotājam šobrīd aktīvo braucienu nav</p>
                        @else
                        <table style="width:100%">
                            <tr>
                                <th>Maršruts</th>
                                <th>Izbraukšana</th>
                                <th>Cena</th>
                                <th>Informācija</th>
                            </tr>
                            @foreach($user->braucieni as $brauc)
                                <tr>
                                    <td>{{$brauc->starts}} -> {{$brauc->merkis}}</td>
                                    <td>{{$brauc->izbrauksana}}</td>
                                    <td>{{$brauc->cena}}</td>
                                    <td><a href="{{ url('braucieni', $brauc['id']) }}"> > </a></td>
                                </tr>
                            @endforeach
                        </table>
                        @endif

                        <h4><b>Atsauksmes</b></h4>
                        @if (count($user->atsauksmes)== 0) <p>Lietotājam šobrīd atsauksmju nav</p>
                        @else
                        <ul>
                            @foreach($user->atsauksmes as $ats)
                                <li class="list-group-item">Vērtējums: {{$ats->vertejums}} <br>
                                    Komentārs: {{$ats->komentars}}</li>
                            @endforeach
                        </ul>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
