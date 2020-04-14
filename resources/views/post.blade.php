@extends('layouts.blog-post')


@section('content')
	
	<!-- Blog Post -->
                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo ? asset('images/post_photo/'.$post->photo->file) : 'https://via.placeholder.com/900x300'}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body}}</p>
              
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!!Form::open(['method'=>'post','action' => 'PostCommentController@store','files'=>true])!!}
                        <div class="form-group">
                          {!! Form::hidden('post_id',$post->id) !!}
                          {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3,'placeholder'=>'Enter Message']) !!}
                        </div>
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    {!!Form::close()!!}
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                @foreach($post->comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->email}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        {{$comment->body}}
                    </div>
                </div>

               @endforeach

@endsection


@section('category')

			<ul class="list-unstyled">
				@foreach($categories as $category)
                <li><a href="#">{{$category->name}}</a>
                </li>
                @endforeach
            </ul>

@endsection