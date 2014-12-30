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
|	Currency Vars
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
$query = sprintf('SELECT `value`, `symbolLeft`, `symbolRight`, `decimalPlaces`, `name` FROM %sCubeCart_currencies WHERE `code` = %s', $glob['dbprefix'], $db->mySQLSafe($config['defaultCurrency']));
$currencyVars = $db->select($query);
?>