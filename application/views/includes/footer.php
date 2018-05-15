	    <div class="footer">
	        <div class="container text-center">
	             كل الحقوق محفوظة 2018
	        </div>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?php echo base_url() ?>assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>

	<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js" type="text/javascript"></script>
	
	<script>
	  $('.table').DataTable({
      "language": {
            "lengthMenu": "إظهار _MENU_ سجلات لكل صفحة",
            "zeroRecords": "لا يوجد أية بيانات",
            "info": "إظهار صفحة _PAGE_ من _PAGES_",
            "infoEmpty": "لا يوجد أية بيانات",
            "infoFiltered": "(filtered from _MAX_ total records)",
			"search":         "بحث",
			"paginate": {
				"first":      "الأول",
				"last":       "الأخير",
				"next":       "التالي",
				"previous":   "السابق"
			},			
        }		  
		  
		  
	  });
	</script>
</html>