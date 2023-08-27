@extends('franchise.layout.auth') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/franchise/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>                                
                                @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        {{-- Code Eddition --}}
                        <div class="form-group{{ $errors->has('Location') ? ' has-error' : '' }}">
                            <label for="Location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="Location" type="text" class="form-control" name="Location" value="{{ old('Location') }}" autofocus>                                
                                @if ($errors->has('Location'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('Location') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Address') ? ' has-error' : '' }}">
                            <label for="Address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control" name="Address" value="{{ old('Address') }}" autofocus>                                
                                @if ($errors->has('Address'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('Address') }}</strong>
                                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('City') ? ' has-error' : '' }}">
                            <label for="City" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="City" type="text" class="form-control" name="City" value="{{ old('City') }}" autofocus>                                
                                @if ($errors->has('City'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('City') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('State') ? ' has-error' : '' }}">
                            <label for="State" class="col-md-4 control-label">State</label>
                            <div class="col-md-6">
                                <input id="State" type="text" class="form-control" name="State" value="{{ old('State') }}" autofocus>                                
                                @if ($errors->has('State'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('State') }}</strong>
                                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('DateOpened') ? ' has-error' : '' }}">
                            <label for="DateOpened" class="col-md-4 control-label">Date Opened</label>

                            <div class="col-md-6">
                                <input id="DateOpened" type="date" class="form-control" name="DateOpened" value="{{ old('DateOpened') }}" autofocus>                                @if ($errors->has('DateOpened'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('DateOpened') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('DateFDDSigned') ? ' has-error' : '' }}">
                            <label for="DateFDDSigned" class="col-md-4 control-label">Date FDD Signed</label>

                            <div class="col-md-6">
                                <input id="DateFDDSigned" type="date" class="form-control" name="DateFDDSigned" value="{{ old('DateFDDSigned') }}" autofocus>                                @if ($errors->has('DateFDDSigned'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('DateFDDSigned') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('DateFDDExpires') ? ' has-error' : '' }}">
                            <label for="DateFDDExpires" class="col-md-4 control-label">Date FDD Expires</label>

                            <div class="col-md-6">
                                <input id="DateFDDExpires" type="date" class="form-control" name="DateFDDExpires" value="{{ old('DateFDDExpires') }}" autofocus>                                @if ($errors->has('DateFDDExpires'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('DateFDDExpires') }}</strong>
                                        </span> @endif
                            </div>
                        </div>


                        {{-- Code Eddition --}}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"> @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span> @endif
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