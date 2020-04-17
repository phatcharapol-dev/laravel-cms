
    <!-- Header -->
    @include('includes.front_header')



    <!-- Navigation -->
    @include('includes.front_nav')

    <!-- Page Content -->
    <div class="container content-blog-home">

        <div class="row">

            <div class="col-md-12">
                @yield('login-form')
                @yield('register-form')
            </div>


            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                @yield('category')

            </div>

        </div>
        <!-- /.row -->

        <hr>

        

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('includes.front_footer')



