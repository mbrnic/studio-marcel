<section id="section-portfolio" class="no-bottom" style="margin-top: -350px;">
    <div class="container relative">
        <div class="row">
            <div class="col-md-12 text-center wow fadeInUp">
                <h2 class="id-color">{{ $portfolioTitle }}</h2>
            </div>
        </div>
        <div id="gallery" class="row g-4 sequence">

            @foreach ($portfolios as $portfolio)

                <div class="col-md-4 mb-0 item images-group">
                    <div class="popup-gallery">

                        @foreach ($portfolio->gallery_items as $item)

                            
                            <a @if ($loop->iteration>1) hidden @endif
                            
                                @if ( Str::contains($item->src, 'youtube.com/watch') || Str::contains($item->src, '.mp4') )
                                    href="{{ asset('item/' . $item->src) }}" class="video" title="">
                                @elseif ( Str::contains($item->src, ['.jpg', '.jpeg', '.png']) )
                                    href="{{ asset('item/' . $item->src) }}" class="image">
                                @endif


                                @if ($loop->iteration==1 && isset($portfolio->headline->src))
                                    
                                    @if ( Str::contains($portfolio->headline->src, 'youtube.com/watch') )
                                            
                                        <div class="card-image-1 mod-e" data-tilt>
                                            <div class="d-text text-center">
                                                <h3>{{ $portfolio->title }}</h3>
                                            </div>
                                            <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $portfolio->headline->src) }}/hqdefault.jpg" class="img-fluid" alt="{{ $portfolio->headline->alt }}">
                                        </div>

                                    @else

                                        <div class="card-image-1 mod-e" data-tilt>
                                            <div class="d-text text-center">
                                                <h3>{{ $portfolio->title }}</h3>
                                            </div>
                                            <img src="{{ asset('item/' . $portfolio->headline->src) }}" class="img-fluid" alt="{{ $portfolio->headline->alt }}">
                                        </div>

                                    @endif
                                        
                                @endif

                            </a>

                        @endforeach

                    </div>
                </div>

            @endforeach

        </div>
    </div>
</section>