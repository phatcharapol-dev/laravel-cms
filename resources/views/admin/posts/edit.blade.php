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

<h1>Edit Post</h1>

<div class="col-sm-3">
    <img src="{{ $post->photo ? asset('images/post_photo/'.$post->photo->file) : 'https://via.placeholder.com/400'}}" alt="" class="img-responsive img-rounded">
</div>
<div class="col-sm-9">
  {!!Form::open(['method'=>'patch','action' => ['AdminPostController@update',$post->id],'files'=>true])!!}
  <div class="form-group">
    {!! Form::label('category_id','Category') !!}
    {!! Form::select('category_id',$categories,$post->category_id,['class'=>'form-control','placeholder'=>'Choose Category']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('photo','Upload Photo') !!}
    {!! Form::file('photo',['class'=>'form-control-photo']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter Full Name']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Enter Message']) !!}
  </div>
  {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}


</div>

  

@endsection


@section('footer')
    
@endsection