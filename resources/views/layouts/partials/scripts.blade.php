<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

@yield('extra_script')

@stack('script-footer')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

      {{-- <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.js') }}"></script>
      <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script> --}}
@include('layouts.partials.scripts.dataTables')

{{-- @stack('scripts') --}}
