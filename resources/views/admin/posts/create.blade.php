@extends('layouts.admin')

@section('content')
    <script>tinymce.init({
          selector:'textarea',
          skin: 'bootstrap',
          height:'400',
          plugins: 'lists, link, image, media',
          toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist forecolor backcolor | link image media | removeformat help',
          menubar: false,
          setup: (editor) => { // Apply the focus effect
            editor.on('init', () => {
              editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
            });
            editor.on('focus', () => {
              editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
              editor.getContainer().style.borderColor="#80bdff"
            });
            editor.on('blur', () => {
              editor.getContainer().style.boxShadow="",
              editor.getContainer().style.borderColor=""
            });
        }
    });</script>
    <h1>Create Post</h1>

    {!!Form::open(['method'=>'post','action' => 'AdminPostController@store','files'=>true])!!}
        <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',$categories,0,['class'=>'form-control','placeholder'=>'Choose Categories']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo','Upload Photo') !!}
            {!! Form::file('photo',['class'=>'form-control-photo']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('body','Body') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','placeholder' => 'Message Here']) !!}
        </div>
  

    {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    {!!Form::close()!!}

    
@endsection


