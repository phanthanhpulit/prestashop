<?php /* Smarty version Smarty-3.1.19, created on 2014-11-04 10:51:00
         compiled from "/home/u281242385/public_html/modules/facebooklike/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137942462154584d245613c7-03011979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a1a9bb1e470b2af5cf846c600dca18293f4ba73' => 
    array (
      0 => '/home/u281242385/public_html/modules/facebooklike/header.tpl',
      1 => 1414926194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137942462154584d245613c7-03011979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fl_lang_code' => 0,
    'fl_default_image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54584d2457d454_21118386',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54584d2457d454_21118386')) {function content_54584d2457d454_21118386($_smarty_tpl) {?><div id="fb-root"></div>
<script type="text/javascript">

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $_smarty_tpl->tpl_vars['fl_lang_code']->value;?>
/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>
<?php if ($_smarty_tpl->tpl_vars['fl_default_image']->value) {?>
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['fl_default_image']->value;?>
" /> 
<link rel="image_src" href="<?php echo $_smarty_tpl->tpl_vars['fl_default_image']->value;?>
" />
<?php }?><?php }} ?>
