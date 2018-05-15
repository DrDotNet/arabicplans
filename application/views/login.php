<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png" />
	<title>Arabic Plans</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- CSS Files -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	
	<!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url() ?>assets/css/themify-icons.css" rel="stylesheet">
	
	<link href="<?php echo base_url() ?>assets/css/demo.css" rel="stylesheet" />

    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-naskh" type="text/css"/>	
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
	
	

	  
</head>

<body>
    <!-- Navigation -->
      <div class="container" style="margin-bottom:-12px">

	  
	   <div class="col-md-12 col-lg-12 col-sm-12">
        <a class="navbar-brand" href="#" style="float:none">
          <img src="<?php echo base_url() ?>assets/img/logo.png" width="120" alt="" style="margin:auto">
        </a>
      </div>
	  
      </div>

	<div class="head_shadow"></div>
	
	<div class="image-container set-full-height" style="">


	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12">

					   <section id="formHolder">

						  <div class="row">

							 <!-- Brand Box -->
							 <div class="col-sm-6 brand">
								<img src="<?php echo base_url() ?>assets/img/logo2.png"  alt="">

								<div class="heading">
								   <h2>Arabic Plans</h2>
								   <p>مستشارك عربي</p>
								</div>

								<div class="success-msg">
								   <p>شكرا جزيلا لتسجيلك وانضمامك لصفحتنا</p>
								   <a href="<?php echo base_url()?>login" class="profile">إضغط هنا لتسجيل الدخول</a>
								</div>
								
								<div class="fail-msg">
								   <p>عذرا .. لا يوجد تطابق بين البريد الإلكتروني وكلمة المرور</p>
								   <a href="<?php echo base_url()?>login" class="profile">رجوع</a>
								</div>

								<div class="fail-msg2">
								   <p>عذرا .. البريد الإلكتروني المسجل موجود حاليا .. من فضلك اختر بريدا الكترونيا آخر</p>
								   <a href="<?php echo base_url()?>login" class="profile">رجوع</a>
								</div>

								<div class="fail-msg3">
								   <p>أدخل كافة البيانات المطلوبة من فضلك ثم أعد المحاولة</p>
								   <a href="<?php echo base_url()?>login" class="profile">رجوع</a>
								</div>

								<div class="fail-msg4">
								   <p>كلمتا المرور غير متطابقتان</p>
								   <a href="<?php echo base_url()?>login" class="profile">رجوع</a>
								</div>
								
							 </div>


							 <!-- Form Box -->
							 <div class="col-sm-6 form">

							 
								<!-- Login Form -->
								<div class="login form-peice ">
								 <h1>تسجيل الدخول</h1>
								   <form autocomplete="off" class="login-form" action="<?php echo base_url() ?>Login/login" method="post" >
								   <input name="loginemail"  type="email" style="display:none;">
								   <input name="loginPassword"  type="password" style="display:none;">
									  <div class="form-group">
										 <label for="loginemail">البريد الإلكتروني</label>
										 
										 <input type="text" name="loginemail" id="loginemail" class="loginemail" >
										 <span class="error"></span>
										 
									  </div>

									  <div class="form-group">
										 <label for="loginPassword">كلمة المرور</label>
										 
										 <input  type="password" name="loginPassword" id="loginPassword" class="loginPassword" >
										 <span class="error"></span>
									  </div>

									  <div class="CTA">
										 <input name="submit" type="submit" value="تسجيل الدخول">
										 <a href="#" class="switch">حساب جديد</a>
									  </div>
								   </form>
								</div><!-- End Login Form -->


								<!-- Signup Form -->
								<div class="signup form-peice switched" >
								<h1>إنشاء حساب جديد</h1>
								   <form class="signup-form" action="<?php echo base_url() ?>Login/create_account" method="post" style="top: 55%;">

									  <div class="form-group">
										 <label for="name">الإسم الكامل</label>
										 <input type="text" name="username" id="name" class="name">
										 <span class="error"></span>
									  </div>

									  <div class="form-group">
										 <label for="email">البريد الإلكتروني</label>
										 <input type="text" name="emailAdress" id="email" class="email">
										 <span class="error"></span>
									  </div>

									  <!--<div class="form-group">
										 <label for="phone">رقم الهاتف - <small>إختياري</small></label>
										 <input type="text" name="phone" id="phone">
									  </div> -->

									  <div class="form-group">
										 <label for="password">كلمة المرور</label>
										 <input type="password" name="password" id="password" class="pass">
										 <span class="error"></span>
									  </div>

									  <div class="form-group">
										 <label for="passwordCon">تأكيد كلمة المرور</label>
										 <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
										 <span class="error"></span>
									  </div>

									  <div class="CTA">
										 <input name="submit" type="submit" value="إنشاء" id="submit">
										 <a href="#" class="switch">لدي حساب</a>
									  </div>
								   </form>
								</div><!-- End Signup Form -->
							 </div>
						  </div>

					   </section>



	

		            
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

	<script>
