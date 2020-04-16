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
                @if($comment->is_active == 1)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height='64px' class="media-object" src="{{$comment->photo ? asset('images/user_photo/'.$comment->photo) : 'http://placehold.it/64x64'}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->email}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        {{$comment->body}}
                        <div class="reply-button">
                            <a class="btn btn-primary" data-toggle="collapse" href="{{'#reply-comment'.$comment->id}}" role="button" aria-expanded="false" aria-controls="{{'reply-comment'.$comment->id}}">Reply</a>
                         </div>
                        <!-- Nested Comment -->
                        @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        <div class="media nested-comment">
                            <a class="pull-left" href="#">
                                <img height='64px' class="media-object" src="{{$reply->photo ? asset('images/user_photo/'.$reply->photo) : 'http://placehold.it/64x64'}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->email}}
                                    <small>{{$reply->created_at}}</small>
                                </h4>
                                {{$reply->body}}
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- End Nested Comment -->
                        
                        {!!Form::open(['method'=>'post','action' => 'CommentReplyController@store','files'=>true])!!}
                            <div id="{{'reply-comment'.$comment->id}}" class="form-inline reply-comment collapse">
                              {!! Form::hidden('comment_id',$comment->id) !!}
                              {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1,'placeholder'=>'Reply Message']) !!}
                              {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                            </div> 
                        {!!Form::close()!!}
                    </div>
                </div>
                @endif
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