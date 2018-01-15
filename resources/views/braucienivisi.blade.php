@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{$title}}</h4></div>

                    <div class="panel-body">
                        <table style="width:100%">
                            <tr>
                                <th>Maršruts</th>
                                <th>Izbraukšana</th>
                                <th>Cena</th>
                                <th>Informācija</th>
                            </tr>

                            @foreach ( $braucieni as $brauc )
                                <tr>
                                    <td>{{$brauc->starts}} -> {{$brauc->merkis}}</td>
                                    <td>{{$brauc->izbrauksana}}</td>
                                    <td>{{$brauc->cena}}</td>
                                    <td><a href="{{ url('braucieni', $brauc['id']) }}"> > </a></td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
