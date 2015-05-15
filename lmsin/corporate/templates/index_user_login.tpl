<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Monet</title>

		<!-- Bootstrap -->
		<link href="{$SERVER_COMPANY_PATH}css/bootstrap.css" rel="stylesheet">
		<link href="{$SERVER_COMPANY_PATH}css/index.css" rel="stylesheet">
        <link rel="stylesheet" href="{$SERVER_COMPANY_PATH}css/boxy.css" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
			var SERVER_PATH="{$SERVER_PATH}";
			window.path = "{$path}";
			var company_url="{$company_url}"
			var c_id="{$c_id}"
        </script>
        
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
						<img src="{$SERVER_COMPANY_PATH}images/logo.png" class="img-responsive" alt="Responsive image">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
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
						<img src="{$company_logo}" class="img-responsive " alt="Responsive image">
					</div>
				</div>
				<div class="col-md-4">
					<div class="container-fluid" >
						<div class="row" style="">
							<div id="registrationTab" class="col-md-6 login-text" style="border-right: 2px solid #1f263e;background-color:#1D7BA0">
								<span>Sign up!</span>
							</div>
							<div id="loginTab" class="col-md-6 login-text" >
								<span >Login</span>
							</div>	
						</div>	
						<div class="row" >
							<div class="col-md-12 authantication-form" style="background-color:#FD8E00">
								<div class="login-title">Welcome to Monet Corporate!</div>
<form id="registrationForm" class="form-signin" name="signup_form" action="index.php" method="post" onSubmit="javascript:return singup_validation()" >

<input type="text" class="form-input" placeholder="First Name" required autofocus name="user_fname"  onkeypress="goods='abcdefghijklmnopqrstuvwxyz '; return limitchar(event)" />

<input type="text" class="form-input" placeholder="Last Name" required autofocus name="user_lname"  onkeypress="goods='abcdefghijklmnopqrstuvwxyz '; return limitchar(event)" />

<input type="email" class="form-input" placeholder="User ID" required autofocus name="user_email" />

<select  name="user_country" class="styled-select" style="color:#777">
{$country_name}
</select>

<input type="text" class="form-input" placeholder="Zip" required autofocus name="user_zipcode" onkeypress="goods='0123456789'; return limitchar(event)" maxlength="6" />

<div style="width:95%; text-align:right; padding-bottom: 3%;">
<input type="submit" name="submit" value="SIGN UP" class="btn-primary" id="login-submit-button" />
</div>
<input type="hidden" name="act" value="save_invites_request" />
<input type="hidden" name="company_id" value="{$company_id}" id="company_id" />	
</form>

<form id="loginForm" class="form-signin" method="post" name="login_frm" action="index.php" style="display:none;" onSubmit="javascript:return chk_login()">
                        
<input type="email" class="form-input" placeholder="User ID" required autofocus name="user_email" />

<input type="password" class="form-input" placeholder="Password" required name="user_password">
                                
<div style="width:95%; text-align:right; padding-bottom: 3%;">
<input type="submit" name="submit" value="SIGN IN" class="btn-primary" id="login-submit-button" />
</div>
<input type="hidden" name="c_id" value="{$c_id}" id="c_id" />	
<input type="hidden" name="act" value="chk_login" />
<input type="hidden" name="uf_id" value="{$uf_id}"  />
								</form>
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
								<img src="{$SERVER_COMPANY_PATH}images/bmw.png" class="img-responsive" alt="Responsive image" >
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="{$SERVER_COMPANY_PATH}images/pepsi.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="{$SERVER_COMPANY_PATH}images/cock.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="{$SERVER_COMPANY_PATH}images/suzuki.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="{$SERVER_COMPANY_PATH}images/cadbury.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="{$SERVER_COMPANY_PATH}images/pandg.png" class="img-responsive" alt="Responsive image">
							</a>
						</li>
						<li>							
							<a class="page_link active" href="#">
								<img src="{$SERVER_COMPANY_PATH}images/revlon.png" class="img-responsive" alt="Responsive image" width="130">
							</a>
						</li>
						
					</ul>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{$SERVER_COMPANY_PATH}js/jquery.min.js"></script>
    <script src="{$SERVER_COMPANY_PATH}js/functions.js" ></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{$SERVER_COMPANY_PATH}js/bootbox.js" ></script>
    <script src="{$SERVER_COMPANY_PATH}js/bootstrap.js"></script>
    <script src="{$SERVER_COMPANY_PATH}js/cynets_modal.js"></script>
    
    
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
				dataType: "JSON",
				success: function(js){
					
					if(js[1]==1){
						bootbox.alert(js[0])	
						return false;
					}
					else if(js[1]==2)
					{
						window.location.href=SERVER_PATH+js[0];
						return true;
					}
					
				},
					error: function(){
					alert("Please try again. Server have not sent response.");
				}
			});
			return false;
		 }
		
		/* Invites Request section*/ 
		function singup_validation()
		{
			if(document.signup_form.user_fname.value=="" || document.signup_form.user_lname.value=="" || document.signup_form.user_email.value==""  || document.signup_form.user_country.value=="-1" || document.signup_form.user_zipcode.value=="")
			{
				bootbox.alert("Please fill all fields.");
				return false;
			}
			
			var x=document.forms["signup_form"]["user_email"].value
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
		 function getkey(e)
{
	if (window.event)
		return window.event.keyCode;
	else if (e)
		return e.which;
	else
		return null;
	}
	
	function limitchar(e)
	{
		//var goods="abcdefghijklmnopqrstuvwxyz. ";
		var key, keychar;
		key = getkey(e);
		
		if (key == null) return true;
			keychar = String.fromCharCode(key);
			keychar = keychar.toLowerCase();
			goods = goods.toLowerCase();
		if (goods.indexOf(keychar) != -1)
			return true;
		if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
			return true;
		return false;
	}
		 
	</script>
  </body>
</html>