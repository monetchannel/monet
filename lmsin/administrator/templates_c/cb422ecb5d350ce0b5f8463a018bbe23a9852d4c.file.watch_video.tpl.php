<?php /* Smarty version Smarty-3.0.6, created on 2014-09-02 05:13:20
         compiled from "./templates/watch_video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2811667065405b4604d3b41-49125569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb422ecb5d350ce0b5f8463a018bbe23a9852d4c' => 
    array (
      0 => './templates/watch_video.tpl',
      1 => 1401778683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2811667065405b4604d3b41-49125569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
.boxy-content {
padding:0px;
}

</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td></td>
  </tr>
</table>

<?php if ($_smarty_tpl->getVariable('video_type')->value=="flv"){?>

<?php if ($_smarty_tpl->getVariable('type')->value){?>

<object width="425" height="344"><param name="movie" value="<?php echo $_smarty_tpl->getVariable('url')->value;?>
"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="500" height="350"></embed></object>

<?php }else{ ?>

<script type="text/javascript" src="flowplayer/flowplayer-3.2.4.min.js"></script>
<a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" style="display:block;width:100%;height:350px" id="player"> </a> 
<script> 
flowplayer("player", "flowplayer/flowplayer-3.2.4.swf",{
clip: {
    // these two configuration variables does the trick
    autoPlay: true, 
    autoBuffering: true // <- do not place a comma here  
    }
});
</script>

<?php }?>

<?php }else{ ?>
<video width="500" height="400" src="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" autoplay controls>

<?php }?>