
    <!-- Header -->
    @include('includes.front_header')



    <!-- Navigation -->
    @include('includes.front_nav')

    <!-- Page Content -->
    <div class="container auth-form">

        

            <!-- Login Form and Register Form -->
            
                <div class="form">
                    
                            @yield('form')

                            <br>
                            @include('includes.form-error')
    
                </div>
            
                



        
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('includes.front_footer')



