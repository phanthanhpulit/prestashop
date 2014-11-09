<?php /*%%SmartyHeaderCode:31973649654584d2458c9d0-90529265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9da32fd03167b39c8f8e31ad7ce0b504c4c56fe2' => 
    array (
      0 => '/home/u281242385/public_html/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1414626681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31973649654584d2458c9d0-90529265',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5458c421d1ceb2_43102159',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5458c421d1ceb2_43102159')) {function content_5458c421d1ceb2_43102159($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="http://bongbanshop.besaba.com/vn/search" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Tìm kiếm" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Tìm kiếm</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
