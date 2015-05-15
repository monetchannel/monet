<?php /* Smarty version Smarty-3.0.6, created on 2015-04-21 16:55:57
         compiled from ".\templates\view_account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4248553664fdb79015-87769380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1e8947944bf85cf70f222ea80ea1a5e4c2508bc' => 
    array (
      0 => '.\\templates\\view_account.tpl',
      1 => 1429628123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4248553664fdb79015-87769380',
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
        <title>Your Account</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/index.css" rel="stylesheet">
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link href="nvd3/src/nv.d3.css" rel="stylesheet" type="text/css">

        <script src="nvd3/lib/d3.v3.js"></script> 

        <script src="nvd3/nv.d3.js"></script> 

        <script src="nvd3/src/tooltip.js"></script> 

        <script src="nvd3/src/utils.js"></script> 

        <script src="nvd3/src/models/legend.js"></script> 

        <script src="nvd3/src/models/axis.js"></script> 

        <script src="nvd3/src/models/scatter.js"></script> 

        <script src="nvd3/src/models/line.js"></script> 

        <script src="nvd3/src/models/lineChart.js"></script> 

        <script src="js/new_record.js"></script> 

        <script src="js/bootstrap.js"></script> 

        <script src="js/cynets_modal.js"></script> 

        <script type="text/javascript" src="js/swfobject.js"></script> 
        <script type="text/javascript" src="js/mic.js"></script> 

    </head>



    <body>
                                                
<img src="<?php echo $_smarty_tpl->getVariable('profile_image')->value;?>
" width="80" height="80">
</br></br>
<p>Name: <?php echo $_smarty_tpl->getVariable('fname')->value;?>
 <?php echo $_smarty_tpl->getVariable('lname')->value;?>
</p>
<p>Birthday: <?php echo $_smarty_tpl->getVariable('dob')->value;?>
</p>
<p>Email: <?php echo $_smarty_tpl->getVariable('email')->value;?>
</p>
<p>Zip: <?php echo $_smarty_tpl->getVariable('zipcode')->value;?>
</p>                                                
<p>Country: <?php echo $_smarty_tpl->getVariable('country')->value;?>
</p>

<button class='btn-primary' onclick="javascript: window.location.href='account_info.php?act=edit_profile'">Edit</button>

</html>