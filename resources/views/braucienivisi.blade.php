@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{$title}}</h4></div>

                    <div class="panel-body">
                        <a href="{{ url('/braucieni/jauns') }}"><h4>Jauns brauciens</h4></a>
                        @if (count($braucieni)== 0) <p>Šobrīd aktīvo braucienu nav</p>
                        @else
                        <table style="width:100%" class="braucieni">
                            <tr>
                                <th>Maršruts</th>
                                <th>Izbraukšana</th>
                                <th>Cena</th>
                                <th>Informācija</th>
                            </tr>


                            @foreach ( $braucieni as $brauc )
                                <tr>
                                    <td>{{$brauc->starts}} -> {{$brauc->merkis}}</td>
                                    <td>{{$brauc->izbrauksana_diena}} {{$brauc->izbrauksana_laiks}}</td>
                                    <td>{{$brauc->cena}}</td>
                                    <td><a href="{{ url('braucieni', $brauc['id']) }}"> > </a></td>
                                </tr>
                            @endforeach
                        </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
