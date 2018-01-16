@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Profila labošana</h2></div>
                <div class="panel-body">
                    {!! Form::open(['action' => ['ProfilsController@update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Lietotājvārds') }}
                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Lietotājvārds']) }}

                        {{ Form::label('vards', 'Vārds') }}
                        {{ Form::text('vards', $user->vards, ['class' => 'form-control', 'placeholder' => 'Vārds']) }}

                        {{ Form::label('uzvards', 'Uzvārds') }}
                        {{ Form::text('uzvards', $user->uzvards, ['class' => 'form-control', 'placeholder' => 'Uzvārds']) }}

                        {{ Form::label('email', 'Epasts') }}
                        {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Epasts']) }}

                        {{ Form::label('apraksts', 'Apraksts') }}
                        {{ Form::text('apraksts',  $user->apraksts, ['class' => 'form-control', 'placeholder' => 'Apraksts']) }}

                        {{ Form::label('password', 'Parole') }}
                        {{ Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Parole']) }}

                        {{ Form::label('password_confirmation', 'Parole atkārtoti') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Parole atkārtoti']) }}
                        <br>
                        {{ Form::label('profila_bilde', 'Profila bilde') }}
                        {{ Form::file('profila_bilde')}}


                    </div>


                    {{Form::submit('Labot', ['class' => 'btn'])}}
                    {!! Form::close() !!}
<br>
                    {!! Form::open(['action' => ['ProfilsController@destroy', $user->id], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
                    {{Form::submit('Dzēst profilu', ['class' => 'btn'])}}
                    {!! Form::close() !!}

                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
