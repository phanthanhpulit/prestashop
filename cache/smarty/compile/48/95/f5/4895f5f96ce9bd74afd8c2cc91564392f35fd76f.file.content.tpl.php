<?php /* Smarty version Smarty-3.1.19, created on 2014-11-04 10:47:03
         compiled from "/home/u281242385/public_html/admin1234/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112655336754584c37aa0f99-96357871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4895f5f96ce9bd74afd8c2cc91564392f35fd76f' => 
    array (
      0 => '/home/u281242385/public_html/admin1234/themes/default/template/content.tpl',
      1 => 1414626680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112655336754584c37aa0f99-96357871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54584c37aaaee0_69212713',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54584c37aaaee0_69212713')) {function content_54584c37aaaee0_69212713($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
