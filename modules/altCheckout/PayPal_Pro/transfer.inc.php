<?php
/*
+--------------------------------------------------------------------------
|   CubeCart 4
|   ========================================
|	CubeCart is a Trade Mark of CubeCart Limited
|   Copyright CubeCart Limited 2014. All rights reserved.
|	UK Private Limited Company No. 5323904
|   ========================================
|   Web: http://www.cubecart.com
|   Date: Tuesday, 17th October 2006
|   Email: sales (at) cubecart (dot) com
|	License: GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
+--------------------------------------------------------------------------
|	transfer.inc.php
|   ========================================
|	Core functions for the PayPal Direct Payment Gateway
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
function repeatVars(){

		return FALSE;
	
}

function fixedVars(){
	
	
	return FALSE;
	
}

///////////////////////////
// Other Vars
////////
$formAction = "index.php?_g=co&amp;_a=step3&amp;process=1&amp;cart_order_id=".$_GET['cart_order_id'];
$formMethod = "post";
$formTarget = "_self";
$transfer = "manual";
?>
