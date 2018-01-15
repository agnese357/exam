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
                        <p>{{$user->apraksts}}</p>
                        <h4><b>Aktīvie braucieni</b></h4>
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

                        <h4><b>Atsauksmes</b></h4>
                        <ul>
                            @foreach($user->atsauksmes as $ats)
                                <li class="list-group-item">Vērtējums: {{$ats->vertejums}} <br>
                                    Komentārs: {{$ats->komentars}}</li>
                            @endforeach
                        </ul>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
