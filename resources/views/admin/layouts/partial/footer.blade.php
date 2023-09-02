<!-- footer content -->
<footer>
    <div class="pull-right">
        Admin Template by Softguide OJT Trainer
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->



<!-- Bootstrap -->
<script src="{{ asset('assets/backend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- NProgress -->
<script src="{{ asset('assets/backend/js/nprogress/nprogress.js') }}"></script>

<!-- bootstrap-progressbar -->
<script src="{{ asset('assets/backend/js/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/backend/js/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- PNotify -->
<script src="{{ asset('assets/backend/js/pnotify/pnotify.js') }}"></script>
<script src="{{ asset('assets/backend/js/pnotify/pnotify.buttons.js') }}"></script>
<script src="{{ asset('assets/backend/js/pnotify/pnotify.nonblock.js') }}"></script>
<script src="{{ asset('assets/backend/js/validation/jquery.validate.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/backend/js/datatable/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/datatable/datatables.net-bs/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/datatable/datatables.net-responsive/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('assets/backend/js/datatable/datatables.net-responsive-bs/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('assets/backend/js/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/backend/js/custom.js') }}"></script>
@if (session()->has('success_msg'))
    <script>
        new PNotify({
            title: 'Success!',
            text: "{{ session()->get('success_msg') }}",
            type: 'success',
            styling: 'bootstrap3'
        })
    </script>
@endif

@if (session()->has('error_msg'))
    <script>
        new PNotify({
            title: 'Error!',
            text: "{{ session()->get('error_msg') }}",
            type: 'error',
            styling: 'bootstrap3'
        })
    </script>
@endif


@yield('extra_script')

</body>

</html>
