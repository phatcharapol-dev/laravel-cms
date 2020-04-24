@extends('layouts.admin')

@section('content')

<h1>Posts</h1>

   
<div class="row">
    {!! Form::open(['method' => 'get' , 'action' => 'SearchController@searchPost','class' => 'form-inline']) !!}
        <div class="col-lg-8">
             <a href="{{route('admin.posts.create')}}"><button type="button" class="btn btn-primary">Create Post</button></a>
        </div>
        <div class="col-lg-4">
        {!! Form::text('keySearch',null,['id' => 'keySearch','class' => 'form-control' ,'autocomplete' => 'off','placeholder' => 'Search Post Title']) !!}
        {!! Form::submit('Search',['class' => 'btn btn-primary']) !!}
        <div id="searchList"></div>
        </div>   
    {!! Form::close() !!}
     
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Post ID</th>
        <th scope="col">Owner</th>
        <th scope="col">Category ID</th>
        <th scope="col">Photo</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Create_at</th>
        <th scope="col">Update_at</th>
        <th scope="col">Posts</th>
        <th scope="col">Comments</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
 
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
                <td><img src="{{ $post->photo ? asset('images/post_photo/'.$post->photo->file) : 'https://via.placeholder.com/400'}}" width='40px' height="auto"></td>
                <td>{{strLimit($post->title,15)}}</td>
                <td>{{strLimit($post->body,15)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('home.post',$post->slug)}}"><button type="button" class="btn btn-info">View Posts</button></a></td>
                <td><a href="{{route('admin.comments.show',$post->id)}}"><button type="button" class="btn btn-info">View Comments</button></a></td>
                <td><a href="{{route('admin.posts.edit',$post->id)}}
                    "><button type="button" class="btn btn-info">Edit</button></a></td>
                <td>  
                    {!! Form::open(['method'=>'delete','action'=>['AdminPostController@destroy',$post->id]]) !!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure ?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$posts->links()}}


<script>
$(document).ready(function(){

 $('#keySearch').keyup(function(){ 
        var keySearch = $(this).val();
        var table = 'posts';
        var key = 'title';
        if(keySearch != '')
        {
         $.ajax({
          url:"{{ route('fetchAutoComplete') }}",
          method:"GET",
          data:{keySearch:keySearch,table:table,key:key},
          success:function(dataList){
           $('#searchList').fadeIn();  
                    $('#searchList').html(dataList);
          }
         });
        }else{
            $('#searchList').html('');  
        }
    });

    $('#searchList').on('click','li', function(){  
        $('#keySearch').val($(this).text());  
        $('#searchList').fadeOut();  
    });  

});
</script>
@endsection

@section('footer')

@endsection