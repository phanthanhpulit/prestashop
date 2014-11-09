<?php /* Smarty version Smarty-3.1.19, created on 2014-11-04 10:51:00
         compiled from "/home/u281242385/public_html/modules/facebookcomments/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70043157154584d24531a83-16294677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9b281646421856ab8b76fe9a9943156eb1271a9' => 
    array (
      0 => '/home/u281242385/public_html/modules/facebookcomments/header.tpl',
      1 => 1414923650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70043157154584d24531a83-16294677',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'var' => 0,
    'fcbc_appid' => 0,
    'fcbc_admins' => 0,
    'fcbc_lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54584d24555cc3_81607451',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54584d24555cc3_81607451')) {function content_54584d24555cc3_81607451($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['fcbc_appid'] = new Smarty_variable($_smarty_tpl->tpl_vars['var']->value['fcbc_appid'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['fcbc_admins'] = new Smarty_variable($_smarty_tpl->tpl_vars['var']->value['fcbc_admins'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['fcbc_lang'] = new Smarty_variable($_smarty_tpl->tpl_vars['var']->value['fcbc_lang'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['fcbc_appid'] = new Smarty_variable($_smarty_tpl->tpl_vars['var']->value['fcbc_appid'], null, 0);?> 

<meta property="fb:app_id" content="<?php echo $_smarty_tpl->tpl_vars['fcbc_appid']->value;?>
"/><meta property="fb:admins" content="<?php echo $_smarty_tpl->tpl_vars['fcbc_admins']->value;?>
"/><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $_smarty_tpl->tpl_vars['fcbc_lang']->value;?>
/all.js#xfbml=1&appId=<?php echo $_smarty_tpl->tpl_vars['fcbc_appid']->value;?>
";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><?php }} ?>
