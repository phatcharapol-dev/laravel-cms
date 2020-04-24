@extends('layouts.admin')


@section('content')

<h1>User</h1>

<div class="row">
    {!! Form::open(['method' => 'get' , 'action' => 'SearchController@searchUser','class' => 'form-inline']) !!}
        <div class="col-lg-8">
            <a href="{{route('admin.users.create')}}"><button type="button" class="btn btn-primary">Create User</button></a>
        </div>
        <div class="col-lg-4">
        {!! Form::text('keySearch',null,['id' => 'keySearch','class' => 'form-control' ,'autocomplete' => 'off','placeholder' => 'Search Name']) !!}
        {!! Form::submit('Search',['class' => 'btn btn-primary']) !!}
        <div id="searchList"></div>
        </div>   
    {!! Form::close() !!}
     
</div>



<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Photo</th>
        <th scope="col">Active</th>
        <th scope="col">Create_at</th>
        <th scope="col">Update_at</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
   

        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td><img src="{{ $user->photo ? asset('images/user_photo/'.$user->photo->file) : 'https://via.placeholder.com/400'}}" width='40px' height="auto"></td>
                <td>{{$user->is_active == '1' ? 'Active': 'Not Active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('admin.users.edit',$user->id)}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                <td>  
                    {!! Form::open(['method'=>'delete','action'=>['AdminUserController@destroy',$user->id]]) !!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure ?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$users->links()}}

<script>
$(document).ready(function(){

 $('#keySearch').keyup(function(){ 
        var keySearch = $(this).val();
        var table = 'users';
        var key = 'name';
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