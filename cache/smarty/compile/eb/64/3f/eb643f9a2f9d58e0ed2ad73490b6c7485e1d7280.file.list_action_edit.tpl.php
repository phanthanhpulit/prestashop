<?php /* Smarty version Smarty-3.1.19, created on 2014-11-04 19:23:11
         compiled from "/home/u281242385/public_html/admin1234/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16675518805458c52f83d796-99996874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb643f9a2f9d58e0ed2ad73490b6c7485e1d7280' => 
    array (
      0 => '/home/u281242385/public_html/admin1234/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1414626680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16675518805458c52f83d796-99996874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5458c52f8b0b37_60052657',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5458c52f8b0b37_60052657')) {function content_5458c52f8b0b37_60052657($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
