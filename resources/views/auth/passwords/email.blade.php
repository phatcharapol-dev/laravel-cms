@extends('layouts.auth-form')

@section('form')

                <h1>Reset Password</h1>
               
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                

                {!!Form::open(['method'=>'POST','action' => 'Auth\ForgotPasswordController@sendResetLinkEmail'])!!}
                <div class="form-group">
                    {!! Form::label('email','E-Mail Address') !!}
                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'youremail@example.com']) !!}
                </div>
                
                
                {!! Form::submit('Send Password Reset Link',['class'=>'btn btn-primary']) !!}
    


@endsection
