<?php /* Smarty version Smarty-3.1.19, created on 2014-11-06 19:18:49
         compiled from "/home/u281242385/public_html/modules/facebookcomments/productfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1096354320545b67297e0a79-06510148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '957833f285cbb3c6b656ea871f096c8d185daeb2' => 
    array (
      0 => '/home/u281242385/public_html/modules/facebookcomments/productfooter.tpl',
      1 => 1414923650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1096354320545b67297e0a79-06510148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'var' => 0,
    'fcbc_width' => 0,
    'fcbc_nbp' => 0,
    'fcbc_scheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_545b67298c8529_21508257',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545b67298c8529_21508257')) {function content_545b67298c8529_21508257($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['fcbc_width'] = new Smarty_variable($_smarty_tpl->tpl_vars['var']->value['fcbc_width'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['fcbc_nbp'] = new Smarty_variable($_smarty_tpl->tpl_vars['var']->value['fcbc_nbp'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['fcbc_scheme'] = new Smarty_variable($_smarty_tpl->tpl_vars['var']->value['fcbc_scheme'], null, 0);?>
<div id="fcbcfooter"><div id="fcbc"><div data-href="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" class="fb-comments" data-width="<?php echo $_smarty_tpl->tpl_vars['fcbc_width']->value;?>
" data-num-posts="<?php echo $_smarty_tpl->tpl_vars['fcbc_nbp']->value;?>
"  data-colorscheme="<?php echo $_smarty_tpl->tpl_vars['fcbc_scheme']->value;?>
"></div></div></div><?php }} ?>
