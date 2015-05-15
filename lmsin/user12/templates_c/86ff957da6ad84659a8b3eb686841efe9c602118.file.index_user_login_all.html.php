<?php /* Smarty version Smarty-3.0.6, created on 2015-03-07 10:30:27
         compiled from ".\templates\index_user_login_all.html" */ ?>
<?php /*%%SmartyHeaderCode:2238854fac53304c831-28456714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86ff957da6ad84659a8b3eb686841efe9c602118' => 
    array (
      0 => '.\\templates\\index_user_login_all.html',
      1 => 1425720625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2238854fac53304c831-28456714',
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



<!-- Bootstrap -->

<link href="css/bootstrap.css" rel="stylesheet">

<link href="css/index-login.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>

		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

		<![endif]-->



</head>

<body>

<div id="wrap">

 

  <div class="container">

    <div class="row">

     

      <div class="col-md-4">

        <div class="container-fluid">

          <div class="row" style="">

            <div id="registrationTab" class="col-md-6 login-text" style="border-right: 2px solid  #edf1f4;"> <span>Sign up!</span> </div>

            <div id="loginTab" class="col-md-6 login-text"> <span>Login</span> </div>

          </div>

          <div class="row" style="">

            <div class="col-md-12 authantication-form">

              <div class="login-title">Welcome to Monet!</div>

              <form id="registrationForm" class="form-signin" name="signup_form" action="index.php" method="post" onSubmit="javascript:return singup_validation()"  style="display:none;" >

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

                    <span  class="checkbox1 checked" tabindex="11" id="checkbox-is-rented" ></span> <span style="float: left; margin-top: 5px;">Email me about new features & updates (usually once per month)</span> </label>

                  <label> By clicking Sign up you agree to the <a href="javascript:open_agreement()">license agreement</a> </label>

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

												<span class="fb-text">Sign In</span>

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

    </div>

  </div>

  <div id="push"></div>

</div>

<div id="footer">

</div>



</body>

</html>