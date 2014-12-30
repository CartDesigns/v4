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
|   Email: sales@cubecart.com
|	License: GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
+--------------------------------------------------------------------------
|	tracker.inc.php
|   ========================================
|	Tracking code for JROX.COM Affiliate Manager 	
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
$module = fetchDbConfig('JROX');

$affCode = "<!-- Begin JAM Affiliate Tracker -->
<img border='0' src='".$module['URL']."/sale.php?amount=".sprintf("%.2f", $orderSum['subtotal'])."&trans_id=".$cart_order_id."' width='0' height='0' alt='' />
<!-- End JAM Affiliate Tracker -->";
?>
