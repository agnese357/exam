@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Lietotāja informācija</h2></div>
                    <div class="panel-body">
                        @if(!empty($user->profila_bilde))
                        <img style="height: 200px" src="/storage/profila_bildes/{{$user->profila_bilde}}">
                        @endif
                       <h3>{{$user->vards}} {{$user->uzvards}}</h3>
                        <h4><b>Epasts </b>{{$user->email}}</h4>
                        <h4><b>Apraksts</b></h4>

                            @if ($user->apraksts == 'NULL') <p>Apraksts nav pievienots</p>
                            @else <p>{{$user->apraksts}}</p>
                            @endif

                            @if (Auth::check() && $user->id == auth()->user()->id)
                                <form action="/user/{{$user->id}}/labot" class="inline">
                                    <button class="btn">Labot profilu</button>
                                </form>
                                <br>
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
                        @if(Auth::check()  && auth()->user()->id!=$user->id)
                            {!! Form::open(['action' => ['AtsauksmesController@store', $user->id], 'method' => 'POST']) !!}

                            {{ Form::label('vertejums', 'Vērtējums 1-10') }}
                            {{ Form::number('vertejums', '', ['class' => 'form-control', 'placeholder' => 'Vērtējums']) }}

                            {{ Form::label('komentars', 'Komentārs') }}
                            {{ Form::text('komentars', '', ['class' => 'form-control', 'placeholder' => 'Komentārs']) }}
                            {{Form::hidden('user_id', $user->id)}}
                            {{Form::submit('Pievienot', ['class' => 'btn'])}}
                            {!! Form::close() !!}
                        <br>
                        @endif

                        @if (count($user->atsauksmes)== 0) <p>Lietotājam šobrīd atsauksmju nav</p>
                        @else
                        <ul>
                            @foreach($user->atsauksmes as $ats)
                                <li class="list-group-item">Vērtējums: {{$ats->vertejums}} <br>
                                    Komentārs: {{$ats->komentars}}

                                @if ((Auth::check() && auth()->user()->id==$user->id) || auth()->user()->role == 2 )
                                    {!! Form::open(['action' => ['AtsauksmesController@destroy', $ats->id], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                    {{Form::submit('Dzēst', ['class' => 'btn'])}}
                                    {!! Form::close() !!}
                                @endif
                                    <br>
                                </li>
                            @endforeach
                        </ul>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
