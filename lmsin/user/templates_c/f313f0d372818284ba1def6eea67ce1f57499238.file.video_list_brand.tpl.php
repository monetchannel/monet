<?php /* Smarty version Smarty-3.0.6, created on 2014-12-09 10:51:40
         compiled from ".\templates\video_list_brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27065486c62ca0a743-21767261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f313f0d372818284ba1def6eea67ce1f57499238' => 
    array (
      0 => '.\\templates\\video_list_brand.tpl',
      1 => 1418118676,
      2 => 'file',
    ),
    'fc1a47ca143f9bf9b8d6fa5e12224dd36a37e34f' => 
    array (
      0 => '.\\templates\\index_brand_video.tpl',
      1 => 1415260107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27065486c62ca0a743-21767261',
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monet Dash Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link href="css/index.css" rel="stylesheet">
     <!-- jQuery Version 1.11.0 -->
   <script src="js/jquery.min.js"></script> 
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

		<div id="wrapper">
			<div class="container-fluid bg-top">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<img src="images/logo.png" class="img-responsive top-logo" alt="Responsive image">
					</div>
				</div>			
			</div>			
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#"></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><?php echo $_COOKIE['UserName'];?>
 !</a></li>
							<li>
								<a href="javascript:void(1)" onClick="javascript:<?php if ($_SESSION['FBuserID']){?>logoutFacebook()<?php }else{ ?>location.href='index.php?act=logout'<?php }?>">
									<span>Logout</span>
									<i class="logout-icon"></i>
								</a>
							</li>
							</ul>
						</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			
        <!-- Page Content -->
        
<link href="css/video_list.css" rel="stylesheet">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<div class="container" style="padding : 15px ">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-10"> <strong><em><?php echo $_smarty_tpl->tpl_vars['v']->value['company_name'];?>
</em></strong> </div>
          <!--<div class="col-md-2 panel-heading-sub-right">
            <select>
              <option value="all">All</option>
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
            </select>
          </div>-->
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12"><?php echo $_smarty_tpl->tpl_vars['v']->value['video_list'];?>
</div>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php }} ?>          

<script>
var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
function return_play_video(c_id)
{
	if(c_id)
	{
		window.location.href=SERVER_PATH+'watch_video.php?act=watch_video&c_id='+c_id;
		return true;
	}
}
</script> 

        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

  
    <!-- Bar Chart Script -->
     <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
  }

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
   window.location="index.php?act=logout";
    // Or uncomment the following line to redirect
    //window.location = "http://ykyuen.wordpress.com";
  });
}
</script>
</body>
</html>