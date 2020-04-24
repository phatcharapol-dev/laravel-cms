    <!-- Header -->
    @include('includes.front_header')



    <!-- Navigation -->
    @include('includes.front_nav')


    <!-- Page Content -->
    <div class="container content-blog-post">
         @include('includes.session-msg')
         @include('includes.form-error')
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                @include('includes.front_sidebar') 

            </div>

        </div>
        <!-- /.row -->
        <hr>

    </div>
    <!-- /.container -->

   <!-- Footer -->
    @include('includes.front_footer')
