<?php /* Smarty version Smarty-3.1.19, created on 2014-11-06 19:18:49
         compiled from "/home/u281242385/public_html/modules/facebooklike/facebooklike.tpl" */ ?>
<?php /*%%SmartyHeaderCode:258008761545b67299e00a4-80137266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4574f19230b40f7c5d4420654c5135c95df2f4b' => 
    array (
      0 => '/home/u281242385/public_html/modules/facebooklike/facebooklike.tpl',
      1 => 1414926194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258008761545b67299e00a4-80137266',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fl_default_hook' => 0,
    'fl_send' => 0,
    'fl_width' => 0,
    'fl_faces' => 0,
    'fl_layout' => 0,
    'fl_font' => 0,
    'fl_text' => 0,
    'fl_color' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_545b6729a26c90_36446349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545b6729a26c90_36446349')) {function content_545b6729a26c90_36446349($_smarty_tpl) {?><script type="text/javascript">

window.fbAsyncInit = function() {

FB.Event.subscribe('edge.create', function(targetUrl) {
_gaq.push(['_trackSocial', 'facebook', 'like', targetUrl]);
});

FB.Event.subscribe('edge.create', function(targetUrl) {
_gaq.push(['_trackSocial', 'facebook', 'unlike', targetUrl]);
});

FB.Event.subscribe('edge.create', function(targetUrl) {
_gaq.push(['_trackSocial', 'facebook', 'send', targetUrl]);
});

}
</script>
<?php if ($_smarty_tpl->tpl_vars['fl_default_hook']->value) {?>
<li>
<?php } else { ?>

<div class="facebook_container">
<?php }?>
	<div class="fb-like" data-send="<?php echo $_smarty_tpl->tpl_vars['fl_send']->value;?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['fl_width']->value;?>
" data-show-faces="<?php echo $_smarty_tpl->tpl_vars['fl_faces']->value;?>
" data-layout="<?php echo $_smarty_tpl->tpl_vars['fl_layout']->value;?>
" data-font="<?php echo $_smarty_tpl->tpl_vars['fl_font']->value;?>
" data-action="<?php echo $_smarty_tpl->tpl_vars['fl_text']->value;?>
" data-colorscheme="<?php echo $_smarty_tpl->tpl_vars['fl_color']->value;?>
"></div>
<?php if ($_smarty_tpl->tpl_vars['fl_default_hook']->value) {?>
</li>
<?php } else { ?>
</div>
<?php }?><?php }} ?>
