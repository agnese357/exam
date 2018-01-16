@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Pievienot braucienu</h4></div>
                    <div class="panel-body">
                        {!! Form::open(['action' => 'BraucieniController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('starts', 'No') }}
                            {{ Form::text('starts', '', ['class' => 'form-control', 'placeholder' => 'No']) }}

                            {{ Form::label('merkis', 'Uz') }}
                            {{ Form::text('merkis', '', ['class' => 'form-control', 'placeholder' => 'Uz']) }}

                            {{ Form::label('cena', 'Cena') }}
                            {{ Form::number('cena', '', ['class' => 'form-control', 'placeholder' => 'Cena']) }}

                            {{ Form::label('izbrauksana_diena', 'Izbraukšanas datums') }}
                            {{ Form::date('izbrauksana_diena', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) }}

                            {{ Form::label('izbrauksana_laiks', 'Izbraukšanas laiks:') }}
                            {{ Form::time('izbrauksana_laiks',  \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control']) }}

                            {{ Form::label('pasazieru_sk', 'Pasažieru skaits') }}
                            {{ Form::number('pasazieru_sk', '', ['class' => 'form-control', 'placeholder' => 'Pasažieru skaits']) }}

                            {{ Form::label('piezimes', 'Piezīmes') }}
                            {{ Form::text('piezimes', '', ['class' => 'form-control', 'placeholder' => 'Piezīmes']) }}

                        </div>

                        {{Form::submit('Pievienot', ['class' => 'btn'])}}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
