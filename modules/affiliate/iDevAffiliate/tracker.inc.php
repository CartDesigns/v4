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
|	tracker.inc.php
|   ========================================
|	Tracking code for iDevAffiliate	
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
$module = fetchDbConfig('iDevAffiliate');

$affCode = "<!-- Begin iDevAffiliate Affiliate Tracker -->
<img border='0' src='".$module['URL']."sale.php?profile=72198&idev_saleamt=".sprintf("%.2f", $orderSum['subtotal'])."&idev_ordernum=".$cart_order_id."' width='0' height='0' alt='' />
<!-- End iDevAffiliate Affiliate Tracker -->";
?>