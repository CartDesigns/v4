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
|	transfer.inc.php
|   ========================================
|	Core Print Order Form Functions
+--------------------------------------------------------------------------
*/

if (!defined('CC_INI_SET')) die("Access Denied");

function repeatVars()
{

		return false;

}

function fixedVars()
{

		return false;

}

///////////////////////////
// Other Vars
////////
$formAction = 'index.php?_g=cs&amp;_p='.urlencode('modules/gateway/Print_Order_Form/orderForm.inc.php').'&amp;cart_order_id='.$orderSum['cart_order_id'];
$formMethod = 'post';
$formTarget = '_self';
$transfer = 'auto';
?>