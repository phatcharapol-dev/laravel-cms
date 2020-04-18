@extends('layouts.auth-form')

@section('form')


                <h1>Reset Password</h1>
                {!!Form::open(['method'=>'post','action' => 'Auth\RegisterController@register'])!!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'John Cena']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','E-Mail Address') !!}
                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'john@example.com']) !!}
                    @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'password']) !!}
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation','Confirm Password') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'confirm password']) !!}
                </div>
        
                {!! Form::submit('Reset Password',['class'=>'btn btn-primary']) !!}     
                    
@endsection
