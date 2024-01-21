<section id="section-services" class="no-bottom">
    <div class="container relative">
        <div class="row">
            <div class="row gx-5">

                <div class="col-md-8 mb-0 item images-group">
                    <div class="d_timeline-text popup-gallery">
                        <a class="video" href="{{ asset('item/' . $videoSrc) }}">
                            <div class="card-image-1 mod-e" data-tilt style="text-align:center;">
                                <div class="d-text text-center">
                                    <h3><span class="fa fa-toggle-right fa-4x"></span></h3>
                                </div>
                                @if ( Str::contains($videoImgSrc, 'youtube.com/watch') )
                                    <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $videoImgSrc) }}/hqdefault.jpg" class="img-fluid" alt="{{ $videoImgAlt }}">
                                @else
                                    <img src="{{ asset('item/' . $videoImgSrc) }}" class="img-fluid" alt="{{ $videoImgAlt }}">
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 wow fadeIn" data-wow-delay=".2s">
                    <div class="text-center" style="margin-top: 55px;">
                        <p>
                            <i class="id-color fa fa-camera-retro fa-4x" style="margin-left: 10px; margin-right: 10px;"></i>
                            <i class="id-color fa fa-camera fa-4x" style="margin-left: 10px; margin-right: 10px;"></i>
                            <i class="id-color fa fa-video-camera fa-4x" style="margin-left: 10px; margin-right: 10px;"></i>
                        </p>
                        <p style="margin-top: 45px;">
                            <h3 class="mb-2">{{ $videoDescription }}</h3>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>