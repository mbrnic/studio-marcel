<body onload="checkForErrors();">
    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- End of preloader -->

    <div class="off-canvas-wrap" data-offcanvas>
        <!-- right sidebar wrapper -->
        <div class="inner-wrap">


            <!-- Right sidemenu -->
            <div id="skin-select">
                <!--      Toggle sidemenu icon button -->
                <a id="toggle">
                    <span class="fa icon-menu"></span>
                </a>
                <!--      End of Toggle sidemenu icon button -->

                <div class="skin-part">
                    <div id="tree-wrap">
                        <!-- Profile -->
                        <div class="" style="text-align: center">
                            <img alt="" class="" src="{{ asset('item/logo-7-logo-h100.png') }}" style="height: 50px;">
                            <img alt="" class="" src="{{ asset('item/logo-7-text-h100.png') }}" style="height: 50px;">
                        </div>
                        <!-- End of Profile -->

                        <!-- Menu sidebar begin-->
                        <div class="side-bar" style="margin-top: 15px;">
                            <ul id="menu-showhide" class="topnav slicknav">
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.aka.index') }}" title="Aka tekstovi">
                                        <i class="fontello-info"></i>
                                        <span>Aka tekstovi</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.meta.index') }}" title="Meta podaci">
                                        <i class="fontello-location"></i>
                                        <span>Meta podaci</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.what.index') }}" title="What I Do">
                                        <i class="fontello-user-add"></i>
                                        <span>What I Do</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.signature.index') }}" title="My Signature Works">
                                        <i class="fontello-edit"></i>
                                        <span>My Signature Works</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.media.index') }}" title="Media About Me">
                                        <i class="fontello-desktop"></i>
                                        <span>Media About Me</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.quote.index') }}" title="Citati">
                                        <i class="fontello-pause"></i>
                                        <span>Citati</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.portfolio.index') }}" title="Portfolio">
                                        <i class="fontello-picture"></i>
                                        <span>Portfolio</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('admin.other.index') }}" title="Ostalo">
                                        <i class="fontello-waves"></i>
                                        <span>Ostalo</span>
                                    </a>
                                </li>
                                <li hidden>
                                    <a class="tooltip-tip" href="#" title="Ne povezano">
                                        <i class="fontello-block"></i>
                                        <span>Ne povezano</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="tooltip-tip" href="{{ route('logout') }}" title="Odjava">
                                        <i class="fontello-export"></i>
                                        <span>Odjava</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end of Menu sidebar  -->
                    </div>
                </div>
            </div>
            <!-- end of Rightsidemenu -->



            <div class="wrap-fluid" id="paper-bg">

                <!-- Container Begin -->