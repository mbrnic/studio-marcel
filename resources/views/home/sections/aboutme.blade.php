<section id="section-aboutme">
    <div class="container relative">
        <div class="row gh-5">
            <div class="col-lg-6 wow fadeInUp">
                <div class="p-4">
                    <h3 class="s_border">My Signature Works</h3>
                    <ul class="d_timeline">

                        @foreach ($mySignatureWorks as $mySignatureWork)

                            <li class="d_timeline-item">
                                <h3 class="d_timeline-title s2">{{ $mySignatureWork->list_title }}</h3>
                                <p class="d_timeline-text">
                                    <span class="d_title">{{ $mySignatureWork->title }}</span>
                                    <span class="d_company">{{ $mySignatureWork->subtitle }}</span>
                                    {{ $mySignatureWork->description }}
                                </p>
                                <div class="col-md-12 mb-0 item images-group">
                                    <div class="d_timeline-text popup-gallery">

                                        @foreach ($mySignatureWork->gallery_items as $item)

                                            <a @if ($loop->iteration>1) hidden @endif

                                                @if ( Str::contains($item->src, 'youtube.com/watch') || Str::contains($item->src, '.mp4') )
                                                    href="{{ asset('item/' . $item->src) }}" class="video" title="">
                                                @elseif ( Str::contains($item->src, ['.jpg', '.jpeg', '.png']) )
                                                    href="{{ asset('item/' . $item->src) }}" class="image">
                                                @endif
            
            
                                                @if ($loop->iteration==1)
                                                
                                                    @if ( Str::contains($mySignatureWork->headline->src, 'youtube.com/watch') )
                                                        
                                                        <div class="card-image-1 mod-e" data-tilt>
                                                            <div class="d-text text-center">
                                                                <h3></h3>
                                                            </div>
                                                            <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $mySignatureWork->headline->src) }}/hqdefault.jpg" class="img-fluid" alt="{{ $mySignatureWork->headline->alt }}">
                                                        </div>
            
                                                    @else
            
                                                        <div class="card-image-1 mod-e" data-tilt>
                                                            <div class="d-text text-center">
                                                                <h3></h3>
                                                            </div>
                                                            <img src="{{ asset('item/' . $mySignatureWork->headline->src) }}" class="img-fluid" alt="{{ $mySignatureWork->headline->alt }}">
                                                        </div>
            
                                                    @endif
                                                    
                                                @endif
            
                                            </a>

                                        @endforeach

                                    </div>
                                </div>

                            </li>

                        @endforeach

                    </ul>
                </div>
            </div>



            <div class="col-lg-6 wow fadeInUp">
                <div class="p-4">
                    <h3 class="s_border">Media About Me</h3>
                    <ul class="d_timeline">

                        @foreach ($mediaAboutMes as $mediaAboutMe)

                            <li class="d_timeline-item">
                                <h3 class="d_timeline-title s2">{{ $mediaAboutMe->list_title }}</h3>
                                <p class="d_timeline-text">
                                    <span class="d_title">{{ $mediaAboutMe->title }}</span>
                                    <span class="d_company">{{ $mediaAboutMe->subtitle }}</span>
                                    {{ $mediaAboutMe->description }}
                                </p>
                                <div class="col-md-12 mb-0 item images-group">
                                    <div class="d_timeline-text popup-gallery">

                                        @foreach ($mediaAboutMe->gallery_items as $item)

                                            <a @if ($loop->iteration>1) hidden @endif

                                                @if ( Str::contains($item->src, 'youtube.com/watch') || Str::contains($item->src, '.mp4') )
                                                    href="{{ asset('item/' . $item->src) }}" class="video" title="">
                                                @elseif ( Str::contains($item->src, ['.jpg', '.jpeg', '.png']) )
                                                    href="{{ asset('item/' . $item->src) }}" class="image">
                                                @endif
        
        
                                                @if ($loop->iteration==1)
                                            
                                                    @if ( Str::contains($mediaAboutMe->headline->src, 'youtube.com/watch') )
                                                    
                                                        <div class="card-image-1 mod-e" data-tilt>
                                                            <div class="d-text text-center">
                                                                <h3></h3>
                                                            </div>
                                                            <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $mediaAboutMe->headline->src) }}/hqdefault.jpg" class="img-fluid" alt="{{ $mediaAboutMe->headline->alt }}">
                                                        </div>
        
                                                    @else
        
                                                        <div class="card-image-1 mod-e" data-tilt>
                                                            <div class="d-text text-center">
                                                                <h3></h3>
                                                            </div>
                                                            <img src="{{ asset('item/' . $mediaAboutMe->headline->src) }}" class="img-fluid" alt="{{ $mediaAboutMe->headline->alt }}">
                                                        </div>
        
                                                    @endif
                                                
                                                @endif
        
                                            </a>

                                        @endforeach

                                    </div>
                                </div>

                            </li>

                        @endforeach

                    </ul>
                </div>
            </div>



        </div>
    </div>
</section>