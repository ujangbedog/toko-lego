        <!-- footer content -->
        <footer>
          <div class="pull-right">
            All Rights Reserved. &copy; 2022 <a href="#">Ilham Alfath</a></p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  
    <!-- jQuery -->
    <script src="{{ asset('vendor/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendor/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendor/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendor/admin/vendors/nprogress/nprogress.js') }}"></script>

    @if(Request::path() == 'admin/products')
    <!-- resources -->
        <script src="{{ asset('vendor/admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
        <script src="{{ asset('vendor/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    @endif

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('vendor/admin/build/js/custom.min.js') }}"></script>
    
  </body>
</html>