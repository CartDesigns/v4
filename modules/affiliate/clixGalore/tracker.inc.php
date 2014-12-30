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
|	Tracking code for clixGalore	
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
$module = fetchDbConfig('clixGalore');

$affCode = "<!-- Begin ClixGalore Affliate Tracking -->
<img src='https://www.clixGalore.com/AdvTransaction.aspx?AdID=".$module['acNo']."&SV=".sprintf("%.2f", $orderSum['subtotal'])."&OID=".$cart_order_id."' height='0' width='0' border='0' />
<!-- End ClixGalore Affliate Tracking -->";
?>