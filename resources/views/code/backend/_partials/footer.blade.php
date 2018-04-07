</section>
<script src="{{asset('public/backend/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-migrate.js')}}"></script>
<script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
<script src="{{asset('public/backend/bs3/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('public/backend/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--Easy Pie Chart-->
<script src="{{asset('public/backend/js/easypiechart/jquery.easypiechart.js')}}"></script>
<!--Sparkline Chart-->
<script src="{{asset('public/backend/js/sparkline/jquery.sparkline.js')}}"></script>
<!--jQuery Flot Chart-->
<script src="{{asset('public/backend/js/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('public/backend/js/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('public/backend/js/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{asset('public/backend/js/flot-chart/jquery.flot.pie.resize.js')}}"></script>

<script type="text/javascript" src="{{asset('public/backend/js/data-tables/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/js/data-tables/DT_bootstrap.js')}}"></script>

<!--common script init for all pages-->
<script src="{{asset('public/backend/js/scripts.js')}}"></script>

<!--script for this page only-->
<script src="{{asset('public/backend/js/table-editable.js')}}"></script>
<script src="{{asset('public/backend/js/dynamic_table_init.js')}}"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>
</body>
</html>