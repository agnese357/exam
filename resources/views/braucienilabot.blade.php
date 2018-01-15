@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Labot braucienu</h4></div>
                    <div class="panel-body">
                        {!! Form::open(['action' => ['BraucieniController@update', $braucieni->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            {{ Form::label('starts', 'No') }}
                            {{ Form::text('starts', $braucieni->starts, ['class' => 'form-control', 'placeholder' => 'No']) }}

                            {{ Form::label('merkis', 'Uz') }}
                            {{ Form::text('merkis',$braucieni->merkis, ['class' => 'form-control', 'placeholder' => 'Uz']) }}

                            {{ Form::label('cena', 'Cena') }}
                            {{ Form::number('cena', $braucieni->cena, ['class' => 'form-control', 'placeholder' => 'Cena']) }}

                            {{ Form::label('izbrauksana_diena', 'Izbraukšanas datums') }}
                            {{ Form::date('izbrauksana_diena', $braucieni->izbrauksana_diena, ['class' => 'form-control', 'placeholder' => 'Izbraukšanas datums']) }}

                            {{ Form::label('izbrauksana_laiks', 'Izbraukšanas laiks:') }}
                            {{ Form::time('izbrauksana_laiks',  Carbon\Carbon::parse($braucieni['izbrauksana_laiks'])->format('H:i'), ['class' => 'form-control', 'placeholder' => 'Izbraukšanas laiks']) }}

                            {{ Form::label('pasazieru_sk', 'Pasažieru skaits') }}
                            {{ Form::number('pasazieru_sk', $braucieni->pasazieru_sk, ['class' => 'form-control', 'placeholder' => 'Pasažieru skaits']) }}

                            {{ Form::label('piezimes', 'Piezīmes') }}
                            {{ Form::text('piezimes', $braucieni->piezimes, ['class' => 'form-control', 'placeholder' => 'Piezīmes']) }}
                        </div>


                        {{Form::submit('Labot', ['class' => 'btn'])}}
                        {!! Form::close() !!}


                        {!! Form::open(['action' => ['BraucieniController@destroy', $braucieni->id], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                        {{Form::submit('Dzēst', ['class' => 'btn'])}}
                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
