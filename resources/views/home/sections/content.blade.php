
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <!-- page preloader begin -->
            <div id="preloader">
                <div class="preloader1"></div>
            </div>
            <!-- page preloader close -->

            <!-- load external content begin -->
            <div id="de_modal">
                <button class="button-close"></button>
                <div class="d-modal-loader"></div>
            </div>
             <!-- load external content close -->

            <section aria-label="section" class="jarallax no-top no-bottom text-light">
                <img src="{{ asset('item/background-header.jpg') }}" class="jarallax-img darken-image" alt="">
                <div class="v-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="wow fadeInUp" data-wow-delay=".4s"><span class="id-color">I Am Marcel, aka.</span></h6>
                                <div class="spacer-10"></div>
                                <div class="h1_big text-white wow fadeInUp" data-wow-delay=".6s">
                                    <div class="typed-strings">
                                        
                                        @foreach ($akaStrings as $akaString)
                                        <p>{{ $akaString->name }}</p>
                                        @endforeach

                                    </div>
                                    <div class="typed"></div>
                                </div>
                                <div class="spacer-20"></div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#section-about" class="mouse-icon-click scroll-to wow fadeInUp" data-wow-delay=".8s">
                    <span class="mouse fadeScroll relative" data-scroll-speed="10">
                        <span class="scroll"></span>
                    </span>
                </a>
                <div class="de-gradient-edge-bottom"></div>
            </section>