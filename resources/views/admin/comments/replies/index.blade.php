@extends('layouts.admin')


@section('content')
@include('include.session-msg')

	@if(count($replies) > 0)
		  <h1>All Replies</h1>
		  <table class="table">
		    <thead>
		      <tr>
		        <th scope="col">ID</th>
		        <th scope="col">Author</th>
		        <th scope="col">Body</th>
		        <th scope="col">Crated At</th>
		        <th scope="col">Updated At</th>
		      </tr>
		    </thead>
		    <tbody>
		   
		        @foreach($replies as $reply)
		            <tr>
		                <td>{{$reply->id}}</td>
		                <td>{{$reply->author}}</td>
		                <td>{{$reply->body}}</td>
		                <td>{{$reply->created_at->diffForHumans()}}</td>
		                <td>{{$reply->updated_at->diffForHumans()}}</td>
		                <td><a href="{{route('home.post',$reply->comment->post->slug)}}"><button type="button" class="btn btn-info">View Reply</button></a></td>
		                <td>
		                 @if($reply->is_active == '1')
							{!! Form::open(['method'=>'patch','action'=>['CommentReplyController@update',$reply->id]]) !!}
							{!! Form::hidden('is_active',0) !!}
		                    {!! Form::submit('Un-Approve',['class'=>'btn btn-warning','onclick'=>"return confirm('Are you sure ?')"]) !!}
		                    {!! Form::close() !!}		                 
		                @else
							{!! Form::open(['method'=>'patch','action'=>['CommentReplyController@update',$reply->id]]) !!}
							{!! Form::hidden('is_active',1) !!}
		                    {!! Form::submit('Approve',['class'=>'btn btn-success','onclick'=>"return confirm('Are you sure ?')"]) !!}
		                    {!! Form::close() !!}
		                @endif
		            	</td>
						<td>  
		                    {!! Form::open(['method'=>'delete','action'=>['CommentReplyController@destroy',$reply->id]]) !!}
		                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure ?')"]) !!}
		                    {!! Form::close() !!}
		                </td>		            
		            
		            </tr>
		        @endforeach
		    </tbody>
		  </table>
	@else
		<h1>No Replies</h1>
	@endif

@endsection


@section('footer')

@endsection

