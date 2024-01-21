<section id="section-my-quote" aria-label="section" style="margin-top: -400px;">
    <div class="v-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10 offset-md-1">

                    @foreach ($quotes as $quote)

                        <div class="row" style="background-size: cover;">
                            <div class="col-md-12 text-center wow fadeInUp animated" style="background-size: cover; visibility: visible; animation-name: fadeInUp;">
                                <h3>{{ $quote->value }}</h3>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>