@extends('layouts.admin')


@section('content')
<h1>Category</h1>


<div class="row">
    {!! Form::open(['method' => 'get' , 'action' => 'SearchController@searchCategory','class' => 'form-inline']) !!}
        <div class="col-lg-8">
            <a href="{{route('admin.categories.create')}}"><button type="button" class="btn btn-primary">Create Category</button></a>
        </div>
        <div class="col-lg-4">
        {!! Form::text('keySearch',null,['id' => 'keySearch','class' => 'form-control' ,'autocomplete' => 'off','placeholder' => 'Search Category']) !!}
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


<script>
$(document).ready(function(){

 $('#keySearch').keyup(function(){ 
        var keySearch = $(this).val();
        var table = 'categories';
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