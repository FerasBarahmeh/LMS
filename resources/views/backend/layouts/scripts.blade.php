<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>

<!--Internal  Select2 js -->
<script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Bootstrap Bundle js -->
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- Ionicons js -->
<script src="{{ asset('backend/assets/plugins/ionicons/ionicons.js')}}"></script>

<!-- Moment js -->
<script src="{{ asset('backend/assets/plugins/moment/moment.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>

<!-- Eva-icons js -->
<script src="{{ asset('backend/assets/js/eva-icons.min.js')}}"></script>

<!-- right-sidebar js -->
<script src="{{ asset('backend/assets/plugins/sidebar/sidebar.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/sidebar/sidebar-custom.js')}}"></script>

<!-- Sticky js -->
<script src="{{ asset('backend/assets/js/sticky.js')}}"></script>
<script src="{{ asset('backend/assets/js/modal-popup.js')}}"></script>

<!-- Left-menu js-->
<script src="{{ asset('backend/assets/plugins/side-menu/sidemenu.js')}}"></script>


<!--Internal  index js -->
<script src="{{ asset('backend/assets/js/index-dark.js')}}"></script>


<!-- custom js -->
<script src="{{ asset('backend/assets/js/custom.js')}}"></script>
<script src="{{ asset('backend/assets/js/input-file.js')}}"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stack('js')
