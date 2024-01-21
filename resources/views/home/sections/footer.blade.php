</div>
<!-- content close -->
<a href="#" id="back-to-top"></a>
<!-- footer begin -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="copy">{{ $copyright }}</span>
            </div>
        </div>
    </div>
</footer>
<!-- footer close -->
</div>
<!-- Javascript Files
================================================== -->
<script src="{{ asset('js/front/plugins.js') }}"></script>
<script src="{{ asset('js/front/designesia.js') }}"></script>
<!--
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script src="{{ asset('js/front/form.js') }}"></script>
<script>
jQuery(function($) {
$('.g-recaptcha').attr('data-theme', 'dark');
});
</script>
-->

<script>
jQuery(document).ready(function() {
$(function() {
    // jquery typed plugin
    $(".typed").typed({
        stringsElement: $('.typed-strings'),
        typeSpeed: 100,
        backDelay: 500,
        loop: true,
        contentType: 'html', // or text
        // defaults to false for infinite loop
        loopCount: false,
        callback: function() { null; },
        resetCallback: function() { newTyped(); }
    });
});
});
</script>


@if (Session::has('message'))
    <script>
        alert('{{ Session::get('message') }}');
    </script>
@endif


</body>

</html>