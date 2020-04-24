@extends('layouts.blog-post')



@section('content')

                <!-- First Blog Post -->
                @if( count($posts) > 0 )
                    @foreach($posts as $post)
                    <h2>
                        {{$post->title}}
                    </h2>
                    <p class="lead">
                        by <a href="index.php">{{$post->user->name}}</a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                    <hr>
                    <img class="img-responsive" src="{{$post->photo ? asset('images/post_photo/'.$post->photo->file) : 'http://placehold.it/900x300'}}" alt="">
                    <hr>
                    <p>{!!strLimit($post->body,200)!!}</p>
                    <p><strong>Category :</strong> <a href="#">{{$post->category->name}}</a><p>
                    <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                    @endforeach

                    <!-- Pager -->
                    {{$posts->links()}}
                @else
                    <div class="alert alert-danger">
                        <h5>We couldn’t find any posts.</h5>
                    </div>
                @endif
             
@endsection
