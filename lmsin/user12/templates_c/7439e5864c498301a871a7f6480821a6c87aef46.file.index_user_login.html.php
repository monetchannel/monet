<?php /* Smarty version Smarty-3.0.6, created on 2015-03-07 12:21:20
         compiled from ".\templates\index_user_login.html" */ ?>
<?php /*%%SmartyHeaderCode:845154fadf3004dca6-93527445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7439e5864c498301a871a7f6480821a6c87aef46' => 
    array (
      0 => '.\\templates\\index_user_login.html',
      1 => 1425727276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '845154fadf3004dca6-93527445',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Monet</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/index-login.css" rel="stylesheet">
   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    
    <link href="css/style.css" rel="stylesheet">
</head>
<style type="text/css">
input:-moz-placeholder {
      color: green;
    }
</style> 
<body>
<header>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-5">
              <div style="padding-bottom:10px;"><a href="index.php"><img class="img-responsive" src="./images/logo.png"></a>       </div>
            </div>
           </div>
        </div>
     </header>
	 
	 <section>
      <div class="container-fluid welcome-bg">
         <div class="row">
           <h1 align="center" style="color:#FFF;font-weight:700;font-size:55px;margin-bottom: 0;">Welcome to Monet</h1>
           <h2 align="center" style="color:#FFF;padding-bottom:30px;margin:0;text-shadow: 0px 4px #7F55A6;">Start rating and earning rewards</h2>
         </div>  
      </div>
	 
    <div class="container-fluid" style="background-color:#7F55A6;padding-bottom: 35px;">
    <div class="row">
       <div class="col-md-4 col-sm-5 col-md-offset-2 col-sm-offset-1">

        <div class="container-fluid" style="margin-top:35px;">
			
              
          <div class="row" style="margin-bottom:16px;">
			
            <div id="registrationTab" class="col-md-6 col-xs-6 signup"align="center" style="border-right: 2px solid  #edf1f4;"> <span>Sign up!</span> </div>

            <div id="loginTab" class="col-md-6 col-xs-6 login" align="center"> <span>Login!</span> </div>

          </div>

          <div class="row" style="">

            <div class="<div class="form-group">

            

              <form id="registrationForm" class="form-signin" name="signup_form" action="index.php" method="post" onSubmit="javascript:return singup_validation()" style="radius:5px ; display:none;" >

                <input type="text" class="form-input" placeholder="First Name" required autofocus name="user_fname"  onkeypress="goods='abcdefghijklmnopqrstuvwxyz '; return limitchar(event)"  />

                <input type="text" class="form-input" placeholder="Last Name" required autofocus name="user_lname"  onkeypress="goods='abcdefghijklmnopqrstuvwxyz '; return limitchar(event)" />

                <input type="email" class="form-input" placeholder="Email ID" required autofocus  name="user_email" />

                <select  name="user_country" class="styled-select" style="color:#777" onChange="$('.styled-select').css('color','#000000')">

<?php echo $_smarty_tpl->getVariable('country_name')->value;?>


                </select>

                <input type="text" class="form-input" placeholder="Zip" required autofocus name="user_zipcode" onKeyPress="goods='0123456789'; return limitchar(event)" maxlength="6"  />

                <div class="input-block" style="width:90%; margin:0 auto;font-size: 10px;">

                  <label>

                    <input type="hidden" name="rented" id="rented" value="true">

                    <span  class="checkbox1 checked" tabindex="11" id="checkbox-is-rented" ></span> <span  style="color:#FFF;font-size:10px;float: left; margin-top: 5px;">Email me about new features & updates (usually once per month)</span> </label>

                  <label style="color:#FFF;font-size:10px;"> By clicking Sign up you agree to the <a href="javascript:open_agreement()">license agreement</a> </label>

                </div>

                <div style="width:95%; text-align:right; padding-bottom: 3%;">

                  <input type="submit" name="submit" value="SIGN UP" class="btn-primary" id="login-submit-button" />

                  <input type="hidden" name="act" value="save_invites_request" />

                  <input type="hidden" name="c_id" value="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
" id="c_id" />
                </div>
              </form>           
<form id="loginForm" class="form-signin" method="post" name="login_frm" action="index.php" onSubmit="javascript:return chk_login()">                       
<input type="email" class="form-input" placeholder="User ID" required autofocus name="user_email" />
<input type="password" class="form-input" placeholder="Password" required name="user_password">                                               
                         <div class="row" style="margin: 0 auto;padding-bottom: 2%;">									
										<div class="col-md-6 col-sm-6 log-top" style="">
											<a class="btn-lg btn-block btn-primary" href="javascript:void(1)" onClick="javascript:chk_login()">
												<span>Sign In</span>
											</a>
										</div>
									</div>                             
<!--<div style="width:95%; text-align:right; padding-bottom: 3%;">

<input type="submit" name="submit" value="SIGN IN" class="btn-primary" id="login-submit-button" />

</div>-->

<input type="hidden" name="c_id" value="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
" id="c_id" />	

<input type="hidden" name="cmp_id" value="<?php echo $_smarty_tpl->getVariable('cmp_id')->value;?>
" id="cmp_id" />	

<input type="hidden" name="act" value="chk_login" />

<input type="hidden" name="uf_id" value="<?php echo $_smarty_tpl->getVariable('uf_id')->value;?>
"  />

</form>
            </div>
          </div>
        </div>

      


    </div>
	  <div class="col-md-1 col-sm-1 col-xs-1">
             <div style="margin-top:340%;">
                <p align="center" style="color:#FFF;font-size:18px;"> or </p>
             </div>
           </div>
           <div class="col-md-3 col-sm-4 col-xs-7">
               <div style="margin-top:70%;">
                 <p align="center" style="margin-bottom: 30px;"><a href="#"><img src="./images/fb.png" class="img-responsive">  </p>
                 <p align="center"><a href="#"><img src="./images/gmail.png" class="img-responsive">  </p>
               </div>
           </div>

      </div>
  </div>
  <div class="container-fluid welcome-down-bg">
      
      </div>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<script src="js/jquery.min.js"></script> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 



<script src="js/bootbox.js"></script> 

<script src="js/cynets_modal.js"></script> 



<script src="js/bootstrap.js"></script> 

<script type="text/javascript">

	var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";

	

		 $(function(){

			

			$("#loginTab").addClass('active-tab');

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

			$(".checked").keypress(function(event){

				if ( event.which == 32) {

					$(".checked").click();

				}

			});

			$(".checked").click(function(){

				$(this).toggleClass('checkbox1');

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

						window.location.href=SERVER_PATH+'user/'+js[0];

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

		

	function open_agreement()

	{

		jQuery.ajax({

				type: "POST",

				url:"images.php?act=toc",

				success: function(js){

					win=cn_window_open('License Agreement',js,1);

				},

					error: function(){

					alert("Please try again. Server have not sent response.");

				}

			});	

	}	 

	</script>

    

    <script>

  // This is called with the results from from FB.getLoginStatus().

  function statusChangeCallback(response) {

    console.log('statusChangeCallback');

    console.log(response);

    // The response object is returned with a status field that lets the

    // app know the current login status of the person.

    // Full docs on the response object can be found in the documentation

    // for FB.getLoginStatus().

    if (response.status === 'connected') {

      // Logged into your app and Facebook.

      testAPI();

    } else if (response.status === 'not_authorized') {

      // The person is logged into Facebook, but not your app.

     //// document.getElementById('status').innerHTML = 'Please log ' +

      ///  'into this app.';

    } else {

      // The person is not logged into Facebook, so we're not sure if

      // they are logged into this app or not.

     /// document.getElementById('status').innerHTML = 'Please log ' +

      ///  'into Facebook.';

    }

  }



  // This function is called when someone finishes with the Login

  // Button.  See the onlogin handler attached to it in the sample

  // code below.

  function checkLoginState() {

    FB.getLoginStatus(function(response) {

      statusChangeCallback(response);

    });

  }



  window.fbAsyncInit = function() {

  FB.init({

    appId      : '432978236748242',

    cookie     : true,  // enable cookies to allow the server to access 

                        // the session

    xfbml      : true,  // parse social plugins on this page

    version    : 'v2.1' // use version 2.1

  });



  // Now that we've initialized the JavaScript SDK, we call 

  // FB.getLoginStatus().  This function gets the state of the

  // person visiting this page and can return one of three states to

  // the callback you provide.  They can be:

  //

  // 1. Logged into your app ('connected')

  // 2. Logged into Facebook, but not your app ('not_authorized')

  // 3. Not logged into Facebook and can't tell if they are logged into

  //    your app or not.

  //

  // These three cases are handled in the callback function.



  FB.getLoginStatus(function(response) {

    statusChangeCallback(response);

  });



  };



  // Load the SDK asynchronously

  (function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = "//connect.facebook.net/en_US/sdk.js";

    fjs.parentNode.insertBefore(js, fjs);

  }(document, 'script', 'facebook-jssdk'));



  // Here we run a very simple test of the Graph API after login is

  // successful.  See statusChangeCallback() for when this call is made.

  function testAPI() {

    console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', function(response) {

		  

		  console.log(response);

		  var json = JSON.stringify(response);

		  jQuery.ajax({

			type: "POST",

			url:"fb_login.php",

			data: { "json":json},

			success: function(js){

					location.href='http://www.monetchannel.com/lmsin/user/watch_video.php'

					return false;

			},

				error: function(){

				alert("Please try again. Server have not sent response.");

			}

		});

    });

  }

  

 function logoutFacebook() {

  FB.init({

    appId      : '432978236748242',

    cookie     : true,  // enable cookies to allow the server to access 

                        // the session

    xfbml      : true,  // parse social plugins on this page

    version    : 'v2.1' // use version 2.1

  });

  FB.logout(function() {

    // Reload the same page after logout

    window.location.reload();

    // Or uncomment the following line to redirect

    //window.location = "http://ykyuen.wordpress.com";

  });

}

</script>
</section>


</body>

</html>