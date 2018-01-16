@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Administrācijas modulis</h3></div>
                <div class="panel-body">
                    <h3>Lomas maiņa</h3>
                    {!! Form::open(['action' => ['ProfilsController@updaterole'], 'method' => 'PUT']) !!}

                    {{ Form::label('email', 'Lietotāja epasts') }}
                    {{ Form::text('email', "", ['class' => 'form-control', 'placeholder' => 'Epasts']) }}

                    {{Form::select('role', array('1' => 'Parasts lietotājs', '2' => 'Administrators'))}}
                    <br>
                    {{Form::submit('Mainīt lomu', ['class' => 'btn'])}}
                    {!! Form::close() !!}

                </div>


            </div>
        </div>
    </div>
</div>

@endsection
