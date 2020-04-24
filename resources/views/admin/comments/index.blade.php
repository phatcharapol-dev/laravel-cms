@extends('layouts.admin')


@section('content')

	@if(count($comments) > 0)
		  <h1>All Comments</h1>
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">ID</th>
		        <th scope="col">Author</th>
		        <th scope="col">Body</th>
		        <th scope="col">Created At</th>
		        <th scope="col">Updated At</th>
		      </tr>
		    </thead>
		    <tbody>
		   
		        @foreach($comments as $comment)
		            <tr>
		                <td>{{$comment->id}}</td>
		                <td>{{$comment->author}}</td>
		                <td>{{$comment->body}}</td>
		                <td>{{$comment->created_at->diffForHumans()}}</td>
		                <td>{{$comment->updated_at->diffForHumans()}}</td>
		                <td><a href="{{route('home.post',$comment->post->slug)}}"><button type="button" class="btn btn-info">View Post</button></a></td>
		                <td>
		                 @if($comment->is_active == '1')
							{!! Form::open(['method'=>'patch','action'=>['PostCommentController@update',$comment->id]]) !!}
							{!! Form::hidden('is_active',0) !!}
		                    {!! Form::submit('Un-Approve',['class'=>'btn btn-warning','onclick'=>"return confirm('Are you sure ?')"]) !!}
		                    {!! Form::close() !!}		                 
		                @else
							{!! Form::open(['method'=>'patch','action'=>['PostCommentController@update',$comment->id]]) !!}
							{!! Form::hidden('is_active',1) !!}
		                    {!! Form::submit('Approve',['class'=>'btn btn-success','onclick'=>"return confirm('Are you sure ?')"]) !!}
		                    {!! Form::close() !!}
		                @endif
		            	</td>
						<td>  
		                    {!! Form::open(['method'=>'delete','action'=>['PostCommentController@destroy',$comment->id]]) !!}
		                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure ?')"]) !!}
		                    {!! Form::close() !!}
		                </td>		            	
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