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
|	extra.inc.php
|   ========================================
|	Extra Thingamybobs
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
switch (sanitizeVar($_GET['_a'])) {
	case 'prodImages':
		require_once 'includes'.CC_DS.'extra'.CC_DS.'prodImages.inc.php';
		break;
}
?>