@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vards') ? ' has-error' : '' }}">
                            <label for="vards" class="col-md-4 control-label">Vārds</label>

                            <div class="col-md-6">
                                <input id="vards" type="text" class="form-control" name="vards" value="{{ old('vards') }}" required autofocus>

                                @if ($errors->has('vards'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vards') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('uzvards') ? ' has-error' : '' }}">
                            <label for="uzvards" class="col-md-4 control-label">Uzvārds</label>

                            <div class="col-md-6">
                                <input id="uzvards" type="text" class="form-control" name="uzvards" value="{{ old('uzvards') }}" required autofocus>

                                @if ($errors->has('uzvards'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uzvards') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apraksts') ? ' has-error' : '' }}">
                            <label for="apraksts" class="col-md-4 control-label">Apraksts</label>

                            <div class="col-md-6">
                                <input id="apraksts" type="text" class="form-control" name="apraksts" value="{{ old('apraksts') }}">

                                @if ($errors->has('apraksts'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apraksts') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
