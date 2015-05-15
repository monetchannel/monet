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
    	
    	<!-- Page Content -->
		<!-- Page Content -->

        {block name=body}{/block}

        <!-- /#page-content-wrapper -->

	<div id="wrapper">


  

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

function get_fb_share()
{
	
	var fbsl = window.location.href;
	var fbt = $('title').text();
    FB.ui({
     method: 'feed',
     name: fbt,
     link: fbsl,
     caption: 'Testing',
     //description: 'Dialogs provide a simple, consistent interface for applications to interface with users.',
     //message: 'Facebook Dialogs are easy!'
   },
   function(response) {
     if (response && response.post_id) {
       alert('Post was published.');
     } else {
       alert('Post was not published.');
     }
   });
   
   //alert('hello');
}

</script>

</body>

</html>