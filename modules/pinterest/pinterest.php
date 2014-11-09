<?php

class Pinterest extends Module
{
 	private $_html = '';
	private $_pin_layout = '';
	private $_pin_description_source = '';
	private $_pin_description_limit = 0;
	private $_full_version = 12000;
	private $_last_updated = '';
	private $_ps_version_id = 0;
	
 	function __construct()
	{
	
		$ps_version_array = explode('.', _PS_VERSION_);
		$this->_ps_version_id = 10000 * intval($ps_version_array[0]) + 100 * intval($ps_version_array[1]);
		if (count($ps_version_array) >= 3)
			$this->_ps_version_id += intval($ps_version_array[2]);
			
		$this->name = 'pinterest';
		$this->tab = floatval(substr(_PS_VERSION_,0,3))<1.4?'Presto-Changeo':'social_networks';
		$this->version = '1.2';
		if (floatval(substr(_PS_VERSION_,0,3)) >= 1.4)
			$this->author = 'Presto-Changeo';
		
		parent::__construct();
		
		if ($this->_ps_version_id >= 10600)	
			$this->bootstrap = true;
			
		$this->_refreshProperties();
		
		$this->displayName = $this->l('Pinterest');
		$this->description = $this->l('Add a Pin It button to invite your readers to pin your work onto Pinterest.');
		if ($this->upgradeCheck('PIN'))
			$this->warning = $this->l('We have released a new version of the module,') .' '.$this->l('request an upgrade at ').' https://www.presto-changeo.com/en/contact_us';
	}
	
	
	function install()
	{
		if (!parent::install())
			return false;
		$ps_version_array = explode('.', _PS_VERSION_);
		$ps_version_id = (int)($ps_version_array[0].$ps_version_array[1].$ps_version_array[2]);
		if ($ps_version_id < 155)
		{
			$hooked = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'hook` WHERE name = "pinterest"');
			if (!is_array($hooked) || sizeof($hooked) == 0)
				Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'hook` (
				`id_hook` ,`name` ,`title` ,`description` ,`position`)
				VALUES (NULL , "pinterest", "Pinterest button", "Custom hook for Pinterest button Module", "1");');
		}
		if (!$this->registerHook('extraLeft') || !$this->registerHook('pinterest') || !$this->registerHook('footer'))
			return false;
		Configuration::updateValue('PIN_LAYOUT','horizontal');
		Configuration::updateValue('PIN_DESCRIPTION_SOURCE','meta');
		Configuration::updateValue('PIN_DESCRIPTION_LIMIT', 0);
		Configuration::updateValue('PRESTO_CHANGEO_UC',time());
		return true;
	}

	private function _refreshProperties()
	{
		$this->_pin_layout = Configuration::get('PIN_LAYOUT');
		$this->_pin_description_source = Configuration::get('PIN_DESCRIPTION_SOURCE');
		$this->_pin_description_limit = Configuration::get('PIN_DESCRIPTION_LIMIT');
		$this->_last_updated = Configuration::get('PRESTO_CHANGEO_UC');
	}

	public function getContent()
	{
		$ps_version  = floatval(substr(_PS_VERSION_,0,3));
		$this->_html = ''.($ps_version >= 1.5 ? ''.($this->_ps_version_id < 10600 ? '<div style="width: 850px; margin: 0 auto;">' : '<div>').'' : '').$this->getModuleRecommendations('PIN').'<h2 style="clear:both;padding-top:5px;">'.$this->displayName.' '.$this->version.'</h2>';
	
		$this->_postProcess();
		$this->_displayForm();
		return $this->_html.''.($ps_version >= 1.5 ? '</div> ' : '');
	}
	
    private function _displayForm()
    {
    	global $cookie;
		$ps_version  = floatval(substr(_PS_VERSION_,0,3));
		if ($url = $this->upgradeCheck('PIN'))
			$this->_html .= '
			'.($this->_ps_version_id < 10600 ? '<fieldset class="width3" style="background-color:#FFFAC6;width:800px;">' : '<div class="panel">').' 
				'.($this->_ps_version_id < 10600 ? '<legend>' : '<h3>').'
					<img src="'.$this->_path.'logo.gif" />&nbsp;&nbsp;&nbsp;'.$this->l('New Version Available').'
				'.($this->_ps_version_id < 10600 ? '</legend>' : '</h3>' ).'
			'.$this->l('We have released a new version of the module. For a list of new features, improvements and bug fixes, view the ').'<a href="'.$url.'" target="_index"><b><u>'.$this->l('Change Log').'</b></u></a> '.$this->l('on our site.').'
			<br />
			'.$this->l('For real-time alerts about module updates, be sure to join us on our') .' <a href="http://www.facebook.com/pages/Presto-Changeo/333091712684" target="_index"><u><b>Facebook</b></u></a> / <a href="http://twitter.com/prestochangeo1" target="_index"><u><b>Twitter</b></u></a> '.$this->l('pages').'.
			<br />
			<br />
			'.$this->l('Please').' <a href="https://www.presto-changeo.com/en/contact_us" target="_index"><b><u>'.$this->l('contact us').'</u></b></a> '.$this->l('to request an upgrade to the latest version').'.
			'.($this->_ps_version_id < 10600 ? '</fieldset>' : '</div>' ).'
			<br />';

    	$this->_html .= '
		<form action="'.$_SERVER['REQUEST_URI'].'" name="pinterest_form" id="pinterest_form" method="post">
			
			'.($this->_ps_version_id < 10600 ? '<fieldset class="width3" style="width:850px;">' : '<div class="panel">').' 
				'.($this->_ps_version_id < 10600 ? '<legend>' : '<h3>').'
					<img src="'.$this->_path.'logo.gif" />&nbsp;&nbsp;&nbsp;'.$this->l('Installation Instructions (Optional)').'
				'.($this->_ps_version_id < 10600 ? '</legend>' : '</h3>' ).'
				<b style="color:blue">'.$this->l('To display the Pinterest button in a different hook').'</b>:
				<br />
				<br />
				'.$this->l('Add').' <b style="color:green">'.( $ps_version <= 1.4 ? $this->l('{$HOOK_PINTEREST}') : '{hook h="pinterest"}' ).'</b> '.$this->l('in the tpl file you want it to show').'.
				<br />
				<br />
				'.( $ps_version < 1.5  ?  ($ps_version >= 1.4?$this->l('Copy /modules/pinterest/override_1.4/classes/FrontController.php to /override/classes/ (If the file already exists, you will have to merge both files)'):$this->l('Add').' <b style="color:green">\'HOOK_PINTEREST\' => Module::hookExec(\'pinterest\'),</b> '.$this->l('to /header.php below HOOK_TOP around line #15.')) : '').'
			'.($this->_ps_version_id < 10600 ? '</fieldset>' : '</div>' ).'
			<br />
		'.($this->_ps_version_id < 10600 ? '<fieldset class="width3" style="width:850px;">' : '<div class="panel">').' 
			'.($this->_ps_version_id < 10600 ? '<legend>' : '<h3>').'
				<img src="'.$this->_path.'logo.gif" />&nbsp;&nbsp;&nbsp;'.$this->l('Pinterest button Settings').'
			'.($this->_ps_version_id < 10600 ? '</legend>' : '</h3>' ).'
			<table border="0" '.($this->_ps_version_id < 10600 ? 'width="850"' : '').' >
			<tr '.($this->_ps_version_id < 10600 ? 'height="30"' : 'height="36"').'>
				<td align="left" '.($this->_ps_version_id < 10600 ? 'valign="top"' : 'valign="middle"').' width="150">
					<b>'.$this->l('Pin count').':</b>
				</td>
				<td align="left" '.($this->_ps_version_id < 10600 ? 'valign="top"' : 'valign="middle"').'>
   					<select name="pin_layout" style="width:150px">
   						<option value="horizontal" '.(Tools::getValue('pin_layout', $this->_pin_layout) == "horizontal"?"selected":"").'>'.$this->l('Horizontal').'</option>
   						<option value="vertical" '.(Tools::getValue('pin_layout', $this->_pin_layout) == "vertical"?"selected":"").'>'.$this->l('Vertical').'</option>
   						<option value="none" '.(Tools::getValue('pin_layout', $this->_pin_layout) == "none"?"selected":"").'>'.$this->l('No Count').'</option>
   					</select>
				</td>
			</tr>
			<tr '.($this->_ps_version_id < 10600 ? 'height="30"' : 'height="36"').'>
				<td align="left"'.($this->_ps_version_id < 10600 ? 'valign="top"' : 'valign="middle"').' width="150">
					<b>'.$this->l('Description source').':</b>
				</td>
				<td align="left" '.($this->_ps_version_id < 10600 ? 'valign="top"' : 'valign="middle"').'>
   					<select name="pin_description_source" style="width:150px">
   						<option value="short" '.(Tools::getValue('pin_description_source', $this->_pin_description_source) == "short"?"selected":"").'>'.$this->l('Short description').'</option>
   						<option value="full" '.(Tools::getValue('pin_description_source', $this->_pin_description_source) == "full"?"selected":"").'>'.$this->l('Full description').'</option>
   						<option value="meta" '.(Tools::getValue('pin_description_source', $this->_pin_description_source) == "meta"?"selected":"").'>'.$this->l('Meta description').'</option>
   					</select>
				</td>
			</tr>
			<tr '.($this->_ps_version_id < 10600 ? 'height="30"' : 'height="36"').'>
				<td align="left" '.($this->_ps_version_id < 10600 ? 'valign="top"' : 'valign="middle"').' width="150">
					<b>'.$this->l('Description limit').':</b>
				</td>
				<td align="left" '.($this->_ps_version_id < 10600 ? 'valign="top"' : 'valign="middle"').'>
					<input type="text" name="pin_description_limit" value="'.$this->_pin_description_limit.'" style="width:40px;'.($this->_ps_version_id < 10600 ? '' : 'display: inline;').'" /> symbols (0 = no limit)
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="'.$this->l('Update').'" name="submitChanges" '.($this->_ps_version_id >= 10600 ? 'class="btn btn-default"' : 'class="button" ' ).'  />
				</td>
			</tr>
			</table>
			'.($this->_ps_version_id < 10600 ? '</fieldset>' : '</div>' ).'
		</form>';
   	}
    	    
	private function _postProcess()
	{
		if (Tools::isSubmit('submitChanges'))
		{
			if (!Configuration::updateValue('PIN_LAYOUT', Tools::getValue('pin_layout')) ||
				!Configuration::updateValue('PIN_DESCRIPTION_SOURCE', Tools::getValue('pin_description_source')) ||
				!Configuration::updateValue('PIN_DESCRIPTION_LIMIT', Tools::getValue('pin_description_limit')))
				$this->_html .= '<div class="alert error">'.$this->l('Cannot update settings').'</div>';
			else
				$this->_html .=($this->_ps_version_id >= 10600 ?  '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			'.$this->l('Settings updated').'
		</div>' :
				
				'<div class="conf confirm"><img src="../img/admin/ok.gif" alt="'.$this->l('Confirmation').'" />'.$this->l('Settings updated').'</div>' );
		}
		$this->_refreshProperties();
	}
	
	function hookExtraLeft($params)
	{
		global $smarty, $link, $cookie;
		if (stripos($_SERVER['HTTP_USER_AGENT'],'bot') !== false ||
			 stripos($_SERVER['HTTP_USER_AGENT'],'baidu') !== false ||
			 stripos($_SERVER['HTTP_USER_AGENT'],'spider') !== false ||
			 stripos($_SERVER['HTTP_USER_AGENT'],'Ask Jeeves') !== false ||
			 stripos($_SERVER['HTTP_USER_AGENT'],'slurp') !== false ||
			 stripos($_SERVER['HTTP_USER_AGENT'],'crawl') !== false)
			return;

		// cover --->
		$pin_cover = '';
		$cover = Product::getCover(intval(Tools::getValue('id_product')));
		$ps_version3  = substr(_PS_VERSION_,0,5);
    	$psv = floatval(substr(_PS_VERSION_,0,3));
		if (is_array($cover) && sizeof($cover) == 1)
		{
			$product = new Product((int)Tools::getValue('id_product'));
			if (floatval(substr(_PS_VERSION_,0,3)) >= 1.4)
				$pin_cover = $link->getImageLink($product->link_rewrite[$cookie->id_lang], Tools::getValue('id_product').'-'.$cover['id_image'],'thickbox'.($psv >= 1.5 && ($ps_version3 != '1.5.0' && $ps_version3 != '1.5.1')?'_default':''));
			else
				$pin_cover = 'http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'img/p/'.Tools::getValue('id_product').'-'.$cover['id_image'].'.jpg';
		}
		else
		{
			$pin_cover = 'http://'.$_SERVER['HTTP_HOST']._PS_IMG_.'logo.jpg';
		}
		// <--- cover

		// description --->
		if($this->_pin_description_source == 'meta')
		{
			if ($psv >= 1.5)
				$pin_metas = Meta::getMetaTags($cookie->id_lang, 'index');
			else
				$pin_metas = Tools::getMetaTags($cookie->id_lang, 'index');
			$pin_description = $pin_metas['meta_description'];
		}
		elseif($this->_pin_description_source == 'full')
		{
			$product = new Product((int)Tools::getValue('id_product'));
			$pin_description = $product->description[$cookie->id_lang];
		}
		elseif($this->_pin_description_source == 'short')
		{
			$product = new Product((int)Tools::getValue('id_product'));
			$pin_description = $product->description_short[$cookie->id_lang];
		}
		// if it is not product page but either full or short description source is selected:
		if(!$pin_description)
		{
			$pin_metas = Tools::getMetaTags($cookie->id_lang, 'index');
			$pin_description = $pin_metas['meta_description'];
		}
		$pin_description = strip_tags($pin_description);
		
		if($this->_pin_description_limit)
		{
			$pin_description = $this->truncate($pin_description, (int)$this->_pin_description_limit);
		}
		// <--- description

		$smarty->assign(array('pin_layout' => $this->_pin_layout, 'pin_url' => urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']), 'pin_image' => $pin_cover, 'pin_description' => $pin_description));
		return $this->display(__FILE__, 'pinterest.tpl');
	}

	function hookFooter()
	{
		global $smarty;
		if (stripos($_SERVER['HTTP_USER_AGENT'],'bot') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'baidu') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'spider') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'Ask Jeeves') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'slurp') !== false ||
			stripos($_SERVER['HTTP_USER_AGENT'],'crawl') !== false)
			return;

		return $this->display(__FILE__, 'footer.tpl');
	}

	function hookHome($params)
	{
		return $this->hookExtraLeft($params);
	}
	
	

	function hookPinterest($params)
	{
		return $this->hookExtraLeft($params);
	}
	
	private function upgradeCheck($module)
	{
		global $cookie;
		$ps_version  = floatval(substr(_PS_VERSION_,0,3));
		// Only run upgrae check if module is loaded in the backoffice.
		if (($ps_version > 1.1  && $ps_version < 1.5) && (!is_object($cookie) || !$cookie->isLoggedBack()))
			return;
		if ($ps_version >= 1.5)
		{
			$context = Context::getContext();
			if (!isset($context->employee) || !$context->employee->isLoggedBack())
				return;			
		}
		// Get Presto-Changeo's module version info
		$mod_info_str = Configuration::get('PRESTO_CHANGEO_SV');
		if (!function_exists('json_decode'))
		{
			if (!file_exists(dirname(__FILE__).'/JSON.php'))
				return false; 
			include_once(dirname(__FILE__).'/JSON.php');
			$j = new JSON();
			$mod_info = $j->unserialize($mod_info_str);
		}
		else
			$mod_info = json_decode($mod_info_str);
		// Get last update time.
		$time = time();
		// If not set, assign it the current time, and skip the check for the next 7 days. 
		if ($this->_last_updated <= 0)
		{
			Configuration::updateValue('PRESTO_CHANGEO_UC', $time);
			$this->_last_updated = $time;
		}
		// If haven't checked in the last 1-7+ days
		$update_frequency = max(86400, isset($mod_info->{$module}->{'T'})?$mod_info->{$module}->{'T'}:86400);
		if ($this->_last_updated < $time - $update_frequency)
		{	
			// If server version number exists and is different that current version, return URL
			if (isset($mod_info->{$module}->{'V'}) && $mod_info->{$module}->{'V'} > $this->_full_version)
				return $mod_info->{$module}->{'U'};
			$url = 'http://updates.presto-changeo.com/?module_info='.$module.'_'.$this->version.'_'.$this->_last_updated.'_'.$time.'_'.$update_frequency;
			$mod = @file_get_contents($url);
			if ($mod == '' && function_exists('curl_init'))
			{
				$ch = curl_init();
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				$mod = curl_exec($ch);
			}
			Configuration::updateValue('PRESTO_CHANGEO_UC', $time);
			$this->_last_updated = $time;
			if (!function_exists('json_decode') )
			{
				$j = new JSON();
				$mod_info = $j->unserialize($mod);
			}
			else
				$mod_info = json_decode($mod);
			if (!isset($mod_info->{$module}->{'V'}))
				return false;
			if (Validate::isCleanHtml($mod))
				Configuration::updateValue('PRESTO_CHANGEO_SV', $mod);
			if ($mod_info->{$module}->{'V'} > $this->_full_version)
				return $mod_info->{$module}->{'U'};
			else 
				return false;
		}
		elseif (isset($mod_info->{$module}->{'V'}) && $mod_info->{$module}->{'V'} > $this->_full_version)
			return $mod_info->{$module}->{'U'};
		else
			return false;
	}	

	private function truncate($string, $length = 80, $etc = '...', $charset='UTF-8', $break_words = false, $middle = false) {
	     if ($length == 0) return '';
	     if (strlen($string) > $length) {
	         $length -= min($length, strlen($etc));
	         if (!$break_words && !$middle) {
	             $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length+1, $charset));
	         }
	         if(!$middle) {
	             return mb_substr($string, 0, $length, $charset) . $etc;
	         } else {
	             return mb_substr($string, 0, $length/2, $charset) . $etc . mb_substr($string, -$length/2, $charset);
	         }
	     } else {
	         return $string;
	     }
	}

	public function getModuleRecommendations($module)
	{
		$arr = unserialize(Configuration::get('PC_RECOMMENDED_LIST'));
		// Get a new recommended module list every 10 days //
		if (!is_array($arr) || sizeof($arr) == 0 || Configuration::get('PC_RECOMMENDED_LAST') < time() - 864000)
		{
			$url = 'http://updates.presto-changeo.com/recommended.php';
			$str = @file_get_contents($url);
			if ($str == '' && function_exists('curl_init'))
			{
				$ch = curl_init();
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				$str = curl_exec($ch);
			}
			Configuration::updateValue('PC_RECOMMENDED_LIST', $str);
			Configuration::updateValue('PC_RECOMMENDED_LAST', time());
			$arr = unserialize($str);
		}
		
		$ps_version_array = explode('.', _PS_VERSION_);
		$_ps_version_id = 10000 * intval($ps_version_array[0]) + 100 * intval($ps_version_array[1]);
		
		$dupe = false;
		$rand = array_rand($arr, 5);
		$out = '<div style="width:100%">
					<div style="float:left;width:100%;">
						<div style="float:left; padding: 10px;">
							<a href="https://www.presto-changeo.com/en/contact_us" target="_index"><img src="http://updates.presto-changeo.com/logo.jpg" border="0" /></a>
						</div>
						<div style="min-height:69px;float:left;border: 1px solid #c0d2d2;background-color: #e3edee">
							<div style="width: 80px;float: left;padding-top: 12px;">
								<div style="color:#5d707e;font-weight:bold;text-align:center">'.$this->l('Explore').'<br />'.$this->l('Our').'<br />'.$this->l('Modules').'</div>
							</div>
							<div style="float: left;">';
		for ($j = 0 ; $j < 4 ; $j++)
		{
			// Make sure to exclude the current module //
			if ($arr[$rand[$j]]['code'] == $module)
				$dupe = true;
			$i = $rand[$dupe?$j+1:$j];
			$out .= '
							<div style="margin-right: 8px;width: 143px;height:57px;float: left;margin-top:5px;border: 1px solid #c0d2d2;background-color: #ffffff">
								<div style="width:45px; height: 45px;margin: 6px 8px 6px 6px; float:left;">
									<a target="_index" href="'.$arr[$i]['url'].'">
										<img border="0" src="'.$arr[$i]['img'].'" width="45" height="45" />
									</a>
								</div>
								<div style="width:80px; height: 45px; float:left;margin-top: 6px;font-weight: bold;">
									<a style="color:#085372;" target="_index" href="'.$arr[$i]['url'].'">
										'.$arr[$i]['name'].'
									</a>
								</div>
							</div>';
		}
		$out .= '
							</div>
						</div>
					</div>
				</div>';
		return $out;
	}	
}
?>