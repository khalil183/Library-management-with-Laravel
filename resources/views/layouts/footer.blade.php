

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <h3>Are You Sure Want To delete This Item?? Please Delete Here</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-primary">Delete</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('public/admin/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('public/admin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/admin/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/admin/dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/admin/dist/js/demo.js') }}" type="text/javascript"></script>
      <!-- Select2 -->
  <script src="{{ asset('public/admin/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('messege'))
      var type="{{Session::get('alert-type','info')}}"
      switch(type){
          case 'info':
               toastr.info("{{ Session::get('messege') }}");
               break;
          case 'success':
              toastr.success("{{ Session::get('messege') }}");
              break;
          case 'warning':
             toastr.warning("{{ Session::get('messege') }}");
              break;
          case 'error':
              toastr.error("{{ Session::get('messege') }}");
              break;
      }
    @endif
 </script>



  </body>
</html>


