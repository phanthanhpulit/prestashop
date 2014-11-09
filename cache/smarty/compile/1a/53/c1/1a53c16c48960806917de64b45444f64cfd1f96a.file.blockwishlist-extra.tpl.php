<?php /* Smarty version Smarty-3.1.19, created on 2014-11-06 19:18:49
         compiled from "/home/u281242385/public_html/themes/default-bootstrap/modules/blockwishlist/blockwishlist-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48706697545b6729e8db39-25247242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a53c16c48960806917de64b45444f64cfd1f96a' => 
    array (
      0 => '/home/u281242385/public_html/themes/default-bootstrap/modules/blockwishlist/blockwishlist-extra.tpl',
      1 => 1414626681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48706697545b6729e8db39-25247242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_545b6729f08ce6_13148231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545b6729f08ce6_13148231')) {function content_545b6729f08ce6_13148231($_smarty_tpl) {?>

<p class="buttons_bottom_block no-print">
	<a id="wishlist_button" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow"  title="<?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
		<?php echo smartyTranslate(array('s'=>'Add to wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>

	</a>
</p>
<?php }} ?>
