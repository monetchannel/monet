<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Monet</title>
<base href="{$SERVER_PATH}">
<script type="text/javascript" src="{$SERVER_COMPANY_PATH}js/jquery.js"></script>
<script type='text/javascript' src='{$SERVER_COMPANY_PATH}js/jquery.boxy.js'></script>
<script type='text/javascript' src='{$SERVER_COMPANY_PATH}js/cynets.js'></script>
<script type="text/javascript" src="{$SERVER_COMPANY_PATH}js/zoomer.js"></script>
<!-- new popup function  -->
<script type='text/javascript' src='{$SERVER_COMPANY_PATH}js/jquery.cn_boxy.js'></script>
<script src="{$SERVER_COMPANY_PATH}js/jquery.cookie.js" language="javascript" type="text/javascript"></script>
<script src="{$SERVER_COMPANY_PATH}js/functions.js" language="javascript" type="text/javascript"></script>
<script src="{$SERVER_COMPANY_PATH}js/dinesh.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
{$js}
</script>
<!-- new popup function  -->
<link href="{$SERVER_COMPANY_PATH}css/style.css" media="screen" rel="stylesheet" />
<link rel="stylesheet" href="{$SERVER_COMPANY_PATH}css/boxy.css" type="text/css" />
<link rel="stylesheet" href="{$SERVER_COMPANY_PATH}css/cn_boxy.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="{$SERVER_COMPANY_PATH}css/zoomer.css" media="screen" />
</head>

<body>
<div id="main-container">
  <div id="content" style="margin:0px 0px 10px 0px">
    <table width="1004" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="5"><div id="header"> <img src="images/logo.jpg" /> </div></td>
      </tr>
      <tr>
        <td valign="top" style="padding-top:15px; border:1px solid #cccccc; padding-bottom:15px; border-top:none"><table width="890" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"></td>
              <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td></td>
                    <td rowspan="2" valign="top"><div id="video-full"> {block name=body}{/block} </div></td>
                    <td></td>
                  </tr>
                </table></td>
              <td valign="top" align="left"></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </div>
  <div id="copyright">&copy; Copyright 2011 Monet. All Rights Reserved.</div>
</div>
<iframe name="iframe" style="height:200px; width:200px; display:none"></iframe>
</body>
</html>
