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
|	calc.php
|   ========================================
|	Shipping cost based on individual item costs
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
// per item shipping module

function Per_Item() {
	global $noItems, $lang;

	$moduleName = 'Per_Item';
	$module = fetchDbConfig('Per_Item');
	$taxVal = taxRate($module['tax']);

	if ($module['status']) {
		$sum =  $module['handling'] + ($module['cost'] * $noItems);

		if ($taxVal>0) $shippingTax = ($taxVal / 100) * $sum;

		$out = array(0 => array());
		$out[0]['value'] = $sum;
		$out[0]['desc'] = priceFormat($sum, true);
		$out[0]['method'] = $lang['front']['misc_perItem'];
		$out[0]['taxId'] = $module['tax'];
		$out[0]['taxAmount'] = $shippingTax;

		return $out;
	}
	return false;
}
$shipArray[] = Per_Item();
?>