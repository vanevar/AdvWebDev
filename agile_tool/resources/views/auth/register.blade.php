@extends('layouts.app')

@section('content')
                    <form class="form-signin" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                      <div class="text-center mb-4">
                         <h1 class="h3 mb-3 font-weight-normal">Register</h1>
                      </div>


                        <div class="form-label-group 1{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name</label>
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-label-group 1{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Last Name</label>
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="form-label-group 1{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-label-group 1{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-label-group 1">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                    </form>
@endsection
