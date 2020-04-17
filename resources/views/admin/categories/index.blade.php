@extends('layouts.admin')


@section('content')
@include('includes.session-msg')
<h1>User</h1>
<a href="{{route('admin.categories.create')}}"><button type="button" class="btn btn-primary">Create Category</button></a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Create_at</th>
        <th scope="col">Update_at</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
   
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td>{{$category->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('admin.categories.edit',$category->id)}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                <td>  
                    {!! Form::open(['method'=>'delete','action'=>['AdminCategoryController@destroy',$category->id]]) !!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure ?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$categories->links()}}



@endsection


@section('footer')

@endsection