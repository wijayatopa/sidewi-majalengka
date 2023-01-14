
<!---copy-right ---->
<div class="copy-right">
	<div class="container">
	
		<div class="footer-social-icons wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<ul>
				<li><a class="facebook" href="#"><span>Facebook</span></a></li>
				<li><a class="twitter" href="#"><span>Twitter</span></a></li>
				<li><a class="flickr" href="#"><span>Flickr</span></a></li>
				<li><a class="googleplus" href="#"><span>Google+</span></a></li>
				<li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
			</ul>
		</div>
		<p class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">© <?php echo date('Y'); ?> Dinas Pariwisata dan Kebudayaan Kabupaten Majalengka</p>
	</div>
</div>
<!--- /copy-right ---->

     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/template/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#tabel').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
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