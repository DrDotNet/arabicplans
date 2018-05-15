<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCtype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png" />
	<title>Arabic Plans</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- CSS Files -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url() ?>assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url() ?>assets/css/themify-icons.css" rel="stylesheet">
	
    <!--<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-naskh" type="text/css"/>	
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>-->
	
	
	<link rel="stylesheet"  href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" />	
	<link rel="stylesheet"  href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css" />	
	
	
</head>



<body>
    <!-- Navigation -->
      <div class="container" style="margin-bottom:-12px">
	  
	  
	  
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="<?php echo base_url()?>" style="float:right;margin-top: -8px;">
          <img src="<?php echo base_url() ?>assets/img/logo.png" width="120" alt="">
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
	   <ul class="nav " style="float:left;margin-right: 70px;">
	  		<li style="display:flex">
	   <?php if($this->session->userdata('arabic_palns_flag_user_logged_in') != ""){ ?>
        <a class="logout_btn" href="<?php echo base_url()?>login/logout">
          تسجيل الخروج
        </a>	   
		
        <a class="profile_btn" href="#">
          الملف الشخصي
        </a>	

		<?php if (!isAdmin()) { ?>
        <a class="plans_btn" href="<?php echo base_url()?>plans">
          خطط العمل
        </a>
        <?php } ?>	
 		
	   <?php } ?>
	   
		</li>	
      </ul>
	
	<?php if (isAdmin()) { ?>
      <ul class="nav navbar-nav" style="padding-top: 18px;">
		  
        <li ><a href="<?php echo base_url()?>users">المستخدمين</a></li>
		<li ><a href="<?php echo base_url()?>mainsectors">القطاعات الرئيسية</a></li>
		<li ><a href="<?php echo base_url()?>subsectors">القطاعات الفرعية</a></li>
		<li ><a href="<?php echo base_url()?>activities">الأنشطة الإقتصادية</a></li>
		<li ><a href="<?php echo base_url()?>plans">خطط العمل</a></li>
	
		
		
	
      </ul>
	<?php } ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	  
      </div>

	<div class="head_shadow"></div>
	
	<div class="image-container set-full-height" style="">
	
	
	  <div class="container" style="margin-top:50px;min-height: 600px;">
	  
	  
	        <div class="row">
		        <div class="col-sm-12">
			<ol class="breadcrumb breadcrumb-fill2">
				<li><a href="<?php echo base_url()?>"><i class="fa fa-home"></i></a></li>
				<li class="active">صفحة الخطأ</li>
			</ol>
                
          
 					  <div class="panel">
				
				       <div class="text-center">
					    <h2><?php echo $title ?></h2>
						<h4><?php echo $error_message ?></h4>
						<a class="btn btn-primary" onclick="window.history.go(-1);">
                            رجوع
                         </a>
					   
					   </div>
					  </div>          
           

				  
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->	


	    <div class="footer">
	        <div class="container text-center">
	             كل الحقوق محفوظة 2018
	        </div>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url() ?>assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
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



