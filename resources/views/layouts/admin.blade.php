<!-- Header -->
@include('includes.admin_header')

<div id="wrapper">
    <!-- Navigation -->
    @include('includes.admin_nav')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    @include('includes.session-msg')

                    @yield('content')

                    
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        @include('includes.form-error')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Footer -->
@include('includes.admin_footer')




