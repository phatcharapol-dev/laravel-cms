 <!-- Blog Search Well -->
<div class="well">

    <h4>Blog Search</h4>
    <form method="GET" action="{{route('home.post.search')}}">
    <div class="input-group">
        <input type="text" name="keySearch" class="form-control" placeholder="Search Post Title">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">

            <ul class="list-unstyled">
                @foreach($categories as $category)
                <li><a href="{{route('home.post.category.search',$category->slug)}}">{{$category->name}}</a>
                </li>
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