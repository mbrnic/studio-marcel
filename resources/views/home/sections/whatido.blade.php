<section id="section-whatido" class="no-bottom">
    <div class="container relative">
        <div class="row" style="margin-bottom: -35px;">
            <div class="col-md-12 text-center wow fadeInUp">
                <h2 class="id-color">What I Do</h2>
            </div>
        </div>
            <div class="row gx-5">
                <div class="col-md-4 mb-0 item images-group" style="margin-top: 35px;">
                    @if (isset($doPhotographyImage))
                        <a class="image-popup-gallery wow" href="{{ asset('item/' . $doPhotographyImage->src) }}">
                            <div class="card-image-1 mod-e" data-tilt>
                                <div class="d-text text-center">
                                    <h3>{{ $doPhotographyText }}</h3>
                                </div>
                                <img src="{{ asset('item/' . $doPhotographyImage->src) }}" class="img-fluid" alt="{{ $doPhotographyImage->src }}">
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-4 mb-0 item images-group" style="margin-top: 35px;">
                    @if (isset($doFilmingImage))
                        <a class="image-popup-gallery wow" href="{{ asset('item/' . $doFilmingImage->src) }}">
                            <div class="card-image-1 mod-e" data-tilt>
                                <div class="d-text text-center">
                                    <h3>{{ $doFilmingText }}</h3>
                                </div>
                                <img src="{{ asset('item/' . $doFilmingImage->src) }}" class="img-fluid" alt="{{ $doFilmingImage->alt }}">
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-4 mb-0 item images-group" style="margin-top: 35px;">
                    @if (isset($doVideoSnappingImage))
                        <a class="image-popup-gallery wow" href="{{ asset('item/' . $doVideoSnappingImage->src) }}">
                            <div class="card-image-1 mod-e" data-tilt>
                                <div class="d-text text-center">
                                    <h3>{{ $doVideoSnappingText }}</h3>
                                </div>
                                <img src="{{ asset('item/' . $doVideoSnappingImage->src) }}" class="img-fluid" alt="{{ $doVideoSnappingImage->alt }}">
                            </div>
                        </a>
                    @endif
                </div>
            </div>
    </div>
</section>