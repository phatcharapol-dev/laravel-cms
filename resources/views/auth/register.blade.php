@extends('layouts.auth-form')

@section('form')

   
                    <h1>Register</h1>

                    {!!Form::open(['method'=>'post','action' => 'Auth\RegisterController@register'])!!}
                    <div class="form-group">
                        {!! Form::label('name','Name') !!}
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'John Cena']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','E-Mail Address') !!}
                        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'john@example.com']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Password') !!}
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'password']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation','Confirm Password') !!}
                        {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'confirm password']) !!}
                    </div>
            
                    {!! Form::submit('Register',['class'=>'btn btn-primary']) !!}
    

@endsection
