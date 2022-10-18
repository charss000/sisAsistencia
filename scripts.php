        <script>
			function myFunction() {
				document.getElementById("text").submit();
			}
			myFunction
		</script>
		 <script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script>
		  $(function () {
			$("#example1").DataTable({
			  "responsive": true,
			  "autoWidth": false,
			});
			$('#example2').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": true,
			  "info": true,
			  "autoWidth": false,
			  "responsive": true,
			});
		  });
		</script>
          <script type="text/javascript">
			$(document).ready(function () {
			window.setTimeout(function() {
				$("#alert").fadeTo(1000, 0).slideUp(1000, function(){
					$(this).remove(); 
				});
			}, 5000);
			
			});
			</script>
           