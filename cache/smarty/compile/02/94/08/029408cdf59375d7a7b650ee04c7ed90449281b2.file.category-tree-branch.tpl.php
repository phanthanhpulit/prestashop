<?php /* Smarty version Smarty-3.1.19, created on 2014-11-04 21:43:38
         compiled from "/home/u281242385/public_html/themes/default-bootstrap/category-tree-branch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3786482115458e61a58cf33-73839443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '029408cdf59375d7a7b650ee04c7ed90449281b2' => 
    array (
      0 => '/home/u281242385/public_html/themes/default-bootstrap/category-tree-branch.tpl',
      1 => 1414626681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3786482115458e61a58cf33-73839443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'last' => 0,
    'node' => 0,
    'currentCategoryId' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5458e61a642790_35682627',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5458e61a642790_35682627')) {function content_5458e61a642790_35682627($_smarty_tpl) {?>

<li <?php if (isset($_smarty_tpl->tpl_vars['last']->value)&&$_smarty_tpl->tpl_vars['last']->value=='true') {?>class="last"<?php }?>>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if (isset($_smarty_tpl->tpl_vars['currentCategoryId']->value)&&$_smarty_tpl->tpl_vars['node']->value['id']==$_smarty_tpl->tpl_vars['currentCategoryId']->value) {?>class="selected"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['desc'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php if (count($_smarty_tpl->tpl_vars['node']->value['children'])>0) {?>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['node']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['child']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['child']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
 $_smarty_tpl->tpl_vars['child']->iteration++;
 $_smarty_tpl->tpl_vars['child']->last = $_smarty_tpl->tpl_vars['child']->iteration === $_smarty_tpl->tpl_vars['child']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categoryTreeBranch']['last'] = $_smarty_tpl->tpl_vars['child']->last;
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categoryTreeBranch']['last']) {?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./category-tree-branch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'true'), 0);?>

			<?php } else { ?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./category-tree-branch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'false'), 0);?>

			<?php }?>
		<?php } ?>
		</ul>
	<?php }?>
</li><?php }} ?>
