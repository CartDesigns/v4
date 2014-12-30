<?php
/*
+--------------------------------------------------------------------------
|   CubeCart 4
|   ========================================
|	CubeCart is a registered trade mark of CubeCart Limited
|   Copyright CubeCart Limited 2014. All rights reserved.
|	UK Private Limited Company No. 5323904
|   ========================================
|   Web: http://www.cubecart.com
|   Email: sales@cubecart.com
|	License: GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
+--------------------------------------------------------------------------
|	currencyVars.inc.php
|   ========================================
|	Gets Currency Array
+--------------------------------------------------------------------------
*/

if (!defined('CC_INI_SET')) die("Access Denied");

$override = array(
	'viewOrder'		=> true,
	'viewOrders'	=> true,
	'giftCert'		=> true,
);

$page = (isset($_GET['_a'])) ? sanitizeVar($_GET['_a']) : '';

if (isset($override[$page]) && $override[$page]) {
	$cCode = $config['defaultCurrency'];
} else if (!empty($cc_session->ccUserData['currency'])) {
	$cCode = $cc_session->ccUserData['currency'];

} else if (!empty($order[0]['currency'])) {
	$cCode = $order[0]['currency'];

} else {
	/* CODE NOT IN USE DANGEROUS IF IS IN USE!! BE CAREFUL
	if (isset($_COOKIE['currency']) && !empty($_COOKIE['currency'])) {
		$cCode = $_COOKIE['currency'];
	}
	*/
	$cCode = $config['defaultCurrency'];
}

$cache = new cache('glob.currencyVars.'.$cCode);
$currencyVars = $cache->readCache();

if (!$cache->cacheStatus) {
	$query			= sprintf('SELECT `value`, `symbolLeft`, `symbolRight`, `decimalPlaces`, `name`, `decimalSymbol` FROM %sCubeCart_currencies WHERE `code`=%s', $glob['dbprefix'], $db->mySQLSafe($cCode));
	$currencyVars	= $db->select($query);
	$cache->writeCache($currencyVars);
}
?>