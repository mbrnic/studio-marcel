<section id="section-contact" class="jarallax">
    <div class="de-gradient-edge-top"></div>
    <img src="{{ asset('item/background-footer.jpg') }}" class="jarallax-img" alt="">
    <div class="container z-index-1000">
        <div class="row">
            <div class="col-md-12 text-center wow fadeInUp">
                <h2 class="id-color">{{ $contactMeTitle }}</h2>
            </div>
            <div class="col-lg-8 offset-lg-2 wow fadeInUp">
                <div class="contact_form_wrapper">

                    <form name="contactForm" id="contact_form2" class="form-border" method="POST" action="{{ route('send.mail') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="field-set">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="field-set">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="field-set">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" value="{{ old('phone') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="field-set">
                                <textarea name="message" id="message" class="form-control" placeholder="Your Message. Please send me a detailed message clearly describing your needs or questions. Thank you for your cooperation!" value="{{ old('message') }}" required></textarea>
                            </div>

                            <div id='submit' class="mt10">
                                <button class="btn-main text-dark" type="submit" id="send_message" name="send_message" value="Send Message">
                                    Send Message
                                </button>
                            </div>

                            <div id="success_message" class='success'>
                                Your message has been sent successfully. Refresh this page if you want to send more messages.
                            </div>
                            <div id="error_message" class='error'>
                                Sorry there was an error sending your form.
                            </div>
                        </div>
                    </form>

                </div>
                <div class="spacer-double"></div>
                <div class="row text-center wow fadeInUp">
                    <div class="col-md-4">
                        <div class="wm-1"></div>
                        <h6>Email Me</h6>
                        <p>marcel1pav@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <div class="wm-1"></div>
                        <h6>Viber / WhatsApp / Call Me</h6>
                        <p>+385 99 410 4055</p>
                    </div>
                    <div class="col-md-4">
                        <div class="wm-1"></div>
                        <h6>Working Location</h6>
                        <p>Croatia</p>
                    </div>
                </div>
                <div class="spacer-double"></div>
                <div class="row text-center wow fadeInUp">
                    <div class="col-md-4">
                        <div class="wm-1"></div>
                        <h6><a href="https://www.facebook.com/PVgrapherMarcel" style="color: white;"><i class="text-white fa fa-facebook fa-3x"></i> Facebook</a></h6>
                        <p>@marcel_pavlovic98</p>
                    </div>
                    <div class="col-md-4">
                        <div class="wm-1"></div>
                        <h6><a href="https://www.instagram.com/studio_marcelp/" style="color: white;"><i class="text-white fa fa-instagram fa-3x"></i> Instagram</a></h6>
                        <p>@studio_marcelp</p>
                    </div>
                    <div class="col-md-4">
                        <div class="wm-1"></div>
                        <h6><a href="https://www.youtube.com/channel/UCWFz-6UWwn1JY0Ur3K0IKCw" style="color: white;"><i class="text-white fa fa-youtube fa-3x"></i> YouTube</a></h6>
                        <p>@marcelpavlovic5700</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-bottom"></div>
</section>