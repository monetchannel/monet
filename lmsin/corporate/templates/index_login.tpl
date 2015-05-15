<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Monet</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="bg-color">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">
						<img src="images/logo.png" class="img-responsive" alt="Responsive image">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">ABOUT MONET</a></li>
						<li><a href="#">HOW IT WORKS</a></li>
						<li><a href="#">BRAND</a></li>
						<li><a href="#">CONTACT US</a></li>
						<li>
							<a href="#" class="top-right-icon">
								<img src="images/fb.png" class="img-responsive" alt="Responsive image" width="54">
								<img src="images/twitter.png" class="img-responsive" alt="Responsive image" width="54">
							</a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
  
		
		<div class="container-fluid">
			<div class="row" style="padding-top: 3%;">
				<div class="col-md-8">
					<div class="align-center">
                    
						<div class="color-meg">
							<span>Welcome to Monet Corporate!</span>
						</div>
						<div class="color-yellow">
							<span>your online impressions...</span>
						</div>
					</div>
					<div class="left-bottom">
						<img src="images/mid_grapic.png" class="img-responsive image-width" alt="Responsive image">
					</div>
				</div>
				<div class="col-md-4">
					<div class="container-fluid">
						<div class="row" style="">
							<div id="registrationTab" class="col-md-6 login-text" style="border-right: 2px solid #1f263e;">
								<span>Sign up!</span>
							</div>
							<div id="loginTab" class="col-md-6 login-text">
								<span>Login</span>
							</div>	
						</div>	
						<div class="row" style="">
							<div class="col-md-12 authantication-form">
								<div class="login-title">Welcome to Monet Corporate!</div>
								<form id="registrationForm" class="form-signin" name="signup_form" action="index.php" method="post" onSubmit="javascript:return signup_chk();" >
								
									<input type="text" class="form-input" placeholder="Company Name" required autofocus name="company_name" />
									
									<input type="email" class="form-input" placeholder="Company Email" required autofocus name="company_email" />
                                    
                                    <input type="password" class="form-input" placeholder="Company Password" required autofocus name="company_reg_password" />
                                   
                                    <input type="text" class="form-input" placeholder="Company Address" required autofocus name="company_address" /> 
                                    
                                     <select  name="company_country" class="styled-select" style="color:#777">
            {$country_name}
            </select>
									<input type="text" class="form-input" placeholder="Zip" required autofocus name="company_zipcode" id="company_zipcode" />
									
									<div style="width:95%; text-align:right; padding-bottom: 3%;">
										<input type="submit" name="submit1" value="SIGN UP" class="btn-primary" id="login-submit-button" />
									</div>
								
                                
                                <input type="hidden" name="act" value="save_ragistration" />
								</form>
								<form id="loginForm" class="form-signin" method="post"action="index.php" name="login_frm" onSubmit="return chk_login();" style="display:none;">
																
									<input type="email" class="form-input" placeholder="User ID" required autofocus name="company_email" />
									
									<input type="password" class="form-input" placeholder="Password" required name="company_password">
																		
									<div style="width:95%; text-align:right; padding-bottom: 3%;"><!--<div class="text-left col-md-2"><span style="color:#FFF" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span></div>-->
										<input type="submit" name="submit" value="SIGN IN" class="btn-primary" id="login-submit-button" />
									</div>
                                    
     
	 

<input type="hidden" name="act" value="chk_login" />								</form>
							</div>	
						</div>	
					</div>				
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="container">
				<div class="row" style="">
									
					<ul class="pagination-centered pager list-pager">
						<li>							
							<a class="page_link active" href="#">
								<img src="images/bmw.png" class="img-responsive" alt="Responsive image" >
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="images/pepsi.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="images/cock.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="images/suzuki.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="images/cadbury.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="images/pandg.png" class="img-responsive" alt="Responsive image">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="images/revlon.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						
					</ul>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootbox.js" ></script>
    <script src="js/bootstrap.js"></script>
    
    
	<script type="text/javascript">
		 
		 $(function(){
			$("#registrationTab").addClass('active-tab');
			$("#registrationTab").click(function(){
				$("#loginTab").removeClass('active-tab');
				$("#registrationTab").addClass('active-tab');
				$("#loginForm").hide();
				$("#registrationForm").show();
			});
			$("#loginTab").click(function(){
				
				$("#registrationTab").removeClass('active-tab');
				$("#loginTab").addClass('active-tab');
				$("#registrationForm").hide();
				$("#loginForm").show();
			});
			
			
			$( document.body ).on( 'click', '.dropdown-menu li', function( event ) {

			  var $target = $( event.currentTarget );

			  $target.closest( '.btn-group' )
				 .find( '[data-bind="label"]' ).text( $target.text() )
					.end()
				 .children( '.dropdown-toggle' ).dropdown( 'toggle' );

			  return false;

		   });
		   
		 });
		 
		 /* BY dinesh */
		 function chk_login()
		 {                   
				jQuery.ajax({
				type: "POST",
				url:"index.php",
				data: $('#loginForm').serialize(),
				success: function(js){                                        
                                        /*
                                        if(js!=1){
                                           bootbox.alert("Invalid Email/Password");	
                                           return false;
					}
					else
                                        {
                                        */
                                        //window.location.href='campaign_list.php';
                                           window.location.href = 'video.php';
                                        //}
				},
					error: function(){
					alert("Please try again. Server have not sent response.");
				}
			});
			return false;
		 }
		 
		/* Registration section*/ 
		function signup_chk()
		{
			if(document.signup_form.company_name.value=="" || document.signup_form.company_email.value=="" || document.signup_form.company_address.value=="" || document.signup_form.company_country.value=="-1" || document.signup_form.company_zipcode.value=="")
			{
				bootbox.alert("Please fill all fields.");
				return false;
			}
			
			var x=document.forms["signup_form"]["company_email"].value
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				alert("Please enter a valid email address.");
				return false;
			}
			
			jQuery.ajax({
				type: "POST",
				url:"index.php",
				data: $('#registrationForm').serialize(),
				success: function(js){
					if(js!=1){
						bootbox.alert(js)	
						return false;
					}
				},
					error: function(){
					alert("Please try again. Server have not sent response.");
				}
			});
			return false;	
		} 
		
	</script>
  </body>
</html>