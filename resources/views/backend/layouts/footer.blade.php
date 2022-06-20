<!-- Javascript -->
<script src="{{asset('backend/assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{asset('backend/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('backend/assets/bundles/chartist.bundle.js')}}"></script>
<script src="{{asset('backend/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->

<!-- summernote -->
<script src="{{asset('backend/assets/vendor/summernote/summernote.js')}}"></script>
<script src="{{asset('backend/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('backend/assets/vendor/switch-button-bootstrap/src/bootstrap-switch-button.js')}}"></script>
<script src="{{asset('backend/assets/js/index.js')}}"></script>\


@yield('scripts')

<script>
    setTimeout(function () {
        $('#alert').slideUp();
    },4000);
</script>