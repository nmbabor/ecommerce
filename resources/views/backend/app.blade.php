 @include('backend._partials.head')
 @include('backend._partials.header')
 @include('backend._partials.sidebar')
 

<!--main content start-->
<section id="main-content">

<section class="wrapper">
@if(Session::has('success'))
<div class="col-md-12">
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <b>{!! Session::get('success')!!}</b> 
       </div>
</div>
@elseif(Session::has('error'))
  <div class="col-md-12">
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <b>{!! Session::get('error')!!}</b> 
       </div>
  </div>
@endif
 @yield('content')
</section>
</section>
<!--main content end-->
 </section>
<script src="{{asset('public/backend/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-migrate.js')}}"></script>
<script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
<script src="{{asset('public/backend/bs3/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('public/backend/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>

<script src="{{ asset('public/backend/js/chosen.jquery.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('public/backend/js/data-tables/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/js/data-tables/DT_bootstrap.js')}}"></script>
<!--common script init for all pages-->
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/custom.js')}}"></script>

<!--script for this page only-->
<script src="{{asset('public/backend/js/table-editable.js')}}"></script>
<script src="{{asset('public/backend/js/dynamic_table_init.js')}}"></script>
@yield('script')

<!-- END JAVASCRIPTS -->
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-selects'           : {},
      '.chosen'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        $(".chosen-select").chosen();
    });
</script>
</body>
</html>
