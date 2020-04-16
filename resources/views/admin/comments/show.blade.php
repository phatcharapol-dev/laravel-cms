@extends('layouts.admin')


@section('content')
@include('include.session-msg')

	@if(count($comments) > 0)
		  <h1>All Comments</h1>
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">ID</th>
		        <th scope="col">Author</th>
		        <th scope="col">Body</th>
		      </tr>
		    </thead>
		    <tbody>
		   
		        @foreach($comments as $comment)
		            <tr>
		                <td>{{$comment->id}}</td>
		                <td>{{$comment->author}}</td>
		                <td>{{$comment->body}}</td>
		                <td><a href="{{route('home.post',$comment->post->slug)}}"><button type="button" class="btn btn-info">View Post</button></a></td>
		            
		            </tr>
		        @endforeach
		    </tbody>
		  </table>
	@else
		<h1>No Comments</h1>
	@endif

@endsection


@section('footer')

@endsection