    <!-- Header -->
    @include('includes.front_header')



    <!-- Navigation -->
    @include('includes.front_nav')

    <!-- Page Content -->
    <div class="container content-blog-post">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                @yield('side_bar')     

            </div>

        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

   <!-- Footer -->
    @include('includes.front_footer')
