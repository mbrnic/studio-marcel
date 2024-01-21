@include('admin.sections.header')




<body onload="checkForErrors();">
    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- End of preloader -->
    <!-- right sidebar wrapper -->

    <div class="inner-wrap">
        <div class="wrap-fluid">
            <br>
            <br>
            <!-- Container Begin -->
            <div class="large-offset-4 large-4 columns">
                <div class="box bg-white">
                    <!-- Profile -->
                    <div class="" style="text-align: center;">
                        <img alt="" class="" src="{{ asset('item/logo-7-logo-h100.png')}}" style="height: 50px; margin-top: 25px;">
                        <img alt="" class="" src="{{ asset('item/logo-7-text-h100.png')}}" style="height: 50px; margin-top: 25px;">
                    </div>
                    <!-- End of Profile -->

                    <!-- /.box-header -->
                    <div class="box-body " style="display: block;">
                        <div class="row">

                            <div class="large-12 columns">
                                <div class="row">
                                    <div class="edumix-signup-panel">
                                        <p class="welcome"></p>

                                        <form action="{{ route('login') }}" method="POST" id="formLogin" name="formLogin">
                                            @csrf
                                            <div class="row collapse">
                                                <div class="small-2  columns">
                                                    <span class="prefix bg-green"><i class="text-white icon-user"></i></span>
                                                </div>
                                                <div class="small-10  columns">
                                                    <input type="text" placeholder="Username" id="email" name="email">
                                                </div>
                                            </div>
                                            <div class="row collapse">
                                                <div class="small-2 columns ">
                                                    <span class="prefix bg-green"><i class="text-white icon-lock"></i></span>
                                                </div>
                                                <div class="small-10 columns ">
                                                    <input type="password" placeholder="Password" id="password" name="password">
                                                </div>
                                            </div>
                                        <p></p>
                                        <button class="small-12 columns prefix bg-green" type="submit" name="login">
                                            <span class="icon-document-edit"></span> Log In
                                        </button>
                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- end .timeline -->
                </div>
                <!-- box -->
            <!-- </div> -->
        <!-- </div> -->


@include('admin.sections.footer')