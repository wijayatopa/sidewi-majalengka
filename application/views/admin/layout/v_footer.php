</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/metisMenu/metisMenu.min.js"></script>

     <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/back-end/dist/js/sb-admin-2.js"></script>

     <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    <script type="text/javascript">
      
      function setMapToForm(latitude, longitude) 
        {
          $('input[name="latitude"]').val(latitude);
          $('input[name="longitude"]').val(longitude);
        }

    </script>


    <script> 
  window.setTimeout(function() { $(".alert").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000);
   </script>

</body>

</html>
