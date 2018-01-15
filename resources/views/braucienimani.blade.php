@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Manis izveidotie braucieni</h2></div>
                <div class="panel-body">
                    <table style="width:100%">
                        <tr>
                            <th>Maršruts</th>
                            <th>Izbraukšana</th>
                            <th>Cena</th>
                            <th>Pasažieru skaits</th>
                            <th>Piezīmes</th>
                            <th>Pasažieri</th>
                            <th></th>
                        @foreach($user->braucieni as $brauc)
                            <tr>
                                <td>{{$brauc->starts}} -> {{$brauc->merkis}}</td>
                                <td>{{$brauc->izbrauksana}}</td>
                                <td>{{$brauc->cena}}</td>
                                <td>{{$brauc->pasazieru_sk}}</td>
                                <td>{{$brauc->piezimes}}</td>
                                <td>
                                    @foreach($brauc->pasazieri as $pasazieri)
                                        <a href="{{ url('user', $pasazieri['user_id']) }}">
                                            {{$pasazieri->user->vards}} {{$pasazieri->user->uzvards}}</a><br>

                                    @endforeach
                                </td>
                                <td><a href="{{ url('braucieni', $brauc['id']) }}"> Labot</a><br>
                                    <a href="{{ url('braucieni', $brauc['id']) }}"> Dzēst</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>


                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Braucieni, kuros esmu pieteicies</h2></div>
                    <div class="panel-body">
                        <table style="width:100%">
                            <tr>
                                <th>Maršruts</th>
                                <th>Izbraukšana</th>
                                <th>Cena</th>
                                <th>Pasažieru skaits</th>
                                <th>Piezīmes</th>
                                <th></th>
                                <th></th>
                            @foreach($user->braucieni as $brauc)
                                <tr>
                                    <td>{{$brauc->starts}} -> {{$brauc->merkis}}</td>
                                    <td>{{$brauc->izbrauksana}}</td>
                                    <td>{{$brauc->cena}}</td>
                                    <td>{{$brauc->pasazieru_sk}}</td>
                                    <td>{{$brauc->piezimes}}</td>
                                    <td><a href="{{ url('braucieni', $brauc['id']) }}">Atteikties</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>



    </div>
        </div>
    </div>
</div>
@endsection
