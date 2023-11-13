</div>    
<script src="{{asset('admin-assets/vendors/js/vendor.bundle.base.js')}}"></script>

<script src="{{asset('admin-assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin-assets/js/jquery.cookie.js')}}" type="text/javascript"></script>

<script src="{{asset('admin-assets/js/off-canvas.js')}}"></script>
<script src="{{asset('admin-assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin-assets/js/misc.js')}}"></script>

<script src="{{asset('admin-assets/js/dashboard.js')}}"></script>
<script src="{{asset('admin-assets/js/todolist.js')}}"></script>
<script src="{{asset('admin-assets/vendors/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/summernote/summernote.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(".summernote").summernote({
            height:250
        });
    });
</script>
@yield('customJs')
</body>
</html>