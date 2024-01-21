</div>

<!-- End of Container Begin -->

</div>
<!-- end paper bg -->

</div>
<!-- end of off-canvas-wrap -->

<!-- end of inner-wrap -->



<!-- 
    If there was error caught, this was supposed to open modal where error was caught after refresh of the page.
    Not using it, but keeping the function live. It is called from body onload.
-->
@if ($errors->any())
<script>
    function checkForErrors() {
        //document.getElementById("buttonModalAddNew").click();
    }
</script>
@else
<script>
    function checkForErrors() {
        //document.getElementById("buttonModalAddNew").click();
    }
</script>
@endif



<!-- main javascript library -->
<script type='text/javascript' src="{{ asset('js/admin/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/waypoints.min.js') }}"></script>
<script type='text/javascript' src='{{ asset('js/admin/preloader-script.js') }}'></script>
<!-- foundation javascript -->
<script type='text/javascript' src="{{ asset('js/admin/foundation.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/admin/foundation/foundation.dropdown.js') }}"></script>
<!-- main edumix javascript -->
<script type='text/javascript' src='{{ asset('js/admin/slimscroll/jquery.slimscroll.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/admin/slicknav/jquery.slicknav.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/admin/sliding-menu.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/admin/scriptbreaker-multiple-accordion-1.js') }}'></script>
<script type="text/javascript" src="{{ asset('js/admin/number/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/circle-progress/jquery.circliful.js') }}"></script>
<script type='text/javascript' src='{{ asset('js/admin/app.js') }}'></script>
<!-- additional javascript -->
<script type='text/javascript' src="{{ asset('js/admin/number-progress-bar/jquery.velocity.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/admin/number-progress-bar/number-pb.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/admin/loader/loader.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/admin/loader/demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/stacktable/stacktable.js') }}"></script>
<!-- FLOT CHARTS -->
<!--
<script src="{{ asset('js/admin/flot/jquery.flot.js') }}" type="text/javascript"></script>
-->
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<!--
<script src="{{ asset('js/admin/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
-->
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<!--
<script src="{{ asset('js/admin/flot/jquery.flot.pie.min.js') }}" type="text/javascript"></script>
-->
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<!--
<script src="{{ asset('js/admin/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
-->
<script type="text/javascript" src="{{ asset('js/admin/skycons/skycons.js') }}"></script>


<script>
    $(document).on('click', '#run', function(e) {
        e.preventDefault();
        $('#simple-example-table').stacktable({
            hideOriginal: true
        });
        $(this).replaceWith('<span>ran</span>');
    });
    $('#responsive-example-table').stacktable({
        myClass: 'stacktable small-only'
    });
    $('#responsive-example-table-2').stacktable({
        myClass: 'stacktable small-only'
    });
</script>


<script type="text/javascript">
    $(function() {
        "use strict";
    });

    /*
    * Custom Label formatter
    * ----------------------
    */
    function labelFormatter(label, series) {
    return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
    }
</script>


<script>
$(document).foundation();
</script>



</body>

</html>
