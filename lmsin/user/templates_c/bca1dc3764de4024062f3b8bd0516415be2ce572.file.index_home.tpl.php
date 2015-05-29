<?php /* Smarty version Smarty-3.0.6, created on 2015-05-22 06:20:20
         compiled from "./templates/index_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:585033453555f2d14583541-70070564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bca1dc3764de4024062f3b8bd0516415be2ce572' => 
    array (
      0 => './templates/index_home.tpl',
      1 => 1432300816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '585033453555f2d14583541-70070564',
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
    
      <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</head>
  
  <body>
      <header>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-5">
              <div style="padding-bottom:10px;"><a href="#"><img class="img-responsive" src="./images/logo.png"></a>       </div>
            </div>
            <div class="col-md-5 pull-right">
              <div style="padding-bottom:10px;float: right;;padding-top:30px;text-decoration:none;"><a href="javascript:sign(1)">Sign In </a>&nbsp;|&nbsp; <a href="javascript:sign(2)">Sign Up </a></div>
            </div>
          </div>
        </div>
     </header>
    
    <section>
      <div class="container-fluid">
         <div style="margin-right:-15px;margin-left:-15px;">
           <img class="img-responsive" src="./images/hd1.jpg">
         </div>  
      </div>
      <div class="container-fluid">
         <div style="margin-right:-15px;margin-left:-15px;">
           <img class="img-responsive" src="./images/hd2.jpg">
         </div>  
      </div>
      <div class="container-fluid">
         <div style="margin-right:-15px;margin-left:-15px;">
           <img class="img-responsive" src="./images/hd3.jpg">
         </div>  
      </div>
    </section>
     <div class="container-fluid welcome-down-bg">
      
      
  <footer>
     <div class="container-fluid">
       <div class="row">
         <div align="center" style="height:40px">
           <p style="color:#fff;padding-top:10px;">Copyright &copy; 2015 Monet All rights reserved.     </p>
         </div>
       </div>
	   
 <p style="color:#fff;padding-top:15px;font-size:10px;">Follow Us      </p>

 <a href="https://www.facebook.com/pages/Monet/1819590604933229"><img src="images/ff1.png"></a>
 
 &nbsp&nbsp&nbsp <a href="https://twitter.com/Monetchannel"><img src="images/tt1.png"></a>
 
  


  &nbsp&nbsp&nbsp <a href="https://plus.google.com/u/0/108008107785253348043"><img src="images/gg1.png"></a>
</div> 
</footer>
</div>
<script>
var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
function sign($op)
{
	if($op==1)
	{
		window.location.href=SERVER_PATH+'user/index.php?act=show_login&msg=sign_in';
		return true;
	}
        if($op==2)
	{
		window.location.href=SERVER_PATH+'user/index.php?act=show_login&msg=sign_up';
		return true;
	}
}
</script> 

</body>
</html>