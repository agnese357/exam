@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Administrācijas modulis</h3></div>
                <div class="panel-body">
                    <table style="width:100%">
                        <tr align="center">
                            <th>Lietotājs</th>
                            <th>Lomas maiņa</th>
                            <th>Dzēšana</th>
                        </tr>
                        <tr>
                            <td>
                                <select style="width:75%">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->vards}} {{$user->uzvards}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select style="width:50%">
                                    <option value="1">Parasts lietotājs</option>
                                    <option value="2">Administrators</option>
                                </select>
                                <button>Mainīt</button>
                            </td>
                            <td><a href="{{ url('/mani') }}"> Dzēst</a></td>

                        </tr>
                    </table>



                </div>


            </div>
        </div>
    </div>
</div>

@endsection
