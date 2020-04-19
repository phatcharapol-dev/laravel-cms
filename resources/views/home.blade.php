@extends('layouts.blog-home')



@section('content')

                <!-- First Blog Post -->
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
                <p>{{strLimit($post->body,200)}}</p>
                <p><strong>Category :</strong> <a href="#">{{$post->category->name}}</a><p>
                <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                @endforeach

                <!-- Pager -->
                {{$posts->links()}}
             
@endsection


@section('category')
           <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

@endsection