$(document).ready(function () {

    'use strict';

    var usernameError = true,
        emailError    = true,
        passwordError = true,
        passConfirm   = true,
		loginEmailError    = true,
		loginPasswordError    = true;

    // Detect browser for css purpose
    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        $('.form form label').addClass('fontSwitch');
    }

    // Label effect
    $('input').focus(function () {

        $(this).siblings('label').addClass('active');
    });

    // Form validation
    $('input').blur(function () {

        // User Name
        if ($(this).hasClass('name')) {
            if ($(this).val().length === 0) {
                $(this).siblings('span.error').text('أدخل اسمك الكامل من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                usernameError = true;
            } else if ($(this).val().length > 1 && $(this).val().length <= 5) {
                $(this).siblings('span.error').text('أدخل على الأقل ستة حروف من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                usernameError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                usernameError = false;
            }
        }
        // Email
        if ($(this).hasClass('email')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('أدخل بريدك الإلكتروني من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                emailError = true;
            }else if (!validateEmail($(this).val())) {
                $(this).siblings('span.error').text('أدخل بريدا الكترونيا صحيحا من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                emailError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                emailError = false;
            }
        }

        // PassWord
        if ($(this).hasClass('pass')) {
            if ($(this).val().length < 8) {
                $(this).siblings('span.error').text('أدخل على الأقل ثمانية حروف من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                passwordError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                passwordError = false;
            }
        }

        // PassWord confirmation
        if ($('.pass').val() !== $('.passConfirm').val()) {
            $('.passConfirm').siblings('.error').text('كلمتا المرور غير متطابقتان').fadeIn().parent('.form-group').addClass('hasError');
            passConfirm = false;
        } else {
            $('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
            passConfirm = false;
        }

		
		
        // Login Email
        if ($(this).hasClass('loginemail')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('أدخل بريدك الإلكتروني من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                loginEmailError = true;
            } else if (!validateEmail($(this).val())) {
                $(this).siblings('span.error').text('أدخل بريدا الكترونيا صحيحا من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                loginEmailError = true;
            }else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                loginEmailError = false;
            }
        }
		
        // Login PassWord
        if ($(this).hasClass('loginPassword')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('أدخل كلمة المرور من فضلك').fadeIn().parent('.form-group').addClass('hasError');
                loginPasswordError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                loginPasswordError = false;
            }
        }		
		
        // label effect
        if ($(this).val().length > 0) {
            $(this).siblings('label').addClass('active');
        } else {
            $(this).siblings('label').removeClass('active');
        }
    });


    // form switch
    $('a.switch').click(function (e) {
        $(this).toggleClass('active');
        e.preventDefault();

        if ($('a.switch').hasClass('active')) {
            $(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
        } else {
            $(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
        }
    });


    // Form submit
    $('form.signup-form').submit(function (event) {
        event.preventDefault();

        if (usernameError == true || emailError == true || passwordError == true || passConfirm == true) {
            $('.name, .email, .pass, .passConfirm').blur();
        } else {
            $('.signup, .login').addClass('switched');

			  /* get some values from elements on the page: */
			  var $form = $( this ),
				  url = $form.attr( 'action' );

			  /* Send the data using post */
			  var posting = $.post( url, { submit: 'submit' ,   fullname: $('#name').val() , password: $('#password').val(),password2: $('#passwordCon').val(), email: $('#email').val() } );

			  /* Alerts the results */
			  posting.done(function( data ) {
				  //alert(data);
				  if (data == 0) {
			  
					setTimeout(function () { $('.signup, .login').hide(); }, 700);
					setTimeout(function () { $('.brand').addClass('active'); }, 300);
					setTimeout(function () { $('.heading').addClass('active'); }, 600);
                    setTimeout(function () { $('.fail-msg2 p').addClass('active'); }, 900);
                    setTimeout(function () { $('.fail-msg2 a').addClass('active'); }, 1050);
					setTimeout(function () { $('.form').hide(); }, 700);
					  
				  }else if(data == -1){
					setTimeout(function () { $('.signup, .login').hide(); }, 700);
					setTimeout(function () { $('.brand').addClass('active'); }, 300);
					setTimeout(function () { $('.heading').addClass('active'); }, 600);
                    setTimeout(function () { $('.fail-msg3 p').addClass('active'); }, 900);
                    setTimeout(function () { $('.fail-msg3 a').addClass('active'); }, 1050);
					setTimeout(function () { $('.form').hide(); }, 700);					  
					  
				  }else if(data == -2){
					setTimeout(function () { $('.signup, .login').hide(); }, 700);
					setTimeout(function () { $('.brand').addClass('active'); }, 300);
					setTimeout(function () { $('.heading').addClass('active'); }, 600);
                    setTimeout(function () { $('.fail-msg4 p').addClass('active'); }, 900);
                    setTimeout(function () { $('.fail-msg4 a').addClass('active'); }, 1050);
					setTimeout(function () { $('.form').hide(); }, 700);					  
				  }
				else {
					setTimeout(function () { $('.signup, .login').hide(); }, 700);
					setTimeout(function () { $('.brand').addClass('active'); }, 300);
					setTimeout(function () { $('.heading').addClass('active'); }, 600);
                    setTimeout(function () { $('.success-msg p').addClass('active'); }, 900);
                    setTimeout(function () { $('.success-msg a').addClass('active'); }, 1050);
					setTimeout(function () { $('.form').hide(); }, 700);
				}	        
			  });
			  
        }
    });

    // Login submit
    $('form.login-form').submit(function (event) {
        event.preventDefault();

        if (loginEmailError == true || loginPasswordError == true) {
            $('.loginemail, .loginPassword').blur();
        } else {
            $('.signup, .login').addClass('switched');
			
			  /* get some values from elements on the page: */
			  var $form = $( this ),
				  url = $form.attr( 'action' );

			  /* Send the data using post */
			  var posting = $.post( url, { submit: 'submit' ,   email: $('#loginemail').val() , password: $('#loginPassword').val() } );

			  /* Alerts the results */
			  posting.done(function( data ) {
				  //alert(data);
				  if (data == 0) {
			  
					setTimeout(function () { $('.signup, .login').hide(); }, 700);
					setTimeout(function () { $('.brand').addClass('active'); }, 300);
					setTimeout(function () { $('.heading').addClass('active'); }, 600);
					setTimeout(function () { $('.fail-msg p').addClass('active'); }, 900);
					setTimeout(function () { $('.fail-msg a').addClass('active'); }, 1050);
					setTimeout(function () { $('.form').hide(); }, 700);
					  
				  }
				else {
					window.location.href = "<?php echo base_url();?>welcome";
				}	        
			  });
			  
			  
			  

        }
    });
	
    // Reload page
    $('a.profile').on('click', function () {
        location.reload(true);
    });


});


		function validateEmail(sEmail) {
		
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
			if (filter.test(sEmail)) {
		
				return true;
		
			}
		
			else {
		
				return false;
		
			}
		
		}	
		
</script>	
</html>
