<?php /* Smarty version Smarty-3.1.19, created on 2014-11-06 19:18:49
         compiled from "/home/u281242385/public_html/modules/producttooltip/views/templates/hook/producttooltip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1322506835545b67295e1758-55868901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c70158a22a4bfed79e11e07e907d74a99af9d3a5' => 
    array (
      0 => '/home/u281242385/public_html/modules/producttooltip/views/templates/hook/producttooltip.tpl',
      1 => 1414636381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1322506835545b67295e1758-55868901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nb_people' => 0,
    'date_last_order' => 0,
    'date_last_cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_545b6729776957_83215692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545b6729776957_83215692')) {function content_545b6729776957_83215692($_smarty_tpl) {?>
<script type="text/javascript">
    $(document).ready(function () {
        <?php if (isset($_smarty_tpl->tpl_vars['nb_people']->value)) {?>
        $.growl({title: '', message: '<?php if ($_smarty_tpl->tpl_vars['nb_people']->value==1) {?><?php echo smartyTranslate(array('s'=>'%d person is currently watching this product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_people']->value,'mod'=>'producttooltip','js'=>1),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'%d people are currently watching this product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_people']->value,'mod'=>'producttooltip','js'=>1),$_smarty_tpl);?>
<?php }?>'});
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['date_last_order']->value)) {?>
        $.growl({title: '', message: '<?php echo smartyTranslate(array('s'=>'Last time this product was bought: ','mod'=>'producttooltip','js'=>1),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['date_last_order']->value,'full'=>1),$_smarty_tpl);?>
'});
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['date_last_cart']->value)) {?>
        $.growl({title: '', message: '<?php echo smartyTranslate(array('s'=>'Last time this product was added to a cart: ','mod'=>'producttooltip','js'=>1),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['date_last_cart']->value,'full'=>1),$_smarty_tpl);?>
'});
        <?php }?>

        });
</script>
<?php }} ?>
